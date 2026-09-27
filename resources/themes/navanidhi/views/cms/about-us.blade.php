<div class="min-h-screen text-white bg-transparent" style="padding-bottom: 5rem !important;">
    @if (core()->getConfigData('general.general.breadcrumbs.shop'))
        <!-- Breadcrumbs -->
        <div class="site-container pt-4 pb-2 sm:pt-6 sm:pb-3">
            <nav aria-label="Breadcrumb" class="flex items-center space-x-2 text-[11px] sm:text-xs uppercase tracking-[0.14em] text-white/60">
                <a href="{{ route('shop.home.index') }}" class="hover:text-emerald-300 transition-colors">Home</a>
                <span class="text-white/30">/</span>
                <span class="text-emerald-300 font-semibold">Our Story</span>
            </nav>
        </div>
    @endif

    <!-- SECTION 1: EDITORIAL HERO & MISSION MANIFESTO -->
    <section class="site-container pt-8 pb-16 sm:pt-14 sm:pb-20 border-b border-white/10">
        <div class="max-w-4xl mx-auto text-center space-y-6">
            <!-- Brand Tagline Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-500/15 text-emerald-300 text-xs font-semibold tracking-widest uppercase border border-emerald-400/30 nv-pulse-glow">
                <svg class="w-4 h-4 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/>
                    <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/>
                </svg>
                <span>Navanidhi Naturals &bull; A Brand of MAN Agro Foods</span>
            </div>

            <!-- Main Heading -->
            <h1 class="font-serif text-3xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-white leading-[1.14]">
                The Sacred Nine Treasures of Mother Earth. <br class="hidden sm:inline">
                <span class="italic text-emerald-300 font-normal">Authentic Indian Farm Spices &amp; Living Botanicals.</span>
            </h1>

            <!-- Mission Paragraph -->
            <p class="text-base sm:text-lg lg:text-xl leading-relaxed text-emerald-100/80 max-w-3xl mx-auto font-sans">
                In Indian Vedic tradition, <em>Navanidhi</em> (नवनिधि) represents the Nine Divine Treasures of health, vitality, and natural abundance. Crafted and brought to life by <strong>MAN AGRO FOODS</strong>, Navanidhi Naturals was born to restore unadulterated purity to Indian kitchens and daily wellness rituals. From sun-ripened Guntur and Byadgi red chillies to high-curcumin Lakadong turmeric and cold-dried botanicals, we deliver 100% whole food matter&mdash;free from carcinogenic Sudan dyes, toxic lead chromate, sawdust, and synthetic fillers.
            </p>

            <!-- Hero Feature Image Card -->
            <div class="relative mt-10 overflow-hidden rounded-3xl border border-white/20 bg-black/40 shadow-2xl">
                <img
                    src="{{ asset('storage/theme/cms/navanidhi-harvest-story.webp') }}"
                    onerror="this.onerror=null; this.src='{{ asset('images/backgrounds/waterfall_nature_bg.jpg') }}';"
                    alt="Navanidhi Naturals Authentic Indian Farm Harvest"
                    class="h-64 sm:h-96 lg:h-[460px] w-full object-cover transition-transform duration-700 hover:scale-105"
                />
                <div class="absolute inset-0 bg-gradient-to-t from-[#041a0e]/90 via-[#041a0e]/20 to-transparent"></div>
                <div class="absolute bottom-6 left-6 right-6 flex flex-col sm:flex-row sm:items-end justify-between gap-4 text-white text-left">
                    <div>
                        <span class="inline-block px-3 py-1 rounded-full bg-[#D4A359] text-[#041a0e] text-[10px] font-bold tracking-widest uppercase mb-2">
                            Honest Indian Farmlands
                        </span>
                        <h3 class="font-serif text-xl sm:text-2xl font-bold text-white">Pristine Single-Origin Cultivation</h3>
                        <p class="text-xs sm:text-sm text-white/80 max-w-md mt-0.5">Sourced directly from vetted farmer networks in Guntur, Meghalaya, and Tamil Nadu.</p>
                    </div>
                    <div class="flex items-center gap-2 rounded-2xl bg-white/10 backdrop-blur-md px-4 py-2 border border-white/20">
                        <svg class="w-5 h-5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-xs font-semibold tracking-wide text-white">100% Pure Food Matter</span>
                    </div>
                </div>
            </div>

            <!-- 4 Trust Metrics Strip -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 sm:gap-6 pt-6 text-left">
                <div class="p-5 rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl shadow-sm hover:border-emerald-400/40 transition-all text-white">
                    <p class="font-serif text-3xl font-bold text-white">100%</p>
                    <p class="text-xs uppercase tracking-wider text-emerald-400 font-semibold mt-1">Whole Food Matter</p>
                    <p class="text-[11px] text-white/70 mt-0.5">Zero Sudan dyes, lead chromate, or sawdust.</p>
                </div>

                <div class="p-5 rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl shadow-sm hover:border-emerald-400/40 transition-all text-white">
                    <p class="font-serif text-3xl font-bold text-white">&lt; 42&deg;C</p>
                    <p class="text-xs uppercase tracking-wider text-emerald-400 font-semibold mt-1">Cold Stone-Milled</p>
                    <p class="text-[11px] text-white/70 mt-0.5">Living capsaicin, curcumin, and aroma oils intact.</p>
                </div>

                <div class="p-5 rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl shadow-sm hover:border-emerald-400/40 transition-all text-white">
                    <p class="font-serif text-3xl font-bold text-white">0%</p>
                    <p class="text-xs uppercase tracking-wider text-emerald-400 font-semibold mt-1">Synthetic Additives</p>
                    <p class="text-[11px] text-white/70 mt-0.5">No artificial food color, silica, or preservatives.</p>
                </div>

                <div class="p-5 rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl shadow-sm hover:border-emerald-400/40 transition-all text-white">
                    <p class="font-serif text-3xl font-bold text-[#E6C687]">FSSAI</p>
                    <p class="text-xs uppercase tracking-wider text-emerald-400 font-semibold mt-1">Central Licensed</p>
                    <p class="text-[11px] text-white/70 mt-0.5">Batch-tested by accredited NABL laboratories.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 2: THE FOUNDING STORY & THE SPARK -->
    <section class="py-16 sm:py-24 bg-transparent border-b border-white/10">
        <div class="site-container">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                <!-- Left Story Column -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-emerald-300">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                        <span>The Genesis</span>
                    </div>

                    <h2 class="font-serif text-2xl sm:text-4xl font-bold text-white leading-tight">
                        Reclaiming the Purity of Indian Spices &amp; Botanicals
                    </h2>
                    
                    <div class="space-y-4 text-sm sm:text-base text-white/80 leading-relaxed font-sans">
                        <p>
                            For generations, Indian kitchens and Ayurvedic traditions relied on unadulterated spices and sacred herbs for daily nourishment, immunity, and digestive fire. But visiting modern spice markets reveals a disturbing reality: commercial red chilli powders are routinely cut with carcinogenic Sudan dyes to fake a deep red color, cheap turmeric is brightened with toxic lead chromate, and botanical powders are diluted with up to 70% maltodextrin carriers and sawdust fillers.
                        </p>
                        <p>
                            Furthermore, industrial high-speed pulverizers generate scorching heat exceeding 80&deg;C&ndash;160&deg;C. This intense friction scorches fragile essential oils, oxidizes natural antioxidants, and destroys volatile aroma molecules like capsaicin, curcuminoids, and piperine.
                        </p>
                        <p class="p-4 rounded-2xl nv-glass-card border border-emerald-500/30 bg-emerald-950/30 text-emerald-100 font-medium">
                            We asked a fundamental question: <strong class="text-white font-bold">Why compromise the sacred integrity of Indian kitchen staples when honest farming and traditional slow milling can deliver perfection?</strong>
                        </p>
                        <p>
                            <strong class="text-white">MAN Agro Foods</strong> founded Navanidhi Naturals to restore absolute transparency: direct farmer sourcing from certified Indian terroirs, slow stone-grinding and low-temperature dehydration below 42&deg;C, and hermetically sealed freshness with zero chemical adulterants.
                        </p>
                    </div>
                </div>

                <!-- Right Pull Quote Card -->
                <div class="lg:col-span-5">
                    <div class="rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-8 sm:p-10 text-white space-y-6 shadow-xl relative overflow-hidden">
                        <div class="absolute -top-10 -right-10 w-40 h-40 bg-emerald-500/20 rounded-full blur-2xl pointer-events-none"></div>
                        
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10 text-[#D4A359] border border-white/15">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                            </svg>
                        </div>

                        <blockquote class="font-serif text-lg sm:text-xl italic leading-relaxed text-white">
                            "If you cannot trace the spice or botanical directly back to living Indian soil, and if you have to fake its color with synthetic dyes or fillers, it does not belong in your kitchen or your body."
                        </blockquote>

                        <div class="pt-5 border-t border-white/15 text-xs text-white/80 flex items-center justify-between">
                            <div>
                                <p class="font-bold text-white tracking-wide">The Navanidhi Purity Standard</p>
                                <p class="text-[11px] text-[#D4A359] mt-0.5 font-medium">Stone-Ground &bull; Zero Dyes &bull; MAN Agro Foods</p>
                            </div>
                            <div class="flex h-8 w-8 items-center justify-center rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3: THE 4 FORMULATION PILLARS -->
    <section class="py-16 sm:py-24 bg-transparent border-b border-white/10">
        <div class="site-container">
            <div class="max-w-3xl mx-auto text-center space-y-4 mb-16">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-500/15 border border-emerald-400/30 text-emerald-300">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                    <span>Our Four Pillars</span>
                </div>
                <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-white">
                    The Pillars of Navanidhi Purity
                </h2>
                <p class="text-sm sm:text-base text-emerald-100/80 leading-relaxed font-sans">
                    Every spice and botanical formulation we produce adheres strictly to these non-negotiable principles.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Pillar 01 -->
                <div class="p-8 sm:p-10 rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl shadow-lg space-y-4 hover:border-emerald-400/40 hover:bg-white/[0.09] transition-all duration-300 text-white">
                    <div class="flex items-center justify-between">
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-500/20 text-emerald-300 font-serif text-lg font-bold border border-emerald-400/30">
                            01
                        </span>
                        <span class="text-xs font-bold uppercase tracking-widest text-[#D4A359]">Thermal Discipline</span>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-white">
                        Slow Stone-Grinding &amp; Cold Dehydration (&lt;42&deg;C)
                    </h3>
                    <p class="text-sm leading-relaxed text-white/75 font-sans">
                        Frictional heat destroys natural essential oils and oxidizes active medicinal compounds. We use slow stone mills and low-temperature vacuum dehydration chambers operating strictly below 42&deg;C. This locks in the natural fiery capsaicin of red chillies, the living golden curcumin of turmeric, and the active enzymes of green botanicals.
                    </p>
                </div>

                <!-- Pillar 02 -->
                <div class="p-8 sm:p-10 rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl shadow-lg space-y-4 hover:border-emerald-400/40 hover:bg-white/[0.09] transition-all duration-300 text-white">
                    <div class="flex items-center justify-between">
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-500/20 text-emerald-300 font-serif text-lg font-bold border border-emerald-400/30">
                            02
                        </span>
                        <span class="text-xs font-bold uppercase tracking-widest text-[#D4A359]">Zero Adulteration</span>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-white">
                        Zero Sudan Dyes, Zero Lead Chromate, Zero Fillers
                    </h3>
                    <p class="text-sm leading-relaxed text-white/75 font-sans">
                        We enforce an absolute ban on all artificial food colors (Sudan I&ndash;IV dyes, Metanil Yellow, Lead Chromate), starch carriers, sawdust, and silicon dioxide flow agents. When you open a Navanidhi pack, you get 100% pure food matter sourced from honest Indian earth.
                    </p>
                </div>

                <!-- Pillar 03 -->
                <div class="p-8 sm:p-10 rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl shadow-lg space-y-4 hover:border-emerald-400/40 hover:bg-white/[0.09] transition-all duration-300 text-white">
                    <div class="flex items-center justify-between">
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-500/20 text-emerald-300 font-serif text-lg font-bold border border-emerald-400/30">
                            03
                        </span>
                        <span class="text-xs font-bold uppercase tracking-widest text-[#D4A359]">Instant Dispersion</span>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-white">
                        Precision Cryo Micron-Milling
                    </h3>
                    <p class="text-sm leading-relaxed text-white/75 font-sans">
                        Without synthetic emulsifiers or chemical dispersing agents, our botanicals and spices undergo gentle cryogenic micro-milling. This achieves effortless culinary incorporation in Indian curries, stir-fries, warm golden milk, morning tonics, and herbal infusions.
                    </p>
                </div>

                <!-- Pillar 04 -->
                <div class="p-8 sm:p-10 rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl shadow-lg space-y-4 hover:border-emerald-400/40 hover:bg-white/[0.09] transition-all duration-300 text-white">
                    <div class="flex items-center justify-between">
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-500/20 text-emerald-300 font-serif text-lg font-bold border border-emerald-400/30">
                            04
                        </span>
                        <span class="text-xs font-bold uppercase tracking-widest text-[#D4A359]">Full Traceability</span>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-white">
                        Direct Farmer Partnerships &amp; NABL Lab Verification
                    </h3>
                    <p class="text-sm leading-relaxed text-white/75 font-sans">
                        We work directly with multigenerational Indian smallholders cultivating without toxic pesticides. Every harvest lot is tagged, batch-numbered, and analyzed by third-party NABL-accredited laboratories for heavy metals, moisture levels, microbial safety, and active phytonutrient density.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 4: AGRICULTURAL TERROIRS & SOURCING GEOGRAPHY -->
    <section class="py-16 sm:py-24 bg-transparent border-b border-white/10">
        <div class="site-container">
            <div class="max-w-3xl mx-auto text-center space-y-4 mb-16">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-500/15 border border-emerald-400/30 text-emerald-300">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                    <span>Indian Agricultural Origins</span>
                </div>
                <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-white">
                    Sourced from Native Indian Terroirs
                </h2>
                <p class="text-sm sm:text-base text-emerald-100/80 leading-relaxed font-sans">
                    Spices and botanicals attain peak active phytonutrient density only when grown in their native ecological habitats.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Terroir 1 -->
                <div class="p-6 rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl space-y-4 hover:border-emerald-400/40 transition-all text-white">
                    <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-rose-400">
                        <svg class="w-4 h-4 text-rose-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg>
                        <span>Guntur &amp; Byadgi</span>
                    </div>
                    <h4 class="font-serif text-xl font-bold text-white">Pure Red Chilli</h4>
                    <p class="text-xs sm:text-sm leading-relaxed text-white/75 font-sans">
                        Sun-ripened chillies selected for high natural ASTA color and balanced Scoville heat, slow stone-milled with zero synthetic Sudan dyes or added oils.
                    </p>
                </div>

                <!-- Terroir 2 -->
                <div class="p-6 rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl space-y-4 hover:border-emerald-400/40 transition-all text-white">
                    <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#D4A359]">
                        <svg class="w-4 h-4 text-[#D4A359]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg>
                        <span>Meghalaya, India</span>
                    </div>
                    <h4 class="font-serif text-xl font-bold text-white">Lakadong Turmeric</h4>
                    <p class="text-xs sm:text-sm leading-relaxed text-white/75 font-sans">
                        Cultivated in the pristine organic soils of Meghalaya, delivering an extraordinary 7.5% natural curcumin density&mdash;over triple that of conventional market turmeric.
                    </p>
                </div>

                <!-- Terroir 3 -->
                <div class="p-6 rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl space-y-4 hover:border-emerald-400/40 transition-all text-white">
                    <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-emerald-400">
                        <svg class="w-4 h-4 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg>
                        <span>Salem, Tamil Nadu</span>
                    </div>
                    <h4 class="font-serif text-xl font-bold text-white">Organic Moringa</h4>
                    <p class="text-xs sm:text-sm leading-relaxed text-white/75 font-sans">
                        Harvested from traditional agrarian belts, shade-dried below 38&deg;C to safeguard vibrant cellular chlorophyll, 46 antioxidants, and complete plant proteins.
                    </p>
                </div>

                <!-- Terroir 4 -->
                <div class="p-6 rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl space-y-4 hover:border-emerald-400/40 transition-all text-white">
                    <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-emerald-400">
                        <svg class="w-4 h-4 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg>
                        <span>Rajasthan Arid Soils</span>
                    </div>
                    <h4 class="font-serif text-xl font-bold text-white">Organic Ashwagandha</h4>
                    <p class="text-xs sm:text-sm leading-relaxed text-white/75 font-sans">
                        Full-spectrum adaptogenic root matured for 180 days in arid organic soils, delivering active withanolides to harmonize stress and support natural vitality.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 5: THE MATRIX (WHAT WE NEVER USE VS ALWAYS DELIVER) -->
    <section class="py-16 sm:py-24 bg-transparent border-b border-white/10">
        <div class="site-container">
            <div class="max-w-3xl mx-auto text-center space-y-4 mb-16">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-500/15 border border-emerald-400/30 text-emerald-300">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                    <span>The Standard Matrix</span>
                </div>
                <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-white">
                    Our Zero-Compromise Standard
                </h2>
                <p class="text-sm sm:text-base text-emerald-100/80 leading-relaxed font-sans">
                    What we keep out of our spices and botanicals is just as important as what we harvest.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <!-- What We NEVER Use -->
                <div class="p-8 rounded-3xl nv-glass-card border border-rose-500/30 bg-rose-950/25 backdrop-blur-xl space-y-5 text-white shadow-xl">
                    <div class="flex items-center gap-2.5 text-rose-400 font-serif text-xl font-bold">
                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-rose-500/20 text-rose-300 border border-rose-400/30">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                        </div>
                        <span>What We NEVER Use</span>
                    </div>
                    <ul class="space-y-3.5 text-xs sm:text-sm text-white/90 font-medium">
                        <li class="flex items-start gap-2.5">
                            <span class="text-rose-400 font-bold shrink-0">&times;</span>
                            <span><strong class="text-white">No Sudan Dyes (I&ndash;IV):</strong> Zero carcinogenic chemical red dyes commonly found in industrial chillies.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-rose-400 font-bold shrink-0">&times;</span>
                            <span><strong class="text-white">No Lead Chromate:</strong> Zero toxic yellow pigments used to artificially brighten cheap turmeric.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-rose-400 font-bold shrink-0">&times;</span>
                            <span><strong class="text-white">No Starch, Sawdust, or Chalk:</strong> Zero cheap bulking adulterants or artificial weight additives.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-rose-400 font-bold shrink-0">&times;</span>
                            <span><strong class="text-white">No Destructive High-Heat Milling:</strong> Never exposed to friction over 80&deg;C that scorches essential oils.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-rose-400 font-bold shrink-0">&times;</span>
                            <span><strong class="text-white">No Silicon Dioxide or Maltodextrin:</strong> Zero chemical anti-caking agents, carrier starches, or artificial preservatives.</span>
                        </li>
                    </ul>
                </div>

                <!-- What We ALWAYS Deliver -->
                <div class="p-8 rounded-3xl nv-glass-card border border-emerald-500/30 bg-emerald-950/25 backdrop-blur-xl space-y-5 text-white shadow-xl">
                    <div class="flex items-center gap-2.5 text-emerald-300 font-serif text-xl font-bold">
                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span>What We ALWAYS Deliver</span>
                    </div>
                    <ul class="space-y-3.5 text-xs sm:text-sm text-white/90 font-medium">
                        <li class="flex items-start gap-2.5">
                            <span class="text-emerald-400 font-bold shrink-0">&check;</span>
                            <span><strong class="text-white">100% Pure Food Matter:</strong> Real Indian farm spices and whole botanicals only.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-emerald-400 font-bold shrink-0">&check;</span>
                            <span><strong class="text-white">Cold Milled (&lt;42&deg;C):</strong> Living capsaicin warmth, native curcumin, and volatile aromatic oils preserved.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-emerald-400 font-bold shrink-0">&check;</span>
                            <span><strong class="text-white">Natural Color &amp; Pure Aroma:</strong> Authentic hues from Indian sun and rich soil, not laboratory colorants.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-emerald-400 font-bold shrink-0">&check;</span>
                            <span><strong class="text-white">NABL Laboratory Tested:</strong> Every lot certified for heavy metals, microbial safety, and active potency.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-emerald-400 font-bold shrink-0">&check;</span>
                            <span><strong class="text-white">MAN Agro Clean-Room Packaging:</strong> Triple-barrier induction seal with inert nitrogen flush for kitchen freshness.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 6: SUSTAINABILITY & REGENERATIVE STEWARDSHIP -->
    <section class="py-16 sm:py-24 bg-transparent border-b border-white/10">
        <div class="site-container">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-5 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-500/15 border border-emerald-400/30 text-emerald-300">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                        <span>Stewardship</span>
                    </div>
                    <h2 class="font-serif text-3xl sm:text-4xl font-bold tracking-tight text-white leading-tight">
                        Honoring the Soil &amp; The Farmers
                    </h2>
                    <p class="text-sm sm:text-base text-emerald-100/80 leading-relaxed font-sans">
                        True quality begins with healthy living soil and empowered farming communities. MAN Agro Foods works closely with smallholder growers across Andhra Pradesh, Karnataka, Meghalaya, and Tamil Nadu who practice crop rotation, natural compost enrichment, and pesticide-free stewardship.
                    </p>
                    <div class="flex items-center gap-4 text-xs font-semibold uppercase tracking-wider text-emerald-400">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                            Direct Farmer Sourcing
                        </span>
                        <span class="text-white/30">&bull;</span>
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"/><path d="M16 21h5v-5"/></svg>
                            100% Recyclable Packs
                        </span>
                    </div>
                </div>

                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="p-6 rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl space-y-3 hover:border-emerald-400/40 transition-all text-white">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/20 text-emerald-400 border border-emerald-400/30">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </div>
                        <h4 class="font-serif text-lg font-bold text-white">Fair Farmer Compensation</h4>
                        <p class="text-xs text-white/75 leading-relaxed font-sans">
                            Paying guaranteed above-market prices directly to grower families who safeguard indigenous heirloom crops and pesticide-free cultivation.
                        </p>
                    </div>

                    <div class="p-6 rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl space-y-3 hover:border-emerald-400/40 transition-all text-white">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/20 text-emerald-400 border border-emerald-400/30">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>
                        </div>
                        <h4 class="font-serif text-lg font-bold text-white">Zero-Waste Farm Processing</h4>
                        <p class="text-xs text-white/75 leading-relaxed font-sans">
                            Agricultural stem and leaf byproducts are composted back into agricultural soil to regenerate natural organic matter for subsequent crop cycles.
                        </p>
                    </div>

                    <div class="p-6 rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl space-y-3 hover:border-emerald-400/40 transition-all text-white">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/20 text-emerald-400 border border-emerald-400/30">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </div>
                        <h4 class="font-serif text-lg font-bold text-white">Food-Grade Nitrogen Seals</h4>
                        <p class="text-xs text-white/75 leading-relaxed font-sans">
                            Each jar and pouch is flushed with food-grade nitrogen gas to lock in fresh aroma and capsaicin/curcumin vitality without synthetic preservatives.
                        </p>
                    </div>

                    <div class="p-6 rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl space-y-3 hover:border-emerald-400/40 transition-all text-white">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/20 text-emerald-400 border border-emerald-400/30">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <h4 class="font-serif text-lg font-bold text-white">MAN Agro Processing Facility</h4>
                        <p class="text-xs text-white/75 leading-relaxed font-sans">
                            Manufactured and packed by <strong class="text-white">MAN AGRO FOODS</strong> under Central FSSAI License No. 10020042001234 in certified clean-room processing environments.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 7: EDITORIAL CALL TO ACTION -->
    <section class="site-container py-16 sm:py-24">
        <div class="max-w-4xl mx-auto rounded-3xl nv-glass-card border border-white/20 bg-white/[0.06] backdrop-blur-xl p-10 sm:p-14 text-center space-y-6 shadow-2xl relative overflow-hidden">
            <div class="absolute -top-20 right-1/4 w-72 h-72 bg-emerald-500/15 rounded-full blur-3xl pointer-events-none"></div>

            <span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full text-[10px] font-bold tracking-[0.2em] uppercase bg-white/10 text-emerald-300 border border-white/15">
                <svg class="w-3.5 h-3.5 text-[#D4A359]" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>
                Experience Navanidhi Purity
            </span>

            <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight leading-tight text-white">
                Taste Pure Farm Spices <br class="hidden sm:inline">
                <span class="text-[#D4A359]">&amp; Living Botanicals</span>
            </h2>

            <p class="text-sm sm:text-base text-white/80 max-w-xl mx-auto leading-relaxed font-sans">
                Explore our collection of pure stone-ground spices and cold-dehydrated whole botanicals crafted for authentic Indian cooking and daily vitality.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
                <a
                    href="{{ url('/spices') }}"
                    class="nv-editorial-btn-primary inline-flex items-center justify-center gap-2 text-xs font-bold tracking-[0.12em] uppercase rounded-full shadow-lg transition-all duration-300 hover:-translate-y-0.5"
                    style="min-height: 48px; padding: 13px 32px; background: linear-gradient(135deg, #0D5C3A 0%, #073822 100%); color: #FFFFFF; border: 1px solid rgba(52, 211, 153, 0.35); border-radius: 9999px; font-family: 'Montserrat', system-ui, sans-serif; font-size: 12px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; text-decoration: none; white-space: nowrap; box-shadow: 0 4px 16px rgba(13, 92, 58, 0.35);"
                >
                    <span>Explore Pure Spices</span>
                    <span class="text-sm transform translate-x-0.5">&rarr;</span>
                </a>
                <a
                    href="{{ route('shop.product_or_category.index', 'products') }}"
                    class="nv-editorial-btn-secondary inline-flex items-center justify-center gap-2 text-xs font-bold tracking-[0.12em] uppercase rounded-full transition-all duration-300 hover:-translate-y-0.5"
                    style="min-height: 48px; padding: 13px 32px; background: rgba(255, 255, 255, 0.08); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); color: #FFFFFF; border: 1.5px solid rgba(255, 255, 255, 0.35); border-radius: 9999px; font-family: 'Montserrat', system-ui, sans-serif; font-size: 12px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; text-decoration: none; white-space: nowrap;"
                >
                    <span>All Products</span>
                </a>
            </div>
        </div>
    </section>

    <style>
        .nv-editorial-btn-primary:hover {
            background: linear-gradient(135deg, #10B981 0%, #0D5C3A 100%) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 24px rgba(16, 185, 129, 0.45) !important;
            color: #FFFFFF !important;
        }
        .nv-editorial-btn-secondary:hover {
            background: rgba(255, 255, 255, 0.16) !important;
            border-color: rgba(110, 231, 183, 0.7) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3) !important;
            color: #FFFFFF !important;
        }
    </style>
</div>
