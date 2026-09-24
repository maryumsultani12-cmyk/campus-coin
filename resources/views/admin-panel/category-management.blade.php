
@extends('layouts.admin-layout')
@section('content')

<main class="content-body">
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
                        <h3 class="fw-bold mb-0">6</h3>
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
                        <h3 class="fw-bold mb-0">10</h3>
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
                        <h3 class="fw-bold mb-0">16</h3>
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
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4 border-bottom pb-2">
                <ul class="nav nav-tabs custom-tabs border-0" id="categoryTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-content" type="button" role="tab">Income Categories</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="expense-tab" data-bs-toggle="tab" data-bs-target="#expense-content" type="button" role="tab">Expense Categories</button>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2">
                    <div class="input-group search-input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="text" id="categorySearch" class="form-control border-start-0" placeholder="Search categories...">
                    </div>
                    <button class="btn btn-primary text-nowrap d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
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
                            <tr>
                                <td>1</td>
                                <td><span class="category-icon icon-green"><i class="bi bi-wallet2"></i></span></td>
                                <td class="fw-semibold">Allowance</td>
                                <td class="text-muted">Money from family or monthly allowance</td>
                                <td><span class="badge badge-status-active">Active</span></td>
                                <td class="text-end">
                                    <button class="btn btn-icon text-primary" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-icon text-danger" title="Delete"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><span class="category-icon icon-blue"><i class="bi bi-briefcase"></i></span></td>
                                <td class="fw-semibold">Part-time Job</td>
                                <td class="text-muted">Earnings from part-time or freelance work</td>
                                <td><span class="badge badge-status-active">Active</span></td>
                                <td class="text-end">
                                    <button class="btn btn-icon text-primary" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-icon text-danger" title="Delete"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><span class="category-icon icon-purple"><i class="bi bi-mortarboard"></i></span></td>
                                <td class="fw-semibold">Scholarship</td>
                                <td class="text-muted">Scholarship or academic grants</td>
                                <td><span class="badge badge-status-active">Active</span></td>
                                <td class="text-end">
                                    <button class="btn btn-icon text-primary" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-icon text-danger" title="Delete"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><span class="category-icon icon-yellow"><i class="bi bi-gift"></i></span></td>
                                <td class="fw-semibold">Gifts</td>
                                <td class="text-muted">Money from gifts or other sources</td>
                                <td><span class="badge badge-status-active">Active</span></td>
                                <td class="text-end">
                                    <button class="btn btn-icon text-primary" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-icon text-danger" title="Delete"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td><span class="category-icon icon-cyan"><i class="bi bi-three-dots"></i></span></td>
                                <td class="fw-semibold">Other Income</td>
                                <td class="text-muted">Any other income source</td>
                                <td><span class="badge badge-status-active">Active</span></td>
                                <td class="text-end">
                                    <button class="btn btn-icon text-primary" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-icon text-danger" title="Delete"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td><span class="category-icon icon-indigo"><i class="bi bi-arrow-left-right"></i></span></td>
                                <td class="fw-semibold">Transfers</td>
                                <td class="text-muted">Internal transfers or wallet top-ups</td>
                                <td><span class="badge badge-status-active">Active</span></td>
                                <td class="text-end">
                                    <button class="btn btn-icon text-primary" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-icon text-danger" title="Delete"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
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
                            <tr>
                                <td>1</td>
                                <td><span class="category-icon icon-red"><i class="bi bi-cup-hot"></i></span></td>
                                <td class="fw-semibold">Food & Dining</td>
                                <td class="text-muted">Meals, snacks, restaurants, food delivery</td>
                                <td><span class="badge badge-status-active">Active</span></td>
                                <td class="text-end">
                                    <button class="btn btn-icon text-primary" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-icon text-danger" title="Delete"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><span class="category-icon icon-blue"><i class="bi bi-bus-front"></i></span></td>
                                <td class="fw-semibold">Transport</td>
                                <td class="text-muted">Travel, public transport, fuel</td>
                                <td><span class="badge badge-status-active">Active</span></td>
                                <td class="text-end">
                                    <button class="btn btn-icon text-primary" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-icon text-danger" title="Delete"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><span class="category-icon icon-teal"><i class="bi bi-house-door"></i></span></td>
                                <td class="fw-semibold">Hostel / Rent</td>
                                <td class="text-muted">Accommodation, hostel fees, rent</td>
                                <td><span class="badge badge-status-active">Active</span></td>
                                <td class="text-end">
                                    <button class="btn btn-icon text-primary" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-icon text-danger" title="Delete"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><span class="category-icon icon-purple"><i class="bi bi-book"></i></span></td>
                                <td class="fw-semibold">Academics</td>
                                <td class="text-muted">Books, stationery, courses, study material</td>
                                <td><span class="badge badge-status-active">Active</span></td>
                                <td class="text-end">
                                    <button class="btn btn-icon text-primary" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-icon text-danger" title="Delete"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td><span class="category-icon icon-orange"><i class="bi bi-controller"></i></span></td>
                                <td class="fw-semibold">Entertainment</td>
                                <td class="text-muted">Movies, games, hobbies, outings</td>
                                <td><span class="badge badge-status-active">Active</span></td>
                                <td class="text-end">
                                    <button class="btn btn-icon text-primary" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-icon text-danger" title="Delete"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td><span class="category-icon icon-grey"><i class="bi bi-three-dots"></i></span></td>
                                <td class="fw-semibold">Others</td>
                                <td class="text-muted">Miscellaneous expenses</td>
                                <td><span class="badge badge-status-active">Active</span></td>
                                <td class="text-end">
                                    <button class="btn btn-icon text-primary" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-icon text-danger" title="Delete"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
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
                <form id="addCategoryForm">
                    <div class="mb-3">
                        <label class="form-label">Category Type</label>
                        <select class="form-select">
                            <option value="Income">Income</option>
                            <option value="Expense">Expense</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" class="form-control" placeholder="Enter category name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="2" placeholder="Enter category description"></textarea>
                    </div>
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