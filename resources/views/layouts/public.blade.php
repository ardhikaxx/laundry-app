<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Beranda') — SiLaundry</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        :root { --accent: #0d6efd; }
        .navbar-brand { font-weight:800; color:var(--accent) !important; }
        .hero { background:linear-gradient(135deg,#0d6efd 0%,#0a58ca 100%); padding:5rem 0; color:#fff; }
    </style>
    @stack('styles')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="fas fa-soap me-2"></i>SiLaundry
        </a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navPublic">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navPublic">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active fw-semibold' : '' }}"
                       href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('public.layanan') ? 'active fw-semibold' : '' }}"
                       href="{{ route('public.layanan') }}">Layanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('public.pelanggan') ? 'active fw-semibold' : '' }}"
                       href="{{ route('public.pelanggan') }}">Pelanggan</a>
                </li>
                @guest
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-primary btn-sm mt-1" href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt me-1"></i>Login
                    </a>
                </li>
                @endguest
                @auth
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-outline-primary btn-sm mt-1" href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : '#' }}">
                        <i class="fas fa-user-circle me-1"></i>{{ auth()->user()->name }}
                    </a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<main>@yield('content')</main>

<footer class="bg-dark text-white py-4 mt-5">
    <div class="container text-center">
        <p class="mb-1 fw-semibold"><i class="fas fa-soap me-2"></i>SiLaundry</p>
        <p class="small text-secondary mb-0">Layanan laundry terpercaya</p>
        <p class="small text-secondary mt-1">&copy; {{ date('Y') }} SiLaundry. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('scripts')
</body>
</html>