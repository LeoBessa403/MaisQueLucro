create table TB_ACESSO
(
    co_acesso        int auto_increment,
    ds_session_id    varchar(255) null,
    dt_inicio_acesso datetime     null,
    dt_fim_acesso    datetime     null,
    tp_situacao      varchar(1)   null comment 'A - Ativo / F - Finalizado',
    co_usuario       int(10)      not null,
    co_trafego       int          not null,
    primary key (co_acesso, co_usuario, co_trafego)
);
