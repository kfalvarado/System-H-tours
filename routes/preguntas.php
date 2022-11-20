<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\preguntas\PreguntasController;
 
Route::get('/', [PreguntasController::class, 'mostrar'])->name('preguntas.inicio');
 
Route::put('/upd_preg', [PreguntasController::class, 'actualizar'])->name('preguntas.actualizar');

