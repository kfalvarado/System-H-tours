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
		$rols = http::withToken(Cache::get('token'))->get($this->url . '/roles/sel_rol');
		// return $rols;
		$rolsArr = $rols->json();

		$objetos =  http::withToken(Cache::get('token'))->get($this->url . '/objetos');
		$objetos = $objetos->json();

		Cache::put('permisosa', '1');


		return view('permisos.permisos', compact('rolsArr', 'objetos'));
	}

	public function roles(Request $request)
	{
		Cache::forget('permisosa');
		$objetos =  http::withToken(Cache::get('token'))->get($this->url . '/objetos');
		$objetos = $objetos->json();

		$rols = http::withToken(Cache::get('token'))->get($this->url . '/roles/sel_rol');
		// return $rols;
		$rolsArr = $rols->json();

		$permisos = http::withToken(Cache::get('token'))->post($this->url . '/permisos/sel_per_rol', [
			"PV_ROL" => $request->rol
		]);
		$elrol = $request->rol;

		$permisos = $permisos->json();
		// return $permisos;
		Session::flash('rol',$elrol);
		return view('permisos.permisos', compact('rolsArr', 'permisos','objetos'));
	}
}
