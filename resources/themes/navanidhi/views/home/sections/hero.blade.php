<!-- SECTION 1: AXOLYT-BENCHMARKED LUXURY WATERFALL BOTANICAL HERO WITH 3D ANIMATED NATURE BACKGROUND -->
<section 
    id="hero-stage"
    class="relative w-full overflow-hidden min-h-[92vh] flex flex-col justify-center pb-14 sm:pb-20 text-white"
    aria-label="Navanidhi Naturals Hero Spotlight"
    style="margin-top: -93px; padding-top: 130px; background-color: transparent !important;"
>
    {{-- Subtle Top Vignette for Contrast under Header --}}
    <div style="position: absolute; top: 0; left: 0; right: 0; height: 180px; background: linear-gradient(to bottom, rgba(4, 26, 14, 0.65), transparent); pointer-events-none; z-index: 2;" aria-hidden="true"></div>
    <div style="position: absolute; top: 0; bottom: 0; left: 0; width: 45%; background: linear-gradient(to right, rgba(4, 26, 14, 0.45), transparent); pointer-events-none; z-index: 2;" aria-hidden="true"></div>

    {{-- Radiant Sunbeam & Botanical Atmosphere Glows --}}
    <div class="absolute top-1/4 left-1/3 w-[450px] h-[450px] bg-emerald-400/15 rounded-full blur-[130px] pointer-events-none" style="z-index: 2;" aria-hidden="true"></div>
    <div class="absolute top-1/3 right-1/4 w-[400px] h-[400px] bg-[#D4A359]/20 rounded-full blur-[140px] pointer-events-none" style="z-index: 2;" aria-hidden="true"></div>

    <div class="site-container relative w-full" style="z-index: 10;">
        {{-- Main Hero 2-Column Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 xl:gap-16 items-center">
            
            {{-- Left Column: Translucent Frosted Glass Card (Image 2 Axolyt Benchmark) --}}
            <div class="lg:col-span-7">
                <div 
                    class="nv-glass-card p-6 sm:p-9 lg:p-12 space-y-6 sm:space-y-7 shadow-[0_30px_70px_rgba(0,0,0,0.65)]"
                    style="border-radius: 32px; background: rgba(4, 26, 14, 0.72) !important; backdrop-filter: blur(24px) !important; -webkit-backdrop-filter: blur(24px) !important; border: 1px solid rgba(255, 255, 255, 0.22) !important;"
                >
                    
                    {{-- Eyebrow Pill --}}
                    <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-emerald-500/20 border border-emerald-400/40 shadow-xs nv-pulse-glow">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                        <span class="text-[11px] font-extrabold uppercase tracking-widest text-emerald-300">
                            MAN AGRO FOODS &bull; 100% FARM PURE &bull; ZERO DYES
                        </span>
                    </div>

                    {{-- Commanding Display Headline --}}
                    <h1 class="font-serif text-3xl sm:text-5xl lg:text-[46px] xl:text-[54px] font-black uppercase tracking-tight text-white leading-[1.08]">
                        NATURE. <br>
                        PURITY. <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-[#E6C687] to-emerald-300">
                            ELEVATED.
                        </span>
                    </h1>

                    {{-- Brand Description Narrative --}}
                    <p class="text-xs sm:text-sm lg:text-[15px] leading-relaxed text-emerald-100/90 max-w-xl font-normal">
                        Authentic single-origin Indian spices and living botanical whole foods crafted by <strong class="text-white font-semibold">MAN AGRO FOODS</strong>. Sun-cured, stone-milled under 42°C, and strictly free from chemical food dyes, sawdust fillers, and artificial additives.
                    </p>

                    {{-- 3 Frosted Feature Badges in a Horizontal Row --}}
                    <div class="grid grid-cols-3 gap-2.5 sm:gap-4 pt-2">
                        <div class="flex flex-col items-center text-center p-3 sm:p-3.5 rounded-2xl bg-white/[0.06] border border-white/15 hover:border-emerald-400/50 transition-colors">
                            <span class="material-symbols-outlined text-emerald-400 text-xl sm:text-2xl mb-1">eco</span>
                            <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-white">100% Farm Pure</span>
                            <span class="text-[9px] text-emerald-200/70 hidden sm:inline">Zero Adulteration</span>
                        </div>

                        <div class="flex flex-col items-center text-center p-3 sm:p-3.5 rounded-2xl bg-white/[0.06] border border-white/15 hover:border-emerald-400/50 transition-colors">
                            <span class="material-symbols-outlined text-emerald-400 text-xl sm:text-2xl mb-1">ac_unit</span>
                            <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-white">Milled &lt; 42&deg;C</span>
                            <span class="text-[9px] text-emerald-200/70 hidden sm:inline">Living Enzymes</span>
                        </div>

                        <div class="flex flex-col items-center text-center p-3 sm:p-3.5 rounded-2xl bg-white/[0.06] border border-white/15 hover:border-emerald-400/50 transition-colors">
                            <span class="material-symbols-outlined text-emerald-400 text-xl sm:text-2xl mb-1">shield_check</span>
                            <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-white">No Dyes Ever</span>
                            <span class="text-[9px] text-emerald-200/70 hidden sm:inline">Sudan Dye Free</span>
                        </div>
                    </div>

                    {{-- Action CTA Buttons --}}
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3.5 pt-2">
                        <a 
                            href="{{ url('/spices') }}" 
                            class="nv-glass-btn-primary px-8 py-3.5 sm:py-4 text-xs font-bold uppercase tracking-widest shadow-xl text-center group"
                        >
                            <span>Shop Pure Spices</span>
                            <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>

                        <a 
                            href="{{ url('/products') }}" 
                            class="nv-glass-btn-outline px-6 py-3.5 sm:py-4 text-xs font-bold uppercase tracking-widest text-center"
                        >
                            <span>All Products</span>
                            <svg class="w-4 h-4 text-[#D4A359]" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd"/></svg>
                        </a>
                    </div>

                </div>
            </div>

            {{-- Right Column: User's Real Authentic Farm Spice Showcase Stage (Strictly NO Cans!) --}}
            <div class="lg:col-span-5 relative flex items-center justify-center">
                <div class="relative w-full max-w-[440px] mx-auto">
                    
                    {{-- Ambient Back-Glow Behind Product Stage --}}
                    <div class="absolute -inset-6 bg-gradient-to-tr from-emerald-500/35 via-[#D4A359]/30 to-emerald-400/30 rounded-[40px] blur-2xl pointer-events-none"></div>

                    {{-- Visual Container with Translucent Frosted Glass Border --}}
                    <div 
                        class="relative w-full aspect-square group"
                        style="border-radius: 32px; overflow: hidden; border: 1.5px solid rgba(255, 255, 255, 0.28); background: rgba(4, 26, 14, 0.45); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); box-shadow: 0 30px 70px rgba(0,0,0,0.65), 0 0 35px rgba(34, 197, 94, 0.25);"
                    >
                        <img 
                            src="{{ asset('images/backgrounds/navanidhi_hero_product.jpg') }}" 
                            alt="Navanidhi Pure Sun-Dried Farm Red Chilli Powder in Traditional Ceramic Bowl" 
                            class="w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-105"
                            fetchpriority="high"
                            loading="eager"
                            onerror="this.onerror=null; this.src='{{ asset('images/products/navanidhi-red-chilli-powder.jpg') }}';"
                        />

                        {{-- Delicate Gradient Overlay --}}
                        <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(4, 26, 14, 0.9) 0%, transparent 45%, rgba(0, 0, 0, 0.25) 100%); pointer-events-none;"></div>
                        
                        {{-- Top-Left Floating Badge: Single-Origin --}}
                        <div style="position: absolute; top: 16px; left: 16px; z-index: 10; background: rgba(4, 26, 14, 0.88); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.25); border-radius: 12px; padding: 6px 12px; display: flex; align-items: center; gap: 6px; box-shadow: 0 4px 12px rgba(0,0,0,0.4);">
                            <span class="material-symbols-outlined text-emerald-400 text-sm">verified</span>
                            <span class="text-[10px] sm:text-[11px] font-bold text-white uppercase tracking-wider">Single-Origin Farm</span>
                        </div>

                        {{-- Top-Right Floating Badge: Rating --}}
                        <div style="position: absolute; top: 16px; right: 16px; z-index: 10; background: rgba(4, 26, 14, 0.88); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.25); border-radius: 12px; padding: 6px 12px; display: flex; align-items: center; gap: 4px; box-shadow: 0 4px 12px rgba(0,0,0,0.4);" class="text-[#D4A359] text-xs font-bold">
                            <span>★ 4.9</span>
                            <span class="text-[10px] text-white/80 font-normal">NABL</span>
                        </div>

                        {{-- Bottom Floating Product Pill Badge --}}
                        <div style="position: absolute; bottom: 16px; left: 16px; right: 16px; z-index: 10; background: rgba(4, 26, 14, 0.88); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); border: 1px solid rgba(255, 255, 255, 0.25); border-radius: 16px; padding: 10px 14px; display: flex; align-items: center; justify-content: space-between; gap: 8px; box-shadow: 0 8px 24px rgba(0,0,0,0.5);">
                            <div class="min-w-0 flex-1">
                                <p class="text-xs sm:text-[13px] font-bold text-white truncate">Guntur Sannam Red Chilli</p>
                                <p class="text-[10px] sm:text-[11px] text-emerald-200/85 font-medium truncate">Sun-Dried &bull; Zero Sudan Dyes</p>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-wider shrink-0 bg-emerald-600 text-white shadow-xs">
                                100% Pure
                            </span>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        {{-- Floating Trust Ribbon (Image 2 Axolyt Benchmark) --}}
        <div class="mt-12 sm:mt-16">
            <div class="nv-glass-ribbon px-5 sm:px-8 py-3.5 sm:py-4 max-w-5xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-4 items-center text-center" style="background: rgba(4, 26, 14, 0.75); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); border: 1px solid rgba(255, 255, 255, 0.22); border-radius: 9999px;">
                <div class="flex items-center justify-center gap-2.5">
                    <span class="material-symbols-outlined text-emerald-400 text-xl shrink-0">eco</span>
                    <span class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-white">Plant-Based Purity</span>
                </div>

                <div class="flex items-center justify-center gap-2.5">
                    <span class="material-symbols-outlined text-emerald-400 text-xl shrink-0">public</span>
                    <span class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-white">Sustainably Sourced</span>
                </div>

                <div class="flex items-center justify-center gap-2.5">
                    <span class="material-symbols-outlined text-emerald-400 text-xl shrink-0">ac_unit</span>
                    <span class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-white">Cold Milled &lt; 42&deg;C</span>
                </div>

                <div class="flex items-center justify-center gap-2.5">
                    <span class="material-symbols-outlined text-emerald-400 text-xl shrink-0">verified</span>
                    <span class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-white">NABL Lab Certified</span>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- GPU-Accelerated 3D Nature Mist, Pollen & Parallax Particle Engine --}}

