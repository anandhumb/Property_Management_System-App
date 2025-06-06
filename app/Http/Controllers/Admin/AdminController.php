<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use Illuminate\Support\Str;

class AdminController 
{
    public function index()
    {
        // dd();
        return view ('Admin.dashboard');
    }
    public function view(Property $properties)
    {
        $properties = Property::all();
        return view('Admin.view_properties',compact('properties'));
    }

    public function show(Property $properties)
    {
        $properties = Property::all();

        return view('Admin.list',compact('properties'));
    }

    public function approveProperty($property)
    {
        // Try to find the property by ID
        $status = Property::findOrFail($property); // If property is not found, it will throw a 404 error.
    
        // Set the status to 'approved' (or 1, depending on your database logic)
        $status->status = 1;
        $status->save();
    
        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Property approved successfully!'
        ]);
    }
    
    public function rejectProperty($property)
    {
        // Try to find the property by ID
        $status = Property::findOrFail($property); // If property is not found, it will throw a 404 error.
    
        // Set the status to 'rejected' (or 0, depending on your database logic)
        $status->status = 0;
        $status->save();
    
        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Property rejected successfully!'
        ]);
    }


    public function profile()
    {
        return view('Admin.profile');
    }
    
    public function token(Request $request,User $user)
    {
        $string = 'admin_token';
        $user = Auth::user(); 
        $success['token'] = $user->createToken($string, ['property:create']);
        $success['name'] =  $user->name;
        return response()->json([
             'token' => $success->plainTextToken,
            'success' => true,  // or false if an error occurred
            'message' => 'Token updated successfully! ',
        ]);
    }
    
}
