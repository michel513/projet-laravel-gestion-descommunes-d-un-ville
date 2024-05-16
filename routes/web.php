<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HabitantController;

use App\Http\Controllers\MaisonController;

use App\Http\Controllers\CommuneController;
use App\Http\Controllers\DelegueQuartierController;
use App\Http\Controllers\QuartierController;
use App\Models\DelegueQuartier;

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
    return view("welcome");
});


Route::get('/ajouter/commune', [CommuneController::class, 'ajouter_commune']);

Route::post('/ajouter/commune/traitement', [CommuneController::class, 'ajouter_commune_traitement']);


Route::get('/update-commune/{IdCommune}', [CommuneController::class, 'update_commune']);

Route::post('/update/traitement', [CommuneController::class, 'update_commune_traitement']);

Route::get('/delete-commune/{IdCommune}', [CommuneController::class, 'delete_commune']);


// Quartier action controlleur :

Route::get('/lister-quartier/{IdCommune}', [QuartierController::class, 'liste_quartier']);

Route::get('/lister-quartier/{IdCommune}/ajouter/quartier', [QuartierController::class, 'ajouter_quartier']);

Route::post('/lister-quartier/{IdCommune}/ajouter/quartier/traitement', [QuartierController::class, 'ajouter_quartier_traitement']);


Route::get('/lister-quartier/{IdCommune}/update-quartier/{IdQuartier}', [QuartierController::class, 'update_quartier']);

Route::post('/lister-quartier/{IdCommune}/update-quartier/{IdQuartier}/traitement', [QuartierController::class, 'update_quartier_traitement']);

Route::get('/lister-quartier/{IdCommune}/delete-quartier/{IdQuartier}', [QuartierController::class, 'delete_quartier']);


// maison action controlleur :

Route::get('/lister-quartier/{IdCommune}/lister-maison/{IdQuartier}', [MaisonController::class, 'liste_maison']);

Route::get('/lister-quartier/{IdCommune}/lister-maison/{IdQuartier}/ajouter/maison', [MaisonController::class, 'ajouter_maison']);

Route::post('/lister-quartier/{IdCommune}/lister-maison/{IdQuartier}/ajouter/maison/traitement', [MaisonController::class, 'ajouter_maison_traitement']);


Route::get('/lister-quartier/{IdCommune}/lister-maison/{IdQuartier}/update-quartier/{IdMaison}', [MaisonController::class, 'update_maison']);

Route::post('/lister-quartier/{IdCommune}/lister-maison/{IdQuartier}/update-quartier/{IdMaison}/traitement', [MaisonController::class, 'update_maison_traitement']);

Route::get('/lister-quartier/{IdCommune}/lister-maison/{IdQuartier}/delete-quartier/{IdMaison}', [MaisonController::class, 'delete_maison']);


// habitant action controlleur :



Route::get('/lister-quartier/{IdCommune}/lister-maison/{IdQuartier}/lister-habitant/{IdMaison}', [HabitantController::class, 'liste_habitant']);

Route::get('/lister-quartier/{IdCommune}/lister-maison/{IdQuartier}/lister-habitant/{IdMaison}/ajouter/habitant', [HabitantController::class, 'ajouter_habitant']);

Route::post('/lister-quartier/{IdCommune}/lister-maison/{IdQuartier}/lister-habitant/{IdMaison}/ajouter/habitant/traitement', [HabitantController::class, 'ajouter_habitant_traitement']);


Route::get('/lister-quartier/{IdCommune}/lister-maison/{IdQuartier}/lister-habitant/{IdMaison}/update-habitant/{IdHabitant}', [HabitantController::class, 'update_habitant']);

Route::post('/lister-quartier/{IdCommune}/lister-maison/{IdQuartier}/lister-habitant/{IdMaison}/update-habitant/{IdHabitant}/traitement', [HabitantController::class, 'update_habitant_traitement']);

Route::get('/lister-quartier/{IdCommune}/lister-maison/{IdQuartier}/lister-habitant/{IdMaison}/delete-habitant/{IdHabitant}', [HabitantController::class, 'delete_habitant']);



// route pour gèrer le delegue Quartier :

Route::get('/lister-quartier/{IdCommune}/lister-delegueQuartier/{IdQuartier}', [DelegueQuartierController::class, 'liste_delegueQuartier']);

Route::get('/lister-quartier/{IdCommune}/lister-delegueQuartier/{IdQuartier}/ajouter/deleguequartier', [DelegueQuartierController::class, 'ajouter_delegueQuartier']);

Route::post('/lister-quartier/{IdCommune}/lister-delegueQuartier/{IdQuartier}/ajouter/quartier/traitement', [DelegueQuartierController::class, 'ajouter_delegueQuartier_traitement']);


Route::get('/lister-quartier/{IdCommune}/lister-delegueQuartier/{IdQuartier}/delete-quartier/{IdDelegue}', [DelegueQuartierController::class, 'delete_delegueQuartier']);

Route::get('/lister-quartier/{IdCommune}/lister-delegueQuartier/{IdQuartier}/update-quartier/{IdDelegue}', [DelegueQuartierController::class, 'update_delegueQuartier']);

Route::post('/lister-quartier/{IdCommune}/lister-delegueQuartier/{IdQuartier}/update-quartier/{IdDelegue}/traitement', [DelegueQuartierController::class, 'update_delegueQuartier_traitement']);
