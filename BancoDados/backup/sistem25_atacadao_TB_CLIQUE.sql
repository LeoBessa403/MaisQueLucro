create table TB_CLIQUE
(
    co_clique   int auto_increment,
    dt_cadastro datetime null,
    co_botao    int      not null,
    primary key (co_clique, co_botao)
);

