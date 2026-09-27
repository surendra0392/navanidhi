<div class="rounded-3xl border border-[#0D5C3A]/12 bg-white p-5 sm:p-7 shadow-xs space-y-5">
    <!-- Header -->
    <div class="border-b border-[#0D5C3A]/10 pb-3">
        <h2 class="font-serif text-xl sm:text-2xl font-bold text-[#111827]" role="heading" aria-level="2">
            @lang('shop::app.checkout.onepage.summary.cart-summary')
            <span class="text-xs font-sans font-normal text-[#6B7280]" v-if="cart?.items?.length">
                (@{{ cart.items.length }} @{{ cart.items.length === 1 ? 'item' : 'items' }})
            </span>
        </h2>
    </div>

    <!-- Cart Items (Compact) -->
    <div class="divide-y divide-[#0D5C3A]/10 max-h-64 overflow-y-auto pr-1">
        <div
            class="py-3 first:pt-0 last:pb-0 flex gap-3 items-center justify-between"
            v-for="item in cart.items"
        >
            <div class="flex items-center gap-3 min-w-0">
                {!! view_render_event('bagisto.shop.checkout.onepage.summary.item_image.before') !!}

                <div class="shrink-0 w-12 h-12 rounded-xl bg-[#FCFBF7] border border-[#0D5C3A]/12 overflow-hidden flex items-center justify-center">
                    <img
                        class="w-full h-full object-cover"
                        :src="item.base_image.small_image_url"
                        :alt="item.name"
                    />
                </div>

                {!! view_render_event('bagisto.shop.checkout.onepage.summary.item_image.after') !!}

                <div class="min-w-0">
                    {!! view_render_event('bagisto.shop.checkout.onepage.summary.item_name.before') !!}

                    <p class="font-serif text-xs sm:text-sm font-bold text-[#111827] truncate">
                        @{{ item.name }}
                    </p>

                    {!! view_render_event('bagisto.shop.checkout.onepage.summary.item_name.after') !!}

                    <p class="text-[11px] text-[#6B7280]">
                        Qty: @{{ item.quantity }}
                    </p>
                </div>
            </div>

            <div class="text-right shrink-0">
                <span class="font-serif text-xs sm:text-sm font-bold text-[#0D5C3A]">
                    <template v-if="displayTax.prices == 'including_tax'">
                        @{{ item.formatted_total_incl_tax }}
                    </template>
                    <template v-else>
                        @{{ item.formatted_total }}
                    </template>
                </span>
            </div>
        </div>
    </div>

    <!-- Cart Totals Breakdown -->
    <div class="border-t border-[#0D5C3A]/10 pt-4 space-y-3 text-xs sm:text-sm">
        <!-- Original Price (MRP) when discount exists -->
        <div class="flex justify-between items-center text-xs text-[#6B7280]" v-if="cart.has_discount">
            <span>Original Price (MRP)</span>
            <span class="line-through font-medium">@{{ cart.formatted_regular_sub_total }}</span>
        </div>

        <!-- Discount Savings Row -->
        <div class="flex justify-between items-center text-xs font-bold text-[#0D5C3A]" v-if="cart.has_discount">
            <span class="inline-flex items-center gap-1.5">
                <span class="material-symbols-outlined text-[14px]">local_offer</span>
                Total Savings
            </span>
            <span>- @{{ cart.formatted_total_discount }}</span>
        </div>

        <!-- Sub Total -->
        {!! view_render_event('bagisto.shop.checkout.onepage.summary.sub_total.before') !!}

        <div class="flex justify-between items-center text-[#4B5563]" :class="{'pt-1 border-t border-[#0D5C3A]/10': cart.has_discount}">
            <span>@lang('shop::app.checkout.onepage.summary.sub-total')</span>

            <span class="font-bold text-[#111827]">
                <template v-if="displayTax.subtotal == 'including_tax'">
                    @{{ cart.formatted_sub_total_incl_tax }}
                </template>
                <template v-else-if="displayTax.subtotal == 'both'">
                    @{{ cart.formatted_sub_total_incl_tax }}
                    <span class="text-xs text-[#6B7280] block text-right font-normal">(@lang('shop::app.checkout.onepage.summary.excl-tax') @{{ cart.formatted_sub_total }})</span>
                </template>
                <template v-else>
                    @{{ cart.formatted_sub_total }}
                </template>
            </span>
        </div>

        {!! view_render_event('bagisto.shop.checkout.onepage.summary.sub_total.after') !!}

        <!-- Discount Amount (Coupon) -->
        {!! view_render_event('bagisto.shop.checkout.onepage.summary.discount_amount.before') !!}

        <template v-if="cart.discount_amount && parseFloat(cart.discount_amount) > 0">
            <div class="flex justify-between items-center text-[#0D5C3A] bg-[#0D5C3A]/10 px-3 py-1.5 rounded-xl border border-[#0D5C3A]/20 text-xs font-bold">
                <span>@lang('shop::app.checkout.onepage.summary.discount-amount')</span>
                <span>- @{{ cart.formatted_discount_amount }}</span>
            </div>
        </template>

        {!! view_render_event('bagisto.shop.checkout.onepage.summary.discount_amount.after') !!}

        <!-- Coupon Application -->
        {!! view_render_event('bagisto.shop.checkout.onepage.summary.coupon.before') !!}

        <div class="pt-1 pb-1 border-t border-[#0D5C3A]/10">
            @include('shop::checkout.coupon')
        </div>

        {!! view_render_event('bagisto.shop.checkout.onepage.summary.coupon.after') !!}

        <!-- Delivery / Shipping Charges -->
        {!! view_render_event('bagisto.shop.checkout.onepage.summary.delivery_charges.before') !!}

        <div class="flex justify-between items-center text-[#4B5563]" v-if="cart.selected_shipping_rate || cart.shipping_method">
            <span>@lang('shop::app.checkout.onepage.summary.delivery-charges')</span>
            <span class="font-semibold text-[#111827]">
                <template v-if="parseFloat(cart.shipping_amount || 0) <= 0">
                    <span class="text-[#0D5C3A] font-bold">FREE</span>
                </template>
                <template v-else-if="displayTax.shipping == 'including_tax'">
                    + @{{ cart.formatted_shipping_amount_incl_tax }}
                </template>
                <template v-else>
                    + @{{ cart.formatted_shipping_amount }}
                </template>
            </span>
        </div>
        <div class="flex justify-between items-center text-xs text-[#9CA3AF]" v-else-if="cart.have_stockable_items">
            <span>Shipping</span>
            <span>Calculated automatically</span>
        </div>

        {!! view_render_event('bagisto.shop.checkout.onepage.summary.delivery_charges.after') !!}

        <!-- Taxes -->
        {!! view_render_event('bagisto.shop.checkout.onepage.summary.tax.before') !!}

        <div class="flex justify-between items-center text-[#4B5563]" v-if="cart.tax_total && parseFloat(cart.tax_total) > 0">
            <span>@lang('shop::app.checkout.onepage.summary.tax')</span>
            <span class="font-semibold text-[#111827]">+ @{{ cart.formatted_tax_total }}</span>
        </div>

        {!! view_render_event('bagisto.shop.checkout.onepage.summary.tax.after') !!}

        <!-- Grand Total -->
        {!! view_render_event('bagisto.shop.checkout.onepage.summary.grand_total.before') !!}

        <div class="pt-3 border-t border-[#0D5C3A]/15 flex justify-between items-baseline">
            <span class="font-serif text-base font-bold text-[#111827]">
                @lang('shop::app.checkout.onepage.summary.grand-total')
            </span>

            <span class="font-serif text-2xl sm:text-3xl font-bold text-[#111827]">
                @{{ cart.formatted_grand_total }}
            </span>
        </div>

        {!! view_render_event('bagisto.shop.checkout.onepage.summary.grand_total.after') !!}

        <!-- Mobile Place Order CTA -->
        <div class="block lg:hidden pt-3" v-if="canPlaceOrder">
            <button
                type="button"
                class="btn-emerald-primary w-full h-12 rounded-full text-white text-xs uppercase tracking-widest font-bold flex items-center justify-center gap-2 shadow-md transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer"
                :disabled="isPlacingOrder"
                @click="placeOrder"
            >
                <span v-if="isPlacingOrder" class="inline-block animate-spin mr-1">◌</span>
                <span>@lang('shop::app.checkout.onepage.summary.place-order')</span>
                <span class="icon-arrow-right text-xs"></span>
            </button>
        </div>

        <!-- Trust Badges -->
        <div class="pt-3 border-t border-[#0D5C3A]/10 space-y-1.5 text-[11px] text-[#6B7280]">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-[16px] text-[#0D5C3A]">lock</span>
                <span>256-Bit Encrypted Secure Checkout</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-[16px] text-[#0D5C3A]">verified</span>
                <span>Fresh Sealed Dispatch from MAN AGRO FOODS Facility</span>
            </div>
        </div>
    </div>
</div>
