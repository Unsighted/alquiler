@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')


<?php


// SDK de Mercado Pago
require __DIR__ .  '../../../../vendor/autoload.php';

// Agrega credenciales
// Credenciales de cuenta mercadopago vendedor
MercadoPago\SDK::setClientId('5057708401642766');
MercadoPago\SDK::setClientSecret('UUm6SO26jhT0jXHJNpTk8Z0Mg2fcRuw9');

//orig de mercadopago esteban
//MercadoPago\SDK::setClientId('8493356599144380');
//MercadoPago\SDK::setClientSecret('zkwbwwHERZu7KNHTkEasGYjpux4qBLCI');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// restricciones de pago
$preference->payment_methods = array(
  "excluded_payment_methods" => array( // métodos de pago no permitidos
    //array("id" => "visa"),
    array("id" => "amex") // american
  ),
  "excluded_payment_types" => array( // tipos de pago no permitidos
    array("id" => "ticket"), // pago facil, rapipago, kioscos, etc
    array("id" => "atm") // red link
),
  "installments" => 1 // cantidad de cuotas
);

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->id = '00001';
$item->title = 'Monto Total';
$item->quantity =  1;
$item->unit_price = auth()->user()->cart->total;
$preference->items = array($item);
$preference->save();

    
$preference->back_urls = array(
    "success" => "http://motoempresa.me/success",
    "failure" => "http://motoempresa.me/failure",
    "pending" => "http://motoempresa.me/pending"
);


$preference->auto_return = "success";

// dd($preference->auto_return);

?>

@section('styles')
    <style>

    #tarifas{
        z-index: -1; 
    }

    .btn-color{
        background-color: #white;
    }

    .btn-negro{
        border: red;
        background-color: #555555 transparent;
        color: white;
    }

    .btn-pastilla{
        background-color: #555555;
        color: white;
    }

    .tarjeta{
        background-color: #000;
        color: white;
    }

    .colorfondo{
        background-color: #000;
        color: white;
    }

    .pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover{
        background: #616161;
    }

    .mercadopago-button{
        background: #616161;
    }

    .color-text{
        color: crimson;
    }

    /* .nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover{
        background: #e57373;
    } */

    .modal-content {
        box-shadow: 0 27px 24px 0  #42a5f5, 0 40px 77px 0 #42a5f5;
    }

    </style>
@endsection    


<html>

<div class="header header-filter" style="background-image: url('{{ asset('img/wallpaper.jpg') }}');">
</div>

