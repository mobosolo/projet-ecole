<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use App\Models\Formation;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'actualites' => Actualite::count(),
            'formations' => Formation::count(),
            'messages' => Message::count()
        ];

        return view('admin.dashboard', compact('stats'));
    }
}