<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\NotaFiscalController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/produtos', [App\Http\Controllers\ProdutoController::class, 'index'])->name('produtos');

Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('clientes');

Route::get('/pedidos', [App\Http\Controllers\PedidoController::class, 'index'])->name('pedidos');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/validade', [App\Http\Controllers\HomeController::class, 'certificado'])->name('validade');

Route::get('/status', [App\Http\Controllers\HomeController::class, 'status'])->name('status');

Route::get('/emitir', [NotaFiscalController::class, 'create'])->name('emitir');

Route::get('/consultar', [NotaFiscalController::class, 'index'])->name('consultar');

Route::post('/exibirConsulta', [NotaFiscalController::class, 'show'])->name('exibirConsulta');