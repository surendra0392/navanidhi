<!-- SEO Meta Content -->
@push('meta')
    <meta name="title" content="@lang('shop::app.customers.signup-form.page-title') | Navanidhi Naturals" />
    <meta name="description" content="Create your Navanidhi Naturals account to discover fresh whole-food botanical powders and manage your daily wellness orders." />
@endPush

<x-shop::layouts
    :has-header="true"
    :has-feature="false"
    :has-footer="true"
>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.signup-form.page-title') | Navanidhi Naturals
    </x-slot>

    <div class="min-h-[calc(100vh-140px)] bg-transparent flex items-center justify-center py-12 sm:py-20 px-4 relative z-10">
        <div 
            class="w-full max-w-lg rounded-[28px] border border-white/20 p-8 sm:p-10 shadow-[0_24px_60px_-10px_rgba(0,0,0,0.7),0_0_35px_rgba(16,185,129,0.12)] space-y-6 relative z-10"
            style="border-radius: 28px !important; background: rgba(4, 26, 14, 0.82); backdrop-filter: blur(24px); -webkit-backdrop-filter: blur(24px);"
        >
            <!-- Header -->
            <div class="space-y-2 text-center">
                <div class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-emerald-500/15 border border-emerald-400/30 text-emerald-300 text-[10.5px] font-bold tracking-widest uppercase">
                    <span class="material-symbols-outlined text-sm">spa</span>
                    <span>Join Navanidhi Naturals</span>
                </div>

                <h1 class="font-serif text-2xl sm:text-3xl font-extrabold tracking-tight text-white">
                    @lang('shop::app.customers.signup-form.page-title')
                </h1>

                <p class="text-xs sm:text-sm text-emerald-100/75 leading-relaxed">
                    @lang('shop::app.customers.signup-form.form-signup-text')
                </p>
            </div>

            {!! view_render_event('bagisto.shop.customers.signup.before') !!}

            <!-- Registration Form -->
            <x-shop::form :action="route('shop.customers.register.store')">
                {!! view_render_event('bagisto.shop.customers.signup_form_controls.before') !!}

                <div class="space-y-4">
                    <!-- First & Last Name Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- First Name -->
                        <x-shop::form.control-group>
                            <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-white/90">
                                @lang('shop::app.customers.signup-form.first-name')
                            </x-shop::form.control-group.label>

                            <x-shop::form.control-group.control
                                type="text"
                                class="rounded-xl border border-white/20 bg-black/40 px-4 py-3 text-sm text-white placeholder-white/40 focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/25 transition-all w-full"
                                name="first_name"
                                rules="required"
                                :value="old('first_name')"
                                :label="trans('shop::app.customers.signup-form.first-name')"
                                :placeholder="trans('shop::app.customers.signup-form.first-name')"
                                :aria-label="trans('shop::app.customers.signup-form.first-name')"
                                aria-required="true"
                            />

                            <x-shop::form.control-group.error control-name="first_name" />
                        </x-shop::form.control-group>

                        <!-- Last Name -->
                        <x-shop::form.control-group>
                            <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-white/90">
                                @lang('shop::app.customers.signup-form.last-name')
                            </x-shop::form.control-group.label>

                            <x-shop::form.control-group.control
                                type="text"
                                class="rounded-xl border border-white/20 bg-black/40 px-4 py-3 text-sm text-white placeholder-white/40 focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/25 transition-all w-full"
                                name="last_name"
                                rules="required"
                                :value="old('last_name')"
                                :label="trans('shop::app.customers.signup-form.last-name')"
                                :placeholder="trans('shop::app.customers.signup-form.last-name')"
                                :aria-label="trans('shop::app.customers.signup-form.last-name')"
                                aria-required="true"
                            />

                            <x-shop::form.control-group.error control-name="last_name" />
                        </x-shop::form.control-group>
                    </div>

                    <!-- Email -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-white/90">
                            @lang('shop::app.customers.signup-form.email')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="email"
                            class="rounded-xl border border-white/20 bg-black/40 px-4 py-3 text-sm text-white placeholder-white/40 focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/25 transition-all w-full"
                            name="email"
                            rules="required|email"
                            :value="old('email')"
                            :label="trans('shop::app.customers.signup-form.email')"
                            placeholder="email@example.com"
                            :aria-label="trans('shop::app.customers.signup-form.email')"
                            aria-required="true"
                        />

                        <x-shop::form.control-group.error control-name="email" />
                    </x-shop::form.control-group>

                    <!-- Passwords Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Password -->
                        <x-shop::form.control-group>
                            <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-white/90">
                                @lang('shop::app.customers.signup-form.password')
                            </x-shop::form.control-group.label>

                            <x-shop::form.control-group.control
                                type="password"
                                class="rounded-xl border border-white/20 bg-black/40 px-4 py-3 text-sm text-white placeholder-white/40 focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/25 transition-all w-full"
                                name="password"
                                rules="required|min:6"
                                value=""
                                :label="trans('shop::app.customers.signup-form.password')"
                                :placeholder="trans('shop::app.customers.signup-form.password')"
                                ref="password"
                                :aria-label="trans('shop::app.customers.signup-form.password')"
                                aria-required="true"
                            />

                            <x-shop::form.control-group.error control-name="password" />
                        </x-shop::form.control-group>

                        <!-- Confirm Password -->
                        <x-shop::form.control-group>
                            <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-white/90">
                                @lang('shop::app.customers.signup-form.confirm-pass')
                            </x-shop::form.control-group.label>

                            <x-shop::form.control-group.control
                                type="password"
                                class="rounded-xl border border-white/20 bg-black/40 px-4 py-3 text-sm text-white placeholder-white/40 focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/25 transition-all w-full"
                                name="password_confirmation"
                                rules="confirmed:@password"
                                value=""
                                :label="trans('shop::app.customers.signup-form.password')"
                                :placeholder="trans('shop::app.customers.signup-form.confirm-pass')"
                                :aria-label="trans('shop::app.customers.signup-form.confirm-pass')"
                                aria-required="true"
                            />

                            <x-shop::form.control-group.error control-name="password_confirmation" />
                        </x-shop::form.control-group>
                    </div>

                    <!-- Newsletter Subscription Checkbox -->
                    <div class="flex items-start gap-2.5 pt-1 text-xs text-white/80">
                        <input
                            type="checkbox"
                            name="is_subscribed"
                            id="is_subscribed"
                            value="1"
                            class="mt-0.5 h-4 w-4 rounded border-white/30 bg-black/40 text-emerald-500 focus:ring-emerald-400 cursor-pointer accent-emerald-500"
                        >
                        <label for="is_subscribed" class="cursor-pointer select-none leading-normal">
                            @lang('shop::app.customers.signup-form.subscribe-to-newsletter')
                        </label>
                    </div>

                    <!-- Captcha if configured -->
                    @if (core()->getConfigData('customer.captcha.credentials.status'))
                        <x-shop::form.control-group class="mt-4">
                            {!! \Webkul\Customer\Facades\Captcha::render() !!}
                            <x-shop::form.control-group.error control-name="recaptcha_token" />
                        </x-shop::form.control-group>
                    @endif

                    <!-- Submit Button -->
                    <div class="pt-3">
                        <button
                            class="nv-btn-cart w-full !h-12 text-xs uppercase tracking-widest font-bold flex items-center justify-center gap-2 shadow-md cursor-pointer"
                            type="submit"
                        >
                            <span>@lang('shop::app.customers.signup-form.button-title')</span>
                            <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </button>
                    </div>

                    {!! view_render_event('bagisto.shop.customers.signup_form_controls.after') !!}
                </div>
            </x-shop::form>

            {!! view_render_event('bagisto.shop.customers.signup.after') !!}

            <!-- Already Have Account Link -->
            <div class="pt-4 border-t border-white/10 text-center text-xs text-white/70">
                <span>@lang('shop::app.customers.signup-form.account-exists')</span>
                <a
                    href="{{ route('shop.customer.session.index') }}"
                    class="ml-1 text-[#D4A359] hover:text-emerald-300 font-bold transition-colors"
                >
                    @lang('shop::app.customers.signup-form.sign-in-button')
                </a>
            </div>
        </div>
    </div>
</x-shop::layouts>
