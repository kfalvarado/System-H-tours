<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usuarios\UsuariosController;
 
Route::get('/mostrar', [UsuariosController::class, 'mostrar'])->name('usuarios.inicio');


//Route::get('/mostrar',[UsuariosController::class,'mostrar'])->name('usuario.inicio');
