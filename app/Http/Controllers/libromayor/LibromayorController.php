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



	// CONSULTAR CUANDO SE ENVIAN LOS DATOS CON return $request; LOS DATOS NO ESTAN EN ORDEN CON POSTMAN 
	public function insertar(Request $request)
	{
		
		try {

		$insertar = Http::withToken(Cache::get('token'))->post($this->url.'/libromayor/insertar',[

			"COD_PERIODO"=>$request->clasificaion,
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


	
}