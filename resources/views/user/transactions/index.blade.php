@extends('layouts.user-layout')
@section('title', 'Transactions')
@section('heading', 'Transactions')
@section('subtitle', 'Complete history of your income and expenses.')
@section('content')
    <form class="filter-row mb-4" method="GET">
        <div class="row g-2">
            <div class="col-md-3"><input type="date" name="from" class="form-control" value="{{ request('from') }}"></div>
            <div class="col-md-3"><input type="date" name="to" class="form-control" value="{{ request('to') }}"></div>
            <div class="col-md-3"><select name="type" class="form-select">
                    <option value="">All Types</option>
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select></div>
            <div class="col-md-3"><button class="btn btn-primary w-100">Filter</button></div>
        </div>
    </form>
    <div class="table-card">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions ?? [] as $transaction)
                        <tr>
                            <td>{{ $transaction->date }}</td>
                            <td>{{ $transaction->description ?: '—' }}</td>
                            <td>{{ $transaction->category->name ?? '—' }}</td>
                            <td><span
                                    class="badge {{ $transaction->type === 'income' ? 'text-bg-success' : 'text-bg-danger' }}">{{ ucfirst($transaction->type) }}</span>
                            </td>
                            <td class="fw-bold">Rs. {{ number_format($transaction->amount, 2) }}</td>
                            <td><a href="{{ $transaction->type === 'income' ? '/user/income/edit/' . $transaction->id : '/user/expenses/edit/' . $transaction->id }}"
                                    class="btn btn-sm btn-outline-primary">Edit</a></td>
                    </tr>@empty<tr>
                            <td colspan="6" class="empty">No transactions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
