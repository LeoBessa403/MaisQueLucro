<?php

/**
 * Class TipoPagamento
 */
class StatusAgendamentoEnum extends AbstractEnum
{
    const AGENDADO = 1;
    const CONFIRMADO  = 2;
    const AGUARDANDO = 3;
    const EM_ATENDIMENTO = 4;
    const CANCELADO = 5;
    const FALTOU = 6;
    const FINALIZADO = 7;
    const DELETADO = 8;

    public static $descricao = [
        StatusAgendamentoEnum::AGENDADO => 'Agendado',
        StatusAgendamentoEnum::CONFIRMADO => 'Confirmado',
        StatusAgendamentoEnum::AGUARDANDO => 'Aguardando',
        StatusAgendamentoEnum::EM_ATENDIMENTO => 'Em Atendimento',
        StatusAgendamentoEnum::CANCELADO => 'Cancelado',
        StatusAgendamentoEnum::FALTOU => 'Faltou',
        StatusAgendamentoEnum::FINALIZADO => 'Finalizado',
        StatusAgendamentoEnum::DELETADO => 'Deletado',
    ];

    public static $cores = [
        StatusAgendamentoEnum::AGENDADO => 'orange',
        StatusAgendamentoEnum::CONFIRMADO => 'purple',
        StatusAgendamentoEnum::AGUARDANDO => 'teal',
        StatusAgendamentoEnum::EM_ATENDIMENTO => 'warning',
        StatusAgendamentoEnum::CANCELADO => 'red',
        StatusAgendamentoEnum::FALTOU => 'beige',
        StatusAgendamentoEnum::FINALIZADO => 'green',
        StatusAgendamentoEnum::DELETADO => 'black',
    ];
}
