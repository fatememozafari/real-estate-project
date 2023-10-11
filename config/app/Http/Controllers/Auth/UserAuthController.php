<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.user.sign-in');
    }

    public function login(LoginRequest $request,User $user)
    {

        // find user
        $user = User::where('email', $request->input('email'))->first();

        if ($user instanceof User) {

            // check password
            if (Hash::check($request->input('password'), $user['password'])) {

                // login user
                Auth::login($user);

                // redirect to dashboard
                return redirect()->route('user.dashboard',$user);
//                return redirect()->route('user.dashboard',$user->realEstates);

            }
        }

        return redirect()->back()->with('error', 'نام کاربری یا کلمه عبور اشتباه است');

//        $checkUser = User::where('email', request('email'))
//            ->where('password', Hash::check(request('password'), 'password'))
//            ->first();
//
//        $staff = Staff::find($checkUser->id);
//
//        if ($staff) {
//            \auth('real-estate')->login();
//            return redirect('/real-estate/dashboard');
//        }
    }

    public function getCredentialData()
    {
        return [
            'email' => request('email'),
            'password' => request('password'),
        ];
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login.form');
    }

    public function signUpForm()
    {
        return view('auth.user.sign-up');
    }

    public function resetPassForm()
    {
        return view('auth.user.reset-password');
    }

    public function twoStepForm()
    {
        return view('auth.user.two-step');
    }
}
