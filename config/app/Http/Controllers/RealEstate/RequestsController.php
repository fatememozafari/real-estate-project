<?php

namespace App\Http\Controllers\RealEstate;

use App\Contants\Constant;
use App\Helpers\Format\Date;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Requests\RequestStoreRequest;
use App\Models\RealEstate;
use App\Models\RequestDetail;
use App\Models\RequestModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RequestsController extends BaseController
{
    public function index(RealEstate $realEstate)
    {

        $requests = RequestModel::with('user')->paginate(); // eager loading

        return view('real-estate.requests.all', compact('requests', 'realEstate'));
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

        return view('real-estate.requests.create',
            compact('realEstate', 'yard', 'houseTypes', 'statuses', 'directionTypes', 'cabinetMaterials', 'floorMaterials', 'types', 'contracts', 'parking', 'elevator'));

    }

    public function store(Request $request, RealEstate $realEstate)
    {

        // validate request
        $this->validateStoreRequest($request);

        $user = User::where('mobile', $request->input('mobile'))->first();


        if (!$user) {
            $user = User::create([
                'name' => request('user_name'),
                'mobile' => request('mobile'),
                'email' => request('email'),
                'status' => 1,
                'password' => Hash::make('123456'),
                'password_confirmation' => Hash::make('123456'),
            ]);
        }
        $data = [
            'user_id' => $user->id,
            'real_estate_id' => $realEstate->id,
            'expired_date' => Date::toCarbonDateFormat(request('expired_date')),
        ];
        $requestObject = RequestModel::create($data);

        $requestDetailData = [];
        foreach ($request->all() as $name => $value) {

            if (in_array($name, ['user_name', 'mobile', 'email', 'expired_date', '_token'])) continue;


            if (!is_null($value) && $name != 'map') {
                $requestDetailData[] = [
                    'request_id' => $requestObject->id,
                    'location_feature_name' => $name,
                    'location_feature_value' => ($name == 'expired_date' || $name == 'construction_year') ? Date::toCarbonDateFormat($value) : $value,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }


        }


        $requestDetail = RequestDetail::insert($requestDetailData);

        if ($requestDetail) {
            return redirect()->route('real-estate.requests.all', $realEstate)->with('success', 'با موفقیت ثبت شد');
        }
        return back()->with('error', 'با خطا مواجه شد');
    }



    public function show(RealEstate $realEstate, RequestModel $requestModel)
    {
        return view('real-estate.requests.show', compact('requestModel', 'realEstate'));

    }

    public function delete(RealEstate $realEstate, RequestModel $requestModel)
    {
        $requestModel->delete();
        return redirect()->route('real-estate.requests.all', $realEstate);
    }

    public function getData()
    {
        return [
            'user_id' => request('user_id'),
            'expired_at' => request('expired_at'),
        ];
    }

    public function ajaxSearch(Request $request)
    {
        $q = $request->input('q');
        $requests = RequestModel::where('name', 'like', '%$q%')->select('id', 'name')->get();
        return response()->json(['data' => $requests]);
    }

    private function validateStoreRequest(Request $request)
    {


        $request->validate([
            'user_name' => ['required'],
            'mobile' => ['required'],
            'email' => ['required'],
            'expired_date' => ['required'],
            'type' => ['required'],
            'contract' => ['required'],
        ], [
            '*.required' => 'فیلد الزامی است'
        ]);
    }


}
