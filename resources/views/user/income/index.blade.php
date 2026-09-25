@extends('layouts.user-layout')
@section('title', 'Income')
@section('heading', 'Income')
@section('subtitle', 'Manage all money received from your income sources.')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4>Income Records</h4>
            <p class="muted mb-0">Allowance, jobs, scholarships, gifts and other income.</p>
        </div><a href="/user/income/create" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Income</a>
    </div>
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card-box"><span class="stat-label">Total Income</span>
                <div class="stat-value green">Rs. {{--{{ number_format($totalIncome ?? 0, 2) }}--}}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box"><span class="stat-label">This Month</span>
                <div class="stat-value">Rs. {{--{{ number_format($monthlyIncome ?? 0, 2) }}--}}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box"><span class="stat-label">Records</span>
                <div class="stat-value">{{--{{ $incomes->count() ?? 0 }}--}}</div>
            </div>
        </div>
    </div>
    <div class="table-card">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Source</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Recurring</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @forelse($incomes ?? [] as $income)
                        <tr>
                            <td>{{ $income->date }}</td>
                            <td>{{ $income->category->name ?? '—' }}</td>
                            <td>{{ $income->description ?: '—' }}</td>
                            <td class="green fw-bold">Rs. {{ number_format($income->amount, 2) }}</td>
                            <td>{{ $income->is_recurring ? 'Yes' : 'No' }}</td>
                            <td><a href="/user/income/edit/{{ $income->id }}"
                                    class="btn btn-sm btn-outline-primary">Edit</a></td>
                    </tr>@empty<tr>
                            <td colspan="6" class="empty">No income records found.</td>
                        </tr>
                    @endforelse --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
