@inject('productRepository', 'Webkul\Product\Repositories\ProductRepository')

@php
    use Webkul\CMS\Models\Page;

    $channel = core()->getCurrentChannel();

    // Query 8 Featured Products
    $featuredProducts = app('Webkul\Product\Repositories\ProductRepository')->getModel()
        ->with(['attribute_values.attribute', 'images', 'variants', 'inventories'])
        ->whereHas('attribute_values', function($q) {
            $q->whereHas('attribute', fn($q2) => $q2->where('code', 'status'))
              ->where('boolean_value', 1);
        })
        ->whereHas('attribute_values', function($q) {
            $q->whereHas('attribute', fn($q2) => $q2->where('code', 'visible_individually'))
              ->where('boolean_value', 1);
        })
        ->orderBy('updated_at', 'desc')
        ->take(8)->get();

    // Query 4 Best Sellers
    $bestSellers = app('Webkul\Product\Repositories\ProductRepository')->getModel()
        ->with(['attribute_values.attribute', 'images', 'variants', 'inventories'])
        ->whereHas('attribute_values', function($q) {
            $q->whereHas('attribute', fn($q2) => $q2->where('code', 'status'))
              ->where('boolean_value', 1);
        })
        ->whereHas('attribute_values', function($q) {
            $q->whereHas('attribute', fn($q2) => $q2->where('code', 'visible_individually'))
              ->where('boolean_value', 1);
        })
        ->orderBy('id', 'asc')
        ->take(4)->get();

    // Query 3 featured recipes for Journal section
    $featuredRecipes = app('Webkul\Recipe\Repositories\RecipeRepository')->getModel()
        ->with('translations')
        ->where('status', 1)
        ->orderBy('updated_at', 'desc')
        ->take(3)
        ->get();
@endphp

