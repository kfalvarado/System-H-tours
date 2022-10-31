<?php

namespace App\Http\Controllers\librodiario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BitacorasController extends Controller
{
    public function mostrar()
    {
        return view('bitacoras.bitacoras');
    }
}