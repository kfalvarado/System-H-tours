<?php

namespace App\Http\Controllers\subcuentas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubcuentasController extends Controller
{
    public function ver()
    {
       return view('subcuentas.subcuentas');
    }

}