<?php

namespace App\Contants;

class Constant
{
    const UNDEFINED = 'نامشخص';

    const ACTIVE = 'active';
    const IN_ACTIVE = 'in-active';

    const FOR_SALE = 'for_sale';
    const FOR_RENT = 'for_rent';

    const NORTH = 'north';
    const SOUTH = 'south';

    const SHOP= 'shop';
    const APARTMENT='apartment';
    const HOUSE= 'house';
    const LAND='land';
    const GARDEN= 'garden';
    const VILLA= 'villa';

    const ROCK='rock';
    const PARQUET= 'parquet';
    const CERAMIC='ceramic';
    const CARPET= 'carpet';
    const CEMENT= 'cement';

    const MDF= 'mdf';
    const METAL= 'metal';
    const MEMBERAN= 'memberan';
    const HIGHGLASS= 'highglass';

    const ADMINISTRATOR_AVATAR_PATH = 'uploads/administrators/avatar/';
    const USER_AVATAR_PATH = 'uploads/users/avatar/';
    const LOCATION_AVATAR_PATH = 'uploads/locations/avatar/';
    const LOCATION_BANNER_PATH = 'uploads/locations/banner/';
    const REALESTATE_AVATAR_PATH = 'uploads/real-estates/avatar/';

    const BOOLEAN_TYPE = 'boolean';
    const INTEGER_TYPE = 'integer';

    const YES='yes';
    const NO= 'no';

    public static function getActivityParking($parking = null)
    {
        $activeParking = [
            self::YES => 'دارد',
            self::NO =>  'ندارد',
        ];
        if(is_null($parking)){
            return $activeParking;
        }
        if(in_array($parking, array_keys($activeParking))){
            return $activeParking[$parking];
        }
    }
    public static function getActivityParkingView()
    {
        $activeParking  = self::getActivityParking();
        $activeParkingView = [];
        foreach ($activeParking as $key => $value){
            $activeParkingView[] = [
                'id' => $key,
                'title' => $value
            ];
        }
        return $activeParkingView;
    }

    public static function getActivityElevator($elevator = null)
    {
        $activeElevator = [
            self::YES => 'دارد',
            self::NO =>  'ندارد',
        ];
        if(is_null($elevator)){
            return $activeElevator;
        }
        if(in_array($elevator, array_keys($activeElevator))){
            return $activeElevator[$elevator];
        }
    }
    public static function getActivityElevatorView()
    {
        $activeElevator  = self::getActivityElevator();
        $activeElevatorView = [];
        foreach ($activeElevator as $key => $value){
            $activeElevatorView[] = [
                'id' => $key,
                'title' => $value
            ];
        }
        return $activeElevatorView;
    }

    public static function getActivityYard($yard = null)
    {
        $activeYard = [
            self::YES => 'دارد',
            self::NO =>  'ندارد',
        ];
        if(is_null($yard)){
            return $activeYard;
        }
        if(in_array($yard, array_keys($activeYard))){
            return $activeYard[$yard];
        }
    }
    public static function getActivityYardView()
    {
        $activeYard  = self::getActivityYard();
        $activeYardView = [];
        foreach ($activeYard as $key => $value){
            $activeYardView[] = [
                'id' => $key,
                'title' => $value
            ];
        }
        return $activeYardView;
    }

    public static function getActivityStatuses($status = null)
    {
        $activeStatuses = [
            self::IN_ACTIVE => 'غیر فعال',
            self::ACTIVE =>  'فعال',
        ];
        if(is_null($status)){
            return $activeStatuses;
        }
        if(in_array($status, array_keys($activeStatuses))){
            return $activeStatuses[$status];
        }
    }
    public static function getActivityStatusesView()
    {
        $activeStatuses  = self::getActivityStatuses();
        $activeStatusesView = [];
        foreach ($activeStatuses as $key => $value){
            $activeStatusesView[] = [
                'id' => $key,
                'title' => $value
            ];
        }
        return $activeStatusesView;
    }

    public static function getContracts($contract = null)
    {
        $activeContracts = [
            self::FOR_SALE => 'فروش',
            self::FOR_RENT =>  'اجاره',
        ];
        if(is_null($contract)){
            return $activeContracts;
        }
        if(in_array($contract, array_keys($activeContracts))){
            return $activeContracts[$contract];
        }
    }
    public static function getContractsView()
    {
        $activeContracts  = self::getContracts();
        $activeContractsView = [];
        foreach ($activeContracts as $key => $value){
            $activeContractsView[] = [
                'id' => $key,
                'title' => $value
            ];
        }
        return $activeContractsView;
    }

