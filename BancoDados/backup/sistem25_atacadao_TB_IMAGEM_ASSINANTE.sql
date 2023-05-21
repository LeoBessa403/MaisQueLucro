create table TB_IMAGEM_ASSINANTE
(
    co_imagem_assinante int(10) auto_increment,
    co_assinante        int          not null,
    co_imagem           int unsigned not null,
    primary key (co_imagem_assinante, co_assinante, co_imagem)
);

INSERT INTO TB_IMAGEM_ASSINANTE (co_imagem_assinante, co_assinante, co_imagem) VALUES (1, 2, 4);