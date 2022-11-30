<?php

namespace App\Http\Controllers\libromayor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class LibromayorController extends Controller
{



	// MOSTRAR FUNCIONAL
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


	// INSERTAR FUNCIONAL
	public function insertar(Request $request)
	{
		// return $request;
		try {

		
				# code...

				$cargo = Http::withToken(Cache::get('token'))->post($this->url . '/libromayor/insertar', [

					"COD_PERIODO" => $request->periodo,
					"NOM_CUENTA" => $request->cuenta_cargo,
					"SAL_DEBE" => $request->saldo_cargo,
					"SAL_HABER" => 0,



				]);
		
				$abono = Http::withToken(Cache::get('token'))->post($this->url . '/libromayor/insertar', [

					"COD_PERIODO" => $request->periodo,
					"NOM_CUENTA" => $request->cuenta_abono,
					"SAL_DEBE" => 0,
					"SAL_HABER" => $request->saldo_abono,


				]);
			
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


	// MAYORIZACION FUNCIONAL
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


	// ACTUALIZAR FUNCIONAL
	public function actualizar(Request $request)
	{

		try {
			if($request->transaccion == '1'){
			$actualizar = Http::withToken(Cache::get('token'))->put($this->url . '/libromayor/actualizar/' . $request->f, [




				"COD_PERIODO" => $request->periodo,
				"NOM_CUENTA" => $request->cuenta,
				"SAL_DEBE" => $request->saldo,
				"SAL_HABER" => 0,
			]);
		}elseif ($request->transaccion == '0'){

			$actualizar = Http::withToken(Cache::get('token'))->put($this->url . '/libromayor/actualizar/' . $request->f, [

				"COD_PERIODO" => $request->periodo,
				"NOM_CUENTA" => $request->cuenta,
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

	// ELIMINAR FUNCIONAL
	public function eliminar(Request $request)
	{

		$delete = Http::withToken(Cache::get("token"))->delete($this->url . '/libromayor/eliminar/' . $request->f,);




		try {
			$bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [

				"USR" => Cache::get('user'),
				"ACCION" => 'ELIMINO UN DATO',
				"DES" => Cache::get('user') . 'ELIMINO EL DATO CON CODIGO DE  '.$request->f. 'EN LA PANTALLA DE LIBRO MAYOR',
				"OBJETO" => 'LIBROMAYOR'

			]);
		} catch (\Throwable $th) {
			return 'Error Libro Mayor 43';
		}


		Session::flash('eliminado', '1');
		return back();


		// return $request;

	}


	// FUNCION PARA PDF FUNCIONAL 
	public function pdf()
	{
		$libromayor = http::withToken(Cache::get('token'))->get($this->url . '/libromayor');

		$mayor = $libromayor->json();

		return view('libromayor.mayorPDF', compact('mayor'));
	}
}
