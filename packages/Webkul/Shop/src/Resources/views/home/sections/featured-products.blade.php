@props([
    'products' => collect(),
])

@if ($products->count())
    <!-- SECTION: FEATURED PRODUCTS CATALOG -->
    <section id="collections" class="py-20 lg:py-28 bg-transparent border-b border-white/10 relative text-white" aria-labelledby="featured-heading">
        {{-- Radiant Ambient Glows --}}
        <div class="absolute -top-32 right-1/4 w-[450px] h-[450px] bg-emerald-500/10 rounded-full blur-[140px] pointer-events-none"></div>
        <div class="absolute bottom-10 left-10 w-[400px] h-[400px] bg-[#D4A359]/10 rounded-full blur-[130px] pointer-events-none"></div>

        <div class="site-container relative z-10">
            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-14">
                <div class="space-y-3 max-w-2xl">
                    <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-500/15 border border-emerald-400/30 text-emerald-300 nv-pulse-glow">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                        Signature Collection
                    </span>
                    <h2 id="featured-heading" class="font-serif text-3xl sm:text-4xl lg:text-5xl font-black uppercase tracking-tight text-white leading-tight">
                        Signature Formulations &amp; Pure Spices
                    </h2>
                    <p class="text-xs sm:text-sm text-emerald-100/80 leading-relaxed font-normal">
                        Explore our premier selection of stone-ground farm spices and cold-dehydrated botanical powders by MAN AGRO FOODS. Pure, potent, and 100% adulterant-free.
                    </p>
                </div>

                <a
                    href="{{ route('shop.product_or_category.index', 'products') }}"
                    class="nv-glass-btn-outline self-start md:self-auto text-xs font-bold uppercase tracking-wider px-6 py-3.5 inline-flex items-center gap-2 group"
                >
                    <span>View Entire Collection</span>
                    <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Botanical Product Showcase in Frosted Glass Cards -->
            <div class="nv-grid-4 nv-glass-product-showcase">
                @foreach ($products as $product)
                    <x-shop::products.card :product="$product" />
                @endforeach
            </div>
        </div>

        <style>
            .nv-glass-product-showcase .nv-card,
            .nv-glass-product-showcase .nv-product-card {
                background: rgba(4, 26, 14, 0.75) !important;
                backdrop-filter: blur(20px) !important;
                -webkit-backdrop-filter: blur(20px) !important;
                border: 1px solid rgba(255, 255, 255, 0.18) !important;
                border-radius: 28px !important;
                box-shadow: 0 20px 48px -12px rgba(0, 0, 0, 0.5) !important;
                overflow: hidden !important;
            }
            .nv-glass-product-showcase .nv-product-card:hover {
                background: rgba(4, 26, 14, 0.88) !important;
                border-color: rgba(52, 211, 153, 0.45) !important;
                transform: translateY(-6px) !important;
                box-shadow: 0 26px 56px -10px rgba(0, 0, 0, 0.65), 0 0 25px rgba(34, 197, 94, 0.2) !important;
            }
            .nv-glass-product-showcase .nv-product-card > div {
                background: transparent !important;
            }
            .nv-glass-product-showcase .nv-card-title,
            .nv-glass-product-showcase .nv-card-title a,
            .nv-glass-product-showcase h3,
            .nv-glass-product-showcase h3 a {
                color: #FFFFFF !important;
            }
            .nv-glass-product-showcase .nv-product-card:hover .nv-card-title a {
                color: #34D399 !important;
            }
            .nv-glass-product-showcase .nv-price,
            .nv-glass-product-showcase [class*="price"] {
                color: #E6C687 !important;
            }
            .nv-glass-product-showcase p,
            .nv-glass-product-showcase span:not([class*="badge"]):not([class*="dot"]):not([class*="weight"]):not([class*="pill"]) {
                color: rgba(236, 253, 245, 0.85);
            }
            .nv-glass-product-showcase .nv-btn-cart {
                background: linear-gradient(135deg, #15803d 0%, #0d5c3a 100%) !important;
                color: #FFFFFF !important;
                border: 1px solid rgba(110, 231, 183, 0.3) !important;
                box-shadow: 0 4px 14px rgba(21, 128, 61, 0.3) !important;
            }
            .nv-glass-product-showcase .nv-btn-cart:hover {
                background: linear-gradient(135deg, #16a34a 0%, #15803d 100%) !important;
                box-shadow: 0 6px 20px rgba(22, 163, 74, 0.45) !important;
            }
        </style>
    </section>
@endif
