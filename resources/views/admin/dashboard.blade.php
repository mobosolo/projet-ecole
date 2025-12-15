@extends('layouts.admin')

@section('title', 'Tableau de bord')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 fw-bold">📊 Tableau de bord</h1>
    <div class="text-muted">
        Bienvenue, <strong>{{ Auth::user()->name }}</strong>
    </div>
</div>

{{-- Statistiques --}}
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-1 opacity-75">Actualités</h6>
                        <h2 class="mb-0 fw-bold">{{ $stats['actualites'] ?? 0 }}</h2>
                    </div>
                    <div class="fs-1 opacity-75">📰</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-1 opacity-75">Formations</h6>
                        <h2 class="mb-0 fw-bold">{{ $stats['formations'] ?? 0 }}</h2>
                    </div>
                    <div class="fs-1 opacity-75">📚</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-1 opacity-75">Messages</h6>
                        <h2 class="mb-0 fw-bold">{{ $stats['messages'] ?? 0 }}</h2>
                    </div>
                    <div class="fs-1 opacity-75">✉️</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Actions rapides --}}
<div class="row g-4">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Actions rapides</h5>
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.actualites.create') }}" class="btn btn-outline-primary">
                        ➕ Nouvelle actualité
                    </a>
                    <a href="{{ route('admin.formations.create') }}" class="btn btn-outline-success">
                        ➕ Nouvelle formation
                    </a>
                    <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-warning">
                        📧 Voir les messages
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Informations système</h5>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <strong>Version Laravel:</strong> {{ app()->version() }}
                    </li>
                    <li class="mb-2">
                        <strong>Version PHP:</strong> {{ PHP_VERSION }}
                    </li>
                    <li class="mb-2">
                        <strong>Environnement:</strong> {{ config('app.env') }}
                    </li>
                    <li class="mb-0">
                        <strong>Dernière connexion:</strong> {{ now()->format('d/m/Y H:i') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection