<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home\SessionController;
use App\Http\Controllers\subcuentas\subcuentasController;


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


Route::get('/ver',[subcuentasController::class,'ver'])->name('mostrar.subcuentas');


//Route::get('/inicio',[SessionController::class,'inicio'])->name('home');
//Route::get('/registro',[SessionController::class,'register'])->name('registro');
//Route::post('/registrar',[SessionController::class,'Registrar'])->name('Registrar.usuario');
//Route::post('/recuperacion',[SessionController::class,'Recuperar'])->name('Recuperar.sesion');

