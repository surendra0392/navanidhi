@php
    $channel = core()->getCurrentChannel();
    $logoConfig = core()->getConfigData('general.design.admin_logo.logo_image');
    $logoUrl = $channel->logo_url ?: ($logoConfig ? \Illuminate\Support\Facades\Storage::url($logoConfig) : null);
    $showCompare = (bool) core()->getConfigData('catalog.products.settings.compare_option');
    $showWishlist = (bool) core()->getConfigData('customer.settings.wishlist.wishlist_option');
@endphp

<div class="flex flex-col w-full shadow-lg lg:hidden bg-[#041a0e]/90 backdrop-blur-xl border-b border-white/10 text-white">
    <!-- Top Row: Logo, Drawer, Action Icons -->
    <div class="flex items-center justify-between w-full px-4" style="min-height: 64px; padding-top: 10px; padding-bottom: 10px;">
        <!-- Left: Drawer & Brand Logo -->
        <div class="flex items-center gap-x-2.5">
            {!! view_render_event('bagisto.shop.components.layouts.header.mobile.drawer.before') !!}

            <!-- Drawer -->
            <v-mobile-drawer></v-mobile-drawer>

            {!! view_render_event('bagisto.shop.components.layouts.header.mobile.drawer.after') !!}

            {!! view_render_event('bagisto.shop.components.layouts.header.mobile.logo.before') !!}

            <a
                href="{{ route('shop.home.index') }}"
                class="flex items-center py-1 group"
                aria-label="Navanidhi Naturals — Botanical Nutrition"
            >
                @if ($logoUrl)
                    <img
                        src="{{ $logoUrl }}"
                        alt="{{ config('app.name', 'Navanidhi Naturals') }}"
                        class="w-auto object-contain"
                        style="height: 36px; max-height: 40px; max-width: 175px;"
                    />
                @else
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-lg bg-[#0F4D2E] flex items-center justify-center text-[#D4B381] shadow-xs shrink-0 border border-white/10">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 4H8V20H5V4Z" fill="#F7F5EE"/>
                                <path d="M8 4L16 16V20L8 8V4Z" fill="#F7F5EE"/>
                                <path d="M16 4H19V20H16V4Z" fill="#F7F5EE"/>
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-serif text-lg font-bold tracking-tight text-white leading-none">
                                NAVANIDHI
                            </span>
                            <span class="text-[8px] tracking-[0.28em] uppercase text-[#D4A359] font-sans font-semibold mt-0.5">
                                Naturals
                            </span>
                        </div>
                    </div>
                @endif
            </a>

            {!! view_render_event('bagisto.shop.components.layouts.header.mobile.logo.after') !!}
        </div>

        <!-- Right: Search Toggle, Mini Cart, Account -->
        <div class="flex items-center gap-x-1 sm:gap-x-2">
            {!! view_render_event('bagisto.shop.components.layouts.header.mobile.search_toggle.before') !!}

            <!-- 1. Search Icon Toggle Button -->
            <button
                type="button"
                class="flex h-9 w-9 items-center justify-center rounded-full text-white bg-white/10 border border-white/15 hover:bg-emerald-600 transition-all cursor-pointer focus:outline-none"
                :class="{ 'bg-emerald-600 border-emerald-400': isSearchOpen }"
                @click="toggleSearch"
                aria-label="Toggle Search"
            >
                <svg class="w-4 h-4 text-white" v-if="!isSearchOpen" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="7.5"></circle>
                    <line x1="21" y1="21" x2="16.5" y2="16.5"></line>
                </svg>
                <svg class="w-4 h-4 text-white" v-else viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>

            {!! view_render_event('bagisto.shop.components.layouts.header.mobile.search_toggle.after') !!}

            @if($showCompare)
                <a
                    href="{{ route('shop.compare.index') }}"
                    aria-label="@lang('shop::app.components.layouts.header.mobile.compare')"
                    class="flex h-9 w-9 items-center justify-center rounded-full text-white bg-white/10 border border-white/15 hover:bg-emerald-600 transition-all"
                >
                    <span class="icon-compare text-base text-white" role="presentation"></span>
                </a>
            @endif

            {!! view_render_event('bagisto.shop.components.layouts.header.mobile.mini_cart.before') !!}

            <!-- 2. Shopping Cart -->
            @if(core()->getConfigData('sales.checkout.shopping_cart.cart_page'))
                @include('shop::checkout.cart.mini-cart')
            @endif

            {!! view_render_event('bagisto.shop.components.layouts.header.mobile.mini_cart.after') !!}

            <!-- 3. Customer Account Trigger -->
            <div class="flex items-center">
                @guest('customer')
                    <a
                        href="{{ route('shop.customer.session.create') }}"
                        aria-label="@lang('shop::app.components.layouts.header.mobile.account')"
                        class="flex h-9 w-9 items-center justify-center rounded-full text-white bg-white/10 border border-white/15 hover:bg-emerald-600 transition-all"
                    >
                        <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M20 21v-1.5a4.5 4.5 0 0 0-4.5-4.5h-7A4.5 4.5 0 0 0 4 19.5V21"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </a>
                @endguest

                @auth('customer')
                    <a
                        href="{{ route('shop.customers.account.index') }}"
                        aria-label="@lang('shop::app.components.layouts.header.mobile.account')"
                        class="flex h-9 w-9 items-center justify-center rounded-full text-emerald-300 bg-emerald-500/20 border border-emerald-400/30 hover:bg-emerald-500/30 transition-all"
                    >
                        <svg class="w-4 h-4 text-emerald-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M20 21v-1.5a4.5 4.5 0 0 0-4.5-4.5h-7A4.5 4.5 0 0 0 4 19.5V21"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </a>
                @endauth
            </div>
        </div>
    </div>

    <!-- Collapsible Search Bar (Only shown on click) -->
    <transition
        enter-active-class="transition-all duration-300 ease-out"
        enter-from-class="opacity-0 -translate-y-2 max-h-0 overflow-hidden"
        enter-to-class="opacity-100 translate-y-0 max-h-[300px]"
        leave-active-class="transition-all duration-200 ease-in"
        leave-from-class="opacity-100 translate-y-0 max-h-[300px]"
        leave-to-class="opacity-0 -translate-y-2 max-h-0 overflow-hidden"
    >
        <div
            v-if="isSearchOpen"
            class="w-full p-4 bg-[#041a0e]/95 border-t border-white/10"
        >
            {!! view_render_event('bagisto.shop.components.layouts.header.mobile.search.before') !!}

            <!-- Luxury Botanical Search Form -->
            <form
                action="{{ route('shop.search.index') }}"
                class="relative flex items-center w-full"
                role="search"
                @submit="closeSearch"
            >
                <label for="mobile-search-navanidhi" class="sr-only">Search botanical powders and nutrition</label>

                <div class="relative w-full flex items-center">
                    <input
                        id="mobile-search-navanidhi"
                        type="text"
                        name="query"
                        value="{{ request('query') }}"
                        class="w-full h-11 pl-10 pr-11 text-xs text-white placeholder:text-white/40 bg-white/10 border border-white/20 rounded-xl focus:border-emerald-400 focus:ring-1 focus:ring-emerald-400 transition-all outline-none"
                        style="background: rgba(255, 255, 255, 0.08); color: #ffffff;"
                        placeholder="Search pure spices, botanicals, blends..."
                        autocomplete="off"
                        required
                    />

                    <!-- Search Icon (placed after input with high z-index to guarantee visibility) -->
                    <div class="pointer-events-none absolute left-3.5 top-1/2 -translate-y-1/2 flex items-center justify-center text-white/70" style="z-index: 10 !important; pointer-events: none;">
                        <svg class="text-white/80" style="width: 18px; height: 18px; stroke: rgba(255, 255, 255, 0.85); stroke-width: 2.2;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="11" cy="11" r="7.5"></circle>
                            <line x1="21" y1="21" x2="16.5" y2="16.5"></line>
                        </svg>
                    </div>

                    <button
                        type="submit"
                        class="absolute right-2 top-1/2 -translate-y-1/2 h-7 w-7 rounded-lg text-[#041a0e] bg-gradient-to-r from-[#c9a25a] to-[#b08a43] flex items-center justify-center transition-all shadow-sm cursor-pointer"
                        aria-label="Submit search"
                        style="z-index: 10 !important;"
                    >
                        <svg class="w-3.5 h-3.5 text-[#041a0e]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </button>
                </div>
            </form>

            <!-- Quick Discovery Tags -->
            <div class="mt-3 pt-2.5 border-t border-white/10 flex items-center gap-1.5 overflow-x-auto no-scrollbar text-xs">
                <span class="text-[10px] uppercase tracking-wider text-[#E6C687] font-bold shrink-0">Popular:</span>
                <a href="{{ route('shop.search.index', ['query' => 'chilli']) }}" class="px-2.5 py-1 rounded-full bg-rose-500/20 border border-rose-400/30 text-rose-300 text-[11px] font-medium whitespace-nowrap">Red Chilli</a>
                <a href="{{ route('shop.search.index', ['query' => 'turmeric']) }}" class="px-2.5 py-1 rounded-full bg-amber-500/20 border border-amber-400/30 text-amber-300 text-[11px] font-medium whitespace-nowrap">Turmeric</a>
                <a href="{{ route('shop.search.index', ['query' => 'moringa']) }}" class="px-2.5 py-1 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-emerald-300 text-[11px] font-medium whitespace-nowrap">Moringa</a>
                <a href="{{ route('shop.search.index', ['query' => 'amla']) }}" class="px-2.5 py-1 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-emerald-300 text-[11px] font-medium whitespace-nowrap">Amla</a>
                <a href="{{ route('shop.search.index', ['query' => 'beetroot']) }}" class="px-2.5 py-1 rounded-full bg-rose-500/20 border border-rose-400/30 text-rose-300 text-[11px] font-medium whitespace-nowrap">Beetroot</a>
            </div>

            {!! view_render_event('bagisto.shop.components.layouts.header.mobile.search.after') !!}
        </div>
    </transition>
</div>

@pushOnce('scripts')
    <script type="text/x-template" id="v-mobile-drawer-template">
        <x-shop::drawer
            position="left"
            width="320px"
        >
            <x-slot:toggle>
                <button
                    type="button"
                    class="flex h-9 w-9 items-center justify-center rounded-full text-white bg-white/10 border border-white/15 hover:bg-emerald-600 transition-colors focus:outline-none cursor-pointer"
                    aria-label="Open Navigation"
                >
                    <span class="text-xl cursor-pointer icon-hamburger text-white"></span>
                </button>
            </x-slot>

            <x-slot:header>
                <div class="flex items-center justify-between py-1">
                    <a href="{{ route('shop.home.index') }}" class="flex items-center">
                        @if ($logoUrl)
                            <img
                                src="{{ $logoUrl }}"
                                alt="{{ config('app.name', 'Navanidhi Naturals') }}"
                                class="h-8 w-auto object-contain max-w-[130px]"
                            />
                        @else
                            <div class="flex items-center gap-2">
                                <div class="w-7 h-7 rounded-md bg-[#0F4D2E] flex items-center justify-center text-[#D4B381] border border-white/10">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 4H8V20H5V4Z" fill="#F7F5EE"/>
                                        <path d="M8 4L16 16V20L8 8V4Z" fill="#F7F5EE"/>
                                        <path d="M16 4H19V20H16V4Z" fill="#F7F5EE"/>
                                    </svg>
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-serif text-lg font-bold tracking-tight text-white leading-none">
                                        NAVANIDHI
                                    </span>
                                    <span class="text-[7.5px] tracking-[0.28em] uppercase text-[#D4A359] font-sans font-semibold">
                                        Naturals
                                    </span>
                                </div>
                            </div>
                        @endif
                    </a>
                </div>
            </x-slot>

            <x-slot:content class="!p-0 bg-transparent text-white">
                <!-- Primary Mobile Navigation Links -->
                <nav class="px-5 py-4 border-b border-white/10 space-y-0.5" aria-label="Mobile Primary Navigation">
                    <a
                        href="{{ route('shop.home.index') }}"
                        class="flex items-center justify-between py-2.5 text-xs font-semibold uppercase tracking-[0.14em] {{ (request()->routeIs('shop.home.index') && request()->is('/')) ? 'text-emerald-300 font-bold' : 'text-white/80 hover:text-white' }} border-b border-white/10 transition-colors"
                    >
                        <span>Home</span>
                        <span class="icon-arrow-right text-xs text-[#E6C687]"></span>
                    </a>

                    <a
                        href="{{ url('/products') }}"
                        class="flex items-center justify-between py-2.5 text-xs font-semibold uppercase tracking-[0.14em] {{ request()->is('products*') ? 'text-emerald-300 font-bold' : 'text-white/80 hover:text-white' }} border-b border-white/10 transition-colors"
                    >
                        <span>Products</span>
                        <span class="icon-arrow-right text-xs text-[#E6C687]"></span>
                    </a>

                    <a
                        href="{{ route('shop.cms.page', 'about-us') }}"
                        class="flex items-center justify-between py-2.5 text-xs font-semibold uppercase tracking-[0.14em] {{ request()->is('page/about-us*') ? 'text-emerald-300 font-bold' : 'text-white/80 hover:text-white' }} border-b border-white/10 transition-colors"
                    >
                        <span>Our Story</span>
                        <span class="icon-arrow-right text-xs text-[#E6C687]"></span>
                    </a>

                    <a
                        href="{{ route('shop.cms.page', 'quality') }}"
                        class="flex items-center justify-between py-2.5 text-xs font-semibold uppercase tracking-[0.14em] {{ request()->is('page/quality*') ? 'text-emerald-300 font-bold' : 'text-white/80 hover:text-white' }} border-b border-white/10 transition-colors"
                    >
                        <span>Quality</span>
                        <span class="icon-arrow-right text-xs text-[#E6C687]"></span>
                    </a>

                    <a
                        href="{{ route('shop.recipes.index') }}"
                        class="flex items-center justify-between py-2.5 text-xs font-semibold uppercase tracking-[0.14em] {{ request()->is('recipes*') ? 'text-emerald-300 font-bold' : 'text-white/80 hover:text-white' }} border-b border-white/10 transition-colors"
                    >
                        <span>Recipes & Rituals</span>
                        <span class="icon-arrow-right text-xs text-[#E6C687]"></span>
                    </a>

                    <a
                        href="{{ route('shop.home.contact_us') }}"
                        class="flex items-center justify-between py-2.5 text-xs font-semibold uppercase tracking-[0.14em] {{ request()->routeIs('shop.home.contact_us*') ? 'text-emerald-300 font-bold' : 'text-white/80 hover:text-white' }} transition-colors"
                    >
                        <span>Contact Us</span>
                        <span class="icon-arrow-right text-xs text-[#E6C687]"></span>
                    </a>
                </nav>

                <!-- Customer Account Status Box -->
                <div class="p-5">
                    <div class="grid grid-cols-[auto_1fr] items-center gap-3.5 rounded-xl border border-white/15 bg-white/[0.06] backdrop-blur-md p-3 shadow-sm">
                        <div class="w-10 h-10 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-emerald-300 flex items-center justify-center font-bold text-sm uppercase">
                            {{ auth()->guard('customer')->user() ? substr(auth()->guard('customer')->user()->first_name, 0, 1) : 'G' }}
                        </div>

                        @guest('customer')
                            <div class="flex flex-col">
                                <span class="text-xs font-bold text-white">Welcome to Navanidhi</span>
                                <div class="flex items-center gap-2 mt-1">
                                    <a href="{{ route('shop.customer.session.create') }}" class="text-[11px] font-semibold text-emerald-300 hover:text-emerald-200 hover:underline">
                                        Sign In
                                    </a>
                                    <span class="text-xs text-white/40">&bull;</span>
                                    <a href="{{ route('shop.customers.register.index') }}" class="text-[11px] font-semibold text-[#E6C687] hover:text-[#d6b677] hover:underline">
                                        Register
                                    </a>
                                </div>
                            </div>
                        @endguest

                        @auth('customer')
                            <div class="flex flex-col">
                                <span class="text-xs font-bold text-white" v-pre>Namaste, {{ auth()->guard('customer')->user()->first_name }}</span>
                                <div class="flex items-center gap-2 mt-0.5">
                                    <a href="{{ route('shop.customers.account.index') }}" class="text-[11px] font-semibold text-emerald-300 hover:underline">
                                        Dashboard &rarr;
                                    </a>
                                    <span class="text-xs text-white/40">&bull;</span>
                                    <a href="{{ route('shop.customers.account.orders.index') }}" class="text-[11px] font-semibold text-white/70 hover:underline">
                                        Orders
                                    </a>
                                    <span class="text-xs text-white/40">&bull;</span>
                                    <form method="POST" action="{{ route('shop.customer.session.destroy') }}" class="inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="text-[11px] font-semibold text-rose-400 hover:underline cursor-pointer">
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>

                <!-- Brand Assurance Footer -->
                <div class="px-5 pb-5 text-[11px] text-white/60 leading-relaxed border-t border-white/10 pt-4">
                    <p class="font-semibold text-emerald-300 uppercase tracking-wider text-[10px]">A MAN Agro Foods Venture</p>
                    <p class="text-[10px] text-white/50 mt-0.5">100% Pure Farm Spices &bull; Whole Botanicals &bull; FSSAI Certified</p>
                </div>
            </x-slot>

            <x-slot:footer>
                <div class="flex items-center justify-between gap-4 text-xs font-semibold uppercase tracking-wider text-white">
                    <a href="{{ route('shop.search.index') }}" class="flex items-center gap-1.5 text-emerald-300 hover:text-emerald-200 transition-colors">
                        <span class="icon-search text-base"></span>
                        <span>Search</span>
                    </a>

                    <a href="{{ route('shop.checkout.cart.index') }}" class="flex items-center gap-1.5 text-emerald-300 hover:text-emerald-200 transition-colors">
                        <span class="icon-cart text-base"></span>
                        <span>Cart</span>
                    </a>
                </div>
            </x-slot>
        </x-shop::drawer>
    </script>

    <script type="module">
        app.component('v-mobile-drawer', {
            template: '#v-mobile-drawer-template',
        });
    </script>
@endPushOnce
