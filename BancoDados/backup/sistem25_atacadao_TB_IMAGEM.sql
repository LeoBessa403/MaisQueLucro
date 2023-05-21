create table TB_IMAGEM
(
    co_imagem  int unsigned auto_increment
        primary key,
    ds_caminho varchar(150) charset latin1 not null
);

INSERT INTO TB_IMAGEM (co_imagem, ds_caminho) VALUES (1, 'leonardo-m-c-bessa-56e8920c23ab66.jpg');
INSERT INTO TB_IMAGEM (co_imagem, ds_caminho) VALUES (2, 'leonardo-m-c-bessa-56e8920c23ab66.jpg');
INSERT INTO TB_IMAGEM (co_imagem, ds_caminho) VALUES (3, '');
INSERT INTO TB_IMAGEM (co_imagem, ds_caminho) VALUES (4, 'fp-loja-san-giuseppe-artigos-religiosos-2-6449721eb8b77.jpeg');