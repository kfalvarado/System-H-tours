<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\personas\PersonasController;

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

Route::get('/',[PersonasController::class,'inicio'])->name('personas.inicio');
Route::post('/',[PersonasController::class,'insertar'])->name('personas.insertar');
Route::put('/actualizar',[PersonasController::class,'actualizar'])->name('personas.actualizar');
Route::put('/eliminar',[PersonasController::class,'eliminado'])->name('personas.eliminar');