<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Mail\NewOrder;
use Mail;

class CartController extends Controller
{
    public function update()
    {
    	$client = auth()->user(); // Usuario autenticado.
    	$cart = $client->cart; // Obtiene el carrito de compras del usuario autenticado.
    	$cart->status = 'Pending';
    	$cart->order_date = Carbon::now(); // Obtiene la hora de orden automáticamente.
    	$cart->save(); // UPDATE - Actualiza el carrito.

    	$admins = User::where('admin', true)->get();
    	Mail::to($admins)->send(new NewOrder($client, $cart));

    	$notification = 'Tu pedido se ha registrado correctamente. Te contactaremos pronto vía mail!';
    	return back()->with(compact('notification'));
    }
}
