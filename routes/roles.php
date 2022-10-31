<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\roles\RolesController;
// use App\Http\Controllers\home\SessionController;

Route::get('/',[RolesController::class,'mostrar'])->name('mostrar.roles');