<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Comida;
use App\Models\Panificadora;
use App\Models\Pedido;

class ClienteController extends Controller
{
    public function index() {
    	$comidas = Comida::all();
        $panificadora = Panificadora::find(1);

    	return view('cliente.index', ['comidas'=>$comidas, 'panificadora'=>$panificadora]);
    }


    public function index2($cliente) {
    	$comidas = Comida::all();
    	$cliente = Cliente::find($cliente);
        $panificadora = Panificadora::find(1);

    	return view('cliente.index', ['comidas'=>$comidas, 'cliente'=>$cliente, 'panificadora'=>$panificadora]);
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

        //checa se o request veio do carrinho
        if ($comida == 0) {
            return redirect()->route('pedidos.carrinho', ['cliente'=>$cliente, 'panificadora'=>$panificadora]);
        }

 		$pedido = new Pedido;

 		$pedido->cliente 	= $cliente->id;
 		$pedido->comida 	= Comida::find($comida)->id;
 		$pedido->quantidade = $request->quantidade;
 		$pedido->situacao 	= 0;

 		$pedido->save();
	   	return redirect()->route('index', ['cliente'=>$cliente->id]);
    }


    public function filtrar(Request $request) {
        $comidas;

        if ($request->tag != -1) {
            $comidas = Comida::all()->where('tag', $request->tag);
        } else {
            $comidas = Comida::all();
        }
        
        $panificadora = Panificadora::find(1);

        return view('cliente.index', ['comidas'=>$comidas, 'panificadora'=>$panificadora, 'filtro'=>$request->tag]);
    }


    public function filtrar2(Request $request, $cliente) {
        $comidas;

         if ($request->tag != -1) {
            $comidas = Comida::all()->where('tag', $request->tag);
        } else {
            $comidas = Comida::all();
        }

        $cliente = Cliente::find($cliente);
        $panificadora = Panificadora::find(1);

        return view('cliente.index', ['comidas'=>$comidas, 'cliente'=>$cliente, 'panificadora'=>$panificadora, 'filtro'=>$request->tag]);
    }
}
