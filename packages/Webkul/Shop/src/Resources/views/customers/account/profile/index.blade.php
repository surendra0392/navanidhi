<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.account.profile.index.title') | Navanidhi Naturals
    </x-slot>

    <!-- Breadcrumbs -->
    @if ((core()->getConfigData('general.general.breadcrumbs.shop')))
        @section('breadcrumbs')
            <x-shop::breadcrumbs name="profile" />
        @endSection
    @endif

    <x-shop::layouts.account.navigation />

    <!-- Main Content Area -->
    <div class="flex-1 w-full rounded-2xl border border-[#DCD3C3] bg-white p-6 sm:p-8 shadow-sm space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between border-b border-[#DCD3C3]/60 pb-4">
            <div class="flex items-center gap-3">
                <!-- Mobile Back Button -->
                <a
                    class="lg:hidden flex h-8 w-8 items-center justify-center rounded-lg border border-[#DCD3C3] text-[#111111]"
                    href="{{ route('shop.customers.account.index') }}"
                >
                    <span class="material-symbols-outlined text-base">arrow_back</span>
                </a>

                <div>
                    <div class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-[#EBF3EE] text-[#0F4D2E] text-[10px] font-bold tracking-wider uppercase">
                        <span class="material-symbols-outlined text-xs">manage_accounts</span>
                        <span>Account Details</span>
                    </div>
                    <h1 class="font-serif text-xl sm:text-2xl font-bold text-[#111111] mt-0.5">
                        @lang('shop::app.customers.account.profile.index.title')
                    </h1>
                </div>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.profile.edit_button.before') !!}

            <a
                href="{{ route('shop.customers.account.profile.edit') }}"
                class="h-9 px-4 rounded-xl border border-[#0F4D2E] text-xs uppercase tracking-wider font-semibold text-[#0F4D2E] hover:bg-[#0F4D2E] hover:text-white transition-all inline-flex items-center gap-1.5 shadow-xs"
            >
                <span class="material-symbols-outlined text-sm">edit</span>
                <span>@lang('shop::app.customers.account.profile.index.edit')</span>
            </a>

            {!! view_render_event('bagisto.shop.customers.account.profile.edit_button.after') !!}
        </div>

        <!-- Profile Information List -->
        <div class="divide-y divide-[#DCD3C3]/60 text-xs sm:text-sm">
            {!! view_render_event('bagisto.shop.customers.account.profile.first_name.before') !!}

            <div class="py-3.5 flex justify-between items-center">
                <span class="text-[#666666]">@lang('shop::app.customers.account.profile.index.first-name')</span>
                <span class="font-semibold text-[#111111]" v-pre>{{ $customer->first_name }}</span>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.profile.first_name.after') !!}

            {!! view_render_event('bagisto.shop.customers.account.profile.last_name.before') !!}

            <div class="py-3.5 flex justify-between items-center">
                <span class="text-[#666666]">@lang('shop::app.customers.account.profile.index.last-name')</span>
                <span class="font-semibold text-[#111111]" v-pre>{{ $customer->last_name }}</span>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.profile.last_name.after') !!}

            <div class="py-3.5 flex justify-between items-center">
                <span class="text-[#666666]">@lang('shop::app.customers.account.profile.index.email')</span>
                <span class="font-semibold text-[#111111]" v-pre>{{ $customer->email }}</span>
            </div>

            <div class="py-3.5 flex justify-between items-center">
                <span class="text-[#666666]">Phone Number</span>
                <span class="font-semibold text-[#111111]" v-pre>{{ $customer->phone ?? 'Not provided' }}</span>
            </div>

            <div class="py-3.5 flex justify-between items-center">
                <span class="text-[#666666]">@lang('shop::app.customers.account.profile.index.gender')</span>
                <span class="font-semibold text-[#111111]" v-pre>{{ $customer->gender ?? '-'}}</span>
            </div>

            <div class="py-3.5 flex justify-between items-center">
                <span class="text-[#666666]">@lang('shop::app.customers.account.profile.index.dob')</span>
                <span class="font-semibold text-[#111111]" v-pre>{{ $customer->date_of_birth ?? '-' }}</span>
            </div>

            <div class="py-3.5 flex justify-between items-center">
                <span class="text-[#666666]">Botanical Wellness Newsletter</span>
                <span class="font-semibold text-[#111111]">
                    @if($customer->subscribed_to_news_letter)
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold">
                            <span class="material-symbols-outlined text-xs">check_circle</span> Subscribed
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-gray-100 text-gray-700 text-xs">
                            Not Subscribed
                        </span>
                    @endif
                </span>
            </div>
        </div>

        {!! view_render_event('bagisto.shop.customers.account.profile.delete.before') !!}

        <!-- Profile Delete Action -->
        <div class="pt-6 border-t border-[#DCD3C3]/60 flex items-center justify-between">
            <div>
                <h3 class="text-xs font-bold uppercase tracking-wider text-red-700">Delete Account</h3>
                <p class="text-[11px] text-[#666666]">Permanently delete your profile and personal data from our systems.</p>
            </div>

            <x-shop::form action="{{ route('shop.customers.account.profile.destroy') }}">
                <x-shop::modal>
                    <x-slot:toggle>
                        <button
                            type="button"
                            class="text-xs uppercase tracking-wider font-semibold text-red-600 hover:text-red-800 transition-colors px-3 py-1.5 rounded-lg border border-red-200 hover:bg-red-50"
                        >
                            @lang('shop::app.customers.account.profile.index.delete-profile')
                        </button>
                    </x-slot>

                    <x-slot:header>
                        <h2 class="font-serif text-lg font-bold text-[#111111]">
                            @lang('shop::app.customers.account.profile.index.enter-password')
                        </h2>
                    </x-slot>

                    <x-slot:content>
                        <div class="py-3 space-y-3">
                            <p class="text-xs text-[#666666]">
                                Please confirm your password to permanently delete your account. If you have active orders in fulfillment, the account cannot be removed until orders are completed.
                            </p>
                            <x-shop::form.control-group class="!mb-0">
                                <x-shop::form.control-group.control
                                    type="password"
                                    name="password"
                                    class="rounded-xl border border-[#DCD3C3] bg-white px-4 py-3 text-sm text-[#111111] focus:border-red-600 focus:ring-1 focus:ring-red-600 w-full"
                                    rules="required"
                                    placeholder="Enter your current password"
                                />

                                <x-shop::form.control-group.error control-name="password" />
                            </x-shop::form.control-group>
                        </div>
                    </x-slot>

                    <!-- Modal Footer -->
                    <x-slot:footer>
                        <button
                            type="submit"
                            class="h-10 px-6 rounded-xl text-xs uppercase tracking-widest font-semibold bg-red-600 text-white hover:bg-red-700 transition-colors"
                        >
                            @lang('shop::app.customers.account.profile.index.delete')
                        </button>
                    </x-slot>
                </x-shop::modal>
            </x-shop::form>
        </div>

        {!! view_render_event('bagisto.shop.customers.account.profile.delete.after') !!}
    </div>
</x-shop::layouts.account>
