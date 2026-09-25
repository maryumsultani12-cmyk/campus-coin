@extends('layouts.admin-layout')
@section('content')
    <main class="content-body">
        <!-- Page Header Title & Action Button -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
            <div class="d-flex align-items-center gap-3">
                <div class="header-icon-box">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div>
                    <h3 class="fw-bold mb-1">User Management</h3>
                    <p class="text-muted mb-0">View, manage and control all registered users.</p>
                </div>
            </div>
            <div>
                <button class="btn btn-primary px-3 py-2 d-flex align-items-center gap-2" data-bs-toggle="modal"
                    data-bs-target="#addUserModal">
                    <i class="bi bi-plus-lg"></i>
                    <span>Add New User</span>
                </button>
            </div>
        </div>

        <!-- Metric Cards Row -->
        <div class="row g-3 mb-4">
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card card-stat">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="stat-icon bg-primary-subtle text-primary">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Total Users</span>
                            <h3 class="fw-bold mb-0">248</h3>
                            <span class="text-success small"><i class="bi bi-arrow-up"></i> +12% vs. last month</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card card-stat">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="stat-icon bg-success-subtle text-success">
                            <i class="bi bi-person-check"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Active Users</span>
                            <h3 class="fw-bold mb-0">192</h3>
                            <span class="text-success small"><i class="bi bi-arrow-up"></i> +8% vs. last month</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card card-stat">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="stat-icon bg-danger-subtle text-danger">
                            <i class="bi bi-person-x"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Inactive Users</span>
                            <h3 class="fw-bold mb-0">56</h3>
                            <span class="text-danger small"><i class="bi bi-arrow-up"></i> +3% vs. last month</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card card-stat">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="stat-icon bg-purple-subtle text-purple">
                            <i class="bi bi-person-gear"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Admin Users</span>
                            <h3 class="fw-bold mb-0">2</h3>
                            <span class="text-muted small">No change vs. last month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters & Search Bar Section -->
        <div class="card card-table mb-4">
            <div class="card-body">
                <div class="row g-3 align-items-center justify-content-between mb-3">
                    <div class="col-12 col-md-5">
                        <div class="input-group search-input-group">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="bi bi-search text-muted"></i>
                            </span>
                            <input type="text" id="userSearch" class="form-control border-start-0"
                                placeholder="Search by name, email or student ID...">
                        </div>
                    </div>
                    <div class="col-12 col-md-7 d-flex flex-wrap align-items-center justify-content-md-end gap-2">
                        <select class="form-select filter-select" id="roleFilter">
                            <option value="">All Roles</option>
                            <option value="Student">Student</option>
                            <option value="Admin">Admin</option>
                        </select>

                        <select class="form-select filter-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>

                        <button type="button" class="btn btn-outline-secondary d-flex align-items-center gap-1"
                            id="resetFilters">
                            <i class="bi bi-arrow-counterclockwise"></i> Reset
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle table-borderless table-custom mb-0" id="usersTable">
                        <thead>
                            <tr>
                                <th scope="col">USER ID</th>
                                <th scope="col">USER NAME</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">PROFILE PHOTO URL</th>
                                <th scope="col">JOINED AT</th>
                                <th scope="col" class="text-end">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                                            class="rounded-circle"></td>
                                    <td>{{ $user->created_at->format('d M, Y') }}</td>
                                    <td>
                                        <form action="{{ route('showUser') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <button type="submit" class="btn btn-icon"><i class="bi bi-eye"></i></button>
                                        </form>
                                        <form action="{{ route('deleteUser') }}" method="POST" class="delete-form"
                                            style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <button type="submit" class="btn btn-icon"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                        @if ($user->role === 'admin')
                                            <span class="badge bg-success py-2 px-3">Admin</span>
                                        @else
                                            <form action="{{ route('admin-panel.users.makeAdmin') }}" method="POST">
                                                @csrf<button type="submit" class="btn btn-sm btn-warning">Make
                                                    Admin</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $users->links('pagination::bootstrap-5') }}</div>
                </div>
            </div>
        </div>
    </main>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" placeholder="Enter full name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" placeholder="Enter email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select class="form-select">
                                <option value="Student">Student</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Student/Admin ID</label>
                            <input type="text" class="form-control" placeholder="e.g. STU011" required>
                        </div>
                        <div class="text-end gap-2 d-flex justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 @endsection