<!-- SEO Meta Content -->
@push ('meta')
    @php
        $homeTitle = $channel->home_seo['meta_title'] ?? 'Navanidhi Naturals — Authentic Farm Spices & Pure Botanical Nutrition | MAN Agro Foods';
        $homeDesc  = $channel->home_seo['meta_description'] ?? 'Navanidhi Naturals by MAN Agro Foods offers stone-milled farm spices, pure Red Chilli Powder, high-curcumin Lakadong Turmeric, and cold-dehydrated botanicals with zero Sudan dyes, zero lead chromate, and zero fillers.';
        $homeKeys  = $channel->home_seo['meta_keywords'] ?? 'pure spices, red chilli powder, lakadong turmeric powder, farm spices, stone milled spices, zero sudan dyes, zero lead chromate, organic moringa, botanical powders, Navanidhi Naturals, MAN Agro Foods';

        $webPageSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => $homeTitle,
            'description' => $homeDesc,
            'url' => url('/'),
            'isPartOf' => [
                '@type' => 'WebSite',
                '@id' => url('/') . '/#website',
                'name' => 'Navanidhi Naturals',
                'url' => url('/'),
            ],
            'about' => [
                '@type' => 'Organization',
                '@id' => url('/') . '/#organization',
                'name' => 'Navanidhi Naturals',
                'legalName' => 'MAN Agro Foods',
            ],
        ];
    @endphp

    <meta
        name="title"
        content="{{ $homeTitle }}"
    />

    <meta
        name="description"
        content="{{ $homeDesc }}"
    />

    <meta
        name="keywords"
        content="{{ $homeKeys }}"
    />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $homeTitle }}" />
    <meta name="twitter:description" content="{{ $homeDesc }}" />

    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $homeTitle }}" />
    <meta property="og:description" content="{{ $homeDesc }}" />
    <meta property="og:url" content="{{ url('/') }}" />

    {{-- Enhanced JSON-LD: WebPage + ItemList for featured products --}}
    <script type="application/ld+json">
    {!! json_encode($webPageSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
@endpush

@push('scripts')
    @if(! empty($categories))
        <script>
            localStorage.setItem('categories', JSON.stringify(@json($categories)));
        </script>
    @endif
@endpush

{{-- Define missing CSS utility classes used throughout the homepage --}}
@pushOnce('styles')
<style>
    /* Site Container — responsive content width wrapper */
    .site-container {
        width: 100%;
        max-width: 1280px;
        margin-left: auto;
        margin-right: auto;
        padding-left: 1.25rem;
        padding-right: 1.25rem;
    }
    @media (min-width: 640px) {
        .site-container {
            padding-left: 2rem;
            padding-right: 2rem;
        }
    }
    @media (min-width: 1024px) {
        .site-container {
            padding-left: 3rem;
            padding-right: 3rem;
        }
    }

    /* Navanidhi Eyebrow — uppercase section label */
    .navanidhi-eyebrow,
    .elior-eyebrow {
        display: inline-block;
        font-size: 0.6875rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.2em;
        color: #205132;
    }

    /* Navanidhi Outline Button */
    .navanidhi-btn-outline,
    .elior-btn-outline {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.625rem 1.5rem;
        border: 1.5px solid #205132;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        color: #205132;
        background: transparent;
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
        cursor: pointer;
    }
    .navanidhi-btn-outline:hover,
    .elior-btn-outline:hover {
        background-color: #205132;
        color: #ffffff;
    }

    /* Gold CTA Button */
    .gold-cta-btn {
        display: inline-flex;
        align-items: center;
        padding: 0.875rem 2rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        color: #ffffff;
        background: linear-gradient(135deg, #c9a25a 0%, #b08a43 100%);
        box-shadow: 0 8px 24px -4px rgba(201, 162, 90, 0.35);
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
        cursor: pointer;
    }
    .gold-cta-btn:hover {
        filter: brightness(1.1);
        transform: translateY(-1px);
    }

    /* Marquee animation */
    @keyframes marquee {
        0% { transform: translateX(0%); }
        100% { transform: translateX(-50%); }
    }
    .animate-marquee {
        animation: marquee 30s linear infinite;
    }
    @media (prefers-reduced-motion: reduce) {
        .animate-marquee {
            animation: none;
        }
    }
</style>
@endPushOnce

<x-shop::layouts :has-feature="false">
    <!-- Page Title -->
    <x-slot:title>
        {{  $channel->home_seo['meta_title'] ?? 'Navanidhi Naturals — Pure Plant-Based Botanical Nutrition' }}
    </x-slot>

    <!-- SECTION 1: COMMANDING EDITORIAL HERO -->
    @include('shop::home.sections.hero')

    <!-- SECTION 2: BOTANICAL CATEGORIES DIRECTORY -->
    @include('shop::home.sections.categories', ['categories' => $categories ?? collect()])

    <!-- SECTION 3: BRAND PHILOSOPHY & MANIFESTO -->
    @include('shop::home.sections.philosophy')

    <!-- SECTION 4: FEATURED PRODUCTS CATALOG -->
    @include('shop::home.sections.featured-products', ['products' => $featuredProducts])

    <!-- SECTION 5: BESTSELLERS / MOST LOVED STRIP -->
    @include('shop::home.sections.bestsellers', ['products' => $bestSellers])

    <!-- SECTION 6: INGREDIENT & BOTANICAL SPOTLIGHT -->
    @include('shop::home.sections.ingredients')

    <!-- SECTION 7: WHY NAVANIDHI NATURALS — COMPARISON TABLE -->
    @include('shop::home.sections.comparison')

    <!-- SECTION 8: THE DAILY RITUAL SEQUENCE -->
    @include('shop::home.sections.ritual')

    <!-- SECTION 9: BOTANICAL PROCESS & SOURCING TRANSPARENCY -->
    @include('shop::home.sections.transparency')

    <!-- SECTION 10: JOURNAL & FIELD NOTES (RECIPES) -->
    @include('shop::home.sections.recipes', ['recipes' => $featuredRecipes])

    <!-- SECTION 11: EDITORIAL SOCIAL PROOF / COMMUNITY NOTES -->
    @include('shop::home.sections.reviews')

    <!-- SECTION 12: AS SEEN IN / PRESS & CERTIFICATIONS MARQUEE -->
    @include('shop::home.sections.trust-marquee')

    <!-- SECTION 13: NEWSLETTER & COMMUNITY CTA -->
    @include('shop::home.sections.newsletter')

    <!-- SECTION 14: FAQ ACCORDION -->
    @include('shop::home.sections.faq')

</x-shop::layouts>
