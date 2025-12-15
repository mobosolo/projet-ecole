<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            max-width: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="card shadow-lg border-0">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <h2 class="fw-bold">🏫 Administration</h2>
                    <p class="text-muted">Connectez-vous pour gérer le site</p>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <strong>Erreur !</strong> {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('admin.login') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" 
                               value="{{ old('email') }}" required autofocus>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" 
                               name="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 btn-lg mb-3">
                        Se connecter
                    </button>

                    <div class="text-center">
                        <a href="{{ route('accueil') }}" class="text-muted text-decoration-none">
                            ← Retour au site
                        </a>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="text-center mt-3 text-white">
            <small>Identifiants par défaut : admin@ecole.com / password123</small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>