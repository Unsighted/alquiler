<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CartDetail;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(CartDetail $cart_detail)
    {   
        $usuario = auth()->user()->cart->id;
        
        $details = CartDetail::where('cart_id','like','%'.$usuario.'%')->get();
        //dd($details);
        return view('home')->with(compact('details'));
       
    }

    

}
