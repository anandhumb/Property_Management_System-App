<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


Route::get('/user', function (Request $request){
    return $request->user(); 
})->middleware('auth:sanctum');

Route::get('/endpoint', [ApiController::class, 'apiView']);
Route::post('/apiregister', [ApiController::class, 'apiregister']);
Route::post('/api-login', [ApiController::class, 'apiLogin']);
Route::post('/api-logout', [ApiController::class, 'logout']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/apicreate-property', [ApiController::class, 'apistore']);
    Route::get('/apishow-property', [ApiController::class, 'apishow']);
    

});


