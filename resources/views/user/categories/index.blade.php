@extends('layouts.user-layout')
@section('title', 'Categories')
@section('heading', 'Categories')
@section('subtitle', 'Manage your personal income and expense categories.')
@section('content')
    <div class="d-flex justify-content-end mb-4">
        <a href="/user/categories/create" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Category</a>
    </div>
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card-box">
                <div class="section-title mb-3">Income Categories</div>
                {{-- @forelse(($incomeCategories ?? []) as $category)
                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <span>{{ $category->name }}</span><a href="/user/categories/edit/{{ $category->id }}"
                        class="btn btn-sm btn-light">Edit</a></div>@empty<p class="muted">No income categories.</p>
                @endforelse --}}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card-box">
                <div class="section-title mb-3">Expense Categories</div>
                {{-- @forelse(($expenseCategories ?? []) as $category)
                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <span>{{ $category->name }}</span><a href="/user/categories/edit/{{ $category->id }}"
                        class="btn btn-sm btn-light">Edit</a></div>@empty<p class="muted">No expense categories.</p>
                @endforelse --}}
            </div>
        </div>
    </div>
@endsection
