<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Enregistrer un message de contact
     */
    public function envoyer(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contenu' => 'required|string|min:10'
        ], [
            'nom.required' => 'Le nom est obligatoire',
            'email.required' => 'L\'email est obligatoire',
            'email.email' => 'L\'email doit être valide',
            'contenu.required' => 'Le message est obligatoire',
            'contenu.min' => 'Le message doit contenir au moins 10 caractères'
        ]);

        // Création du message
        Message::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'contenu' => $request->contenu,
            'date_envoi' => now()
        ]);

        // Redirection avec message de succès
        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès ! Nous vous répondrons dans les plus brefs délais.');
    }
}