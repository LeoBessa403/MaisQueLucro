create table TB_CRONS
(
    co_cron     int auto_increment
        primary key,
    dt_cadastro datetime    null,
    no_cron     varchar(70) null,
    ds_sql      text        null
);

INSERT INTO TB_CRONS (co_cron, dt_cadastro, no_cron, ds_sql) VALUES (1, '2023-02-09 14:35:53', 'Atualiza Lançamentos em atraso', 'update TB_FLUXO_CAIXA set st_pagamento = 4 where dt_vencimento < SYSDATE() and dt_realizado is null and st_pagamento in (1,2)');