@php
    $customer = auth()->guard('customer')->user();
    $ordersCount = $customer->orders()->count();
    $addressesCount = $customer->addresses()->count();
    $wishlistCount = $customer->wishlist_items()->count();
    $recentOrders = $customer->orders()->latest()->take(3)->get();
    $defaultAddress = $customer->default_address ?? $customer->addresses()->first();
@endphp

<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        Account Dashboard | Navanidhi Naturals
    </x-slot>

    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <div class="flex items-center gap-2">
            <a href="{{ route('shop.home.index') }}" class="text-[#8B6F45] hover:underline">Home</a>
            <span>/</span>
            <span class="text-[#111111] font-semibold">Dashboard</span>
        </div>
    @endSection

    <!-- Account Navigation Sidebar -->
    <x-shop::layouts.account.navigation />

    <!-- Main Content Area -->
    <div class="flex-1 w-full space-y-6">
        <!-- Welcome Banner -->
        <div class="rounded-3xl border border-[#0D5C3A]/12 bg-white p-6 sm:p-8 shadow-xs relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 opacity-5 pointer-events-none">
                <span class="material-symbols-outlined text-[160px] text-[#0D5C3A]">eco</span>
            </div>

            <div class="relative z-10 space-y-2">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#0D5C3A]/10 border border-[#0D5C3A]/20 text-[#0D5C3A] text-xs font-bold tracking-widest uppercase shadow-2xs">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#0D5C3A] animate-pulse"></span>
                    <span>Botanical Sanctuary</span>
                </div>

                <h1 class="font-serif text-2xl sm:text-3xl font-bold text-[#111827]" v-pre>
                    Namaste, {{ $customer->first_name }}!
                </h1>

                <p class="text-xs sm:text-sm text-[#6B7280] leading-relaxed max-w-2xl">
                    Welcome to your personal Navanidhi Naturals portal. Review your whole-plant nutrition orders, track real-time fulfillment, manage shipping destinations, and update your personal wellness preferences.
                </p>
            </div>
        </div>

        <!-- Metrics Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <!-- Orders Metric -->
            <a
                href="{{ route('shop.customers.account.orders.index') }}"
                class="rounded-3xl border border-[#0D5C3A]/12 bg-white p-5 shadow-xs hover:border-[#0D5C3A] hover:shadow-md transition-all group flex items-center justify-between"
            >
                <div class="space-y-1">
                    <span class="text-xs font-bold uppercase tracking-wider text-[#D4A359]">Total Orders</span>
                    <p class="font-serif text-3xl font-bold text-[#111827] group-hover:text-[#0D5C3A] transition-colors">
                        {{ $ordersCount }}
                    </p>
                    <span class="text-[11px] text-[#6B7280] flex items-center gap-1 group-hover:text-[#0D5C3A] transition-colors">
                        <span>View history</span>
                        <span class="material-symbols-outlined text-xs">arrow_forward</span>
                    </span>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-[#0D5C3A]/10 text-[#0D5C3A] flex items-center justify-center group-hover:bg-[#0D5C3A] group-hover:text-white transition-all shadow-2xs">
                    <span class="material-symbols-outlined text-2xl">shopping_bag</span>
                </div>
            </a>

            <!-- Saved Addresses Metric -->
            <a
                href="{{ route('shop.customers.account.addresses.index') }}"
                class="rounded-3xl border border-[#0D5C3A]/12 bg-white p-5 shadow-xs hover:border-[#0D5C3A] hover:shadow-md transition-all group flex items-center justify-between"
            >
                <div class="space-y-1">
                    <span class="text-xs font-bold uppercase tracking-wider text-[#D4A359]">Saved Addresses</span>
                    <p class="font-serif text-3xl font-bold text-[#111827] group-hover:text-[#0D5C3A] transition-colors">
                        {{ $addressesCount }}
                    </p>
                    <span class="text-[11px] text-[#6B7280] flex items-center gap-1 group-hover:text-[#0D5C3A] transition-colors">
                        <span>Manage address book</span>
                        <span class="material-symbols-outlined text-xs">arrow_forward</span>
                    </span>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-[#0D5C3A]/10 text-[#0D5C3A] flex items-center justify-center group-hover:bg-[#0D5C3A] group-hover:text-white transition-all shadow-2xs">
                    <span class="material-symbols-outlined text-2xl">location_on</span>
                </div>
            </a>

            <!-- Wishlist Metric -->
            <a
                href="{{ route('shop.customers.account.wishlist.index') }}"
                class="rounded-3xl border border-[#0D5C3A]/12 bg-white p-5 shadow-xs hover:border-[#0D5C3A] hover:shadow-md transition-all group flex items-center justify-between"
            >
                <div class="space-y-1">
                    <span class="text-xs font-bold uppercase tracking-wider text-[#D4A359]">Saved In Wishlist</span>
                    <p class="font-serif text-3xl font-bold text-[#111827] group-hover:text-[#0D5C3A] transition-colors">
                        {{ $wishlistCount }}
                    </p>
                    <span class="text-[11px] text-[#6B7280] flex items-center gap-1 group-hover:text-[#0D5C3A] transition-colors">
                        <span>View saved items</span>
                        <span class="material-symbols-outlined text-xs">arrow_forward</span>
                    </span>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-[#0D5C3A]/10 text-[#0D5C3A] flex items-center justify-center group-hover:bg-[#0D5C3A] group-hover:text-white transition-all shadow-2xs">
                    <span class="material-symbols-outlined text-2xl">favorite</span>
                </div>
            </a>
        </div>

        <!-- Recent Orders & Primary Address Row -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Recent Orders (2 cols) -->
            <div class="lg:col-span-2 rounded-3xl border border-[#0D5C3A]/12 bg-white p-6 shadow-xs space-y-5">
                <div class="flex items-center justify-between border-b border-[#0D5C3A]/10 pb-3">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-xl text-[#0D5C3A]">history</span>
                        <h2 class="font-serif text-lg font-bold text-[#111827]">Recent Orders</h2>
                    </div>
                    @if($ordersCount > 0)
                        <a href="{{ route('shop.customers.account.orders.index') }}" class="text-xs text-[#0D5C3A] font-bold hover:underline flex items-center gap-1">
                            <span>All Orders ({{ $ordersCount }})</span>
                            <span class="material-symbols-outlined text-xs">arrow_forward</span>
                        </a>
                    @endif
                </div>

                @if($recentOrders->isNotEmpty())
                    <div class="space-y-3">
                        @foreach($recentOrders as $order)
                            @php
                                $statusBadgeClass = 'bg-amber-50 text-amber-900 border-amber-200';
                                $statusLabel = $order->status_label ?? ucfirst($order->status);

                                if ($order->operational_status) {
                                    $statusLabel = ucwords(strtolower($order->operational_status));
                                    if (in_array($order->operational_status, ['SHIPPED', 'DELIVERED'])) {
                                        $statusBadgeClass = 'bg-emerald-50 text-emerald-900 border-emerald-200';
                                    } elseif (in_array($order->operational_status, ['PACKING', 'READY TO SHIP', 'PAYMENT CONFIRMED'])) {
                                        $statusBadgeClass = 'bg-blue-50 text-blue-900 border-blue-200';
                                    }
                                } elseif ($order->status == 'completed') {
                                    $statusBadgeClass = 'bg-emerald-50 text-emerald-900 border-emerald-200';
                                } elseif ($order->status == 'canceled') {
                                    $statusBadgeClass = 'bg-red-50 text-red-900 border-red-200';
                                }
                            @endphp

                            <div class="p-4 rounded-2xl border border-[#0D5C3A]/10 bg-[#FCFBF7] hover:bg-white hover:border-[#0D5C3A]/25 hover:shadow-xs transition-all flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                <div class="space-y-1">
                                    <div class="flex items-center gap-2.5">
                                        <span class="font-serif text-sm font-bold text-[#111827]">Order #{{ $order->increment_id }}</span>
                                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold border uppercase tracking-wider {{ $statusBadgeClass }}">
                                            {{ $statusLabel }}
                                        </span>
                                    </div>
                                    <p class="text-xs text-[#6B7280]">
                                        Placed on {{ $order->created_at->format('d M, Y') }} &bull; {{ $order->items->count() }} {{ Str::plural('item', $order->items->count()) }}
                                    </p>
                                </div>

                                <div class="flex items-center justify-between sm:justify-end gap-4">
                                    <span class="font-serif text-sm font-bold text-[#0D5C3A]">
                                        {{ core()->formatPrice($order->grand_total, $order->order_currency_code) }}
                                    </span>

                                    <a
                                        href="{{ route('shop.customers.account.orders.view', $order->id) }}"
                                        class="px-3.5 py-1.5 rounded-xl border border-[#0D5C3A] text-xs font-bold text-[#0D5C3A] hover:bg-[#0D5C3A] hover:text-white transition-all inline-flex items-center gap-1"
                                    >
                                        <span>Details</span>
                                        <span class="material-symbols-outlined text-xs">arrow_forward</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- Empty Orders State -->
                    <div class="py-10 text-center space-y-3">
                        <div class="w-12 h-12 rounded-full bg-[#0D5C3A]/10 text-[#0D5C3A] mx-auto flex items-center justify-center">
                            <span class="material-symbols-outlined text-2xl">local_mall</span>
                        </div>
                        <h3 class="font-serif text-base font-bold text-[#111827]">No orders yet</h3>
                        <p class="text-xs text-[#6B7280] max-w-sm mx-auto leading-relaxed">
                            Explore NAVANIDHI NATURALS pure botanical powders and whole-food wellness formulations.
                        </p>
                        <div class="pt-2">
                            <a
                                href="{{ url('/botanical-herbal-powders') }}"
                                class="btn-emerald-primary inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs uppercase tracking-widest font-bold shadow-sm transition-all"
                            >
                                <span>Discover Catalog</span>
                                <span class="material-symbols-outlined text-xs">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Default Address / Contact (1 col) -->
            <div class="rounded-3xl border border-[#0D5C3A]/12 bg-white p-6 shadow-xs space-y-5 flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex items-center justify-between border-b border-[#0D5C3A]/10 pb-3">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-xl text-[#0D5C3A]">home</span>
                            <h2 class="font-serif text-lg font-bold text-[#111827]">Primary Address</h2>
                        </div>
                        <a href="{{ route('shop.customers.account.addresses.index') }}" class="text-xs text-[#0D5C3A] font-bold hover:underline">
                            Manage
                        </a>
                    </div>

                    @if($defaultAddress)
                        <div class="p-4 rounded-2xl border border-[#0D5C3A]/10 bg-[#FCFBF7] space-y-2 text-xs">
                            <div class="flex items-center justify-between">
                                <p class="font-bold text-[#111827] text-sm" v-pre>
                                    {{ $defaultAddress->first_name }} {{ $defaultAddress->last_name }}
                                </p>
                                @if($defaultAddress->default_address)
                                    <span class="px-2.5 py-0.5 rounded-full bg-[#0D5C3A]/10 text-[#0D5C3A] text-[10px] font-bold uppercase tracking-wider border border-[#0D5C3A]/20">
                                        Default
                                    </span>
                                @endif
                            </div>
                            <p class="text-[#6B7280] leading-relaxed" v-pre>
                                {{ $defaultAddress->address }}<br>
                                {{ $defaultAddress->city }}, {{ $defaultAddress->state }} {{ $defaultAddress->postcode }}<br>
                                {{ $defaultAddress->country }}
                            </p>
                            @if($defaultAddress->phone)
                                <p class="text-[11px] text-[#D4A359] pt-1 flex items-center gap-1 font-semibold" v-pre>
                                    <span class="material-symbols-outlined text-sm">phone</span>
                                    <span>{{ $defaultAddress->phone }}</span>
                                </p>
                            @endif
                        </div>
                    @else
                        <div class="py-6 text-center space-y-2">
                            <p class="text-xs text-[#6B7280]">No delivery address saved yet.</p>
                            <a
                                href="{{ route('shop.customers.account.addresses.create') }}"
                                class="inline-flex items-center gap-1.5 text-xs text-[#0D5C3A] font-bold hover:underline"
                            >
                                <span class="material-symbols-outlined text-sm">add_circle</span>
                                <span>Add New Address</span>
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Customer Care Assistance -->
                <div class="pt-4 border-t border-[#0D5C3A]/10 space-y-2 text-xs">
                    <span class="text-[11px] font-bold uppercase tracking-wider text-[#D4A359] block">Post-Purchase Assistance</span>
                    <p class="text-[#6B7280] text-[11px] leading-relaxed">
                        Questions regarding your batch dispatch or botanical usage? Reach our team directly:
                    </p>
                    <a href="mailto:support@navanidhinaturals.com" class="text-xs text-[#0D5C3A] font-bold hover:underline flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-sm">mail</span>
                        <span>support@navanidhinaturals.com</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-shop::layouts.account>
