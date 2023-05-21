create table TB_PLANO_ASSINANTE
(
    co_plano_assinante int auto_increment comment 'Tabela de Histórico de dados do Plano',
    nu_valor           decimal(8, 2) null,
    dt_cadastro        datetime      null,
    ds_observacao      text          null,
    co_plano           int           not null,
    primary key (co_plano_assinante, co_plano)
);

