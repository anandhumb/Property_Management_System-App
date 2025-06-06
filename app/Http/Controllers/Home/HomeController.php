<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class HomeController extends Controller
{
    public function index(Property $properties)
    {
        $status = 1;
        $properties = Property::where('status',$status)->get();
        return view('Home.index',compact('properties'));
    }
}
