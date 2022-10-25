<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home\SessionController;

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


Route::get('/', function () {
    return view('Auth.login');
});

Route::get('/inicio',[SessionController::class,'inicio'])->name('home');
Route::get('/registro',[SessionController::class,'register'])->name('registro');
Route::post('/registrar',[SessionController::class,'Registrar'])->name('Registrar.usuario');
Route::post('/recuperacion',[SessionController::class,'recuperar'])->name('Recuperar.sesion');
Route::post('/respuesta',[SessionController::class,'respuesta'])->name('Recuperar.respuesta');
Route::get('/logout',[SessionController::class,'logout'])->name('cerrar.sesion');


