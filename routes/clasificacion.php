<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clasificacion\clasificacionController;

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

Route::get('/',[clasificacionController::class,'mostrar'])->name('clasificacion.inicio');
Route::post('/',[clasificacionController::class,'insertar'])->name('clasificacion.insertar');
Route::put('/actualizar',[clasificacionController::class,'actualizar'])->name('clasificacion.actualizar');
Route::delete('/eliminar',[clasificacionController::class,'eliminar'])->name('clasificacion.eliminar');



//pdf
Route::get('/mostrarpdf',[clasificacionController::class,'mostrarPDF'])->name('clasificacion.pdf');

//excel