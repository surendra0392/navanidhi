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
                        <span class="material-symbols-outlined text-xs">location_on</span>
                        <span>Delivery Addresses</span>
                    </div>
                    <h1 class="font-serif text-xl sm:text-2xl font-bold text-[#111111] mt-0.5">
                        @lang('shop::app.customers.account.addresses.index.title')
                    </h1>
                </div>
            </div>

            <a
                href="{{ route('shop.customers.account.addresses.create') }}"
                class="h-9 px-4 rounded-xl text-xs uppercase tracking-wider font-semibold inline-flex items-center gap-1.5 shadow-sm transition-all"
                style="background-color: #0F4D2E !important; color: #FFFFFF !important;"
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
                    <div class="p-5 border border-[#DCD3C3] rounded-2xl bg-[#F7F5EE]/40 hover:bg-[#F7F5EE] transition-all flex flex-col justify-between space-y-3">
                        <div class="space-y-2">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="font-serif text-sm font-bold text-[#111111]" v-pre>
                                        {{ $address->first_name }} {{ $address->last_name }}

                                        @if ($address->company_name)
                                            <span class="text-xs text-[#666666] font-normal block sm:inline">({{ $address->company_name }})</span>
                                        @endif
                                    </p>
                                </div>

                                @if ($address->default_address)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-[#EBF3EE] text-[#0F4D2E] text-[10px] font-bold tracking-wider uppercase border border-[#0F4D2E]/20">
                                        @lang('shop::app.customers.account.addresses.index.default-address')
                                    </span>
                                @endif
                            </div>

                            <p class="text-xs text-[#666666] leading-relaxed" v-pre>
                                {{ $address->address }}<br>
                                {{ $address->city }}, {{ $address->state }} {{ $address->postcode }}<br>
                                {{ $address->country }}
                            </p>

                            @if ($address->phone)
                                <p class="text-[11px] text-[#8B6F45] pt-1 flex items-center gap-1" v-pre>
                                    <span class="material-symbols-outlined text-xs">phone</span>
                                    <span>{{ $address->phone }}</span>
                                </p>
                            @endif
                        </div>

                        <!-- Actions Bar -->
                        <div class="pt-3 border-t border-[#DCD3C3]/60 flex items-center justify-between text-xs">
                            <div class="flex items-center gap-2">
                                <a
                                    href="{{ route('shop.customers.account.addresses.edit', $address->id) }}"
                                    class="text-[#0F4D2E] font-semibold hover:underline flex items-center gap-0.5"
                                >
                                    <span class="material-symbols-outlined text-xs">edit</span>
                                    <span>@lang('shop::app.customers.account.addresses.index.edit')</span>
                                </a>

                                <span class="text-[#DCD3C3]">&bull;</span>

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
                                        class="text-red-600 font-semibold hover:underline flex items-center gap-0.5"
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
                                        class="text-xs text-[#8B6F45] font-semibold hover:text-[#0F4D2E] hover:underline"
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
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-[#EBF3EE] text-[#0F4D2E] text-2xl">
                    <span class="material-symbols-outlined text-3xl">home_pin</span>
                </div>

                <div class="space-y-1">
                    <h3 class="font-serif text-lg font-bold text-[#111111]">
                        @lang('shop::app.customers.account.addresses.index.empty-address')
                    </h3>
                    <p class="text-xs text-[#666666] leading-relaxed max-w-sm mx-auto">
                        Save your preferred delivery destinations for instant shipping selection during botanical checkout.
                    </p>
                </div>

                <div class="pt-2">
                    <a
                        href="{{ route('shop.customers.account.addresses.create') }}"
                        class="inline-flex items-center gap-2 text-xs uppercase tracking-widest font-semibold px-6 py-3 rounded-xl shadow-sm transition-all"
                        style="background-color: #0F4D2E !important; color: #FFFFFF !important;"
                    >
                        <span>@lang('shop::app.customers.account.addresses.index.add-address')</span>
                        <span class="material-symbols-outlined text-sm">add</span>
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-shop::layouts.account>
