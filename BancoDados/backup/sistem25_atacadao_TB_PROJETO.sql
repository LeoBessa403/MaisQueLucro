create table TB_PROJETO
(
    co_projeto  int auto_increment
        primary key,
    no_projeto  varchar(80) null,
    dt_cadastro datetime    null
);

INSERT INTO TB_PROJETO (co_projeto, no_projeto, dt_cadastro) VALUES (1, 'Atacadão Bessa', '2023-05-19 10:05:57');