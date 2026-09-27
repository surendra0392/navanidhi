<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.account.wishlist.page-title') | Navanidhi Naturals
    </x-slot>

    <!-- Breadcrumbs -->
    @if ((core()->getConfigData('general.general.breadcrumbs.shop')))
        @section('breadcrumbs')
            <x-shop::breadcrumbs name="wishlist" />
        @endSection
    @endif

    <x-shop::layouts.account.navigation />

    <!-- Main Content Area -->
    <div class="flex-1 w-full rounded-2xl border border-[#DCD3C3] bg-white p-6 sm:p-8 shadow-sm space-y-6">
        <!-- Wishlist Vue Component -->
        <v-wishlist-products>
            <x-shop::shimmer.customers.account.wishlist :count="4" />
        </v-wishlist-products>
    </div>

    @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-wishlist-products-template"
        >
            <div>
                <!-- Wishlist Shimmer Effect -->
                <template v-if="isLoading">
                    <x-shop::shimmer.customers.account.wishlist :count="4" />
                </template>

                {!! view_render_event('bagisto.shop.customers.account.wishlist.list.before') !!}

                <!-- Wishlist Information -->
                <template v-else>
                    <div class="flex items-center justify-between border-b border-[#DCD3C3]/60 pb-4">
                        <div class="flex items-center gap-3">
                            <a
                                class="lg:hidden flex h-8 w-8 items-center justify-center rounded-lg border border-[#DCD3C3] text-[#111111]"
                                href="{{ route('shop.customers.account.index') }}"
                            >
                                <span class="material-symbols-outlined text-base">arrow_back</span>
                            </a>

                            <div>
                                <div class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-[#EBF3EE] text-[#0F4D2E] text-[10px] font-bold tracking-wider uppercase">
                                    <span class="material-symbols-outlined text-xs">favorite</span>
                                    <span>Saved Rituals</span>
                                </div>
                                <h1 class="font-serif text-xl sm:text-2xl font-bold text-[#111111] mt-0.5">
                                    @lang('shop::app.customers.account.wishlist.page-title')
                                </h1>
                            </div>
                        </div>

                        {!! view_render_event('bagisto.shop.customers.account.wishlist.delete_all.before') !!}

                        <button
                            type="button"
                            class="px-3.5 py-1.5 rounded-xl border border-red-200 text-xs font-semibold text-red-700 hover:bg-red-50 transition-all inline-flex items-center gap-1"
                            @click="removeAll"
                            v-if="wishlistItems.length"
                        >
                            <span class="material-symbols-outlined text-sm">delete_sweep</span>
                            <span>@lang('shop::app.customers.account.wishlist.delete-all')</span>
                        </button>

                        {!! view_render_event('bagisto.shop.customers.account.wishlist.delete_all.after') !!}
                    </div>

                    <!-- Wishlist Items Grid -->
                    <template v-if="wishlistItems.length">
                        <div class="divide-y divide-[#DCD3C3]/60">
                            <v-wishlist-products-item
                                v-for="(wishlist, index) in wishlistItems"
                                :wishlist="wishlist"
                                :key="wishlist.id"
                                @wishlist-items="(items) => wishlistItems = items"
                            >
                                <x-shop::shimmer.customers.account.wishlist />
                            </v-wishlist-products-item>
                        </div>
                    </template>

                    <!-- Empty Wishlist State -->
                    <template v-else>
                        <div class="py-16 text-center space-y-4">
                            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-[#EBF3EE] text-[#0F4D2E] text-2xl">
                                <span class="material-symbols-outlined text-3xl">favorite_border</span>
                            </div>

                            <div class="space-y-1">
                                <h3 class="font-serif text-lg font-bold text-[#111111]">
                                    @lang('shop::app.customers.account.wishlist.empty')
                                </h3>
                                <p class="text-xs text-[#666666] leading-relaxed max-w-sm mx-auto">
                                    Curate your favorite botanical powders and functional wellness blends for future replenishment.
                                </p>
                            </div>

                            <div class="pt-2">
                                <a
                                    href="{{ url('/botanical-herbal-powders') }}"
                                    class="inline-flex items-center gap-2 text-xs uppercase tracking-widest font-semibold px-6 py-3 rounded-xl shadow-sm transition-all"
                                    style="background-color: #0F4D2E !important; color: #FFFFFF !important;"
                                >
                                    <span>Explore Botanical Catalog</span>
                                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                                </a>
                            </div>
                        </div>
                    </template>
                </template>

                {!! view_render_event('bagisto.shop.customers.account.wishlist.list.after') !!}
            </div>
        </script>

        <script
            type="text/x-template"
            id="v-wishlist-products-item-template"
        >
            <div class="py-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="flex items-center gap-4 min-w-0">
                    {!! view_render_event('bagisto.shop.customers.account.wishlist.image.before') !!}

                    <a :href="'{{ route('shop.product_or_category.index', ':slug') }}'.replace(':slug', wishlist.product.url_key)" class="shrink-0">
                        <div class="w-16 h-16 rounded-xl border border-[#DCD3C3] bg-[#F7F5EE] overflow-hidden flex items-center justify-center p-1">
                            <img
                                class="w-full h-full object-contain"
                                :src="wishlist.product.base_image.small_image_url"
                                :alt="wishlist.product.name"
                            />
                        </div>
                    </a>

                    {!! view_render_event('bagisto.shop.customers.account.wishlist.image.after') !!}

                    <div class="space-y-1 min-w-0">
                        <a :href="'{{ route('shop.product_or_category.index', ':slug') }}'.replace(':slug', wishlist.product.url_key)">
                            <p class="font-serif text-sm font-bold text-[#111111] hover:text-[#0F4D2E] transition-colors truncate">
                                @{{ wishlist.product.name }}
                            </p>
                        </a>

                        <div class="text-xs font-semibold text-[#0F4D2E]" v-html="wishlist.product.price_html"></div>

                        <!-- Pack attributes if configurable -->
                        <div
                            class="flex flex-wrap gap-1.5"
                            v-if="wishlist.options?.attributes"
                        >
                            <span
                                v-for="option in wishlist.options.attributes"
                                class="px-2 py-0.5 rounded bg-[#EBF3EE] text-[#0F4D2E] text-[10px] font-semibold uppercase tracking-wider"
                            >
                                @{{ option.option_label }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Actions: Move to Cart & Delete -->
                <div class="flex items-center justify-between sm:justify-end gap-3 w-full sm:w-auto">
                    @if (core()->getConfigData('sales.checkout.shopping_cart.cart_page'))
                        <button
                            type="button"
                            class="h-9 px-4 rounded-xl text-xs uppercase tracking-wider font-semibold inline-flex items-center gap-1.5 shadow-sm transition-all"
                            style="background-color: #0F4D2E !important; color: #FFFFFF !important;"
                            :disabled="movingToCart"
                            @click="moveToCart"
                        >
                            <span class="material-symbols-outlined text-sm">shopping_bag</span>
                            <span>@lang('shop::app.customers.account.wishlist.move-to-cart')</span>
                        </button>
                    @endif

                    <button
                        type="button"
                        class="p-2 rounded-xl text-[#666666] hover:text-red-700 hover:bg-red-50 transition-colors"
                        @click="remove"
                        aria-label="Remove item"
                    >
                        <span class="material-symbols-outlined text-lg">delete</span>
                    </button>
                </div>
            </div>
        </script>

        <script type="module">
            app.component('v-wishlist-products', {
                template: '#v-wishlist-products-template',

                data() {
                    return {
                        isLoading: true,
                        wishlistItems: [],
                    }
                },

                mounted() {
                    this.get();
                },

                methods: {
                    get() {
                        this.$axios.get("{{ route('shop.api.customers.account.wishlist.index') }}")
                            .then(response => {
                                this.isLoading = false;
                                this.wishlistItems = response.data.data;
                            })
                            .catch(error => {
                                this.isLoading = false;
                            });
                    },

                    removeAll() {
                        this.$emitter.emit('open-confirm-modal', {
                            agree: () => {
                                this.$axios.delete("{{ route('shop.api.customers.account.wishlist.destroy_all') }}")
                                    .then(response => {
                                        this.wishlistItems = [];
                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                                    })
                                    .catch(error => {});
                            }
                        });
                    }
                }
            });

            app.component('v-wishlist-products-item', {
                template: '#v-wishlist-products-item-template',

                props: ['wishlist'],

                data() {
                    return {
                        movingToCart: false,
                    }
                },

                methods: {
                    moveToCart() {
                        this.movingToCart = true;
                        let url = "{{ route('shop.api.customers.account.wishlist.move_to_cart', ':id') }}".replace(':id', this.wishlist.id);

                        let qty = this.wishlist.options?.quantity ?? 1;

                        this.$axios.post(url, { quantity: qty })
                            .then(response => {
                                this.movingToCart = false;
                                this.$emit('wishlist-items', response.data.data);
                                this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                            })
                            .catch(error => {
                                this.movingToCart = false;
                                this.$emitter.emit('add-flash', { type: 'warning', message: error.response.data.message });
                            });
                    },

                    remove() {
                        let url = "{{ route('shop.api.customers.account.wishlist.destroy', ':id') }}".replace(':id', this.wishlist.id);

                        this.$axios.delete(url)
                            .then(response => {
                                this.$emit('wishlist-items', response.data.data);
                                this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                            })
                            .catch(error => {});
                    }
                }
            });
        </script>
    @endPushOnce
</x-shop::layouts.account>
