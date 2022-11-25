<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\preguntas\PreguntasController;
 
Route::get('/', [PreguntasController::class, 'mostrar'])->middleware('CheckToken')->name('preguntas.inicio');
 
Route::put('/upd_preg', [PreguntasController::class, 'actualizar'])->middleware('CheckToken')->name('preguntas.actualizar');

