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

Route::get('/',[clasificacionController::class,'mostrar'])->middleware('CheckToken')->name('clasificacion.inicio');
Route::post('/',[clasificacionController::class,'insertar'])->middleware('CheckToken')->name('clasificacion.insertar');
Route::put('/actualizar',[clasificacionController::class,'actualizar'])->middleware('CheckToken')->name('clasificacion.actualizar');
Route::delete('/eliminar',[clasificacionController::class,'eliminar'])->middleware('CheckToken')->name('clasificacion.eliminar');



//pdf
Route::get('/c_pdf',[clasificacionController::class,'mostrarPDF'])->middleware('CheckToken')->name('clasificacion.pdf');

//excel