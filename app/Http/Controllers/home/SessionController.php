<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function inicio()
    {
        return view('home.inicio');
    }   
    public function register()
    {
        return view('Auth.register');
    }   
}
