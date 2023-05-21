create table TB_ESTOQUE
(
    co_estoque    int auto_increment,
    dt_cadastro   datetime null,
    nu_estoque    int(10)  null,
    co_produto    int      not null,
    co_negociacao int      not null,
    primary key (co_estoque, co_produto, co_negociacao)
);

