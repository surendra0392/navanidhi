@props([
    'type' => 'info', // info, success, warning, error
])

@php
    $typeClasses = match ($type) {
        'success' => 'bg-green-50 text-green-900 border-green-200',
        'warning' => 'bg-amber-50 text-amber-900 border-amber-200',
        'error'   => 'bg-red-50 text-red-900 border-red-200',
        default   => 'bg-[#EADFCF]/50 text-[#0F4D2E] border-[#DCD3C3]',
    };

    $iconName = match ($type) {
        'success' => 'check_circle',
        'warning' => 'warning',
        'error'   => 'error',
        default   => 'info',
    };
@endphp

<div {{ $attributes->merge(['class' => "flex items-start gap-3 p-4 rounded-xl border text-xs leading-relaxed {$typeClasses}"]) }} role="alert">
    <span class="material-symbols-outlined text-lg shrink-0 mt-0.5" aria-hidden="true">
        {{ $iconName }}
    </span>
    <div class="flex-1">
        {{ $slot }}
    </div>
</div>
