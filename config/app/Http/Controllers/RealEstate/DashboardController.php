<?php

namespace App\Http\Controllers\RealEstate;

use App\Http\Controllers\Controller;
use App\Models\RealEstate;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(RealEstate $realEstate)
    {
        return view('real-estate.dashboard',compact('realEstate'));
    }
}
