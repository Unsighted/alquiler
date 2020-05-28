<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Mail;

class EmailController extends Controller
{
    public function questions(Request $request)
    {

        $motoempresa = 'Motoempresa';

        if(preg_match('/^[a-zA-Z\s]+$/', $_REQUEST["name"]) &&
			preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_REQUEST["email"]) &&
			   preg_match('/^[a-zA-Z0-9\s\.,]+$/', $_REQUEST["message"])){

        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $message = $_REQUEST['message'];


        Mail::send('mail.email', $request->all(), function($msj) use($name, $email, $message, $motoempresa){
            
                $admins = User::where('admin', true)->get();
                $msj->from($email,"Motoempresa");
                $msj->subject($message);
                $msj->to('unsightedcode@gmail.com');

                //return redirect()->back();
                
                // $datos = ['name' => $name, 'email' => $email, 'message' => $message];

                // return view('mail.email')->with('datos');
    });
    
   }else{

        $notification = 'Consulta no enviada, Revisa los datos nuevamente por favor!';
    	return back()->with(compact('notification'));
   }
  }
}