@props([
    'label'       => null,
    'name'        => null,
    'type'        => 'text',
    'placeholder' => null,
    'required'    => false,
    'error'       => null,
])

<div class="flex flex-col gap-1.5 w-full">
    @if ($label)
        <label for="{{ $name }}" class="text-xs font-semibold text-[#111111] flex items-center justify-between">
            <span>{{ $label }}</span>
            @if ($required)
                <span class="text-red-500 font-bold">*</span>
            @endif
        </label>
    @endif

    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'w-full px-3.5 py-2.5 text-xs text-[#111111] bg-white border border-[#DCD3C3] rounded-lg focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] transition-all outline-none disabled:bg-[#F7F5EE] disabled:cursor-not-allowed']) }}
    />

    @if ($error)
        <span class="text-[11px] text-red-600 font-medium">
            {{ $error }}
        </span>
    @endif
</div>
