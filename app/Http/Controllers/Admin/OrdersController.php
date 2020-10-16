<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Gmail;
use App\CartDetail;

class OrdersController extends Controller
{
    

public function index()
    {   

        $details = \DB::table('gmails')
            ->join('products', 'products.id', '=', 'gmails.product_id')
            ->join('users', 'users.id', '=', 'gmails.user_id')
            ->select('products.*', 'gmails.status', 'gmails.quantity', 'gmails.id', 'gmails.cart_id', 'gmails.order', 'users.name as persona', 'users.phone')
            ->orderBy('gmails.user_id')
            ->get();

            //  dd($details[0]);

            // foreach ( $detail as $key => $value ) {
                
            //     $details = array( $key => $value );
            // }

       
        return view('admin.orders.details')->with(compact('details'));

    }

    public function counts()
    {   

        $details = \DB::table('gmails')
            ->join('products', 'products.id', '=', 'gmails.product_id')
            ->join('users', 'users.id', '=', 'gmails.user_id')
            ->select('products.*', 'gmails.status', 'gmails.quantity', 'users.name as persona', 'users.phone')->distinct('gmails.cart_id')
            ->count('gmails.cart_id');
            
            $cero = 0;
            
            if($details){
                return $details;
            }else{
                return $cero;
            }
             

    }

    public function checked(Request $request)
    {   

        //dd($request);

        $gmailData = \DB::table('gmails')

        ->where('order','like','%'.$request['order'].'%')
      
        ->update(['status'=>$request['status']]);
        
        return $gmailData;
    }

       
}