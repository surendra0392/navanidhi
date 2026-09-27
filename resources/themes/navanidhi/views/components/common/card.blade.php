@props([
    'padding' => 'normal', // none, sm, normal, lg
    'hover'   => true,
])

@php
    $paddingClasses = match ($padding) {
        'none'   => 'p-0',
        'sm'     => 'p-3 sm:p-4',
        'lg'     => 'p-6 sm:p-8',
        default  => 'p-4 sm:p-6',
    };

    $hoverClasses = $hover
        ? 'transition-all duration-300 hover:shadow-[0_12px_32px_-6px_rgba(15,77,46,0.12)] hover:-translate-y-0.5'
        : '';
@endphp

<div {{ $attributes->merge(['class' => "bg-white rounded-xl border border-[#DCD3C3] shadow-[0_2px_12px_-2px_rgba(15,77,46,0.06)] {$paddingClasses} {$hoverClasses}"]) }}>
    {{ $slot }}
</div>
