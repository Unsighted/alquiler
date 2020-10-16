@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')


@section('styles')
    <style>

.nav-pills > li > a{
    
    line-height: 24px;
    text-transform: uppercase;
    font-size: 12px;
    font-weight: 500;
    min-width: 100px;
    text-align: center;
    color: #fff;
    transition: all .3s;
}

.buttoncam {
  margin: 5px 0px 0px 10px !important;
  width: 654px;
}


    .btn-color{
        background-color: #white;
    }

    .btn-dark{
        border: red;
        background-color: #2e2e2e;
        color: white;
    }

    .btn-pastilla{
   background-color: palevioletred;
    color: white;
    }

    .tarjeta{
   background-color: palevioletred;
    color: white;
    }

    .colorfondo{
    /*background-color: #FF3CAC; background-image: linear-gradient(225deg, #FF3CAC 0%, #784BA0 28%, #2B86C5 67%);*/
    color: white;
    }

    .pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover{
        background: #616161;
    }

    .mercadopago-button{
        background: #616161;
    }

    .color-text{
        color: white;
    }

    .pills{
        display: inline-block;
        justify-content: center;
    }

    #paypal-button-container{
        display: inline-block;
        /* width: 500px; */
        justify-content: center;
    }

    .modal-content {
        box-shadow: 0 27px 24px 0  #42a5f5, 0 40px 77px 0 #42a5f5;
    }

   .flex{
    display: inline-block;
    justify-content: center;	
    }

    h5{
        color: grey;
    }


.table::-webkit-scrollbar {
  width: 20px;               /* width of the entire scrollbar */
}
.table::-webkit-scrollbar-track {
  background: black;        /* color of the tracking area */
}
.table::-webkit-scrollbar-thumb {
  background-color: palevioletred;    /* color of the scroll thumb */
  border-radius: 20px;       /* roundness of the scroll thumb */
  border: 1px solid black;  /* creates padding around scroll thumb */
}

/* Paymentez*/

