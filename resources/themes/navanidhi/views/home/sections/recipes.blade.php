@props([
    'recipes' => collect(),
])

@if ($recipes->count())
    <!-- SECTION: JOURNAL & FIELD NOTES -->
    <section class="py-20 lg:py-28 bg-transparent border-b border-white/10 relative text-white" aria-labelledby="journal-heading">
        <div class="site-container">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-14">
                <div class="space-y-3">
                    <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-500/15 border border-emerald-400/30 text-emerald-300 nv-pulse-glow">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                        Journal & Field Notes
                    </span>
                    <h2 id="journal-heading" class="font-serif text-3xl sm:text-4xl lg:text-5xl font-black uppercase tracking-tight text-white leading-tight">
                        Culinary Creations &amp; Botanical Recipes
                    </h2>
                    <p class="text-xs sm:text-sm text-emerald-100/80 max-w-lg leading-relaxed font-normal">
                        Authentic farm spice recipes, cold-dehydration science, and wholesome daily preparations crafted with Navanidhi Naturals.
                    </p>
                </div>

                <a
                    href="{{ route('shop.recipes.index') }}"
                    class="nv-glass-btn-outline self-start md:self-auto text-xs font-bold uppercase tracking-wider px-6 py-3.5 inline-flex items-center gap-2 group"
                >
                    <span>View All Recipes</span>
                    <span class="material-symbols-outlined text-sm transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
                </a>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                @foreach ($recipes as $recipe)
                    <x-shop::recipes.card :recipe="$recipe" />
                @endforeach
            </div>
        </div>
    </section>
@endif
