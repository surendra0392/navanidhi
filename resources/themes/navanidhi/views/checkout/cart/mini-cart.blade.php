<!-- Mini Cart Vue Component -->
<v-mini-cart :initial-cart='@json(cart()->getCart() ? new \Webkul\Shop\Http\Resources\CartResource(cart()->getCart()) : ["items_qty" => 0])'>
    <button
        type="button"
        class="flex h-10 w-10 sm:h-11 sm:w-11 items-center justify-center rounded-full text-white/90 hover:bg-white/10 hover:text-white transition-colors relative cursor-pointer focus:outline-none"
        aria-label="@lang('shop::app.checkout.cart.mini-cart.shopping-cart')"
    >
        <span class="relative inline-flex items-center justify-center">
            <span class="icon-cart text-2xl text-white" role="presentation"></span>
        </span>
    </button>
</v-mini-cart>

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-mini-cart-template"
    >
        {!! view_render_event('bagisto.shop.checkout.mini-cart.drawer.before') !!}

        @if (core()->getConfigData('sales.checkout.mini_cart.display_mini_cart'))
            <x-shop::drawer ref="miniCartDrawer">
                <!-- Drawer Toggler -->
                <x-slot:toggle>
                    {!! view_render_event('bagisto.shop.checkout.mini-cart.drawer.toggle.before') !!}

                    <button
                        type="button"
                        class="flex h-10 w-10 sm:h-11 sm:w-11 items-center justify-center rounded-full text-white/90 hover:bg-white/10 hover:text-white transition-colors relative cursor-pointer focus:outline-none"
                        aria-label="@lang('shop::app.checkout.cart.mini-cart.shopping-cart')"
                        @click="getCart"
                    >
                        <span class="relative inline-flex items-center justify-center">
                            <span class="icon-cart text-2xl text-white" role="presentation"></span>

                            @if (core()->getConfigData('sales.checkout.my_cart.summary') == 'display_item_quantity')
                                <span
                                    class="absolute flex items-center justify-center rounded-full bg-emerald-500 text-white text-[10px] font-bold leading-none pointer-events-none shadow-sm"
                                    style="top: -6px; right: -8px; min-width: 17px; height: 17px; padding: 0 4px;"
                                    v-if="cart?.items_qty && cart.items_qty > 0"
                                >
                                    @{{ cart.items_qty }}
                                </span>
                            @else
                                <span
                                    class="absolute flex items-center justify-center rounded-full bg-emerald-500 text-white text-[10px] font-bold leading-none pointer-events-none shadow-sm"
                                    style="top: -6px; right: -8px; min-width: 17px; height: 17px; padding: 0 4px;"
                                    v-if="cart?.items_count && cart.items_count > 0"
                                >
                                    @{{ cart.items_count }}
                                </span>
                            @endif
                        </span>
                    </button>

                    {!! view_render_event('bagisto.shop.checkout.mini-cart.drawer.toggle.after') !!}
                </x-slot>

                <!-- Drawer Header -->
                <x-slot:header>
                    {!! view_render_event('bagisto.shop.checkout.mini-cart.drawer.header.before') !!}

                    <div class="space-y-1.5 text-white">
                        <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-emerald-300 text-[10px] font-semibold tracking-widest uppercase">
                            <span><span class="material-symbols-outlined align-text-bottom text-inherit text-[1.2em] leading-none" aria-hidden="true" style="font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;">eco</span></span>
                            <span>Navanidhi Naturals Cart</span>
                        </div>
                        <h2 class="font-serif text-xl sm:text-2xl font-bold text-white">
                            @lang('shop::app.checkout.cart.mini-cart.shopping-cart')
                            <span class="text-sm font-sans font-normal text-white/60" v-if="cart?.items_count">
                                (@{{ cart.items_count }} @{{ cart.items_count === 1 ? 'item' : 'items' }})
                            </span>
                        </h2>

                        @if ($offerInfo = core()->getConfigData('sales.checkout.mini_cart.offer_info'))
                            <div class="mt-2.5 p-2.5 rounded-xl bg-white/[0.06] border border-white/15 text-xs text-white/90 font-medium">
                                {!! $offerInfo !!}
                            </div>
                        @endif

                        <!-- Dynamic Complimentary Shipping Progress Bar -->
                        <div class="pt-2" v-if="cart?.items?.length">
                            <!-- Unlocked -->
                            <div class="p-2.5 rounded-xl bg-emerald-950/70 border border-emerald-500/30 flex items-center justify-between text-[11px] font-bold text-emerald-300" v-if="parseFloat(cart.sub_total || 0) >= 499">
                                <span class="flex items-center gap-1.5">
                                    <span class="material-symbols-outlined text-[15px]">local_shipping</span>
                                    🎉 Complimentary Shipping Unlocked!
                                </span>
                                <span class="text-[10px] uppercase tracking-wider bg-emerald-500/30 text-emerald-300 border border-emerald-400/40 px-2 py-0.5 rounded-full">FREE</span>
                            </div>

                            <!-- In Progress -->
                            <div class="p-3 rounded-xl bg-white/[0.06] border border-white/15 space-y-2 text-[11px] text-white shadow-sm" v-else>
                                <div class="flex items-center justify-between text-white font-medium">
                                    <span class="flex items-center gap-1.5">
                                        <span class="material-symbols-outlined text-emerald-400 text-[14px]">local_shipping</span>
                                        <span>Add <strong class="text-emerald-300 font-bold">₹@{{ (499 - parseFloat(cart.sub_total || 0)).toFixed(0) }}</strong> for <strong>Free Shipping</strong></span>
                                    </span>
                                    <span class="text-[10px] font-bold text-emerald-300 px-2 py-0.5 rounded-full bg-emerald-500/20 border border-emerald-400/30">@{{ Math.round((parseFloat(cart.sub_total || 0) / 499) * 100) }}%</span>
                                </div>
                                <div class="w-full h-1.5 rounded-full bg-black/40 border border-white/10 overflow-hidden">
                                    <div class="h-full rounded-full bg-gradient-to-r from-emerald-500 to-[#c9a25a] transition-all duration-500" :style="'width: ' + Math.min(100, Math.round((parseFloat(cart.sub_total || 0) / 499) * 100)) + '%'"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {!! view_render_event('bagisto.shop.checkout.mini-cart.drawer.header.after') !!}
                </x-slot>

                <!-- Drawer Content -->
                <x-slot:content>
                    {!! view_render_event('bagisto.shop.checkout.mini-cart.drawer.content.before') !!}

                    <!-- Cart Item Listing -->
                    <div
                        class="p-4 sm:p-5 space-y-3.5"
                        v-if="cart?.items?.length"
                    >
                        <div
                            class="p-3.5 sm:p-4 rounded-2xl bg-white/[0.06] border border-white/15 shadow-md flex gap-3.5 sm:gap-4 items-start transition-all hover:border-emerald-400/40 text-white"
                            v-for="item in cart?.items"
                        >
                            <!-- Cart Item Image -->
                            {!! view_render_event('bagisto.shop.checkout.mini-cart.drawer.content.image.before') !!}

                            <a
                                :href="'{{ route('shop.product_or_category.index', ':slug') }}'.replace(':slug', item.product_url_key)"
                                class="shrink-0 w-20 h-20 sm:w-22 sm:h-22 rounded-xl bg-black/40 border border-white/15 overflow-hidden flex items-center justify-center p-1 group"
                            >
                                <img
                                    :src="item.base_image.small_image_url"
                                    class="w-full h-full object-cover rounded-lg group-hover:scale-105 transition-transform duration-300"
                                    :alt="item.name"
                                />
                            </a>

                            {!! view_render_event('bagisto.shop.checkout.mini-cart.drawer.content.image.after') !!}

                            <!-- Cart Item Information -->
                            <div class="flex-1 min-w-0 flex flex-col justify-between self-stretch">
                                <div class="space-y-1">
                                    {!! view_render_event('bagisto.shop.checkout.mini-cart.drawer.content.name.before') !!}

                                    <a
                                        :href="'{{ route('shop.product_or_category.index', ':slug') }}'.replace(':slug', item.product_url_key)"
                                        class="font-serif text-sm sm:text-[15px] font-bold text-white hover:text-emerald-300 transition-colors line-clamp-2 leading-snug"
                                    >
                                        @{{ item.name }}
                                    </a>

                                    {!! view_render_event('bagisto.shop.checkout.mini-cart.drawer.content.name.after') !!}

                                    <!-- Price Display (Sale vs Regular Price) -->
                                    {!! view_render_event('bagisto.shop.checkout.mini-cart.drawer.content.price.before') !!}

                                    <div class="flex flex-wrap items-center gap-2 pt-0.5">
                                        <span class="font-bold text-sm sm:text-base text-white">
                                            <template v-if="displayTax.prices == 'including_tax'">
                                                @{{ item.formatted_price_incl_tax }}
                                            </template>
                                            <template v-else>
                                                @{{ item.formatted_price }}
                                            </template>
                                        </span>

                                        <span class="text-xs text-white/50 line-through font-normal" v-if="item.has_discount">
                                            @{{ item.formatted_regular_price }}
                                        </span>

                                        <span class="px-1.5 py-0.5 rounded text-[10px] font-semibold bg-emerald-500/20 border border-emerald-400/30 text-emerald-300" v-if="item.has_discount">
                                            Save @{{ item.formatted_unit_discount }}
                                        </span>
                                    </div>

                                    {!! view_render_event('bagisto.shop.checkout.mini-cart.drawer.content.price.after') !!}

                                    <!-- Weight & Options Variations -->
                                    <div class="flex flex-wrap items-center gap-1.5 pt-1 text-[11px] text-white/70">
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-white/10 border border-white/10 font-medium text-white/90"
                                            v-if="item.formatted_weight"
                                        >
                                            <span class="text-white/50">Weight:</span>
                                            <span class="font-semibold text-white">@{{ item.formatted_weight }}</span>
                                        </span>

                                        <template v-if="item.options.length">
                                            <template v-for="attribute in item.options">
                                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-white/10 border border-white/10 font-medium text-white/90">
                                                    <span class="text-white/50">@{{ attribute.attribute_name }}:</span>
                                                    <span class="font-semibold text-white">@{{ attribute.option_label }}</span>
                                                </span>
                                            </template>
                                        </template>
                                    </div>
                                </div>

                                <!-- Quantity Controls & Line Actions -->
                                <div class="pt-3 flex items-center justify-between gap-3 border-t border-white/10 mt-2.5">
                                    <x-shop::quantity-changer
                                        v-if="item.can_change_qty"
                                        ::key="'qty-' + item.id + '-' + refreshKey"
                                        class="h-8 max-w-[96px] px-2 py-0.5 rounded-lg text-xs bg-white border border-emerald-200/50 text-[#041a0e] shadow-sm"
                                        name="quantity"
                                        ::value="item?.quantity"
                                        @change="updateItem($event, item)"
                                    />

                                    <div class="flex items-center gap-3">
                                        <span class="text-xs font-bold text-white">
                                            @{{ item.formatted_total }}
                                        </span>

                                        <button
                                            type="button"
                                            class="text-white/50 hover:text-rose-400 transition-colors p-1 cursor-pointer"
                                            title="@lang('shop::app.checkout.cart.mini-cart.remove')"
                                            @click="removeItem(item.id)"
                                        >
                                            <span class="icon-bin text-base"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Empty Cart Section -->
                    <div
                        class="py-20 text-center space-y-4 px-6 text-white"
                        v-else
                    >
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-white/[0.06] border border-white/15 text-3xl text-emerald-400">
                            <span class="material-symbols-outlined align-text-bottom text-inherit text-[1.3em] leading-none" aria-hidden="true" style="font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;">eco</span>
                        </div>

                        <div class="space-y-1.5">
                            <h3 class="font-serif text-xl font-bold text-white">
                                @lang('shop::app.checkout.cart.mini-cart.empty-cart')
                            </h3>
                            <p class="text-xs text-white/70 leading-relaxed max-w-xs mx-auto">
                                Explore pure single-origin botanicals and functional nutrition for daily wellness.
                            </p>
                        </div>

                        <div class="pt-3">
                            <a
                                href="{{ route('shop.search.index') }}"
                                class="h-11 px-6 rounded-xl bg-gradient-to-r from-[#c9a25a] to-[#b08a43] hover:from-[#d6b677] hover:to-[#c9a25a] text-[#041a0e] text-xs font-bold uppercase tracking-wider inline-flex items-center gap-2 transition-all shadow-md"
                            >
                                <span>Explore Products</span>
                                <span class="icon-arrow-right text-xs"></span>
                            </a>
                        </div>
                    </div>

                    {!! view_render_event('bagisto.shop.checkout.mini-cart.drawer.content.after') !!}
                </x-slot>

                <!-- Drawer Footer -->
                <x-slot:footer>
                    <div
                        v-if="cart?.items?.length"
                        class="p-4 sm:p-6 bg-[#041a0e]/98 border-t border-white/10 space-y-4 text-white"
                    >
                        <!-- Subtotal & Discount Breakdown -->
                        <div class="space-y-2" v-if="! isLoading">
                            {!! view_render_event('bagisto.shop.checkout.mini-cart.subtotal.before') !!}

                            <!-- MRP / Regular Subtotal Row (When discount exists) -->
                            <div class="flex items-center justify-between text-xs text-white/60" v-if="cart.has_discount">
                                <span>Original Subtotal (MRP)</span>
                                <span class="line-through font-medium">@{{ cart.formatted_regular_sub_total }}</span>
                            </div>

                            <!-- Discount Savings Row -->
                            <div class="flex items-center justify-between text-xs font-semibold text-emerald-300" v-if="cart.has_discount">
                                <span class="inline-flex items-center gap-1.5">
                                    <span class="material-symbols-outlined text-[14px]">local_offer</span>
                                    Discount Savings
                                </span>
                                <span>- @{{ cart.formatted_total_discount }}</span>
                            </div>

                            <!-- Subtotal Row -->
                            <div class="flex items-center justify-between pt-1 border-t border-white/10">
                                <div class="space-y-0.5">
                                    <span class="text-xs font-bold uppercase tracking-wider text-white/80 block">
                                        @lang('shop::app.checkout.cart.mini-cart.subtotal')
                                    </span>
                                    <span class="text-[11px] text-white/50 block">
                                        Taxes & shipping calculated at checkout
                                    </span>
                                </div>

                                <div class="text-right">
                                    <span class="font-serif text-2xl sm:text-3xl font-bold text-[#E6C687]">
                                        <template v-if="displayTax.subtotal == 'including_tax'">
                                            @{{ cart.formatted_sub_total_incl_tax }}
                                        </template>
                                        <template v-else>
                                            @{{ cart.formatted_sub_total }}
                                        </template>
                                    </span>
                                </div>
                            </div>

                            <!-- Savings Callout Banner -->
                            <div class="mt-2 p-2.5 rounded-xl bg-emerald-950/70 border border-emerald-500/30 flex items-center justify-between text-xs font-semibold text-emerald-300" v-if="cart.has_discount">
                                <span>🎉 Total Savings on this Order:</span>
                                <span>@{{ cart.formatted_total_discount }}</span>
                            </div>

                            {!! view_render_event('bagisto.shop.checkout.mini-cart.subtotal.after') !!}
                        </div>

                        <!-- Loading State Spinner -->
                        <div class="flex justify-center py-4" v-else>
                            <svg
                                class="text-emerald-400 h-8 w-8 animate-spin"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-2.5 pt-1">
                            {!! view_render_event('bagisto.shop.checkout.mini-cart.continue_to_checkout.before') !!}

                            <a
                                href="{{ route('shop.checkout.onepage.index') }}"
                                class="h-12 w-full rounded-xl bg-gradient-to-r from-[#c9a25a] to-[#b08a43] hover:from-[#d6b677] hover:to-[#c9a25a] text-[#041a0e] text-xs font-bold uppercase tracking-widest flex items-center justify-center gap-2 transition-all shadow-lg shadow-[#c9a25a]/25 cursor-pointer"
                            >
                                <span>@lang('shop::app.checkout.cart.mini-cart.continue-to-checkout')</span>
                                <span class="icon-arrow-right text-xs"></span>
                            </a>

                            {!! view_render_event('bagisto.shop.checkout.mini-cart.continue_to_checkout.after') !!}

                            <a
                                href="{{ route('shop.checkout.cart.index') }}"
                                class="h-11 w-full rounded-xl border border-white/20 hover:bg-white/10 text-white text-xs font-semibold uppercase tracking-wider flex items-center justify-center gap-2 transition-all cursor-pointer"
                            >
                                <span>@lang('shop::app.checkout.cart.mini-cart.view-cart')</span>
                            </a>

                            <!-- Trust Badges -->
                            <div class="pt-2 flex items-center justify-center gap-6 text-[11px] text-white/50">
                                <span class="flex items-center gap-1.5">
                                    <span class="material-symbols-outlined text-[14px] text-emerald-400">lock</span>
                                    256-Bit SSL Encrypted
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <span class="material-symbols-outlined text-[14px] text-emerald-400">verified</span>
                                    MAN AGRO Certified
                                </span>
                            </div>
                        </div>
                    </div>
                </x-slot>
            </x-shop::drawer>

        @else
            <a href="{{ route('shop.checkout.onepage.index') }}">
                {!! view_render_event('bagisto.shop.checkout.mini-cart.drawer.toggle.before') !!}

                <span class="relative">
                    <span
                        class="icon-cart cursor-pointer text-xl sm:text-2xl text-elior-charcoal hover:text-elior-botanical transition-colors"
                        role="button"
                        aria-label="@lang('shop::app.checkout.cart.mini-cart.shopping-cart')"
                        tabindex="0"
                    ></span>

                    <span
                        class="absolute -top-2 -right-2.5 flex h-4 min-w-4 px-1 items-center justify-center rounded-full bg-elior-botanical text-white text-[10px] font-bold"
                        v-if="cart?.items_count"
                    >
                        @{{ cart.items_count }}
                    </span>
                </span>

                {!! view_render_event('bagisto.shop.checkout.mini-cart.drawer.toggle.after') !!}
            </a>
        @endif

        {!! view_render_event('bagisto.shop.checkout.mini-cart.drawer.after') !!}
    </script>

    <script type="module">
        app.component("v-mini-cart", {
            template: '#v-mini-cart-template',

            props: ['initialCart'],

            data() {
                return  {
                    cart: this.initialCart || null,
                    displayTax: {
                        prices: "{{ core()->getConfigData('sales.taxes.shopping_cart.display_prices') }}",
                        subtotal: "{{ core()->getConfigData('sales.taxes.shopping_cart.display_subtotal') }}",
                    },
                    isLoading: false,
                    refreshKey: 0,
                }
            },

            mounted() {
                if (!this.cart || !this.cart.items_qty) {
                    this.getCart();
                }

                /**
                 * To Do: Need to handle this with event emitter.
                 */
                this.$emitter.on('update-mini-cart', (cart) => {
                    this.cart = cart;
                    this.refreshKey++;
                });

                this.$emitter.on('open-mini-cart', () => {
                    if (this.$refs.miniCartDrawer) {
                        this.$refs.miniCartDrawer.open();
                    }
                });
            },

            methods: {
                getCart() {
                    this.$axios.get('{{ route('shop.api.checkout.cart.index') }}')
                        .then(response =>  {
                            this.cart = response.data.data;
                            this.refreshKey++;
                        })
                        .catch(error => {});
                },

                updateItem(qty, item) {
                    this.isLoading = true;

                    let qtyData = {};
                    qtyData[item.id] = qty;

                    this.$axios.put('{{ route('shop.api.checkout.cart.update') }}', { qty: qtyData })
                        .then(response => {
                            this.cart = response.data.data;
                            this.isLoading = false;
                            this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                        })
                        .catch(error => {
                            this.isLoading = false;
                            this.$emitter.emit('add-flash', { type: 'warning', message: error.response.data.message });
                        });
                },

                removeItem(itemId) {
                    this.isLoading = true;

                    this.$axios.post('{{ route('shop.api.checkout.cart.destroy') }}', {
                            '_method': 'DELETE',
                            'cart_item_id': itemId,
                        })
                        .then(response => {
                            this.cart = response.data.data;
                            this.isLoading = false;
                            this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                        })
                        .catch(error => {
                            this.isLoading = false;
                            this.$emitter.emit('add-flash', { type: 'warning', message: error.response.data.message });
                        });
                },
            }
        });
    </script>
@endpushOnce
