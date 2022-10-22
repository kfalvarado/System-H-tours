<?php

namespace App\Http\Controllers\preguntas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PreguntasController extends Controller
{
    public function mostrar()
    {
       return view('preguntas.preguntas');
    }
}
