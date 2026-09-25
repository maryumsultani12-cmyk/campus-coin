@extends('layouts.user-layout')
@section('title', 'Reports')
@section('heading', 'Reports')
@section('subtitle', 'Understand your spending patterns over time.')
@section('content')
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card-box h-100">
                <div class="icon-box mb-3"><i class="bi bi-calendar-month"></i></div>
                <h5>Monthly Report</h5>
                <p class="muted">View category-wise spending, income vs expense and daily/weekly summaries.</p><a
                    href="/user/reports/monthly" class="btn btn-primary">Open Monthly Report</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-box h-100">
                <div class="icon-box mb-3"><i class="bi bi-bar-chart-line"></i></div>
                <h5>Six-Month Report</h5>
                <p class="muted">Compare your income and expenses across the last six months.</p><a
                    href="/user/reports/six-month" class="btn btn-primary">Open Six-Month Report</a>
            </div>
        </div>
    </div>
@endsection
