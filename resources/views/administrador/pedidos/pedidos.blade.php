@extends('layouts.base_adm')

@section('titulo')
Pedidos
@endsection

@section('titulo_pagina')
Pedidos
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
		<li class="nav-item">
		  <a class="nav-link" href="{{ route('comidas.index') }}">
				<i class="material-icons">add_shopping_cart</i>
				<p>Produtos</p>
		  </a>
		</li>

		<li class="nav-item active">
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
		  	@foreach ($clientes as $cliente)
				<div class="card">
				  <div class="card-header card-header-warning">
						<h4 class="card-title">{{ $cliente->nome }}</h4>
						<p class="card-category">{{ $cliente->telefone }}</p>
				  </div>
				  <div class="card-body">
						<table class="table">
							<thead>
							  <tr>
							  	<th>Quantidade</th>
							  	<th>Produto</th>
							  	<th>Preço unitário</th>
							  	<th>Total</th>
							  </tr>								
							</thead>
						  <tbody>
						  @foreach ($pedidos as $pedido)
						  	@if ($pedido->cliente == $cliente->id)
									<tr>
									  <td scope="row">{{ $pedido->quantidade }}</td>
									  <td>{{ $pedido->nome }}</td>
										<td>R$ @dinheiro($pedido->preco)</td>
										<td>R$ @dinheiro($pedido->preco * $pedido->quantidade)</td>
									</tr>
								@endif
							@endforeach
						  </tbody>
						  <tr>
								<td colspan="4">
								  <div class="text-center">
									<a class="btn btn-info" onclick="document.getElementById('formAceitarPedido{{ $cliente->id }}').submit(); return false;">Aceitar pedido</a>

									<form id="formAceitarPedido{{ $cliente->id }}" method="post" action="{{ route('pedidos.aceitar_pedido', ['cliente'=>$cliente->id]) }}">
										@csrf
										@method('PUT')
									</form>
								  </div>
								</td>
						  </tr>
						</table>
			  	</div>
				</div>
				@endforeach
		  </div>
		</div>
	  </div>
	</div>
@endsection