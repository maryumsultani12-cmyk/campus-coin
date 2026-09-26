@extends('layouts.admin-layout')
@section('title', 'Campus Coin | Users')
@section('content')
<div class="admin-page-head">
    <div><h1>User Management</h1><p>View, disable and manage registered Campus Coin users.</p></div>
</div>

<!-- <div class="admin-grid admin-grid-4" style="margin-bottom:16px;">
    <!-- <div class="admin-card stat-card"><div class="stat-icon stat-blue">U</div><div><span class="stat-label">Total Users</span><h2 class="stat-value">{{ $stats['total'] }}</h2></div></div>
    <div class="admin-card stat-card"><div class="stat-icon stat-green">A</div><div><span class="stat-label">Active</span><h2 class="stat-value">{{ $stats['active'] }}</h2></div></div>
    <div class="admin-card stat-card"><div class="stat-icon stat-orange">D</div><div><span class="stat-label">Disabled</span><h2 class="stat-value">{{ $stats['disabled'] }}</h2></div></div>
    <div class="admin-card stat-card"><div class="stat-icon stat-purple">R</div><div><span class="stat-label">Administrators</span><h2 class="stat-value">{{ $stats['admins'] }}</h2></div></div> -->
</div> -->

<div class="admin-card">
    <div class="admin-card-header"><h2>Registered Users</h2></div>
    <div class="admin-card-body">
        <div class="filters">
            <input class="form-control" style="max-width:280px;" id="userSearch" data-filter-table="usersTable" placeholder="Search name or email...">
            <a href="{{ route('admin.users') }}" class="btn btn-light">Reset</a>
        </div>
        <div class="table-wrap">
            <table class="admin-table" id="usersTable">
                <thead><tr><th>User</th><th>Email</th><th>Role</th><th>Transactions</th><th>Status</th><th>Joined</th><th>Actions</th></tr></thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td><strong>{{ $user->name }}</strong><br><small style="color:var(--text-muted);">{{ $user->academic_year ?: 'Academic year not set' }}</small></td>
                        <td>{{ $user->email }}</td>
                        <td><span class="badge {{ $user->role === 'admin' ? 'badge-purple' : 'badge-info' }}">{{ ucfirst($user->role) }}</span></td>
                        <td>{{ $user->transactions_count }}</td>
                        <td><span class="badge {{ $user->status === 'active' ? 'badge-success' : 'badge-danger' }}">{{ ucfirst($user->status) }}</span></td>
                        <td>{{ $user->created_at?->format('M d, Y') }}</td>
                        <td>
                            <div class="table-actions">
                                <a class="btn btn-light btn-sm" href="{{ route('admin.users.show', $user) }}">View</a>
                                @if($user->id !== auth()->id())
                                    <form method="POST" action="{{ route('admin.users.toggle-status', $user) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn {{ $user->status === 'active' ? 'btn-danger' : 'btn-success' }} btn-sm" type="submit">{{ $user->status === 'active' ? 'Disable' : 'Enable' }}</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="empty">No users found.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
