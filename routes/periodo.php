<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\periodo\PeriodoController;

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


Route::get('/mostrar',[PeriodoController::class,'mostrar'])->name('periodo.inicio');
Route::post('/',[PeriodoController::class,'insertar'])->name('periodo.insertar');
Route::put('/actualizar',[PeriodoController::class,'actualizar'])->name('periodo.actualizar');
Route::delete('/eliminar',[PeriodoController::class,'eliminar'])->name('periodo.eliminar');



//pdf
Route::get('/mostrarpdf',[PeriodoController::class,'mostrarPDF'])->name('periodo.pdf');

//excel
