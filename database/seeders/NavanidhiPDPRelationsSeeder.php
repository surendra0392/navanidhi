<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Webkul\Product\Helpers\Indexers\Flat;
use Webkul\Product\Helpers\Indexers\Inventory;
use Webkul\Product\Helpers\Indexers\Price;
use Webkul\Product\Models\Product;

class NavanidhiPDPRelationsSeeder extends Seeder
{
    public function run(): void
    {
        $this->command?->info('=== Seeding PDP Enhancements & Product Relations ===');

        // ──────────────────────────────────────────────
        // 1. Configure Size Attribute & Pack Size Swatches
        // ──────────────────────────────────────────────
        $sizeAttrId = 24;
        DB::table('attributes')->where('id', $sizeAttrId)->update([
            'swatch_type' => 'text',
            'is_configurable' => 1,
            'is_visible_on_front' => 1,
        ]);

        $packSizes = [
            '100g' => '100g Pack',
            '250g' => '250g Pack',
            '500g' => '500g Pack',
            '1kg' => '1kg Value Pack',
        ];

        $order = 10;
        $sizeOptionIds = [];
        foreach ($packSizes as $adminName => $label) {
            $opt = DB::table('attribute_options')
                ->where('attribute_id', $sizeAttrId)
                ->where('admin_name', $adminName)
                ->first();

            if (! $opt) {
                $optId = DB::table('attribute_options')->insertGetId([
                    'attribute_id' => $sizeAttrId,
                    'admin_name' => $adminName,
                    'sort_order' => $order++,
                    'swatch_value' => $adminName,
                ]);

                foreach (['en', 'hi_IN'] as $loc) {
                    DB::table('attribute_option_translations')->insert([
                        'attribute_option_id' => $optId,
                        'locale' => $loc,
                        'label' => $label,
                    ]);
                }

                $sizeOptionIds[$adminName] = $optId;
            } else {
                $sizeOptionIds[$adminName] = $opt->id;
                DB::table('attribute_options')->where('id', $opt->id)->update([
                    'swatch_value' => $adminName,
                ]);
            }
        }

        // ──────────────────────────────────────────────
        // 2. Custom Product Attributes (Ingredients, Usage, etc.)
        // ──────────────────────────────────────────────
        $customAttrs = [
            [
                'code' => 'ingredients',
                'admin_name' => 'Ingredients',
                'type' => 'textarea',
                'position' => 50,
            ],
            [
                'code' => 'usage',
                'admin_name' => 'Recommended Usage',
                'type' => 'textarea',
                'position' => 51,
            ],
            [
                'code' => 'storage_instructions',
                'admin_name' => 'Storage Instructions',
                'type' => 'text',
                'position' => 52,
            ],
            [
                'code' => 'shelf_life',
                'admin_name' => 'Shelf Life',
                'type' => 'text',
                'position' => 53,
            ],
            [
                'code' => 'country_of_origin',
                'admin_name' => 'Country of Origin',
                'type' => 'text',
                'position' => 54,
            ],
        ];

        $defaultFamily = DB::table('attribute_families')->where('code', 'default')->first();
        $generalGroup = DB::table('attribute_groups')
            ->where('attribute_family_id', $defaultFamily->id ?? 1)
            ->where('name', 'General')
            ->first();

        foreach ($customAttrs as $ca) {
            $existing = DB::table('attributes')->where('code', $ca['code'])->first();
            if (! $existing) {
                $attrId = DB::table('attributes')->insertGetId([
                    'code' => $ca['code'],
                    'admin_name' => $ca['admin_name'],
                    'type' => $ca['type'],
                    'swatch_type' => null,
                    'position' => $ca['position'],
                    'is_required' => 0,
                    'is_unique' => 0,
                    'is_filterable' => 0,
                    'is_comparable' => 0,
                    'is_configurable' => 0,
                    'is_user_defined' => 1,
                    'is_visible_on_front' => 1,
                    'value_per_locale' => 0,
                    'value_per_channel' => 0,
                    'enable_wysiwyg' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                foreach (['en', 'hi_IN'] as $locale) {
                    DB::table('attribute_translations')->insert([
                        'attribute_id' => $attrId,
                        'locale' => $locale,
                        'name' => $ca['admin_name'],
                    ]);
                }

                if ($generalGroup) {
                    DB::table('attribute_group_mappings')->insert([
                        'attribute_id' => $attrId,
                        'attribute_group_id' => $generalGroup->id,
                        'position' => $ca['position'],
                    ]);
                }
            } else {
                DB::table('attributes')->where('id', $existing->id)->update([
                    'is_visible_on_front' => 1,
                ]);
            }
        }

        // ──────────────────────────────────────────────
        // 3. Populate Product Specifications for Existing Items
        // ──────────────────────────────────────────────
        $attrMap = DB::table('attributes')->whereIn('code', [
            'ingredients', 'usage', 'storage_instructions', 'shelf_life', 'country_of_origin',
        ])->pluck('id', 'code');

        $prodIdBySku = DB::table('products')->pluck('id', 'sku')->toArray();

        $specs = [
            'navanidhi-moringa-powder' => [
                'ingredients' => '100% Pure Organic Moringa (Moringa oleifera) Leaf Powder. Shade-dried, cold-milled with zero carriers or additives.',
                'usage' => 'Mix 1 teaspoon (3g–5g) daily into smoothies, fresh juices, warm water, or morning oatmeal.',
                'storage_instructions' => 'Store in a cool, dark, dry place. Reseal tightly after opening.',
                'shelf_life' => '18 Months from Date of Packaging',
                'country_of_origin' => 'India (Cultivated in South India, Packed by MAN AGRO FOODS)',
            ],
            'navanidhi-beetroot-powder' => [
                'ingredients' => '100% Pure Dehydrated Beetroot (Beta vulgaris) Powder. Cold-processed to preserve nitrates and betalains.',
                'usage' => 'Add 1–2 teaspoons into pre-workout beverages, water, curries, or baked goods for natural tint and stamina.',
                'storage_instructions' => 'Keep pouch sealed in ambient temperature away from humidity.',
                'shelf_life' => '18 Months from Date of Packaging',
                'country_of_origin' => 'India (MAN AGRO FOODS)',
            ],
            'navanidhi-amla-powder' => [
                'ingredients' => '100% Wild-Harvested Indian Gooseberry (Phyllanthus emblica) Fruit Powder.',
                'usage' => 'Consume 1/2 to 1 teaspoon with honey or lukewarm water in the morning.',
                'storage_instructions' => 'Store in an airtight container away from moisture.',
                'shelf_life' => '24 Months from Date of Packaging',
                'country_of_origin' => 'India (MAN AGRO FOODS)',
            ],
            'navanidhi-turmeric-powder' => [
                'ingredients' => '100% Pure Lakadong Turmeric (Curcuma longa) Rhizome Powder (Guaranteed 7.5%–9% Curcumin). Zero lead chromate, zero artificial polishing.',
                'usage' => 'Add 1/2 teaspoon to golden milk, broths, daily cooking, or herbal teas. Best with a pinch of black pepper.',
                'storage_instructions' => 'Store in a cool, dry area away from direct sunlight.',
                'shelf_life' => '24 Months from Date of Packaging',
                'country_of_origin' => 'Meghalaya, India (MAN AGRO FOODS)',
            ],
            'navanidhi-red-chilli-powder' => [
                'ingredients' => '100% Pure Sun-Dried Stemless Red Chillies. Stone-ground at low temperatures with zero Sudan dyes or synthetic colours.',
                'usage' => 'Add to curries, dals, sambhars, marinades, or spice blends according to taste.',
                'storage_instructions' => 'Store in an airtight container in a cool, dry pantry.',
                'shelf_life' => '12 Months from Date of Packaging',
                'country_of_origin' => 'Andhra Pradesh & Karnataka, India (MAN AGRO FOODS)',
            ],
            'navanidhi-spirulina-powder' => [
                'ingredients' => '100% Pure Artisanal Spirulina (Arthrospira platensis) Biomass. Low-temperature dried.',
                'usage' => 'Start with 1/2 teaspoon and gradually increase to 1–2 teaspoons daily in juice or smoothies.',
                'storage_instructions' => 'Protect from direct light and moisture. Best refrigerated after opening.',
                'shelf_life' => '18 Months from Date of Packaging',
                'country_of_origin' => 'Tamil Nadu, India (MAN AGRO FOODS)',
            ],
            'navanidhi-green-vitality' => [
                'ingredients' => 'Organic Moringa Leaf, Spirulina, Wheatgrass, Chlorella (broken cell wall), Organic Spinach, Ceremonial Grade Matcha, KSM-66 Ashwagandha, Holy Basil (Tulsi).',
                'usage' => 'Blend 1 scoop (10g) into cold water, tender coconut water, or fresh fruit smoothie. Best taken first thing in the morning.',
                'storage_instructions' => 'Store in a cool, dry place away from heat and moisture. Keep zip-seal tightly closed.',
                'shelf_life' => '18 Months from Date of Packaging',
                'country_of_origin' => 'India (MAN AGRO FOODS)',
            ],
            'navanidhi-golden-immunity' => [
                'ingredients' => 'Pure Lakadong Turmeric (7%+ Curcumin), Organic Ginger Root, Ceylon Cinnamon, Green Cardamom, Black Pepper Extract (BioPerine), Kashmir Saffron.',
                'usage' => 'Whisk 1 teaspoon into warm almond, oat, or dairy milk. Sweeten with raw honey if desired. Ideal evening restorative ritual.',
                'storage_instructions' => 'Store in an airtight container away from direct sunlight.',
                'shelf_life' => '24 Months from Date of Packaging',
                'country_of_origin' => 'Meghalaya & Kerala, India (MAN AGRO FOODS)',
            ],
            'navanidhi-beauty-bloom' => [
                'ingredients' => 'Wild Amla Fruit Extract, Organic Hibiscus Calyx, Rose Petal Extract, Aloe Vera Gel Powder, Moringa Leaf, Bamboo Shoot Extract (Standardised Natural Silica + Biotin).',
                'usage' => 'Stir 1 scoop (8g) into 200ml water, fresh orange juice, or morning bowl. Take daily for radiant skin and hair vitality.',
                'storage_instructions' => 'Store in a cool, dry pantry below 25°C. Avoid damp spoons.',
                'shelf_life' => '18 Months from Date of Packaging',
                'country_of_origin' => 'India (MAN AGRO FOODS)',
            ],
            'navanidhi-curry-leaf-powder' => [
                'ingredients' => '100% Sun-Dried Fresh Curry Leaves (Murraya koenigii). Slow stone-ground with zero colours or anti-caking agents.',
                'usage' => 'Add to ghee tempering (tadka), warm rasam, sambar, buttermilk, dal khichdi, or mix with warm rice and cold-pressed sesame oil.',
                'storage_instructions' => 'Store in an airtight spice jar in a cool, dry place to retain volatile aromatic oils.',
                'shelf_life' => '12 Months from Date of Packaging',
                'country_of_origin' => 'Kerala, India (MAN AGRO FOODS)',
            ],
            'navanidhi-ashwagandha-powder' => [
                'ingredients' => '100% Pure KSM-66 Ashwagandha (Withania somnifera) Root Extract Powder (Standardised to 5% Withanolides).',
                'usage' => 'Mix 1 teaspoon (3g) into warm milk, herbal tea, or bedtime golden elixir 30 minutes before sleep.',
                'storage_instructions' => 'Store in a cool, dry place away from light and humidity.',
                'shelf_life' => '24 Months from Date of Packaging',
                'country_of_origin' => 'India (MAN AGRO FOODS)',
            ],
            'navanidhi-moringa-pack' => [
                'ingredients' => '100% Pure Organic Moringa (Moringa oleifera) Leaf Powder. Shade-dried, cold-milled with zero carriers or additives.',
                'usage' => 'Mix 1 teaspoon (3g–5g) daily into smoothies, fresh juices, warm water, or morning oatmeal.',
                'storage_instructions' => 'Store in a cool, dark, dry place. Reseal tightly after opening.',
                'shelf_life' => '18 Months from Date of Packaging',
                'country_of_origin' => 'India (Cultivated in South India, Packed by MAN AGRO FOODS)',
            ],
        ];

        foreach ($specs as $sku => $prodSpecs) {
            $prodId = $prodIdBySku[$sku] ?? null;
            if (! $prodId) {
                continue;
            }
            foreach ($prodSpecs as $code => $val) {
                if (isset($attrMap[$code])) {
                    $attrId = $attrMap[$code];
                    DB::table('product_attribute_values')->updateOrInsert(
                        [
                            'product_id' => $prodId,
                            'attribute_id' => $attrId,
                        ],
                        [
                            'text_value' => $val,
                            'locale' => null,
                            'channel' => null,
                        ]
                    );
                }
            }
        }

        // ──────────────────────────────────────────────
        // 4. Seed Configurable Product with Pack Sizes
        // ──────────────────────────────────────────────
        $configSku = 'navanidhi-moringa-pack';
        $existingConfig = DB::table('products')->where('sku', $configSku)->first();

        if ($existingConfig) {
            $childIds = DB::table('products')->where('parent_id', $existingConfig->id)->pluck('id')->toArray();
            $allIds = array_merge([$existingConfig->id], $childIds);

            DB::table('product_categories')->whereIn('product_id', $allIds)->delete();
            DB::table('product_channels')->whereIn('product_id', $allIds)->delete();
            DB::table('product_super_attributes')->whereIn('product_id', $allIds)->delete();
            DB::table('product_attribute_values')->whereIn('product_id', $allIds)->delete();
            DB::table('product_inventories')->whereIn('product_id', $allIds)->delete();
            DB::table('product_inventory_indices')->whereIn('product_id', $allIds)->delete();
            DB::table('product_price_indices')->whereIn('product_id', $allIds)->delete();
            DB::table('product_flat')->whereIn('product_id', $allIds)->delete();
            DB::table('product_images')->whereIn('product_id', $allIds)->delete();
            DB::table('product_relations')->whereIn('parent_id', $allIds)->orWhereIn('child_id', $allIds)->delete();
            DB::table('product_up_sells')->whereIn('parent_id', $allIds)->orWhereIn('child_id', $allIds)->delete();
            DB::table('products')->whereIn('id', $allIds)->delete();
        }

        $configProdId = DB::table('products')->insertGetId([
            'type' => 'configurable',
            'sku' => $configSku,
            'attribute_family_id' => $defaultFamily->id ?? 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Super attribute mapping (Size)
        DB::table('product_super_attributes')->insert([
            'product_id' => $configProdId,
            'attribute_id' => $sizeAttrId,
        ]);

        // Channel mapping
        DB::table('product_channels')->insert([
            'product_id' => $configProdId,
            'channel_id' => 1,
        ]);

        // Category mappings
        $catIds = DB::table('categories')
            ->join('category_translations', 'categories.id', '=', 'category_translations.category_id')
            ->whereIn('category_translations.slug', ['botanical-powders', 'products'])
            ->pluck('categories.id');

        foreach ($catIds as $cId) {
            DB::table('product_categories')->insert([
                'product_id' => $configProdId,
                'category_id' => $cId,
            ]);
        }

        // Attributes for parent configurable product
        $parentAttrs = [
            1 => ['text_value' => $configSku, 'locale' => null, 'channel' => null],
            2 => ['text_value' => 'Organic Moringa Leaf Powder — Pure Botanical Pack Sizes', 'locale' => 'en', 'channel' => null],
            3 => ['text_value' => 'organic-moringa-leaf-powder-pack', 'locale' => 'en', 'channel' => null],
            5 => ['boolean_value' => 1, 'locale' => null, 'channel' => null], // new
            6 => ['boolean_value' => 1, 'locale' => null, 'channel' => null], // featured
            7 => ['boolean_value' => 1, 'locale' => null, 'channel' => null], // visible_individually
            8 => ['boolean_value' => 1, 'locale' => null, 'channel' => 'default'], // status
            9 => ['text_value' => 'Certified organic single-origin moringa leaf powder, freshly shade-dried and available in customer-chosen daily pack sizes (100g, 250g, 500g).', 'locale' => 'en', 'channel' => null],
            10 => ['text_value' => '<h2>Navanidhi Naturals Organic Moringa Leaf Powder — Pack Sizes</h2><p>Our moringa leaves are hand-harvested from organic partner farms by MAN Agro Foods in South India. Shade-dried below 42°C to preserve chlorophyll, iron, and active bio-enzymes, then stone-ground to microscopic fineness.</p><h3>Available Pack Formats</h3><ul><li><strong>100g Trial Pack:</strong> Ideal for daily routine discovery (~20 days).</li><li><strong>250g Standard Pack:</strong> Best seller for monthly family wellness (~50 days).</li><li><strong>500g Eco Value Pack:</strong> Maximum botanical value in recyclable vacuum-sealed pouches (~100 days).</li></ul><h3>Usage & Suggestions</h3><p>Blend 1 teaspoon into warm water, fruit smoothies, buttermilk, or morning bowls.</p>', 'locale' => 'en', 'channel' => null],
            11 => ['float_value' => 299.00, 'locale' => null, 'channel' => null], // price
            16 => ['text_value' => 'Organic Moringa Leaf Powder Pack Sizes | Navanidhi Naturals', 'locale' => 'en', 'channel' => null],
            18 => ['text_value' => 'Pure organic moringa leaf powder available in 100g, 250g, and 500g packs. Cold-dehydrated plant nutrition by MAN Agro Foods.', 'locale' => 'en', 'channel' => null],
            26 => ['boolean_value' => 1, 'locale' => null, 'channel' => null], // guest_checkout
        ];

        foreach ($parentAttrs as $aId => $valData) {
            DB::table('product_attribute_values')->insert([
                'product_id' => $configProdId,
                'attribute_id' => $aId,
                'text_value' => $valData['text_value'] ?? null,
                'boolean_value' => $valData['boolean_value'] ?? null,
                'float_value' => $valData['float_value'] ?? null,
                'integer_value' => $valData['integer_value'] ?? null,
                'locale' => $valData['locale'],
                'channel' => $valData['channel'],
            ]);
        }

        // Copy image from product 41 to configurable parent
        $moringaImg = DB::table('product_images')->where('product_id', 41)->first();
        if ($moringaImg) {
            DB::table('product_images')->insert([
                'product_id' => $configProdId,
                'path' => $moringaImg->path,
                'position' => 1,
            ]);
        }

        // Seed 3 Child Variants
        $variantsData = [
            [
                'size_key' => '100g',
                'sku' => 'navanidhi-moringa-pack-100g',
                'name' => 'Organic Moringa Leaf Powder (100g Pack)',
                'price' => 299.00,
                'weight' => 0.10,
                'qty' => 50,
            ],
            [
                'size_key' => '250g',
                'sku' => 'navanidhi-moringa-pack-250g',
                'name' => 'Organic Moringa Leaf Powder (250g Pack)',
                'price' => 499.00,
                'weight' => 0.25,
                'qty' => 75,
            ],
            [
                'size_key' => '500g',
                'sku' => 'navanidhi-moringa-pack-500g',
                'name' => 'Organic Moringa Leaf Powder (500g Value Pack)',
                'price' => 899.00,
                'weight' => 0.50,
                'qty' => 40,
            ],
        ];

        $createdVariantIds = [];
        foreach ($variantsData as $vData) {
            $variantProdId = DB::table('products')->insertGetId([
                'type' => 'simple',
                'sku' => $vData['sku'],
                'attribute_family_id' => $defaultFamily->id ?? 1,
                'parent_id' => $configProdId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $createdVariantIds[] = $variantProdId;

            // Channel mapping for variant
            DB::table('product_channels')->insert([
                'product_id' => $variantProdId,
                'channel_id' => 1,
            ]);

            // Inventory
            DB::table('product_inventories')->insert([
                'product_id' => $variantProdId,
                'inventory_source_id' => 1,
                'qty' => $vData['qty'],
                'vendor_id' => 0,
            ]);

            // Variant Attributes
            $vAttrs = [
                1 => ['text_value' => $vData['sku'], 'locale' => null, 'channel' => null],
                2 => ['text_value' => $vData['name'], 'locale' => 'en', 'channel' => null],
                8 => ['boolean_value' => 1, 'locale' => null, 'channel' => 'default'], // status
                11 => ['float_value' => $vData['price'], 'locale' => null, 'channel' => null], // price
                22 => ['text_value' => (string) $vData['weight'], 'locale' => null, 'channel' => null], // weight
                26 => ['boolean_value' => 1, 'locale' => null, 'channel' => null], // guest_checkout
                $sizeAttrId => ['integer_value' => $sizeOptionIds[$vData['size_key']], 'locale' => null, 'channel' => null], // size option
            ];

            foreach ($vAttrs as $aId => $valData) {
                DB::table('product_attribute_values')->insert([
                    'product_id' => $variantProdId,
                    'attribute_id' => $aId,
                    'text_value' => $valData['text_value'] ?? null,
                    'boolean_value' => $valData['boolean_value'] ?? null,
                    'float_value' => $valData['float_value'] ?? null,
                    'integer_value' => $valData['integer_value'] ?? null,
                    'locale' => $valData['locale'],
                    'channel' => $valData['channel'],
                ]);
            }

            // Copy image
            if ($moringaImg) {
                DB::table('product_images')->insert([
                    'product_id' => $variantProdId,
                    'path' => $moringaImg->path,
                    'position' => 1,
                ]);
            }
        }

        // ──────────────────────────────────────────────
        // 5. Populate Related Products & Up-sells
        // ──────────────────────────────────────────────
        DB::table('product_relations')->delete();
        DB::table('product_up_sells')->delete();

        $relationsBySku = [
            'navanidhi-moringa-powder' => ['navanidhi-spirulina-powder', 'navanidhi-green-vitality', 'navanidhi-amla-powder'],
            'navanidhi-turmeric-powder' => ['navanidhi-red-chilli-powder', 'navanidhi-golden-immunity', 'navanidhi-ashwagandha-powder'],
            'navanidhi-red-chilli-powder' => ['navanidhi-turmeric-powder', 'navanidhi-curry-leaf-powder'],
            'navanidhi-beetroot-powder' => ['navanidhi-beauty-bloom', 'navanidhi-amla-powder', 'navanidhi-moringa-powder'],
            'navanidhi-spirulina-powder' => ['navanidhi-moringa-powder', 'navanidhi-green-vitality'],
            'navanidhi-green-vitality' => ['navanidhi-moringa-powder', 'navanidhi-spirulina-powder', 'navanidhi-golden-immunity'],
            'navanidhi-golden-immunity' => ['navanidhi-turmeric-powder', 'navanidhi-ashwagandha-powder'],
            'navanidhi-beauty-bloom' => ['navanidhi-beetroot-powder', 'navanidhi-amla-powder'],
            'navanidhi-curry-leaf-powder' => ['navanidhi-red-chilli-powder', 'navanidhi-turmeric-powder', 'navanidhi-moringa-powder'],
            'navanidhi-ashwagandha-powder' => ['navanidhi-turmeric-powder', 'navanidhi-golden-immunity'],
        ];

        foreach ($relationsBySku as $parentSku => $childSkus) {
            $parentId = $prodIdBySku[$parentSku] ?? null;
            if (! $parentId) {
                continue;
            }
            foreach ($childSkus as $childSku) {
                $childId = $prodIdBySku[$childSku] ?? null;
                if ($childId) {
                    DB::table('product_relations')->insert([
                        'parent_id' => $parentId,
                        'child_id' => $childId,
                    ]);
                }
            }
        }

        // Also relate configurable product if exists
        if (isset($configProdId)) {
            foreach (['navanidhi-spirulina-powder', 'navanidhi-green-vitality', 'navanidhi-amla-powder'] as $childSku) {
                $childId = $prodIdBySku[$childSku] ?? null;
                if ($childId) {
                    DB::table('product_relations')->insert([
                        'parent_id' => $configProdId,
                        'child_id' => $childId,
                    ]);
                }
            }
        }

        $upSellsBySku = [
            'navanidhi-moringa-powder' => ['navanidhi-green-vitality', 'navanidhi-spirulina-powder'],
            'navanidhi-turmeric-powder' => ['navanidhi-red-chilli-powder', 'navanidhi-golden-immunity'],
            'navanidhi-red-chilli-powder' => ['navanidhi-turmeric-powder', 'navanidhi-curry-leaf-powder'],
            'navanidhi-beetroot-powder' => ['navanidhi-beauty-bloom'],
            'navanidhi-green-vitality' => ['navanidhi-golden-immunity', 'navanidhi-beauty-bloom'],
        ];

        foreach ($upSellsBySku as $parentSku => $childSkus) {
            $parentId = $prodIdBySku[$parentSku] ?? null;
            if (! $parentId) {
                continue;
            }
            foreach ($childSkus as $childSku) {
                $childId = $prodIdBySku[$childSku] ?? null;
                if ($childId) {
                    DB::table('product_up_sells')->insert([
                        'parent_id' => $parentId,
                        'child_id' => $childId,
                    ]);
                }
            }
        }

        if (isset($configProdId)) {
            foreach (['navanidhi-green-vitality', 'navanidhi-spirulina-powder'] as $childSku) {
                $childId = $prodIdBySku[$childSku] ?? null;
                if ($childId) {
                    DB::table('product_up_sells')->insert([
                        'parent_id' => $configProdId,
                        'child_id' => $childId,
                    ]);
                }
            }
        }

        // Link recipes to configurable product
        $moringaId = $prodIdBySku['navanidhi-moringa-powder'] ?? null;
        if ($moringaId && isset($configProdId)) {
            $moringaRecipeIds = DB::table('recipe_products')->where('product_id', $moringaId)->pluck('recipe_id');
            foreach ($moringaRecipeIds as $rId) {
                DB::table('recipe_products')->updateOrInsert([
                    'recipe_id' => $rId,
                    'product_id' => $configProdId,
                ]);
            }
        }

        // ──────────────────────────────────────────────
        // 6. Direct Indexer Execution for New Products
        // ──────────────────────────────────────────────
        $allProdsToIndex = Product::whereIn('id', array_merge([$configProdId], $createdVariantIds))->get();
        $flatIndexer = app(Flat::class);
        $inventoryIndexer = app(Inventory::class);
        $priceIndexer = app(Price::class);

        // Index inventory for variants
        $variantsCollection = Product::whereIn('id', $createdVariantIds)->get();
        $inventoryIndexer->reindexBatch($variantsCollection);

        // Index price for variants & parent
        $priceIndexer->reindexBatch($variantsCollection);
        $priceIndexer->reindexBatch(Product::where('id', $configProdId)->get());

        // Index flat for all
        $flatIndexer->reindexBatch($allProdsToIndex);

        $this->command?->info('Product relations and configurable pack sizes successfully seeded and indexed.');
    }
}
