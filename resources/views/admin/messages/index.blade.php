@extends('layouts.admin')

@section('title', 'Messages de contact')

@section('content')
<div class="mb-4">
    <h1 class="h3 fw-bold">✉️ Messages de Contact</h1>
    <p class="text-muted">Messages reçus via le formulaire de contact</p>
</div>

{{-- Liste des messages --}}
<div class="card border-0 shadow-sm">
    <div class="card-body">
        @if(isset($messages) && count($messages) > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td>{{ $message->id }}</td>
                                <td><strong>{{ $message->nom }}</strong></td>
                                <td>{{ $message->email }}</td>
                                <td>
                                    <small class="text-muted">
                                        {{ Str::limit($message->contenu, 80) }}
                                    </small>
                                </td>
                                <td>
                                    <small>
                                        {{ \Carbon\Carbon::parse($message->date_envoi)->format('d/m/Y H:i') }}
                                    </small>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if(method_exists($messages, 'hasPages') && $messages->hasPages())
                <div class="mt-3">
                    {{ $messages->links() }}
                </div>
            @endif
        @else
            <div class="text-center py-5">
                <div class="display-1 mb-3">✉️</div>
                <h5 class="text-muted">Aucun message</h5>
                <p class="text-muted">Les messages de contact apparaîtront ici</p>
            </div>
        @endif
    </div>
</div>
@endsection