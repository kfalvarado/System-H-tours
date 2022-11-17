<?php

namespace App\Http\Controllers\usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;


class UsuariosController extends Controller
{

    protected $url = 'http://localhost:3000';

    public function mostrar()
    {
        $usr = http::withToken(Cache::get('token'))->get($this->url.'/sel_usr');
        return view('usuarios.usuarios');
    }
}
