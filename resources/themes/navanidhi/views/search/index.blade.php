<?php
    $currentQuery = $query ?? request('query', '');
    $currentSuggestion = $suggestion ?? null;
    $searchTitle = $currentSuggestion ?: $currentQuery;
    $title = $searchTitle ? trans('shop::app.search.title', ['query' => $searchTitle]) : trans('shop::app.search.results');
    $searchInstead = $currentSuggestion ? $currentQuery : null;
?>

<!-- SEO Meta Content -->
@push('meta')
    <meta name="robots" content="noindex, follow" />
    <meta name="title" content="{{ $title }} — Navanidhi Naturals" />
    <meta name="description" content="Search Navanidhi Naturals collection of stone-milled farm spices, pure single-origin botanical powders, and functional nutrition." />
@endPush

<x-shop::layouts :has-feature="false">
    <!-- Page Title -->
    <x-slot:title>
        {{ $title }} — Navanidhi Naturals
    </x-slot>

    <div class="min-h-screen" style="background-color: #FCFBF7;">
        <!-- Schema.org Breadcrumbs Navigation -->
        <div class="site-container pt-4 pb-2 sm:pt-6 sm:pb-3">
            @php
                $breadcrumbItems = [
                    [
                        'name' => 'Catalog Search',
                        'url'  => route('shop.search.index'),
                    ],
                ];
                if ($currentQuery) {
                    $breadcrumbItems[] = [
                        'name' => '"' . $currentQuery . '"',
                        'url'  => route('shop.search.index', ['query' => $currentQuery]),
                    ];
                }
            @endphp
            <x-navanidhi::category.breadcrumb :items="$breadcrumbItems" />
        </div>

        <!-- Editorial Search Hero -->
        <section class="site-container pt-6 pb-10 sm:pt-8 sm:pb-12 text-center max-w-3xl mx-auto space-y-4" aria-labelledby="search-heading">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold tracking-widest uppercase text-[#0D5C3A] bg-[#0D5C3A]/10 border border-[#0D5C3A]/20">
                Spices &amp; Botanical Discovery
            </span>

            <h1 id="search-heading" class="font-serif text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#062E1A] leading-tight">
                @if ($currentQuery)
                    Search Results for <span class="text-[#D4A359]">"{{ $currentQuery }}"</span>
                @else
                    Search Spices &amp; Botanical Formulations
                @endif
            </h1>

            <p class="text-xs sm:text-sm text-[#4A5568] max-w-md mx-auto">
                Discover 100% pure farm spices, stone-milled botanicals, and functional culinary nutrition.
            </p>

            <!-- Interactive Search Box -->
            <form
                action="{{ route('shop.search.index') }}"
                method="GET"
                class="relative max-w-xl mx-auto flex items-center pt-3"
                role="search"
            >
                <label for="search-page-input" class="sr-only">Search Navanidhi Naturals products</label>

                <div
                    class="pointer-events-none flex items-center justify-center text-[#0D5C3A]"
                    style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); z-index: 2;"
                >
                    <span class="material-symbols-outlined text-xl">search</span>
                </div>

                <input
                    id="search-page-input"
                    type="text"
                    name="query"
                    value="{{ $currentQuery }}"
                    class="w-full text-sm text-[#111111] placeholder:text-[#888888] bg-white border border-[#0D5C3A]/20 rounded-full shadow-[0_4px_20px_-4px_rgba(13,92,58,0.08)] focus:border-[#0D5C3A] focus:ring-2 focus:ring-[#0D5C3A]/20 outline-none transition-all"
                    style="padding-left: 50px; padding-right: 120px; height: 52px;"
                    placeholder="Search pure spices, botanicals, blends..."
                    autocomplete="off"
                    required
                >

                <div
                    style="position: absolute; right: 6px; left: auto; top: 50%; transform: translateY(-50%); z-index: 2;"
                >
                    <button
                        type="submit"
                        class="btn-emerald-primary !py-2.5 !px-6 text-xs whitespace-nowrap !rounded-full shadow-md"
                    >
                        Search
                    </button>
                </div>
            </form>

            <!-- Popular Search Suggestions -->
            <div class="pt-3 flex items-center justify-center gap-2 flex-wrap text-xs text-[#718096]">
                <span class="font-semibold text-[#1A202C] mr-1">Popular:</span>
                <a href="{{ route('shop.search.index', ['query' => 'Red Chilli']) }}" class="px-3.5 py-1.5 rounded-full bg-red-50 text-red-800 border border-red-200 hover:border-red-600 hover:bg-red-600 hover:text-white transition-all shadow-xs font-medium">Red Chilli</a>
                <a href="{{ route('shop.search.index', ['query' => 'Turmeric']) }}" class="px-3.5 py-1.5 rounded-full bg-amber-50 text-amber-800 border border-amber-200 hover:border-[#D4A359] hover:bg-[#D4A359] hover:text-white transition-all shadow-xs font-medium">Turmeric</a>
                <a href="{{ route('shop.search.index', ['query' => 'Moringa']) }}" class="px-3.5 py-1.5 rounded-full bg-white border border-[#0D5C3A]/15 hover:border-[#0D5C3A] hover:text-[#0D5C3A] hover:bg-[#0D5C3A]/5 transition-all shadow-xs">Moringa</a>
                <a href="{{ route('shop.search.index', ['query' => 'Curry Leaf']) }}" class="px-3.5 py-1.5 rounded-full bg-white border border-[#0D5C3A]/15 hover:border-[#0D5C3A] hover:text-[#0D5C3A] hover:bg-[#0D5C3A]/5 transition-all shadow-xs">Curry Leaf</a>
                <a href="{{ route('shop.search.index', ['query' => 'Amla']) }}" class="px-3.5 py-1.5 rounded-full bg-white border border-[#0D5C3A]/15 hover:border-[#0D5C3A] hover:text-[#0D5C3A] hover:bg-[#0D5C3A]/5 transition-all shadow-xs">Amla</a>
                <a href="{{ route('shop.search.index', ['query' => 'Ashwagandha']) }}" class="px-3.5 py-1.5 rounded-full bg-white border border-[#0D5C3A]/15 hover:border-[#0D5C3A] hover:text-[#0D5C3A] hover:bg-[#0D5C3A]/5 transition-all shadow-xs">Ashwagandha</a>
            </div>

            @if ($searchInstead)
                <form
                    action="{{ route('shop.search.index', ['suggest' => false]) }}"
                    class="flex items-center justify-center mx-auto pt-1"
                    role="search"
                >
                    <input type="hidden" name="query" value="{{ $searchInstead }}">
                    <input type="hidden" name="suggest" value="0">

                    <p class="text-xs text-[#718096]">
                        {{ trans('shop::app.search.suggest') }}
                        <button
                            type="submit"
                            class="text-[#0D5C3A] font-bold underline underline-offset-2 hover:text-[#062E1A]"
                        >
                            {{ $searchInstead }}
                        </button>
                    </p>
                </form>
            @endif
        </section>

        <!-- Product Search Results Vue Component -->
        <main class="site-container pb-20 sm:pb-28">
            <v-search>
                <x-shop::shimmer.categories.view />
            </v-search>
        </main>
    </div>

    @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-search-template"
        >
            <div>
                <div class="flex items-start gap-8 lg:gap-10">
                    <!-- Layered Navigation (Filters Sidebar) -->
                    @include('shop::categories.filters')

                    <!-- Product Listing Container -->
                    <div class="flex-1 min-w-0">
                        <!-- Desktop Product Listing Toolbar -->
                        <div class="max-md:hidden">
                            @include('shop::categories.toolbar')
                        </div>

                        <!-- Product List Mode Container -->
                        <div
                            class="mt-6 grid grid-cols-1 gap-6"
                            v-if="(filters.toolbar.applied.mode ?? filters.toolbar.default.mode) === 'list'"
                        >
                            <!-- Shimmer Loading State -->
                            <template v-if="isLoading">
                                <x-shop::shimmer.products.cards.list count="12" />
                            </template>

                            <template v-else>
                                <template v-if="products.length">
                                    <x-shop::products.card
                                        ::mode="'list'"
                                        v-for="product in products"
                                    />
                                </template>

                                <!-- Empty State -->
                                <template v-else>
                                    <div class="m-auto grid w-full place-content-center items-center justify-items-center py-20 text-center rounded-3xl bg-white border border-[#0D5C3A]/15 p-8 max-w-lg mx-auto shadow-[0_8px_30px_-6px_rgba(13,92,58,0.08)] space-y-4">
                                        <div class="w-16 h-16 rounded-2xl bg-[#0D5C3A]/10 border border-[#0D5C3A]/20 flex items-center justify-center text-[#0D5C3A]">
                                            <span class="material-symbols-outlined text-3xl">search_off</span>
                                        </div>

                                        <div class="space-y-2">
                                            <h3 class="font-serif text-xl sm:text-2xl font-bold text-[#062E1A]">
                                                No Matching Formulations
                                            </h3>
                                            <p class="text-xs sm:text-sm text-[#4A5568] leading-relaxed max-w-xs mx-auto">
                                                We couldn't find any products matching your search query. Try checking for typos or explore our botanical categories.
                                            </p>
                                        </div>

                                        <a
                                            href="{{ route('shop.product_or_category.index', 'products') }}"
                                            class="btn-emerald-primary !px-7 !py-3 text-xs"
                                        >
                                            Explore All Products
                                        </a>
                                    </div>
                                </template>
                            </template>
                        </div>

                        <!-- Product Grid Mode Container -->
                        <div v-else class="mt-6">
                            <!-- Shimmer Loading State -->
                            <template v-if="isLoading">
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
                                    <x-shop::shimmer.products.cards.grid count="12" />
                                </div>
                            </template>

                            <template v-else>
                                <template v-if="products.length">
                                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
                                        <x-shop::products.card
                                            ::mode="'grid'"
                                            v-for="product in products"
                                        />
                                    </div>
                                </template>

                                <!-- Empty State -->
                                <template v-else>
                                    <div class="m-auto grid w-full place-content-center items-center justify-items-center py-20 text-center rounded-3xl bg-white border border-[#0D5C3A]/15 p-8 max-w-lg mx-auto shadow-[0_8px_30px_-6px_rgba(13,92,58,0.08)] space-y-4">
                                        <div class="w-16 h-16 rounded-2xl bg-[#0D5C3A]/10 border border-[#0D5C3A]/20 flex items-center justify-center text-[#0D5C3A]">
                                            <span class="material-symbols-outlined text-3xl">search_off</span>
                                        </div>

                                        <div class="space-y-2">
                                            <h3 class="font-serif text-xl sm:text-2xl font-bold text-[#062E1A]">
                                                No Matching Formulations
                                            </h3>
                                            <p class="text-xs sm:text-sm text-[#4A5568] leading-relaxed max-w-xs mx-auto">
                                                We couldn't find any products matching your search query. Try checking for typos or explore our botanical categories.
                                            </p>
                                        </div>

                                        <a
                                            href="{{ route('shop.product_or_category.index', 'products') }}"
                                            class="btn-emerald-primary !px-7 !py-3 text-xs"
                                        >
                                            Explore All Products
                                        </a>
                                    </div>
                                </template>
                            </template>
                        </div>

                        <!-- Load More Pagination Button -->
                        <div class="mt-12 text-center" v-if="links.next">
                            <button
                                class="btn-emerald-outline !px-10 !py-3 text-xs"
                                @click="loadMoreProducts"
                                v-if="! loader"
                            >
                                @lang('shop::app.categories.view.load-more')
                            </button>

                            <button
                                v-else
                                class="btn-emerald-outline !px-10 !py-3 text-xs opacity-75 cursor-wait"
                                disabled
                            >
                                <span class="inline-flex items-center gap-2">
                                    <svg class="w-4 h-4 animate-spin text-[#0D5C3A]" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <span>Loading Formulations...</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </script>

        <script type="module">
            app.component('v-search', {
                template: '#v-search-template',

                data() {
                    return {
                        isMobile: window.innerWidth <= 767,

                        isLoading: true,

                        isDrawerActive: {
                            toolbar: false,

                            filter: false,
                        },

                        filters: {
                            toolbar: {
                                default: {},

                                applied: {},
                            },

                            filter: {},
                        },

                        products: [],

                        links: {},

                        loader: false,
                    }
                },

                computed: {
                    queryParams() {
                        let queryParams = Object.assign({}, this.filters.filter, this.filters.toolbar.applied);

                        return this.removeJsonEmptyValues(queryParams);
                    },

                    queryString() {
                        return this.jsonToQueryString(this.queryParams);
                    },
                },

                watch: {
                    queryParams() {
                        this.getProducts();
                    },

                    queryString() {
                        window.history.pushState({}, '', '?' + this.queryString);
                    },
                },

                methods: {
                    setFilters(type, filters) {
                        this.filters[type] = filters;
                    },

                    clearFilters(type, filters) {
                        this.filters[type] = {};
                    },

                    getProducts() {
                        this.isDrawerActive = {
                            toolbar: false,

                            filter: false,
                        };

                        document.body.style.overflow = 'auto';

                        this.isLoading = true;

                        let params = Object.assign({ query: "{{ $currentQuery }}" }, this.queryParams);

                        this.$axios.get("{{ route('shop.api.products.index') }}", {
                            params: params
                        })
                            .then(response => {
                                this.isLoading = false;

                                this.products = response.data.data;

                                this.links = response.data.links;
                            }).catch(error => {
                                console.log(error);
                                this.isLoading = false;
                            });
                    },

                    loadMoreProducts() {
                        if (! this.links.next) {
                            return;
                        }

                        this.loader = true;

                        this.$axios.get(this.links.next)
                            .then(response => {
                                this.loader = false;

                                this.products = [...this.products, ...response.data.data];

                                this.links = response.data.links;
                            }).catch(error => {
                                console.log(error);
                                this.loader = false;
                            });
                    },

                    removeJsonEmptyValues(params) {
                        Object.keys(params).forEach(function (key) {
                            if ((! params[key] && params[key] !== undefined)) {
                                delete params[key];
                            }

                            if (Array.isArray(params[key])) {
                                params[key] = params[key].join(',');
                            }
                        });

                        return params;
                    },

                    jsonToQueryString(params) {
                        let parameters = new URLSearchParams();

                        for (const key in params) {
                            parameters.append(key, params[key]);
                        }

                        return parameters.toString();
                    }
                },
            });
        </script>
    @endPushOnce
</x-shop::layouts>
