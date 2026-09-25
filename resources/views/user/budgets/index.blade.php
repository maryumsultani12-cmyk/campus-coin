@extends('layouts.user-layout')
@section('title', 'Budgets')
@section('heading', 'Budgets')
@section('subtitle', 'Set monthly limits and monitor your spending.')
@section('content')
    <div class="d-flex justify-content-between mb-4">
        <div>
            <h4>Monthly Budgets</h4>
        </div><a href="/user/budgets/create" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Budget</a>
    </div>
    <div class="row g-3">
         @forelse($budgets ?? [] as $budget)
            <div class="col-lg-6">
                <div class="card-box">
                    <div class="d-flex justify-content-between">
                        <div><strong>{{ $budget->category->name ?? 'Category' }}</strong>
                            <div class="muted">{{ $budget->month }}</div>
                        </div><a href="/user/budgets/edit/{{ $budget->id }}">Edit</a>
                    </div>
                    <div class="d-flex justify-content-between mt-4 mb-2"><span>Spent: Rs.
                            {{ number_format($budget->spent ?? 0, 2) }}</span><span>Limit: Rs.
                            {{ number_format($budget->limit_amount, 2) }}</span></div>
                    <div class="progress">
                        <div class="progress-bar"
                            style="width:{{ min(100, (($budget->spent ?? 0) / max(1, $budget->limit_amount)) * 100) }}%"></div>
                    </div>
                </div>
        </div>@empty<div class="col-12">
                <div class="card-box empty">No budgets created yet.</div>
            </div>
        @endforelse
    </div>
@endsection
