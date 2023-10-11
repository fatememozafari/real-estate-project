<?php

namespace App\Http\Controllers\RealEstate;

use App\Contants\Constant;
use App\Http\Controllers\Controller;
use App\Models\RealEstate;
use App\Models\RequestDetail;
use App\Models\RequestModel;
use Illuminate\Http\Request;

class RequestDetailsController extends Controller
{
    public function show(RealEstate $realEstate,RequestModel $requestModel,RequestDetail $requestDetail)
    {
        return view('real-estate.requests.request-details.show', compact('requestDetail','requestModel', 'realEstate'));

    }

    public function edit(RealEstate $realEstate, RequestModel $requestModel, RequestDetail $requestDetail)
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
        return view('real-estate.requests.request-details.edit', compact('realEstate', 'requestModel', 'requestDetail',
            'yard', 'houseTypes', 'statuses', 'directionTypes', 'cabinetMaterials', 'floorMaterials', 'types', 'contracts', 'parking', 'elevator'));
    }

    public function update(Request $request, RealEstate $realEstate, RequestModel $requestModel)
    {
        $data = $this->getData();
        $result = $request->update($data);

        if ($result) {
            return redirect()->route('real-estate.request-details.show', [$realEstate, $requestModel])->with('success', 'با موفقیت ویرایش شد');
        }
        return back()->with('error', 'با خطا مواجه شد');
    }

}
