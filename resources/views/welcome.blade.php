@extends('layouts.app')

@section('title', 'Bienvenidos a ' . config('app.name'))

@section('body-class', 'landing-page')

@section('styles')
    <style>

    .header{
        background-image: url('{{ '/images/portada/'.$photo }}');
    }

      .main{
        background-color: white;
      }

      .title a{
        color: black;
      }

      .textinfo{
        font-family: 'Old Standard TT', serif;
        font-size: 25px;
        line-height: 30px;
        
      }

      .description{
        color: black;
      }

      h2.title{
        color: black;
        font-family: 'Old Standard TT', serif;
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
    
        .center{
            margin-top: 70px;
        }

        .margin{
            margin-bottom: 30px;
        }

        .social{
            display: flex;
            justify-content: flex-start;
        }

        .info-title:hover{
            color: palevioletred;
        }

        .info-title{
            color: #2e2e2e;
        }

        .team-player{
            padding: 8px;
        }

/* carousel styles */        

.headerx{
	overflow: hidden;
	height: 60vh;
	/* width: 100vw; */
	display: flex;
	justify-content: center;
	align-items: center;
	/* background: #252525; */
}


.slider-box{
	width: 30vh;
	perspective: 1000px;
	position: relative;
	top:-17vh;/* height to top */
	padding-top: 10vh;
}
.carousel{
	width: 100%;
	transform-style: preserve-3d;
	animation: rotate 70s infinite linear; /*  speed:  */
}
.carousel .carousel-item{
	width: 100%;
	height: 25vh;
	position: absolute;
	overflow: hidden;
}
.it1{
	transform: rotateY(0deg) translateZ(50vh);
}
.it2{
	transform: rotateY(40deg) translateZ(50vh);
}
.it3{
	transform: rotateY(80deg) translateZ(50vh);
}
.it4{
	transform: rotateY(120deg) translateZ(50vh);
}
.it5{
	transform: rotateY(160deg) translateZ(50vh);
}
.it6{
	transform: rotateY(200deg) translateZ(50vh);
}
.it7{
	transform: rotateY(240deg) translateZ(50vh);
}
.it8{
	transform: rotateY(280deg) translateZ(50vh);
}
.it9{
	transform: rotateY(320deg) translateZ(50vh);
}
.it10{
	transform: rotateY(360deg) translateZ(50vh);
}
.carousel-item{
	 box-shadow: 0px 0px 20px 0px #000;
	 border-radius: 3vh;

}
.carousel .img{
	transition: ease-in-out 0.5s;
	width: 100%;
	height: 100%;
}
.carousel .img:hover {
	transform: scale(1.1);
	transition: all 0.5s;
	position: relative;
}
.carousel:hover {
	animation-play-state: paused;
	cursor: pointer;
}
/* animation rotate */
@keyframes rotate {
	from {
		transform: rotateY(0deg);
	} to {
		transform: rotateY(360deg);
	}
}

/* carousel styles */      

    </style>
@endsection

<head>

</head>

@section('content')
<div class="">

    <div class="header header-filter" style="background-color: #1c1919; background-repeat: no-repeat; background-attachment: fixed; background-position: top center" />
        
        <div class="container">
            <div class="container">
                <h1 class="title">Bienvenido a {{ config('app.name') }}.</h1>
                <p class="textinfo">"Vende o compra sin salir de casa ... "</p>
                {{--<br />--}}
                {{--<a href="#" class="btn btn-danger btn-raised btn-lg">--}}
                    {{--<i class="fa fa-play"></i> ¿Cómo funciona?--}}
                {{--</a>--}}
            </div>
            @if(auth()->check())
            @if(auth()->user()->admin)
            <form method="post" id="formWallpaper" action="{{ url('/admin/portada/images') }}"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="portada" required>
                <button type="submit" class="btn btn-primary btn-round">Cambiar foto de portada</button>
                <!-- <a href="{{ url('/admin/products') }}" class="btn btn-default btn-round">Volver al listado de productos</a> -->
            </form>
            @endif
            @endif
        </div>
    </div>
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">

<div class="headerx">
		<div class="slider-box">
			<div class="carousel">
				<div class="carousel-item it1">
					<img class="img" src="{{ 'images/carousel/'.$carousel[0]->path }}">
				</div>
				<div class="carousel-item it2">
                    <img class="img" src="{{ 'images/carousel/'.$carousel[1]->path }}">
				</div>
				<div class="carousel-item it3">
                    <img class="img" src="{{ '/images/carousel/'.$carousel[2]->path }}">
				</div>
				<div class="carousel-item it4">
                    <img class="img" src="{{ '/images/carousel/'.$carousel[3]->path }}">
				</div>
				<div class="carousel-item it5">
                    <img class="img" src="{{ '/images/carousel/'.$carousel[4]->path }}">
				</div>
				<div class="carousel-item it6">
                    <img class="img" src="{{ '/images/carousel/'.$carousel[5]->path }}">
				</div>
				<div class="carousel-item it7">
                    <img class="img" src="{{ '/images/carousel/'.$carousel[6]->path }}">
				</div>
				<div class="carousel-item it8">
                    <img class="img" src="{{ '/images/carousel/'.$carousel[7]->path }}">
				</div>
				<div class="carousel-item it9">
                    <img class="img" src="{{ '/images/carousel/'.$carousel[8]->path }}">
				</div>
				<div class="carousel-item it10">
                    <img class="img" src="{{ '/images/carousel/'.$carousel[9]->path }}">
				</div>
			</div>
		</div>
	</div>



<div style="margin-bottom: 70px;">
    @if(auth()->check())
    @if(auth()->user()->admin)
    <form method="post" id="formWallpaper" action="{{ url('/admin/carousel/images') }}"  enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="carousel" required>
        <button type="submit" class="btn btn-danger btn-round">Cambiar foto de carrusel</button>
    </form>
    @endif
    @endif
 </div>

            <h2 class="title">NUESTROS PRODUCTOS</h2>

            <form class="form-inline" method="get" action="{{ url('/search') }}">
                <input type="text" placeholder="¿Qué producto buscas?" class="form-control" name="query" id="search">
                <button class="butt" type="submit">
                    <i class="material-icons">search</i>
                </button>
            </form>

            <div class="team">
                <div class="row">
                    @foreach ($categories as $category)
                    <div class="col" style="margin:auto;">
                        <div class="team-player card">
                            <a href="{{ url('/categories/'.$category->id) }}"><img src="{{ $category->featured_image_url }}" alt="Imagen representativa de la categoría {{ $category->name }}" class="img-raised img-circle" style="height: 130px; width: 130px;"></a>
                            <h4 class="title">
                                <a href="{{ url('/categories/'.$category->id) }}">{{ $category->name }}</a>
                            </h4>
                            <p class="">{{ $category->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

            <div class="section text-center section-landing">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="title">¿Por qué confiar en {{ config('app.name') }}?</h2>
                    <h5 class="description">Puedes revisar nuestra relación completa de productos, comparar precios y realizar tus pedidos cuando estés seguro.</h5>
                </div>
            </div>

            <!--div class="features">
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
            </div-->
        </div>
        

        <div class="section landing-section">
            <div class="container">
                <div class="col-md-8 col-md-offset-2">
                @if (session('notification'))
                    <div class="">
                        <!-- <h4>{{ session('notification') }}</h4> -->
                        <script> toastr.error('Correo no enviado, verifique sus datos!');</script>
                    </div>
                @endif
                    <h2 class="text-center title">Contactanos</h2>
                    <!-- <h4 class="text-center description">Ingresa los datos básicos a continuación, estamos atentos de informarte.</h4> -->
                    <form class="contact-form" method="get" id="myForm" action="{{ url('/email') }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre</label>
                                    <input type="text" class="form-control" id="bloqueoname" name="name" onKeyDown="limitText(this,30);">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Correo electrónico</label>
                                    <input type="email" class="form-control" id="" name="email" onKeyDown="limitText(this,30);">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Celular</label>
                                    <input type="text" class="form-control" id="" name="cel" onKeyDown="limitText(this,10);">
                                </div>
                            </div>
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">Tu mensaje</label>
                            <input type="textarea" class="form-control" id="bloqueomensaje" pattern="[a-zA-Z ]{2,254}" rows="4" name="message" onKeyDown="limitText(this,70);"></input>
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

                <div class="center col" style="padding: 10px; margin: 10px; border-radius: 10px;">
                   

                    <div class="icon icon-info margin" data-toggle="collapse" href="#collapseExample0" aria-expanded="false" aria-controls="collapseExample">
                        
                        <h6 class="info-title" style="cursor: pointer;">Tus consultas</h6>
                    </div>
                    <div class="collapse margin" id="collapseExample0">
                        <div class="card-body">
                        <i class="material-icons">email</i>
                            <p>Atendemos rápidamente cualquier consulta que tengas vía mail. Estamos atentos a tus inquietudes para que puedas disfrutar del buen contenido.</p>
                        </div>
                    </div>

                    <div class="icon icon-success margin" data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
                        
                        <h6 class="info-title" style="cursor: pointer;">Pago seguro</h6>
                    </div>
                    <div class="collapse margin" id="collapseExample1">
                        <div class="card-body">
                        <i class="material-icons">verified_user</i>
                            <p>Toda transacción de pago será procesada a través de canales confiables. Tendrás multiples formas de pago para seleccionar y disfrutar el servicio.</p>
                        </div>
                    </div>
                
                    <div class="icon icon-danger margin" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                       
                        <h6 class="info-title" style="cursor: pointer;">Información privada</h6>
                    </div>
                    <div class="collapse margin" id="collapseExample2">
                        <div class="card-body">
                        <i class="material-icons">lock</i>
                            <p>Los pedidos que realices sólo los conocerás tú a través de tu panel de usuario. Nadie más tiene acceso a esta información.</p>
                        </div>
                    </div>
                    <div class="icon icon-danger margin" data-toggle="collapse" href="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                       
                        <h6 class="info-title" style="cursor: pointer;">Siguenos en</h6>
                    </div>
                    <div class="" id="">
                        <div class="card-body">
                            <div class="d-flex social">        
                                <div style="padding-right: 10px;">
                                    <i><img src ="img/blackf.png" style="height: 40px; width:40px ;"></i>
                                </div>
                                <div style="padding-right: 10px;">
                                    <i><img src ="img/blacki.png" style="height: 40px; width:40px ;"></i>
                                </div>
                                <div>
                                    <i><img src ="img/blackt.png" style="height: 40px; width:40px ;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
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


    function limitText(limitField, limitNum) { 
    if (limitField.value.length > limitNum) { 
     limitField.value = limitField.value.substring(0, limitNum); 
    } 
} 

    $(window).load(function() {

    let myInputname = $("#myForm :input");

    myInputname.on('paste', function(e) {
        e.preventDefault();
        alert("esta acción no está permitida");
    });

    });


$('input[name="cel"]').blur(function(e)
    {
        
if (/\D/g.test(this.value))
  {
        $(this).val('');
  }else{
    if($('input[name="cel"]').val().length < 8) {  
      
        $(this).val('');
    }  
  }
});


$('#bloqueoname').blur(function(){

var input = $(this).val();
var regex = new RegExp("^[a-z A-Z]+$");

if(regex.test(input)) {

    var input = $.trim(input); 
    console.log(input.length)
   
}else{
    var input = $(this).val('');
    
}
});

$('#bloqueomensaje').blur(function(){

var input = $(this).val();
var regex = new RegExp("^[a-z A-Z]+$");
if(regex.test(input)) {

    var input = $.trim(input); 
    console.log(input.length)
    return true;
}else{
    var input = $(this).val('');
    return false;
}
});

// $('.carousel').carousel({
//   interval: 3000
// })

// $("#formWallpaper").on('submit', function(){

//    var photo = $('input[name="portada"]').val();

   //alert(photo)

// let dir = '/images/portada/';
   
// $.ajax({
//         url: '/admin/portada/show',
//         type: 'GET',
//         success: function(response) {
//            //alert('/images/portada/' + response.path)
//             $('.wallpaper').append('<img src="' + '/images/portada/'+ response.path + '" />');
// }
//     });
    
//});


    </script>
    
@endsection
