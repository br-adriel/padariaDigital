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
									<td></td>
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
						<div class="text-center">
								<button class="btn btn-danger btn-xl text-uppercase" data-toggle="modal" data-target="#pedido">Editar pedido</button>
						</div>
					</td>
					<td>
						<div class="text-center">
							<button class="btn btn-info btn-xl text-uppercase" type="submit" data-toggle="modal" data-target="#confirmar">confirmar</button>
						</div>
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

<!-- modal editar-->
	<div class="modal fade" id="pedido" tabindex="-1" role="dialog" >
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header bg-warning">
					<h5 class="modal-title">Pedido</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="form-inline">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12">
								<div class="modal-body">
									<table class="table table-bordered">
										<tr>
											<td> <input type="text" class="form-control col-md-5" placeholder="quantidade" value="30" required></td>
											<td class="col-md-5">Pão Francês</td>
											<td>=</td>
											<td>3,00</td>
										</tr>
										<tr>
											<td> <input type="text" class="form-control col-md-5" placeholder="quantidade" value="1" required></td>
											<td class="col-md-5">red velvet</td>
											<td>=</td>
											<td>50,00</td>
										</tr>
										<tr>
											<td> <input type="text" class="form-control col-md-5" placeholder="quantidade" value="2" required></td>
											<td class="col-md-5">Pão de 7 grãos</td>
											<td>=</td>
											<td>36,00</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>    
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" type="submit">confirmar</button>
				</div>
				</form>
			</div>
		</div>
	</div>

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
						<button type="button" class="btn btn-info" type="submit">Confirmar</button>
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection