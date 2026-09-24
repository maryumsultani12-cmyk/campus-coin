<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


//ADNIN ROUTES
Route::get('/admin-panel/index', function () {
    return view('admin-panel.index');
});

Route::get('/admin-panel/announcements' , function () {
    return view('.admin-panel.announcements');
});

Route::get('/admin-panel/category-management' , function () {
    return view('admin-panel.category-management');
});

Route::get('/admin-panel/register' , function () {
    return view('admin-panel.register');
});
Route::get('/admin-panel/settings' , function () {
    return view('admin-panel.settings');
});
Route::get('/admin-panel/users' , function () {
    return view('admin-panel.users');
});
Route::get('/admin-panel/profile' , function () {
    return view('admin-panel.profile');
});
Route::get('/admin-panel/users',[AdminController::class,'users'])->name('users');
Route::post('deleteUser', [AdminController::class, 'deleteUser'])->name('deleteUser');
Route::post('makeAdmin', [AdminController::class, 'makeAdmin'])->name('makeAdmin');
Route::post('/admin-panel/users/{id}', [AdminController::class, 'showUser'])->name('showUser');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
