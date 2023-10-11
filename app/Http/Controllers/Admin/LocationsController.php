<?php

namespace App\Http\Controllers\Admin;

use App\Contants\Constant;
use App\Filters\LocationFilter;
use App\Helpers\Format\Date;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Locations\LocationStoreRequest;
use App\Http\Requests\Locations\LocationUpdateRequest;
use App\Models\Location;
use App\Models\RealEstate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class LocationsController extends BaseController
{

    public function index(RealEstate $realEstate)
    {
        $locations = RealEstate::with('avatars')->paginate();
        $statuses = Constant::getActivityStatusesView();
        return view('admin.real-estates.locations.list', compact('realEstate', 'locations', 'statuses'));
    }

    public function list()
    {
        $types = Constant::getTypesView();
        $contracts = Constant::getContractsView();
        $locations = Location::filter(new LocationFilter())->with(['realEstate'])->paginate();
        return view('admin.locations.all', compact('locations', 'contracts', 'types'));

    }


    public function create(RealEstate $realEstate)
    {
        $statuses = Constant::getActivityStatusesView();
        $parking = Constant::getActivityParkingView();
        $elevator = Constant::getActivityElevatorView();
        $yard = Constant::getActivityYardView();
        $contracts = Constant::getContractsView();
        $types = Constant::getTypesView();
        $houseTypes = Constant::getHouseTypesView();
        $floorMaterials = Constant::getFloorMaterialsView();
        $cabinetMaterials = Constant::getCabinetMaterialsView();
        $directionTypes = Constant::getdirectionTypesView();

        return view('admin.real-estates.locations.create',
            compact('realEstate', 'yard', 'houseTypes', 'statuses', 'directionTypes', 'cabinetMaterials', 'floorMaterials', 'types', 'contracts', 'parking', 'elevator'));
    }


    public function store(LocationStoreRequest $request, RealEstate $realEstate)
    {

        // prepare data
        $data = $this->getData($realEstate);

        // create location
        $location = Location::create($data);

        if ($location instanceof Location) {
            return redirect()->route('admin.real-estates.locationList', $realEstate)->with('success', 'خانه مورد نظر با موفقیت ثبت شد');
        }

        return back()->with('error', 'با خطا مواجه شد');

    }


    public function edit(RealEstate $realEstate, Location $location)
    {
        $statuses = Constant::getActivityStatusesView();
        $parking = Constant::getActivityParkingView();
        $elevator = Constant::getActivityElevatorView();
        $contracts = Constant::getContractsView();
        $yard = Constant::getActivityYardView();
        $types = Constant::getTypesView();
        $houseTypes = Constant::getHouseTypesView();
        $floorMaterials = Constant::getFloorMaterialsView();
        $cabinetMaterials = Constant::getCabinetMaterialsView();
        $directionTypes = Constant::getdirectionTypesView();
        return view('admin.real-estates.locations.edit', compact('realEstate', 'location', 'yard', 'statuses', 'houseTypes', 'directionTypes', 'cabinetMaterials', 'floorMaterials', 'types', 'contracts', 'parking', 'elevator'));
    }


    public function update(Request $request, RealEstate $realEstate, Location $location)
    {
        // validation fields
        $this->validateUpdateLocation($request);

        // prepare data
        $data = $this->getData($realEstate);

        $result = $location->update($data);
        // redirect
        if ($result) {
            return redirect()->route('admin.locations.show', [$realEstate,$location])->with('success', 'با موفقیت ویرایش شد');
        }
        return back()->with('error', 'با خطا مواجه شد');
    }


    public function show(RealEstate $realEstate, Location $location)
    {
        return view('admin.real-estates.locations.show', compact('realEstate', 'location'));
    }


    public function delete(RealEstate $realEstate, Location $location)
    {
        $location->delete();
        return redirect()->back()->with('success', 'با موفقیت حذف شد');
    }

    public function ajaxSearch(Request $request)
    {
        $q = $request->input('q');
        $floorMaterials = Location::query()
            ->where('title', 'like', "%$q%")
            ->select('id', 'title as name')->get();
        return response()->json(['data' => $floorMaterials]);
    }

    public function getData(RealEstate $realEstate)
    {
        $data = [
            'real_estate_id' => $realEstate->id,
            'title' => request('title'),
            'description' => request('description'),
            'type' => request('type'),
            'contract' => request('contract'),
            'address' => request('address'),
            'cabinet_material' => request('cabinet_material'),
            'floor_material' => request('floor_material'),
            'has_parking' => request('has_parking'),
            'has_elevator' => request('has_elevator'),
            'room_count' => request('room_count'),
            'infrastructure_metrage' => request('infrastructure_metrage'),
            'yard_metrage' => request('yard_metrage'),
            'direction_type' => request('direction_type'),
            'purchase_price' => request('purchase_price'),
            'mortgage' => request('mortgage'),
            'rent' => request('rent'),
            'status' => request('status'),
            'longitude' => request('map')['lng'],
            'latitude' => request('map')['lat'],

        ];

        if (in_array(request('construction_year'), [Constant::HOUSE, Constant::VILLA])) {
            $data['construction_year'] = Date::toCarbonDateFormat(request('construction_year'));
        }

        if (in_array(request('floor_number'), [Constant::HOUSE, Constant::VILLA])) {
            $data['floor_number'] = request('floor_number');
        }

        if (request()->hasFile('avatar')) {
            $data['avatar'] = $this->upload(request()->file('avatar'), Constant::LOCATION_AVATAR_PATH);
        }

        return $data;
    }


    private function validateUpdateLocation(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'type' => ['required', 'string'],
//            'purchase_price'=> ['numeric','require_if:contract,for_sale'],
//            'mortgage'=> ['numeric','require_if:contract,for_rent'],
//            'rent'=> ['numeric','require_if:contract,for_rent'],
            'contract' => ['required', 'string'],
            'address' => ['required', 'string'],
            'status' => ['required', Rule::in(['active', 'in-active'])],
        ], [
            'title.required' => 'وارد کردن عنوان الزامی است',
            'type.required' => 'وارد کردن نوع ملک الزامی است',
            'purchase_price.numeric' => 'مقدار عددی وارد کنید',
            'mortgage.numeric' => 'مقدار عددی وارد کنید',
            'rent.numeric' => 'مقدار عددی وارد کنید',
            'contract.required' => 'وارد کردن نوع تقاضا الزامی است',
            'address.required' => 'وارد کردن آدرس الزامی است',
            'status.required' => 'انتخاب وضعیت الزامی است',
        ]);
    }
}
