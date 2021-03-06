<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Comida;
use App\Models\Panificadora;
use App\Models\Pedido;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function create(Request $request, $cliente, $comida) {
    	$pedido = new Pedido();

    	$pedido->cliente 	= CLiente::find($cliente)->id;
    	$pedido->comida 	= Comida::find($comida)->id;
    	$pedido->quantidade = $request->quantidade;
    	$pedido->situacao 	= 0;

    	$pedido->save();
    	return redirect()->route('pedidos.carrinho', ['cliente'=>$pedido->cliente]);
    }


    public function carrinho() {
        $panificadora = Panificadora::find(1);

    	return view('cliente.pedidos.carrinho', ['panificadora'=>$panificadora]);
    }


    public function carrinho2($cliente) {
        $panificadora = Panificadora::find(1);

    	$c = Cliente::find($cliente);

    	$pedidos = $c->pedidos->where('situacao', 0);
    	$comidas = Comida::all();

    	return view('cliente.pedidos.carrinho', ['cliente'=>$c, 'pedidos'=>$pedidos, 'comidas'=>$comidas, 'panificadora'=>$panificadora]);
    }


    public function entregas() {
       $panificadora = Panificadora::find(1);
        $clis = Cliente::all();
        $pedidos = DB::table('pedidos')->join('comidas', 'pedidos.comida', '=', 'comidas.id')
                    ->select('pedidos.*', 'comidas.preco', 'comidas.nome')
                    ->where('situacao', '=', 2)->orWhere('situacao', '=', 3)->get();

        //clintes com pedidos aprovados mas ainda nao enviados
        $clis1 = [];
        foreach ($clis as $c) {
            foreach ($pedidos as $pedido) {
                if ($pedido->cliente == $c->id && $pedido->situacao == 2) {
                    $clis1[] = $c;
                    break;
                }
            }
        }

        //clientes com pedidos enviados
        $clis2 = [];
        foreach ($clis as $c) {
            foreach ($pedidos as $pedido) {
                if ($pedido->cliente == $c->id && $pedido->situacao == 3) {
                    $clis2[] = $c;
                    break;
                }
            }
        }

        return view('cliente.pedidos.entregas', ['pedidos'=>$pedidos, 'clis1'=>$clis1, 'clis2'=>$clis2, 'panificadora'=>$panificadora]);
    }


    public function entregas2($cliente, $mensagem) {
        $panificadora = Panificadora::find(1);
        $clis = Cliente::all();
        $pedidos = DB::table('pedidos')->join('comidas', 'pedidos.comida', '=', 'comidas.id')
                    ->select('pedidos.*', 'comidas.preco', 'comidas.nome')
                    ->where('situacao', '=', 2)->orWhere('situacao', '=', 3)->get();

        //clintes com pedidos aprovados mas ainda nao enviados
        $clis1 = [];
        foreach ($clis as $c) {
            foreach ($pedidos as $pedido) {
                if ($pedido->cliente == $c->id && $pedido->situacao == 2) {
                    $clis1[] = $c;
                    break;
                }
            }
        }

        //clientes com pedidos enviados
        $clis2 = [];
        foreach ($clis as $c) {
            foreach ($pedidos as $pedido) {
                if ($pedido->cliente == $c->id && $pedido->situacao == 3) {
                    $clis2[] = $c;
                    break;
                }
            }
        }

        return view('cliente.pedidos.entregas', ['pedidos'=>$pedidos, 'clis1'=>$clis1, 'clis2'=>$clis2, 'panificadora'=>$panificadora, 'cliente'=>$cliente, 'mensagem'=>$mensagem]);
    }


    public function pedirEntrega($cliente) {
    	$pedidos = Pedido::where('cliente', $cliente)->where('situacao', 0)->get();

    	foreach ($pedidos as $pedido) {
    		$pedido->situacao = 1;
    		$pedido->save();
    	}

    	return redirect()->route('pedidos.entregas', ['cliente'=>$cliente, 'mensagem'=>1]);
    }


    public function destroy($cliente, $pedido) {
    	$ped = Pedido::find($pedido);

    	if ($ped->cliente = $cliente) {
    		$ped->delete();
    	}

    	return redirect()->route('pedidos.carrinho', ['cliente'=>$cliente]);
    }


    public function pedidosPendentes() {
        $clientes = Cliente::all();
        $pedidos = DB::table('pedidos')->join('comidas', 'pedidos.comida', '=', 'comidas.id')
                    ->select('pedidos.*', 'comidas.preco', 'comidas.nome')
                    ->where('situacao', '=', 1)->get();

        $clis = [];

        foreach ($clientes as $cliente) {
            foreach ($pedidos as $pedido) {
                if ($pedido->cliente == $cliente->id) {
                    $clis[] = $cliente;
                    break;
                }
            }
        }

        return view('administrador.pedidos.pedidos', ['clientes'=>$clis, 'pedidos'=>$pedidos]);
    }


    public function aceitarPedido(Request $request, $cliente) {
        $pedidos = Pedido::where('situacao', 1)->where('cliente', $cliente)->get();

        foreach ($pedidos as $pedido) {
            $pedido->situacao = 2;
            $pedido->save();
        }

        return redirect()->route('pedidos.pedidos_pendentes');
    }

    public function situacaoEntregas() {
        $clientes = Cliente::all();
        $pedidos = DB::table('pedidos')->join('comidas', 'pedidos.comida', '=', 'comidas.id')
                    ->select('pedidos.*', 'comidas.preco', 'comidas.nome')
                    ->where('situacao', '=', 2)->orWhere('situacao', '=', 3)->get();

        $clis = [];
        foreach ($clientes as $cliente) {
            foreach ($pedidos as $pedido) {
                if ($pedido->cliente == $cliente->id && $pedido->situacao == 2) {
                    $clis[] = $cliente;
                    break;
                }
            }
        }


        $clis2 = [];
        foreach ($clientes as $cliente) {
            foreach ($pedidos as $pedido) {
                if ($pedido->cliente == $cliente->id && $pedido->situacao == 3) {
                    $clis2[] = $cliente;
                    break;
                }
            }
        }

        return view('administrador.pedidos.entregas', ['clientes1'=>$clis, 'clientes2'=>$clis2, 'pedidos'=>$pedidos]);
    }

    public function marcarEnviado($cliente) {
        $pedidos = Pedido::where('cliente', $cliente)->where('situacao', 2)->get();

        foreach ($pedidos as $pedido) {
            $pedido->situacao = 3;
            $pedido->save();
        }

        return redirect()->route('pedidos.situacao_entregas');
    }


    public function marcarEntregue($cliente) {
        $pedidos = Pedido::where('cliente', $cliente)->where('situacao', 3)->get();

        foreach ($pedidos as $pedido) {
            $pedido->situacao = 4;
            $pedido->save();
        }

        return redirect()->route('pedidos.situacao_entregas');
    }
}
