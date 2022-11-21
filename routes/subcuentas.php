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

Route::get('/',[SubcuentasController::class,'ver'])->name('mostrar.subcuentas');
Route::post('/',[SubcuentasController::class,'insertar'])->name('insertar.subcuentas');
Route::post('/busca',[SubcuentasController::class,'busca'])->name('busca.subcuentas');
Route::put('/',[SubcuentasController::class,'actualizar'])->name('subcuentas.actualizar');
