<?php

use App\Http\Controllers\EtudiantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("accueil");
Route::get('/etudiant', [EtudiantController::class,"index"])->name('etudiant');
 
Route::get('/etudiant/create', [EtudiantController::class,"create"])->name('etudiant.create');

Route::post('/etudiant/create', [EtudiantController::class,"store"])->name('etudiant.ajouter');
  
Route::delete('/etudiant/{etudiant}', [EtudiantController::class,"delete"])->name('etudiant.supprimer');

Route::put('/etudiant/{etudiant}', [EtudiantController::class,"update"])->name('etudiant.update');
 //la route pour intercepter le clic sur le bouton editer 
Route::get('/etudiant/{etudiant}', [EtudiantController::class,"edit"])->name('etudiant.edit');
 
