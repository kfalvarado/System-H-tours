<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\config\ConfigsController;
 
Route::get('/', [ConfigsController::class, 'mostrar'])->name('ajustes.inicio');

