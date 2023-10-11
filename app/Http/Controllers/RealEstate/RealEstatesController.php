<?php

namespace App\Http\Controllers\RealEstate;

use App\Contants\Constant;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\RealEstates\RealEstateStoreRequest;
use App\Models\RealEstate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RealEstatesController extends BaseController
{
    public function index(RealEstate $realEstate)
    {
        return view('real-estate.real-estates.all',compact('realEstate'));
    }


    public function edit(RealEstate $realEstate)
    {
        $statuses= Constant::getActivityStatusesView();
        return view('real-estate.real-estates.edit', compact('realEstate','statuses'));
    }

    public function update(Request $request, RealEstate $realEstate)
    {

        $this->validateUpdateRealEstate($request, $realEstate);
        $data = $this->getData();
        $result = $realEstate->update($data);

        if ($result) {
            return redirect()->route('real-estate.real-estates.show',$realEstate)->with('success', 'با موفقیت ویرایش شد');
        }
        return back()->with('error', 'با خطا مواجه شد');

    }

    public function show(RealEstate $realEstate)
    {
        return view('real-estate.real-estates.show', compact('realEstate'));

    }

    public function ajaxSearch(Request $request)
    {
        $q=$request->input('q');
        $realEstates=RealEstate::where('name','like',"%$q%")->select('id','name')->get();
        return response()->json(['data'=>$realEstates]);
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
