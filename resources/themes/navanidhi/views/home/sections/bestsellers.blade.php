@props([
    'products' => collect(),
])

@if ($products->count())
    <!-- SECTION: BESTSELLERS / MOST LOVED STRIP -->
    <section class="py-20 lg:py-28 bg-transparent border-b border-white/10 relative overflow-hidden text-white" aria-labelledby="bestsellers-heading">
        <div class="absolute -top-32 -left-32 w-80 h-80 rounded-full bg-emerald-500/10 blur-3xl pointer-events-none"></div>

        <div class="site-container relative z-10">
            <div class="mx-auto max-w-3xl text-center space-y-4 mb-14">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-[#D4A359]/20 border border-[#D4A359]/30 text-[#E6C687] nv-pulse-glow">
                    <svg class="w-4 h-4 text-[#E6C687]" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    Community Bestsellers
                </span>
                <h2 id="bestsellers-heading" class="font-serif text-3xl sm:text-4xl lg:text-5xl font-black uppercase tracking-tight text-white leading-tight">
                    Most Loved Spices &amp; Botanical Essentials
                </h2>
                <p class="text-xs sm:text-sm text-emerald-100/80 max-w-lg mx-auto leading-relaxed font-normal">
                    The pure stone-ground spices, single-origin botanical powders, and functional blends our community reaches for every single day.
                </p>
            </div>

            <div class="nv-grid-4 nv-glass-product-showcase">
                @foreach ($products as $product)
                    <x-shop::products.card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>
@endif
