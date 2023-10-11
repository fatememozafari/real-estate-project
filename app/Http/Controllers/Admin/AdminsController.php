<?php

namespace App\Http\Controllers\Admin;

use App\Contants\Constant;
use App\Filters\AdminFilter;
use App\Filters\UserFilter;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admins\AdminStoreRequest;
use App\Http\Requests\Admins\AdminUpdateRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminsController extends BaseController
{
    public function index()
    {
        $admins = Admin::filter(new AdminFilter())->paginate();
        return view('admin.administrators.all', compact('admins'));
    }

    public function create()
    {
        $statuses = Constant::getActivityStatusesView();
        return view('admin.administrators.create', compact('statuses'));
    }

    public function store(AdminStoreRequest $request)
    {
        // prepare data
        $data = $this->getData();
        // create admin
        $admin = Admin::create($data);
        if ($admin instanceof Admin) {
            return redirect()->route('admin.admins.all')->with('success', 'ادمین جدید با موفقیت ثبت شد');
        }
        return back()->with('error', 'با خطا مواجه شد');
    }

    public function edit(Admin $admin)
    {
        $statuses = Constant::getActivityStatusesView();
        return view('admin.administrators.edit', compact('admin', 'statuses'));
    }

    public function update(Request $request, Admin $admin)
    {
        $this->validateUpdateAdmin($request, $admin);

        $data = $this->getData();
        $result = $admin->update($data);

        if ($result) {
            return redirect()->route('admin.admins.all')->with('success', 'با موفقیت ویرایش شد');
        }
        return back()->with('error', 'با خطا مواجه شد');
    }

    public function show(Admin $admin)
    {
        $statuses = Constant::getActivityStatusesView();
        return view('admin.administrators.show', compact('admin', 'statuses'));

    }

    public function delete(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.admins.all');
    }

    public function getData()
    {
        $data = [
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
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
            $data['avatar'] = $this->upload(request()->file('avatar'), Constant::ADMINISTRATOR_AVATAR_PATH);
        }
        return $data;
    }

    private function validateUpdateAdmin(Request $request, Admin $admin)
    {
        $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'mobile' => [Rule::unique('admins', 'mobile')->ignore($admin)],
            'email' => [Rule::unique('admins', 'email')->ignore($admin)],
            'password' => ['confirmed'],
            'status' => ['required', Rule::in(['active', 'in-active'])],
        ], [
            'first_name.required' => 'وارد کردن نام الزامی است',
            'last_name.required' => 'وارد کردن نام خانوادگی الزامی است',
            'mobile.required' => 'وارد کردن شماره همراه الزامی است',
            'email.required' => 'وارد کردن پست الکترونیکی الزامی است',
            'password.required' => 'وارد کردن رمز عبور الزامی است',
            'password_confirmation.required' => 'وارد کردن رمز عبور الزامی است',
            'status.required' => 'انتخاب وضعیت الزامی است',
            'email.email' => 'ایمیل با فرمت معتبر وارد کنید',
            'email.unique' => 'این ایمیل قبلا ثبت شده است',
            'mobile.unique' => 'این شماره قبلا ثبت شده است',
            'mobile.numeric' => 'فقط عدد مجاز است',
            'password.confirmed' => 'رمز عبور با تکرار آن مطابقت ندارد',
        ]);
    }
}
