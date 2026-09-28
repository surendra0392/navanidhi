@inject('themeCustomizationRepo', 'Webkul\Theme\Repositories\ThemeCustomizationRepository')

@php
    $channel = core()->getCurrentChannel();

    // Connect to Admin Theme Customizations (image_carousel)
    $sliderCustomization = $themeCustomizationRepo->findOneWhere([
        'type'       => 'image_carousel',
        'status'     => 1,
        'channel_id' => $channel->id,
        'theme_code' => $channel->theme,
    ]) ?? $themeCustomizationRepo->findOneWhere([
        'type'       => 'image_carousel',
        'status'     => 1,
        'channel_id' => $channel->id,
    ]) ?? $themeCustomizationRepo->findOneWhere([
        'type'   => 'image_carousel',
        'status' => 1,
    ]);

    $adminImages = [];
    if ($sliderCustomization && ! empty($sliderCustomization->options['images'])) {
        $adminImages = $sliderCustomization->options['images'];
    }

    // 3 Benchmark Luxury Slides with full Axolyt aesthetic parity
    $defaultSlides = [
        [
            'eyebrow'          => 'MAN AGRO FOODS • 100% FARM PURE • ZERO DYES',
            'title_line1'      => 'NATURE.',
            'title_line2'      => 'PURITY.',
            'title_grad'       => 'ELEVATED.',
            'desc'             => 'Authentic single-origin Indian spices and living botanical whole foods crafted by <strong class="text-white font-semibold">MAN AGRO FOODS</strong>. Sun-cured, stone-milled under 42°C, and strictly free from chemical food dyes, sawdust fillers, and artificial additives.',
            'badge1_icon'      => 'eco',
            'badge1_title'     => '100% Farm Pure',
            'badge1_sub'       => 'Zero Adulteration',
            'badge2_icon'      => 'ac_unit',
            'badge2_title'     => 'Milled < 42°C',
            'badge2_sub'       => 'Living Enzymes',
            'badge3_icon'      => 'shield_check',
            'badge3_title'     => 'No Dyes Ever',
            'badge3_sub'       => 'Sudan Dye Free',
            'cta_primary_text' => 'Shop Pure Spices',
            'cta_primary_url'  => url('/spices'),
            'cta_sec_text'     => 'All Products',
            'cta_sec_url'      => url('/products'),
            'image'            => asset('images/backgrounds/navanidhi_hero_product.jpg'),
            'fallback_image'   => asset('images/products/navanidhi-red-chilli-powder.jpg'),
            'image_alt'        => 'Navanidhi Pure Sun-Dried Farm Red Chilli Powder in Traditional Ceramic Bowl',
            'tag_origin'       => 'Single-Origin Farm',
            'tag_rating'       => '★ 4.9',
            'tag_cert'         => 'NABL',
            'pill_title'       => 'Guntur Sannam Red Chilli',
            'pill_sub'         => 'Sun-Dried • Zero Sudan Dyes',
            'pill_badge'       => '100% Pure',
            'pill_badge_bg'    => 'bg-emerald-600',
        ],
        [
            'eyebrow'          => 'MAN AGRO FOODS • 7-9% HIGH CURCUMIN • MEGHALAYA DIRECT',
            'title_line1'      => 'GOLDEN.',
            'title_line2'      => 'HEALING.',
            'title_grad'       => 'HARVEST.',
            'desc'             => 'Pure Lakadong Turmeric organically nurtured in the mineral-rich soils of the Jaintia Hills, Meghalaya. Stone-milled raw without polish oils or synthetic colorants to preserve unmatched bioactive potency.',
            'badge1_icon'      => 'verified',
            'badge1_title'     => '7-9% Curcumin',
            'badge1_sub'       => 'Highest Potency',
            'badge2_icon'      => 'solar_power',
            'badge2_title'     => 'Sun-Cured Roots',
            'badge2_sub'       => 'Zero Lead Chromate',
            'badge3_icon'      => 'science',
            'badge3_title'     => 'Lab Certified',
            'badge3_sub'       => 'NABL Tested',
            'cta_primary_text' => 'Explore Turmeric',
            'cta_primary_url'  => url('/products'),
            'cta_sec_text'     => 'All Formulations',
            'cta_sec_url'      => url('/products'),
            'image'            => asset('images/products/navanidhi-turmeric-powder.jpg'),
            'fallback_image'   => asset('images/products/navanidhi-turmeric-powder.jpg'),
            'image_alt'        => 'Navanidhi Authentic High-Curcumin Lakadong Turmeric Powder',
            'tag_origin'       => 'Pristine Meghalaya',
            'tag_rating'       => '★ 4.9',
            'tag_cert'         => 'NABL',
            'pill_title'       => 'Lakadong Turmeric Powder',
            'pill_sub'         => '7-9% Natural Curcumin • Sun-Cured',
            'pill_badge'       => 'High Potency',
            'pill_badge_bg'    => 'bg-[#D4A359]',
        ],
        [
            'eyebrow'          => 'MAN AGRO FOODS • RAW SUPERGREENS • DEHYDRATED < 42°C',
            'title_line1'      => 'LIVING.',
            'title_line2'      => 'BOTANICAL.',
            'title_grad'       => 'VITALITY.',
            'desc'             => 'Pure cold-milled Moringa Oleifera and single-origin green superfoods. Gently shade-dried and micro-milled below 42°C to safeguard vital chlorophyll, active digestive enzymes, and living plant micronutrients.',
            'badge1_icon'      => 'spa',
            'badge1_title'     => 'Cold-Dehydrated',
            'badge1_sub'       => '< 42°C Living Enzymes',
            'badge2_icon'      => 'energy_savings_leaf',
            'badge2_title'     => 'Shade-Dried',
            'badge2_sub'       => 'Pure Chlorophyll',
            'badge3_icon'      => 'all_inclusive',
            'badge3_title'     => 'Zero Additives',
            'badge3_sub'       => '100% Whole Food',
            'cta_primary_text' => 'Discover Botanicals',
            'cta_primary_url'  => url('/botanical-powders'),
            'cta_sec_text'     => 'All Products',
            'cta_sec_url'      => url('/products'),
            'image'            => asset('images/products/navanidhi-moringa-powder.jpg'),
            'fallback_image'   => asset('images/products/navanidhi-moringa-powder.jpg'),
            'image_alt'        => 'Navanidhi Cold-Milled Organic Moringa Leaf Powder',
            'tag_origin'       => '100% Whole Food',
            'tag_rating'       => '★ 4.9',
            'tag_cert'         => 'NABL',
            'pill_title'       => 'Organic Moringa Leaf Powder',
            'pill_sub'         => 'Cold-Dehydrated • 100% Raw Bioavailable',
            'pill_badge'       => 'Enzyme Active',
            'pill_badge_bg'    => 'bg-emerald-700',
        ],
    ];

    $slides = $defaultSlides;
    if (! empty($adminImages) && count($adminImages) > 0) {
        foreach ($adminImages as $i => $adm) {
            if (isset($slides[$i])) {
                if (! empty($adm['title'])) {
                    $slides[$i]['pill_title'] = $adm['title'];
                }
                if (! empty($adm['link'])) {
                    $slides[$i]['cta_primary_url'] = url($adm['link']);
                }
                if (! empty($adm['image'])) {
                    $img = $adm['image'];
                    $slides[$i]['image'] = str_starts_with($img, 'http') ? $img : (str_starts_with($img, 'images/') || str_starts_with($img, 'storage/') ? asset($img) : \Illuminate\Support\Facades\Storage::url($img));
                }
            } elseif (! empty($adm['image'])) {
                $img = $adm['image'];
                $slides[] = [
                    'eyebrow'          => 'MAN AGRO FOODS • AUTHENTIC SINGLE-ORIGIN',
                    'title_line1'      => strtoupper($adm['title'] ?? 'PURE.'),
                    'title_line2'      => 'HARVEST.',
                    'title_grad'       => 'ELEVATED.',
                    'desc'             => 'Authentic single-origin Indian spices and living botanical whole foods crafted by MAN AGRO FOODS.',
                    'badge1_icon'      => 'eco',
                    'badge1_title'     => '100% Farm Pure',
                    'badge1_sub'       => 'Zero Adulteration',
                    'badge2_icon'      => 'ac_unit',
                    'badge2_title'     => 'Milled < 42°C',
                    'badge2_sub'       => 'Living Enzymes',
                    'badge3_icon'      => 'shield_check',
                    'badge3_title'     => 'No Dyes Ever',
                    'badge3_sub'       => 'Sudan Dye Free',
                    'cta_primary_text' => 'Shop Collection',
                    'cta_primary_url'  => ! empty($adm['link']) ? url($adm['link']) : url('/products'),
                    'cta_sec_text'     => 'All Products',
                    'cta_sec_url'      => url('/products'),
                    'image'            => str_starts_with($img, 'http') ? $img : (str_starts_with($img, 'images/') || str_starts_with($img, 'storage/') ? asset($img) : \Illuminate\Support\Facades\Storage::url($img)),
                    'fallback_image'   => asset('images/backgrounds/navanidhi_hero_product.jpg'),
                    'image_alt'        => $adm['title'] ?? 'Navanidhi Farm Harvest',
                    'tag_origin'       => 'Single-Origin Farm',
                    'tag_rating'       => '★ 4.9',
                    'tag_cert'         => 'NABL',
                    'pill_title'       => $adm['title'] ?? 'Navanidhi Pure Product',
                    'pill_sub'         => '100% Natural • Farm Direct',
                    'pill_badge'       => '100% Pure',
                    'pill_badge_bg'    => 'bg-emerald-600',
                ];
            }
        }
    }
