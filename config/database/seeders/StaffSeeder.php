<?php

namespace Database\Seeders;

use App\Contants\Constant;
use App\Models\Admin;
use App\Models\Staff;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Staff::create([
            'user_id' => 2,
            'real_estate_id' => 1,
            'status' => Constant::ACTIVE,
        ]);
        Staff::create([
            'user_id' => 3,
            'real_estate_id' => 2,
            'status' => Constant::ACTIVE,
        ]);
    }
}
