<?php

namespace App\Http\Controllers\RealEstate;

use App\Contants\Constant;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Staffs\StaffStoreRequest;
use App\Http\Requests\Users\UserStoreRequest;
use App\Models\RealEstate;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffsController extends BaseController
{
    public function index(RealEstate $realEstate)
    {
        $statuses= Constant::getActivityStatusesView();
        $realEstate->load('users');
        return view('real-estate.staffs.list', compact('realEstate','statuses'));
    }

    public function create(RealEstate $realEstate)
    {
        $statuses= Constant::getActivityStatusesView();
        return view('real-estate.staffs.create',compact('statuses','realEstate'));
    }
    public function store(Request $request,RealEstate $realEstate)
    {
        // validation

        // check user exist or not
//        $user =$this->isUserExist($request->input('mobile'));

        //        if (is_null($user)){
//
//            // prepare user data
//            $userData= $this->getUserData();
//            $user = User::create($userData);
//        }
//        // prepare staff record data
//        $data = $this->getData($user,$realEstate);

//        if(!in_array($user->id,$realEstate->staffs->pluck('user_id')->toArray())){
//            // create new staff
//            $staff = Staff::create($data);
//
//            if ( $staff instanceof Staff) {
//                return redirect()->route('real-estate.staffs.all')->with('success', 'با موفقیت ثبت شد');
//            }
//            return back()->with('error', 'با خطا مواجه شد');
//        }
//        return redirect()->back()->with('user-exist','این کارمند قبلا عضو این املاک شده است');



       $user= User::where('mobile', $request->input('mobile'))->first();

        if (!$user) {
            $user = User::create([
                'name' => request('name'),
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
            'status' => 1,
        ];
        $check = Staff::query()
            ->where([
                ['real_estate_id', '=', $realEstate->id],
                ['user_id', '=', $user->id]
            ])->exists();

        if (!$check) {
            // insert to database
            $staff = Staff::create($data);

            if ($staff instanceof Staff) {
                return redirect()->route('real-estate.staffs.all',$realEstate)->with('success', 'با موفقیت ثبت شد');
            }
            return redirect()->route('real-estate.staffs.create', $realEstate)->with('error', 'با خطا مواجه شد');
        }

        return redirect()->route('admin.staffs.create', $realEstate)->with('error', 'این کارمند قبلا ثبت شده است');


    }


    public function delete(RealEstate $realEstate,Staff $staff)
    {
        $staff->delete();
        return redirect()->back()->with('success','با موفقیت حذف شد');
    }

    public function getData(User $user,RealEstate $realEstate)
    {
        return [
            'user_id' =>$user->id,
            'real_estate_id' => $realEstate->id,
            'status' => request('status'),
        ];
    }

    public function getUserData()
    {
        return [
            'name' => request('name'),
            'email' => request('email'),
            'mobile' => request('mobile'),
            'password' => Hash::make('123456'),
            'password_confirmation' => Hash::make('123456'),
            'status' => request('status'),
        ];
    }

    private function isUserExist(string $mobile)
    {
        return User::where('mobile',$mobile)->first();
    }
}
