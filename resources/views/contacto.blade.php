@extends('layouts.app')

@section('title', 'Oliveto - Contacto')
@section('body-class', 'product-page')

@section('content')
  <div id='token'>{{ csrf_token() }}</div>
  <script src="{{asset ('/js/contact.js') }}" type="text/javascript"></script>
<div class="header header-filter" style="background-image: url('{{ ('/img/fondo.jpg') }}');"></div>

<div class="main main-raised">
  <div class="container">
    <div class="section text-center section-landing">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h2 class="title">Oliveto | Contacto</h2>
          <h5 class="description">Nuestra atención y asesoramiento es personalizado. <br>
            Envío sin cargo en C.A.B.A. para compras superiores a $2200. Se realizan envíos al interior.</h5>
        </div>
      </div>
      <div class="features">
        <div class="row" id="mail">
          <div class="col-md-6">
            <div class="info">
              <div class="icon icon-primary">
                <i class="material-icons" style="color: black;">mail</i>
              </div>
              <h4 class="info-title">Correo Electrónico</h4>
              <p>info@oliveto.com.ar</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info">
              <div class="icon icon-success">
                <i class="material-icons" style="color: black;">phone_iphone</i>
              </div>
              <h4 class="info-title">Teléfonos</h4>
              <p>Buenos Aires: 011-15-5728-7800 (atención de Lunes a Viernes de 10 a 18 hs).<br>
                Cruz del Eje, Córdoba 03549-42-5707 (atención de Lunes a Viernes: 9 a 13 y 15 a 19 hs, Sábado: 9 a 13 hs).</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section landing-section">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h2 class="text-center title">Contacto</h2>
          <h4 class="text-center description">Si necesita ayuda, escribanos su mensaje y lo antenderemos a la brevedad.</h4>
          <div>
            <div id="formcontact">
              <div class="row">
                <div class="col-md-6">
                  <div id="nameContainer" class="form-group label-floating has-success">
                    <label name="name" class="control-label">Nombre</label>
                    <input id='name' class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div id="emailContainer" class="form-group label-floating has-success">
                    <label  class="control-label">Email</label>
                    <input id='email' type="email" class="form-control" name="email">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div id="phoneContainer" class="form-group label-floating has-success">
                    <label name="phone" class="control-label">Teléfono</label>
                    <input id='phone' class="form-control" type="number">
                  </div>
                </div>
                <div class="col-md-6">
                  <div id="addressContainer" class="form-group label-floating has-success">
                    <label name="address" class="control-label">Dirección</label>
                    <input id='address' class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div id="messageContainer" class="form-group label-floating has-success">
                    <label name="message" class="control-label">Consulta</label>
                    <textarea class="form-control" rows="4" id="message"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center">
                  <button class="btn btn-primary btn-raised" id="send_contact" style="background: #365b22;">
                    Enviar Consulta
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" style="position: fixed; top:30vh;" id="modalSent" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="">
        <div class="modal-body">
          <p id="modalMessage">Su consulta ha sido enviada con éxito.</p>
        </div>
        <div class="modal-footer">
          <button id="ok" class="btn btn-info btn-simple">Volver a página principal.</button>
        </div>
      </div>
    </div>
  </div>
</div>

@include('includes.footer')
@endsection
