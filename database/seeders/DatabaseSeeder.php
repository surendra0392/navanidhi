<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Webkul\Installer\Database\Seeders\DatabaseSeeder as BagistoDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 1. Run Base Bagisto Core Architecture & System Seeders
        $this->call(BagistoDatabaseSeeder::class);

        // 2. Run Navanidhi Naturals Storefront Configuration & Content Seeders
        $this->call(NavanidhiConfigSeeder::class);
        $this->call(NavanidhiGSTSeeder::class);
        $this->call(ShippingSeeder::class);
        $this->call(NavanidhiCatalogSeeder::class);
        $this->call(NavanidhiPDPRelationsSeeder::class);
        $this->call(NavanidhiPromotionSeeder::class);
        $this->call(NavanidhiHeroSliderSeeder::class);
        $this->call(NavanidhiCMSSeeder::class);
        $this->call(RecipeSeeder::class);
        $this->call(NavanidhiMenuSeeder::class);
        $this->call(NavanidhiThemeCustomizationSeeder::class);
    }
}
