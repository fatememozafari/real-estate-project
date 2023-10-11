<?php

namespace Database\Seeders;

use App\Contants\Constant;
use App\Models\RealEstate;
use Illuminate\Database\Seeder;

class RealEstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RealEstate::create([
            'name' => 'مشاور املاک اریا',
            'address' => 'اراک',
            'license_number'=>'544897',
            'user_id' => 1,
            'status' => Constant::ACTIVE,
        ]);
        RealEstate::create([
            'name' => 'مشاور املاک نوین',
            'address' => 'اراک',
            'license_number'=>'12345',
            'user_id' => 1,
            'status' => Constant::ACTIVE,
        ]);
    }
}
