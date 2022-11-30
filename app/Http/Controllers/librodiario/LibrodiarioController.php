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


    //MOSTRAR FUNCIONAL 
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
                $consultar = $key['PER_CONSULTAR'];
            }
        } catch (\Throwable $e) {
            return 'Error Libro Diario 39';
        }

        
        if (isset($consultar) == '1') {
            



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

                $subcuentas = http::withToken(Cache::get('token'))->get($this->url . '/subcuentas');
                $subcuentas = $subcuentas->json();


                # code...
            } catch (\Throwable $th) {
                return 'error libro diario 64';
            }

            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [

                    "USR" => Cache::get('user'),
                    "ACCION" => 'PANTALLA METODO GET',
                    "DES" => Cache::get('user') . 'INGRESO A LA PANTALLA DE LIBRO DIARIO',
                    "OBJETO" => 'LIBRODIARIO'

                ]);
            } catch (\Throwable $th) {
                return 'Error Libro Mayor 77';
            }

            
        } else {
            return view('Auth.no-auth');
        }

        return view('librodiario.librodiario', compact('personArr', 'clasificacionArr', 'nombrecuentaArr', 'periodoArr', 'subcuentas'));
    }




    // INSERTAR FUNCIONAL
    public function insertar(Request $request)
    {




        /**
         * Seguridad de roles y perimisos metodo INSERTAR
         */

        try {

            $search = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/sel_per_obj', [
                "PV_ROL" => Cache::get('rol'),
                "PV_OBJ" => "LIBRODIARIO"
            ]);

            $permisos = $search->json();
            foreach ($permisos as $key) {
                $consultar = $key['PER_CONSULTAR'];
            }
        } catch (\Throwable $e) {
            return 'Error Libro Diario 39';
        }

        if (isset($insercion) == '1'
        ) {


            // return $request;
            if (isset($request->comprobante)) {
                $request->validate([
                    "comprobante" => 'required|image|max:2048'
                ]);

                $imagenes =  $request->file('comprobante')->store('public/comprobantesimg');

                $url = Storage::url($imagenes);
                // return $url;
            }

            //cuentas y subcuentas
            if ($request->nombresubcuenta_cargo != "SELECCIONAR" && $request->nombresubcuenta_abono != "SELECCIONAR") {
                # code...


                try {


                    $cargo = Http::withToken(Cache::get('token'))->post($this->url . '/librodiario/insertar', [


                        "COD_PERIODO" => $request->periodo,
                        "NOM_CUENTA" => $request->cuenta_cargo,
                        "NOM_SUBCUENTA" => $request->nombresubcuenta_cargo,
                        "SAL_DEBE" => $request->saldo_cargo,
                        "SAL_HABER" => 0,


                    ]);



                    $abono = Http::withToken(Cache::get('token'))->post($this->url . '/librodiario/insertar', [


                        "COD_PERIODO" => $request->periodo,
                        "NOM_CUENTA" => $request->cuenta_abono,
                        "NOM_SUBCUENTA" => $request->nombresubcuenta_abono,
                        "SAL_DEBE" => 0,
                        "SAL_HABER" => $request->saldo_abono,


                    ]);
                } catch (\Throwable $e) {
                    return 'Error librodiario 135';
                }
            } else {
                try {
                    //code...
                    $cargo = Http::withToken(Cache::get('token'))->post($this->url . '/librodiario/insertar_s_cuentas', [
                        "COD_PERIODO" => $request->periodo,
                        "NOM_CUENTA" =>  $request->cuenta_cargo,
                        "SAL_DEBE" => $request->saldo_cargo,
                        "SAL_HABER" => 0
                    ]);

                    $abono = Http::withToken(Cache::get('token'))->post($this->url . '/librodiario/insertar_s_cuentas', [
                        "COD_PERIODO" => $request->periodo,
                        "NOM_CUENTA" =>  $request->cuenta_abono,
                        "SAL_DEBE" => 0,
                        "SAL_HABER" => $request->saldo_abono
                    ]);
                } catch (\Throwable $th) {
                    throw $th;
                    return 'solo cuentas 157';
                }
            }

            //despues de insertar vamos a guardar el comprobante
            if (isset($request->comprobante)) {

                $comprobante = Http::withToken(Cache::get('token'))->post($this->url . '/comprobantes/insertar', [
                    "NOMBRE" => $url
                ]);
            } else {
                $comprobante = Http::withToken(Cache::get('token'))->post($this->url . '/comprobantes/insertar', [
                    "NOMBRE" => 'Transaccion sin compronte'
                ]);
            }
            try {
                $bitacora = Http::withToken(Cache::get('Token'))->post($this->url . '/seguridad/bitacora/insertar', [

                    "USR" => Cache::get('user)'),
                    "ACCION" => 'PANTALLA METODO POST',
                    "DES" => Cache::get('user') . 'INSERTO EL DATO DE' . $request->librodiario . ' A LA PANTALLA DE LIBRO DIARIO',
                    "OBJETO" => 'LIBRODIARIO'

                ]);
            } catch (\Throwable $th) {
                return 'Error Libro Diario 183';
            }



            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [

                    "USR" => Cache::get('user'),
                    "ACCION" => 'PANTALLA METODO POST',
                    "DES" => Cache::get('user') . 'INSERTO UN DATO ' . $request->librodiario . 'EN LA PANTALLA DE LIBRO DIARIO',
                    "OBJETO" => 'LIBRODIARIO'

                ]);
            } catch (\Throwable $th) {
                return 'Error Libro Diario 198';
            }

            Session::flash('insertado',
                '1'
            );
        } else {

            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [

                    "USR" => Cache::get('user'),
                    "ACCION" => 'SIN PERMISO METODO POST',
                    "DES" => Cache::get('user') . 'INTENTO INSERTAR EL DATO ' . $request->librodiario . 'EN LA PANTALLA DE LIBRO DIARIO',
                    "OBJETO" => 'LIBRODIARIO'

                ]);

                Session::flash('sinpermiso', '1');
            } catch (\Throwable $th) {
                return 'Error Libro Diario 198';
            }
        }


        return back();


        // return $request;
    }


    // ACTUALIZAR FUNCIONAL
    public function actualizar(Request $request)
    {


        /**
         * Seguridad de roles y perimisos metodo update
         */

        try {

            $search = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/sel_per_obj', [
                "PV_ROL" => Cache::get('rol'),
                "PV_OBJ" => "LIBRODIARIO"
            ]);

            $permisos = $search->json();
            foreach ($permisos as $key) {
                $update = $key['PER_ACTUALIZACION'];
            }
        } catch (\Throwable $e) {
            return 'Error Libro Diario 39';
        }


        if (isset($update) == '1'
        ) {

            try {
                if ($request->transaccion == '1') {
                    $actualizar = Http::withToken(Cache::get('token'))->put($this->url . '/librodiario/actualizar/' . $request->f, [


                        "COD_PERIODO" => $request->periodo,
                        "NOM_CUENTA" => $request->cuenta,
                        "NOM_SUBCUENTA" => $request->nombresubcuenta,
                        "SAL_DEBE" => $request->saldo,
                        "SAL_HABER" => 0,
                    ]);
                } elseif ($request->transaccion == '0') {

                    $actualizar = Http::withToken(Cache::get('token'))->put($this->url . '/librodiario/actualizar/' . $request->f, [


                        "COD_PERIODO" => $request->periodo,
                        "NOM_CUENTA" => $request->cuenta,
                        "NOM_SUBCUENTA" => $request->nombresubcuenta,
                        "SAL_DEBE" => 0,
                        "SAL_HABER" => $request->saldo,
                    ]);
                }

                # code...
            } catch (\Throwable $e) {
                # code...
                return 'error libro diario 241';
            }




            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [

                    "USR" => Cache::get('user'),
                    "ACCION" => 'PANTALLA METODO PUT',
                    "DES" => Cache::get('user') . 'ACTUALIZO EL DATO DE  ' . $request->librodiario . 'EN LA PANTALLA DE LIBRO DIARIO',
                    "OBJETO" => 'LIBRODIARIO'

                ]);
            } catch (\Throwable $th) {
                return 'Error Libro Diario 257';
            }




            Session::flash('actualizado', '1');
        } else {

            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [

                    "USR" => Cache::get('user'),
                    "ACCION" => 'SIN PERMISO METODO PUT',
                    "DES" => Cache::get('user') . 'INTENTO ACTUALIZAR EL DATO DE  ' . $request->librodiario . 'EN LA PANTALLA DE LIBRO DIARIO',
                    "OBJETO" => 'LIBRODIARIO'

                ]);
                Session::flash('sinpermiso', '1');
            } catch (\Throwable $th) {
                return 'Error Libro Diario 257';
            }
        }
        return back();

        // return $request;

    }


    // ELIMINAR DEBE SER LOGICO
    public function eliminar(Request $request)
    {


        /**
         * Seguridad de roles y perimisos metodo DELETE
         */

        try {

            $search = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/sel_per_obj', [
                "PV_ROL" => Cache::get('rol'),
                "PV_OBJ" => "LIBRODIARIO"
            ]);

            $permisos = $search->json();
            foreach ($permisos as $key) {
                $eliminacion = $key['PER_ELIMINACION'];
            }
        } catch (\Throwable $e) {
            return 'Error Libro Diario 39';
        }

        if (isset($eliminacion) == '1'
        ) {

            $delete = Http::withToken(Cache::get("Token"))->delete($this->url . '/librodiario/eliminar/' . $request->f,);




            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [

                    "USR" => Cache::get('user'),
                    "ACCION" => 'ELIMINO UN DATO',
                    "DES" => Cache::get('user') . 'ELIMINO EL DATO CON CODIGO DE  ' . $request->f . 'EN LA PANTALLA DE LIBRO DIARIO',
                    "OBJETO" => 'LIBRODIARIO'

                ]);
            } catch (\Throwable $th) {
                return 'Error Libro Diario 286';
            }


            Session::flash('eliminado',
                '1'
            );
        } else {


            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [

                    "USR" => Cache::get('user'),
                    "ACCION" => 'SIN PERMISO METODO DELETE ',
                    "DES" => Cache::get('user') . 'INTENTO ELIMINAR EL DATO CON CODIGO DE  ' . $request->f . 'EN LA PANTALLA DE LIBRO DIARIO',
                    "OBJETO" => 'LIBRODIARIO'

                ]);

                Session::flash('sinpermiso', '1');
            } catch (\Throwable $th) {
                return 'Error Libro Diario 286';
            }
        }
        return back();

        // return $request;

    }

    // FUNCION PARA PDF FUNCIONAL 
    public function pdf()
    {
        $librodiario = http::withToken(Cache::get('token'))->get($this->url . '/librodiario');
        $libro = $librodiario->json();


        return view('librodiario.libroDpdf', compact('libro'));
    }
}
