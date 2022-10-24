<?php

namespace App\Http\Controllers\clasificacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClasificacionController extends Controller
{
    public function mostrar()
    {
        return view('clasificacion.clasificacion');
    }
}
