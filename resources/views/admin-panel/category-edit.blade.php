@extends('layouts.admin-layout')

@section('content')

<main class="content-body">

    <div class="card">
        <div class="card-body">

            <h3 class="fw-bold mb-4">Edit Category</h3>

            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Category Type</label>

                    <select name="type" class="form-select" required>
                        <option value="income" {{ $category->type === 'income' ? 'selected' : '' }}>
                            Income
                        </option>

                        <option value="expense" {{ $category->type === 'expense' ? 'selected' : '' }}>
                            Expense
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Category Name</label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ $category->name }}"
                           required>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.categories') }}"
                       class="btn btn-light">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Update Category
                    </button>
                </div>

            </form>

        </div>
    </div>

</main>

@endsection