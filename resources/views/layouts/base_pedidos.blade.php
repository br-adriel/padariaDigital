<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<title>@yield('titulo') | Pães & Delícias</title>
	<link rel="icon" type="image/x-icon" href="{{ asset('assets/img/icone.png') }}" />
	<!-- Font Awesome icons (free version)-->
	<script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
	<!-- Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body id="page-top">
	<!-- Navigation-->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark" >
		<div class="container">
			<a class="navbar-brand " href="#page-top">Pães&Delícias</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fas fa-bars ml-1"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav text-uppercase ml-auto">
					@isset($cliente)
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="{{ route('index', ['cliente'=>$cliente]) }}">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="{{ route('pedidos.entregas') }}">Entregas</a>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="{{ route('pedidos.carrinho', ['cliente'=>$cliente]) }}">Carrinho</a>
						</li>
					@else
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="{{ route('index') }}">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="{{ route('pedidos.entregas') }}">Entregas</a>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="{{ route('pedidos.carrinho') }}">Carrinho</a>
						</li>
					@endisset
				</ul>
			</div>
		</div>
	</nav>

	@yield('conteudo')

	<!-- Bootstrap core JS-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Third party plugin JS-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
	<!-- Contact form JS-->
	<script src="{{ asset('assets/mail/jqBootstrapValidation.js') }}"></script>
	<script src="{{ asset('assets/mail/contact_me.js') }}"></script>
	<!-- Core theme JS-->
	<script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>