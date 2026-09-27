<!-- SEO Meta Content -->
@push('meta')
    <meta name="title" content="@lang('shop::app.checkout.cart.index.cart') | Navanidhi Naturals" />
    <meta name="description" content="Review and manage items in your Navanidhi Naturals cart." />
@endPush

<x-shop::layouts>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.checkout.cart.index.cart') | Navanidhi Naturals
    </x-slot>

    <div class="min-h-screen text-white bg-transparent" style="padding-bottom: 5rem !important;">
        <!-- Breadcrumbs -->
        <div class="site-container pt-5 pb-2 sm:pt-7 sm:pb-3">
            <nav aria-label="Breadcrumb" class="flex items-center space-x-2 text-[11px] sm:text-xs uppercase tracking-[0.14em] text-white/60">
                <a href="{{ route('shop.home.index') }}" class="hover:text-emerald-300 transition-colors">Home</a>
                <span class="text-white/30">/</span>
                <span class="text-emerald-300 font-semibold">Shopping Bag</span>
            </nav>
        </div>

        <!-- Page Header -->
        <div class="site-container pt-2 pb-6 sm:pt-4 sm:pb-8">
            <div class="space-y-1.5">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/15 border border-emerald-400/30 text-emerald-300 text-[10px] sm:text-xs font-bold tracking-widest uppercase nv-pulse-glow">
                    <span class="material-symbols-outlined text-[15px] leading-none" aria-hidden="true">shopping_bag</span>
                    <span>Your Harvest Selection</span>
                </div>
                <h1 class="font-serif text-3xl sm:text-4xl font-bold tracking-tight text-white">
                    Shopping Bag
                </h1>
            </div>
        </div>

        <!-- Cart Main Container -->
        <main class="site-container pb-20">
            <v-cart ref="vCart">
                <!-- Cart Shimmer Effect -->
                <x-shop::shimmer.checkout.cart :count="3" />
            </v-cart>
        </main>
    </div>

    @if (core()->getConfigData('sales.checkout.shopping_cart.cross_sell'))
        {!! view_render_event('bagisto.shop.checkout.cart.cross_sell_carousel.before') !!}

        <!-- Cross-sell Product Carousel -->
        <x-shop::products.carousel
            :title="trans('shop::app.checkout.cart.index.cross-sell.title')"
            :src="route('shop.api.checkout.cart.cross-sell.index')"
        />

        {!! view_render_event('bagisto.shop.checkout.cart.cross_sell_carousel.after') !!}
    @endif

    @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-cart-template"
        >
            <div>
                <!-- Cart Shimmer Effect -->
                <template v-if="isLoading">
                    <x-shop::shimmer.checkout.cart :count="3" />
                </template>

                <!-- Cart Information -->
                <template v-else>
                    <div
                        class="flex flex-col lg:flex-row gap-8 lg:gap-10 items-start"
                        v-if="cart?.items?.length"
                    >
                        <!-- Left Column: Cart Items List -->
                        <div class="flex-1 w-full space-y-6">
                            <!-- Free Shipping Progress Banner (Threshold: ₹499) -->
                            <div class="rounded-2xl nv-glass-card border border-emerald-400/40 bg-emerald-950/20 backdrop-blur-xl p-4 flex items-center gap-3.5 shadow-lg text-xs sm:text-sm font-bold text-white" v-if="parseFloat(cart.sub_total || 0) >= 499">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-emerald-500 text-[#041a0e]">
                                    <span class="material-symbols-outlined text-[20px]">local_shipping</span>
                                </div>
                                <div class="flex-1 min-w-0 space-y-1">
                                    <div class="flex items-center justify-between">
                                        <p class="font-bold text-white">🎉 You unlocked Complimentary Express Shipping!</p>
                                        <span class="text-xs font-bold uppercase tracking-wider text-emerald-300 bg-emerald-500/20 px-2.5 py-0.5 rounded-full border border-emerald-400/30">FREE</span>
                                    </div>
                                    <div class="w-full mt-1.5 bg-white/10 h-2 rounded-full overflow-hidden">
                                        <div class="bg-emerald-400 h-full w-full rounded-full transition-all duration-500 ease-out"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-4 space-y-2.5 shadow-lg text-xs sm:text-sm text-white" v-else>
                                <div class="flex items-center justify-between gap-3 text-white/90 font-medium">
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-emerald-400 text-[18px]">local_shipping</span>
                                        <span>Add <strong class="text-emerald-300 font-bold">₹@{{ (499 - parseFloat(cart.sub_total || 0)).toFixed(2) }}</strong> more for <strong class="text-white">Free Standard Delivery</strong></span>
                                    </div>
                                    <span class="text-xs font-bold text-emerald-300 shrink-0 px-2.5 py-0.5 rounded-full bg-emerald-500/20 border border-emerald-400/30">@{{ Math.min(100, Math.round((parseFloat(cart.sub_total || 0) / 499) * 100)) }}%</span>
                                </div>
                                <div class="w-full bg-white/10 h-2 rounded-full overflow-hidden p-0.5">
                                    <div class="h-full rounded-full transition-all duration-500 ease-out" style="background: linear-gradient(90deg, #10B981 0%, #059669 50%, #D4A359 100%) !important;" :style="'width: ' + Math.min(100, Math.round((parseFloat(cart.sub_total || 0) / 499) * 100)) + '%'"></div>
                                </div>
                            </div>

                            {!! view_render_event('bagisto.shop.checkout.cart.cart_mass_actions.before') !!}

                            <!-- Cart Items Card -->
                            <div class="rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-5 sm:p-7 shadow-2xl space-y-6 text-white">
                                <!-- Mass Action / Select All Header -->
                                <div class="flex items-center justify-between border-b border-white/10 pb-4">
                                    <div class="flex select-none items-center gap-2.5">
                                        <input
                                            type="checkbox"
                                            id="select-all"
                                            class="h-4 w-4 rounded border-white/30 text-emerald-500 focus:ring-emerald-400 bg-white/10 cursor-pointer"
                                            v-model="allSelected"
                                            @change="selectAll"
                                        >

                                        <label
                                            for="select-all"
                                            class="text-xs sm:text-sm font-bold uppercase tracking-wider text-white cursor-pointer"
                                        >
                                            @{{ "@lang('shop::app.checkout.cart.index.items-selected')".replace(':count', selectedItemsCount) }}
                                        </label>
                                    </div>

                                    <div v-if="selectedItemsCount" class="flex items-center gap-3">
                                        <button
                                            type="button"
                                            class="text-xs font-bold uppercase tracking-wider text-rose-400 hover:text-rose-300 transition-colors cursor-pointer"
                                            @click="removeSelectedItems"
                                        >
                                            @lang('shop::app.checkout.cart.index.remove')
                                        </button>

                                        @if (auth()->guard()->check())
                                            <span class="text-white/20">|</span>

                                            <button
                                                type="button"
                                                class="text-xs font-bold uppercase tracking-wider text-emerald-300 hover:text-emerald-200 transition-colors cursor-pointer"
                                                @click="moveToWishlistSelectedItems"
                                            >
                                                @lang('shop::app.checkout.cart.index.move-to-wishlist')
                                            </button>
                                        @endif
                                    </div>
                                </div>

                                {!! view_render_event('bagisto.shop.checkout.cart.cart_mass_actions.after') !!}

                                {!! view_render_event('bagisto.shop.checkout.cart.item.listing.before') !!}

                                <!-- Cart Items List -->
                                <div class="divide-y divide-white/10">
                                    <div
                                        class="py-5 first:pt-1 last:pb-1 flex flex-col sm:flex-row gap-5 items-start justify-between"
                                        v-for="item in cart?.items"
                                    >
                                        <div class="flex gap-4 sm:gap-5 items-start flex-1 min-w-0">
                                            <!-- Checkbox -->
                                            <div class="pt-2 select-none">
                                                <input
                                                    type="checkbox"
                                                    :id="'item_' + item.id"
                                                    class="h-4 w-4 rounded border-white/30 text-emerald-500 focus:ring-emerald-400 bg-white/10 cursor-pointer"
                                                    v-model="item.selected"
                                                    @change="updateAllSelected"
                                                >
                                            </div>

                                            {!! view_render_event('bagisto.shop.checkout.cart.item_image.before') !!}

                                            <!-- Item Image -->
                                            <a
                                                :href="'{{ route('shop.product_or_category.index', ':slug') }}'.replace(':slug', item.product_url_key)"
                                                class="shrink-0 w-20 h-20 sm:w-24 sm:h-24 rounded-2xl bg-black/40 border border-white/15 overflow-hidden flex items-center justify-center group"
                                            >
                                                <img
                                                    :src="item.base_image.small_image_url"
                                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                                    :alt="item.name"
                                                />
                                            </a>

                                            {!! view_render_event('bagisto.shop.checkout.cart.item_image.after') !!}

                                            <!-- Item Details -->
                                            <div class="flex-1 min-w-0 space-y-1.5">
                                                {!! view_render_event('bagisto.shop.checkout.cart.item_name.before') !!}

                                                <h3 class="font-serif text-base sm:text-lg font-bold text-white leading-snug">
                                                    <a
                                                        :href="'{{ route('shop.product_or_category.index', ':slug') }}'.replace(':slug', item.product_url_key)"
                                                        class="hover:text-emerald-300 transition-colors"
                                                    >
                                                        @{{ item.name }}
                                                    </a>
                                                </h3>

                                                {!! view_render_event('bagisto.shop.checkout.cart.item_name.after') !!}

                                                <!-- Price Display -->
                                                <div class="flex flex-wrap items-center gap-2 pt-0.5">
                                                    <span class="font-bold text-sm sm:text-base text-emerald-300">
                                                        <template v-if="displayTax.prices == 'including_tax'">
                                                            @{{ item.formatted_price_incl_tax }}
                                                        </template>
                                                        <template v-else>
                                                            @{{ item.formatted_price }}
                                                        </template>
                                                    </span>

                                                    <span class="text-xs text-white/40 line-through font-normal" v-if="item.has_discount">
                                                        @{{ item.formatted_regular_price }}
                                                    </span>

                                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-400/30" v-if="item.has_discount">
                                                        Save @{{ item.formatted_unit_discount }}
                                                    </span>
                                                </div>

                                                <!-- Weight & Pack Attributes -->
                                                <div class="flex flex-wrap items-center gap-1.5 pt-1 text-[11px] text-white/70">
                                                    <span
                                                        class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-white/10 border border-white/15 font-medium"
                                                        v-if="item.formatted_weight"
                                                    >
                                                        <span class="text-white/60">Weight:</span>
                                                        <span class="font-semibold text-white">@{{ item.formatted_weight }}</span>
                                                    </span>

                                                    <template v-if="item.options.length">
                                                        <template v-for="attribute in item.options">
                                                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-white/10 border border-white/15 font-medium">
                                                                <span class="text-white/60">@{{ attribute.attribute_name }}:</span>
                                                                <span class="font-semibold text-white">@{{ attribute.option_label }}</span>
                                                            </span>
                                                        </template>
                                                    </template>
                                                </div>

                                                <!-- Quantity Changer & Remove (Mobile) -->
                                                <div class="pt-3 flex sm:hidden items-center justify-between">
                                                    <x-shop::quantity-changer
                                                        v-if="item.can_change_qty"
                                                        ::key="'qty-' + item.id + '-' + refreshKey"
                                                        class="h-8 max-w-[125px] px-2 py-0.5 rounded-lg text-xs bg-white border border-emerald-200/50 text-[#041a0e] shadow-sm"
                                                        name="quantity"
                                                        ::value="item?.quantity"
                                                        :removable="true"
                                                        @change="updateItem($event, item)"
                                                        @remove="removeItem(item.id)"
                                                    />

                                                    <button
                                                        type="button"
                                                        class="text-white/50 hover:text-rose-400 transition-colors p-1"
                                                        title="@lang('shop::app.checkout.cart.index.remove')"
                                                        @click="removeItem(item.id)"
                                                    >
                                                        <span class="icon-bin text-base"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Quantity & Total (Desktop) -->
                                        <div class="hidden sm:flex flex-col items-end justify-between gap-4 self-stretch">
                                            <div class="text-right">
                                                <span class="font-serif text-lg font-bold text-white">
                                                    <template v-if="displayTax.subtotal == 'including_tax'">
                                                        @{{ item.formatted_total_incl_tax }}
                                                    </template>
                                                    <template v-else>
                                                        @{{ item.formatted_total }}
                                                    </template>
                                                </span>
                                            </div>

                                            <div class="flex items-center gap-3">
                                                <x-shop::quantity-changer
                                                    v-if="item.can_change_qty"
                                                    ::key="'qty-' + item.id + '-' + refreshKey"
                                                    class="h-9 max-w-[135px] px-3 py-1 rounded-xl text-xs bg-white border border-emerald-200/50 text-[#041a0e] shadow-sm"
                                                    name="quantity"
                                                    ::value="item?.quantity"
                                                    :removable="true"
                                                    @change="updateItem($event, item)"
                                                    @remove="removeItem(item.id)"
                                                />

                                                <button
                                                    type="button"
                                                    class="flex h-9 w-9 items-center justify-center rounded-xl text-white/50 hover:text-rose-400 hover:bg-rose-500/20 transition-colors cursor-pointer"
                                                    title="@lang('shop::app.checkout.cart.index.remove')"
                                                    @click="removeItem(item.id)"
                                                >
                                                    <span class="icon-bin text-lg"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column: Order Summary -->
                        @include('shop::checkout.cart.summary')
                    </div>

                    <!-- Clean Empty Cart State -->
                    <div
                        class="rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-10 sm:p-16 lg:p-20 text-center max-w-2xl mx-auto shadow-2xl space-y-6 my-10 text-white"
                        v-else
                    >
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-500/20 border border-emerald-400/30 text-3xl text-emerald-400 shadow-xs">
                            <span class="material-symbols-outlined text-[36px]" aria-hidden="true">spa</span>
                        </div>

                        <div class="space-y-2">
                            <h2 class="font-serif text-2xl sm:text-3xl font-bold text-white">
                                @lang('shop::app.checkout.cart.index.empty-product')
                            </h2>
                            <p class="text-xs sm:text-sm text-white/70 leading-relaxed max-w-md mx-auto font-sans">
                                Explore the Navanidhi Naturals collection and discover authentic stone-ground farm spices and botanical nutrition crafted for daily vitality.
                            </p>
                        </div>

                        <div class="pt-2">
                            <a
                                href="{{ route('shop.search.index') }}"
                                class="btn-emerald-primary inline-flex items-center gap-2 text-[#041a0e] bg-gradient-to-r from-[#c9a25a] to-[#b08a43] hover:from-[#d6b677] hover:to-[#c9a25a] text-xs uppercase tracking-widest font-bold px-8 py-3.5 rounded-full shadow-lg shadow-[#c9a25a]/25 transition-all duration-300"
                            >
                                <span>@lang('shop::app.checkout.cart.index.continue-shopping')</span>
                                <span class="icon-arrow-right text-xs"></span>
                            </a>
                        </div>
                    </div>
                </template>
            </div>
        </script>

        <script type="module">
            app.component("v-cart", {
                template: '#v-cart-template',

                data() {
                    return  {
                        cart: null,
                        allSelected: false,
                        applied: {
                            quantity: {},
                        },
                        displayTax: {
                            prices: "{{ core()->getConfigData('sales.taxes.shopping_cart.display_prices') }}",
                            subtotal: "{{ core()->getConfigData('sales.taxes.shopping_cart.display_subtotal') }}",
                        },
                        isLoading: true,
                        refreshKey: 0,
                    }
                },

                computed: {
                    selectedItemsCount() {
                        return this.cart?.items?.filter(item => item.selected).length ?? 0;
                    },
                },

                mounted() {
                    this.getCart();
                },

                methods: {
                    getCart() {
                        this.$axios.get('{{ route('shop.api.checkout.cart.index') }}')
                            .then(response => {
                                this.cart = response.data.data;
                                this.isLoading = false;

                                if (response.data.message) {
                                    this.$emitter.emit('add-flash', { type: 'warning', message: response.data.message });
                                }

                                this.refreshKey++;
                                this.updateAllSelected();
                            })
                            .catch(error => {
                                this.isLoading = false;
                            });
                    },

                    selectAll() {
                        for (let item of this.cart.items) {
                            item.selected = this.allSelected;
                        }
                    },

                    updateAllSelected() {
                        this.allSelected = Boolean(this.cart?.items?.length) && this.cart.items.every(item => item.selected);
                    },

                    updateItem(qty, item) {
                        this.isLoading = true;

                        let qtyData = {};
                        qtyData[item.id] = qty;

                        this.$axios.put('{{ route('shop.api.checkout.cart.update') }}', { qty: qtyData })
                            .then(response => {
                                this.cart = response.data.data;
                                this.isLoading = false;
                                this.refreshKey++;
                                this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                                this.$emitter.emit('update-mini-cart', response.data.data);
                            })
                            .catch(error => {
                                this.isLoading = false;
                                this.$emitter.emit('add-flash', { type: 'warning', message: error.response.data.message });
                            });
                    },

                    removeItem(itemId) {
                        this.$emitter.emit('open-confirm-modal', {
                            agree: () => {
                                this.isLoading = true;

                                this.$axios.post('{{ route('shop.api.checkout.cart.destroy') }}', {
                                        '_method': 'DELETE',
                                        'cart_item_id': itemId,
                                    })
                                    .then(response => {
                                        this.cart = response.data.data;
                                        this.isLoading = false;
                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                                        this.$emitter.emit('update-mini-cart', response.data.data);
                                    })
                                    .catch(error => {
                                        this.isLoading = false;
                                        this.$emitter.emit('add-flash', { type: 'warning', message: error.response.data.message });
                                    });
                            }
                        });
                    },

                    removeSelectedItems() {
                        this.$emitter.emit('open-confirm-modal', {
                            agree: () => {
                                this.isLoading = true;

                                const selectedItemsIds = this.cart.items
                                    .filter(item => item.selected)
                                    .map(item => item.id);

                                this.$axios.post('{{ route('shop.api.checkout.cart.destroy_selected') }}', {
                                        '_method': 'DELETE',
                                        'ids': selectedItemsIds,
                                    })
                                    .then(response => {
                                        this.cart = response.data.data;
                                        this.isLoading = false;
                                        this.allSelected = false;
                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                                        this.$emitter.emit('update-mini-cart', response.data.data);
                                    })
                                    .catch(error => {
                                        this.isLoading = false;
                                        this.$emitter.emit('add-flash', { type: 'warning', message: error.response.data.message });
                                    });
                            }
                        });
                    },

                    moveToWishlistSelectedItems() {
                        this.$emitter.emit('open-confirm-modal', {
                            agree: () => {
                                const selectedItemsIds = this.cart.items
                                    .filter(item => item.selected)
                                    .map(item => item.id);

                                this.$axios.post('{{ route('shop.api.checkout.cart.move_to_wishlist') }}', {
                                        'ids': selectedItemsIds,
                                    })
                                    .then(response => {
                                        this.cart = response.data.data;
                                        this.allSelected = false;
                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                                        this.$emitter.emit('update-mini-cart', response.data.data);
                                    })
                                    .catch(error => {
                                        this.isLoading = false;
                                        this.$emitter.emit('add-flash', { type: 'warning', message: error.response.data.message });
                                    });
                            },
                        });
                    },

                    setCart(cart) {
                        this.cart = cart;
                        this.refreshKey++;
                    },
                }
            });
        </script>
    @endPushOnce
</x-shop::layouts>
