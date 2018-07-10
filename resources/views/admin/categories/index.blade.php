@extends('layouts.app')

@section('title', 'Oliveto | Listado Categorías')
@section('body-class', 'product-page')

@section('content')
<script src="{{asset ('/js/scale.js') }}" type="text/javascript"></script>
<div class="header header-filter" style="background-image: url('{{ asset('/img/fondo.jpg')  }}')">
</div>

<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <h2 class="title" style="margin-bottom: -52px;">Listado de Categorías</h2>

      <div class="team">
        <div class="row">
          <a href="{{ url('/admin/categories/create') }}" id="botontop" class="btn btn-primary btn-round">Nueva Categoría</a>
          <table id='admin_categories' class="table">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="col-md-3 text-center">Nombre</th>
                <th class="col-md-3 text-center">Descripción</th>
                <th class="col-md-2 text-center">Imagen</th>
                <th class="col-md-3 text-center">Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
              <tr>
                <td class="text-center">{{ $category->id }}</td>
                <td class="text-center">{{ $category->name }}</td>
                <td class="text-center">{{ $category->description }}</td>
                <td>
                  <img src="{{ $category->featured_image_url }}" height="50">
                </td>
                <td class="td-actions text-center">
                  <form action="{{ url('/admin/categories/'.$category->id.'/delete') }}" method="post">
                    {{ csrf_field() }}
                    <a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" rel="tooltip" title="Editar Categoría" class="btn btn-success btn-simple btn-xs">
                      <i class="fa fa-edit"></i>
                    </a>
                    <button type="submit" rel="tooltip" title="Eliminar Categoría" class="btn btn-danger btn-simple btn-xs">
                      <i class="fa fa-times"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $categories->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

@include('includes.footer')
@endsection
