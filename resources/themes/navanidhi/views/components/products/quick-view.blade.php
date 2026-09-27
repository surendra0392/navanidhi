<v-quick-view></v-quick-view>

@pushOnce('styles')
    <style>
        .nv-quickview-card {
            background: linear-gradient(145deg, rgba(6, 36, 20, 0.95) 0%, rgba(3, 20, 11, 0.98) 100%) !important;
            backdrop-filter: blur(28px) !important;
            -webkit-backdrop-filter: blur(28px) !important;
            border: 1px solid rgba(52, 211, 153, 0.35) !important;
            border-radius: 28px !important;
            box-shadow: 0 30px 100px -10px rgba(0, 0, 0, 0.9), 0 0 50px rgba(16, 185, 129, 0.22), inset 0 1px 2px rgba(255, 255, 255, 0.25) !important;
            color: #FFFFFF !important;
        }
        .nv-quickview-card h3 {
            color: #FFFFFF !important;
        }
        .nv-quickview-card p {
            color: rgba(236, 253, 245, 0.85) !important;
        }
        .nv-quickview-qty-btn {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 34px !important;
            height: 34px !important;
            border-radius: 9999px !important;
            color: #FFFFFF !important;
            transition: all 0.2s ease !important;
            background: transparent !important;
            cursor: pointer !important;
            border: none !important;
        }
        .nv-quickview-qty-btn:hover:not(:disabled) {
            background: rgba(255, 255, 255, 0.15) !important;
            color: #34D399 !important;
        }
        .nv-quickview-qty-btn:disabled {
            opacity: 0.3 !important;
            cursor: not-allowed !important;
        }
        .nv-quickview-trust-item {
            background: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(255, 255, 255, 0.10) !important;
            border-radius: 12px !important;
            padding: 8px 12px !important;
            display: flex !important;
            align-items: center !important;
            gap: 8px !important;
            font-size: 11.5px !important;
            font-weight: 500 !important;
            color: rgba(255, 255, 255, 0.9) !important;
        }
    </style>
