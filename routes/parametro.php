<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\parametros\ParametrosController;
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




Route::get('/',[ParametrosController::class,'mostrar'])->middleware('CheckToken')->name('parametro.inicio');
Route::post('/',[ParametrosController::class,'insertar'])->middleware('CheckToken')->name('parametro.insertar');
Route::put('/actualizar',[ParametrosController::class,'actualizar'])->middleware('CheckToken')->name('parametro.actualizar');
Route::delete('/eliminar',[ParametrosController::class,'eliminar'])->middleware('CheckToken')->name('parametro.eliminar');



//pdf
Route::get('/mostrarpdf',[ParametrosController::class,'mostrarPDF'])->middleware('CheckToken')->name('parametro.pdf');

//excel