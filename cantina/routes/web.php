<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RelatorioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('status_banco', function () {
    try {
        $pdo = DB::connection()->getPdo();
        // Obtém o nome do banco de dados configurado
        $nomeBanco = DB::connection()->getDatabaseName(); 

        return response()->json([
            'success' => true, 
            'mensagem' => 'Conexão com o banco OK',
            'banco' => $nomeBanco // Exibe o nome do banco aqui
        ]);
    } catch (\PDOException $e) {
        return response()->json([
            'success'  => false,
            'erro'     => 'Erro ao conectar ao banco de dados.',
            'detalhes' => $e->getMessage(),
        ], 500);
    }
});

Route::get('/portifolio', function () {
    return view('site.construindo');
})->name('site.construindo');

Route::get('/caixa', function () {
    return view('caixa');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/relatorios/vendas', [RelatorioController::class, 'vendas']);

Route::get('/exemplos_js', function () {
    return view('exemplojs01');
})->name('exemplos_js');

Route::get('/terminal_aberto', function () {
    return view('/terminal_vendas');
})->name('terminal_aberto');

