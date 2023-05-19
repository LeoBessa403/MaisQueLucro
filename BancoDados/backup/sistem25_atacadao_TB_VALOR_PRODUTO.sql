create table TB_VALOR_PRODUTO
(
    co_valor_produto int auto_increment,
    dt_cadastro      datetime     null,
    nu_valor         float(12, 2) null,
    co_negociacao    int          not null,
    co_produto       int(12)      not null,
    primary key (co_valor_produto, co_negociacao, co_produto)
);

