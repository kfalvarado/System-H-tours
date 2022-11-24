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

		$ins = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/ins_permiso', [
			"PB_COD_ROL"=>$request->rol,
			"PB_COD_OBJETO"=>$request->objeto,
			"PV_PER_INSERCION"=>$insertar,
			"PV_PER_ELIMINAR"=>$eliminar,
			"PV_PER_ACTUALIZAR"=>$actualizar,
			"PV_PER_CONSULTAR"=>$consultar,

	]);

		Session::flash('insertado','1');
		return redirect()->route('mostrar.permisos');

	}

	public function actualizar(Request $request)
	{
		// return $request;
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
		// return $insertar.$eliminar.$actualizar.$consultar;
		// return $request->objeto;
		$act = Http::withToken(Cache::get('token'))->put($this->url . '/permisos/upd_permiso/'.$request->cod, [
			"PB_COD_ROL"=>$request->rol,
			"PB_COD_OBJETO"=>$request->objeto,
			"PV_PER_INSERCION"=>$insertar,
			"PV_PER_ELIMINAR"=>$eliminar,
			"PV_PER_ACTUALIZAR"=>$actualizar,
			"PV_PER_CONSULTAR"=>$consultar,

	]);

		Session::flash('actualizado','1');
		return redirect()->route('mostrar.permisos');
		
	}
}
