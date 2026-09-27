{!! view_render_event('bagisto.shop.layout.features.before') !!}

{{-- ── Navanidhi Naturals Brand Standards & Pre-Footer Showcase ─────────── --}}
<section 
    class="relative w-full py-16 lg:py-24 text-white bg-transparent" 
    style="background: transparent !important;"
    aria-label="Navanidhi Naturals Purity Promise"
>
    <div class="site-container relative z-10">
        {{-- Frosted Botanical Glass Card Wrapper with Corner Radius --}}
        <div 
            class="rounded-[32px] p-8 sm:p-12 lg:p-16 relative overflow-hidden"
            style="border-radius: 32px !important; background: rgba(4, 26, 14, 0.82) !important; backdrop-filter: blur(24px) !important; -webkit-backdrop-filter: blur(24px) !important; border: 1px solid rgba(255, 255, 255, 0.18) !important; box-shadow: 0 24px 60px -12px rgba(0,0,0,0.65), 0 0 35px rgba(16,185,129,0.12) !important;"
        >
            {{-- Subtle Inner Ambient Glow --}}
            <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[500px] h-[250px] bg-emerald-500/15 rounded-full blur-3xl pointer-events-none"></div>

            <div class="max-w-3xl mx-auto text-center space-y-6 relative z-10">
                {{-- Eyebrow Pill --}}
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-500/15 border border-emerald-400/30 text-emerald-300 text-xs font-bold uppercase tracking-widest nv-pulse-glow">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                    <span>MAN AGRO FOODS &bull; REGENERATIVE PURITY</span>
                </div>

                {{-- Display Headline --}}
                <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-tight">
                    Pure Farm Spices &amp; Living Nutrition. <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-300 via-[#E6C687] to-emerald-200">
                        Reclaim Your Kitchen's Vitality.
                    </span>
                </h2>

                {{-- Description Copy --}}
                <p class="text-sm sm:text-base text-emerald-100/80 max-w-2xl mx-auto leading-relaxed font-normal">
                    Cultivated directly with smallholder Indian farming families in Guntur, Byadgi, and Meghalaya. Naturally sun-cured, slow stone-milled under 42&deg;C, and laboratory-verified free from carcinogenic Sudan dyes, lead chromate, and adulterating fillers.
                </p>

                {{-- Action Buttons --}}
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
                    <a
                        href="{{ url('/spices') }}"
                        class="btn-emerald-primary text-xs font-bold uppercase tracking-widest px-8 py-4 rounded-full shadow-lg"
                    >
                        <span>Shop Heritage Spices</span>
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>

                    <a
                        href="{{ route('shop.cms.page', 'quality') }}"
                        class="inline-flex items-center gap-2 px-8 py-4 rounded-full text-xs font-bold uppercase tracking-widest text-emerald-200 border border-white/20 bg-white/5 hover:bg-white/10 hover:border-emerald-400 transition-all duration-300"
                    >
                        <svg class="w-4 h-4 text-[#D4A359]" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd"/></svg>
                        <span>Our Quality Guarantee</span>
                    </a>
                </div>

                {{-- Trust Pillars Ribbon --}}
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-10 border-t border-white/10 text-left">
                    <div class="flex items-center gap-3 p-3.5 rounded-2xl border" style="border-radius: 16px !important; background: rgba(255, 255, 255, 0.05) !important; border: 1px solid rgba(255, 255, 255, 0.12) !important;">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500/20 text-emerald-300 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-xl">agriculture</span>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-white uppercase tracking-wider">Farm-Direct</p>
                            <p class="text-[11px] text-emerald-200/70">100% Traceable</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 p-3.5 rounded-2xl border" style="border-radius: 16px !important; background: rgba(255, 255, 255, 0.05) !important; border: 1px solid rgba(255, 255, 255, 0.12) !important;">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500/20 text-emerald-300 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-xl">ac_unit</span>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-white uppercase tracking-wider">Milled &lt; 42&deg;C</p>
                            <p class="text-[11px] text-emerald-200/70">Preserves Oils</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 p-3.5 rounded-2xl border" style="border-radius: 16px !important; background: rgba(255, 255, 255, 0.05) !important; border: 1px solid rgba(255, 255, 255, 0.12) !important;">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500/20 text-emerald-300 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-xl">block</span>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-white uppercase tracking-wider">Zero Dyes</p>
                            <p class="text-[11px] text-emerald-200/70">No Sudan / Lead</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 p-3.5 rounded-2xl border" style="border-radius: 16px !important; background: rgba(255, 255, 255, 0.05) !important; border: 1px solid rgba(255, 255, 255, 0.12) !important;">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500/20 text-emerald-300 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-xl">verified</span>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-white uppercase tracking-wider">Lab Verified</p>
                            <p class="text-[11px] text-emerald-200/70">NABL Accredited</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

{!! view_render_event('bagisto.shop.layout.features.after') !!}