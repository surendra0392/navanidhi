<!-- SECTION: WHY NAVANIDHI NATURALS — COMPARISON TABLE -->
<section class="py-20 lg:py-28 bg-transparent border-b border-white/10 relative overflow-hidden text-white" aria-labelledby="comparison-heading">
    <div class="site-container">
        <div class="mx-auto max-w-3xl text-center space-y-4 mb-14">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-500/15 border border-emerald-400/30 text-emerald-300 nv-pulse-glow">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                The Clean Standard Difference
            </span>
            <h2 id="comparison-heading" class="font-serif text-3xl sm:text-4xl lg:text-5xl font-black uppercase tracking-tight text-white leading-tight">
                Why Choose Navanidhi Naturals?
            </h2>
            <p class="text-xs sm:text-sm text-emerald-100/80 max-w-lg mx-auto leading-relaxed font-normal">
                See how our pure farm spices and cold-dehydrated botanicals compare to conventional high-heat mass market brands.
            </p>
        </div>

        <div class="max-w-4xl mx-auto">
            <div class="nv-glass-card overflow-hidden rounded-3xl border border-white/15 bg-white/[0.06] backdrop-blur-xl shadow-[0_20px_50px_rgba(0,0,0,0.5)]" role="table" aria-label="Navanidhi vs conventional brands comparison">
                {{-- Table Header --}}
                <div class="grid grid-cols-3 text-white" style="background: rgba(4, 26, 14, 0.85) !important;" role="row">
                    <div class="p-5 sm:p-6 text-xs font-bold uppercase tracking-widest border-r border-white/10 flex items-center" role="columnheader">
                        Formulation Criteria
                    </div>
                    <div class="p-5 sm:p-6 text-center text-xs font-bold uppercase tracking-widest border-r border-white/10" style="background: rgba(16, 185, 129, 0.15) !important;" role="columnheader">
                        <span class="inline-flex items-center gap-1.5 text-[#E6C687] font-extrabold text-sm tracking-normal">
                            <svg class="w-4 h-4 text-[#E6C687]" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd"/></svg>
                            Navanidhi Naturals
                        </span>
                    </div>
                    <div class="p-5 sm:p-6 text-center text-xs font-bold uppercase tracking-widest text-white/60 flex items-center justify-center" role="columnheader">
                        Commercial Brands
                    </div>
                </div>

                @php
                    $comparisonRows = [
                        ['Processing Method', 'Slow Stone-Ground & Cold Dried <42°C', 'High-Heat Commercial Milling (burns aroma & oils)'],
                        ['Food Dyes & Additives', '100% Natural Hue (Sudan Dye & Lead Chromate Free)', 'Synthetic Colorants, Metanil Yellow, Sudan Dyes'],
                        ['Fillers & Starches', 'Zero Fillers, Flour, or Anti-Caking Silica', 'Maltodextrin, Starch, Sawdust & Spent Turmeric'],
                        ['Ingredient Integrity', '100% Whole Farm Spices & Pure Botanicals', 'Diluted Blends, Extracted Isolates & Waste Stalks'],
                        ['Essential Oils & Potency', 'High Native Capsaicin & 7–9% Curcumin Intact', 'Extracted Oleoresins (Flavor-Stripped Residuals)'],
                        ['Batch Safety Testing', 'Independent NABL-Accredited Lab Verified', 'Minimal / Unverified Open-Market Lots'],
                    ];
                @endphp

                @foreach ($comparisonRows as $index => $row)
                    <div class="grid grid-cols-3 {{ $index % 2 === 0 ? 'bg-white/[0.03]' : 'bg-white/[0.06]' }} {{ $index < count($comparisonRows) - 1 ? 'border-b border-white/10' : '' }} transition-colors hover:bg-emerald-500/10" role="row">
                        <div class="p-4 sm:p-6 text-xs sm:text-sm font-semibold text-white border-r border-white/10 flex items-center" role="cell">
                            {{ $row[0] }}
                        </div>
                        <div class="p-4 sm:p-6 text-center border-r border-white/10 bg-emerald-500/5 flex items-center justify-center" role="cell">
                            <span class="inline-flex items-center gap-2 text-xs sm:text-sm font-bold text-emerald-300">
                                <span class="w-5 h-5 rounded-full bg-emerald-500/20 flex items-center justify-center text-emerald-300 shrink-0">
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                </span>
                                {{ $row[1] }}
                            </span>
                        </div>
                        <div class="p-4 sm:p-6 text-center text-xs sm:text-sm text-white/50 flex items-center justify-center" role="cell">
                            <span class="inline-flex items-center gap-1.5">
                                <span class="w-4 h-4 rounded-full bg-red-500/20 flex items-center justify-center text-red-400 shrink-0 text-xs">✕</span>
                                {{ $row[2] }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
