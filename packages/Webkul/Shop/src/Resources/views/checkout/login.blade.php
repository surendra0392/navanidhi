<!-- Checkout Login Vue JS Component -->
<v-checkout-login>
    <div class="flex items-center">
        <button
            type="button"
            class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all cursor-pointer shadow-xs border border-[#0D5C3A]/30"
            style="background-color: #FAF8F5 !important; color: #041a0e !important;"
        >
            <span class="material-symbols-outlined text-[15px]" style="color: #041a0e !important;">person</span>
            <span style="color: #041a0e !important; font-weight: 700 !important;">@lang('shop::app.checkout.login.title')</span>
        </button>
    </div>
</v-checkout-login>

@pushOnce('scripts')
    {!! \Webkul\Customer\Facades\Captcha::renderJS() !!}

    <script
        type="text/x-template"
        id="v-checkout-login-template"
    >
        <div>
            <div class="flex items-center">
                <button
                    type="button"
                    class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all cursor-pointer shadow-xs border border-[#0D5C3A]/30"
                    style="background-color: #FAF8F5 !important; color: #041a0e !important;"
                    @click="$refs.loginModel.open()"
                >
                    <span class="material-symbols-outlined text-[15px]" style="color: #041a0e !important;">person</span>
                    <span style="color: #041a0e !important; font-weight: 700 !important;">@lang('shop::app.checkout.login.title')</span>
                </button>
            </div>

            <!-- Login Form -->
            <x-shop::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
            >
                {!! view_render_event('bagisto.shop.checkout.login.before') !!}

                <!-- Login form -->
                <form @submit="handleSubmit($event, login)">
                    {!! view_render_event('bagisto.shop.checkout.login.form_controls.before') !!}

                    <!-- Login modal -->
                    <x-shop::modal
                        ref="loginModel"
                        panel-class="max-w-md !rounded-3xl !shadow-2xl overflow-hidden"
                    >
                        <!-- Modal Header -->
                        <x-slot:header class="!border-b !border-white/10 !px-6 sm:!px-8 !py-5 sm:!py-6" style="background: rgba(6, 32, 18, 0.98) !important; color: #FFFFFF !important;">
                            <div class="flex flex-col gap-1 text-left">
                                <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full w-fit text-[11px] font-bold uppercase tracking-wider" style="background: rgba(212, 163, 89, 0.15) !important; color: #D4A359 !important; border: 1px solid rgba(212, 163, 89, 0.3) !important;">
                                    <span class="material-symbols-outlined text-[13px]">eco</span>
                                    <span>NAVANIDHI NATURALS</span>
                                </div>

                                <h2 class="font-serif text-2xl font-bold tracking-tight mt-1" style="color: #FFFFFF !important;">
                                    @lang('shop::app.checkout.login.title')
                                </h2>

                                <p class="text-xs" style="color: rgba(167, 243, 208, 0.75) !important;">
                                    Sign in for saved addresses, member perks &amp; faster checkout.
                                </p>
                            </div>
                        </x-slot>

                        <!-- Modal Content -->
                        <x-slot:content class="!px-6 sm:!px-8 !pt-5 !pb-2 space-y-4" style="background: rgba(6, 32, 18, 0.98) !important; color: #FFFFFF !important;">
                            <!-- Email -->
                            <x-shop::form.control-group class="!mb-0">
                                <x-shop::form.control-group.label class="required !mt-0 !mb-1.5 text-xs font-bold uppercase tracking-wider" style="color: #6EE7B7 !important;">
                                    @lang('shop::app.checkout.login.email')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="email"
                                    name="email"
                                    rules="required|email"
                                    class="!mb-0 w-full !h-12 !px-4 !rounded-xl !border !text-sm transition-all outline-none"
                                    style="background-color: rgba(255, 255, 255, 0.08) !important; border-color: rgba(255, 255, 255, 0.2) !important; color: #FFFFFF !important;"
                                    :label="trans('shop::app.checkout.login.email')"
                                    placeholder="email@example.com"
                                    :aria-label="trans('shop::app.checkout.login.email')"
                                    aria-required="true"
                                />

                                <x-shop::form.control-group.error control-name="email" />
                            </x-shop::form.control-group>

                            <!-- Password -->
                            <x-shop::form.control-group class="!mb-0">
                                <div class="flex items-center justify-between !mb-1.5">
                                    <x-shop::form.control-group.label class="required !mt-0 !mb-0 text-xs font-bold uppercase tracking-wider" style="color: #6EE7B7 !important;">
                                        @lang('shop::app.checkout.login.password')
                                    </x-shop::form.control-group.label>

                                    <a
                                        href="{{ route('shop.customers.forgot_password.create') }}"
                                        target="_blank"
                                        class="text-xs font-semibold hover:underline"
                                        style="color: #D4A359 !important;"
                                    >
                                        @lang('shop::app.customers.login-form.forgot-pass')
                                    </a>
                                </div>

                                <div class="relative">
                                    <x-shop::form.control-group.control
                                        ::type="showPassword ? 'text' : 'password'"
                                        name="password"
                                        id="password"
                                        rules="required|min:6"
                                        class="!mb-0 w-full !h-12 !pl-4 !pr-11 !rounded-xl !border !text-sm transition-all outline-none"
                                        style="background-color: rgba(255, 255, 255, 0.08) !important; border-color: rgba(255, 255, 255, 0.2) !important; color: #FFFFFF !important;"
                                        :label="trans('shop::app.checkout.login.password')"
                                        :placeholder="trans('shop::app.checkout.login.password')"
                                        :aria-label="trans('shop::app.checkout.login.password')"
                                        aria-required="true"
                                    />

                                    <button
                                        type="button"
                                        class="cursor-pointer transition-colors p-1"
                                        style="position: absolute !important; right: 12px !important; top: 50% !important; transform: translateY(-50%) !important; color: rgba(255, 255, 255, 0.7) !important;"
                                        @click="showPassword = !showPassword"
                                        tabindex="-1"
                                    >
                                        <span class="material-symbols-outlined text-[18px]">
                                             @{{ showPassword ? 'visibility_off' : 'visibility' }}
                                        </span>
                                    </button>
                                </div>

                                <x-shop::form.control-group.error control-name="password" />
                            </x-shop::form.control-group>

                            <!-- Captcha -->
                            @if (core()->getConfigData('customer.captcha.credentials.status'))
                                <x-shop::form.control-group class="mt-4">
                                    {!! \Webkul\Customer\Facades\Captcha::render() !!}

                                    <x-shop::form.control-group.error control-name="recaptcha_token" />
                                </x-shop::form.control-group>
                            @endif
                        </x-slot>

                        <!-- Modal Footer -->
                        <x-slot:footer class="!mt-0 !px-6 sm:!px-8 !pt-3 !pb-6 sm:!pb-8 !border-t-0 space-y-4" style="background: rgba(6, 32, 18, 0.98) !important;">
                            <div>
                                <button
                                    type="submit"
                                    class="w-full h-12 rounded-full text-white text-xs uppercase tracking-widest font-bold flex items-center justify-center gap-2 shadow-lg transition-all duration-200 cursor-pointer disabled:opacity-50"
                                    style="background-color: #059669 !important; color: #FFFFFF !important;"
                                    :disabled="isStoring"
                                >
                                    <span v-if="isStoring" class="inline-block animate-spin mr-1">◌</span>
                                    <span>@lang('shop::app.checkout.login.title')</span>
                                </button>
                            </div>

                            <div class="text-center text-xs" style="color: rgba(255, 255, 255, 0.75) !important;">
                                <span>@lang('shop::app.customers.login-form.new-customer')</span>
                                <a
                                    href="{{ route('shop.customers.register.index') }}"
                                    target="_blank"
                                    class="font-bold hover:underline ml-1"
                                    style="color: #6EE7B7 !important;"
                                >
                                    @lang('shop::app.customers.login-form.create-your-account')
                                </a>
                            </div>
                        </x-slot>
                    </x-shop::modal>

                    {!! view_render_event('bagisto.shop.checkout.login.form_controls.after') !!}
                </form>
            </x-shop::form>

            {!! view_render_event('bagisto.shop.checkout.login.after') !!}
        </div>
    </script>

    <script type="module">
        app.component('v-checkout-login', {
            template: '#v-checkout-login-template',

            data() {
                return {
                    isStoring: false,
                    showPassword: false,
                }
            },

            methods: {
                login(params, {
                    resetForm,
                    setErrors
                }) {
                    this.isStoring = true;

                    const captchaResponse = document.querySelector('[name="recaptcha_token"]')?.value

                    params['recaptcha_token'] = captchaResponse;

                    this.$axios.post("{{ route('shop.api.customers.session.create') }}", params)
                        .then((response) => {
                            this.isStoring = false;

                            window.location.reload();
                        })
                        .catch((error) => {
                            this.isStoring = false;

                            if (error.response.status == 422) {
                                setErrors(error.response.data.errors);

                                return;
                            }

                            this.$emitter.emit('add-flash', {
                                type: 'error',
                                message: error.response.data.message
                            });
                        });
                },
            }
        })
    </script>
@endPushOnce
