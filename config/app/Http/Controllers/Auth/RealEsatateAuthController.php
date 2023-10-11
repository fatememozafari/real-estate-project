<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\RealEstate;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Testing\Fluent\Concerns\Has;

class RealEsatateAuthController extends Controller
{

    public function login(Request $request, RealEstate $realEstate)
    {

        return redirect()->route('real-estate.dashboard', compact('realEstate'));
    }


    public function logout(RealEstate $realEstate)
    {
        Auth::logout();
        return redirect()->route('user.login');
    }

}
