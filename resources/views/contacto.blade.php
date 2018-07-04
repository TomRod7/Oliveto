@extends('layouts.app')

@section('title', 'Oliveto - Contacto')
@section('body-class', 'product-page')

@section('content')
<style media="screen">
  .invalid-feedback{
    color: red;
  }
</style>

<div class="header header-filter" style="background-image: url('{{ ('/img/fondo.jpg') }}');"></div>

<div class="main main-raised">
  <div class="container">
    <div class="section text-center section-landing">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h2 class="title">Oliveto | Contacto</h2>
          <h5 class="description">Nuestra atención y asesoramiento es personalizado. <br>
            Envío sin cargo en C.A.B.A. para compras superiores a $2000. Se realizan envíos al interior.</h5>
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
          <form class="contact-form" method="POST" action="/contacto"> 
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group label-floating has-success">
                  <label name="name" class="control-label">Nombre</label>
                  <input type="text" class="form-control" name="name" id="name" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group label-floating has-success">
                  <label name="email" class="control-label">Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group label-floating has-success">
                  <label name="phone" class="control-label">Teléfono</label>
                  <input type="number" class="form-control" name="phone" id="phone" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group label-floating has-success">
                  <label name="adress" class="control-label">Dirección</label>
                  <input class="form-control" type="text" name="adress" id="adress">
                </div>
              </div>
            </div>

            <div class="form-group label-floating has-success">
              <label name="contact" class="control-label">Consulta</label>
              <textarea class="form-control" rows="4" name="message" id="message" required></textarea>
            </div>

            <div class="row">
              <div class="col-md-4 col-md-offset-4 text-center">
                <button type="submit" id="sender" class="btn btn-primary btn-raised" style="background: #365b22;">
                  Enviar Consulta
                </button>
              </div>
            </div>
          </form>
          @if(session('message'))
            <div class="alert alert-success">{{ session('message')}}</div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

@include('includes.footer')
@endsection
