create table TB_NEGOCIACAO
(
    co_negociacao int auto_increment,
    dt_cadastro   datetime     null,
    tp_negociacao int(1)       null comment '1 - Compra / 2 - Venda / 3 - Cotação',
    nu_valor      float(12, 2) null,
    tp_modelo     int(1)       null comment 'Modelo do Tipo da Negociação ///  1 - Compra Pessoal / 2 - Compra online / 3 - Compra Vendedor / 4 - Venda loja Física / 5 - Venda Vendedor / 6 - Venda online / 7 - Venda TeleVenda',
    co_produto    int(12)      not null,
    co_empresa    int          not null,
    primary key (co_negociacao, co_produto, co_empresa)
);

