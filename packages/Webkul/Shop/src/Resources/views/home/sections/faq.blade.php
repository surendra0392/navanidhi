<!-- SECTION: FAQ ACCORDION -->
<section class="py-20 lg:py-28 bg-transparent border-b border-white/10 text-white relative" aria-labelledby="faq-heading">
    <div class="site-container">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
            {{-- Left: Header --}}
            <div class="lg:col-span-4 space-y-5">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-500/15 border border-emerald-400/30 text-emerald-300 nv-pulse-glow">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                    Common Questions
                </span>
                <h2 id="faq-heading" class="font-serif text-3xl sm:text-4xl lg:text-[2.75rem] font-black uppercase tracking-tight text-white leading-tight">
                    Frequently Asked Questions
                </h2>
                <p class="text-xs sm:text-sm text-emerald-100/80 leading-relaxed font-normal">
                    Everything you need to know about our authentic farm spices, cold-milled botanicals, unadulterated standards, and daily use.
                </p>
                <div class="pt-2">
                    <a
                        href="{{ route('shop.home.contact_us') }}"
                        class="nv-glass-btn-outline inline-flex text-xs font-bold uppercase tracking-wider px-6 py-3.5 items-center gap-2 group"
                    >
                        <span>Still Have Questions? Contact Us</span>
                        <svg class="w-4 h-4 text-emerald-300 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            {{-- Right: Accordion Cards --}}
            <div class="lg:col-span-8 space-y-4">
                @php
                    $faqItems = [
                        [
                            'q' => 'How are Navanidhi pure spices different from commercial market spices?',
                            'a' => 'Most commercial spices are blended with starch, sawdust, or spent extracts, and brightened with synthetic food dyes (such as Sudan dyes in chilli or lead chromate in turmeric). Navanidhi Naturals spices are 100% pure, stone-ground, and stemless—sourced directly by MAN Agro Foods from certified farmers in Guntur, Byadgi, and Meghalaya. We never use artificial colors, chemical preservatives, or fillers.',
                        ],
                        [
                            'q' => 'What makes Lakadong Turmeric Powder special?',
                            'a' => 'Lakadong turmeric from Meghalaya is world-renowned for its exceptionally high natural curcumin content of 7% to 9% (compared to regular turmeric which has only 2% to 3%). It provides far superior anti-inflammatory potency, a rich golden aroma, and deep color without any artificial coloring or polishing.',
                        ],
                        [
                            'q' => 'What does "cold-dehydrated & stone-ground" mean?',
                            'a' => 'High-heat industrial grinding burns off volatile essential oils, delicate aromas, and active phytonutrients. Our slow stone-grinding and low-temperature drying below 42°C preserve the plant\'s living integrity, native capsaicin warmth, curcumin oils, and vital enzymes just as Mother Nature intended.',
                        ],
                        [
                            'q' => 'How should I store Navanidhi spices and botanical powders?',
                            'a' => 'Store in an airtight container in a cool, dry place away from direct sunlight and humidity. Because our products contain zero artificial preservatives or chemical anti-caking agents, always use a clean, dry spoon to maintain freshness.',
                        ],
                        [
                            'q' => 'Are Navanidhi Naturals products lab-tested and certified?',
                            'a' => 'Yes. All products are manufactured in licensed facilities under MAN Agro Foods, certified by FSSAI, and independently tested by NABL-accredited laboratories for heavy metals, pesticide residues, aflatoxins, and zero chemical dyes.',
                        ],
                        [
                            'q' => 'What are your delivery timelines and shipping charges across India?',
                            'a' => 'We offer FREE standard delivery on all orders above ₹499 across India. Orders are dispatched within 24–48 hours from our facility, with delivery typically taking 2–4 business days for major cities and 4–6 business days for regional pin codes.',
                        ],
                    ];
                @endphp

                @foreach ($faqItems as $faq)
                    <details class="group rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-6 transition-all duration-300 open:border-emerald-400/40 open:bg-white/[0.09] open:shadow-[0_16px_36px_rgba(0,0,0,0.4)]">
                        <summary class="flex cursor-pointer list-none items-center justify-between font-serif text-base sm:text-lg font-bold text-white [&::-webkit-details-marker]:hidden select-none group-hover:text-emerald-300 transition-colors">
                            <span class="pr-4">{{ $faq['q'] }}</span>
                            <span class="w-8 h-8 rounded-full bg-emerald-500/20 group-open:bg-emerald-500 group-open:text-white text-emerald-300 flex items-center justify-center shrink-0 transition-all duration-300 border border-emerald-400/30">
                                <svg class="w-4 h-4 shrink-0 transition-transform duration-300 group-open:rotate-45" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                            </span>
                        </summary>
                        <div class="pt-4 text-xs sm:text-sm text-emerald-100/75 leading-relaxed border-t border-white/10 mt-4">
                            {{ $faq['a'] }}
                        </div>
                    </details>
                @endforeach
            </div>
        </div>
    </div>
</section>
