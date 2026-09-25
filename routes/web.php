<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\LoginResponse;
use App\Http\Controllers\GoogleController;



//ADNIN ROUTES
Route::get('/', function () {
    return view('auth.login');
});

//logout
Route::post('/logout', [LoginResponse::class, 'Logout'])
    ->name('logout');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

 Route::get('/admin-role', function () {
        return view('admin');
    })->middleware('role:admin');

    Route::get('/user-role', function () {
        return view('user');
    })->middleware('role:user');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
// Google Authentication
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);

Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);