@endphp

<!-- SECTION 1: AXOLYT-BENCHMARKED LUXURY WATERFALL BOTANICAL HERO WITH ADMIN-CONNECTED SLIDER -->
<section 
    id="hero-stage"
    class="relative w-full overflow-hidden min-h-[92vh] flex flex-col justify-center pb-14 sm:pb-20 text-white"
    aria-label="Navanidhi Naturals Hero Spotlight"
    style="margin-top: -93px; padding-top: 130px; background-color: transparent !important;"
>
    {{-- Subtle Top Vignette for Contrast under Header --}}
    <div style="position: absolute; top: 0; left: 0; right: 0; height: 180px; background: linear-gradient(to bottom, rgba(4, 26, 14, 0.65), transparent); pointer-events-none; z-index: 2;" aria-hidden="true"></div>
    <div style="position: absolute; top: 0; bottom: 0; left: 0; width: 45%; background: linear-gradient(to right, rgba(4, 26, 14, 0.45), transparent); pointer-events-none; z-index: 2;" aria-hidden="true"></div>

    {{-- Radiant Sunbeam & Botanical Atmosphere Glows --}}
    <div class="absolute top-1/4 left-1/3 w-[450px] h-[450px] bg-emerald-400/15 rounded-full blur-[130px] pointer-events-none" style="z-index: 2;" aria-hidden="true"></div>
    <div class="absolute top-1/3 right-1/4 w-[400px] h-[400px] bg-[#D4A359]/20 rounded-full blur-[140px] pointer-events-none" style="z-index: 2;" aria-hidden="true"></div>

    <div class="site-container relative w-full" style="z-index: 10;">
        {{-- Slides Container --}}
        <div id="navanidhi-hero-slider" class="relative w-full">
            @foreach ($slides as $idx => $slide)
                <div 
                    class="nv-hero-slide grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 xl:gap-16 items-center transition-all duration-700 ease-out {{ $idx === 0 ? 'opacity-100 relative z-10' : 'opacity-0 absolute inset-0 pointer-events-none -z-10' }}"
                    data-slide-index="{{ $idx }}"
                >
                    {{-- Left Column: Translucent Frosted Glass Card --}}
                    <div class="lg:col-span-7">
                        <div 
                            class="nv-glass-card p-6 sm:p-9 lg:p-12 space-y-6 sm:space-y-7 shadow-[0_30px_70px_rgba(0,0,0,0.65)]"
                            style="border-radius: 32px; background: rgba(4, 26, 14, 0.72) !important; backdrop-filter: blur(24px) !important; -webkit-backdrop-filter: blur(24px) !important; border: 1px solid rgba(255, 255, 255, 0.22) !important;"
                        >
                            {{-- Eyebrow Pill --}}
                            <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-emerald-500/20 border border-emerald-400/40 shadow-xs nv-pulse-glow">
                                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                                <span class="text-[11px] font-extrabold uppercase tracking-widest text-emerald-300">
                                    {!! $slide['eyebrow'] !!}
                                </span>
                            </div>

                            {{-- Commanding Display Headline --}}
                            <h1 class="font-serif text-3xl sm:text-5xl lg:text-[46px] xl:text-[54px] font-black uppercase tracking-tight text-white leading-[1.08]">
                                {{ $slide['title_line1'] }} <br>
                                {{ $slide['title_line2'] }} <br>
                                <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-[#E6C687] to-emerald-300">
                                    {{ $slide['title_grad'] }}
                                </span>
                            </h1>

                            {{-- Brand Description Narrative --}}
                            <p class="text-xs sm:text-sm lg:text-[15px] leading-relaxed text-emerald-100/90 max-w-xl font-normal">
                                {!! $slide['desc'] !!}
                            </p>

                            {{-- 3 Frosted Feature Badges in a Horizontal Row --}}
                            <div class="grid grid-cols-3 gap-2.5 sm:gap-4 pt-2">
                                <div class="flex flex-col items-center text-center p-3 sm:p-3.5 rounded-2xl bg-white/[0.06] border border-white/15 hover:border-emerald-400/50 transition-colors">
                                    <span class="material-symbols-outlined text-emerald-400 text-xl sm:text-2xl mb-1">{{ $slide['badge1_icon'] }}</span>
                                    <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-white">{{ $slide['badge1_title'] }}</span>
                                    <span class="text-[9px] text-emerald-200/70 hidden sm:inline">{{ $slide['badge1_sub'] }}</span>
                                </div>

                                <div class="flex flex-col items-center text-center p-3 sm:p-3.5 rounded-2xl bg-white/[0.06] border border-white/15 hover:border-emerald-400/50 transition-colors">
                                    <span class="material-symbols-outlined text-emerald-400 text-xl sm:text-2xl mb-1">{{ $slide['badge2_icon'] }}</span>
                                    <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-white">{{ $slide['badge2_title'] }}</span>
                                    <span class="text-[9px] text-emerald-200/70 hidden sm:inline">{{ $slide['badge2_sub'] }}</span>
                                </div>

                                <div class="flex flex-col items-center text-center p-3 sm:p-3.5 rounded-2xl bg-white/[0.06] border border-white/15 hover:border-emerald-400/50 transition-colors">
                                    <span class="material-symbols-outlined text-emerald-400 text-xl sm:text-2xl mb-1">{{ $slide['badge3_icon'] }}</span>
                                    <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-white">{{ $slide['badge3_title'] }}</span>
                                    <span class="text-[9px] text-emerald-200/70 hidden sm:inline">{{ $slide['badge3_sub'] }}</span>
                                </div>
                            </div>

                            {{-- Action CTA Buttons --}}
                            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3.5 pt-2">
                                <a 
                                    href="{{ $slide['cta_primary_url'] }}" 
                                    class="nv-glass-btn-primary px-8 py-3.5 sm:py-4 text-xs font-bold uppercase tracking-widest shadow-xl text-center group"
                                >
                                    <span>{{ $slide['cta_primary_text'] }}</span>
                                    <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                </a>

                                <a 
                                    href="{{ $slide['cta_sec_url'] }}" 
                                    class="nv-glass-btn-outline px-6 py-3.5 sm:py-4 text-xs font-bold uppercase tracking-widest text-center"
                                >
                                    <span>{{ $slide['cta_sec_text'] }}</span>
                                    <svg class="w-4 h-4 text-[#D4A359]" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd"/></svg>
                                </a>
                            </div>

                        </div>
                    </div>

                    {{-- Right Column: User's Real Authentic Farm Spice Showcase Stage --}}
                    <div class="lg:col-span-5 relative flex flex-col items-center justify-center">
                        <div class="relative w-full max-w-[440px] mx-auto">
                            
                            {{-- Ambient Back-Glow Behind Product Stage --}}
                            <div class="absolute -inset-6 bg-gradient-to-tr from-emerald-500/35 via-[#D4A359]/30 to-emerald-400/30 rounded-[40px] blur-2xl pointer-events-none"></div>

                            {{-- Visual Container with Translucent Frosted Glass Border --}}
                            <div 
                                class="relative w-full aspect-square group"
                                style="border-radius: 32px; overflow: hidden; border: 1.5px solid rgba(255, 255, 255, 0.28); background: rgba(4, 26, 14, 0.45); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); box-shadow: 0 30px 70px rgba(0,0,0,0.65), 0 0 35px rgba(34, 197, 94, 0.25);"
                            >
                                <img 
                                    src="{{ $slide['image'] }}" 
                                    alt="{{ $slide['image_alt'] }}" 
                                    class="w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-105"
                                    fetchpriority="{{ $idx === 0 ? 'high' : 'auto' }}"
                                    loading="{{ $idx === 0 ? 'eager' : 'lazy' }}"
                                    onerror="this.onerror=null; this.src='{{ $slide['fallback_image'] }}';"
                                />

                                {{-- Delicate Gradient Overlay --}}
                                <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(4, 26, 14, 0.9) 0%, transparent 45%, rgba(0, 0, 0, 0.25) 100%); pointer-events-none;"></div>
                                
                                {{-- Top-Left Floating Badge: Single-Origin --}}
                                <div style="position: absolute; top: 16px; left: 16px; z-index: 10; background: rgba(4, 26, 14, 0.88); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.25); border-radius: 12px; padding: 6px 12px; display: flex; align-items: center; gap: 6px; box-shadow: 0 4px 12px rgba(0,0,0,0.4);">
                                    <span class="material-symbols-outlined text-emerald-400 text-sm">verified</span>
                                    <span class="text-[10px] sm:text-[11px] font-bold text-white uppercase tracking-wider">{{ $slide['tag_origin'] }}</span>
                                </div>

                                {{-- Top-Right Floating Badge: Rating --}}
                                <div style="position: absolute; top: 16px; right: 16px; z-index: 10; background: rgba(4, 26, 14, 0.88); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.25); border-radius: 12px; padding: 6px 12px; display: flex; align-items: center; gap: 4px; box-shadow: 0 4px 12px rgba(0,0,0,0.4);" class="text-[#D4A359] text-xs font-bold">
                                    <span>{{ $slide['tag_rating'] }}</span>
                                    <span class="text-[10px] text-white/80 font-normal">{{ $slide['tag_cert'] }}</span>
                                </div>

                                {{-- Bottom Floating Product Pill Badge --}}
                                <div style="position: absolute; bottom: 16px; left: 16px; right: 16px; z-index: 10; background: rgba(4, 26, 14, 0.88); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); border: 1px solid rgba(255, 255, 255, 0.25); border-radius: 16px; padding: 10px 14px; display: flex; align-items: center; justify-content: space-between; gap: 8px; box-shadow: 0 8px 24px rgba(0,0,0,0.5);">
                                    <div class="min-w-0 flex-1">
                                        <p class="text-xs sm:text-[13px] font-bold text-white truncate">{{ $slide['pill_title'] }}</p>
                                        <p class="text-[10px] sm:text-[11px] text-emerald-200/85 font-medium truncate">{{ $slide['pill_sub'] }}</p>
                                    </div>
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-wider shrink-0 {{ $slide['pill_badge_bg'] }} text-white shadow-xs">
                                        {{ $slide['pill_badge'] }}
                                    </span>
                                </div>
                            </div>

                            {{-- Ultra-Sleek Segmented Line Bars Under The Image (One Bar Per Slide) --}}
                            @if (count($slides) > 1)
                                <style>.nv-slide-indicator:hover .nv-slide-bar { background: rgba(255,255,255,0.5) !important; }</style>
                                <div class="w-full mx-auto pt-4 relative z-20" style="max-width: 380px;">
                                    <div class="flex items-center" style="gap: 8px;">
                                        @foreach ($slides as $subIdx => $subSlide)
                                            <button 
                                                type="button"
                                                onclick="window.nvHeroGo && window.nvHeroGo({{ $subIdx }}, event)"
                                                class="nv-slide-indicator group flex-1 focus:outline-none cursor-pointer"
                                                style="padding: 10px 0; margin: -10px 0;"
                                                data-target-slide="{{ $subIdx }}"
                                                aria-label="Show Slide {{ $subIdx + 1 }}: {{ $subSlide['title_line1'] }}"
                                            >
                                                <span 
                                                    class="nv-slide-bar block w-full rounded-full"
                                                    style="height: 3px; transition: all 0.3s ease; {{ $subIdx === $idx ? 'background: linear-gradient(to right, #34d399, #E6C687, #6ee7b7); box-shadow: 0 0 10px rgba(52,211,153,0.95);' : 'background: rgba(255,255,255,0.2);' }}"
                                                ></span>
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Floating Trust Ribbon (Image 2 Axolyt Benchmark) --}}
        <div class="mt-8 sm:mt-12">
            <div class="nv-glass-ribbon px-5 sm:px-8 py-3.5 sm:py-4 max-w-5xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-4 items-center text-center" style="background: rgba(4, 26, 14, 0.75); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); border: 1px solid rgba(255, 255, 255, 0.22); border-radius: 9999px;">
                <div class="flex items-center justify-center gap-2.5">
                    <span class="material-symbols-outlined text-emerald-400 text-xl shrink-0">eco</span>
                    <span class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-white">Plant-Based Purity</span>
                </div>

                <div class="flex items-center justify-center gap-2.5">
                    <span class="material-symbols-outlined text-emerald-400 text-xl shrink-0">public</span>
                    <span class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-white">Sustainably Sourced</span>
                </div>

                <div class="flex items-center justify-center gap-2.5">
                    <span class="material-symbols-outlined text-emerald-400 text-xl shrink-0">ac_unit</span>
                    <span class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-white">Cold Milled &lt; 42&deg;C</span>
                </div>

                <div class="flex items-center justify-center gap-2.5">
                    <span class="material-symbols-outlined text-emerald-400 text-xl shrink-0">verified</span>
                    <span class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-white">NABL Lab Certified</span>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- Lightweight Slide Controller Script registered in scripts stack --}}
