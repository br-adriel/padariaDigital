@extends('layouts.base_pedidos')

@section('titulo')
Entregas
@endsection

@section('conteudo')
<section class="page-section bg-light mt-3" >
	<div class="container">
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

	<footer class="footer py-4 bg-warning">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-4 text-lg-left">
					<h5>© Pães & Delícias</h5> 
					<h6>Telefone.: +55 (84) 9-9999-9999</h6>
					<h6>Email.: PaesDelicias@gmail.com</h6>
				</div>
				<div class="col-lg-4 my-3 my-lg-0">
					<h6>Rua.:aquela ali que contruiram, 999, centro</h6>
					<h6>Na lateral da esquina que fica na ponta</h6>
				</div>
			</div>
		</div>
	</footer>
@endsection