.panelx {
      margin: 0 auto;
      background-color: #F5F5F7;
      border: 1px solid #ddd;
      padding: 20px;
      display: block;
      width: 100%;
      border-radius: 6px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
    }

    .btnx {
      background: rgb(140, 197, 65); /* Old browsers */
      background: -moz-linear-gradient(top, rgba(140, 197, 65, 1) 0%, rgba(20, 167, 81, 1) 100%); /* FF3.6-15 */
      background: -webkit-linear-gradient(top, rgba(140, 197, 65, 1) 0%, rgba(20, 167, 81, 1) 100%); /* Chrome10-25,Safari5.1-6 */
      background: linear-gradient(to bottom, rgba(140, 197, 65, 1) 0%, rgba(20, 167, 81, 1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#44afe7', endColorstr='#3198df', GradientType=0);
      color: #fff;
      display: block;
      width: 100%;
      border: 1px solid rgba(46, 86, 153, 0.0980392);
      border-bottom-color: rgba(46, 86, 153, 0.4);
      border-top: 0;
      border-radius: 4px;
      font-size: 17px;
      text-shadow: rgba(46, 86, 153, 0.298039) 0px -1px 0px;
      line-height: 34px;
      -webkit-font-smoothing: antialiased;
      font-weight: bold;
      display: block;
      margin-top: 20px;
    }

    .btnx:hover {
      cursor: pointer;
    }

    .nav-pills > li > a{
        background-color: palevioletred;
    }

    .my-custom-scrollbar {
        position: relative;
        height: 500px;
        overflow: auto;
        }

    .table-wrapper-scroll-y {
        display: block;
    }

    table{
        height:150px;
    }

    .white{
        color: #000;
    }

    .togglebutton label input[type=checkbox]:checked + .toggle{
        background-color: palevioletred;
    }

    .actions{
        display: flex;
        justify-content: center;
    }

    .separator{
        margin-left: 100px;
        margin-right: 100px;
        margin-top: 100px;
        border-top: 1px solid palevioletred;
        height: 1px;
        clear: both; 
    }

    </style>
@endsection    

<?php

?>

<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <script src="../js/push.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

<div class="header header-filter" style="background-image: url('{{ asset('img/wallpaper1.jpg') }}');">
</div>

    <div class="main main-raised" style="background-color: #fff;">
        <div class="container">

        

            <div class="section text-center section-landing">
                <div class="" style="height:auto;">
                
                @switch(auth()->user()->cart->details->count())
                        @case('NULL')
                        <div class="" style="">
                            <!-- <h4 class="color-text">Ningún artículo seleccionado aún ..</h4> -->
                            <script> toastr.warning('Ningún artículo seleccionado aún!');</script>
                        </div>
                    @endswitch
                    @if (session('notification'))
                        <div>
                            <!-- <h4>{{ session('notification') }}</h4> -->
                            <script> toastr.success('Producto se ha eliminado con éxito!');</script>
                        </div>
                    @endif
                
                        <div class="colorfondo" style="">
                                
                                    <div class="panel card" style="width:auto; padding:10px; margin-top:15px; background-color: palevioletred;">
                                        <h5 style="color: white;">Tu carrito de compras presenta {{ auth()->user()->cart->details->count() }} artículos.</h5>
                                    </div>
                            

                            @if(auth()->user()->cart->details->count())
                            
                                <div class="col-md-12" style="margin-bottom: 50px;">

                                    <h5 class="" style="margin-top: 100px; color: palevioletred;"><u>DETALLE DE TU COMPRA</u></h5>
                                
                                    <table class="table table-responsive table-hover panel table-striped my-custom-scrollbar d-flex" style="height:20px; margin-top: 30px; overflow-y; scroll; border-radius: 20px; cursor: pointer;">
                                            <thead style="background-color: #2e2e2e;">
                                            
                                            <tr class="" style="">
                                                <th class="text-center"><h4>Producto<h4></th>
                                                <th class="text-center"><h4>Precio<h4></th>
                                                <th class="text-center"><h4>Cant<h4></th>
                                                <th class="text-center"><h4>Acciones<h4></th>
                                            </tr>
                                                </thead>
                                                <tbody class="tables">
                                                        
                                                <!-- @foreach($details as $detail) -->
                                                        <tr style="">
                                                        
                                                            <td style="padding-top: 8px;"><h5 class="">{{ $detail->product->name }}</h5></td>
                                                            <input type="hidden" name="name" value="{{ $detail->product->name }}"></input>
                                                            <td style="padding-top: 8px;" name="price"><h5 class="">$ {{ $detail->product->price }}</h5></td>
                                                            <td name="quantity" class="text-center"><h5 class="">{{ $detail->quantity }}</h5></td>       
                                                            <td style="padding-top: 8px;">
                                                                <div>
                                                                    
                                                                    <form method="post" id="deleteForm" action="/cart">
                                                                                {{ csrf_field() }}
                                                                                {{ method_field('DELETE') }}
                                                                                
                                                                                <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                                                                                <div class="flex row actions">
                                                                                    <div>
                                                                                        <div class="white material-icons btn btn-info btn-xs" rel="tooltip" title="{{ $detail->product->long_description }}"><i class="fa fa-info"></i></div>
                                                                                    </div>
                                                                                    <div>
                                                                                        <button type="submit" class="material-icons btn btn-danger btn-xs" title=""><i class="fa fa-trash"></i>
                                                                                    </div>
                                                                                </div>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <!-- @endforeach -->
                                                </tbody>
                                        </table>
                                        <div class="total" style="color: palevioletred; margin-top: 60px;"><h4>Importe a pagar: $ {{ auth()->user()->cart->total }}</h4>
                                            <h5 class="text-muted">(No incluido envío)</h5>
                                        </div>
                                    </div>
                                </div>
                                <hr class="col separator" style="">
                                
                                <div class="col" style="padding-top: 40px;">
                                    <h5 class="" style="margin-top: 10px; margin-bottom: 30px; color: palevioletred;"><u>MÉTODO DE ENVÍO</u></h5>
                                    <h4 class="text-muted" style="margin-bottom: 50px;">(Completá tus datos para acordar costo y tiempo de entrega)</h4>
                                    
                                        <div class="togglebutton">
                                            <label>
                                                <span class="material-icons" style="color: palevioletred;">local_shipping</span>
                                                <input type="checkbox" id="myCheck" name="quantity"> 
                                                <b class="white"> Datos de envío<b>
                                            </label>
                                        </div>
                                        
                                        <!-- <div class="togglebutton" style="margin-top:10px;">
                                            <label>
                                                <input type="checkbox" id="myUnCheck" name="quantity" onclick="uncheck();"> 
                                                <b class="white">No acordar envío<b>
                                            </label>
                                        </div> -->
                            

                                    
                                    <!-- <button class="btn btn-round btn-info"  data-toggle="collapse" href="#collapseform" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="material-icons">mail</i> Acordar Envio
                                    </button> -->

                                    
                                    <div class="collapse margin" id="collapseform" style="margin-top: 50px;  margin-bottom: 80px;">
                                        <form method="post" id="formData">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            @foreach (auth()->user()->cart->details as $detail)
                                        
                                            @endforeach
                                            <div class="form-group col-md-4">
                                                    <label for="inputNombre">Nombre</label>
                                                    <input type="text" class="form-control" name="nombre" id="bloqueoname" value="{{ auth()->user()->name }}" onKeyDown="limitText(this,30);" placeholder="">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputApellido">Apellido</label>
                                                    <input type="text" class="form-control" name="apellido" id="bloqueoname" onKeyDown="limitText(this,30);" placeholder="">
                                                </div>
                                                
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                    <label for="inputIdentidad">Cédula de Identidad</label>
                                                    <input type="text" class="form-control" name="identidad" id="" onKeyDown="limitText(this,30);" placeholder="">
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group col-md-4">
                                                    <label for="inputCel">Nº Celular</label>
                                                    <input type="text" class="form-control" name="celular" id="" onKeyDown="limitText(this,30);" placeholder="">
                                                </div> -->

                                                <!-- <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                    <label for="inputEmail">Correo Electrónico</label>
                                                    <input type="email" class="form-control" name="email" id="" onKeyDown="limitText(this,30);" placeholder="">
                                                    </div>
                                                </div> -->
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                    <label for="inputPais">País</label>
                                                    <input type="text" class="form-control" name="pais" id="" onKeyDown="limitText(this,30);" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                    <label for="inputProvincia">Provincia</label>
                                                    <input type="text" class="form-control" name="provincia" id="" onKeyDown="limitText(this,30);" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                    <label for="inputCL">Cantón/Localidad</label>
                                                    <input type="text" class="form-control" name="localidad" id="" onKeyDown="limitText(this,30);" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                    <label for="inputCalle">Nombre de Calle</label>
                                                    <input type="text" class="form-control" name="calle" id="" onKeyDown="limitText(this,30);" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                    <label for="inputSolar">Nº Solar</label>
                                                    <input type="text" class="form-control" name="solar" id="" onKeyDown="limitText(this,30);" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                    <label for="inputManzana">Nº Manzana</label>
                                                    <input type="text" class="form-control" name="manzana" id="" onKeyDown="limitText(this,30);" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                    <label for="inputVilla">Nº Villa</label>
                                                    <input type="text" class="form-control" name="villa" id="" onKeyDown="limitText(this,30);" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-12" style="margin-bottom: 100px;">
                                                    <label for="inputDesc">Otra Referencia</label>
                                                    <h6 class="text-muted">(Brindanos otros detalles de tu domicilio para hacerte llegar nuestros productos)</h6>
                                                    <textarea class="form-control" name="desc" id="" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="method" name="method"></input>
                                        </form>
                                    </div>
                                </div>
                                
                                <script
                                    src="https://www.paypal.com/sdk/js?client-id=ASp1w72_yWq_k8DLj0VjTL2i7VscyVgKM1ZXK1hOo88p_wQVKrU2gffFvHI2ImaJAiiH2lLtWjI5xo9z&currency=USD"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
                                </script>

                            </div>
                            <hr class="col separator">
                                <div class ="container sendmethod" style="width: auto; padding: 20px; margin-top: 20px;">
                                    <h5 class="" style="margin-top: 20px; margin-bottom: 30px; color: palevioletred;">
                                    <span class="material-icons">attach_money</span>  <u>ELIGE TU MÉTODO DE PAGO</u></h5>
                                    <button id="activate" class="btn btn-simple">
                                        <i class="material-icons">lock</i> Volver a elegir
                                    </button>
                                    <div class="togglebutton" style="margin-bottom: 30px; margin-top: 20px;">
                                        <label>
                                            <input type="checkbox" class="checkbox" name="quantity" id="transf"> 
                                                <b class="white">Transferencia Bancaria<b>
                                            <div class="collapse" id="transfB">
                                                <h4 class="text-muted" style="margin-top: 30px; padding: 15px; background-color: palevioletred; color: white;">Nº de cuenta: 12345678987654321</h4>
                                                <div class="form-group col">
                                                    <label for="inputNombre">Nombre: </label>
                                                    <!-- <input type="text" class="form-control" name="nombre" id="bloqueoname" onKeyDown="limitText(this,30);" placeholder=""> -->
                                                    <b class="white">Panchito<b>
                                                </div>

                                                <div class="form-group col">
                                                    <label for="inputApellido">Apellido: </label>
                                                    <!-- <input type="text" class="form-control" name="apellido" id="bloqueoname" onKeyDown="limitText(this,30);" placeholder=""> -->
                                                    <b class="white">Garvanzo<b>
                                                </div>

                                                <div class="form-group col">
                                                    <label for="inputEmail">Email: </label>
                                                    <!-- <input type="text" class="form-control" name="nombre" id="" onKeyDown="limitText(this,30);" placeholder=""> -->
                                                    <b class="white">calaveranochilla@gmail.com<b>
                                                </div>

                                                <div class="form-group col">
                                                    <label for="inputCedula">Nº Cedula: </label>
                                                    <!-- <input type="text" class="form-control" name="apellido" id="" onKeyDown="limitText(this,30);" placeholder=""> -->
                                                    <b class="white">123456789<b>
                                                </div>
                                            </div>
                                        </label>
                                    </div>

                                    <div class="togglebutton" style="margin-top: 40px;">
                                        <label>
                                            <input type="checkbox" class="checkbox" name="quantity" id="cash"> 
                                            <b class="white">Pagar a contraentrega<b>
                                            <div class="d-flex collapse" id="cashbutton">
                                                <h5 class="text-muted" style="margin-top: 30px;">(Podrás pagar tus productos en efectivo al momento de la entrega)</h5>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="togglebutton" style="margin-top: 40px;">
                                        <label>
                                            <input type="checkbox" class="checkbox" name="quantity" id="paypal"> 
                                            <b class="white">Pagar mediante PayPal<b>
                                            <div class="d-flex collapse" style="padding-top:50px;" id="paypalbutton">
                                                <div id="paypal-button-container"></div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <button onclick="submit();" id="submit" class="btn btn-success">
                                    <i class="material-icons">done</i> Realizar pedido
                                </button>
                            </div>
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
@include('includes.footer')


@if(auth()->user()->cart->details->count())
<script>
   
  paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '{{ auth()->user()->cart->total }}'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        //alert('Transaction completed by ' + details.payer.name.given_name);

        Push.create("Tienda Online",{
			body: "Nuevo Pedido! ${{ auth()->user()->cart->total }}",
			icon: "img/carritoonline.png",
            //timeout: 12000,
            requireInteraction: "true",
            vibrate: "200",
			onClick: function () {
				
                window.focus();
                this.close();
			}
        });
        
      });
    }
  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.


