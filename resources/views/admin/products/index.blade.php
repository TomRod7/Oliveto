@extends('layouts.app')

@section('title', 'Oliveto | Listado de Productos')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('/img/fondo.jpg')  }}')">
</div>

<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
          <h2 class="title" style="margin-bottom: -52px;">Listado de Productos</h2>

          <div class="team">
            <div class="row">
              <a href="{{ url('/admin/products/create') }}" id="botontop" class="btn btn-primary btn-round">Nuevo Producto</a>
              <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">Imagen</th>
                        <th class="col-md-3 text-center">Nombre</th>
                        <th class="col-md-2 text-center">Categoría</th>
                        <th class="col-md-2 text-center">Precio</th>
                        <th class="col-md-3 text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                    <tr>
                        <td>
                          <img src="{{ $product->featured_image_url }}" height="50">
                        </td>
                        <td style="padding-top: 18px" class="text-center">{{ $product->name }}</td>
                        <td class="text-center">{{ $product->category ? $product->category->name : 'General' }}</td>
                        <td style="padding-top: 18px" class="text-center">$ {{ $product->price }}</td>
                        <td class="td-actions text-center">
                            <form action="{{ url('/admin/products/'.$product->id.'/delete') }}" method="post">
                              {{ csrf_field() }}
                              <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar Producto" class="btn btn-success btn-simple btn-xs">
                                  <i class="fa fa-edit"></i>
                              </a>
                              <a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tooltip" title="Imágenes del Producto" class="btn btn-warning btn-simple btn-xs">
                                  <i class="fa fa-image"></i>
                              </a>
                              <button type="submit" rel="tooltip" title="Eliminar Producto" class="btn btn-danger btn-simple btn-xs">
                                  <i class="fa fa-times"></i>
                              </button>
                            </form>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
               {{-- {{ $products->links() }} --}}
            </div>
          </div>
    </div>
  </div>
</div>

@include('includes.footer')
@endsection
