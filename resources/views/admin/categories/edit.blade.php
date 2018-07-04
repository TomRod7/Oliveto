@extends('layouts.app')

@section('title', 'Oliveto | Editar Categoría')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter"  style="background-image: url('{{ asset('/img/fondo.jpg')  }}')">
</div>

<div class="main main-raised">
  <div class="container">

    <div class="section">
        <h2 class="title text-center">Editar Categoría Seleccionada</h2>

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ url('/admin/categories/'.$category->id.'/edit') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group label-floating has-success">
                    <label class="control-label">Nombre de la Categoría</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}">
                  </div>
                </div>
                <div class="col-sm-6">
                  <label class="control-label">Imagen de la Categoría</label>
                  <input type="file" name="image">
                  @if($category->image)
                  <p class="help-block">Subir solo si desea reemplazar la
                    <a href="{{ asset('/images/categories/' . $category->image) }}" target="_blank">imagen actual</a>
                  </p>
                  @endif
                </div>
              </div>

            <div class="text-center">
              <button class="btn btn-success text-center" id="botonverde">Guardar Cambios</button>
              <a href="{{ url('admin/categories') }}" class="btn btn-danger text-center">Cancelar</a>
            </div>
        </form>
      </div>
  </div>
</div>

<footer class="footer">
  <div style="padding-top: 62px;"class="container">
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
