<?php

namespace Database\Seeders;

use App\Contants\Constant;
use App\Models\Location;
use App\Models\RealEstate;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'real_estate_id'=> '1',
            'title'=> 'آگهی شماره یک',
            'address'=> 'اراک',
            'description'=> 'توضیحات ندارد',
            'type'=> Constant::HOUSE,
            'contract'=> Constant::FOR_SALE,
            'cabinet_material'=> Constant::METAL,
            'floor_material'=> Constant::CERAMIC,
            'floor_number'=> 2,
            'has_parking'=>  Constant::YES,
            'has_elevator'=>  Constant::YES,
            'room_count'=> 2,
            'infrastructure_metrage'=> '100',
            'yard_metrage'=> '20',
            'direction_type'=> Constant::NORTH,
            'purchase_price'=> '2000000000',
            'construction_year'=> '2023-01-31 14:36:22',
            'status' => Constant::ACTIVE,
        ]);

        Location::create([
            'real_estate_id'=> '2',
            'title'=> 'آگهی شماره 2',
            'address'=> 'اراک',
            'description'=> 'توضیحات ندارد',
            'type'=> Constant::HOUSE,
            'contract'=> Constant::FOR_SALE,
            'cabinet_material'=> Constant::MEMBERAN,
            'floor_material'=> Constant::PARQUET,
            'floor_number'=> 4,
            'has_parking'=>  Constant::YES,
            'has_elevator'=>  Constant::YES,
            'room_count'=> 3,
            'infrastructure_metrage'=> '120',
            'yard_metrage'=> '20',
            'direction_type'=> Constant::NORTH,
            'purchase_price'=> '3000000000',
            'construction_year'=> '2023-01-31 14:36:22',
            'status' => Constant::ACTIVE,
        ]);
    }
}
