<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clasificacion\ClasificacionController;

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

Route::get('/',[ClasificacionController::class,'mostrar'])->name('clasificacion.inicio');
Route::post('/',[ClasificacionController::class,'insertar'])->name('clasificacion.insertar');
Route::put('/actualizar',[ClasificacionController::class,'actualizar'])->name('clasificacion.actualizar');
Route::delete('/eliminar',[ClasificacionoController::class,'eliminar'])->name('clasificacion.eliminar');



//pdf
Route::get('/mostrarpdf',[ClasificacionController::class,'mostrarPDF'])->name('clasificacion.pdf');

//excel