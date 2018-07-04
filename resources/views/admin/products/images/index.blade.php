@extends('layouts.app')

@section('title', 'Oliveto | Crear Producto')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('/img/fondo.jpg')  }}')"></div>

<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <h2 class="title">Imágenes del Producto "{{$product->name}}"</h2>

      <form class="" action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="photo" required>
        <button type="submit" class="btn btn-success text-center" id="botonverde">Subir Nueva Imagen</button>
        <a href="{{ url('admin/products') }}" class="btn btn-danger text-center">Volver al Listado de Productos</a>
      </form>
      <hr>
      <div class="row">
        @foreach ($images as $image)
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-body">
              <img src="{{ $image->url }}" width="250">
              <form action="" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="image_id" value="{{ $image->id }}">
                <button type="submit" class="btn btn-danger btn-round">Eliminar Imagen</button>
              </form>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
<footer class="footer">
  <div style="padding-top: 73px;"class="container">
    <nav class="pull-left">
      <ul>
        <li class="color"><a href="{{ ('/') }}">Home</a></li>
        <li class="color"><a href="{{ ('/quienes') }}">Quienes Somos</a></li>
        <li class="color"><a href="{{ ('/products') }}">Productos</a></li>
        <li class="color"><a href="{{ ('/contacto') }}">Contacto</a></li>
      </ul>
    </nav>
    <div class="copyright pull-right" style="color: #f3c94b;">
      Tomás Rodriguez &copy; 2018
    </div>
  </div>
  <img class="imagenfoo" src="{{ asset ('/img/inferior.png') }}">
</footer>
@endsection
