<?php

namespace App\Services;

class DescontoService
{
    public static function calcular($cliente, $total)
    {
        switch ($cliente->tipo) {
            case 'professor':
                return $total * 0.05;

            case 'aluno':
                return $total * 0.10;

            default:
                return 0;
        }
    }
}