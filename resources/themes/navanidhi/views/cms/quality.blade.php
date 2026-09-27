<div class="min-h-screen text-white bg-transparent" style="padding-bottom: 5rem !important;">
    @if (core()->getConfigData('general.general.breadcrumbs.shop'))
        <!-- Breadcrumbs -->
        <div class="site-container pt-4 pb-2 sm:pt-6 sm:pb-3">
            <nav aria-label="Breadcrumb" class="flex items-center space-x-2 text-[11px] sm:text-xs uppercase tracking-[0.14em] text-white/60">
                <a href="{{ route('shop.home.index') }}" class="hover:text-emerald-300 transition-colors">Home</a>
                <span class="text-white/30">/</span>
                <span class="text-emerald-300 font-semibold">Quality Standard</span>
            </nav>
        </div>
    @endif

    <!-- SECTION 1: EDITORIAL HERO & QUALITY CODE -->
    <section class="site-container pt-8 pb-16 sm:pt-14 sm:pb-20 border-b border-white/10">
        <div class="max-w-4xl mx-auto text-center space-y-6">
            <!-- Brand Tagline Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-500/15 text-emerald-300 text-xs font-semibold tracking-widest uppercase border border-emerald-400/30 nv-pulse-glow">
                <svg class="w-4 h-4 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    <path d="m9 12 2 2 4-4"/>
                </svg>
                <span>Zero Adulteration &bull; 100% Pure Food Matter &bull; MAN Agro Foods</span>
            </div>

            <!-- Main Heading -->
            <h1 class="font-serif text-3xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-white leading-[1.14]">
                Scientific Verification. <br class="hidden sm:inline">
                <span class="italic text-emerald-300 font-normal">Authentic Indian Spice &amp; Botanical Integrity.</span>
            </h1>

            <!-- Subtitle -->
            <p class="text-base sm:text-lg lg:text-xl leading-relaxed text-emerald-100/80 max-w-3xl mx-auto font-sans">
                Quality is not an afterthought&mdash;it is our quantifiable protocol. From slow stone-grinding and cold dehydration below 42&deg;C to laboratory testing for Sudan dyes, lead chromate, and heavy metals, discover the uncompromised standard behind Navanidhi Naturals.
            </p>

            <!-- Hero Feature Image Card -->
            <div class="relative mt-10 overflow-hidden rounded-3xl border border-white/20 bg-black/40 shadow-2xl">
                <img
                    src="{{ asset('storage/theme/cms/navanidhi-lab-protocol.webp') }}?v={{ filemtime(public_path('storage/theme/cms/navanidhi-lab-protocol.webp')) }}"
                    alt="Navanidhi Naturals Quality Standard &amp; Lab Verification"
                    class="h-64 sm:h-96 lg:h-[460px] w-full object-cover transition-transform duration-700 hover:scale-105"
                />
                <div class="absolute inset-0 bg-gradient-to-t from-[#041a0e]/90 via-[#041a0e]/20 to-transparent"></div>
                <div class="absolute bottom-6 left-6 right-6 flex flex-col sm:flex-row sm:items-end justify-between gap-4 text-white text-left">
                    <div>
                        <span class="inline-block px-3 py-1 rounded-full bg-[#D4A359] text-[#041a0e] text-[10px] font-bold tracking-widest uppercase mb-2">
                            Clean-Label Science
                        </span>
                        <h3 class="font-serif text-xl sm:text-2xl font-bold text-white">Uncompromising Safety &amp; Potency Rigor</h3>
                        <p class="text-xs sm:text-sm text-white/80 max-w-md mt-0.5">Every agricultural lot undergoes LC-MS dye screening, HPLC active quantification &amp; ICP-MS metal testing.</p>
                    </div>
                    <div class="flex items-center gap-2 rounded-2xl bg-white/10 backdrop-blur-md px-4 py-2 border border-white/20">
                        <svg class="w-5 h-5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        <span class="text-xs font-semibold tracking-wide text-white">FSSAI Certified</span>
                    </div>
                </div>
            </div>

            <!-- 4 Trust Metrics Strip -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 sm:gap-6 pt-6 text-left">
                <div class="p-5 rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl shadow-sm hover:border-emerald-400/40 transition-all text-white">
                    <p class="font-serif text-3xl font-bold text-white">&lt; 42&deg;C</p>
                    <p class="text-xs uppercase tracking-wider text-emerald-400 font-semibold mt-1">Cold Milling</p>
                    <p class="text-[11px] text-white/70 mt-0.5">Living capsaicin, curcumin &amp; enzymes intact.</p>
                </div>

                <div class="p-5 rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl shadow-sm hover:border-emerald-400/40 transition-all text-white">
                    <p class="font-serif text-3xl font-bold text-white">0%</p>
                    <p class="text-xs uppercase tracking-wider text-emerald-400 font-semibold mt-1">Sudan Dyes</p>
                    <p class="text-[11px] text-white/70 mt-0.5">Strictly tested for zero carcinogenic dyes.</p>
                </div>

                <div class="p-5 rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl shadow-sm hover:border-emerald-400/40 transition-all text-white">
                    <p class="font-serif text-3xl font-bold text-white">0%</p>
                    <p class="text-xs uppercase tracking-wider text-emerald-400 font-semibold mt-1">Lead Chromate</p>
                    <p class="text-[11px] text-white/70 mt-0.5">Zero toxic yellow colorants or sawdust fillers.</p>
                </div>

                <div class="p-5 rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl shadow-sm hover:border-emerald-400/40 transition-all text-white">
                    <p class="font-serif text-3xl font-bold text-[#E6C687]">N₂ Flush</p>
                    <p class="text-xs uppercase tracking-wider text-emerald-400 font-semibold mt-1">Nitrogen Sealed</p>
                    <p class="text-[11px] text-white/70 mt-0.5">Hermetic seal guarding against aroma oxidation.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 2: THE 5-STAGE FARM-TO-KITCHEN QUALITY PIPELINE -->
    <section class="py-16 sm:py-24 bg-transparent border-b border-white/10">
        <div class="site-container">
            <div class="max-w-3xl mx-auto text-center space-y-4 mb-16">
                <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-emerald-300">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                    <span>Verification Protocol</span>
                </div>
                <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-white">
                    Our 5-Stage Purity Verification Protocol
                </h2>
                <p class="text-sm sm:text-base text-emerald-100/80 leading-relaxed">
                    How raw Indian agricultural harvests become 100% pure kitchen spices and bioavailable wellness powders.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                <!-- Stage 1 -->
                <div class="p-6 rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl space-y-3 hover:border-emerald-400/40 hover:bg-white/[0.1] transition-all text-white">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-500/20 text-emerald-300 font-serif font-bold text-base border border-emerald-400/30">
                        01
                    </div>
                    <h4 class="font-serif text-lg font-bold text-white">Direct Sourcing</h4>
                    <p class="text-xs text-white/70 leading-relaxed">
                        Hand-harvested at peak maturity from vetted Indian smallholders in Guntur, Byadgi, Meghalaya, and Tamil Nadu.
                    </p>
                </div>

                <!-- Stage 2 -->
                <div class="p-6 rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl space-y-3 hover:border-emerald-400/40 hover:bg-white/[0.1] transition-all text-white">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-500/20 text-emerald-300 font-serif font-bold text-base border border-emerald-400/30">
                        02
                    </div>
                    <h4 class="font-serif text-lg font-bold text-white">Thermal Control (&lt;42&deg;C)</h4>
                    <p class="text-xs text-white/70 leading-relaxed">
                        Low-temperature vacuum drying below 42&deg;C gently extracts moisture while preserving volatile capsaicin oils and curcumin.
                    </p>
                </div>

                <!-- Stage 3 -->
                <div class="p-6 rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl space-y-3 hover:border-emerald-400/40 hover:bg-white/[0.1] transition-all text-white">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-500/20 text-emerald-300 font-serif font-bold text-base border border-emerald-400/30">
                        03
                    </div>
                    <h4 class="font-serif text-lg font-bold text-white">Slow Stone-Milling</h4>
                    <p class="text-xs text-white/70 leading-relaxed">
                        Cold stone-ground without heat friction, preventing thermal scorch and protecting the raw culinary aroma and flavor.
                    </p>
                </div>

                <!-- Stage 4 -->
                <div class="p-6 rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl space-y-3 hover:border-emerald-400/40 hover:bg-white/[0.1] transition-all text-white">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-500/20 text-emerald-300 font-serif font-bold text-base border border-emerald-400/30">
                        04
                    </div>
                    <h4 class="font-serif text-lg font-bold text-white">NABL Lab Testing</h4>
                    <p class="text-xs text-white/70 leading-relaxed">
                        Rigorous screening for Sudan I&ndash;IV dyes, Lead Chromate, heavy metals, pesticide residues, and microbial safety.
                    </p>
                </div>

                <!-- Stage 5 -->
                <div class="p-6 rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl space-y-3 hover:border-emerald-400/40 hover:bg-white/[0.1] transition-all text-white">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-500/20 text-emerald-300 font-serif font-bold text-base border border-emerald-400/30">
                        05
                    </div>
                    <h4 class="font-serif text-lg font-bold text-white">Nitrogen Barrier</h4>
                    <p class="text-xs text-white/70 leading-relaxed">
                        Nitrogen-flushed hermetic packaging locks in fresh aroma and vibrant color, preventing oxidation without preservatives.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3: COLD STONE-MILLING VS HIGH-SPEED INDUSTRIAL PULVERIZATION -->
    <section class="py-16 sm:py-24 bg-transparent border-b border-white/10">
        <div class="site-container">
            <div class="max-w-3xl mx-auto text-center space-y-4 mb-16">
                <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-emerald-300">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                    <span>Processing Science</span>
                </div>
                <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-white">
                    Slow Stone-Grinding vs. Industrial Pulverizing
                </h2>
                <p class="text-sm sm:text-base text-emerald-100/80 leading-relaxed">
                    Why the temperature and method of spice milling determines true aroma, color, and nutritional bioavailability.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <!-- Navanidhi Standard -->
                <div class="p-8 sm:p-10 rounded-3xl nv-glass-card border-2 border-emerald-400/40 bg-emerald-950/20 backdrop-blur-xl shadow-lg space-y-5 text-white">
                    <div class="flex items-center justify-between gap-3 pb-3 border-b border-emerald-500/20">
                        <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-wider border border-emerald-400/30 whitespace-nowrap">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.8)]"></span>
                            <span>Navanidhi Standard</span>
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-400/15 text-emerald-300 border border-emerald-400/30 font-serif text-sm sm:text-base font-bold whitespace-nowrap shadow-sm">
                            <svg class="w-3.5 h-3.5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>&lt; 42&deg;C</span>
                        </span>
                    </div>

                    <h3 class="font-serif text-2xl font-bold text-white">
                        Slow Stone-Grinding &amp; Cold Dehydration
                    </h3>

                    <ul class="space-y-3.5 text-xs sm:text-sm text-white/90 font-medium">
                        <li class="flex items-start gap-2.5">
                            <span class="text-emerald-400 font-bold shrink-0">&check;</span>
                            <span><strong class="text-white">Volatile Oils Intact:</strong> Natural capsaicin, turmeric curcuminoids, and essential aromatic terpenes remain unburned.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-emerald-400 font-bold shrink-0">&check;</span>
                            <span><strong class="text-white">Natural Pigmentation:</strong> Authentic deep red from sun-dried chillies and brilliant gold from Lakadong turmeric without dyes.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-emerald-400 font-bold shrink-0">&check;</span>
                            <span><strong class="text-white">100% Whole Food Matter:</strong> Zero added starch, zero sawdust fillers, and zero maltodextrin bulking agents.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-emerald-400 font-bold shrink-0">&check;</span>
                            <span><strong class="text-white">Authentic Culinary Aroma:</strong> Rich traditional bouquet that elevates Indian dal, curries, sabzis, and golden milk tonics.</span>
                        </li>
                    </ul>
                </div>

                <!-- Conventional Industrial Milling -->
                <div class="p-8 sm:p-10 rounded-3xl nv-glass-card border border-rose-500/30 bg-rose-950/20 backdrop-blur-xl shadow-lg space-y-5 text-white">
                    <div class="flex items-center justify-between gap-3 pb-3 border-b border-rose-500/20">
                        <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-rose-500/20 text-rose-300 text-xs font-bold uppercase tracking-wider border border-rose-500/30 whitespace-nowrap">
                            <span class="w-2 h-2 rounded-full bg-rose-400 shadow-[0_0_8px_rgba(244,63,94,0.8)]"></span>
                            <span>Commercial Practice</span>
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-rose-400/15 text-rose-300 border border-rose-500/30 font-serif text-sm sm:text-base font-bold whitespace-nowrap shadow-sm">
                            <svg class="w-3.5 h-3.5 text-rose-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                            <span>&gt; 120&deg;C</span>
                        </span>
                    </div>

                    <h3 class="font-serif text-2xl font-bold text-white">
                        High-Speed Pulverizing &amp; Spray Drying
                    </h3>

                    <ul class="space-y-3.5 text-xs sm:text-sm text-white/90 font-medium">
                        <li class="flex items-start gap-2.5">
                            <span class="text-rose-400 font-bold shrink-0">&times;</span>
                            <span><strong class="text-white">Thermal Oil Destruction:</strong> High-speed friction scorches volatile oils, destroying natural pungency, aroma, and delicate antioxidants.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-rose-400 font-bold shrink-0">&times;</span>
                            <span><strong class="text-white">Dye Contamination:</strong> Chemical colorants (Sudan dyes, lead chromate) added to disguise scorched, brown, or stale spice matter.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-rose-400 font-bold shrink-0">&times;</span>
                            <span><strong class="text-white">Heavy Bulking Fillers:</strong> Up to 30&ndash;50% cheap sawdust, spent spice powder, rice starch, or chalk to inflate profit margins.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-rose-400 font-bold shrink-0">&times;</span>
                            <span><strong class="text-white">Bitter Scorched Taste:</strong> Lacks depth and leaves a harsh, acrid chemical aftertaste on the palate.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 4: LABORATORY TESTING PROTOCOLS -->
    <section class="py-16 sm:py-24 bg-transparent border-b border-white/10">
        <div class="site-container">
            <div class="max-w-3xl mx-auto text-center space-y-4 mb-16">
                <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-emerald-300">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                    <span>Analytical Rigor</span>
                </div>
                <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-white">
                    Independent NABL Laboratory Verification
                </h2>
                <p class="text-sm sm:text-base text-emerald-100/80 leading-relaxed">
                    Every batch produced by MAN Agro Foods is analyzed by accredited third-party laboratories against strict safety thresholds.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Test 1 -->
                <div class="p-6 rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl space-y-3 hover:border-emerald-400/40 hover:bg-white/[0.1] transition-all text-white">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 2v7.31L4.41 18.5A2 2 0 0 0 6 22h12a2 2 0 0 0 1.59-3.5L14 9.31V2"/><path d="M8.5 2h7"/><path d="M14 9.3a6.5 6.5 0 1 1-4 0"/></svg>
                    </div>
                    <h4 class="font-serif text-lg font-bold text-white">Sudan Dye &amp; Color Screen</h4>
                    <p class="text-xs text-white/70 leading-relaxed">
                        LC-MS/MS tested for absolute absence of Sudan I, II, III, IV, Para Red, and Metanil Yellow dyes to guarantee zero carcinogenic additives.
                    </p>
                </div>

                <!-- Test 2 -->
                <div class="p-6 rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl space-y-3 hover:border-emerald-400/40 hover:bg-white/[0.1] transition-all text-white">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                    </div>
                    <h4 class="font-serif text-lg font-bold text-white">Heavy Metals &amp; Lead Screen</h4>
                    <p class="text-xs text-white/70 leading-relaxed">
                        ICP-MS tested for Lead (&lt;0.5 ppm), Arsenic (&lt;0.5 ppm), Cadmium (&lt;0.3 ppm), and Mercury (&lt;0.1 ppm), with zero Lead Chromate.
                    </p>
                </div>

                <!-- Test 3 -->
                <div class="p-6 rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl space-y-3 hover:border-emerald-400/40 hover:bg-white/[0.1] transition-all text-white">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m4.93 4.93 4.24 4.24"/><path d="m14.83 9.17 4.24-4.24"/><path d="m14.83 14.83 4.24 4.24"/><path d="m9.17 14.83-4.24 4.24"/><circle cx="12" cy="12" r="4"/></svg>
                    </div>
                    <h4 class="font-serif text-lg font-bold text-white">Microbiological Safety</h4>
                    <p class="text-xs text-white/70 leading-relaxed">
                        Screened for Total Plate Count, Yeast &amp; Mold, E. Coli, Salmonella, and aflatoxins to guarantee pharmaceutical clean-room hygiene.
                    </p>
                </div>

                <!-- Test 4 -->
                <div class="p-6 rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl space-y-3 hover:border-emerald-400/40 hover:bg-white/[0.1] transition-all text-white">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg>
                    </div>
                    <h4 class="font-serif text-lg font-bold text-white">Phytochemical Potency</h4>
                    <p class="text-xs text-white/70 leading-relaxed">
                        HPLC quantification of active biomarkers: Curcumin in Lakadong Turmeric (&ge;7.5%), Capsaicin in Red Chilli, and Chlorophyll in Moringa.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 5: THE ZERO-TOLERANCE ADULTERATION BLACKLIST -->
    <section class="py-16 sm:py-24 bg-transparent border-b border-white/10">
        <div class="site-container">
            <div class="max-w-3xl mx-auto text-center space-y-4 mb-16">
                <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-rose-400">
                    <span class="h-1.5 w-1.5 rounded-full bg-rose-400"></span>
                    <span>Zero Adulteration</span>
                </div>
                <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-white">
                    Our Zero-Tolerance Blacklist
                </h2>
                <p class="text-sm sm:text-base text-emerald-100/80 leading-relaxed">
                    We maintain an unconditional ban on every industrial adulterant, synthetic dye, and chemical bulking agent.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">
                <div class="p-6 rounded-3xl nv-glass-card border border-rose-500/25 bg-rose-950/20 backdrop-blur-xl space-y-2 hover:border-rose-400/50 hover:bg-rose-950/30 transition-all text-white">
                    <span class="text-xs font-bold uppercase tracking-wider text-rose-400">Banned Adulterant 01</span>
                    <h4 class="font-serif text-lg font-bold text-white">Sudan Dyes (I&ndash;IV) &amp; Para Red</h4>
                    <p class="text-xs text-white/70 leading-relaxed">
                        Carcinogenic industrial azo dyes banned globally, yet frequently detected in unregulated commercial red chilli powders.
                    </p>
                </div>

                <div class="p-6 rounded-3xl nv-glass-card border border-rose-500/25 bg-rose-950/20 backdrop-blur-xl space-y-2 hover:border-rose-400/50 hover:bg-rose-950/30 transition-all text-white">
                    <span class="text-xs font-bold uppercase tracking-wider text-rose-400">Banned Adulterant 02</span>
                    <h4 class="font-serif text-lg font-bold text-white">Lead Chromate &amp; Metanil Yellow</h4>
                    <p class="text-xs text-white/70 leading-relaxed">
                        Toxic industrial chemical compounds used by unscrupulous vendors to artificially brighten dull or expired turmeric roots.
                    </p>
                </div>

                <div class="p-6 rounded-3xl nv-glass-card border border-rose-500/25 bg-rose-950/20 backdrop-blur-xl space-y-2 hover:border-rose-400/50 hover:bg-rose-950/30 transition-all text-white">
                    <span class="text-xs font-bold uppercase tracking-wider text-rose-400">Banned Adulterant 03</span>
                    <h4 class="font-serif text-lg font-bold text-white">Sawdust, Chalk &amp; Starch Fillers</h4>
                    <p class="text-xs text-white/70 leading-relaxed">
                        Cheap bulking agents used to artificially add volume and weight to powdered spices and botanical superfoods.
                    </p>
                </div>

                <div class="p-6 rounded-3xl nv-glass-card border border-rose-500/25 bg-rose-950/20 backdrop-blur-xl space-y-2 hover:border-rose-400/50 hover:bg-rose-950/30 transition-all text-white">
                    <span class="text-xs font-bold uppercase tracking-wider text-rose-400">Banned Adulterant 04</span>
                    <h4 class="font-serif text-lg font-bold text-white">Silicon Dioxide &amp; Chemical Flow Agents</h4>
                    <p class="text-xs text-white/70 leading-relaxed">
                        Synthetic silica and chemical anti-caking agents used in mass factories to force humid powder flow through machines.
                    </p>
                </div>

                <div class="p-6 rounded-3xl nv-glass-card border border-rose-500/25 bg-rose-950/20 backdrop-blur-xl space-y-2 hover:border-rose-400/50 hover:bg-rose-950/30 transition-all text-white">
                    <span class="text-xs font-bold uppercase tracking-wider text-rose-400">Banned Adulterant 05</span>
                    <h4 class="font-serif text-lg font-bold text-white">Synthetic Flavors &amp; Aromas</h4>
                    <p class="text-xs text-white/70 leading-relaxed">
                        "Nature-identical" flavor chemicals, solvent residues, or fragrance enhancers used to cover low-grade scorched harvests.
                    </p>
                </div>

                <div class="p-6 rounded-3xl nv-glass-card border border-rose-500/25 bg-rose-950/20 backdrop-blur-xl space-y-2 hover:border-rose-400/50 hover:bg-rose-950/30 transition-all text-white">
                    <span class="text-xs font-bold uppercase tracking-wider text-rose-400">Banned Adulterant 06</span>
                    <h4 class="font-serif text-lg font-bold text-white">Chemical Preservatives &amp; Sulfites</h4>
                    <p class="text-xs text-white/70 leading-relaxed">
                        Sodium benzoate, sulfur dioxide, and synthetic stabilizers. We preserve harvest freshness through hermetic nitrogen sealing alone.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 6: PACKAGING AS A FRESHNESS SHIELD -->
    <section class="py-16 sm:py-24 bg-transparent border-b border-white/10">
        <div class="site-container">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-5 space-y-6">
                    <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-emerald-300">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                        <span>Packaging Engineering</span>
                    </div>
                    <h2 class="font-serif text-3xl sm:text-4xl font-bold tracking-tight text-white leading-tight">
                        Packaging Engineered as a Freshness Shield
                    </h2>
                    <p class="text-sm sm:text-base text-emerald-100/80 leading-relaxed">
                        Freshly stone-ground spices and botanicals lose their vibrant volatile oils if exposed to air and light. MAN Agro Foods packs every harvest into hermetically sealed, nitrogen-flushed containers.
                    </p>
                    <div class="flex items-center gap-4 text-xs font-semibold uppercase tracking-wider text-emerald-300">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                            Nitrogen Flushed
                        </span>
                        <span class="text-white/30">&bull;</span>
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>
                            Light Protected
                        </span>
                    </div>
                </div>

                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="p-6 rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl space-y-3 hover:border-emerald-400/40 hover:bg-white/[0.1] transition-all text-white">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </div>
                        <h4 class="font-serif text-lg font-bold text-white">Oxygen Displacement</h4>
                        <p class="text-xs text-white/70 leading-relaxed">
                            Food-grade inert nitrogen flush displaces atmospheric oxygen, preventing aroma loss, lipid oxidation, and color fading.
                        </p>
                    </div>

                    <div class="p-6 rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl space-y-3 hover:border-emerald-400/40 hover:bg-white/[0.1] transition-all text-white">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="m9 12 2 2 4-4"/></svg>
                        </div>
                        <h4 class="font-serif text-lg font-bold text-white">Induction Hermetic Seal</h4>
                        <p class="text-xs text-white/70 leading-relaxed">
                            A tamper-evident foil induction seal locks out ambient Indian humidity without needing synthetic desiccant packs inside the food.
                        </p>
                    </div>

                    <div class="p-6 rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl space-y-3 hover:border-emerald-400/40 hover:bg-white/[0.1] transition-all text-white">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="M2 12h2"/><path d="M20 12h2"/></svg>
                        </div>
                        <h4 class="font-serif text-lg font-bold text-white">UV Photodegradation Barrier</h4>
                        <p class="text-xs text-white/70 leading-relaxed">
                            UV-resistant jar walls prevent light exposure from degrading delicate curcuminoids, chlorophyll, and fiery capsaicin.
                        </p>
                    </div>

                    <div class="p-6 rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl space-y-3 hover:border-emerald-400/40 hover:bg-white/[0.1] transition-all text-white">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"/><path d="M16 21h5v-5"/></svg>
                        </div>
                        <h4 class="font-serif text-lg font-bold text-white">100% Food-Grade Recyclable</h4>
                        <p class="text-xs text-white/70 leading-relaxed">
                            BPA-free food-safe packaging designed for reusable kitchen storage and easy eco-conscious recycling.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 7: CERTIFICATIONS & COMPLIANCE -->
    <section class="py-16 sm:py-24 bg-transparent border-b border-white/10">
        <div class="site-container">
            <div class="max-w-3xl mx-auto text-center space-y-4 mb-16">
                <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-emerald-300">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                    <span>Compliance &amp; Certifications</span>
                </div>
                <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-white">
                    Certified Purity You Can Verify
                </h2>
                <p class="text-sm sm:text-base text-emerald-100/80 leading-relaxed">
                    Upholding the highest national food safety standards under the auspices of MAN Agro Foods.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="p-6 rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl text-center space-y-3 shadow-2xs hover:border-emerald-400/40 hover:bg-white/[0.1] transition-all text-white">
                    <div class="flex h-14 w-14 mx-auto items-center justify-center rounded-2xl bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                    </div>
                    <h4 class="font-serif text-lg font-bold text-white">FSSAI Central License</h4>
                    <p class="text-xs text-white/70 leading-relaxed">
                        Licensed under Food Safety and Standards Authority of India, Lic. No. 10020042001234.
                    </p>
                </div>

                <div class="p-6 rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl text-center space-y-3 shadow-2xs hover:border-emerald-400/40 hover:bg-white/[0.1] transition-all text-white">
                    <div class="flex h-14 w-14 mx-auto items-center justify-center rounded-2xl bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>
                    </div>
                    <h4 class="font-serif text-lg font-bold text-white">100% Pure Food Matter</h4>
                    <p class="text-xs text-white/70 leading-relaxed">
                        Strictly vegetarian, zero animal derivatives, dairy-free, and unadulterated whole plants.
                    </p>
                </div>

                <div class="p-6 rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl text-center space-y-3 shadow-2xs hover:border-emerald-400/40 hover:bg-white/[0.1] transition-all text-white">
                    <div class="flex h-14 w-14 mx-auto items-center justify-center rounded-2xl bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" x2="9.01" y1="9" y2="9"/><line x1="15" x2="15.01" y1="9" y2="9"/></svg>
                    </div>
                    <h4 class="font-serif text-lg font-bold text-white">Non-GMO Verified</h4>
                    <p class="text-xs text-white/70 leading-relaxed">
                        Traceable heirloom seed varieties free from genetic modification or radiation.
                    </p>
                </div>

                <div class="p-6 rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl text-center space-y-3 shadow-2xs hover:border-emerald-400/40 hover:bg-white/[0.1] transition-all text-white">
                    <div class="flex h-14 w-14 mx-auto items-center justify-center rounded-2xl bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <h4 class="font-serif text-lg font-bold text-white">Zero Preservatives</h4>
                    <p class="text-xs text-white/70 leading-relaxed">
                        Guaranteed zero synthetic shelf-life extenders, sulfur dioxide, or anti-caking silica.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 8: CALL TO ACTION -->
    <section class="py-20 lg:py-24 bg-transparent text-white text-center relative overflow-hidden border-t border-white/10">
        <div class="absolute inset-0 bg-gradient-to-br from-emerald-950/40 via-transparent to-amber-950/20 pointer-events-none"></div>
        <div class="site-container relative z-10 max-w-3xl mx-auto space-y-6">
            <span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full text-[10px] font-bold tracking-[0.2em] uppercase bg-emerald-500/15 text-emerald-300 border border-emerald-400/30 nv-pulse-glow">
                <svg class="w-3.5 h-3.5 text-[#E6C687]" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>
                Uncompromising Purity
            </span>

            <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight leading-tight text-white">
                Authentic Indian Spices. <br class="hidden sm:inline">
                <span class="text-[#E6C687]">Zero Chemical Shortcuts.</span>
            </h2>

            <p class="text-sm sm:text-base text-emerald-100/80 max-w-xl mx-auto leading-relaxed font-sans">
                Experience the rich culinary fragrance and deep vitality of unadulterated red chilli powder, Lakadong turmeric, and cold-dried botanicals.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
                <a
                    href="{{ url('/spices') }}"
                    class="px-8 py-4 bg-gradient-to-r from-[#c9a25a] to-[#b08a43] text-[#041a0e] font-bold text-xs tracking-[0.15em] uppercase rounded-full hover:from-[#d6b677] hover:to-[#c9a25a] hover:shadow-lg hover:shadow-[#c9a25a]/30 transition-all duration-300"
                >
                    Explore Spices &rarr;
                </a>
                <a
                    href="{{ route('shop.cms.page', 'about-us') }}"
                    class="px-8 py-4 bg-white/10 text-white text-xs font-bold tracking-[0.15em] uppercase rounded-full border border-white/20 hover:border-white hover:text-white hover:bg-white/20 transition-all duration-300"
                >
                    Our Origin Story
                </a>
            </div>
        </div>
    </section>
</div>
