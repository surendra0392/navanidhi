@props([
    'categories' => collect(),
])

@php
    // Signature Indian Harvest & Botanical Photo mapping for Featured Benchmark Categories
    $chilliId = \Illuminate\Support\Facades\DB::table('products')->where('sku', 'navanidhi-red-chilli-powder')->value('id') ?? '3542';
    $moringaId = \Illuminate\Support\Facades\DB::table('products')->where('sku', 'navanidhi-moringa-powder')->value('id') ?? '3538';
    $immunityId = \Illuminate\Support\Facades\DB::table('products')->where('sku', 'navanidhi-golden-immunity')->value('id') ?? '3544';
    $curryId = \Illuminate\Support\Facades\DB::table('products')->where('sku', 'navanidhi-curry-leaf-powder')->value('id') ?? '3546';
    $beautyId = \Illuminate\Support\Facades\DB::table('products')->where('sku', 'navanidhi-beauty-bloom')->value('id') ?? '3545';
    $turmericId = \Illuminate\Support\Facades\DB::table('products')->where('sku', 'navanidhi-turmeric-powder')->value('id') ?? '3541';

    $featuredCards = [
        [
            'slug'        => 'spices',
            'title'       => 'Farm-Direct Spices',
            'eyebrow'     => 'Organically Sourced',
            'desc'        => 'Sun-dried Guntur chillies and single-estate spices stone-milled without Sudan dyes, lead chromate, or polishing oils.',
            'image'       => "/storage/products/{$chilliId}/navanidhi-red-chilli-powder.jpg",
            'icon'        => 'eco',
            'badge_color' => 'bg-emerald-600',
            'action'      => 'Explore Spices',
            'url'         => url('/spices'),
        ],
        [
            'slug'        => 'botanical-powders',
            'title'       => 'Cold-Milled Botanicals',
            'eyebrow'     => 'Living Whole Foods',
            'desc'        => 'Living whole food nutrition cold-dehydrated below 42°C to safeguard vital cellular enzymes, chlorophyll, and pure aroma.',
            'image'       => "/storage/products/{$moringaId}/navanidhi-moringa-powder.jpg",
            'icon'        => 'bolt',
            'badge_color' => 'bg-emerald-700',
            'action'      => 'Explore Botanicals',
            'url'         => url('/botanical-powders'),
        ],
        [
            'slug'        => 'functional-blends',
            'title'       => 'Essential Wellness Blends',
            'eyebrow'     => 'Ayurvedic Formulations',
            'desc'        => 'Synergistic Ayurvedic botanical elixirs crafted for daily immune resilience, vitality, and cellular rejuvenation.',
            'image'       => "/storage/products/{$immunityId}/navanidhi-golden-immunity.jpg",
            'icon'        => 'favorite',
            'badge_color' => 'bg-[#D4A359]',
            'action'      => 'Explore Blends',
            'url'         => url('/functional-blends'),
        ],
    ];

    $secondaryCategories = [
        ['name' => 'Culinary Ingredients', 'url' => url('/culinary-ingredients'), 'icon' => 'soup_kitchen'],
        ['name' => 'Wellness Essentials',  'url' => url('/wellness-essentials'),  'icon' => 'spa'],
        ['name' => 'All Products',         'url' => url('/products'),             'icon' => 'all_inclusive'],
    ];
@endphp

<!-- SECTION 2: AXOLYT-BENCHMARKED 3-CARD LUXURY BOTANICAL & SPICE CATEGORIES -->
<section 
    id="categories" 
    class="py-16 sm:py-20 lg:py-28 relative overflow-hidden border-b border-white/10 text-white" 
    aria-labelledby="categories-heading"
    style="background: transparent !important;"
