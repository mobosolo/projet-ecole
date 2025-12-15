@extends('layouts.public')

@section('title', 'Accueil')

@section('content')
<div class="container">
    {{-- Hero Section --}}
    <div class="text-center mb-5 py-5">
        <h1 class="display-3 fw-bold text-primary">Bienvenue à Notre École</h1>
        <p class="lead text-muted fs-4">Excellence éducative et environnement d'apprentissage stimulant</p>
        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg mt-3">Nous contacter</a>
    </div>

    {{-- Cards informatifs --}}
    <div class="row mb-5 g-4">
        <div class="col-md-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body text-center p-4">
                    <div class="display-1 text-primary mb-3">📚</div>
                    <h5 class="card-title fw-bold">Formations de qualité</h5>
                    <p class="card-text text-muted">Des programmes adaptés à tous les niveaux avec des enseignants qualifiés</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body text-center p-4">
                    <div class="display-1 text-primary mb-3">👨‍🏫</div>
                    <h5 class="card-title fw-bold">Enseignants qualifiés</h5>
                    <p class="card-text text-muted">Une équipe pédagogique expérimentée et dévouée à votre réussite</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body text-center p-4">
                    <div class="display-1 text-primary mb-3">🎓</div>
                    <h5 class="card-title fw-bold">Réussite garantie</h5>
                    <p class="card-text text-muted">Un accompagnement personnalisé pour atteindre vos objectifs</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Actualités récentes --}}
    <div class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Dernières Actualités</h2>
            <a href="{{ route('actualites') }}" class="btn btn-outline-primary">Voir toutes</a>
        </div>
        
        <div class="row g-4">
            @forelse($actualites ?? [] as $actualite)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $actualite->titre }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($actualite->contenu, 120) }}</p>
                            <small class="text-muted">
                                📅 {{ \Carbon\Carbon::parse($actualite->date_publication)->format('d/m/Y') }}
                            </small>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <p class="mb-0">Aucune actualité pour le moment. Revenez bientôt !</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Call to action --}}
    <div class="text-center bg-primary text-white p-5 rounded shadow-lg mb-5">
        <h3 class="fw-bold mb-3">Rejoignez-nous dès maintenant !</h3>
        <p class="lead mb-4">Découvrez nos formations et inscrivez-vous pour construire votre avenir</p>
        <div class="d-flex gap-3 justify-content-center">
            <a href="{{ route('formations') }}" class="btn btn-light btn-lg">Nos formations</a>
            <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">Contact</a>
        </div>
    </div>
</div>
@endsection