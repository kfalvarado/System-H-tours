<?php

namespace App\Http\Controllers\objeto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class objetoController extends Controller
{
    public function mostrar()
    {
        return view('objeto.objeto');
    }
}
