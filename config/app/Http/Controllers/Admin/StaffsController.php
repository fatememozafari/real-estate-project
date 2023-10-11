<?php

namespace App\Http\Controllers\Admin;

use App\Contants\Constant;
use App\Filters\AdminFilter;
use App\Filters\StaffFilter;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Staffs\StaffStoreRequest;
use App\Models\RealEstate;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class StaffsController extends BaseController
{
    public function index(User $user)
    {
        $staffs = User::filter(new StaffFilter())->paginate();
        return view('admin.staffs.all', compact('staffs'));
    }

    public function create(RealEstate $realEstate)
    {
        $statuses = Constant::getActivityStatusesView();
        return view('admin.real-estates.staffs.create', compact('statuses', 'realEstate'));
    }

    public function store(Request $request, RealEstate $realEstate)
    {

        // validation fields
        $this->validateStoreStaff($request);

        // make data
        $data = $this->getData($realEstate);
        $check = Staff::query()
            ->where([
                ['real_estate_id', '=', $realEstate->id],
                ['user_id', '=', request('user_id')]
            ])->exists();

        if (!$check) {
            // insert to database
            $staff = Staff::create($data);

            if ($staff instanceof Staff) {
                return redirect()->route('admin.real-estates.staffList', $realEstate)->with('success', 'با موفقیت ثبت شد');
            }
            return redirect()->route('admin.real-estates.staffList', $realEstate)->with('error', 'با خطا مواجه شد');
        }

        return redirect()->route('admin.staffs.create', $realEstate)->with('error', 'این کارمند قبلا ثبت شده است');


    }


    public function delete(RealEstate $realEstate, Staff $staff)
    {
        $staff->delete();
        return redirect()->back()->with('success', 'با موفقیت حذف شد');
    }

    public function getData(RealEstate $realEstate)
    {
        return [
            'user_id' => request('user_id'),
            'real_estate_id' => $realEstate->id,
            'status' => request('status'),
        ];
    }

    private function validateStoreStaff(Request $request)
    {
        $request->validate([
            'user_id' => ['required'],
            'status' => ['required', Rule::in(['active', 'in-active'])],
        ], [
            'user_id.required' => 'انتخاب کارمند الزامی است',
            'status.required' => 'انتخاب وضعیت الزامی است',
        ]);
    }

}
