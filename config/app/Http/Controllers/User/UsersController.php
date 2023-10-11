<?php

namespace App\Http\Controllers\User;

use App\Contants\Constant;
use App\Filters\UserFilter;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends BaseController
{

    public function edit(User $user)
    {
        $statuses= Constant::getActivityStatusesView();
        return view('user.users.edit', compact('user','statuses'));
    }

    public function update(Request $request, User $user)
    {
        // make data
        $data = $this->getData();
        $result = $user->update($data);
        if ($result) {
            return redirect()->route('user.users.show',$user)->with('success', 'با موفقیت ویرایش شد');
        }
        return back()->with('error', 'با خطا مواجه شد');
    }

    public function show(User $user)
    {
        $statuses= Constant::getActivityStatusesView();
        return view('user.users.show', compact('user','statuses'));
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
}
