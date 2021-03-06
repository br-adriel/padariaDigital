@extends('layouts.base_adm')

@section('titulo')
Empresa
@endsection

@section('titulo_pagina')
Empresa
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
        <li class="nav-item active">
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

        <li class="nav-item ">
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
            <div class="card">
              <div class="card-header card-header-warning">
                <h4 class="card-title">Edite Sua Empresa</h4>
                <p class="card-category">Preencha corretamente</p>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('panificadoras.update') }}">
                	@csrf
                	@method('PUT')
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Telefone</label>
                        <input type="number" class="form-control" name="telefone" value="{{ $panificadora->telefone }}" min="0" maxlength="11" minlength="11">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Email</label>
                        <input type="text" class="form-control" name="email" maxlength="70"value="{{ $panificadora->email }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Endereço</label>
                        <input type="text" class="form-control" maxlength="70" name="endereco" value="{{ $panificadora->endereco }}">
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-info pull-right">Salvar alterações</button>
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection