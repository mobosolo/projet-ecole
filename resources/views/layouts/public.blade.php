<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'École')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        footer {
            margin-top: auto;
        }
    </style>
</head>
<body>
    {{-- Menu de navigation --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('accueil') }}">🏫 Mon École</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('accueil') ? 'active' : '' }}" href="{{ route('accueil') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('presentation') ? 'active' : '' }}" href="{{ route('presentation') }}">Présentation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('formations') ? 'active' : '' }}" href="{{ route('formations') }}">Formations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('actualites') ? 'active' : '' }}" href="{{ route('actualites') }}">Actualités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.login') }}">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Contenu principal --}}
    <main class="py-4">
        @yield('content')
    </main>

    {{-- Pied de page --}}
    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Mon École - Tous droits réservés</p>
            <small>Projet de Webmastering</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>