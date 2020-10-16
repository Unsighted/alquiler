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
		//dd($request);

    	$cartDetail = new CartDetail();
    	$cartDetail->cart_id = auth()->user()->cart->id;
		$cartDetail->product_id = $request->product_id;
    	$cartDetail->quantity = $request->quantity;
    	$cartDetail->save();

		$notification = 'El producto se ha cargado a tu carrito!';
    	return back()->with(compact('notification'));
    }

    public function destroy(Request $request)
    {
		//dd($request);

    	$cartDetail = CartDetail::find($request->cart_detail_id);

    	if ($cartDetail->cart_id == auth()->user()->cart->id) // Si el carrito de compras pertenece al usuario se procede a borrar el producto.
    		$cartDetail->delete();

    	$notification = 'El producto se ha eliminado.';
    	return back()->with(compact('notification'));
	}
	
	public function cantidad(Request $request)
		{  
			//dd($request['id']);

			 $productCant = \DB::table('cart_details')->where('cart_id','=',auth()->user()->cart->id )

			 ->where('product_id','like','%'.$request['id'].'%')->first()->product_id;
			
			 return $productCant;

		}
}
