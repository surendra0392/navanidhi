<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Webkul\Theme\Models\HeroLayer;
use Webkul\Theme\Models\HeroSlide;
use Webkul\Theme\Models\HeroSlider;

class NavanidhiHeroSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
     * @throws \RuntimeException
     */
    public function run()
    {
        // 1. Prepare and Copy Media Assets from package seeders
        $heroPackageDir = base_path('packages/Webkul/Installer/src/Resources/assets/images/seeders/hero');
        $storageHeroDir = storage_path('app/public/theme/hero/navanidhi');
        $publicHeroDir = public_path('storage/theme/hero/navanidhi');

        foreach ([$storageHeroDir, $publicHeroDir] as $dir) {
            if (! File::exists($dir)) {
                File::makeDirectory($dir, 0777, true, true);
            }
        }

        $heroFiles = [
            'navanidhi-hero-botanical-desktop.webp',
            'navanidhi-hero-botanical-mobile.webp',
            'navanidhi-hero-quality-desktop.webp',
            'navanidhi-hero-quality-mobile.webp',
            'navanidhi-hero-discovery-desktop.webp',
            'navanidhi-hero-discovery-mobile.webp',
        ];

        foreach ($heroFiles as $file) {
            $pkgFile = $heroPackageDir.'/'.$file;
            if (File::exists($pkgFile)) {
                File::copy($pkgFile, $storageHeroDir.'/'.$file);
                File::copy($pkgFile, $publicHeroDir.'/'.$file);
            }
        }

        // 2. Perform Seeding within Database Transaction (Idempotent)
        DB::transaction(function () {
            // Find or create the primary Navanidhi Homepage Hero Slider
            $slider = HeroSlider::updateOrCreate(
                ['code' => 'navanidhi-homepage-hero'],
                [
                    'name' => 'Navanidhi Homepage Hero',
                    'status' => 1,
                    'placement' => 'homepage',
                    'settings' => [
                        'autoplay' => true,
                        'loop' => true,
                        'duration' => 6000,
                    ],
                ]
            );

            // Also keep legacy code synced if present
            HeroSlider::where('code', 'elior-homepage-hero')->update(['status' => 0]);

            // Define 3 Production Slides with Complete Editorial Hierarchy
            $slidesData = [
                [
                    'name' => 'Farm Spices & Living Botanicals',
                    'sort_order' => 0,
                    'media_type' => 'image',
                    'desktop_media' => 'theme/hero/navanidhi/navanidhi-hero-botanical-desktop.webp',
                    'mobile_media' => 'theme/hero/navanidhi/navanidhi-hero-botanical-mobile.webp',
                    'duration' => 6000,
                    'status' => 1,
                    'layers' => [
                        [
                            'type' => 'text',
                            'name' => 'Eyebrow',
                            'sort_order' => 0,
                            'content' => '<div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-50 text-[#0D5C3A] border border-[#0D5C3A]/25 text-xs font-semibold tracking-widest uppercase shadow-xs"><svg class="w-3.5 h-3.5 text-[#0D5C3A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 2v20M2 12h20M4.93 4.93l14.14 14.14M4.93 19.07l14.14-14.14"/></svg><span>100% Pure Farm Spices & Living Botanicals • MAN AGRO FOODS</span></div>',
                            'desktop_settings' => ['x' => '0%', 'y' => '0%', 'width' => 'auto'],
                            'settings' => ['classes' => ''],
                        ],
                        [
                            'type' => 'heading',
                            'name' => 'Headline',
                            'sort_order' => 1,
                            'content' => 'Authentic Farm Spices. <br class="hidden sm:inline"><span class="italic text-[#0D5C3A] font-normal">Pure Botanical Potency.</span>',
                            'desktop_settings' => ['x' => '0%', 'y' => '0%', 'width' => 'auto'],
                            'settings' => ['classes' => ''],
                        ],
                        [
                            'type' => 'text',
                            'name' => 'Description',
                            'sort_order' => 2,
                            'content' => '<p class="text-base sm:text-lg lg:text-xl leading-relaxed text-[#4B5563] max-w-xl">Pure sun-dried Red Chilli Powder, high-curcumin Lakadong Turmeric, and cold-milled whole botanical nutrition. Zero chemical food dyes, zero starch fillers, and 100% farm-traceable purity.</p>',
                            'desktop_settings' => ['x' => '0%', 'y' => '0%', 'width' => 'auto'],
                            'settings' => ['classes' => ''],
                        ],
                        [
                            'type' => 'button',
                            'name' => 'CTAs',
                            'sort_order' => 3,
                            'content' => '<div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-1"><a href="/spices" class="btn-emerald-primary !px-8 !py-4 text-xs tracking-widest shadow-md">Explore Pure Spices</a><a href="/botanical-powders" class="btn-emerald-outline !px-8 !py-4 text-xs tracking-widest">Botanical Powders</a></div>',
                            'desktop_settings' => ['x' => '0%', 'y' => '0%', 'width' => 'auto'],
                            'settings' => ['classes' => ''],
                        ],
                        [
                            'type' => 'text',
                            'name' => 'Metrics',
                            'sort_order' => 4,
                            'content' => '<div class="grid grid-cols-3 gap-6 pt-4 border-t border-[#0D5C3A]/15 max-w-lg"><div><p class="font-serif text-2xl lg:text-3xl font-bold text-[#062E1A]">100%</p><p class="text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1">Pure Spices</p></div><div><p class="font-serif text-2xl lg:text-3xl font-bold text-[#062E1A]">&lt; 42°C</p><p class="text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1">Cold Milled</p></div><div><p class="font-serif text-2xl lg:text-3xl font-bold text-[#062E1A]">0%</p><p class="text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1">Synthetic Dyes</p></div></div>',
                            'desktop_settings' => ['x' => '0%', 'y' => '0%', 'width' => 'auto'],
                            'settings' => ['classes' => ''],
                        ],
                    ],
                ],
                [
                    'name' => 'The Navanidhi Heritage',
                    'sort_order' => 1,
                    'media_type' => 'image',
                    'desktop_media' => 'theme/hero/navanidhi/navanidhi-hero-quality-desktop.webp',
                    'mobile_media' => 'theme/hero/navanidhi/navanidhi-hero-quality-mobile.webp',
                    'duration' => 6000,
                    'status' => 1,
                    'layers' => [
                        [
                            'type' => 'text',
                            'name' => 'Eyebrow',
                            'sort_order' => 0,
                            'content' => '<div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-50 text-[#0D5C3A] border border-[#0D5C3A]/25 text-xs font-semibold tracking-widest uppercase shadow-xs"><svg class="w-3.5 h-3.5 text-[#0D5C3A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg><span>Nine Divine Treasures of Mother Nature</span></div>',
                            'desktop_settings' => ['x' => '0%', 'y' => '0%', 'width' => 'auto'],
                            'settings' => ['classes' => ''],
                        ],
                        [
                            'type' => 'heading',
                            'name' => 'Headline',
                            'sort_order' => 1,
                            'content' => 'Honest Indian Farms. <br class="hidden sm:inline"><span class="italic text-[#0D5C3A] font-normal">Uncompromised Quality.</span>',
                            'desktop_settings' => ['x' => '0%', 'y' => '0%', 'width' => 'auto'],
                            'settings' => ['classes' => ''],
                        ],
                        [
                            'type' => 'text',
                            'name' => 'Description',
                            'sort_order' => 2,
                            'content' => '<p class="text-base sm:text-lg lg:text-xl leading-relaxed text-[#4B5563] max-w-xl">Every harvest is sourced from traditional agrarian hubs—Andhra Byadgi chillies, Meghalaya Lakadong turmeric, and Tamil Nadu moringa. Sifted, destemmed, and ground without compromise.</p>',
                            'desktop_settings' => ['x' => '0%', 'y' => '0%', 'width' => 'auto'],
                            'settings' => ['classes' => ''],
                        ],
                        [
                            'type' => 'button',
                            'name' => 'CTAs',
                            'sort_order' => 3,
                            'content' => '<div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-1"><a href="/page/about-us" class="btn-emerald-primary !px-8 !py-4 text-xs tracking-widest shadow-md">Our Story & Roots</a><a href="/page/quality" class="btn-emerald-outline !px-8 !py-4 text-xs tracking-widest">Lab Purity Reports</a></div>',
                            'desktop_settings' => ['x' => '0%', 'y' => '0%', 'width' => 'auto'],
                            'settings' => ['classes' => ''],
                        ],
                        [
                            'type' => 'text',
                            'name' => 'Metrics',
                            'sort_order' => 4,
                            'content' => '<div class="grid grid-cols-3 gap-6 pt-4 border-t border-[#0D5C3A]/15 max-w-lg"><div><p class="font-serif text-2xl lg:text-3xl font-bold text-[#062E1A]">Single</p><p class="text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1">Origin Farms</p></div><div><p class="font-serif text-2xl lg:text-3xl font-bold text-[#062E1A]">NABL</p><p class="text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1">Lab Verified</p></div><div><p class="font-serif text-2xl lg:text-3xl font-bold text-[#062E1A]">FSSAI</p><p class="text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1">Certified</p></div></div>',
                            'desktop_settings' => ['x' => '0%', 'y' => '0%', 'width' => 'auto'],
                            'settings' => ['classes' => ''],
                        ],
                    ],
                ],
                [
                    'name' => 'Daily Kitchen & Wellness Rituals',
                    'sort_order' => 2,
                    'media_type' => 'image',
                    'desktop_media' => 'theme/hero/navanidhi/navanidhi-hero-discovery-desktop.webp',
                    'mobile_media' => 'theme/hero/navanidhi/navanidhi-hero-discovery-mobile.webp',
                    'duration' => 6000,
                    'status' => 1,
                    'layers' => [
                        [
                            'type' => 'text',
                            'name' => 'Eyebrow',
                            'sort_order' => 0,
                            'content' => '<div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-50 text-[#0D5C3A] border border-[#0D5C3A]/25 text-xs font-semibold tracking-widest uppercase shadow-xs"><svg class="w-3.5 h-3.5 text-[#0D5C3A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 2v20M2 12h20M4.93 4.93l14.14 14.14M4.93 19.07l14.14-14.14"/></svg><span>Clean Label Kitchen & Living Apothecary</span></div>',
                            'desktop_settings' => ['x' => '0%', 'y' => '0%', 'width' => 'auto'],
                            'settings' => ['classes' => ''],
                        ],
                        [
                            'type' => 'heading',
                            'name' => 'Headline',
                            'sort_order' => 1,
                            'content' => 'Zero Fillers. <br class="hidden sm:inline"><span class="italic text-[#0D5C3A] font-normal">Real Scent & Flavor.</span>',
                            'desktop_settings' => ['x' => '0%', 'y' => '0%', 'width' => 'auto'],
                            'settings' => ['classes' => ''],
                        ],
                        [
                            'type' => 'text',
                            'name' => 'Description',
                            'sort_order' => 2,
                            'content' => '<p class="text-base sm:text-lg lg:text-xl leading-relaxed text-[#4B5563] max-w-xl">From daily morning golden milk and smoothie tonics to authentic home-cooked dals and curries. Experience the purity of unadulterated whole foods in your everyday living.</p>',
                            'desktop_settings' => ['x' => '0%', 'y' => '0%', 'width' => 'auto'],
                            'settings' => ['classes' => ''],
                        ],
                        [
                            'type' => 'button',
                            'name' => 'CTAs',
                            'sort_order' => 3,
                            'content' => '<div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-1"><a href="/products" class="btn-emerald-primary !px-8 !py-4 text-xs tracking-widest shadow-md">Shop All Products</a><a href="/recipes" class="btn-emerald-outline !px-8 !py-4 text-xs tracking-widest">Explore Recipes</a></div>',
                            'desktop_settings' => ['x' => '0%', 'y' => '0%', 'width' => 'auto'],
                            'settings' => ['classes' => ''],
                        ],
                        [
                            'type' => 'text',
                            'name' => 'Metrics',
                            'sort_order' => 4,
                            'content' => '<div class="grid grid-cols-3 gap-6 pt-4 border-t border-[#0D5C3A]/15 max-w-lg"><div><p class="font-serif text-2xl lg:text-3xl font-bold text-[#062E1A]">11+</p><p class="text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1">Farm Products</p></div><div><p class="font-serif text-2xl lg:text-3xl font-bold text-[#062E1A]">12+</p><p class="text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1">Clean Recipes</p></div><div><p class="font-serif text-2xl lg:text-3xl font-bold text-[#062E1A]">Zero</p><p class="text-xs uppercase tracking-wider text-[#6B7280] font-medium mt-1">Adulterants</p></div></div>',
                            'desktop_settings' => ['x' => '0%', 'y' => '0%', 'width' => 'auto'],
                            'settings' => ['classes' => ''],
                        ],
                    ],
                ],
            ];

            // Sync slides and layers idempotently
            $existingSlideIds = [];

            foreach ($slidesData as $slideInfo) {
                $layersData = $slideInfo['layers'];
                unset($slideInfo['layers']);

                $slide = HeroSlide::updateOrCreate(
                    [
                        'hero_slider_id' => $slider->id,
                        'name' => $slideInfo['name'],
                    ],
                    $slideInfo
                );

                $existingSlideIds[] = $slide->id;

                // Sync layers
                $existingLayerIds = [];
                foreach ($layersData as $layerInfo) {
                    $layer = HeroLayer::updateOrCreate(
                        [
                            'hero_slide_id' => $slide->id,
                            'name' => $layerInfo['name'],
                        ],
                        $layerInfo
                    );

                    $existingLayerIds[] = $layer->id;
                }

                // Clean up any extraneous layers for this slide
                HeroLayer::where('hero_slide_id', $slide->id)
                    ->whereNotIn('id', $existingLayerIds)
                    ->delete();
            }

            // Remove any outdated seeded slides for this slider
            HeroSlide::where('hero_slider_id', $slider->id)
                ->whereNotIn('id', $existingSlideIds)
                ->delete();
        });

        $this->command->info('Navanidhi Naturals Hero Slider and Media Campaign seeded successfully!');
    }
}
