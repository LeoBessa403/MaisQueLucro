<?php

/**
 * Class TipoPagamento
 */
class StatusAtendimentoEnum extends AbstractEnum
{
    const NAO_INICIADO = 1;
    const INICIADO = 2;
    const CONCLUIDO = 3;

    public static $descricao = [
        StatusAtendimentoEnum::NAO_INICIADO => 'Não Iniciado',
        StatusAtendimentoEnum::INICIADO => 'Iniciado',
        StatusAtendimentoEnum::CONCLUIDO => 'Concluído',
    ];
}
