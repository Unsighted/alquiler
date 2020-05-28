<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class Payment extends Controller
{
    public function index(Request $request)
    {
    
    	return view('payment.payment');
    }

    public function subscribe(Request $request)
    {
    
    	// dd($request->all()); // muestra array de datos al aceptar el formulario de pago de suscripción de stripe
    
        $user = Auth::loginUsingId(1);
        $plan = 'month';
        $stripe_token = $request->input('stripeToken');
        $user->newSubscription('main',$plan)->create($stripe_token);
        dd('success!!');
    }

    public function changeplan(Request $request)
    {
    
    	try{
            $user = Auth::loginUsingId(2);

            $newPlan = 'yearly';

            $user->subscription('main')
                 ->skipTrial()
                 ->swap($newPlan);
                 
               dd('success!!');  
        }catch(\Stripe\Error\Card $e){
            $body = $e->getJsonBody();
            $err = $body['error'];
            $error = $err['message'];

            Log::critical(
                "Could not update credit card of {$user->email}{$e->getMessage()}, $error" );
            }
            catch(\Exception $e){
                dd("Something really bad");
            }
        }

}


