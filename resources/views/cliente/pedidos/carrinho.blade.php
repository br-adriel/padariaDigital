@extends('layouts.base_pedidos')

@section('titulo')
Seu carrinho
@endsection

@section('conteudo')
@isset($cliente)
<section class="page-section bg-light mt-3" >
	<div class="container">
		<div class="text-center">
			<h2 class="section-heading text-uppercase">Seu Carrinho</h2>
		</div>
		<div class="row align-items-stretch mb-5">
			<table class="table">
				<tbody>
					@isset($pedidos)
						@foreach($pedidos as $pedido)
						<tr>
							<th scope="row">{{ $pedido->quantidade }}</th>
							@foreach ($comidas as $comida)
								@if ($pedido->comida == $comida->id)
									<td>
										{{ $comida->nome }}
									</td>
									<td>Pedido #{{ $pedido->id }}</td>
									<td>R$ {{ $comida->preco * $pedido->quantidade }}</td>
								@endif
							@endforeach
							<td>
								<a onclick="document.getElementById('formApagar{{ $pedido->id }}').submit(); return false;">
									<button type="button" class="btn btn-danger btn-sm">
										<i class="material-icons">delete</i>
									</button>
								</a>

								<form id="formApagar{{ $pedido->id }}" method="post" action="{{ route('pedidos.delete', ['cliente'=>$cliente, 'pedido'=>$pedido]) }}">
									@csrf
									@method('DELETE')
								</form>
							</td>
						</tr>
						@endforeach
					@endisset
				</tbody>
					<tr>
					<td>
					</td>
					<td>
						@if (count($pedidos) != 0)
						<div class="text-center">
							<button class="btn btn-info btn-xl text-uppercase" data-toggle="modal" data-target="#confirmar">Pedir entrega</button>
						</div>
						@else
						<div class="text-center">
							<button class="btn btn-info btn-xl text-uppercase" data-toggle="modal" data-target="#confirmar" disabled>Pedir entrega</button>
						</div>
						@endif
					</td>
					<td>
					</td>
				</tr>
			</table>
		</div>
	</div>
</section>
@else
<section class="page-section bg-light mt-3" >
	<div class="container">
		<div class="text-center">
			<h2 class="section-heading text-uppercase">Seu Carrinho</h2>
			<h3 class="section-subheading text-muted text-danger">Ainda não há itens no seu carrinho</h3>
		</div>
	</div>
</section>
@endisset
	


	@include('layouts.footer')

	@isset($cliente)
	<!-- modal confirmar -->
	<div class="modal fade" id="confirmar" tabindex="-1" role="dialog" >
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<h5 class="modal-title">Confirmar pedido(s)</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					<a href="entregas.html">
						<button type="button" class="btn btn-info" onclick="document.getElementById('formPedirEntrega').submit(); return false">Confirmar</button>

						<form id="formPedirEntrega" method="post" action="{{ route('pedidos.pedir_entrega', ['cliente'=>$cliente]) }}">
							@csrf
							@method('PUT')
						</form>
					</a>
				</div>
			</div>
		</div>
	</div>
	@endisset
@endsection