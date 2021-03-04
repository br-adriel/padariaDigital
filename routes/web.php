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

Route::get('/', [ClienteController::class, 'index'])->name('index');
Route::get('/{cliente?}', [ClienteController::class, 'index2'])->name('index');

Route::post('/clientes/create/{comida}', [ClienteController::class, 'create'])->name('clientes.create');

Route::post('/pedidos/create/{cliente}/{comida}', [PedidoController::class, 'create'])->name('pedidos.create');