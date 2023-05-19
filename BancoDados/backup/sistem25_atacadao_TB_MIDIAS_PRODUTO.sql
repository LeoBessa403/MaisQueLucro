create table TB_MIDIAS_PRODUTO
(
    co_midias_produto int auto_increment,
    co_imagem         int(10)  not null,
    co_produto        int(12)  not null,
    dt_cadastro       datetime null,
    tp_midia          int(1)   null comment '1 - Imagem / 2 - Vídeo',
    primary key (co_midias_produto, co_imagem, co_produto)
);

