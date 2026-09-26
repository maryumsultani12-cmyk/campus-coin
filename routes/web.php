<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\LoginResponse;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\BudgetController;




//ADNIN ROUTES
Route::get('/', function () {
    return view('auth.login');
});
//BUDGET
Route::get('/budget', [BudgetControlle::class, 'budget'])
    ->name('budget');

 Route::post('/budget', [BudgetControlle::class, 'budget'])
    ->name('budget');

//logout
Route::post('/logout', [LoginResponse::class, 'Logout'])
    ->name('logout');

use App\Http\Controllers\AdminController;


// ==================== ADMIN PANEL ==================== 

Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard.home');

Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/users/{user}', [AdminController::class, 'showUser'])->name('admin.users.show');
Route::patch('/users/{user}/status', [AdminController::class, 'toggleUserStatus'])->name('admin.users.toggle-status');
Route::post('/users/{user}/reset-password', [AdminController::class, 'resetUserPassword'])->name('admin.users.reset-password');
Route::patch('/users/{user}/role', [AdminController::class, 'toggleUserRole'])->name('admin.users.toggle-role');

Route::get('/categories', [AdminController::class, 'categories'])->name('admin.categories');
Route::post('/categories', [AdminController::class, 'storeCategory'])->name('admin.categories.store');
Route::get('/categories/{category}/edit', [AdminController::class, 'editCategory'])->name('admin.categories.edit');
Route::put('/categories/{category}', [AdminController::class, 'updateCategory'])->name('admin.categories.update');
Route::delete('/categories/{category}', [AdminController::class, 'destroyCategory'])->name('admin.categories.destroy');

Route::get('/announcements', [AdminController::class, 'announcements'])->name('admin.announcements');
Route::post('/announcements', [AdminController::class, 'storeAnnouncement'])->name('admin.announcements.store');
Route::get('/announcements/{announcement}/edit', [AdminController::class, 'editAnnouncement'])->name('admin.announcements.edit');
Route::put('/announcements/{announcement}', [AdminController::class, 'updateAnnouncement'])->name('admin.announcements.update');
Route::delete('/announcements/{announcement}', [AdminController::class, 'destroyAnnouncement'])->name('admin.announcements.destroy');
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
