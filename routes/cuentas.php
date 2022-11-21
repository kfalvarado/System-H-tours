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

Route::get('/ver',[CuentasController::class,'ver'])->name('mostrar.cuentas');
Route::post('/insertar',[CuentasController::class,'insertar'])->name('insertar.cuentas');
Route::put('/actualizar',[CuentasController::class,'actualizar'])->name('cuentas.actualizar');
Route::delete('/eliminar',[CuentasController::class,'eliminar'])->name('cuentas.eliminar');
