<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.admin.sign-in');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $this->getCredentialData();


        $result = Auth::guard('admin')->attempt($credentials);

       // dd(\auth()->guard('admin')->check());

        if ($result) {
            return redirect()->route('admin.dashboard');
        }
        return back()->with('error', 'نام کاربری یا کلمه عبور اشتباه است');
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
        \session()->regenerate();
        Session::flush();
        return redirect('/');
    }

    public function signUpForm()
    {
        return view('auth.admin.sign-up');
    }

    public function resetPassForm()
    {
        return view('auth.admin.reset-password');
    }

    public function twoStepForm()
    {
        return view('auth.admin.two-step');
    }

}
