<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home\SessionController;
use App\Http\Controllers\personas\PersonasController;
use Symfony\Component\Console\Input\Input;

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
})->name('Auth.login');

//inicio sesion
Route::post('/inicio',[SessionController::class,'inicio'])->name('home');

Route::get('/inicio',[SessionController::class,'home'])->middleware('CheckToken')->name('inicio'); //retornar la vista de home



Route::post('/nuevo',[PersonasController::class,'primeracceso'])->name('primer.acceso');
Route::get('/p',[PersonasController::class,'preguntas'])->name('preguntas.personas');
Route::post('/p',[PersonasController::class,'ins_preguntas'])->name('prinsertar');

Route::get('/registro',[SessionController::class,'register'])->name('registro');
Route::post('/registrar',[SessionController::class,'Registrar'])->name('Registrar.usuario');


Route::post('/recuperacion',[SessionController::class,'recuperar'])->name('Recuperar.sesion');
Route::post('/respuesta',[SessionController::class,'respuesta'])->name('Recuperar.respuesta');
Route::get('/siguiente',[SessionController::class,'siguiente'])->name('Recuperar.respuesta.siguiente');
Route::post('/pass',[SessionController::class,'password'])->name('actualizar.constraseña');

/**
 * Ruta que recibe el token desde el Correo
 * 
 * Esta Ruta no se encuentra protegida por CSRF
 */
Route::post('/rce',[SessionController::class,'email'])->name('email.restablecer');
Route::post('/rce/verificar',[SessionController::class,'verificar_Token'])->name('email.verificar');





Route::get('/logout',[SessionController::class,'logout'])->name('cerrar.sesion');

Route::get('/pruebas',[SessionController::class,'pruebas'])->name('pruebas');
Route::get('/secret',[SessionController::class,'refresToken'])->name('refreshToken');


//Acceso No autorizado
Route::get('/no-autorizado', function () {
    return view('Auth.no-auth');
})->name('acceso.denegado');


