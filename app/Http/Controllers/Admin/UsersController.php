<?php

namespace App\Http\Controllers\Admin;

use App\Contants\Constant;
use App\Filters\UserFilter;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Users\UserStoreRequest;
use App\Http\Requests\Users\UserUpdateRequest;
use App\Models\RealEstate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends BaseController
{
    public function index()
    {
        $users= User::filter(new UserFilter())->paginate();
        return view('admin.users.all', compact('users'));
    }

    public function create()
    {
        $statuses= Constant::getActivityStatusesView();
        return view('admin.users.create',compact('statuses'));
    }

    public function store(UserStoreRequest $request)
    {
        $data = $this->getData();
        $user = User::create($data);

        if ($user instanceof User) {
            return redirect()->route('admin.users.all')->with('success', 'کاربر شما با موفقیت ثبت شد');
        }
        return back()->with('error', 'با خطا مواجه شد');
    }

    public function edit(User $user)
    {
        $statuses= Constant::getActivityStatusesView();
        return view('admin.users.edit', compact('user','statuses'));
    }

    public function update(Request $request, User $user)
    {
        // make data
        $this->validateUpdateUser($request,$user);
        $data = $this->getData();
        $result = $user->update($data);
        if ($result) {
            return redirect()->route('admin.users.all')->with('success', 'با موفقیت ویرایش شد');
        }
        return back()->with('error', 'با خطا مواجه شد');
    }

    public function show(User $user)
    {
        $statuses= Constant::getActivityStatusesView();
        return view('admin.users.show', compact('user','statuses'));
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.all');
    }


    public function getData()
    {
        $data= [
            'name' => request('name'),
            'email' => request('email'),
            'mobile' => request('mobile'),
            'status' => request('status'),
        ];
        if (!is_null(request('password'))) {
            $data['password'] = Hash::make(\request()->password);
        }
        if (!is_null(request('password_confirmation'))) {
            $data['password_confirmation'] = Hash::make(\request()->password_confirmation);
        }
        if (request()->hasFile('avatar')) {
            $data['avatar'] = $this->upload(request()->file('avatar'), Constant::USER_AVATAR_PATH);
        }
        return $data;
    }

    public function ajaxSearch(Request $request)
    {
        $q=$request->input('q');
        $users=User::where('name','like',"%$q%")->select('id','name')->get();
        return response()->json(['data'=>$users]);
    }

    private function validateUpdateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'mobile' =>  [Rule::unique('users','mobile')->ignore($user)],
            'email' =>  [Rule::unique('users','email')->ignore($user)],
            'password' => ['confirmed'],
            'status' => ['required', Rule::in(['active','in-active'])],
        ],[
            'name.required' => 'وارد کردن نام الزامی است',
            'mobile.required' => 'وارد کردن شماره همراه الزامی است',
            'email.required' => 'وارد کردن پست الکترونیکی الزامی است',
            'password.required' => 'وارد کردن رمز عبور الزامی است',
            'password.confirmed' => 'رمز عبور با تکرار آن مطابقت ندارد',
            'status.required' => 'انتخاب وضعیت الزامی است',
            'email.email' => 'ایمیل با فرمت معتبر وارد کنید',
            'email.unique' => 'این ایمیل قبلا ثبت شده است',
            'mobile.unique' => 'این شماره قبلا ثبت شده است',
            'mobile.numeric' => 'فقط عدد مجاز است',
        ]);
    }
}
