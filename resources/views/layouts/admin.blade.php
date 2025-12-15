<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administration')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            min-width: 250px;
            max-width: 250px;
            background-color: #343a40;
        }
        .sidebar .nav-link {
            color: #adb5bd;
        }
        .sidebar .nav-link:hover {
            color: #fff;
            background-color: #495057;
        }
        .sidebar .nav-link.active {
            color: #fff;
            background-color: #007bff;
        }
        .content {
            flex: 1;
            padding: 20px;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    {{-- Sidebar --}}
    <div class="sidebar d-flex flex-column p-3 text-white">
        <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-4">🏫 Admin</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    📊 Tableau de bord
                </a>
            </li>
            <li>
                <a href="{{ route('admin.actualites.index') }}" class="nav-link {{ request()->routeIs('admin.actualites.*') ? 'active' : '' }}">
                    📰 Actualités
                </a>
            </li>
            <li>
                <a href="{{ route('admin.formations.index') }}" class="nav-link {{ request()->routeIs('admin.formations.*') ? 'active' : '' }}">
                    📚 Formations
                </a>
            </li>
            <li>
                <a href="{{ route('admin.messages.index') }}" class="nav-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                    ✉️ Messages
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown">
                <strong>{{ Auth::user()->name ?? 'Admin' }}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Déconnexion</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    {{-- Contenu principal --}}
    <div class="content">
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>