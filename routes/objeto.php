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




Route::get('/',[ObjetoController::class,'mostrar'])->name('objeto.inicio');
Route::post('/',[ObjetoController::class,'insertar'])->name('objeto.insertar');
Route::put('/actualizar',[ObjetoController::class,'actualizar'])->name('objeto.actualizar');
Route::delete('/eliminar',[ObjetoController::class,'eliminar'])->name('objeto.eliminar');



//pdf
Route::get('/mostrarpdf',[ObjetoController::class,'mostrarPDF'])->name('objeto.pdf');

//excel