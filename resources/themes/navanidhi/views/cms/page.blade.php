<x-shop::layouts :has-feature="false">
    <!-- Page Title -->
    <x-slot:title>
        {{ str_contains($page->meta_title ?: $page->page_title, 'Navanidhi Naturals') ? ($page->meta_title ?: $page->page_title) : ($page->meta_title ?: $page->page_title) . ' | Navanidhi Naturals' }}
    </x-slot>

    <!-- SEO Meta Content -->
    @push('meta')
        <meta name="title" content="{{ str_contains($page->meta_title ?: $page->page_title, 'Navanidhi Naturals') ? ($page->meta_title ?: $page->page_title) : ($page->meta_title ?: $page->page_title) . ' | Navanidhi Naturals' }}" />
        <meta name="description" content="{{ $page->meta_description }}" />
        <meta name="keywords" content="{{ $page->meta_keywords }}" />

        <!-- Open Graph -->
        <meta property="og:type" content="article" />
        <meta property="og:title" content="{{ str_contains($page->meta_title ?: $page->page_title, 'Navanidhi Naturals') ? ($page->meta_title ?: $page->page_title) : ($page->meta_title ?: $page->page_title) . ' | Navanidhi Naturals' }}" />
        <meta property="og:description" content="{{ $page->meta_description }}" />
        <meta property="og:url" content="{{ url('/page/' . $page->url_key) }}" />

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="{{ str_contains($page->meta_title ?: $page->page_title, 'Navanidhi Naturals') ? ($page->meta_title ?: $page->page_title) : ($page->meta_title ?: $page->page_title) . ' | Navanidhi Naturals' }}" />
        <meta name="twitter:description" content="{{ $page->meta_description }}" />

        @php
            $pageSchema = [
                '@context' => 'https://schema.org',
                '@graph'   => [
                    [
                        '@type'       => 'WebPage',
                        '@id'         => url('/page/' . $page->url_key) . '/#webpage',
                        'url'         => url('/page/' . $page->url_key),
                        'name'        => $page->page_title,
                        'description' => $page->meta_description,
                        'isPartOf'    => [
                            '@id' => url('/') . '/#website',
                        ],
                    ],
                    [
                        '@type'           => 'BreadcrumbList',
                        '@id'             => url('/page/' . $page->url_key) . '/#breadcrumb',
                        'itemListElement' => [
                            [
                                '@type'    => 'ListItem',
                                'position' => 1,
                                'name'     => 'Home',
                                'item'     => url('/'),
                            ],
                            [
                                '@type'    => 'ListItem',
                                'position' => 2,
                                'name'     => $page->page_title,
                                'item'     => url('/page/' . $page->url_key),
                            ],
                        ],
                    ],
                ],
            ];
        @endphp
        <!-- JSON-LD BreadcrumbList & WebPage Schema -->
        <script type="application/ld+json">
        {!! json_encode($pageSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
        </script>
    @endPush

    @if ($page->url_key === 'recipes')
        @include('shop::cms.recipes.index')
    @elseif (str_starts_with($page->url_key, 'recipe-') || str_starts_with($page->url_key, 'recipes/'))
        @include('shop::cms.recipes.view')
    @elseif ($page->url_key === 'about-us' || $page->url_key === 'our-story' || $page->url_key === 'philosophy')
        @include('shop::cms.about-us')
    @elseif ($page->url_key === 'quality' || $page->url_key === 'quality-standard')
        @include('shop::cms.quality')
    @elseif ($page->url_key === 'faq' || $page->url_key === 'faqs')
        @include('shop::cms.faq')
    @else
        <!-- Standard CMS Page Template (Terms, Return Policy, Privacy Policy, Customer Service, etc.) -->
        <div class="min-h-screen text-white bg-transparent" style="padding-bottom: 5rem !important;">
            @if (core()->getConfigData('general.general.breadcrumbs.shop'))
                <!-- Breadcrumbs -->
                <div class="site-container pt-5 pb-2 sm:pt-7 sm:pb-3">
                    <nav aria-label="Breadcrumb" class="flex items-center space-x-2 text-[11px] sm:text-xs uppercase tracking-[0.14em] text-white/60">
                        <a href="{{ route('shop.home.index') }}" class="hover:text-emerald-300 transition-colors font-medium">Home</a>
                        <span class="text-white/30">/</span>
                        <span class="text-emerald-300 font-bold">{{ $page->page_title }}</span>
                    </nav>
                </div>
            @endif

            <!-- Page Content in Authoritative Global Site Container -->
            <main class="site-container pt-6 max-w-4xl mx-auto space-y-8" style="padding-bottom: 5rem !important;">
                <header class="text-center space-y-3">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold tracking-widest uppercase text-emerald-300 bg-emerald-500/15 border border-emerald-400/30 nv-pulse-glow">
                        Information &amp; Policies
                    </span>
                    <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white">
                        {{ $page->page_title }}
                    </h1>
                </header>

                <div class="rounded-3xl border border-white/15 bg-white/[0.06] backdrop-blur-xl p-7 sm:p-12 lg:p-16 shadow-2xl text-white nv-glass-card">
                    <article class="prose prose-invert max-w-none text-white/80 leading-relaxed font-sans text-sm sm:text-base [&_h2]:font-serif [&_h2]:text-2xl [&_h2]:font-bold [&_h2]:text-white [&_h2]:mt-8 [&_h2]:mb-4 [&_h2]:pb-2 [&_h2]:border-b [&_h2]:border-white/10 [&_h3]:font-serif [&_h3]:text-lg [&_h3]:font-semibold [&_h3]:text-white [&_h3]:mt-6 [&_h3]:mb-3 [&_ul]:list-disc [&_ul]:pl-5 [&_ul]:space-y-2 [&_ol]:list-decimal [&_ol]:pl-5 [&_ol]:space-y-2 [&_li]:text-sm [&_li]:text-white/80 [&_p]:text-sm [&_p]:text-white/80 [&_p]:leading-relaxed [&_strong]:text-white [&_a]:text-emerald-300 [&_a]:underline hover:[&_a]:text-emerald-200">
                        {!! $page->html_content !!}
                    </article>
                </div>
            </main>
        </div>
    @endif
</x-shop::layouts>
