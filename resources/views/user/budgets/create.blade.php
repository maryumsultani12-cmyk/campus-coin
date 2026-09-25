@extends('layouts.user-layout')
@section('title', 'Add Budget')
@section('heading', 'Add Budget')
@section('content')
    <div class="card-box form-card">
        <form method="POST" action="{{ url('/user/budgets') }}">@csrf<label class="form-label">Expense Category</label><select
                name="category_id" class="form-select mb-3" required>
                {{-- @foreach ($categories ?? [] as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach --}}
            </select>
            <label class="form-label">Month</label>
            <input type="month" name="month" class="form-control mb-3" required>
            <label class="form-label">Budget Limit</label>
            <input type="number" name="limit_amount" class="form-control" min="0" step="0.01" required>
            <button class="btn btn-primary mt-4">Save Budget</button>
        </form>
    </div>
@endsection
