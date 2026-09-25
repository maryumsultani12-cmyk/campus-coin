@extends('layouts.admin-layout')
@section('content')
    <!-- Dashboard Body -->
    <div class="container-fluid p-4">

        <p class="text-muted">Welcome back, Admin! Here's what's happening with your platform.</p>

        <!-- 4 Top Cards -->
        <div class="row g-3 mb-4">
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card card-metric p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="metric-icon bg-primary-subtle text-primary">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <small class="text-muted">Total Users</small>
                            <h3 class="fw-bold mb-0">{{ $totalUsers }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card card-metric p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="metric-icon bg-success-subtle text-success">
                            <i class="bi bi-person-check"></i>
                        </div>
                        <div>
                            <small class="text-muted">Active Users</small>
                            <h3 class="fw-bold mb-0">{{ $activeUsers }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card card-metric p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="metric-icon bg-purple-subtle text-primary" style="background-color: #f3e8ff;">
                            <i class="bi bi-arrow-left-right"></i>
                        </div>
                        <div>
                            <small class="text-muted">Total Transactions</small>
                            <h3 class="fw-bold mb-0">{{ $totalTransactions }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card card-metric p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="metric-icon bg-warning-subtle text-warning">
                            <i class="bi bi-grid-fill"></i>
                        </div>
                        <div>
                            <small class="text-muted">Most Used Category</small>
                            <h5 class="fw-bold mb-0">{{ $mostUsedCategory?->transactions_count ?? 0 }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="row g-3 mb-4">
            <!-- Line Chart -->
            <div class="col-12 col-lg-8">
                <div class="card border-0 p-3 shadow-sm h-100">
                    <h6 class="fw-bold mb-3">Total Transactions (Last 7 Days)</h6>
                    <div style="position: relative; height: 260px;">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Doughnut Chart -->
            <div class="col-12 col-lg-4">
                <div class="card border-0 p-3 shadow-sm h-100">
                    <h6 class="fw-bold mb-3">Expense Categories</h6>
                    <div style="position: relative; height: 220px;" class="d-flex justify-content-center">
                        <canvas id="doughnutChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Users Table -->
        <div class="card border-0 shadow-sm p-3 mb-4">
            <h6 class="fw-bold mb-3">Recent Users</h6>
            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registration Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentUsers as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle me-2 bg-primary">{{ strtoupper(substr($user->name, 0, 2)) }}</div>
                                        {{ $user->name }}
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('M d, Y') }}</td>
                                <td>
                                    <span class="badge badge-soft-success rounded-pill px-3 py-1">Active</span>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-link text-decoration-none">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
