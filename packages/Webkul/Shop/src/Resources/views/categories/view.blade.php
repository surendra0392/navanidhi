<!-- SEO Meta Content -->
@push('meta')
    @php
        $categoryTitle = trim($category->meta_title) != '' ? $category->meta_title : $category->name . ' — Navanidhi Naturals';
        $categoryDesc  = trim($category->meta_description) != '' ? $category->meta_description : \Illuminate\Support\Str::limit(strip_tags($category->description), 160, '');
        $categoryUrl   = url('/' . $category->slug);
    @endphp

    <meta name="title" content="{{ $categoryTitle }}" />
    <meta name="description" content="{{ $categoryDesc }}" />
    <meta name="keywords" content="{{ $category->meta_keywords }}" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $categoryTitle }}" />
    <meta name="twitter:description" content="{{ $categoryDesc }}" />

    <meta property="og:type" content="product.group" />
    <meta property="og:title" content="{{ $categoryTitle }}" />
    <meta property="og:description" content="{{ $categoryDesc }}" />
    <meta property="og:url" content="{{ $categoryUrl }}" />

    @if (core()->getConfigData('catalog.rich_snippets.categories.enable'))
        <script type="application/ld+json">
            {!! app('Webkul\Product\Helpers\SEO')->getCategoryJsonLd($category) !!}
        </script>
    @endif
@endPush

