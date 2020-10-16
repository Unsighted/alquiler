<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>@yield('title', config('app.name'))</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
</script>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=Inconsolata:wght@700&family=Merienda&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@700&family=Merienda&family=Sacramento&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    {{-- W3css style --}}
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/material-kit.css') }}" rel="stylesheet"/>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
  <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet"/>
  <script src="{{ asset('js/toastr.min.js') }}"></script>

    @section('styles')
        <style>

          .btn-primary{
            background-color: crimson;
          }

          /* .main{
            background-color: black;
          } */

          .title{
            color: rgb(3, 129, 191);
          }

          /* .title a{
            color: antiquewhite;
          } */

          /* .title a:hover{
            color: antiquewhite;
            box-shadow: 0 14px 26px -12px rgba(176, 39, 80, 0.74), 0 4px 23px 0px rgba(0, 0, 0, 0.12), 0 10px 10px -5px rgba(186, 70, 70, 0.64);
          } */

          /* .description{
            color: antiquewhite;
          } */

          h2.title{
            color: crimson;
          }

          h6{
            color: crimson;
          }

          .img-circle{
            border-radius: %50;
            padding: 2px;
            background-color: black;
          }

          .btn-pink{
            background-color: #ff4081;
          }

          .butt{
            background-color: palevioletred;
            border: none;
            border-radius: 3px;
            color: #FFFFFF;
            position: relative;
            padding: 12px 30px;
            margin: 10px 1px;
            font-size: 12px;
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 0;
            will-change: box-shadow, transform;
            transition: box-shadow 0.5s

          }

          .butt:focus, .butt:active, .butt:hover{
          background-color: palevioletred;
          box-shadow: 0 14px 26px -12px rgba(176, 39, 80, 0.42), 0 4px 23px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(176, 39, 39, 0.2);
          }

          .tienda{
            font-family: 'Old Standard TT', serif;
            font-size: 20px;
            width:200px;
          }

          .landing-page .header .title {
            font-family: 'Old Standard TT', serif;
          
          }

          .table{
            margin-top: 100px;
        }

        .pagination > li > a,
        .pagination > li > span {
            color: black; // use your own color here
        }

        .pagination > .active > a,
        .pagination > .active > a:focus,
        .pagination > .active > a:hover,
        .pagination > .active > span,
        .pagination > .active > span:focus,
        .pagination > .active > span:hover {
            background-color: crimson;
            border-color: black;
        }

        .btn-negro{
          background-color: palevioletred;
          background-image: linear-gradient(225deg, palevioletred, palevioletred, palevioletred);
          color: white;
        }

        .btn-negro:active{
          background-color: palevioletred;
          background-image: linear-gradient(225deg, palevioletred, palevioletred, palevioletred);
          color: white;
        }

        .btn-pastilla:active{
          background-color: palevioletred;
          background-image: linear-gradient(225deg, palevioletred, palevioletred, palevioletred);
          color: white;
        }

        
        @media (max-width: 767px){
            .navbar .navbar-nav .open .dropdown-menu > li > a {
        margin: 10px;
        background-color: white;
        color: crimson;
        padding: 20px;

        }

        .navbar .navbar-nav > li.open > .dropdown-menu{
            background-color: palevioletred;
        }
      }

      body::-webkit-scrollbar {
        width: 12px;               /* width of the entire scrollbar */
      }
      body::-webkit-scrollbar-track {
        background: black;        /* color of the tracking area */
      }
      body::-webkit-scrollbar-thumb {
        background-color: palevioletred;    /* color of the scroll thumb */
        border-radius: 20px;       /* roundness of the scroll thumb */
        border: 1px solid black;  /* creates padding around scroll thumb */
      }

        </style>

    @yield('styles')
</head>

<body class="@yield('body-class')">
    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="material-icons">view_headline</span>
                    <!-- <span class="material-icons">shopping_cart</span>
                    <span class="material-icons">shopping_cart</span> -->
                </button>
                <!-- <a href="{{ url('/') }}"><button class="btn btn-negro tienda">Mi Tienda <img src="{{ asset('/img/carritoonline.png') }}" alt="Tienda Online" width="50" height="50"></button></a> -->
                <a href="{{ url('/') }}"><button class="btn btn-negro tienda">Ir a la Tienda <span class="material-icons" alt="Tienda Online" width="50" height="50"></span></button></a>
            </div>

            <div class="collapse navbar-collapse" id="navigation-example">
                <ul class="nav navbar-nav navbar-right">
                    @guest
                        <li><a href="{{ route('login') }}"><button class="btn" style="background-color: palevioletred; opacity: 0.9;">Ingresar</button></a></li>
                        <li><a href="{{ route('register') }}"><button class="btn" style="background-color: palevioletred; opacity: 0.9;">Registrarse</button></a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->username }} <span class="material-icons">person</span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                               
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>

                        @if (auth()->user()->admin)
                          <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                               Configuración <span class="material-icons">settings</span>
                            </a>
                           

                            <ul class="dropdown-menu" role="menu">
                               
                                <li>
                                    <a href="{{ url('/admin/categories') }}">Gestionar categorías</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/products') }}">Gestionar productos</a>
                                </li>
                            </ul>
                          </li>

                          <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                               Pedidos <span class="material-icons">mail</span>
                               <span class="btn-warning btn-xs gmail"></span>
                            </a>
                            <!-- {{ DB::table('gmails')->count() }} -->
                            <ul class="dropdown-menu" role="menu">
                               
                                <li>
                                    <a href="{{ url('/admin/orders') }}">Gestionar pedidos</a>
                                </li>
                            </ul>
                          </li>
                          
                          @endif
                          <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                carrito <span class="material-icons">shopping_cart</span>
                                <span class="btn-danger btn-xs">{{ auth()->user()->cart->details->count() }}</span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                  <li>
                                      <a href="{{ url('/home') }}">Carrito de compras</a>
                                  </li>
                            </ul>
                          </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    
<script>
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

 $(document).ready(function() {
    $('.gmail').prop('hidden', true)
    setInterval( "actualizar()", 2000 );          
  });

    function actualizar(){
      
      $.ajax({
      url: '/admin/count',
      type: 'GET',
      success: function(response) {

      if(response.length > 0){

        $('.gmail').text(response)
        $('.ordernum').text(response)
        $('.gmail').fadeToggle('slow')
      }else{
        $('.gmail').prop('hidden', true)
      }
    }
  });
}

</script>


    <div class="wrapper">
        @yield('content')
    </div>
</body>
    
    <!--   Core JS Files   -->
    <script src="{{ asset('/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/material.min.js') }}"></script>

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('/js/nouislider.min.js') }}" type="text/javascript"></script>

    <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
    <script src="{{ asset('/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>

    <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    <script src="{{ asset('/js/material-kit.js') }}" type="text/javascript"></script>
    @yield('scripts')

</html>
