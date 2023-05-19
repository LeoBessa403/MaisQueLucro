create table TB_EMPRESA
(
    co_empresa       int auto_increment,
    no_empresa       varchar(250) null comment 'Razão Social',
    no_fantasia      varchar(150) null,
    dt_cadastro      datetime     null,
    nu_cnpj          varchar(20)  null,
    nu_insc_estadual varchar(20)  null,
    ds_observacao    text         null,
    tp_empresa       int(1)       null comment '1 - Fornecedor / 2 - Cliente',
    st_status        varchar(1)   null,
    co_pessoa        int          not null comment 'Pessoa responsável pela empresa',
    co_endereco      int          not null,
    co_contato       int          not null,
    co_imagem        int          not null,
    primary key (co_empresa, co_pessoa, co_endereco, co_contato, co_imagem)
);

INSERT INTO TB_EMPRESA (co_empresa, no_empresa, no_fantasia, dt_cadastro, nu_cnpj, nu_insc_estadual, ds_observacao, tp_empresa, st_status, co_pessoa, co_endereco, co_contato, co_imagem) VALUES (1, 'Atacadão Bessa', 'Atacadão Bessa', '2022-05-31 14:23:16', '44777359000145', null, null, null, '0', 2, 2, 2, 2);
INSERT INTO TB_EMPRESA (co_empresa, no_empresa, no_fantasia, dt_cadastro, nu_cnpj, nu_insc_estadual, ds_observacao, tp_empresa, st_status, co_pessoa, co_endereco, co_contato, co_imagem) VALUES (2, 'SAN GIUSEPPE ARTIGOS RELIGIOSOS E PRESENTES', 'LOJA SAN GIUSEPPE ARTIGOS RELIGIOSOS', '2023-04-26 10:53:14', null, null, null, null, '0', 3, 3, 3, 3);