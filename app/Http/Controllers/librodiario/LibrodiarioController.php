<?php

namespace App\Http\Controllers\librodiario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class LibrodiarioController extends Controller
{




    protected $url = 'http://localhost:3000';
    public function mostrar()
    {
        try {
            
        $librodiario =http::withToken(Cache::get('token'))->get($this->url.'/librodiario');
        
        $personArr = $librodiario->json();
        return view('librodiario.librodiario', compact('personArr'));

            # code...
        } catch (\Throwable $e) {
            return 'error libro diario 29';
        }

        try {
            $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                "USR" => Cache::get('user'),
                "ACCION" => 'PANTALLA METODO GET',
                "DES" => Cache::get('user') . ' INGRESO A LA PANTALLA DE PERIODO',
                "OBJETO" => 'PERIODO'

            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error periodo 32';
        }
        



    }


    // CONSULTARLO NO FUNCIONAL
    public function insertar(Request $request)
    {

        try {

            $insertar = Http::withToken(Cache::get('token'))->post($this->url.'/librodiario/insertar',[
    
     



                // "COD_PERIODO" => $request->???,
                "NUM_CUENTA" => $request->cuenta,
                "NOM_SUBCUENTA" => $request->nombresubcuenta,
                "SAL_DEBE"=> $request->saldo,
                "SAL_HABER"=> $request->saldo,
            
        
    
            ]);
            } catch (\Throwable $e) {
                return 'Error librodiario 47';
            }
            Session::flash('insertado', '1');
            return back();
    



        return $request;
    }


// CONSULTAR POR QUE COD PERIODO LO PIDE EL PROCEDIMIENTO Y ESTE NO ESTAN EN LA VISTA ENTONCES PASE LA CUENTA ...
// QUE DE NON_CUENTA (NUMERO DE LA CUENTA) LA MISMA VARIBALE A COD_PERIDOO PARA QUE FUNCIONE EL PROCEMDIMIENTO
    public function actualizar(Request $request)
	{
		
		try {	

			$actualizar = Http::withToken(Cache::get('token'))->put($this->url.'/librodiario/actualizar/'.$request->f,[


                "COD_PERIODO"=> $request->cuenta,
                "NOM_CUENTA"=> $request->cuenta,
                "NOM_SUBCUENTA"=> $request->nombresubcuenta,
                "SAL_DEBE"=> $request->saldo,
                "SAL_HABER"=> $request->saldo,
			]);

			# code...
		} catch (\Throwable $e) {
			# code...
			return 'error libro diario 80';
		}		

		Session::flash('actualizado', '1');
		return back();
		
		
		// return $request;
	
	}


    // ELIMINADO NORMAL NO ELIMINA PERO POR QUE DEBE SER ELIMINADO LOGICO
    public function eliminar(Request $request)
	{

		$delete = Http::withToken(Cache::get("Token"))->delete($this->url.'/librodiario/eliminar/'.$request->f,);

		Session::flash('eliminado','1');
		return back();


		// return $request;

	}
	






}
