<?php

namespace App\Http\Controllers\librodiario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibrodiarioController extends Controller
{
    public function mostrar()
    {
        return view('librodiario.librodiario');
    }
}
