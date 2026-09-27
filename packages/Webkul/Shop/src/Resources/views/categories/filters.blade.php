{!! view_render_event('bagisto.shop.categories.view.filters.before') !!}

<!-- Desktop Filters Navigation -->
<div v-if="! isMobile" class="w-[260px] shrink-0">
    <!-- Filters Vue Component -->
    <v-filters
        @filter-applied="setFilters('filter', $event)"
        @filter-clear="clearFilters('filter', $event)"
    >
        <!-- Category Filter Shimmer Effect -->
        <x-shop::shimmer.categories.filters />
    </v-filters>
</div>

<!-- Mobile Filters Navigation (Floating Bottom Bar) -->
<div
    class="fixed bottom-0 z-30 grid w-full max-w-full grid-cols-[1fr_auto_1fr] items-center justify-items-center border-t border-white/15 bg-[#041a0e]/95 backdrop-blur-xl px-5 shadow-2xl ltr:left-0 rtl:right-0 md:hidden"
    v-if="isMobile"
>
    <!-- Filter Drawer -->
    <x-shop::drawer
        position="left"
        width="100%"
        ::is-active="isDrawerActive.filter"
    >
        <!-- Drawer Toggler -->
        <x-slot:toggle>
            <div
                class="flex cursor-pointer items-center justify-center gap-x-2 py-3.5 text-xs font-bold uppercase tracking-wider text-emerald-400"
                @click="isDrawerActive.filter = true"
            >
                <span class="icon-filter-1 text-xl"></span>
                <span>@lang('shop::app.categories.filters.filter')</span>
            </div>
        </x-slot>
 
        <!-- Drawer Header -->
        <x-slot:header class="!border-b !border-white/15 !bg-[#041a0e]">
            <div class="flex items-center justify-between w-full">
                <p class="font-serif text-lg font-bold text-white">
                    @lang('shop::app.categories.filters.filters')
                </p>

                <button
                    type="button"
                    class="cursor-pointer text-xs font-bold text-amber-400 hover:text-white uppercase tracking-wider ltr:mr-4 rtl:ml-4"
                    @click="clearFilters('filter', '')"
                >
                    @lang('shop::app.categories.filters.clear-all')
                </button>
            </div>
        </x-slot>

        <!-- Drawer Content -->
        <x-slot:content class="!p-4 !bg-[#041a0e]">
            <v-filters
                @filter-applied="setFilters('filter', $event)"
                @filter-clear="clearFilters('filter', $event)"
            >
                <x-shop::shimmer.categories.filters />
            </v-filters>
        </x-slot>
    </x-shop::drawer>

    <!-- Separator -->
    <span class="h-6 w-px bg-white/20"></span>

    <!-- Sort Drawer -->
    <x-shop::drawer
        position="bottom"
        width="100%"
        ::is-active="isDrawerActive.toolbar"
    >
        <x-slot:toggle>
            <div
                class="flex cursor-pointer items-center justify-center gap-x-2 py-3.5 text-xs font-bold uppercase tracking-wider text-emerald-400"
                @click="isDrawerActive.toolbar = true"
            >
                <span class="icon-sort-1 text-xl"></span>
                <span>@lang('shop::app.categories.filters.sort')</span>
            </div>
        </x-slot>

        <x-slot:header class="!border-b !border-white/15 !bg-[#041a0e]">
            <div class="flex items-center justify-between w-full">
                <p class="font-serif text-lg font-bold text-white">
                    @lang('shop::app.categories.filters.sort')
                </p>
            </div>
        </x-slot>

        <x-slot:content class="!p-0 !bg-[#041a0e]">
            @include('shop::categories.toolbar')
        </x-slot>
    </x-shop::drawer>
</div>

{!! view_render_event('bagisto.shop.categories.view.filters.after') !!}

