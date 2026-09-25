@extends('layouts.admin-layout')
@section('title', 'Campus Coin | Categories')
@section('content')
    <div class="admin-page-head">
        <div>
            <h1>Category Management</h1>
            <p>Manage default income and expense categories available to students.</p>
        </div>
        <button class="btn btn-primary" type="button" data-modal-open="categoryModal">+ Add Category</button>
    </div>

    <div class="admin-grid admin-grid-3" style="margin-bottom:16px;">
        <div class="admin-card stat-card">
            <div class="stat-icon stat-green">I</div>
            <div><span class="stat-label">Income</span>
                <h2 class="stat-value">{{ $incomeCategories }}</h2>
            </div>
        </div>
        <div class="admin-card stat-card">
            <div class="stat-icon stat-orange">E</div>
            <div><span class="stat-label">Expense</span>
                <h2 class="stat-value">{{ $expenseCategories }}</h2>
            </div>
        </div>
        <div class="admin-card stat-card">
            <div class="stat-icon stat-blue">C</div>
            <div><span class="stat-label">Total Default</span>
                <h2 class="stat-value">{{ $totalCategories }}</h2>
            </div>
        </div>
    </div>

    <div class="admin-card">
        <div class="admin-card-header">
            <h2>Default Categories</h2>
        </div>
        <div class="admin-card-body">
            <div class="filters"><input class="form-control" id="categorySearch" data-filter-table="categoryTable"
                    placeholder="Search category..."></div>
            <div class="table-wrap">
                <table class="admin-table" id="categoryTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Used By Transactions</th>
                            <th>Scope</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td><strong>{{ $category->name }}</strong></td>
                                <td><span
                                        class="badge {{ $category->type === 'income' ? 'badge-success' : 'badge-danger' }}">{{ ucfirst($category->type) }}</span>
                                </td>
                                <td>{{ $category->transactions_count }}</td>
                                <td><span class="badge badge-info">System default</span></td>
                                <td>
                                    <div class="table-actions">
                                        <a class="btn btn-light btn-sm"
                                            href="{{ route('admin.categories.edit', $category) }}">Edit</a>
                                        <form method="POST" action="{{ route('admin.categories.destroy', $category) }}"
                                            data-confirm="Delete this category? This is only allowed when it is not used.">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty">No default categories found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal-backdrop" id="categoryModal">
        <div class="modal">
            <div class="modal-head">
                <h3>Add Default Category</h3><button class="modal-close" data-modal-close type="button">×</button>
            </div>
            <form method="POST" action="{{ route('admin.categories.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group"><label class="form-label">Category Name</label><input class="form-control"
                            name="name" required maxlength="255"></div>
                    <div class="form-group"><label class="form-label">Type</label><select class="form-select" name="type"
                            required>
                            <option value="income">Income</option>
                            <option value="expense">Expense</option>
                        </select></div>
                </div>
                <div class="modal-foot"><button class="btn btn-light" data-modal-close type="button">Cancel</button><button
                        class="btn btn-primary" type="submit">Create Category</button></div>
            </form>
        </div>
    </div>
@endsection
