@props([
    'sizes'    => ['100g', '250g', '500g'],
    'selected' => '100g',
])

<div {{ $attributes->merge(['class' => 'flex items-center gap-1.5 flex-wrap']) }} role="radiogroup" aria-label="Pack Size Selector">
    @foreach ($sizes as $size)
        @php
            $isSelected = $size === $selected;
        @endphp

        <button
            type="button"
            role="radio"
            aria-checked="{{ $isSelected ? 'true' : 'false' }}"
            class="px-2.5 py-1 text-[11px] font-semibold rounded-md border transition-all {{ $isSelected ? 'bg-[#0F4D2E] text-white border-[#0F4D2E] shadow-sm' : 'bg-white text-[#111111] border-[#DCD3C3] hover:border-[#0F4D2E]' }}"
        >
            {{ $size }}
        </button>
    @endforeach
</div>
