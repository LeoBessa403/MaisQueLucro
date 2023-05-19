create table TB_CONTA_BANCARIA
(
    co_conta_bancaria int auto_increment,
    dt_cadastro       datetime    null,
    no_banco          varchar(80) null,
    st_status         varchar(1)  null,
    nu_agencia        int(6)      null,
    nu_conta          varchar(45) null,
    co_assinante      int         not null,
    primary key (co_conta_bancaria, co_assinante)
);

INSERT INTO TB_CONTA_BANCARIA (co_conta_bancaria, dt_cadastro, no_banco, st_status, nu_agencia, nu_conta, co_assinante) VALUES (2, '2023-02-06 12:26:41', 'DINHEIRO (Arnaldo)', 'S', 1, '000002', 1);
INSERT INTO TB_CONTA_BANCARIA (co_conta_bancaria, dt_cadastro, no_banco, st_status, nu_agencia, nu_conta, co_assinante) VALUES (3, '2023-02-06 12:50:59', 'Pag Seguro', 'S', 1, '327994885', 1);
INSERT INTO TB_CONTA_BANCARIA (co_conta_bancaria, dt_cadastro, no_banco, st_status, nu_agencia, nu_conta, co_assinante) VALUES (4, '2023-02-10 10:35:00', 'DINHEIRO (Leo)', 'S', 1, '000002', 1);
INSERT INTO TB_CONTA_BANCARIA (co_conta_bancaria, dt_cadastro, no_banco, st_status, nu_agencia, nu_conta, co_assinante) VALUES (5, '2023-02-10 11:47:25', 'Pag Seguro Cartão de Crédito', 'S', 1, '3345455', 1);
INSERT INTO TB_CONTA_BANCARIA (co_conta_bancaria, dt_cadastro, no_banco, st_status, nu_agencia, nu_conta, co_assinante) VALUES (6, '2023-02-25 09:43:54', 'Marretada', 'S', 1, '000002', 1);