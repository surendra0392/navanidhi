@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
@inject ('productViewHelper', 'Webkul\Product\Helpers\View')

@php
    $avgRatings = $reviewHelper->getAverageRating($product);
    $percentageRatings = $reviewHelper->getPercentageRating($product);
    $totalRatings = $reviewHelper->getTotalFeedback($product);
    $totalReviewsCount = $reviewHelper->getTotalReviews($product);

    $customAttributeValues = $productViewHelper->getAdditionalData($product);
    $attributeData = collect($customAttributeValues)->filter(fn ($item) => ! empty($item['value']));

    $weightUnit = core()->getConfigData('general.general.locale_options.weight_unit') ?: 'kgs';
    $wVal = (float) ($product->weight ?? 0);
    if ($weightUnit === 'lbs') {
        $formattedProductWeight = $wVal . ' lbs';
    } elseif ($weightUnit === 'grams') {
        $formattedProductWeight = ($wVal < 1 ? ((int) round($wVal * 1000)) : $wVal) . ' g';
    } else {
        $formattedProductWeight = $wVal >= 1 ? ($wVal . ' kg') : (($wVal * 1000) . ' g');
    }

    $isReviewEnabled = filter_var(core()->getConfigData('catalog.products.review.customer_review'), FILTER_VALIDATE_BOOLEAN)
        || filter_var(core()->getConfigData('catalog.products.review.guest_review'), FILTER_VALIDATE_BOOLEAN);

    $productFlat = $product->product_flats->where('channel', core()->getCurrentChannel()->code)->where('locale', app()->getLocale())->first() ?: $product->product_flats->first();
    $seoTitle = trim($productFlat?->meta_title ?: ($product->meta_title ?: '')) ?: $product->name . ' | Navanidhi Naturals';
    $seoDesc  = trim($productFlat?->meta_description ?: ($product->meta_description ?: '')) ?: \Illuminate\Support\Str::limit(strip_tags($product->description), 160, '');
    $seoKeys  = trim($productFlat?->meta_keywords ?: ($product->meta_keywords ?: '')) ?: 'pure farm spices, botanical powders, red chilli, lakadong turmeric, moringa, amla, MAN Agro Foods, Navanidhi Naturals';
    $productBaseImage = product_image()->getProductBaseImage($product);

    // Dynamic Recipe Linkage
    $linkedRecipes = \Webkul\Recipe\Models\Recipe::where('status', 1)
        ->whereHas('products', function ($q) use ($product) {
            $q->whereIn('products.id', array_filter([$product->id, $product->parent_id]));
        })
        ->with('translations')
        ->take(3)
        ->get();
@endphp

<!-- SEO Meta Content -->
@push('meta')
    <meta name="title" content="{{ $seoTitle }}" />
    <meta name="description" content="{{ $seoDesc }}"/>
    <meta name="keywords" content="{{ $seoKeys }}"/>

@php
    $productJsonLd = [
        '@context' => 'https://schema.org/',
        '@type' => 'Product',
        'name' => $product->name,
        'image' => $productBaseImage['medium_image_url'],
        'description' => strip_tags($product->short_description ?: $product->description),
        'sku' => $product->sku,
        'brand' => [
            '@type' => 'Brand',
            'name' => 'Navanidhi Naturals',
        ],
        'manufacturer' => [
            '@type' => 'Organization',
            'name' => 'MAN AGRO FOODS',
        ],
        'offers' => [
            '@type' => 'Offer',
            'url' => route('shop.product_or_category.index', $product->url_key),
            'priceCurrency' => 'INR',
            'price' => (float) ($product->getTypeInstance()->getMinimalPrice() ?: $product->price),
            'itemCondition' => 'https://schema.org/NewCondition',
            'availability' => $product->isSaleable(1) ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
            'seller' => [
                '@type' => 'Organization',
                'name' => 'Navanidhi Naturals',
            ],
        ],
    ];

    if ($totalRatings > 0) {
        $productJsonLd['aggregateRating'] = [
            '@type' => 'AggregateRating',
            'ratingValue' => (string) $avgRatings,
            'reviewCount' => (string) $totalRatings,
        ];
    }
@endphp

<!-- Navanidhi Botanical Product JSON-LD Structured Data -->
<script type="application/ld+json">
{!! json_encode($productJsonLd, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>


    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $seoTitle }}" />
    <meta name="twitter:description" content="{{ $seoDesc }}" />
    <meta name="twitter:image:alt" content="{{ $product->name }}" />
    <meta name="twitter:image" content="{{ $productBaseImage['medium_image_url'] }}" />

    <meta property="og:type" content="og:product" />
    <meta property="og:title" content="{{ $seoTitle }}" />
    <meta property="og:image" content="{{ $productBaseImage['medium_image_url'] }}" />
    <meta property="og:description" content="{{ $seoDesc }}" />
    <meta property="og:url" content="{{ route('shop.product_or_category.index', $product->url_key) }}" />
@endPush

