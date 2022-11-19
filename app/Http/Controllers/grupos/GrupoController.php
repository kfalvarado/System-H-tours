<?php

namespace App\Http\Controllers\grupos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
   public function vista()
   {
    return view('grupos.grupo');
   }
}
