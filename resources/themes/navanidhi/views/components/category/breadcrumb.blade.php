@props([
    'items' => [], // Array of ['name' => '...', 'url' => '...']
])

<nav aria-label="Breadcrumb" {{ $attributes->merge(['class' => 'flex items-center text-xs text-[#666666] py-3 overflow-x-auto whitespace-nowrap']) }}>
    <ol class="inline-flex items-center gap-1.5" itemscope itemtype="https://schema.org/BreadcrumbList">
        <!-- Home Item -->
        <li class="inline-flex items-center" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a href="{{ route('shop.home.index') }}" class="hover:text-[#0F4D2E] transition-colors" itemprop="item">
                <span itemprop="name">Home</span>
            </a>
            <meta itemprop="position" content="1" />
        </li>

        @foreach ($items as $index => $item)
            <li class="inline-flex items-center gap-1.5" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <span class="text-[#8B6F45]/60 select-none">/</span>

                @if (!empty($item['url']) && !$loop->last)
                    <a href="{{ $item['url'] }}" class="hover:text-[#0F4D2E] transition-colors" itemprop="item">
                        <span itemprop="name">{{ $item['name'] }}</span>
                    </a>
                @else
                    <span class="font-semibold text-[#0F4D2E]" itemprop="name" aria-current="page">
                        {{ $item['name'] }}
                    </span>
                @endif
                <meta itemprop="position" content="{{ $index + 2 }}" />
            </li>
        @endforeach
    </ol>
</nav>
