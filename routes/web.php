<?php

use Illuminate\Support\Facades\Route;

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

// Saving Tips
Route::get('/user/insights/index', function () {
    return view('user.insights.index');
});

// Profile
Route::get('/user/profile/index', function () {
    return view('user.profile.index');
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