<div class="container main main-raised" style="background-color: #000;">
    <div class="container">

        <div class="section text-center section-landing">
            <div class="w3-container" style="height:auto;">
              <!-- <div class="w3-padding w3-margin-bottom" style="">
                <h4 style="">Panel de compras</h4>
              </div> -->
              @switch(auth()->user()->cart->details->count())
                    @case('NULL')
                    <div class="" style="">
                        <h4 class="color-text">Ninguna modelo seleccionada aún ..</h4>
                        <button class="btn btn-danger btn-round" data-toggle="modal" data-target="#tarifas">
                        <i class="material-icons">favorite</i> ver tarifas
                    </button>
                    </div>
                @endswitch
                @if (session('notification'))
                    <div class="btn btn-primary">
                        <h4>{{ session('notification') }}</h4>
                    </div>
                @endif
           
                <div class="modal fade" id="tarifas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Seleccione la cantidad de HS que desea agregar a la sesión</h4>
                    </div>
                   
                        <div class="modal-body">

                        <div class="togglebutton">
                        <label>
                            <input type="checkbox" name="quantity" value="1" checked=""> 
                            <b>1 HS<b>
                        </label>
                        </div>

                        <div class="togglebutton">
                        <label>
                            <input type="checkbox" name="quantity" value="2" checked=""> 
                            <b>2 HS<b>
                        </label>
                        </div>

                        </div>
                        <div class="modal-footer">
                            
                        </div>
                    </form>
                    </div>
                </div>
                </div>


                <div class="container card colorfondo" style="width: 600px;">
                    <div class="panel card tarjeta" style="width:auto; padding:12px; margin-top:15px;">
                        <h3 style="">Tu sesión sexcam presenta {{ auth()->user()->cart->details->count() }} modelo.</h3>
                    </div>
               <div class="container">     
                <ul class="nav nav-pills" role="tablist"  style="">
                    <li class="">
                        <a href="#dashboard" role="tab" data-toggle="tab" checked>
                            <i class="material-icons">shopping_cart</i>
                            HS de modelo actual
                            <span class="card btn btn-pastilla"> {{ auth()->user()->cart->details->count() }} </span>
                        </a>
                    </li>
                    @switch(auth()->user()->cart->status)
                    @case('Active')
                    <li>
                        <a href="#tasks" role="tab" data-toggle="tab" checked>
                            <i class="material-icons">check</i>
                            sesión de sexcam
                            <span class="card btn btn-pastilla">{{ auth()->user()->cart->status }}</span>
                        </a>
                    </li>
                    @endswitch
                </ul>
               </div> 
                @if(auth()->user()->cart->details->count())
                <div class="panel card tarjeta" style="width: 500px; margin-top: 15px;"><h4>Importe a pagar: $ {{ auth()->user()->cart->total }} <span class="material-icons">shopping_cart</span> </h4>
                </div>
               
                <div class="text-center">
                <form method="post" action="{{ url('/order') }}">
                        {{ csrf_field() }}

                        @if(auth()->user()->cart->details->count())

                        <form action="/procesar-pago" method="POST">
                        <script
                        src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                        data-preference-id="<?php echo $preference->id; ?>" data-elements-color="#32a10f">
                        </script>
                        </form>
                        @endif
                </form>
            </div>
              
                <td class="colorfondo">
                    <a data-toggle="modal" data-target="#DeleteModal" data-dismiss="modal" data-backdrop="false" onclick="deleteData({{auth()->user()->cart->id}})" type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-xs">
                        <i class="material-icons"><img src ="img/delete.png"></i>
                    </a>
                </td> 
                @endif
                </div>
            

                <form method="post" id="deleteForm" action="">
                 {{ csrf_field() }}
                 {{ method_field('DELETE') }}
                 @foreach(auth()->user()->cart->details as $detail)
                <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                @endforeach
                <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header btn-negro">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span class="material-icons">cancel</span>
                                </button>
                                <button class="btn btn-danger"><i class="material-icons"><img src ="img/info.png"></i></button>
                                <h2>Seguro desea eliminar la sesión?</h2>
                            </div>
                            <div class="modal-body btn-negro">
                                <h5>Esta acción no podrá revertirse.</h5>
                            </div>
                            <div class="modal-footer btn-negro">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                                <button type="submit" name="" class="btn btn-primary" data-dismiss="modal" onclick="formSubmit()">Si, eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>

            <a data-toggle="modal" data-target="#sesion" data-dismiss="modal" data-backdrop="false"  type="button" rel="tooltip" title="sesión webcam" class="btn btn-danger btn-xs">
                <i class="material-icons">camera_alt</i>
            </a>
<body>
            <div class="modal fade" id="sesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header btn-negro">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span class="material-icons">cancel</span>
                                </button>
                                <button class="btn btn-danger"><i class="material-icons">play_arrow</i></button>
                                <h2>Sesión Activa</h2>
                            </div>
                            <div class="modal-body btn-negro">
                           
                                <div>
                                    <label for="dispositivosDeAudio">Micrófono:</label><br>
                                    <select name="dispositivosDeAudio" id="dispositivosDeAudio"></select>
                                    <br><br>
                                    <label for="dispositivosDeVideo">Cámara:</label><br>
                                    <select name="dispositivosDeVideo" id="dispositivosDeVideo"></select>
                                    <br><br>
                                    <video controls style="border: 1px solid rgb(14, 168, 234); width: 90%;" autoplay muted="muted" id="video"></video>
                                    <br><br>
                                    <p id="duracion"></p>
                                    <br>
                                   
                                    <!-- <button >Detener</button> -->
                                </div>
                            </div>
                            <div class="modal-footer btn-negro">
                                <button type="button" class="btn btn-success" id="btnComenzarGrabacion" data-dismiss="modal">Iniciar cam</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnDetenerGrabacion">cerrar ventana</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="../js/script.js"></script>
</body>
            

                    </div>
                    <!-- @if(auth()->user()->cart->details->count())
                    <div class="text-center paginate">
                        {{ $detail->paginate(3) }}
                    </div>
                    @endif -->
                </div>
            </div>
            </div>
</html>
@endsection


@section('scripts')
 <script type="text/javascript">
     function deleteData(id)

     {
        // console.warn(id);
         var id = id;
         var url = '{{ url("/cart") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }

  </script>
  @endsection
  