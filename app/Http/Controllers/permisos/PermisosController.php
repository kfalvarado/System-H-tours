<?php

namespace App\Http\Controllers\permisos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;


class PermisosController extends Controller
{
	protected $url = 'http://localhost:3000';
    public function mostrar()
	{

	return view('permisos.permisos');
	}
}
