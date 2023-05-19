create table TB_MODULO
(
    co_modulo   int auto_increment,
    no_modulo   varchar(50) null,
    dt_cadastro datetime    null,
    co_projeto  int         not null,
    primary key (co_modulo, co_projeto)
);

