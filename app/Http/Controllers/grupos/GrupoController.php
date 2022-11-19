<?php

namespace App\Http\Controllers\grupos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class GrupoController extends Controller
{
    /*
    ======================================
    Pantalla de inicio HOME
    ======================================
    */
    protected $url = 'http://localhost:3000';
   public function vista()
   {
    $clasificacion = http::withToken(Cache::get('token'))->get($this->url.'/clasificacion');
    $grupo = http::withToken(Cache::get('token'))->get($this->url . '/grupos');
    
    $clasificacionArr = $clasificacion->json();
    $grupoArr = $grupo->json();
    return view('grupos.grupo',compact('grupoArr','clasificacionArr'));
   }

   public function insertar(Request $request)
   {
    
    $insertar = Http::withToken(Cache::get('token'))->post($this->url . '/grupos/insertar', [
        "PV_CLASIFICACION" => $request->clasificacion,
        "PV_NUM_GRUPO" => $request->grupo,
        "PV_NOM_GRUPO" => $request->name
    ]);
    $duplicado = strrpos($insertar, "NUMERO DE GRUPO DUPLICADO");

    if ($duplicado>0) {
        Session::flash('duplicada','1');
        return back();
    }
    
    Session::flash('insertado','1');
    return back();
   }
   public function actualizar(Request $request)
   {
    $actualizar = Http::withToken(Cache::get('token'))->put($this->url . '/grupos/actualizar/'.$request->cod, [
        "PV_CLASIFICACION" => $request->clasificacion,
        "PV_NUM_GRUPO" => $request->grupo,
        "PV_NOM_GRUPO" => $request->name
    ]);
    
    Session::flash('actualizo','1');
    return back();
   }

   public function eliminar(Request $request)
   {
    $eliminar = http::withToken(Cache::get('token'))->delete($this->url.'/grupos/eliminar/'.$request->cod);
    Session::flash('eliminado','1');
    return back();
   }
}
