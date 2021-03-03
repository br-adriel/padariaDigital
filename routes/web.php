<?php

use App\Http\Controllers\ComidaController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', [ComidaController::class, 'index'
])->middleware(['auth'])->name('dashboard');

Route::Resource('comidas', ComidaController::class)->except([
	'create', 'show',
])->middleware(['auth']);

require __DIR__.'/auth.php';
