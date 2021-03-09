@extends('layouts.base_pedidos')

@section('titulo')
Entregas
@endsection

@section('conteudo')
<section class="page-section bg-light mt-3" >
	<div class="container">
		@isset($mensagem)
			@if ($mensagem == 1)
				<div class="alert alert-success">
					<p class="text-center mb-0">Nossa equipe recebeu seu pedido, entraremos em contato assim que pudermos.</p>
				</div>
			@endif
		@endisset

		@foreach($clis1 as $cli)
		<div class="card mb-3">
		  <div class="card-header bg-primary">
				Pedidos de {{ $cli->nome }}
			</div>
			<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<th>Quantidade</th>
								<th>Produto</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($pedidos as $pedido)
						  	@if ($pedido->cliente == $cli->id && $pedido->situacao == 2)
							  	<tr>
							  		<td>{{ $pedido->quantidade }}</td>
							  		<td>{{ $pedido->nome }}</td>
							  	</tr>
								@endif
							@endforeach
						</tbody>
					</table>

					<div class="btn btn-danger" style="width: 18rem;">
						No aguardo
						<i class="material-icons ml-2 align-middle">alarm</i>
					</div>
			</div>
		</div>
		@endforeach

		@foreach($clis2 as $cli)
		<div class="card mb-3">
		  <div class="card-header bg-primary">
				Pedidos de {{ $cli->nome }}
			</div>
			<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<th>Quantidade</th>
								<th>Produto</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($pedidos as $pedido)
						  	@if ($pedido->cliente == $cli->id && $pedido->situacao == 3)
							  	<tr>
							  		<td>{{ $pedido->quantidade }}</td>
							  		<td>{{ $pedido->nome }}</td>
							  	</tr>
								@endif
							@endforeach
						</tbody>
					</table>

					<div class="btn btn-info" style="width: 18rem;">
						Saiu para entrega
						<i class="material-icons ml-2 align-middle">motorcycle</i>
					</div>
			</div>
		</div>
		@endforeach		
	</div>
</section>

	
	@include('layouts.footer')
@endsection