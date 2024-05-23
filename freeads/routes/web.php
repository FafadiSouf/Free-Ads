<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnnonceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route pour le tableau de bord
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes pour le profil utilisateur
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Soumettre l'annonce
Route::post('/annonces', [AnnonceController::class, 'store'])->name('annonces.store');

// Liste des annonces 
//Route::get('/annonces', [AnnonceController::class, 'liste'])->name('annonces.liste');

//Routes pour ouvoir modifier et supprimer ses propres annonces
// Liste des annonces 
Route::get('/annonces', [AnnonceController::class, 'index'])->name('annonces.index');

// Afficher le formulaire pour créer une nouvelle annonce
Route::get('/annonces/create', [AnnonceController::class, 'create'])->name('annonces.create');

// Soumettre une nouvelle annonce
Route::post('/annonces', [AnnonceController::class, 'store'])->name('annonces.store');

// Afficher le formulaire pour modifier une annonce
Route::get('/annonces/{annonce}/edit', [AnnonceController::class, 'edit'])->name('annonces.edit');

// Mettre à jour une annonce existante
Route::put('/annonces/{annonce}', [AnnonceController::class, 'update'])->name('annonces.update');

// Supprimer une annonce
Route::delete('/annonces/{annonce}', [AnnonceController::class, 'destroy'])->name('annonces.destroy');

require __DIR__.'/auth.php';
