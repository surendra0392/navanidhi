{!! view_render_event('bagisto.shop.layout.footer.before') !!}

@inject('themeCustomizationRepository', 'Webkul\Theme\Repositories\ThemeCustomizationRepository')

@php
    $channel = core()->getCurrentChannel();
    $logoConfig = core()->getConfigData('general.design.admin_logo.logo_image');
    $logoUrl = $channel->logo_url ?: ($logoConfig ? \Illuminate\Support\Facades\Storage::url($logoConfig) : null);

    $copyrightContent = core()->getConfigData('general.content.footer.copyright_content')
        ?: '&copy; ' . date('Y') . ' Navanidhi Naturals &bull; Manufactured & Marketed by MAN Agro Foods. All rights reserved.';

    $customization = $themeCustomizationRepository->findOneWhere([
        'type'       => 'footer_links',
        'status'     => 1,
        'channel_id' => $channel->id,
    ]);

    $socialLinks = $customization ? ($customization->options['social_links'] ?? []) : [];
    $instagramUrl = ! empty($socialLinks['instagram']) ? $socialLinks['instagram'] : 'https://instagram.com/navanidhinaturals';
    $facebookUrl = ! empty($socialLinks['facebook']) ? $socialLinks['facebook'] : 'https://facebook.com/navanidhinaturals';
@endphp

