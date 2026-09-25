@extends('layouts.admin-layout')
@section('title', 'Campus Coin | Edit Announcement')
@section('content')
    <div class="admin-page-head">
        <div>
            <h1>Edit Announcement / Tip</h1>
            <p>Update this system template.</p>
        </div><a class="btn btn-light" href="{{ route('admin.announcements') }}">← Back</a>
    </div>
    <div class="admin-card">
        <div class="admin-card-body">
            <form method="POST" action="{{ route('admin.announcements.update', $announcement) }}">
                @csrf @method('PUT')
                <div class="form-grid">
                    <div class="form-group"><label class="form-label">Title</label><input class="form-control" name="title"
                            value="{{ old('title', $announcement->title) }}" required></div>
                    <div class="form-group"><label class="form-label">Type</label><select class="form-select" name="type"
                            required>
                            <option value="announcement" @selected(old('type', $announcement->type) === 'announcement')>Announcement</option>
                            <option value="tip" @selected(old('type', $announcement->type) === 'tip')>Saving Tip</option>
                        </select></div>
                    <div class="form-group full"><label class="form-label">Message</label>
                        <textarea class="form-textarea" name="message" required>{{ old('message', $announcement->message) }}</textarea>
                    </div>
                    <div class="form-group"><label class="form-label">Status</label><select class="form-select"
                            name="is_active" required>
                            <option value="1" @selected(old('is_active', $announcement->is_active))>Active</option>
                            <option value="0" @selected(!old('is_active', $announcement->is_active))>Inactive</option>
                        </select></div>
                </div>
                <div style="display:flex;justify-content:flex-end;gap:8px;"><a class="btn btn-light"
                        href="{{ route('admin.announcements') }}">Cancel</a><button class="btn btn-primary"
                        type="submit">Save Changes</button></div>
            </form>
        </div>
    </div>
@endsection
