create table TB_SUPORTE
(
    co_suporte      int auto_increment,
    st_status       varchar(1) default 'A' null comment 'A - Ativa / I - Inativa',
    dt_cadastro     datetime               null,
    ds_assunto      varchar(100)           null,
    st_tipo_assunto int(1)                 null comment '1 - Sugestão ou Melhorias / 2 - Reclamação / 3 -  Correção no Sistema / 4 - Outros',
    co_assinante    int                    not null,
    primary key (co_suporte, co_assinante)
);

