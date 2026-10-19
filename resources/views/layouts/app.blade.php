<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inventaris Toko Komputer')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="navbar">
        <div class="nav-container">
            <a href="{{ route('items.index') }}" class="brand">Inventaris Toko Komputer</a>
            <ul class="nav-links">
                <li><a href="{{ route('items.index') }}" class="{{ request()->routeIs('items.*') ? 'active' : '' }}">Data Barang</a></li>
                <li><a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">Data Kategori</a></li>
            </ul>
            <div class="nav-user">
                <span>Halo, {{ Auth::user()?->name ?? 'Admin' }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display: inline; margin: 0;">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" id="btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>