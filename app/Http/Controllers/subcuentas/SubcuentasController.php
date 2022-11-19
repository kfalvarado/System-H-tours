<?php

namespace App\Http\Controllers\subcuentas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class SubcuentasController extends Controller
{
 
    protected $url = 'http://localhost:3000';
    public function ver()
    {

       $subcuentas = http::withToken(Cache::get('token'))->get($this->url.'/subcuentas');
       $personArr = $subcuentas->json();

       return view('subcuentas.subcuentas',compact('personArr'));
    }

}