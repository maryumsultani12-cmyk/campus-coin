<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Coin Dashboard</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    {{-- Custom CSS link --}}
    <link rel="stylesheet" href="{{asset('custom-assets/css/style.css')}}">
</head>
<body>

    <div class="d-flex">
        
        <!-- SIDEBAR -->
        <aside id="sidebar">
            <div class="logo-container border-bottom border-secondary mb-3">
                <img src="https://via.placeholder.com/150x40/1e293b/ffffff?text=Campus+Coin" alt="Logo" class="logo-img" id="sidebarLogo">
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin-panel/index*') ? 'active' : '' }}" href="{{url('/admin-panel/index')}}">
                        <i class="bi bi-house-door"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin-panel/users*') ? 'active' : '' }}" href="{{url('/admin-panel/users')}}">
                        <i class="bi bi-people"></i>
                        <span>User Management</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin-panel/category-management*') ? 'active' : '' }}" href="{{url('/admin-panel/category-management')}}">
                        <i class="bi bi-grid"></i>
                        <span>Category Management</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin-panel/announcements*') ? 'active' : '' }}" href="{{url('/admin-panel/announcements')}}">
                        <i class="bi bi-megaphone"></i>
                        <span>Announcements / Tips</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin-panel/settings*') ? 'active' : '' }}" href="{{url('/admin-panel/settings')}}">
                        <i class="bi bi-gear"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- MAIN CONTENT CONTAINER -->
        <div id="content" class="d-flex flex-column w-100">

            <!-- HEADER / NAVBAR -->
            <header class="navbar navbar-expand-lg navbar-light bg-white border-bottom px-4 py-3">
                <div class="container-fluid p-0">
                    <!-- Sidebar Toggle Button (Desktop & Mobile) -->
                    <button type="button" id="sidebarCollapse" class="btn btn-light me-3">
                        <i class="bi bi-list fs-4"></i>
                    </button>

                    <h4 class="m-0 fw-bold d-none d-sm-block">Dashboard</h4>

                    <div class="ms-auto d-flex align-items-center gap-3">
                        <a href="#" class="text-dark position-relative fs-5">
                            <i class="bi bi-bell"></i>
                            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
                        </a>
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="avatar-circle me-2">A</div>
                                <span class="fw-semibold">Admin</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end text-small shadow" aria-labelledby="dropdownUser">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Sign out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

            <!-- DYNAMIC PAGE CONTENT -->
            <main class="container-fluid p-4">
                @yield('content')
            </main>

            <!-- FOOTER -->
            <footer class="d-flex flex-column flex-sm-row justify-content-between text-muted border-top pt-3 fs-7 px-4 pb-3 mt-auto">
                <p class="mb-1 mb-sm-0">&copy; 2026 Campus Coin. All rights reserved.</p>
                <div>
                    <a href="#" class="text-muted me-2 text-decoration-none">Privacy</a> |
                    <a href="#" class="text-muted me-2 ms-2 text-decoration-none">Terms</a> |
                    <a href="#" class="text-muted ms-2 text-decoration-none">Support</a>
                </div>
            </footer>

        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Chart.js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- Custom JS link --}}
    <script src="{{asset('custom-assets/js/script.js')}}"></script>
</body>
</html>