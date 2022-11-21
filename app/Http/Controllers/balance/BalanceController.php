<?php

namespace App\Http\Controllers\Balance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Http;

class BalanceController extends Controller
{
    protected $url = 'http://localhost:3000';
    public function mostrar()
    {
        $periodo = http::withToken(Cache::get('token'))->get($this->url . '/periodo');

        $personArr = $periodo->json();
        $activoc = 0;
        $activon = 0;
        $pasivoc = 0;
        $pasivon = 0;
        $balanceArr = 0;
        $patrimonio = 0;
        return view("balance.Balance", compact('personArr','balanceArr','activoc','activon','pasivoc','pasivon','patrimonio'));
    }
    public function insertar(Request $request)
    {
        $balance = http::withToken(Cache::get('token'))->post($this->url.'/balance/insertar',[
            'COD_PERIODO'=>$request->periodo
        ]);
        $balanceArr=$balance->json();
        // return $balanceArr;
        $periodo = http::withToken(Cache::get('token'))->get($this->url . '/periodo');

        $personArr = $periodo->json();

        //activos corrientes 
        $activoc = http::withToken(Cache::get('token'))->post($this->url.'/balance/activos_c',[
            'COD_PERIODO'=>$request->periodo
        ]);

        // return $activoc;
        $activoc = $activoc->json();

        // return $activo_c;

        //activos no corrientes

        $activon = http::withToken(Cache::get('token'))->post($this->url.'/balance/activos_n',[
            'COD_PERIODO'=>$request->periodo
        ]);
        $activon = $activon->json();
        // return $activon;

        //pasivos corrientes
        $pasivoc = http::withToken(Cache::get('token'))->post($this->url.'/balance/pasivos_c',[
            'COD_PERIODO'=>$request->periodo
        ]);
        $pasivoc = $pasivoc->json();
        // return $pasivoc;
        
        //pasivos no corrientes
        $pasivon = http::withToken(Cache::get('token'))->post($this->url.'/balance/pasivos_n',[
            'COD_PERIODO'=>$request->periodo
        ]);
        
        $pasivon = $pasivon->json();

        // return $pasivoc;

        //patrimonio
        $patrimonio = http::withToken(Cache::get('token'))->post($this->url.'/balance/patrimonio',[
            'COD_PERIODO'=>$request->periodo
        ]);


        
        $patrimonio = $patrimonio->json();

        // return $patrimonio;
        return view("balance.Balance", compact('balanceArr','personArr','activoc','activon','pasivoc','pasivon','patrimonio'));
    }
}
