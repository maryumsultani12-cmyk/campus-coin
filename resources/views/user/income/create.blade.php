@extends('layouts.user-layout')
@section('title', 'Add Income')
@section('heading', 'Add Income')
@section('subtitle', 'Record money received from any source.')
@section('content')
    <div class="card-box form-card">
        <form method="POST" action="{{ url('/user/income') }}">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Income Source</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">Select source</option>
                        {{-- @foreach ($categories ?? [] as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach --}}
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Amount</label>
                    <input type="number" name="amount" class="form-control" min="0" step="0.01" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Date</label>
                    <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Recurring Income</label>
                    <select name="is_recurring" class="form-select">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="e.g. Monthly family allowance"></textarea>
                </div>
            </div>
            <div class="mt-4">
                <button class="btn btn-primary">Save Income</button>
                <a href="/user/income/index" class="btn btn-light ms-2">Cancel</a>
            </div>
        </form>
    </div>
@endsection
