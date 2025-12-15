@extends('layouts.admin')

@section('title', 'Gestion des actualités')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 fw-bold">📰 Gestion des Actualités</h1>
    <a href="{{ route('admin.actualites.create') }}" class="btn btn-primary">
        ➕ Nouvelle actualité
    </a>
</div>

{{-- Tableau des actualités --}}
<div class="card border-0 shadow-sm">
    <div class="card-body">
        @if(isset($actualites) && count($actualites) > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                            <th>Date de publication</th>
                            <th>Auteur</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($actualites as $actualite)
                            <tr>
                                <td>{{ $actualite->id }}</td>
                                <td>
                                    <strong>{{ $actualite->titre }}</strong>
                                    <br>
                                    <small class="text-muted">
                                        {{ Str::limit($actualite->contenu, 60) }}
                                    </small>
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($actualite->date_publication)->format('d/m/Y') }}
                                </td>
                                <td>
                                    {{ $actualite->utilisateur->name ?? 'N/A' }}
                                </td>
                                <td class="text-end">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.actualites.edit', $actualite) }}" 
                                           class="btn btn-sm btn-outline-primary">
                                            ✏️ Modifier
                                        </a>
                                        <form action="{{ route('admin.actualites.destroy', $actualite) }}" 
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette actualité ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                🗑️ Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if($actualites->hasPages())
                <div class="mt-3">
                    {{ $actualites->links() }}
                </div>
            @endif
        @else
            <div class="text-center py-5">
                <div class="display-1 mb-3">📰</div>
                <h5 class="text-muted">Aucune actualité</h5>
                <p class="text-muted">Commencez par créer votre première actualité</p>
                <a href="{{ route('admin.actualites.create') }}" class="btn btn-primary">
                    Créer une actualité
                </a>
            </div>
        @endif
    </div>
</div>
@endsection