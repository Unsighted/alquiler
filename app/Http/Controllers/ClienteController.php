<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Mail;

class ClienteController extends Controller
{
    public function cliente(Request $request)
    {

        // dd($request);
        // die();

        $tienda = 'tienda';

        if(preg_match('/^[a-zA-Z\s]+$/', $_REQUEST["nombre"]) &&
			preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_REQUEST["email"]) &&
			   preg_match('/^[a-zA-Z0-9\s\.,]+$/', $_REQUEST["desc"])){

        $nombre = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];
        $identidad = $_REQUEST['identidad'];
        $celular = $_REQUEST['celular'];
        $email = $_REQUEST['email'];
        $pais = $_REQUEST['pais'];
        $ident = $_REQUEST['identidad'];
        $provincia = $_REQUEST['provincia'];
        $localidad = $_REQUEST['localidad'];
        $calle = $_REQUEST['calle'];
        $solar = $_REQUEST['solar'];
        $manzana = $_REQUEST['manzana'];
        $villa = $_REQUEST['villa'];
        $descripcion = $_REQUEST['desc'];


        Mail::send('mail.email', $request->all(), function($msj) use($nombre, $apellido, $identidad, $celular, $email, $pais, $ident, $provincia, $localidad, $calle, $solar, $manzana, $villa, $descripcion, $tienda){
            
                //$admins = User::where('admin', true)->get();
                $msj->from($email,"Tienda Online");
                $msj->subject('Acuerdo de envío');
                $msj->to('unsightedcode@gmail.com');

                // return redirect()->back();
                
                // $datos = ['name' => $name, 'email' => $email, 'message' => $message];

                // return view('mail.email')->with('datos');
    });
    
   }
  }
}