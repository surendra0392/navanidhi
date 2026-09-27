<!-- SECTION: BOTANICAL PROCESS & SOURCING TRANSPARENCY -->
<section class="py-20 lg:py-28 bg-transparent border-b border-white/10 relative overflow-hidden text-white" aria-labelledby="transparency-heading">
    <div class="site-container">
        <div class="grid grid-cols-1 items-center gap-16 lg:grid-cols-12">
            <div class="lg:col-span-7 space-y-6">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-500/15 border border-emerald-400/30 text-emerald-300 nv-pulse-glow">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                    Radical Transparency
                </span>
                <h2 id="transparency-heading" class="font-serif text-3xl sm:text-4xl lg:text-5xl font-black uppercase tracking-tight text-white leading-tight">
                    Uncompromised integrity from soil to formulation.
                </h2>
                <p class="text-sm sm:text-base leading-relaxed text-emerald-100/80 max-w-xl font-normal">
                    We partner directly with smallholder Indian farming families across Guntur, Byadgi, Meghalaya, and Tamil Nadu. Every spice harvest is naturally sun-cured and slow stone-milled by MAN AGRO FOODS, while our botanicals undergo vacuum drying below 42°C with rigorous NABL testing for zero Sudan dyes, zero lead chromate, and zero fillers.
                </p>

                <div class="pt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @php
                        $processSteps = [
                            ['num' => '01', 'title' => 'Direct Indian Farms', 'desc' => 'Direct grower partnerships in Guntur, Byadgi, Meghalaya & Tamil Nadu.'],
                            ['num' => '02', 'title' => 'Cold-Milled < 42°C', 'desc' => 'Slow stone-ground & vacuum dried to safeguard live enzymes and essential oils.'],
                            ['num' => '03', 'title' => 'Lab Verified Purity', 'desc' => 'NABL certified for zero Sudan dyes, zero lead chromate, and zero fillers.'],
                            ['num' => '04', 'title' => 'Airtight Barrier', 'desc' => 'Multi-barrier protective food packaging guarding against photo-oxidation.'],
                        ];
                    @endphp

                    @foreach ($processSteps as $step)
                        <div class="group flex items-start gap-3.5 p-4 sm:p-5 rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl shadow-[0_12px_30px_rgba(0,0,0,0.3)] hover:border-emerald-400/40 transition-all duration-300">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-700 text-white font-serif font-bold text-xs shadow-xs">
                                {{ $step['num'] }}
                            </span>
                            <div>
                                <h3 class="font-serif text-sm font-bold text-white group-hover:text-emerald-300 transition-colors">
                                    {{ $step['title'] }}
                                </h3>
                                <p class="text-xs text-emerald-100/70 mt-0.5 leading-relaxed">
                                    {{ $step['desc'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Visual Showcase Card -->
            <div class="lg:col-span-5">
                <div class="nv-glass-card rounded-3xl bg-white/[0.06] backdrop-blur-xl p-8 sm:p-10 border border-white/15 shadow-[0_20px_48px_-12px_rgba(0,0,0,0.5)] space-y-6 text-center relative overflow-hidden">
                    <div class="absolute top-0 inset-x-0 h-1.5 bg-gradient-to-r from-emerald-400 via-[#D4A359] to-emerald-400"></div>

                    <div class="rounded-2xl bg-white/[0.04] flex flex-col items-center justify-center p-8 border border-white/10 space-y-4">
                        <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-emerald-600 to-emerald-800 text-white flex items-center justify-center shadow-lg transform -rotate-3 hover:rotate-0 transition-transform duration-300 border border-white/20">
                            <span class="material-symbols-outlined text-4xl text-[#E6C687]">eco</span>
                        </div>
                        <h3 class="font-serif text-2xl font-bold text-white pt-1">
                            The Clean-Label Standard
                        </h3>
                        <p class="text-xs sm:text-sm text-emerald-100/75 max-w-xs leading-relaxed">
                            No synthetic additives, zero maltodextrin bulking agents, and 100% whole plant nourishment in every batch.
                        </p>
                        <div class="flex items-center justify-center gap-2 pt-1 text-[11px] font-bold text-emerald-300">
                            <svg class="w-4 h-4 text-emerald-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <span>MAN Agro Foods Verified Purity</span>
                        </div>
                    </div>

                    <div class="pt-2 flex items-center justify-center gap-6 text-xs text-emerald-100/70">
                        <div class="flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                            <span>Single Origin</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-[#D4A359]"></span>
                            <span>FSSAI Certified</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                            <span>NABL Tested</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
