<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminsController;
 
Route::get('/mostrar', [AdminsController::class, 'mostrar'])->name('admins.inicio');
