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
    <div class="flex-1 w-full rounded-3xl border border-[#0D5C3A]/15 bg-white p-6 sm:p-8 shadow-[0_8px_30px_-6px_rgba(13,92,58,0.06)] space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between border-b border-[#0D5C3A]/10 pb-4">
            <div class="flex items-center gap-3">
                <a
                    class="lg:hidden flex h-8 w-8 items-center justify-center rounded-xl border border-[#0D5C3A]/20 text-[#062E1A] hover:bg-[#0D5C3A]/5 transition-colors"
                    href="{{ route('shop.customers.account.index') }}"
                >
                    <span class="material-symbols-outlined text-base">arrow_back</span>
                </a>

                <div>
                    <div class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-[#0D5C3A]/10 text-[#0D5C3A] text-[10px] font-bold tracking-wider uppercase border border-[#0D5C3A]/15">
                        <span class="material-symbols-outlined text-xs">star</span>
                        <span>Customer Feedback</span>
                    </div>
                    <h1 class="font-serif text-xl sm:text-2xl font-extrabold text-[#062E1A] mt-1">
                        @lang('shop::app.customers.account.reviews.title')
                    </h1>
                </div>
            </div>
        </div>

        {!! view_render_event('bagisto.shop.customers.account.reviews.list.before', ['reviews' => $reviews]) !!}

        @if (! $reviews->isEmpty())
            <div class="divide-y divide-[#0D5C3A]/10 space-y-4">
                @foreach ($reviews as $review)
                    @php
                        $product = $review->product;
                        $productUrl = $product?->url_key ? route('shop.product_or_category.index', $product->url_key) : '#';
                        $productImage = $product?->base_image_url ?? bagisto_asset('images/small-product-placeholder.webp');
                    @endphp

                    <div class="pt-4 first:pt-0 flex flex-col sm:flex-row items-start gap-4">
                        <a href="{{ $productUrl }}" class="shrink-0">
                            <div class="w-16 h-16 rounded-2xl border border-[#0D5C3A]/15 bg-[#FCFBF7] overflow-hidden flex items-center justify-center p-1.5 shadow-xs">
                                <img
                                    src="{{ $productImage }}"
                                    alt="{{ $review->title }}"
                                    class="w-full h-full object-contain"
                                >
                            </div>
                        </a>

                        <div class="flex-1 space-y-2 min-w-0">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1">
                                <a href="{{ $productUrl }}" class="font-serif text-sm font-bold text-[#062E1A] hover:text-[#0D5C3A] transition-colors truncate">
                                    {{ $product?->name ?? 'Botanical Product' }}
                                </a>

                                <div class="flex items-center gap-1 text-[#D4A359]">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="material-symbols-outlined text-base {{ $review->rating >= $i ? 'text-[#D4A359]' : 'text-gray-300' }}">
                                            star
                                        </span>
                                    @endfor
                                    <span class="text-xs font-bold text-[#1A202C] ml-1">{{ $review->rating }}/5</span>
                                </div>
                            </div>

                            <h3 class="text-xs font-bold text-[#062E1A]" v-pre>
                                {{ $review->title }}
                            </h3>

                            <p class="text-xs text-[#718096] leading-relaxed" v-pre>
                                {{ $review->comment }}
                            </p>

                            <div class="flex items-center justify-between pt-1 text-[11px] text-[#718096]">
                                <span>Reviewed on {{ $review->created_at->format('d M, Y') }}</span>

                                @if ($review->status === 'approved')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-[#0D5C3A]/10 text-[#0D5C3A] text-[10px] font-bold border border-[#0D5C3A]/20">
                                        <span class="material-symbols-outlined text-xs">verified</span> Approved
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-amber-50 text-amber-800 text-[10px] font-bold border border-amber-200">
                                        <span class="material-symbols-outlined text-xs">schedule</span> In Review
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pt-4 border-t border-[#0D5C3A]/10">
                {{ $reviews->links() }}
            </div>
        @else
            <!-- Empty Reviews State -->
            <div class="py-16 text-center space-y-4">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-[#0D5C3A]/10 text-[#0D5C3A] text-2xl border border-[#0D5C3A]/20">
                    <span class="material-symbols-outlined text-3xl">rate_review</span>
                </div>

                <div class="space-y-1">
                    <h3 class="font-serif text-lg font-bold text-[#062E1A]">
                        @lang('shop::app.customers.account.reviews.empty-review')
                    </h3>
                    <p class="text-xs text-[#718096] leading-relaxed max-w-sm mx-auto">
                        You haven't submitted any reviews yet. Share your experience with our cold-milled whole plant powders after tasting!
                    </p>
                </div>

                <div class="pt-2">
                    <a
                        href="{{ url('/botanical-powders') }}"
                        class="btn-emerald-primary !px-6 !py-3 text-xs uppercase tracking-widest font-bold inline-flex items-center gap-2 shadow-sm cursor-pointer"
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
