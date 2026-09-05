<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f3f4f6; }
        .sidebar { min-height: 100vh; background-color: #111827; color: #fff; width: 260px; }
        .sidebar .nav-link { color: #9ca3af; padding: 0.65rem 1.25rem; border-radius: 8px; margin-bottom: 2px; }
        .sidebar .nav-link.active, .sidebar .nav-link:hover { color: #fff; background-color: #2563eb; }
        .sidebar .brand { color: #fff; padding: 1.25rem; font-weight: 700; }
        .main-content { flex: 1; }
        .topbar { background: #fff; border-bottom: 1px solid #e5e7eb; }
        .stat-card { border: none; border-radius: 14px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
    </style>
    @stack('styles')
</head>
<body>
    <div class="d-flex">
        <aside class="sidebar d-none d-lg-flex flex-column p-3">
            <div class="brand"><i class="bi bi-hexagon-fill me-1"></i>{{ config('app.name') }}</div>
            <nav class="nav flex-column mt-3">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-speedometer2 me-2"></i>Dashboard
                </a>
                <a class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}">
                    <i class="bi bi-gem me-2"></i>Layanan
                </a>
                <a class="nav-link {{ request()->routeIs('admin.portfolios.*') ? 'active' : '' }}" href="{{ route('admin.portfolios.index') }}">
                    <i class="bi bi-briefcase me-2"></i>Portofolio
                </a>
                <a class="nav-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}" href="{{ route('admin.messages.index') }}">
                    <i class="bi bi-envelope me-2"></i>Pesan Masuk
                </a>
                <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="{{ route('admin.settings.edit') }}">
                    <i class="bi bi-gear me-2"></i>Pengaturan
                </a>
                <hr class="text-secondary">
                <a class="nav-link" href="{{ route('home') }}"><i class="bi bi-globe me-2"></i>Lihat Website</a>
            </nav>
        </aside>

        <div class="main-content">
            <div class="topbar d-flex justify-content-between align-items-center px-4 py-3">
                <button class="btn btn-sm btn-outline-secondary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
                    <i class="bi bi-list"></i>
                </button>
                <h5 class="mb-0 fw-semibold">@yield('page-title', 'Dashboard')</h5>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-decoration-none text-dark dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle fs-4 me-2"></i>{{ auth()->user()->name ?? '' }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Keluar</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="offcanvas offcanvas-start bg-dark text-light" id="mobileSidebar">
                <div class="offcanvas-header">
                    <h5>{{ config('app.name') }}</h5>
                    <button class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <nav class="nav flex-column">
                        <a class="nav-link text-light" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <a class="nav-link text-light" href="{{ route('admin.services.index') }}">Layanan</a>
                        <a class="nav-link text-light" href="{{ route('admin.portfolios.index') }}">Portofolio</a>
                        <a class="nav-link text-light" href="{{ route('admin.messages.index') }}">Pesan Masuk</a>
                        <a class="nav-link text-light" href="{{ route('admin.settings.edit') }}">Pengaturan</a>
                        <a class="nav-link text-light" href="{{ route('home') }}">Lihat Website</a>
                    </nav>
                </div>
            </div>

            <div class="p-4">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
