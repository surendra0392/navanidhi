<x-shop::layouts
    :has-header="true"
    :has-feature="false"
    :has-footer="true"
>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.checkout.success.thanks') | Navanidhi Naturals
    </x-slot>

    <div class="min-h-[calc(100vh-80px)] py-12 lg:py-20" style="background-color: #FCFBF7;">
        <!-- Page content -->
        <main class="site-container">
            <div class="rounded-3xl border border-[#0D5C3A]/15 bg-white p-8 sm:p-14 lg:p-16 text-center max-w-2xl mx-auto shadow-[0_12px_40px_-8px_rgba(13,92,58,0.08)] space-y-6">
                {{ view_render_event('bagisto.shop.checkout.success.image.before', ['order' => $order]) }}

                <!-- Success Badge with Pulse Glow -->
                <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-[#0D5C3A]/10 border-2 border-[#0D5C3A]/30 text-[#0D5C3A] select-none navanidhi-pulse-glow">
                    <span class="material-symbols-outlined text-[44px]">check_circle</span>
                </div>

                {{ view_render_event('bagisto.shop.checkout.success.image.after', ['order' => $order]) }}

                <div class="space-y-3">
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#0D5C3A]/10 border border-[#0D5C3A]/20 text-[#0D5C3A] text-[10px] sm:text-xs font-bold tracking-widest uppercase">
                        <span class="material-symbols-outlined text-[14px]">spa</span>
                        <span>Order Successfully Placed</span>
                    </div>

                    <h1 class="font-serif text-3xl sm:text-4xl font-extrabold tracking-tight text-[#062E1A]">
                        @lang('shop::app.checkout.success.thanks')
                    </h1>

                    <p class="text-base sm:text-lg font-bold text-[#0D5C3A]">
                        @if (auth()->guard('customer')->user())
                            @lang('shop::app.checkout.success.order-id-info', [
                                'order_id' => '<a class="underline hover:text-[#062E1A]" href="'.route('shop.customers.account.orders.view', $order->id).'">#'.$order->increment_id.'</a>'
                            ])
                        @else
                            Order #{{ $order->increment_id }}
                        @endif
                    </p>

                    <p class="text-xs sm:text-sm text-[#4A5568] leading-relaxed max-w-md mx-auto pt-1">
                        @if (! empty($order->checkout_message))
                            {!! nl2br($order->checkout_message) !!}
                        @else
                            A confirmation receipt has been dispatched to <strong class="text-[#1A202C]">{{ $order->customer_email }}</strong>. Your pure spice & botanical batch is now queued for fresh preparation and nitrogen-sealed packaging at the <strong class="text-[#062E1A]">MAN AGRO FOODS</strong> certified facility.
                        @endif
                    </p>
                </div>

                <!-- Reassurance highlights -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-5 pb-3 border-y border-[#0D5C3A]/10 text-left">
                    <div class="p-3.5 rounded-2xl bg-[#FCFBF7] border border-[#0D5C3A]/10 flex items-center gap-2.5">
                        <span class="material-symbols-outlined text-[24px] text-[#0D5C3A] shrink-0">inventory_2</span>
                        <div class="text-[11px] leading-tight">
                            <p class="font-bold text-[#1A202C]">Fresh Packaging</p>
                            <p class="text-[#718096]">Triple-layer sealed</p>
                        </div>
                    </div>
                    <div class="p-3.5 rounded-2xl bg-[#FCFBF7] border border-[#0D5C3A]/10 flex items-center gap-2.5">
                        <span class="material-symbols-outlined text-[24px] text-[#0D5C3A] shrink-0">local_shipping</span>
                        <div class="text-[11px] leading-tight">
                            <p class="font-bold text-[#1A202C]">Fast Dispatch</p>
                            <p class="text-[#718096]">Tracking via SMS & Email</p>
                        </div>
                    </div>
                    <div class="p-3.5 rounded-2xl bg-[#FCFBF7] border border-[#0D5C3A]/10 flex items-center gap-2.5">
                        <span class="material-symbols-outlined text-[24px] text-[#0D5C3A] shrink-0">verified</span>
                        <div class="text-[11px] leading-tight">
                            <p class="font-bold text-[#1A202C]">Direct Origin</p>
                            <p class="text-[#718096]">MAN AGRO FOODS</p>
                        </div>
                    </div>
                </div>

                {{ view_render_event('bagisto.shop.checkout.success.continue-shopping.before', ['order' => $order]) }}

                <div class="pt-3 flex flex-col sm:flex-row items-center justify-center gap-3">
                    <a
                        href="{{ route('shop.home.index') }}"
                        class="btn-emerald-primary w-full sm:w-auto !px-8 !py-3.5 text-xs uppercase tracking-widest font-bold flex items-center justify-center gap-2 shadow-md cursor-pointer"
                    >
                        <span>@lang('shop::app.checkout.cart.index.continue-shopping')</span>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>

                    @if (auth()->guard('customer')->user())
                        <a
                            href="{{ route('shop.customers.account.orders.view', $order->id) }}"
                            class="btn-emerald-outline w-full sm:w-auto !px-7 !py-3.5 text-xs uppercase tracking-widest font-bold inline-flex items-center justify-center gap-2"
                        >
                            <span>View Order Status</span>
                        </a>
                    @endif
                </div>

                {{ view_render_event('bagisto.shop.checkout.success.continue-shopping.after', ['order' => $order]) }}
            </div>
        </main>
    </div>
</x-shop::layouts>
