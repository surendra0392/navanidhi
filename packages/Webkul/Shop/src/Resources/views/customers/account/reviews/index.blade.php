<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.account.reviews.title') | Navanidhi Naturals
    </x-slot>

    <!-- Breadcrumbs -->
    @if ((core()->getConfigData('general.general.breadcrumbs.shop')))
        @section('breadcrumbs')
            <x-shop::breadcrumbs name="reviews" />
        @endSection
    @endif

    <x-shop::layouts.account.navigation />

    <!-- Main Content Area -->
    <div class="flex-1 w-full rounded-2xl border border-[#DCD3C3] bg-white p-6 sm:p-8 shadow-sm space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between border-b border-[#DCD3C3]/60 pb-4">
            <div class="flex items-center gap-3">
                <a
                    class="lg:hidden flex h-8 w-8 items-center justify-center rounded-lg border border-[#DCD3C3] text-[#111111]"
                    href="{{ route('shop.customers.account.index') }}"
                >
                    <span class="material-symbols-outlined text-base">arrow_back</span>
                </a>

                <div>
                    <div class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-[#EBF3EE] text-[#0F4D2E] text-[10px] font-bold tracking-wider uppercase">
                        <span class="material-symbols-outlined text-xs">star</span>
                        <span>Customer Feedback</span>
                    </div>
                    <h1 class="font-serif text-xl sm:text-2xl font-bold text-[#111111] mt-0.5">
                        @lang('shop::app.customers.account.reviews.title')
                    </h1>
                </div>
            </div>
        </div>

        {!! view_render_event('bagisto.shop.customers.account.reviews.list.before', ['reviews' => $reviews]) !!}

        @if (! $reviews->isEmpty())
            <div class="divide-y divide-[#DCD3C3]/60 space-y-4">
                @foreach ($reviews as $review)
                    @php
                        $product = $review->product;
                        $productUrl = $product?->url_key ? route('shop.product_or_category.index', $product->url_key) : '#';
                        $productImage = $product?->base_image_url ?? bagisto_asset('images/small-product-placeholder.webp');
                    @endphp

                    <div class="pt-4 first:pt-0 flex flex-col sm:flex-row items-start gap-4">
                        <a href="{{ $productUrl }}" class="shrink-0">
                            <div class="w-16 h-16 rounded-xl border border-[#DCD3C3] bg-[#F7F5EE] overflow-hidden flex items-center justify-center p-1">
                                <img
                                    src="{{ $productImage }}"
                                    alt="{{ $review->title }}"
                                    class="w-full h-full object-contain"
                                >
                            </div>
                        </a>

                        <div class="flex-1 space-y-2 min-w-0">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1">
                                <a href="{{ $productUrl }}" class="font-serif text-sm font-bold text-[#111111] hover:text-[#0F4D2E] transition-colors truncate">
                                    {{ $product?->name ?? 'Botanical Product' }}
                                </a>

                                <div class="flex items-center gap-1 text-[#D4B381]">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="material-symbols-outlined text-base {{ $review->rating >= $i ? 'text-[#D4B381]' : 'text-gray-300' }}">
                                            star
                                        </span>
                                    @endfor
                                    <span class="text-xs font-bold text-[#111111] ml-1">{{ $review->rating }}/5</span>
                                </div>
                            </div>

                            <h3 class="text-xs font-bold text-[#111111]" v-pre>
                                {{ $review->title }}
                            </h3>

                            <p class="text-xs text-[#666666] leading-relaxed" v-pre>
                                {{ $review->comment }}
                            </p>

                            <div class="flex items-center justify-between pt-1 text-[11px] text-[#666666]/80">
                                <span>Reviewed on {{ $review->created_at->format('d M, Y') }}</span>

                                @if ($review->status === 'approved')
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 text-[10px] font-bold">
                                        <span class="material-symbols-outlined text-xs">verified</span> Approved
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-amber-100 text-amber-800 text-[10px] font-bold">
                                        <span class="material-symbols-outlined text-xs">schedule</span> In Review
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pt-4 border-t border-[#DCD3C3]/60">
                {{ $reviews->links() }}
            </div>
        @else
            <!-- Empty Reviews State -->
            <div class="py-16 text-center space-y-4">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-[#EBF3EE] text-[#0F4D2E] text-2xl">
                    <span class="material-symbols-outlined text-3xl">rate_review</span>
                </div>

                <div class="space-y-1">
                    <h3 class="font-serif text-lg font-bold text-[#111111]">
                        @lang('shop::app.customers.account.reviews.empty-review')
                    </h3>
                    <p class="text-xs text-[#666666] leading-relaxed max-w-sm mx-auto">
                        You haven't submitted any reviews yet. Share your experience with our cold-milled whole plant powders after tasting!
                    </p>
                </div>

                <div class="pt-2">
                    <a
                        href="{{ url('/botanical-herbal-powders') }}"
                        class="inline-flex items-center gap-2 text-xs uppercase tracking-widest font-semibold px-6 py-3 rounded-xl shadow-sm transition-all"
                        style="background-color: #0F4D2E !important; color: #FFFFFF !important;"
                    >
                        <span>Explore Botanical Powders</span>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>
            </div>
        @endif

        {!! view_render_event('bagisto.shop.customers.account.reviews.list.after', ['reviews' => $reviews]) !!}
    </div>
</x-shop::layouts.account>
