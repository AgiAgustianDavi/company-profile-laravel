@php
    $s = $settings ?? $globalSettings ?? [];
@endphp
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top py-3">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="{{ route('home') }}">
            <i class="bi bi-hexagon-fill me-1"></i>{{ $s['company_name'] ?? config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active fw-semibold' : '' }}" href="{{ route('home') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active fw-semibold' : '' }}" href="{{ route('about') }}">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('services.*') ? 'active fw-semibold' : '' }}" href="{{ route('services.index') }}">Layanan</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('portfolios.*') ? 'active fw-semibold' : '' }}" href="{{ route('portfolios.index') }}">Portofolio</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact.*') ? 'active fw-semibold' : '' }}" href="{{ route('contact.index') }}">Kontak</a></li>

                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Masuk</a></li>
                    <li class="nav-item">
                        <a class="btn btn-primary btn-sm px-3 rounded-pill" href="{{ route('register') }}">Daftar</a>
                    </li>
                @else
                    @auth
                        @if(auth()->user()->isAdmin())
                            <li class="nav-item">
                                <a class="btn btn-outline-primary btn-sm px-3 rounded-pill" href="{{ route('admin.dashboard') }}">
                                    <i class="bi bi-speedometer2"></i> Panel Admin
                                </a>
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i> {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Keluar</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                @endguest
            </ul>
        </div>
    </div>
</nav>