@endpushOnce

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-quick-view-template"
    >
        <teleport to="body">
            <div v-if="isOpen">
                <!-- Modal Overlay Backdrop -->
                <transition
                    enter-active-class="transition-opacity duration-300 ease-out"
                    enter-from-class="opacity-0"
                    enter-to-class="opacity-100"
                    leave-active-class="transition-opacity duration-200 ease-in"
                    leave-from-class="opacity-100"
                    leave-to-class="opacity-0"
                >
                    <div
                        class="fixed inset-0"
                        style="position: fixed !important; inset: 0px !important; z-index: 99999 !important; background-color: rgba(2, 14, 8, 0.78) !important; backdrop-filter: blur(16px) !important; -webkit-backdrop-filter: blur(16px) !important;"
                        @click="close"
                    ></div>
                </transition>

                <!-- Modal Content Dialog Wrapper -->
                <transition
                    enter-active-class="transition-all duration-300 ease-out"
                    enter-from-class="opacity-0 scale-95 translate-y-4"
                    enter-to-class="opacity-100 scale-100 translate-y-0"
                    leave-active-class="transition-all duration-200 ease-in"
                    leave-from-class="opacity-100 scale-100 translate-y-0"
                    leave-to-class="opacity-0 scale-95 translate-y-4"
                >
                    <div
                        class="fixed inset-0 flex items-center justify-center p-4 sm:p-6 overflow-y-auto"
                        style="position: fixed !important; inset: 0px !important; z-index: 100000 !important;"
                        @click.self="close"
                    >
                    <!-- Modal Frame -->
                    <div
                        class="relative w-full max-w-4xl my-auto"
                        role="dialog"
                        aria-modal="true"
                    >
                        <!-- Modal Dialog Card Body -->
                        <div class="relative z-10 w-full max-h-[88vh] overflow-y-auto rounded-3xl nv-quickview-card p-6 sm:p-8">
                            <div class="flex flex-col md:flex-row gap-8" v-if="product">
                                <!-- Left: Gallery Showcase -->
                                <div class="w-full md:w-1/2 flex flex-col gap-4">
                                    <div class="relative aspect-square w-full overflow-hidden rounded-2xl bg-black/40 border border-white/15">
                                        <img
                                            :src="activeImage || product.base_image?.large_image_url || product.base_image?.medium_image_url"
                                            :alt="product.name"
                                            class="h-full w-full object-cover transition-all duration-300"
                                        />

                                        <!-- Badges -->
                                        <div class="absolute top-3 left-3 flex flex-col gap-1.5 z-10">
                                            <span
                                                v-if="product.discount_percent > 0"
                                                class="nv-badge-sale"
                                            >
                                                -@{{ product.discount_percent }}% OFF
                                            </span>
                                            <span
                                                v-if="product.is_new"
                                                class="nv-badge-new"
                                            >
                                                <span class="w-1.5 h-1.5 rounded-full bg-[#34D399]"></span>
                                                Fresh Botanical
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Thumbnail strip if multiple gallery images -->
                                    <div
                                        class="flex items-center gap-3 overflow-x-auto pb-1"
                                        v-if="product.gallery_images && product.gallery_images.length > 1"
                                    >
                                        <button
                                            v-for="(img, idx) in product.gallery_images"
                                            :key="idx"
                                            type="button"
                                            class="relative h-16 w-16 shrink-0 overflow-hidden rounded-xl border-2 transition-all cursor-pointer"
                                            :class="activeImage === (img.large_image_url || img.medium_image_url) ? 'border-emerald-400 ring-2 ring-emerald-400/40' : 'border-white/20 opacity-70 hover:opacity-100 hover:border-white/40'"
                                            @click="activeImage = img.large_image_url || img.medium_image_url"
                                        >
                                            <img
                                                :src="img.small_image_url || img.medium_image_url"
                                                :alt="product.name"
                                                class="h-full w-full object-cover"
                                            />
                                        </button>
                                    </div>
                                </div>

                                <!-- Right: Product Information & Commerce Actions -->
                                <div class="w-full md:w-1/2 flex flex-col justify-between space-y-6">
                                    <div class="space-y-4">
                                        <!-- Eyebrow Category & Weight -->
                                        <div class="flex items-center justify-between gap-3">
                                            <span class="text-xs font-bold uppercase tracking-[0.16em] text-[#D4A359]">
                                                @{{ product.category_name || 'Pure Botanical' }}
                                            </span>
                                            <span
                                                v-if="product.formatted_weight"
                                                class="nv-weight-pill shrink-0"
                                            >
                                                @{{ product.formatted_weight }}
                                            </span>
                                        </div>

                                        <!-- Product Title -->
                                        <h3 class="font-serif text-2xl sm:text-3xl font-bold text-white leading-snug">
                                            @{{ product.name }}
                                        </h3>

                                        <!-- Side-by-Side Pricing -->
                                        <div class="flex items-baseline gap-3 pt-1">
                                            <template v-if="product.special_price">
                                                <span class="font-serif text-2xl sm:text-3xl font-bold text-white">
                                                    @{{ product.special_price }}
                                                </span>
                                                <span class="text-base text-white/50 line-through font-normal">
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
                                                <span class="font-serif text-2xl sm:text-3xl font-bold text-[#E6C687]">
                                                    @{{ product.regular_price || product.min_price }}
                                                </span>
                                            </template>
                                        </div>

                                        <!-- Short Description -->
                                        <p
                                            class="text-xs sm:text-sm text-white/80 leading-relaxed pt-2 border-t border-white/10"
                                            v-if="product.short_description"
                                        >
                                            @{{ product.short_description.replace(/<[^>]*>?/gm, '') }}
                                        </p>

                                        <!-- Botanical Trust Badges -->
                                        <div class="grid grid-cols-2 gap-2 pt-2">
                                            <div class="nv-quickview-trust-item">
                                                <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                                <span>Cold-Dehydrated &lt; 42°C</span>
                                            </div>
                                            <div class="nv-quickview-trust-item">
                                                <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                                <span>Zero Synthetic Dyes</span>
                                            </div>
                                            <div class="nv-quickview-trust-item">
                                                <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                                <span>100% Plant Purity</span>
                                            </div>
                                            <div class="nv-quickview-trust-item">
                                                <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                                <span>Free Shipping &gt; ₹499</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Commerce Action Controls -->
                                    <div class="space-y-4 pt-4 border-t border-white/10">
                                        <div class="flex items-center gap-4">
                                            <!-- Quantity Selector -->
                                            <div class="flex items-center rounded-full border border-white/20 bg-black/40 p-1">
                                                <button
                                                    type="button"
                                                    class="nv-quickview-qty-btn"
                                                    :disabled="quantity <= 1"
                                                    @click="quantity > 1 ? quantity-- : null"
                                                >
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"/></svg>
                                                </button>

                                                <span class="w-9 text-center text-sm font-bold text-white">
                                                    @{{ quantity }}
                                                </span>

                                                <button
                                                    type="button"
                                                    class="nv-quickview-qty-btn"
                                                    @click="quantity++"
                                                >
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                                                </button>
                                            </div>

                                            <!-- Add to Cart Button -->
                                            <button
                                                type="button"
                                                class="nv-btn-cart flex-1"
                                                :disabled="! product.is_saleable || isAddingToCart"
                                                @click="addToCart()"
                                            >
                                                <svg class="w-4 h-4 text-white shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/>
                                                    <line x1="3" y1="6" x2="21" y2="6"/>
                                                    <path d="M16 10a4 4 0 0 1-8 0"/>
                                                </svg>
                                                <span v-if="! product.is_saleable">Out of Stock</span>
                                                <span v-else-if="! isAddingToCart">Add To Cart</span>
                                                <span v-else>Adding...</span>
                                            </button>
                                        </div>

                                        <!-- View Full Details Link -->
                                        <div class="text-center pt-2">
                                            <a
                                                :href="'{{ route('shop.product_or_category.index', ':slug') }}'.replace(':slug', product.url_key)"
                                                class="inline-flex items-center gap-1 text-xs font-bold uppercase tracking-widest text-[#D4A359] hover:text-emerald-300 transition-colors underline underline-offset-4"
                                            >
                                                View Full Botanical Profile &amp; Recipes &rarr;
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Close Button -->
                        <button
                            type="button"
                            class="absolute flex h-10 w-10 sm:h-11 sm:w-11 items-center justify-center rounded-full shadow-2xl transition-all duration-200 hover:scale-110 hover:bg-emerald-600 focus:outline-none cursor-pointer"
                            style="top: -14px; right: -14px; background: rgba(4, 26, 14, 0.95); color: #ffffff; border: 2px solid rgba(255, 255, 255, 0.4); z-index: 9999; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.6);"
                            aria-label="Close Quick View"
                            @click="close"
                        >
                            <svg class="w-5 h-5 text-white stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                </div>
            </transition>
            </div>
        </teleport>
    </script>

    <script type="module">
        app.component('v-quick-view', {
            template: '#v-quick-view-template',

            data() {
                return {
                    isOpen: false,
                    product: null,
                    activeImage: null,
                    quantity: 1,
                    isAddingToCart: false,
                };
            },

            mounted() {
                window.addEventListener('keydown', this.handleKeydown);

                this.$emitter.on('open-quick-view', (product) => {
                    this.product = product;
                    this.activeImage = product.base_image?.large_image_url || product.base_image?.medium_image_url || null;
                    this.quantity = 1;
                    this.isOpen = true;
                    document.body.style.overflow = 'hidden';
                });
            },

            beforeUnmount() {
                window.removeEventListener('keydown', this.handleKeydown);

                if (this.isOpen) {
                    document.body.style.overflow = '';
                }
            },

            methods: {
                handleKeydown(e) {
                    if (e.key === 'Escape' && this.isOpen) {
                        this.close();
                    }
                },

                close() {
                    this.isOpen = false;
                    this.product = null;
                    this.activeImage = null;
                    document.body.style.overflow = '';
                },

                calculateSubtotal() {
                    if (! this.product) return '';
                    let priceStr = this.product.special_price || this.product.regular_price || this.product.min_price || '';
                    return priceStr;
                },

                addToCart() {
                    if (! this.product) return;

                    this.isAddingToCart = true;

                    this.$axios.post('{{ route("shop.api.checkout.cart.store") }}', {
                            'quantity': this.quantity,
                            'product_id': this.product.id,
                        })
                        .then(response => {
                            if (response.data.message) {
                                this.$emitter.emit('update-mini-cart', response.data.data);
                                this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                                this.close();
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
            }
        });
    </script>
@endpushOnce
