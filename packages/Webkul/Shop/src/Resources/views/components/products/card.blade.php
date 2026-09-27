@props([
    'product' => null,
])

@php
    $productJson = null;
    if ($product instanceof \Webkul\Product\Contracts\Product) {
        $productJson = json_encode(new \Webkul\Shop\Http\Resources\ProductCardResource($product));
    } elseif (is_array($product)) {
        $productJson = json_encode($product);
    }
@endphp

<v-product-card
    {{ $attributes }}
    @if ($productJson)
        :product="{{ $productJson }}"
    @else
        :product="product"
    @endif
>
</v-product-card>

@pushOnce('scripts')
    <style>
        .nv-card-action-btn {
            width: 34px !important;
            height: 34px !important;
            border-radius: 50% !important;
            background: rgba(4, 26, 14, 0.75) !important;
            border: 1px solid rgba(255, 255, 255, 0.22) !important;
            color: #FFFFFF !important;
            backdrop-filter: blur(12px) !important;
            -webkit-backdrop-filter: blur(12px) !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.35) !important;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1) !important;
            cursor: pointer !important;
        }
        .nv-card-action-btn:hover {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%) !important;
            border-color: rgba(110, 231, 183, 0.6) !important;
            color: #FFFFFF !important;
            transform: scale(1.1) !important;
            box-shadow: 0 6px 18px rgba(16, 185, 129, 0.45) !important;
        }
        .nv-card-action-btn svg {
            stroke: #FFFFFF !important;
        }
        .nv-card-action-btn span {
            color: #FFFFFF !important;
        }

        .nv-btn-cart {
            width: 100% !important;
            height: 44px !important;
            min-height: 44px !important;
            border-radius: 9999px !important;
            background: linear-gradient(135deg, #10B981 0%, #059669 50%, #047857 100%) !important;
            color: #FFFFFF !important;
            font-family: 'Montserrat', system-ui, -apple-system, sans-serif !important;
            font-size: 11.5px !important;
            font-weight: 700 !important;
            letter-spacing: 0.12em !important;
            text-transform: uppercase !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 8px !important;
            border: 1px solid rgba(110, 231, 183, 0.35) !important;
            box-shadow: 0 4px 16px rgba(16, 185, 129, 0.3) !important;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
            cursor: pointer !important;
            text-decoration: none !important;
            outline: none !important;
        }
        .nv-btn-cart svg {
            width: 16px !important;
            height: 16px !important;
            color: #FFFFFF !important;
            stroke: currentColor !important;
        }
        .nv-btn-cart:hover {
            background: linear-gradient(135deg, #34D399 0%, #10B981 50%, #059669 100%) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 24px rgba(16, 185, 129, 0.5), 0 0 20px rgba(52, 211, 153, 0.3) !important;
            border-color: rgba(167, 243, 208, 0.6) !important;
        }
        .nv-btn-cart:active {
            transform: translateY(0) !important;
            box-shadow: 0 2px 4px rgba(16, 185, 129, 0.2) !important;
        }
        .nv-btn-cart:disabled {
            opacity: 0.45 !important;
            cursor: not-allowed !important;
            transform: none !important;
            box-shadow: none !important;
            background: #4B5563 !important;
            border-color: rgba(255, 255, 255, 0.1) !important;
        }

        .nv-btn-cart-compact {
            height: 42px !important;
            min-height: 42px !important;
            padding-left: 24px !important;
            padding-right: 24px !important;
            border-radius: 9999px !important;
            background: linear-gradient(135deg, #10B981 0%, #059669 50%, #047857 100%) !important;
            color: #FFFFFF !important;
            font-family: 'Montserrat', system-ui, -apple-system, sans-serif !important;
            font-size: 11.5px !important;
            font-weight: 700 !important;
            letter-spacing: 0.12em !important;
            text-transform: uppercase !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 8px !important;
            border: 1px solid rgba(110, 231, 183, 0.35) !important;
            box-shadow: 0 4px 16px rgba(16, 185, 129, 0.3) !important;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
            cursor: pointer !important;
            text-decoration: none !important;
        }
        .nv-btn-cart-compact:hover {
            background: linear-gradient(135deg, #34D399 0%, #10B981 50%, #059669 100%) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 24px rgba(16, 185, 129, 0.5), 0 0 20px rgba(52, 211, 153, 0.3) !important;
        }

        .nv-discount-pill {
            font-size: 10px !important;
            font-weight: 700 !important;
            letter-spacing: 0.05em !important;
            text-transform: uppercase !important;
            color: #6EE7B7 !important;
            background: rgba(16, 185, 129, 0.2) !important;
            border: 1px solid rgba(110, 231, 183, 0.35) !important;
            padding: 2px 8px !important;
            border-radius: 9999px !important;
            display: inline-flex !important;
            align-items: center !important;
            margin-left: auto !important;
        }
        .nv-badge-sale {
            font-size: 10.5px !important;
            font-weight: 700 !important;
            letter-spacing: 0.05em !important;
            text-transform: uppercase !important;
            color: #FCD34D !important;
            background: rgba(212, 163, 89, 0.25) !important;
            border: 1px solid rgba(251, 191, 36, 0.4) !important;
            backdrop-filter: blur(8px) !important;
            padding: 3px 8px !important;
            border-radius: 9999px !important;
        }
        .nv-badge-new {
            font-size: 10.5px !important;
            font-weight: 700 !important;
            letter-spacing: 0.05em !important;
            text-transform: uppercase !important;
            color: #6EE7B7 !important;
            background: rgba(16, 185, 129, 0.2) !important;
            border: 1px solid rgba(52, 211, 153, 0.4) !important;
            backdrop-filter: blur(8px) !important;
            padding: 3px 8px !important;
            border-radius: 9999px !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 5px !important;
        }
        .nv-badge-new span {
            background-color: #34D399 !important;
        }

        .nv-weight-pill {
            font-size: 10px !important;
            font-weight: 600 !important;
            letter-spacing: 0.03em !important;
            color: #6EE7B7 !important;
            background: rgba(16, 185, 129, 0.15) !important;
            border: 1px solid rgba(52, 211, 153, 0.35) !important;
            padding: 2px 7px !important;
            border-radius: 9999px !important;
            display: inline-flex !important;
            align-items: center !important;
            white-space: nowrap !important;
            line-height: 1.2 !important;
        }
    </style>

    <script
        type="text/x-template"
        id="v-product-card-template"
    >
        <!-- Modern Luxury Grid Card: Axolyt Frosted Glassmorphism -->
        <div
            class="nv-card nv-product-card group relative flex flex-col justify-between w-full overflow-hidden rounded-[26px] border border-white/15 transition-all duration-400 hover:border-emerald-400/40 hover:-translate-y-2 hover:shadow-[0_24px_50px_-12px_rgba(0,0,0,0.65),0_0_30px_rgba(34,197,94,0.18)]"
            style="background: rgba(4, 26, 14, 0.78); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); box-shadow: 0 16px 40px -10px rgba(0, 0, 0, 0.5), inset 0 1px 0 rgba(255, 255, 255, 0.12);"
            v-if="mode != 'list'"
        >
            <!-- Top Image Container with 1:1 Aspect Ratio -->
            <div class="relative w-full aspect-square overflow-hidden" style="background: rgba(0, 0, 0, 0.35);">
                {!! view_render_event('bagisto.shop.components.products.card.image.before') !!}

                <!-- Product Image Link -->
                <a
                    :href="'{{ route('shop.product_or_category.index', ':slug') }}'.replace(':slug', product.url_key)"
                    :aria-label="product.name"
                    class="block w-full h-full"
                >
                    <x-shop::media.images.lazy
                        class="w-full h-full object-cover object-center transition-transform duration-700 ease-out group-hover:scale-108"
                        ::src="product.base_image?.medium_image_url"
                        ::srcset="product.base_image ? `
                            ${product.base_image.small_image_url} 150w,
                            ${product.base_image.medium_image_url} 300w,
                        ` : ''"
                        sizes="(max-width: 768px) 150px, (max-width: 1200px) 300px, 600px"
                        ::key="product.id"
                        ::index="product.id"
                        width="291"
                        height="300"
                        ::alt="product.name"
                    />
                </a>

                <!-- Gradient Fade to Blend Image into Glass Card -->
                <div class="absolute inset-x-0 bottom-0 h-14 bg-gradient-to-t from-[rgba(4,26,14,0.95)] via-[rgba(4,26,14,0.4)] to-transparent pointer-events-none z-[4]"></div>

                {!! view_render_event('bagisto.shop.components.products.card.image.after') !!}

                <!-- Floating Badges Top-Left -->
                <div
                    class="absolute flex flex-col gap-1 z-[10] pointer-events-none"
                    style="top: 12px; left: 12px; right: auto;"
                >
                    <span
                        class="nv-badge-sale"
                        v-if="product.on_sale && product.discount_percent > 0"
                    >
                        -@{{ product.discount_percent }}%
                    </span>

                    <span
                        class="nv-badge-new"
                        v-else-if="product.is_new"
                    >
                        <span class="w-1.5 h-1.5 rounded-full bg-[#34D399]"></span>
                        Fresh
                    </span>
                </div>

                <!-- 100% Vegetarian Dot Symbol Top-Right -->
                <div 
                    class="nv-veg-badge"
                    title="100% Pure Plant Vegetarian"
                >
                    <span class="nv-veg-dot"></span>
                </div>

                <!-- Floating Action Buttons (Wishlist, Compare, Quick View) -->
                <div
                    class="absolute flex flex-col gap-1.5 opacity-0 group-hover:opacity-100 transition-all duration-200 z-[10] translate-y-1 group-hover:translate-y-0 max-lg:opacity-100 max-lg:translate-y-0"
                    style="top: 38px; right: 12px;"
                >
                    @if (core()->getConfigData('customer.settings.wishlist.wishlist_option'))
                        <button
                            type="button"
                            class="nv-card-action-btn"
                            aria-label="@lang('shop::app.components.products.card.add-to-wishlist')"
                            title="@lang('shop::app.components.products.card.add-to-wishlist')"
                            :class="product.is_wishlist ? '!text-rose-400 !border-rose-400/50' : ''"
                            @click="addToWishlist()"
                        >
                            <span :class="product.is_wishlist ? 'icon-heart-fill' : 'icon-heart'" class="text-sm"></span>
                        </button>
                    @endif

                    @if (core()->getConfigData('catalog.products.settings.compare_option'))
                        <button
                            type="button"
                            class="nv-card-action-btn"
                            aria-label="@lang('shop::app.components.products.card.add-to-compare')"
                            title="@lang('shop::app.components.products.card.add-to-compare')"
                            @click="addToCompare(product.id)"
                        >
                            <span class="icon-compare text-sm"></span>
                        </button>
                    @endif

                    <button
                        type="button"
                        class="nv-card-action-btn"
                        aria-label="Quick View"
                        title="Quick View"
                        @click="openQuickView()"
                    >
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </button>
                </div>
            </div>

            <!-- Product Details Area Below Image -->
            <div class="p-5 flex flex-col flex-1 justify-between bg-transparent">
                <div>
                    {!! view_render_event('bagisto.shop.components.products.card.name.before') !!}

                    <!-- Category & Net Weight Row -->
                    <div class="flex items-center justify-between gap-2 mb-2">
                        <span class="text-[10px] font-bold uppercase tracking-[0.14em] text-[#D4A359] truncate max-w-[65%]">
                            @{{ product.category_name || 'Botanical Powders' }}
                        </span>

                        <span v-if="product.formatted_weight" class="nv-weight-pill shrink-0">
                            @{{ product.formatted_weight }}
                        </span>
                    </div>

                    <!-- Product Title -->
                    <h3 class="nv-card-title text-[15.5px] sm:text-[16px] font-serif font-bold text-white group-hover:text-emerald-300 transition-colors leading-[1.35] min-h-[44px] line-clamp-2">
                        <a :href="'{{ route('shop.product_or_category.index', ':slug') }}'.replace(':slug', product.url_key)" class="text-white hover:text-emerald-300 transition-colors">
                            @{{ product.name }}
                        </a>
                    </h3>

                    {!! view_render_event('bagisto.shop.components.products.card.name.after') !!}

                    <!-- Price Row -->
                    {!! view_render_event('bagisto.shop.components.products.card.price.before') !!}

                    <div class="flex items-baseline gap-2 mt-2.5">
                        <template v-if="product.special_price">
                            <span class="text-[20px] font-bold text-white tracking-tight">
                                @{{ product.special_price }}
                            </span>
                            <span class="text-[13px] text-white/50 line-through font-normal">
                                @{{ product.regular_price }}
                            </span>
                            <span
                                v-if="product.discount_percent > 0"
                                class="nv-discount-pill"
                            >
                                Save @{{ product.discount_percent }}%
                            </span>
                        </template>
                        <template v-else>
                            <span class="text-[20px] font-bold text-[#E6C687] tracking-tight">
                                @{{ product.regular_price || product.min_price }}
                            </span>
                        </template>
                    </div>

                    {!! view_render_event('bagisto.shop.components.products.card.price.after') !!}
                </div>

                <!-- Action Button Area with Clean Breathing Room -->
                @if (core()->getConfigData('sales.checkout.shopping_cart.cart_page'))
                    <div class="mt-4 pt-1">
                        {!! view_render_event('bagisto.shop.components.products.card.add_to_cart.before') !!}

                        <button
                            type="button"
                            class="nv-btn-cart"
                            :disabled="! product.is_saleable || isAddingToCart"
                            @click="addToCart()"
                        >
                            <svg class="w-4 h-4 text-white shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/>
                                <line x1="3" y1="6" x2="21" y2="6"/>
                                <path d="M16 10a4 4 0 0 1-8 0"/>
                            </svg>
                            <span v-if="! product.is_saleable">Out of Stock</span>
                            <span v-else-if="product.type === 'configurable'">Select Pack</span>
                            <span v-else-if="! isAddingToCart">Add To Cart</span>
                            <span v-else>Adding...</span>
                        </button>

                        {!! view_render_event('bagisto.shop.components.products.card.add_to_cart.after') !!}
                    </div>
                @endif
            </div>
        </div>

        <!-- Modern Luxury List Card: Full-Bleed Left Image with Axolyt Frosted Glass -->
        <div
            class="nv-card nv-product-card group relative flex max-sm:flex-col overflow-hidden rounded-[26px] border border-white/15 transition-all duration-400 hover:border-emerald-400/40 hover:-translate-y-1 hover:shadow-[0_24px_50px_-12px_rgba(0,0,0,0.65),0_0_30px_rgba(34,197,94,0.18)] items-stretch"
            style="background: rgba(4, 26, 14, 0.78); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); box-shadow: 0 16px 40px -10px rgba(0, 0, 0, 0.5), inset 0 1px 0 rgba(255, 255, 255, 0.12);"
            v-else
        >
            <!-- Image Stage: Full-bleed on the left -->
            <div class="relative w-full sm:w-[220px] aspect-square sm:aspect-auto overflow-hidden shrink-0" style="background: rgba(0, 0, 0, 0.35);">
                {!! view_render_event('bagisto.shop.components.products.card.image.before') !!}

                <a
                    :href="'{{ route('shop.product_or_category.index', ':slug') }}'.replace(':slug', product.url_key)"
                    class="block w-full h-full"
                >
                    <x-shop::media.images.lazy
                        class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-108"
                        ::src="product.base_image?.medium_image_url"
                        ::key="product.id"
                        ::index="product.id"
                        width="291"
                        height="300"
                        ::alt="product.name"
                    />
                </a>

                {!! view_render_event('bagisto.shop.components.products.card.image.after') !!}

                <div
                    class="absolute flex flex-col gap-1 z-[10]"
                    style="top: 12px; left: 12px; right: auto;"
                >
                    <span
                        class="nv-badge-sale"
                        v-if="product.on_sale && product.discount_percent > 0"
                    >
                        -@{{ product.discount_percent }}%
                    </span>

                    <span
                        class="nv-badge-new"
                        v-else-if="product.is_new"
                    >
                        <span class="w-1.5 h-1.5 rounded-full bg-[#34D399]"></span>
                        Fresh
                    </span>
                </div>

                <div 
                    class="nv-veg-badge"
                    title="100% Pure Plant Vegetarian"
                >
                    <span class="nv-veg-dot"></span>
                </div>
            </div>

            <!-- Content Details -->
            <div class="flex flex-col justify-between flex-1 p-5 sm:p-6 gap-3 bg-transparent">
                <div class="flex flex-col gap-1.5">
                    <div class="flex items-center gap-2">
                        <span class="text-[11px] text-[#D4A359] font-bold uppercase tracking-[0.14em]">
                            @{{ product.category_name || 'Botanical Powders' }}
                        </span>
                        <span v-if="product.formatted_weight" class="nv-weight-pill shrink-0">
                            @{{ product.formatted_weight }}
                        </span>
                    </div>

                    <h3 class="nv-card-title text-lg sm:text-xl font-serif font-bold text-white group-hover:text-emerald-300 transition-colors leading-snug">
                        <a :href="'{{ route('shop.product_or_category.index', ':slug') }}'.replace(':slug', product.url_key)" class="text-white hover:text-emerald-300 transition-colors">
                            @{{ product.name }}
                        </a>
                    </h3>

                    <p class="text-xs text-white/75 line-clamp-2 mt-1 leading-relaxed" v-if="product.short_description">
                        @{{ product.short_description.replace(/<[^>]*>?/gm, '') }}
                    </p>
                </div>

                <!-- Price and Actions -->
                <div class="pt-3.5 border-t flex items-center justify-between gap-4 flex-wrap" style="border-color: rgba(255, 255, 255, 0.12);">
                    <div class="flex items-baseline gap-2">
                        <template v-if="product.special_price">
                            <span class="text-xl font-bold text-white tracking-tight">
                                @{{ product.special_price }}
                            </span>
                            <span class="text-xs text-white/50 line-through font-normal">
                                @{{ product.regular_price }}
                            </span>
                            <span v-if="product.discount_percent > 0" class="nv-discount-pill">
                                Save @{{ product.discount_percent }}%
                            </span>
                        </template>
                        <template v-else>
                            <span class="text-xl font-bold text-[#E6C687] tracking-tight">
                                @{{ product.regular_price || product.min_price }}
                            </span>
                        </template>
                    </div>

                    <div class="flex items-center gap-2.5">
                        @if (core()->getConfigData('sales.checkout.shopping_cart.cart_page'))
                            <button
                                type="button"
                                class="nv-btn-cart-compact"
                                :disabled="! product.is_saleable || isAddingToCart"
                                @click="addToCart()"
                            >
                                <svg class="w-4 h-4 text-white shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/>
                                    <line x1="3" y1="6" x2="21" y2="6"/>
                                    <path d="M16 10a4 4 0 0 1-8 0"/>
                                </svg>
                                <span v-if="! product.is_saleable">Out of Stock</span>
                                <span v-else-if="product.type === 'configurable'">Select Pack</span>
                                <span v-else-if="! isAddingToCart">Add To Cart</span>
                                <span v-else>Adding...</span>
                            </button>
                        @endif

                        @if (core()->getConfigData('customer.settings.wishlist.wishlist_option'))
                            <button
                                type="button"
                                class="nv-card-action-btn flex h-9 w-9 items-center justify-center rounded-full"
                                aria-label="@lang('shop::app.components.products.card.add-to-wishlist')"
                                :class="product.is_wishlist ? '!text-rose-400 !border-rose-400/50' : ''"
                                @click="addToWishlist()"
                            >
                                <span :class="product.is_wishlist ? 'icon-heart-fill' : 'icon-heart'" class="text-sm"></span>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-product-card', {
            template: '#v-product-card-template',

            props: ['mode', 'product'],

            data() {
                return {
                    isCustomer: '{{ auth()->guard('customer')->check() }}',
                    isAddingToCart: false,
                }
            },

            methods: {
                openQuickView() {
                    this.$emitter.emit('open-quick-view', this.product);
                },

                addToWishlist() {
                    if (this.isCustomer) {
                        this.$axios.post(`{{ route('shop.api.customers.account.wishlist.store') }}`, {
                                product_id: this.product.id
                            })
                            .then(response => {
                                this.product.is_wishlist = ! this.product.is_wishlist;
                                this.$emitter.emit('add-flash', { type: 'success', message: response.data.data.message });
                            })
                            .catch(error => {});
                    } else {
                        window.location.href = "{{ route('shop.customer.session.index')}}";
                    }
                },

                addToCompare(productId) {
                    if (this.isCustomer) {
                        this.$axios.post('{{ route("shop.api.compare.store") }}', {
                                'product_id': productId
                            })
                            .then(response => {
                                this.$emitter.emit('add-flash', { type: 'success', message: response.data.data.message });
                            })
                            .catch(error => {
                                if ([400, 422].includes(error.response.status)) {
                                    this.$emitter.emit('add-flash', { type: 'warning', message: error.response.data.data.message });
                                    return;
                                }
                                this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message});
                            });

                        return;
                    }

                    let items = this.getStorageValue() ?? [];
                    if (items.length) {
                        if (! items.includes(productId)) {
                            items.push(productId);
                            localStorage.setItem('compare_items', JSON.stringify(items));
                            this.$emitter.emit('add-flash', { type: 'success', message: "@lang('shop::app.components.products.card.add-to-compare-success')" });
                        } else {
                            this.$emitter.emit('add-flash', { type: 'warning', message: "@lang('shop::app.components.products.card.already-in-compare')" });
                        }
                    } else {
                        localStorage.setItem('compare_items', JSON.stringify([productId]));
                        this.$emitter.emit('add-flash', { type: 'success', message: "@lang('shop::app.components.products.card.add-to-compare-success')" });
                    }
                },

                getStorageValue(key) {
                    let value = localStorage.getItem('compare_items');
                    if (! value) return [];
                    return JSON.parse(value);
                },

                addToCart() {
                    if (this.product.type === 'configurable') {
                        window.location.href = '{{ route('shop.product_or_category.index', ':slug') }}'.replace(':slug', this.product.url_key);
                        return;
                    }

                    this.isAddingToCart = true;

                    this.$axios.post('{{ route("shop.api.checkout.cart.store") }}', {
                            'quantity': 1,
                            'product_id': this.product.id,
                        })
                        .then(response => {
                            if (response.data.message) {
                                this.$emitter.emit('update-mini-cart', response.data.data );
                                this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                                this.$emitter.emit('open-mini-cart');
                            } else {
                                this.$emitter.emit('add-flash', { type: 'warning', message: response.data.data.message });
                            }
                            this.isAddingToCart = false;
                        })
                        .catch(error => {
                            this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message });
                            if (error.response.data.redirect_uri) {
                                window.location.href = error.response.data.redirect_uri;
                            }
                            this.isAddingToCart = false;
                        });
                },
            },
        });
    </script>
@endpushOnce
