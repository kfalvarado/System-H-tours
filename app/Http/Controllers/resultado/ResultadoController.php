<?php

namespace App\Http\Controllers\Resultado;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResultadoController extends Controller
{
    public function mostrar()
    {
        return view("resultado.Resultado");
    }
}
