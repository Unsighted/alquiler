<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;
use App\Gmail;
use App\User;
use App\Cart;

class OrdersController extends Controller
{
    

    public function store()
    {
        $user_id = auth()->user()->id;
        $usuario = auth()->user()->cart->id;
        $details = CartDetail::where('cart_id','like','%'.$usuario.'%')->get();
       
    	foreach($details as $details){
    	$gmailData = new Gmail();
    	$gmailData->cart_id = $usuario;
		$gmailData->product_id = $details['product_id'];
        $gmailData->quantity = $details['quantity'];
        $gmailData->status = 'Pendiente';
        $gmailData->order = str_random(20);
        $gmailData->user_id = $user_id;
        $gmailData->save();

       }
       
      // CartDetail::truncate();

    CartDetail::where('cart_id','like','%'.$usuario.'%')->delete();
    
}

    
    public function destroy(Request $request)
    {
		//dd($request);

    	$orderDetail = Gmail::find($request->order_detail_id);

    	$orderDetail->delete();

    	$notification = 'El pedido se ha eliminado.';
    	return back()->with(compact('notification'));
    }
}