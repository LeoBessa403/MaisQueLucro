create table TB_CATEGORIA_FC
(
    co_categoria_fc int auto_increment,
    ds_texto        varchar(150) null,
    nu_codigo       varchar(6)   null,
    co_assinante    int          not null,
    primary key (co_categoria_fc, co_assinante)
);

INSERT INTO TB_CATEGORIA_FC (co_categoria_fc, ds_texto, nu_codigo, co_assinante) VALUES (1, 'RECEITA / FATURAMENTO', '1', 0);
INSERT INTO TB_CATEGORIA_FC (co_categoria_fc, ds_texto, nu_codigo, co_assinante) VALUES (2, 'DESPESAS DIRETAS (cv)', '2', 0);
INSERT INTO TB_CATEGORIA_FC (co_categoria_fc, ds_texto, nu_codigo, co_assinante) VALUES (3, 'DESPESAS INDIRETAS (cf)', '3', 0);
INSERT INTO TB_CATEGORIA_FC (co_categoria_fc, ds_texto, nu_codigo, co_assinante) VALUES (4, 'INVESTIMENTOS', '4', 0);
INSERT INTO TB_CATEGORIA_FC (co_categoria_fc, ds_texto, nu_codigo, co_assinante) VALUES (5, 'ENTRADAS NÃO OPERACIONAIS', '5', 0);
INSERT INTO TB_CATEGORIA_FC (co_categoria_fc, ds_texto, nu_codigo, co_assinante) VALUES (6, 'SAÍDAS NÃO OPERACIONAIS', '6', 0);