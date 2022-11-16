<?php

namespace App\Http\Controllers\librodiario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class LibrodiarioController extends Controller
{




    protected $url = 'http://localhost:3000';
    public function mostrar()
    {
        $librodiario =http::withToken(Cache::get('token'))->get($this->url.'/librodiario');
        
        $personArr = $librodiario->json();
        return view('librodiario.librodiario', compact('personArr'));
    }
}
