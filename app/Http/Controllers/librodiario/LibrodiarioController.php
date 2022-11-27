<?php

namespace App\Http\Controllers\librodiario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class LibrodiarioController extends Controller
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
                "PV_OBJ" => "LIBRODIARIO"
            ]);

            $permisos = $search->json();
            foreach ($permisos as $key) {
                $insercion = $key['PER_INSERCION'];
            }
        } catch (\Throwable $e) {
            return 'Error Libro Diario 40';
        }


        try {

            $clasificacion = http::withToken(Cache::get('token'))->get($this->url . '/clasificacion');
            $clasificacionArr = $clasificacion->json();
            //nombre de cuenta
            $nombrecuenta = http::withToken(Cache::get('token'))->get($this->url . '/cuentas');
            $nombrecuentaArr = $nombrecuenta->json();

            $periodo = http::withToken(Cache::get('token'))->get($this->url . '/periodo');
            $periodoArr = $periodo->json();


            $librodiario = http::withToken(Cache::get('token'))->get($this->url . '/librodiario');
            $personArr = $librodiario->json();


            # code...
        } catch (\Throwable $th) {
            return 'error libro diario 29';
        }

        try {
            $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [

                "USR" => Cache::get('user'),
                "ACCION" => 'PANTALLA METODO GET',
                "DES" => Cache::get('user') . 'INGRESO A LA PANTALLA DE LIBRO DIARIO',
                "OBJETO" => 'LIBRODIARIO'

            ]);
        } catch (\Throwable $th) {
            return 'Error Libro Mayor 43';
        }

        return view('librodiario.librodiario', compact('personArr', 'clasificacionArr', 'nombrecuentaArr', 'periodoArr'));
    }
    



    
    public function insertar(Request $request)
    {
        // return $request;
        if (isset($request->comprobante)) {
            $request->validate([
                "comprobante"=>'required|image|max:2048'
            ]);

            $imagenes =  $request->file('comprobante')->store('public/comprobantesimg');

            $url = Storage::url($imagenes);
            // return $url;
          }

       

        try {
            if ($request->transaccion == '1') {

                $insertar = Http::withToken(Cache::get('token'))->post($this->url . '/librodiario/insertar', [


                    "COD_PERIODO" => $request->periodo,
                    "NOM_CUENTA" => $request->cuenta,
                    "NOM_SUBCUENTA" => $request->nombresubcuenta,
                    "SAL_DEBE" => $request->saldo,
                    "SAL_HABER" => 0,


                ]);
            } elseif ($request->transaccion == '0') {


                $insertar = Http::withToken(Cache::get('token'))->post($this->url . '/librodiario/insertar', [


                    "COD_PERIODO" => $request->periodo,
                    "NOM_CUENTA" => $request->cuenta,
                    "NOM_SUBCUENTA" => $request->nombresubcuenta,
                    "SAL_DEBE" => 0,
                    "SAL_HABER" => $request->saldo,


                ]);
            }

            //despues de insertar vamos a guardar el comprobante
            if (isset($request->comprobante)) {

                $comprobante = Http::withToken(Cache::get('token'))->post($this->url . '/comprobantes/insertar', [
                    "NOMBRE" => $url
                ]);
            }else {
                $comprobante = Http::withToken(Cache::get('token'))->post($this->url . '/comprobantes/insertar', [
                    "NOMBRE" => 'Transaccion sin compronte'
                ]);
            }
        } catch (\Throwable $e) {
            return 'Error librodiario 47';
        }


        try {
            $bitacora = Http::withToken(Cache::get('Token'))->post($this->url . '/seguridad/bitacora/insertar', [

                "USR" => Cache::get('user)'),
                "ACCION" => 'PANTALLA METODO POST',
                "DES" => Cache::get('user') . 'INSERTO EL DATO DE' . $request->librodiario . ' A LA PANTALLA DE LIBRO DIARIO',
                "OBJETO" => 'LIBRODIARIO'

            ]);
        } catch (\Throwable $th) {
            return 'Error Libro Diario 43';
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
            if ($request->transaccion == '1') {
			$actualizar = Http::withToken(Cache::get('token'))->put($this->url.'/librodiario/actualizar/'.$request->f,[


                "COD_PERIODO"=> $request->periodo,
                "NOM_CUENTA"=> $request->cuenta,
                "NOM_SUBCUENTA"=> $request->nombresubcuenta,
                "SAL_DEBE"=> $request->saldo,
                "SAL_HABER"=> 0,
			]);

        } elseif ($request->transaccion == '0') {

            $actualizar = Http::withToken(Cache::get('token'))->put($this->url.'/librodiario/actualizar/'.$request->f,[


                "COD_PERIODO"=> $request->periodo,
                "NOM_CUENTA"=> $request->cuenta,
                "NOM_SUBCUENTA"=> $request->nombresubcuenta,
                "SAL_DEBE"=> 0,
                "SAL_HABER"=> $request->saldo,
			]);
        }

			# code...
		} catch (\Throwable $e) {
			# code...
			return 'error libro diario 80';
		}		




        
        try {
            $bitacora = Http::withToken(Cache::get('Token'))->post($this->url.'/seguridad/bitacora/insertar',[
    
                "USR" => Cache::get('user)'),
                "ACCION" => 'ACTUALIZO UN DATO EN PANTALLA ',
                "DES" => Cache::get('user') . 'ACTUALIZO EL DATO DE'.$request->libromayor.' A LA PANTALLA DE LIBRO DIARIO',
                "OBJETO" => 'LIBRODIARIO'
    
            ]);
    
            } catch (\Throwable $th) {
                return 'Error Libro diario 43';
            }
            

		Session::flash('actualizado', '1');
		return back();
		
		
		// return $request;
	
	}


    // ELIMINADO NORMAL NO ELIMINA PERO POR QUE DEBE SER ELIMINADO LOGICO
    public function eliminar(Request $request)
	{

		$delete = Http::withToken(Cache::get("Token"))->delete($this->url.'/librodiario/eliminar/'.$request->f,);


        try {
            $bitacora = Http::withToken(Cache::get('Token'))->post($this->url.'/seguridad/bitacora/insertar',[
    
                "USR" => Cache::get('user)'),
                "ACCION" => 'ELIMINO UN DATO ',
                "DES" => Cache::get('user') . 'ACTUALIZO EL DATO CON CODIGO'.$request->f.' A LA PANTALLA DE LIBRO DIARIO',
                "OBJETO" => 'LIBRODIARIO'
    
            ]);
    
            } catch (\Throwable $th) {
                return 'Error Libro Diario 43';
            }
            

		Session::flash('eliminado','1');
		return back();


		// return $request;

	}
	

    public function pdf()
    {
        $librodiario = http::withToken(Cache::get('token'))->get($this->url . '/librodiario');
        $libro = $librodiario->json();


        return view('librodiario.libroDpdf',compact('libro'));
    }





}
