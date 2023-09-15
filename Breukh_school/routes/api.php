<?php

use App\Http\Controllers\EventController;
use App\Models\Classe;
use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\NiveauxController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\NoteController;
use App\Models\Note;
use Illuminate\Support\Facades\Notification;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('niveaux', [NiveauxController::class, 'index']);
Route::get('/niveaux/{niveau}', [NiveauxController::class, 'find']);

Route::put('/eleves/sortie', [EleveController::class,'updateSortie']);
Route::apiResource('eleves', EleveController::class)->only(['store']);

Route::get('/classes/{classe}', [EleveController::class, 'index']);
Route::post('classes/{classe}/coef', [ClasseController::class, 'store']);

Route::apiResource('/disciplines', DisciplineController::class)->only(['index','store']);
Route::apiResource('/evaluations', DisciplineController::class)->only(['index','store']);



Route::put('/eleves/sorties',[NoteController::class,'getOut']);
Route::post('/classes/{class}/disciplines/{discipline}/evaluations/{eval}',[NoteController::class,'insertNote']);
Route::get('/classes/{class}/disciplines/{discipline}/evaluations/{eval}',[NoteController::class,'AfficherNote']);
Route::get('classes/{classe}/disciplines/{discipline}/notes', [NoteController::class, 'getNoteByDiscipline']);
Route::get('classes/{classe}/notes', [NoteController::class, 'getNoteByClasse']);

Route::get('events', [EventController::class, 'index']);
Route::post('events', [EventController::class, 'store']);







      