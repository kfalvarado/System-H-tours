<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\personas\PersonasController;

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

Route::get('/',[PersonasController::class,'inicio'])->middleware('CheckToken')->name('personas.inicio');
Route::post('/',[PersonasController::class,'insertar'])->middleware('CheckToken')->name('personas.insertar');
Route::put('/actualizar',[PersonasController::class,'actualizar'])->middleware('CheckToken')->name('personas.actualizar');
Route::put('/eliminar',[PersonasController::class,'eliminado'])->middleware('CheckToken')->name('personas.eliminar');
Route::get('/pdf',[PersonasController::class,'mostrarPDF'])->middleware('CheckToken')->name('personas.pdf');