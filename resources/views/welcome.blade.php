@extends('layouts.app')

@section('title', 'Bienvenidos a ' . config('app.name'))

@section('body-class', 'landing-page')

@section('styles')
    <style>

      .main{
        background-color: white;
      }

      .title a{
        color: black;
      }

      .textinfo{
        font-family: 'Old Standard TT', serif;
        font-size: 25px;
        
      }

      .description{
        color: black;
      }

      h2.title{
        color: crimson;
      }

        .team .row .col-md-4 {
            margin-bottom: 5em;
        }
        .team .row {
          display: -webkit-box;
          display: -webkit-flex;
          display: -ms-flexbox;
          display:         flex;
          flex-wrap: wrap;
        }
        .team .row > [class*='col-'] {
          display: flex;
          flex-direction: column;
        }

        .tt-query {
          -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
             -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        .tt-hint {
          color: #999
        }

        .tt-menu {    /* used to be tt-dropdown-menu in older versions */
          width: 222px;
          margin-top: 4px;
          padding: 4px 0;
          background-color: #fff;
          border: 1px solid #ccc;
          border: 1px solid rgba(0, 0, 0, 0.2);
          -webkit-border-radius: 4px;
             -moz-border-radius: 4px;
                  border-radius: 4px;
          -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
             -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                  box-shadow: 0 5px 10px rgba(0,0,0,.2);
        }

        .tt-suggestion {
          padding: 3px 20px;
          line-height: 24px;
        }

        .tt-suggestion.tt-cursor,.tt-suggestion:hover {
          color: #fff;
          background-color: #0097cf;

        }

        .tt-suggestion p {
          margin: 0;
        }

      
    </style>
@endsection

@section('content')
<div class="">
    <div class="header header-filter"  style="background-image: url('{{ asset('/img/wallpaper.jpg') }}'); background-color: #1c1919; background-repeat: no-repeat; background-attachment: fixed; background-position: top center">
        <div class="container">
            <div class="container">
                <h1 class="title">Bienvenido a {{ config('app.name') }}.</h1>
                <p class="textinfo">" Disfruta los placeres que te quedan sin dañar... "</p>
                <div class="panel card btn btn-danger">
                        <h3 style="">Horarios de transmisión de 20:00 a 22:00 HS .</h3>
                    </div>
                {{--<br />--}}
                {{--<a href="#" class="btn btn-danger btn-raised btn-lg">--}}
                    {{--<i class="fa fa-play"></i> ¿Cómo funciona?--}}
                {{--</a>--}}
            </div>
        </div>
    </div>
</div>

<div class="container main main-raised">
    <div class="container">
        <div class="section text-center section-landing">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="title">¿Por qué confiar en {{ config('app.name') }}?</h2>
                    <h5 class="description">Puedes revisar nuestra relación completa de productos, comparar precios y realizar tus pedidos cuando estés seguro.</h5>
                </div>
            </div>

            <div class="features">
                <div class="row">
                    <div class="col-md-6">
                        <div class="info">
                            <div class="icon icon-primary">
                                <i class="material-icons">email</i>
                            </div>
                            <h4 class="info-title">Atendemos tus dudas</h4>
                            <p>Atendemos rápidamente cualquier consulta que tengas vía mail. Estamos atentos a tus inquietudes para que puedas disfrutar del buen contenido.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">verified_user</i>
                            </div>
                            <h4 class="info-title">Pago seguro</h4>
                            <p>Toda transacción de pago será procesada a través de canales confiables. Tendrás multiples formas de pago para seleccionar y disfrutar el servicio.</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="material-icons">lock</i>
                            </div>
                            <h4 class="info-title">Información privada</h4>
                            <p>Los pedidos que realices sólo los conocerás tú a través de tu panel de usuario. Nadie más tiene acceso a esta información.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section text-center">
            <h2 class="title">Nuestras modelos</h2>

            <form class="form-inline" method="get" action="{{ url('/search') }}">
                <input type="text" placeholder="¿Qué modelo buscas?" class="form-control" name="query" id="search">
                <button class="butt" type="submit">
                    <i class="material-icons">search</i>
                </button>
            </form>

            <div class="team">
                <div class="row">
                    @foreach ($categories as $category)
                    <div class="col-md-4">
                        <div class="team-player">
                            <a href="{{ url('/categories/'.$category->id) }}"><img src="{{ $category->featured_image_url }}" alt="Imagen representativa de la categoría {{ $category->name }}" class="img-raised img-circle"></a>
                            <h4 class="title">
                                <a href="{{ url('/categories/'.$category->id) }}">{{ $category->name }}</a>
                            </h4>
                            <p class="description">{{ $category->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="section landing-section">
            <div class="container">
                <div class="col-md-8 col-md-offset-2">
                @if (session('notification'))
                    <div class="btn btn-danger">
                        <h4>{{ session('notification') }}</h4>
                    </div>
                @endif
                    <h2 class="text-center title">¿Tienes una consulta?</h2>
                    <h4 class="text-center description">Ingresa los datos básicos a continuación, estamos atentos de informarte.</h4>
                    <form class="contact-form" method="get" action="{{ url('/email') }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Correo electrónico</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">Tu mensaje</label>
                            <input type="textarea" class="form-control" rows="4" name="message"></input>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <button class="btn btn-success btn-raised">
                                    Realizar consulta
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@include('includes.footer')
@endsection

@section('scripts')
    <script src="{{ asset('/js/typeahead.bundle.min.js') }}"></script>
    <script>
        $(function () {
            //
            var products = new Bloodhound({
              datumTokenizer: Bloodhound.tokenizers.whitespace,
              queryTokenizer: Bloodhound.tokenizers.whitespace,
              prefetch: '{{ url("/products/json") }}'
            });

            // inicializar typeahead sobre nuestro input de búsqueda
            $('#search').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                name: 'products',
                source: products
            });
        });

    </script>
@endsection
