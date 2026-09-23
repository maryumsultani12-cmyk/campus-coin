<?php

use Illuminate\Support\Facades\Route;


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
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
