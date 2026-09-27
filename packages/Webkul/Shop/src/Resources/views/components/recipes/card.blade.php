@props([
    'recipe',
])

@php
    $urlKey = $recipe->url_key ?? $recipe->slug ?? $recipe->id ?? '';
    $recipeUrl = route('shop.recipes.view', $urlKey);
    $title = $recipe->name ?? $recipe->page_title ?? $recipe->title ?? '';
    $description = $recipe->description ?? $recipe->short_description ?? $recipe->meta_description ?? '';
    $prepTime = $recipe->prep_time ?? $recipe->cooking_time ?? 5;
    $difficulty = $recipe->difficulty ?? 1;
    $difficultyText = $difficulty == 1 ? 'Easy' : ($difficulty == 2 ? 'Medium' : 'Advanced');
    
    $imagePath = $recipe->featured_image ?? $recipe->image ?? null;
    if (! $imagePath && ! empty($recipe->html_content) && preg_match('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $recipe->html_content, $matches)) {
        $imagePath = $matches[1];
        $imagePath = str_replace(['/storage/', 'storage/'], '', $imagePath);
    }
    $recipeImage = $imagePath ? \Illuminate\Support\Facades\Storage::url($imagePath) : bagisto_asset('images/large-product-placeholder.webp');
@endphp

<article {{ $attributes->merge(['class' => 'nv-card nv-recipe-card group relative flex flex-col justify-between p-3.5 sm:p-4 overflow-hidden transition-all duration-500 hover:border-emerald-400/50 hover:bg-white/[0.1] hover:-translate-y-2 hover:shadow-[0_28px_60px_-10px_rgba(0,0,0,0.7),0_0_35px_rgba(16,185,129,0.22)]']) }}
    style="border-radius: 28px !important; background: rgba(4, 26, 14, 0.78) !important; backdrop-filter: blur(20px) !important; -webkit-backdrop-filter: blur(20px) !important; border: 1px solid rgba(255, 255, 255, 0.16) !important; box-shadow: 0 16px 40px -10px rgba(0, 0, 0, 0.5), inset 0 1px 0 rgba(255, 255, 255, 0.12) !important; overflow: hidden !important;"
>
    <!-- Image Stage: Framed with rounded corners -->
    <a href="{{ $recipeUrl }}" class="relative block aspect-[16/10] w-full overflow-hidden shadow-inner" style="border-radius: 20px !important; overflow: hidden !important; background: rgba(0, 0, 0, 0.4);" aria-label="{{ $title }}">
        <img
            src="{{ $recipeImage }}"
            alt="{{ $title }}"
            loading="lazy"
            class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-108"
            style="border-radius: 20px !important;"
        />

        <!-- Gradient Fade to Blend Image into Glass Card -->
        <div class="absolute inset-x-0 bottom-0 h-16 bg-gradient-to-t from-[#041a0e]/95 via-[#041a0e]/40 to-transparent pointer-events-none z-[4]" style="border-radius: 0 0 20px 20px !important;"></div>

        <!-- Badges: Premium Green Blur Background (High Contrast & Botanical Luxury) -->
        <div class="absolute top-3 left-3 right-3 flex items-center justify-between pointer-events-none gap-2 z-[10]">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 text-[10px] font-bold uppercase tracking-wider shadow-sm"
                style="background: rgba(4, 34, 18, 0.85) !important; backdrop-filter: blur(12px) !important; -webkit-backdrop-filter: blur(12px) !important; border: 1px solid rgba(52, 211, 153, 0.5) !important; color: #6EE7B7 !important; border-radius: 9999px !important; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4) !important;">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.8)]"></span>
                Botanical Ritual
            </span>

            <span class="inline-flex items-center px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider shadow-sm"
                style="background: rgba(4, 34, 18, 0.85) !important; backdrop-filter: blur(12px) !important; -webkit-backdrop-filter: blur(12px) !important; border: 1px solid rgba(52, 211, 153, 0.45) !important; color: #ECFDF5 !important; border-radius: 9999px !important; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4) !important;">
                {{ $difficultyText }}
            </span>
        </div>

        <!-- Prep Time Badge: Green Blur Background with Warm Gold Clock Icon -->
        <div class="absolute bottom-3 left-3 px-3 py-1 text-[10px] font-bold tracking-wider uppercase flex items-center gap-1.5 z-[10]"
            style="background: rgba(4, 34, 18, 0.85) !important; backdrop-filter: blur(12px) !important; -webkit-backdrop-filter: blur(12px) !important; border: 1px solid rgba(52, 211, 153, 0.45) !important; color: #FFFFFF !important; border-radius: 9999px !important; box-shadow: 0 4px 14px rgba(0, 0, 0, 0.45) !important;">
            <span class="material-symbols-outlined text-xs text-[#FCD34D]">schedule</span>
            <span class="text-white font-bold">{{ $prepTime }} Mins Prep</span>
        </div>
    </a>

    <!-- Details -->
    <div class="p-4 sm:p-5 flex flex-col flex-1 justify-between gap-5 bg-transparent">
        <div class="space-y-2.5">
            <div class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-[#D4A359] whitespace-nowrap overflow-hidden">
                <span class="whitespace-nowrap">Botanical Kitchen</span>
                <span class="text-emerald-400/70 shrink-0">•</span>
                <span class="whitespace-nowrap">Daily Ritual</span>
            </div>

            <h3 class="font-serif text-xl sm:text-2xl font-bold text-white group-hover:text-emerald-300 transition-colors line-clamp-2 leading-snug">
                <a href="{{ $recipeUrl }}" class="text-white hover:text-emerald-300 transition-colors">
                    {{ $title }}
                </a>
            </h3>

            @if ($description)
                <p class="text-xs sm:text-[13px] text-white/75 line-clamp-2 leading-relaxed font-normal">
                    {{ strip_tags($description) }}
                </p>
            @endif
        </div>

        <div class="pt-4 border-t flex items-center justify-between" style="border-color: rgba(255, 255, 255, 0.12);">
            <a
                href="{{ $recipeUrl }}"
                class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-emerald-400 group-hover:text-emerald-300 transition-colors"
            >
                <span>Read Recipe</span>
                <span class="material-symbols-outlined text-sm transition-transform duration-300 group-hover:translate-x-1.5">arrow_forward</span>
            </a>

            @if ($recipe->products_count ?? false)
                <span class="text-[11px] font-semibold px-2.5 py-0.5"
                    style="background: rgba(4, 34, 18, 0.82) !important; backdrop-filter: blur(10px) !important; border: 1px solid rgba(52, 211, 153, 0.4) !important; color: #6EE7B7 !important; border-radius: 9999px !important;">
                    {{ $recipe->products_count }} Ingredients
                </span>
            @endif
        </div>
    </div>
</article>
