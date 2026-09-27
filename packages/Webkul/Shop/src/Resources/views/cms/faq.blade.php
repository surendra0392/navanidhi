@php
    $contactEmail = core()->getConfigData('emails.configure.email_settings.contact_email') ?: 'care@navanidhinaturals.com';
    $phone = '+91 98765 43210';

    $faqSchema = [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => [
            [
                '@type'          => 'Question',
                'name'           => 'How do you guarantee your Pure Red Chilli Powder is free from Sudan dyes and artificial red colors?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text'  => 'Commercial chillies are often adulterated with carcinogenic industrial dyes (Sudan I, II, III, IV or Para Red) to fake vivid redness. Navanidhi Naturals sources directly from verified farmer networks in Guntur and Byadgi, sun-dries whole pods, and subjects every batch to LC-MS/MS laboratory screening to guarantee 100% natural ASTA color and zero synthetic dyes.',
                ],
            ],
            [
                '@type'          => 'Question',
                'name'           => 'Why is Lakadong Turmeric superior to ordinary market turmeric?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text'  => 'Conventional market turmeric typically contains only 1.5% to 2.5% curcumin and is frequently brightened with toxic lead chromate or cut with starch. Navanidhi Lakadong Turmeric is cultivated organically in the Jaintia Hills of Meghalaya, delivering a tested ≥7.5% natural curcumin density with zero lead chromate, zero dyes, and zero fillers.',
                ],
            ],
            [
                '@type'          => 'Question',
                'name'           => 'How does slow stone-milling and cold dehydration below 42°C preserve flavor and nutrients?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text'  => 'Conventional high-speed pulverizers generate heat exceeding 80°C to 160°C, scorching volatile essential oils, destroying natural pungency, and oxidizing antioxidants. At MAN AGRO FOODS, we utilize low-temperature vacuum dehydration chambers (<42°C) and traditional slow stone mills to preserve capsaicin warmth, native curcumin, and living plant enzymes.',
                ],
            ],
            [
                '@type'          => 'Question',
                'name'           => 'Do you use maltodextrin, silicon dioxide, or chemical preservatives?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text'  => 'Never. Our ingredient lists contain 100% pure food matter and nothing else. Zero maltodextrin bulking carriers, zero silicon dioxide flow agents, zero artificial food colors, and zero chemical preservatives. Because our powders contain no chemical flow agents, slight natural clumping may occur; this is proof of absolute purity and dissolves effortlessly.',
                ],
            ],
            [
                '@type'          => 'Question',
                'name'           => 'How can I obtain the third-party NABL Certificate of Analysis (COA) for my product batch?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text'  => 'Every pouch and jar features an explicit batch number. Email care@navanidhinaturals.com with your batch code to receive an independent NABL-accredited laboratory test report verifying heavy metal purity (lead, arsenic, cadmium, mercury), absence of synthetic dyes, and active phytochemical potency.',
                ],
            ],
            [
                '@type'          => 'Question',
                'name'           => 'What are your pan-India shipping timelines and free delivery thresholds?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text'  => 'Orders placed before 2:00 PM IST Monday through Saturday are dispatched within 24 business hours directly from our certified South India facility by MAN AGRO FOODS. Express delivery takes 2–4 business days across major metros and 4–7 days for regional pin codes. Free shipping applies to all orders valued at ₹499 or above.',
                ],
            ],
            [
                '@type'          => 'Question',
                'name'           => 'What should I do if my package arrives damaged or with a broken seal?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text'  => 'Under our 100% Purity Guarantee, if your parcel arrives damaged or with a compromised induction seal, share a photo with care@navanidhinaturals.com or WhatsApp +91 98765 43210 within 48 hours of delivery. We will dispatch a priority replacement immediately at zero cost.',
                ],
            ],
        ],
    ];
@endphp

