create table TB_PACOTE
(
    co_pacote     int auto_increment
        primary key,
    no_pacote     varchar(50) null,
    ds_descricao  text        null,
    dt_cadastro   datetime    null,
    dt_lancamento date        null
);

