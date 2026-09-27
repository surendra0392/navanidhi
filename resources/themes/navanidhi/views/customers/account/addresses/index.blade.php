<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.account.addresses.index.title') | Navanidhi Naturals
    </x-slot>

    <!-- Breadcrumbs -->
    @if ((core()->getConfigData('general.general.breadcrumbs.shop')))
        @section('breadcrumbs')
            <x-shop::breadcrumbs name="addresses" />
        @endSection
    @endif

    <x-shop::layouts.account.navigation />

    <!-- Main Content Area -->
    <div class="flex-1 w-full rounded-3xl border border-[#0D5C3A]/15 bg-white p-6 sm:p-8 shadow-[0_8px_30px_-6px_rgba(13,92,58,0.06)] space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between border-b border-[#0D5C3A]/10 pb-4">
            <div class="flex items-center gap-3">
                <!-- Mobile Back Button -->
                <a
                    class="lg:hidden flex h-8 w-8 items-center justify-center rounded-xl border border-[#0D5C3A]/20 text-[#062E1A] hover:bg-[#0D5C3A]/5 transition-colors"
                    href="{{ route('shop.customers.account.index') }}"
                >
                    <span class="material-symbols-outlined text-base">arrow_back</span>
                </a>

                <div>
                    <div class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-[#0D5C3A]/10 text-[#0D5C3A] text-[10px] font-bold tracking-wider uppercase border border-[#0D5C3A]/15">
                        <span class="material-symbols-outlined text-xs">location_on</span>
                        <span>Delivery Addresses</span>
                    </div>
                    <h1 class="font-serif text-xl sm:text-2xl font-extrabold text-[#062E1A] mt-1">
                        @lang('shop::app.customers.account.addresses.index.title')
                    </h1>
                </div>
            </div>

            <a
                href="{{ route('shop.customers.account.addresses.create') }}"
                class="btn-emerald-primary !px-4 !py-2.5 text-xs uppercase tracking-wider font-bold inline-flex items-center gap-1.5 shadow-sm cursor-pointer"
            >
                <span class="material-symbols-outlined text-sm">add</span>
                <span>@lang('shop::app.customers.account.addresses.index.add-address')</span>
            </a>
        </div>

        @if (! $addresses->isEmpty())
            <!-- Address Cards Grid -->
            {!! view_render_event('bagisto.shop.customers.account.addresses.list.before', ['addresses' => $addresses]) !!}

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach ($addresses as $address)
                    <div class="p-5 border border-[#0D5C3A]/15 rounded-2xl bg-[#FCFBF7] hover:bg-white hover:border-[#0D5C3A]/30 hover:shadow-[0_8px_24px_-4px_rgba(13,92,58,0.08)] transition-all flex flex-col justify-between space-y-3">
                        <div class="space-y-2">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="font-serif text-sm font-bold text-[#062E1A]" v-pre>
                                        {{ $address->first_name }} {{ $address->last_name }}

                                        @if ($address->company_name)
                                            <span class="text-xs text-[#718096] font-normal block sm:inline">({{ $address->company_name }})</span>
                                        @endif
                                    </p>
                                </div>

                                @if ($address->default_address)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-[#0D5C3A]/10 text-[#0D5C3A] text-[10px] font-bold tracking-wider uppercase border border-[#0D5C3A]/20">
                                        @lang('shop::app.customers.account.addresses.index.default-address')
                                    </span>
                                @endif
                            </div>

                            <p class="text-xs text-[#718096] leading-relaxed" v-pre>
                                {{ $address->address }}<br>
                                {{ $address->city }}, {{ $address->state }} {{ $address->postcode }}<br>
                                {{ $address->country }}
                            </p>

                            @if ($address->phone)
                                <p class="text-[11px] text-[#D4A359] pt-1 flex items-center gap-1" v-pre>
                                    <span class="material-symbols-outlined text-xs">phone</span>
                                    <span>{{ $address->phone }}</span>
                                </p>
                            @endif
                        </div>

                        <!-- Actions Bar -->
                        <div class="pt-3 border-t border-[#0D5C3A]/10 flex items-center justify-between text-xs">
                            <div class="flex items-center gap-2">
                                <a
                                    href="{{ route('shop.customers.account.addresses.edit', $address->id) }}"
                                    class="text-[#0D5C3A] font-semibold hover:underline flex items-center gap-0.5"
                                >
                                    <span class="material-symbols-outlined text-xs">edit</span>
                                    <span>@lang('shop::app.customers.account.addresses.index.edit')</span>
                                </a>

                                <span class="text-[#0D5C3A]/30">&bull;</span>

                                <form
                                    method="POST"
                                    action="{{ route('shop.customers.account.addresses.delete', $address->id) }}"
                                    onsubmit="return confirm('@lang('shop::app.customers.account.addresses.index.confirm-delete')');"
                                    class="inline"
                                >
                                    @method('DELETE')
                                    @csrf

                                    <button
                                        type="submit"
                                        class="text-red-600 font-semibold hover:underline flex items-center gap-0.5 cursor-pointer"
                                    >
                                        <span class="material-symbols-outlined text-xs">delete</span>
                                        <span>Delete</span>
                                    </button>
                                </form>
                            </div>

                            @if (! $address->default_address)
                                <form
                                    method="POST"
                                    action="{{ route('shop.customers.account.addresses.update.default', $address->id) }}"
                                    class="inline"
                                >
                                    @method('PATCH')
                                    @csrf

                                    <button
                                        type="submit"
                                        class="text-xs text-[#D4A359] font-bold hover:text-[#0D5C3A] hover:underline cursor-pointer"
                                    >
                                        @lang('shop::app.customers.account.addresses.index.set-as-default')
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            {!! view_render_event('bagisto.shop.customers.account.addresses.list.after', ['addresses' => $addresses]) !!}

        @else
            <!-- Empty Address State -->
            <div class="py-16 text-center space-y-4">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-[#0D5C3A]/10 text-[#0D5C3A] text-2xl border border-[#0D5C3A]/20">
                    <span class="material-symbols-outlined text-3xl">home_pin</span>
                </div>

                <div class="space-y-1">
                    <h3 class="font-serif text-lg font-bold text-[#062E1A]">
                        @lang('shop::app.customers.account.addresses.index.empty-address')
                    </h3>
                    <p class="text-xs text-[#718096] leading-relaxed max-w-sm mx-auto">
                        Save your preferred delivery destinations for instant shipping selection during botanical checkout.
                    </p>
                </div>

                <div class="pt-2">
                    <a
                        href="{{ route('shop.customers.account.addresses.create') }}"
                        class="btn-emerald-primary !px-6 !py-3 text-xs uppercase tracking-widest font-bold inline-flex items-center gap-2 shadow-sm cursor-pointer"
                    >
                        <span>@lang('shop::app.customers.account.addresses.index.add-address')</span>
                        <span class="material-symbols-outlined text-sm">add</span>
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-shop::layouts.account>
