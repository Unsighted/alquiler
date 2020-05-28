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
        $details = $cart_detail->paginate(3);
         //dd($details->items());
        return view('home')->with(compact('details'));
       
    }

    

}
