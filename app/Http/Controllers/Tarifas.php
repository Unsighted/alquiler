<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class Tarifas extends Controller
{
    public function index(Request $request)
    {
    
    	return view('tarifas.tarifas');
    }

}


