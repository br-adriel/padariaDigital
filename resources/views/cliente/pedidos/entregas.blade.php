@extends('layouts.base_pedidos')

@section('titulo')
Entregas
@endsection

@section('conteudo')
<section class="page-section bg-light mt-3" >
	<div class="container">
		@isset($mensagem)
		<div class="alert alert-success">
			<p class="text-center mb-0">{{ $mensagem }}</p>
		</div>
		@endisset

		@foreach($pedidos as $pedido)
		<div class="card mb-3">
		  <div class="card-header bg-primary">
				Pedido #{{ $pedido->id }}
			</div>
			<div class="card-body">
				@foreach ($clis as $cli)
					@if ($pedido->cliente == $cli->id)
					<p class="card-text">Cliente: {{ $cli->nome }}</p>
					@endif
				@endforeach

				@if ($pedido->situacao == 2)
					<div class="btn btn-danger" style="width: 18rem;">
						No aguardo
						<i class="material-icons ml-2 align-middle">alarm</i>
					</div>
				@elseif ($pedido->situacao == 3)
					<div class="btn btn-info" style="width: 18rem;">
						Saiu para entrega
						<i class="material-icons ml-2 align-middle">motorcycle</i>
					</div>
				@elseif ($pedido->situacao == 4)
					<div class="btn btn-success" style="width: 18rem;">
						Entregue
						<i class="material-icons ml-2 align-middle">check</i>
					</div>
			@else
			@endif
			</div>
		</div>
	@endforeach
	</div>
</section>

	
	@include('layouts.footer')
@endsection