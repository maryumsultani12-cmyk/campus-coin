    @extends('layouts.admin-layout')
    @section('content')
<main class="content-body">
    <!-- Top Header -->
    <div class="d-flex align-items-center gap-3 mb-4">
        <div class="header-icon-box">
            <i class="bi bi-gear-fill"></i>
        </div>
        <div>
            <h3 class="fw-bold mb-1">Settings</h3>
            <p class="text-muted mb-0">Manage your application settings and preferences.</p>
        </div>
    </div>

    <!-- Main Row Grid -->
    <div class="row g-4">
        
        <!-- Left Sidebar Navigation Options -->
        <div class="col-12 col-lg-3">
            <div class="card settings-card p-2">
                <nav class="nav flex-column settings-nav" id="settingsTabs">
                    <a class="nav-link active" href="#" data-section="general">
                        <i class="bi bi-gear"></i> General Settings
                    </a>
                    <a class="nav-link" href="#" data-section="site">
                        <i class="bi bi-globe"></i> Site Information
                    </a>
                    <a class="nav-link" href="#" data-section="email">
                        <i class="bi bi-envelope"></i> Email Settings
                    </a>
                    <a class="nav-link" href="#" data-section="security">
                        <i class="bi bi-shield-lock"></i> Security
                    </a>
                    <a class="nav-link" href="#" data-section="database">
                        <i class="bi bi-database"></i> Database
                    </a>
                    <a class="nav-link" href="#" data-section="backup">
                        <i class="bi bi-cloud-arrow-up"></i> Backup
                    </a>
                    <a class="nav-link" href="#" data-section="appearance">
                        <i class="bi bi-palette"></i> Appearance
                    </a>
                </nav>
            </div>
        </div>

        <!-- Center Form Settings Body -->
        <div class="col-12 col-lg-6">
            <div class="card settings-card p-4">
                <div class="border-bottom pb-3 mb-4">
                    <h5 class="fw-bold mb-1">General Settings</h5>
                    <p class="text-muted small mb-0">Configure basic application settings.</p>
                </div>

                <form id="generalSettingsForm">
                    <div class="row g-3 mb-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label form-label-custom">Application Name</label>
                            <input type="text" class="form-control form-control-custom" value="Campus Coin">
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label form-label-custom">Tagline</label>
                            <input type="text" class="form-control form-control-custom" value="Smart Spending Student Style">
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label form-label-custom">Default Language</label>
                            <select class="form-select form-select-custom">
                                <option value="English" selected>English</option>
                                <option value="Urdu">Urdu</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label form-label-custom">Timezone</label>
                            <select class="form-select form-select-custom">
                                <option value="Asia/Karachi" selected>Asia/Karachi (GMT+5)</option>
                                <option value="UTC">UTC (GMT+0)</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label form-label-custom">Date Format</label>
                            <select class="form-select form-select-custom">
                                <option value="MM/DD/YYYY" selected>MM/DD/YYYY</option>
                                <option value="DD/MM/YYYY">DD/MM/YYYY</option>
                                <option value="YYYY-MM-DD">YYYY-MM-DD</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label form-label-custom">Time Format</label>
                            <select class="form-select form-select-custom">
                                <option value="12" selected>12 Hours (AM/PM)</option>
                                <option value="24">24 Hours</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-12 col-md-6">
                            <label class="form-label form-label-custom">Items Per Page</label>
                            <select class="form-select form-select-custom">
                                <option value="10" selected>10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                    </div>

                    <!-- Maintenance Mode Switch -->
                    <div class="d-flex align-items-center gap-3 p-3 bg-light rounded-3 mb-4">
                        <div class="form-check form-switch m-0">
                            <input class="form-check-input" type="checkbox" id="maintenanceModeToggle">
                        </div>
                        <div>
                            <label for="maintenanceModeToggle" class="fw-bold d-block text-dark small mb-0" style="cursor: pointer;">Maintenance Mode</label>
                            <small class="text-muted">Enable maintenance mode to prevent user access.</small>
                        </div>
                    </div>

                    <!-- Save Action Section -->
                    <div class="border-top pt-4">
                        <h6 class="fw-bold mb-1">Save Changes</h6>
                        <p class="text-muted small mb-3">Don't forget to save your changes before leaving.</p>
                        <button type="submit" class="btn btn-primary px-4 py-2 fw-medium d-inline-flex align-items-center gap-2">
                            <i class="bi bi-floppy"></i> Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right Side Information & Quick Actions Widgets -->
        <div class="col-12 col-lg-3">
            <div class="d-flex flex-column gap-4">
                
                <!-- Application Info Card -->
                <div class="card settings-card p-3">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="card-title-icon icon-blue-soft"><i class="bi bi-database"></i></span>
                        <h6 class="fw-bold mb-0">Application Info</h6>
                    </div>
                    <div class="d-flex flex-column gap-2 small">
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Version</span>
                            <span class="fw-semibold">1.0.0</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Build</span>
                            <span class="fw-semibold">#1023</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Last Updated</span>
                            <span class="fw-semibold">Apr 18, 2025</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Environment</span>
                            <span class="badge badge-env-production">Production</span>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions Card -->
                <div class="card settings-card p-3">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="card-title-icon icon-sky-soft"><i class="bi bi-lightning-charge"></i></span>
                        <h6 class="fw-bold mb-0">Quick Actions</h6>
                    </div>
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small text-muted d-flex align-items-center gap-2">
                                <i class="bi bi-pencil text-primary"></i> Clear Cache
                            </span>
                            <button class="btn btn-action-soft btn-sm" onclick="clearCacheAction()">Clear</button>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small text-muted d-flex align-items-center gap-2">
                                <i class="bi bi-arrow-counterclockwise text-primary"></i> Reset Settings
                            </span>
                            <button class="btn btn-action-soft btn-sm" onclick="resetSettingsAction()">Reset</button>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small text-muted d-flex align-items-center gap-2">
                                <i class="bi bi-journal-text text-primary"></i> Export Logs
                            </span>
                            <button class="btn btn-action-soft btn-sm" onclick="exportLogsAction()">Export</button>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small text-muted d-flex align-items-center gap-2">
                                <i class="bi bi-activity text-primary"></i> System Health
                            </span>
                            <button class="btn btn-action-soft btn-sm" onclick="systemHealthAction()">Check</button>
                        </div>
                    </div>
                </div>

                <!-- Support Card -->
                <div class="card settings-card p-3">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <span class="card-title-icon icon-purple-soft"><i class="bi bi-headset"></i></span>
                        <h6 class="fw-bold mb-0">Support</h6>
                    </div>
                    <p class="text-muted small mb-3">Need help? Contact the development team for support and assistance.</p>
                    <button class="btn btn-support-outline">
                        <i class="bi bi-envelope text-primary"></i> Contact Support
                    </button>
                </div>

            </div>
        </div>

    </div>
</main>
@endsection