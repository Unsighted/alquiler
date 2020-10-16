@extends('layouts.app')

@section('title', 'Pedidos Realizados')

@section('body-class', 'profile-page')

@section('styles')
    <style>

        .main{
            background-color: brown; 
        }

         .team .col{
            display: flex;
            justify-content: space-around;  
        } 
        
        .separator{
            border: 3px #2e2e2e dashed;
            background-color: white;
            color: black;
            opacity: .8;
            
        }

        .gmailx{
            background-position: left;
            background-repeat: no-repeat;
        }

        .title{
            color: white;
        }

        strong{
            color: rgb(3, 129, 191);
        }

        .color{
            color: grey;
        }

        .esconder{
            display: none;
        }

    </style>
@endsection

@section('content')

<div class="header header-filter" style="background-image: url('{{ asset('img/fondo.jpg') }}');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container gmailx"  style="background-image: url('{{ asset('img/gmail.png') }}');">
            <div class="row">
                <div class="profile">
                   
                    <div class="name"> 
                        <h3 class="title ordernum"><span class="title">Pedidos Realizados</span></h3>
                    </div>
                    <!-- {{ DB::table('gmails')->count() }} -->
                </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>Borrado de pedido</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><b>Esta acción no podrá revertirse.</b></p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"  data-dismiss="modal" id="showButtons">Ok, continuar</button>
                    </div>
                        
                    </div>
                </div>
            </div>

            @if($details->count())
            @foreach($details as $detail)
            <div style="margin-bottom: 20px;">
                <div class="row container">
                    <div class="col-md-10 separator" onclick="submit('{{ $detail->order }}');">
                        <div class="icon icon-danger margin" data-toggle="collapse" data-target="#{{ $detail->order }}" aria-expanded="false" aria-controls="collapseExample"> 
                        <h5><p class="card btn btn-danger">Nº Orden: {{ $detail->cart_id }}</p></h5>
                            <h5><p class=""><b>Cliente:</b> {{ $detail->persona }}</p></h5>
                            
                                <h5><p class="text-danger"><b style="cursor: pointer;">Ver detalle</b></p></h5>
                                @if($detail->status == 'Pendiente')<span id="mailP" class="material-icons" style="cursor: pointer;">mail</span>@endif
                                @if($detail->status == 'Checkeado')<span id="mail" class="material-icons" style="cursor: pointer; color: grey;">mail</span>@endif
                                </div>

                                    <div>
                                        <button  class="btn btn-danger  btn-sm btn-round" id="showButtons" data-toggle="modal" data-backdrop="false" data-target="#exampleModal"><i class="fa fa-trash"></i>
                                    </div>

                                        <form method="post" id="deleteOrder" action="/deleteOrder">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" name="order_detail_id" value="{{ $detail->id }}">
                                                <button type="submit" class="btn btn-success btnActions" onclick="deleteOrder();">Confirmar</button>
                                                <button type="button" class="btn btn-danger btnActions cancel"  data-dismiss="modal">Cancelar</button>
                                        </form>
                                        

                            <div class="collapse sep" id="{{ $detail->order }}">
                                <h4 class="">
                                <strong>
                                    {{ $detail->name }}</a>
                                </strong>
                                </h4>
                                <p class="update"><b>Artículo:</b> {{ $detail->description }}</p>
                                <p class="update"><b>Detalle:</b> {{ $detail->long_description }}</p>
                                <p class="update"><b>Precio:</b> ${{ $detail->price }}</p>
                                <p class="update"><b>Cantidad:</b> {{ $detail->quantity }}</p>
                                <p class="update"><b>Hora de pedido:</b> {{ $detail->created_at }}</p>
                                <p class="update"><b>Estado del pedido:</b> {{ $detail->status }}</p>
                                <p class="update"><b>Celular:</b> {{ $detail->phone }}</p>
                            </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <script> toastr.error('Ningún pedido aún!');</script>
            @endif
           
        </div>
    </div>
</div>

@section('scripts')
<script>
            
function submit(detailId)

{
    
    $.ajax({
        url: '/admin/checked',
        type: 'GET',
        data: 'status=' + 'Checkeado' + '&order=' + detailId,
        success: function(response) {

}
    })

}

function deleteOrder()

     {
         
         var url = '{{ url("/deleteOrder") }}';
         $("#deleteOrder").attr('action', url);
         $("#deleteOrder").submit();
     }

     $(".btnActions").hide();

     $('#showButtons').on('click', function(){
        $(".btnActions").fadeToggle();
     });

     $('.cancel').on('click', function(){
        $(".btnActions").fadeOut();
     });


</script>
@endsection

@include('includes.footer')
@endsection
