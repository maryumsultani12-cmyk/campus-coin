
@extends('layouts.admin-layout')
    @section('content')
            <!-- Dashboard Body -->
            <div class="container-fluid p-4">
                
                <p class="text-muted">Welcome back, Admin! Here's what's happening with your platform.</p>

                <!-- 4 Top Cards -->
                <div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card card-metric p-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="metric-icon bg-primary-subtle text-primary">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Total Users</small>
                                    <h3 class="fw-bold mb-0">248</h3>
                                    <small class="text-success"><i class="bi bi-arrow-up"></i> +12% vs last month</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card card-metric p-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="metric-icon bg-success-subtle text-success">
                                    <i class="bi bi-person-check"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Active Users</small>
                                    <h3 class="fw-bold mb-0">192</h3>
                                    <small class="text-success"><i class="bi bi-arrow-up"></i> +8% vs last month</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card card-metric p-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="metric-icon bg-purple-subtle text-primary" style="background-color: #f3e8ff;">
                                    <i class="bi bi-arrow-left-right"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Total Transactions</small>
                                    <h3 class="fw-bold mb-0">1,856</h3>
                                    <small class="text-success"><i class="bi bi-arrow-up"></i> +15% vs last month</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card card-metric p-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="metric-icon bg-warning-subtle text-warning">
                                    <i class="bi bi-grid-fill"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Most Used Category</small>
                                    <h5 class="fw-bold mb-0">Food & Dining</h5>
                                    <small class="text-muted">32% of total expenses</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="row g-3 mb-4">
                    <!-- Line Chart -->
                    <div class="col-12 col-lg-8">
                        <div class="card border-0 p-3 shadow-sm h-100">
                            <h6 class="fw-bold mb-3">Total Transactions (Last 7 Days)</h6>
                            <div style="position: relative; height: 260px;">
                                <canvas id="lineChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Doughnut Chart -->
                    <div class="col-12 col-lg-4">
                        <div class="card border-0 p-3 shadow-sm h-100">
                            <h6 class="fw-bold mb-3">Expense Categories</h6>
                            <div style="position: relative; height: 220px;" class="d-flex justify-content-center">
                                <canvas id="doughnutChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Users Table -->
                <div class="card border-0 shadow-sm p-3 mb-4">
                    <h6 class="fw-bold mb-3">Recent Users</h6>
                    <div class="table-responsive">
                        <table class="table align-middle table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Registration Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle me-2 bg-primary">AS</div>
                                            Ayesha Khan
                                        </div>
                                    </td>
                                    <td>ayesha@gmail.com</td>
                                    <td>Apr 18, 2025</td>
                                    <td><span class="badge badge-soft-success rounded-pill px-3 py-1">Active</span></td>
                                    <td><a href="#" class="btn btn-sm btn-link text-decoration-none">View</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle me-2 bg-dark">MK</div>
                                            Muhammad Khan
                                        </div>
                                    </td>
                                    <td>muhammad@gmail.com</td>
                                    <td>Apr 17, 2025</td>
                                    <td><span class="badge badge-soft-success rounded-pill px-3 py-1">Active</span></td>
                                    <td><a href="#" class="btn btn-sm btn-link text-decoration-none">View</a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle me-2 bg-info text-dark">SR</div>
                                            Sara Rizvi
                                        </div>
                                    </td>
                                    <td>sara@gmail.com</td>
                                    <td>Apr 16, 2025</td>
                                    <td><span class="badge badge-soft-success rounded-pill px-3 py-1">Active</span></td>
                                    <td><a href="#" class="btn btn-sm btn-link text-decoration-none">View</a></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle me-2 bg-secondary">UZ</div>
                                            Usman Zahid
                                        </div>
                                    </td>
                                    <td>usman@gmail.com</td>
                                    <td>Apr 15, 2025</td>
                                    <td><span class="badge badge-soft-danger rounded-pill px-3 py-1">Inactive</span></td>
                                    <td><a href="#" class="btn btn-sm btn-link text-decoration-none">View</a></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle me-2 bg-danger">FA</div>
                                            Fatima Ali
                                        </div>
                                    </td>
                                    <td>fatima@gmail.com</td>
                                    <td>Apr 14, 2025</td>
                                    <td><span class="badge badge-soft-success rounded-pill px-3 py-1">Active</span></td>
                                    <td><a href="#" class="btn btn-sm btn-link text-decoration-none">View</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
              @endsection