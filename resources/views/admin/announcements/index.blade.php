@extends('layouts.admin-layout')
@section('title', 'Campus Coin | Announcements & Tips')
@section('content')
    <div class="admin-page-head">
        <div>
            <h1>Announcements & Saving Tips</h1>
            <p>Manage system-wide announcement and tip templates.</p>
        </div>
        <button class="btn btn-primary" type="button" data-modal-open="announcementModal">+ Add Template</button>
    </div>

    <div class="admin-card">
        <div class="admin-card-header">
            <h2>Templates</h2>
        </div>
        <div class="admin-card-body">
            <div class="filters"><input class="form-control" id="announcementSearch" data-filter-table="announcementTable"
                    placeholder="Search title or message..."></div>
            <div class="table-wrap">
                <table class="admin-table" id="announcementTable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Message</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($announcements as $announcement)
                            <tr>
                                <td><strong>{{ $announcement->title }}</strong></td>
                                <td><span
                                        class="badge {{ $announcement->type === 'tip' ? 'badge-purple' : 'badge-info' }}">{{ ucfirst($announcement->type) }}</span>
                                </td>
                                <td><span
                                        class="badge {{ $announcement->is_active ? 'badge-success' : 'badge-danger' }}">{{ $announcement->is_active ? 'Active' : 'Inactive' }}</span>
                                </td>
                                <td style="max-width:360px;">
                                    {{ \Illuminate\Support\Str::limit($announcement->message, 90) }}</td>
                                <td>{{ $announcement->created_at?->format('M d, Y') }}</td>
                                <td>
                                    <div class="table-actions"><a class="btn btn-light btn-sm"
                                            href="{{ route('admin.announcements.edit', $announcement) }}">Edit</a>
                                        <form method="POST"
                                            action="{{ route('admin.announcements.destroy', $announcement) }}"
                                            data-confirm="Delete this template?"><input type="hidden" name="_token"
                                                value="{{ csrf_token() }}"><input type="hidden" name="_method"
                                                value="DELETE"><button class="btn btn-danger btn-sm">Delete</button></form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="empty">No announcements or tips found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal-backdrop" id="announcementModal">
        <div class="modal">
            <div class="modal-head">
                <h3>Add Announcement / Tip</h3><button class="modal-close" data-modal-close type="button">×</button>
            </div>
            <form method="POST" action="{{ route('admin.announcements.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group"><label class="form-label">Title</label><input class="form-control"
                            name="title" required></div>
                    <div class="form-group"><label class="form-label">Type</label><select class="form-select" name="type"
                            required>
                            <option value="announcement">Announcement</option>
                            <option value="tip">Saving Tip</option>
                        </select></div>
                    <div class="form-group"><label class="form-label">Message</label>
                        <textarea class="form-textarea" name="message" required></textarea>
                    </div>
                </div>
                <div class="modal-foot"><button class="btn btn-light" data-modal-close type="button">Cancel</button><button
                        class="btn btn-primary" type="submit">Create Template</button></div>
            </form>
        </div>
    </div>
@endsection
