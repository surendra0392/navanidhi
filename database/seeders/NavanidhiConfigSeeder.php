<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavanidhiConfigSeeder extends Seeder
{
    /**
     * Seed Navanidhi Naturals store core configuration, Indian Rupee (INR / ₹),
     * Telangana defaults, carrier settings, weight unit, and Navanidhi branding assets.
     */
    public function run(): void
    {
        $this->command->info('=== Navanidhi Naturals Core Configuration & Branding Seeder ===');

        $now = Carbon::now();

        // 1. Ensure INR is configured as the primary currency
        DB::table('currencies')->updateOrInsert(
            ['code' => 'INR'],
            [
                'name' => 'Indian Rupee',
                'symbol' => '₹',
                'decimal' => 2,
                'group_separator' => ',',
                'decimal_separator' => '.',
                'currency_position' => 'left',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        $inrCurrency = DB::table('currencies')->where('code', 'INR')->first();
        $inrCurrencyId = $inrCurrency ? $inrCurrency->id : 1;

        // 2. Prepare Branding Asset directories in storage
        $publicAdminDir = storage_path('app/public/admin');
        if (! file_exists($publicAdminDir)) {
            mkdir($publicAdminDir, 0777, true);
        }
        $publicChannelDir = storage_path('app/public/channel/1');
        if (! file_exists($publicChannelDir)) {
            mkdir($publicChannelDir, 0777, true);
        }

        $pubChannel1 = public_path('storage/channel/1');
        $pubAdmin = public_path('storage/admin');
        if (! file_exists($pubChannel1)) {
            mkdir($pubChannel1, 0777, true);
        }
        if (! file_exists($pubAdmin)) {
            mkdir($pubAdmin, 0777, true);
        }

        // Copy SVG logo & favicon if they exist
        if (file_exists($publicChannelDir.'/logo.svg')) {
            copy($publicChannelDir.'/logo.svg', $pubChannel1.'/logo.svg');
            copy($publicChannelDir.'/logo.svg', $publicAdminDir.'/logo.svg');
            copy($publicChannelDir.'/logo.svg', $pubAdmin.'/logo.svg');
        }
        if (file_exists($publicChannelDir.'/favicon.svg')) {
            copy($publicChannelDir.'/favicon.svg', $pubChannel1.'/favicon.svg');
            copy($publicChannelDir.'/favicon.svg', $publicAdminDir.'/favicon.svg');
            copy($publicChannelDir.'/favicon.svg', $pubAdmin.'/favicon.svg');
        }

        // 3. Set Channel 1 base currency, hostname, logo, and favicon
        DB::table('channels')->where('id', 1)->update([
            'theme' => 'default',
            'hostname' => config('app.url') ? parse_url(config('app.url'), PHP_URL_HOST) : null,
            'base_currency_id' => $inrCurrencyId,
            'logo' => 'channel/1/logo.svg',
            'favicon' => 'channel/1/favicon.svg',
        ]);

        DB::table('channel_currencies')->updateOrInsert(
            [
                'channel_id' => 1,
                'currency_id' => $inrCurrencyId,
            ]
        );

        // Remove non-INR currencies from default channel
        DB::table('channel_currencies')
            ->where('channel_id', 1)
            ->where('currency_id', '!=', $inrCurrencyId)
            ->delete();

        // 4. Define Core Config Key-Value Pairs with exact channel & locale scoping
        $configs = [
            // Admin Logo & Favicon
            [
                'code' => 'general.design.admin_logo.logo_image',
                'value' => 'channel/1/logo.svg',
                'channel_code' => null,
                'locale_code' => null,
            ],
            [
                'code' => 'general.design.admin_logo.favicon',
                'value' => 'channel/1/favicon.svg',
                'channel_code' => null,
                'locale_code' => null,
            ],

            // Top Header Announcement & Offer Configuration (Rupee ₹499)
            [
                'code' => 'general.content.header_offer.title',
                'value' => 'FREE SHIPPING ON ORDERS OVER ₹499 • 100% PURE FARM SPICES & BOTANICALS • MAN AGRO FOODS',
                'channel_code' => null,
                'locale_code' => null,
            ],
            [
                'code' => 'general.content.header_offer.redirection_title',
                'value' => 'SHOP NOW',
                'channel_code' => null,
                'locale_code' => null,
            ],
            [
                'code' => 'general.content.header_offer.redirection_link',
                'value' => '/products',
                'channel_code' => null,
                'locale_code' => null,
            ],

            // Footer Copyright (Locale-based: en)
            [
                'code' => 'general.content.footer.copyright_content',
                'value' => 'Copyright &copy; '.date('Y').' Navanidhi Naturals (A brand of MAN Agro Foods) — All rights reserved.',
                'channel_code' => null,
                'locale_code' => 'en',
            ],

            // Email & Customer Care Settings (Channel-based: default)
            [
                'code' => 'emails.configure.email_settings.sender_name',
                'value' => 'Navanidhi Naturals',
                'channel_code' => 'default',
                'locale_code' => null,
            ],
            [
                'code' => 'emails.configure.email_settings.sender_email',
                'value' => 'info@navanidhinaturals.com',
                'channel_code' => 'default',
                'locale_code' => null,
            ],
            [
                'code' => 'emails.configure.email_settings.admin_name',
                'value' => 'Navanidhi Care Team',
                'channel_code' => 'default',
                'locale_code' => null,
            ],
            [
                'code' => 'emails.configure.email_settings.admin_email',
                'value' => 'info@navanidhinaturals.com',
                'channel_code' => 'default',
                'locale_code' => null,
            ],
            [
                'code' => 'emails.configure.email_settings.contact_name',
                'value' => 'Navanidhi Naturals Support',
                'channel_code' => 'default',
                'locale_code' => null,
            ],
            [
                'code' => 'emails.configure.email_settings.contact_email',
                'value' => 'info@navanidhinaturals.com',
                'channel_code' => 'default',
                'locale_code' => null,
            ],

            // Shipping Origin (Hyderabad, Telangana, India)
            [
                'code' => 'sales.shipping.origin.address',
                'value' => 'Plot 42, Road No. 36, Jubilee Hills',
                'channel_code' => 'default',
                'locale_code' => 'en',
            ],
            [
                'code' => 'sales.shipping.origin.address1',
                'value' => 'Plot 42, Road No. 36, Jubilee Hills',
                'channel_code' => null,
                'locale_code' => null,
            ],
            [
                'code' => 'sales.shipping.origin.city',
                'value' => 'Hyderabad',
                'channel_code' => 'default',
                'locale_code' => 'en',
            ],
            [
                'code' => 'sales.shipping.origin.city',
                'value' => 'Hyderabad',
                'channel_code' => null,
                'locale_code' => null,
            ],
            [
                'code' => 'sales.shipping.origin.state',
                'value' => 'Telangana',
                'channel_code' => 'default',
                'locale_code' => 'en',
            ],
            [
                'code' => 'sales.shipping.origin.state',
                'value' => 'Telangana',
                'channel_code' => null,
                'locale_code' => null,
            ],
            [
                'code' => 'sales.shipping.origin.zipcode',
                'value' => '500033',
                'channel_code' => 'default',
                'locale_code' => 'en',
            ],
            [
                'code' => 'sales.shipping.origin.zipcode',
                'value' => '500033',
                'channel_code' => null,
                'locale_code' => null,
            ],
            [
                'code' => 'sales.shipping.origin.country',
                'value' => 'IN',
                'channel_code' => 'default',
                'locale_code' => 'en',
            ],
            [
                'code' => 'sales.shipping.origin.country',
                'value' => 'IN',
                'channel_code' => null,
                'locale_code' => null,
            ],

            // Delivery / Shipping Carrier default descriptions
            [
                'code' => 'sales.carriers.flatrate.title',
                'value' => 'Standard Eco Delivery (₹60 Flat Rate)',
                'channel_code' => 'default',
                'locale_code' => 'en',
            ],
            [
                'code' => 'sales.carriers.flatrate.description',
                'value' => 'Reliable surface delivery across India (3-5 business days).',
                'channel_code' => 'default',
                'locale_code' => 'en',
            ],
            [
                'code' => 'sales.carriers.free.title',
                'value' => 'Complimentary Express Delivery (Orders > ₹499)',
                'channel_code' => 'default',
                'locale_code' => 'en',
            ],
            [
                'code' => 'sales.carriers.free.description',
                'value' => 'Free priority dispatch for all orders of ₹499 and above.',
                'channel_code' => 'default',
                'locale_code' => 'en',
            ],

            // Units & Catalog Options (Weight Unit: grams)
            [
                'code' => 'general.general.locale_options.weight_unit',
                'value' => 'grams',
                'channel_code' => 'default',
                'locale_code' => null,
            ],
            [
                'code' => 'catalog.products.settings.compare_option',
                'value' => '1',
                'channel_code' => null,
                'locale_code' => null,
            ],
            [
                'code' => 'customer.settings.wishlist.wishlist_option',
                'value' => '1',
                'channel_code' => null,
                'locale_code' => null,
            ],
            [
                'code' => 'general.general.breadcrumbs.shop',
                'value' => '1',
                'channel_code' => null,
                'locale_code' => null,
            ],
        ];

        foreach ($configs as $config) {
            DB::table('core_config')->updateOrInsert(
                [
                    'code' => $config['code'],
                    'channel_code' => $config['channel_code'],
                    'locale_code' => $config['locale_code'],
                ],
                [
                    'value' => $config['value'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }

        // 5. Update Channel Details and Home SEO
        DB::table('channel_translations')->where('channel_id', 1)->where('locale', 'en')->update([
            'name' => 'Navanidhi Naturals',
            'home_seo' => json_encode([
                'meta_title' => 'Navanidhi Naturals — Authentic Farm Spices & Pure Botanical Nutrition | MAN Agro Foods',
                'meta_keywords' => 'pure spices, red chilli powder, lakadong turmeric powder, farm spices, stone milled spices, zero sudan dyes, zero lead chromate, organic moringa, botanical powders, Navanidhi Naturals, MAN Agro Foods',
                'meta_description' => 'Discover Navanidhi Naturals by MAN Agro Foods: Stone-milled pure Red Chilli Powder, high-curcumin Lakadong Turmeric, and cold-dehydrated botanicals with zero Sudan dyes, zero lead chromate, and zero fillers.',
            ]),
        ]);

        $this->command->info('Navanidhi Naturals Core Configuration & Channel SEO seeded successfully.');
    }
}
