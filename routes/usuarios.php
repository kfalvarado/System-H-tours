<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usuarios\UsuariosController;
 
Route::get('/', [UsuariosController::class, 'mostrar'])->middleware('CheckToken')->name('usuarios.inicio');
Route::get('/upd_usr', [UsuariosController::class, 'actualizar'])->middleware('CheckToken')->name('usuarios.actualizar');
Route::get('/pdf_usr', [UsuariosController::class, 'crearPDF'])->middleware('CheckToken')->name('usuarios.pdf');


//Route::get('/mostrar',[UsuariosController::class,'mostrar'])->name('usuario.inicio');
