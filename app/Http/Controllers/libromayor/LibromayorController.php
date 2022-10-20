<?php

namespace App\Http\Controllers\libromayor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibromayorController extends Controller
{
    public function mostrar()
	{
	return view('libromayor.libromayor');
	}
}
