<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\ItemVenda;
use App\Models\Produto;
use App\Models\Cliente;
use App\Services\DescontoService;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $cliente = Cliente::find($request->cliente_id);

            $total = 0;

            foreach ($request->itens as $item) {
                $produto = Produto::find($item['produto_id']);
                $total += $produto->preco * $item['quantidade'];
            }

            $desconto = DescontoService::calcular($cliente, $total);
            $totalFinal = $total - $desconto;

            $venda = Venda::create([
                'cliente_id' => $cliente->id,
                'total' => $total,
                'desconto' => $desconto,
                'total_final' => $totalFinal
            ]);

            foreach ($request->itens as $item) {
                $produto = Produto::find($item['produto_id']);

                ItemVenda::create([
                    'venda_id' => $venda->id,
                    'produto_id' => $produto->id,
                    'quantidade' => $item['quantidade'],
                    'preco' => $produto->preco,
                    'subtotal' => $produto->preco * $item['quantidade']
                ]);

                $produto->decrement('estoque', $item['quantidade']);
            }

            DB::commit();

            return response()->json($venda);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['erro' => $e->getMessage()], 500);
        }
    }
}