@extends('layouts.admin-layout')
@section('title', 'Campus Coin | Admin Dashboard')
@section('content')
    <div class="admin-page-head">
        <div>
            <h1>Dashboard</h1>
            <p>System-wide overview of Campus Coin usage and activity.</p>
        </div>
    </div>

    <div class="admin-grid admin-grid-4" style="margin-bottom:16px;">
        <div class="admin-card stat-card">
            <div class="stat-icon stat-blue">U</div>
            <div><span class="stat-label">Total Users</span>
                <h2 class="stat-value">{{ number_format($totalUsers) }}</h2><span class="stat-note">Registered accounts</span>
            </div>
        </div>
        <div class="admin-card stat-card">
            <div class="stat-icon stat-green">A</div>
            <div><span class="stat-label">Active Students</span>
                <h2 class="stat-value">{{ number_format($activeUsers) }}</h2><span class="stat-note">Currently active</span>
            </div>
        </div>
        <div class="admin-card stat-card">
            <div class="stat-icon stat-purple">T</div>
            <div><span class="stat-label">Transactions</span>
                <h2 class="stat-value">{{ number_format($totalTransactions) }}</h2><span class="stat-note">Income and
                    expenses</span>
            </div>
        </div>
        <div class="admin-card stat-card">
            <div class="stat-icon stat-orange">C</div>
            <div><span class="stat-label">Default Categories</span>
                <h2 class="stat-value">{{ number_format($totalCategories) }}</h2><span class="stat-note">System
                    categories</span>
            </div>
        </div>
    </div>

    <div class="admin-grid admin-grid-4" style="margin-bottom:16px;">
        <div class="admin-card stat-card">
            <div class="stat-icon stat-cyan">B</div>
            <div><span class="stat-label">Budgets</span>
                <h2 class="stat-value">{{ number_format($totalBudgets) }}</h2><span class="stat-note">Budget records</span>
            </div>
        </div>
        <div class="admin-card stat-card">
            <div class="stat-icon stat-purple">I</div>
            <div><span class="stat-label">Insights</span>
                <h2 class="stat-value">{{ number_format($totalInsights) }}</h2><span class="stat-note">Generated
                    insights</span>
            </div>
        </div>
        <div class="admin-card stat-card">
            <div class="stat-icon stat-green">+</div>
            <div><span class="stat-label">Total Income</span>
                <h2 class="stat-value">{{ number_format($totalIncome, 2) }}</h2><span class="stat-note">All recorded
                    income</span>
            </div>
        </div>
        <div class="admin-card stat-card">
            <div class="stat-icon stat-orange">−</div>
            <div><span class="stat-label">Total Expenses</span>
                <h2 class="stat-value">{{ number_format($totalExpense, 2) }}</h2><span class="stat-note">All recorded
                    expenses</span>
            </div>
        </div>
    </div>

    <div class="admin-grid admin-grid-main" style="margin-bottom:16px;">
        <div class="admin-card">
            <div class="admin-card-header">
                <h2>Transactions — Last 7 Days</h2>
            </div>
            <div class="admin-card-body">
                <div class="chart-box"><canvas id="transactionChart"></canvas></div>
            </div>
        </div>
        <div class="admin-card">
            <div class="admin-card-header">
                <h2>Expense Categories</h2>
            </div>
            <div class="admin-card-body">
                @forelse($expenseCategories as $item)
                    <div class="category-row" style="margin-bottom:14px;">
                        <div><strong
                                style="font-size:13px;">{{ $item->category?->name ?? 'Uncategorized' }}</strong><br><small>{{ number_format($item->total, 2) }}</small>
                        </div>
                        <strong style="font-size:12px;">{{ $item->percentage }}%</strong>
                        <div style="grid-column:1/-1;">
                            <div class="progress"><span style="width:{{ $item->percentage }}%"></span></div>
                        </div>
                    </div>
                @empty
                    <div class="empty">No expense transactions yet.</div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="admin-grid admin-grid-main">
        <div class="admin-card">
            <div class="admin-card-header">
                <h2>Recent Users</h2><a class="btn btn-soft btn-sm" href="{{ route('admin.users') }}">View all</a>
            </div>
            <div class="table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Joined</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentUsers as $user)
                            <tr>
                                <td><strong>{{ $user->name }}</strong></td>
                                <td>{{ $user->email }}</td>
                                <td><span
                                        class="badge {{ $user->role === 'admin' ? 'badge-purple' : 'badge-info' }}">{{ ucfirst($user->role) }}</span>
                                </td>
                                <td><span
                                        class="badge {{ $user->status === 'active' ? 'badge-success' : 'badge-danger' }}">{{ ucfirst($user->status) }}</span>
                                </td>
                                <td>{{ $user->created_at?->format('M d, Y') }}</td>
                                <td><a class="btn btn-light btn-sm" href="{{ route('admin.users.show', $user) }}">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="empty">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-card-header">
                <h2>Recent Transactions</h2>
            </div>
            <div class="table-wrap">
                <table class="admin-table" style="min-width:500px;">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Type</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentTransactions as $transaction)
                            <tr>
                                <td>{{ $transaction->user?->name ?? 'Unknown' }}</td>
                                <td><span
                                        class="badge {{ $transaction->type === 'income' ? 'badge-success' : 'badge-danger' }}">{{ ucfirst($transaction->type) }}</span>
                                </td>
                                <td>{{ number_format((float) $transaction->amount, 2) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="empty">No transactions found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const canvas = document.getElementById('transactionChart');
            if (!canvas || typeof Chart === 'undefined') return;
            new Chart(canvas, {
                type: 'line',
                data: {
                    labels: @json($chartLabels),
                    datasets: [{
                        label: 'Transactions',
                        data: @json($chartData),
                        borderColor: '#2563eb',
                        backgroundColor: 'rgba(37,99,235,.08)',
                        fill: true,
                        tension: .35,
                        pointRadius: 3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    }
                }
            });
        });
    </script>
@endpush
