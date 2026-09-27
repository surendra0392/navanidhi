{!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.before') !!}

@php
    $channel = core()->getCurrentChannel();
    $logoConfig = core()->getConfigData('general.design.admin_logo.logo_image');
    $logoUrl = $channel->logo_url ?: ($logoConfig ? \Illuminate\Support\Facades\Storage::url($logoConfig) : null);
@endphp

<div class="site-container header-container-desktop relative flex items-center justify-between">
    <!-- Left: Brand Logo -->
    <div class="flex items-center shrink-0">
        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.logo.before') !!}

        <a
            href="{{ route('shop.home.index') }}"
            class="flex items-center py-1 group"
            aria-label="Navanidhi Naturals — Botanical Nutrition"
        >
            @if ($logoUrl)
                <img
                    src="{{ $logoUrl }}"
                    alt="{{ config('app.name', 'Navanidhi Naturals') }}"
                    class="header-desktop-logo transition-transform duration-300 group-hover:scale-[1.02]"
                />
            @else
                <div class="flex items-center gap-2.5 xl:gap-3.5">
                    <!-- Geometric 'N' Monogram Icon -->
                    <div class="w-10 h-10 xl:w-12 xl:h-12 rounded-xl bg-[#0F4D2E] flex items-center justify-center text-[#D4B381] shadow-sm group-hover:bg-[#0A3520] transition-colors shrink-0">
                        <svg class="w-6 h-6 xl:w-7 xl:h-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 4H8V20H5V4Z" fill="#F7F5EE"/>
                            <path d="M8 4L16 16V20L8 8V4Z" fill="#F7F5EE"/>
                            <path d="M16 4H19V20H16V4Z" fill="#F7F5EE"/>
                            <path d="M13.5 5C13.5 5 17 4 18 8C19 12 16 14 16 14C16 14 17 10 14.5 9C12 8 13.5 5 13.5 5Z" fill="#D4B381"/>
                        </svg>
                    </div>
                    <!-- Brand Logotype -->
                    <div class="flex flex-col">
                        <span class="font-serif text-2xl xl:text-[28px] font-bold tracking-tight text-white group-hover:text-emerald-300 transition-colors leading-none">
                            NAVANIDHI
                        </span>
                        <span class="text-[9px] xl:text-[10px] tracking-[0.34em] uppercase text-[#D4A359] font-sans font-semibold mt-1">
                            Naturals
                        </span>
                    </div>
                </div>
            @endif
        </a>

        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.logo.after') !!}
    </div>

    <!-- Center: Primary Navigation (Strict Centered Pill Navigation) -->
    <div class="hidden lg:flex items-center absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-10 pointer-events-auto">
        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.category.before') !!}

        <nav class="header-nav-wrap bg-white/10 backdrop-blur-md px-2 py-1.5 rounded-full border border-white/20 shadow-sm" aria-label="Primary Navigation">
            <a 
                href="{{ route('shop.home.index') }}" 
                class="header-nav-pill {{ request()->routeIs('shop.home.index') && request()->is('/') ? 'active' : '' }}"
            >
                Home
            </a>

            <a 
                href="{{ url('/products') }}" 
                class="header-nav-pill {{ request()->is('products*') ? 'active' : '' }}"
            >
                Products
            </a>

            <a 
                href="{{ route('shop.cms.page', 'about-us') }}" 
                class="header-nav-pill {{ request()->is('page/about-us*') ? 'active' : '' }}"
            >
                Our Story
            </a>

            <a 
                href="{{ route('shop.cms.page', 'quality') }}" 
                class="header-nav-pill {{ request()->is('page/quality*') ? 'active' : '' }}"
            >
                Quality
            </a>

            <a 
                href="{{ route('shop.recipes.index') }}" 
                class="header-nav-pill {{ request()->is('recipes*') ? 'active' : '' }}"
            >
                Recipes
            </a>

            <a 
                href="{{ route('shop.home.contact_us') }}" 
                class="header-nav-pill {{ request()->routeIs('shop.home.contact_us*') || request()->is('contact-us*') ? 'active' : '' }}"
            >
                Contact
            </a>
        </nav>

        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.category.after') !!}
    </div>

    <!-- Right: Utility Controls (Search Popover, Wishlist, Account, Mini-Cart) -->
    <div class="flex items-center gap-x-2 sm:gap-x-3 text-[#111827]">
        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.search_bar.before') !!}

        <!-- Search Icon Dropdown Popover -->
        <x-shop::dropdown position="bottom-{{ core()->getCurrentLocale()->direction === 'ltr' ? 'right' : 'left' }}" :close-on-click="false">
            <x-slot:toggle>
                <button
                    type="button"
                    class="flex h-10 w-10 items-center justify-center rounded-full text-white bg-white/10 border border-white/20 shadow-sm hover:bg-emerald-600 hover:border-emerald-500 transition-all focus:outline-none backdrop-blur-md"
                    aria-label="@lang('shop::app.components.layouts.header.desktop.bottom.search')"
                >
                    <svg class="w-5 h-5 text-white transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="7.5"></circle>
                        <line x1="21" y1="21" x2="16.5" y2="16.5"></line>
                    </svg>
                </button>
            </x-slot>

            <x-slot:content class="w-[340px] sm:w-[420px] p-5 rounded-2xl border border-white/15 shadow-2xl backdrop-blur-2xl text-white" style="background: rgba(4, 26, 14, 0.98); color: #ffffff;">
                <form
                    action="{{ route('shop.search.index') }}"
                    class="relative flex items-center"
                    role="search"
                >
                    <label for="navanidhi-search-input" class="sr-only">Search</label>

                    <input
                        id="navanidhi-search-input"
                        type="text"
                        name="query"
                        value="{{ request('query') }}"
                        class="w-full h-11 pl-10 pr-11 text-xs text-white placeholder:text-white/40 bg-white/10 border border-white/20 rounded-xl focus:border-emerald-400 focus:ring-1 focus:ring-emerald-400 transition-all outline-none"
                        style="background: rgba(255, 255, 255, 0.08); color: #ffffff;"
                        placeholder="Search pure spices, botanicals, blends..."
                        autocomplete="off"
                        required
                    >

                    <!-- Search Icon (placed after input with high z-index to guarantee visibility) -->
                    <div class="pointer-events-none absolute left-3.5 top-1/2 -translate-y-1/2 flex items-center justify-center text-white/70" style="z-index: 10 !important; pointer-events: none;">
                        <svg class="text-white/80" style="width: 18px; height: 18px; stroke: rgba(255, 255, 255, 0.85); stroke-width: 2.2;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="11" cy="11" r="7.5"></circle>
                            <line x1="21" y1="21" x2="16.5" y2="16.5"></line>
                        </svg>
                    </div>

                    <button
                        type="submit"
                        class="absolute right-2 top-1/2 -translate-y-1/2 h-7 w-7 rounded-lg text-[#041a0e] bg-gradient-to-r from-[#c9a25a] to-[#b08a43] hover:from-[#d6b677] hover:to-[#c9a25a] flex items-center justify-center transition-all shadow-sm cursor-pointer"
                        aria-label="Submit search"
                        style="z-index: 10 !important;"
                    >
                        <svg class="w-3.5 h-3.5 text-[#041a0e]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </button>
                </form>

                <!-- Quick Discovery Suggestions -->
                <div class="mt-4 pt-3 border-t border-white/10 flex flex-wrap items-center gap-1.5 text-xs">
                    <span class="text-[11px] uppercase tracking-wider text-[#E6C687] font-bold mr-1">Popular:</span>
                    <a href="{{ route('shop.search.index', ['query' => 'chilli']) }}" class="px-2.5 py-1 rounded-full bg-rose-500/20 border border-rose-400/30 text-rose-300 hover:bg-rose-500/30 transition-all text-[11px] font-medium">Red Chilli</a>
                    <a href="{{ route('shop.search.index', ['query' => 'turmeric']) }}" class="px-2.5 py-1 rounded-full bg-amber-500/20 border border-amber-400/30 text-amber-300 hover:bg-amber-500/30 transition-all text-[11px] font-medium">Turmeric</a>
                    <a href="{{ route('shop.search.index', ['query' => 'moringa']) }}" class="px-2.5 py-1 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-emerald-300 hover:bg-emerald-500/30 transition-all text-[11px] font-medium">Moringa</a>
                    <a href="{{ route('shop.search.index', ['query' => 'amla']) }}" class="px-2.5 py-1 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-emerald-300 hover:bg-emerald-500/30 transition-all text-[11px] font-medium">Amla</a>
                    <a href="{{ route('shop.search.index', ['query' => 'beetroot']) }}" class="px-2.5 py-1 rounded-full bg-rose-500/20 border border-rose-400/30 text-rose-300 hover:bg-rose-500/30 transition-all text-[11px] font-medium">Beetroot</a>
                </div>
            </x-slot>
        </x-shop::dropdown>

        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.search_bar.after') !!}

        <!-- Wishlist Icon -->
        @if(core()->getConfigData('general.content.shop.wishlist_option'))
            <a
                href="{{ route('shop.customers.account.wishlist.index') }}"
                aria-label="Wishlist"
                class="flex h-10 w-10 items-center justify-center rounded-full text-white bg-white/10 border border-white/20 shadow-sm hover:bg-emerald-600 hover:border-emerald-500 transition-all focus:outline-none backdrop-blur-md"
            >
                <svg class="w-5 h-5 text-white transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                </svg>
            </a>
        @endif

        <!-- Customer Account Dropdown -->
        <x-shop::dropdown position="bottom-{{ core()->getCurrentLocale()->direction === 'ltr' ? 'right' : 'left' }}">
            <x-slot:toggle>
                <button
                    type="button"
                    class="flex h-10 w-10 items-center justify-center rounded-full text-white bg-white/10 border border-white/20 shadow-sm hover:bg-emerald-600 hover:border-emerald-500 transition-all focus:outline-none backdrop-blur-md"
                    aria-label="Account"
                >
                    <svg class="w-5 h-5 text-white transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 21v-1.5a4.5 4.5 0 0 0-4.5-4.5h-7A4.5 4.5 0 0 0 4 19.5V21"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </button>
            </x-slot>

            <x-slot:content class="w-56 p-2 rounded-2xl border border-white/15 shadow-2xl backdrop-blur-2xl text-xs text-white" style="background: rgba(4, 26, 14, 0.98); color: #ffffff;">
                @auth('customer')
                    <div class="px-3.5 py-2.5 bg-white/5 rounded-xl mb-1.5 border border-white/10">
                        <span class="block text-[10px] uppercase tracking-wider text-white/50">Signed in as</span>
                        <span class="font-bold text-emerald-300 text-sm truncate block" v-pre>{{ auth()->guard('customer')->user()->first_name }}</span>
                    </div>
                    <a href="{{ route('shop.customers.account.index') }}" class="flex items-center gap-2.5 px-3 py-2 rounded-lg hover:bg-white/10 text-white/90 hover:text-white transition-colors font-medium">
                        <svg class="w-4 h-4 text-emerald-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <rect x="3" y="3" width="7" height="7" rx="1"></rect>
                            <rect x="14" y="3" width="7" height="7" rx="1"></rect>
                            <rect x="14" y="14" width="7" height="7" rx="1"></rect>
                            <rect x="3" y="14" width="7" height="7" rx="1"></rect>
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('shop.customers.account.orders.index') }}" class="flex items-center gap-2.5 px-3 py-2 rounded-lg hover:bg-white/10 text-white/90 hover:text-white transition-colors font-medium">
                        <svg class="w-4 h-4 text-emerald-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                        </svg>
                        Orders & Tracking
                    </a>
                    <a href="{{ route('shop.customers.account.addresses.index') }}" class="flex items-center gap-2.5 px-3 py-2 rounded-lg hover:bg-white/10 text-white/90 hover:text-white transition-colors font-medium">
                        <svg class="w-4 h-4 text-emerald-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        Addresses
                    </a>
                    <a href="{{ route('shop.customers.account.profile.index') }}" class="flex items-center gap-2.5 px-3 py-2 rounded-lg hover:bg-white/10 text-white/90 hover:text-white transition-colors font-medium">
                        <svg class="w-4 h-4 text-emerald-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M20 21v-1.5a4.5 4.5 0 0 0-4.5-4.5h-7A4.5 4.5 0 0 0 4 19.5V21"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        Profile & Security
                    </a>
                    <form method="POST" action="{{ route('shop.customer.session.destroy') }}" class="border-t border-white/10 mt-1.5 pt-1.5">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="w-full text-left flex items-center gap-2.5 px-3 py-2 rounded-lg hover:bg-rose-500/20 text-rose-300 hover:text-rose-200 transition-colors font-medium cursor-pointer">
                            <svg class="w-4 h-4 text-rose-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                            Logout
                        </button>
                    </form>
                @else
                    <div class="p-4 text-center text-white">
                        <div class="w-10 h-10 mx-auto rounded-full bg-emerald-500/20 border border-emerald-400/30 text-emerald-400 flex items-center justify-center mb-2">
                            <svg class="w-5 h-5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 2C6.5 2 2 6.5 2 12c0 3.5 1.8 6.6 4.6 8.4C6.2 18.5 6 16.3 6 14c0-5 3-9 7-11 1 3 1.5 6.5.5 9.5-.7 2.1-2.2 3.8-4.2 4.7 1.8.5 3.7.3 5.3-.6 3.6-2 5.4-6.1 5.4-10.6 0-1.4-.2-2.7-.6-4C17.6 2.8 14.9 2 12 2z"></path>
                            </svg>
                        </div>
                        <p class="text-xs text-white/70 mb-3">Welcome to Navanidhi Naturals</p>
                        <a href="{{ route('shop.customer.session.index') }}" class="block w-full py-2.5 px-3 rounded-xl bg-gradient-to-r from-[#c9a25a] to-[#b08a43] hover:from-[#d6b677] hover:to-[#c9a25a] text-[#041a0e] font-bold text-xs uppercase tracking-wider text-center transition-all shadow-md">
                            @lang('shop::app.components.layouts.header.desktop.bottom.sign-in')
                        </a>
                        <a href="{{ route('shop.customers.register.index') }}" class="block mt-2.5 text-xs font-semibold text-[#E6C687] hover:text-white transition-colors">
                            @lang('shop::app.components.layouts.header.desktop.bottom.sign-up') &rarr;
                        </a>
                    </div>
                @endauth
            </x-slot>
        </x-shop::dropdown>

        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.mini_cart.before') !!}

        <!-- Mini-Cart Drawer Trigger -->
        @if(core()->getConfigData('sales.checkout.shopping_cart.cart_page'))
            @include('shop::checkout.cart.mini-cart')
        @endif

        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.mini_cart.after') !!}
    </div>
</div>

{!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.after') !!}
