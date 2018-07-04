@extends('layouts.app')

@section('title', 'Oliveto | Editar Producto')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('/img/fondo.jpg')  }}')">
</div>

<div class="main main-raised">
  <div class="container">

    <div class="section">
        <h2 class="title text-center">Editar Producto Seleccionado</h2>

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ url('/admin/products/'.$product->id.'/edit') }}" method="post">
                {{ csrf_field() }}

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group label-floating has-success">
                    <label class="control-label">Nombre del Producto</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
                  </div>
                </div>


                <div class="col-sm-6">
                  <div class="form-group label-floating has-success">
                    <label class="control-label">Precio del Producto</label>
                    <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price', $product->price) }}">
                  </div>
                </div>
              </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group label-floating has-success">
                  <label class="control-label">Descripción Corta</label>
                  <input type="text" class="form-control" name="description" value="{{ old('description', $product->description) }}">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group label-floating has-success">
                  <label class="control-label">Categoría del Producto</label>
                  <select class="form-control" name="category_id">
                    <option value="0">General</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == old('category_id', $product->category_id)) selected @endif>{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>      

            <div class="text-center">
              <button class="btn btn-success text-center" id="botonverde">Guardar Cambios</button>
              <a href="{{ url('/admin/products') }}" class="btn btn-danger text-center">Cancelar</a>
            </div>
        </form>
      </div>
  </div>
</div>

@include('includes.footer')
@endsection
