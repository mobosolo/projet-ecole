@extends('layouts.public')

@section('title', 'Formations')

@section('content')
<div class="container">
    {{-- En-tête --}}
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-primary">Nos Formations</h1>
        <p class="lead text-muted">Découvrez nos programmes éducatifs adaptés à tous les niveaux</p>
    </div>

    {{-- Liste des formations --}}
    <div class="row g-4">
        @forelse($formations ?? [] as $formation)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <span class="badge bg-primary fs-5">📚</span>
                        </div>
                        <h5 class="card-title fw-bold mb-3">{{ $formation->nom }}</h5>
                        <p class="card-text text-muted">{{ $formation->description }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 p-4 pt-0">
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary w-100">
                            Demander des informations
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <h5 class="alert-heading">Aucune formation disponible</h5>
                    <p class="mb-0">Nos formations seront bientôt disponibles. Revenez plus tard !</p>
                </div>
            </div>
        @endforelse
    </div>

    {{-- Section informative --}}
    @if(isset($formations) && count($formations) > 0)
    <div class="mt-5 p-5 bg-light rounded">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h3 class="fw-bold mb-3">Besoin de plus d'informations ?</h3>
                <p class="text-muted mb-0">
                    Notre équipe est à votre disposition pour répondre à toutes vos questions 
                    concernant nos formations et les modalités d'inscription.
                </p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Contactez-nous</a>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection