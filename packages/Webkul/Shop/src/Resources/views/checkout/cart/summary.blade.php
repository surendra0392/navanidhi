<div class="w-full lg:w-[380px] xl:w-[420px] shrink-0">
    <div class="rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-6 sm:p-8 shadow-2xl space-y-6 text-white">
        {!! view_render_event('bagisto.shop.checkout.cart.summary.title.before') !!}

        <div class="border-b border-white/[0.06] pb-5">
            <h2 class="font-serif text-xl sm:text-2xl font-bold text-white" role="heading" aria-level="2">
                @lang('shop::app.checkout.cart.summary.cart-summary')
            </h2>
        </div>

        {!! view_render_event('bagisto.shop.checkout.cart.summary.title.after') !!}

        <!-- Cart Totals Breakdown -->
        <div class="space-y-4 text-sm">
            <!-- Estimate Tax and Shipping (If Configured) -->
            @if (core()->getConfigData('sales.checkout.shopping_cart.estimate_shipping'))
                <template v-if="cart.have_stockable_items">
                    @include('shop::checkout.cart.summary.estimate-shipping')
                </template>
            @endif

            <!-- Original Subtotal / MRP (When discount exists) -->
            <div class="flex justify-between items-center text-xs text-white/50" v-if="cart.has_discount">
                <span>Original Price (MRP)</span>
                <span class="line-through font-medium text-white/60">@{{ cart.formatted_regular_sub_total }}</span>
            </div>

            <!-- Discount Savings Row -->
            <div class="flex justify-between items-center text-xs font-bold text-emerald-300" v-if="cart.has_discount">
                <span class="inline-flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[14px]">local_offer</span>
                    Product Discount &amp; Savings
                </span>
                <span>- @{{ cart.formatted_total_discount }}</span>
            </div>

            <!-- Sub Total -->
            {!! view_render_event('bagisto.shop.checkout.cart.summary.sub_total.before') !!}

            <div class="flex justify-between items-center text-white/80 pt-1 border-t border-white/[0.06]" :class="{'!border-t-0 !pt-0': !cart.has_discount}">
                <span class="font-medium">@lang('shop::app.checkout.cart.summary.sub-total')</span>

                <span class="font-bold text-white">
                    <template v-if="displayTax.subtotal == 'including_tax'">
                        @{{ cart.formatted_sub_total_incl_tax }}
                    </template>
                    <template v-else-if="displayTax.subtotal == 'both'">
                        @{{ cart.formatted_sub_total_incl_tax }}
                        <span class="text-xs text-white/60 block text-right font-normal">(@lang('shop::app.checkout.cart.summary.excl-tax') @{{ cart.formatted_sub_total }})</span>
                    </template>
                    <template v-else>
                        @{{ cart.formatted_sub_total }}
                    </template>
                </span>
            </div>

            {!! view_render_event('bagisto.shop.checkout.cart.summary.sub_total.after') !!}

            <!-- Discount Amount (Coupon / Cart Rule) -->
            {!! view_render_event('bagisto.shop.checkout.cart.summary.discount_amount.before') !!}

            <template v-if="cart.discount_amount && parseFloat(cart.discount_amount) > 0">
                <div class="flex justify-between items-center text-emerald-300 bg-emerald-500/20 px-3 py-2 rounded-xl border border-emerald-400/30 text-xs font-bold">
                    <span class="inline-flex items-center gap-1">
                        <span class="material-symbols-outlined text-[14px]">sell</span>
                        @lang('shop::app.checkout.cart.summary.discount-amount')
                    </span>
                    <span>- @{{ cart.formatted_discount_amount }}</span>
                </div>
            </template>

            {!! view_render_event('bagisto.shop.checkout.cart.summary.discount_amount.after') !!}

            <!-- Apply Coupon Section -->
            {!! view_render_event('bagisto.shop.checkout.cart.summary.coupon.before') !!}

            <div class="pt-3 pb-3 border-t border-white/[0.06]">
                @include('shop::checkout.coupon')
            </div>

            {!! view_render_event('bagisto.shop.checkout.cart.summary.coupon.after') !!}

            <!-- Shipping / Delivery Charges -->
            {!! view_render_event('bagisto.shop.checkout.onepage.summary.delivery_charges.before') !!}

            <div class="flex justify-between items-center text-white/80" v-if="cart.selected_shipping_rate || cart.shipping_method">
                <span>@lang('shop::app.checkout.cart.summary.delivery-charges')</span>
                <span class="font-semibold text-white">
                    <template v-if="parseFloat(cart.shipping_amount || 0) <= 0">
                        <span class="text-emerald-300 font-bold">FREE</span>
                    </template>
                    <template v-else-if="displayTax.shipping == 'including_tax'">
                        + @{{ cart.formatted_shipping_amount_incl_tax }}
                    </template>
                    <template v-else>
                        + @{{ cart.formatted_shipping_amount }}
                    </template>
                </span>
            </div>
            <div class="flex justify-between items-center text-xs text-white/70" v-else>
                <span>Estimated Shipping</span>
                <span class="text-emerald-300 font-medium" v-if="parseFloat(cart.sub_total || 0) >= 499">Free (Over ₹499)</span>
                <span v-else>Calculated at checkout</span>
            </div>

            {!! view_render_event('bagisto.shop.checkout.onepage.summary.delivery_charges.after') !!}

            <!-- Taxes -->
            {!! view_render_event('bagisto.shop.checkout.cart.summary.tax.before') !!}

            <div class="flex justify-between items-center text-white/80" v-if="cart.tax_total && parseFloat(cart.tax_total) > 0">
                <span>@lang('shop::app.checkout.cart.summary.tax')</span>
                <span class="font-semibold text-white">+ @{{ cart.formatted_tax_total }}</span>
            </div>

            {!! view_render_event('bagisto.shop.checkout.cart.summary.tax.after') !!}

            <!-- Cart Grand Total -->
            {!! view_render_event('bagisto.shop.checkout.cart.summary.grand_total.before') !!}

            <div class="pt-5 border-t border-white/[0.08] flex justify-between items-baseline">
                <div>
                    <span class="font-serif text-base font-bold text-white block">
                        @lang('shop::app.checkout.cart.summary.grand-total')
                    </span>
                    <span class="text-[10px] text-white/50">Inclusive of all applicable taxes</span>
                </div>

                <span class="font-serif text-2xl sm:text-3xl font-bold text-[#E6C687]">
                    @{{ cart.formatted_grand_total }}
                </span>
            </div>

            {!! view_render_event('bagisto.shop.checkout.cart.summary.grand_total.after') !!}

            <!-- Action Buttons -->
            <div class="pt-4 space-y-2.5">
                {!! view_render_event('bagisto.shop.checkout.cart.summary.proceed_to_checkout.before') !!}

                <a
                    href="{{ route('shop.checkout.onepage.index') }}"
                    class="h-12 w-full rounded-xl bg-gradient-to-r from-[#c9a25a] to-[#b08a43] hover:from-[#d6b677] hover:to-[#c9a25a] text-[#041a0e] text-xs uppercase tracking-widest font-bold flex items-center justify-center gap-2 shadow-lg shadow-[#c9a25a]/25 cursor-pointer transition-all duration-300 hover:-translate-y-0.5"
                >
                    <span>@lang('shop::app.checkout.cart.summary.proceed-to-checkout')</span>
                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>

                {!! view_render_event('bagisto.shop.checkout.cart.summary.proceed_to_checkout.after') !!}

                <a
                    href="{{ route('shop.search.index') }}"
                    class="h-11 w-full rounded-xl border border-white/20 bg-white/10 text-white text-xs uppercase tracking-wider font-bold flex items-center justify-center gap-2 hover:border-emerald-400 hover:text-emerald-300 hover:bg-white/20 transition-all cursor-pointer shadow-xs"
                >
                    <span>Continue Shopping</span>
                </a>
            </div>

            <!-- Trust Badges -->
            <div class="pt-5 border-t border-white/[0.06] space-y-2 text-[11px] text-white/70">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-emerald-400 text-[16px]">eco</span>
                    <span>100% Pure Botanicals • Zero Synthetic Fillers</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-emerald-400 text-[16px]">lock</span>
                    <span>Secure 256-Bit SSL Encrypted Checkout</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-emerald-400 text-[16px]">verified</span>
                    <span>Direct MAN AGRO FOODS Certified Dispatch</span>
                </div>
            </div>
        </div>
    </div>
</div>