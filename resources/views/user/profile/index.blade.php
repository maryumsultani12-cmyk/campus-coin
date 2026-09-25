@extends('layouts.user-layout')
@section('title', 'Profile')
@section('heading', 'Profile')
@section('subtitle', 'Manage your CampusCoin account and savings goal.')
@section('content')
    <div class="card-box form-card">
        <form method="POST" action="{{ url('/user/profile') }}">@csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-6"><label class="form-label">Name</label><input name="name"
                        value="{{ auth()->user()->name }}" class="form-control" required></div>
                <div class="col-md-6"><label class="form-label">Email</label><input value="{{ auth()->user()->email }}"
                        class="form-control" disabled></div>
                <div class="col-md-6"><label class="form-label">Academic Year</label><input name="academic_year"
                        value="{{ auth()->user()->academic_year }}" class="form-control"></div>
                <div class="col-md-6"><label class="form-label">Monthly Allowance Baseline</label><input type="number"
                        name="monthly_allowance" value="{{ auth()->user()->monthly_allowance ?? '' }}" class="form-control">
                </div>
                <div class="col-md-6"><label class="form-label">Monthly Savings Goal</label><input type="number"
                        name="monthly_savings_goal" value="{{ auth()->user()->monthly_savings_goal ?? '' }}"
                        class="form-control"></div>
            </div><button class="btn btn-primary mt-4">Update Profile</button>
        </form>
    </div>
@endsection
