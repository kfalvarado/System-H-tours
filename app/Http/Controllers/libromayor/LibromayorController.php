<?php

namespace App\Http\Controllers\libromayor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class LibromayorController extends Controller
{




	protected $url = 'http://localhost:3000';
	public function mostrar()
	{



		/**
		 * Seguridad de roles y perimisos metodo GET
		 */

		try {

			$search = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/sel_per_obj', [
				"PV_ROL" => Cache::get('rol'),
				"PV_OBJ" => "LIBROMAYOR"
			]);

			$permisos = $search->json();
			foreach ($permisos as $key) {
				$consultar = $key['PER_CONSULTAR'];
			}

			// if ($consultar == '1'){
			// 	return 'si';
			// }else{
			// 	return 'no';
			// }

		} catch (\Throwable $th) {
			return 'Error Libro Mayor 46';
		}


		try {

			$clasificacion = http::withToken(Cache::get('token'))->get($this->url . '/clasificacion');
			$clasificacionArr = $clasificacion->json();
			//nombre de cuenta
			$nombrecuenta = http::withToken(Cache::get('token'))->get($this->url . '/cuentas');
			$nombrecuentaArr = $nombrecuenta->json();

			$periodo = http::withToken(Cache::get('token'))->get($this->url . '/periodo');
			$periodoArr = $periodo->json();


			# code...
		} catch (\Throwable $th) {
			return 'error libro diario 29';
		}


		try {

			$libromayor = http::withToken(Cache::get('token'))->get($this->url . '/libromayor');

			$personArr = $libromayor->json();


			# code...
		} catch (\Throwable $e) {
			return 'error libro mayor 30';
		}



		try {
			$bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [

				"USR" => Cache::get('user'),
				"ACCION" => 'PANTALLA METODO GET',
				"DES" => Cache::get('user') . 'INGRESO A LA PANTALLA DE LIBRO MAYOR',
				"OBJETO" => 'LIBROMAYOR'

			]);
		} catch (\Throwable $th) {
			return 'Error Libro Mayor 92';
		}

		return view('libromayor.libromayor', compact('personArr', 'clasificacionArr', 'nombrecuentaArr', 'periodoArr'));
	}



	public function insertar(Request $request)
	{

		try {

			if ($request->transaccion == '1') {
				# code...

				$insertar = Http::withToken(Cache::get('token'))->post($this->url . '/libromayor/insertar', [

					"COD_PERIODO" => $request->periodo,
					"NOM_CUENTA" => $request->cuenta,
					"SAL_DEBE" => $request->saldo,
					"SAL_HABER" => 0,



				]);
			} elseif ($request->transaccion == '0') {

				$insertar = Http::withToken(Cache::get('token'))->post($this->url . '/libromayor/insertar', [

					"COD_PERIODO" => $request->periodo,
					"NOM_CUENTA" => $request->cuenta,
					"SAL_DEBE" => 0,
					"SAL_HABER" => $request->saldo,


				]);
			}
		} catch (\Throwable $e) {
			return 'Error libromayor 44';
		}




		try {
			$bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [

				"USR" => Cache::get('user'),
				"ACCION" => 'PANTALLA METODO POST',
				"DES" => Cache::get('user') . 'INSERTO EL DATO DE '.$request->libromayor.'EN LA PANTALLA DE LIBRO MAYOR',
				"OBJETO" => 'LIBROMAYOR'

			]);
		} catch (\Throwable $th) {
			return 'Error Libro Mayor 43';
		}



		Session::flash('insertado', '1');
		return back();


		
	}



	public function mayorizacion(Request $request)
	{


		$insertar = Http::withToken(Cache::get('token'))->post($this->url . '/libromayor/mayorizacion', [

			"COD_PERIODO" => $request->periodo,
			"NOM_CUENTA" => $request->cuenta,

		]);
		// return $request;
		Session::flash('insertado', '1');
		return back();


	}


	// CONSULTA DE LA MISMA FORMA DEL METODO INSERT SOBRE EL DEBE Y HABER, SI ACTUALIZO L 50 EN DEBE A L 500 ESTA BIEN...
	// PERO SI ACTUALIZO DE ESOS L 50 EN DEBE A HABER ES ES PROBLEMA POR LAS MISMAS TRAS VARIABLES. (ARCHIVO= libromayor.blade)
	public function actualizar(Request $request)
	{

		try {
			if($request->transaccion == '1'){
			$actualizar = Http::withToken(Cache::get('token'))->put($this->url . '/libromayor/actualizar/' . $request->f, [




				"COD_PERIODO" => $request->clasificacionperiodo,
				"NOM_CUENTA" => $request->nombrecuenta,
				"SAL_DEBE" => $request->saldo,
				"SAL_HABER" => 0,
			]);
		}elseif ($request->transaccion == '0'){

			$actualizar = Http::withToken(Cache::get('token'))->put($this->url . '/libromayor/actualizar/' . $request->f, [

				"COD_PERIODO" => $request->clasificacionperiodo,
				"NOM_CUENTA" => $request->nombrecuenta,
				"SAL_DEBE" => 0,
				"SAL_HABER" => $request->saldo,
			]);

		}

			# code...
		} catch (\Throwable $e) {
			# code...
			return 'error libro mayor 76';
		}

		try {
			$bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [

				"USR" => Cache::get('user'),
				"ACCION" => 'PANTALLA METODO PUT',
				"DES" => Cache::get('user') . 'ACTUALIZO EL DATO DE  '.$request->libromayor.'EN LA PANTALLA DE LIBRO MAYOR',
				"OBJETO" => 'LIBROMAYOR'

			]);
		} catch (\Throwable $th) {
			return 'Error Libro Mayor 43';
		}





		Session::flash('actualizado', '1');
		return back();


		// return $request;

	}

	// ELIMINADO NORMAL NO ELIMINA PERO POR QUE DEBE SER ELIMINADO LOGICO
	public function eliminar(Request $request)
	{
		return $request;
		$delete = Http::withToken(Cache::get("token"))->delete($this->url . '/libromayor/eliminar/' . $request->f);




		try {
			$bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [

				"USR" => Cache::get('user'),
				"ACCION" => 'ELIMINO UN DATO',
				"DES" => Cache::get('user') . 'ELIMINO EL DATO CON CODIGO DE  '.$request->libromayor.'EN LA PANTALLA DE LIBRO MAYOR',
				"OBJETO" => 'LIBROMAYOR'

			]);
		} catch (\Throwable $th) {
			return 'Error Libro Mayor 43';
		}


		Session::flash('eliminado', '1');
		return back();


		// return $request;

	}

	public function pdf()
	{
		$libromayor = http::withToken(Cache::get('token'))->get($this->url . '/libromayor');

		$mayor = $libromayor->json();

		return view('libromayor.mayorPDF', compact('mayor'));
	}
}
