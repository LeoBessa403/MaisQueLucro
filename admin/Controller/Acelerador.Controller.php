<?php

class Acelerador extends AbstractController
{
    public $result;

    public function Lucros()
    {
        $graficoFinal2 = [
            0 => "['', '']",
            1 => "[ 'DESPESAS DIRETAS (CV)', 59564.31]",
            2 => "[ 'DESPESAS INDIRETAS (CF)', 47564.31]",
            3 => "[ 'LUCRO LÍQUIDO (LO)', 39654.31]"
        ];
        $grafico = new Grafico(Grafico::PIZZA, "DIVISÃO DO FATURAMENTO", "graf1");
        $grafico->SetDados($graficoFinal2);
        $grafico->GeraGrafico();


        $graficoFinal = [
            0 => "['', 'BASE', { role: 'annotation' },{ role: 'style' }, 'TURBINADO', { role: 'annotation' },{ role: 'style' }]",
            1 => "['FATURAMENTO P.E OPERACIONAL' ,47564.31, 47564.31,'color: darkgreen' ,39654.31 ,39654.31, 'color: darkblue']",
            2 => "['FATURAMENTO P.E LUCRATIVO' ,59564.31, 59564.31,'color: green' ,49854.31 ,49854.31, 'color: blue']",
        ];

        $grafico = new Grafico(Grafico::COLUNA, "", "graf2");
        $grafico->SetDados($graficoFinal);
        $grafico->GeraGrafico();
    }
}