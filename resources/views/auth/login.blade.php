@extends('layouts.app')
@section('body-class', 'signup-page')
@section('title', 'Oliveto - Aceite Virgen Extra Original')

@section('content')
<div class="header header-filter" id="fondologin" style="background-image: url('{{ ('/img/fondoo.jpg') }}');">
  <div class="container" style="padding-top: 35px;">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div class="card card-signup">
          <form class="form" method="POST" action="{{ route('login') }}" id="form-login">
            {{ csrf_field() }}
            <div class="header header-info text-center" id="cosologin">
              <h4 style="font-size: 1.8em;">Inicio de sesión</h4>
            </div>
            <p class="text-divider">Ingresa tus datos</p>
            <div class="content">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="material-icons">email</i>
                </span>
                <input id="email" type="email" placeholder="Correo Electrónico" class="form-control" name="email"
                value="{{ old('email') }}" required autofocus>
              </div>
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="material-icons">lock_outline</i>
                </span>
                <input placeholder="Contraseña" id="password" type="password" class="form-control"
                name="password" required />
              </div>
              <div class="checkbox">
                <label class="color">
                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                  Recordarme
                </label>
              </div>
            </div>
            <div class="footer text-center">
              <button type="submit"  class="btn btn-simple btn-primary btn-lg" id="botonlo">Ingresar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@include('includes.footer')
@endsection
