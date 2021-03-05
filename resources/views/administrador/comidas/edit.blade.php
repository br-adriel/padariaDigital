@extends('layouts.base_adm')

@section('titulo')
Produtos
@endsection

@section('titulo_pagina')
Editar produto
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
					<a class="nav-link" href="#">
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
			<div class="col-md">
				<div class="card">
					<div class="card-header card-header-warning">
						<h4 class="card-title">Edite Sua Empresa</h4>
						<p class="card-category">Preencha corretamente</p>
					</div>
					<div class="card-body">
						<form method="post" action="{{ route('comidas.update', ['comida'=>$comida->id]) }}">
							@csrf
							@method('PUT')
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">Nome</label>
										<input type="text" class="form-control" name="nome" maxlength="50"required value="{{ $comida->nome }}">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">Preço</label>
										<input type="number" step="0.01" class="form-control" name="preco" max="99999.99" min="0.01" value="{{ $comida->preco }}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<select class="form-control" id="tag" name="tag" required>
											@if ($comida->tag == 0)
											<option value="0" selected>Bolo</option>
											<option value="1">Pães</option>
											<option value="2">Salgados</option>
											@elseif ($comida->tag == 1)
											<option value="0">Bolo</option>
											<option value="1" selected>Pães</option>
											<option value="2">Salgados</option>
											@else
											<option value="0">Bolo</option>
											<option value="1">Pães</option>
											<option value="2" selected="">Salgados</option>
											@endif
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
										<input type="text" class="form-control" name="descricao" required value="{{ $comida->descricao }}">
									</div>
								</div>
							</div>
							<a onclick="document.getElementById('formApagar').submit();return false;">
								<button class="btn btn-danger">apagar</button>
							</a>
								<button type="submit" class="btn btn-info pull-right">Salvar alterações</button>
								<div class="clearfix"></div>
						</form>

					
						<form action="{{ route('comidas.destroy', ['comida'=>$comida->id]) }}" method="post" id="formApagar">
							@csrf
							@method('DELETE')
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection