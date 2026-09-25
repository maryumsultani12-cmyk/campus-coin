@extends('layouts.user-layout')
@section('title', 'Add Category')
@section('heading', 'Add Category')
@section('content')
    <div class="card-box form-card">
        <form method="POST" action="{{ url('/user/categories') }}">
            @csrf
            <label class="form-label">Category Name</label>
            <input name="name" class="form-control mb-3" required placeholder="e.g. Freelance">
            <label class="form-label">Type</label>
            <select name="type" class="form-select">
                <option value="income">Income</option>
                <option value="expense">Expense</option>
            </select>
            <button class="btn btn-primary mt-4">Save Category</button>
        </form>
    </div>
@endsection
