create table TB_HISTORIA
(
    co_historia   int auto_increment,
    ds_titulo     varchar(80)            null,
    ds_observacao text                   null,
    dt_cadastro   datetime               null,
    dt_atualizado datetime               null,
    st_situacao   varchar(1) default 'N' null comment 'N - Não iniciada / I - Iniciada / C - Concluida',
    co_sessao     int                    not null,
    primary key (co_historia, co_sessao)
);

