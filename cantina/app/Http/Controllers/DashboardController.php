<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalHoje = DB::table('vendas')
            ->whereDate('created_at', now())
            ->sum('total_final');

        $qtdVendas = DB::table('vendas')
            ->whereDate('created_at', now())
            ->count();

        $produtosMaisVendidos = DB::table('itens_venda')
            ->join('produtos', 'produtos.id', '=', 'itens_venda.produto_id')
            ->select('produtos.nome', DB::raw('SUM(itens_venda.quantidade) as total'))
            ->groupBy('produtos.nome')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'totalHoje',
            'qtdVendas',
            'produtosMaisVendidos'
        ));
    }
}