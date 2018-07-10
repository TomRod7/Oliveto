@extends('layouts.app')

@section('title', 'Oliveto | Listado de Productos')
@section('body-class', 'product-page')

@section('content')
<script src="{{asset ('/js/addCart.js') }}" type="text/javascript"></script>
<div class="header header-filter" style="background-image: url('{{ asset('/img/fondo.jpg')  }}')"></div>

<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <h2 class="title">Listado de Productos</h2>
      <div id='msg_add' hidden>
        <hr>
            <div class="alert alert-success">
              El producto se ha cargado al carrito de compras de manera exitosa.
            </div>
        </hr>
      </div>
      <div class="team">
        <div class="row">
          <table id='products_table' class="table">
            <thead>
              <tr>
                <th class="text-center"></th>
                <th class="col-md-3 text-center">Categoría</th>
                <th class="col-md-3 text-center">Descripción</th>
                <th class="col-md-3 text-center">Producto</th>
                <th class="col-md-2 text-center">Precio</th>
                <th class="col-md-3 text-center"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>
                <td>
                  <img src="{{ $product->featured_image_url }}" height="50">
                </td>
                <td style="padding-top: 23px" class="text-center items">{{ $product->category ? $product->category->name : 'General' }}</td>
                <td style="padding-top: 23px" class="text-center items">{{ $product->description }}</td>
                <td style="padding-top: 23px" class="text-center items">{{ $product->name }}</td>
                <td style="padding-top: 23px" class="text-center items">$ {{ $product->price }}</td>
                <td class="td-actions text-center">
                  <button class="btn btn-primary btn-round btn-cart" disabled value="{{ $product->id }}" id="botoncart" data-toggle="modal" data-target="#modalAddtoCart" data-name="{{ $product->name }}" data-category="{{ $product->category->name }}" data-price="{{ $product->price }}"  data-image="{{$product->featured_image_url}}">
                    COMPRAR
                  </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="text-center">
            <button type="submit" class="btn btn-primary btn-round" id="botonir">
              <a href="{{ url('/carrito') }}" class="botonpro">Ir al Carrito de Compras</a>
            </button>
          </div>
          {{ $products->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Core -->
<div class="modal fade" id="modalAddtoCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="myModalLabel">Selecciona la cantidad que desea agregar.</h3>
        <h4 id="product_category"></h4>
      </div>
      <div class="">
        {{ csrf_field() }}
        <input type="hidden" id="product_id" value="">
        <input type="hidden" id="product_price">
        <input type="hidden" id="product_image">
        <div class="modal-body">
          <h5 id="product_name"></h5>
          <input name="quantity" type="number" id="quantity" value="1" min="0" oninput="validity.valid||(value='');" class="form-control text-center">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
          <button id="btnAddToCart" type="submit" class="btn btn-info btn-simple">Añadir al Carrito</button>
        </div>
      </div>
    </div>
  </div>
</div>
@include('includes.footer')
@endsection
