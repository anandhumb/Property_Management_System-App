<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Auth\registrationController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\UserAuthentication;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\PropertyController;

Route::get('/', function () {
    return view('');
});

require __DIR__.'/api.php';

Route::get('/index', [HomeController::class, 'index'])->name('index');

Route::get('/Properties', [HomeController::class, 'show']);

Route::get('/create_Property', [PropertyController::class, 'createProperty'])->middleware('abilities');
Route::post('/create_Property/{id}', [PropertyController::class, 'store'])->name('store');

Route::get('/register', [registrationController::class, 'register'])->middleware('integrity');
Route::post('/register', [registrationController::class, 'register_action'])->name('register')->middleware('form');

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login')->middleware('role');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard')->middleware('auth');
    Route::get('/show-property', [AdminController::class, 'show']);
    Route::get('/view_properties', [AdminController::class, 'view'])->name('view_properties');
    Route::post('approve/{property}', [AdminController::class, 'approveProperty'])->name('approve');
    Route::post('reject/{property}', [AdminController::class, 'rejectProperty'])->name('reject');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('/token', [AdminController::class, 'token'])->name('token');
})->middleware('auth','role');

Route::prefix('/manager')->name('manager.')->group(function () {
    Route::get('/dashboard', [ManagerController::class, 'index'])->name('dashboard')->middleware('auth');

    Route::get('/add', [ManagerController::class, 'create'])->name('add');
    Route::post('/{user_id}', [ManagerController::class, 'store'])->name('store'); 

    Route::get('/', [ManagerController::class, 'show'])->name('show');

    Route::get('edit/{property}', [ManagerController::class, 'edit'])->name('edit');
    Route::put('/{property}', [ManagerController::class, 'update'])->name('update');
    
    Route::delete('/{property}', [ManagerController::class, 'destroy'])->name('delete');
})->middleware('auth');

