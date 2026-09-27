@props([
    'variant'  => 'primary', // primary, secondary, outline, ghost, gold
    'size'     => 'md',      // sm, md, lg
    'type'     => 'button',
    'disabled' => false,
    'loading'  => false,
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-sans font-semibold tracking-wide transition-all duration-200 focus:outline-none disabled:opacity-50 disabled:cursor-not-allowed select-none';

    $sizeClasses = match ($size) {
        'sm' => 'px-3 py-1.5 text-xs rounded',
        'lg' => 'px-6 py-3.5 text-sm rounded-lg',
        default => 'px-4 py-2.5 text-xs rounded-md',
    };

    $variantClasses = match ($variant) {
        'secondary' => 'bg-[#7BA05B] text-white hover:bg-[#688a4c] active:bg-[#597641]',
        'outline'   => 'border border-[#0F4D2E] text-[#0F4D2E] bg-transparent hover:bg-[#0F4D2E] hover:text-white',
        'ghost'     => 'text-[#0F4D2E] bg-transparent hover:bg-[#0F4D2E]/10',
        'gold'      => 'bg-[#D4B381] text-[#0F4D2E] font-bold hover:bg-[#BFA06E]',
        default     => 'bg-[#0F4D2E] text-white hover:bg-[#0A3520] active:bg-[#072416] shadow-sm',
    };
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => "{$baseClasses} {$sizeClasses} {$variantClasses}"]) }}
    {{ $disabled || $loading ? 'disabled' : '' }}
>
    @if ($loading)
        <span class="inline-block w-4 h-4 mr-2 border-2 border-current border-t-transparent rounded-full animate-spin"></span>
    @endif

    {{ $slot }}
</button>