$( document ).ready(function() {
    
$("#submit").prop('disabled', true); 

  });


var checkbox = $(".checkbox")

    checkbox.on('click', function(){

        if($(this).val() == 'on'){
            $(".checkbox").prop('disabled', true)
        }

    });

var activate = $("#activate")

activate.on('click', function(){

    $(".checkbox").prop('disabled', false)
    $(".checkbox").prop('checked', false)
    $("#submit").prop('disabled', true);
    $( ".collapse" ).fadeOut("3000"); 
});


$( "#myCheck" ).click(function() {
  $( "#collapseform" ).fadeToggle("3000");
});

$( "#paypal" ).click(function() {
    $("#submit").prop('disabled', false);
  $( "#paypalbutton" ).fadeToggle( "8000", function() {
    $('#method').val('PayPal')
  });
});

$( "#transf" ).click(function() {
    $("#submit").prop('disabled', false);
  $( "#transfB" ).fadeToggle( "300", function() {
    $('#method').val('Transferencia Bancaria')
  });
});


$( "#cash" ).click(function() {
    $("#submit").prop('disabled', false);
  $( "#cashbutton" ).fadeToggle( "300", function() {
    $('#method').val('Efectivo')
  });
});

function limitText(limitField, limitNum) { 
    if (limitField.value.length > limitNum) { 
     limitField.value = limitField.value.substring(0, limitNum); 
    } 
} 

