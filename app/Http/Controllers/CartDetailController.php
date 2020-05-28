<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CartDetail;

class CartDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
    	$cartDetail = new CartDetail();
    	$cartDetail->cart_id = auth()->user()->cart->id;
		$cartDetail->product_id = $request->product_id;
    	$cartDetail->quantity = $request->quantity;
    	$cartDetail->save();

		//dd($cartDetail->category = $request->category);

		$notification = 'La modelo se ha cargado a tu sesión exitosamente!';
    	return back()->with(compact('notification'));
    }

    public function destroy(Request $request)
    {
    	$cartDetail = CartDetail::find($request->cart_detail_id);

    	if ($cartDetail->cart_id == auth()->user()->cart->id) // Si el carrito de compras pertenece al usuario se procede a borrar el producto.
    		$cartDetail->delete();

    	$notification = 'La sesión se ha eliminado del carrito de compras correctamente.';
    	return back()->with(compact('notification'));
    }
}
