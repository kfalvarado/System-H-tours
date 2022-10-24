<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clasificacion\parametroController;
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

Route::get('/',[parametroController::class,'mostrar'])->name('mostrar.parametro');