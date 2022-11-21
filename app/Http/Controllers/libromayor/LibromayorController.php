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

		$libromayor =http::withToken(Cache::get('token'))->get($this->url.'/libromayor');

		$personArr = $libromayor->json();
       

			# code...
		} catch (\Throwable $e) {
			return 'error libro mayor 30';
		}



	try {
            $bitacora = Http::withToken(Cache::get('token'))->post($this->url.'/seguridad/bitacora/insertar',[
    
                "USR" => Cache::get('user'),
                "ACCION" => 'PANTALLA METODO GET',
                "DES" => Cache::get('user') . 'INGRESO A LA PANTALLA DE LIBRO MAYOR',
                "OBJETO" => 'LIBROMAYOR'
    
            ]);
    
            } catch (\Throwable $th) {
                return 'Error Libro Mayor 43';
            }
            
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


		try {
            $bitacora = Http::withToken(Cache::get('Token'))->post($this->url.'/seguridad/bitacora/insertar',[
    
                "USR" => Cache::get('user)'),
                "ACCION" => 'PANTALLA METODO POST',
                "DES" => Cache::get('user') . 'INSERTO EL DATO DE'.$request->libromayor.' A LA PANTALLA DE LIBRO MAYOR',
                "OBJETO" => 'LIBROMAYOR'
    
            ]);
    
            } catch (\Throwable $th) {
                return 'Error Libro Mayor 43';
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

		try {
            $bitacora = Http::withToken(Cache::get('Token'))->post($this->url.'/seguridad/bitacora/insertar',[
    
                "USR" => Cache::get('user)'),
                "ACCION" => 'ACTUALIZO UN DATO EN PANTALLA ',
                "DES" => Cache::get('user') . 'ACTUALIZO EL DATO DE'.$request->libromayor.' A LA PANTALLA DE LIBRO MAYOR',
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

		$delete = Http::withToken(Cache::get("Token"))->delete($this->url.'/libromayor/eliminar/'.$request->f,);


		

        try {
            $bitacora = Http::withToken(Cache::get('Token'))->post($this->url.'/seguridad/bitacora/insertar',[
    
                "USR" => Cache::get('user)'),
                "ACCION" => 'ELIMINO UN DATO ',
                "DES" => Cache::get('user') . 'ACTUALIZO EL DATO CON CODIGO'.$request->f.' A LA PANTALLA DE LIBRO MAYOR',
                "OBJETO" => 'LIBROMAYOR'
    
            ]);
    
            } catch (\Throwable $th) {
                return 'Error Libro Mayor 43';
            }

		Session::flash('eliminado','1');
		return back();


		// return $request;

	}
	
}