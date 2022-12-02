<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\librodiario\LibrodiarioController;
// use App\Http\Controllers\home\SessionController;

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


// Route::get('/', function () {
//     return view('Auth.login');
// });

Route::get('/',[LibrodiarioController::class,'mostrar'])->middleware('CheckToken')->name('mostrar.librodiario');
Route::post('/insertar',[LibrodiarioController::class,'insertar'])->middleware('CheckToken')->name('librodiario.insertar');
Route::put('/actualizar',[LibrodiarioController::class,'actualizar'])->middleware('CheckToken')->name('librodiario.actualizar');
Route::post('/buscaLibdiario',[LibrodiarioController::class,'buscaLibdiario'])->middleware('CheckToken')->name('busca.buscalibdiario');
Route::post('/buscaEdit',[LibrodiarioController::class,'cuentEdit'])->middleware('CheckToken')->name('busca.cuentEdit');
Route::post('/buscaEditsub',[LibrodiarioController::class,'cuentEditSUb'])->middleware('CheckToken')->name('busca.cuentEditSUb');

Route::delete('/eliminar',[LibrodiarioController::class,'eliminar'])->middleware('CheckToken')->name('librodiario.eliminar');



Route::get('/diario-pdf',[LibrodiarioController::class,'pdf'])->middleware('CheckToken')->name('pdf.librodiario');



// Route::get('/inicio',[SessionController::class,'inicio'])->name('home');
// Route::get('/registro',[SessionController::class,'register'])->name('registro');
// Route::post('/registrar',[SessionController::class,'Registrar'])->name('Registrar.usuario');

