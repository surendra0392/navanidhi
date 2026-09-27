<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavanidhiThemeCustomizationSeeder extends Seeder
{
    /**
     * Seed Navanidhi Naturals theme customizations.
     */
    public function run(): void
    {
        $this->command->info('=== Navanidhi Naturals Theme Customization Seeder ===');

        $now = Carbon::now();

        // 1. Deactivate default Bagisto demo theme carousels if they exist
        DB::table('theme_customizations')
            ->whereIn('id', [1, 2, 3, 4, 5, 6, 9, 10, 11, 12, 13, 14])
            ->update(['status' => 0]);

        // 2. Define Navanidhi Naturals Custom Theme Blocks
        $customizations = [
            [
                'id' => 16,
                'theme_code' => 'default',
                'type' => 'static_content',
                'name' => 'Navanidhi Hero & Philosophy',
                'sort_order' => 1,
                'status' => 1,
                'channel_id' => 1,
                'options' => json_encode([
                    'css' => '',
                    'html' => '<!-- SECTION 1: COMMANDING EDITORIAL HERO -->
<section class="relative overflow-hidden bg-[#FAF8F5] pt-16 pb-24 lg:pt-24 lg:pb-36 border-b border-[#E5E0D8]/70">
    <div class="absolute -top-48 -left-48 w-[600px] h-[600px] rounded-full bg-[#EBF3EE]/50 blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/3 -right-48 w-[600px] h-[600px] rounded-full bg-[#F7EBE3]/50 blur-3xl pointer-events-none"></div>
    <div class="site-container relative">
        <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-12 lg:gap-16">
            <div class="lg:col-span-7 space-y-7 lg:space-y-9">
                <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-[#EBF3EE] text-[#0D5C3A] border border-[#0D5C3A]/20 text-xs font-semibold tracking-widest uppercase">
                    <span class="h-2 w-2 rounded-full bg-[#0D5C3A]"></span>
                    100% Dehydrated Whole Foods • Cold-Processed
                </div>
                <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-bold tracking-tight text-[#1F2937] leading-[1.08]">
                    Pure Botanical Nutrition. <br class="hidden sm:inline">
                    <span class="italic text-[#0D5C3A] font-normal">Zero Compromises.</span>
                </h1>
                <p class="text-base sm:text-lg lg:text-xl leading-relaxed text-[#6B7280] max-w-xl">
                    Concentrated plant food powders and functional botanical blends. Low-temperature dehydrated below 42°C to preserve active phytonutrients, living enzymes, and clean daily vitality.
                </p>
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-2">
                    <a href="/products" class="nv-btn-primary !px-8 !py-4 text-xs tracking-widest shadow-md">
                        Explore Formulations
                    </a>
                    <a href="/page/about-us" class="nv-btn-outline !px-8 !py-4 text-xs tracking-widest">
                        Our Formulation Standard
                    </a>
                </div>
                <div class="grid grid-cols-3 gap-8 pt-8 border-t border-[#E5E0D8]/80 max-w-lg">
                    <div>
                        <p class="font-serif text-2xl lg:text-3xl font-bold text-[#1F2937]">100%</p>
                        <p class="text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1">Whole Plants</p>
                    </div>
                    <div>
                        <p class="font-serif text-2xl lg:text-3xl font-bold text-[#1F2937]">&lt; 42°C</p>
                        <p class="text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1">Cold Dehydrated</p>
                    </div>
                    <div>
                        <p class="font-serif text-2xl lg:text-3xl font-bold text-[#1F2937]">0%</p>
                        <p class="text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1">Synthetic Fillers</p>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-5 relative">
                <div class="relative rounded-2xl bg-white p-8 sm:p-10 border border-[#E5E0D8] shadow-md">
                    <div class="space-y-6">
                        <div class="aspect-4/3 overflow-hidden rounded-xl bg-[#F4EFEA] flex flex-col items-center justify-center p-8 border border-[#E5E0D8]/60 text-center space-y-3">
                            <div class="flex h-16 w-16 items-center justify-center rounded-full bg-[#0D5C3A] text-white text-2xl font-serif font-bold shadow-sm">
                                N
                            </div>
                            <h3 class="font-serif text-2xl font-bold text-[#1F2937]">Raw Botanical Harvests</h3>
                            <p class="text-xs sm:text-sm text-[#6B7280] max-w-xs leading-relaxed">
                                Cold-dehydrated fruits, wild supergreens, functional mushrooms, and adaptogenic roots gently reduced to ultra-fine ritual powders.
                            </p>
                        </div>
                        <div class="space-y-3 pt-2 text-xs sm:text-sm font-medium text-[#4B5563]">
                            <div class="flex items-center gap-3">
                                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-[#0D5C3A] text-white text-[11px] font-bold">✓</span>
                                <span>Zero maltodextrins, silica, or anti-caking chemicals</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-[#0D5C3A] text-white text-[11px] font-bold">✓</span>
                                <span>Single-origin & ethically sourced agricultural batches</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-[#0D5C3A] text-white text-[11px] font-bold">✓</span>
                                <span>Third-party purity and heavy-metal verified</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>',
                ]),
            ],
            [
                'id' => 18,
                'theme_code' => 'default',
                'type' => 'static_content',
                'name' => 'Navanidhi Header Navigation',
                'sort_order' => 10,
                'status' => 1,
                'channel_id' => 1,
                'options' => json_encode([
                    'css' => '',
                    'html' => '<nav class="flex items-center gap-7 lg:gap-8" aria-label="Primary Navigation">
    <a href="/products" class="text-xs uppercase tracking-[0.14em] font-semibold text-[#1F2937] hover:text-[#0D5C3A] transition-colors">
        Products
    </a>
    <a href="/spices" class="text-xs uppercase tracking-[0.14em] font-semibold text-[#1F2937] hover:text-[#0D5C3A] transition-colors">
        Spices
    </a>
    <a href="/botanical-powders" class="text-xs uppercase tracking-[0.14em] font-semibold text-[#1F2937] hover:text-[#0D5C3A] transition-colors">
        Botanicals
    </a>
    <a href="/recipes" class="text-xs uppercase tracking-[0.14em] font-semibold text-[#1F2937] hover:text-[#0D5C3A] transition-colors">
        Recipes & Rituals
    </a>
    <a href="/page/quality" class="text-xs uppercase tracking-[0.14em] font-semibold text-[#1F2937] hover:text-[#0D5C3A] transition-colors">
        Quality & Purity
    </a>
    <a href="/page/about-us" class="text-xs uppercase tracking-[0.14em] font-semibold text-[#1F2937] hover:text-[#0D5C3A] transition-colors">
        Our Story
    </a>
</nav>',
                ]),
            ],
            [
                'id' => 19,
                'theme_code' => 'default',
                'type' => 'static_content',
                'name' => 'Navanidhi Popular Search Tags',
                'sort_order' => 11,
                'status' => 1,
                'channel_id' => 1,
                'options' => json_encode([
                    'css' => '',
                    'html' => '<div class="mt-3.5 pt-3 border-t border-[#E5E0D8]/60 flex items-center gap-1.5 flex-wrap text-[11px] text-[#6B7280]">
    <span class="font-medium mr-1 text-[#1F2937]">Trending Searches:</span>
    <a href="/search?query=Red+Chilli" class="px-2.5 py-1 rounded-full bg-[#F5F2EC] hover:bg-[#0D5C3A] hover:text-white transition-colors">Red Chilli Powder</a>
    <a href="/search?query=Turmeric" class="px-2.5 py-1 rounded-full bg-[#F5F2EC] hover:bg-[#0D5C3A] hover:text-white transition-colors">Lakadong Turmeric</a>
    <a href="/search?query=Moringa" class="px-2.5 py-1 rounded-full bg-[#F5F2EC] hover:bg-[#0D5C3A] hover:text-white transition-colors">Moringa Leaf</a>
    <a href="/search?query=Amla" class="px-2.5 py-1 rounded-full bg-[#F5F2EC] hover:bg-[#0D5C3A] hover:text-white transition-colors">Amla Powder</a>
    <a href="/search?query=Beetroot" class="px-2.5 py-1 rounded-full bg-[#F5F2EC] hover:bg-[#0D5C3A] hover:text-white transition-colors">Beetroot</a>
    <a href="/search?query=Curry+Leaf" class="px-2.5 py-1 rounded-full bg-[#F5F2EC] hover:bg-[#0D5C3A] hover:text-white transition-colors">Curry Leaf</a>
</div>',
                ]),
            ],
            [
                'id' => 7,
                'theme_code' => 'default',
                'type' => 'footer_links',
                'name' => 'Footer Links',
                'sort_order' => 11,
                'status' => 1,
                'channel_id' => 1,
                'options' => json_encode([
                    'column_1' => [
                        ['url' => '/spices', 'title' => 'Pure Farm Spices', 'sort_order' => 1],
                        ['url' => '/botanical-powders', 'title' => 'Botanical Powders', 'sort_order' => 2],
                        ['url' => '/functional-blends', 'title' => 'Functional Blends', 'sort_order' => 3],
                        ['url' => '/culinary-ingredients', 'title' => 'Culinary Essentials', 'sort_order' => 4],
                        ['url' => '/products', 'title' => 'All Products', 'sort_order' => 5],
                    ],
                    'column_2' => [
                        ['url' => '/page/about-us', 'title' => 'Our Story & Philosophy', 'sort_order' => 1],
                        ['url' => '/page/quality', 'title' => 'Purity & Lab Standards', 'sort_order' => 2],
                        ['url' => '/recipes', 'title' => 'Kitchen Recipes & Rituals', 'sort_order' => 3],
                        ['url' => '/contact-us', 'title' => 'Customer Care & Enquiries', 'sort_order' => 4],
                        ['url' => '/page/customer-service', 'title' => 'Customer Support & FAQs', 'sort_order' => 5],
                    ],
                    'column_3' => [
                        ['url' => '/page/privacy-policy', 'title' => 'Privacy Policy', 'sort_order' => 1],
                        ['url' => '/page/terms-conditions', 'title' => 'Terms of Sale', 'sort_order' => 2],
                        ['url' => '/page/shipping-policy', 'title' => 'Shipping & Delivery', 'sort_order' => 3],
                        ['url' => '/page/return-policy', 'title' => 'Return & Replacement', 'sort_order' => 4],
                        ['url' => '/sitemap.xml', 'title' => 'XML Sitemap', 'sort_order' => 5],
                    ],
                    'social_links' => [
                        'twitter' => 'https://twitter.com/navanidhinaturals',
                        'youtube' => 'https://youtube.com/@navanidhinaturals',
                        'facebook' => 'https://facebook.com/navanidhinaturals',
                        'linkedin' => 'https://linkedin.com/company/managrofoods',
                        'instagram' => 'https://instagram.com/navanidhinaturals',
                    ],
                ]),
            ],
            [
                'id' => 8,
                'theme_code' => 'default',
                'type' => 'services_content',
                'name' => 'Services Content',
                'sort_order' => 12,
                'status' => 1,
                'channel_id' => 1,
                'options' => json_encode([
                    'services' => [
                        [
                            'title' => '100% Farm-Direct Purity',
                            'description' => 'Pure whole spices and single-origin botanicals with zero added dyes, starches, or chemical fillers',
                            'service_icon' => 'eco',
                        ],
                        [
                            'title' => 'Cold-Milled Freshness',
                            'description' => 'Slow stone ground and low-temperature dried below 42°C to preserve aroma and vital compounds',
                            'service_icon' => 'device_thermostat',
                        ],
                        [
                            'title' => 'Free India Shipping',
                            'description' => 'Fast 24–48hr dispatch and complimentary delivery across India on orders above ₹499',
                            'service_icon' => 'local_shipping',
                        ],
                        [
                            'title' => 'NABL Lab Certified',
                            'description' => 'Strictly tested for zero Sudan dyes, zero lead chromate, and certified by FSSAI',
                            'service_icon' => 'verified',
                        ],
                    ],
                ]),
            ],
        ];

        foreach ($customizations as $item) {
            $options = $item['options'];
            unset($item['options']);

            DB::table('theme_customizations')->updateOrInsert(
                ['id' => $item['id']],
                array_merge($item, [
                    'created_at' => $now,
                    'updated_at' => $now,
                ])
            );

            DB::table('theme_customization_translations')->updateOrInsert(
                [
                    'theme_customization_id' => $item['id'],
                    'locale' => 'en',
                ],
                [
                    'options' => $options,
                ]
            );
        }

        $this->command->info('Navanidhi Naturals Theme Customizations seeded successfully.');
    }
}
