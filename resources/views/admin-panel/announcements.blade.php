@extends('layouts.admin-layout')
@section('content')
    <main class="content-body">
        <!-- Page Header Title & Action Button -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
            <div class="d-flex align-items-center gap-3">
                <div class="header-icon-box">
                    <i class="bi bi-megaphone-fill"></i>
                </div>
                <div>
                    <h3 class="fw-bold mb-1">Announcements / Tips</h3>
                    <p class="text-muted mb-0">Manage announcements and saving tip templates for students.</p>
                </div>
            </div>
            <div>
                <button class="btn btn-primary px-3 py-2 d-flex align-items-center gap-2" data-bs-toggle="modal"
                    data-bs-target="#addAnnouncementModal">
                    <i class="bi bi-plus-lg"></i>
                    <span>Add Announcement</span>
                </button>
            </div>
        </div>

        <!-- Main Container Card -->
        <div class="card card-table mb-4">
            <div class="card-body">

                <!-- Custom Tabs (Announcements / Saving Tips) -->
                <ul class="nav nav-tabs custom-tabs border-bottom mb-4" id="announcementTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="announcements-tab" data-bs-toggle="tab"
                            data-bs-target="#announcements-content" type="button" role="tab">
                            <i class="bi bi-bell"></i> Announcements
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tips-tab" data-bs-toggle="tab" data-bs-target="#tips-content"
                            type="button" role="tab">
                            <i class="bi bi-lightbulb"></i> Saving Tips
                        </button>
                    </li>
                </ul>

                <!-- Search and Filter Bar -->
                <div class="row g-3 align-items-center justify-content-between mb-4">
                    <div class="col-12 col-md-5">
                        <div class="input-group search-input-group">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="bi bi-search text-muted"></i>
                            </span>
                            <input type="text" id="announcementSearch" class="form-control border-start-0"
                                placeholder="Search announcements...">
                        </div>
                    </div>
                    <div class="col-12 col-md-7 d-flex flex-wrap align-items-center justify-content-md-end gap-2">
                        <select class="form-select filter-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>

                        <select class="form-select filter-select" id="typeFilter">
                            <option value="">All Types</option>
                            <option value="Announcement">Announcement</option>
                            <option value="Tip">Tip</option>
                        </select>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="table-responsive">
                    <table class="table align-middle table-borderless table-custom mb-0" id="announcementsTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Content Preview</th>
                                <th>Status</th>
                                <th>Published Date</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($announcements as $announcement)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $announcement->title }}</td>
                                    <td>{{ ucfirst($announcement->type) }}</td>
                                    <td>{{ $announcement->message }}</td>
                                    <td>
                                        @if ($announcement->is_active)
                                            <span class="badge badge-status-active">Active</span>
                                        @else
                                            <span class="badge badge-status-inactive">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $announcement->created_at->format('M d, Y') }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.announcements.edit', $announcement->id) }}"
                                            class="btn btn-icon text-primary" title="Edit"><i
                                                class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('admin.announcements.delete', $announcement->id) }}"
                                            method="POST" class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this announcement?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-icon text-danger" title="Delete"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Table Footer / Pagination -->
                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center pt-4 gap-3">
                    <span class="text-muted small">Showing 1 - 7 of 7 announcements</span>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#"><i
                                        class="bi bi-chevron-left"></i></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#"><i
                                        class="bi bi-chevron-right"></i></a></li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>

        <!-- Add Announcement Modal -->
        <div class="modal fade" id="addAnnouncementModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Add Announcement / Tip</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.announcements.store') }}" method="POST">
                            @csrf
                            <input type="text" name="title" class="form-control" placeholder="Enter title"
                                required>
                            <textarea name="message" class="form-control" placeholder="Enter message" required></textarea>
                            <select name="type" class="form-select" required>
                                <option value="announcement">Announcement</option>
                                <option value="tip">Saving Tip</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
