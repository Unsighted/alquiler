@extends('layouts.app')

@section('title', 'Listado de productos')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/wallpaperccc.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
          <div class="w3-container w3-responsive w3-threequarter" style="height:500px;">
              <div class="w3-container w3-card-4 w3-padding w3-margin-bottom" style="background-color: #9c27b0">
                <h4 style="color: rgb(255, 255, 255);">Listado de Modelos</h4>
              </div>
            <div class="team">
                <div class="row">
                    <a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-round" style="margin-bottom: 45px">Nueva modelo</a>
                  <table class = "w3-table w3-striped w3-margin-bottom w3-centered w3-card-4">
                        <thead>
                            <tr style="color: rgb(255, 255, 255); background-color:rgb(221, 104, 212);">
                                <th class="text-center">#</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Descripción</th>
                                <th class="text-center">Categoría</th>
                                <th class="text-center">Precio</th>
                                <th class="text-center">Info</th>
                                <th class="text-center">Imagen</th>
                                <th class="text-center">Editar</th>
                                <th class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td class="text-center">{{ $product->id }}</td>
                                <td class="text-center">{{ $product->name }}</td>
                                <td class="text-center">{{ $product->description }}</td>
                                <td class="text-center">{{ $product->category_name }}</td>
                                <td class="text-center">$ {{ $product->price }}</td>

                                    <form method="post" action="{{ url('/admin/products/'.$product->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <td>
                                          <a href="{{ url('/products/'.$product->id) }}" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs" target="_blank">
                                            <i class="fa fa-info"></i>
                                          </a>
                                       </td>
                                       <td>
                                         <a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tooltip" title="Imágenes del producto" class="btn btn-warning btn-simple btn-xs">
                                             <i class="fa fa-image"></i>
                                         </a>
                                       </td>
                                      <td>
                                         <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar producto" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                      </td>
                                      <td>
                                        <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                      </td>
                                    </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

@include('includes.footer')
@endsection
