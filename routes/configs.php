<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\config\ConfigsController;
 
Route::get('/', [ConfigsController::class, 'mostrar'])->name('ajustes.inicio');

Route::get('/upd_acc', [ConfigsController::class, 'actualizar'])->name('ajustes.actualizar');
