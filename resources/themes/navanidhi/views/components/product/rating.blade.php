@props([
    'rating' => 0,
    'count'  => 0,
])

@php
    $roundedRating = round($rating, 1);
@endphp

@if ($count > 0 || $rating > 0)
    <div {{ $attributes->merge(['class' => 'flex items-center gap-1.5 text-xs text-[#666666]']) }}>
        <div class="flex items-center text-[#D4B381]">
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= floor($roundedRating))
                    <span class="material-symbols-outlined text-sm leading-none" style="font-variation-settings: 'FILL' 1;">star</span>
                @elseif ($i - $roundedRating <= 0.5)
                    <span class="material-symbols-outlined text-sm leading-none" style="font-variation-settings: 'FILL' 1;">star_half</span>
                @else
                    <span class="material-symbols-outlined text-sm leading-none">star</span>
                @endif
            @endfor
        </div>

        <span class="font-semibold text-[#111111] text-[11px]">{{ number_format($roundedRating, 1) }}</span>

        @if ($count > 0)
            <span class="text-[10px] text-[#666666]">({{ $count }})</span>
        @endif
    </div>
@endif
