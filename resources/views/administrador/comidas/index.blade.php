@extends('layouts.base_adm')

@section('titulo')
Produtos
@endsection

@section('titulo_pagina')
Produtos
@endsection

@section('sidebar')
<div class="sidebar" data-color="orange" data-background-color="white">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="orange"

        Tip 2: you can also add an image using data-image tag
      -->
      <div class="logo"><a href="{{ route('dashboard') }}" class="simple-text logo-normal">
       <img src="{{ asset('/assets/img/icone.png') }}" width="15%"> Pães&Delícias
     </a></div>
     <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item ">
          <a class="nav-link" href="{{ route('panificadoras.edit') }}">
            <i class="material-icons">person</i>
            <p>Empresa</p>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('comidas.index') }}">
            <i class="material-icons">add_shopping_cart</i>
            <p>Produtos</p>
          </a>
        </li>

        <li class="nav-item ">
          <a class="nav-link" href="{{ route('pedidos.pedidos_pendentes') }}">
            <i class="material-icons">add_task</i>
            <p>Pedidos</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{ route('pedidos.situacao_entregas') }}">
			<i class="material-icons">delivery_dining</i>
			<p>Entregas</p>
		  </a>
		</li>
        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}" id="form-sair">
        		@csrf
        	</form>

        	<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); getElementById('form-sair').submit()">Sair</a>
        </li>
      </ul>
</div>
@endsection

@section('conteudo')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<button type="button" class="btn btn-info btn-lg btn-block" data-toggle="modal" href="#adicionar">
				adicionar um novo produto
			</button>

			@foreach ($comidas as $comida)
			<div class="col-lg-4 col-sm-6 mb-4">
				<div class="card portfolio-item" style="width: 18rem;">
					@if ($comida->tag==0)
						<img class="img-fluid" src="{{ asset('/assets/img/portfolio/bolo.jpg') }}" height="400px" width="400px"/>
					@elseif ($comida->tag==1)
						<img class="img-fluid" src="{{ asset('/assets/img/portfolio/pao.jpg') }}" height="400px" width="400px"/>
					@else
						<img class="img-fluid" src="{{ asset('/assets/img/portfolio/salgado.jpg') }}" height="400px" width="400px"/>
					@endif

					<div class="card-body" id="comida{{ $comida->id }}">
						@if ($comida->tag == 0)
							<span class="badge badge-info tag-comida">Bolo</span>
						@elseif ($comida->tag == 1)
							<span class="badge badge-warning tag-comida">Pães</span>
						@else
							<span class="badge badge-danger tag-comida">Salgados</span>
						@endif
						<h4 class="card-title nome-comida">{{ $comida->nome }}</h4>
						<h5 class="card-text text-danger preco-comida">R$ {{ $comida->preco }}</h5>
						<p class="d-none descricao-comida">{{ $comida->descricao }}</p>
						<a href="{{ route('comidas.edit', ['comida'=>$comida->id]) }}">
							<button class="btn btn-danger">editar</button>
						</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>

	<!-- Modal Adicionar um novo produto -->
	<div class="modal fade" id="adicionar" tabindex="-1" role="dialog" >
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header bg-warning">
					<h5 class="modal-title">Adicionar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="{{ route('comidas.store') }}">
						@csrf
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label class="bmd-label-floating">Nome</label>
									<input type="text" class="form-control" name="nome" maxlength="50"required>
								</div>
							</div>
							<div class="col-md-7">
								<div class="form-group">
									<label class="bmd-label-floating">Preço</label>
									<input type="number" step="0.01" class="form-control" name="preco" max="99999.99" min="0.01">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<select class="form-control" id="tag" name="tag" required>
										<option value="0">Bolo</option>
										<option value="1">Pães</option>
										<option value="2">Salgados</option>
									</select>
								</div>
							</div>
							<!--<div class="col-md-6">
								<div class="form-group">
									<input type="file" class="custom-file-input border" id="customFile">
									<label class="custom-file-label border" for="customFile">Escolher arquivo</label>
								</div>
							</div>-->
						</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">Descrição</label>
										<input type="text" class="form-control" name="descricao" required>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-info pull-right">Salvar</button>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
</div>
@endsection