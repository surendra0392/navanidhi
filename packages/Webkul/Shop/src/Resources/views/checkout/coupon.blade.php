<!-- Coupon Vue Component -->
<v-coupon 
    :cart="cart"
    @coupon-applied="getCart"
    @coupon-removed="getCart"
>
</v-coupon>

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-coupon-template"
    >
        <div class="flex justify-between items-center text-right">
            <p class="text-xs font-semibold text-white/80">
                @{{ cart.coupon_code ? "@lang('shop::app.checkout.coupon.applied')" : "@lang('shop::app.checkout.coupon.discount')" }}
            </p>

            {!! view_render_event('bagisto.shop.checkout.cart.coupon.before') !!}

            <div>
                <!-- Apply Coupon Form -->
                <x-shop::form
                    v-slot="{ meta, errors, handleSubmit }"
                    as="div"
                >
                    <!-- Apply coupon form -->
                    <form @submit="handleSubmit($event, applyCoupon)">
                        {!! view_render_event('bagisto.shop.checkout.cart.coupon.coupon_form_controls.before') !!}

                        <!-- Apply coupon modal -->
                        <x-shop::modal ref="couponModel">
                            <!-- Modal Toggler -->
                            <x-slot:toggle>
                                <span 
                                    class="cursor-pointer text-xs font-semibold uppercase tracking-wider text-emerald-300 hover:text-emerald-200 transition-colors underline underline-offset-4"
                                    role="button"
                                    tabindex="0"
                                    v-if="! cart.coupon_code"
                                >
                                    @lang('shop::app.checkout.coupon.apply')
                                </span>
                            </x-slot>

                            <!-- Modal Header -->
                            <x-slot:header class="!border-b !border-white/10 !p-5 text-white" style="background: rgba(4, 26, 14, 0.98) !important; color: #ffffff !important;">
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-emerald-400 text-xl">local_offer</span>
                                    <h2 class="font-serif text-xl font-bold text-white">
                                        Apply Promo Coupon
                                    </h2>
                                </div>
                            </x-slot>

                            <!-- Modal Content -->
                            <x-slot:content class="!p-5 text-white space-y-4" style="background: rgba(4, 26, 14, 0.95) !important; color: #ffffff !important;">
                                <p class="text-xs text-white/70">Enter your promotional code or voucher to redeem instant savings on your order.</p>

                                <x-shop::form.control-group class="!mb-0">
                                    <x-shop::form.control-group.control
                                        type="text"
                                        class="w-full h-11 px-4 text-sm text-white placeholder:text-white/40 bg-white/10 border border-white/20 rounded-xl focus:border-emerald-400 focus:ring-1 focus:ring-emerald-400 transition-all outline-none"
                                        style="background: rgba(255, 255, 255, 0.08) !important; color: #ffffff !important; border-color: rgba(255, 255, 255, 0.25) !important;"
                                        name="code"
                                        rules="required"
                                        placeholder="e.g. NAVANIDHI10"
                                    />

                                    <x-shop::form.control-group.error
                                        class="flex text-xs text-rose-400 mt-1"
                                        control-name="code"
                                    />
                                </x-shop::form.control-group>
                            </x-slot:content>

                            <!-- Modal Footer -->
                            <x-slot:footer class="!border-t !border-white/10 !p-4" style="background: rgba(4, 26, 14, 0.98) !important; color: #ffffff !important;">
                                <div class="flex items-center justify-between gap-4">
                                    <div class="text-left">
                                        <p class="text-[11px] uppercase tracking-wider text-white/60">Subtotal</p>
                                        <p class="font-serif text-lg font-bold text-[#E6C687]">@{{ cart.formatted_sub_total }}</p>
                                    </div>

                                    <button
                                        type="submit"
                                        class="h-11 px-6 rounded-xl text-[#041a0e] bg-gradient-to-r from-[#c9a25a] to-[#b08a43] hover:from-[#d6b677] hover:to-[#c9a25a] text-xs font-bold uppercase tracking-widest transition-all disabled:opacity-50 flex items-center gap-2 cursor-pointer shadow-lg shadow-[#c9a25a]/25"
                                        :disabled="isStoring"
                                    >
                                        <span v-if="isStoring" class="inline-block h-3.5 w-3.5 animate-spin rounded-full border-2 border-[#041a0e] border-t-transparent"></span>
                                        <span>Apply Coupon</span>
                                    </button>
                                </div>
                            </x-slot:footer>
                        </x-shop::modal>

                        {!! view_render_event('bagisto.shop.checkout.cart.coupon.coupon_form_controls.after') !!}
                    </form>
                </x-shop::form>

                <!-- Applied Coupon Information Container -->
                <span
                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-emerald-500/20 border border-emerald-400/30 text-xs font-bold text-emerald-300"
                    v-if="cart.coupon_code"
                >
                    <span class="material-symbols-outlined text-[14px]">verified</span>
                    <span>@{{ cart.coupon_code }}</span>

                    <button
                        type="button"
                        class="ml-1 text-white/50 hover:text-rose-400 transition-colors cursor-pointer"
                        title="@lang('shop::app.checkout.coupon.remove')"
                        @click="destroyCoupon"
                    >
                        <span class="material-symbols-outlined text-[14px]">close</span>
                    </button>
                </span>
            </div>

            {!! view_render_event('bagisto.shop.checkout.cart.coupon.after') !!}
        </div>
    </script>

    <script type="module">
        app.component('v-coupon', {
            template: '#v-coupon-template',

            props: ['cart'],

            data() {
                return {
                    isStoring: false,
                }
            },

            methods: {
                applyCoupon(params, { resetForm }) {
                    this.isStoring = true;

                    this.$axios.post('{{ route('shop.api.checkout.cart.coupon.apply') }}', params)
                        .then((response) => {
                            this.isStoring = false;
                            this.$emit('coupon-applied');
                            this.$refs.couponModel.close();
                            resetForm();
                            this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                        })
                        .catch((error) => {
                            this.isStoring = false;
                            this.$emitter.emit('add-flash', { type: 'warning', message: error.response.data.message });
                        });
                },

                destroyCoupon() {
                    this.$axios.delete('{{ route('shop.api.checkout.cart.coupon.remove') }}')
                        .then((response) => {
                            this.$emit('coupon-removed');
                            this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                        })
                        .catch((error) => {
                            this.$emitter.emit('add-flash', { type: 'warning', message: error.response.data.message });
                        });
                },
            }
        });
    </script>
@endPushOnce