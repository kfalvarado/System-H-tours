<?php

namespace App\Http\Controllers\cuentas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CuentasController extends Controller
{
    public function ver()
    {
       return view('cuentas.cuentas');
    }

}
