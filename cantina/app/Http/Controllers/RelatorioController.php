<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{
    public function vendas()
    {
        $dados = DB::table('vendas')
            ->selectRaw('DATE(created_at) as data, SUM(total_final) as total')
            ->groupBy('data')
            ->orderBy('data')
            ->get();

        return view('relatorios.vendas', compact('dados'));
    }
}