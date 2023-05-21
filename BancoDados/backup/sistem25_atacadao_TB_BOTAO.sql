create table TB_BOTAO
(
    co_botao         int auto_increment comment 'Tabela das informações dos botõs para ir para a págna de venda e dentro da página'
        primary key,
    no_botao         varchar(45)  null comment 'Texto do Botão',
    ds_botao         varchar(250) null comment 'Descrição do Botão (Posição/cor)',
    nu_total_cliques int(8)       null comment 'Número de cliques no botão',
    st_status        varchar(1)   null comment 'S - Sim / N - Não'
);

