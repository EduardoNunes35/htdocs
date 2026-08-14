<?php

namespace App\Classes;

class CNJ
{
 /**
     * Gera número único de processo no formato CNJ.
     *
     * @param int $sequencial Número sequencial (7 dígitos)
     * @param int $ano Ano de ajuizamento
     * @param int $segmento Código do segmento do Judiciário (1 dígito)
     * @param int $tribunal Código do tribunal (2 dígitos)
     * @param int $unidade Código da unidade de origem (4 dígitos)
     * @return string Número completo no formato NNNNNNN-DD.AAAA.J.TR.OOOO
     */
    public static function gerarNumero($sequencial, $ano, $segmento, $tribunal, $unidade)
    {
        // Formata partes
        $parteSequencial = str_pad($sequencial, 7, '0', STR_PAD_LEFT);
        $parteAno        = str_pad($ano, 4, '0', STR_PAD_LEFT);
        $parteSegmento   = str_pad($segmento, 1, '0', STR_PAD_LEFT);
        $parteTribunal   = str_pad($tribunal, 2, '0', STR_PAD_LEFT);
        $parteUnidade    = str_pad($unidade, 4, '0', STR_PAD_LEFT);

        // Monta base sem dígito verificador
        $numeroBase = $parteSequencial . $parteAno . $parteSegmento . $parteTribunal . $parteUnidade;

        // Calcula dígito verificador
        $dv = self::calcularDV($numeroBase);

        // Retorna número formatado
        return "{$parteSequencial}-{$dv}.{$parteAno}.{$parteSegmento}.{$parteTribunal}.{$parteUnidade}";
    }

    /**
     * Calcula o dígito verificador segundo regra CNJ
     */
    private static function calcularDV(string $numeroBase): string
    {
        // calcula (numeroBase . '00') mod 97 sem BCMath
        $num = $numeroBase . '00';
        $resto = 0;
        $len = strlen($num);
        for ($i = 0; $i < $len; $i++) {
            $resto = ($resto * 10 + (ord($num[$i]) - 48)) % 97;
        }
        $dv = 98 - $resto;
        return str_pad((string)$dv, 2, '0', STR_PAD_LEFT);
    }
}
