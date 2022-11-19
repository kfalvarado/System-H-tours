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

Route::get('/',[GrupoController::class,'vista'])->name('mostrar.grupos');
Route::post('/insertar',[GrupoController::class,'insertar'])->name('grupo.insertar');
Route::put('/actualizar',[GrupoController::class,'actualizar'])->name('grupo.actualizar');