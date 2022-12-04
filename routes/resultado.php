<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\resultado\ResultadoController;

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


Route::get('/', [ResultadoController::class,'mostrar'])->middleware('CheckToken')->name('Resultado.mostrar');
Route::post('/ins_resul', [ResultadoController::class,'insertar'])->middleware('CheckToken')->name('Resultado.insertar');
Route::post('/pdf_resul', [ResultadoController::class,'pdf'])->middleware('CheckToken')->name('Resultado.pdf');


