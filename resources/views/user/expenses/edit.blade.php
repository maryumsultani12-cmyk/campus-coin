@extends('layouts.user-layout')
@section('title', 'Edit Expense')
@section('heading', 'Edit Expense')
@section('content')
    <div class="card-box form-card">
        <form method="POST" action="{{ url('/user/expenses/' . $expense->id) }}">@csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-6"><label class="form-label">Category</label><select name="category_id" class="form-select">
                        {{-- @foreach ($categories ?? [] as $category)
                            <option value="{{ $category->id }}" @selected($expense->category_id == $category->id)>{{ $category->name }}</option>
                        @endforeach --}}
                    </select></div>
                <div class="col-md-6">
                    <label class="form-label">Amount</label>
                    <input type="number" name="amount" value="{{ $expense->amount }}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Date</label>
                    <input type="date" name="date" value="{{ $expense->date }}" class="form-control" required>
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control">{{ $expense->description }}</textarea>
                </div>
            </div>
            <button class="btn btn-primary mt-4">Update Expense</button>
        </form>
    </div>
@endsection
