@extends('layouts.base_adm')

@section('titulo')
Página inicial
@endsection

@section('titulo_pagina')
Página inicial
@endsection

@section('conteudo')
<div class="content">
		<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4 col-sm-6 mb-4">
			<div class="card portfolio-item" style="width: 18rem;">
				<img class="img-fluid" src="{{ asset('assets/img/portfolio/pao.jpg') }}" alt="" height="400px" width="400px"/>
				<div class="card-body">
				<span class="badge badge-warning">Pães</span>
				<h4 class="card-title">Pão Frances</h4>
				<h5 class="card-text text-danger">R$.: 0,10</h5>
				</div>
			</div>
			</div>

			<div class="col-lg-4 col-sm-6 mb-4">
			<div class="card portfolio-item" style="width: 18rem;">
				<img class="img-fluid" src="{{ asset('assets/img/portfolio/bolo.jpg') }}" alt="" height="400px" width="400px"/>
				<div class="card-body">
				<span class="badge badge-info">Bolo</span>
				<h4 class="card-title">red velvet</h4>
				<h5 class="card-text text-danger">R$.: 50,00</h5>
				</div>
			</div>
			</div>

			<div class="col-lg-4 col-sm-6 mb-4">
			<div class="card portfolio-item" style="width: 18rem;">
				<img class="img-fluid" src="{{ asset('assets/img/portfolio/salgado.jpg') }}" alt="" height="400px" width="400px"/>
				<div class="card-body">
				<span class="badge badge-danger">Salgados</span>
				<h4 class="card-title">Kibe</h4>
				<h5 class="card-text text-danger">R$.: 2,00</h5>
				</div>
			</div>
			</div>

			<div class="col-lg-4 col-sm-6 mb-4">
			<div class="card portfolio-item" style="width: 18rem;">
				<img class="img-fluid" src="{{ asset('assets/img/portfolio/bolo1.jpg') }}" alt="" height="400px" width="400px"/>
				<div class="card-body">
				<span class="badge badge-info" >Bolo</span>
				<h4 class="card-title">Bolo vulcão de nutela e leite ninho</h4>
				<h5 class="card-text text-danger">R$.: 68,00</h5>
				</div>
			</div>
			</div>

			<div class="col-lg-4 col-sm-6 mb-4">
			<div class="card portfolio-item" style="width: 18rem;">
				<img class="img-fluid" src="{{ asset('assets/img/portfolio/salgado1.jpg') }}" alt="" height="400px" width="400px"/>                        <div class="card-body">
				<span class="badge badge-danger">salgados</span>
				<h4 class="card-title">Coxinha de franco com Catupiry</h4>
				<h5 class="card-text text-danger">R$.: 3,50</h5>
				</div>
			</div>
			</div>

			<div class="col-lg-4 col-sm-6 mb-4">
			<div class="card portfolio-item" style="width: 18rem;">
				<img class="img-fluid" src="{{ asset('assets/img/portfolio/pao1.jpg') }}" alt="" height="400px" width="400px"/>
				<div class="card-body">
				<span class="badge badge-warning">Pães</span>
				<h4 class="card-title">Pão de 7 grãos</h4>
				<h5 class="card-text text-danger">R$.: 18,00</h5>
				</div>
			</div>
			</div>

		</div>
		</div>



		@include('layouts.footer')
	</div>
@endsection