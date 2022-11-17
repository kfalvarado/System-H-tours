<?php

namespace App\Http\Controllers\libromayor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class LibromayorController extends Controller
{





	protected $url = 'http://localhost:3000';
    public function mostrar()
	{

		$libromayor =http::withToken(Cache::get('token'))->get($this->url.'/libromayor');

		$personArr = $libromayor->json();
        return view('libromayor.libromayor', compact('personArr'));
	}
}
