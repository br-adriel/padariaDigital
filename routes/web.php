<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ComidaController;
use App\Http\Controllers\PanificadoraController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/dashboard', [ComidaController::class, 'index'
])->middleware(['auth'])->name('dashboard');

Route::Resource('comidas', ComidaController::class)->except([
	'create', 'show',
])->middleware(['auth']);


//tela emrpesa
Route::get('/empresa', [PanificadoraController::class, 'edit'])->middleware(['auth'])->name('panificadoras.edit');

Route::put('/empresa', [PanificadoraController::class, 'update'])->middleware(['auth'])->name('panificadoras.update');


//tela pedidos
Route::get('/pedidos/pendentes', [PedidoController::class, 'pedidosPendentes'])->middleware(['auth'])->name('pedidos.pedidos_pendentes');

Route::put('/pedidos/pendentes/aceitar/{cliente}', [PedidoController::class, 'aceitarPedido'])->middleware(['auth'])->name('pedidos.aceitar_pedido');


//tela entregas
Route::get('/entregas/situacao', [PedidoController::class, 'situacaoEntregas'])->middleware(['auth'])->name('pedidos.situacao_entregas');

Route::put('/entregas/{cliente}/marcar/enviado', [PedidoController::class, 'marcarEnviado'])->middleware(['auth'])->name('pedidos.marcar_enviado');

Route::put('/entregas/{cliente}/marcar/entregue', [PedidoController::class, 'marcarEntregue'])->middleware(['auth'])->name('pedidos.marcar_entregue');

require __DIR__.'/auth.php';


Route::post('/clientes/create/{comida}', [ClienteController::class, 'create'])->name('clientes.create');

Route::post('/pedidos/create/{cliente}/{comida}', [PedidoController::class, 'create'])->name('pedidos.create');

Route::get('/carrinho', [PedidoController::class, 'carrinho'])->name('pedidos.carrinho');
Route::get('/carrinho/{cliente?}', [PedidoController::class, 'carrinho2'])->name('pedidos.carrinho');
Route::put('/carrinho/{cliente}/entrega', [PedidoController::class, 'pedirEntrega'])->name('pedidos.pedir_entrega');

Route::delete('/carrinho/{cliente}/{pedido}/excluir', [PedidoController::class, 'destroy'])->name('pedidos.delete');

Route::get('/entregas', [PedidoController::class, 'entregas'])->name('pedidos.entregas');
Route::get('/entregas/{cliente?}', [PedidoController::class, 'entregas2'])->name('pedidos.entregas');

Route::get('/', [ClienteController::class, 'index'])->name('index');
Route::get('/{cliente?}', [ClienteController::class, 'index2'])->name('index');