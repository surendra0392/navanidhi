<!-- SECTION 13: AXOLYT-BENCHMARKED FROSTED NEWSLETTER & COMMUNITY CTA -->
<section class="py-16 sm:py-20 lg:py-24 bg-transparent relative overflow-hidden text-white border-b border-white/10" aria-labelledby="newsletter-heading">
    {{-- Ambient Radiant Glows --}}
    <div class="absolute -top-24 right-1/4 w-96 h-96 rounded-full blur-[130px] pointer-events-none bg-emerald-500/15"></div>
    <div class="absolute -bottom-24 left-1/4 w-96 h-96 rounded-full blur-[130px] pointer-events-none bg-[#D4A359]/10"></div>

    <div class="site-container relative z-10">
        {{-- Frosted Glass Container (Image 2 Axolyt Benchmark) --}}
        <div class="nv-glass-card p-8 sm:p-12 lg:p-14 border border-white/15 bg-white/[0.05] backdrop-blur-xl">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                
                {{-- Left: Brand Monogram & Message --}}
                <div class="lg:col-span-6 space-y-4">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/15 border border-emerald-400/30 text-emerald-300 text-xs font-bold uppercase tracking-wider">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                        Stay In The Loop
                    </div>

                    <h2 id="newsletter-heading" class="font-serif text-2xl sm:text-3xl lg:text-4xl font-extrabold uppercase tracking-tight text-white leading-tight">
                        Fresh Harvests &bull; Direct To You
                    </h2>

                    <p class="text-xs sm:text-sm text-emerald-100/75 leading-relaxed font-normal max-w-md">
                        Get exclusive offers, smallholder farm harvest alerts from MAN Agro Foods, and wholesome botanical recipes delivered to your inbox.
                    </p>
                </div>

                {{-- Right: Form Input & Subscribe Pill Button --}}
                <div class="lg:col-span-6">
                    <form
                        action="{{ route('shop.subscription.store') }}"
                        method="POST"
                        class="flex flex-col sm:flex-row gap-3"
                    >
                        @csrf

                        <label for="newsletter-email" class="sr-only">Email address</label>
                        <input
                            id="newsletter-email"
                            type="email"
                            name="email"
                            required
                            placeholder="Your email address"
                            class="nv-newsletter-input flex-1 px-5 py-3.5 rounded-full text-white placeholder-emerald-200/50 text-xs sm:text-sm"
                            autocomplete="email"
                        />

                        <button
                            type="submit"
                            class="nv-newsletter-btn px-8 py-3.5 rounded-full text-xs uppercase tracking-widest font-bold text-white whitespace-nowrap shadow-lg cursor-pointer"
                        >
                            <span>Subscribe</span>
                        </button>
                    </form>

                    <p class="text-[11px] text-emerald-200/50 mt-3 sm:text-left text-center">
                        Zero spam, ever. Unsubscribe with a single click anytime.
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>
