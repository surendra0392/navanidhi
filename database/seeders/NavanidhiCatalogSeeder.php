<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Webkul\Product\Helpers\Indexers\Inventory;
use Webkul\Product\Helpers\Indexers\Price;

class NavanidhiCatalogSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('=== Navanidhi Naturals Catalog Seeder ===');

        // ──────────────────────────────────────────────
        // Step 1: Clean up demo products
        // ──────────────────────────────────────────────
        $this->command->info('Cleaning demo products...');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('product_flat')->truncate();
        DB::table('product_attribute_values')->delete();
        DB::table('product_categories')->delete();
        DB::table('product_inventories')->delete();
        DB::table('product_images')->delete();
        DB::table('product_videos')->delete();
        DB::table('product_up_sells')->delete();
        DB::table('product_cross_sells')->delete();
        DB::table('product_relations')->delete();
        DB::table('product_ordered_inventories')->delete();
        DB::table('product_price_indices')->truncate();
        DB::table('product_inventory_indices')->truncate();
        DB::table('product_super_attributes')->delete();

        // Must delete children (variants) before parents
        DB::table('products')->whereNotNull('parent_id')->delete();
        DB::table('products')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Clean product channel mapping
        DB::table('product_channels')->delete();

        if (DB::getSchemaBuilder()->hasTable('product_customer_group_prices')) {
            DB::table('product_customer_group_prices')->delete();
        }

        $this->command->info('Products table cleared.');

        // ──────────────────────────────────────────────
        // Step 2: Clean up demo categories (keep Root)
        // ──────────────────────────────────────────────
        $this->command->info('Cleaning categories...');

        DB::table('category_translations')->where('category_id', '!=', 1)->delete();

        $childCats = DB::table('categories')
            ->where('id', '!=', 1)
            ->whereNotNull('parent_id')
            ->where('parent_id', '!=', 1)
            ->pluck('id');

        if ($childCats->count()) {
            DB::table('category_filterable_attributes')
                ->whereIn('category_id', $childCats)
                ->delete();
            DB::table('categories')
                ->whereIn('id', $childCats)
                ->delete();
        }

        $level1Cats = DB::table('categories')
            ->where('id', '!=', 1)
            ->pluck('id');

        if ($level1Cats->count()) {
            DB::table('category_filterable_attributes')
                ->whereIn('category_id', $level1Cats)
                ->delete();
            DB::table('categories')
                ->whereIn('id', $level1Cats)
                ->delete();
        }

        $this->command->info('Categories cleared.');

        // ──────────────────────────────────────────────
        // Step 3: Create Navanidhi categories
        // ──────────────────────────────────────────────
        $this->command->info('Creating Navanidhi Naturals categories...');

        $rootId = 1;
        $channelId = 1;

        // Update Root category name to Navanidhi Naturals
        DB::table('category_translations')
            ->where('category_id', $rootId)
            ->where('locale', 'en')
            ->update(['name' => 'Navanidhi Naturals', 'slug' => 'navanidhi-naturals']);

        // Fix NestedSet positions on root
        DB::table('categories')
            ->where('id', $rootId)
            ->update(['_lft' => 1, '_rgt' => 10, 'position' => 1, 'status' => 1]);

        $categories = [
            [
                'name' => 'Spices',
                'slug' => 'spices',
                'description' => '100% pure, farm-sourced authentic Indian spices. Stone-ground and sun-dried with zero artificial colours, fillers, or additives. Rich in natural essential oils and uncompromised aroma.',
                'position' => 1,
            ],
            [
                'name' => 'Botanical Powders',
                'slug' => 'botanical-powders',
                'description' => 'Pure, single-origin dehydrated plant powders for daily nutrition and culinary creativity.',
                'position' => 2,
            ],
            [
                'name' => 'Functional Blends',
                'slug' => 'functional-blends',
                'description' => 'Expertly formulated multi-ingredient blends designed for specific wellness goals.',
                'position' => 3,
            ],
            [
                'name' => 'Culinary Ingredients',
                'slug' => 'culinary-ingredients',
                'description' => 'Premium plant-based ingredients for cooking, baking, and recipe enhancement.',
                'position' => 4,
            ],
            [
                'name' => 'Wellness Essentials',
                'slug' => 'wellness-essentials',
                'description' => 'Daily wellness supplements and nutrient-dense superfood formulations.',
                'position' => 5,
            ],
            [
                'name' => 'All Products',
                'slug' => 'products',
                'description' => 'Browse our complete range of cold-dehydrated single-origin botanical powders, functional blends, and pure farm spices.',
                'position' => 6,
            ],
        ];

        $categoryIds = [];
        $lft = 2;

        foreach ($categories as $catData) {
            $catId = DB::table('categories')->insertGetId([
                'parent_id' => $rootId,
                'position' => $catData['position'],
                'status' => 1,
                '_lft' => $lft,
                '_rgt' => $lft + 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('category_translations')->insert([
                'category_id' => $catId,
                'locale' => 'en',
                'name' => $catData['name'],
                'slug' => $catData['slug'],
                'description' => '<p>'.$catData['description'].'</p>',
                'meta_title' => $catData['name'].' | Navanidhi Naturals',
                'meta_description' => $catData['description'],
            ]);

            $categoryIds[$catData['slug']] = $catId;
            $lft += 2;

            $this->command->info("  Created category: {$catData['name']} (ID: {$catId})");
        }

        // Update root _rgt to encompass all children
        DB::table('categories')
            ->where('id', $rootId)
            ->update(['_rgt' => $lft]);

        $this->command->info('Navanidhi Naturals categories created.');

        // ──────────────────────────────────────────────
        // Step 4: Create 10 Navanidhi Naturals products
        // ──────────────────────────────────────────────
        $this->command->info('Creating Navanidhi Naturals products...');

        $attributeFamilyId = 1; // Default

        $products = [
            // === Botanical Powders ===
            [
                'sku' => 'navanidhi-moringa-powder',
                'type' => 'simple',
                'name' => 'Organic Moringa Leaf Powder',
                'url_key' => 'organic-moringa-leaf-powder',
                'price' => 599.00,
                'special_price' => 499.00,
                'weight' => 0.25,
                'short_desc' => 'Sustainably harvested, shade-dried moringa leaves ground into a fine, nutrient-dense powder. Rich in vitamins A, C, iron and calcium.',
                'description' => '<h2>Navanidhi Naturals Organic Moringa Leaf Powder</h2><p>Our moringa leaves are hand-harvested from certified organic farms in South India by MAN Agro Foods, carefully shade-dried to preserve maximum nutrient density, then stone-ground into a silky-fine powder.</p><h3>Key Benefits</h3><ul><li>Rich in Vitamins A, C, E and K</li><li>Complete amino acid profile</li><li>Natural source of iron and calcium</li><li>Supports immune function and vitality</li></ul><h3>How to Use</h3><p>Add 1 teaspoon to smoothies, warm water with lemon, soups, or sprinkle over salads. Best consumed in the morning for sustained energy.</p><h3>Specifications</h3><p>Net Weight: 250g | Servings: ~50 | Brand: Navanidhi Naturals | Origin: South India | Zero Synthetics</p>',
                'categories' => ['botanical-powders', 'products'],
                'meta_title' => 'Organic Moringa Leaf Powder | Navanidhi Naturals',
                'meta_desc' => 'Premium organic moringa leaf powder by Navanidhi Naturals. Shade-dried, stone-ground. Rich in vitamins A, C, iron & calcium. 250g.',
                'new' => 1,
                'featured' => 1,
                'qty' => 200,
            ],
            [
                'sku' => 'navanidhi-beetroot-powder',
                'type' => 'simple',
                'name' => 'Dehydrated Beetroot Powder',
                'url_key' => 'dehydrated-beetroot-powder',
                'price' => 449.00,
                'special_price' => null,
                'weight' => 0.20,
                'short_desc' => 'Vibrant ruby-red beetroot powder made from slow-dehydrated farm-fresh beets. Natural source of dietary nitrates and antioxidants.',
                'description' => '<h2>Navanidhi Naturals Dehydrated Beetroot Powder</h2><p>Sourced from premium Indian beetroot by MAN Agro Foods, our powder is created through a gentle low-temperature dehydration process that preserves the deep ruby colour, earthy sweetness, and full nutritional profile.</p><h3>Key Benefits</h3><ul><li>Natural source of dietary nitrates</li><li>Supports cardiovascular health</li><li>Rich in folate and manganese</li><li>Natural food colouring for baking</li></ul><h3>How to Use</h3><p>Mix 1-2 teaspoons into smoothies, juices, lattes, or baked goods. Use as a natural food colourant for pastas, breads, and desserts.</p><h3>Specifications</h3><p>Net Weight: 200g | Servings: ~40 | Brand: Navanidhi Naturals | Processing: Low-temperature dehydration</p>',
                'categories' => ['botanical-powders', 'products'],
                'meta_title' => 'Dehydrated Beetroot Powder | Navanidhi Naturals',
                'meta_desc' => 'Pure dehydrated beetroot powder. Low-temperature processed. Natural nitrates & antioxidants. 200g.',
                'new' => 0,
                'featured' => 1,
                'qty' => 150,
            ],
            [
                'sku' => 'navanidhi-amla-powder',
                'type' => 'simple',
                'name' => 'Wild-Harvested Amla Powder',
                'url_key' => 'wild-harvested-amla-powder',
                'price' => 399.00,
                'special_price' => null,
                'weight' => 0.20,
                'short_desc' => 'Wild-harvested Indian gooseberry (amla) gently dried and ground. One of nature richest sources of vitamin C and powerful antioxidants.',
                'description' => '<h2>Navanidhi Naturals Wild-Harvested Amla Powder</h2><p>Our amla is wild-harvested from ancient gooseberry groves by MAN Agro Foods. Each berry is hand-selected at peak ripeness, carefully deseeded, and gently dried at low temperatures with zero artificial preservatives, maltodextrin, or synthetic fillers to preserve its extraordinary natural vitamin C and polyphenol content.</p><h3>Key Benefits</h3><ul><li>One of nature richest bioavailable sources of Vitamin C</li><li>Powerful cellular antioxidant protection</li><li>Supports radiant hair, skin firmness, and digestive vitality</li><li>100% pure wild-collected whole fruit with zero additives</li></ul><h3>How to Use</h3><p>Dissolve 1 teaspoon in warm water with raw honey, blend into fresh juices, or mix into yogurt. Also celebrated in traditional hair and face mask rituals.</p><h3>Specifications</h3><p>Net Weight: 200g | Servings: ~40 | Brand: Navanidhi Naturals | Manufacturer: MAN Agro Foods | Harvest: Wild-collected Indian groves</p>',
                'categories' => ['botanical-powders', 'wellness-essentials', 'products'],
                'meta_title' => 'Wild-Harvested Amla Powder | Navanidhi Naturals',
                'meta_desc' => 'Wild-harvested amla (Indian gooseberry) powder. Richest natural vitamin C source by MAN Agro Foods. 200g.',
                'new' => 0,
                'featured' => 0,
                'qty' => 180,
            ],
            [
                'sku' => 'navanidhi-turmeric-powder',
                'type' => 'simple',
                'name' => 'Lakadong Turmeric Powder',
                'url_key' => 'lakadong-turmeric-powder',
                'price' => 699.00,
                'special_price' => 599.00,
                'weight' => 0.20,
                'short_desc' => 'Ultra-premium Lakadong turmeric from Meghalaya with 7-9% natural curcumin — the highest natural curcumin concentration available in pure spices.',
                'description' => '<h2>Navanidhi Naturals Lakadong Turmeric Powder</h2><p>Lakadong turmeric is celebrated worldwide as nature most potent anti-inflammatory spice, sustainably grown in the pristine valleys of Meghalaya by local farmers and brought to you by MAN Agro Foods. With a high 7-9% natural curcumin content (compared to only 2-3% in standard commercial turmeric), it offers extraordinary therapeutic potency, rich earthy aroma, and deep natural golden hue without any chemical polishing or lead chromate.</p><h3>Key Benefits</h3><ul><li>7-9% natural bio-active curcumin content</li><li>Zero lead chromate, chemical dyes, or starch adulterants</li><li>Stone-ground at low temperatures to protect volatile essential oils</li><li>Dual-purpose: Pure authentic kitchen spice & Ayurvedic golden milk elixir</li></ul><h3>How to Use</h3><p>Use in golden milk (haldi doodh), dals, daily curries, warm lemon water, or tonics. Combine with black pepper and healthy fats for maximum bioavailability.</p><h3>Specifications</h3><p>Net Weight: 200g | Origin: Meghalaya, India | Curcumin: 7-9% | Brand: Navanidhi Naturals (MAN Agro Foods)</p>',
                'categories' => ['spices', 'botanical-powders', 'culinary-ingredients', 'products'],
                'meta_title' => 'Lakadong Turmeric Powder | High Curcumin Pure Spice | Navanidhi Naturals',
                'meta_desc' => 'Ultra-premium Lakadong turmeric with 7-9% curcumin. 100% pure, farm direct by MAN Agro Foods. 200g.',
                'new' => 1,
                'featured' => 1,
                'qty' => 120,
            ],
            [
                'sku' => 'navanidhi-red-chilli-powder',
                'type' => 'simple',
                'name' => 'Pure Red Chilli Powder',
                'url_key' => 'pure-red-chilli-powder',
                'price' => 199.00,
                'special_price' => 169.00,
                'weight' => 0.20,
                'short_desc' => 'Sun-dried premium red chillies stone-ground to perfection. Vibrant natural red colour, authentic medium-hot pungency, zero added colours (Sudan dye-free), and zero preservatives.',
                'description' => '<h2>Navanidhi Naturals Pure Red Chilli Powder</h2><p>Sourced directly from certified farmers in Guntur and Byadgi by MAN Agro Foods, our chillies are naturally sun-cured, destemmed, and stone-ground at low temperatures. We never add synthetic dyes, sawdust, brick powder, or chemical preservatives — delivering the authentic aroma, rich natural red hue, and balanced warmth that true Indian cuisine deserves.</p><h3>Key Highlights</h3><ul><li>100% Pure & Unadulterated (Zero Sudan Dyes, Zero Added Colours)</li><li>Stone-ground at low speed to retain volatile essential capsaicin oils</li><li>Carefully destemmed and cleaned before milling</li><li>Rich in natural Vitamin C and antioxidant capsaicin</li></ul><h3>Culinary Usage</h3><p>Essential for everyday curries, dals, sambhar, marinades, and seasoning. Delivers rich natural colour and authentic Indian heat without burning harshness.</p><h3>Specifications</h3><p>Net Weight: 200g | Origin: Andhra Pradesh / Karnataka, India | Pungency: Medium-Hot | Purity: 100% Pure Stemless Chillies | Brand: Navanidhi Naturals (MAN Agro Foods)</p>',
                'categories' => ['spices', 'culinary-ingredients', 'products'],
                'meta_title' => 'Pure Red Chilli Powder | 100% Unadulterated Indian Spice | Navanidhi Naturals',
                'meta_desc' => 'Farm-fresh, sun-dried Red Chilli Powder stone-ground by MAN Agro Foods. 100% pure, zero artificial colours or Sudan dyes. 200g.',
                'new' => 1,
                'featured' => 1,
                'qty' => 200,
            ],

            // === Functional Blends ===
            [
                'sku' => 'navanidhi-green-vitality',
                'type' => 'simple',
                'name' => 'Green Vitality Superblend',
                'url_key' => 'green-vitality-superblend',
                'price' => 899.00,
                'special_price' => 799.00,
                'weight' => 0.30,
                'short_desc' => 'A synergistic blend of 8 organic greens — moringa, spirulina, wheatgrass, chlorella, spinach, matcha, ashwagandha and tulsi — for comprehensive daily nutrition.',
                'description' => '<h2>Navanidhi Naturals Green Vitality Superblend</h2><p>Crafted by MAN Agro Foods, our signature daily greens formula combines eight of the world most nutrient-dense botanicals into one easy serving with zero maltodextrin, zero added sugars, and zero artificial flavors. Each ingredient is individually sourced from certified growers and cold-milled below 42°C for optimal living enzyme synergy.</p><h3>Ingredients</h3><ul><li>Organic Moringa Leaf</li><li>Spirulina</li><li>Wheatgrass</li><li>Chlorella (broken cell wall)</li><li>Organic Spinach</li><li>Ceremonial Grade Matcha</li><li>KSM-66 Ashwagandha</li><li>Holy Basil (Tulsi)</li></ul><h3>How to Use</h3><p>Blend 1 scoop (10g) into cold water, fresh coconut water, or your morning smoothie. Best taken on an empty stomach for cellular alkalization.</p><h3>Specifications</h3><p>Net Weight: 300g | Servings: 30 | Brand: Navanidhi Naturals | Manufacturer: MAN Agro Foods | Testing: Heavy metal & NABL lab verified</p>',
                'categories' => ['functional-blends', 'products'],
                'meta_title' => 'Green Vitality Superblend | Navanidhi Naturals',
                'meta_desc' => '8-ingredient organic greens superblend by MAN Agro Foods. Moringa, spirulina, wheatgrass, chlorella & more. 300g.',
                'new' => 1,
                'featured' => 1,
                'qty' => 100,
            ],
            [
                'sku' => 'navanidhi-golden-immunity',
                'type' => 'simple',
                'name' => 'Golden Immunity Elixir Blend',
                'url_key' => 'golden-immunity-elixir-blend',
                'price' => 749.00,
                'special_price' => null,
                'weight' => 0.25,
                'short_desc' => 'A warming Ayurvedic-inspired blend of Lakadong turmeric, ginger, black pepper, cinnamon, cardamom and saffron for immune support and inflammation defence.',
                'description' => '<h2>Navanidhi Naturals Golden Immunity Elixir Blend</h2><p>Inspired by the ancient Ayurvedic tradition of golden milk and formulated by MAN Agro Foods, our elixir blend combines premium Lakadong turmeric (guaranteed 7%+ curcumin) with synergistic warming Indian spices and black pepper BioPerine for maximum curcumin bioavailability without chemical additives.</p><h3>Ingredients</h3><ul><li>Lakadong Turmeric (7%+ curcumin)</li><li>Organic Ginger Root</li><li>Black Pepper Extract (BioPerine)</li><li>Ceylon Cinnamon</li><li>Green Cardamom</li><li>Kashmir Saffron</li></ul><h3>How to Use</h3><p>Stir 1 teaspoon into warm milk (dairy or plant-based) with a touch of honey or ghee. Perfect as an evening restorative ritual.</p><h3>Specifications</h3><p>Net Weight: 250g | Servings: ~50 | Brand: Navanidhi Naturals | Manufacturer: MAN Agro Foods | Features: BioPerine enhanced absorption</p>',
                'categories' => ['functional-blends', 'wellness-essentials', 'products'],
                'meta_title' => 'Golden Immunity Elixir Blend | Navanidhi Naturals',
                'meta_desc' => 'Ayurvedic golden milk blend with Lakadong turmeric, saffron, BioPerine by MAN Agro Foods. 250g.',
                'new' => 0,
                'featured' => 1,
                'qty' => 130,
            ],
            [
                'sku' => 'navanidhi-beauty-bloom',
                'type' => 'simple',
                'name' => 'Beauty Bloom Collagen Booster',
                'url_key' => 'beauty-bloom-collagen-booster',
                'price' => 999.00,
                'special_price' => 849.00,
                'weight' => 0.25,
                'short_desc' => 'A plant-based beauty blend of amla, hibiscus, rose petal, aloe vera, vitamin E-rich moringa and biotin-rich bamboo shoot for radiant skin, hair and nails.',
                'description' => '<h2>Navanidhi Naturals Beauty Bloom Collagen Booster</h2><p>Developed by MAN Agro Foods, Beauty Bloom is a 100% whole plant formulation that works from within. Our formula combines traditional Ayurvedic beauty botanicals with modern nutritional science to support natural collagen production—completely free from animal collagen, synthetic biotin, or maltodextrin fillers.</p><h3>Ingredients</h3><ul><li>Amla (Vitamin C for natural collagen synthesis)</li><li>Hibiscus Flower</li><li>Rose Petal Extract</li><li>Aloe Vera</li><li>Moringa Leaf (Vitamin E)</li><li>Bamboo Shoot Extract (standardised natural silica & biotin)</li></ul><h3>How to Use</h3><p>Mix 1 scoop (8g) into water, fresh juice, or a morning bowl. Take daily for visible results in 4-6 weeks.</p><h3>Specifications</h3><p>Net Weight: 250g | Servings: ~30 | Brand: Navanidhi Naturals | Manufacturer: MAN Agro Foods | Type: 100% Plant-based</p>',
                'categories' => ['functional-blends', 'wellness-essentials', 'products'],
                'meta_title' => 'Beauty Bloom Collagen Booster | Navanidhi Naturals',
                'meta_desc' => 'Plant-based beauty blend for skin, hair & nails by MAN Agro Foods. Amla, hibiscus, rose petal. 250g.',
                'new' => 1,
                'featured' => 0,
                'qty' => 90,
            ],

            // === Culinary Ingredients ===
            [
                'sku' => 'navanidhi-curry-leaf-powder',
                'type' => 'simple',
                'name' => 'Sun-Dried Curry Leaf Powder',
                'url_key' => 'sun-dried-curry-leaf-powder',
                'price' => 349.00,
                'special_price' => null,
                'weight' => 0.15,
                'short_desc' => 'Aromatic sun-dried curry leaves from Kerala, stone-ground to a fine powder. Retains the intense flavour and iron content of fresh leaves year-round.',
                'description' => '<h2>Navanidhi Naturals Sun-Dried Curry Leaf Powder</h2><p>Sourced directly from organic curry leaf farms by MAN Agro Foods, our leaves are picked at dawn for maximum aromatic oil content, sun-dried within hours, and stone-ground into a fragrant fine powder.</p><h3>Key Benefits</h3><ul><li>Intense natural flavour — better than dried leaves</li><li>Excellent source of iron and folic acid</li><li>Rich in antioxidants</li><li>Traditional hair and skin tonic</li></ul><h3>How to Use</h3><p>Add to tempering (tadka), rice dishes, chutneys, rasam, sambar, buttermilk, or smoothies. Sprinkle over yogurt or dals for instant flavour.</p><h3>Specifications</h3><p>Net Weight: 150g | Origin: Kerala, India | Processing: Sun-dried, stone-ground</p>',
                'categories' => ['spices', 'culinary-ingredients', 'products'],
                'meta_title' => 'Sun-Dried Curry Leaf Powder | Navanidhi Naturals',
                'meta_desc' => 'Premium Kerala curry leaf powder. Sun-dried, stone-ground. Rich iron source. 150g.',
                'new' => 0,
                'featured' => 0,
                'qty' => 160,
            ],

            // === Wellness Essentials ===
            [
                'sku' => 'navanidhi-ashwagandha-powder',
                'type' => 'simple',
                'name' => 'KSM-66 Ashwagandha Root Powder',
                'url_key' => 'ksm-66-ashwagandha-root-powder',
                'price' => 799.00,
                'special_price' => 699.00,
                'weight' => 0.20,
                'short_desc' => 'Premium KSM-66 ashwagandha root extract powder — the world most clinically studied ashwagandha, standardised to 5% withanolides for stress relief and vitality.',
                'description' => '<h2>Navanidhi Naturals KSM-66 Ashwagandha Root Powder</h2><p>Packaged under strict clean-label standards by MAN Agro Foods, we use only the gold-standard KSM-66 ashwagandha root extract, produced through a solvent-free traditional process that preserves the full spectrum of active withanolides for stress relief, cortisol balance, and restorative vitality.</p><h3>Key Benefits</h3><ul><li>Standardised to 5% active withanolides</li><li>Clinically studied stress and cortisol reduction</li><li>Supports physical stamina and workout recovery</li><li>Enhances cognitive clarity, memory, and sleep depth</li></ul><h3>How to Use</h3><p>Mix 1 teaspoon (3g) into warm milk, herbal tea, or bedtime golden elixir 30 minutes before sleep.</p><h3>Specifications</h3><p>Net Weight: 200g | Servings: ~66 | Brand: Navanidhi Naturals | Manufacturer: MAN Agro Foods | Extract: KSM-66</p>',
                'categories' => ['wellness-essentials', 'products'],
                'meta_title' => 'KSM-66 Ashwagandha Root Powder | Navanidhi Naturals',
                'meta_desc' => 'Premium KSM-66 ashwagandha. 5% withanolides. Clinically studied for stress relief & vitality by MAN Agro Foods. 200g.',
                'new' => 0,
                'featured' => 1,
                'qty' => 140,
            ],
            [
                'sku' => 'navanidhi-spirulina-powder',
                'type' => 'simple',
                'name' => 'Artisanal Spirulina Powder',
                'url_key' => 'artisanal-spirulina-powder',
                'price' => 649.00,
                'special_price' => null,
                'weight' => 0.20,
                'short_desc' => 'Farm-fresh spirulina cultivated in pristine freshwater ponds in Tamil Nadu. Air-dried at low temperatures to preserve phycocyanin and complete protein.',
                'description' => '<h2>Navanidhi Naturals Artisanal Spirulina Powder</h2><p>Cultivated in pristine freshwater ponds in Tamil Nadu and processed by MAN Agro Foods, our artisanal spirulina is harvested daily and immediately air-dried below 40°C to preserve the living blue phycocyanin antioxidants, complete proteins, and active enzymes with zero heavy metal contamination.</p><h3>Key Benefits</h3><ul><li>60-70% complete bioavailable protein by weight</li><li>Rich in active phycocyanin (blue antioxidant pigment)</li><li>Excellent plant source of B-complex vitamins and iron</li><li>Supports sustained natural energy and immune defenses</li></ul><h3>How to Use</h3><p>Start with 1/2 teaspoon and work up to 1-2 teaspoons daily. Best added to smoothies, juices, or energy snacks. Avoid boiling.</p><h3>Specifications</h3><p>Net Weight: 200g | Servings: ~40 | Brand: Navanidhi Naturals | Manufacturer: MAN Agro Foods | Protein: 65%</p>',
                'categories' => ['botanical-powders', 'wellness-essentials', 'products'],
                'meta_title' => 'Artisanal Spirulina Powder | Navanidhi Naturals',
                'meta_desc' => 'Farm-fresh spirulina by MAN Agro Foods. 65% complete protein. Low-temperature dried. Phycocyanin-rich. 200g.',
                'new' => 0,
                'featured' => 0,
                'qty' => 110,
            ],
        ];

        $inventorySourceId = 1; // Default inventory source

        foreach ($products as $productData) {
            // Step 4a: Create product record
            $productId = DB::table('products')->insertGetId([
                'type' => $productData['type'],
                'sku' => $productData['sku'],
                'attribute_family_id' => $attributeFamilyId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Step 4b: Attach to default channel
            DB::table('product_channels')->insert([
                'product_id' => $productId,
                'channel_id' => $channelId,
            ]);

            // Step 4c: Attach to categories
            foreach ($productData['categories'] as $catSlug) {
                if (isset($categoryIds[$catSlug])) {
                    DB::table('product_categories')->insert([
                        'product_id' => $productId,
                        'category_id' => $categoryIds[$catSlug],
                    ]);
                }
            }

            // Step 4d: Save attribute values
            $attributeValues = [
                ['attribute_id' => 1, 'text_value' => $productData['sku']],
                ['attribute_id' => 2, 'text_value' => $productData['name']],
                ['attribute_id' => 3, 'text_value' => $productData['url_key']],
                ['attribute_id' => 9, 'text_value' => $productData['short_desc']],
                ['attribute_id' => 10, 'text_value' => $productData['description']],
                ['attribute_id' => 11, 'float_value' => $productData['price']],
                ['attribute_id' => 16, 'text_value' => $productData['meta_title']],
                ['attribute_id' => 18, 'text_value' => $productData['meta_desc']],
                ['attribute_id' => 22, 'text_value' => (string) $productData['weight']],
                ['attribute_id' => 5, 'boolean_value' => $productData['new']],
                ['attribute_id' => 6, 'boolean_value' => $productData['featured']],
                ['attribute_id' => 7, 'boolean_value' => 1],
                ['attribute_id' => 8, 'boolean_value' => 1],
                ['attribute_id' => 26, 'boolean_value' => 1],
            ];

            if ($productData['special_price'] !== null) {
                $attributeValues[] = ['attribute_id' => 13, 'float_value' => $productData['special_price']];
            }

            foreach ($attributeValues as $attrVal) {
                $record = [
                    'product_id' => $productId,
                    'attribute_id' => $attrVal['attribute_id'],
                    'locale' => 'en',
                    'channel' => 'default',
                ];

                if (isset($attrVal['text_value'])) {
                    $record['text_value'] = $attrVal['text_value'];
                } elseif (isset($attrVal['float_value'])) {
                    $record['float_value'] = $attrVal['float_value'];
                } elseif (isset($attrVal['boolean_value'])) {
                    $record['boolean_value'] = $attrVal['boolean_value'];
                } elseif (isset($attrVal['integer_value'])) {
                    $record['integer_value'] = $attrVal['integer_value'];
                }

                $attribute = DB::table('attributes')->where('id', $attrVal['attribute_id'])->first();
                if ($attribute) {
                    if (! $attribute->value_per_locale) {
                        $record['locale'] = null;
                    }
                    if (! $attribute->value_per_channel) {
                        $record['channel'] = null;
                    }
                }

                DB::table('product_attribute_values')->insert($record);
            }

            // Step 4e: Set inventory
            DB::table('product_inventories')->insert([
                'qty' => $productData['qty'],
                'product_id' => $productId,
                'inventory_source_id' => $inventorySourceId,
                'vendor_id' => 0,
            ]);

            // Step 4f: Create product_flat entry
            DB::table('product_flat')->insert([
                'product_id' => $productId,
                'sku' => $productData['sku'],
                'type' => $productData['type'],
                'name' => $productData['name'],
                'short_description' => $productData['short_desc'],
                'description' => $productData['description'],
                'url_key' => $productData['url_key'],
                'price' => $productData['price'],
                'special_price' => $productData['special_price'],
                'weight' => $productData['weight'],
                'new' => $productData['new'],
                'featured' => $productData['featured'],
                'status' => 1,
                'visible_individually' => 1,
                'locale' => 'en',
                'channel' => 'default',
                'product_number' => null,
                'meta_title' => $productData['meta_title'],
                'meta_description' => $productData['meta_desc'],
                'attribute_family_id' => $attributeFamilyId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Step 4g: Attach product image
            $imageSrc = base_path('packages/Webkul/Installer/src/Resources/assets/images/seeders/navanidhi_products/'.$productData['sku'].'.jpg');
            if (file_exists($imageSrc)) {
                $relPath = 'products/'.$productId.'/'.$productData['sku'].'.jpg';
                $destDir = storage_path('app/public/products/'.$productId);
                if (! file_exists($destDir)) {
                    mkdir($destDir, 0777, true);
                }
                copy($imageSrc, $destDir.'/'.$productData['sku'].'.jpg');

                $pubDir = public_path('storage/products/'.$productId);
                if (! file_exists($pubDir)) {
                    mkdir($pubDir, 0777, true);
                }
                copy($imageSrc, $pubDir.'/'.$productData['sku'].'.jpg');

                DB::table('product_images')->insert([
                    'path' => $relPath,
                    'product_id' => $productId,
                    'position' => 1,
                ]);
            }

            $this->command->info("  Created product: {$productData['name']} (ID: {$productId})");
        }

        // Step 5: Run Indexers for inventory, prices, and search
        app(Inventory::class)->reindexFull();
        app(Price::class)->reindexFull();
        Artisan::call('indexer:index');

        $this->command->info('');
        $this->command->info('=== Navanidhi Naturals Catalog Seeder Complete ===');
        $this->command->info('Categories: '.count($categoryIds));
        $this->command->info('Products: '.count($products));
        $this->command->info('Inventory & Price Indexing: COMPLETED');
    }
}
