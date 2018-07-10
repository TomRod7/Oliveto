<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/material.min.js') }}"></script>

	<script src="{{asset ('/js/responsiveslides.js') }}"></script>
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="icon" href="{{ asset('/img/favicon.ico.png') }}" type="image/x-icon">


	<title>@yield('title', 'Oliveto')</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,500,700" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/material-kit.css') }}" rel="stylesheet"/>
		<link href="{{ asset('css/styles.css') }}" rel="stylesheet"/>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet"/>


		<style media="screen">
		.rslides {
		position: relative;
		list-style: none;
		overflow: hidden;
		width: 100%;
		padding: 0;
		margin: 0;
		}

		.rslides li {
		-webkit-backface-visibility: hidden;
		position: absolute;
		display: none;
		width: 100%;
		left: 0;
		top: 0;
		}

		.rslides li:first-child {
		position: relative;
		display: block;
		float: left;
		}

		.rslides img {
		display: block;
		height: 374px;
		float: left;
		width: 100%;
		border: 0;
		}

		.panel-group .panel {
				margin-top: 40px;
        border-radius: 0;
        box-shadow: none;
        border-color: #EEEEEE;
				box-shadow: 1px -1px 38px -12px rgba(0, 0, 0, 0.08), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
    }

    .panel-default > .panel-heading {
        padding: 0;
        border-radius: 0;
        color: #212121;
        background-color: #fbfbfb;
        border-color: #EEEEEE;
    }

    .panel-title {
        font-size: 14px;
    }

    .panel-title > a {
        display: block;
        padding: 15px;
        text-decoration: none;
    }

    .more-less {
        float: right;
        color: #212121;
    }

    .panel-default > .panel-heading + .panel-collapse > .panel-body {
        border-top-color: #f8f8f8;;
    }

		.demo {
		    padding-top: 60px;
		    padding-bottom: 60px;
		}
	</style>

		@yield('styles')

</head>

<body class="@yield('body-class')">
	<nav class= "@if (isset($_COOKIE['clases'])) {{$_COOKIE['clases']}} @else {{"navbar navbar-info navbar-fixed-top"}} @endif"
		 id="formnav">
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
        	<div class="navbar-header">
        		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
            		<span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>
						<a class="" href="{{ url('/') }}"><img class="oliveto" src="{{ asset ('/img/oliveto.png') }}"></a>
        		<a class="navbar-brand logo" href="{{ url('/') }}" style=""> <img class="logoa" src="{{ asset ('img/logo.png') }}" alt=""></a>
        	</div>
        	<div class="collapse navbar-collapse" id="navigation-example">
        		<ul class="nav navbar-nav navbar-right">
							<li class="color"><a href="{{ ('/products') }}">Productos</a></li>
							<li class="color"><a href="{{ ('/contacto') }}">Contacto</a></li>
							<li class="color"><a href="{{ url('/carrito') }}"><img src="{{ asset ('/img/cart.png') }}" style="width:20px"></a></li>
              @guest

              @else
							    <li class="dropdown">
							        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" style="color: #f3c94b;">
							            {{ Auth::user()->name }} <span class="caret"></span>
							        </a>

							        <ul class="dropdown-menu">
												@if(auth()->user()->admin)
													<li>
														<a href="{{ url('/admin/categories') }}">Gestionar Categorías</a>
													</li>
													<li>
														<a href="{{ url('/admin/products') }}">Gestionar Productos</a>
													</li>
												@endif
							            <li>
							                <a href="{{ route('logout') }}"
							                    onclick="event.preventDefault();
							                             document.getElementById('logout-form').submit();">
							                    Cerrar Sesión
							                </a>

							                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							                    {{ csrf_field() }}
							                </form>
							            </li>
							        </ul>
							    </li>
							@endguest
        		</ul>
        	</div>
    	</div>
    </nav>

  <div class="wrapper" id="fondo">
    @yield('content')
	</div>


</body>

	<script>
	$(function() {
		$(".rslides").responsiveSlides();
	});
	</script>

	@yield('custom-scripts')
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('js/nouislider.min.js') }}" type="text/javascript"></script>

  <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
  <script src="{{ asset('js/bootstrap-datepicker.js') }}" type="text/javascript"></script>

  <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
  <script src="{{ asset('js/material-kit.js') }}" type="text/javascript"></script>

</html>
