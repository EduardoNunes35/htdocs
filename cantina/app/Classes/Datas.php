<?php

namespace App\Classes;

class Datas
{
    public static function data()
    {
        return date('d/m/y');
    }

    public static function dataHora()
    {
        return date('d/m/Y H:i:s');
    }

    public static function testando()
    {
        dd('Rotina de Testes de Datas');
    }
}
