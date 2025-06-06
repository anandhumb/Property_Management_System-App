<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class registrationController extends Controller
{
    public function register()
    {
        return view ('Auth.register');
    }
        public function register_action(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|alpha_num|min:5',
            'password_confirmation' => 'required|alpha_num|min:5',
        ]
     );
    
         if($validator->fails()){
             return response()->json(["validattion_errors"=>$validator->errors()]);
         }
         $string = Str::random(40);
         $dataArray = array(
             "name"=>$request->name,
             "email"=>$request->email,
             'email_verified_at' =>now(),
             "password"=>bcrypt($request->password),
             "password_confirmation"=>bcrypt($request->password_confirmation),
             "role" => 0,
             "remember_token"=>"laravel",
         );
    
         
    // dd($dataArray);
    
         $user = User::Create($dataArray);
         $token = $user->createToken('passToken',['*'], now()->addWeek())->accessToken;
         $user->remember_token = $token;
         return redirect()->route('index')->with('status','successfully Registered');
        // }else {
        //     return response()->json([ "success" => false, "message" => "User not created"]);
        // }
        //  dd($user);
        // return response()->json('$user ');
        //  $token = $user->createToken('Laravel')->accessToken;
        // //  dd($token);
        // return response()->json($token);
        //  if(!is_null($user)){
        //      return response()->json([ "success" => true, "data" => $user],
        //      ['token' => $token]
        //     );
   
}
}