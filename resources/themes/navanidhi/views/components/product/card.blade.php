@props([
    'product',
])

@php
    $typeInstance = $product->getTypeInstance();
    $baseImage = product_image()->getProductBaseImage($product);
    $price = $typeInstance->getMinimalPrice() ?? $product->price;
    $cost = $product->cost;
    $hasDiscount = $cost && $cost > $price;
    $discountPercent = $hasDiscount ? round((($cost - $price) / $cost) * 100) : 0;
    $productUrl = route('shop.product_or_category.index', $product->url_key);
@endphp

<article {{ $attributes->merge(['class' => 'nv-card nv-product-card group relative flex flex-col justify-between overflow-hidden bg-white rounded-2xl border border-[#ECE8E1] transition-all duration-300 hover:border-[#0D5C3A]/25 hover:shadow-[0_16px_36px_-8px_rgba(13,92,58,0.14)] hover:-translate-y-1.5 !p-0']) }}>
    
    <!-- Top Image Container with 1:1 Aspect Ratio (Full-Bleed, Zero Margins/Borders) -->
    <div class="relative w-full aspect-square overflow-hidden bg-[#F7F5F0]">
        <!-- Floating Badges Top-Left -->
        <div class="absolute top-3 left-3 z-10 flex flex-col gap-1 items-start pointer-events-none">
            @if ($hasDiscount)
                <span class="nv-badge-sale">
                    -{{ $discountPercent }}%
                </span>
            @elseif ($product->new)
                <span class="nv-badge-new">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#0D5C3A]"></span>
                    Fresh
                </span>
            @endif
        </div>

        <!-- 100% Vegetarian Green Dot Symbol Top-Right -->
        <div class="nv-veg-badge" title="100% Pure Plant Vegetarian">
            <span class="nv-veg-dot"></span>
        </div>

        <!-- Product Image Link -->
        <a href="{{ $productUrl }}" class="block w-full h-full" aria-label="{{ $product->name }}">
            <img
                src="{{ $baseImage['medium_image_url'] ?? bagisto_asset('images/medium-product-placeholder.webp') }}"
                alt="{{ $product->name }}"
                loading="lazy"
                class="w-full h-full object-cover object-center transition-transform duration-700 ease-out group-hover:scale-105"
            />
        </a>
    </div>

    <!-- Product Meta & Info Body -->
    <div class="p-5 flex flex-col flex-1 justify-between bg-white">
        <div>
            <!-- Eyebrow: Brand & Weight -->
            <div class="flex items-center justify-between gap-1.5 mb-2">
                <span class="text-[9.5px] font-semibold uppercase tracking-[0.04em] text-[#8C7658] shrink-0">
                    Botanical Powders
                </span>
                @if ($product->weight)
                    <span class="text-[10px] font-medium text-[#78716C] shrink-0 text-right">
                        {{ $product->weight }}g Net Wt
                    </span>
                @endif
            </div>

            <!-- Product Title -->
            <h3 class="nv-card-title text-[16px] font-bold text-[#111827] group-hover:text-[#0D5C3A] transition-colors leading-[1.35] min-h-[44px] line-clamp-2">
                <a href="{{ $productUrl }}">
                    {{ $product->name }}
                </a>
            </h3>

            <!-- Price Row -->
            <div class="flex items-baseline gap-2 mt-2.5">
                <span class="text-[19px] sm:text-[20px] font-bold text-[#111827] tracking-tight">
                    ₹{{ number_format((float) $price, 2) }}
                </span>
                @if ($hasDiscount)
                    <span class="text-[13px] text-[#9CA3AF] line-through font-normal">
                        ₹{{ number_format((float) $cost, 2) }}
                    </span>
                    <span class="nv-discount-pill">
                        Save {{ $discountPercent }}%
                    </span>
                @endif
            </div>
        </div>

        <!-- Action Button Area with Hairline Divider -->
        <div class="mt-4 pt-3.5 border-t border-[#F0ECE4]">
            <a
                href="{{ $productUrl }}"
                class="nv-btn-cart text-decoration-none"
                aria-label="Select {{ $product->name }}"
            >
                <svg class="w-4 h-4 text-white shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/>
                    <line x1="3" y1="6" x2="21" y2="6"/>
                    <path d="M16 10a4 4 0 0 1-8 0"/>
                </svg>
                <span>Select Pack</span>
            </a>
        </div>
    </div>
</article>
