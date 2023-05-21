create table TB_HISTORICO_SUPORTE
(
    co_historico_suporte int auto_increment,
    dt_cadastro          datetime               null,
    ds_mensagem          text                   null,
    st_lido              varchar(1) default 'N' null comment 'S - Sim / N - Não',
    co_suporte           int                    not null,
    co_usuario           int(10)                not null,
    co_imagem            int unsigned           not null comment 'Chave do Anexo.',
    primary key (co_historico_suporte, co_suporte, co_usuario, co_imagem)
);

