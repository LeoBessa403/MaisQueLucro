create table TB_PLANO_ASSINANTE_ASSINATURA
(
    co_plano_assinante_assinatura       int auto_increment,
    dt_cadastro                         datetime                   null,
    dt_expiracao                        date                       null comment 'data de expiriração da assinatura',
    dt_confirma_pagamento               datetime                   null comment 'Data que confirmou o pagamento',
    tp_pagamento                        int(1)                     null comment '3 - Cartão de Crédito / 4 - Depósito ou Transferência / 5 - Boleto',
    st_pagamento                        int(1)      default 0      null comment '0 - Pendente / 1 - Aguardando pagamento / 2 - Em análise / 3 - Pago / 4 - Disponível / 5 - Em disputa / 6 - Devolvida / 7 - Cancelada',
    dt_modificado                       datetime                   null comment 'Data da ùltima modificação',
    nu_valor_desconto                   decimal(8, 2)              null comment 'Valor de Desconto do PagSeguro',
    nu_valor_real                       decimal(8, 2)              null comment 'Valor de recebimento do PagSeguro',
    ds_link_boleto                      text                       null comment 'Link do Boleto que retorno da PagSeguro',
    nu_filiais                          int         default 0      null comment 'Número de filiais para a assinatura',
    co_plano_assinante_assinatura_ativo int         default 0      null comment 'Número do co_plano_assinante_assinatura que esta ativo',
    st_status                           varchar(1)  default 'I'    null comment 'A - Ativo / I - Inativo',
    ds_code_transacao                   varchar(80) default 'null' null comment 'Code da transação do PagSeguro',
    nu_valor_assinatura                 decimal(8, 2)              null comment 'Valor final da assinatura',
    co_assinante                        int                        not null,
    co_plano_assinante                  int                        not null,
    primary key (co_plano_assinante_assinatura, co_assinante, co_plano_assinante)
);