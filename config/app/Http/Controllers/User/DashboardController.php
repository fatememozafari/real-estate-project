<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\RealEstate;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(User $user,RealEstate $realEstate)
    {
       $realEstates=RealEstate::with(['users'])->where('user_id',auth()->id())->get();
        return view('user.dashboard',compact('user', 'realEstates'));
    }
}
