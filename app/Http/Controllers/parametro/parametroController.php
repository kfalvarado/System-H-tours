<?php

namespace App\Http\Controllers\parametro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class parametroController extends Controller
{
    public function mostrar()
    {
        return view('parametro.parametro');
    }
}