<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\libromayor\LibromayorController;
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
Route::get('/',[LibromayorController::class,'mostrar'])->middleware('CheckToken')->name('mostrar.libromayor');
Route::post('/insertar',[LibromayorController::class,'insertar'])->middleware('CheckToken')->name('libromayor.insertar');
Route::post('/mayorizacion',[LibromayorController::class,'mayorizacion'])->middleware('CheckToken')->name('libromayor.mayorizacion');


Route::put('/actualizar',[LibromayorController::class,'actualizar'])->middleware('CheckToken')->name('libromayor.actualizar');
// ELIMINACION NORMAL NO ELIMINA POR QUE DEBE SER ELIMINADO LOGICO
Route::delete('/eliminar',[LibromayorController::class,'eliminar'])->middleware('CheckToken')->name('libromayor.eliminar');



Route::get('/mayor-pdf',[LibromayorController::class,'pdf'])->middleware('CheckToken')->name('pdf.libromayor');

