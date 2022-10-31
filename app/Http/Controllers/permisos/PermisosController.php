<?php

namespace App\Http\Controllers\permisos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermisosController extends Controller
{
    public function mostrar()
	{
	return view('permisos.permisos');
	}
}
