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
		/*
		* Seguridad de roles y perimisos metodo GET
		*/

		try {
			//code...
			$search = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/sel_per_obj', [
				"PV_ROL" => Cache::get('rol'),
				"PV_OBJ" => "PERMISOS"
			]);

			$permisos = $search->json();
			$consultar = 0;
			foreach ($permisos as $key) {
				$consultar = $key['PER_CONSULTAR'];
			}
		} catch (\Throwable $th) {
			//throw $th;
			return 'Error rol 24';
		}

		if ( $consultar == '1') {
			try {
				$rols = http::withToken(Cache::get('token'))->get($this->url . '/roles/sel_rol');
				// return $rols;
				$rolsArr = $rols->json();

				$objetos =  http::withToken(Cache::get('token'))->get($this->url . '/objetos');
				$objetos = $objetos->json();
				Cache::put('permisosa', '1');
			} catch (\Throwable $th) {
				//throw $th;
				return 'error PERMISOS 41';
			}

			try {
				$bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
					"USR" => Cache::get('user'),
					"ACCION" => 'PANTALLA ROLES METODO GET',
					"DES" => Cache::get('user') . ' INGRESO A LA PANTALLA DE ROLES',
					"OBJETO" => 'PERMISOS'
				]);
			} catch (\Throwable $th) {
				//throw $th;
				return 'ERROR PERMISOS ';
			}
		} else {
			$bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
				"USR" => Cache::get('user'),
				"ACCION" => 'ACCESO NO AUTORIZADO PERMISOS METODO GET',
				"DES" => Cache::get('user') . ' INTENTO INGRESAR A LA PANTALLA DE PERMISOS',
				"OBJETO" => 'PERMISOS'
			]);
			return view('Auth.no-auth');
		}


		return view('permisos.permisos', compact('rolsArr', 'objetos'));
	}

	public function roles(Request $request)
	{
		/*
		* Seguridad de roles y perimisos metodo GET
		*/

		try {
			//code...
			$search = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/sel_per_obj', [
				"PV_ROL" => Cache::get('rol'),
				"PV_OBJ" => "PERMISOS"
			]);

			$permisos = $search->json();
			$consultar = 0;
			foreach ($permisos as $key) {
				$consultar = $key['PER_CONSULTAR'];
			}
		} catch (\Throwable $th) {
			//throw $th;
			return 'Error rol 24';
		}

		if ( $consultar == '1') {
			try {
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
				Session::flash('rol', $elrol);
			} catch (\Throwable $th) {
				//throw $th;
				return 'error PERMISOS 41';
			}

			try {
				$bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
					"USR" => Cache::get('user'),
					"ACCION" => 'PANTALLA  METODO GET',
					"DES" => Cache::get('user') . ' EJECUTO LA FUNCION DE ROLES EN PERMISOS',
					"OBJETO" => 'PERMISOS'
				]);
			} catch (\Throwable $th) {
				//throw $th;
				return 'ERROR PERMISOS ';
			}
			return view('permisos.permisos', compact('rolsArr', 'permisos', 'objetos'));
		} else {
			$bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
				"USR" => Cache::get('user'),
				"ACCION" => 'ACCESO NO AUTORIZADO PERMISOS METODO GET',
				"DES" => Cache::get('user') . ' INTENTO CONSULTAR LOS ROLES  EN LA PANTALLA DE PERMISOS',
				"OBJETO" => 'PERMISOS'
			]);
			return view('Auth.no-auth');
		}
	}

	public function insertar(Request $request)
	{
		/**
		 * Seguridad de roles y perimisos metodo GET
		 */

		try {
			//code...
			$search = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/sel_per_obj', [
				"PV_ROL" => Cache::get('rol'),
				"PV_OBJ" => "PERMISOS"
			]);

			$permisos = $search->json();
			$insercion = 0;
			foreach ($permisos as $key) {
				$insercion = $key['PER_INSERCION'];
			}
		} catch (\Throwable $th) {
			//throw $th;
			return 'Error ROLES 21';
		}
		if ($insercion == '1') {
			try {
				//validar informacion entrante
				if (isset($request->PERMISO_INSERCION)) {
					$insertar = 1;
				} else {
					$insertar = 0;
				}
				if (isset($request->PERMISO_ELIMINACION)) {
					$eliminar = 1;
				} else {
					$eliminar = 0;
				}
				if (isset($request->PERMISO_ACTUALIZACION)) {
					$actualizar = 1;
				} else {
					$actualizar = 0;
				}
				if (isset($request->PERMISO_CONSULTAR)) {
					$consultar = 1;
				} else {
					$consultar = 0;
				}

				$ins = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/ins_permiso', [
					"PB_COD_ROL" => $request->rol,
					"PB_COD_OBJETO" => $request->objeto,
					"PV_PER_INSERCION" => $insertar,
					"PV_PER_ELIMINAR" => $eliminar,
					"PV_PER_ACTUALIZAR" => $actualizar,
					"PV_PER_CONSULTAR" => $consultar,

				]);
			} catch (\Throwable $th) {
				//throw $th;
				return 'Error ROL 99';
			}
			try {
				$bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
					"USR" => Cache::get('user'),
					"ACCION" => 'PANTALLA METODO POST',
					"DES" => Cache::get('user') . ' MODIFICO LOS PERMISOS DEL ROL ' . $request->rol . ' EN LA PANTALLA DE PERMISOS',
					"OBJETO" => 'PERMISOS'

				]);
			} catch (\Throwable $th) {
				//throw $th;
				return 'Error ROLES 207';
			}

			Session::flash('insertado', '1');
		} else {
			try {
				$bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
					"USR" => Cache::get('user'),
					"ACCION" => 'SIN PERMISO METODO POST',
					"DES" => Cache::get('user') . ' INTENTO MODIFICAR LOS PERMISOS DEL ROL' . $request->rol . ' EN LA PANTALLA DE PERMISOS',
					"OBJETO" => 'PERMISOS'

				]);

				Session::flash('sinpermiso', '1');
			} catch (\Throwable $th) {
				//throw $th;
				return 'Error ROLES 223';
			}
		}
		return redirect()->route('mostrar.permisos');
	}

	public function actualizar(Request $request)
	{
		/**
		 * Seguridad de roles y perimisos metodo GET
		 */

		try {
			//code...
			$search = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/sel_per_obj', [
				"PV_ROL" => Cache::get('rol'),
				"PV_OBJ" => "PERMISOS"
			]);

			$permisos = $search->json();
			$update = 0;
			foreach ($permisos as $key) {
				$update = $key['PER_ACTUALIZACION'];
			}
		} catch (\Throwable $th) {
			//throw $th;
			return 'Error ROLES 149';
		}

		if ($update == '1') {
			try {
				//validar informacion entrante
				if (isset($request->PERMISO_INSERCION)) {
					$insertar = 1;
				} else {
					$insertar = 0;
				}
				if (isset($request->PERMISO_ELIMINACION)) {
					$eliminar = 1;
				} else {
					$eliminar = 0;
				}
				if (isset($request->PERMISO_ACTUALIZACION)) {
					$actualizar = 1;
				} else {
					$actualizar = 0;
				}
				if (isset($request->PERMISO_CONSULTAR)) {
					$consultar = 1;
				} else {
					$consultar = 0;
				}
				// return $insertar.$eliminar.$actualizar.$consultar;
				// return $request->objeto;
				$act = Http::withToken(Cache::get('token'))->put($this->url . '/permisos/upd_permiso/' . $request->cod, [
					"PB_COD_ROL" => $request->rol,
					"PB_COD_OBJETO" => $request->objeto,
					"PV_PER_INSERCION" => $insertar,
					"PV_PER_ELIMINAR" => $eliminar,
					"PV_PER_ACTUALIZAR" => $actualizar,
					"PV_PER_CONSULTAR" => $consultar,

				]);
			} catch (\Throwable $th) {
				//throw $th;
				return 'error ROLES 164';
			}

			try {
				$bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
					"USR" => Cache::get('user'),
					"ACCION" => 'ACTUALIZO UN DATO EN PANTALLA ',
					"DES" => Cache::get('user') . ' ACTUALIZO EL DATO DE ' . $request->rol . ' EN LA PANTALLA DE PERMISOS',
					"OBJETO" => 'PERMISOS'

				]);
			} catch (\Throwable $th) {
				//throw $th;
				return 'Error PERMISOS 32';
			}
		} else {
			try {
				$bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
					"USR" => Cache::get('user'),
					"ACCION" => 'SIN PERMISO METODO PUT',
					"DES" => Cache::get('user') . ' INTENTO ACTUALIZAR EL DATO ' . $request->rol . ' EN LA PANTALLA DE PERMISOS',
					"OBJETO" => 'PERMISOS'

				]);

				Session::flash('sinpermiso', '1');
			} catch (\Throwable $th) {
				//throw $th;
				return 'Error PERMISOS 313';
			}
		}

		Session::flash('actualizado', '1');
		return redirect()->route('mostrar.permisos');
	}

	public function eliminar(Request $request)
	{

		/**
		 * Seguridad de roles y perimisos metodo delete
		 */

		try {
			//code...
			$search = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/sel_per_obj', [
				"PV_ROL" => Cache::get('rol'),
				"PV_OBJ" => "PERMISOS"
			]);

			$permisos = $search->json();
			$eliminacion = 0;
			foreach ($permisos as $key) {
				$eliminacion = $key['PER_ELIMINACION'];
			}
		} catch (\Throwable $th) {
			//throw $th;
			return 'Error PERMISOS 21';
		}

		if ($eliminacion == '1') {

			try {
				$eliminar = http::withToken(Cache::get('token'))->delete($this->url . '/permisos/del_permiso/' . $request->f);
				Session::flash('eliminado', '1');
			} catch (\Throwable $th) {
				//throw $th;
				return 'Error PERMISOS 250';
			}
			try {
				$bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
					"USR" => Cache::get('user'),
					"ACCION" => 'ELIMINO UN DATO',
					"DES" => Cache::get('user') . ' ELIMINO EL DATO CON CODIGO ' . $request->f . ' EN LA PANTALLA DE PERMISOS',
					"OBJETO" => 'PERMISOS'

				]);
			} catch (\Throwable $th) {
				//throw $th;
				return 'Error PERMISOS 250';
			}
		} else {
			# code...
			try {
				$bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
					"USR" => Cache::get('user'),
					"ACCION" => 'SIN PERMISO METODO DELETE',
					"DES" => Cache::get('user') . ' INTENTO ELIMININAR EL DATO  con codigo' . $request->f . ' EN LA PANTALLA DE PERMISOS',
					"OBJETO" => 'PERMISOS'

				]);

				Session::flash('sinpermiso', '1');
			} catch (\Throwable $th) {
				//throw $th;
				return 'Error PERMISOS 268';
			}
		}

		return redirect()->route('mostrar.permisos');
	}
	public function pdf()
	{
		$permisos = http::withToken(Cache::get('token'))->get($this->url . '/permisos/sel_per');
		// return $rols;
		$permisos = $permisos->json();
		return view('permisos.permisospdf', compact('permisos'));
	}
}
