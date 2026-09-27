<!-- Estimate Tax and Shipping -->
{!! view_render_event('bagisto.shop.checkout.cart.summary.estimate_shipping.before') !!}

<x-shop::accordion
    class="overflow-hidden rounded-2xl border border-white/15 bg-white/[0.04] backdrop-blur-md transition-all"
    :is-active="false"
>
    <x-slot:header class="p-3.5 font-semibold text-xs sm:text-sm text-white/90 hover:text-emerald-300 transition-colors cursor-pointer flex items-center justify-between">
        <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-emerald-400 text-[18px]">local_shipping</span>
            <span>@lang('shop::app.checkout.cart.summary.estimate-shipping.title')</span>
        </div>
    </x-slot>

    <x-slot:content class="p-4 pt-3 border-t border-white/10 bg-black/25 text-white">
        <v-estimate-tax-shipping
            :cart="cart"
            @processed="setCart"
        ></v-estimate-tax-shipping>
    </x-slot>
</x-shop::accordion>

{!! view_render_event('bagisto.shop.checkout.cart.summary.estimate_shipping.after') !!}

@pushOnce('scripts')
    <script type="text/x-template" id="v-estimate-tax-shipping-template">
        <div class="space-y-3.5">
            <p class="text-xs text-white/70 leading-relaxed">
                @lang('shop::app.checkout.cart.summary.estimate-shipping.info')
            </p>

            <form @submit.prevent="calculateShipping" class="space-y-3">
                <!-- Country -->
                <div class="space-y-1">
                    <label class="block text-xs font-semibold text-white/80">
                        @lang('shop::app.checkout.cart.summary.estimate-shipping.country')
                    </label>

                    <select
                        name="country"
                        v-model="selectedCountry"
                        @change="onCountryChange"
                        class="w-full h-10 px-3 rounded-xl border border-white/20 bg-white/10 text-xs text-white focus:border-emerald-400 focus:ring-1 focus:ring-emerald-400 outline-none"
                        style="background-color: rgba(255, 255, 255, 0.08); color: #ffffff;"
                    >
                        <option value="" style="background: #041a0e; color: #ffffff;">
                            @lang('shop::app.checkout.cart.summary.estimate-shipping.select-country')
                        </option>

                        <option
                            v-for="country in countries"
                            :key="country.code"
                            :value="country.code"
                            v-text="country.name"
                            style="background: #041a0e; color: #ffffff;"
                        ></option>
                    </select>
                </div>

                <!-- State -->
                <div class="space-y-1">
                    <label class="block text-xs font-semibold text-white/80">
                        @lang('shop::app.checkout.cart.summary.estimate-shipping.state')
                    </label>

                    <select
                        v-if="haveStates"
                        name="state"
                        v-model="selectedState"
                        :disabled="!selectedCountry"
                        @change="calculateShipping"
                        class="w-full h-10 px-3 rounded-xl border border-white/20 bg-white/10 text-xs text-white focus:border-emerald-400 focus:ring-1 focus:ring-emerald-400 outline-none disabled:bg-white/5 disabled:opacity-40 disabled:cursor-not-allowed"
                        style="background-color: rgba(255, 255, 255, 0.08); color: #ffffff;"
                    >
                        <option value="" style="background: #041a0e; color: #ffffff;">
                            @lang('shop::app.checkout.cart.summary.estimate-shipping.select-state')
                        </option>

                        <option
                            v-for="state in states[selectedCountry]"
                            :key="state.code"
                            :value="state.code"
                            v-text="state.default_name"
                            style="background: #041a0e; color: #ffffff;"
                        ></option>
                    </select>

                    <input
                        v-else
                        type="text"
                        name="state"
                        v-model="selectedState"
                        :disabled="!selectedCountry"
                        @change="calculateShipping"
                        :placeholder="selectedCountry ? 'Enter state' : 'Select country first'"
                        class="w-full h-10 px-3 rounded-xl border border-white/20 bg-white/10 text-xs text-white placeholder:text-white/40 focus:border-emerald-400 focus:ring-1 focus:ring-emerald-400 outline-none disabled:bg-white/5 disabled:opacity-40 disabled:cursor-not-allowed"
                        style="background-color: rgba(255, 255, 255, 0.08); color: #ffffff;"
                    />
                </div>

                <!-- Postcode -->
                <div class="space-y-1">
                    <label class="block text-xs font-semibold text-white/80">
                        @lang('shop::app.checkout.cart.summary.estimate-shipping.postcode')
                    </label>

                    <div class="flex gap-2">
                        <input
                            type="text"
                            name="postcode"
                            v-model="selectedPostcode"
                            :disabled="!selectedCountry"
                            placeholder="e.g. 500001"
                            class="flex-1 h-10 px-3 rounded-xl border border-white/20 bg-white/10 text-xs text-white placeholder:text-white/40 focus:border-emerald-400 focus:ring-1 focus:ring-emerald-400 outline-none disabled:bg-white/5 disabled:opacity-40 disabled:cursor-not-allowed"
                            style="background-color: rgba(255, 255, 255, 0.08); color: #ffffff;"
                        />

                        <button
                            type="submit"
                            :disabled="isLoading || !selectedCountry"
                            class="h-10 px-4 rounded-xl bg-gradient-to-r from-[#c9a25a] to-[#b08a43] hover:from-[#d6b677] hover:to-[#c9a25a] text-[#041a0e] text-xs font-bold uppercase tracking-wider transition-all disabled:opacity-50 flex items-center justify-center cursor-pointer shadow-md"
                        >
                            <span v-if="isLoading" class="inline-block h-3.5 w-3.5 animate-spin rounded-full border-2 border-[#041a0e] border-t-transparent"></span>
                            <span v-else>Check</span>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Loading State -->
            <div v-if="isLoading" class="flex items-center justify-center py-4 text-xs text-white/70 gap-2">
                <span class="inline-block h-4 w-4 animate-spin rounded-full border-2 border-emerald-400 border-t-transparent"></span>
                <span>Calculating live delivery rates...</span>
            </div>

            <!-- Shipping Methods List -->
            <div v-else-if="shippingMethods.length" class="space-y-2 pt-2 border-t border-white/10">
                <p class="text-xs font-semibold text-white/90">Available Delivery Options:</p>

                <div
                    v-for="method in shippingMethods"
                    :key="method.carrier_code"
                    class="space-y-1.5"
                >
                    <div
                        v-for="rate in method.rates"
                        :key="rate.id"
                        class="flex items-center justify-between p-2.5 rounded-xl border border-white/15 bg-white/[0.06] text-xs"
                    >
                        <div>
                            <p class="font-bold text-white">@{{ rate.method_title }}</p>
                            <p class="text-[11px] text-white/60" v-if="rate.method_description">@{{ rate.method_description }}</p>
                        </div>

                        <span class="font-bold text-emerald-300">
                            <template v-if="parseFloat(rate.price || rate.base_price || 0) <= 0">
                                FREE
                            </template>
                            <template v-else>
                                @{{ rate.formatted_price || ('₹' + parseFloat(rate.price).toFixed(2)) }}
                            </template>
                        </span>
                    </div>
                </div>

                <button
                    type="button"
                    class="text-[11px] text-white/60 hover:text-rose-400 transition-colors underline cursor-pointer pt-1"
                    @click="resetShipping"
                >
                    Reset destination
                </button>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-estimate-tax-shipping', {
            template: '#v-estimate-tax-shipping-template',

            props: ['cart'],

            data() {
                return {
                    countries: @json(core()->countries()),
                    states: @json(core()->groupedStatesByCountries()),
                    selectedCountry: this.cart?.shipping_address?.country || 'IN',
                    selectedState: this.cart?.shipping_address?.state || '',
                    selectedPostcode: this.cart?.shipping_address?.postcode || '',
                    shippingMethods: [],
                    isLoading: false,
                };
            },

            computed: {
                haveStates() {
                    return this.selectedCountry && !!this.states[this.selectedCountry]?.length;
                },
            },

            mounted() {
                if (this.selectedCountry && (this.selectedState || this.selectedPostcode)) {
                    this.calculateShipping();
                }
            },

            methods: {
                onCountryChange() {
                    this.selectedState = '';
                    this.selectedPostcode = '';
                    this.shippingMethods = [];
                },

                calculateShipping() {
                    if (! this.selectedCountry) return;

                    this.isLoading = true;

                    this.$axios.post('{{ route('shop.api.checkout.cart.estimate_shipping') }}', {
                        country: this.selectedCountry,
                        state: this.selectedState,
                        postcode: this.selectedPostcode,
                    })
                    .then((response) => {
                        this.isLoading = false;
                        this.shippingMethods = response.data.data.shipping_methods || [];
                        this.$emit('processed', response.data.data.cart);
                    })
                    .catch((error) => {
                        this.isLoading = false;
                        this.$emitter.emit('add-flash', {
                            type: 'warning',
                            message: error.response?.data?.message || 'Unable to estimate shipping for this location.'
                        });
                    });
                },

                resetShipping() {
                    this.isLoading = true;

                    this.$axios.delete('{{ route('shop.api.checkout.cart.estimate_shipping.reset') }}')
                    .then((response) => {
                        this.isLoading = false;
                        this.shippingMethods = [];
                        this.selectedState = '';
                        this.selectedPostcode = '';
                        this.$emit('processed', response.data.data.cart);
                    })
                    .catch(() => {
                        this.isLoading = false;
                    });
                },
            },
        });
    </script>
@endPushOnce
