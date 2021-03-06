<!-- Footer-->
<footer class="footer py-4 bg-warning">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-4 text-lg-left">
				<h5>&copy; Pães & Delícias</h5> 
				<h6>Telefone: {{ $panificadora->telefone }}</h6>
				<h6>Email: {{ $panificadora->email }}</h6>
			</div>
			<div class="col-lg-4 my-3 my-lg-0">
				<h6>Endereço: {{ $panificadora->endereco }}</h6>
			</div>
		</div>
	</div>
</footer>