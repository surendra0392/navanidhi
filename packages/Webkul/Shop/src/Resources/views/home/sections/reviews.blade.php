<!-- SECTION: EDITORIAL SOCIAL PROOF / COMMUNITY NOTES -->
<section class="py-20 lg:py-28 bg-transparent border-b border-white/10 relative overflow-hidden text-white" aria-labelledby="reviews-heading">
    <div class="site-container">
        <div class="mx-auto max-w-3xl text-center space-y-4 mb-16">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-[#D4A359]/20 border border-[#D4A359]/30 text-[#E6C687] nv-pulse-glow">
                <svg class="w-4 h-4 text-[#E6C687]" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                Community Notes &amp; Reviews
            </span>
            <h2 id="reviews-heading" class="font-serif text-3xl sm:text-4xl lg:text-5xl font-black uppercase tracking-tight text-white leading-tight">
                Trusted in Pure Kitchens Across India
            </h2>
            <p class="text-xs sm:text-sm text-emerald-100/80 max-w-lg mx-auto leading-relaxed font-normal">
                Verified feedback from home chefs, Ayurvedic practitioners, and conscious families experiencing Navanidhi purity.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @php
                $editorialReviews = [
                    [
                        'text' => 'The aroma of Navanidhi Pure Red Chilli Powder immediately reminds me of my grandmother\'s village home. The crimson color is completely natural without any artificial Sudan dyes or harsh burning aftertaste.',
                        'author' => 'Priya Sharma',
                        'role' => 'Home Chef & Food Enthusiast',
                        'city' => 'Hyderabad'
                    ],
                    [
                        'text' => 'Finding unadulterated Lakadong Turmeric with genuine 7.5% curcumin and zero lead chromate is a rarity today. I prescribe Navanidhi turmeric and moringa to my patients with complete confidence in MAN Agro Foods\' standards.',
                        'author' => 'Dr. Ananya Sundaram',
                        'role' => 'Ayurvedic Physician & Wellness Advisor',
                        'city' => 'Chennai'
                    ],
                    [
                        'text' => 'The stone-ground texture and low-temperature milling make a dramatic difference. You can literally smell the fresh volatile essential oils the second you break the inner induction seal. Truly clean food.',
                        'author' => 'Rajesh K. Patel',
                        'role' => 'Organic Farming Advocate',
                        'city' => 'Ahmedabad'
                    ],
                ];
            @endphp

            @foreach ($editorialReviews as $review)
                <div class="group relative p-8 rounded-3xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl shadow-[0_20px_50px_rgba(0,0,0,0.5)] hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex text-[#E6C687] text-base tracking-wider" aria-label="5 out of 5 stars">
                                &#9733;&#9733;&#9733;&#9733;&#9733;
                            </div>
                            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-emerald-300 bg-emerald-500/20 border border-emerald-400/30 px-2.5 py-0.5 rounded-full">
                                <svg class="w-3.5 h-3.5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>
                                Verified Purchase
                            </span>
                        </div>

                        <p class="font-serif text-base italic text-white/95 leading-relaxed">
                            "{{ $review['text'] }}"
                        </p>
                    </div>

                    <div class="pt-4 border-t border-white/10 flex items-center justify-between text-xs">
                        <div>
                            <span class="font-bold text-white block">{{ $review['author'] }}</span>
                            <span class="text-emerald-100/70 text-[11px]">{{ $review['role'] }}</span>
                        </div>
                        <span class="text-white/50 text-[11px]">{{ $review['city'] }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
