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
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="announcement-icon icon-blue-soft"><i
                                                class="bi bi-megaphone"></i></span>
                                        <div>
                                            <div class="fw-bold text-dark">Welcome to Campus Coin!</div>
                                            <small class="text-muted">General Announcement</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-type-announcement">Announcement</span></td>
                                <td class="text-muted">We're excited to have you on board! Start tracking your income and
                                    expenses and build better...</td>
                                <td><span class="badge badge-status-active">Active</span></td>
                                <td>
                                    <div class="fw-semibold">Apr 18, 2025</div>
                                    <small class="text-muted">10:30 AM</small>
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-icon text-primary" title="Edit"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-icon text-danger" title="Delete"><i
                                            class="bi bi-trash"></i></button>
                                </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="announcement-icon icon-yellow-soft"><i
                                                class="bi bi-lightbulb"></i></span>
                                        <div>
                                            <div class="fw-bold text-dark">Top 5 Money Saving Tips</div>
                                            <small class="text-muted">Saving Tip</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-type-tip">Tip</span></td>
                                <td class="text-muted">1. Track your daily expenses<br>2. Avoid unnecessary online
                                    shopping...</td>
                                <td><span class="badge badge-status-active">Active</span></td>
                                <td>
                                    <div class="fw-semibold">Apr 17, 2025</div>
                                    <small class="text-muted">02:15 PM</small>
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-icon text-primary" title="Edit"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-icon text-danger" title="Delete"><i
                                            class="bi bi-trash"></i></button>
                                </td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="announcement-icon icon-red-soft"><i class="bi bi-megaphone"></i></span>
                                        <div>
                                            <div class="fw-bold text-dark">Hostel Fee Deadline Reminder</div>
                                            <small class="text-muted">General Announcement</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-type-announcement">Announcement</span></td>
                                <td class="text-muted">This is a reminder that the hostel fee for May is due by April 25,
                                    2025. Please make sure to complete...</td>
                                <td><span class="badge badge-status-active">Active</span></td>
                                <td>
                                    <div class="fw-semibold">Apr 16, 2025</div>
                                    <small class="text-muted">11:00 AM</small>
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-icon text-primary" title="Edit"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-icon text-danger" title="Delete"><i
                                            class="bi bi-trash"></i></button>
                                </td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="announcement-icon icon-green-soft"><i
                                                class="bi bi-lightbulb"></i></span>
                                        <div>
                                            <div class="fw-bold text-dark">Smart Food Choices</div>
                                            <small class="text-muted">Saving Tip</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-type-tip">Tip</span></td>
                                <td class="text-muted">Choose home-cooked meals or student discounts to save more on food.
                                    Small changes make...</td>
                                <td><span class="badge badge-status-active">Active</span></td>
                                <td>
                                    <div class="fw-semibold">Apr 14, 2025</div>
                                    <small class="text-muted">04:45 PM</small>
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-icon text-primary" title="Edit"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-icon text-danger" title="Delete"><i
                                            class="bi bi-trash"></i></button>
                                </td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="announcement-icon icon-blue-soft"><i
                                                class="bi bi-megaphone"></i></span>
                                        <div>
                                            <div class="fw-bold text-dark">New Category Added: Subscriptions</div>
                                            <small class="text-muted">General Announcement</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-type-announcement">Announcement</span></td>
                                <td class="text-muted">A new category "Subscriptions" has been added to help you track your
                                    recurring expenses like...</td>
                                <td><span class="badge badge-status-active">Active</span></td>
                                <td>
                                    <div class="fw-semibold">Apr 12, 2025</div>
                                    <small class="text-muted">09:20 AM</small>
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-icon text-primary" title="Edit"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-icon text-danger" title="Delete"><i
                                            class="bi bi-trash"></i></button>
                                </td>
                            </tr>

                            <tr>
                                <td>6</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="announcement-icon icon-purple-soft"><i
                                                class="bi bi-lightbulb"></i></span>
                                        <div>
                                            <div class="fw-bold text-dark">Study Smart, Spend Smart!</div>
                                            <small class="text-muted">Saving Tip</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-type-tip">Tip</span></td>
                                <td class="text-muted">Set a monthly budget for non-essentials and stick to it. Your future
                                    self will thank you!</td>
                                <td><span class="badge badge-status-inactive">Inactive</span></td>
                                <td>
                                    <div class="fw-semibold">Apr 10, 2025</div>
                                    <small class="text-muted">03:10 PM</small>
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-icon text-primary" title="Edit"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-icon text-danger" title="Delete"><i
                                            class="bi bi-trash"></i></button>
                                </td>
                            </tr>

                            <tr>
                                <td>7</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="announcement-icon icon-teal-soft"><i
                                                class="bi bi-megaphone"></i></span>
                                        <div>
                                            <div class="fw-bold text-dark">System Maintenance</div>
                                            <small class="text-muted">General Announcement</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-type-announcement">Announcement</span></td>
                                <td class="text-muted">The platform will be under maintenance on April 8, 2025 from 2:00 AM
                                    to 5:00 AM. We apologi...</td>
                                <td><span class="badge badge-status-active">Active</span></td>
                                <td>
                                    <div class="fw-semibold">Apr 7, 2025</div>
                                    <small class="text-muted">06:00 PM</small>
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-icon text-primary" title="Edit"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-icon text-danger" title="Delete"><i
                                            class="bi bi-trash"></i></button>
                                </td>
                            </tr>
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
                    <form id="addAnnouncementForm">
                        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <select class="form-select">
                                <option value="Announcement">Announcement</option>
                                <option value="Tip">Saving Tip</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" placeholder="Enter title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <textarea class="form-control" rows="3" placeholder="Enter content details..." required></textarea>
                        </div>
                        <div class="text-end gap-2 d-flex justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        </main>
        @endsection
