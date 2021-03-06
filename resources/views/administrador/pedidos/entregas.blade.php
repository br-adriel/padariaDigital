@extends('layouts.base_adm')

@section('titulo')
Entregas
@endsection

@section('titulo_pagina')
Entregas
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
		<li class="nav-item">
		  <a class="nav-link" href="{{ route('comidas.index') }}">
				<i class="material-icons">add_shopping_cart</i>
				<p>Produtos</p>
		  </a>
		</li>

		<li class="nav-item">
		  <a class="nav-link" href="{{ route('pedidos.pedidos_pendentes') }}">
			<i class="material-icons">add_task</i>
			<p>Pedidos</p>
		  </a>
		</li>
		<li class="nav-item active">
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
			@foreach ($clientes1 as $cliente)
				<div class="card">
				  <div class="card-header card-header-warning">
					<h4 class="card-title">{{ $cliente->nome }}</h4>
					<p class="card-category">{{ $cliente->telefone }} - Aguardando</p>
				  </div>
				  <div class="card-body">
					<div class="container">
					  <div class="row">
							<div class="col-12">
								@php
									$total = 0;
								@endphp

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
									  	@if ($pedido->cliente == $cliente->id && $pedido->situacao == 2)

									  	<tr>
									  		<td>{{ $pedido->quantidade }}</td>
									  		<td>{{ $pedido->nome }}</td>
									  		<td>@dinheiro($pedido->preco)</td>
									  		<td>@dinheiro($pedido->quantidade * $pedido->preco)</td>
									  	</tr>

									  		@php
													$total = $total + ($pedido->preco * $pedido->quantidade);
												@endphp
											@endif
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
							  <h3>R$ @dinheiro($total) </h3> 
							</div>
							<div class="col invisible">
								
							</div>
							<div class="col-sm-5 col-md-4 col-lg-3">
							  <a class="btn btn-danger btn-xl text-uppercase text-white" type="submit" data-toggle="modal" data-target="#confirmar" onclick="document.getElementById('formMarcarEnviado{{ $cliente->id }}').submit(); return false;">
							  	<i class="material-icons">delivery_dining</i> Marcar Enviado
							  </a>

							  <form id="formMarcarEnviado{{ $cliente->id }}" method="post" action="{{ route('pedidos.marcar_enviado', ['cliente'=>$cliente]) }}">
							  	@csrf
							  	@method('PUT')
							  </form>
							</div>
					  </div>
					</div>
				  </div>
				</div>
			@endforeach

			@foreach ($clientes2 as $cliente)
				<div class="card">
				  <div class="card-header card-header-warning">
					<h4 class="card-title">{{ $cliente->nome }}</h4>
					<p class="card-category">{{ $cliente->telefone }} - Enviado</p>
				  </div>
				  <div class="card-body">
					<div class="container">
					  <div class="row">
							<div class="col-12">
								@php
									$total = 0;
								@endphp

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
									  	@if ($pedido->cliente == $cliente->id && $pedido->situacao == 3)

									  	<tr>
									  		<td>{{ $pedido->quantidade }}</td>
									  		<td>{{ $pedido->nome }}</td>
									  		<td>@dinheiro($pedido->preco)</td>
									  		<td>@dinheiro($pedido->quantidade * $pedido->preco)</td>
									  	</tr>

									  		@php
													$total = $total + ($pedido->preco * $pedido->quantidade);
												@endphp
											@endif
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
							  <h3>R$ @dinheiro($total) </h3> 
							</div>
							<div class="col invisible">
								
							</div>
							<div class="col-sm-5 col-md-4 col-lg-3">
							  <a class="btn btn-danger btn-xl text-uppercase text-white" type="submit" data-toggle="modal" data-target="#confirmar" onclick="document.getElementById('formMarcarEntregue{{ $cliente->id }}').submit(); return false;">
							  	<i class="material-icons">delivery_dining</i> Marcar Entregue
							  </a>

							  <form id="formMarcarEntregue{{ $cliente->id }}" method="post" action="{{ route('pedidos.marcar_entregue', ['cliente'=>$cliente]) }}">
							  	@csrf
							  	@method('PUT')
							  </form>
							</div>
					  </div>
					</div>
				  </div>
				</div>
			@endforeach

		  </div>
		</div>
	  </div>
	</div>
@endsection