<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Comida;
use App\Models\Pedido;

class PedidoController extends Controller
{
    public function create(Request $request, $cliente, $comida) {
    	$pedido = new Pedido();

    	$pedido->cliente 	= CLiente::find($cliente)->id;
    	$pedido->comida 	= Comida::find($comida)->id;
    	$pedido->quantidade = $request->quantidade;
    	$pedido->situacao 	= 0;

    	$pedido->save();
    	return redirect()->route('index', ['cliente'=>$pedido->cliente]);
    }


    public function carrinho() {
    	return view('cliente.pedidos.carrinho');
    }


    public function carrinho2($cliente) {
    	$c = Cliente::find($cliente);

    	$pedidos = $c->pedidos->where('situacao', 0);
    	$comidas = Comida::all();

    	return view('cliente.pedidos.carrinho', ['cliente'=>$c, 'pedidos'=>$pedidos, 'comidas'=>$comidas]);
    }


    public function entregas() {
    	return "entregas";
    }


    public function destroy($cliente, $pedido) {
    	$ped = Pedido::find($pedido);

    	if ($ped->cliente = $cliente) {
    		$ped->delete();
    	}

    	return redirect()->route('pedidos.carrinho', ['cliente'=>$cliente]);
    }
}
