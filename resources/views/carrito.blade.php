@extends('layouts.app')

@section('title', 'Oliveto | Carrito de Compras')
@section('body-class', 'product-page')

@section('content')
  <div id='token'>{{ csrf_token() }}</div>
  <script src="{{asset ('/js/cart.js') }}" type="text/javascript"></script>
<div class="header header-filter" style="background-image: url('{{ asset('/img/fondo.jpg')  }}')">
</div>

<div class="main main-raised">
  <div class="container">

    <div class="section">
        <h2 class="title text-center" id="tituloCart">Carrito de Compras</h2>

        <div id='msg_delete' hidden>
          <hr>
              <div class="alert alert-success">
                El Producto se ha eliminado del carrito de compras de manera exitosa.
              </div>
          </hr>
        </div>
        <table class="table">
          <thead>
              <tr>
                  <th class="text-center"></th>
                  <th class="text-center">Producto</th>
                  <th style="padding-left: 13px;">Precio</th>
                  <th>Cantidad</th>
                  <th>SubTotal</th>
                  <th></th>
              </tr>
          </thead>
          <tbody id="cart_container">
            <tr id="cart_item" hidden>
                <td class="text-center">
                  <img id="item_img" height="50">
                </td>
                <td style="padding-top: 18px" class="text-center" id="item_name"></td>
                <td style="padding-top: 18px" id="item_price"></td>
                <td style="padding-top: 18px; padding-left: 35px;" id="item_quantity"></td>
                <td style="padding-top: 18px" id="item_subtotal"></td>
                <td class="td-actions">
                    <div class="alinear">
                      <button id="item_delete" rel="tooltip" title="Eliminar Producto" class="btn btn-danger btn-simple btn-xs" style="padding-left: 27px;">
                          <i class="fa fa-times"></i>
                      </button>
                    </div>
                  </td>
              </tr>
            </tbody>
        </table>

        <h4 class="importe"><strong>Importe a pagar:</strong> <span id="total"></span> </h4>


        <div>
          <div id="formcart">
            <div class="row">
              <div class="col-md-6">
                <div id="nameContainer" class="form-group label-floating has-success">
                  <label name="name" class="control-label">Nombre</label>
                  <input id='name' class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div id="emailContainer" class="form-group label-floating has-success">
                  <label name="email" class="control-label">Email</label>
                  <input id='email' type="email" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div id="phoneContainer" class="form-group label-floating has-success">
                  <label name="phone" class="control-label">Teléfono</label>
                  <input id='phone' class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div id="addressContainer" class="form-group label-floating has-success">
                  <label name="adress" class="control-label">Dirección</label>
                  <input id='address' class="form-control">
                </div>
              </div>
            </div>
            <div class="text-center">
              <button class="btn btn-primary btn-round" id="send_order" style="background-color: #365b22; margin-top: 26px;">
                <i class="material-icons">done</i> Realizar Pedido
              </button>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" style="position: absolute; top:30vh;" id="modalSent" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="">
        <div class="modal-body">
          <p id="modalMessage">Su pedido ha sido enviado con éxito.</p>
        </div>
        <div class="modal-footer">
          <button id="ok" class="btn btn-info btn-simple">Ir a productos.</button>
        </div>
      </div>
    </div>
  </div>
</div>

@include('includes.footer')
@endsection
