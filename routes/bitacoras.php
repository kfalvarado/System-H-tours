<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bitacoras\BitacoraController;




Route::get('/bitacoras',[BitacoraController::class,'mostrar'])->name('mostrar.bitacoras');