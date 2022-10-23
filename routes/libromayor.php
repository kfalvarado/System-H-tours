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
Route::get('/',[LibromayorController::class,'mostrar'])->name('mostrar.libromayor');

// Route::get('/', function () {
//     return view('Auth.login');
// });

// Route::get('/inicio',[SessionController::class,'inicio'])->name('home');
// Route::get('/registro',[SessionController::class,'register'])->name('registro');
// Route::post('/registrar',[SessionController::class,'Registrar'])->name('Registrar.usuario');

