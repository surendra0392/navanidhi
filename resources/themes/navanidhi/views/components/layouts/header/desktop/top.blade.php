{!! view_render_event('bagisto.shop.components.layouts.header.desktop.top.before') !!}

@php
    $offerTitle = core()->getConfigData('general.content.header_offer.title');
    $redirectionTitle = core()->getConfigData('general.content.header_offer.redirection_title');
    $redirectionLink = core()->getConfigData('general.content.header_offer.redirection_link');
@endphp

<v-topbar>
    <!-- Shimmer / SSR Fallback -->
    <div style="background-color: var(--navanidhi-color-deep-green, #0F4D2E) !important; border-bottom: 1px solid rgba(212, 179, 129, 0.25) !important;">
        <div class="site-container flex items-center justify-between py-2 text-xs" style="color: var(--navanidhi-color-off-white, #F7F5EE) !important;">
            <div class="w-24 flex items-center gap-2 text-[10px] tracking-wider text-[rgba(247,245,238,0.7)]">
                <span>MAN AGRO FOODS</span>
            </div>
            <div class="text-[11px] font-medium tracking-widest uppercase flex items-center gap-2">
                @if ($offerTitle)
                    <span>{!! $offerTitle !!}</span>
                    @if ($redirectionTitle && $redirectionLink)
                        <a
                            href="{{ $redirectionLink }}"
                            class="ml-1.5 inline-flex items-center gap-1 font-semibold text-[#D4B381] hover:text-white underline transition-colors"
                        >
                            <span>{{ $redirectionTitle }}</span>
                            <span class="text-xs">&rarr;</span>
                        </a>
                    @endif
                @else
                    <span>Free Shipping on orders above ₹499 &bull; Pure Farm Spices &amp; Living Botanicals &bull; MAN AGRO FOODS</span>
                @endif
            </div>
            <div class="w-24 text-right">
                <a href="{{ route('shop.cms.page', 'quality') }}" class="text-[10px] tracking-wider text-[#D4B381] hover:text-white transition-colors">
                    Quality Promise &rarr;
                </a>
            </div>
        </div>
    </div>
</v-topbar>

