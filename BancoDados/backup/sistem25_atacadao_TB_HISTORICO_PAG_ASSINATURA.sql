create table TB_HISTORICO_PAG_ASSINATURA
(
    co_historico_pag_assinatura   int auto_increment,
    dt_cadastro                   datetime     null,
    ds_acao                       varchar(100) null,
    ds_usuario                    varchar(100) null,
    st_pagamento                  int(1)       null comment '0 - Pendente / 1 - Aguardando pagamento / 2 - Em análise / 3 - Pago / 4 - Disponível / 5 - Em disputa / 6 - Devolvida / 7 - Cancelada',
    co_plano_assinante_assinatura int          not null,
    primary key (co_historico_pag_assinatura, co_plano_assinante_assinatura)
);