<!-- Page Layout -->
<x-shop::layouts>
    <!-- Page Title -->
    <x-slot:title>
        {{ trim($product->meta_title) != "" ? $product->meta_title : $product->name }}
    </x-slot>

    {!! view_render_event('bagisto.shop.products.view.before', ['product' => $product]) !!}

    <!-- Breadcrumbs -->
    @if ((core()->getConfigData('general.general.breadcrumbs.shop')))
        <x-shop::breadcrumbs
            name="product"
            :entity="$product"
        />
    @endif

    <!-- Product Purchasing Stage Vue Component -->
    <v-product>
        <x-shop::shimmer.products.view />
    </v-product>

    <!-- Information Section (Desktop Tabs) -->
    <div class="site-container mt-16 lg:mt-24 border-t border-[#0D5C3A]/10 pt-10 max-1180:hidden">
        <x-shop::tabs
            position="center"
            ref="productTabs"
        >
            <!-- Description Tab -->
            {!! view_render_event('bagisto.shop.products.view.description.before', ['product' => $product]) !!}

            <x-shop::tabs.item
                id="description-tab"
                class="!p-0"
                :title="trans('shop::app.products.view.description')"
                :is-selected="true"
            >
                <div class="max-w-4xl mx-auto mt-10 space-y-6">
                    <div class="prose prose-invert max-w-none text-white/80 leading-relaxed font-sans text-sm sm:text-base [&_h2]:font-serif [&_h2]:text-2xl [&_h2]:font-bold [&_h2]:text-white [&_h2]:mt-8 [&_h2]:mb-4 [&_h3]:font-serif [&_h3]:text-lg [&_h3]:font-semibold [&_h3]:text-emerald-300 [&_h3]:mt-6 [&_h3]:mb-3 [&_ul]:list-disc [&_ul]:pl-5 [&_ul]:space-y-2 [&_li]:text-sm [&_li]:text-white/80 [&_p]:text-sm [&_p]:leading-relaxed [&_p]:text-white/80">
                        {!! $product->description !!}
                    </div>
                </div>
            </x-shop::tabs.item>

            {!! view_render_event('bagisto.shop.products.view.description.after', ['product' => $product]) !!}

            <!-- Specifications & Botanical Profile Tab -->
            @if(count($attributeData) || $product->weight || $product->sku)
                <x-shop::tabs.item
                    id="information-tab"
                    class="!p-0"
                    title="Specifications & Authenticity Profile"
                    :is-selected="false"
                >
                    <div class="max-w-3xl mx-auto mt-10">
                        <div class="rounded-3xl border border-white/15 nv-glass-card overflow-hidden shadow-2xl">
                            <table class="w-full text-left text-sm">
                                <tbody class="divide-y divide-white/10">
                                    <tr class="hover:bg-white/5 transition-colors">
                                        <th class="py-4 px-6 font-bold text-white w-1/3 bg-white/5">SKU</th>
                                        <td class="py-4 px-6 text-white/80 font-mono text-xs">{{ $product->sku }}</td>
                                    </tr>

                                    @if ($product->weight)
                                        <tr class="hover:bg-white/5 transition-colors">
                                            <th class="py-4 px-6 font-bold text-white w-1/3 bg-white/5">Net Quantity / Weight</th>
                                            <td class="py-4 px-6 text-white/80">{{ $formattedProductWeight }}</td>
                                        </tr>
                                    @endif

                                    @foreach ($customAttributeValues as $customAttributeValue)
                                        @if (! empty($customAttributeValue['value']))
                                            <tr class="hover:bg-white/5 transition-colors">
                                                <th class="py-4 px-6 font-bold text-white w-1/3 bg-white/5">
                                                    {{ $customAttributeValue['label'] }}
                                                </th>
                                                <td class="py-4 px-6 text-white/80">
                                                    @if ($customAttributeValue['type'] == 'file')
                                                        <a
                                                            href="{{ Storage::url($product[$customAttributeValue['code']]) }}"
                                                            download="{{ $customAttributeValue['label'] }}"
                                                            class="inline-flex items-center gap-1.5 text-emerald-400 hover:text-emerald-300 hover:underline font-bold"
                                                        >
                                                            <span class="icon-download text-lg"></span>
                                                            <span>Download Certificate</span>
                                                        </a>
                                                    @elseif ($customAttributeValue['type'] == 'image')
                                                        <img
                                                            class="h-8 w-8 rounded-xl object-cover border border-white/20"
                                                            src="{{ Storage::url($customAttributeValue['value']) }}"
                                                            alt="Attribute image"
                                                        />
                                                    @else
                                                        {{ $customAttributeValue['value'] }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </x-shop::tabs.item>
            @endif

            <!-- Manufacturer & Compliance Tab -->
            <x-shop::tabs.item
                id="manufacturer-tab"
                class="!p-0"
                title="Manufacturer & Legal Info"
                :is-selected="false"
            >
                <div class="max-w-3xl mx-auto mt-10 space-y-6 text-sm text-[#4B5563] leading-relaxed">
                    <div class="p-8 rounded-3xl bg-[#FCFBF7] border border-[#0D5C3A]/10 space-y-5 shadow-sm">
                        <div class="flex items-center gap-3.5">
                            <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-[#0D5C3A] to-[#062E1A] text-[#D4A359] shadow-sm">
                                <span class="material-symbols-outlined text-2xl">verified</span>
                            </span>
                            <div>
                                <h4 class="font-serif text-xl font-bold text-[#062E1A]">Manufactured & Marketed By</h4>
                                <p class="text-xs font-bold text-[#0D5C3A] uppercase tracking-wider">MAN AGRO FOODS</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 pt-2 text-xs">
                            <div class="space-y-1.5 p-4 rounded-2xl bg-white border border-[#0D5C3A]/5">
                                <span class="font-bold text-[#062E1A] block">Packaging Facility Address</span>
                                <p class="text-[#6B7280] leading-relaxed">Certified Botanical Processing Unit, South India Agro Cluster, Tamil Nadu / Karnataka, India.</p>
                            </div>
                            <div class="space-y-1.5 p-4 rounded-2xl bg-white border border-[#0D5C3A]/5">
                                <span class="font-bold text-[#062E1A] block">Food Safety & Compliance</span>
                                <p class="text-[#6B7280] leading-relaxed">FSSAI Central License: <span class="font-mono font-bold text-[#0D5C3A]">10020042001234</span> (100% Plant-Based).</p>
                            </div>
                            <div class="space-y-1.5 p-4 rounded-2xl bg-white border border-[#0D5C3A]/5">
                                <span class="font-bold text-[#062E1A] block">Customer Care Executive</span>
                                <p class="text-[#6B7280] leading-relaxed">Email: care@navanidhinaturals.com | Helpline: +91 98765 43210</p>
                            </div>
                            <div class="space-y-1.5 p-4 rounded-2xl bg-white border border-[#0D5C3A]/5">
                                <span class="font-bold text-[#062E1A] block">Botanical Disclaimer</span>
                                <p class="text-[#6B7280] leading-relaxed">Pure whole plant powder for daily vitality. Not intended to diagnose, treat, or prevent any disease.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </x-shop::tabs.item>

            <!-- Shipping & Freshness Dispatch Tab -->
            <x-shop::tabs.item
                id="shipping-tab"
                class="!p-0"
                title="Freshness & Dispatch"
                :is-selected="false"
            >
                <div class="max-w-3xl mx-auto mt-10 space-y-5 text-sm text-white/80 leading-relaxed">
                    <div class="p-8 rounded-3xl nv-glass-card border border-white/15 space-y-3 shadow-xl">
                        <h4 class="font-serif text-xl font-bold text-white">Small-Batch Milling & UV-Barrier Dispatch</h4>
                        <p class="text-xs sm:text-sm text-white/80 leading-relaxed">
                            Each spice and botanical batch is cold stone-milled or vacuum-processed below 42°C and sealed in multi-layer barrier packaging to lock in natural capsaicin warmth, curcumin oils, and delicate bio-nutrients. Dispatched directly from MAN AGRO FOODS facility within 24–48 hours.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                        <div class="p-6 rounded-2xl nv-glass-card border border-white/15 shadow-md space-y-2">
                            <p class="font-bold text-xs uppercase tracking-wider text-emerald-300">Pan-India Express Air</p>
                            <p class="text-xs text-white/70 leading-relaxed">Delivered safely in 3–5 business days across major serviceable pin codes with tracking.</p>
                        </div>
                        <div class="p-6 rounded-2xl nv-glass-card border border-white/15 shadow-md space-y-2">
                            <p class="font-bold text-xs uppercase tracking-wider text-emerald-300">Airtight Resealable</p>
                            <p class="text-xs text-white/70 leading-relaxed">Zip-lock air-barrier food pouch keeps humidity and direct light out for 18–24 months shelf life.</p>
                        </div>
                    </div>
                </div>
            </x-shop::tabs.item>

            <!-- Reviews Tab -->
            @if ($isReviewEnabled)
                <x-shop::tabs.item
                    id="review-tab"
                    class="!p-0"
                    :title="trans('shop::app.products.view.review')"
                    :is-selected="false"
                >
                    <div class="max-w-4xl mx-auto mt-10">
                        @include('shop::products.view.reviews')
                    </div>
                </x-shop::tabs.item>
            @endif
        </x-shop::tabs>
    </div>

    <!-- Information Section (Mobile Accordions) -->
    <div class="site-container mt-10 grid gap-3 1180:hidden">
        <!-- Description Accordion -->
        <x-shop::accordion
            class="rounded-2xl border border-white/15 nv-glass-card overflow-hidden shadow-lg"
            :is-active="true"
        >
            <x-slot:header class="bg-white/5 !py-3.5 !px-5">
                <p class="text-sm font-semibold uppercase tracking-wider text-white font-serif">
                    @lang('shop::app.products.view.description')
                </p>
            </x-slot>

            <x-slot:content class="p-5">
                <div class="prose prose-invert text-xs sm:text-sm text-white/80 leading-relaxed">
                    {!! $product->description !!}
                </div>
            </x-slot>
        </x-shop::accordion>

        <!-- Specifications & Botanical Profile Accordion -->
        @if (count($attributeData) || $product->weight || $product->sku)
            <x-shop::accordion
                class="rounded-2xl border border-white/15 nv-glass-card overflow-hidden shadow-lg"
                :is-active="false"
            >
                <x-slot:header class="bg-white/5 !py-3.5 !px-5">
                    <p class="text-sm font-semibold uppercase tracking-wider text-white font-serif">
                        Specifications & Profile
                    </p>
                </x-slot>

                <x-slot:content class="p-5">
                    <div class="space-y-2.5 text-xs text-white/80">
                        <div class="flex justify-between py-1.5 border-b border-white/10">
                            <span class="font-medium text-white">SKU</span>
                            <span class="font-mono text-white/90">{{ $product->sku }}</span>
                        </div>

                        @if ($product->weight)
                            <div class="flex justify-between py-1.5 border-b border-white/10">
                                <span class="font-medium text-white">Net Quantity</span>
                                <span class="text-white/90">{{ $formattedProductWeight }}</span>
                            </div>
                        @endif

                        @foreach ($customAttributeValues as $customAttributeValue)
                            @if (! empty($customAttributeValue['value']))
                                <div class="flex justify-between py-1.5 border-b border-white/10">
                                    <span class="font-medium text-white">{{ $customAttributeValue['label'] }}</span>
                                    <span class="text-white/90">{{ $customAttributeValue['value'] ?? '-' }}</span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </x-slot>
            </x-shop::accordion>
        @endif

        <!-- Manufacturer Accordion -->
        <x-shop::accordion
            class="rounded-2xl border border-white/15 nv-glass-card overflow-hidden shadow-lg"
            :is-active="false"
        >
            <x-slot:header class="bg-white/5 !py-3.5 !px-5">
                <p class="text-sm font-semibold uppercase tracking-wider text-white font-serif">
                    Manufacturer & Legal
                </p>
            </x-slot>

            <x-slot:content class="p-5 text-xs text-white/70 space-y-2">
                <p><strong class="text-white">Manufactured by:</strong> MAN AGRO FOODS</p>
                <p><strong class="text-white">FSSAI Central Reg:</strong> 10020042000000</p>
                <p><strong class="text-white">Customer Helpline:</strong> care@navanidhinaturals.com</p>
            </x-slot>
        </x-shop::accordion>

        <!-- Shipping Accordion -->
        <x-shop::accordion
            class="rounded-2xl border border-white/15 nv-glass-card overflow-hidden shadow-lg"
            :is-active="false"
        >
            <x-slot:header class="bg-white/5 !py-3.5 !px-5">
                <p class="text-sm font-semibold uppercase tracking-wider text-white font-serif">
                    Freshness & Shipping
                </p>
            </x-slot>

            <x-slot:content class="p-5 text-xs text-white/70 space-y-2">
                <p>Milled in small batches and dispatched in airtight protective barriers within 24–48 hours.</p>
                <p>Standard delivery takes 3–5 business days with express tracking.</p>
            </x-slot>
        </x-shop::accordion>

        <!-- Reviews Accordion -->
        @if ($isReviewEnabled)
            <x-shop::accordion
                class="rounded-2xl border border-white/15 nv-glass-card overflow-hidden shadow-lg"
                :is-active="false"
            >
                <x-slot:header
                    class="bg-white/5 !py-3.5 !px-5"
                    id="review-accordian-button"
                >
                    <p class="text-sm font-semibold uppercase tracking-wider text-white font-serif">
                        @lang('shop::app.products.view.review') ({{ $totalReviewsCount }})
                    </p>
                </x-slot>

                <x-slot:content class="p-4 sm:p-5">
                    @include('shop::products.view.reviews')
                </x-slot:content>
            </x-shop::accordion>
        @endif
    </div>

    <!-- Recipes Section: From the Botanical Kitchen -->
    @if ($linkedRecipes->isNotEmpty())
        <section class="site-container mt-16 lg:mt-24 border-t border-white/10 pt-14">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-emerald-400 block mb-1.5">
                        Culinary & Wellness Creations
                    </span>
                    <h2 class="font-serif text-2xl sm:text-3xl font-bold text-white">
                        Recipes Featuring {{ $product->name }}
                    </h2>
                    <p class="text-xs sm:text-sm text-white/70 mt-1 max-w-xl">
                        Nourishing curries, morning tonics, and culinary rituals crafted by herbal nutritionists and chefs.
                    </p>
                </div>
                <div>
                    <a
                        href="{{ route('shop.recipes.index') }}"
                        class="inline-flex items-center gap-1 text-xs font-semibold text-emerald-400 hover:text-emerald-300 hover:underline uppercase tracking-wider"
                    >
                        <span>Explore All Recipes</span>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($linkedRecipes as $recipe)
                    <x-navanidhi::recipe.card :recipe="$recipe" />
                @endforeach
            </div>
        </section>
    @endif

    <!-- Related Products Associations (Related & Up-sells) -->
    <div class="site-container mt-16 lg:mt-24 border-t border-[#DCD3C3] pt-12 pb-16">
        <v-product-associations></v-product-associations>
    </div>

    {!! view_render_event('bagisto.shop.products.view.after', ['product' => $product]) !!}

    @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-product-template"
        >
            <x-shop::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
            >
                <form
                    ref="formData"
                    @submit="handleSubmit($event, addToCart)"
                >
                    @csrf

                    <input
                        type="hidden"
                        name="product_id"
                        value="{{ $product->id }}"
                    >


                    <input
                        type="hidden"
                        name="is_buy_now"
                        v-model="is_buy_now"
                    >

                    <div class="site-container py-6 lg:py-10">
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-start">
                            <!-- Left Column: Product Botanical Gallery -->
                            <div class="lg:col-span-6 xl:col-span-7 flex justify-center lg:justify-start w-full">
                                @include('shop::products.view.gallery')
                            </div>

                            <!-- Right Column: Purchasing Controls & Information -->
                            <div class="lg:col-span-6 xl:col-span-5 space-y-6 w-full">
                                {!! view_render_event('bagisto.shop.products.name.before', ['product' => $product]) !!}

                                <!-- Top Badges & Wishlist Action -->
                                <div class="flex items-center justify-between gap-3">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <span class="px-3 py-1 rounded-full text-[10px] font-extrabold tracking-wider uppercase bg-[#0D5C3A]/10 text-[#0D5C3A] border border-[#0D5C3A]/20">
                                            @if ($product->categories->where('id', '!=', 1)->first())
                                                {{ $product->categories->where('id', '!=', 1)->first()->name }}
                                            @else
                                                Botanical Harvest
                                            @endif
                                        </span>

                                        @if ($product->new)
                                            <span class="px-3 py-1 rounded-full text-[10px] font-extrabold tracking-wider uppercase bg-[#D4A359]/15 text-[#9E6D24] border border-[#D4A359]/30">
                                                Fresh Harvest Batch
                                            </span>
                                        @endif
                                    </div>

                                    @if (core()->getConfigData('customer.settings.wishlist.wishlist_option'))
                                        <button
                                            type="button"
                                            class="flex h-11 w-11 items-center justify-center rounded-full border border-white/20 bg-white/10 text-white hover:text-red-400 hover:border-red-400/50 backdrop-blur-md transition-all duration-200 shadow-md cursor-pointer"
                                            aria-label="@lang('shop::app.products.view.add-to-wishlist')"
                                            :class="isWishlist ? 'text-red-400 border-red-400/50 bg-red-950/40' : ''"
                                            @click="addToWishlist"
                                        >
                                            <span :class="isWishlist ? 'icon-heart-fill text-xl' : 'icon-heart text-xl'"></span>
                                        </button>
                                    @endif
                                </div>

                                <!-- Product Title (Playfair Display) -->
                                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white font-serif leading-[1.15] drop-shadow-md" v-pre>
                                    {{ $product->name }}
                                </h1>

                                {!! view_render_event('bagisto.shop.products.name.after', ['product' => $product]) !!}

                                <!-- Rating Summary (If Available) -->
                                {!! view_render_event('bagisto.shop.products.rating.before', ['product' => $product]) !!}

                                @if ($isReviewEnabled && $totalRatings)
                                    <div
                                        class="inline-flex items-center gap-2.5 cursor-pointer pt-0.5"
                                        role="button"
                                        tabindex="0"
                                        @click="scrollToReview"
                                    >
                                        <x-shop::products.ratings
                                            class="transition-all hover:opacity-80"
                                            :average="$avgRatings"
                                            :total="$totalRatings"
                                            ::rating="true"
                                        />
                                        <span class="text-xs text-white/70 underline underline-offset-4 hover:text-emerald-300">
                                            ({{ $totalRatings }} {{ $totalRatings == 1 ? 'Customer Rating' : 'Customer Ratings' }})
                                        </span>
                                    </div>
                                @endif

                                {!! view_render_event('bagisto.shop.products.rating.after', ['product' => $product]) !!}

                                <!-- Pricing & Stock Status Container -->
                                {!! view_render_event('bagisto.shop.products.price.before', ['product' => $product]) !!}

                                <div class="flex flex-wrap items-baseline gap-4 pt-1 border-b border-white/10 pb-5">
                                    <div class="text-3xl sm:text-4xl font-extrabold text-white font-serif flex items-center gap-3">
                                        {!! $product->getTypeInstance()->getPriceHtml() !!}
                                    </div>

                                    <!-- Stock Availability Badge -->
                                    @if ($product->isSaleable(1))
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-[11px] font-bold tracking-wider uppercase border border-emerald-500/30">
                                            <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                            In Stock &bull; Ready To Dispatch
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-red-950/40 text-red-300 text-[11px] font-semibold tracking-wider uppercase border border-red-500/30">
                                            <span class="h-2 w-2 rounded-full bg-red-500"></span>
                                            Out of Stock
                                        </span>
                                    @endif

                                    @if (\Webkul\Tax\Facades\Tax::isInclusiveTaxProductPrices())
                                        <span class="text-xs text-white/60">
                                            (Inclusive of all taxes)
                                        </span>
                                    @endif
                                </div>

                                @if (count($product->getTypeInstance()->getCustomerGroupPricingOffers()))
                                    <div class="grid gap-1.5 text-xs text-white/70">
                                        @foreach ($product->getTypeInstance()->getCustomerGroupPricingOffers() as $offer)
                                            <p class="[&>*]:text-white">
                                                {!! $offer !!}
                                            </p>
                                        @endforeach
                                    </div>
                                @endif

                                {!! view_render_event('bagisto.shop.products.price.after', ['product' => $product]) !!}

                                <!-- Short Description -->
                                {!! view_render_event('bagisto.shop.products.short_description.before', ['product' => $product]) !!}

                                @if ($product->short_description)
                                    <div class="text-sm leading-relaxed text-white/80">
                                        {!! $product->short_description !!}
                                    </div>
                                @endif

                                {!! view_render_event('bagisto.shop.products.short_description.after', ['product' => $product]) !!}

                                <!-- Product Types (Pack-Size Swatches for Configurable, Simple, etc.) -->
                                @include('shop::products.view.types.simple')

                                @include('shop::products.view.types.configurable')

                                @include('shop::products.view.types.grouped')

                                @include('shop::products.view.types.bundle')

                                @include('shop::products.view.types.downloadable')

                                @include('shop::products.view.types.booking')

                                <!-- Purchase Actions: Quantity, Add to Cart, Buy Now -->
                                <div class="space-y-3 pt-3">
                                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                                        {!! view_render_event('bagisto.shop.products.view.quantity.before', ['product' => $product]) !!}

                                        @if ($product->getTypeInstance()->showQuantityBox())
                                            <x-shop::quantity-changer
                                                name="quantity"
                                                value="1"
                                                class="h-13 w-full sm:w-[130px] px-3 justify-between rounded-2xl border border-white/20 bg-white/10 backdrop-blur-md shadow-md text-white"
                                            />
                                        @endif

                                        {!! view_render_event('bagisto.shop.products.view.quantity.after', ['product' => $product]) !!}

                                        @if (core()->getConfigData('sales.checkout.shopping_cart.cart_page'))
                                            <!-- Add To Cart Button -->
                                            {!! view_render_event('bagisto.shop.products.view.add_to_cart.before', ['product' => $product]) !!}

                                            <button
                                                type="submit"
                                                class="btn-emerald-primary h-13 flex-1 text-xs uppercase tracking-widest font-bold flex items-center justify-center gap-2 shadow-lg disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer"
                                                :disabled="! {{ $product->isSaleable(1) ? 'true' : 'false' }} || isStoring.addToCart"
                                                @click="is_buy_now=0;"
                                            >
                                                <span v-if="isStoring.addToCart" class="inline-block h-4 w-4 animate-spin rounded-full border-2 border-white border-t-transparent"></span>
                                                <span class="material-symbols-outlined text-lg">shopping_bag</span>
                                                <span>@lang('shop::app.products.view.add-to-cart')</span>
                                            </button>

                                            {!! view_render_event('bagisto.shop.products.view.add_to_cart.after', ['product' => $product]) !!}
                                        @else
                                            <button
                                                type="button"
                                                class="btn-emerald-primary h-13 flex-1 text-xs uppercase tracking-widest font-bold flex items-center justify-center gap-2"
                                                @click="$refs.contactUsModal.open()"
                                            >
                                                @lang('shop::app.components.layouts.footer.contact-us')
                                            </button>
                                        @endif
                                    </div>

                                    <!-- Buy Now Button -->
                                    @if (core()->getConfigData('sales.checkout.shopping_cart.cart_page'))
                                        {!! view_render_event('bagisto.shop.products.view.buy_now.before', ['product' => $product]) !!}

                                        @if (core()->getConfigData('catalog.products.storefront.buy_now_button_display'))
                                            <button
                                                type="submit"
                                                class="h-13 w-full rounded-2xl border-2 border-amber-400/80 text-amber-300 hover:bg-amber-400/20 text-xs uppercase tracking-widest font-bold flex items-center justify-center gap-2 transition-all disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer bg-amber-500/10 backdrop-blur-md shadow-md"
                                                :disabled="! {{ $product->isSaleable(1) ? 'true' : 'false' }} || isStoring.buyNow"
                                                @click="is_buy_now=1;"
                                            >
                                                <span v-if="isStoring.buyNow" class="inline-block h-4 w-4 animate-spin rounded-full border-2 border-amber-400 border-t-transparent"></span>
                                                <span class="material-symbols-outlined text-lg text-amber-300">bolt</span>
                                                <span>@lang('shop::app.products.view.buy-now')</span>
                                            </button>
                                        @endif

                                        {!! view_render_event('bagisto.shop.products.view.buy_now.after', ['product' => $product]) !!}
                                    @endif
                                </div>

                                {!! view_render_event('bagisto.shop.products.view.additional_actions.before', ['product' => $product]) !!}

                                <!-- Compare Action -->
                                {!! view_render_event('bagisto.shop.products.view.compare.before', ['product' => $product]) !!}

                                @if (core()->getConfigData('catalog.products.settings.compare_option'))
                                    <div class="pt-0.5 flex items-center justify-start">
                                        <button
                                            type="button"
                                            class="inline-flex items-center gap-2 text-xs font-medium text-white/70 hover:text-emerald-300 transition-colors cursor-pointer"
                                            @click="is_buy_now=0; addToCompare({{ $product->id }})"
                                        >
                                            <span class="icon-compare text-lg"></span>
                                            <span>@lang('shop::app.products.view.compare')</span>
                                        </button>
                                    </div>
                                @endif

                                {!! view_render_event('bagisto.shop.products.view.compare.after', ['product' => $product]) !!}

                                {!! view_render_event('bagisto.shop.products.view.additional_actions.after', ['product' => $product]) !!}

                                <!-- Botanical Authenticity & Trust Grid -->
                                <div class="grid grid-cols-2 gap-3 pt-6 border-t border-white/10 text-xs text-white font-semibold">
                                    <div class="flex items-center gap-2.5 p-3.5 rounded-2xl nv-glass-card border border-white/15 shadow-md hover:border-emerald-400/40 transition-all">
                                        <span class="w-8 h-8 rounded-xl bg-emerald-500/20 text-emerald-300 flex items-center justify-center shrink-0">
                                            <span class="material-symbols-outlined text-lg">eco</span>
                                        </span>
                                        <span class="text-xs text-white/90">Single-Origin Harvest</span>
                                    </div>
                                    <div class="flex items-center gap-2.5 p-3.5 rounded-2xl nv-glass-card border border-white/15 shadow-md hover:border-emerald-400/40 transition-all">
                                        <span class="w-8 h-8 rounded-xl bg-emerald-500/20 text-emerald-300 flex items-center justify-center shrink-0">
                                            <span class="material-symbols-outlined text-lg">ac_unit</span>
                                        </span>
                                        <span class="text-xs text-white/90">Cold-Milled &lt; 42°C</span>
                                    </div>
                                    <div class="flex items-center gap-2.5 p-3.5 rounded-2xl nv-glass-card border border-white/15 shadow-md hover:border-emerald-400/40 transition-all">
                                        <span class="w-8 h-8 rounded-xl bg-emerald-500/20 text-emerald-300 flex items-center justify-center shrink-0">
                                            <span class="material-symbols-outlined text-lg">spa</span>
                                        </span>
                                        <span class="text-xs text-white/90">100% Pure &amp; Stemless</span>
                                    </div>
                                    <div class="flex items-center gap-2.5 p-3.5 rounded-2xl nv-glass-card border border-white/15 shadow-md hover:border-emerald-400/40 transition-all">
                                        <span class="w-8 h-8 rounded-xl bg-emerald-500/20 text-emerald-300 flex items-center justify-center shrink-0">
                                            <span class="material-symbols-outlined text-lg">verified_user</span>
                                        </span>
                                        <span class="text-xs text-white/90">Zero Fillers or Dyes</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile Sticky Bottom Purchase Bar -->
                    <div class="fixed bottom-0 left-0 right-0 z-40 bg-[#041a0e]/95 backdrop-blur-xl border-t border-white/15 px-4 py-3 shadow-2xl lg:hidden flex items-center justify-between gap-3">
                        <div class="flex flex-col min-w-0 flex-1">
                            <p class="text-xs font-bold text-white truncate" v-pre>{{ $product->name }}</p>
                            <div class="flex items-baseline gap-2">
                                <span class="text-sm font-extrabold text-emerald-400 final-price">{!! $product->getTypeInstance()->getPriceHtml() !!}</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <button
                                type="submit"
                                class="btn-emerald-primary !h-11 !px-6 !text-xs font-bold uppercase tracking-wider shadow-md flex items-center gap-1.5 disabled:opacity-50 cursor-pointer"
                                :disabled="! {{ $product->isSaleable(1) ? 'true' : 'false' }} || isStoring.addToCart"
                                @click="is_buy_now=0;"
                            >
                                <span v-if="isStoring.addToCart" class="inline-block h-3.5 w-3.5 animate-spin rounded-full border-2 border-white border-t-transparent"></span>
                                <span class="material-symbols-outlined text-sm">shopping_bag</span>
                                <span>Add</span>
                            </button>
                        </div>
                    </div>
                </form>
            </x-shop::form>

            <!-- Contact Us Modal -->
            <x-shop::modal ref="contactUsModal">
                <x-slot:header>
                    <h2 class="text-lg font-semibold max-md:text-base font-serif text-[#1C2A22]">
                        @lang('shop::app.products.view.contact-us.title')
                    </h2>
                </x-slot>

                <x-slot:content>
                    <x-shop::form :action="route('shop.home.contact_us.send_mail')">
                        <x-shop::form.control-group>
                            <x-shop::form.control-group.label class="required">
                                @lang('shop::app.products.view.contact-us.name')
                            </x-shop::form.control-group.label>

                            <x-shop::form.control-group.control
                                type="text"
                                name="name"
                                rules="required"
                                :value="old('name')"
                                :label="trans('shop::app.products.view.contact-us.name')"
                                :placeholder="trans('shop::app.products.view.contact-us.name')"
                                :aria-label="trans('shop::app.products.view.contact-us.name')"
                                aria-required="true"
                            />

                            <x-shop::form.control-group.error control-name="name" />
                        </x-shop::form.control-group>

                        <x-shop::form.control-group>
                            <x-shop::form.control-group.label class="required">
                                @lang('shop::app.products.view.contact-us.email')
                            </x-shop::form.control-group.label>

                            <x-shop::form.control-group.control
                                type="email"
                                name="email"
                                rules="required|email"
                                :value="old('email')"
                                :label="trans('shop::app.products.view.contact-us.email')"
                                :placeholder="trans('shop::app.products.view.contact-us.email')"
                                :aria-label="trans('shop::app.products.view.contact-us.email')"
                                aria-required="true"
                            />

                            <x-shop::form.control-group.error control-name="email" />
                        </x-shop::form.control-group>

                        <x-shop::form.control-group>
                            <x-shop::form.control-group.label>
                                @lang('shop::app.products.view.contact-us.phone-number')
                            </x-shop::form.control-group.label>

                            <x-shop::form.control-group.control
                                type="text"
                                name="contact"
                                rules="phone"
                                :value="old('contact')"
                                :label="trans('shop::app.products.view.contact-us.phone-number')"
                                :placeholder="trans('shop::app.products.view.contact-us.phone-number')"
                                :aria-label="trans('shop::app.products.view.contact-us.phone-number')"
                            />

                            <x-shop::form.control-group.error control-name="contact" />
                        </x-shop::form.control-group>

                        <x-shop::form.control-group>
                            <x-shop::form.control-group.label class="required">
                                @lang('shop::app.products.view.contact-us.desc')
                            </x-shop::form.control-group.label>

                            <x-shop::form.control-group.control
                                type="textarea"
                                name="message"
                                rules="required"
                                :label="trans('shop::app.products.view.contact-us.message')"
                                :placeholder="trans('shop::app.products.view.contact-us.describe-here')"
                                :aria-label="trans('shop::app.products.view.contact-us.message')"
                                aria-required="true"
                                rows="6"
                            />

                            <x-shop::form.control-group.error control-name="message" />
                        </x-shop::form.control-group>

                        @if (core()->getConfigData('customer.captcha.credentials.status'))
                            <x-shop::form.control-group class="mt-5">
                                {!! \Webkul\Customer\Facades\Captcha::render() !!}

                                <x-shop::form.control-group.error control-name="recaptcha_token" />
                            </x-shop::form.control-group>
                        @endif

                        <div class="mt-6 flex justify-end">
                            <button
                                type="submit"
                                class="rounded-xl px-8 py-3 bg-[#0F4D2E] text-white text-xs uppercase tracking-wider font-semibold hover:bg-[#15633C] transition-colors"
                            >
                                @lang('shop::app.products.view.contact-us.submit')
                            </button>
                        </div>
                    </x-shop::form>
                </x-slot>
            </x-shop::modal>
        </script>

        <script type="module">
            app.component('v-product', {
                template: '#v-product-template',

                data() {
                    return {
                        isWishlist: false,

                        isCustomer: '{{ auth()->guard('customer')->check() }}',

                        is_buy_now: 0,

                        isStoring: {
                            addToCart: false,

                            buyNow: false,
                        },
                    }
                },

                mounted() {
                    this.checkWishlistStatus();
                },

                methods: {
                    addToCart(params) {
                        const operation = this.is_buy_now ? 'buyNow' : 'addToCart';

                        this.isStoring[operation] = true;

                        let formData = new FormData(this.$refs.formData);

                        this.ensureQuantity(formData);

                        this.$axios.post('{{ route("shop.api.checkout.cart.store") }}', formData, {
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            })
                            .then(response => {
                                if (response.data.message) {
                                    this.$emitter.emit('update-mini-cart', response.data.data);

                                    this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                    if (operation === 'addToCart') {
                                        this.$emitter.emit('open-mini-cart');
                                    }

                                    if (response.data.redirect) {
                                        window.location.href = response.data.redirect;
                                    }
                                } else {
                                    this.$emitter.emit('add-flash', { type: 'warning', message: response.data.data.message });
                                }

                                this.isStoring[operation] = false;
                            })
                            .catch(error => {
                                this.isStoring[operation] = false;

                                this.$emitter.emit('add-flash', { type: 'warning', message: error.response.data.message });
                            });
                    },

                    checkWishlistStatus() {
                        if (this.isCustomer) {
                            this.$axios.get('{{ route('shop.api.customers.account.wishlist.index') }}')
                                .then(response => {
                                    const wishlistItems = response.data.data || [];

                                    this.isWishlist = Boolean(wishlistItems.find(item => item.product.id == "{{ $product->id }}")?.product?.is_wishlist);
                                })
                                .catch(error => {});
                        }
                    },

                    addToWishlist() {
                        if (this.isCustomer) {
                            this.$axios.post('{{ route('shop.api.customers.account.wishlist.store') }}', {
                                    product_id: "{{ $product->id }}"
                                })
                                .then(response => {
                                    this.isWishlist = ! this.isWishlist;

                                    this.$emitter.emit('add-flash', { type: 'success', message: response.data.data.message });
                                })
                                .catch(error => {});
                        } else {
                            window.location.href = "{{ route('shop.customer.session.index')}}";
                        }
                    },

                    addToCompare(productId) {
                        if (this.isCustomer) {
                            this.$axios.post('{{ route("shop.api.compare.store") }}', {
                                    'product_id': productId
                                })
                                .then(response => {
                                    this.$emitter.emit('add-flash', { type: 'success', message: response.data.data.message });
                                })
                                .catch(error => {
                                    if ([400, 422].includes(error.response.status)) {
                                        this.$emitter.emit('add-flash', { type: 'warning', message: error.response.data.data.message });

                                        return;
                                    }

                                    this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message});
                                });

                            return;
                        }

                        let existingItems = this.getStorageValue(this.getCompareItemsStorageKey()) ?? [];

                        if (existingItems.length) {
                            if (! existingItems.includes(productId)) {
                                existingItems.push(productId);

                                this.setStorageValue(this.getCompareItemsStorageKey(), existingItems);

                                this.$emitter.emit('add-flash', { type: 'success', message: "@lang('shop::app.products.view.add-to-compare')" });
                            } else {
                                this.$emitter.emit('add-flash', { type: 'warning', message: "@lang('shop::app.products.view.already-in-compare')" });
                            }
                        } else {
                            this.setStorageValue(this.getCompareItemsStorageKey(), [productId]);

                            this.$emitter.emit('add-flash', { type: 'success', message: "@lang('shop::app.products.view.add-to-compare')" });
                        }
                    },

                    getCompareItemsStorageKey() {
                        return 'compare_items';
                    },

                    setStorageValue(key, value) {
                        localStorage.setItem(key, JSON.stringify(value));
                    },

                    getStorageValue(key) {
                        let value = localStorage.getItem(key);

                        if (value) {
                            value = JSON.parse(value);
                        }

                        return value;
                    },

                    scrollToReview() {
                        let accordianElement = document.querySelector('#review-accordian-button');

                        if (accordianElement) {
                            accordianElement.click();

                            accordianElement.scrollIntoView({
                                behavior: 'smooth'
                            });
                        }

                        let tabElement = document.querySelector('#review-tab-button');

                        if (tabElement) {
                            tabElement.click();

                            tabElement.scrollIntoView({
                                behavior: 'smooth'
                            });
                        }
                    },

                    ensureQuantity(formData) {
                        if (! formData.has('quantity')) {
                            formData.append('quantity', 1);
                        }
                    },
                },
            });
        </script>

        <script
            type="text/x-template"
            id="v-product-associations-template"
        >
            <div ref="carouselWrapper">
                <template v-if="isVisible">
                    <!-- Related Botanicals & Spices -->
                    <x-shop::products.carousel
                        title="Related Spices &amp; Botanical Essentials"
                        :src="route('shop.api.products.related.index', ['id' => $product->id])"
                    />

                    <!-- Up-sell Powders -->
                    <div class="mt-12">
                        <x-shop::products.carousel
                            title="Frequently Purchased Together"
                            :src="route('shop.api.products.up-sell.index', ['id' => $product->id])"
                        />
                    </div>
                </template>
            </div>
        </script>

        <script type="module">
            app.component('v-product-associations', {
                template: '#v-product-associations-template',

                data() {
                    return {
                        isVisible: false,
                    };
                },

                mounted() {
                    const observer = new IntersectionObserver(
                        (entries) => {
                            entries.forEach((entry) => {
                                if (entry.isIntersecting) {
                                    this.isVisible = true;
                                    observer.unobserve(entry.target);
                                }
                            });
                        },
                        { threshold: 0.1 }
                    );

                    observer.observe(this.$refs.carouselWrapper);
                }
            });
        </script>

        @if (core()->getConfigData('customer.captcha.credentials.status'))
            {!! \Webkul\Customer\Facades\Captcha::renderJS() !!}
        @endif
    @endPushOnce
</x-shop::layouts>