{!! view_render_event('bagisto.shop.components.layouts.header.desktop.top.after') !!}

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-topbar-template"
    >
        <div style="background-color: var(--navanidhi-color-deep-green, #0F4D2E) !important; border-bottom: 1px solid rgba(212, 179, 129, 0.25) !important;">
            <div class="site-container flex items-center justify-between py-2 text-[11px] font-medium tracking-widest uppercase" style="color: var(--navanidhi-color-off-white, #F7F5EE) !important;">
                {!! view_render_event('bagisto.shop.components.layouts.header.desktop.top.currency_switcher.before') !!}

                <!-- Currency Switcher -->
                <x-shop::dropdown position="bottom-{{ core()->getCurrentLocale()->direction === 'ltr' ? 'left' : 'right' }}">
                    <x-slot:toggle>
                        <div
                            class="group flex cursor-pointer items-center gap-1.5 hover:text-white transition-colors py-0.5"
                            role="button"
                            tabindex="0"
                            @click="currencyToggler = ! currencyToggler"
                        >
                            <span v-pre class="text-[11px] font-semibold tracking-wider">
                                {{ core()->getCurrentCurrency()->symbol . ' ' . core()->getCurrentCurrencyCode() }}
                            </span>

                            <svg class="w-3 h-3 text-white/70 group-hover:text-white transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="m6 9 6 6 6-6"/>
                            </svg>
                        </div>
                    </x-slot>

                    <x-slot:content 
                        class="!p-1.5 rounded-2xl border border-white/20 shadow-2xl backdrop-blur-2xl text-xs text-white min-w-[130px]" 
                        style="background: rgba(4, 26, 14, 0.98) !important; border: 1px solid rgba(255, 255, 255, 0.18) !important; box-shadow: 0 16px 40px rgba(0, 0, 0, 0.6) !important;"
                    >
                        @foreach (core()->getCurrentChannel()->currencies as $currency)
                            <a
                                href="?currency={{ $currency->code }}"
                                class="flex cursor-pointer items-center justify-between gap-3 rounded-xl px-3 py-2 text-xs transition-all {{ $currency->code === core()->getCurrentCurrencyCode() ? 'bg-emerald-500/20 text-emerald-300 font-bold border border-emerald-400/30' : 'text-white/80 hover:text-white hover:bg-white/10' }}"
                            >
                                <span class="font-medium tracking-wide">{{ $currency->symbol }} {{ $currency->code }}</span>
                                @if ($currency->code === core()->getCurrentCurrencyCode())
                                    <svg class="w-3.5 h-3.5 text-emerald-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                @endif
                            </a>
                        @endforeach
                    </x-slot>
                </x-shop::dropdown>

                {!! view_render_event('bagisto.shop.components.layouts.header.desktop.top.currency_switcher.after') !!}

                <!-- Center Message -->
                <div class="flex items-center gap-2 text-center">
                    @if ($offerTitle)
                        <span>{!! $offerTitle !!}</span>
                        @if ($redirectionTitle && $redirectionLink)
                            <a
                                href="{{ $redirectionLink }}"
                                class="ml-1.5 inline-flex items-center gap-1 font-semibold text-[#D4B381] hover:text-white underline transition-colors"
                            >
                                <span>{{ $redirectionTitle }}</span>
                                <span class="text-xs">&rarr;</span>
                            </a>
                        @endif
                    @else
                        <span>Free Shipping Above ₹499 &bull; Pure Farm Spices &amp; Living Botanicals &bull; Zero Additives</span>
                    @endif
                </div>

                <!-- Locale Switcher -->
                {!! view_render_event('bagisto.shop.components.layouts.header.desktop.top.locale_switcher.before') !!}

                <x-shop::dropdown position="bottom-{{ core()->getCurrentLocale()->direction === 'ltr' ? 'right' : 'left' }}">
                    <x-slot:toggle>
                        <div
                            class="group flex cursor-pointer items-center gap-1.5 hover:text-white transition-colors py-0.5"
                            role="button"
                            tabindex="0"
                            @click="localeToggler = ! localeToggler"
                        >
                            <span v-pre class="text-[11px] font-semibold tracking-wider">
                                {{ core()->getCurrentLocale()->name }}
                            </span>

                            <svg class="w-3 h-3 text-white/70 group-hover:text-white transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="m6 9 6 6 6-6"/>
                            </svg>
                        </div>
                    </x-slot>

                    <x-slot:content 
                        class="!p-1.5 rounded-2xl border border-white/20 shadow-2xl backdrop-blur-2xl text-xs text-white min-w-[140px]" 
                        style="background: rgba(4, 26, 14, 0.98) !important; border: 1px solid rgba(255, 255, 255, 0.18) !important; box-shadow: 0 16px 40px rgba(0, 0, 0, 0.6) !important;"
                    >
                        @foreach (core()->getCurrentChannel()->locales()->orderBy('name')->get() as $locale)
                            <a
                                href="?locale={{ $locale->code }}"
                                class="flex cursor-pointer items-center justify-between gap-3 rounded-xl px-3 py-2 text-xs transition-all {{ $locale->code === app()->getLocale() ? 'bg-emerald-500/20 text-emerald-300 font-bold border border-emerald-400/30' : 'text-white/80 hover:text-white hover:bg-white/10' }}"
                            >
                                <span class="font-medium tracking-wide">{{ $locale->name }}</span>
                                @if ($locale->code === app()->getLocale())
                                    <svg class="w-3.5 h-3.5 text-emerald-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                @endif
                            </a>
                        @endforeach
                    </x-slot>
                </x-shop::dropdown>

                {!! view_render_event('bagisto.shop.components.layouts.header.desktop.top.locale_switcher.after') !!}
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-topbar', {
            template: '#v-topbar-template',

            data() {
                return {
                    currencyToggler: false,
                    localeToggler: false
                };
            }
        });
    </script>
@endPushOnce
