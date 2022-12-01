<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\grupos\GrupoController;


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

Route::get('/',[GrupoController::class,'vista'])->middleware('CheckToken')->name('mostrar.grupos');
Route::post('/insertar',[GrupoController::class,'insertar'])->middleware('CheckToken')->name('grupo.insertar');
Route::post('/grupos/search',[GrupoController::class,'gruposSearch'])->middleware('CheckToken')->name('grupo.search');
Route::put('/actualizar',[GrupoController::class,'actualizar'])->middleware('CheckToken')->name('grupo.actualizar');
Route::delete('/eliminar',[GrupoController::class,'eliminar'])->middleware('CheckToken')->name('grupo.eliminar');
Route::get('/pdf-grupo',[GrupoController::class,'pdf'])->middleware('CheckToken')->name('pdf.grupos');