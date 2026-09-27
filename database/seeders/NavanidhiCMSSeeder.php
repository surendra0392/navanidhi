<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavanidhiCMSSeeder extends Seeder
{
    /**
     * Seed Navanidhi Naturals custom CMS editorial & policy pages.
     */
    public function run(): void
    {
        $this->command->info('=== Navanidhi Naturals CMS Pages Seeder ===');

        $now = Carbon::now();

        // 1. Copy CMS Media Assets from package seeders if present
        $cmsPackageDir = base_path('packages/Webkul/Installer/src/Resources/assets/images/seeders/cms');
        $storageCmsDir = storage_path('app/public/theme/cms');
        $publicCmsDir = public_path('storage/theme/cms');

        if (! file_exists($storageCmsDir)) {
            mkdir($storageCmsDir, 0777, true);
        }
        if (! file_exists($publicCmsDir)) {
            mkdir($publicCmsDir, 0777, true);
        }

        $cmsFiles = [
            'navanidhi-about-story.jpg',
            'navanidhi-about-story.webp',
            'navanidhi-quality-lab.jpg',
            'navanidhi-quality-lab.webp',
            'navanidhi-harvest-story.jpg',
            'navanidhi-harvest-story.webp',
            'navanidhi-lab-protocol.webp',
        ];

        foreach ($cmsFiles as $file) {
            $pkgFile = $cmsPackageDir.'/'.$file;
            if (file_exists($pkgFile)) {
                copy($pkgFile, $storageCmsDir.'/'.$file);
                copy($pkgFile, $publicCmsDir.'/'.$file);
            }
        }

        $aboutUsHtml = file_get_contents(base_path('packages/Webkul/Shop/src/Resources/views/cms/about-us.blade.php'));
        $qualityHtml = file_get_contents(base_path('packages/Webkul/Shop/src/Resources/views/cms/quality.blade.php'));
        $faqHtml = file_get_contents(base_path('packages/Webkul/Shop/src/Resources/views/cms/faq.blade.php'));

        $pages = [
            [
                'id' => 1,
                'url_key' => 'about-us',
                'page_title' => 'Our Philosophy & Origins',
                'meta_title' => 'Our Philosophy & Sourcing Origins | Pure Indian Spices & Botanicals | Navanidhi Naturals',
                'meta_description' => 'Discover the Navanidhi Naturals story by MAN Agro Foods: stone-milled farm spices and cold-dehydrated botanicals crafted below 42°C with zero Sudan dyes or fillers.',
                'meta_keywords' => 'about Navanidhi Naturals, MAN Agro Foods, Guntur red chilli powder, Lakadong turmeric powder, organic moringa, zero Sudan dyes, zero lead chromate, Indian farm spices',
                'html_content' => $aboutUsHtml,
            ],
            [
                'id' => 2,
                'url_key' => 'return-policy',
                'page_title' => 'Return & Replacement Policy',
                'meta_title' => 'Return & Replacement Policy | 100% Purity Guarantee | Navanidhi Naturals',
                'meta_description' => 'Our commitment to purity: 48-hour transit damage reporting, hassle-free batch replacement, and guidelines for sealed spice and botanical returns.',
                'meta_keywords' => 'return policy, replacement guarantee, damaged spice replacement, Navanidhi Naturals guarantee, MAN Agro Foods',
                'html_content' => '<h2>1. 100% Purity & Freshness Guarantee</h2>
<p>At Navanidhi Naturals, backed by <strong>MAN AGRO FOODS</strong>, we stand behind the uncompromising quality, aroma, and safety of every pure spice and whole botanical formulation we package. If your parcel arrives damaged, leaking, or with a broken induction seal, we will replace it immediately at zero cost to you.</p>

<h2>2. Eligibility for Replacement</h2>
<ul>
    <li><strong>Transit Damage or Leakage:</strong> Outer container or inner hermetic pouch breached during transit.</li>
    <li><strong>Incorrect Product Delivered:</strong> The delivered SKU does not match your order confirmation.</li>
    <li><strong>Broken Protective Seal:</strong> The inner tamper-evident induction foil seal is broken or compromised upon first opening.</li>
</ul>

<h2>3. How to Request a Replacement</h2>
<p>Please notify our customer care team within <strong>48 hours of delivery</strong> by emailing <a href="mailto:care@navanidhinaturals.com">care@navanidhinaturals.com</a> or messaging our WhatsApp hotline at <a href="https://wa.me/919876543210">+91 98765 43210</a> with your Order ID, batch number, and a clear photo of the packaging issue. Our support team will dispatch a priority replacement within 24 business hours.</p>

<h2>4. Non-Returnable Items</h2>
<p>In compliance with Central FSSAI food safety regulations for edible agricultural food products, containers that have been opened or consumed cannot be returned for restock.</p>',
            ],
            [
                'id' => 3,
                'url_key' => 'refund-policy',
                'page_title' => 'Refund Policy',
                'meta_title' => 'Refund Policy | Transparent 3-5 Day Banking Settlements | Navanidhi Naturals',
                'meta_description' => 'Official refund processing timelines, payment gateway SLAs, and reimbursement methods for cancelled or approved replacement returns.',
                'meta_keywords' => 'refund policy, refund processing time, payment reversal, customer reimbursement, Navanidhi Naturals',
                'html_content' => '<h2>1. Refund Eligibility</h2>
<p>Refunds are initiated immediately for order cancellations submitted prior to warehouse dispatch, verified stock unavailability, or in instances where an approved replacement product is out of stock.</p>

<h2>2. Refund Processing Timeframes</h2>
<ul>
    <li><strong>Prepaid UPI &amp; Net Banking:</strong> 3 to 5 business days credited directly to your source bank account.</li>
    <li><strong>Credit &amp; Debit Cards:</strong> 5 to 7 business days depending on your card issuer\'s settlement cycle.</li>
    <li><strong>Digital Wallets (Paytm, PhonePe, Amazon Pay):</strong> 24 to 48 hours credited to your original wallet balance.</li>
</ul>

<h2>3. Cancellation Guidelines</h2>
<p>You may cancel an order free of charge at any time before shipment dispatch. Once a parcel has been handed over to our courier partners, order cancellations cannot be processed; however, our replacement guarantee remains fully applicable upon arrival.</p>',
            ],
            [
                'id' => 4,
                'url_key' => 'terms-conditions',
                'page_title' => 'Terms & Conditions of Sale',
                'meta_title' => 'Terms & Conditions of Sale | Order & Usage Guidelines | Navanidhi Naturals',
                'meta_description' => 'Official terms and conditions governing purchases, pricing, dispatch, dietary consumption guidelines, and customer agreements on Navanidhi Naturals.',
                'meta_keywords' => 'terms and conditions, terms of sale, purchase agreement, legal terms, customer rights, Navanidhi Naturals, MAN Agro Foods',
                'html_content' => '<h2>1. Introduction &amp; Agreement</h2>
<p>Welcome to Navanidhi Naturals, a brand manufactured and marketed by <strong>MAN AGRO FOODS</strong> ("we," "our," or "us"). By accessing or purchasing our pure spices and botanical nutrition formulations through this website, you agree to be bound by these Terms and Conditions of Sale.</p>

<h2>2. Product Formulation &amp; Disclaimers</h2>
<p>Navanidhi Naturals products are 100% pure food matter, stone-ground culinary spices, and cold-dehydrated whole botanical powders. All items are produced in compliance with Central FSSAI regulations (Lic. No. 10020042001234). Our botanical powders are natural food dietary supplements and are not intended to diagnose, treat, cure, or prevent any medical condition.</p>
<p>If you are pregnant, nursing, taking prescription medications, or under medical supervision, please consult a qualified healthcare practitioner prior to beginning new herbal rituals.</p>

<h2>3. Pricing, Taxes &amp; Payments</h2>
<ul>
    <li><strong>Pricing:</strong> All prices are displayed in Indian Rupees (INR) and are inclusive of all applicable Goods and Services Tax (GST).</li>
    <li><strong>Payment Security:</strong> Online payments are processed through RBI-compliant, PCI-DSS Level 1 certified gateways with 256-bit SSL encryption. We never store card numbers or CVVs on our servers.</li>
</ul>

<h2>4. Governing Law &amp; Jurisdiction</h2>
<p>These terms and all sales transactions shall be governed by the laws of India. Any disputes arising in connection with these terms shall be subject to the exclusive jurisdiction of the competent courts in Bengaluru, Karnataka, India.</p>',
            ],
            [
                'id' => 5,
                'url_key' => 'terms-of-use',
                'page_title' => 'Website Terms of Use',
                'meta_title' => 'Website Terms of Use | Digital Access & Intellectual Property | Navanidhi Naturals',
                'meta_description' => 'Terms of use governing browsing, content usage, user accounts, and intellectual property rights across the Navanidhi Naturals digital storefront.',
                'meta_keywords' => 'terms of use, website usage terms, intellectual property, acceptable use, Navanidhi Naturals',
                'html_content' => '<h2>1. Acceptance of Terms</h2>
<p>By browsing or creating an account on this website, you agree to abide by these Terms of Use and all applicable Indian digital commerce laws and guidelines.</p>

<h2>2. Account Confidentiality</h2>
<p>When you register for an account, you are responsible for maintaining the confidentiality of your login credentials and restricting unauthorized access to your device. You accept full responsibility for all transactions executed under your account.</p>

<h2>3. Intellectual Property Rights</h2>
<p>All brand names, logos, product photography, botanical descriptions, recipe formulations, and graphical designs on this website are the proprietary intellectual property of MAN AGRO FOODS and Navanidhi Naturals. Unauthorized copying, scraping, or redistribution is strictly prohibited.</p>',
            ],
            [
                'id' => 6,
                'url_key' => 'customer-service',
                'page_title' => 'Customer Care & Support',
                'meta_title' => 'Customer Care & SLAs | Multi-Channel Support | Navanidhi Naturals',
                'meta_description' => 'Connect with Navanidhi Naturals customer care for order tracking, batch lab verification, recipe guidance, and wholesale inquiries.',
                'meta_keywords' => 'customer service, care team, help desk, order assistance, wholesale inquiry, Navanidhi Naturals, MAN Agro Foods',
                'html_content' => '<h2>Dedicated Support for Pure Kitchens &amp; Wellness</h2>
<p>Our dedicated customer support team is available to assist you with order status inquiries, batch laboratory certificates of analysis (COA), culinary usage advice, and wholesale partnerships.</p>

<h2>Direct Communication Channels</h2>
<ul>
    <li><strong>Email Support:</strong> <a href="mailto:care@navanidhinaturals.com">care@navanidhinaturals.com</a> (Response within 24 business hours)</li>
    <li><strong>Wholesale &amp; Institutional Sales:</strong> <a href="mailto:wholesale@navanidhinaturals.com">wholesale@navanidhinaturals.com</a></li>
    <li><strong>Phone &amp; WhatsApp Hotline:</strong> <a href="https://wa.me/919876543210">+91 98765 43210</a></li>
    <li><strong>Support Hours:</strong> Monday through Saturday, 9:00 AM to 6:00 PM IST</li>
</ul>

<h2>Processing &amp; Dispatch Hub</h2>
<p><strong>MAN AGRO FOODS</strong> &bull; Navanidhi Naturals Division<br>
Industrial Processing Zone, Bengaluru / South India, Karnataka 560001, India<br>
Central FSSAI License No: 10020042001234</p>',
            ],
            [
                'id' => 7,
                'url_key' => 'whats-new',
                'page_title' => 'What\'s New',
                'meta_title' => 'What\'s New | New Farm Spices & Seasonal Harvests | Navanidhi Naturals',
                'meta_description' => 'Discover latest harvest releases: Pure Guntur Red Chilli Powder and Lakadong Turmeric, fresh cold-milled batches by MAN Agro Foods.',
                'meta_keywords' => 'new products, pure red chilli powder, Lakadong turmeric powder, harvest release, Navanidhi Naturals',
                'html_content' => '<h2>Introducing Pure Farm Spices by MAN AGRO FOODS</h2>
<p>We are proud to introduce our <strong>Spices Collection</strong>, honoring authentic Indian culinary heritage with uncompromised purity:</p>
<ul>
    <li><strong>Pure Red Chilli Powder:</strong> Sourced from sun-ripened Guntur and Byadgi pods. Stone-milled below 42&deg;C with zero Sudan dyes, zero added oils, and pure natural ASTA crimson color.</li>
    <li><strong>High-Curcumin Lakadong Turmeric:</strong> Organically grown in Meghalaya with a tested &ge;7.5% natural curcumin density. Free from Lead Chromate, chalk, or starch fillers.</li>
</ul>
<p>Explore our latest arrivals in the <a href="/spices">Spices Category</a> or browse <a href="/products">All Formulations</a>.</p>',
            ],
            [
                'id' => 8,
                'url_key' => 'payment-policy',
                'page_title' => 'Payment Security & Methods',
                'meta_title' => 'Payment Security & Methods | RBI-Compliant 256-Bit SSL | Navanidhi Naturals',
                'meta_description' => 'Explore safe and encrypted payment options: UPI, cards, net banking, and Cash on Delivery with full RBI-compliant 256-bit encryption.',
                'meta_keywords' => 'payment policy, secure payment gateway, upi payments, card security, cash on delivery, Navanidhi Naturals',
                'html_content' => '<h2>1. Accepted Payment Methods</h2>
<p>To ensure a smooth, transparent checkout experience, Navanidhi Naturals supports all major Indian digital payment methods:</p>
<ul>
    <li><strong>Unified Payments Interface (UPI):</strong> Google Pay, PhonePe, Paytm, BHIM, and bank UPI applications.</li>
    <li><strong>Credit &amp; Debit Cards:</strong> Visa, MasterCard, RuPay, and American Express.</li>
    <li><strong>Net Banking:</strong> Instant authorization across 50+ leading Indian banks.</li>
    <li><strong>Digital Wallets:</strong> Paytm, PhonePe, and Amazon Pay.</li>
    <li><strong>Cash on Delivery (COD):</strong> Available on eligible pin codes across India.</li>
</ul>

<h2>2. Bank-Grade Security Standards</h2>
<p>Every transaction on our platform is secured with 256-bit SSL encryption and routed through RBI-compliant, PCI-DSS Level 1 certified gateways with mandatory two-factor authentication (OTP verification). We never store your card numbers or CVVs.</p>',
            ],
            [
                'id' => 9,
                'url_key' => 'shipping-policy',
                'page_title' => 'Shipping & Delivery Policy',
                'meta_title' => 'Shipping & Delivery Policy | Express Pan-India Transit | Navanidhi Naturals',
                'meta_description' => 'Learn about our express 24-hour dispatch, protective packaging, and free shipping on orders above ₹499.',
                'meta_keywords' => 'shipping policy, pan-india delivery, express courier, free shipping threshold, packaging standards, Navanidhi Naturals',
                'html_content' => '<h2>1. Dispatch Timeline</h2>
<p>All orders placed before 2:00 PM IST on business days (Monday through Saturday) are sealed in nitrogen-flushed protective packaging and dispatched within <strong>24 business hours</strong> directly from our MAN AGRO FOODS facility.</p>

<h2>2. Estimated Delivery Timeframes</h2>
<ul>
    <li><strong>Metro Cities (Bengaluru, Hyderabad, Chennai, Mumbai, Delhi NCR, Kolkata):</strong> 2 to 4 business days from dispatch.</li>
    <li><strong>Tier II &amp; Tier III Cities:</strong> 4 to 7 business days from dispatch.</li>
    <li><strong>Special &amp; Hill Regions:</strong> 6 to 9 business days from dispatch.</li>
</ul>

<h2>3. Free Delivery Threshold</h2>
<p>We provide <strong>Free Standard Shipping</strong> across all serviceable Indian pin codes on orders valued at <strong>&#8377;499 or above</strong>. For orders below &#8377;499, a nominal flat delivery charge of &#8377;50 is applied at checkout.</p>

<h2>4. Tamper-Evident Packaging</h2>
<p>Every shipment is packaged in high-grade recyclable outer boxes with an unbroken hermetic inner foil seal to ensure zero moisture ingress or aroma loss during transit.</p>',
            ],
            [
                'id' => 10,
                'url_key' => 'privacy-policy',
                'page_title' => 'Privacy Policy & Data Protection',
                'meta_title' => 'Privacy Policy & Data Protection | 256-Bit SSL Security | Navanidhi Naturals',
                'meta_description' => 'Read how Navanidhi Naturals protects your personal data, payment transactions, and customer confidentiality under Indian data protection regulations.',
                'meta_keywords' => 'privacy policy, data protection, secure shopping, customer confidentiality, Navanidhi Naturals',
                'html_content' => '<h2>1. Our Privacy Commitment</h2>
<p>Navanidhi Naturals, a brand of MAN AGRO FOODS, is dedicated to protecting your personal information. We collect only what is strictly necessary to fulfill your orders, provide shipment tracking, and deliver authentic customer care.</p>

<h2>2. Information We Collect</h2>
<ul>
    <li><strong>Order Fulfillment Details:</strong> Name, shipping address, billing address, email address, and mobile number for dispatch updates.</li>
    <li><strong>Payment Details:</strong> Handled securely via tokenized payment gateways. We never view or store raw credit/debit card numbers.</li>
    <li><strong>Account History:</strong> Saved delivery addresses, past order records, and notification preferences.</li>
</ul>

<h2>3. Strict No-Sale Policy</h2>
<p>We will never sell, rent, lease, or distribute your personal contact information to third-party telemarketers or data brokers. All communications are strictly limited to your order status and voluntary wellness updates.</p>

<h2>4. Your Rights</h2>
<p>You may request access to, correction of, or deletion of your stored customer account data at any time by writing to our Data Privacy Officer at <a href="mailto:care@navanidhinaturals.com">care@navanidhinaturals.com</a>.</p>',
            ],
            [
                'id' => 11,
                'url_key' => 'quality',
                'page_title' => 'Quality Standard & Lab Verification',
                'meta_title' => 'Quality Standard & Lab Verification | 5-Stage Purity Code | Navanidhi Naturals',
                'meta_description' => 'Explore our scientific quality standard: stone-milling, low-temperature vacuum dehydration, Sudan dye screening, and zero-tolerance chemical blacklist.',
                'meta_keywords' => 'quality standard, Sudan dye testing, lead chromate screening, heavy metal testing, pesticide screening, stone milled spices, Navanidhi Naturals, MAN Agro Foods',
                'html_content' => $qualityHtml,
            ],
            [
                'id' => 12,
                'url_key' => 'recipes',
                'page_title' => 'Recipes & Rituals',
                'meta_title' => 'Recipes & Daily Rituals | Pure Spices & Functional Nutrition | Navanidhi Naturals',
                'meta_description' => 'Explore chef-crafted Indian culinary preparations, golden turmeric tonics, and nutrient-dense smoothies powered by Navanidhi Naturals pure spices and botanicals.',
                'meta_keywords' => 'recipes, Haldi Doodh, turmeric latte recipe, pure red chilli tadka, moringa green smoothie, functional nutrition, Navanidhi Naturals',
                'html_content' => '<div class="site-container py-12 max-w-4xl mx-auto space-y-8">
    <header class="text-center space-y-3">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold tracking-widest uppercase text-[#0D5C3A] bg-[#0D5C3A]/10 border border-[#0D5C3A]/20">
            Culinary &amp; Botanical Guidance
        </span>
        <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#062E1A]">
            Recipes &amp; Daily Rituals
        </h1>
        <p class="text-sm sm:text-base text-[#4B5563] max-w-xl mx-auto">
            Discover nourishing preparations using stone-milled farm spices and cold-dehydrated whole botanicals.
        </p>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6">
        <div class="p-6 rounded-3xl bg-white border border-[#0D5C3A]/15 shadow-sm space-y-3">
            <span class="text-xs font-bold uppercase tracking-wider text-[#c9a25a]">Golden Evening Ritual</span>
            <h3 class="font-serif text-xl font-bold text-[#062E1A]">Traditional Haldi Doodh (Golden Milk)</h3>
            <p class="text-xs text-[#4B5563] leading-relaxed">
                Whisk 1/2 tsp of Navanidhi Lakadong Turmeric into 250ml of warm milk with a pinch of crushed black pepper and honey. The natural black pepper piperine increases curcumin bioavailability by up to 2000%.
            </p>
        </div>

        <div class="p-6 rounded-3xl bg-white border border-[#0D5C3A]/15 shadow-sm space-y-3">
            <span class="text-xs font-bold uppercase tracking-wider text-[#991B1B]">Pure Culinary Tempering</span>
            <h3 class="font-serif text-xl font-bold text-[#062E1A]">Authentic Guntur Dal Tadka</h3>
            <p class="text-xs text-[#4B5563] leading-relaxed">
                Heat cold-pressed ghee or mustard oil, add mustard seeds and curry leaves, and gently bloom 1/2 tsp Navanidhi Pure Red Chilli Powder for 10 seconds before pouring over simmered yellow lentils.
            </p>
        </div>
    </div>
</div>',
            ],
        ];

        $locales = DB::table('locales')->pluck('code')->toArray() ?: ['en'];

        foreach ($pages as $item) {
            $pageId = $item['id'];
            $urlKey = $item['url_key'];
            $pageTitle = $item['page_title'];
            $metaTitle = $item['meta_title'];
            $metaDesc = $item['meta_description'];
            $metaKeywords = $item['meta_keywords'];
            $htmlContent = $item['html_content'];

            DB::table('cms_pages')->updateOrInsert(
                ['id' => $pageId],
                [
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );

            foreach ($locales as $locale) {
                DB::table('cms_page_translations')->updateOrInsert(
                    [
                        'cms_page_id' => $pageId,
                        'locale' => $locale,
                    ],
                    [
                        'url_key' => $urlKey,
                        'page_title' => $pageTitle,
                        'meta_title' => $metaTitle,
                        'meta_description' => $metaDesc,
                        'meta_keywords' => $metaKeywords,
                        'html_content' => $htmlContent,
                    ]
                );
            }

            // Ensure mapped to channel 1
            DB::table('cms_page_channels')->updateOrInsert([
                'cms_page_id' => $pageId,
                'channel_id' => 1,
            ]);
        }

        $this->command->info('Navanidhi Naturals CMS Pages seeded successfully with 0 encoding issues.');
    }
}
