@extends('layouts.app')

@section('title', 'Oliveto - Aceite Virgen Extra Original')

@section('body-class', 'landing-page')
@section('content')
<div class="container" id="contenedor1">
  <div class="row" id="row1">
    <div class="container" id="contenedor2">
      <div class="row" id="row2">
        <ul class="rslides">
          <li><img src="{{ ('img/slider1.png') }}" alt=""></li>
          <li><img src="{{ ('img/slider2.jpg') }}" alt=""></li>
          <li><img src="{{ ('img/slider3.png') }}" alt=""></li>
          <li><img src="{{ ('img/slider4.png') }}" alt=""></li>
          <li><img src="{{ ('img/slider10.png') }}" alt=""></li>
        </ul>
      </div>
    </div>
    </div>
  </div>

{{-- @include('includes.footer') --}}

<footer class="footer">
  <div class="container">
    <nav class="pull-left">
      <ul>
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

<style media="screen">
.footer {
  position: fixed;
  bottom: 0;
}
</style>

@endsection
