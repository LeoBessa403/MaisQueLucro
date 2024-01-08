<?php

class Acelerador extends AbstractController
{
    public $result;

    public function Lucros()
    {
        $graficoFinal2 = [
            0 => "['', '']",
            1 => "[ 'DESPESAS DIRETAS (CV)', 34]",
            2 => "[ 'DESPESAS INDIRETAS (CF)', 52]",
            3 => "[ 'LUCRO LÍQUIDO (LO)', 27]"
        ];
        $grafico = new Grafico(Grafico::PIZZA, "DIVISÃO DO FATURAMENTO", "graf1");
        $grafico->SetDados($graficoFinal2);
        $grafico->GeraGrafico();



        $graficoFinal = [
            0 => "['', 'ANTES', { role: 'annotation' },{ role: 'style' }, 'DEPOIS', { role: 'annotation' },{ role: 'style' }]",
            1 => "['FATURAMENTO P.E OPERACIONAL' ,47564.31, 47564.31,'color: green' ,39654.31 ,39654.31, 'color: blue']",
            2 => "['FATURAMENTO P.E LUCRATIVO' ,59564.31, 59564.31,'color: darkgreen' ,49854.31 ,49854.31, 'color: darkblue']",
        ];

        $grafico = new Grafico(Grafico::COLUNA, "", "graf2");
        $grafico->SetDados($graficoFinal);
        $grafico->GeraGrafico();

    }
}