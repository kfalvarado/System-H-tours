<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usuarios\UsuariosController;
 
Route::get('/', [UsuariosController::class, 'mostrar'])->name('usuarios.inicio');
Route::get('/upd_usr', [UsuariosController::class, 'actualizar'])->name('usuarios.actualizar');


//Route::get('/mostrar',[UsuariosController::class,'mostrar'])->name('usuario.inicio');
