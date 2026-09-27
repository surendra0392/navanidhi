@php
    $operationalStatus = strtoupper($order->operational_status ?? '');
    $isCanceled = in_array($order->status, ['canceled', 'closed']);
    $hasShipments = $order->shipments->isNotEmpty();

    // Timeline step statuses
    $step1Placed = true;
    $step2Paid = in_array($operationalStatus, ['PAYMENT CONFIRMED', 'PACKING', 'READY TO SHIP', 'SHIPPED', 'DELIVERED']) || in_array($order->status, ['processing', 'completed']) || $order->invoices->isNotEmpty();
    $step3Packing = in_array($operationalStatus, ['PACKING', 'READY TO SHIP', 'SHIPPED', 'DELIVERED']) || ($order->status == 'completed');
    $step4Ready = in_array($operationalStatus, ['READY TO SHIP', 'SHIPPED', 'DELIVERED']) || ($order->status == 'completed');
    $step5Shipped = in_array($operationalStatus, ['SHIPPED', 'DELIVERED']) || $hasShipments || ($order->status == 'completed');
    $step6Delivered = ($operationalStatus === 'DELIVERED') || ($order->status == 'completed');
@endphp

<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        Order #{{ $order->increment_id }} | Navanidhi Naturals
    </x-slot>

    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <div class="flex items-center gap-2">
            <a href="{{ route('shop.home.index') }}" class="text-[#8B6F45] hover:underline">Home</a>
            <span>/</span>
            <a href="{{ route('shop.customers.account.orders.index') }}" class="text-[#8B6F45] hover:underline">Orders</a>
            <span>/</span>
            <span class="text-[#111111] font-semibold">#{{ $order->increment_id }}</span>
        </div>
    @endSection

    <x-shop::layouts.account.navigation />

    <!-- Main Content Area -->
    <div class="flex-1 w-full space-y-6">
        <!-- Order Header Card -->
        <div class="rounded-3xl border border-[#0D5C3A]/15 bg-white p-6 sm:p-8 shadow-[0_8px_30px_-6px_rgba(13,92,58,0.06)] space-y-5">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-[#0D5C3A]/10 pb-4">
                <div class="flex items-center gap-3">
                    <a
                        class="lg:hidden flex h-8 w-8 items-center justify-center rounded-xl border border-[#0D5C3A]/20 text-[#062E1A] hover:bg-[#0D5C3A]/5 transition-colors"
                        href="{{ route('shop.customers.account.orders.index') }}"
                    >
                        <span class="material-symbols-outlined text-base">arrow_back</span>
                    </a>

                    <div>
                        <div class="flex items-center gap-2.5">
                            <h1 class="font-serif text-xl sm:text-2xl font-extrabold text-[#062E1A]">
                                Order #{{ $order->increment_id }}
                            </h1>

                            @php
                                $badgeClass = 'bg-amber-50 text-amber-900 border-amber-200';
                                $label = $order->status_label ?? ucfirst($order->status);

                                if ($operationalStatus) {
                                    $label = ucwords(strtolower($operationalStatus));
                                    if (in_array($operationalStatus, ['SHIPPED', 'DELIVERED'])) {
                                        $badgeClass = 'bg-[#0D5C3A]/10 text-[#0D5C3A] border-[#0D5C3A]/20';
                                    } elseif (in_array($operationalStatus, ['PACKING', 'READY TO SHIP', 'PAYMENT CONFIRMED'])) {
                                        $badgeClass = 'bg-blue-50 text-blue-900 border-blue-200';
                                    }
                                } elseif ($order->status == 'completed') {
                                    $badgeClass = 'bg-[#0D5C3A]/10 text-[#0D5C3A] border-[#0D5C3A]/20';
                                } elseif ($isCanceled) {
                                    $badgeClass = 'bg-red-50 text-red-900 border-red-200';
                                }
                            @endphp

                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold border uppercase tracking-wider {{ $badgeClass }}">
                                {{ $label }}
                            </span>
                        </div>

                        <p class="text-xs text-[#718096] mt-0.5">
                            Placed on {{ $order->created_at->format('d F Y \a\t h:i A') }}
                        </p>
                    </div>
                </div>

                <!-- Action CTAs -->
                <div class="flex flex-wrap items-center gap-2">
                    {!! view_render_event('bagisto.shop.customers.account.orders.reorder_button.before', ['order' => $order]) !!}

                    @if ($order->canReorder() && core()->getConfigData('sales.order_settings.reorder.shop'))
                        <a
                            href="{{ route('shop.customers.account.orders.reorder', $order->id) }}"
                            class="btn-emerald-primary !px-4 !py-2 text-xs uppercase tracking-wider font-bold shadow-sm inline-flex items-center gap-1.5 cursor-pointer"
                        >
                            <span class="material-symbols-outlined text-sm">refresh</span>
                            <span>Reorder</span>
                        </a>
                    @endif

                    {!! view_render_event('bagisto.shop.customers.account.orders.reorder_button.after', ['order' => $order]) !!}

                    @if ($order->invoices->isNotEmpty())
                        <a
                            href="{{ route('shop.customers.account.orders.print-invoice', $order->invoices->first()->id) }}"
                            class="px-3.5 py-2 rounded-xl border border-[#0D5C3A]/20 text-xs font-semibold text-[#062E1A] hover:bg-[#0D5C3A]/5 transition-all inline-flex items-center gap-1.5 shadow-xs"
                            target="_blank"
                        >
                            <span class="material-symbols-outlined text-sm text-[#0D5C3A]">download</span>
                            <span>Invoice</span>
                        </a>
                    @endif

                    {!! view_render_event('bagisto.shop.customers.account.orders.cancel_button.before', ['order' => $order]) !!}

                    @if ($order->canCancel())
                        <form
                            method="POST"
                            id="cancelOrderForm_{{ $order->id }}"
                            action="{{ route('shop.customers.account.orders.cancel', $order->id) }}"
                        >
                            @csrf
                            <button
                                type="submit"
                                onclick="return confirm('@lang('shop::app.customers.account.orders.view.cancel-confirm-msg')');"
                                class="px-3.5 py-2 rounded-xl border border-red-200 text-xs font-semibold text-red-700 hover:bg-red-50 transition-all inline-flex items-center gap-1 shadow-xs cursor-pointer"
                            >
                                <span class="material-symbols-outlined text-sm">cancel</span>
                                <span>Cancel</span>
                            </button>
                        </form>
                    @endif

                    {!! view_render_event('bagisto.shop.customers.account.orders.cancel_button.after', ['order' => $order]) !!}
                </div>
            </div>

            <!-- Fulfillment Progress Timeline -->
            @if (! $isCanceled)
                <div class="py-3">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs font-bold uppercase tracking-wider text-[#D4A359] flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-base">local_shipping</span>
                            <span>Botanical Fulfillment Journey</span>
                        </span>
                        @if($operationalStatus)
                            <span class="text-xs font-bold text-[#0D5C3A]">Current Stage: {{ ucwords(strtolower($operationalStatus)) }}</span>
                        @endif
                    </div>

                    <!-- Timeline Steps Grid -->
                    <div class="relative">
                        <!-- Connecting Bar (Desktop) -->
                        <div class="hidden sm:block absolute top-4 left-6 right-6 h-0.5 bg-[#0D5C3A]/20 -z-0"></div>

                        <div class="grid grid-cols-2 sm:grid-cols-6 gap-4 relative z-10">
                            <!-- Step 1: Order Placed -->
                            <div class="flex sm:flex-col items-center sm:text-center gap-3 sm:gap-2">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-xs shrink-0 shadow-sm ring-4 ring-[#0D5C3A]/15 text-white" style="background-color: #0D5C3A !important;">
                                    <span class="material-symbols-outlined text-base">check</span>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-[#062E1A]">Placed</p>
                                    <p class="text-[10px] text-[#718096]">{{ $order->created_at->format('d M') }}</p>
                                </div>
                            </div>

                            <!-- Step 2: Payment Confirmed -->
                            <div class="flex sm:flex-col items-center sm:text-center gap-3 sm:gap-2">
                                <div class="w-8 h-8 rounded-full {{ $step2Paid ? 'text-white ring-4 ring-[#0D5C3A]/15' : 'bg-[#FCFBF7] border border-[#0D5C3A]/25 text-[#718096]' }} flex items-center justify-center font-bold text-xs shrink-0 shadow-sm" style="{{ $step2Paid ? 'background-color: #0D5C3A !important;' : '' }}">
                                    @if($step2Paid)
                                        <span class="material-symbols-outlined text-base">check</span>
                                    @else
                                        <span>2</span>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-xs font-bold {{ $step2Paid ? 'text-[#062E1A]' : 'text-[#718096]' }}">Payment</p>
                                    <p class="text-[10px] text-[#718096]">{{ $step2Paid ? 'Confirmed' : 'Pending' }}</p>
                                </div>
                            </div>

                            <!-- Step 3: Cold-Milling & Packing -->
                            <div class="flex sm:flex-col items-center sm:text-center gap-3 sm:gap-2">
                                <div class="w-8 h-8 rounded-full {{ $step3Packing ? 'text-white ring-4 ring-[#0D5C3A]/15' : 'bg-[#FCFBF7] border border-[#0D5C3A]/25 text-[#718096]' }} flex items-center justify-center font-bold text-xs shrink-0 shadow-sm" style="{{ $step3Packing ? 'background-color: #0D5C3A !important;' : '' }}">
                                    @if($step3Packing)
                                        <span class="material-symbols-outlined text-base">check</span>
                                    @else
                                        <span>3</span>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-xs font-bold {{ $step3Packing ? 'text-[#062E1A]' : 'text-[#718096]' }}">Packing</p>
                                    <p class="text-[10px] text-[#718096]">Cold-Milled</p>
                                </div>
                            </div>

                            <!-- Step 4: Ready to Ship -->
                            <div class="flex sm:flex-col items-center sm:text-center gap-3 sm:gap-2">
                                <div class="w-8 h-8 rounded-full {{ $step4Ready ? 'text-white ring-4 ring-[#0D5C3A]/15' : 'bg-[#FCFBF7] border border-[#0D5C3A]/25 text-[#718096]' }} flex items-center justify-center font-bold text-xs shrink-0 shadow-sm" style="{{ $step4Ready ? 'background-color: #0D5C3A !important;' : '' }}">
                                    @if($step4Ready)
                                        <span class="material-symbols-outlined text-base">check</span>
                                    @else
                                        <span>4</span>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-xs font-bold {{ $step4Ready ? 'text-[#062E1A]' : 'text-[#718096]' }}">Ready</p>
                                    <p class="text-[10px] text-[#718096]">Quality Checked</p>
                                </div>
                            </div>

                            <!-- Step 5: Shipped -->
                            <div class="flex sm:flex-col items-center sm:text-center gap-3 sm:gap-2">
                                <div class="w-8 h-8 rounded-full {{ $step5Shipped ? 'text-white ring-4 ring-[#0D5C3A]/15' : 'bg-[#FCFBF7] border border-[#0D5C3A]/25 text-[#718096]' }} flex items-center justify-center font-bold text-xs shrink-0 shadow-sm" style="{{ $step5Shipped ? 'background-color: #0D5C3A !important;' : '' }}">
                                    @if($step5Shipped)
                                        <span class="material-symbols-outlined text-base">check</span>
                                    @else
                                        <span>5</span>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-xs font-bold {{ $step5Shipped ? 'text-[#062E1A]' : 'text-[#718096]' }}">Dispatched</p>
                                    <p class="text-[10px] text-[#718096]">In Transit</p>
                                </div>
                            </div>

                            <!-- Step 6: Delivered -->
                            <div class="flex sm:flex-col items-center sm:text-center gap-3 sm:gap-2">
                                <div class="w-8 h-8 rounded-full {{ $step6Delivered ? 'text-white ring-4 ring-[#0D5C3A]/15' : 'bg-[#FCFBF7] border border-[#0D5C3A]/25 text-[#718096]' }} flex items-center justify-center font-bold text-xs shrink-0 shadow-sm" style="{{ $step6Delivered ? 'background-color: #0D5C3A !important;' : '' }}">
                                    @if($step6Delivered)
                                        <span class="material-symbols-outlined text-base">done_all</span>
                                    @else
                                        <span>6</span>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-xs font-bold {{ $step6Delivered ? 'text-[#0D5C3A]' : 'text-[#718096]' }}">Delivered</p>
                                    <p class="text-[10px] text-[#718096]">{{ $step6Delivered ? 'Completed' : 'Pending' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="p-4 rounded-xl bg-red-50 border border-red-200 text-xs text-red-800 flex items-center gap-2">
                    <span class="material-symbols-outlined text-base text-red-600">error</span>
                    <span>This order was canceled on {{ $order->updated_at->format('d M, Y') }}.</span>
                </div>
            @endif
        </div>

        <!-- Ordered Botanical Items Table Card -->
        <div class="rounded-3xl border border-[#0D5C3A]/15 bg-white p-6 sm:p-8 shadow-[0_8px_30px_-6px_rgba(13,92,58,0.06)] space-y-4">
            <h2 class="font-serif text-lg font-extrabold text-[#062E1A] border-b border-[#0D5C3A]/10 pb-3 flex items-center gap-2">
                <span class="material-symbols-outlined text-lg text-[#0D5C3A]">spa</span>
                <span>Items Ordered ({{ $order->items->count() }})</span>
            </h2>

            <div class="divide-y divide-[#0D5C3A]/10">
                @foreach ($order->items as $item)
                    @php
                        $product = $item->product;
                        $productImageUrl = $product?->base_image_url ?? bagisto_asset('images/small-product-placeholder.webp');
                        $attributes = $item->additional['attributes'] ?? [];
                    @endphp

                    <div class="py-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                        <div class="flex items-center gap-4 min-w-0">
                            <div class="w-16 h-16 rounded-2xl border border-[#0D5C3A]/15 bg-[#FCFBF7] overflow-hidden shrink-0 flex items-center justify-center p-1.5 shadow-xs">
                                <img
                                    src="{{ $productImageUrl }}"
                                    alt="{{ $item->name }}"
                                    class="w-full h-full object-contain"
                                >
                            </div>

                            <div class="space-y-0.5 min-w-0" v-pre>
                                <p class="font-serif text-sm font-bold text-[#062E1A] truncate">
                                    {{ $item->name }}
                                </p>
                                <p class="text-xs text-[#718096]">
                                    SKU: <span class="font-mono text-[#1A202C]">{{ $item->sku }}</span>
                                </p>

                                @if (! empty($attributes))
                                    <div class="flex flex-wrap gap-1.5 pt-0.5">
                                        @foreach ($attributes as $attribute)
                                            <span class="px-2 py-0.5 rounded-full bg-[#0D5C3A]/10 text-[#0D5C3A] text-[10px] font-semibold uppercase tracking-wider border border-[#0D5C3A]/15">
                                                {{ $attribute['option_label'] ?? $attribute['attribute_name'] }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="flex items-center justify-between sm:justify-end gap-6 w-full sm:w-auto text-xs sm:text-sm">
                            <div class="text-left sm:text-right">
                                <span class="text-[#718096] text-xs block">Unit Price</span>
                                <span class="font-semibold text-[#1A202C]">
                                    {{ core()->formatPrice($item->price, $order->order_currency_code) }}
                                </span>
                            </div>

                            <div class="text-center">
                                <span class="text-[#718096] text-xs block">Qty</span>
                                <span class="font-bold text-[#062E1A] px-2.5 py-0.5 rounded-lg bg-[#FCFBF7] border border-[#0D5C3A]/20">
                                    {{ $item->qty_ordered }}
                                </span>
                            </div>

                            <div class="text-right min-w-[80px]">
                                <span class="text-[#718096] text-xs block">Total</span>
                                <span class="font-serif text-sm font-bold text-[#0D5C3A]">
                                    {{ core()->formatPrice($item->total, $order->order_currency_code) }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Financial Totals Section -->
            <div class="pt-4 border-t border-[#0D5C3A]/10 flex justify-end">
                <div class="w-full sm:w-80 space-y-2 text-xs">
                    <div class="flex justify-between text-[#718096]">
                        <span>Subtotal</span>
                        <span class="font-semibold text-[#1A202C]">
                            {{ core()->formatPrice($order->sub_total, $order->order_currency_code) }}
                        </span>
                    </div>

                    @if ($order->discount_amount > 0)
                        <div class="flex justify-between text-[#0D5C3A]">
                            <span>Discount {{ $order->coupon_code ? "({$order->coupon_code})" : '' }}</span>
                            <span class="font-bold">
                                -{{ core()->formatPrice($order->discount_amount, $order->order_currency_code) }}
                            </span>
                        </div>
                    @endif

                    <div class="flex justify-between text-[#718096]">
                        <span>Shipping & Handling</span>
                        <span class="font-semibold text-[#1A202C]">
                            @if ($order->shipping_amount == 0)
                                <span class="text-[#0D5C3A] font-bold">FREE</span>
                            @else
                                {{ core()->formatPrice($order->shipping_amount, $order->order_currency_code) }}
                            @endif
                        </span>
                    </div>

                    @if ($order->tax_amount > 0)
                        <div class="flex justify-between text-[#718096]">
                            <span>Tax (GST)</span>
                            <span class="font-semibold text-[#1A202C]">
                                {{ core()->formatPrice($order->tax_amount, $order->order_currency_code) }}
                            </span>
                        </div>
                    @endif

                    <div class="pt-3 border-t border-[#0D5C3A]/10 flex justify-between items-center text-sm font-bold text-[#1A202C]">
                        <span class="font-serif">Grand Total</span>
                        <span class="font-serif text-base text-[#0D5C3A] font-extrabold">
                            {{ core()->formatPrice($order->grand_total, $order->order_currency_code) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Address & Payment Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Shipping & Billing Addresses -->
            <div class="rounded-3xl border border-[#0D5C3A]/15 bg-white p-6 sm:p-8 shadow-[0_8px_30px_-6px_rgba(13,92,58,0.06)] space-y-4">
                <h3 class="font-serif text-base font-extrabold text-[#062E1A] border-b border-[#0D5C3A]/10 pb-3 flex items-center gap-2">
                    <span class="material-symbols-outlined text-lg text-[#0D5C3A]">location_on</span>
                    <span>Addresses</span>
                </h3>

                <div class="space-y-4 text-xs">
                    <!-- Shipping Address -->
                    @if ($order->shipping_address)
                        <div class="space-y-1">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-[#D4A359]">Shipping Destination</span>
                            <p class="font-bold text-[#1A202C] text-sm" v-pre>
                                {{ $order->shipping_address->first_name }} {{ $order->shipping_address->last_name }}
                            </p>
                            <p class="text-[#718096] leading-relaxed" v-pre>
                                {{ $order->shipping_address->address }}<br>
                                {{ $order->shipping_address->city }}, {{ $order->shipping_address->state }} {{ $order->shipping_address->postcode }}<br>
                                {{ $order->shipping_address->country }}
                            </p>
                            @if ($order->shipping_address->phone)
                                <p class="text-[11px] text-[#D4A359] pt-0.5" v-pre>
                                    Phone: {{ $order->shipping_address->phone }}
                                </p>
                            @endif
                        </div>
                    @endif

                    <!-- Billing Address -->
                    @if ($order->billing_address)
                        <div class="pt-3 border-t border-[#0D5C3A]/10 space-y-1">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-[#D4A359]">Billing Address</span>
                            <p class="font-bold text-[#1A202C]" v-pre>
                                {{ $order->billing_address->first_name }} {{ $order->billing_address->last_name }}
                            </p>
                            <p class="text-[#718096] leading-relaxed text-[11px]" v-pre>
                                {{ $order->billing_address->address }}, {{ $order->billing_address->city }}, {{ $order->billing_address->state }} {{ $order->billing_address->postcode }}
                            </p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Shipping Carrier & Payment Method -->
            <div class="rounded-3xl border border-[#0D5C3A]/15 bg-white p-6 sm:p-8 shadow-[0_8px_30px_-6px_rgba(13,92,58,0.06)] space-y-4 flex flex-col justify-between">
                <div class="space-y-4 text-xs">
                    <h3 class="font-serif text-base font-extrabold text-[#062E1A] border-b border-[#0D5C3A]/10 pb-3 flex items-center gap-2">
                        <span class="material-symbols-outlined text-lg text-[#0D5C3A]">credit_card</span>
                        <span>Logistics & Payment</span>
                    </h3>

                    <!-- Shipping Method -->
                    <div class="space-y-1">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-[#D4A359]">Shipping Carrier</span>
                        <p class="font-semibold text-[#1A202C]">
                            {{ $order->shipping_title ?? 'Navanidhi Standard Delivery' }}
                        </p>
                        @if ($order->shipments->isNotEmpty())
                            <div class="p-3 rounded-2xl bg-[#0D5C3A]/5 border border-[#0D5C3A]/15 mt-2 space-y-0.5">
                                @foreach ($order->shipments as $shipment)
                                    <p class="font-bold text-[#0D5C3A] text-xs">Tracking: {{ $shipment->track_number ?? 'Pending Carrier Scan' }}</p>
                                    <p class="text-[11px] text-[#718096]">Carrier: {{ $shipment->carrier_title }}</p>
                                @endforeach
                            </div>
                        @else
                            <p class="text-[11px] text-[#718096]">Consignment packed securely in eco-friendly barrier pouch.</p>
                        @endif
                    </div>

                    <!-- Payment Method -->
                    <div class="pt-3 border-t border-[#0D5C3A]/10 space-y-1">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-[#D4A359]">Payment Details</span>
                        <p class="font-semibold text-[#1A202C]">
                            {{ core()->getConfigData('sales.payment_methods.' . $order->payment?->method . '.title') ?? ucfirst($order->payment?->method) }}
                        </p>
                        <p class="text-[11px] text-[#718096]">
                            Status: <span class="font-semibold {{ $step2Paid ? 'text-emerald-700' : 'text-amber-700' }}">{{ $step2Paid ? 'Paid' : 'Pending' }}</span>
                        </p>
                    </div>
                </div>

                <!-- Certified Facility Quality Stamp -->
                <div class="pt-4 border-t border-[#0D5C3A]/10 p-3.5 rounded-2xl bg-[#FCFBF7] border border-[#0D5C3A]/15 text-[11px] text-[#718096] leading-relaxed space-y-1">
                    <p class="font-bold text-[#0D5C3A] uppercase tracking-wider text-[10px] flex items-center gap-1">
                        <span class="material-symbols-outlined text-xs">verified</span>
                        <span>Facility Dispatch Guarantee</span>
                    </p>
                    <p>Processed & packed under sterile conditions at the certified facility of <strong class="text-[#062E1A]">MAN AGRO FOODS</strong>. FSSAI Lic: 10020042001234.</p>
                </div>
            </div>
        </div>
    </div>
</x-shop::layouts.account>
