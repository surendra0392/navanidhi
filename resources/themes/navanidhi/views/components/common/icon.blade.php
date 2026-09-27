@props([
    'name',
    'size'  => 'md', // sm, md, lg, xl
    'class' => '',
])

@php
    $sizeClasses = match ($size) {
        'sm' => 'text-base',
        'lg' => 'text-2xl',
        'xl' => 'text-3xl',
        default => 'text-xl',
    };
@endphp

<span 
    {{ $attributes->merge(['class' => "material-symbols-outlined select-none inline-flex items-center justify-center leading-none {$sizeClasses} {$class}"]) }}
    aria-hidden="true"
>
    {{ $name }}
</span>
