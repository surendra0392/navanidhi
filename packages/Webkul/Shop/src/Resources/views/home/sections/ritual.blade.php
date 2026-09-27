<!-- SECTION: THE DAILY RITUAL SEQUENCE -->
<section class="py-20 lg:py-28 relative overflow-hidden text-white border-b border-white/10" style="background: transparent !important;" aria-labelledby="ritual-heading">
    <!-- Radial lighting accents -->
    <div class="absolute -top-32 -left-32 w-96 h-96 rounded-full blur-3xl pointer-events-none" style="background: rgba(212, 163, 89, 0.12) !important;"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 rounded-full blur-3xl pointer-events-none" style="background: rgba(13, 92, 58, 0.25) !important;"></div>

    <div class="site-container relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-5 space-y-6">
                <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider text-[#D4A359]" style="background: rgba(212, 163, 89, 0.15) !important; border: 1px solid rgba(212, 163, 89, 0.3) !important;">
                    <svg class="w-4 h-4 text-[#D4A359]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                    Daily Ritual Sequence
                </span>
                <h2 id="ritual-heading" class="font-serif text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-tight">
                    Seamless Integration Into Daily Life
                </h2>
                <p class="text-sm text-white/85 leading-relaxed">
                    Because our formulations contain zero synthetic anti-caking gums or maltodextrin carriers, they dissolve naturally in water, teas, tonics, or warm plant milks without clumping.
                </p>
                <div class="pt-2">
                    <a
                        href="{{ route('shop.product_or_category.index', 'products') }}"
                        class="btn-gold-accent inline-flex items-center gap-2 text-xs font-bold px-8 py-3.5 shadow-xl"
                    >
                        <span>Begin Your Ritual</span>
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-7 space-y-4">
                @php
                    $ritualSteps = [
                        [
                            'step' => '01',
                            'title' => 'Morning Awakening &amp; Cleansing',
                            'time' => '07:00 AM',
                            'svg' => '<circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>',
                            'desc' => 'Whisk 1 scoop of Moringa Green Vitality into 250ml of cold spring water with fresh lime juice for cellular alkalization and clean morning hydration.'
                        ],
                        [
                            'step' => '02',
                            'title' => 'Midday Nourishment &amp; Pure Warmth',
                            'time' => '01:30 PM',
                            'svg' => '<path d="M13 2 3 14h9l-1 8 10-12h-9l1-8z"/>',
                            'desc' => 'Infuse your midday meal with stone-ground Pure Red Chilli & Lakadong Turmeric, or blend 1 scoop of Spirulina into a cool drink for sustained, jitter-free vitality.'
                        ],
                        [
                            'step' => '03',
                            'title' => 'Evening Restorative Recovery',
                            'time' => '08:30 PM',
                            'svg' => '<path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/>',
                            'desc' => 'Stir 1 scoop of KSM-66 Ashwagandha into warm oat or almond milk with a touch of raw cardamom to calm the nervous system for regenerative sleep.'
                        ],
                    ];
                @endphp

                @foreach ($ritualSteps as $step)
                    <div class="group p-6 rounded-2xl transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl space-y-3" style="background: rgba(255, 255, 255, 0.08) !important; border: 1px solid rgba(255, 255, 255, 0.15) !important;">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <span class="w-8 h-8 rounded-xl text-[#D4A359] flex items-center justify-center font-bold text-xs" style="background: rgba(212, 163, 89, 0.2) !important;">
                                    <svg class="w-4 h-4 text-[#D4A359]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">{!! $step['svg'] !!}</svg>
                                </span>
                                <h3 class="font-serif text-base sm:text-lg font-bold text-white group-hover:text-[#D4A359] transition-colors">
                                    {{ $step['step'] }}. {!! $step['title'] !!}
                                </h3>
                            </div>
                            <span class="text-[11px] font-mono uppercase tracking-wider text-[#D4A359] font-bold px-2.5 py-0.5 rounded-full shrink-0" style="background: rgba(212, 163, 89, 0.15) !important; border: 1px solid rgba(212, 163, 89, 0.3) !important;">
                                {{ $step['time'] }}
                            </span>
                        </div>
                        <p class="text-xs sm:text-sm text-white/80 leading-relaxed pl-11">
                            {{ $step['desc'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
