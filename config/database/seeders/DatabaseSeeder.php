<?php

namespace Database\Seeders;

use App\Contants\Constant;
use App\Models\Admin;
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
            UserSeeder::class,
            AdminSeeder::class,
            RealEstateSeeder::class,
            StaffSeeder::class,
            LocationSeeder::class,
            RequestSeeder::class,

        ]);
    }
}
