<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.account.orders.title') | Navanidhi Naturals
    </x-slot>

    <!-- Breadcrumbs -->
    @if ((core()->getConfigData('general.general.breadcrumbs.shop')))
        @section('breadcrumbs')
            <x-shop::breadcrumbs name="orders" />
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
                        <span class="material-symbols-outlined text-xs">history</span>
                        <span>Fulfillment History</span>
                    </div>
                    <h1 class="font-serif text-xl sm:text-2xl font-bold text-[#111111] mt-0.5">
                        @lang('shop::app.customers.account.orders.title')
                    </h1>
                </div>
            </div>
        </div>

        {!! view_render_event('bagisto.shop.customers.account.orders.list.before') !!}

        <!-- For Desktop View -->
        <div class="max-md:hidden">
            <x-shop::datagrid :src="route('shop.customers.account.orders.index')" />
        </div>

        <!-- For Mobile View -->
        <div class="md:hidden">
            <x-shop::datagrid :src="route('shop.customers.account.orders.index')">
                <!-- Datagrid Header -->
                <template #header="{
                    isLoading,
                    available,
                    applied,
                    selectAll,
                    sort,
                    performAction
                }">
                    <div class="hidden"></div>
                </template>

                <template #body="{
                    isLoading,
                    available,
                    applied,
                    selectAll,
                    sort,
                    performAction
                }">
                    <template v-if="isLoading">
                        <x-shop::shimmer.datagrid.table.body />
                    </template>

                    <template v-else>
                        <template v-for="record in available.records">
                            <div class="w-full p-4 border border-[#DCD3C3] rounded-2xl bg-[#F7F5EE]/50 mb-3 last:mb-0 space-y-3">
                                <a :href="record.actions[0].url" class="block space-y-2">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="font-serif text-sm font-bold text-[#111111]">
                                                Order #@{{ record.increment_id || record.id }}
                                            </p>
                                            <p class="text-xs text-[#666666]">
                                                @{{ record.created_at }}
                                            </p>
                                        </div>

                                        <div v-html="record.status"></div>
                                    </div>

                                    <div class="pt-2 border-t border-[#DCD3C3]/60 flex justify-between items-center text-xs">
                                        <span class="text-[#666666]">Total</span>
                                        <span class="font-serif text-sm font-bold text-[#0F4D2E]">
                                            @{{ record.grand_total }}
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </template>
                    </template>
                </template>
            </x-shop::datagrid>
        </div>

        {!! view_render_event('bagisto.shop.customers.account.orders.list.after') !!}
    </div>
</x-shop::layouts.account>
