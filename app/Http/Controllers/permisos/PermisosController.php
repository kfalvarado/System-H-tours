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

		$rols = http::withToken(Cache::get('token'))->get($this->url.'/roles/sel_rol');
        //return $rols;
        $rolsArr = $rols->json();

		// return $rolsArr;
       
	return view('permisos.permisos',compact('rolsArr'));
	}
}
