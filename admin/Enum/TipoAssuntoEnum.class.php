<?php
/**
 * Class TipoAssunto
 */
class TipoAssuntoEnum extends AbstractEnum
{
    const SUGESTAO_MELHORIAS = 1;
    const RECLAMACAO = 2;
    const CORRECAO_SISTEMA = 3;
    const OUTROS = 4;

    public static $descricao = [
        TipoAssuntoEnum::SUGESTAO_MELHORIAS => 'Sugestão ou Melhorias',
        TipoAssuntoEnum::RECLAMACAO => 'Reclamação',
        TipoAssuntoEnum::CORRECAO_SISTEMA => 'Correção no Sistema',
        TipoAssuntoEnum::OUTROS => 'Outros',
    ];
}