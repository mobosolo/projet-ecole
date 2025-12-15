@extends('layouts.public')

@section('title', 'Contact')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            {{-- En-tête --}}
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold text-primary">Contactez-nous</h1>
                <p class="lead text-muted">Nous sommes à votre écoute</p>
            </div>

            {{-- Messages de succès/erreur --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>✓ Succès !</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="row g-4">
                {{-- Formulaire de contact --}}
                <div class="col-md-7">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-4">Envoyez-nous un message</h4>
                            
                            <form action="{{ route('contact.envoyer') }}" method="POST">
                                @csrf
                                
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom complet *</label>
                                    <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                           id="nom" name="nom" value="{{ old('nom') }}" required>
                                    @error('nom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="contenu" class="form-label">Message *</label>
                                    <textarea class="form-control @error('contenu') is-invalid @enderror" 
                                              id="contenu" name="contenu" rows="5" required>{{ old('contenu') }}</textarea>
                                    @error('contenu')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg w-100">
                                    📤 Envoyer le message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Informations de contact --}}
                <div class="col-md-5">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Coordonnées</h5>
                            
                            <div class="mb-3">
                                <div class="d-flex align-items-start">
                                    <span class="fs-4 me-3">📍</span>
                                    <div>
                                        <strong>Adresse</strong>
                                        <p class="text-muted mb-0">123 Avenue de l'Éducation<br>Lomé, Togo</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex align-items-start">
                                    <span class="fs-4 me-3">📞</span>
                                    <div>
                                        <strong>Téléphone</strong>
                                        <p class="text-muted mb-0">+228 22 00 00 00</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex align-items-start">
                                    <span class="fs-4 me-3">✉️</span>
                                    <div>
                                        <strong>Email</strong>
                                        <p class="text-muted mb-0">contact@ecole.tg</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0 bg-primary text-white">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Horaires d'ouverture</h5>
                            <p class="mb-2"><strong>Lundi - Vendredi</strong></p>
                            <p class="mb-3">8h00 - 17h00</p>
                            <p class="mb-2"><strong>Samedi</strong></p>
                            <p class="mb-0">8h00 - 12h00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection