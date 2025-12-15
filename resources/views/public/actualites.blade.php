@extends('layouts.public')

@section('title', 'Actualités')

@section('content')
<div class="container">
    {{-- En-tête --}}
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-primary">Actualités</h1>
        <p class="lead text-muted">Restez informé des dernières nouvelles de notre école</p>
    </div>

    {{-- Liste des actualités --}}
    <div class="row g-4">
        @forelse($actualites ?? [] as $actualite)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <small class="text-muted">
                                📅 {{ \Carbon\Carbon::parse($actualite->date_publication)->format('d/m/Y') }}
                            </small>
                        </div>
                        <h5 class="card-title fw-bold mb-3">{{ $actualite->titre }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($actualite->contenu, 150) }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <h5 class="alert-heading">Aucune actualité</h5>
                    <p class="mb-0">Il n'y a pas encore d'actualités publiées. Revenez bientôt !</p>
                </div>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    @if(isset($actualites) && $actualites->hasPages())
        <div class="mt-5 d-flex justify-content-center">
            {{ $actualites->links() }}
        </div>
    @endif
</div>
@endsection