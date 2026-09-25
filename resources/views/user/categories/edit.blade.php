@extends('layouts.user-layout')
@section('title', 'Edit Category')
@section('heading', 'Edit Category')
@section('content')
    <div class="card-box form-card">
        <form method="POST" action="{{ url('/user/categories/' . $category->id) }}">
            @csrf @method('PUT')
            <label class="form-label">Category Name</label>
            <input name="name" value="{{ $category->name }}" class="form-control mb-3" required>
            <label class="form-label">Type</label>
            <select name="type" class="form-select">
                <option value="income" @selected($category->type === 'income')>Income</option>
                <option value="expense" @selected($category->type === 'expense')>Expense</option>
            </select>
            <button class="btn btn-primary mt-4">Update Category</button>
        </form>
    </div>
@endsection
