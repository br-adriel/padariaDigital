<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Paes & Delicias</title>
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
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll-trigger" href="#page-top">Pães&Delícias</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				Home
				<i class="fas fa-bars ml-1"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav text-uppercase ml-auto">
					<li class="nav-item"><a class="nav-link js-scroll-trigger" href="#page-top">Home</a></li>
					@isset($cliente)
					<li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('pedidos.entregas', ['cliente'=>$cliente]) }}">Entregas</a></li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('pedidos.carrinho', ['cliente'=>$cliente]) }}">Carrinho</a>
					</li>
					@else
					<li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('pedidos.entregas') }}">Entregas</a></li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('pedidos.carrinho') }}">Carrinho</a>
					</li>
					@endisset
				</ul>
			</div>
		</div>
	</nav>
	<!-- Masthead-->
	<header class="masthead">
		<div class="container">
			<div class="masthead-heading text-uppercase">Pães & Delicias</div>
			<div class="masthead-subheading">Onde você encontra seus sonhos quentinhos!</div>
		</div>
	</header>


	<!-- tabela do cardápio-->
	<section class="page-section bg-light" id="portfolio">
		<div class="container">
			<div class="row">
				@foreach ($comidas as $comida)
				<div class="col-lg-4 col-sm-6 mb-4">
					<div class="card portfolio-item" style="width: 18rem;">
						@isset($cliente)
						<a class="portfolio-link" data-toggle="modal" href="#portfolioModal{{ $comida->id }}">
						@else
						<a class="portfolio-link" data-toggle="modal" href="#cliente-modal{{ $comida->id }}">
						@endisset
							<div class="portfolio-hover">
								<div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
							</div>
							<img class="img-fluid" src="{{ asset('img/comidas/' . $comida->imagem) }}" alt="" height="400px" width="400px"/>
						</a>
						<div class="card-body">
							@if ($comida->tag == 0)
								<span class="badge badge-info">Bolo</span>
							@elseif ($comida->tag == 1)
								<span class="badge badge-warning">Pães</span>
							@else
								<span class="badge badge-danger">Salgados</span>
							@endif
							<h4 class="card-title">{{ $comida->nome }}</h4>
							<h5 class="card-text text-danger">R$ {{ $comida->preco }}</h5>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- Fim cardápio-->

	@include('layouts.footer')
	
	<!-- Portfolio Modals-->
	<!-- Modal 1-->
	@isset ($cliente)
		@foreach ($comidas as $comida)
		<div class="modal fade" id="portfolioModal{{ $comida->id }}" tabindex="-1" role="dialog" >
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header bg-warning">
						<h5 class="modal-title">
							@if ($comida->tag == 0)
								Bolo
							@elseif ($comida->tag ==1)
								Pães
							@else
						  	Salgados
							@endif
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form class="form-inline" method="post" action="{{ route('pedidos.create', ['cliente'=>$cliente->id, 'comida'=>$comida->id]) }}">
							@csrf
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-8">
									<div class="modal-body">
										<!-- Detalhes do produto-->
										<h2 class="text-uppercase">{{ $comida->nome }}</h2>
										<img class="img-fluid d-block" src="{{ asset('img/comidas/' . $comida->imagem) }}" alt="pão" />
										<ul class="list-inline">
											<li>{{ $comida->descricao }}</li>
											<li class="text-danger"><h6>R$ {{ $comida->preco }}</h6></li>
											<li>
												<input class="form-control" id="inputPassword2" placeholder="Quantidade" type="number" min="1" name="quantidade" required="">
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>    
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Adicionar ao Carrinho</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		@endforeach
	@else
		@foreach ($comidas as $comida)
		<div class="modal fade" id="cliente-modal{{ $comida->id }}" tabindex="-1" role="dialog" >
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header bg-warning">
						<h5 class="modal-title">
							@if ($comida->tag == 0)
								Bolo
							@elseif ($comida->tag == 1)
								Pães
							@else
							  Salgados
							@endif
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form class="form-inline" method="post" action="{{ route('clientes.create', ['comida'=>$comida->id]) }}">
							@csrf
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-8">
									<div class="modal-body">
										<!-- Detalhes do produto-->
										<h2 class="text-uppercase">{{ $comida->nome }}</h2>
										<img class="img-fluid d-block" src="{{ asset('img/comidas/' . $comida->imagem) }}" alt="pão" />
										<ul class="list-inline">
											<li>Info.: {{ $comida->descricao }}</li>
											<li class="text-danger"><h6>R$ {{ $comida->preco }}</h6></li>
											<li>
												<input class="form-control" id="inputPassword2" placeholder="Quantidade" type="number" min="1" name="quantidade" required="">
											</li>
										</ul>

										<!-- Dados do cliente-->
										<h2 class="text-uppercase mt-3">Seus dados</h2>
										<ul class="list-inline">
											<li>
												<input class="form-control" id="inputPassword2" placeholder="Nome" type="text" required name="nome">
											</li>
											<li>
												<input class="form-control mt-2" id="inputPassword2" placeholder="Telefone" type="number" required name="telefone" maxlength="11" minlength="11">
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>    
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Continuar</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		@endforeach
	@endisset

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
