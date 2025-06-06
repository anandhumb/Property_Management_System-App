<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // dd ($validator);
        $user = Auth::user();
        $token = $user->createToken('passToken',['*'], now()->addWeek())->accessToken;
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }else{
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 0])) {
        //     $user = Auth::user();
        //     // return response()->json($user);
        //     // dd($user);
        //     return redirect()->route('manager.dashboard')->with('status','Successfully LoggedIn');
        // }
        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1])) {
        //     return redirect()->route('admin.dashboard')->with('status','Successfully LoggedIn');
        //         // $token = $user->createToken('Laravel')->accessToken;

        //     // return response()->json(['token' => $token]);
        // }
  
    }

    public function logout(Request $request)
    {
        // $user = $request->user()->currentAccessToken();
        // dd($user);
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('index');
    }
}