<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Campus Coin administration panel">
    <title>@yield('title', 'Campus Coin Admin')</title>
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    @stack('styles')
</head>

<body>
    <div class="admin-shell">
        <div class="admin-overlay" id="adminOverlay"></div>

        <aside class="admin-sidebar" id="adminSidebar">
            <div class="admin-brand">
                <div class="admin-brand-mark">CC</div>
                <div>
                    <strong>Campus Coin</strong>
                    <small>Administration</small>
                </div>
            </div>

            <nav class="admin-nav">
                <div class="admin-nav-title">Main</div>
                <a href="{{ route('admin.dashboard') }}"
                    class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <span class="nav-icon">⌂</span><span>Dashboard</span>
                </a>
                <a href="{{ route('admin.users') }}" class="{{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                    <span class="nav-icon">◉</span><span>Users</span>
                </a>
                <a href="{{ route('admin.categories') }}"
                    class="{{ request()->routeIs('admin.categories*') ? 'active' : '' }}">
                    <span class="nav-icon">▦</span><span>Categories</span>
                </a>
                <a href="{{ route('admin.announcements') }}"
                    class="{{ request()->routeIs('admin.announcements*') ? 'active' : '' }}">
                    <span class="nav-icon">✦</span><span>Announcements & Tips</span>
                </a>

                <div class="admin-nav-title">Account</div>
                @if (Route::has('profile.show'))
                    <a href="{{ route('profile.show') }}">
                        <span class="nav-icon">◎</span><span>Profile</span>
                    </a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        style="display:flex;width:100%;align-items:center;gap:11px;margin:3px 2px;padding:11px 13px;border:0;border-radius:8px;background:transparent;color:#94a3b8;font-size:14px;text-align:left;cursor:pointer;">
                        <span class="nav-icon">↪</span><span>Logout</span>
                    </button>
                </form>
            </nav>
        </aside>

        <main class="admin-main">
            <header class="admin-topbar">
                <div class="admin-top-left">
                    <button class="admin-menu-toggle" id="adminMenuToggle" type="button"
                        aria-label="Open menu">☰</button>

                </div>

                <div class="admin-top-right">
                    <div class="admin-user-menu" data-user-menu>
                        <button class="admin-user" type="button" data-user-button>
                            <span
                                class="admin-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</span>
                            <span class="admin-user-info">
                                <strong>{{ auth()->user()->name ?? 'Administrator' }}</strong>
                                <small>Administrator</small>
                            </span>
                            <span>⌄</span>
                        </button>
                        <div class="admin-user-dropdown">
                            @if (Route::has('profile.show'))
                                <a href="{{ route('profile.show') }}">My Profile</a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <section class="admin-content">
                <div class="admin-container">
                    @if (session('success'))
                        <div class="alert alert-success" data-auto-hide>{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Please correct the following:</strong>
                            <ul style="margin:6px 0 0 18px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </section>

            <footer class="admin-footer">
                Campus Coin &copy; {{ date('Y') }}. Administration Panel.
            </footer>
        </main>
    </div>

    <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/js/admin.js') }}"></script>
    @stack('scripts')
</body>

</html>
