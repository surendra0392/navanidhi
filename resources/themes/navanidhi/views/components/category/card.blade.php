@props([
    'category',
    'image' => null,
])

@php
    $categoryUrl = route('shop.product_or_category.index', $category->slug);
    $categoryImage = $image ?? ($category->banner_path ? \Illuminate\Support\Facades\Storage::url($category->banner_path) : null);
@endphp

<a
    href="{{ $categoryUrl }}"
    {{ $attributes->merge(['class' => 'group relative flex flex-col items-center text-center p-5 rounded-2xl bg-white border border-[#DCD3C3] shadow-[0_2px_12px_-2px_rgba(15,77,46,0.06)] overflow-hidden transition-all duration-300 hover:shadow-[0_12px_32px_-6px_rgba(15,77,46,0.12)] hover:-translate-y-1']) }}
>
    <!-- Circular Icon / Image Container -->
    <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-[#F7F5EE] border-2 border-[#DCD3C3] overflow-hidden mb-3.5 flex items-center justify-center transition-transform duration-300 group-hover:scale-105 group-hover:border-[#0F4D2E]">
        @if ($categoryImage)
            <img
                src="{{ $categoryImage }}"
                alt="{{ $category->name }}"
                loading="lazy"
                class="w-full h-full object-cover"
            />
        @else
            <span class="material-symbols-outlined text-4xl text-[#0F4D2E]">spa</span>
        @endif
    </div>

    <!-- Category Title -->
    <h3 class="font-serif text-sm sm:text-base font-bold text-[#111111] group-hover:text-[#0F4D2E] transition-colors mb-1">
        {{ $category->name }}
    </h3>

    <!-- Subtext -->
    <span class="text-[11px] font-semibold uppercase tracking-wider text-[#8B6F45]">
        Explore Powders &rarr;
    </span>
</a>