<!-- AXOLYT-BENCHMARKED FLOATING FROSTED GLASS FOOTER -->
<footer class="w-full bg-transparent pt-6 pb-12 sm:pb-16 relative z-10" aria-label="Site Footer">
    <div class="site-container">
        <div class="nv-glass-card rounded-[32px] p-8 sm:p-12 lg:p-14 border border-white/20 bg-white/[0.06] backdrop-blur-2xl shadow-[0_30px_70px_rgba(0,0,0,0.6)] text-white" style="border-radius: 32px !important;">
            
            <!-- Top Axolyt-Benchmark Row: Brand & Socials + "Stay In The Loop" Newsletter -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center" style="padding-bottom: 36px !important; border-bottom: 1px solid rgba(255, 255, 255, 0.12) !important;">
                
                <!-- Left: Logo & Social Media Icons -->
                <div class="lg:col-span-5 space-y-5">
                    <a href="{{ route('shop.home.index') }}" class="inline-flex items-center gap-3.5 group">
                        <div class="w-12 h-12 rounded-2xl bg-white/10 border border-white/15 flex items-center justify-center text-[#D4A359] group-hover:scale-105 group-hover:border-[#D4A359]/40 transition-all shadow-md">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 4H8V20H5V4Z" fill="#FFFFFF"/>
                                <path d="M8 4L16 16V20L8 8V4Z" fill="#FFFFFF"/>
                                <path d="M16 4H19V20H16V4Z" fill="#FFFFFF"/>
                                <path d="M13.5 5C13.5 5 17 4 18 8C19 12 16 14 16 14C16 14 17 10 14.5 9C12 8 13.5 5 13.5 5Z" fill="#D4A359"/>
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-serif text-2xl lg:text-3xl font-extrabold tracking-tight text-white leading-none">
                                NAVANIDHI
                            </span>
                            <span class="text-[10px] tracking-[0.3em] uppercase text-[#D4A359] font-sans font-bold mt-1">
                                Naturals &bull; MAN Agro Foods
                            </span>
                        </div>
                    </a>

                    <p class="text-xs leading-relaxed text-emerald-100/75 max-w-sm">
                        Pure single-origin farm spices & living cold-milled botanicals. Zero Sudan dyes, zero lead chromate, zero chemical fillers.
                    </p>

                    <!-- Round Frosted Social Icon Buttons (Only Instagram & Facebook as configured in Admin) -->
                    <div class="flex items-center gap-3 pt-1">
                        @if ($instagramUrl)
                            <a href="{{ $instagramUrl }}" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-white/10 border border-white/15 flex items-center justify-center text-white hover:bg-emerald-500/30 hover:border-emerald-400 hover:text-emerald-300 hover:-translate-y-1 transition-all" aria-label="Instagram">
                                <svg class="w-4 h-4 fill-currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </a>
                        @endif

                        @if ($facebookUrl)
                            <a href="{{ $facebookUrl }}" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-white/10 border border-white/15 flex items-center justify-center text-white hover:bg-emerald-500/30 hover:border-emerald-400 hover:text-emerald-300 hover:-translate-y-1 transition-all" aria-label="Facebook">
                                <svg class="w-4 h-4 fill-currentColor" viewBox="0 0 24 24"><path d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.374 14.5 5 15.688 5H18V0h-3.882C10.5 0 9 1.583 9 4.615V8z"/></svg>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Right: "Stay in the loop" Pill Newsletter (Clean Transparent Input) -->
                <div class="lg:col-span-7 space-y-3.5">
                    <div class="space-y-1">
                        <span class="text-xs font-bold tracking-widest uppercase text-emerald-300">
                            Stay In The Loop
                        </span>
                        <p class="text-xs sm:text-sm text-emerald-100/75 leading-relaxed">
                            Get exclusive offers, single-origin harvest updates, and pure botanical recipes delivered to your inbox.
                        </p>
                    </div>

                    <form 
                        action="{{ route('shop.subscription.store') }}" 
                        method="POST" 
                        class="flex items-center rounded-full border border-white/25 p-1.5 focus-within:border-emerald-400 w-full max-w-xl transition-all"
                        style="background: transparent !important; box-shadow: none !important;"
                    >
                        @csrf
                        <input
                            type="email"
                            name="email"
                            placeholder="Your email address"
                            class="w-full min-w-0 px-4 py-2.5 text-xs sm:text-sm text-white placeholder:text-emerald-100/50 focus:outline-none"
                            style="background: transparent !important;"
                            required
                        >
                        <button
                            type="submit"
                            class="nv-glass-btn-primary px-6 sm:px-8 py-2.5 text-xs font-bold uppercase tracking-wider text-white rounded-full shrink-0 shadow-md cursor-pointer transition-all"
                            aria-label="Subscribe"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>

            <!-- Middle Navigation Links & Statutory Grid (With generous 40px gaps above and below) -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-xs" style="padding-top: 40px !important; padding-bottom: 40px !important; border-bottom: 1px solid rgba(255, 255, 255, 0.12) !important;">
                
                <!-- Col 1: Spices & Powders -->
                <div class="space-y-3">
                    <span class="font-bold tracking-widest uppercase text-[#E6C687] block">
                        Spices &amp; Powders
                    </span>
                    <ul class="space-y-2.5 text-emerald-100/75">
                        <li><a href="{{ url('/spices') }}" class="hover:text-emerald-300 hover:translate-x-1 inline-block transition-all font-semibold text-white">Pure Farm Spices</a></li>
                        <li><a href="{{ url('/botanical-powders') }}" class="hover:text-emerald-300 hover:translate-x-1 inline-block transition-all">Botanical Herbs</a></li>
                        <li><a href="{{ url('/functional-blends') }}" class="hover:text-emerald-300 hover:translate-x-1 inline-block transition-all">Daily Blends</a></li>
                        <li><a href="{{ url('/products') }}" class="hover:text-emerald-300 hover:translate-x-1 inline-block transition-all">All Products</a></li>
                    </ul>
                </div>

                <!-- Col 2: Pure Standards -->
                <div class="space-y-3">
                    <span class="font-bold tracking-widest uppercase text-[#E6C687] block">
                        Pure Standards
                    </span>
                    <ul class="space-y-2.5 text-emerald-100/75">
                        <li><a href="{{ route('shop.cms.page', 'about-us') }}" class="hover:text-emerald-300 hover:translate-x-1 inline-block transition-all">About MAN Agro</a></li>
                        <li><a href="{{ route('shop.cms.page', 'quality') }}" class="hover:text-emerald-300 hover:translate-x-1 inline-block transition-all">Quality Promise</a></li>
                        <li><a href="{{ route('shop.recipes.index') }}" class="hover:text-emerald-300 hover:translate-x-1 inline-block transition-all">Botanical Recipes</a></li>
                        <li><a href="{{ route('shop.home.contact_us') }}" class="hover:text-emerald-300 hover:translate-x-1 inline-block transition-all">Contact Support</a></li>
                    </ul>
                </div>

                <!-- Col 3: Customer Care -->
                <div class="space-y-3">
                    <span class="font-bold tracking-widest uppercase text-[#E6C687] block">
                        Customer Care
                    </span>
                    <ul class="space-y-2.5 text-emerald-100/75">
                        <li><a href="{{ route('shop.cms.page', 'shipping-policy') }}" class="hover:text-emerald-300 hover:translate-x-1 inline-block transition-all">Shipping Policy</a></li>
                        <li><a href="{{ route('shop.cms.page', 'return-policy') }}" class="hover:text-emerald-300 hover:translate-x-1 inline-block transition-all">Returns &amp; Refunds</a></li>
                        <li><a href="{{ route('shop.cms.page', 'faq') }}" class="hover:text-emerald-300 hover:translate-x-1 inline-block transition-all">FAQ &amp; Help Center</a></li>
                        <li><a href="mailto:care@navanidhinaturals.com" class="hover:text-emerald-300 hover:translate-x-1 inline-block transition-all">care@navanidhinaturals.com</a></li>
                    </ul>
                </div>

                <!-- Col 4: Statutory Manufacturer Declaration -->
                <div class="space-y-3 col-span-2 md:col-span-1">
                    <span class="font-bold tracking-widest uppercase text-[#E6C687] block">
                        Manufacturer
                    </span>
                    <div class="p-3.5 rounded-xl bg-white/[0.04] border border-white/10 text-[11px] leading-relaxed text-emerald-100/80 space-y-1">
                        <div>Packed by: <strong class="text-white">MAN AGRO FOODS</strong></div>
                        <div class="text-white/60">Industrial Processing Unit, India.</div>
                        <div class="text-emerald-300 font-mono text-[10px] pt-1 border-t border-white/10">
                            FSSAI Lic: 10020042001234 &bull; 100% Veg
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Row: Copyright & Legal Links -->
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] text-white/50" style="padding-top: 32px !important;">
                <div>
                    {!! $copyrightContent !!}
                </div>

                <div class="flex flex-wrap items-center gap-3 sm:gap-4 text-[11px]">
                    <a href="{{ route('shop.cms.page', 'privacy-policy') }}" class="hover:text-white transition-colors">Privacy Policy</a>
                    <span>&bull;</span>
                    <a href="{{ route('shop.cms.page', 'terms-conditions') }}" class="hover:text-white transition-colors">Terms of Sale</a>
                    <span>&bull;</span>
                    <a href="{{ route('shop.cms.page', 'terms-of-use') }}" class="hover:text-white transition-colors">Terms of Service</a>
                    <span>&bull;</span>
                    <a href="{{ route('shop.cms.page', 'shipping-policy') }}" class="hover:text-white transition-colors">Shipping &amp; Returns</a>
                </div>
            </div>

        </div>
    </div>
</footer>

{!! view_render_event('bagisto.shop.layout.footer.after') !!}
