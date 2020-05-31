@extends('layouts.app')

@section('title', 'Listado de categorías')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/wallpaperccc.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
          <div class="w3-container w3-responsive w3-threequarter" style="height:500px;">
              <div class="w3-container w3-card-4 w3-padding w3-margin-bottom" style="background-color: #9c27b0">
                <h4 style="color: rgb(255, 255, 255);">Listado de categorías</h4>
              </div>
            <div class="team">
                <div class="row">
                    <a href="{{ url('/admin/categories/create') }}" class="btn btn-primary btn-round" style="margin-bottom: 45px">Nueva categoría</a>

                    <table class = "w3-table w3-striped w3-margin-bottom w3-centered w3-card-4">
                        <thead>
                          <tr style="color: rgb(255, 255, 255); background-color:rgb(221, 104, 212);">
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Descripción</th>
                                <th class="text-center">Imagen</th>
                                <th class="text-center">Info</th>
                                <th class="text-center">Editar</th>
                                <th class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                            <tr>
                                <td style="text-center">{{ $category->name }}</td>
                                <td style="text-center">{{ $category->description }}</td>
                                <td>
                                    <img src="{{ $category->featured_image_url }}" height="50">
                                </td>
                                
                                    <form method="post" action="{{ url('/admin/categories/'.$category->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <td>
                                          <a href="#" rel="tooltip" title="Ver categoría" class="btn btn-info btn-simple btn-xs">
                                              <i class="fa fa-info"></i>
                                          </a>
                                        </td>
                                        <td>
                                          <a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" rel="tooltip" title="Editar categoría" class="btn btn-success btn-simple btn-xs">
                                              <i class="fa fa-edit"></i>
                                          </a>
                                        </td>
                                        <td>
                                          <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                              <i class="fa fa-times"></i>
                                          </button>
                                        </td>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

@include('includes.footer')
@endsection
