<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CampSeeder::class,
            CampImageSeeder::class,
            CampSessionSeeder::class,
            CampSessionSlotSeeder::class,
            CarousalSeeder::class,
            AboutUsSeeder::class,
        ]);
    }
}
