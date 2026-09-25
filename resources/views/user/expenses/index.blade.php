@extends('layouts.user-layout')
@section('title', 'Expenses')
@section('heading', 'Expenses')
@section('subtitle', 'See where your money is being spent.')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4>Expense Records</h4>
            <p class="muted mb-0">Track your student spending by category.</p>
        </div><a href="/user/expense/create" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Expense</a>
    </div>
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card-box"><span class="stat-label">Total Expenses</span>
                <div class="stat-value red">Rs. {{--{{ number_format($totalExpenses ?? 0, 2) }}--}}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box"><span class="stat-label">This Month</span>
                <div class="stat-value">Rs. {{--{{ number_format($monthlyExpenses ?? 0, 2) }}--}}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box"><span class="stat-label">Records</span>
                <div class="stat-value">{{--{{ $expenses->count() ?? 0 }}--}}</div>
            </div>
        </div>
    </div>
    <div class="table-card">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @forelse($expenses ?? [] as $expense)
                        <tr>
                            <td>{{ $expense->date }}</td>
                            <td>{{ $expense->category->name ?? '—' }}</td>
                            <td>{{ $expense->description ?: '—' }}</td>
                            <td class="red fw-bold">Rs. {{ number_format($expense->amount, 2) }}</td>
                            <td><a href="/user/expenses/edit/{{ $expense->id }}"
                                    class="btn btn-sm btn-outline-primary">Edit</a></td>
                    </tr>@empty<tr>
                            <td colspan="5" class="empty">No expense records found.</td>
                        </tr>
                    @endforelse --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
