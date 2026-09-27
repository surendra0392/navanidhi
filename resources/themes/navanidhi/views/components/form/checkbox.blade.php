@props([
    'label'   => null,
    'name'    => null,
    'checked' => false,
])

<label class="inline-flex items-center gap-2 cursor-pointer select-none text-xs text-[#111111]">
    <input
        type="checkbox"
        id="{{ $name }}"
        name="{{ $name }}"
        {{ $checked ? 'checked' : '' }}
        {{ $attributes->merge(['class' => 'w-4 h-4 rounded border-[#DCD3C3] text-[#0F4D2E] focus:ring-[#0F4D2E] focus:ring-offset-0 cursor-pointer']) }}
    />

    @if ($label || $slot->isNotEmpty())
        <span>{{ $label ?? $slot }}</span>
    @endif
</label>
