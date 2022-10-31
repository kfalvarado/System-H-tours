<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bitacoras\BitacorasController;
// use App\Http\Controllers\home\SessionController;



Route::get('/',[BitacorasController::class,'mostrar'])->name('mostrar.bitacoras');