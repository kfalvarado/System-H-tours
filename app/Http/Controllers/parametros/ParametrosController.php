<?php

namespace App\Http\Controllers\parametros;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParametrosController extends Controller
{
    public function mostrar()
    {
        return view('parametro.parametro');
    }
}
