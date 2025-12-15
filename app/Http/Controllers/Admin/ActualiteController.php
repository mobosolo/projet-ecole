<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActualiteController extends Controller
{
    public function index()
    {
        $actualites = Actualite::latest()->paginate(10);
        return view('admin.actualites.index', compact('actualites'));
    }

    public function create()
    {
        return view('admin.actualites.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'date_publication' => 'required|date'
        ]);

        Actualite::create([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'date_publication' => $request->date_publication,
            'users_id' => Auth::id()
        ]);

        return redirect()->route('admin.actualites.index')
            ->with('success', 'Actualité ajoutée avec succès');
    }

    public function edit(Actualite $actualite)
    {
        return view('admin.actualites.edit', compact('actualite'));
    }

    public function update(Request $request, Actualite $actualite)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'date_publication' => 'required|date'
        ]);

        $actualite->update($request->all());

        return redirect()->route('admin.actualites.index')
            ->with('success', 'Actualité modifiée avec succès');
    }

    public function destroy(Actualite $actualite)
    {
        $actualite->delete();
        return redirect()->route('admin.actualites.index')
            ->with('success', 'Actualité supprimée avec succès');
    }
}