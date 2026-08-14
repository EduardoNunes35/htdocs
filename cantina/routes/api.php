<?php

use App\Http\Controllers\VendaController;
use Illuminate\Support\Facades\Route;

Route::post('/venda', [VendaController::class, 'store']);

Route::get('/produtos', fn() => \App\Models\Produto::all());
Route::get('/clientes', fn() => \App\Models\Cliente::all());