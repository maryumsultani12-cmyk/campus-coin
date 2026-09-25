@extends('layouts.admin-layout')
@section('content')
    <main class="content-body">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <!-- Page Header Title & Action Button -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
            <div class="d-flex align-items-center gap-3">
                <div class="header-icon-box">
                    <i class="bi bi-grid-fill"></i>
                </div>
                <div>
                    <h3 class="fw-bold mb-1">Category Management</h3>
                    <p class="text-muted mb-0">Manage income and expense categories for the platform.</p>
                </div>
            </div>
        </div>

        <!-- 3 Metric Cards Row -->
        <div class="row g-3 mb-4">
            <div class="col-12 col-md-4">
                <div class="card card-stat">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="stat-icon bg-income-subtle">
                            <i class="bi bi-arrow-up-short"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Income Categories</span>
                            <h3 class="fw-bold mb-0">{{ $incomeCategories }}</h3>
                            <span class="text-muted small">Total active categories</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card card-stat">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="stat-icon bg-expense-subtle">
                            <i class="bi bi-arrow-down-short"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Expense Categories</span>
                            <h3 class="fw-bold mb-0">{{ $expenseCategories }}</h3>
                            <span class="text-muted small">Total active categories</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card card-stat">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="stat-icon bg-total-subtle">
                            <i class="bi bi-grid"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Total Categories</span>
                            <h3 class="fw-bold mb-0">{{ $totalCategories }}</h3>
                            <span class="text-muted small">Income + Expense</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Main Section -->
        <div class="card card-table mb-4">
            <div class="card-body">

                <!-- Controls Header (Tabs, Search, Add Button) -->
                <div
                    class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4 border-bottom pb-2">
                    <ul class="nav nav-tabs custom-tabs border-0" id="categoryTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="all-tab" data-bs-toggle="tab"
                                data-bs-target="#all-content" type="button" role="tab">Income Categories</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="expense-tab" data-bs-toggle="tab" data-bs-target="#expense-content"
                                type="button" role="tab">Expense Categories</button>
                        </li>
                    </ul>

                    <div class="d-flex align-items-center gap-2">
                        <div class="input-group search-input-group">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="bi bi-search text-muted"></i>
                            </span>
                            <input type="text" id="categorySearch" class="form-control border-start-0"
                                placeholder="Search categories...">
                        </div>
                        <button class="btn btn-primary text-nowrap d-flex align-items-center gap-2" data-bs-toggle="modal"
                            data-bs-target="#addCategoryModal">
                            <i class="bi bi-plus-lg"></i>
                            <span>Add Category</span>
                        </button>
                    </div>
                </div>

                <!-- Income Categories Section -->
                <div class="mb-5 category-group">
                    <div class="section-title-income d-flex align-items-center gap-2 mb-3">
                        <i class="bi bi-arrow-up-short fs-5"></i>
                        <span>Income Categories</span>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle table-borderless table-custom mb-0 category-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Icon</th>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories->where('type', 'income') as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <span class="category-icon icon-green"><i
                                                    class="bi bi-arrow-up-circle"></i></span>
                                        </td>
                                        <td class="fw-semibold">{{ $category->name }}</td>
                                        <td class="text-muted">{{ $category->description ?? 'No description' }}</td>
                                        <td>
                                            <span class="badge badge-status-active">Active</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                class="btn btn-icon text-primary" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('admin.categories.delete', $category->id) }}"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this category?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-icon text-danger" title="Delete">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Expense Categories Section -->
                <div class="category-group">
                    <div class="section-title-expense d-flex align-items-center gap-2 mb-3">
                        <i class="bi bi-arrow-down-short fs-5"></i>
                        <span>Expense Categories</span>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle table-borderless table-custom mb-0 category-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Icon</th>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories->where('type', 'expense') as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <span class="category-icon icon-red"><i
                                                    class="bi bi-arrow-down-circle"></i></span>
                                        </td>
                                        <td class="fw-semibold">{{ $category->name }}</td>
                                        <td class="text-muted">{{-- {{ $category->description ?? 'No description' }} --}}No description</td>
                                        <td>
                                            <span class="badge badge-status-active">Active</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                class="btn btn-icon text-primary" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('admin.categories.delete', $category->id) }}"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this category?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-icon text-danger" title="Delete">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Category Type</label>
                            <select name="type" class="form-select" required>
                                <option value="income">Income</option>
                                <option value="expense">Expense</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter category name"
                                required>
                        </div>
                        {{-- <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="2" placeholder="Enter category description"></textarea>
                        </div> --}}
                        <div class="text-end gap-2 d-flex justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
