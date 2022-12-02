<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\subcuentas\SubcuentasController;


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
// hubo un cambio

Route::get('/',[SubcuentasController::class,'ver'])->middleware('CheckToken')->name('mostrar.subcuentas');
Route::post('/',[SubcuentasController::class,'insertar'])->middleware('CheckToken')->name('insertar.subcuentas');
Route::post('/busca',[SubcuentasController::class,'busca'])->middleware('CheckToken')->name('busca.subcuentas');
Route::post('/buscaedit',[SubcuentasController::class,'buscaedit'])->middleware('CheckToken')->name('buscaedit.subcuentas');
Route::put('/',[SubcuentasController::class,'actualizar'])->middleware('CheckToken')->name('subcuentas.actualizar');
Route::delete('/delete',[SubcuentasController::class,'eliminar'])->middleware('CheckToken')->name('subcuentas.eliminar');

Route::get('/subpdf',[SubcuentasController::class,'pdf'])->middleware('CheckToken')->name('pdf.subcuentas');