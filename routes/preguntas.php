<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\preguntas\PreguntasController;
 
Route::get('/mostrar', [PreguntasController::class, 'mostrar'])->name('preguntas.inicio');

