<?php

namespace App\Http\Controllers\objetos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ObjetosController extends Controller
{
    public function mostrar()
    {
        return view('objeto.objeto');
    }
}
