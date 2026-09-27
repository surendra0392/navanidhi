@php
    $customer = auth()->guard('customer')->user();
@endphp

<div class="w-full lg:w-[300px] xl:w-[320px] shrink-0 space-y-6">
    <!-- Account Profile Card -->
    <div class="rounded-2xl border border-[#DCD3C3] bg-white p-5 sm:p-6 shadow-sm space-y-5">
        <div class="flex items-center gap-3.5 pb-4 border-b border-[#DCD3C3]/60">
            <div class="shrink-0 w-12 h-12 rounded-full bg-[#0F4D2E] text-[#D4B381] flex items-center justify-center font-serif font-bold text-lg shadow-inner">
                {{ strtoupper(substr($customer->first_name ?? 'N', 0, 1)) }}
            </div>

            <div class="min-w-0" v-pre>
                <div class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-[#EBF3EE] text-[#0F4D2E] text-[10px] font-bold tracking-wider uppercase">
                    <span class="material-symbols-outlined text-[13px] leading-none">eco</span>
                    <span>Navanidhi Member</span>
                </div>
                <h3 class="font-serif text-base font-bold text-[#111111] truncate mt-1">
                    {{ $customer->first_name }} {{ $customer->last_name }}
                </h3>
                <p class="text-xs text-[#666666] truncate">
                    {{ $customer->email }}
                </p>
            </div>
        </div>

        <!-- Navigation Links -->
        <nav class="space-y-1" aria-label="Customer Account Menu">
            <!-- Dashboard -->
            <a
                href="{{ route('shop.customers.account.index') }}"
                class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs uppercase tracking-wider font-semibold transition-all {{ request()->routeIs('shop.customers.account.index') ? 'shadow-sm' : 'text-[#111111] hover:bg-[#EADFCF]/50 hover:text-[#0F4D2E]' }}"
                style="{{ request()->routeIs('shop.customers.account.index') ? 'background-color: #0F4D2E !important; color: #FFFFFF !important;' : '' }}"
            >
                <span class="flex items-center gap-2.5">
                    <span class="material-symbols-outlined text-lg" style="{{ request()->routeIs('shop.customers.account.index') ? 'color: #D4B381 !important;' : 'color: #8B6F45 !important;' }}">grid_view</span>
                    <span style="{{ request()->routeIs('shop.customers.account.index') ? 'color: #FFFFFF !important;' : '' }}">Dashboard</span>
                </span>
                <span class="material-symbols-outlined text-sm opacity-60" style="{{ request()->routeIs('shop.customers.account.index') ? 'color: #FFFFFF !important;' : '' }}">chevron_right</span>
            </a>

            <!-- Orders -->
            <a
                href="{{ route('shop.customers.account.orders.index') }}"
                class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs uppercase tracking-wider font-semibold transition-all {{ request()->routeIs('shop.customers.account.orders*') ? 'shadow-sm' : 'text-[#111111] hover:bg-[#EADFCF]/50 hover:text-[#0F4D2E]' }}"
                style="{{ request()->routeIs('shop.customers.account.orders*') ? 'background-color: #0F4D2E !important; color: #FFFFFF !important;' : '' }}"
            >
                <span class="flex items-center gap-2.5">
                    <span class="material-symbols-outlined text-lg" style="{{ request()->routeIs('shop.customers.account.orders*') ? 'color: #D4B381 !important;' : 'color: #8B6F45 !important;' }}">shopping_bag</span>
                    <span style="{{ request()->routeIs('shop.customers.account.orders*') ? 'color: #FFFFFF !important;' : '' }}">Orders & Fulfillment</span>
                </span>
                <span class="material-symbols-outlined text-sm opacity-60" style="{{ request()->routeIs('shop.customers.account.orders*') ? 'color: #FFFFFF !important;' : '' }}">chevron_right</span>
            </a>

            <!-- Addresses -->
            <a
                href="{{ route('shop.customers.account.addresses.index') }}"
                class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs uppercase tracking-wider font-semibold transition-all {{ request()->routeIs('shop.customers.account.addresses*') ? 'shadow-sm' : 'text-[#111111] hover:bg-[#EADFCF]/50 hover:text-[#0F4D2E]' }}"
                style="{{ request()->routeIs('shop.customers.account.addresses*') ? 'background-color: #0F4D2E !important; color: #FFFFFF !important;' : '' }}"
            >
                <span class="flex items-center gap-2.5">
                    <span class="material-symbols-outlined text-lg" style="{{ request()->routeIs('shop.customers.account.addresses*') ? 'color: #D4B381 !important;' : 'color: #8B6F45 !important;' }}">location_on</span>
                    <span style="{{ request()->routeIs('shop.customers.account.addresses*') ? 'color: #FFFFFF !important;' : '' }}">Address Book</span>
                </span>
                <span class="material-symbols-outlined text-sm opacity-60" style="{{ request()->routeIs('shop.customers.account.addresses*') ? 'color: #FFFFFF !important;' : '' }}">chevron_right</span>
            </a>

            <!-- Profile & Security -->
            <a
                href="{{ route('shop.customers.account.profile.index') }}"
                class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs uppercase tracking-wider font-semibold transition-all {{ request()->routeIs('shop.customers.account.profile*') ? 'shadow-sm' : 'text-[#111111] hover:bg-[#EADFCF]/50 hover:text-[#0F4D2E]' }}"
                style="{{ request()->routeIs('shop.customers.account.profile*') ? 'background-color: #0F4D2E !important; color: #FFFFFF !important;' : '' }}"
            >
                <span class="flex items-center gap-2.5">
                    <span class="material-symbols-outlined text-lg" style="{{ request()->routeIs('shop.customers.account.profile*') ? 'color: #D4B381 !important;' : 'color: #8B6F45 !important;' }}">manage_accounts</span>
                    <span style="{{ request()->routeIs('shop.customers.account.profile*') ? 'color: #FFFFFF !important;' : '' }}">Profile & Security</span>
                </span>
                <span class="material-symbols-outlined text-sm opacity-60" style="{{ request()->routeIs('shop.customers.account.profile*') ? 'color: #FFFFFF !important;' : '' }}">chevron_right</span>
            </a>

            <!-- Wishlist -->
            @if(core()->getConfigData('customer.settings.wishlist.wishlist_option'))
                <a
                    href="{{ route('shop.customers.account.wishlist.index') }}"
                    class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs uppercase tracking-wider font-semibold transition-all {{ request()->routeIs('shop.customers.account.wishlist*') ? 'shadow-sm' : 'text-[#111111] hover:bg-[#EADFCF]/50 hover:text-[#0F4D2E]' }}"
                    style="{{ request()->routeIs('shop.customers.account.wishlist*') ? 'background-color: #0F4D2E !important; color: #FFFFFF !important;' : '' }}"
                >
                    <span class="flex items-center gap-2.5">
                        <span class="material-symbols-outlined text-lg" style="{{ request()->routeIs('shop.customers.account.wishlist*') ? 'color: #D4B381 !important;' : 'color: #8B6F45 !important;' }}">favorite</span>
                        <span style="{{ request()->routeIs('shop.customers.account.wishlist*') ? 'color: #FFFFFF !important;' : '' }}">Saved Wishlist</span>
                    </span>
                    <span class="material-symbols-outlined text-sm opacity-60" style="{{ request()->routeIs('shop.customers.account.wishlist*') ? 'color: #FFFFFF !important;' : '' }}">chevron_right</span>
                </a>
            @endif

            <!-- Reviews -->
            <a
                href="{{ route('shop.customers.account.reviews.index') }}"
                class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs uppercase tracking-wider font-semibold transition-all {{ request()->routeIs('shop.customers.account.reviews*') ? 'shadow-sm' : 'text-[#111111] hover:bg-[#EADFCF]/50 hover:text-[#0F4D2E]' }}"
                style="{{ request()->routeIs('shop.customers.account.reviews*') ? 'background-color: #0F4D2E !important; color: #FFFFFF !important;' : '' }}"
            >
                <span class="flex items-center gap-2.5">
                    <span class="material-symbols-outlined text-lg" style="{{ request()->routeIs('shop.customers.account.reviews*') ? 'color: #D4B381 !important;' : 'color: #8B6F45 !important;' }}">star</span>
                    <span style="{{ request()->routeIs('shop.customers.account.reviews*') ? 'color: #FFFFFF !important;' : '' }}">Product Reviews</span>
                </span>
                <span class="material-symbols-outlined text-sm opacity-60" style="{{ request()->routeIs('shop.customers.account.reviews*') ? 'color: #FFFFFF !important;' : '' }}">chevron_right</span>
            </a>
        </nav>

        <!-- Logout Action -->
        <div class="pt-4 border-t border-[#DCD3C3]/60">
            <form
                method="POST"
                action="{{ route('shop.customer.session.destroy') }}"
                id="customerLogoutNav"
            >
                @method('DELETE')
                @csrf

                <button
                    type="submit"
                    class="w-full h-10 rounded-xl border border-[#DCD3C3] text-xs uppercase tracking-widest font-semibold text-[#111111] hover:bg-red-50 hover:text-red-700 hover:border-red-200 transition-colors flex items-center justify-center gap-2"
                >
                    <span class="material-symbols-outlined text-base">logout</span>
                    <span>@lang('shop::app.components.layouts.header.desktop.bottom.logout')</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Certified Facility Assurance Badge -->
    <div class="rounded-xl border border-[#DCD3C3]/70 bg-[#F7F5EE] p-4 text-[11px] text-[#666666] leading-relaxed space-y-1">
        <div class="flex items-center gap-1.5 text-[#0F4D2E] font-bold text-xs uppercase tracking-wider">
            <span class="material-symbols-outlined text-sm">verified</span>
            <span>MAN AGRO FOODS</span>
        </div>
        <p class="text-[11px]">Certified processing unit. 100% whole-plant purity guarantee.</p>
    </div>
</div>
