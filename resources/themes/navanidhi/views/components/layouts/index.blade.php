@props([
    'hasHeader'  => true,
    'hasFeature' => true,
    'hasFooter'  => true,
])

<!DOCTYPE html>
<html
    lang="{{ app()->getLocale() }}"
    dir="{{ core()->getCurrentLocale()->direction }}"
    style="background-color: #03140b;"
>
    <head>
        {!! view_render_event('bagisto.shop.layout.head.before') !!}

        <title>{{ $title ?? '' }}</title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="base-url" content="{{ url()->to('/') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="currency" content="{{ core()->getCurrentCurrency()->toJson() }}">
        <meta name="generator" content="Navanidhi Naturals — Botanical Nutrition by MAN Agro Foods">


        <!-- Canonical URL -->
        <link rel="canonical" href="{{ url()->current() }}" />

        <!-- Open Graph Meta Tags -->
        <meta property="og:site_name" content="Navanidhi Naturals" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
        <meta property="og:type" content="website" />

        <!-- Twitter Card Meta Tags -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@navanidhinaturals" />

        @stack('meta')

        @php
            $globalSchema = [
                '@context' => 'https://schema.org',
                '@graph'   => [
                    [
                        '@type'       => 'Organization',
                        '@id'         => url('/') . '/#organization',
                        'name'        => 'Navanidhi Naturals',
                        'legalName'   => 'MAN Agro Foods',
                        'url'         => url('/'),
                        'logo'        => [
                            '@type'   => 'ImageObject',
                            '@id'     => url('/') . '/#logo',
                            'url'     => url('/') . '/logo.svg',
                            'caption' => 'Navanidhi Naturals — MAN Agro Foods',
                        ],
                        'sameAs'      => [
                            'https://instagram.com/navanidhinaturals',
                            'https://youtube.com/@navanidhinaturals',
                            'https://facebook.com/navanidhinaturals',
                        ],
                        'contactPoint' => [
                            '@type'             => 'ContactPoint',
                            'telephone'         => '+91-98765-43210',
                            'contactType'       => 'customer service',
                            'email'             => 'support@navanidhinaturals.com',
                            'areaServed'        => 'IN',
                            'availableLanguage' => ['English', 'Hindi', 'Telugu', 'Kannada'],
                        ],
                    ],
                    [
                        '@type'           => 'WebSite',
                        '@id'             => url('/') . '/#website',
                        'url'             => url('/'),
                        'name'            => 'Navanidhi Naturals',
                        'description'     => 'Pure Botanical Nutrition, Single Herb Powders & Clean Functional Blends by MAN Agro Foods',
                        'publisher'       => [
                            '@id' => url('/') . '/#organization',
                        ],
                        'potentialAction' => [
                            '@type'       => 'SearchAction',
                            'target'      => [
                                '@type'       => 'EntryPoint',
                                'urlTemplate' => url('/search') . '?query={search_term_string}',
                            ],
                            'query-input' => 'required name=search_term_string',
                        ],
                    ],
                ],
            ];
        @endphp
        <!-- JSON-LD Global Organization & WebSite Schema -->
        <script type="application/ld+json">
        {!! json_encode($globalSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
        </script>

        @php
            $faviconConfig = core()->getConfigData('general.design.admin_logo.favicon');
            $faviconUrl = core()->getCurrentChannel()->favicon_url
                ?: ($faviconConfig ? \Illuminate\Support\Facades\Storage::url($faviconConfig) : bagisto_asset('images/favicon.ico'));
        @endphp

        <link rel="icon" sizes="16x16" href="{{ $faviconUrl }}" />
        <link rel="apple-touch-icon" href="{{ $faviconUrl }}" />

        <!-- Compiled Base Vite Assets -->
        @bagistoVite(['src/Resources/assets/css/app.css', 'src/Resources/assets/js/app.js'])

        <!-- Preconnect to Font Services -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

        <!-- Approved Typography: Playfair Display (Primary Display) & Montserrat (Secondary UI) -->
        <link 
            rel="stylesheet" 
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap"
        />

        <!-- Material Symbols for Clean Vector Icons -->
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />

        <!-- Centralized Navanidhi Naturals Modern Design Tokens & CSS Animation Engine -->
        <style>
            :root {
                /* Modern Organic Botanical Palette */
                --navanidhi-color-deep-green:     #0D5C3A;
                --navanidhi-color-deep-green-dark:#073520;
                --navanidhi-color-sage-green:     #2E7D32;
                --navanidhi-color-earth-brown:    #9E5A38;
                --navanidhi-color-warm-gold:      #D4A359;
                --navanidhi-color-warm-gold-dark: #B8873E;
                --navanidhi-color-light-beige:    #F7F9F6;
                --navanidhi-color-off-white:      #FCFBF7;
                --navanidhi-color-black:          #111827;
                --navanidhi-color-white:          #FFFFFF;
                --navanidhi-color-muted:          #6B7280;
                --navanidhi-color-border:         #E5E7EB;

                /* Semantic mappings */
                --navanidhi-primary:              var(--navanidhi-color-deep-green);
                --navanidhi-primary-hover:        var(--navanidhi-color-deep-green-dark);
                --navanidhi-secondary:            var(--navanidhi-color-sage-green);
                --navanidhi-accent:               var(--navanidhi-color-warm-gold);
                --navanidhi-background:           var(--navanidhi-color-light-beige);
                --navanidhi-surface:              var(--navanidhi-color-off-white);
                --navanidhi-card:                 var(--navanidhi-color-white);
                --navanidhi-text:                 var(--navanidhi-color-black);
                --navanidhi-text-muted:           var(--navanidhi-color-muted);
                --navanidhi-border:               var(--navanidhi-color-border);

                /* Compatibility aliases */
                --elior-green:                    var(--navanidhi-color-deep-green);
                --elior-green-dark:               var(--navanidhi-color-deep-green-dark);
                --elior-green-light:              #E8F5EE;
                --elior-gold:                     var(--navanidhi-color-warm-gold);
                --elior-gold-dark:                var(--navanidhi-color-warm-gold-dark);
                --elior-gold-light:               #FEF9EF;
                --elior-bg:                       var(--navanidhi-color-light-beige);
                --elior-surface:                  var(--navanidhi-color-off-white);
                --elior-card:                     var(--navanidhi-color-white);
                --elior-border:                   var(--navanidhi-color-border);
                --elior-text:                     var(--navanidhi-color-black);
                --elior-muted:                    var(--navanidhi-color-muted);

                /* Typography */
                --navanidhi-font-display:         'Playfair Display', Georgia, serif;
                --navanidhi-font-body:            'Montserrat', system-ui, -apple-system, sans-serif;
            }

            /* Master Body Typography: Montserrat */
            body, p, span:not([class*="material-symbols"]):not([class*="icon-"]),
            a:not([class*="material-symbols"]):not([class*="icon-"]),
            button:not([class*="material-symbols"]):not([class*="icon-"]),
            input, select, textarea, label {
                font-family: var(--navanidhi-font-body) !important;
            }

            /* Editorial Headings: Playfair Display */
            h1, h2, h3, h4, h5, h6,
            .font-serif,
            .font-display,
            .navanidhi-display,
            .brand-heading {
                font-family: var(--navanidhi-font-display) !important;
            }

            /* Preserve Bagisto Icon Font */
            [class^="icon-"], [class*=" icon-"] {
                font-family: "bagisto-shop" !important;
                speak: never;
                font-style: normal;
                font-weight: normal;
                line-height: 1 !important;
                -webkit-font-smoothing: antialiased;
            }

            /* Preserve Google Material Symbols */
            .material-symbols-outlined, [class*="material-symbols"] {
                font-family: 'Material Symbols Outlined' !important;
                font-weight: normal !important;
                font-style: normal !important;
                display: inline-block;
                line-height: 1;
                text-transform: none;
                letter-spacing: normal;
                word-wrap: normal;
                white-space: nowrap;
                direction: ltr;
                -webkit-font-smoothing: antialiased;
            }

            /* Consistent Focus Rings */
            :focus-visible {
                outline: 2px solid var(--navanidhi-color-warm-gold);
                outline-offset: 2px;
            }

            /* ── Pure CSS GPU Animations ── */
            @keyframes navanidhi-float {
                0%, 100% { transform: translateY(0); }
                50% { transform: translateY(-7px); }
            }
            @keyframes nv-float {
                0%, 100% { transform: translateY(0); }
                50% { transform: translateY(-8px); }
            }
            @keyframes nv-float-slow {
                0%, 100% { transform: translateY(0) rotate(0deg); }
                50% { transform: translateY(-12px) rotate(1deg); }
            }
            @keyframes navanidhi-pulse-glow {
                0%, 100% { box-shadow: 0 0 0 0 rgba(13, 92, 58, 0.35); transform: scale(1); }
                50% { box-shadow: 0 0 0 8px rgba(13, 92, 58, 0); transform: scale(1.02); }
            }
            @keyframes nv-pulse-glow {
                0%, 100% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.4); }
                50% { box-shadow: 0 0 0 12px rgba(34, 197, 94, 0); }
            }
            @keyframes navanidhi-pulse-gold {
                0%, 100% { box-shadow: 0 0 0 0 rgba(212, 163, 89, 0.4); }
                50% { box-shadow: 0 0 0 8px rgba(212, 163, 89, 0); }
            }
            @keyframes nv-shimmer {
                0% { background-position: -200% 0; }
                100% { background-position: 200% 0; }
            }
            @keyframes navanidhi-marquee {
                0% { transform: translateX(0%); }
                100% { transform: translateX(-50%); }
            }
            @keyframes navanidhi-fade-up {
                from { opacity: 0; transform: translateY(16px); }
                to { opacity: 1; transform: translateY(0); }
            }

            .animate-float, .nv-float { animation: nv-float 4.5s ease-in-out infinite !important; }
            .animate-float-delayed, .nv-float-delayed { animation: nv-float 5s ease-in-out infinite 1.5s !important; }
            .nv-float-slow { animation: nv-float-slow 6.5s ease-in-out infinite !important; }
            .animate-pulse-glow, .nv-pulse-glow { animation: nv-pulse-glow 2.5s infinite !important; }
            .animate-pulse-gold { animation: navanidhi-pulse-gold 2.2s infinite !important; }
            .animate-marquee-smooth { display: flex; width: max-content; animation: navanidhi-marquee 28s linear infinite !important; }
            .animate-marquee-smooth:hover { animation-play-state: paused; }

            /* ── Axolyt-Inspired Frosted Glassmorphism Primitives ── */
            .nv-dark-botanical-bg {
                background-color: #041a0e !important;
                background-image: 
                    radial-gradient(circle at 18% 20%, rgba(16, 185, 129, 0.12) 0%, transparent 50%),
                    radial-gradient(circle at 82% 30%, rgba(212, 163, 89, 0.10) 0%, transparent 50%),
                    radial-gradient(circle at 50% 80%, rgba(5, 150, 105, 0.14) 0%, transparent 60%) !important;
            }

            .nv-glass-card {
                background: rgba(255, 255, 255, 0.05) !important;
                backdrop-filter: blur(16px) !important;
                -webkit-backdrop-filter: blur(16px) !important;
                border: 1px solid rgba(255, 255, 255, 0.14) !important;
                box-shadow: 0 20px 48px -12px rgba(0, 0, 0, 0.4) !important;
                border-radius: 1.75rem !important;
                transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s ease, border-color 0.4s ease, background-color 0.4s ease !important;
            }
            .nv-glass-card:hover {
                transform: translateY(-8px) !important;
                background: rgba(255, 255, 255, 0.08) !important;
                border-color: rgba(34, 197, 94, 0.45) !important;
                box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.5), 0 0 35px rgba(34, 197, 94, 0.18) !important;
            }

            .nv-glass-ribbon {
                background: rgba(255, 255, 255, 0.06) !important;
                backdrop-filter: blur(14px) !important;
                -webkit-backdrop-filter: blur(14px) !important;
                border: 1px solid rgba(255, 255, 255, 0.15) !important;
                box-shadow: 0 12px 32px -8px rgba(0, 0, 0, 0.3) !important;
                border-radius: 9999px !important;
            }

            /* Global Frosted Glass Product Showcase Rules */
            .nv-glass-product-showcase .nv-card,
            .nv-glass-product-showcase .nv-product-card {
                background: rgba(4, 26, 14, 0.75) !important;
                backdrop-filter: blur(20px) !important;
                -webkit-backdrop-filter: blur(20px) !important;
                border: 1px solid rgba(255, 255, 255, 0.18) !important;
                border-radius: 28px !important;
                box-shadow: 0 20px 48px -12px rgba(0, 0, 0, 0.5) !important;
                overflow: hidden !important;
            }
            .nv-glass-product-showcase .nv-product-card:hover {
                background: rgba(4, 26, 14, 0.88) !important;
                border-color: rgba(52, 211, 153, 0.45) !important;
                transform: translateY(-6px) !important;
                box-shadow: 0 26px 56px -10px rgba(0, 0, 0, 0.65), 0 0 25px rgba(34, 197, 94, 0.2) !important;
            }
            .nv-glass-product-showcase .nv-product-card > div {
                background: transparent !important;
            }
            .nv-glass-product-showcase .nv-card-title,
            .nv-glass-product-showcase .nv-card-title a,
            .nv-glass-product-showcase h3,
            .nv-glass-product-showcase h3 a {
                color: #FFFFFF !important;
            }
            .nv-glass-product-showcase .nv-product-card:hover .nv-card-title a {
                color: #34D399 !important;
            }
            .nv-glass-product-showcase .nv-price,
            .nv-glass-product-showcase [class*="price"] {
                color: #E6C687 !important;
            }
            .nv-glass-product-showcase p,
            .nv-glass-product-showcase span:not([class*="badge"]):not([class*="dot"]) {
                color: rgba(236, 253, 245, 0.85);
            }
            .nv-glass-product-showcase .nv-btn-cart {
                background: linear-gradient(135deg, #15803d 0%, #0d5c3a 100%) !important;
                color: #FFFFFF !important;
                border: 1px solid rgba(110, 231, 183, 0.3) !important;
                box-shadow: 0 4px 14px rgba(21, 128, 61, 0.3) !important;
            }
            .nv-glass-product-showcase .nv-btn-cart:hover {
                background: linear-gradient(135deg, #16a34a 0%, #15803d 100%) !important;
                box-shadow: 0 6px 20px rgba(22, 163, 74, 0.45) !important;
            }

            .nv-glass-btn-primary {
                background: linear-gradient(135deg, #15803d 0%, #0d5c3a 50%, #064e3b 100%) !important;
                color: #FFFFFF !important;
                border: 1px solid rgba(110, 231, 183, 0.4) !important;
                box-shadow: 0 6px 20px rgba(21, 128, 61, 0.35) !important;
                border-radius: 9999px !important;
                transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
                gap: 0.5rem !important;
                text-decoration: none !important;
                cursor: pointer !important;
            }
            .nv-glass-btn-primary:hover {
                background: linear-gradient(135deg, #16a34a 0%, #15803d 100%) !important;
                box-shadow: 0 10px 28px rgba(22, 163, 74, 0.45), 0 0 20px rgba(34, 197, 94, 0.3) !important;
                transform: translateY(-2px) !important;
                color: #FFFFFF !important;
            }

            .nv-glass-btn-outline {
                background: rgba(255, 255, 255, 0.06) !important;
                backdrop-filter: blur(8px) !important;
                -webkit-backdrop-filter: blur(8px) !important;
                color: #ECFDF5 !important;
                border: 1px solid rgba(255, 255, 255, 0.25) !important;
                border-radius: 9999px !important;
                padding: 12px 28px !important;
                white-space: nowrap !important;
                transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
                gap: 0.5rem !important;
                text-decoration: none !important;
                cursor: pointer !important;
            }
            .nv-glass-btn-outline:hover {
                background: rgba(255, 255, 255, 0.14) !important;
                border-color: rgba(110, 231, 183, 0.5) !important;
                color: #FFFFFF !important;
                transform: translateY(-2px) !important;
            }

            /* ── Hero Stage Floating Badges & Alignment ── */
            .hero-stage-badge-left {
                position: absolute !important;
                top: -12px !important;
                left: -8px !important;
                z-index: 20 !important;
            }
            .hero-stage-badge-right {
                position: absolute !important;
                top: -12px !important;
                right: -8px !important;
                z-index: 20 !important;
            }
            @media (min-width: 640px) {
                .hero-stage-badge-left {
                    top: -14px !important;
                    left: -12px !important;
                }
                .hero-stage-badge-right {
                    top: -14px !important;
                    right: -12px !important;
                }
            }
            @media (min-width: 1024px) {
                .hero-stage-badge-left {
                    top: -16px !important;
                    left: -14px !important;
                }
                .hero-stage-badge-right {
                    top: -16px !important;
                    right: -14px !important;
                }
            }
            @media (max-width: 390px) {
                .hero-stage-badge-left {
                    top: -10px !important;
                    left: 2px !important;
                }
                .hero-stage-badge-right {
                    top: -10px !important;
                    right: 2px !important;
                }
            }

            /* ── Self-Contained Grid Systems ── */
            .nv-grid-5 {
                display: grid;
                grid-template-columns: repeat(5, minmax(0, 1fr));
                gap: 1.25rem;
            }
            @media (max-width: 1024px) {
                .nv-grid-5 { grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 1rem; }
            }
            @media (max-width: 640px) {
                .nv-grid-5 { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 0.75rem; }
            }

            .nv-grid-4 {
                display: grid;
                grid-template-columns: repeat(4, minmax(0, 1fr));
                gap: 1.5rem;
            }
            @media (max-width: 1024px) {
                .nv-grid-4 { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1.25rem; }
            }
            @media (max-width: 640px) {
                .nv-grid-4 { grid-template-columns: 1fr; gap: 1rem; }
            }

            .nv-grid-3 {
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 1.5rem;
            }
            @media (max-width: 1024px) {
                .nv-grid-3 { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1.25rem; }
            }
            @media (max-width: 640px) {
                .nv-grid-3 { grid-template-columns: 1fr; gap: 1rem; }
            }

            /* ── Footer 12-Column Responsive Layout ── */
            .nv-footer-grid {
                display: grid;
                grid-template-columns: repeat(12, minmax(0, 1fr));
                gap: 2.5rem;
            }
            .nv-footer-col-1 { grid-column: span 5 / span 5; }
            .nv-footer-col-2 { grid-column: span 2 / span 2; }
            .nv-footer-col-3 { grid-column: span 2 / span 2; }
            .nv-footer-col-4 { grid-column: span 3 / span 3; }

            @media (max-width: 1024px) {
                .nv-footer-grid {
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                    gap: 2rem;
                }
                .nv-footer-col-1 { grid-column: span 2 / span 2; }
                .nv-footer-col-2 { grid-column: span 1 / span 1; }
                .nv-footer-col-3 { grid-column: span 1 / span 1; }
                .nv-footer-col-4 { grid-column: span 2 / span 2; }
            }
            @media (max-width: 640px) {
                .nv-footer-grid {
                    grid-template-columns: 1fr;
                    gap: 2rem;
                }
                .nv-footer-col-1, .nv-footer-col-2, .nv-footer-col-3, .nv-footer-col-4 {
                    grid-column: span 1 / span 1;
                }
            }

            /* ── Responsive Desktop Header Logo & Navigation ── */
            .header-container-desktop {
                min-height: 92px !important;
                padding-top: 1rem !important;
                padding-bottom: 1rem !important;
            }
            .header-desktop-logo {
                height: 36px !important;
                max-height: 38px !important;
                max-width: 195px !important;
                width: auto !important;
                object-fit: contain !important;
            }
            @media (min-width: 1280px) {
                .header-desktop-logo {
                    height: 44px !important;
                    max-height: 48px !important;
                    max-width: 245px !important;
                }
            }
            .header-nav-wrap {
                display: flex !important;
                align-items: center !important;
                gap: 0.15rem !important;
            }
            @media (min-width: 1280px) {
                .header-nav-wrap {
                    gap: 0.5rem !important;
                }
            }
            .header-nav-pill {
                padding: 0.35rem 0.75rem !important;
                border-radius: 9999px !important;
                font-size: 0.72rem !important;
                text-transform: uppercase !important;
                letter-spacing: 0.08em !important;
                font-weight: 700 !important;
                transition: all 0.25s ease !important;
                color: #ECFDF5 !important;
                text-decoration: none !important;
                display: inline-flex !important;
                align-items: center !important;
                white-space: nowrap !important;
            }
            @media (min-width: 1280px) {
                .header-nav-pill {
                    padding: 0.4rem 0.95rem !important;
                    font-size: 0.75rem !important;
                }
            }
            .header-nav-pill:hover {
                background-color: rgba(255, 255, 255, 0.15) !important;
                color: #FFFFFF !important;
            }
            .header-nav-pill.active {
                background: linear-gradient(135deg, #15803d 0%, #0d5c3a 100%) !important;
                color: #FFFFFF !important;
                box-shadow: 0 0 12px rgba(34, 197, 94, 0.4) !important;
            }
            .header-nav-pill.active:hover {
                background: linear-gradient(135deg, #16a34a 0%, #15803d 100%) !important;
                color: #FFFFFF !important;
            }

            /* Header Desktop Utility Icon Glass Buttons */
            .header-container-desktop button[type="button"],
            .header-container-desktop a[aria-label="Wishlist"] {
                background-color: rgba(255, 255, 255, 0.12) !important;
                color: #FFFFFF !important;
                border: 1px solid rgba(255, 255, 255, 0.20) !important;
                backdrop-filter: blur(12px) !important;
                -webkit-backdrop-filter: blur(12px) !important;
                transition: all 0.25s ease !important;
            }
            .header-container-desktop button[type="button"]:hover,
            .header-container-desktop a[aria-label="Wishlist"]:hover {
                background-color: rgba(34, 197, 94, 0.3) !important;
                border-color: rgba(74, 222, 128, 0.5) !important;
                color: #FFFFFF !important;
                transform: translateY(-1px);
            }
            .header-container-desktop button[type="button"] svg,
            .header-container-desktop a[aria-label="Wishlist"] svg,
            .header-container-desktop .icon-cart {
                color: #FFFFFF !important;
            }

            /* ── Axolyt Frosted Glass Cards ── */
            .nv-card,
            .nv-product-card,
            .nv-recipe-card {
                background: rgba(4, 26, 14, 0.78) !important;
                backdrop-filter: blur(20px) !important;
                -webkit-backdrop-filter: blur(20px) !important;
                border: 1px solid rgba(255, 255, 255, 0.15) !important;
                border-radius: 28px !important;
                box-shadow: 0 16px 40px -10px rgba(0, 0, 0, 0.5), inset 0 1px 0 rgba(255, 255, 255, 0.12) !important;
                transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
                color: #FFFFFF !important;
            }
            .nv-card:hover,
            .nv-product-card:hover,
            .nv-recipe-card:hover {
                background: rgba(4, 26, 14, 0.88) !important;
                transform: translateY(-4px) !important;
                border-color: rgba(52, 211, 153, 0.45) !important;
                box-shadow: 0 24px 50px -12px rgba(0, 0, 0, 0.65), 0 0 25px rgba(34, 197, 94, 0.2) !important;
            }

            /* ── Product Card Typography ── */
            .nv-card-title,
            .nv-card-title a {
                font-family: 'Montserrat', system-ui, -apple-system, sans-serif !important;
                font-size: 16px !important;
                font-weight: 700 !important;
                color: #FFFFFF !important;
                line-height: 1.35 !important;
                text-decoration: none !important;
                transition: color 0.2s ease !important;
            }
            .nv-product-card:hover .nv-card-title,
            .nv-product-card:hover .nv-card-title a {
                color: #34D399 !important;
            }

            /* ── Global Nature Glassmorphism Overrides ── */
            /* Strip legacy white/cream block backgrounds across all page views */
            main#main .bg-white,
            main#main .bg-\[\#FAF8F5\],
            main#main .bg-\[\#f4f0e6\],
            main#main .bg-\[\#FCFBF7\],
            main#main .bg-\[\#F7F5EE\],
            main#main .bg-\[\#F7F5F0\],
            main#main .bg-zinc-100,
            main#main .bg-zinc-50,
            main#main .bg-gray-100,
            main#main .bg-gray-50,
            main#main .bg-elior-cream {
                background-color: rgba(4, 26, 14, 0.78) !important;
                backdrop-filter: blur(20px) !important;
                -webkit-backdrop-filter: blur(20px) !important;
                border-color: rgba(255, 255, 255, 0.15) !important;
                color: #FFFFFF !important;
            }

            /* Ensure text inside converted cards is bright and legible */
            main#main h1, main#main h2, main#main h3, main#main h4, main#main h5, main#main h6 {
                color: #FFFFFF !important;
            }
            main#main p, main#main li, main#main td, main#main th {
                color: rgba(255, 255, 255, 0.88) !important;
            }
            main#main label {
                color: rgba(255, 255, 255, 0.85) !important;
            }

            /* Global Accordion Glassmorphism */
            .v-accordion, [class*="accordion"] {
                background: transparent !important;
                border-color: rgba(255, 255, 255, 0.12) !important;
            }
            [class*="accordion"] [role="button"] {
                color: #FFFFFF !important;
                background: transparent !important;
            }
            [class*="accordion"] .bg-white {
                background: rgba(4, 26, 14, 0.75) !important;
                backdrop-filter: blur(16px) !important;
                -webkit-backdrop-filter: blur(16px) !important;
                border: 1px solid rgba(255, 255, 255, 0.12) !important;
                border-radius: 1rem !important;
                color: #FFFFFF !important;
            }

            /* Global Tabs Glassmorphism */
            v-tabs .bg-zinc-100,
            .v-tabs .bg-zinc-100,
            [class*="tabs"] .bg-zinc-100 {
                background: rgba(4, 26, 14, 0.78) !important;
                backdrop-filter: blur(16px) !important;
                -webkit-backdrop-filter: blur(16px) !important;
                border: 1px solid rgba(255, 255, 255, 0.15) !important;
                border-radius: 9999px !important;
                padding: 0.5rem 1rem !important;
            }
            [class*="tabs"] [role="button"],
            v-tabs [role="button"] {
                color: rgba(255, 255, 255, 0.75) !important;
                border-radius: 9999px !important;
                transition: all 0.25s ease !important;
            }
            [class*="tabs"] [role="button"]:hover,
            v-tabs [role="button"]:hover {
                color: #FFFFFF !important;
                background: rgba(255, 255, 255, 0.1) !important;
            }
            [class*="tabs"] [role="button"].border-navyBlue,
            v-tabs [role="button"].border-navyBlue,
            [class*="tabs"] .tab-active {
                background: linear-gradient(135deg, #10B981 0%, #059669 100%) !important;
                color: #FFFFFF !important;
                border-color: transparent !important;
                box-shadow: 0 0 16px rgba(16, 185, 129, 0.4) !important;
            }

            /* Global Drawers Glassmorphism (Mini-Cart, Mobile Navigation) */
            [class*="drawer"] .bg-\[\#FAF8F5\],
            [class*="drawer"] .bg-white,
            [class*="drawer"] .bg-\[\#F7F5EE\] {
                background: rgba(4, 26, 14, 0.94) !important;
                backdrop-filter: blur(24px) !important;
                -webkit-backdrop-filter: blur(24px) !important;
                color: #FFFFFF !important;
                border-color: rgba(255, 255, 255, 0.12) !important;
            }
            [class*="drawer"] p,
            [class*="drawer"] span,
            [class*="drawer"] a {
                color: #FFFFFF !important;
            }
            [class*="drawer"] a:hover {
                color: #34D399 !important;
            }

            /* Global Dropdowns Glassmorphism */
            [class*="dropdown"] .bg-white,
            .dropdown-menu,
            v-dropdown .bg-white {
                background: rgba(4, 26, 14, 0.94) !important;
                backdrop-filter: blur(24px) !important;
                -webkit-backdrop-filter: blur(24px) !important;
                border: 1px solid rgba(255, 255, 255, 0.18) !important;
                border-radius: 18px !important;
                box-shadow: 0 24px 60px rgba(0, 0, 0, 0.75) !important;
                color: #FFFFFF !important;
                overflow: hidden !important;
            }
            [class*="dropdown"] p,
            [class*="dropdown"] span,
            [class*="dropdown"] a,
            [class*="dropdown"] li {
                color: rgba(255, 255, 255, 0.9) !important;
            }
            [class*="dropdown"] a:hover,
            [class*="dropdown"] li:hover {
                color: #34D399 !important;
                background: rgba(255, 255, 255, 0.08) !important;
            }

            /* Global Form Controls (Inputs, Selects, Textareas) */
            input[type="text"]:not([class*="mobile-search-input"]),
            input[type="email"],
            input[type="password"],
            input[type="number"],
            input[type="tel"],
            select,
            textarea {
                background: rgba(255, 255, 255, 0.08) !important;
                border: 1px solid rgba(255, 255, 255, 0.20) !important;
                color: #FFFFFF !important;
                border-radius: 0.75rem !important;
                backdrop-filter: blur(8px) !important;
                -webkit-backdrop-filter: blur(8px) !important;
                transition: all 0.25s ease !important;
            }
            input::placeholder, textarea::placeholder {
                color: rgba(255, 255, 255, 0.45) !important;
            }
            input:focus, select:focus, textarea:focus {
                border-color: #34D399 !important;
                background: rgba(255, 255, 255, 0.12) !important;
                box-shadow: 0 0 0 3px rgba(52, 211, 153, 0.25) !important;
                outline: none !important;
            }

            /* Category Discovery Pills & Filter Chips */
            .category-chip,
            a[href*="/products"].rounded-full,
            a[href*="/categories/"].rounded-full,
            a[href*="/spices"].rounded-full,
            a[href*="/botanical-powders"].rounded-full {
                background: rgba(4, 26, 14, 0.75) !important;
                backdrop-filter: blur(12px) !important;
                -webkit-backdrop-filter: blur(12px) !important;
                border: 1px solid rgba(255, 255, 255, 0.18) !important;
                color: #FFFFFF !important;
                text-decoration: none !important;
                transition: all 0.25s ease !important;
            }
            a[href*="/products"].rounded-full:hover,
            a[href*="/categories/"].rounded-full:hover,
            a[href*="/spices"].rounded-full:hover,
            a[href*="/botanical-powders"].rounded-full:hover {
                border-color: rgba(52, 211, 153, 0.6) !important;
                background: rgba(4, 26, 14, 0.9) !important;
                color: #34D399 !important;
                transform: translateY(-1px) !important;
            }

            /* Quantity Box and Control Buttons */
            .quantity-box,
            .custom-qty,
            [class*="quantity"] {
                background: rgba(255, 255, 255, 0.08) !important;
                border: 1px solid rgba(255, 255, 255, 0.20) !important;
                border-radius: 9999px !important;
                color: #FFFFFF !important;
            }
            .quantity-box button,
            .custom-qty button {
                color: #FFFFFF !important;
            }
            .quantity-box input,
            .custom-qty input {
                background: transparent !important;
                border: none !important;
                color: #FFFFFF !important;
            }

            /* PDP Wishlist Glass Button */
            .pdp-wishlist-btn,
            button[aria-label*="wishlist" i],
            button[title*="wishlist" i] {
                background: rgba(4, 26, 14, 0.75) !important;
                border: 1px solid rgba(255, 255, 255, 0.22) !important;
                color: #FFFFFF !important;
                backdrop-filter: blur(12px) !important;
                -webkit-backdrop-filter: blur(12px) !important;
            }
            .pdp-wishlist-btn:hover,
            button[aria-label*="wishlist" i]:hover,
            button[title*="wishlist" i]:hover {
                background: linear-gradient(135deg, #10B981, #059669) !important;
                border-color: rgba(52, 211, 153, 0.6) !important;
                color: #FFFFFF !important;
                transform: scale(1.08) !important;
            }

            /* Table Borders & Alternating Rows */
            table, tr, td, th {
                border-color: rgba(255, 255, 255, 0.12) !important;
            }
            tbody tr:hover {
                background-color: rgba(255, 255, 255, 0.04) !important;
            }

            /* ── Delicate Micro Vegetarian Dot Badge ── */
            .nv-veg-badge {
                position: absolute !important;
                top: 12px !important;
                right: 12px !important;
                width: 19px !important;
                height: 19px !important;
                border: 1.5px solid #16A34A !important;
                background-color: rgba(255, 255, 255, 0.95) !important;
                backdrop-filter: blur(4px) !important;
                border-radius: 4px !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08) !important;
                z-index: 10 !important;
                pointer-events: none !important;
            }
            .nv-veg-dot {
                width: 8px !important;
                height: 8px !important;
                border-radius: 50% !important;
                background-color: #16A34A !important;
                display: block !important;
            }

            /* ── Refined Luxury Product Badges ── */
            .nv-badge-sale {
                background-color: #0D5C3A !important;
                color: #FFFFFF !important;
                font-size: 10px !important;
                font-weight: 700 !important;
                letter-spacing: 0.06em !important;
                text-transform: uppercase !important;
                padding: 3px 9px !important;
                border-radius: 9999px !important;
                box-shadow: 0 2px 6px rgba(13, 92, 58, 0.2) !important;
                display: inline-flex !important;
                align-items: center !important;
            }
            .nv-badge-new {
                background: rgba(255, 255, 255, 0.95) !important;
                color: #0D5C3A !important;
                border: 1px solid rgba(13, 92, 58, 0.2) !important;
                backdrop-filter: blur(8px) !important;
                font-size: 10px !important;
                font-weight: 700 !important;
                letter-spacing: 0.08em !important;
                text-transform: uppercase !important;
                padding: 3px 9px !important;
                border-radius: 9999px !important;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05) !important;
                display: inline-flex !important;
                align-items: center !important;
                gap: 5px !important;
            }

            /* ── Luxury Product Card Action Button (Full Pill, Modern, Proportional) ── */
            .nv-btn-cart {
                width: 100% !important;
                height: 44px !important;
                min-height: 44px !important;
                border-radius: 9999px !important;
                background-color: #0D5C3A !important;
                color: #FFFFFF !important;
                font-family: 'Montserrat', system-ui, -apple-system, sans-serif !important;
                font-size: 12px !important;
                font-weight: 700 !important;
                letter-spacing: 0.1em !important;
                text-transform: uppercase !important;
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
                gap: 8px !important;
                border: none !important;
                box-shadow: 0 2px 8px rgba(13, 92, 58, 0.2) !important;
                transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1) !important;
                cursor: pointer !important;
                text-decoration: none !important;
                outline: none !important;
            }
            .nv-btn-cart svg {
                width: 16px !important;
                height: 16px !important;
                color: #FFFFFF !important;
                stroke: currentColor !important;
            }
            .nv-btn-cart:hover {
                background-color: #073822 !important;
                transform: translateY(-1.5px) !important;
                box-shadow: 0 6px 18px rgba(13, 92, 58, 0.3) !important;
            }
            .nv-btn-cart:active {
                transform: translateY(0) !important;
                box-shadow: 0 2px 4px rgba(13, 92, 58, 0.2) !important;
            }
            .nv-btn-cart:disabled {
                opacity: 0.55 !important;
                cursor: not-allowed !important;
                transform: none !important;
                box-shadow: none !important;
                background-color: #9CA3AF !important;
            }

            .nv-btn-cart-compact {
                height: 42px !important;
                min-height: 42px !important;
                padding-left: 24px !important;
                padding-right: 24px !important;
                border-radius: 9999px !important;
                background-color: #0D5C3A !important;
                color: #FFFFFF !important;
                font-family: 'Montserrat', system-ui, -apple-system, sans-serif !important;
                font-size: 12px !important;
                font-weight: 700 !important;
                letter-spacing: 0.1em !important;
                text-transform: uppercase !important;
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
                gap: 8px !important;
                border: none !important;
                box-shadow: 0 2px 8px rgba(13, 92, 58, 0.2) !important;
                transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1) !important;
                cursor: pointer !important;
                text-decoration: none !important;
            }
            .nv-btn-cart-compact:hover {
                background-color: #073822 !important;
                transform: translateY(-1.5px) !important;
                box-shadow: 0 6px 18px rgba(13, 92, 58, 0.3) !important;
            }

            .nv-discount-pill {
                font-size: 10.5px !important;
                font-weight: 700 !important;
                letter-spacing: 0.04em !important;
                text-transform: uppercase !important;
                color: #0D5C3A !important;
                background-color: #E8F5EE !important;
                border: 1px solid rgba(13, 92, 58, 0.2) !important;
                padding: 2px 8px !important;
                border-radius: 9999px !important;
                display: inline-flex !important;
                align-items: center !important;
                margin-left: auto !important;
            }

            .nv-card-action-btn {
                width: 32px !important;
                height: 32px !important;
                border-radius: 50% !important;
                background-color: rgba(255, 255, 255, 0.92) !important;
                border: 1px solid rgba(0, 0, 0, 0.08) !important;
                color: #374151 !important;
                backdrop-filter: blur(6px) !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08) !important;
                transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1) !important;
                cursor: pointer !important;
            }
            .nv-card-action-btn:hover {
                background-color: #0D5C3A !important;
                border-color: #0D5C3A !important;
                color: #FFFFFF !important;
                transform: scale(1.08) !important;
                box-shadow: 0 4px 12px rgba(13, 92, 58, 0.25) !important;
            }
            .nv-card-action-btn:hover svg {
                stroke: #FFFFFF !important;
            }
            .nv-card-action-btn:hover span {
                color: #FFFFFF !important;
            }

            /* Modern Buttons */
            .btn-emerald-primary {
                position: relative;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 0.5rem;
                padding: 0.8125rem 2rem;
                border-radius: 9999px;
                font-family: var(--navanidhi-font-body);
                font-size: 0.8125rem;
                font-weight: 700;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                color: #FFFFFF !important;
                background: linear-gradient(135deg, #0D5C3A 0%, #073520 100%);
                border: 1px solid rgba(212, 163, 89, 0.4);
                box-shadow: 0 4px 16px rgba(13, 92, 58, 0.25);
                transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
                overflow: hidden;
                cursor: pointer;
                text-decoration: none !important;
            }
            .btn-emerald-primary::before {
                content: '';
                position: absolute;
                top: 0;
                left: -150%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
                transition: left 0.75s ease;
            }
            .btn-emerald-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 28px rgba(13, 92, 58, 0.35);
                border-color: #D4A359;
                color: #FFFFFF !important;
            }
            .btn-emerald-primary:hover::before {
                left: 150%;
            }

            .btn-gold-accent {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 0.5rem;
                padding: 0.8125rem 2rem;
                border-radius: 9999px;
                font-family: var(--navanidhi-font-body);
                font-size: 0.8125rem;
                font-weight: 700;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                color: #FFFFFF !important;
                background: linear-gradient(135deg, #D4A359 0%, #B8873E 100%);
                box-shadow: 0 8px 24px -4px rgba(212, 163, 89, 0.35);
                transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
                cursor: pointer;
                text-decoration: none !important;
            }
            .btn-gold-accent:hover {
                transform: translateY(-2px);
                box-shadow: 0 12px 30px -4px rgba(212, 163, 89, 0.45);
                filter: brightness(1.05);
            }

            .btn-emerald-outline {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 0.5rem;
                padding: 0.8125rem 2rem;
                border-radius: 9999px;
                font-family: var(--navanidhi-font-body);
                font-size: 0.8125rem;
                font-weight: 700;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                color: #0D5C3A !important;
                background: rgba(255, 255, 255, 0.95);
                border: 1.5px solid #0D5C3A;
                box-shadow: 0 2px 8px rgba(13, 92, 58, 0.06);
                backdrop-filter: blur(8px);
                transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
                text-decoration: none !important;
            }
            .btn-emerald-outline:hover {
                background: #0D5C3A;
                color: #FFFFFF !important;
                transform: translateY(-2px);
                box-shadow: 0 8px 22px rgba(13, 92, 58, 0.22);
            }

            /* Glass Header & Surfaces */
            .glass-header {
                background: rgba(4, 26, 14, 0.82) !important;
                backdrop-filter: blur(20px) !important;
                -webkit-backdrop-filter: blur(20px) !important;
                border-bottom: 1px solid rgba(255, 255, 255, 0.12) !important;
            }

            /* Modern Card Lift */
            .card-modern-hover {
                transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            }
            /* Navigation Pill Links */
            .nav-link-pill {
                display: inline-flex;
                align-items: center;
                white-space: nowrap !important;
                padding: 0.35rem 0.65rem;
                border-radius: 9999px;
                font-family: var(--navanidhi-font-body) !important;
                font-size: 0.6875rem;
                font-weight: 600;
                letter-spacing: 0.04em;
                text-transform: uppercase;
                color: #374151 !important;
                text-decoration: none !important;
                transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
                border: 1px solid transparent;
            }
            @media (min-width: 1280px) {
                .nav-link-pill {
                    padding: 0.45rem 1rem;
                    font-size: 0.75rem;
                    letter-spacing: 0.06em;
                }
            }
            .nav-link-pill:hover {
                background-color: rgba(13, 92, 58, 0.06) !important;
                color: #0D5C3A !important;
                border-color: rgba(13, 92, 58, 0.15);
            }
            .nav-link-pill.active {
                background-color: rgba(13, 92, 58, 0.1) !important;
                color: #0D5C3A !important;
                font-weight: 700 !important;
                border-color: rgba(13, 92, 58, 0.25) !important;
                box-shadow: 0 1px 4px rgba(13, 92, 58, 0.08) !important;
            }

            @media (prefers-reduced-motion: reduce) {
                .animate-float, .animate-float-delayed, .animate-pulse-glow, .animate-pulse-gold, .animate-marquee-smooth {
                    animation: none !important;
                    transform: none !important;
                }
            }
            /* ── Mobile Header & Search Bar Luxury Styling ── */
            .no-scrollbar::-webkit-scrollbar {
                display: none !important;
            }
            .no-scrollbar {
                -ms-overflow-style: none !important;
                scrollbar-width: none !important;
            }

            .mobile-header-bar {
                background-color: #FAF8F5 !important;
                border-bottom: 1px solid #E5DECB !important;
            }
            .mobile-header-icon-btn {
                width: 38px !important;
                height: 38px !important;
                border-radius: 9999px !important;
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
                color: #0D5C3A !important;
                background-color: transparent !important;
                transition: all 0.2s ease !important;
            }
            .mobile-header-icon-btn:hover {
                background-color: rgba(13, 92, 58, 0.08) !important;
            }
            .mobile-header-icon-btn.is-active {
                background: linear-gradient(135deg, #0D5C3A 0%, #073520 100%) !important;
                color: #FFFFFF !important;
                box-shadow: 0 2px 8px rgba(13, 92, 58, 0.3) !important;
            }
            .mobile-header-icon-btn.hide-on-mobile {
                display: none !important;
            }
            @media (min-width: 640px) {
                .mobile-header-icon-btn.hide-on-mobile {
                    display: inline-flex !important;
                }
            }

            .mobile-search-panel {
                background-color: #FAF8F5 !important;
                border-top: 1px solid #E5DECB !important;
                box-shadow: 0 14px 28px -6px rgba(13, 92, 58, 0.12) !important;
                padding: 12px 16px 14px 16px !important;
                box-sizing: border-box !important;
            }
            .mobile-search-input {
                width: 100% !important;
                height: 46px !important;
                border-radius: 9999px !important;
                background-color: #FFFFFF !important;
                border: 1.5px solid #DCD3C3 !important;
                color: #0D5C3A !important;
                font-family: Montserrat, sans-serif !important;
                font-size: 0.84rem !important;
                font-weight: 500 !important;
                padding-left: 2.75rem !important;
                padding-right: 3.25rem !important;
                outline: none !important;
                transition: all 0.2s ease !important;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04) !important;
            }
            .mobile-search-input:focus {
                border-color: #0D5C3A !important;
                box-shadow: 0 0 0 3px rgba(13, 92, 58, 0.15) !important;
            }
            .mobile-search-submit {
                position: absolute !important;
                right: 6px !important;
                top: 50% !important;
                transform: translateY(-50%) !important;
                width: 34px !important;
                height: 34px !important;
                border-radius: 9999px !important;
                background: linear-gradient(135deg, #0D5C3A 0%, #073520 100%) !important;
                color: #FFFFFF !important;
                border: none !important;
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
                cursor: pointer !important;
                box-shadow: 0 2px 6px rgba(13, 92, 58, 0.3) !important;
                transition: all 0.2s ease !important;
            }
            .mobile-search-submit:hover {
                background: #073520 !important;
                transform: translateY(-50%) scale(1.05) !important;
            }
            .mobile-search-submit:active {
                transform: translateY(-50%) scale(0.95) !important;
            }

            .mobile-search-tag {
                display: inline-flex !important;
                align-items: center !important;
                padding: 0.3rem 0.75rem !important;
                border-radius: 9999px !important;
                font-size: 0.6875rem !important;
                font-weight: 600 !important;
                letter-spacing: 0.02em !important;
                text-decoration: none !important;
                white-space: nowrap !important;
                transition: all 0.2s ease !important;
            }
            .mobile-search-tag-moringa {
                background-color: #E8F5E9 !important;
                color: #0D5C3A !important;
                border: 1px solid #C8E6C9 !important;
            }
            .mobile-search-tag-turmeric {
                background-color: #FFF8E1 !important;
                color: #8D6E1A !important;
                border: 1px solid #FFE082 !important;
            }
            .mobile-search-tag-amla {
                background-color: #E8F5E9 !important;
                color: #0D5C3A !important;
                border: 1px solid #C8E6C9 !important;
            }
            .mobile-search-tag-beetroot {
                background-color: #FCE4EC !important;
                color: #9C1A4B !important;
                border: 1px solid #F8BBD0 !important;
            }
            .mobile-search-tag-rituals {
                background-color: #F5EFEB !important;
                color: #5D4037 !important;
                border: 1px solid #D7CCC8 !important;
            }
            .mobile-search-tag:hover {
                transform: translateY(-1px) !important;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08) !important;
            }
        </style>

        {!! view_render_event('bagisto.shop.layout.head.after') !!}
    </head>

    <body class="antialiased text-white bg-transparent selection:bg-[#16A34A] selection:text-white min-h-screen relative" style="background-color: transparent !important;">
        {!! view_render_event('bagisto.shop.layout.body.before') !!}

        <!-- GLOBAL FIXED CONTINUOUS 3D LIVING NATURE SCENE (WATERFALL, MIST, 3D PARTICLES) -->
        <div 
            id="global-nature-background" 
            class="pointer-events-none overflow-hidden" 
            style="position: fixed; inset: 0; width: 100vw; height: 100vh; z-index: -1; background-color: #03140b;" 
            aria-hidden="true"
        >
            <!-- High-Res Tropical Waterfall & Rainforest Scene (Extended Height to prevent scroll gap) -->
            <div 
                id="global-nature-layer"
                style="position: absolute; top: -15%; left: -8%; width: 116%; height: 165%; background-image: url('/images/backgrounds/waterfall_nature_bg.jpg'); background-size: cover; background-position: center top; will-change: transform; transition: transform 0.12s cubic-bezier(0, 0, 0.2, 1);"
            ></div>

            <!-- Atmospheric Emerald Depth & Lighting Vignette for AAA Readability -->
            <div style="position: absolute; inset: 0; background: radial-gradient(circle at 50% 25%, rgba(4, 26, 14, 0.20) 0%, rgba(4, 26, 14, 0.65) 100%), linear-gradient(180deg, rgba(4, 26, 14, 0.45) 0%, rgba(4, 26, 14, 0.18) 30%, rgba(4, 26, 14, 0.35) 70%, rgba(4, 26, 14, 0.75) 100%);"></div>

            <!-- Bottom Edge Seamless Lake Depth Blend to eliminate any bottom gap on all screens -->
            <div style="position: absolute; inset-x: 0; bottom: 0; height: 180px; background: linear-gradient(to top, rgba(3, 20, 11, 0.98) 0%, rgba(3, 20, 11, 0.6) 45%, transparent 100%); pointer-events: none;"></div>

            <!-- Radiant Ambient Volumetric Glow Spheres -->
            <div style="position: absolute; top: 18%; left: 20%; width: 500px; height: 500px; background: rgba(52, 211, 153, 0.12); border-radius: 9999px; filter: blur(140px);"></div>
            <div style="position: absolute; bottom: 25%; right: 18%; width: 450px; height: 450px; background: rgba(212, 163, 89, 0.10); border-radius: 9999px; filter: blur(140px);"></div>

            <!-- GPU-Accelerated 3D Living Nature Mist & Pollen Canvas -->
            <canvas 
                id="global-nature-canvas" 
                style="position: absolute; inset: 0; width: 100%; height: 100%;"
            ></canvas>
        </div>

        <div id="app" class="flex min-h-screen flex-col bg-transparent relative" style="background: transparent !important; z-index: 1;">
            <!-- Header Component -->
            @if ($hasHeader)
                <x-shop::layouts.header />
            @endif

            {!! view_render_event('bagisto.shop.layout.content.before') !!}

            <!-- Flash Messaging -->
            <x-shop::flash-group />

            <!-- Confirm Modal Blade Component -->
            <x-shop::modal.confirm />

            <!-- Main Page Content -->
            <main id="main" class="flex-auto bg-transparent" style="background: transparent !important;">
                {{ $slot }}
            </main>

            {!! view_render_event('bagisto.shop.layout.content.after') !!}

            <!-- Value Proposition Features Banner -->
            @if ($hasFeature)
                <x-shop::layouts.services />
            @endif

            <!-- Global Quick View Modal -->
            <x-shop::products.quick-view />

            <!-- Back to Top Button -->
            <x-shop::layouts.back-to-top />

            <!-- Footer Component -->
            @if ($hasFooter)
                <x-shop::layouts.footer />
            @endif
        </div>

        {!! view_render_event('bagisto.shop.layout.body.after') !!}

        <!-- WebMCP Tool Registration for AI Discovery -->
        <x-shop::layouts.webmcp />

        @stack('scripts')

        {!! view_render_event('bagisto.shop.layout.vue-app-mount.before') !!}
        <script>
            function mountApp() {
                if (window.app && !window.app._isMounted) {
                    window.app.mount("#app");
                    window.app._isMounted = true;
                }
            }

            if (document.readyState === "loading") {
                document.addEventListener("DOMContentLoaded", mountApp);
            } else {
                mountApp();
            }
        </script>
        {!! view_render_event('bagisto.shop.layout.vue-app-mount.after') !!}

        <script type="text/javascript">
            {!! core()->getConfigData('general.content.custom_scripts.custom_javascript') !!}
        </script>

        <!-- Global 3D Animated Nature Engine: Dynamic Particles, Water Droplets & Tumbling Leaves -->
        <script>
            (function initGlobalNatureEngine() {
                const canvas = document.getElementById('global-nature-canvas');
                const natureLayer = document.getElementById('global-nature-layer');
                if (!canvas) return;

                const ctx = canvas.getContext('2d', { alpha: true });
                if (!ctx) return;

                let width = 0;
                let height = 0;
                let animationFrameId = null;
                let isVisible = true;

                let mouseX = 0;
                let mouseY = 0;
                let currentMouseX = 0;
                let currentMouseY = 0;

                function resize() {
                    width = canvas.width = window.innerWidth;
                    height = canvas.height = window.innerHeight;
                }
                resize();
                window.addEventListener('resize', resize, { passive: true });

                // Smooth Parallax on Mouse Movement
                window.addEventListener('mousemove', (e) => {
                    mouseX = (e.clientX / (width || 1) - 0.5) * 2;
                    mouseY = (e.clientY / (height || 1) - 0.5) * 2;
                }, { passive: true });

                // Continuous Scroll Parallax for Background Waterfall & Rainforest
                function updateScrollParallax() {
                    const scrollY = window.pageYOffset || document.documentElement.scrollTop;
                    if (natureLayer) {
                        const translateY = Math.min(scrollY * 0.08, 140);
                        const pX = currentMouseX * 12;
                        const pY = currentMouseY * 8;
                        natureLayer.style.transform = `translate3d(${pX}px, ${-translateY + pY}px, 0) scale(1.08)`;
                    }
                }
                window.addEventListener('scroll', updateScrollParallax, { passive: true });

                // ── 1. 3D Living Nature Particles (Pollen, Spores, Firefly Sparks) ──
                const PARTICLE_COUNT = 160;
                const particles = [];
                for (let i = 0; i < PARTICLE_COUNT; i++) {
                    const kindRand = Math.random();
                    let kind = 'gold';
                    if (kindRand < 0.38) kind = 'emerald';
                    else if (kindRand < 0.72) kind = 'gold';
                    else if (kindRand < 0.90) kind = 'white';
                    else kind = 'amber';

                    particles.push({
                        x: Math.random() * (width || window.innerWidth),
                        y: Math.random() * (height || window.innerHeight),
                        z: Math.random() * 0.85 + 0.15,
                        radius: Math.random() * 2.6 + 0.9,
                        speedY: -(Math.random() * 0.5 + 0.15),
                        speedX: (Math.random() - 0.5) * 0.35,
                        waveFreq: Math.random() * 0.02 + 0.005,
                        waveAmp: Math.random() * 25 + 10,
                        waveOffset: Math.random() * Math.PI * 2,
                        opacity: Math.random() * 0.55 + 0.25,
                        pulseSpeed: Math.random() * 0.03 + 0.01,
                        pulseOffset: Math.random() * Math.PI * 2,
                        kind: kind
                    });
                }

                // ── 2. Glistening Water Droplets & Mist Spray (Rising / Flowing Upward from Waterfall Pool) ──
                const DROPLET_COUNT = 55;
                const droplets = [];
                for (let i = 0; i < DROPLET_COUNT; i++) {
                    droplets.push({
                        x: Math.random() * (width || window.innerWidth),
                        y: Math.random() * (height || window.innerHeight),
                        z: Math.random() * 0.8 + 0.2,
                        radius: Math.random() * 2.8 + 1.2,
                        length: Math.random() * 14 + 8,
                        speedY: -(Math.random() * 0.85 + 0.4), // Gentle upward flow from waterfall pool
                        speedX: (Math.random() - 0.5) * 0.35,
                        swayFreq: Math.random() * 0.02 + 0.008,
                        swayAmp: Math.random() * 0.55 + 0.25,
                        swayOffset: Math.random() * Math.PI * 2,
                        opacity: Math.random() * 0.45 + 0.35,
                        isStream: Math.random() > 0.45
                    });
                }

                // ── 3. Fluttering & Tumbling Botanical Leaves ──
                const LEAF_COUNT = 24;
                const leaves = [];
                const leafColorPalettes = [
                    { fill: 'rgba(16, 185, 129, 0.75)', vein: 'rgba(167, 243, 208, 0.85)' },
                    { fill: 'rgba(5, 150, 105, 0.75)',  vein: 'rgba(110, 231, 183, 0.85)' },
                    { fill: 'rgba(52, 211, 153, 0.75)', vein: 'rgba(209, 250, 229, 0.85)' },
                    { fill: 'rgba(212, 163, 89, 0.75)', vein: 'rgba(253, 230, 138, 0.85)' },
                ];

                for (let i = 0; i < LEAF_COUNT; i++) {
                    leaves.push({
                        x: Math.random() * (width || window.innerWidth),
                        y: Math.random() * (height || window.innerHeight),
                        z: Math.random() * 0.75 + 0.25,
                        size: Math.random() * 18 + 12,
                        speedY: Math.random() * 0.85 + 0.45,
                        speedX: (Math.random() - 0.5) * 0.5,
                        swingAmp: Math.random() * 22 + 10,
                        swingFreq: Math.random() * 0.02 + 0.008,
                        swingOffset: Math.random() * Math.PI * 2,
                        rotation: Math.random() * Math.PI * 2,
                        rotSpeed: (Math.random() - 0.5) * 0.025,
                        flipAngle: Math.random() * Math.PI * 2,
                        flipSpeed: Math.random() * 0.03 + 0.015,
                        opacity: Math.random() * 0.45 + 0.35,
                        palette: leafColorPalettes[Math.floor(Math.random() * leafColorPalettes.length)]
                    });
                }

                let time = 0;
                function render() {
                    if (!isVisible) return;

                    currentMouseX += (mouseX - currentMouseX) * 0.05;
                    currentMouseY += (mouseY - currentMouseY) * 0.05;

                    ctx.clearRect(0, 0, width, height);
                    time += 0.02;

                    // ── RENDER WATER DROPLETS (Slowly Flowing / Rising Upward from Waterfall) ──
                    for (let i = 0; i < DROPLET_COUNT; i++) {
                        const d = droplets[i];

                        // Slowly floating / flowing upward
                        d.y += d.speedY * d.z;
                        d.x += (d.speedX + currentMouseX * 0.35) * d.z + Math.sin(time * d.swayFreq * 10 + d.swayOffset) * d.swayAmp;

                        // Reset when reaching top of viewport
                        if (d.y < -35) {
                            d.y = height + 25 + Math.random() * 25;
                            d.x = Math.random() * width;
                        }
                        if (d.x < -30) d.x = width + 20;
                        if (d.x > width + 30) d.x = -20;

                        const posX = d.x + currentMouseX * 22 * d.z;
                        const posY = d.y + currentMouseY * 16 * d.z;
                        const r = d.radius * d.z;

                        // Smooth organic fade at top and bottom edges
                        let edgeFade = 1;
                        if (d.y < height * 0.18) {
                            edgeFade = Math.max(0, d.y / (height * 0.18));
                        } else if (d.y > height - 40) {
                            edgeFade = Math.max(0, (height - d.y) / 40);
                        }
                        const currentAlpha = d.opacity * d.z * edgeFade;

                        if (currentAlpha <= 0.01) continue;

                        ctx.save();
                        ctx.translate(posX, posY);

                        if (d.isStream) {
                            // Upward-flowing spray droplet with soft mist tail pointing downward
                            const len = d.length * d.z;
                            const angle = Math.atan2((d.speedX + currentMouseX * 0.35) * d.z, d.speedY * d.z);
                            ctx.rotate(angle);
                            ctx.globalAlpha = currentAlpha;

                            const grad = ctx.createLinearGradient(0, len * 0.5, 0, -len * 0.5);
                            grad.addColorStop(0, 'rgba(186, 230, 253, 0)');
                            grad.addColorStop(0.35, 'rgba(186, 230, 253, 0.3)');
                            grad.addColorStop(0.85, 'rgba(255, 255, 255, 0.85)');
                            grad.addColorStop(1, 'rgba(224, 242, 254, 0.95)');

                            ctx.beginPath();
                            ctx.moveTo(0, len * 0.5);
                            ctx.lineTo(-r * 0.65, -len * 0.15);
                            ctx.arc(0, -len * 0.15, r * 0.65, Math.PI, 0);
                            ctx.lineTo(0, len * 0.5);
                            ctx.closePath();

                            ctx.fillStyle = grad;
                            ctx.shadowColor = 'rgba(186, 230, 253, 0.5)';
                            ctx.shadowBlur = 5 * d.z;
                            ctx.fill();

                            // Glistening dew glint
                            ctx.beginPath();
                            ctx.arc(0, -len * 0.18, r * 0.35, 0, Math.PI * 2);
                            ctx.fillStyle = '#FFFFFF';
                            ctx.shadowColor = 'rgba(255, 255, 255, 0.8)';
                            ctx.shadowBlur = 4 * d.z;
                            ctx.fill();
                        } else {
                            // Glistening spherical water droplet / spray bead
                            ctx.globalAlpha = currentAlpha;

                            const dropletGrad = ctx.createRadialGradient(-r * 0.3, -r * 0.3, 0, 0, 0, r * 1.5);
                            dropletGrad.addColorStop(0, 'rgba(255, 255, 255, 0.95)');
                            dropletGrad.addColorStop(0.35, 'rgba(224, 242, 254, 0.7)');
                            dropletGrad.addColorStop(0.7, 'rgba(186, 230, 253, 0.35)');
                            dropletGrad.addColorStop(1, 'rgba(125, 211, 252, 0)');

                            ctx.beginPath();
                            ctx.arc(0, 0, r, 0, Math.PI * 2);
                            ctx.fillStyle = dropletGrad;
                            ctx.shadowColor = 'rgba(186, 230, 253, 0.6)';
                            ctx.shadowBlur = 6 * d.z;
                            ctx.fill();

                            // Specular glint
                            ctx.beginPath();
                            ctx.arc(-r * 0.3, -r * 0.3, r * 0.28, 0, Math.PI * 2);
                            ctx.fillStyle = '#FFFFFF';
                            ctx.fill();
                        }

                        ctx.restore();
                    }

                    // ── RENDER BOTANICAL LEAVES ──
                    for (let i = 0; i < LEAF_COUNT; i++) {
                        const l = leaves[i];

                        l.y += l.speedY * l.z;
                        l.x += l.speedX * l.z + Math.sin(time * l.swingFreq * 10 + l.swingOffset) * 0.55;
                        l.rotation += l.rotSpeed;
                        l.flipAngle += l.flipSpeed;

                        if (l.y > height + 45) {
                            l.y = -45;
                            l.x = Math.random() * width;
                        }
                        if (l.x < -45) l.x = width + 30;
                        if (l.x > width + 45) l.x = -30;

                        const posX = l.x + currentMouseX * 25 * l.z;
                        const posY = l.y + currentMouseY * 18 * l.z;
                        const size = l.size * l.z;
                        const flip = Math.cos(l.flipAngle);

                        ctx.save();
                        ctx.translate(posX, posY);
                        ctx.rotate(l.rotation);
                        ctx.scale(flip, 1);
                        ctx.globalAlpha = l.opacity * l.z;

                        const w = size * 0.55;
                        const h = size;

                        // Leaf Blade
                        ctx.beginPath();
                        ctx.moveTo(0, -h * 0.55);
                        ctx.bezierCurveTo(w, -h * 0.25, w * 0.9, h * 0.25, 0, h * 0.55);
                        ctx.bezierCurveTo(-w * 0.9, h * 0.25, -w, -h * 0.25, 0, -h * 0.55);
                        ctx.closePath();

                        ctx.fillStyle = l.palette.fill;
                        ctx.shadowColor = 'rgba(4, 26, 14, 0.4)';
                        ctx.shadowBlur = 6 * l.z;
                        ctx.fill();

                        // Leaf Central Stem & Vein
                        ctx.beginPath();
                        ctx.moveTo(0, -h * 0.55);
                        ctx.quadraticCurveTo(w * 0.05, 0, 0, h * 0.7);
                        ctx.strokeStyle = l.palette.vein;
                        ctx.lineWidth = Math.max(0.7, size * 0.06);
                        ctx.stroke();

                        ctx.restore();
                    }

                    // ── RENDER 3D LIVING NATURE PARTICLES (160 Particles) ──
                    for (let i = 0; i < PARTICLE_COUNT; i++) {
                        const p = particles[i];

                        p.y += p.speedY * p.z;
                        p.x += p.speedX * p.z + Math.sin(time * p.waveFreq * 10 + p.waveOffset) * 0.35;

                        if (p.y < -30) {
                            p.y = height + 20;
                            p.x = Math.random() * width;
                        }
                        if (p.x < -30) p.x = width + 20;
                        if (p.x > width + 30) p.x = -20;

                        const posX = p.x + currentMouseX * 35 * p.z;
                        const posY = p.y + currentMouseY * 25 * p.z;
                        const r = p.radius * p.z;
                        const pulse = Math.sin(time * p.pulseSpeed * 10 + p.pulseOffset) * 0.25 + 0.75;
                        const currentOpacity = p.opacity * p.z * pulse;

                        ctx.beginPath();
                        ctx.arc(posX, posY, r, 0, Math.PI * 2);

                        if (p.kind === 'gold') {
                            const grad = ctx.createRadialGradient(posX, posY, 0, posX, posY, r * 2.2);
                            grad.addColorStop(0, `rgba(230, 198, 135, ${currentOpacity})`);
                            grad.addColorStop(0.4, `rgba(212, 163, 89, ${currentOpacity * 0.6})`);
                            grad.addColorStop(1, 'rgba(212, 163, 89, 0)');
                            ctx.fillStyle = grad;
                            ctx.shadowColor = 'rgba(212, 163, 89, 0.5)';
                            ctx.shadowBlur = 8 * p.z;
                        } else if (p.kind === 'emerald') {
                            const grad = ctx.createRadialGradient(posX, posY, 0, posX, posY, r * 2.5);
                            grad.addColorStop(0, `rgba(167, 243, 208, ${currentOpacity * 0.9})`);
                            grad.addColorStop(0.5, `rgba(52, 211, 153, ${currentOpacity * 0.5})`);
                            grad.addColorStop(1, 'rgba(52, 211, 153, 0)');
                            ctx.fillStyle = grad;
                            ctx.shadowColor = 'rgba(52, 211, 153, 0.5)';
                            ctx.shadowBlur = 10 * p.z;
                        } else if (p.kind === 'amber') {
                            const grad = ctx.createRadialGradient(posX, posY, 0, posX, posY, r * 2.4);
                            grad.addColorStop(0, `rgba(253, 230, 138, ${currentOpacity})`);
                            grad.addColorStop(0.5, `rgba(245, 158, 11, ${currentOpacity * 0.6})`);
                            grad.addColorStop(1, 'rgba(245, 158, 11, 0)');
                            ctx.fillStyle = grad;
                            ctx.shadowColor = 'rgba(245, 158, 11, 0.45)';
                            ctx.shadowBlur = 9 * p.z;
                        } else {
                            // Sparkling diamond dew mote
                            const grad = ctx.createRadialGradient(posX, posY, 0, posX, posY, r * 2.0);
                            grad.addColorStop(0, `rgba(255, 255, 255, ${currentOpacity * 0.95})`);
                            grad.addColorStop(0.5, `rgba(209, 250, 229, ${currentOpacity * 0.4})`);
                            grad.addColorStop(1, 'rgba(255, 255, 255, 0)');
                            ctx.fillStyle = grad;
                            ctx.shadowColor = 'rgba(255, 255, 255, 0.6)';
                            ctx.shadowBlur = 7 * p.z;
                        }

                        ctx.fill();
                    }

                    // Ambient volumetric mist light
                    ctx.shadowBlur = 0;
                    const mistGrad = ctx.createRadialGradient(width * 0.5, height * 0.35, 20, width * 0.5, height * 0.35, width * 0.45);
                    mistGrad.addColorStop(0, `rgba(255, 255, 255, ${0.03 + Math.sin(time * 0.5) * 0.01})`);
                    mistGrad.addColorStop(0.6, 'rgba(110, 231, 183, 0.02)');
                    mistGrad.addColorStop(1, 'transparent');
                    ctx.fillStyle = mistGrad;
                    ctx.fillRect(0, 0, width, height);

                    animationFrameId = requestAnimationFrame(render);
                }

                document.addEventListener('visibilitychange', () => {
                    if (document.hidden) {
                        isVisible = false;
                        if (animationFrameId) cancelAnimationFrame(animationFrameId);
                    } else {
                        isVisible = true;
                        animationFrameId = requestAnimationFrame(render);
                    }
                });

                animationFrameId = requestAnimationFrame(render);
            })();
        </script>
    </body>
</html>
