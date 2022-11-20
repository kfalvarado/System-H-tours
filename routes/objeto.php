<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\objetos\ObjetoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/',[ObjetosController::class,'mostrar'])->name('objetos.inicio');
Route::post('/',[ObjetosController::class,'insertar'])->name('objetos.insertar');
Route::put('/actualizar',[ObjetosController::class,'actualizar'])->name('objetos.actualizar');
Route::delete('/eliminar',[ObjetosController::class,'eliminar'])->name('objetos.eliminar');



//pdf
Route::get('/mostrarpdf',[ObjetosController::class,'mostrarPDF'])->name('objetos.pdf');

//excel