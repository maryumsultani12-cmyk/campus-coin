@extends('layouts.user-layout')
@section('title', 'Monthly Report')
@section('heading', 'Monthly Report')
@section('content')
    <div class="filter-row mb-4">
        <form class="row g-2">
            <div class="col-md-4"><input type="month" name="month" class="form-control"
                    value="{{ request('month', date('Y-m')) }}"></div>
            <div class="col-md-4"><select name="category_id" class="form-select">
                    <option value="">All Categories</option>
                    {{-- @foreach ($categories ?? [] as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach --}}
                </select>
            </div>
            <div class="col-md-4"><button class="btn btn-primary w-100">Generate</button></div>
        </form>
    </div>
    <div class="row g-4">
        <div class="col-lg-7">
            <div class="card-box">
                <div class="section-title mb-3">Income vs Expense</div>
                <div class="chart-placeholder">Monthly report chart</div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card-box">
                <div class="section-title mb-3">Category Spending</div>
                {{-- @forelse($categoryTotals ?? [] as $row)
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span>{{ $row->category->name ?? 'Category' }}</span><strong>Rs.
                        {{ number_format($row->total, 2) }}</strong></div>@empty<p class="muted">No report data
                        available.</p>
                @endforelse --}}
            </div>
        </div>
    </div>
@endsection
