<?php

/**
 * Class StatusPagamentoFCEnum
 */
class StatusPagamentoFCEnum extends AbstractEnum
{
    const A_PAGAR = 1;
    const A_RECEBER = 2;
    const PAGO = 3;
    const EM_ATRASO = 4;


    public static $descricao = [
        StatusPagamentoFCEnum::A_PAGAR => 'A Pagar',
        StatusPagamentoFCEnum::A_RECEBER => 'A Receber',
        StatusPagamentoFCEnum::PAGO => 'Pago ',
        StatusPagamentoFCEnum::EM_ATRASO => 'Em Atraso',
    ];

    public static $cores = [
        StatusPagamentoFCEnum::A_PAGAR => 'orange',
        StatusPagamentoFCEnum::A_RECEBER => 'blue',
        StatusPagamentoFCEnum::PAGO => 'green',
        StatusPagamentoFCEnum::EM_ATRASO => 'red',
    ];
}
