<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Comida;
use App\Models\Pedido;

class ClienteController extends Controller
{
    public function index() {
    	$comidas = Comida::all();

    	return view('cliente.index', ['comidas'=>$comidas]);
    }


    public function index2($cliente) {
    	$comidas = Comida::all();
    	$cliente = Cliente::find($cliente);

    	return view('cliente.index', ['comidas'=>$comidas, 'cliente'=>$cliente]);
    }


    public function create(Request $request, $comida) {
 		$cliente = Cliente::where('nome', $request->nome)
 		->where('telefone', $request->telefone)->first();

 		echo $cliente;
 		if ($cliente === null) {
 			$cliente = new Cliente;

	    	$cliente->nome 		= $request->nome;
	    	$cliente->telefone 	= $request->telefone;

	    	$cliente->save();
 		}

 		$pedido = new Pedido;

 		$pedido->cliente 	= $cliente->id;
 		$pedido->comida 	= Comida::find($comida)->id;
 		$pedido->quantidade = $request->quantidade;
 		$pedido->situacao 	= 0;

 		$pedido->save();
	   	return redirect()->route('index', ['cliente'=>$cliente->id]);
    }
}
