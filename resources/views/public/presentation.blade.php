@extends('layouts.public')

@section('title', 'Présentation')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            {{-- En-tête --}}
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold text-primary">À Propos de Notre École</h1>
                <p class="lead text-muted">Une institution d'excellence dédiée à votre réussite</p>
            </div>

            {{-- Histoire --}}
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <h2 class="h3 fw-bold text-primary mb-3">📖 Notre Histoire</h2>
                    <p class="text-muted">
                        Fondée en 1995, notre école s'est toujours engagée à fournir une éducation de qualité 
                        dans un environnement stimulant et bienveillant. Depuis près de 30 ans, nous avons formé 
                        des milliers d'élèves qui excellent aujourd'hui dans leurs domaines respectifs.
                    </p>
                    <p class="text-muted mb-0">
                        Notre établissement est reconnu pour son excellence académique, son corps enseignant 
                        qualifié et ses infrastructures modernes qui favorisent l'apprentissage.
                    </p>
                </div>
            </div>

            {{-- Mission --}}
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <h2 class="h3 fw-bold text-primary mb-3">🎯 Notre Mission</h2>
                    <p class="text-muted mb-0">
                        Notre mission est de développer le potentiel de chaque élève en offrant une éducation 
                        complète qui combine excellence académique, développement personnel et valeurs citoyennes. 
                        Nous préparons nos élèves à devenir des leaders responsables et des citoyens engagés.
                    </p>
                </div>
            </div>

            {{-- Valeurs --}}
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <h2 class="h3 fw-bold text-primary mb-3">💎 Nos Valeurs</h2>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <strong class="text-primary">✓ Excellence :</strong>
                            <span class="text-muted">Nous visons l'excellence dans tout ce que nous faisons</span>
                        </li>
                        <li class="mb-3">
                            <strong class="text-primary">✓ Respect :</strong>
                            <span class="text-muted">Nous cultivons le respect mutuel et la dignité</span>
                        </li>
                        <li class="mb-3">
                            <strong class="text-primary">✓ Innovation :</strong>
                            <span class="text-muted">Nous encourageons la créativité et l'innovation</span>
                        </li>
                        <li class="mb-3">
                            <strong class="text-primary">✓ Intégrité :</strong>
                            <span class="text-muted">Nous agissons avec honnêteté et transparence</span>
                        </li>
                        <li class="mb-0">
                            <strong class="text-primary">✓ Solidarité :</strong>
                            <span class="text-muted">Nous promouvons l'entraide et la collaboration</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Infrastructures --}}
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <h2 class="h3 fw-bold text-primary mb-3">🏫 Nos Infrastructures</h2>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <span class="fs-3 me-3">📚</span>
                                <div>
                                    <strong>Bibliothèque moderne</strong>
                                    <p class="text-muted small mb-0">Plus de 10,000 ouvrages</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <span class="fs-3 me-3">💻</span>
                                <div>
                                    <strong>Salles informatiques</strong>
                                    <p class="text-muted small mb-0">Équipement de pointe</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <span class="fs-3 me-3">🔬</span>
                                <div>
                                    <strong>Laboratoires</strong>
                                    <p class="text-muted small mb-0">Sciences et technologie</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <span class="fs-3 me-3">⚽</span>
                                <div>
                                    <strong>Espaces sportifs</strong>
                                    <p class="text-muted small mb-0">Terrain et gymnase</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CTA --}}
            <div class="text-center bg-light p-5 rounded">
                <h3 class="fw-bold mb-3">Intéressé par notre école ?</h3>
                <p class="text-muted mb-4">N'hésitez pas à nous contacter pour plus d'informations</p>
                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Contactez-nous</a>
            </div>
        </div>
    </div>
</div>
@endsection