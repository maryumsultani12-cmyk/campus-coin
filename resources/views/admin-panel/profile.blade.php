@extends('layouts.admin-layout')
    @section('content')
<main class="content-body">
    <!-- Page Header -->
    <div class="d-flex align-items-center gap-3 mb-4">
        <div class="header-icon-box">
            <i class="bi bi-person-fill"></i>
        </div>
        <div>
            <h3 class="fw-bold mb-1">Admin Profile</h3>
            <p class="text-muted mb-0">View and manage your profile information and account settings.</p>
        </div>
    </div>

    <!-- Main Grid Layout -->
    <div class="row g-4">
        
        <!-- Left Column: Avatar & Basic Details Card -->
        <div class="col-12 col-lg-3">
            <div class="card profile-card p-4 text-center">
                <!-- Avatar with Edit Badge -->
                <div class="position-relative d-inline-block mx-auto mb-3">
                    <div class="avatar-large">A</div>
                    <button type="button" class="btn avatar-edit-btn" title="Edit Avatar">
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                </div>

                <h5 class="fw-bold mb-1">Admin</h5>
                <p class="text-muted small mb-4">System Administrator</p>

                <!-- Profile Quick List -->
                <div class="d-flex flex-column gap-3 text-start mb-4">
                    <div class="d-flex align-items-center gap-3 text-muted small">
                        <i class="bi bi-envelope fs-6 text-primary"></i>
                        <span class="text-truncate">admin@campuscoin.com</span>
                    </div>
                    <div class="d-flex align-items-center gap-3 text-muted small">
                        <i class="bi bi-shield-check fs-6 text-primary"></i>
                        <span>Admin</span>
                    </div>
                    <div class="d-flex align-items-center gap-3 text-muted small">
                        <i class="bi bi-calendar-event fs-6 text-primary"></i>
                        <div>
                            <div>Joined</div>
                            <strong class="text-dark">Apr 18, 2025</strong>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3 text-muted small">
                        <i class="bi bi-geo-alt fs-6 text-primary"></i>
                        <div>
                            <div>Last Login</div>
                            <strong class="text-dark">Apr 18, 2025 10:30 AM</strong>
                        </div>
                    </div>
                </div>

                <button class="btn btn-soft-primary w-100 py-2 d-flex align-items-center justify-content-center gap-2">
                    <i class="bi bi-image"></i> Change Profile Photo
                </button>
            </div>
        </div>

        <!-- Middle Column: Forms -->
        <div class="col-12 col-lg-6">
            <div class="d-flex flex-column gap-4">
                
                <!-- Personal Information Form Card -->
                <div class="card profile-card p-4">
                    <div class="d-flex align-items-center gap-2 border-bottom pb-3 mb-4">
                        <div class="card-icon-box icon-sky-soft">
                            <i class="bi bi-person-vcard"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0">Personal Information</h6>
                            <small class="text-muted">Update your personal details and contact information.</small>
                        </div>
                    </div>

                    <form id="personalInfoForm">
                        <div class="mb-3">
                            <label class="form-label form-label-custom">Full Name</label>
                            <input type="text" class="form-control form-control-custom" value="Admin">
                        </div>

                        <div class="mb-3">
                            <label class="form-label form-label-custom">Email Address</label>
                            <input type="email" class="form-control form-control-custom" value="admin@campuscoin.com">
                        </div>

                        <div class="mb-3">
                            <label class="form-label form-label-custom">Role</label>
                            <input type="text" class="form-control form-control-custom bg-light" value="Admin" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label form-label-custom">Phone Number</label>
                            <input type="text" class="form-control form-control-custom" value="+92 300 1234567">
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary px-4 py-2 d-inline-flex align-items-center gap-2">
                                <i class="bi bi-floppy"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Change Password Form Card -->
                <div class="card profile-card p-4">
                    <div class="d-flex align-items-center gap-2 border-bottom pb-3 mb-4">
                        <div class="card-icon-box icon-blue-soft">
                            <i class="bi bi-lock"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0">Change Password</h6>
                            <small class="text-muted">Keep your account secure by using a strong password.</small>
                        </div>
                    </div>

                    <form id="changePasswordForm">
                        <div class="mb-3">
                            <label class="form-label form-label-custom">Current Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control form-control-custom border-end-0" value="123456789">
                                <button class="btn btn-outline-light border text-muted toggle-password" type="button">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label form-label-custom">New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control form-control-custom border-end-0" value="123456789">
                                <button class="btn btn-outline-light border text-muted toggle-password" type="button">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label form-label-custom">Confirm New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control form-control-custom border-end-0" value="123456789">
                                <button class="btn btn-outline-light border text-muted toggle-password" type="button">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary px-4 py-2 d-inline-flex align-items-center gap-2">
                                <i class="bi bi-shield-lock"></i> Update Password
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <!-- Right Column: Quick Info & Security Cards -->
        <div class="col-12 col-lg-3">
            <div class="d-flex flex-column gap-4">
                
                <!-- Quick Info Card -->
                <div class="card profile-card p-3">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div class="card-icon-box icon-sky-soft">
                            <i class="bi bi-info-circle"></i>
                        </div>
                        <h6 class="fw-bold mb-0">Quick Info</h6>
                    </div>

                    <div class="d-flex flex-column gap-3 small">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Account Status</span>
                            <span class="badge badge-status-active">Active</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Last Login</span>
                            <span class="fw-semibold text-dark">Apr 18, 2025 10:30 AM</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Environment</span>
                            <span class="badge badge-env-production">Production</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Version</span>
                            <span class="fw-semibold text-dark">1.0.0</span>
                        </div>
                    </div>
                </div>

                <!-- Security Card -->
                <div class="card profile-card p-3">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div class="card-icon-box icon-blue-soft">
                            <i class="bi bi-shield"></i>
                        </div>
                        <h6 class="fw-bold mb-0">Security</h6>
                    </div>

                    <div class="d-flex flex-column gap-3">
                        <a href="#" class="d-flex justify-content-between align-items-center text-decoration-none text-dark small hover-link py-1">
                            <span class="d-flex align-items-center gap-2">
                                <i class="bi bi-lock text-primary"></i> Change Password
                            </span>
                            <i class="bi bi-chevron-right text-muted"></i>
                        </a>

                        <a href="#" class="d-flex justify-content-between align-items-center text-decoration-none text-dark small hover-link py-1">
                            <span class="d-flex align-items-center gap-2">
                                <i class="bi bi-shield-check text-primary"></i> Two-Factor Authentication
                            </span>
                            <div class="d-flex align-items-center gap-1">
                                <span class="badge badge-status-disabled">Disabled</span>
                                <i class="bi bi-chevron-right text-muted"></i>
                            </div>
                        </a>

                        <a href="#" class="d-flex justify-content-between align-items-center text-decoration-none text-dark small hover-link py-1">
                            <span class="d-flex align-items-center gap-2">
                                <i class="bi bi-box-arrow-in-right text-primary"></i> Login Activity
                            </span>
                            <i class="bi bi-chevron-right text-muted"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection