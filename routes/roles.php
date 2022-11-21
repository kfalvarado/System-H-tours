<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\roles\RolesController;
// use App\Http\Controllers\home\SessionController;

Route::get('/',[RolesController::class,'mostrar'])->name('mostrar.roles');
Route::get('/ins_rols', [RolesController::class, 'insertar'])->name('roles.insertar');
Route::get('/upd_rols', [RolesController::class, 'actualizar'])->name('roles.actualizar');
