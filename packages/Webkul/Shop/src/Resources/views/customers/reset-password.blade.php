<!-- SEO Meta Content -->
@push('meta')
    <meta name="title" content="@lang('shop::app.customers.reset-password.title') | Navanidhi Naturals" />
    <meta name="description" content="Set a new password for your Navanidhi Naturals account." />
@endPush

<x-shop::layouts
    :has-header="true"
    :has-feature="false"
    :has-footer="true"
>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.reset-password.title') | Navanidhi Naturals
    </x-slot>

    <div class="min-h-[calc(100vh-140px)] bg-transparent flex items-center justify-center py-12 sm:py-20 px-4 relative z-10">
        <div 
            class="w-full max-w-md rounded-[28px] border border-white/20 p-8 sm:p-10 shadow-[0_24px_60px_-10px_rgba(0,0,0,0.7),0_0_35px_rgba(16,185,129,0.12)] space-y-6 relative z-10"
            style="border-radius: 28px !important; background: rgba(4, 26, 14, 0.82); backdrop-filter: blur(24px); -webkit-backdrop-filter: blur(24px);"
        >
            <!-- Header -->
            <div class="space-y-2 text-center">
                <div class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-emerald-500/15 border border-emerald-400/30 text-emerald-300 text-[10.5px] font-bold tracking-widest uppercase">
                    <span class="material-symbols-outlined text-sm">lock</span>
                    <span>New Password</span>
                </div>

                <h1 class="font-serif text-2xl sm:text-3xl font-extrabold tracking-tight text-white">
                    @lang('shop::app.customers.reset-password.title')
                </h1>
            </div>

            {!! view_render_event('bagisto.shop.customers.reset_password.before') !!}

            <!-- Reset Password Form -->
            <x-shop::form :action="route('shop.customers.reset_password.store')">
                <x-shop::form.control-group.control
                    type="hidden"
                    name="token"
                    :value="$token"
                />

                {!! view_render_event('bagisto.shop.customers.reset_password_form_controls.before') !!}

                <div class="space-y-4">
                    <!-- Email -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-white/90">
                            @lang('shop::app.customers.reset-password.email')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="email"
                            class="rounded-xl border border-white/20 bg-black/40 px-4 py-3 text-sm text-white placeholder-white/40 focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/25 transition-all w-full"
                            id="email"
                            name="email"
                            rules="required|email"
                            :value="old('email')"
                            :label="trans('shop::app.customers.reset-password.email')"
                            placeholder="email@example.com"
                            :aria-label="trans('shop::app.customers.reset-password.email')"
                            aria-required="true"
                        />

                        <x-shop::form.control-group.error control-name="email" />
                    </x-shop::form.control-group>

                    <!-- Password -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-white/90">
                            @lang('shop::app.customers.reset-password.password')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="password"
                            class="rounded-xl border border-white/20 bg-black/40 px-4 py-3 text-sm text-white placeholder-white/40 focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/25 transition-all w-full"
                            name="password"
                            rules="required|min:6"
                            value=""
                            :label="trans('shop::app.customers.reset-password.password')"
                            :placeholder="trans('shop::app.customers.reset-password.password')"
                            ref="password"
                            :aria-label="trans('shop::app.customers.reset-password.password')"
                            aria-required="true"
                        />

                        <x-shop::form.control-group.error control-name="password" />
                    </x-shop::form.control-group>

                    <!-- Confirm Password -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label class="required text-xs font-semibold uppercase tracking-wider text-white/90">
                            @lang('shop::app.customers.reset-password.confirm-password')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="password"
                            class="rounded-xl border border-white/20 bg-black/40 px-4 py-3 text-sm text-white placeholder-white/40 focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/25 transition-all w-full"
                            name="password_confirmation"
                            rules="confirmed:@password"
                            value=""
                            :label="trans('shop::app.customers.reset-password.password')"
                            :placeholder="trans('shop::app.customers.reset-password.confirm-password')"
                            :aria-label="trans('shop::app.customers.reset-password.confirm-password')"
                            aria-required="true"
                        />

                        <x-shop::form.control-group.error control-name="password_confirmation" />
                    </x-shop::form.control-group>

                    <!-- Submit Button -->
                    <div class="pt-3">
                        <button
                            class="nv-btn-cart w-full !h-12 text-xs uppercase tracking-widest font-bold flex items-center justify-center gap-2 shadow-md cursor-pointer"
                            type="submit"
                        >
                            <span>@lang('shop::app.customers.reset-password.submit-btn-title')</span>
                            <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </button>
                    </div>

                    {!! view_render_event('bagisto.shop.customers.reset_password_form_controls.after') !!}
                </div>
            </x-shop::form>

            {!! view_render_event('bagisto.shop.customers.reset_password.after') !!}
        </div>
    </div>
</x-shop::layouts>
