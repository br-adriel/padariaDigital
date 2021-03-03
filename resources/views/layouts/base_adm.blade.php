<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="{{ asset('assets1/img/icone.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>@yield('titulo') | Pães & Delícias</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <!-- CSS Files -->
  <link href="{{ asset('assets1/css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet" />
</head>

<body style="transition: none">
  <div class="wrapper ">
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
        <li class="nav-item ">
          <a class="nav-link" href="{{ route('comidas.index') }}">
            <i class="material-icons">add_shopping_cart</i>
            <p>Produtos</p>
          </a>
        </li>

        <li class="nav-item ">
          <a class="nav-link" href="#">
            <i class="material-icons">add_task</i>
            <p>Pedidos</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="#">
            <i class="material-icons">delivery_dining</i>
            <p>Entregas</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <a class="navbar-brand" href="javascript:;">@yield('titulo_pagina')</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
          <div class="navbar-form" style="display: none"></div>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">person</i>
                <p class="d-lg-none d-md-block">
                  Empresa
                </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                <form method="POST" action="{{ route('logout') }}" id="form-sair">
                  @csrf
                </form>

                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); getElementById('form-sair').submit()">Sair</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    @yield('conteudo')

    </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets1/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('assets1/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets1/js/core/bootstrap-material-design.min.js') }}"></script>
  <script src="{{ asset('assets1/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!-- Plugin for the momentJs  -->
  <script src="{{ asset('assets1/js/plugins/moment.min.js') }}"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="{{ asset('assets1/js/plugins/sweetalert2.js') }}"></script>
  <!-- Forms Validations Plugin -->
  <script src="{{ asset('assets1/js/plugins/jquery.validate.min.js') }}"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="{{ asset('assets1/js/plugins/jquery.bootstrap-wizard.js') }}"></script>
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="{{ asset('assets1/js/plugins/bootstrap-selectpicker.js') }}"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="{{ asset('assets1/js/plugins/bootstrap-tagsinput.js') }}"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="{{ asset('assets1/js/plugins/jasny-bootstrap.min.js') }}"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="{{ asset('assets1/js/plugins/jquery-jvectormap.js') }}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('assets1/js/plugins/nouislider.min.js') }}"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="{{ asset('assets1/js/plugins/arrive.min.js') }}"></script>
  <!-- Chartist JS -->
  <script src="{{ asset('assets1/js/plugins/chartist.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets1/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets1/js/material-dashboard.js?v=2.1.2') }}" type="text/javascript"></script>

  @yield('js')
</body>

</html>