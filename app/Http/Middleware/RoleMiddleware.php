<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 0])) {
            return redirect()->route('manager.dashboard')->with('status','Successfully LoggedIn');
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1])) {
            return redirect()->route('admin.dashboard')->with('status','Successfully LoggedIn');
        }
        else{
        // return response()->json(['error' => 'Unauthorized'], 403);
        abort(403);
        }
        return $next($request);
    }
}
