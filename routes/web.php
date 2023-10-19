<?php

use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\EnregistrementController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;


/*****************
 * ACCUEIL
 */
Route::get('/', [AcceuilController::class, 'index'])
    ->name('accueil');

/************
 * CONNEXION ET ENREGISTREMENT
 */
Route::get("/connexion", [ConnexionController::class, 'create'])
    ->name('connexion.create')
     ->middleware('guest');

Route::post("/connexion", [ConnexionController::class, 'authentifier'])
    ->name('connexion.authentifier');

Route::post("/deconnexion", [ConnexionController::class, 'deconnecter'])
    ->name('deconnexion')
    ->middleware('auth');

Route::get("/enregistrement", [EnregistrementController::class, 'create'])
    ->name('enregistrement.create')
    ->middleware('guest');

Route::post("/enregistrement", [EnregistrementController::class, 'store'])
    ->name('enregistrement.store');


/***********
 * MESSAGES
 */
Route::get('/messages', [MessageController::class, 'index'])
    ->name('messages.index')
    ->middleware('auth');


Route::post('/messages', [MessageController::class, 'store'])
    ->name('messages.store')
    ->middleware('auth');


