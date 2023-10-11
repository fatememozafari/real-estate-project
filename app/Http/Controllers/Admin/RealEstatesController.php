<?php

namespace App\Http\Controllers\Admin;

use App\Contants\Constant;
use App\Filters\LocationFilter;
use App\Filters\RealEstateFilter;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Http\Requests\RealEstates\ReadEstateStoreRequest;
use App\Http\Requests\RealEstates\RealEstateStoreRequest;
use App\Http\Requests\RealEstates\RealEstateUpdateRequest;
use App\Models\Location;
use App\Models\RealEstate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RealEstatesController extends BaseController
{
    public function index()
    {
        $realEstates = RealEstate::filter(new RealEstateFilter())->with('users')->paginate();
        $statuses = Constant::getActivityStatusesView();
        return view('admin.real-estates.all', compact('realEstates', 'statuses'));
    }

    public function create()
    {
        $statuses = Constant::getActivityStatusesView();
        return view('admin.real-estates.create', compact('statuses'));
    }

    public function store(Request $request)
    {

        $this->validateStoreRealEstate($request);

        $data = $this->getData();

        $realEstate = RealEstate::create($data);

        if ($realEstate instanceof RealEstate) {
            return redirect()->route('admin.real-estates.all')->with('success', 'با موفقیت ثبت شد');
        } else {
            return back()->with('error');
        }
    }

    public function edit(RealEstate $realEstate)
    {
        $statuses = Constant::getActivityStatusesView();
        return view('admin.real-estates.edit', compact('realEstate', 'statuses'));
    }

    public function update(Request $request, RealEstate $realEstate)
    {
        $this->validateUpdateRealEstate($request, $realEstate);
        $data = $this->getData();
        $result = $realEstate->update($data);

        if ($result) {
            return redirect()->route('admin.real-estates.all')->with('success', 'با موفقیت ویرایش شد');
        }
        return back()->with('error', 'با خطا مواجه شد');

    }

    public function show(RealEstate $realEstate)
    {
        $statuses = Constant::getActivityStatusesView();
        $realEstate->load('users');
        return view('admin.real-estates.show', compact('realEstate', 'statuses'));

    }

    public function delete(RealEstate $realEstate)
    {
        $realEstate->delete();
        return redirect()->back()->with('success', 'با موفقیت حذف شد');
    }

    public function staffList(RealEstate $realEstate)
    {
        $staffs = RealEstate::with('users')->paginate();
        $statuses = Constant::getActivityStatusesView();
        return view('admin.real-estates.staffs.list', compact('statuses', 'realEstate'));
    }


    public function ajaxSearch(Request $request)
    {
        $q = $request->input('q');
        $realEstates = RealEstate::where('name', 'like', "%$q%")->select('id', 'name', 'avatar as image')->get();
        return response()->json(['data' => $realEstates]);
    }

    public function getData()
    {
        $data = [
            'name' => request('name'),
            'address' => request('address'),
            'license_number' => request('license_number'),
            'user_id' => request('user_id'),
            'status' => request('status'),
            'longitude' => request('map')['lng'],
            'latitude' => request('map')['lat'],
        ];
        if (request()->hasFile('avatar')) {
            $data['avatar'] = $this->upload(request()->file('avatar'), Constant::REALESTATE_AVATAR_PATH);
        }
        return $data;
    }


    private function validateStoreRealEstate(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'status' => ['required', 'string'],
            'address' => ['required', 'string'],
            'user_id' => ['required'],
            'license_number' => ['required', 'unique:real_estates,license_number'],
        ], [
            'name.required' => 'وارد کردن عنوان الزامی است',
            'status.required' => 'وارد کردن نوع ملک الزامی است',
            'address.required' => 'وارد کردن آدرس الزامی است',
            'user_id.required' => 'انتخاب مدیر الزامی است',
            'license_number.required' => 'وارد کردن شماره مجوز الزامی است',
            'license_number.unique' => 'این شماره مجوز قبلا ثبت شده است',
            'map.required' => 'لطفا موقعیت جغرافیایی مشاور املاک خود را مشخص نمائید',
        ]);
    }


    private function validateUpdateRealEstate(Request $request, RealEstate $realEstate)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'status' => ['required', 'string'],
            'address' => ['required', 'string'],
            'user_id' => ['required'],
            'license_number' => [Rule::unique('real_estates', 'license_number')->ignore($realEstate)],
        ], [
            'name.required' => 'وارد کردن عنوان الزامی است',
            'status.required' => 'وارد کردن نوع ملک الزامی است',
            'address.required' => 'وارد کردن آدرس الزامی است',
            'user_id.required' => 'انتخاب مدیر الزامی است',
            'license_number.required' => 'وارد کردن شماره مجوز الزامی است',
            'license_number.unique' => 'این شماره مجوز قبلا ثبت شده است',
            'map.required' => 'لطفا موقعیت جغرافیایی مشاور املاک خود را مشخص نمائید',
        ]);
    }
}
