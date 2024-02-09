<?php

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

use App\Http\Controllers\BibliothequeController;

Route::get('/rechercher/{auteur_id}', [BibliothequeController::class, 'rechercher'])->name("livre.rechercher");

Route::get('/editer/{id}', [BibliothequeController::class, 'editer'])->name("livre.editer");

Route::post('/modifier/{id}', [BibliothequeController::class, 'modifier'])->name("livre.modifier");

