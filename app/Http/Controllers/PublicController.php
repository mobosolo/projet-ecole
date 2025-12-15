<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Formation;

class PublicController extends Controller
{
    public function accueil()
    {
        $actualites = Actualite::latest()->take(3)->get();
        return view('layouts.public', compact('actualites'));
    }

    public function presentation()
    {
        return view('public.presentation');
    }

    public function formations()
    {
        $formations = Formation::all();
        return view('public.formations', compact('formations'));
    }

    public function actualites()
    {
        $actualites = Actualite::latest()->paginate(10);
        return view('public.actualites', compact('actualites'));
    }

    public function contact()
    {
        return view('public.contact');
    }
}