@extends('layouts.user-layout')
@section('title', 'Six-Month Report')
@section('heading', 'Six-Month Report')
@section('subtitle', 'Compare your financial activity across the last six months.')
@section('content')
    <div class="card-box mb-4">
        <div class="section-title mb-3">Six-Month Income vs Expense</div>
        <div class="chart-placeholder">Six-month trend chart</div>
    </div>
    <div class="table-card">
        <table class="table">
            <thead>
                <tr>
                    <th>Month</th>
                    <th>Income</th>
                    <th>Expenses</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>
                {{-- @forelse($months ?? [] as $month)
                    <tr>
                        <td>{{ $month['name'] }}</td>
                        <td class="green">Rs. {{ number_format($month['income'], 2) }}</td>
                        <td class="red">Rs. {{ number_format($month['expense'], 2) }}</td>
                        <td>Rs. {{ number_format($month['balance'], 2) }}</td>
                </tr>@empty<tr>
                        <td colspan="4" class="empty">No six-month data available.</td>
                    </tr>
                @endforelse --}}
            </tbody>
        </table>
    </div>
@endsection
