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
}
