{!! view_render_event('bagisto.shop.categories.view.toolbar.before') !!}

<v-toolbar @filter-applied='setFilters("toolbar", $event)'></v-toolbar>

{!! view_render_event('bagisto.shop.categories.view.toolbar.after') !!}

@inject('toolbar', 'Webkul\Product\Helpers\Toolbar')

@pushOnce('scripts')
    <script
        type="text/x-template"
        id='v-toolbar-template'
    >
        <div>
            <!-- Desktop Toolbar -->
            <div class="flex items-center justify-between gap-4 max-md:hidden pb-4 mb-3 border-b border-white/10">
                {!! view_render_event('bagisto.shop.categories.toolbar.filter.before') !!}

                <!-- Product Sorting Dropdown -->
                <div class="flex items-center gap-3">
                    <span class="text-xs font-bold uppercase tracking-wider text-white/80">Sort By:</span>
                    <x-shop::dropdown
                        class="z-[1]"
                        position="bottom-left"
                    >
                        <x-slot:toggle>
                            <!-- Dropdown Toggler -->
                            <button class="flex min-w-[190px] cursor-pointer items-center justify-between gap-3 rounded-full border border-white/20 bg-[#041a0e]/80 px-4 py-2 text-xs font-bold text-white shadow-md backdrop-blur-md transition-all hover:border-emerald-400 hover:shadow-emerald-900/30 focus:outline-none focus:ring-1 focus:ring-emerald-400">
                                <span>@{{ sortLabel ?? "@lang('shop::app.products.sort-by.title')" }}</span>

                                <span
                                    class="icon-arrow-down text-lg text-emerald-400"
                                    role="presentation"
                                ></span>
                            </button>
                        </x-slot>

                        <!-- Dropdown Content -->
                        <x-slot:menu class="!p-1.5 !rounded-2xl !border-white/20 !shadow-2xl !bg-[#041a0e]/95 !backdrop-blur-xl">
                            <x-shop::dropdown.menu.item
                                v-for="(sort, key) in filters.available.sort"
                                ::class="{'!bg-emerald-600 !text-white font-bold': sort.value == filters.applied.sort, '!text-white/90 hover:!bg-white/10 !rounded-xl !text-xs !py-2.5': true}"
                                @click="apply('sort', sort.value)"
                            >
                                @{{ sort.title }}
                            </x-shop::dropdown.menu.item>
                        </x-slot>
                    </x-shop::dropdown>
                </div>

                {!! view_render_event('bagisto.shop.categories.toolbar.filter.after') !!}

                {!! view_render_event('bagisto.shop.categories.toolbar.pagination.before') !!}

                <!-- Product Pagination Limit & Layout Switcher -->
                <div class="flex items-center gap-5">
                    <!-- Product Pagination Limit -->
                    <div class="flex items-center gap-2.5">
                        <span class="text-xs font-bold uppercase tracking-wider text-white/80">Show:</span>
                        <x-shop::dropdown position="bottom-right">
                            <x-slot:toggle>
                                <button class="flex min-w-[84px] cursor-pointer items-center justify-between gap-2 rounded-full border border-white/20 bg-[#041a0e]/80 px-3.5 py-2 text-xs font-bold text-white shadow-md backdrop-blur-md transition-all hover:border-emerald-400 focus:outline-none">
                                    <span>@{{ filters.applied.limit ?? "@lang('shop::app.categories.toolbar.show')" }}</span>

                                    <span
                                        class="icon-arrow-down text-base text-emerald-400"
                                        role="presentation"
                                    ></span>
                                </button>
                            </x-slot>

                            <x-slot:menu class="!p-1.5 !rounded-2xl !border-white/20 !shadow-2xl !bg-[#041a0e]/95 !backdrop-blur-xl">
                                <x-shop::dropdown.menu.item
                                    v-for="(limit, key) in filters.available.limit"
                                    ::class="{'!bg-emerald-600 !text-white font-bold': limit == filters.applied.limit, '!text-white/90 hover:!bg-white/10 !rounded-xl !text-xs': true}"
                                    @click="apply('limit', limit)"
                                >
                                    @{{ limit }}
                                </x-shop::dropdown.menu.item>
                            </x-slot>
                        </x-shop::dropdown>
                    </div>

                    <!-- Listing Mode Switcher -->
                    <div class="flex items-center gap-1 border border-white/20 pl-4 bg-[#041a0e]/80 p-1 rounded-xl shadow-xs backdrop-blur-md">
                        <button
                            type="button"
                            class="p-1.5 rounded-lg transition-all cursor-pointer"
                            :class="(filters.applied.mode === 'grid') ? 'bg-emerald-600 text-white shadow-xs' : 'text-white/60 hover:text-white hover:bg-white/10'"
                            aria-label="@lang('shop::app.categories.toolbar.grid')"
                            @click="changeMode('grid')"
                        >
                            <span class="icon-grid-view text-xl"></span>
                        </button>

                        <button
                            type="button"
                            class="p-1.5 rounded-lg transition-all cursor-pointer"
                            :class="(filters.applied.mode === 'list') ? 'bg-emerald-600 text-white shadow-xs' : 'text-white/60 hover:text-white hover:bg-white/10'"
                            aria-label="@lang('shop::app.categories.toolbar.list')"
                            @click="changeMode('list')"
                        >
                            <span class="icon-listing text-xl"></span>
                        </button>
                    </div>
                </div>

                {!! view_render_event('bagisto.shop.categories.toolbar.pagination.after') !!}
            </div>

            <!-- Mobile Toolbar Drawer Content -->
            <div class="md:hidden p-4">
                <p class="text-xs font-bold uppercase tracking-widest text-emerald-400 mb-3">Sort Formulations By</p>
                <ul class="space-y-1">
                    <li
                        class="px-4 py-3 rounded-xl text-sm font-semibold transition-colors cursor-pointer"
                        :class="sort.value == filters.applied.sort ? 'bg-emerald-600 text-white font-bold' : 'text-white/80 hover:bg-white/10'"
                        v-for="(sort, key) in filters.available.sort"
                        @click="apply('sort', sort.value)"
                    >
                        @{{ sort.title }}
                    </li>
                </ul>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-toolbar', {
            template: '#v-toolbar-template',

            data() {
                return {
                    filters: {
                        available: {
                            sort: @json($toolbar->getAvailableOrders()),

                            limit: @json($toolbar->getAvailableLimits()),

                            mode: @json($toolbar->getAvailableModes()),
                        },

                        default: {
                            sort: '{{ $toolbar->getOrder([])['value'] }}',

                            limit: '{{ $toolbar->getLimit([]) }}',

                            mode: '{{ $toolbar->getMode([]) }}',
                        },

                        applied: {
                            sort: '{{ $toolbar->getOrder($params ?? [])['value'] }}',

                            limit: '{{ $toolbar->getLimit($params ?? []) }}',

                            mode: '{{ $toolbar->getMode($params ?? []) }}',
                        }
                    }
                };
            },

            created() {
                let queryParams = new URLSearchParams(window.location.search);

                queryParams.forEach((value, filter) => {
                    if (['sort', 'limit', 'mode'].includes(filter)) {
                        this.filters.applied[filter] = value;
                    }
                });
            },

            mounted() {
                this.setFilters();
            },

            computed: {
                sortLabel() {
                    return this.filters.available.sort.find(sort => sort.value === this.filters.applied.sort)?.title ?? 'Sort By';
                }
            },

            methods: {
                apply(type, value) {
                    this.filters.applied[type] = value;

                    this.setFilters();
                },

                changeMode(value = 'grid') {
                    this.filters.applied['mode'] = value;

                    this.setFilters();
                },

                setFilters() {
                    let filters = {};

                    for (let key in this.filters.applied) {
                        if (this.filters.applied[key] != this.filters.default[key]) {
                            filters[key] = this.filters.applied[key];
                        }
                    }

                    this.$emit('filter-applied', {
                        default: this.filters.default,
                        applied: filters,
                    });
                }
            },
        });
    </script>
@endPushOnce
