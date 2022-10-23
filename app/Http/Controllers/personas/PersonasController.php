<?php

namespace App\Http\Controllers\personas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    public function inicio()
    {
       return view('personas.personas');
    }
}
