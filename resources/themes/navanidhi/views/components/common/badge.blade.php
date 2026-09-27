@props([
    'variant' => 'primary', // primary, gold, leaf, neutral, veg
    'size'    => 'sm',
])

@php
    $baseClasses = 'inline-flex items-center gap-1 font-sans font-semibold uppercase tracking-wider select-none';

    $sizeClasses = match ($size) {
        'xs' => 'px-1.5 py-0.5 text-[9px] rounded',
        'md' => 'px-2.5 py-1 text-xs rounded-md',
        default => 'px-2 py-0.5 text-[10px] rounded',
    };

    $variantClasses = match ($variant) {
        'gold'    => 'bg-[#D4B381]/20 text-[#8B6F45] border border-[#D4B381]/40',
        'leaf'    => 'bg-[#7BA05B]/20 text-[#0F4D2E] border border-[#7BA05B]/40',
        'neutral' => 'bg-[#EADFCF] text-[#111111] border border-[#DCD3C3]',
        'veg'     => 'bg-green-50 text-green-800 border border-green-300',
        default   => 'bg-[#0F4D2E] text-white',
    };
@endphp

<span {{ $attributes->merge(['class' => "{$baseClasses} {$sizeClasses} {$variantClasses}"]) }}>
    {{ $slot }}
</span>
