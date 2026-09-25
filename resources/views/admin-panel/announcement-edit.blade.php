@extends('layouts.admin-layout')

@section('content')

<main class="content-body">

    <div class="card">
        <div class="card-body">

            <h3 class="fw-bold mb-4">Edit Announcement</h3>

            <form action="{{ route('admin.announcements.update', $announcement->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ $announcement->title }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea name="message"
                              class="form-control"
                              rows="5"
                              required>{{ $announcement->message }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Type</label>

                    <select name="type" class="form-select" required>
                        <option value="announcement"
                            {{ $announcement->type === 'announcement' ? 'selected' : '' }}>
                            Announcement
                        </option>

                        <option value="tip"
                            {{ $announcement->type === 'tip' ? 'selected' : '' }}>
                            Saving Tip
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>

                    <select name="is_active" class="form-select">
                        <option value="1" {{ $announcement->is_active ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0" {{ !$announcement->is_active ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.announcements') }}"
                       class="btn btn-light">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>

            </form>

        </div>
    </div>

</main>

@endsection