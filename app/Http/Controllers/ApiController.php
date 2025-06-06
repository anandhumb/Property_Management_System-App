<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use Laravel\Sanctum\PersonalAccessToken;

class ApiController extends BaseController
{
    public function apiView()
    {
        $status = 1;
        $properties = Property::where('status',$status)->get();
        return response()->json([
            'Properties' => $properties , 
            'OK' => 200 , 
            'success' => true,
        ]);
        // abort(200);
    }


    public function apiregister(Request $request, User $user)
    {
        $validator = Validator::make($request->all(),
            [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|alpha_num|min:5',
         
            ]
        );

        if($validator->fails()){
                return response()->json(["validattion_errors"=>$validator->errors()]);
            }
            $string = Str::random(40);
            
            $dataArray = array(
            "name"=>$request->name,
            "email"=>$request->email,
            'email_verified_at' => now(),
            "password"=>bcrypt($request->password),
            "role" => 0,
            "remember_token"=>" $string",
        );
        // dd($dataArray);
            $passToken = "tokenApp";
            // $passToken = $request->header('Authorization');
            $duplicate = User::where('email', $request->email)->first();
        //    dd($duplicate);
            if($duplicate)
            {
                return response()->json('Record Already Exist !!');
            }
            $user = User::firstOrCreate($dataArray);
            $success['token'] = $user->createToken($passToken, ['property:create'])->plainTextToken;
            $success['name '] =  $user->name;
            return response()->json([
                'data'          => $user,
                'passToken'  => $success,     
        ]);
    }

    // api login

    public function apiLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',    
        ]);
      
        // $token_id = auth()->user()->id;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 0])) {
            $passToken = $request->header('Authorization');
            // $passToken = "tokenApp";         
            $user = Auth::user();        
            // $success['token'] = $user->createToken($passToken);
            // $success['name '] =  $user->name;
            return response()->json([
                'data'          => $user,
                'token' => $passToken,
                // 'token_type'    => $success
            ]);
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1])) {
            $passToken = "tokenApp";         
            $user = Auth::user();        
            // $success['token'] = $user->createToken($passToken);
            // $success['name'] =  $user->name;
            return response()->json([
                'data'          => $user,
                // 'token' => $success,
                // 'token_type'    => 'Bearer'
            ]);
        }
     
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }else{
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }

    // api logout
    // public function logout(Request $request,User $user)
    // {
    //     // Delete old tokens
    //     auth()->user()->tokens()->delete();
    //     {
    //         $request->user()->currentAccessToken()->delete();
    
    //         return response()->json(['message' => 'Logged out successfully']);
    //     }
    // }


    /* api add property using api token created by user*/

    public function apistore(Request $request,Property $property,User $user)
    {
        // $admin = $user->find($request->user_id);
        $validator = Validator::make($request->all(),
        [
            'property_name' => 'required|min:5|max:225',
            'upload_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if($validator->fails()){
            return response()->json(["validattion_errors"=>$validator->errors()]);
        }
             $upload_image = $request->file('upload_image');
            $path = $upload_image->storeAs('upload_image', time().'.'.$upload_image->extension(), 'public');
            // $token = $request->header('Authorization');
            // $token = str_replace('Bearer ', '', $token);
            // $parts = explode('|', $token);
            // $token_id = $parts[0];
            // dd($token_id);
        $token_id = auth()->user()->id;

        $dataArray = array(
            'user_id' => $token_id,
            'author' => $request->author,
            "property_name"=>$request->property_name,
            "upload_image"=>$path,
            'status' => '0',
        );
           $property = Property::Create($dataArray);

        return response()->json([
            'Properties' => $property, 
            'OK' => 200 , 
            'success' => true,
        ]);
    }

/* show the user created token using token id */

    public function apishow()
    {

        $user_id = auth()->user()->id;

        $property = Property::where('user_id', $user_id)->get();
        if ($property->isEmpty()) 
        {
            return response()->json('Property not found.');
        }
        else
        {
            return response()->json([
                'property' => $property]);
        }
       
    }
}