@extends('layouts.user-layout')
@section('title', 'Add Expense')
@section('heading', 'Add Expense')
@section('subtitle', 'Record where you spent your money.')
@section('content')
    <div class="card-box form-card">
        <form method="POST" action="{{ url('/user/expenses') }}">@csrf
            <div class="row g-3">
                <div class="col-md-6"><label class="form-label">Expense Category</label><select name="category_id"
                        class="form-select" required>
                        <option value="">Select category</option>
                        {{-- @foreach ($categories ?? [] as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach --}}
                    </select></div>
                <div class="col-md-6">
                    <label class="form-label">Amount</label>
                    <input type="number" name="amount" class="form-control" min="0" step="0.01" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Date</label>
                    <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Recurring Expense</label>
                    <select name="is_recurring" class="form-select">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="e.g. Lunch at campus cafe"></textarea>
                </div>
            </div>
            <button class="btn btn-primary mt-4">Save Expense</button>
            <a href="/user/expense/index" class="btn btn-light mt-4 ms-2">Cancel</a>
        </form>
    </div>
@endsection
