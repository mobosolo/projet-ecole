@extends('layouts.admin')

@section('title', 'Modifier actualité')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 fw-bold">✏️ Modifier l'Actualité</h1>
            <a href="{{ route('admin.actualites.index') }}" class="btn btn-outline-secondary">
                ← Retour
            </a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('admin.actualites.update', $actualite) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="titre" class="form-label fw-bold">Titre *</label>
                        <input type="text" 
                               class="form-control @error('titre') is-invalid @enderror" 
                               id="titre" 
                               name="titre" 
                               value="{{ old('titre', $actualite->titre) }}" 
                               required>
                        @error('titre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="date_publication" class="form-label fw-bold">Date de publication *</label>
                        <input type="date" 
                               class="form-control @error('date_publication') is-invalid @enderror" 
                               id="date_publication" 
                               name="date_publication" 
                               value="{{ old('date_publication', $actualite->date_publication) }}" 
                               required>
                        @error('date_publication')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="contenu" class="form-label fw-bold">Contenu *</label>
                        <textarea class="form-control @error('contenu') is-invalid @enderror" 
                                  id="contenu" 
                                  name="contenu" 
                                  rows="8" 
                                  required>{{ old('contenu', $actualite->contenu) }}</textarea>
                        @error('contenu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            💾 Mettre à jour
                        </button>
                        <a href="{{ route('admin.actualites.index') }}" class="btn btn-outline-secondary">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection