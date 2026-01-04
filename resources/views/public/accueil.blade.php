@extends('layouts.public')

@section('title', 'Accueil')

@section('content')
<div class="container">
    {{-- Hero Section avec effet dégradé --}}
    <div class="text-center mb-5 py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 20px; color: white; box-shadow: 0 10px 40px rgba(0,0,0,0.1);">
        <h1 class="display-3 fw-bold mb-3">🏫 Bienvenue à Notre École</h1>
        <p class="lead fs-4 mb-4">Excellence éducative et environnement d'apprentissage stimulant</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="{{ route('formations') }}" class="btn btn-light btn-lg shadow">
                📚 Découvrir nos formations
            </a>
            <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">
                ✉️ Nous contacter
            </a>
        </div>
    </div>

    {{-- Chiffres clés --}}
    <div class="row text-center mb-5 g-4">
        <div class="col-md-3 col-6">
            <div class="p-4 bg-light rounded shadow-sm h-100">
                <div class="display-4 text-primary fw-bold">25+</div>
                <p class="text-muted mb-0">Années d'expérience</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="p-4 bg-light rounded shadow-sm h-100">
                <div class="display-4 text-success fw-bold">1500+</div>
                <p class="text-muted mb-0">Élèves formés</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="p-4 bg-light rounded shadow-sm h-100">
                <div class="display-4 text-warning fw-bold">95%</div>
                <p class="text-muted mb-0">Taux de réussite</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="p-4 bg-light rounded shadow-sm h-100">
                <div class="display-4 text-danger fw-bold">50+</div>
                <p class="text-muted mb-0">Enseignants qualifiés</p>
            </div>
        </div>
    </div>

    {{-- Cards informatifs avec animations --}}
    <div class="row mb-5 g-4">
        <div class="col-md-4">
            <div class="card shadow border-0 h-100 hover-card" style="transition: transform 0.3s;">
                <div class="card-body text-center p-4">
                    <div class="display-1 mb-3" style="font-size: 5rem;">📚</div>
                    <h5 class="card-title fw-bold mb-3">Formations de qualité</h5>
                    <p class="card-text text-muted">
                        Des programmes adaptés à tous les niveaux, du primaire au BTS, 
                        avec des enseignants qualifiés et passionnés
                    </p>
                    <a href="{{ route('formations') }}" class="btn btn-outline-primary mt-3">
                        En savoir plus →
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow border-0 h-100 hover-card" style="transition: transform 0.3s;">
                <div class="card-body text-center p-4">
                    <div class="display-1 mb-3" style="font-size: 5rem;">👨‍🏫</div>
                    <h5 class="card-title fw-bold mb-3">Enseignants qualifiés</h5>
                    <p class="card-text text-muted">
                        Une équipe pédagogique expérimentée et dévouée, 
                        à l'écoute de chaque élève pour garantir sa réussite
                    </p>
                    <a href="{{ route('presentation') }}" class="btn btn-outline-primary mt-3">
                        Notre équipe →
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow border-0 h-100 hover-card" style="transition: transform 0.3s;">
                <div class="card-body text-center p-4">
                    <div class="display-1 mb-3" style="font-size: 5rem;">🎓</div>
                    <h5 class="card-title fw-bold mb-3">Réussite garantie</h5>
                    <p class="card-text text-muted">
                        Un accompagnement personnalisé et des méthodes pédagogiques 
                        innovantes pour atteindre vos objectifs
                    </p>
                    <a href="{{ route('contact') }}" class="btn btn-outline-primary mt-3">
                        Nous rejoindre →
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Actualités récentes avec design moderne --}}
    <div class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-2">📰 Dernières Actualités</h2>
                <p class="text-muted mb-0">Restez informé de la vie de notre école</p>
            </div>
            <a href="{{ route('actualites') }}" class="btn btn-primary">
                Voir toutes les actualités →
            </a>
        </div>
        
        <div class="row g-4">
            @forelse($actualites ?? [] as $actualite)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 hover-card" style="transition: all 0.3s;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <span class="badge bg-primary me-2">Actualité</span>
                                <small class="text-muted">
                                    📅 {{ \Carbon\Carbon::parse($actualite->date_publication)->format('d/m/Y') }}
                                </small>
                            </div>
                            <h5 class="card-title fw-bold mb-3">{{ $actualite->titre }}</h5>
                            <p class="card-text text-muted">
                                {{ Str::limit($actualite->contenu, 120) }}
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-0 p-4 pt-0">
                            <a href="{{ route('actualites') }}" class="text-primary text-decoration-none fw-semibold">
                                Lire la suite →
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center border-0 shadow-sm">
                        <h5 class="alert-heading mb-2">📢 Aucune actualité pour le moment</h5>
                        <p class="mb-0">Les dernières nouvelles de notre école apparaîtront ici. Revenez bientôt !</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Section témoignages --}}
    <div class="bg-light p-5 rounded shadow-sm mb-5">
        <h3 class="fw-bold text-center mb-4">💬 Ce que disent nos élèves</h3>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="bg-white p-4 rounded shadow-sm">
                    <p class="mb-3 fst-italic">"Une école extraordinaire avec des professeurs à l'écoute. J'ai progressé énormément grâce à leur accompagnement."</p>
                    <div class="d-flex align-items-center">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <strong>AM</strong>
                        </div>
                        <div class="ms-3">
                            <strong>Aïcha M.</strong>
                            <br>
                            <small class="text-muted">Élève de Terminale</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white p-4 rounded shadow-sm">
                    <p class="mb-3 fst-italic">"Les infrastructures sont modernes et l'ambiance de travail est excellente. Je recommande vivement cette école."</p>
                    <div class="d-flex align-items-center">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <strong>KD</strong>
                        </div>
                        <div class="ms-3">
                            <strong>Kofi D.</strong>
                            <br>
                            <small class="text-muted">Étudiant BTS</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white p-4 rounded shadow-sm">
                    <p class="mb-3 fst-italic">"Grâce à cette école, j'ai obtenu mon bac avec mention et je poursuis mes études sereinement."</p>
                    <div class="d-flex align-items-center">
                        <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <strong>SY</strong>
                        </div>
                        <div class="ms-3">
                            <strong>Sena Y.</strong>
                            <br>
                            <small class="text-muted">Ancien élève</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Call to action final --}}
    <div class="text-center p-5 rounded shadow-lg mb-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
        <h3 class="fw-bold mb-3">🎯 Prêt à rejoindre notre communauté ?</h3>
        <p class="lead mb-4">Inscrivez-vous dès maintenant et construisez votre avenir avec nous</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="{{ route('formations') }}" class="btn btn-light btn-lg shadow">
                📋 Voir les formations
            </a>
            <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">
                📞 Demander des informations
            </a>
        </div>
    </div>
</div>

<style>
.hover-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
}
</style>
@endsection