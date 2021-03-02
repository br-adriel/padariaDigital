<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">

		<title>Entrar | Pães & Delícias</title>

		<link rel="icon" type="image/png" href="{{ asset('assets1/img/icone.png') }}">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

		<!--     Fonts and icons     -->
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

		<!-- CSS Files -->
		<link href="{{ asset('assets1/css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet" />

		<style type="text/css">
			@import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
			.login-block{
				background: #DE6262;  /* fallback for old browsers */
				background: -webkit-linear-gradient(to bottom, #FFB88C, #FFA500);  /* Chrome 10-25, Safari 5.1-6 */
				background: linear-gradient(to bottom, #FFB88C, #FFA500); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
				float:left;
				width:100%;
				padding : 50px 0;
			}
			.banner-sec{background:url({{ asset('assets/img/padaria.jpg') }})  no-repeat left bottom; background-size:cover; min-height:500px; border-radius: 0 10px 10px 0; padding:0;}
			.container{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
			.login-sec{padding: 50px 30px; position:relative;}
			.login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
			.login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px;}
			.login-sec h2:after{content:" "; width:100px; height:5px; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
		</style>
	</head>
	<body>
		<section class="login-block">
    <div class="container">
      <div class="row">
				{{ $slot }}

				<div class="col-md-8 banner-sec">
					<img class="d-block img-fluid rounded-right" src="{{ asset('assets/img/padaria.jpg') }}" alt="First slide">
				</div>
	    </div>
	  </div>
		  <!--   Core JS Files   -->
		  <script src="{{ asset('assets1/js/core/jquery.min.js') }}"></script>
		  <script src="{{ asset('assets1/js/core/popper.min.js') }}"></script>
		  <script src="{{ asset('assets1/js/core/bootstrap-material-design.min.js') }}"></script>
		  <script src="{{ asset('assets1/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
		  </section>

		<div class="font-sans text-gray-900 antialiased">
		</div>
	</body>
</html>
