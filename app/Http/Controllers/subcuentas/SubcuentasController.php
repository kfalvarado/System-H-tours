<?php

namespace App\Http\Controllers\subcuentas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;


class SubcuentasController extends Controller
{

    protected $url = 'http://localhost:3000';
    public function ver()
    {




        $subcuentas = http::withToken(Cache::get('token'))->get($this->url . '/subcuentas');
        $personArr = $subcuentas->json();
        //clasificacion
        $clasificacion = http::withToken(Cache::get('token'))->get($this->url . '/clasificacion');
        $clasificacionArr = $clasificacion->json();
        //nombre de cuenta
        $nombrecuenta = http::withToken(Cache::get('token'))->get($this->url . '/cuentas');
        $nombrecuentaArr = $nombrecuenta->json();
        return view('subcuentas.subcuentas', compact('personArr', 'clasificacionArr', 'nombrecuentaArr'));
    }
    public function busca(Request $req)
    {
        $clasificacion = http::withToken(Cache::get('token'))->post($this->url . '/clasificacion/cuentas', [
            "NATURALEZA" => $req->NATURALEZA
        ]);

        return $clasificacion;

        // return response()->json(
        //     [
        //         'hola'=> true
        //     ]
        //     );

        // $new =  json_decode($clasificacion,true);

        // return $new;

        // return response()->json($clasificacion);
    }

    /**
     * Metodo para insertar una subcuenta
     */
    public function insertar(Request $request)
    {
        

        $insertar =  Http::withToken(Cache::get('token'))->post(
            $this->url . '/subcuentas/insertar',
            [
                "CLASIFICACION" => $request->naturaleza,
                "NUM_SUBCUENTA" => $request->numerosubcuenta,
                "NOM_SUBCUENTA" => $request->nombresubcuenta,
                "NOM_CUENTA" => $request->nombrecuenta



            ]
        );
        Session::flash('insertado', "1");
        return back();
    }


    /**
     * Metodo para insertar una subcuenta
     */
    public function actualizar(Request $request)
    {
        $actualizar = Http::withToken(Cache::get('token'))->put(
            $this->url . '/subcuentas/actualizar/' . $request->f,
            [
                "NUM_SUBCUENTA"=>  $request->numerosubcuenta,
                "NOM_SUBCUENTA"=> $request->nombresubcuenta ,
                "NOM_CUENTA"=>  $request->nombrecuenta,
    

            ]
        );
        Session::flash('actualizado', "1");
        return back();
    }
}