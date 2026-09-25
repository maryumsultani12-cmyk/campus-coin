<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CampusCoin')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/css/user.css') }}">
    @yield('styles')
</head>
<body>
<div class="app">
    <aside class="sidebar">
        <div class="brand"><i class="bi bi-wallet2"></i> CampusCoin</div>
        <nav>
            <a href="/user/dashboard"><i class="bi bi-grid"></i> Dashboard</a>
            <a href="/user/income/index"><i class="bi bi-arrow-down-circle"></i> Income</a>
            <a href="/user/expense/index"><i class="bi bi-arrow-up-circle"></i> Expenses</a>
            <a href="/user/transactions/index"><i class="bi bi-receipt"></i> Transactions</a>
            <a href="/user/budgets/index"><i class="bi bi-pie-chart"></i> Budgets</a>
            <a href="/user/categories/index"><i class="bi bi-tags"></i> Categories</a>
            <a href="/user/reports/index"><i class="bi bi-bar-chart"></i> Reports</a>
            <a href="/user/insights/index"><i class="bi bi-lightbulb"></i> Saving Tips</a>
            <a href="/user/profile/index"><i class="bi bi-person"></i> Profile</a>
        </nav>
        <div class="sidebar-bottom">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="logout-btn"><i class="bi bi-box-arrow-right"></i> Logout</button>
            </form>
        </div>
    </aside>

    <main class="main">
        <header class="topbar">
            <div>
                <div class="page-title">@yield('heading', 'Dashboard')</div>
                <div class="muted">@yield('subtitle', 'Manage your student finances')</div>
            </div>
            <div class="dropdown">
                <button class="profile-btn dropdown-toggle" data-bs-toggle="dropdown">
                    <span class="avatar">{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}</span>
                    <span>{{ auth()->user()->name ?? 'User' }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="/user/profile"><i class="bi bi-person me-2"></i>Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item"><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </header>

        <section class="content">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @yield('content')
        </section>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('user/js/user.js') }}"></script>
@yield('scripts')
</body>
</html>