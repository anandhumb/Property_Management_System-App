<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use App\Models\PersonalAccessToken;


class PropertyController extends Controller
{
    public function createProperty(Request $request,Property $property,User $user ,PersonalAccessToken $token)
    {

        return  view('Admin.create-Property');
    }
  
public function store(Request $request,Property $property,$user_id)
{
    $request->validate([
        'property_name' => 'required|min:5|max:225',
        'upload_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    if ($request->hasFile('upload_image')) { 
        $upload_image = $request->file('upload_image');
        $path = $upload_image->storeAs('upload_image', time().'.'.$upload_image->extension(), 'public');
    } 
    $property = Property::create([
        'user_id' =>$user_id,
        'property_name' => $request->property_name,
        'status' => 'Pending',
        'upload_image' => $path ?? null, 
    ]);

    return redirect()->route('admin.view_properties')->with('status','Property_Added');
}

}
