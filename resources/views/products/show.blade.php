@extends('layouts.app')

@section('body-class', 'profile-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/fondo.jpg') }}');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <img src="{{ $product->featured_image_url }}" alt="Circle Image" class="img-circle img-responsive img-raised">
                    </div>

                    <div class="name">
                        <h3 class="title" style="color: palevioletred;">{{ $product->name }}</h3>
                        <h6 style="color: palevioletred">{{ $product->category->name }}</h6>
                    </div>


                    @if (session('notification'))
                        <div class="btn btn-success">
                            {{ session('notification') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="description text-center">
                <p>$ {{ $product->price }}</p>
                <p>{{ $product->long_description }}</p>
            </div>

            <div class="text-center">
                @if (auth()->check())
                
                    <button class="btn btn-primary btn-round btnAniadir" data-toggle="modal"  data-target="#modalAddToCart"  onclick="validarExistencia('{{ $product->id }}');">
                        <i class="material-icons">add</i> Añadir al carrito
                    </button>
               
                @else
                    <a href="{{ url('/login?redirect_to='.url()->current()) }}" class="btn btn-primary btn-round">
                        <i class="material-icons">add</i> Añadir al carrito
                    </a>
                @endif
            </div>

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="profile-tabs">
                        <div class="nav-align-center">

                            <div class="tab-content gallery">
                                <div class="tab-pane active" id="studio">
                                    <div class="card" style="padding:10px;">
                                        <div class="col-md-12">
                                            @foreach ($imagesLeft as $image)
                                                <img src="{{ $image->url }}" class="" />
                                            @endforeach
                                        </div>
                                        <div class="col-md-12">
                                            @foreach ($imagesRight as $image)
                                                <img src="{{ $image->url }}" class="" />
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Profile Tabs -->
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Seleccione la cantidad que desea agregar</h4>
      </div>
      <form method="post" action="{{ url('/cart') }}">
        {{ csrf_field() }}
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="category" value="{{ $product->category_id }}">
        <div class="modal-body">
            <input type="number" name="quantity" value="1" class="form-control" id="numero1" onblur="return validarRango(this);" maxlength="2">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-info btn-simple" id="submit">Añadir al carrito</button>
          </div>
      </form>
    </div>
  </div>
</div>

    <div class="modal modalExist" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Información</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <p><b>Este producto ya se ha cargado al carrito.</b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
            </div>
            </div>
        </div>
    </div>

@section('scripts')

<script>

function validarRango(elemento){
  var numero = parseInt(elemento.value,10);
  //Validamos que se haya ingresado solo numeros
  if(isNaN(numero)){
    alert('Ingrese solo números.');
    elemento.focus();
    elemento.select();
    return false;
  }
//   //Validamos que se cumpla el rango
//   if(numero<1 || numero>20){
//     alert('Solo se permite la siguiente cantidad: 1 a 20 artículos');
//     elemento.focus();
//     return false;
//   }
//   return true;
}

$('input[name="quantity"]').keypress(function(e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        
        e.preventDefault();
        return false;
    }
});

function validarExistencia(productId){

    $.ajax({
        url: '/cart/cant',
        type: 'GET',
        data: 'id=' + productId,
        success: function(response) {
            $(".modalAddToCart").hide();
            toastr.error('Producto ya existe en el carrito!');
            $("#submit").prop('disabled', true);
            
}
    });

}

</script>

@endsection

@include('includes.footer')
@endsection