@push('scripts')
<script>
    (function initNavanidhiHeroSlider() {
        let currentIndex = 0;
        let timer = null;

        function getElements() {
            return {
                slides: document.querySelectorAll('.nv-hero-slide'),
                indicators: document.querySelectorAll('.nv-slide-indicator'),
                stage: document.getElementById('hero-stage')
            };
        }

        window.nvHeroShowSlide = function(index) {
            const { slides, indicators } = getElements();
            if (!slides.length) return;

            slides.forEach((slide, i) => {
                if (i === index) {
                    slide.classList.remove('opacity-0', 'absolute', 'inset-0', 'pointer-events-none', '-z-10');
                    slide.classList.add('opacity-100', 'relative', 'z-10');
                } else {
                    slide.classList.remove('opacity-100', 'relative', 'z-10');
                    slide.classList.add('opacity-0', 'absolute', 'inset-0', 'pointer-events-none', '-z-10');
                }
            });

            indicators.forEach((ind) => {
                const target = parseInt(ind.getAttribute('data-target-slide'), 10);
                const bar = ind.querySelector('.nv-slide-bar');
                if (bar) {
                    if (target === index) {
                        bar.style.background = 'linear-gradient(to right, #34d399, #E6C687, #6ee7b7)';
                        bar.style.boxShadow = '0 0 10px rgba(52,211,153,0.95)';
                        ind.setAttribute('aria-current', 'true');
                    } else {
                        bar.style.background = 'rgba(255,255,255,0.2)';
                        bar.style.boxShadow = 'none';
                        ind.removeAttribute('aria-current');
                    }
                }
            });

            currentIndex = index;
        };

        window.nvHeroNext = function(e) {
            if (e && e.preventDefault) e.preventDefault();
            const { slides } = getElements();
            if (!slides.length) return;
            window.nvHeroShowSlide((currentIndex + 1) % slides.length);
            startAutoplay();
        };

        window.nvHeroPrev = function(e) {
            if (e && e.preventDefault) e.preventDefault();
            const { slides } = getElements();
            if (!slides.length) return;
            window.nvHeroShowSlide((currentIndex - 1 + slides.length) % slides.length);
            startAutoplay();
        };

        window.nvHeroGo = function(idx, e) {
            if (e && e.preventDefault) e.preventDefault();
            window.nvHeroShowSlide(idx);
            startAutoplay();
        };

        function startAutoplay() {
            stopAutoplay();
            timer = setInterval(() => {
                const { slides } = getElements();
                if (slides.length > 1) {
                    window.nvHeroShowSlide((currentIndex + 1) % slides.length);
                }
            }, 7000);
        }

        function stopAutoplay() {
            if (timer) clearInterval(timer);
        }

        function setup() {
            const { stage } = getElements();
            if (stage) {
                stage.addEventListener('mouseenter', stopAutoplay);
                stage.addEventListener('mouseleave', startAutoplay);

                let touchStartX = 0;
                let touchEndX = 0;
                stage.addEventListener('touchstart', (e) => {
                    touchStartX = e.changedTouches[0].screenX;
                }, { passive: true });
                stage.addEventListener('touchend', (e) => {
                    touchEndX = e.changedTouches[0].screenX;
                    if (touchStartX - touchEndX > 50) {
                        window.nvHeroNext();
                    } else if (touchEndX - touchStartX > 50) {
                        window.nvHeroPrev();
                    }
                }, { passive: true });
            }
            startAutoplay();
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', setup);
        } else {
            setup();
        }
    })();
</script>
@endpush
