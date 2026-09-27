<!-- SECTION: AS SEEN IN / PRESS & CERTIFICATIONS MARQUEE -->
<section class="py-12 lg:py-16 bg-transparent border-b border-white/10 overflow-hidden text-white" aria-label="Certifications and trust badges">
    <div class="site-container">
        <div class="text-center mb-8">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-500/15 border border-emerald-400/30 text-emerald-300 nv-pulse-glow">
                <span class="material-symbols-outlined text-xs text-emerald-400">verified</span>
                Verified Purity Standards &bull; MAN Agro Foods
            </span>
        </div>
    </div>

    {{-- Scrolling Marquee in Frosted Ribbon --}}
    <div class="relative w-full overflow-hidden mask-gradient-x py-3">
        <div class="flex animate-marquee whitespace-nowrap py-2">
            @for ($i = 0; $i < 2; $i++)
                <div class="flex items-center gap-16 px-8">
                    <span class="flex items-center gap-3 text-white/90 hover:text-emerald-300 transition-colors">
                        <span class="w-8 h-8 rounded-full bg-emerald-500/20 border border-emerald-400/40 flex items-center justify-center text-emerald-300">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                        </span>
                        <span class="font-serif text-lg font-bold tracking-wide">FSSAI Certified</span>
                    </span>

                    <span class="flex items-center gap-3 text-white/90 hover:text-emerald-300 transition-colors">
                        <span class="w-8 h-8 rounded-full bg-emerald-500/20 border border-emerald-400/40 flex items-center justify-center text-emerald-300">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 2v20M2 12h20M4.93 4.93l14.14 14.14M4.93 19.07l14.14-14.14"/></svg>
                        </span>
                        <span class="font-serif text-lg font-bold tracking-wide">100% Pure Farm Spices</span>
                    </span>

                    <span class="flex items-center gap-3 text-white/90 hover:text-emerald-300 transition-colors">
                        <span class="w-8 h-8 rounded-full bg-emerald-500/20 border border-emerald-400/40 flex items-center justify-center text-emerald-300">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><path d="m4.93 4.93 14.14 14.14"/></svg>
                        </span>
                        <span class="font-serif text-lg font-bold tracking-wide">Zero Sudan Dyes</span>
                    </span>

                    <span class="flex items-center gap-3 text-white/90 hover:text-emerald-300 transition-colors">
                        <span class="w-8 h-8 rounded-full bg-emerald-500/20 border border-emerald-400/40 flex items-center justify-center text-emerald-300">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
                        </span>
                        <span class="font-serif text-lg font-bold tracking-wide">Zero Lead Chromate</span>
                    </span>

                    <span class="flex items-center gap-3 text-white/90 hover:text-emerald-300 transition-colors">
                        <span class="w-8 h-8 rounded-full bg-emerald-500/20 border border-emerald-400/40 flex items-center justify-center text-emerald-300">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
                        </span>
                        <span class="font-serif text-lg font-bold tracking-wide">Cold-Milled &lt; 42°C</span>
                    </span>

                    <span class="flex items-center gap-3 text-white/90 hover:text-emerald-300 transition-colors">
                        <span class="w-8 h-8 rounded-full bg-emerald-500/20 border border-emerald-400/40 flex items-center justify-center text-emerald-300">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/></svg>
                        </span>
                        <span class="font-serif text-lg font-bold tracking-wide">Direct from Indian Farms</span>
                    </span>
                </div>
            @endfor
        </div>
    </div>
</section>
