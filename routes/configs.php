<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\config\ConfigsController;
 
Route::get('/', [ConfigsController::class, 'mostrar'])->middleware('CheckToken')->name('ajustes.inicio');
Route::get('/upd_usr', [ConfigsController::class, 'actualizar_usr'])->middleware('CheckToken')->name('ajustes.actualizar_usr');
Route::get('/upd_acc', [ConfigsController::class, 'actualizar'])->middleware('CheckToken')->name('ajustes.actualizar');
