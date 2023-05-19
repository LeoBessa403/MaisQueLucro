create table TB_ANOTACAO
(
    co_anotacao   int auto_increment,
    dt_cadastro   datetime    null,
    ds_observacao text        null,
    ds_titulo     varchar(80) null,
    co_historia   int         not null,
    primary key (co_anotacao, co_historia)
);

