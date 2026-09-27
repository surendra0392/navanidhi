<!-- SEO Meta Content -->
@push('meta')
    <meta name="title" content="@lang('shop::app.customers.login-form.page-title') | Navanidhi Naturals" />
    <meta name="description" content="Sign in to your Navanidhi Naturals account to track botanical orders, manage addresses, and review your clean wellness rituals." />
@endPush

<x-shop::layouts
    :has-header="true"
    :has-feature="false"
    :has-footer="true"
>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.login-form.page-title') | Navanidhi Naturals
    </x-slot>

    <div class="min-h-[calc(100vh-140px)] bg-transparent flex items-center justify-center py-12 sm:py-20 px-4 relative z-10">
        <div 
            class="w-full max-w-md rounded-[28px] border border-white/20 p-8 sm:p-10 shadow-[0_24px_60px_-10px_rgba(0,0,0,0.7),0_0_35px_rgba(16,185,129,0.12)] space-y-6 relative z-10"
            style="border-radius: 28px !important; background: rgba(4, 26, 14, 0.82); backdrop-filter: blur(24px); -webkit-backdrop-filter: blur(24px);"
        >
            <!-- Header -->
            <div class="space-y-2 text-center">
                <div class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-emerald-500/15 border border-emerald-400/30 text-emerald-300 text-[10.5px] font-bold tracking-widest uppercase">
                    <span class="material-symbols-outlined text-sm">spa</span>
                    <span>Account Access</span>
                </div>

                <h1 class="font-serif text-2xl sm:text-3xl font-extrabold tracking-tight text-white">
                    @lang('shop::app.customers.login-form.page-title')
                </h1>

                <p class="text-xs sm:text-sm text-emerald-100/75 leading-relaxed">
                    @lang('shop::app.customers.login-form.form-login-text')
                </p>
            </div>

            {!! view_render_event('bagisto.shop.customers.login.before') !!}

            <!-- Login Form -->
            <x-shop::form :action="route('shop.customer.session.create')">
                {!! view_render_event('bagisto.shop.customers.login_form_controls.before') !!}

                <div class="space-y-4">
                    <!-- Email -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-white/90">
                            @lang('shop::app.customers.login-form.email')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="email"
                            class="rounded-xl border border-white/20 bg-black/40 px-4 py-3 text-sm text-white placeholder-white/40 focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/25 transition-all w-full"
                            name="email"
                            rules="required|email"
                            value=""
                            :label="trans('shop::app.customers.login-form.email')"
                            placeholder="email@example.com"
                            :aria-label="trans('shop::app.customers.login-form.email')"
                            aria-required="true"
                        />

                        <x-shop::form.control-group.error control-name="email" />
                    </x-shop::form.control-group>

                    <!-- Password -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-white/90">
                            @lang('shop::app.customers.login-form.password')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="password"
                            class="rounded-xl border border-white/20 bg-black/40 px-4 py-3 text-sm text-white placeholder-white/40 focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/25 transition-all w-full"
                            id="password"
                            name="password"
                            rules="required|min:6"
                            value=""
                            :label="trans('shop::app.customers.login-form.password')"
                            :placeholder="trans('shop::app.customers.login-form.password')"
                            :aria-label="trans('shop::app.customers.login-form.password')"
                            aria-required="true"
                        />

                        <x-shop::form.control-group.error control-name="password" />
                    </x-shop::form.control-group>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between text-xs pt-1">
                        <div class="flex items-center gap-2">
                            <input
                                type="checkbox"
                                name="remember"
                                id="remember"
                                class="h-4 w-4 rounded border-white/30 bg-black/40 text-emerald-500 focus:ring-emerald-400 cursor-pointer accent-emerald-500"
                            >
                            <label for="remember" class="text-white/80 cursor-pointer select-none">
                                Remember me
                            </label>
                        </div>

                        <a
                            href="{{ route('shop.customers.forgot_password.create') }}"
                            class="text-[#D4A359] hover:text-emerald-300 font-semibold transition-colors"
                        >
                            @lang('shop::app.customers.login-form.forgot-pass')
                        </a>
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
                            <span>@lang('shop::app.customers.login-form.button-title')</span>
                            <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </button>
                    </div>

                    {!! view_render_event('bagisto.shop.customers.login_form_controls.after') !!}
                </div>
            </x-shop::form>

            {!! view_render_event('bagisto.shop.customers.login.after') !!}

            <!-- Create Account Link -->
            <div class="pt-4 border-t border-white/10 text-center text-xs text-white/70">
                <span>@lang('shop::app.customers.login-form.new-customer')</span>
                <a
                    href="{{ route('shop.customers.register.index') }}"
                    class="ml-1 text-[#D4A359] hover:text-emerald-300 font-bold transition-colors"
                >
                    @lang('shop::app.customers.login-form.create-your-account')
                </a>
            </div>
        </div>
    </div>
</x-shop::layouts>
