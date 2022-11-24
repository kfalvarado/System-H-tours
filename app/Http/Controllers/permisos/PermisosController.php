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

	public function insertar(Request $request)
	{
		
		//validar informacion entrante
		if (isset($request->PERMISO_INSERCION)) {
			$insertar = 1;
		}else {
			$insertar = 0;
		}
		if (isset($request->PERMISO_ELIMINACION)) {
			$eliminar = 1;
		}else {
			$eliminar = 0;
		}
		if (isset($request->PERMISO_ACTUALIZACION)) {
			$actualizar = 1;
		}else {
			$actualizar = 0;
		}
		if (isset($request->PERMISO_CONSULTAR)) {
			$consultar = 1;
		}else {
			$consultar = 0;
		}

		$ins = Http::withToken(Cache::get('token'))->post($this->url . '/periodo/insertar', [
			"USR" => Cache::get('user'),
			"NOM_PERIODO" => $request->periodo,
			"FEC_INI" => $request->inicial,
			"FEC_FIN" => $request->final,
			"ESTADO" => $request->estado
		]);
		

	}

	public function actualizar(Request $request)
	{
		return $request;
	}
}
