<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Afficher la liste des messages
     */
    public function index()
    {
        $messages = Message::latest('date_envoi')->paginate(15);
        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Afficher le détail d'un message (optionnel)
     */
    public function show(Message $message)
    {
        return view('admin.messages.show', compact('message'));
    }

    /**
     * Supprimer un message (optionnel)
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('admin.messages.index')
            ->with('success', 'Message supprimé avec succès !');
    }
}