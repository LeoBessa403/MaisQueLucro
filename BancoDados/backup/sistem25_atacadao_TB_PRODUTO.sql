create table TB_PRODUTO
(
    co_produto       int(12) auto_increment primary key,
    no_produto       varchar(150) null,
    ds_descrição     text         null,
    dt_cadastro      datetime     null,
    tp_unidade_venda int(1)       null comment '1 - Unidade / 2 - Pacote / 3 - Cartela'
);

