<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\LoginResponse;
use App\Http\Controllers\GoogleController;



//ADNIN ROUTES
Route::get('/', function () {
    return view('admin-panel.index');
});

Route::get('/admin-panel/calendar' , function () {
    return view('.admin-panel.calendar');
});

Route::get('/admin-panel/forms' , function () {
    return view('admin-panel.forms');
});

Route::get('/admin-panel/icons' , function () {
    return view('admin-panel.icons');
});

Route::get('/admin-panel/login' , function () {
    return view('admin-panel.login');
});

Route::get('/admin-panel/profile' , function () {
    return view('admin-panel.profile');
});

Route::get('/admin-panel/register' , function () {
    return view('admin-panel.register');
});

Route::get('/admin-panel/reset-password' , function () {
    return view('admin-panel.reset-password');
});

Route::get('/admin-panel/tables' , function () {
    return view('admin-panel.tables');
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