@php
    $customer = auth()->guard('customer')->user();
@endphp

<div class="w-full lg:w-[300px] xl:w-[320px] shrink-0 space-y-6">
    <!-- Account Profile Card -->
    <div class="rounded-3xl border border-[#0D5C3A]/12 bg-white p-5 sm:p-6 shadow-xs space-y-5">
        <div class="flex items-center gap-3.5 pb-4 border-b border-[#0D5C3A]/10">
            <div class="shrink-0 w-12 h-12 rounded-full bg-[#0D5C3A] text-[#D4A359] flex items-center justify-center font-serif font-bold text-lg shadow-sm">
                {{ strtoupper(substr($customer->first_name ?? 'N', 0, 1)) }}
            </div>

            <div class="min-w-0" v-pre>
                <div class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-[#0D5C3A]/10 text-[#0D5C3A] text-[10px] font-bold tracking-wider uppercase border border-[#0D5C3A]/20">
                    <span class="material-symbols-outlined text-[13px] leading-none">eco</span>
                    <span>Navanidhi Member</span>
                </div>
                <h3 class="font-serif text-base font-bold text-[#111827] truncate mt-1">
                    {{ $customer->first_name }} {{ $customer->last_name }}
                </h3>
                <p class="text-xs text-[#6B7280] truncate">
                    {{ $customer->email }}
                </p>
            </div>
        </div>

        <!-- Navigation Links -->
        <nav class="space-y-1" aria-label="Customer Account Menu">
            <!-- Dashboard -->
            <a
                href="{{ route('shop.customers.account.index') }}"
                class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs uppercase tracking-wider font-bold transition-all {{ request()->routeIs('shop.customers.account.index') ? 'shadow-sm' : 'text-[#111827] hover:bg-[#0D5C3A]/5 hover:text-[#0D5C3A]' }}"
                style="{{ request()->routeIs('shop.customers.account.index') ? 'background: linear-gradient(135deg, #0D5C3A 0%, #062E1A 100%) !important; color: #FFFFFF !important;' : '' }}"
            >
                <span class="flex items-center gap-2.5">
                    <span class="material-symbols-outlined text-lg" style="{{ request()->routeIs('shop.customers.account.index') ? 'color: #D4A359 !important;' : 'color: #0D5C3A !important;' }}">grid_view</span>
                    <span style="{{ request()->routeIs('shop.customers.account.index') ? 'color: #FFFFFF !important;' : '' }}">Dashboard</span>
                </span>
                <span class="material-symbols-outlined text-sm opacity-60" style="{{ request()->routeIs('shop.customers.account.index') ? 'color: #FFFFFF !important;' : '' }}">chevron_right</span>
            </a>

            <!-- Orders -->
            <a
                href="{{ route('shop.customers.account.orders.index') }}"
                class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs uppercase tracking-wider font-bold transition-all {{ request()->routeIs('shop.customers.account.orders*') ? 'shadow-sm' : 'text-[#111827] hover:bg-[#0D5C3A]/5 hover:text-[#0D5C3A]' }}"
                style="{{ request()->routeIs('shop.customers.account.orders*') ? 'background: linear-gradient(135deg, #0D5C3A 0%, #062E1A 100%) !important; color: #FFFFFF !important;' : '' }}"
            >
                <span class="flex items-center gap-2.5">
                    <span class="material-symbols-outlined text-lg" style="{{ request()->routeIs('shop.customers.account.orders*') ? 'color: #D4A359 !important;' : 'color: #0D5C3A !important;' }}">shopping_bag</span>
                    <span style="{{ request()->routeIs('shop.customers.account.orders*') ? 'color: #FFFFFF !important;' : '' }}">Orders & Fulfillment</span>
                </span>
                <span class="material-symbols-outlined text-sm opacity-60" style="{{ request()->routeIs('shop.customers.account.orders*') ? 'color: #FFFFFF !important;' : '' }}">chevron_right</span>
            </a>

            <!-- Addresses -->
            <a
                href="{{ route('shop.customers.account.addresses.index') }}"
                class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs uppercase tracking-wider font-bold transition-all {{ request()->routeIs('shop.customers.account.addresses*') ? 'shadow-sm' : 'text-[#111827] hover:bg-[#0D5C3A]/5 hover:text-[#0D5C3A]' }}"
                style="{{ request()->routeIs('shop.customers.account.addresses*') ? 'background: linear-gradient(135deg, #0D5C3A 0%, #062E1A 100%) !important; color: #FFFFFF !important;' : '' }}"
            >
                <span class="flex items-center gap-2.5">
                    <span class="material-symbols-outlined text-lg" style="{{ request()->routeIs('shop.customers.account.addresses*') ? 'color: #D4A359 !important;' : 'color: #0D5C3A !important;' }}">location_on</span>
                    <span style="{{ request()->routeIs('shop.customers.account.addresses*') ? 'color: #FFFFFF !important;' : '' }}">Address Book</span>
                </span>
                <span class="material-symbols-outlined text-sm opacity-60" style="{{ request()->routeIs('shop.customers.account.addresses*') ? 'color: #FFFFFF !important;' : '' }}">chevron_right</span>
            </a>

            <!-- Profile & Security -->
            <a
                href="{{ route('shop.customers.account.profile.index') }}"
                class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs uppercase tracking-wider font-bold transition-all {{ request()->routeIs('shop.customers.account.profile*') ? 'shadow-sm' : 'text-[#111827] hover:bg-[#0D5C3A]/5 hover:text-[#0D5C3A]' }}"
                style="{{ request()->routeIs('shop.customers.account.profile*') ? 'background: linear-gradient(135deg, #0D5C3A 0%, #062E1A 100%) !important; color: #FFFFFF !important;' : '' }}"
            >
                <span class="flex items-center gap-2.5">
                    <span class="material-symbols-outlined text-lg" style="{{ request()->routeIs('shop.customers.account.profile*') ? 'color: #D4A359 !important;' : 'color: #0D5C3A !important;' }}">manage_accounts</span>
                    <span style="{{ request()->routeIs('shop.customers.account.profile*') ? 'color: #FFFFFF !important;' : '' }}">Profile & Security</span>
                </span>
                <span class="material-symbols-outlined text-sm opacity-60" style="{{ request()->routeIs('shop.customers.account.profile*') ? 'color: #FFFFFF !important;' : '' }}">chevron_right</span>
            </a>

            <!-- Wishlist -->
            @if(core()->getConfigData('customer.settings.wishlist.wishlist_option'))
                <a
                    href="{{ route('shop.customers.account.wishlist.index') }}"
                    class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs uppercase tracking-wider font-bold transition-all {{ request()->routeIs('shop.customers.account.wishlist*') ? 'shadow-sm' : 'text-[#111827] hover:bg-[#0D5C3A]/5 hover:text-[#0D5C3A]' }}"
                    style="{{ request()->routeIs('shop.customers.account.wishlist*') ? 'background: linear-gradient(135deg, #0D5C3A 0%, #062E1A 100%) !important; color: #FFFFFF !important;' : '' }}"
                >
                    <span class="flex items-center gap-2.5">
                        <span class="material-symbols-outlined text-lg" style="{{ request()->routeIs('shop.customers.account.wishlist*') ? 'color: #D4A359 !important;' : 'color: #0D5C3A !important;' }}">favorite</span>
                        <span style="{{ request()->routeIs('shop.customers.account.wishlist*') ? 'color: #FFFFFF !important;' : '' }}">Saved Wishlist</span>
                    </span>
                    <span class="material-symbols-outlined text-sm opacity-60" style="{{ request()->routeIs('shop.customers.account.wishlist*') ? 'color: #FFFFFF !important;' : '' }}">chevron_right</span>
                </a>
            @endif

            <!-- Reviews -->
            <a
                href="{{ route('shop.customers.account.reviews.index') }}"
                class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs uppercase tracking-wider font-bold transition-all {{ request()->routeIs('shop.customers.account.reviews*') ? 'shadow-sm' : 'text-[#111827] hover:bg-[#0D5C3A]/5 hover:text-[#0D5C3A]' }}"
                style="{{ request()->routeIs('shop.customers.account.reviews*') ? 'background: linear-gradient(135deg, #0D5C3A 0%, #062E1A 100%) !important; color: #FFFFFF !important;' : '' }}"
            >
                <span class="flex items-center gap-2.5">
                    <span class="material-symbols-outlined text-lg" style="{{ request()->routeIs('shop.customers.account.reviews*') ? 'color: #D4A359 !important;' : 'color: #0D5C3A !important;' }}">star</span>
                    <span style="{{ request()->routeIs('shop.customers.account.reviews*') ? 'color: #FFFFFF !important;' : '' }}">Product Reviews</span>
                </span>
                <span class="material-symbols-outlined text-sm opacity-60" style="{{ request()->routeIs('shop.customers.account.reviews*') ? 'color: #FFFFFF !important;' : '' }}">chevron_right</span>
            </a>
        </nav>

        <!-- Logout Action -->
        <div class="pt-4 border-t border-[#0D5C3A]/10">
            <form
                method="POST"
                action="{{ route('shop.customer.session.destroy') }}"
                id="customerLogoutNav"
            >
                @method('DELETE')
                @csrf

                <button
                    type="submit"
                    class="w-full h-10 rounded-xl border border-[#0D5C3A]/20 text-xs uppercase tracking-widest font-bold text-[#111827] hover:bg-red-50 hover:text-red-700 hover:border-red-200 transition-colors flex items-center justify-center gap-2 cursor-pointer"
                >
                    <span class="material-symbols-outlined text-base">logout</span>
                    <span>@lang('shop::app.components.layouts.header.desktop.bottom.logout')</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Certified Facility Assurance Badge -->
    <div class="rounded-2xl border border-[#0D5C3A]/12 bg-white p-4 text-[11px] text-[#6B7280] leading-relaxed space-y-1 shadow-2xs">
        <div class="flex items-center gap-1.5 text-[#0D5C3A] font-bold text-xs uppercase tracking-wider">
            <span class="material-symbols-outlined text-sm">verified</span>
            <span>MAN AGRO FOODS</span>
        </div>
        <p class="text-[11px]">Certified processing unit. 100% whole-plant purity guarantee.</p>
    </div>
</div>
