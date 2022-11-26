<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\permisos\PermisosController;
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
Route::get('/',[PermisosController::class,'mostrar'])->middleware('CheckToken')->name('mostrar.permisos');
Route::post('/seleccionar_rol',[PermisosController::class,'roles'])->middleware('CheckToken')->name('permisos.roles');
Route::post('/insertar',[PermisosController::class,'insertar'])->middleware('CheckToken')->name('permisos.insertar');
Route::put('/actua',[PermisosController::class,'actualizar'])->middleware('CheckToken')->name('permisos.actua');
Route::delete('/ep',[PermisosController::class,'eliminar'])->middleware('CheckToken')->name('permisos.eliminar');


Route::get('/pdf-permisos',[PermisosController::class,'pdf'])->middleware('CheckToken')->name('pdf.permisos');