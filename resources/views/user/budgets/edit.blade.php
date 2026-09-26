@extends('layouts.user-layout')
@section('title', 'Edit Budget')
@section('heading', 'Edit Budget')
@section('content')
    <div class="card-box form-card">
        <form method="POST" action="{{ url('/user/budgets/' . $budget->id) }}">
            @csrf @method('PUT')
            <label class="form-label">Category</label>
            <select name="category_id" class="form-select mb-3">
                @foreach ($categories as $category)
    <option value="{{ $category->id }}"
        @selected($budget->category_id == $category->id)>
        {{ $category->name }}
    </option>
@endforeach
            </select>
            <label class="form-label">Month</label>
            <input type="month"  value="{{ $budget->month }}"  name="month" class="form-control mb-3">
            <label class="form-label">Limit</label>
            <input type="number" name="limit_amount" value="{{ $budget->limit_amount }}" class="form-control">
            <button class="btn btn-primary mt-4">Update Budget</button>
        </form>
    </div>
@endsection
