create table TB_CATEGORIA_FC_FILHA
(
    co_categoria_fc_filha int auto_increment,
    ds_texto              varchar(150) null,
    nu_codigo             varchar(6)   null,
    co_categoria_fc       int          not null,
    co_assinante          int          not null,
    primary key (co_categoria_fc_filha, co_categoria_fc, co_assinante)
);

INSERT INTO TB_CATEGORIA_FC_FILHA (co_categoria_fc_filha, ds_texto, nu_codigo, co_categoria_fc, co_assinante) VALUES (1, 'Receita de Vendas', '1.0', 1, 1);
INSERT INTO TB_CATEGORIA_FC_FILHA (co_categoria_fc_filha, ds_texto, nu_codigo, co_categoria_fc, co_assinante) VALUES (2, 'Custos Tributários ou Financeiros', '2.0', 2, 1);
INSERT INTO TB_CATEGORIA_FC_FILHA (co_categoria_fc_filha, ds_texto, nu_codigo, co_categoria_fc, co_assinante) VALUES (3, 'Custos com Fornecedores', '2.1', 2, 1);
INSERT INTO TB_CATEGORIA_FC_FILHA (co_categoria_fc_filha, ds_texto, nu_codigo, co_categoria_fc, co_assinante) VALUES (4, 'Custos com Entregas', '2.2', 2, 1);
INSERT INTO TB_CATEGORIA_FC_FILHA (co_categoria_fc_filha, ds_texto, nu_codigo, co_categoria_fc, co_assinante) VALUES (5, 'Custos com Embalagens', '2.3', 2, 1);
INSERT INTO TB_CATEGORIA_FC_FILHA (co_categoria_fc_filha, ds_texto, nu_codigo, co_categoria_fc, co_assinante) VALUES (6, 'Custo com Vendas', '2.4', 2, 1);
INSERT INTO TB_CATEGORIA_FC_FILHA (co_categoria_fc_filha, ds_texto, nu_codigo, co_categoria_fc, co_assinante) VALUES (7, 'Despesas Administrativas', '3.0', 3, 1);
INSERT INTO TB_CATEGORIA_FC_FILHA (co_categoria_fc_filha, ds_texto, nu_codigo, co_categoria_fc, co_assinante) VALUES (8, 'Despesas com Pessoal', '3.1', 3, 1);
INSERT INTO TB_CATEGORIA_FC_FILHA (co_categoria_fc_filha, ds_texto, nu_codigo, co_categoria_fc, co_assinante) VALUES (9, 'Despesas com Materiais e Equipamentos', '3.2', 3, 1);
INSERT INTO TB_CATEGORIA_FC_FILHA (co_categoria_fc_filha, ds_texto, nu_codigo, co_categoria_fc, co_assinante) VALUES (10, 'Investimentos em Marketing', '4.0', 4, 1);
INSERT INTO TB_CATEGORIA_FC_FILHA (co_categoria_fc_filha, ds_texto, nu_codigo, co_categoria_fc, co_assinante) VALUES (11, 'Investimentos em Bens Materiais', '4.1', 4, 1);
INSERT INTO TB_CATEGORIA_FC_FILHA (co_categoria_fc_filha, ds_texto, nu_codigo, co_categoria_fc, co_assinante) VALUES (12, 'Investimentos em Desenvolvimento Empresarial', '4.2', 4, 1);
INSERT INTO TB_CATEGORIA_FC_FILHA (co_categoria_fc_filha, ds_texto, nu_codigo, co_categoria_fc, co_assinante) VALUES (13, 'Entradas não Operacionais', '5.0', 5, 1);
INSERT INTO TB_CATEGORIA_FC_FILHA (co_categoria_fc_filha, ds_texto, nu_codigo, co_categoria_fc, co_assinante) VALUES (14, 'Saídas não Operacionais', '6.0', 6, 1);
INSERT INTO TB_CATEGORIA_FC_FILHA (co_categoria_fc_filha, ds_texto, nu_codigo, co_categoria_fc, co_assinante) VALUES (15, 'Viagem para Compra de Produtos', '2.5', 2, 1);