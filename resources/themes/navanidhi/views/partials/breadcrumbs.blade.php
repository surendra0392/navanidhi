@unless ($breadcrumbs->isEmpty())
    <nav aria-label="Breadcrumb" class="overflow-x-auto scrollbar-hide py-1">
        <ol class="flex items-center flex-nowrap whitespace-nowrap gap-x-2 text-[11px] sm:text-xs font-medium tracking-wide text-[#718096]" v-pre>
            @foreach ($breadcrumbs as $breadcrumb)
                @if (
                    $breadcrumb->url 
                    && ! $loop->last
                )
                    <li class="flex items-center gap-x-2">
                        <a 
                            href="{{ $breadcrumb->url }}" 
                            class="hover:text-[#0D5C3A] transition-colors duration-200"
                        >
                            {{ $breadcrumb->title }}
                        </a>

                        <span class="text-[10px] text-[#0D5C3A]/30 select-none">/</span>
                    </li>
                @else
                    <li 
                        class="text-[#062E1A] font-bold truncate max-w-[200px] sm:max-w-md" 
                        aria-current="page"
                    >
                        {{ $breadcrumb->title }}
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
@endunless
