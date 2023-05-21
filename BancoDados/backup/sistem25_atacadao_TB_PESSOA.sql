create table TB_PESSOA
(
    co_pessoa     int auto_increment,
    nu_cpf        varchar(15)  null,
    no_pessoa     varchar(100) null,
    nu_rg         varchar(45)  null,
    dt_cadastro   datetime     null,
    dt_nascimento date         null,
    st_sexo       varchar(1)   null comment 'M - Masculino ou F - Feminino',
    co_endereco   int          not null,
    co_contato    int          not null,
    co_imagem     int(10)      not null,
    primary key (co_pessoa, co_endereco, co_contato, co_imagem)
);

INSERT INTO TB_PESSOA (co_pessoa, nu_cpf, no_pessoa, nu_rg, dt_cadastro, dt_nascimento, st_sexo, co_endereco, co_contato, co_imagem) VALUES (1, '', 'Leo Bessa', '', '2016-10-31 00:00:00', null, 'M', 1, 1, 1);
INSERT INTO TB_PESSOA (co_pessoa, nu_cpf, no_pessoa, nu_rg, dt_cadastro, dt_nascimento, st_sexo, co_endereco, co_contato, co_imagem) VALUES (2, '', 'Usuário Atacadão', '', '2016-10-31 00:00:00', null, 'M', 2, 2, 2);
INSERT INTO TB_PESSOA (co_pessoa, nu_cpf, no_pessoa, nu_rg, dt_cadastro, dt_nascimento, st_sexo, co_endereco, co_contato, co_imagem) VALUES (3, null, 'AMAURY RAMOS', null, '2023-04-26 10:54:17', null, 'M', 3, 3, 3);