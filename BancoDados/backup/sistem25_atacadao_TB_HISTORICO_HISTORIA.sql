create table TB_HISTORICO_HISTORIA
(
    co_historico_historia int auto_increment,
    nu_esforco            varchar(2) null,
    nu_esforco_restante   varchar(2) null,
    dt_cadastro           datetime   null,
    co_historia           int        not null,
    primary key (co_historico_historia, co_historia)
);

