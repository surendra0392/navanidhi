<!-- SEO Meta Content -->
@push('meta')
    <meta name="title" content="@lang('shop::app.checkout.onepage.index.checkout') | Navanidhi Naturals" />
    <meta name="description" content="Complete your Navanidhi Naturals botanical nutrition order with secure 256-bit encrypted checkout." />
@endPush

<x-shop::layouts
    :has-header="false"
    :has-feature="false"
    :has-footer="true"
>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.checkout.onepage.index.checkout') | Navanidhi Naturals
    </x-slot>

    @php
        $channel = core()->getCurrentChannel();
        $logoConfig = core()->getConfigData('general.design.admin_logo.logo_image');
        $logoUrl = $channel->logo_url ?: ($logoConfig ? \Illuminate\Support\Facades\Storage::url($logoConfig) : null);
    @endphp

    <!-- Focused Secure Checkout Top Bar -->
    <header class="border-b border-[#0D5C3A]/15 sticky top-0 z-30 shadow-xs glass-header bg-[#FCFBF7]/90 backdrop-blur-md">
        <div class="site-container h-16 sm:h-20 flex items-center justify-between">
            <!-- Logo -->
            <a
                href="{{ route('shop.home.index') }}"
                class="flex items-center py-2 group"
                aria-label="Navanidhi Naturals"
            >
                @if ($logoUrl)
                    <img
                        src="{{ $logoUrl }}"
                        alt="{{ config('app.name', 'Navanidhi Naturals') }}"
                        class="h-9 sm:h-11 w-auto object-contain max-w-[180px] transition-transform duration-300 group-hover:scale-[1.02]"
                    />
                @else
                    <div class="flex flex-col">
                        <span class="font-serif text-2xl sm:text-3xl font-bold tracking-tight text-[#111827] group-hover:text-[#0D5C3A] transition-colors">
                            NAVANIDHI
                        </span>
                        <span class="text-[8px] sm:text-[9px] tracking-[0.32em] uppercase text-[#6B7280] -mt-0.5 font-sans font-semibold">
                            NATURALS
                        </span>
                    </div>
                @endif
            </a>

            <!-- Center Trust Badge (Desktop) -->
            <div class="hidden md:flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#0D5C3A] bg-[#0D5C3A]/10 border border-[#0D5C3A]/20 px-4 py-1.5 rounded-full shadow-2xs">
                <span class="material-symbols-outlined text-[16px] text-[#0D5C3A]">lock</span>
                <span>Secure 256-Bit SSL Checkout</span>
            </div>

            <!-- Right: Return to Cart & Auth -->
            <div class="flex items-center gap-3 sm:gap-4">
                <a
                    href="{{ route('shop.checkout.cart.index') }}"
                    class="inline-flex items-center gap-1.5 text-xs font-bold uppercase tracking-wider text-[#111827] hover:text-[#0D5C3A] transition-colors"
                >
                    <span class="icon-arrow-left text-xs"></span>
                    <span>Back to Bag</span>
                </a>

                @guest('customer')
                    <span class="text-[#0D5C3A]/20 hidden sm:inline">|</span>
                    <div class="block">
                        @include('shop::checkout.login')
                    </div>
                @endguest
            </div>
        </div>
    </header>

    <div class="bg-[#FCFBF7] min-h-[calc(100vh-80px)]">
        <!-- Breadcrumbs -->
        <div class="site-container pt-4 pb-2 sm:pt-6 sm:pb-3">
            <nav aria-label="Breadcrumb" class="flex items-center space-x-2 text-[11px] sm:text-xs uppercase tracking-[0.14em] text-[#6B7280]">
                <a href="{{ route('shop.home.index') }}" class="hover:text-[#0D5C3A] transition-colors">Home</a>
                <span class="text-[#0D5C3A]/25">/</span>
                <a href="{{ route('shop.checkout.cart.index') }}" class="hover:text-[#0D5C3A] transition-colors">Bag</a>
                <span class="text-[#0D5C3A]/25">/</span>
                <span class="text-[#111827] font-semibold">Express Checkout</span>
            </nav>
        </div>

        <!-- Page Header -->
        <div class="site-container pt-2 pb-6 sm:pt-4 sm:pb-8">
            <div class="space-y-1.5">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#0D5C3A]/10 border border-[#0D5C3A]/20 text-[#0D5C3A] text-[10px] sm:text-xs font-bold tracking-widest uppercase shadow-2xs">
                    <span class="material-symbols-outlined text-[15px] leading-none" aria-hidden="true">verified_user</span>
                    <span>Direct Farm Dispatch</span>
                </div>
                <h1 class="font-serif text-3xl sm:text-4xl font-bold tracking-tight text-[#111827]">
                    Express Checkout
                </h1>
            </div>
        </div>

        <!-- Checkout Vue Component -->
        <main class="site-container pb-20">
            <v-checkout>
                <!-- Shimmer Effect -->
                <x-shop::shimmer.checkout.onepage />
            </v-checkout>
        </main>
    </div>

    @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-checkout-template"
        >
            <template v-if="! cart">
                <!-- Shimmer Effect -->
                <x-shop::shimmer.checkout.onepage />
            </template>

            <template v-else>
                <div class="flex flex-col lg:flex-row gap-8 lg:gap-10 items-start">
                    <!-- Steps Container (Left Column) -->
                    <div
                        class="flex-1 w-full space-y-6"
                        id="steps-container"
                    >
                        <!-- Mobile Order Summary (Collapsible/Preview on Small Screens) -->
                        <div class="block lg:hidden">
                            @include('shop::checkout.onepage.summary')
                        </div>

                        <!-- Step 1: Address -->
                        <template v-if="['address', 'shipping', 'payment', 'review'].includes(currentStep)">
                            @include('shop::checkout.onepage.address')
                        </template>

                        <!-- Step 2: Shipping Methods -->
                        <template v-if="cart.have_stockable_items && ['shipping', 'payment', 'review'].includes(currentStep)">
                            @include('shop::checkout.onepage.shipping')
                        </template>

                        <!-- Step 3: Payment Methods -->
                        <template v-if="['payment', 'review'].includes(currentStep)">
                            @include('shop::checkout.onepage.payment')
                        </template>
                    </div>

                    <!-- Desktop Order Summary (Right Sticky Column) -->
                    <div class="hidden lg:block w-[380px] xl:w-[420px] shrink-0 sticky top-28 space-y-4">
                        @include('shop::checkout.onepage.summary')

                        <!-- Place Order Button -->
                        <div v-if="canPlaceOrder" class="pt-2">
                            <template v-if="(selectedPaymentMethod || cart.payment_method) == 'paypal_smart_button'">
                                {!! view_render_event('bagisto.shop.checkout.onepage.summary.paypal_smart_button.before') !!}

                                <v-paypal-smart-button></v-paypal-smart-button>

                                {!! view_render_event('bagisto.shop.checkout.onepage.summary.paypal_smart_button.after') !!}
                            </template>

                            <template v-else>
                                <button
                                    type="button"
                                    class="btn-emerald-primary w-full h-12 rounded-full text-white text-xs uppercase tracking-widest font-bold flex items-center justify-center gap-2 shadow-md transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer"
                                    :disabled="isPlacingOrder"
                                    @click="placeOrder"
                                >
                                    <span v-if="isPlacingOrder" class="inline-block animate-spin mr-1">◌</span>
                                    <span>@lang('shop::app.checkout.onepage.summary.place-order')</span>
                                    <span class="icon-arrow-right text-xs"></span>
                                </button>
                            </template>
                        </div>
                    </div>
                </div>
            </template>
        </script>

        <script type="module">
            app.component('v-checkout', {
                template: '#v-checkout-template',

                data() {
                    return {
                        cart: null,

                        displayTax: {
                            prices: "{{ core()->getConfigData('sales.taxes.shopping_cart.display_prices') }}",
                            subtotal: "{{ core()->getConfigData('sales.taxes.shopping_cart.display_subtotal') }}",
                            shipping: "{{ core()->getConfigData('sales.taxes.shopping_cart.display_shipping_amount') }}",
                        },

                        isPlacingOrder: false,
                        currentStep: 'address',
                        shippingMethods: null,
                        paymentMethods: null,
                        selectedPaymentMethod: null,
                        canPlaceOrder: false,
                    }
                },

                mounted() {
                    this.getCart();
                },

                methods: {
                    getCart() {
                        this.$axios.get("{{ route('shop.checkout.onepage.summary') }}")
                            .then(response => {
                                this.cart = response.data.data;
                                this.scrollToCurrentStep();
                            })
                            .catch(error => {});
                    },

                    stepForward(step) {
                        this.currentStep = step;

                        if (step == 'review') {
                            this.canPlaceOrder = true;
                            return;
                        }

                        this.canPlaceOrder = false;

                        if (this.currentStep == 'shipping') {
                            this.shippingMethods = null;
                        } else if (this.currentStep == 'payment') {
                            this.paymentMethods = null;
                        }
                    },

                    stepProcessed(data) {
                        if (this.currentStep == 'shipping') {
                            this.shippingMethods = data;
                        } else if (this.currentStep == 'payment') {
                            this.paymentMethods = data;
                        }

                        this.getCart();
                    },

                    scrollToCurrentStep() {
                        let container = document.getElementById('steps-container');

                        if (! container) {
                            return;
                        }

                        container.scrollIntoView({
                            behavior: 'smooth',
                            block: 'end'
                        });
                    },

                    setSelectedPaymentMethod(method) {
                        this.selectedPaymentMethod = method;
                    },

                    placeOrder() {
                        if ((this.selectedPaymentMethod || this.cart.payment_method) == 'paypal_smart_button') {
                            return;
                        }

                        this.isPlacingOrder = true;

                        this.$axios.post('{{ route('shop.checkout.onepage.orders.store') }}')
                            .then(response => {
                                if (response.data.data.redirect) {
                                    window.location.href = response.data.data.redirect_url;
                                } else {
                                    window.location.href = '{{ route('shop.checkout.onepage.success') }}';
                                }

                                this.isPlacingOrder = false;
                            })
                            .catch(error => {
                                this.isPlacingOrder = false;
                                this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message });
                            });
                    }
                },
            });
        </script>
    @endPushOnce
</x-shop::layouts>
