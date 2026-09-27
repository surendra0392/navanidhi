<!-- Page Layout -->
<x-shop::layouts :has-feature="false">
    <!-- Page Title -->
    <x-slot:title>
        Contact Navanidhi Naturals | Botanical Nutrition, Care & Wholesale Inquiries
    </x-slot>

    @inject('themeCustomizationRepository', 'Webkul\Theme\Repositories\ThemeCustomizationRepository')

    @php
        $channel = core()->getCurrentChannel();
        $contactEmail = core()->getConfigData('emails.configure.email_settings.contact_email') ?: 'info@navanidhinaturals.com';
        $adminEmail = core()->getConfigData('emails.configure.email_settings.admin_email') ?: 'info@navanidhinaturals.com';
        $address = core()->getConfigData('sales.shipping.origin.address') ?: (core()->getConfigData('sales.shipping.origin.address1') ?: 'Plot 42, Road No. 36, Jubilee Hills');
        $city = core()->getConfigData('sales.shipping.origin.city') ?: 'Hyderabad';
        $state = core()->getConfigData('sales.shipping.origin.state') ?: 'Telangana';
        $zipcode = core()->getConfigData('sales.shipping.origin.zipcode') ?: '500033';
        $country = core()->getConfigData('sales.shipping.origin.country') === 'IN' ? 'India' : (core()->getConfigData('sales.shipping.origin.country') ?: 'India');

        $customization = $themeCustomizationRepository->findOneWhere([
            'type'       => 'footer_links',
            'status'     => 1,
            'theme_code' => $channel->theme,
            'channel_id' => $channel->id,
        ]);

        $socialLinks = $customization->options['social_links'] ?? [
            'instagram' => 'https://instagram.com/navanidhinaturals',
            'youtube'   => 'https://youtube.com/@navanidhinaturals',
            'linkedin'  => 'https://linkedin.com/company/managrofoods',
            'twitter'   => 'https://twitter.com/navanidhinat',
            'facebook'  => 'https://facebook.com/navanidhinaturals',
        ];
    @endphp

    @push('meta')
        <meta name="title" content="Contact Navanidhi Naturals | Pure Farm Spices & Botanical Care | MAN Agro Foods" />
        <meta name="description" content="Connect with the Navanidhi Naturals team by MAN Agro Foods for pure farm spice inquiries, cold-dehydrated powder guidance, batch test reports (COA), and wholesale partnerships." />
        <meta name="keywords" content="contact navanidhi naturals, pure farm spices, red chilli, lakadong turmeric, botanical nutrition support, wholesale spices, batch test report, navanidhi naturals customer care, MAN Agro Foods" />

        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="Contact Navanidhi Naturals | Pure Farm Spices & Botanical Care | MAN Agro Foods" />
        <meta name="twitter:description" content="Connect with the Navanidhi Naturals team by MAN Agro Foods for pure farm spice inquiries, cold-dehydrated powder guidance, batch test reports (COA), and wholesale partnerships." />

        <meta property="og:type" content="website" />
        <meta property="og:title" content="Contact Navanidhi Naturals | Pure Farm Spices & Botanical Care | MAN Agro Foods" />
        <meta property="og:description" content="Connect with the Navanidhi Naturals team by MAN Agro Foods for pure farm spice inquiries, cold-dehydrated powder guidance, batch test reports (COA), and wholesale partnerships." />
        <meta property="og:url" content="{{ route('shop.home.contact_us') }}" />

        @php
            $contactSchema = [
                '@context' => 'https://schema.org',
                '@graph'   => [
                    [
                        '@type'       => 'ContactPage',
                        '@id'         => route('shop.home.contact_us') . '/#contactpage',
                        'url'         => route('shop.home.contact_us'),
                        'name'        => 'Contact Navanidhi Naturals Botanical Care',
                        'description' => 'Connect with the Navanidhi Naturals botanical nutrition team by MAN Agro Foods for batch test queries, recipes, wholesale, and fulfillment.',
                        'mainEntity'  => [
                            '@type'     => 'Organization',
                            'name'      => 'Navanidhi Naturals (MAN Agro Foods)',
                            'telephone' => '+91-98765-43210',
                            'email'     => $contactEmail,
                            'address'   => [
                                '@type'           => 'PostalAddress',
                                'streetAddress'   => $address,
                                'addressLocality' => $city,
                                'addressRegion'   => $state,
                                'postalCode'      => $zipcode,
                                'addressCountry'  => $country,
                            ],
                        ],
                    ],
                    [
                        '@type'      => 'FAQPage',
                        '@id'        => route('shop.home.contact_us') . '/#faq',
                        'mainEntity' => [
                            [
                                '@type'          => 'Question',
                                'name'           => 'How does Navanidhi Naturals ensure low-temperature nutritional preservation?',
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text'  => 'We operate proprietary closed-loop cold dehydration chambers below 42°C. This prevents thermal degradation, preserving 94%+ heat-sensitive chlorophyll, antioxidants, polyphenols, and active botanical enzymes without sulfur dioxide or chemical drying agents.',
                                ],
                            ],
                            [
                                '@type'          => 'Question',
                                'name'           => 'Where can I find ICP-MS heavy metal and pesticide test records?',
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text'  => 'Every production run is tested via NABL-accredited ISO/IEC 17025 laboratories. Batch test reports verifying lead, mercury, arsenic, cadmium, microbiological safety, and 200+ multi-pesticide screens can be requested directly by emailing your batch code to info@navanidhinaturals.com.',
                                ],
                            ],
                            [
                                '@type'          => 'Question',
                                'name'           => 'How should Navanidhi Naturals dehydrated powders be stored for maximum freshness?',
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text'  => 'Store sealed within our multi-layer, nitrogen-flushed UV-barrier pouches or jars away from direct sunlight, humidity, and heat sources. Once opened, ensure the air-tight closure is pressed firmly.',
                                ],
                            ],
                            [
                                '@type'          => 'Question',
                                'name'           => 'What are your order dispatch and pan-India shipping timelines?',
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text'  => 'Orders placed before 2:00 PM IST Monday through Saturday are dispatched the same day from our certified facility. Standard air-express transit takes 2–4 business days across major metros and 3–5 business days for regional pin codes.',
                                ],
                            ],
                            [
                                '@type'          => 'Question',
                                'name'           => 'Do you offer wholesale, bulk ingredient supply, or clinical partnerships?',
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text'  => 'Yes. We partner with functional beverage formulators, Ayurveda practitioners, clean bakeries, and gourmet culinary studios with certified bulk packaging (5kg to 25kg) with full COA documentation. Contact info@navanidhinaturals.com.',
                                ],
                            ],
                        ],
                    ],
                ],
            ];
        @endphp
        <!-- JSON-LD ContactPage & FAQPage Schema -->
        <script type="application/ld+json">
        {!! json_encode($contactSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
        </script>

        <style>
            /* Botanical Interactive Styles */
            .botanical-link-hover {
                color: #6ee7b7 !important;
                transition: all 0.25s ease !important;
            }
            .botanical-link-hover:hover {
                color: #a7f3d0 !important;
                text-decoration: underline !important;
            }

            .botanical-gold-link-hover {
                color: #E6C687 !important;
                transition: all 0.25s ease !important;
            }
            .botanical-gold-link-hover:hover {
                color: #fef08a !important;
                text-decoration: underline !important;
            }

            .botanical-hotline-link {
                color: #ffffff !important;
                transition: color 0.2s ease !important;
            }
            .botanical-hotline-link:hover {
                color: #6ee7b7 !important;
            }

            /* WhatsApp Button */
            .btn-contact-whatsapp {
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
                gap: 0.6rem !important;
                padding: 0.75rem 1.25rem !important;
                border-radius: 0.75rem !important;
                background-color: rgba(37, 211, 102, 0.2) !important;
                border: 1.5px solid #25D366 !important;
                color: #25D366 !important;
                font-size: 0.8125rem !important;
                font-weight: 700 !important;
                letter-spacing: 0.04em !important;
                text-decoration: none !important;
                cursor: pointer !important;
                box-shadow: 0 2px 8px rgba(37, 211, 102, 0.2) !important;
                transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
            }
            .btn-contact-whatsapp svg {
                width: 24px !important;
                height: 24px !important;
                fill: #25D366 !important;
                transition: fill 0.3s ease !important;
            }
            .btn-contact-whatsapp:hover {
                background-color: #25D366 !important;
                color: #ffffff !important;
                border-color: #25D366 !important;
                transform: translateY(-2px) !important;
                box-shadow: 0 6px 20px rgba(37, 211, 102, 0.45) !important;
            }
            .btn-contact-whatsapp:hover svg {
                fill: #ffffff !important;
            }

            /* Call Direct Button */
            .btn-contact-call {
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
                gap: 0.6rem !important;
                padding: 0.75rem 1.25rem !important;
                border-radius: 0.75rem !important;
                background-color: rgba(255, 255, 255, 0.08) !important;
                border: 1.5px solid rgba(255, 255, 255, 0.2) !important;
                color: #ffffff !important;
                font-size: 0.8125rem !important;
                font-weight: 700 !important;
                letter-spacing: 0.04em !important;
                text-decoration: none !important;
                cursor: pointer !important;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2) !important;
                transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
            }
            .btn-contact-call svg {
                width: 20px !important;
                height: 20px !important;
                stroke: #ffffff !important;
                transition: stroke 0.3s ease !important;
            }
            .btn-contact-call:hover {
                background-color: rgba(16, 185, 129, 0.3) !important;
                color: #ffffff !important;
                border-color: #10B981 !important;
                transform: translateY(-2px) !important;
                box-shadow: 0 6px 20px rgba(16, 185, 129, 0.35) !important;
            }

            /* Social Channel Icons */
            .btn-contact-social {
                width: 40px !important;
                height: 40px !important;
                border-radius: 9999px !important;
                background-color: rgba(255, 255, 255, 0.08) !important;
                border: 1.5px solid rgba(255, 255, 255, 0.2) !important;
                color: #ffffff !important;
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
                cursor: pointer !important;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2) !important;
                transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
            }
            .btn-contact-social svg {
                width: 18px !important;
                height: 18px !important;
                fill: #ffffff !important;
                transition: fill 0.3s ease !important;
            }
            .btn-contact-social.social-twitter svg {
                width: 16px !important;
                height: 16px !important;
            }
            .btn-contact-social:hover {
                transform: translateY(-3px) scale(1.1) !important;
            }
            .btn-contact-social:hover svg {
                fill: #ffffff !important;
            }

            /* Brand Specific Hover States */
            .btn-contact-social.social-instagram:hover {
                background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%) !important;
                border-color: transparent !important;
                box-shadow: 0 6px 18px rgba(214, 36, 159, 0.45) !important;
            }

            .btn-contact-social.social-youtube:hover {
                background-color: #FF0000 !important;
                border-color: #FF0000 !important;
                box-shadow: 0 6px 18px rgba(255, 0, 0, 0.45) !important;
            }

            .btn-contact-social.social-linkedin:hover {
                background-color: #0077B5 !important;
                border-color: #0077B5 !important;
                box-shadow: 0 6px 18px rgba(0, 119, 181, 0.45) !important;
            }

            .btn-contact-social.social-twitter:hover {
                background-color: #111111 !important;
                border-color: #111111 !important;
                box-shadow: 0 6px 18px rgba(0, 0, 0, 0.35) !important;
            }

            .btn-contact-social.social-facebook:hover {
                background-color: #1877F2 !important;
                border-color: #1877F2 !important;
                box-shadow: 0 6px 18px rgba(24, 119, 242, 0.45) !important;
            }
        </style>
    @endpush

    <div class="min-h-screen text-white bg-transparent" style="padding-bottom: 5rem !important;">
        @if (core()->getConfigData('general.general.breadcrumbs.shop'))
            <!-- Breadcrumbs Navigation -->
            <div class="site-container pt-5 pb-2 sm:pt-7 sm:pb-3">
                <nav aria-label="Breadcrumb" class="flex items-center space-x-2 text-[11px] sm:text-xs uppercase tracking-[0.18em] text-white/60">
                    <a href="{{ route('shop.home.index') }}" class="hover:text-emerald-300 transition-colors">Home</a>
                    <span class="text-white/30 font-serif">/</span>
                    <span class="text-emerald-300 font-semibold">Contact Care</span>
                </nav>
            </div>
        @endif

        <!-- SECTION 1: EDITORIAL HERO & HEADER -->
        <section class="site-container pt-6 pb-12 sm:pt-10 sm:pb-16 border-b border-white/10">
            <div class="max-w-3xl mx-auto text-center space-y-4">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-500/15 text-emerald-300 text-xs font-semibold tracking-[0.2em] uppercase border border-emerald-400/30 nv-pulse-glow">
                    <span class="material-symbols-outlined text-[15px]" style="font-variation-settings: 'FILL' 1;">spa</span>
                    <span>Direct Care &amp; Botanical Support</span>
                </div>

                <h1 class="font-serif text-3xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-white leading-[1.15]">
                    We're Here to Assist Your Ritual.
                </h1>

                <p class="text-sm sm:text-base lg:text-lg text-emerald-100/80 leading-relaxed font-sans max-w-2xl mx-auto">
                    Have questions regarding our stone-milled farm spices, cold-dehydrated botanicals, batch laboratory test certificates (COA), culinary usage, or wholesale partnerships? The MAN AGRO FOODS care team is here to help.
                </p>

                <!-- Quick SLA Highlight Strip -->
                <div class="flex flex-wrap items-center justify-center gap-3 sm:gap-6 pt-4 text-xs font-semibold uppercase tracking-wider text-white">
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl text-white/90">
                        <span class="material-symbols-outlined text-sm text-[#E6C687]">schedule</span>
                        <span>24h Response SLA</span>
                    </div>
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl text-white/90">
                        <span class="material-symbols-outlined text-sm text-emerald-400">verified</span>
                        <span>Lab Batch Verified</span>
                    </div>
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl text-white/90">
                        <span class="material-symbols-outlined text-sm text-[#E6C687]">local_shipping</span>
                        <span>Pan-India Dispatch</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 2: MAIN CONTACT EXPERIENCE (CHANNELS + INTERACTIVE FORM) -->
        <main class="site-container py-12 lg:py-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-start">
                
                <!-- Left Column: Unified Botanical Contact & Care Card (5 Columns) -->
                <div class="lg:col-span-5">
                    <div class="rounded-3xl border border-white/15 bg-white/[0.06] backdrop-blur-xl p-7 sm:p-8 lg:p-9 shadow-2xl space-y-6 text-white nv-glass-card">
                        
                        <!-- Header -->
                        <div class="border-b border-white/10 pb-5">
                            <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#E6C687]">Direct Spice &amp; Botanical Care</span>
                            <h2 class="font-serif text-2xl font-bold text-white mt-1">Get in Touch</h2>
                            <p class="text-xs text-white/70 mt-1.5 leading-relaxed">
                                Reach our dedicated spice &amp; botanical specialists for order support, batch laboratory verification, and culinary or daily wellness guidance.
                            </p>
                        </div>

                        <!-- 1. Direct Email Support -->
                        <div class="space-y-3">
                            <div class="flex items-center gap-3">
                                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/20 text-emerald-300 border border-emerald-400/30 shrink-0">
                                    <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </span>
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-[0.16em] text-[#E6C687]">Email Care</span>
                                    <h3 class="font-serif text-base font-bold text-white">Customer &amp; Order Desk</h3>
                                </div>
                            </div>

                            <div class="space-y-2 pl-1 pt-1 text-xs">
                                <div class="flex items-center justify-between">
                                    <span class="text-white/70">General Inquiries:</span>
                                    <a href="mailto:{{ $contactEmail }}" class="botanical-link-hover font-semibold flex items-center gap-1">
                                        <span>{{ $contactEmail }}</span>
                                        <span>&rarr;</span>
                                    </a>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-white/70">Bulk &amp; Clinics:</span>
                                    <a href="mailto:{{ $adminEmail }}" class="botanical-gold-link-hover font-semibold flex items-center gap-1">
                                        <span>{{ $adminEmail }}</span>
                                        <span>&rarr;</span>
                                    </a>
                                </div>
                            </div>

                            <div class="pt-1 text-[11px] text-white/70 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-emerald-400 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>Dedicated response within 24 business hours.</span>
                            </div>
                        </div>

                        <hr class="border-white/10" />

                        <!-- 2. Direct Hotline & Instant WhatsApp -->
                        <div class="space-y-3">
                            <div class="flex items-center gap-3">
                                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/20 text-emerald-300 border border-emerald-400/30 shrink-0">
                                    <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                </span>
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-[0.16em] text-[#E6C687]">Direct Hotline</span>
                                    <h3 class="font-serif text-base font-bold">
                                        <a href="tel:+919876543210" class="botanical-hotline-link">+91 98765 43210</a>
                                    </h3>
                                </div>
                            </div>

                            <p class="text-xs text-white/70 leading-relaxed">
                                Monday through Saturday, 9:00 AM – 6:30 PM IST.
                            </p>

                            <div class="grid grid-cols-2 gap-3 pt-1">
                                <a
                                    href="https://wa.me/919876543210"
                                    target="_blank"
                                    rel="noopener"
                                    class="btn-contact-whatsapp group"
                                >
                                    <svg class="shrink-0" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.652-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.746.953 3.71 1.455 5.711 1.456h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                    </svg>
                                    <span>WhatsApp</span>
                                </a>
                                <a
                                    href="tel:+919876543210"
                                    class="btn-contact-call group"
                                >
                                    <svg class="shrink-0" viewBox="0 0 24 24" fill="none" stroke-width="2.2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    <span>Call Direct</span>
                                </a>
                            </div>
                        </div>

                        <hr class="border-white/10" />

                        <!-- 3. Dispatch Facility & Statutory Entity -->
                        <div class="space-y-3">
                            <div class="flex items-center gap-3">
                                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/20 text-emerald-300 border border-emerald-400/30 shrink-0">
                                    <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </span>
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-[0.16em] text-[#E6C687]">Dispatch Facility</span>
                                    <h3 class="font-serif text-base font-bold text-white">Navanidhi Processing &amp; Dispatch Hub</h3>
                                </div>
                            </div>

                            <div class="text-xs text-white/70 leading-relaxed space-y-0.5 pl-1">
                                <p class="font-medium text-white">{{ $address }}</p>
                                <p>{{ $city }}, {{ $state }} {{ $zipcode }}, {{ $country }}</p>
                                <p class="text-[11px] text-[#E6C687] font-medium pt-1">MAN AGRO FOODS &bull; FSSAI Lic. No: 10020042001234</p>
                            </div>
                        </div>

                        <hr class="border-white/10" />

                        <!-- 4. Social Community Channels (One Line Modern Design) -->
                        <div class="flex items-center justify-between flex-wrap gap-3 pt-1">
                            <div>
                                <span class="text-[10px] font-bold uppercase tracking-[0.16em] text-[#E6C687] block">Community</span>
                                <span class="text-xs font-semibold text-white">Follow Our Ritual</span>
                            </div>

                            <!-- Single Row Horizontal Social Strip -->
                            <div class="flex items-center gap-2.5">
                                @if (!empty($socialLinks['instagram']))
                                    <a
                                        href="{{ $socialLinks['instagram'] }}"
                                        target="_blank"
                                        rel="noopener"
                                        title="Follow on Instagram"
                                        aria-label="Instagram"
                                        class="btn-contact-social social-instagram"
                                    >
                                        <svg viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                    </a>
                                @endif

                                @if (!empty($socialLinks['youtube']))
                                    <a
                                        href="{{ $socialLinks['youtube'] }}"
                                        target="_blank"
                                        rel="noopener"
                                        title="Subscribe on YouTube"
                                        aria-label="YouTube"
                                        class="btn-contact-social social-youtube"
                                    >
                                        <svg viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                    </a>
                                @endif

                                @if (!empty($socialLinks['linkedin']))
                                    <a
                                        href="{{ $socialLinks['linkedin'] }}"
                                        target="_blank"
                                        rel="noopener"
                                        title="Connect on LinkedIn"
                                        aria-label="LinkedIn"
                                        class="btn-contact-social social-linkedin"
                                    >
                                        <svg viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                    </a>
                                @endif

                                @if (!empty($socialLinks['twitter']))
                                    <a
                                        href="{{ $socialLinks['twitter'] }}"
                                        target="_blank"
                                        rel="noopener"
                                        title="Follow on X"
                                        aria-label="X (Twitter)"
                                        class="btn-contact-social social-twitter"
                                    >
                                        <svg viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                    </a>
                                @endif

                                @if (!empty($socialLinks['facebook']))
                                    <a
                                        href="{{ $socialLinks['facebook'] }}"
                                        target="_blank"
                                        rel="noopener"
                                        title="Follow on Facebook"
                                        aria-label="Facebook"
                                        class="btn-contact-social social-facebook"
                                    >
                                        <svg viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                    </a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Right Column: Interactive Inquiry Form (7 Columns) -->
                <div class="lg:col-span-7">
                    <div class="rounded-3xl border border-white/15 bg-white/[0.06] backdrop-blur-xl p-7 sm:p-10 lg:p-12 shadow-2xl space-y-6 text-white nv-glass-card">
                        
                        <!-- Form Title Header -->
                        <div class="space-y-1.5 border-b border-white/10 pb-5">
                            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#E6C687]">Send an Inquiry</span>
                            <h2 class="font-serif text-2xl sm:text-3xl font-bold text-white">
                                How Can We Help Your Ritual?
                            </h2>
                            <p class="text-xs sm:text-sm text-white/70">
                                Complete the details below and a Navanidhi specialist will respond promptly.
                            </p>
                        </div>

                        <!-- Session Notifications -->
                        @if (session('success'))
                            <div class="p-4 rounded-xl bg-emerald-500/20 border border-emerald-400/40 text-emerald-200 text-xs sm:text-sm font-medium flex items-center gap-2.5">
                                <span class="material-symbols-outlined text-lg text-emerald-400" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="p-4 rounded-xl bg-rose-500/20 border border-rose-400/40 text-rose-200 text-xs sm:text-sm font-medium flex items-center gap-2.5">
                                <span class="material-symbols-outlined text-lg text-rose-400">error</span>
                                <span>{{ session('error') }}</span>
                            </div>
                        @endif

                        <!-- Form -->
                        <x-shop::form :action="route('shop.home.contact_us.send_mail')">
                            
                            <!-- Full Name -->
                            <x-shop::form.control-group class="mb-4">
                                <x-shop::form.control-group.label class="required text-xs uppercase tracking-wider font-semibold text-white/90 mb-1.5 block">
                                    Your Full Name
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="text"
                                    class="w-full rounded-xl border border-white/20 bg-white/10 px-4 py-3 text-sm text-white placeholder-white/40 focus:border-emerald-400 focus:ring-1 focus:ring-emerald-400 transition-colors outline-none backdrop-blur-md"
                                    name="name"
                                    rules="required"
                                    :value="old('name')"
                                    label="Full Name"
                                    placeholder="e.g. Dr. Maya Sen"
                                    aria-required="true"
                                />

                                <x-shop::form.control-group.error control-name="name" class="mt-1 text-xs text-rose-400" />
                            </x-shop::form.control-group>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                                <!-- Email Address -->
                                <x-shop::form.control-group>
                                    <x-shop::form.control-group.label class="required text-xs uppercase tracking-wider font-semibold text-white/90 mb-1.5 block">
                                        Email Address
                                    </x-shop::form.control-group.label>

                                    <x-shop::form.control-group.control
                                        type="email"
                                        class="w-full rounded-xl border border-white/20 bg-white/10 px-4 py-3 text-sm text-white placeholder-white/40 focus:border-emerald-400 focus:ring-1 focus:ring-emerald-400 transition-colors outline-none backdrop-blur-md"
                                        name="email"
                                        rules="required|email"
                                        :value="old('email')"
                                        label="Email"
                                        placeholder="yourname@domain.com"
                                        aria-required="true"
                                    />

                                    <x-shop::form.control-group.error control-name="email" class="mt-1 text-xs text-rose-400" />
                                </x-shop::form.control-group>

                                <!-- Phone / WhatsApp -->
                                <x-shop::form.control-group>
                                    <x-shop::form.control-group.label class="text-xs uppercase tracking-wider font-semibold text-white/90 mb-1.5 block">
                                        Phone / WhatsApp <span class="text-white/60 font-normal lowercase">(optional)</span>
                                    </x-shop::form.control-group.label>

                                    <x-shop::form.control-group.control
                                        type="text"
                                        class="w-full rounded-xl border border-white/20 bg-white/10 px-4 py-3 text-sm text-white placeholder-white/40 focus:border-emerald-400 focus:ring-1 focus:ring-emerald-400 transition-colors outline-none backdrop-blur-md"
                                        name="contact"
                                        rules="phone"
                                        :value="old('contact')"
                                        label="Phone Number"
                                        placeholder="+91 98765 43210"
                                    />

                                    <x-shop::form.control-group.error control-name="contact" class="mt-1 text-xs text-rose-400" />
                                </x-shop::form.control-group>
                            </div>

                            <!-- Inquiry Topic / What Are You Looking For? Dropdown -->
                            <x-shop::form.control-group class="mb-4">
                                <x-shop::form.control-group.label class="required text-xs uppercase tracking-wider font-semibold text-white/90 mb-1.5 block">
                                    What Are You Looking For? / Subject
                                </x-shop::form.control-group.label>

                                <div class="relative">
                                    <x-shop::form.control-group.control
                                        type="select"
                                        class="w-full rounded-xl border border-white/20 px-4 py-3 text-sm text-white focus:border-emerald-400 focus:ring-1 focus:ring-emerald-400 transition-colors outline-none backdrop-blur-md cursor-pointer pr-10"
                                        style="background-color: rgba(4, 26, 14, 0.85); color: #FFFFFF;"
                                        name="subject"
                                        rules="required"
                                        :value="old('subject')"
                                        label="Inquiry Topic"
                                        aria-required="true"
                                    >
                                        <option value="" class="bg-[#041a0e] text-white/60">Select what you are looking for...</option>
                                        <option value="Pure Farm Spices (Red Chilli, Turmeric, Cumin)" class="bg-[#041a0e] text-white">Pure Farm Spices (Red Chilli, Turmeric, Cumin)</option>
                                        <option value="Living Botanical Powders (Moringa, Amla, Ashwagandha)" class="bg-[#041a0e] text-white">Living Botanical Powders (Moringa, Amla, Ashwagandha)</option>
                                        <option value="B2B Wholesale & Bulk Supply Partnership" class="bg-[#041a0e] text-white">B2B Wholesale &amp; Bulk Supply Partnership</option>
                                        <option value="NABL Lab Testing & Batch Verification" class="bg-[#041a0e] text-white">NABL Lab Testing &amp; Batch Verification</option>
                                        <option value="Order Status & Dispatch Support" class="bg-[#041a0e] text-white">Order Status &amp; Dispatch Support</option>
                                        <option value="General Wellness & Recipe Ritual Guidance" class="bg-[#041a0e] text-white">General Wellness &amp; Recipe Ritual Guidance</option>
                                    </x-shop::form.control-group.control>

                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3.5 text-emerald-300">
                                        <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>

                                <x-shop::form.control-group.error control-name="subject" class="mt-1 text-xs text-rose-400" />
                            </x-shop::form.control-group>

                            <!-- Message Content -->
                            <x-shop::form.control-group class="mb-5">
                                <x-shop::form.control-group.label class="required text-xs uppercase tracking-wider font-semibold text-white/90 mb-1.5 block">
                                    Your Message / Inquiry Details
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="textarea"
                                    class="w-full rounded-xl border border-white/20 bg-white/10 px-4 py-3 text-sm text-white placeholder-white/40 focus:border-emerald-400 focus:ring-1 focus:ring-emerald-400 transition-colors outline-none backdrop-blur-md"
                                    name="message"
                                    rules="required"
                                    label="Message"
                                    placeholder="Please share details regarding your question, spice or botanical inquiry, batch verification, recipe ritual, or bulk partnership..."
                                    aria-required="true"
                                    rows="5"
                                />

                                <x-shop::form.control-group.error control-name="message" class="mt-1 text-xs text-rose-400" />
                            </x-shop::form.control-group>

                            <!-- Captcha (If Configured) -->
                            @if (core()->getConfigData('customer.captcha.credentials.status'))
                                <x-shop::form.control-group class="mb-5">
                                    {!! \Webkul\Customer\Facades\Captcha::render() !!}

                                    <x-shop::form.control-group.error control-name="recaptcha_token" class="mt-1 text-xs text-rose-400" />
                                </x-shop::form.control-group>
                            @endif

                            <!-- Submit Button -->
                            <div class="pt-3">
                                <button
                                    type="submit"
                                    class="group w-full flex items-center justify-center gap-3 rounded-xl cursor-pointer bg-gradient-to-r from-[#c9a25a] to-[#b08a43] hover:from-[#d6b677] hover:to-[#c9a25a] text-[#041a0e] font-bold text-xs tracking-[0.18em] uppercase h-[52px] shadow-lg shadow-[#c9a25a]/25 transition-all duration-300 hover:-translate-y-0.5"
                                >
                                    <span>Send Message Directly</span>
                                    <svg class="w-4 h-4 text-[#041a0e] transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" style="width: 16px; height: 16px; display: inline-block;">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </button>
                            </div>
                        </x-shop::form>
                    </div>
                </div>
            </div>
        </main>

        <!-- SECTION 3: FREQUENT INQUIRY COLLAPSIBLE ACCORDION -->
        <section class="py-16 sm:py-24 bg-transparent border-t border-white/10">
            <div class="site-container">
                <div class="max-w-3xl mx-auto text-center space-y-3 mb-12">
                    <span class="text-xs font-bold uppercase tracking-[0.22em] text-[#E6C687]">Quick Answers</span>
                    <h2 class="font-serif text-2xl sm:text-4xl font-bold tracking-tight text-white">
                        Frequently Inquired Topics
                    </h2>
                    <p class="text-xs sm:text-sm text-emerald-100/80 leading-relaxed max-w-xl mx-auto font-sans">
                        Instant clarity on our stone-milled farm spices, cold-dehydration science, batch test records, shipping timelines, and wholesale partnerships.
                    </p>
                </div>

                <div class="max-w-4xl mx-auto space-y-4">
                    {{-- FAQ 1 --}}
                    <details class="group rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-6 transition-all duration-300 open:border-emerald-400/40 open:bg-white/[0.1] open:shadow-lg text-white">
                        <summary class="flex cursor-pointer list-none items-center justify-between font-serif text-base sm:text-lg font-semibold text-white group-hover:text-emerald-300 [&::-webkit-details-marker]:hidden select-none">
                            <span class="flex items-center gap-3.5 pr-4">
                                <span class="material-symbols-outlined text-emerald-400 text-xl shrink-0">local_shipping</span>
                                <span>How quickly will my order be dispatched and delivered?</span>
                            </span>
                            <span class="material-symbols-outlined text-emerald-400 shrink-0 transition-transform duration-300 group-open:rotate-45" style="font-size:22px">add</span>
                        </summary>
                        <div class="pt-4 text-xs sm:text-sm text-white/80 leading-relaxed border-t border-white/10 mt-4 pl-9 font-sans">
                            All orders placed before 2:00 PM IST on business days are dispatched within 24 hours directly from our certified fulfillment center. Delivery across major metro cities takes 2–4 business days, and 3–5 business days for regional pin codes. You will receive real-time SMS & email tracking updates as soon as your parcel is handed to the courier partner. Complimentary shipping applies to all orders above ₹499.
                        </div>
                    </details>

                    {{-- FAQ 2 --}}
                    <details class="group rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-6 transition-all duration-300 open:border-emerald-400/40 open:bg-white/[0.1] open:shadow-lg text-white">
                        <summary class="flex cursor-pointer list-none items-center justify-between font-serif text-base sm:text-lg font-semibold text-white group-hover:text-emerald-300 [&::-webkit-details-marker]:hidden select-none">
                            <span class="flex items-center gap-3.5 pr-4">
                                <span class="material-symbols-outlined text-emerald-400 text-xl shrink-0">science</span>
                                <span>How can I view the lab test Certificate of Analysis (COA) for my product batch?</span>
                            </span>
                            <span class="material-symbols-outlined text-emerald-400 shrink-0 transition-transform duration-300 group-open:rotate-45" style="font-size:22px">add</span>
                        </summary>
                        <div class="pt-4 text-xs sm:text-sm text-white/80 leading-relaxed border-t border-white/10 mt-4 pl-9 font-sans">
                            Every Navanidhi Naturals formulation pouch or jar features a printed Batch/Lot number. To review the complete independent third-party laboratory analysis (including heavy metal ICP-MS screening, pesticide multi-residue tests, and active HPLC biomarker percentages), simply email us at <a href="mailto:{{ $contactEmail }}" class="text-emerald-300 hover:text-emerald-200 underline font-semibold">{{ $contactEmail }}</a> with your batch code.
                        </div>
                    </details>

                    {{-- FAQ 3 --}}
                    <details class="group rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-6 transition-all duration-300 open:border-emerald-400/40 open:bg-white/[0.1] open:shadow-lg text-white">
                        <summary class="flex cursor-pointer list-none items-center justify-between font-serif text-base sm:text-lg font-semibold text-white group-hover:text-emerald-300 [&::-webkit-details-marker]:hidden select-none">
                            <span class="flex items-center gap-3.5 pr-4">
                                <span class="material-symbols-outlined text-emerald-400 text-xl shrink-0">handshake</span>
                                <span>Do you provide practitioner discounts or wholesale supply for clinics & cafes?</span>
                            </span>
                            <span class="material-symbols-outlined text-emerald-400 shrink-0 transition-transform duration-300 group-open:rotate-45" style="font-size:22px">add</span>
                        </summary>
                        <div class="pt-4 text-xs sm:text-sm text-white/80 leading-relaxed border-t border-white/10 mt-4 pl-9 font-sans">
                            Yes. We partner closely with certified herbalists, functional medicine practitioners, integrative wellness clinics, and boutique cafes. Please reach out directly to <a href="mailto:{{ $adminEmail }}" class="text-emerald-300 hover:text-emerald-200 underline font-semibold">{{ $adminEmail }}</a> or message us on WhatsApp at <a href="https://wa.me/919876543210" class="text-emerald-300 hover:text-emerald-200 underline font-semibold">+91 98765 43210</a> for our wholesale catalog pricing, minimum order quantities, and sample kits.
                        </div>
                    </details>

                    {{-- FAQ 4 --}}
                    <details class="group rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-6 transition-all duration-300 open:border-emerald-400/40 open:bg-white/[0.1] open:shadow-lg text-white">
                        <summary class="flex cursor-pointer list-none items-center justify-between font-serif text-base sm:text-lg font-semibold text-white group-hover:text-emerald-300 [&::-webkit-details-marker]:hidden select-none">
                            <span class="flex items-center gap-3.5 pr-4">
                                <span class="material-symbols-outlined text-emerald-400 text-xl shrink-0">inventory_2</span>
                                <span>What is the recommended storage method once the package is opened?</span>
                            </span>
                            <span class="material-symbols-outlined text-emerald-400 shrink-0 transition-transform duration-300 group-open:rotate-45" style="font-size:22px">add</span>
                        </summary>
                        <div class="pt-4 text-xs sm:text-sm text-white/80 leading-relaxed border-t border-white/10 mt-4 pl-9 font-sans">
                            Store your package in a cool, dry pantry away from direct sunlight, humidity, and heat sources. Always ensure the airtight zip seal or lid is closed firmly after use. Because our products contain zero anti-caking silica chemicals, using a clean, dry spoon prevents ambient moisture from causing natural clumping. Best consumed within 90 days after opening.
                        </div>
                    </details>

                    {{-- FAQ 5 --}}
                    <details class="group rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-6 transition-all duration-300 open:border-emerald-400/40 open:bg-white/[0.1] open:shadow-lg text-white">
                        <summary class="flex cursor-pointer list-none items-center justify-between font-serif text-base sm:text-lg font-semibold text-white group-hover:text-emerald-300 [&::-webkit-details-marker]:hidden select-none">
                            <span class="flex items-center gap-3.5 pr-4">
                                <span class="material-symbols-outlined text-emerald-400 text-xl shrink-0">verified_user</span>
                                <span>What is your policy if my order arrives damaged or compromised?</span>
                            </span>
                            <span class="material-symbols-outlined text-emerald-400 shrink-0 transition-transform duration-300 group-open:rotate-45" style="font-size:22px">add</span>
                        </summary>
                        <div class="pt-4 text-xs sm:text-sm text-white/80 leading-relaxed border-t border-white/10 mt-4 pl-9 font-sans">
                            In the unlikely event that your package arrives damaged, leaked, or with a compromised seal, please take a photo and contact <a href="mailto:{{ $contactEmail }}" class="text-emerald-300 hover:text-emerald-200 underline font-semibold">{{ $contactEmail }}</a> or WhatsApp <a href="https://wa.me/919876543210" class="text-emerald-300 hover:text-emerald-200 underline font-semibold">+91 98765 43210</a> within 48 hours of delivery. We will immediately dispatch a priority replacement at zero cost.
                        </div>
                    </details>

                    {{-- FAQ 6 --}}
                    <details class="group rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl p-6 transition-all duration-300 open:border-emerald-400/40 open:bg-white/[0.1] open:shadow-lg text-white">
                        <summary class="flex cursor-pointer list-none items-center justify-between font-serif text-base sm:text-lg font-semibold text-white group-hover:text-emerald-300 [&::-webkit-details-marker]:hidden select-none">
                            <span class="flex items-center gap-3.5 pr-4">
                                <span class="material-symbols-outlined text-emerald-400 text-xl shrink-0">blender</span>
                                <span>Can I combine Navanidhi Naturals spices and botanical powders in daily recipes?</span>
                            </span>
                            <span class="material-symbols-outlined text-emerald-400 shrink-0 transition-transform duration-300 group-open:rotate-45" style="font-size:22px">add</span>
                        </summary>
                        <div class="pt-4 text-xs sm:text-sm text-white/80 leading-relaxed border-t border-white/10 mt-4 pl-9 font-sans">
                            Absolutely. Our single-origin botanicals and spices (such as Moringa, Turmeric, Red Chilli, Spirulina, and Ashwagandha) are formulated to work harmoniously together. For example, combining Lakadong Turmeric with warm milk and black pepper enhances curcumin absorption, or using pure red chilli and curry leaf powder in daily tadka. Check our <a href="{{ route('shop.recipes.index') }}" class="text-emerald-300 hover:text-emerald-200 underline font-semibold">Recipes section</a> for curated culinary &amp; wellness preparations.
                        </div>
                    </details>
                </div>
            </div>
        </section>

        <!-- SECTION 4: BOTANICAL QUALITY & TRUST PILLARS STRIP -->
        <section 
            class="w-full border-t border-white/10 relative overflow-hidden py-16 sm:py-20 bg-transparent" 
            aria-label="Navanidhi Naturals Brand Standards and Quality Guarantee"
        >
            <div class="site-container space-y-6 lg:space-y-8">
                <!-- Row 1: Compact Trust Indicators -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 lg:gap-6">
                    <div class="flex items-center gap-3 p-4 rounded-xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl shadow-sm hover:border-emerald-400/40 transition-all text-white">
                        <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-500/20 text-emerald-300 border border-emerald-400/30 shrink-0">
                            <span class="material-symbols-outlined text-lg">eco</span>
                        </span>
                        <div>
                            <p class="text-xs font-bold text-white">100% Whole Plants</p>
                            <p class="text-[11px] text-white/70">Zero maltodextrin or fillers</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 p-4 rounded-xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl shadow-sm hover:border-emerald-400/40 transition-all text-white">
                        <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-500/20 text-emerald-300 border border-emerald-400/30 shrink-0">
                            <span class="material-symbols-outlined text-lg">ac_unit</span>
                        </span>
                        <div>
                            <p class="text-xs font-bold text-white">Cold-Dried &lt;42°C</p>
                            <p class="text-[11px] text-white/70">Living enzymes preserved</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 p-4 rounded-xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl shadow-sm hover:border-emerald-400/40 transition-all text-white">
                        <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-500/20 text-emerald-300 border border-emerald-400/30 shrink-0">
                            <span class="material-symbols-outlined text-lg">verified</span>
                        </span>
                        <div>
                            <p class="text-xs font-bold text-white">Lab Certified COA</p>
                            <p class="text-[11px] text-white/70">Heavy metal &amp; purity verified</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 p-4 rounded-xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl shadow-sm hover:border-emerald-400/40 transition-all text-white">
                        <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-500/20 text-emerald-300 border border-emerald-400/30 shrink-0">
                            <span class="material-symbols-outlined text-lg">shield</span>
                        </span>
                        <div>
                            <p class="text-xs font-bold text-white">Nitrogen Sealed</p>
                            <p class="text-[11px] text-white/70">Triple barrier freshness</p>
                        </div>
                    </div>
                </div>

                <!-- Row 2: Comprehensive Brand Standard Pillars -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                    <!-- Pillar 1 -->
                    <div class="flex items-start gap-4 p-5 rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl hover:border-emerald-400/40 hover:bg-white/[0.1] transition-all duration-300 text-white">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-600 to-emerald-900 border border-emerald-400/30 flex items-center justify-center text-[#E6C687] shrink-0 shadow-sm">
                            <span class="material-symbols-outlined text-2xl">eco</span>
                        </div>
                        <div>
                            <h4 class="font-serif text-sm font-bold text-white mb-1">
                                100% Pure Spices &amp; Botanicals
                            </h4>
                            <p class="text-xs text-white/70 leading-relaxed">
                                Raw, single-origin spices and shade-dried botanicals safeguarding natural oils and vital cellular enzymes.
                            </p>
                        </div>
                    </div>

                    <!-- Pillar 2 -->
                    <div class="flex items-start gap-4 p-5 rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl hover:border-emerald-400/40 hover:bg-white/[0.1] transition-all duration-300 text-white">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-600 to-emerald-900 border border-emerald-400/30 flex items-center justify-center text-[#E6C687] shrink-0 shadow-sm">
                            <span class="material-symbols-outlined text-2xl">agriculture</span>
                        </div>
                        <div>
                            <h4 class="font-serif text-sm font-bold text-white mb-1">
                                Direct Farm Sourcing
                            </h4>
                            <p class="text-xs text-white/70 leading-relaxed">
                                Ethically cultivated with regenerative smallholder farming families across India.
                            </p>
                        </div>
                    </div>

                    <!-- Pillar 3 -->
                    <div class="flex items-start gap-4 p-5 rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl hover:border-emerald-400/40 hover:bg-white/[0.1] transition-all duration-300 text-white">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-600 to-emerald-900 border border-emerald-400/30 flex items-center justify-center text-[#E6C687] shrink-0 shadow-sm">
                            <span class="material-symbols-outlined text-2xl">science</span>
                        </div>
                        <div>
                            <h4 class="font-serif text-sm font-bold text-white mb-1">
                                Zero Synthetic Fillers
                            </h4>
                            <p class="text-xs text-white/70 leading-relaxed">
                                Never cut with maltodextrin, artificial sugars, anti-caking gums, or dyes.
                            </p>
                        </div>
                    </div>

                    <!-- Pillar 4 -->
                    <div class="flex items-start gap-4 p-5 rounded-2xl nv-glass-card border border-white/15 bg-white/[0.06] backdrop-blur-xl hover:border-emerald-400/40 hover:bg-white/[0.1] transition-all duration-300 text-white">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-600 to-emerald-900 border border-emerald-400/30 flex items-center justify-center text-[#E6C687] shrink-0 shadow-sm">
                            <span class="material-symbols-outlined text-2xl">verified</span>
                        </div>
                        <div>
                            <h4 class="font-serif text-sm font-bold text-white mb-1">
                                NABL Lab Tested
                            </h4>
                            <p class="text-xs text-white/70 leading-relaxed">
                                Every batch verified for heavy metals, microbial safety, and moisture purity.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @push('scripts')
        @if (core()->getConfigData('customer.captcha.credentials.status'))
            {!! \Webkul\Customer\Facades\Captcha::renderJS() !!}
        @endif
    @endpush
</x-shop::layouts>
