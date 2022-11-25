<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cuentas\CuentasController;


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

Route::get('/ver',[CuentasController::class,'ver'])->middleware('CheckToken')->name('mostrar.cuentas');
Route::post('/insertar',[CuentasController::class,'insertar'])->middleware('CheckToken')->name('insertar.cuentas');
Route::put('/actualiza',[CuentasController::class,'actualizar'])->middleware('CheckToken')->name('cuentas.actualizar');
Route::delete('/eliminar',[CuentasController::class,'eliminar'])->middleware('CheckToken')->name('cuentas.eliminar');

Route::get('/cuentas-pdf',[CuentasController::class,'mostrarPDF'])->middleware('CheckToken')->name('cuentas.pdf');