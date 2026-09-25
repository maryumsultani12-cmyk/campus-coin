<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


// ==================== ADMIN ROUTES ====================

Route::get('/admin-panel/index', [AdminController::class, 'index'])
    ->name('admin.dashboard');

Route::get('/admin-panel/announcements', function () {
    return view('admin-panel.announcements');
});

Route::get('/admin-panel/categories/{id}/edit', [adminController::class, 'editCategory'])
    ->name('admin.categories.edit');
Route::put('/admin-panel/categories/{id}', [adminController::class, 'updateCategory'])
    ->name('admin.categories.update');
Route::get('/admin-panel/category-management', [AdminController::class, 'categories'])
    ->name('admin.categories');
Route::post('/admin-panel/category-management', [AdminController::class, 'storeCategory'])
    ->name('admin.categories.store');
Route::delete('/admin-panel/categories/{id}', [adminController::class, 'deleteCategory'])
    ->name('admin.categories.delete');

Route::post('/admin-panel/announcements', [adminController::class, 'storeAnnouncement'])
    ->name('admin.announcements.store');
Route::get('/admin-panel/announcements', [adminController::class, 'announcements'])
    ->name('admin.announcements');
Route::get('/admin-panel/announcements/{id}/edit', [adminController::class, 'editAnnouncement'])
    ->name('admin.announcements.edit');
Route::put('/admin-panel/announcements/{id}', [adminController::class, 'updateAnnouncement'])
    ->name('admin.announcements.update');
Route::delete('/admin-panel/announcements/{id}', [adminController::class, 'deleteAnnouncement'])
    ->name('admin.announcements.delete');



Route::get('/admin-panel/register', function () {
    return view('admin-panel.register');
});

Route::get('/admin-panel/settings', function () {
    return view('admin-panel.settings');
});

Route::get('/admin-panel/users', [AdminController::class, 'users'])->name('users');

Route::get('/admin-panel/profile', function () {
    return view('admin-panel.profile');
});

// Route::post('deleteUser', [AdminController::class, 'deleteUser'])->name('deleteUser');
Route::post('/admin-panel/users/{id}/disable', [AdminController::class, 'disableUser'])
    ->name('admin.user.disable');
Route::post('makeAdmin', [AdminController::class, 'makeAdmin'])->name('makeAdmin');

Route::get('/admin-panel/users/{id}', [AdminController::class, 'viewUser'])
    ->name('admin.user.view');

// ==================== USER ROUTES ====================

Route::get('/user/dashboard', function () {
    return view('user.dashboard');
});

// Income
Route::get('/user/income/index', function () {
    return view('user.income.index');
});

Route::get('/user/income/create', function () {
    return view('user.income.create');
});

Route::get('/user/income/edit/{id}', function ($id) {
    return view('user.income.edit', compact('id'));
});

// Expense
Route::get('/user/expense/index', function () {
    return view('user.expenses.index');
});

Route::get('/user/expense/create', function () {
    return view('user.expenses.create');
});

Route::get('/user/expense/edit/{id}', function ($id) {
    return view('user.expenses.edit', compact('id'));
});

// Transactions
Route::get('/user/transactions/index', function () {
    return view('user.transactions.index');
});

// Budgets
Route::get('/user/budgets/index', function () {
    return view('user.budgets.index');
});

Route::get('/user/budgets/create', function () {
    return view('user.budgets.create');
});

Route::get('/user/budgets/edit/{id}', function ($id) {
    return view('user.budgets.edit', compact('id'));
});

// Categories
Route::get('/user/categories/index', function () {
    return view('user.categories.index');
});

Route::get('/user/categories/create', function () {
    return view('user.categories.create');
});

// Reports
Route::get('/user/reports/index', function () {
    return view('user.reports.index');
});

Route::get('/user/reports/month', function () {
    return view('user.reports.month');
});

Route::get('/user/reports/six-month', function () {
    return view('user.reports.six-month');
});

// Insights
Route::get('/user/insights/index', function () {
    return view('user.insights.index');
});

// Profile
Route::get('/user/profile/index', function () {
    return view('user.profile.index');
});


// ==================== AUTHENTICATED ROUTES ====================

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