>
    {{-- Ambient Radiant Spheres (No Dotted Grid!) --}}
    <div class="absolute -top-40 right-1/4 w-[450px] h-[450px] bg-emerald-500/12 rounded-full blur-[140px] pointer-events-none"></div>
    <div class="absolute bottom-10 left-10 w-[400px] h-[400px] bg-[#D4A359]/12 rounded-full blur-[130px] pointer-events-none"></div>

    <div class="site-container relative z-10">
        {{-- Section Header --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 sm:mb-16">
            <div class="space-y-3.5 max-w-2xl">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-500/15 border border-emerald-400/30 text-emerald-300 nv-pulse-glow">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                    Farm Spices & Living Botanicals
                </span>
                <h2 id="categories-heading" class="font-serif text-3xl sm:text-4xl lg:text-5xl font-black uppercase tracking-tight text-white leading-tight">
                    Explore Our Collections
                </h2>
                <p class="text-xs sm:text-sm lg:text-[15px] text-emerald-100/80 leading-relaxed font-normal">
                    Discover authentic unadulterated Indian farm spices, single-origin botanical powders, and restorative functional food blends by MAN Agro Foods.
                </p>
            </div>

            <a
                href="{{ url('/products') }}"
                class="nv-glass-btn-outline self-start md:self-auto text-xs font-bold uppercase tracking-wider px-6 py-3.5 inline-flex items-center gap-2 group"
            >
                <span>View All Collections</span>
                <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>

        {{-- 3-Column Luxury Frosted Glass Cards (Exact Layout of Image 2 Benchmark) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
            @foreach ($featuredCards as $card)
                <a
                    href="{{ $card['url'] }}"
                    class="group nv-glass-card relative flex flex-col items-center text-center p-8 sm:p-10 overflow-hidden text-decoration-none rounded-[28px] border border-white/15 bg-white/[0.06] backdrop-blur-xl hover:border-emerald-400/40 hover:bg-white/[0.1] hover:-translate-y-2 transition-all duration-500 shadow-[0_20px_50px_rgba(0,0,0,0.5)]"
                >
                    {{-- Top Accent Glow on Hover --}}
                    <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-transparent via-emerald-400 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    {{-- Circular Botanical/Spice Photo Badge with Floating Mini Tag (Image 2 Anatomy) --}}
                    <div class="relative mb-8">
                        <div class="w-32 h-32 sm:w-36 sm:h-36 rounded-full overflow-hidden border-2 border-white/20 shadow-[0_12px_32px_rgba(0,0,0,0.5)] bg-[#072a17] group-hover:scale-105 group-hover:border-emerald-400/60 group-hover:shadow-[0_0_35px_rgba(34,197,94,0.35)] transition-all duration-500">
                            <img
                                src="{{ $card['image'] }}"
                                alt="{{ $card['title'] }}"
                                class="w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-110"
                                loading="lazy"
                                onerror="this.onerror=null; this.src='/storage/products/41/navanidhi-moringa-powder.jpg';"
                            />
                        </div>

                        {{-- Floating Icon Tag at Bottom Edge of Circle --}}
                        <div class="absolute bottom-0 right-1 w-9 h-9 rounded-full {{ $card['badge_color'] }} border-2 border-[#041a0e] shadow-lg flex items-center justify-center text-white group-hover:scale-110 transition-transform duration-300">
                            <span class="material-symbols-outlined text-lg">{{ $card['icon'] }}</span>
                        </div>
                    </div>

                    {{-- Category Title (Uppercase Display Font) --}}
                    <h3 class="font-serif text-lg sm:text-xl font-bold uppercase tracking-tight text-white group-hover:text-emerald-300 transition-colors mb-2.5">
                        {{ $card['title'] }}
                    </h3>

                    {{-- 2-Line Value Proposition Description --}}
                    <p class="text-xs sm:text-[13px] text-emerald-100/75 leading-relaxed font-normal mb-6 flex-1 max-w-xs">
                        {{ $card['desc'] }}
                    </p>

                    {{-- Learn More / Action Link with Arrow --}}
                    <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-[#D4A359] group-hover:text-emerald-300 transition-colors pt-2 border-t border-white/10 w-full justify-center">
                        <span>{{ $card['action'] }}</span>
                        <svg class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </div>
                </a>
            @endforeach
        </div>

        {{-- Secondary Quick-Discovery Category Navigation Ribbon --}}
        <div class="mt-10 sm:mt-12 flex flex-wrap items-center justify-center gap-3">
            <span class="text-xs font-bold uppercase tracking-wider text-emerald-300/70 mr-2">More Harvests:</span>
            @foreach ($secondaryCategories as $secCat)
                <a 
                    href="{{ $secCat['url'] }}"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/[0.05] hover:bg-white/[0.12] border border-white/15 hover:border-emerald-400/40 text-xs font-semibold text-white/90 hover:text-white transition-all duration-200"
                >
                    <span class="material-symbols-outlined text-sm text-emerald-400">{{ $secCat['icon'] }}</span>
                    <span>{{ $secCat['name'] }}</span>
                    <span class="text-[10px] text-emerald-300">&rarr;</span>
                </a>
            @endforeach
        </div>

    </div>
</section>
