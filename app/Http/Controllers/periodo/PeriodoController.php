<?php

namespace App\Http\Controllers\periodo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    public function mostrar()
    {
       return view('periodo.periodo');
    }
    public function mostrarPDF()
    {
        return view('periodo.periodoPDF');
    }
}
