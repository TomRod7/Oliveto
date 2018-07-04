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

@include('includes.footer')
@endsection
