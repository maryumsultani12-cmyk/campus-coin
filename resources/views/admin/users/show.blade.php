@extends('layouts.admin-layout')
@section('title', 'Campus Coin | User Details')
@section('content')
    <div class="admin-page-head">
        <div>
            <h1>User Details</h1>
            <p>Account and activity overview for {{ $user->name }}.</p>
        </div>
        <a href="{{ route('admin.users') }}" class="btn btn-light">← Back to Users</a>
    </div>

    <div class="admin-grid admin-grid-3" style="margin-bottom:16px;">
        <div class="admin-card stat-card">
            <div class="stat-icon stat-blue">T</div>
            <div><span class="stat-label">Transactions</span>
                <h2 class="stat-value">{{ $transactionCount }}</h2>
            </div>
        </div>
        <div class="admin-card stat-card">
            <div class="stat-icon stat-orange">B</div>
            <div><span class="stat-label">Budgets</span>
                <h2 class="stat-value">{{ $budgetCount }}</h2>
            </div>
        </div>
        <div class="admin-card stat-card">
            <div class="stat-icon stat-purple">I</div>
            <div><span class="stat-label">Insights</span>
                <h2 class="stat-value">{{ $insightCount }}</h2>
            </div>
        </div>
    </div>

    <div class="admin-grid admin-grid-main">
        <div class="admin-card">
            <div class="admin-card-header">
                <h2>Account Information</h2>
            </div>
            <div class="admin-card-body">
                <div class="profile-summary" style="margin-bottom:22px;">
                    <div class="profile-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                    <div>
                        <h2 style="margin:0 0 4px;font-size:20px;">{{ $user->name }}</h2><span
                            style="color:var(--text-muted);">{{ $user->email }}</span>
                    </div>
                </div>
                <div class="detail-list">
                    <div class="detail-item"><span>Role</span><strong>{{ ucfirst($user->role) }}</strong></div>
                    <div class="detail-item"><span>Status</span><strong>{{ ucfirst($user->status) }}</strong></div>
                    <div class="detail-item"><span>Academic
                            Year</span><strong>{{ $user->academic_year ?: 'Not set' }}</strong></div>
                    <div class="detail-item"><span>Monthly Savings
                            Goal</span><strong>{{ number_format((float) $user->monthly_savings_goal, 2) }}</strong></div>
                    <div class="detail-item"><span>Email
                            Verified</span><strong>{{ $user->email_verified_at ? 'Yes' : 'No' }}</strong></div>
                    <div class="detail-item">
                        <span>Joined</span><strong>{{ $user->created_at?->format('M d, Y H:i') }}</strong>
                    </div>
                </div>
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-card-header">
                <h2>Admin Actions</h2>
            </div>
            <div class="admin-card-body">
                @if ($user->id !== auth()->id())
                    <form method="POST" action="{{ route('admin.users.toggle-status', $user) }}"style="margin-bottom:10px;">
                        @csrf @method('PATCH')
                        <button class="btn {{ $user->status === 'active' ? 'btn-danger' : 'btn-success' }}"style="width:100%;"type="submit">{{ $user->status === 'active' ? 'Disable User' : 'Enable User' }}</button>
                    </form>
                    <form method="POST" action="{{ route('admin.users.toggle-role', $user) }}"style="margin-bottom:10px;">
                        @csrf
                        @method('PATCH')
                        <button class="btn {{ $user->role === 'admin' ? 'btn-warning' : 'btn-primary' }}"
                            style="width:100%;" type="submit">
                            {{ $user->role === 'admin' ? 'Remove Admin Role' : 'Make Admin' }}
                        </button>
                    </form>
                    <form method="POST" action="{{ route('admin.users.reset-password', $user) }}">
                        @csrf
                        <button class="btn btn-light" style="width:100%;" type="submit">Send Password Reset Link</button>
                    </form>
                @else
                    <div class="alert alert-info">You are viewing your own administrator account.</div>
                @endif
            </div>
        </div>
    </div>

    <div class="admin-card" style="margin-top:16px;">
        <div class="admin-card-header">
            <h2>Recent Transactions</h2>
        </div>
        <div class="table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentTransactions as $transaction)
                        <tr>
                            <td>{{ $transaction->date?->format('M d, Y') }}</td>
                            <td>{{ $transaction->category?->name ?? 'Unknown' }}</td>
                            <td><span
                                    class="badge {{ $transaction->type === 'income' ? 'badge-success' : 'badge-danger' }}">{{ ucfirst($transaction->type) }}</span>
                            </td>
                            <td>{{ $transaction->description ?: '—' }}</td>
                            <td>{{ number_format((float) $transaction->amount, 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty">No transactions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
