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

		$libromayor =http::withToken(Cache::get('token'))->get($this->url.'/libromayor');

		$personArr = $libromayor->json();
        return view('libromayor.libromayor', compact('personArr'));
	}



	// CONSULTAR CUANDO SE ENVIAN LOS DATOS CON return $request; LOS DATOS NO ESTAN EN ORDEN CON POSTMAN ARREGLADO YA.
	// CONSULTAR SOBRE AL INSERTAR DEBE O HABER, HAY TRES VARIABLES SALDO, SALDO DEBE Y SALDO HABER, Y CUANDO INSERTO...
	// ...ES EN SALDO Y LAS OTRAS SON SOLO RADIO BUTTON, COMO INSERTAR SOLO EN DEBE O EN HABER SI SOLO SE INSERTA EN SALDO. (ARCHIVO= libromayor.blade)
	public function insertar(Request $request)
	{
		
		try {

		$insertar = Http::withToken(Cache::get('token'))->post($this->url.'/libromayor/insertar',[

			"COD_PERIODO"=>$request->clasificaionperiodo,
			"NOM_CUENTA" => $request->nombrecuenta,
			"SAL_DEBE" => $request->saldo,
			"SAL_HABER" => $request->saldo,
		
	

		]);
		} catch (\Throwable $e) {
			return 'Error libromayor 44';
		}
		Session::flash('insertado', '1');
		return back();


		// return $request;
	}


	// CONSULTA DE LA MISMA FORMA DEL METODO INSERT SOBRE EL DEBE Y HABER, SI ACTUALIZO L 50 EN DEBE A L 500 ESTA BIEN...
	// PERO SI ACTUALIZO DE ESOS L 50 EN DEBE A HABER ES ES PROBLEMA POR LAS MISMAS TRAS VARIABLES. (ARCHIVO= libromayor.blade)
	public function actualizar(Request $request)
	{
		
		try {	

			$actualizar = Http::withToken(Cache::get('token'))->put($this->url.'/libromayor/actualizar/'.$request->f,[




				"COD_PERIODO" => $request->clasificacionperiodo,
				"NOM_CUENTA" => $request->nombrecuenta,
				"SAL_DEBE" => $request->saldo,
				"SAL_HABER" => $request->saldo,
			]);

			# code...
		} catch (\Throwable $e) {
			# code...
			return 'error libro mayor 76';
		}		

		Session::flash('actualizado', '1');
		return back();
		
		
		// return $request;
	
	}

// ELIMINADO NORMAL NO ELIMINA PERO POR QUE DEBE SER ELIMINADO LOGICO
	public function eliminar(Request $request)
	{

		$delete = Http::withToken(Cache::get("Token"))->delete($this->url.'/libromayor/eliminar/'.$request->f,);

		Session::flash('eliminado','1');
		return back();


		// return $request;

	}
	
}