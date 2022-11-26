<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\roles\RolesController;
// use App\Http\Controllers\home\SessionController;

Route::get('/',[RolesController::class,'mostrar'])->middleware('CheckToken')->name('mostrar.roles');
Route::get('/ins_rols', [RolesController::class, 'insertar'])->middleware('CheckToken')->name('roles.insertar');
Route::get('/upd_rols', [RolesController::class, 'actualizar'])->middleware('CheckToken')->name('roles.actualizar');

Route::get('/rol_pdf',[RolesController::class,'pdf'])->middleware('CheckToken')->name('pdf.roles');