<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usuarios\UsuariosController;
 
Route::get('/', [UsuariosController::class, 'mostrar'])->name('usuarios.inicio');
Route::get('/upd_usr', [UsuariosController::class, 'actualizar'])->name('usuarios.actualizar');
Route::get('/pdf_usr', [UsuariosController::class, 'crearPDF'])->name('usuarios.pdf');


//Route::get('/mostrar',[UsuariosController::class,'mostrar'])->name('usuario.inicio');
