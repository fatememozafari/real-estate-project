<?php

namespace Database\Seeders;

use App\Models\RequestModel;
use Illuminate\Database\Seeder;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RequestModel::create([
            'user_id' => 2,
            'real_estate_id' => 1,
            'expired_date'=>now(),

        ]);
    }
}
