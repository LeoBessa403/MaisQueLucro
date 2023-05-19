create table TB_PLANO
(
    co_plano     int auto_increment
        primary key,
    dt_cadastro  datetime               null,
    no_plano     varchar(100)           null,
    nu_mes_ativo int(1)                 null comment 'Número de meses ativo do plano (1, 3, 6, 12 e 24)',
    st_status    varchar(1) default 'A' null comment 'Status do plano A - Ativo / I - Inativo'
);