@push('meta')
    <!-- FAQPage JSON-LD Structured Data for Google Rich Snippets -->
    <script type="application/ld+json">
    {!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
@endpush

<div class="min-h-screen text-white bg-transparent" style="padding-bottom: 5rem !important;">
    @if (core()->getConfigData('general.general.breadcrumbs.shop'))
        <!-- Breadcrumbs Navigation -->
        <div class="site-container pt-5 pb-2 sm:pt-7 sm:pb-3">
            <nav aria-label="Breadcrumb" class="flex items-center space-x-2 text-[11px] sm:text-xs uppercase tracking-[0.18em] text-white/60">
                <a href="{{ route('shop.home.index') }}" class="hover:text-emerald-300 transition-colors">Home</a>
                <span class="text-white/30 font-serif">/</span>
                <span class="text-emerald-300 font-semibold">FAQ &amp; Knowledge Base</span>
            </nav>
        </div>
    @endif

    <!-- SECTION 1: HERO & SEARCH HEADER -->
    <section class="site-container pt-6 pb-12 sm:pt-10 sm:pb-16 border-b border-white/10">
        <div class="max-w-3xl mx-auto text-center space-y-4">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-500/15 text-emerald-300 text-xs font-semibold tracking-[0.2em] uppercase border border-emerald-400/30 nv-pulse-glow">
                <svg class="w-4 h-4 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                <span>Transparency &amp; Guidance</span>
            </div>

            <h1 class="font-serif text-3xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-white leading-[1.15]">
                Frequently Asked Questions
            </h1>

            <p class="text-sm sm:text-base lg:text-lg text-emerald-100/80 leading-relaxed font-sans max-w-2xl mx-auto">
                Explore transparent answers regarding our stone-milled farm spices, cold-dehydration science, batch laboratory reports, kitchen culinary rituals, and pan-India express dispatch by MAN AGRO FOODS.
            </p>

            <!-- Quick Pill Navigation -->
            <div class="flex flex-wrap items-center justify-center gap-2 pt-4">
                <a href="#spices" class="px-3.5 py-1.5 rounded-full nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl text-xs font-semibold text-white/90 hover:border-emerald-400/50 hover:text-emerald-300 hover:bg-white/[0.12] transition-all shadow-xs">
                    Pure Spices &amp; Quality
                </a>
                <a href="#purity" class="px-3.5 py-1.5 rounded-full nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl text-xs font-semibold text-white/90 hover:border-emerald-400/50 hover:text-emerald-300 hover:bg-white/[0.12] transition-all shadow-xs">
                    Botanical Science
                </a>
                <a href="#testing" class="px-3.5 py-1.5 rounded-full nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl text-xs font-semibold text-white/90 hover:border-emerald-400/50 hover:text-emerald-300 hover:bg-white/[0.12] transition-all shadow-xs">
                    Lab Testing &amp; COA
                </a>
                <a href="#rituals" class="px-3.5 py-1.5 rounded-full nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl text-xs font-semibold text-white/90 hover:border-emerald-400/50 hover:text-emerald-300 hover:bg-white/[0.12] transition-all shadow-xs">
                    Culinary &amp; Wellness Use
                </a>
                <a href="#shipping" class="px-3.5 py-1.5 rounded-full nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl text-xs font-semibold text-white/90 hover:border-emerald-400/50 hover:text-emerald-300 hover:bg-white/[0.12] transition-all shadow-xs">
                    Pan-India Dispatch
                </a>
            </div>
        </div>
    </section>

    <!-- SECTION 2: CATEGORIZED ACCORDION GROUPS -->
    <main class="site-container py-12 lg:py-16 max-w-4xl mx-auto space-y-16">

        <!-- Group 1: Farm Spices & Zero Adulteration -->
        <section id="spices" class="space-y-4">
            <div class="flex items-center gap-3 border-b border-white/10 pb-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/20 text-emerald-300 border border-emerald-400/30 shrink-0">
                    <svg class="w-5 h-5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </span>
                <div>
                    <h2 class="font-serif text-xl sm:text-2xl font-bold text-white">1. Pure Farm Spices &amp; Zero Adulteration</h2>
                    <p class="text-xs text-white/70">Understanding our pure Red Chilli Powder, Lakadong Turmeric, and zero-adulteration promise.</p>
                </div>
            </div>

            <div class="space-y-3 pt-2">
                <details class="group rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-5 sm:p-6 transition-all duration-300 open:border-emerald-400/40 open:bg-white/[0.1] open:shadow-lg text-white" open>
                    <summary class="flex cursor-pointer list-none items-center justify-between font-serif text-base sm:text-lg font-semibold text-white group-hover:text-emerald-300 [&::-webkit-details-marker]:hidden select-none">
                        <span class="pr-4">How do you guarantee Red Chilli Powder is free from Sudan dyes and artificial red color?</span>
                        <svg class="w-5 h-5 text-emerald-400 shrink-0 transition-transform duration-300 group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    </summary>
                    <div class="pt-3 text-xs sm:text-sm text-white/80 leading-relaxed border-t border-white/10 mt-3 font-sans">
                        Commercial red chilli powders are frequently adulterated with carcinogenic synthetic Sudan dyes (Sudan I, II, III, IV) or Para Red to make low-grade or stale chillies look brilliantly red. At <strong class="text-white">MAN AGRO FOODS</strong>, our Navanidhi Red Chilli Powder is produced strictly from sun-dried, unpolished whole chillies sourced directly from trusted grower belts in Guntur and Byadgi. Every batch undergoes LC-MS/MS testing to verify 100% natural ASTA color and absolute zero synthetic dyes.
                    </div>
                </details>

                <details class="group rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-5 sm:p-6 transition-all duration-300 open:border-emerald-400/40 open:bg-white/[0.1] open:shadow-lg text-white">
                    <summary class="flex cursor-pointer list-none items-center justify-between font-serif text-base sm:text-lg font-semibold text-white group-hover:text-emerald-300 [&::-webkit-details-marker]:hidden select-none">
                        <span class="pr-4">Why is Lakadong Turmeric different from ordinary bazaar turmeric?</span>
                        <svg class="w-5 h-5 text-emerald-400 shrink-0 transition-transform duration-300 group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    </summary>
                    <div class="pt-3 text-xs sm:text-sm text-white/80 leading-relaxed border-t border-white/10 mt-3 font-sans">
                        Ordinary market turmeric typically has a low curcumin content of 1.5% to 2.5% and is often contaminated with Lead Chromate or Metanil Yellow to fake a bright yellow appearance. Navanidhi Lakadong Turmeric is cultivated in the pristine volcanic hills of Meghalaya, offering an exceptional, lab-verified <strong class="text-white">&ge;7.5% natural curcumin density</strong>. It contains zero lead chromate, zero starch fillers, and delivers superior anti-inflammatory potency and rich natural fragrance.
                    </div>
                </details>

                <details class="group rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-5 sm:p-6 transition-all duration-300 open:border-emerald-400/40 open:bg-white/[0.1] open:shadow-lg text-white">
                    <summary class="flex cursor-pointer list-none items-center justify-between font-serif text-base sm:text-lg font-semibold text-white group-hover:text-emerald-300 [&::-webkit-details-marker]:hidden select-none">
                        <span class="pr-4">Do you use sawdust, chalk, starch, or chemical flow agents in spices?</span>
                        <svg class="w-5 h-5 text-emerald-400 shrink-0 transition-transform duration-300 group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    </summary>
                    <div class="pt-3 text-xs sm:text-sm text-white/80 leading-relaxed border-t border-white/10 mt-3 font-sans">
                        <strong class="text-white">Never.</strong> We maintain a strict zero-tolerance policy against all bulking adulterants. Our products contain 100% pure whole spice matter. We do not use silicon dioxide (chemical silica) or anti-caking additives. The natural freshness and intense flavor mean you need smaller quantities compared to commercial brands.
                    </div>
                </details>
            </div>
        </section>

        <!-- Group 2: Botanical Science & Low-Temperature Processing -->
        <section id="purity" class="space-y-4">
            <div class="flex items-center gap-3 border-b border-white/10 pb-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/20 text-emerald-300 border border-emerald-400/30 shrink-0">
                    <svg class="w-5 h-5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>
                </span>
                <div>
                    <h2 class="font-serif text-xl sm:text-2xl font-bold text-white">2. Botanical Science &amp; Cold Processing</h2>
                    <p class="text-xs text-white/70">Why low-temperature processing and slow stone-milling matter.</p>
                </div>
            </div>

            <div class="space-y-3 pt-2">
                <details class="group rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-5 sm:p-6 transition-all duration-300 open:border-emerald-400/40 open:bg-white/[0.1] open:shadow-lg text-white">
                    <summary class="flex cursor-pointer list-none items-center justify-between font-serif text-base sm:text-lg font-semibold text-white group-hover:text-emerald-300 [&::-webkit-details-marker]:hidden select-none">
                        <span class="pr-4">How does slow stone-milling and cold dehydration below 42&deg;C work?</span>
                        <svg class="w-5 h-5 text-emerald-400 shrink-0 transition-transform duration-300 group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    </summary>
                    <div class="pt-3 text-xs sm:text-sm text-white/80 leading-relaxed border-t border-white/10 mt-3 font-sans">
                        Commercial factories use high-speed hammer mills exceeding 80&deg;C&ndash;160&deg;C, which scorches essential volatile oils and degrades sensitive enzymes and chlorophyll. At <strong class="text-white">MAN AGRO FOODS</strong>, we operate closed-loop low-temperature vacuum dehydration chambers and traditional stone grinders operating strictly below 42&deg;C. This preserves the natural aroma, vibrant color, and active phytonutrients in every pinch.
                    </div>
                </details>

                <details class="group rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-5 sm:p-6 transition-all duration-300 open:border-emerald-400/40 open:bg-white/[0.1] open:shadow-lg text-white">
                    <summary class="flex cursor-pointer list-none items-center justify-between font-serif text-base sm:text-lg font-semibold text-white group-hover:text-emerald-300 [&::-webkit-details-marker]:hidden select-none">
                        <span class="pr-4">What is the shelf life of Navanidhi Naturals products?</span>
                        <svg class="w-5 h-5 text-emerald-400 shrink-0 transition-transform duration-300 group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    </summary>
                    <div class="pt-3 text-xs sm:text-sm text-white/80 leading-relaxed border-t border-white/10 mt-3 font-sans">
                        Our hermetically sealed, nitrogen-flushed packages have a shelf life of <strong class="text-white">12 to 18 months</strong> from the date of manufacture when stored in a cool, dry pantry away from direct sunlight. Once unsealed, we recommend consuming within 6 to 9 months for peak aroma and potency.
                    </div>
                </details>
            </div>
        </section>

        <!-- Group 3: Lab Testing & Certificates of Analysis -->
        <section id="testing" class="space-y-4">
            <div class="flex items-center gap-3 border-b border-white/10 pb-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/20 text-emerald-300 border border-emerald-400/30 shrink-0">
                    <svg class="w-5 h-5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 2v7.31L4.41 18.5A2 2 0 0 0 6 22h12a2 2 0 0 0 1.59-3.5L14 9.31V2"/><path d="M8.5 2h7"/><path d="M14 9.3a6.5 6.5 0 1 1-4 0"/></svg>
                </span>
                <div>
                    <h2 class="font-serif text-xl sm:text-2xl font-bold text-white">3. Laboratory Testing &amp; COA Reports</h2>
                    <p class="text-xs text-white/70">Independent NABL batch verification and quality reports.</p>
                </div>
            </div>

            <div class="space-y-3 pt-2">
                <details class="group rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-5 sm:p-6 transition-all duration-300 open:border-emerald-400/40 open:bg-white/[0.1] open:shadow-lg text-white">
                    <summary class="flex cursor-pointer list-none items-center justify-between font-serif text-base sm:text-lg font-semibold text-white group-hover:text-emerald-300 [&::-webkit-details-marker]:hidden select-none">
                        <span class="pr-4">How can I obtain the Certificate of Analysis (COA) for my product batch?</span>
                        <svg class="w-5 h-5 text-emerald-400 shrink-0 transition-transform duration-300 group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    </summary>
                    <div class="pt-3 text-xs sm:text-sm text-white/80 leading-relaxed border-t border-white/10 mt-3 font-sans">
                        Every pouch and jar features an explicit batch code stamped on the packaging. To receive a copy of your lot's independent NABL-accredited test report verifying heavy metal screening (lead, arsenic, cadmium, mercury), absence of synthetic dyes, and microbial safety, simply email your batch number to <a href="mailto:{{ $contactEmail }}" class="text-emerald-300 hover:text-emerald-200 underline font-semibold">{{ $contactEmail }}</a>.
                    </div>
                </details>

                <details class="group rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-5 sm:p-6 transition-all duration-300 open:border-emerald-400/40 open:bg-white/[0.1] open:shadow-lg text-white">
                    <summary class="flex cursor-pointer list-none items-center justify-between font-serif text-base sm:text-lg font-semibold text-white group-hover:text-emerald-300 [&::-webkit-details-marker]:hidden select-none">
                        <span class="pr-4">What standards does MAN AGRO FOODS adhere to?</span>
                        <svg class="w-5 h-5 text-emerald-400 shrink-0 transition-transform duration-300 group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    </summary>
                    <div class="pt-3 text-xs sm:text-sm text-white/80 leading-relaxed border-t border-white/10 mt-3 font-sans">
                        All products are manufactured and packed in our dedicated clean-room processing facility under Central FSSAI License No. 10020042001234. We operate in accordance with Good Manufacturing Practices (GMP) and ISO 22000 food safety management principles.
                    </div>
                </details>
            </div>
        </section>

        <!-- Group 4: Culinary & Wellness Rituals -->
        <section id="rituals" class="space-y-4">
            <div class="flex items-center gap-3 border-b border-white/10 pb-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/20 text-emerald-300 border border-emerald-400/30 shrink-0">
                    <svg class="w-5 h-5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                </span>
                <div>
                    <h2 class="font-serif text-xl sm:text-2xl font-bold text-white">4. Culinary &amp; Daily Ritual Guidance</h2>
                    <p class="text-xs text-white/70">How to cook with pure spices and incorporate living botanicals.</p>
                </div>
            </div>

            <div class="space-y-3 pt-2">
                <details class="group rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-5 sm:p-6 transition-all duration-300 open:border-emerald-400/40 open:bg-white/[0.1] open:shadow-lg text-white">
                    <summary class="flex cursor-pointer list-none items-center justify-between font-serif text-base sm:text-lg font-semibold text-white group-hover:text-emerald-300 [&::-webkit-details-marker]:hidden select-none">
                        <span class="pr-4">How do I use Navanidhi Red Chilli Powder and Lakadong Turmeric in cooking?</span>
                        <svg class="w-5 h-5 text-emerald-400 shrink-0 transition-transform duration-300 group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    </summary>
                    <div class="pt-3 text-xs sm:text-sm text-white/80 leading-relaxed border-t border-white/10 mt-3 font-sans">
                        Because our spices are 100% pure and unadulterated, they carry exceptional color and authentic heat:
                        <ul class="list-disc pl-5 mt-2 space-y-1.5 text-white/80">
                            <li><strong class="text-white">Red Chilli Powder:</strong> Add 1/2 to 1 teaspoon during tadka (tempering) or gravy simmering for a natural crimson hue and clean capsaicin warmth.</li>
                            <li><strong class="text-white">Lakadong Turmeric:</strong> Add 1/2 teaspoon to curries, dals, or whisk into warm milk with a pinch of black pepper (Haldi Doodh) for enhanced curcumin absorption.</li>
                        </ul>
                    </div>
                </details>

                <details class="group rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-5 sm:p-6 transition-all duration-300 open:border-emerald-400/40 open:bg-white/[0.1] open:shadow-lg text-white">
                    <summary class="flex cursor-pointer list-none items-center justify-between font-serif text-base sm:text-lg font-semibold text-white group-hover:text-emerald-300 [&::-webkit-details-marker]:hidden select-none">
                        <span class="pr-4">Can I mix botanical powders like Moringa and Amla together?</span>
                        <svg class="w-5 h-5 text-emerald-400 shrink-0 transition-transform duration-300 group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    </summary>
                    <div class="pt-3 text-xs sm:text-sm text-white/80 leading-relaxed border-t border-white/10 mt-3 font-sans">
                        Yes! Our single-origin botanical powders work synergistically. For instance, pairing Organic Moringa Leaf Powder with Wild Amla provides bioavailable plant iron alongside natural Vitamin C to maximize absorption. Whisk 1 teaspoon into warm water, smoothies, or fresh fruit juices.
                    </div>
                </details>
            </div>
        </section>

        <!-- Group 5: Shipping, Dispatch & Guarantee -->
        <section id="shipping" class="space-y-4">
            <div class="flex items-center gap-3 border-b border-white/10 pb-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/20 text-emerald-300 border border-emerald-400/30 shrink-0">
                    <svg class="w-5 h-5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                </span>
                <div>
                    <h2 class="font-serif text-xl sm:text-2xl font-bold text-white">5. Pan-India Dispatch &amp; Guarantee</h2>
                    <p class="text-xs text-white/70">Shipping SLAs, tracking, and our 100% Purity Guarantee.</p>
                </div>
            </div>

            <div class="space-y-3 pt-2">
                <details class="group rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-5 sm:p-6 transition-all duration-300 open:border-emerald-400/40 open:bg-white/[0.1] open:shadow-lg text-white">
                    <summary class="flex cursor-pointer list-none items-center justify-between font-serif text-base sm:text-lg font-semibold text-white group-hover:text-emerald-300 [&::-webkit-details-marker]:hidden select-none">
                        <span class="pr-4">What are your delivery timelines and shipping charges?</span>
                        <svg class="w-5 h-5 text-emerald-400 shrink-0 transition-transform duration-300 group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    </summary>
                    <div class="pt-3 text-xs sm:text-sm text-white/80 leading-relaxed border-t border-white/10 mt-3 font-sans">
                        Orders placed before 2:00 PM IST Monday through Saturday are dispatched within 24 business hours directly from our South India processing hub. Express air delivery takes <strong class="text-white">2&ndash;4 business days</strong> across major metros (Bengaluru, Hyderabad, Chennai, Mumbai, Delhi NCR, Kolkata) and <strong class="text-white">4&ndash;7 days</strong> for other pin codes. Free shipping applies to all orders valued at <strong class="text-white">&#8377;499 or above</strong> (a flat &#8377;50 charge applies for orders below &#8377;499).
                    </div>
                </details>

                <details class="group rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-5 sm:p-6 transition-all duration-300 open:border-emerald-400/40 open:bg-white/[0.1] open:shadow-lg text-white">
                    <summary class="flex cursor-pointer list-none items-center justify-between font-serif text-base sm:text-lg font-semibold text-white group-hover:text-emerald-300 [&::-webkit-details-marker]:hidden select-none">
                        <span class="pr-4">What is your replacement policy if my jar arrives damaged?</span>
                        <svg class="w-5 h-5 text-emerald-400 shrink-0 transition-transform duration-300 group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    </summary>
                    <div class="pt-3 text-xs sm:text-sm text-white/80 leading-relaxed border-t border-white/10 mt-3 font-sans">
                        Under our 100% Purity Guarantee, if your package arrives with transit damage or a broken induction seal, simply take a photo and message us on WhatsApp at <a href="https://wa.me/919876543210" class="text-emerald-300 hover:text-emerald-200 underline font-semibold">{{ $phone }}</a> or email <a href="mailto:{{ $contactEmail }}" class="text-emerald-300 hover:text-emerald-200 underline font-semibold">{{ $contactEmail }}</a> within 48 hours of delivery. We will dispatch a priority replacement immediately at zero additional charge.
                    </div>
                </details>
            </div>
        </section>

    </main>
</div>
