create table TB_ASSINANTE
(
    co_assinante            int auto_increment,
    dt_cadastro             datetime               null,
    dt_expiracao            date                   null comment 'Data da expiração de utilização do sistema',
    st_dados_complementares varchar(1) default 'N' null comment 'S - Sim / N - Não',
    st_status               varchar(1) default 'A' null comment 'A - Ativo / I - inativo',
    tp_assinante            varchar(1) default 'M' null comment 'M  - Matriz / F - Filial',
    co_empresa              int                    not null,
    co_pessoa               int                    not null comment 'Responsável pelo Assinante',
    primary key (co_assinante, co_empresa, co_pessoa)
);

INSERT INTO TB_ASSINANTE (co_assinante, dt_cadastro, dt_expiracao, st_dados_complementares, st_status, tp_assinante, co_empresa, co_pessoa) VALUES (1, '2023-02-06 12:02:29', '2033-10-13', 'N', 'A', 'M', 1, 2);
INSERT INTO TB_ASSINANTE (co_assinante, dt_cadastro, dt_expiracao, st_dados_complementares, st_status, tp_assinante, co_empresa, co_pessoa) VALUES (2, '2023-04-26 10:52:06', '2033-10-13', 'S', 'A', 'M', 2, 3);