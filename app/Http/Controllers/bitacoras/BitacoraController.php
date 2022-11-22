<?php

namespace App\Http\Controllers\bitacoras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
class BitacoraController extends Controller
{

    protected $url = 'http://localhost:3000/seguridad';

    public function mostrar()
    {

        $bitacora = http::withToken(Cache::get('token'))->get($this->url.'/sel_bitacora');
        //return $bitacora;
        $bitacoraArr = $bitacora->json();

        return view('bitacoras.bitacoras',compact('bitacoraArr'));

    }
}