@pushOnce('scripts')
    <!-- Filters Vue template -->
    <script
        type="text/x-template"
        id="v-filters-template"
    >
        <!-- Filter Shimmer Effect -->
        <template v-if="isLoading">
            <x-shop::shimmer.categories.filters />
        </template>

        <!-- Filters Container -->
        <template v-else>
            <div class="panel-side journal-scroll grid max-h-[1320px] w-full grid-cols-[1fr] overflow-y-auto overflow-x-hidden md:ltr:pr-4 md:rtl:pl-4">
                <!-- Filters Header Container -->
                <div class="flex h-[48px] items-center justify-between border-b border-white/15 pb-2 max-md:hidden">
                    <p class="font-serif text-base font-bold text-white">
                        @lang('shop::app.categories.filters.filters')
                    </p>

                    <button
                        type="button"
                        class="cursor-pointer text-[11px] font-bold uppercase tracking-wider text-amber-400 hover:text-white transition-colors"
                        tabindex="0"
                        @click="clear()"
                    >
                        @lang('shop::app.categories.filters.clear-all')
                    </button>
                </div>

                <!-- Categories Hierarchy Accordion -->
                @php
                    $categoriesTree = app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id);
                @endphp
                @if ($categoriesTree && $categoriesTree->count())
                    <x-shop::accordion class="border-b border-white/10">
                        <x-slot:header class="px-0 py-3.5">
                            <p class="font-serif text-sm font-bold text-white uppercase tracking-wider">
                                Botanical Categories
                            </p>
                        </x-slot>
                        <x-slot:content class="!p-0 pb-3">
                            <ul class="flex flex-col space-y-1 text-xs">
                                @foreach ($categoriesTree as $cat)
                                    @php
                                        $catUrl = $cat->url_path ? '/' . $cat->url_path : '/' . $cat->slug;
                                        $isActive = request()->is($cat->slug) || request()->is($cat->url_path) || (isset($category) && $category->id == $cat->id);
                                    @endphp
                                    <li>
                                        <a 
                                            href="{{ $catUrl }}" 
                                            class="flex items-center justify-between w-full px-3 py-2.5 rounded-xl transition-all {{ $isActive ? 'font-bold text-emerald-300 bg-emerald-500/20 border border-emerald-500/30 shadow-xs' : 'text-white/80 hover:bg-white/10 hover:text-white' }}"
                                        >
                                            <span>{{ $cat->name }}</span>
                                            @if ($isActive)
                                                <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                                            @endif
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </x-slot>
                    </x-shop::accordion>
                @endif

                <!-- Dynamic Filter Items Component -->
                <v-filter-item
                    ref="filterItemComponent"
                    :key="filterIndex"
                    :filter="filter"
                    v-for='(filter, filterIndex) in filters.available'
                    @values-applied="applyFilter(filter, $event)"
                >
                </v-filter-item>
            </div>
        </template>
    </script>

    <!-- Filter Item Vue template -->
    <script
        type="text/x-template"
        id="v-filter-item-template"
    >
        <x-shop::accordion class="border-b border-white/10 last:border-b-0">
            <!-- Filter Item Header -->
            <x-slot:header class="px-0 py-3.5">
                <div class="flex items-center justify-between w-full">
                    <p class="font-serif text-sm font-bold text-white uppercase tracking-wider">
                        @{{ filter.name }}
                    </p>
                </div>
            </x-slot>

            <!-- Filter Item Content -->
            <x-slot:content class="!p-0 pb-3.5">
                <!-- Price Range Filter -->
                <ul v-if="filter.type === 'price'">
                    <li>
                        <v-price-filter
                            :key="refreshKey"
                            :default-price-range="appliedValues"
                            :default-attribute-code="filter.code"
                            @set-price-range="applyValue($event)"
                        >
                        </v-price-filter>
                    </li>
                </ul>

                <!-- Checkbox Filter Options -->
                <template v-else>
                    <!-- Search Box For Options if large list -->
                    <div
                        class="flex flex-col gap-1 mb-2.5"
                        v-if="filter.type !== 'boolean'"
                    >
                        <div class="relative">
                            <div class="icon-search pointer-events-none absolute top-2.5 text-lg text-white/50 ltr:left-3 rtl:right-3"></div>

                            <input
                                type="text"
                                class="block w-full rounded-xl border border-white/20 bg-white/10 px-9 py-2 text-xs font-semibold text-white placeholder:text-white/40 focus:border-emerald-400 focus:outline-none focus:ring-1 focus:ring-emerald-400 backdrop-blur-md"
                                placeholder="@lang('shop::app.categories.filters.search.title')"
                                v-model="searchQuery"
                                v-debounce:500="searchOptions"
                            />
                        </div>

                        <p
                            class="flex flex-row-reverse text-[10px] text-white/60"
                            v-text="
                                '@lang('shop::app.categories.filters.search.results-info', ['currentCount' => 'currentCount', 'totalCount' => 'totalCount'])'
                                    .replace('currentCount', options.length)
                                    .replace('totalCount', meta.total)
                            "
                            v-if="meta && meta.total > 0"
                        >
                        </p>
                    </div>

                    <!-- Filter Options -->
                    <ul class="space-y-1 text-xs text-white">
                        <template v-if="options.length">
                            <li
                                :key="`${filter.id}_${option.id}`"
                                v-for="(option, optionIndex) in options"
                            >
                                <div class="flex select-none items-center gap-x-2.5 rounded-xl p-1.5 hover:bg-white/10 transition-colors">
                                    <input
                                        type="checkbox"
                                        :id="`filter_${filter.id}_option_${option.id}`"
                                        class="peer hidden"
                                        :value="option.id"
                                        v-model="appliedValues"
                                        @change="applyValue"
                                    />

                                    <label
                                        class="icon-uncheck peer-checked:icon-check-box cursor-pointer text-xl text-white/40 peer-checked:text-emerald-400"
                                        role="checkbox"
                                        aria-checked="false"
                                        :aria-label="option.name"
                                        :aria-labelledby="'label_option_' + option.id"
                                        tabindex="0"
                                        :for="`filter_${filter.id}_option_${option.id}`"
                                    >
                                    </label>

                                    <label
                                        class="w-full cursor-pointer text-xs font-semibold text-white/90"
                                        :id="'label_option_' + option.id"
                                        :for="`filter_${filter.id}_option_${option.id}`"
                                        role="button"
                                        tabindex="0"
                                    >
                                        @{{ option.name }}
                                    </label>
                                </div>
                            </li>
                        </template>

                        <template v-else>
                            <li
                                class="flex flex-col items-center justify-center gap-2 py-3 text-xs text-white/60"
                                v-if="! isLoadingMore"
                            >
                                @lang('shop::app.categories.filters.search.no-options-available')
                            </li>

                            <div
                                class="mt-2 space-y-2"
                                v-else
                            >
                                <div class="shimmer h-4 w-3/4 rounded bg-white/10"></div>
                                <div class="shimmer h-4 w-1/2 rounded bg-white/10"></div>
                            </div>
                        </template>
                    </ul>

                    <!-- Load More Button -->
                    <div class="flex justify-center pt-2.5" v-if="meta && meta.current_page < meta.last_page">
                        <button
                            type="button"
                            class="rounded-full border border-white/25 px-4 py-1.5 text-[11px] font-bold text-emerald-300 hover:bg-emerald-500/20 transition-colors shadow-2xs"
                            @click="loadMoreOptions"
                            :disabled="isLoadingMore"
                        >
                            <span v-if="isLoadingMore">
                                @lang('shop::app.categories.filters.search.loading')
                            </span>

                            <span v-else>
                                @lang('shop::app.categories.filters.search.load-more')
                            </span>
                        </button>
                    </div>
                </template>
            </x-slot>
        </x-shop::accordion>
    </script>

    <script
        type="text/x-template"
        id="v-price-filter-template"
    >
        <div class="py-2">
            <!-- Price Range Filter Shimmer -->
            <template v-if="isLoading">
                <x-shop::shimmer.range-slider />
            </template>

            <template v-else>
                <x-shop::range-slider
                    ::key="refreshKey"
                    default-type="price"
                    ::default-allowed-max-range="allowedMaxPrice"
                    ::default-min-range="minRange"
                    ::default-max-range="maxRange"
                    @change-range="setPriceRange($event)"
                />
            </template>
        </div>
    </script>

    <script type='module'>
        app.component('v-filters', {
            template: '#v-filters-template',

            data() {
                return {
                    isLoading: true,

                    filters: {
                        available: {},

                        applied: {},
                    },
                };
            },

            mounted() {
                this.getFilters();

                this.setFilters();
            },

            methods: {
                getFilters() {
                    this.$axios.get('{{ route("shop.api.categories.attributes") }}', {
                            params: {
                                category_id: "{{ isset($category) ? $category->id : ''  }}",
                            }
                        })
                        .then((response) => {
                            this.isLoading = false;

                            this.filters.available = response.data.data;
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                },

                setFilters() {
                    let queryParams = new URLSearchParams(window.location.search);

                    queryParams.forEach((value, filter) => {
                        if (! ['sort', 'limit', 'mode'].includes(filter)) {
                            this.filters.applied[filter] = value.split(',');
                        }
                    });

                    this.$emit('filter-applied', this.filters.applied);
                },

                applyFilter(filter, values) {
                    if (values.length) {
                        this.filters.applied[filter.code] = values;
                    } else {
                        delete this.filters.applied[filter.code];
                    }

                    this.$emit('filter-applied', this.filters.applied);
                },

                clear() {
                    this.filters.applied = {};

                    if (this.$refs.filterItemComponent) {
                        this.$refs.filterItemComponent.forEach((filterItem) => {
                            if (filterItem.filter.type === 'price') {
                                filterItem.$data.appliedValues = null;
                            } else {
                                filterItem.$data.appliedValues = [];
                            }
                        });
                    }

                    this.$emit('filter-applied', this.filters.applied);
                },
            },
        });

        app.component('v-filter-item', {
            template: '#v-filter-item-template',

            props: ['filter'],

            data() {
                return {
                    options: [],

                    meta: null,

                    appliedValues: null,

                    currentPage: 1,

                    searchQuery: '',

                    isLoadingMore: true,

                    refreshKey: 0,
                }
            },

            created() {
                if (this.filter.type === 'price') {
                    this.appliedValues = this.$parent.$data.filters.applied[this.filter.code]?.join(',');
                } else {
                    this.appliedValues = this.$parent.$data.filters.applied[this.filter.code] ?? [];
                }
            },

            mounted() {
                this.fetchFilterOptions();
            },

            watch: {
                appliedValues: {
                    handler(newVal, oldVal) {
                        if (
                            this.filter.type === 'price' &&
                            newVal !== oldVal &&
                            !newVal
                        ) {
                            this.refreshKey++;
                        }
                    }
                }
            },

            methods: {
                applyValue($event) {
                    if (this.filter.type === 'price') {
                        this.appliedValues = $event;

                        this.$emit('values-applied', this.appliedValues);

                        return;
                    }

                    this.$emit('values-applied', this.appliedValues);
                },

                searchOptions() {
                    this.currentPage = 1;

                    this.fetchFilterOptions(true);
                },

                loadMoreOptions() {
                    this.currentPage++;

                    this.fetchFilterOptions(false);
                },

                fetchFilterOptions(replace = true) {
                    this.isLoadingMore = true;

                    const url = `{{ route("shop.api.categories.attribute_options", 'attribute_id') }}`.replace('attribute_id', this.filter.id);

                    this.$axios.get(url, {
                        params: {
                            page: this.currentPage,
                            search: this.searchQuery,
                        }
                    })
                    .then(response => {
                        this.isLoadingMore = false;

                        this.options = replace
                            ? response.data.data
                            : [...this.options, ...response.data.data];

                        this.meta = response.data.meta;
                    })
                    .catch(error => {
                        this.isLoadingMore = false;
                    });
                },
            },
        });

        app.component('v-price-filter', {
            template: '#v-price-filter-template',

            props: ['defaultPriceRange', 'defaultAttributeCode'],

            data() {
                return {
                    refreshKey: 0,
                    isLoading: true,
                    allowedMaxPrice: 100,
                    priceRange: null,
                };
            },

            computed: {
                minRange() {
                    let priceRange = (this.priceRange || '0,100').split(',');
                    return priceRange[0];
                },

                maxRange() {
                    let priceRange = (this.priceRange || '0,100').split(',');
                    return priceRange[1];
                }
            },

            created() {
                let defaultRange = Array.isArray(this.defaultPriceRange)
                    ? this.defaultPriceRange.join(',')
                    : this.defaultPriceRange;

                this.priceRange = defaultRange || [0, 100].join(',');
            },

            mounted() {
                this.getMaxPrice();
            },

            methods: {
                getMaxPrice() {
                    this.$axios.get('{{ route("shop.api.categories.max_price", isset($category) && $category->id ? $category->id : null) }}', {
                            params: {
                                attribute_code: this.defaultAttributeCode || 'price',
                            }
                        })
                        .then((response) => {
                            this.isLoading = false;

                            if (response.data.data.max_price) {
                                this.allowedMaxPrice = response.data.data.max_price;
                            }

                            if (! this.defaultPriceRange) {
                                this.priceRange = [0, this.allowedMaxPrice].join(',');
                            }

                            ++this.refreshKey;
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                },

                setPriceRange($event) {
                    this.priceRange = [$event.minRange, $event.maxRange].join(',');

                    this.$emit('set-price-range', this.priceRange);
                },
            },
        });
    </script>
@endPushOnce
