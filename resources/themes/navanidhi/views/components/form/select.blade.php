@props([
    'label'    => null,
    'name'     => null,
    'required' => false,
    'error'    => null,
    'options'  => [],
    'selected' => null,
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

    <div class="relative">
        <select
            id="{{ $name }}"
            name="{{ $name }}"
            {{ $required ? 'required' : '' }}
            {{ $attributes->merge(['class' => 'w-full appearance-none px-3.5 py-2.5 pr-8 text-xs text-[#111111] bg-white border border-[#DCD3C3] rounded-lg focus:border-[#0F4D2E] focus:ring-1 focus:ring-[#0F4D2E] transition-all outline-none disabled:bg-[#F7F5EE] cursor-pointer']) }}
        >
            @if (!empty($options))
                @foreach ($options as $val => $text)
                    <option value="{{ $val }}" {{ (string)$selected === (string)$val ? 'selected' : '' }}>{{ $text }}</option>
                @endforeach
            @endif
            {{ $slot }}
        </select>

        <span class="pointer-events-none absolute right-2.5 top-1/2 -translate-y-1/2 material-symbols-outlined text-base text-[#666666]">
            expand_more
        </span>
    </div>

    @if ($error)
        <span class="text-[11px] text-red-600 font-medium">
            {{ $error }}
        </span>
    @endif
</div>
