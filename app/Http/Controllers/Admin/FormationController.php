<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormationController extends Controller
{
    /**
     * Afficher la liste des formations
     */
    public function index()
    {
        $formations = Formation::latest()->paginate(10);
        return view('admin.formations.index', compact('formations'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        return view('admin.formations.create');
    }

    /**
     * Enregistrer une nouvelle formation
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string'
        ], [
            'nom.required' => 'Le nom de la formation est obligatoire',
            'description.required' => 'La description est obligatoire'
        ]);

        Formation::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'users_id' => Auth::id()
        ]);

        return redirect()->route('admin.formations.index')
            ->with('success', 'Formation ajoutée avec succès !');
    }

    /**
     * Afficher les détails d'une formation (optionnel)
     */
    public function show(Formation $formation)
    {
        return view('admin.formations.show', compact('formation'));
    }

    /**
     * Afficher le formulaire de modification
     */
    public function edit(Formation $formation)
    {
        return view('admin.formations.edit', compact('formation'));
    }

    /**
     * Mettre à jour une formation
     */
    public function update(Request $request, Formation $formation)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string'
        ], [
            'nom.required' => 'Le nom de la formation est obligatoire',
            'description.required' => 'La description est obligatoire'
        ]);

        $formation->update([
            'nom' => $request->nom,
            'description' => $request->description
        ]);

        return redirect()->route('admin.formations.index')
            ->with('success', 'Formation modifiée avec succès !');
    }

    /**
     * Supprimer une formation
     */
    public function destroy(Formation $formation)
    {
        $formation->delete();

        return redirect()->route('admin.formations.index')
            ->with('success', 'Formation supprimée avec succès !');
    }
}