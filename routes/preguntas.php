<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\preguntas\PreguntasController;
 
Route::get('/', [PreguntasController::class, 'mostrar'])->name('preguntas.inicio');