    public static function getTypes($type = null)
    {
        $activeTypes = [
            self::HOUSE =>  'خانه شخصی',
            self::SHOP => 'مغازه',
            self::LAND => 'زمین',
            self::GARDEN =>  'باغ',
            self::VILLA =>  'ویلا',
        ];
        if(is_null($type)){
            return $activeTypes;
        }
        if(in_array($type, array_keys($activeTypes))){
            return $activeTypes[$type];
        }
    }
    public static function getTypesView()
    {
        $activeTypes  = self::getTypes();
        $activeTypesView = [];
        foreach ($activeTypes as $key => $value){
            $activeTypesView[] = [
                'id' => $key,
                'title' => $value
            ];
        }
        return $activeTypesView;
    }

    public static function getHouseTypes($houseType = null)
    {
        $activeHouseTypes = [
            self::HOUSE =>  'ویلایی',
            self::APARTMENT => 'آپارتمان',

        ];
        if(is_null($houseType)){
            return $activeHouseTypes;
        }
        if(in_array($houseType, array_keys($activeHouseTypes))){
            return $activeHouseTypes[$houseType];
        }
    }
    public static function getHouseTypesView()
    {
        $activeHouseTypes  = self::getHouseTypes();
        $activeHouseTypesView = [];
        foreach ($activeHouseTypes as $key => $value){
            $activeHouseTypesView[] = [
                'id' => $key,
                'title' => $value
            ];
        }
        return $activeHouseTypesView;
    }

    public static function getFloorMaterials($floorMaterial = null)
    {
        $activeFloorMaterials = [
            self::ROCK => 'سنگ',
            self::PARQUET =>  'پارکت',
            self::CERAMIC => 'سرامیک',
            self::CARPET =>  'موکت',
            self::CEMENT =>  'سیمانی',
        ];
        if(is_null($floorMaterial)){
            return $activeFloorMaterials;
        }
        if(in_array($floorMaterial, array_keys($activeFloorMaterials))){
            return $activeFloorMaterials[$floorMaterial];
        }
    }
    public static function getFloorMaterialsView()
    {
        $activeFloorMaterials  = self::getFloorMaterials();
        $activeFloorMaterialsView = [];
        foreach ($activeFloorMaterials as $key => $value){
            $activeFloorMaterialsView[] = [
                'id' => $key,
                'title' => $value
            ];
        }
        return $activeFloorMaterialsView;
    }

    public static function getCabinetMaterials($cabinetMaterial = null)
    {
        $activeCabinetMaterials = [
            self::MDF => 'ام دی اف',
            self::METAL =>  'فلزی',
            self::MEMBERAN => 'ممبران',
            self::HIGHGLASS =>  'های گلس',

        ];
        if(is_null($cabinetMaterial)){
            return $activeCabinetMaterials;
        }
        if(in_array($cabinetMaterial, array_keys($activeCabinetMaterials))){
            return $activeCabinetMaterials[$cabinetMaterial];
        }
    }
    public static function getCabinetMaterialsView()
    {
        $activeCabinetMaterials  = self::getCabinetMaterials();
        $activeCabinetMaterialsView = [];
        foreach ($activeCabinetMaterials as $key => $value){
            $activeCabinetMaterialsView[] = [
                'id' => $key,
                'title' => $value
            ];
        }
        return $activeCabinetMaterialsView;
    }

    public static function getdirectionTypes($direction = null)
    {
        $activeDirections = [
            self::NORTH => 'شمالی',
            self::SOUTH =>  'جنوبی',

        ];
        if(is_null($direction)){
            return $activeDirections;
        }
        if(in_array($direction, array_keys($activeDirections))){
            return $activeDirections[$direction];
        }
    }
    public static function getdirectionTypesView()
    {
        $activeDirections  = self::getdirectionTypes();
        $activeDirectionsView = [];
        foreach ($activeDirections as $key => $value){
            $activeDirectionsView[] = [
                'id' => $key,
                'title' => $value
            ];
        }
        return $activeDirectionsView;
    }



}
