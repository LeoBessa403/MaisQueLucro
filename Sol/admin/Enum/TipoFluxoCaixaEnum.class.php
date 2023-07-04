<?php
/**
 * Class TipoFluxoCaixaEnum
 */
class TipoFluxoCaixaEnum extends AbstractEnum
{
    const ENTRADA = 1;
    const SAIDA = 2;

    public static $descricao = [
        TipoFluxoCaixaEnum::ENTRADA => 'Entrada',
        TipoFluxoCaixaEnum::SAIDA => 'Saída',
    ];

    public static $label = [
        TipoFluxoCaixaEnum::ENTRADA => '<span class="badge badge-sm bg-success">Entrada</span>',
        TipoFluxoCaixaEnum::SAIDA => '<span class="badge badge-sm bg-red">Saída</span>',
    ];
}