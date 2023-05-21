create table TB_SESSAO
(
    co_sessao   int auto_increment,
    no_sessao   varchar(80) null,
    dt_cadastro datetime    null,
    co_modulo   int         not null,
    primary key (co_sessao, co_modulo)
);

