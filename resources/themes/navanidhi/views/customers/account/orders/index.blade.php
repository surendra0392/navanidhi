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
                        <span class="material-symbols-outlined text-xs">history</span>
                        <span>Fulfillment History</span>
                    </div>
                    <h1 class="font-serif text-xl sm:text-2xl font-extrabold text-[#062E1A] mt-1">
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
                            <div class="w-full p-4 border border-[#0D5C3A]/15 rounded-2xl bg-[#FCFBF7] mb-3 last:mb-0 space-y-3 shadow-xs">
                                <a :href="record.actions[0].url" class="block space-y-2">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="font-serif text-sm font-bold text-[#062E1A]">
                                                Order #@{{ record.increment_id || record.id }}
                                            </p>
                                            <p class="text-xs text-[#718096]">
                                                @{{ record.created_at }}
                                            </p>
                                        </div>

                                        <div v-html="record.status"></div>
                                    </div>

                                    <div class="pt-2 border-t border-[#0D5C3A]/10 flex justify-between items-center text-xs">
                                        <span class="text-[#718096]">Total</span>
                                        <span class="font-serif text-sm font-bold text-[#0D5C3A]">
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
