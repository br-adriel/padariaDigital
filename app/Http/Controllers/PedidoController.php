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
    	$pedidos = Pedido::where('situacao', '!=', 0)->orderBy('created_at', 'DESC')->get();
    	$clis = CLiente::all();

    	return view('cliente.pedidos.entregas', ['pedidos'=>$pedidos, 'clis'=>$clis]);
    }


    public function entregas2($cliente) {
    	$pedidos = Pedido::where('situacao', '!=', 0)->orderBy('created_at', 'DESC')->get();
    	$clis = Cliente::all();

    	return view('cliente.pedidos.entregas', 
    		['pedidos'=>$pedidos, 
    		'cliente'=>$cliente, 
    		'clis'=>$clis]);
    }


    public function pedirEntrega($cliente) {
    	$pedidos = Pedido::where('cliente', $cliente)->where('situacao', 0)->get();

    	foreach ($pedidos as $pedido) {
    		$pedido->situacao = 1;
    		$pedido->save();
    	}

    	return redirect()->route('pedidos.entregas', ['cliente'=>$cliente]);
    }


    public function destroy($cliente, $pedido) {
    	$ped = Pedido::find($pedido);

    	if ($ped->cliente = $cliente) {
    		$ped->delete();
    	}

    	return redirect()->route('pedidos.carrinho', ['cliente'=>$cliente]);
    }
}