<x-shop::layouts>
    <!-- Page Title -->
    <x-slot:title>
        {{ trim($category->meta_title) != "" ? $category->meta_title : $category->name . ' — Navanidhi Naturals' }}
    </x-slot>

    <!-- Schema.org Breadcrumbs Navigation -->
    <div class="site-container pt-4 pb-2 sm:pt-6 sm:pb-3">
        @php
            $breadcrumbItems = [];
            // Build hierarchy if parents exist
            if ($category->parent && $category->parent->id != core()->getCurrentChannel()->root_category_id) {
                $breadcrumbItems[] = [
                    'name' => $category->parent->name,
                    'url'  => route('shop.product_or_category.index', $category->parent->slug),
                ];
            }
            $breadcrumbItems[] = [
                'name' => $category->name,
                'url'  => route('shop.product_or_category.index', $category->slug),
            ];
        @endphp

        <x-navanidhi::category.breadcrumb :items="$breadcrumbItems" />
    </div>

    {!! view_render_event('bagisto.shop.categories.view.banner_path.before') !!}

    <!-- Optional Category Banner Image -->
    @if ($category->banner_path)
        <div class="site-container mt-2 sm:mt-4 mb-4">
            <div class="relative w-full aspect-[4/1] max-h-[280px] overflow-hidden rounded-3xl bg-[#0D5C3A]/5 border border-[#0D5C3A]/10 shadow-sm">
                <img
                    src="{{ Storage::url($category->banner_path) }}"
                    alt="{{ $category->name }}"
                    class="w-full h-full object-cover"
                    loading="eager"
                />
            </div>
        </div>
    @endif

    {!! view_render_event('bagisto.shop.categories.view.banner_path.after') !!}

    <!-- Category Editorial Hero / Introduction -->
    @if (in_array($category->display_mode, [null, 'description_only', 'products_and_description']))
        <section class="site-container pt-4 pb-8 sm:pt-6 sm:pb-10 text-center max-w-3xl mx-auto space-y-3.5" aria-labelledby="category-hero-heading">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 backdrop-blur-md">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                @if (str_contains(strtolower($category->slug ?? ''), 'spice'))
                    Pure Farm Spices &bull; Stone-Milled
                @else
                    Pure Botanical Formulations &bull; MAN Agro Foods
                @endif
            </span>

            <h1 id="category-hero-heading" class="font-serif text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-tight drop-shadow-md">
                {{ $category->name }}
            </h1>

            @if ($category->description)
                <div class="text-xs sm:text-sm text-white/80 leading-relaxed mx-auto max-w-2xl prose-p:my-1">
                    {!! $category->description !!}
                </div>
            @endif

            <!-- Sibling / Quick Category Navigation Discovery Chips -->
            @php
                $allRootCategories = app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id);
            @endphp
            @if ($allRootCategories && $allRootCategories->count())
                <div class="flex items-center justify-center gap-2 pt-3 flex-wrap" role="navigation" aria-label="Category shortcuts">
                    @foreach ($allRootCategories as $rootCat)
                        @php
                            $isCurrent = $category->id == $rootCat->id || $category->slug == $rootCat->slug;
                        @endphp
                        <a
                            href="{{ route('shop.product_or_category.index', $rootCat->slug) }}"
                            class="px-4 py-1.5 rounded-full text-xs font-bold tracking-wide transition-all border {{ $isCurrent ? 'bg-emerald-600 text-white shadow-md border-emerald-500' : 'bg-[#041a0e]/75 backdrop-blur-md border-white/20 text-white/90 hover:bg-white/20 hover:text-white hover:border-emerald-400' }}"
                        >
                            {{ $rootCat->name }}
                        </a>
                    @endforeach
                </div>
            @endif
        </section>
    @endif

    <!-- Category Products & Filters Section -->
    @if (in_array($category->display_mode, [null, 'products_only', 'products_and_description']))
        <v-category>
            <x-shop::shimmer.categories.view />
        </v-category>
    @endif

    @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-category-template"
        >
            <div class="site-container pb-20 sm:pb-28">
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
                                     <div class="m-auto grid w-full place-content-center items-center justify-items-center py-24 text-center rounded-3xl nv-glass-card border border-white/15 p-8 max-w-lg mx-auto shadow-2xl space-y-4">
                                         <div class="w-16 h-16 rounded-full bg-emerald-500/20 flex items-center justify-center text-emerald-400">
                                             <span class="material-symbols-outlined text-3xl">spa</span>
                                         </div>

                                         <div class="space-y-2">
                                             <h3 class="font-serif text-xl sm:text-2xl font-bold text-white">
                                                 No Formulations Found
                                             </h3>
                                             <p class="text-xs sm:text-sm text-white/70 leading-relaxed max-w-xs mx-auto">
                                                 There are currently no products matching your selected filter criteria. Try adjusting or clearing your filters.
                                             </p>
                                         </div>

                                         <button
                                             type="button"
                                             class="btn-emerald-outline !px-6 !py-2.5 text-xs font-bold cursor-pointer text-white border-white/30 hover:border-emerald-400 hover:text-emerald-300"
                                             @click="clearFilters('filter', '')"
                                         >
                                             Reset All Filters
                                         </button>
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
                                    <div class="m-auto grid w-full place-content-center items-center justify-items-center py-24 text-center rounded-3xl nv-glass-card border border-white/15 p-8 max-w-lg mx-auto shadow-2xl space-y-4">
                                        <div class="w-16 h-16 rounded-full bg-emerald-500/20 flex items-center justify-center text-emerald-400">
                                            <span class="material-symbols-outlined text-3xl">spa</span>
                                        </div>

                                        <div class="space-y-2">
                                             <h3 class="font-serif text-xl sm:text-2xl font-bold text-white">
                                                No Formulations Found
                                            </h3>
                                            <p class="text-xs sm:text-sm text-white/70 leading-relaxed max-w-xs mx-auto">
                                                There are currently no products matching your selected filter criteria. Try adjusting or clearing your filters.
                                            </p>
                                        </div>

                                        <button
                                             type="button"
                                             class="btn-emerald-outline !px-6 !py-2.5 text-xs font-bold cursor-pointer text-white border-white/30 hover:border-emerald-400 hover:text-emerald-300"
                                             @click="clearFilters('filter', '')"
                                        >
                                            Reset All Filters
                                        </button>
                                    </div>
                                </template>
                            </template>
                        </div>

                        <!-- Load More Pagination Button -->
                        <div class="mt-12 text-center" v-if="links.next">
                            <button
                                class="btn-emerald-outline !px-10 !py-3 text-xs font-bold cursor-pointer"
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
            app.component('v-category', {
                template: '#v-category-template',

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

                        this.$axios.get("{{ route('shop.api.products.index', ['category_id' => $category->id]) }}", {
                            params: this.queryParams
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
