<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ComidaController;
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