</script>
@endif


<script>


$(window).load(function() {

let myInputname = $("#myForm :input");

myInputname.on('paste', function(e) {
    e.preventDefault();
    alert("esta acción no está permitida");
});

});


    $('#bloqueoname').blur(function(){
    
    var input = $(this).val();
    var regex = new RegExp("^[a-z A-Z]+$");
    if(regex.test(input)) {

        var input = $.trim(input); 
        //console.log(input.length)
    
    }else{
        var input = $(this).val('');
    }
    });

    $('#bloqueoapellido').blur(function(){
    
    var input = $(this).val();
    var regex = new RegExp("^[a-z A-Z]+$");
    if(regex.test(input)) {

        var input = $.trim(input); 
        //console.log(input.length)
    
    }else{
        var input = $(this).val('');
        
    }
    });

    $('input[name="cpostal"]').blur(function(e)
    {
        
    if (/\D/g.test(this.value))
    {
            $(this).val('');
    }else{
        if($('input[name="cpostal"]').val().length < 4) {  
            
            $(this).val('');
        
        }  
    }
    });
    
    function submit()

{
    var url = '{{ url("/order") }}';
    $("#formData").attr('action', url);
    $("#formData").submit();

    $.ajax({
    url: '/gmail',
    type: 'GET',
    success: function(response) {
        toastr.success('Pedido enviado con éxito!');
        window.location = "/"
    }
    });
    
}



	</script>

  @endsection
  