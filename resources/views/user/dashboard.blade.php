@extends('layouts.user-layout')
@section('title','Dashboard')
@section('heading','Dashboard')
@section('subtitle','Here is your financial overview for this month.')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div><h4 class="mb-1">Welcome back, {{ auth()->user()->name ?? 'Student' }} 👋</h4><p class="muted mb-0">Track your money and build better spending habits.</p></div>
    <div class="d-flex gap-2"><a href="/user/income/create" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Income</a><a href="/user/expenses/create" class="btn btn-outline-danger"><i class="bi bi-plus-lg"></i> Add Expense</a></div>
</div>
<div class="row g-3 mb-4">
    <div class="col-md-3"><div class="card-box"><div class="d-flex justify-content-between"><span class="stat-label">This Month Balance</span><span class="icon-box"><i class="bi bi-wallet2"></i></span></div><div class="stat-value">Rs. {{ number_format($balance ?? 0,2) }}</div></div></div>
    <div class="col-md-3"><div class="card-box"><div class="d-flex justify-content-between"><span class="stat-label">Total Income</span><span class="icon-box"><i class="bi bi-arrow-down-circle"></i></span></div><div class="stat-value green">Rs. {{ number_format($incomeTotal ?? 0,2) }}</div></div></div>
    <div class="col-md-3"><div class="card-box"><div class="d-flex justify-content-between"><span class="stat-label">Total Expenses</span><span class="icon-box"><i class="bi bi-arrow-up-circle"></i></span></div><div class="stat-value red">Rs. {{ number_format($expenseTotal ?? 0,2) }}</div></div></div>
    <div class="col-md-3"><div class="card-box"><div class="d-flex justify-content-between"><span class="stat-label">Savings Goal</span><span class="icon-box"><i class="bi bi-bullseye"></i></span></div><div class="stat-value">Rs. {{ number_format(auth()->user()->monthly_savings_goal ?? 0,2) }}</div></div></div>
</div>
<div class="row g-4">
    <div class="col-lg-8"><div class="card-box"><div class="section-title mb-3">Income vs Expenses</div><div class="chart-placeholder">Monthly chart will appear here from database data.</div></div></div>
    <div class="col-lg-4"><div class="card-box"><div class="section-title mb-3">Budget vs Actual</div>@forelse($budgets ?? [] as $budget)<div class="mb-3"><div class="d-flex justify-content-between small mb-1"><span>{{ $budget->category->name ?? 'Category' }}</span><span>Rs. {{ number_format($budget->spent ?? 0) }} / {{ number_format($budget->limit_amount) }}</span></div><div class="progress"><div class="progress-bar" style="width:{{ min(100,(($budget->spent ?? 0)/max(1,$budget->limit_amount))*100) }}%"></div></div></div>@empty<p class="muted mb-0">No budgets added yet.</p>@endforelse</div></div>
    <div class="col-lg-7"><div class="table-card"><div class="p-3 border-bottom section-title">Recent Transactions</div><div class="table-responsive"><table class="table"><thead><tr><th>Date</th><th>Description</th><th>Category</th><th>Amount</th></tr></thead><tbody>@forelse($transactions ?? [] as $transaction)<tr><td>{{ $transaction->date }}</td><td>{{ $transaction->description ?: '—' }}</td><td>{{ $transaction->category->name ?? '—' }}</td><td class="{{ $transaction->type === 'income' ? 'green' : 'red' }}">{{ $transaction->type === 'income' ? '+' : '-' }} Rs. {{ number_format($transaction->amount,2) }}</td></tr>@empty<tr><td colspan="4" class="empty">No transactions yet.</td></tr>@endforelse</tbody></table></div></div></div>
    <div class="col-lg-5"><div class="card-box tip"><div class="section-title mb-2"><i class="bi bi-lightbulb"></i> Saving Tip</div><p class="mb-0">{{ $latestInsight->tip_text ?? 'Start adding your income and expenses to receive personalized saving suggestions.' }}</p></div></div>
</div>
@endsection