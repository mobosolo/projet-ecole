@extends('layouts.admin')

@section('title', 'Modifier formation')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 fw-bold">✏️ Modifier la Formation</h1>
            <a href="{{ route('admin.formations.index') }}" class="btn btn-outline-secondary">
                ← Retour
            </a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('admin.formations.update', $formation) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nom" class="form-label fw-bold">Nom de la formation *</label>
                        <input type="text" 
                               class="form-control @error('nom') is-invalid @enderror" 
                               id="nom" 
                               name="nom" 
                               value="{{ old('nom', $formation->nom) }}" 
                               required>
                        @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label fw-bold">Description *</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="6" 
                                  required>{{ old('description', $formation->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">
                            💾 Mettre à jour
                        </button>
                        <a href="{{ route('admin.formations.index') }}" class="btn btn-outline-secondary">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection