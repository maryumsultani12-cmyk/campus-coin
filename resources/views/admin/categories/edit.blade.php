@extends('layouts.admin-layout')
@section('title', 'Campus Coin | Edit Category')
@section('content')
    <div class="admin-page-head">
        <div>
            <h1>Edit Category</h1>
            <p>Update a system default category.</p>
        </div><a class="btn btn-light" href="{{ route('admin.categories') }}">← Back</a>
    </div>
    <div class="admin-card">
        <div class="admin-card-body">
            <form method="POST" action="{{ route('admin.categories.update', $category) }}">
                @csrf @method('PUT')
                <div class="form-grid">
                    <div class="form-group"><label class="form-label">Category Name</label><input class="form-control"
                            name="name" value="{{ old('name', $category->name) }}" required></div>
                    <div class="form-group"><label class="form-label">Type</label><select class="form-select" name="type"
                            required>
                            <option value="income" @selected(old('type', $category->type) === 'income')>Income</option>
                            <option value="expense" @selected(old('type', $category->type) === 'expense')>Expense</option>
                        </select></div>
                </div>
                <div style="display:flex;justify-content:flex-end;gap:8px;"><a class="btn btn-light"
                        href="{{ route('admin.categories') }}">Cancel</a><button class="btn btn-primary" type="submit">Save
                        Changes</button></div>
            </form>
        </div>
    </div>
@endsection
