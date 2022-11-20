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
        return view("balance.Balance", compact('personArr'));
    }
    public function insertar(Request $request)
    {
        $balance = http::withToken(Cache::get('token'))->post($this->url.'/balance/insertar',[
            'COD_PERIODO'=>$request->periodo
        ]);
        $balanceArr=$balance->json();
        return $balanceArr;
        $periodo = http::withToken(Cache::get('token'))->get($this->url . '/periodo');

        $personArr = $periodo->json();
        return view("balance.Balance", compact('balanceArr','personArr'));
    }
}
