<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bitacoras\BitacoraController;




Route::get('/',[BitacoraController::class,'mostrar'])->middleware('CheckToken')->name('mostrar.bitacoras');