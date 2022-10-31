<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bitacoras\BitacoraController;




Route::get('/',[BitacoraController::class,'mostrar'])->name('mostrar.bitacoras');