<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ActualiteController;
use App\Http\Controllers\Admin\FormationController;
use App\Http\Controllers\Admin\MessageController;

/*
|--------------------------------------------------------------------------
| Routes Publiques
|--------------------------------------------------------------------------
*/

Route::get('/', [PublicController::class, 'accueil'])->name('accueil');
Route::get('/presentation', [PublicController::class, 'presentation'])->name('presentation');
Route::get('/formations', [PublicController::class, 'formations'])->name('formations');
Route::get('/actualites', [PublicController::class, 'actualites'])->name('actualites');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'envoyer'])->name('contact.envoyer');

/*
|--------------------------------------------------------------------------
| Routes d'Authentification Admin
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Routes Admin Protégées
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Gestion des actualités
    Route::resource('actualites', ActualiteController::class);
    
    // Gestion des formations
    Route::resource('formations', FormationController::class);
    
    // Gestion des messages
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
});