@extends('layouts.admin')

@section('title', 'Gestion des formations')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 fw-bold">📚 Gestion des Formations</h1>
    <a href="{{ route('admin.formations.create') }}" class="btn btn-success">
        ➕ Nouvelle formation
    </a>
</div>

{{-- Tableau des formations --}}
<div class="card border-0 shadow-sm">
    <div class="card-body">
        @if(isset($formations) && count($formations) > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Auteur</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($formations as $formation)
                            <tr>
                                <td>{{ $formation->id }}</td>
                                <td>
                                    <strong>{{ $formation->nom }}</strong>
                                </td>
                                <td>
                                    <small class="text-muted">
                                        {{ Str::limit($formation->description, 60) }}
                                    </small>
                                </td>
                                <td>
                                    {{ $formation->utilisateur->name ?? 'N/A' }}
                                </td>
                                <td class="text-end">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.formations.edit', $formation) }}" 
                                           class="btn btn-sm btn-outline-primary">
                                            ✏️ Modifier
                                        </a>
                                        <form action="{{ route('admin.formations.destroy', $formation) }}" 
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette formation ?');">
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
            @if(method_exists($formations, 'hasPages') && $formations->hasPages())
                <div class="mt-3">
                    {{ $formations->links() }}
                </div>
            @endif
        @else
            <div class="text-center py-5">
                <div class="display-1 mb-3">📚</div>
                <h5 class="text-muted">Aucune formation</h5>
                <p class="text-muted">Commencez par créer votre première formation</p>
                <a href="{{ route('admin.formations.create') }}" class="btn btn-success">
                    Créer une formation
                </a>
            </div>
        @endif
    </div>
</div>
@endsection