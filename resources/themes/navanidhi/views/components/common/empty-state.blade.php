@props([
    'icon'        => 'inventory_2',
    'title'       => 'No items found',
    'description' => 'There are no items matching your criteria at this moment.',
])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center text-center p-8 sm:p-12 rounded-2xl bg-white border border-[#DCD3C3] max-w-lg mx-auto']) }}>
    <div class="w-16 h-16 rounded-full bg-[#EADFCF] flex items-center justify-center text-[#0F4D2E] mb-4">
        <span class="material-symbols-outlined text-3xl">{{ $icon }}</span>
    </div>

    <h3 class="font-serif text-lg font-bold text-[#0F4D2E] mb-1.5">
        {{ $title }}
    </h3>

    <p class="text-xs text-[#666666] leading-relaxed mb-6 max-w-xs">
        {{ $description }}
    </p>

    @if ($slot->isNotEmpty())
        <div>
            {{ $slot }}
        </div>
    @endif
</div>
