<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigsController extends Controller
{
    public function mostrar()
    {
       return view('config.ajustes');
    }
}
