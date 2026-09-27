@props([
    'product',
    'price' => null,
    'mrp'   => null,
])

@php
    $sellingPrice = $price ?? (isset($product) ? ($product->getTypeInstance()->getMinimalPrice() ?? $product->price) : 0);
    $strikeMrp = $mrp ?? (isset($product) && $product->cost ? $product->cost : null);
    $hasDiscount = $strikeMrp && $strikeMrp > $sellingPrice;
    $discountPercent = $hasDiscount ? round((($strikeMrp - $sellingPrice) / $strikeMrp) * 100) : 0;
@endphp

<div {{ $attributes->merge(['class' => 'flex items-baseline gap-2 flex-wrap font-sans']) }}>
    <!-- Current Effective Selling Price -->
    <span class="text-base font-bold text-[#0F4D2E]">
        ₹{{ number_format((float) $sellingPrice, 2) }}
    </span>

    <!-- Strike-Through MRP -->
    @if ($hasDiscount)
        <span class="text-xs text-[#666666]/80 line-through">
            ₹{{ number_format((float) $strikeMrp, 2) }}
        </span>

        <!-- Discount Badge -->
        <span class="text-[10px] font-bold text-green-700 bg-green-50 px-1.5 py-0.5 rounded border border-green-200">
            {{ $discountPercent }}% OFF
        </span>
    @endif
</div>
