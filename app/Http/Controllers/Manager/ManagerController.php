<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\Storage;


class ManagerController extends Controller
{
    public function index()
    {
        return view('manager.dashboard');
    }

    public function create()
    {
        return view('manager.add_property');
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

        return redirect()->route('manager.show')->with('status','Property_Added');
    }


    public function show(Property $properties)
    {

        $properties = Property::all();
        // return response()->json(['data' => $properties]);
        return view('manager.list_property',compact('properties'));
    }

    public function edit($property_id)
    {
        $property = Property::findOrfail($property_id);

        return view ('manager.edit_property',compact('property'));
    }

    public function update(Request $request,Property $property)
{
  
    if ($request->hasFile('upload_image')) { 
        $upload_image = $request->file('upload_image');
        $path = $upload_image->storeAs('upload_image', time() . '.' . $upload_image->getClientOriginalExtension(), 'public');
    }
$updates = ([
    'property_name' => $request->uproperty_name,
    'upload_image' => $path,
]);
$property->update($updates);
    return redirect()->route('manager.show')->with('status', 'Property Updated');
}


    public function destroy(Property $property)
    {

        $property->delete($property);
        return redirect()->route('manager.show')->with(
            'delete','Successfully Deleted'
        );
    }
}
