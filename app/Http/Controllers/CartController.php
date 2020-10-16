<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Mail\NewOrder;
use Mail;

class CartController extends Controller
{
    public function update(Request $request)
    {
		
		// dd($request['pais']);
		$request = $request;
		$client = auth()->user(); // Usuario autenticado.
    	$cart = $client->cart; // Obtiene el carrito de compras del usuario autenticado.
    	//$cart->status = 'Pendiente';
    	//$cart->order_date = Carbon::now(); // Obtiene la hora de orden automáticamente.
		//$cart->save(); // UPDATE - Actualiza el carrito.
		
		//  $mail = User::where('email', auth()->user()->email)->get();
		//  $user = $mail[0]['email'];
    	 $admins = User::where('admin', true)->get();
		 Mail::to($admins)->send(new NewOrder($client, $cart, $request));

		 return redirect()->action(
			'HomeController@index'
		);
    }
}
