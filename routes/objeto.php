<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\objetos\ObjetosController;


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




Route::get('/',[ObjetosController::class,'mostrar'])->middleware('CheckToken')->name('objetos.inicio');
Route::post('/',[ObjetosController::class,'insertar'])->middleware('CheckToken')->name('objetos.insertar');
Route::put('/actualizar',[ObjetosController::class,'actualizar'])->middleware('CheckToken')->name('objetos.actualizar');
Route::delete('/eliminar',[ObjetosController::class,'eliminar'])->middleware('CheckToken')->name('objetos.eliminar');



//pdf
Route::get('/objetopdf',[ObjetosController::class,'mostrarPDF'])->middleware('CheckToken')->name('objetos.pdf');

//excel