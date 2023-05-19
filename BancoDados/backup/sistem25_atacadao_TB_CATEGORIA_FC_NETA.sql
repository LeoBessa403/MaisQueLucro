create table TB_CATEGORIA_FC_NETA
(
    co_categoria_fc_neta  int auto_increment,
    ds_texto              varchar(150) null,
    nu_codigo             varchar(6)   null,
    co_categoria_fc_filha int          not null,
    co_assinante          int          not null,
    primary key (co_categoria_fc_neta, co_categoria_fc_filha, co_assinante)
);

INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (1, 'Receitas em Dinheiro', '1.0.1', 1, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (2, 'Receitas em Boleto', '1.0.2', 1, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (3, 'Receitas em PIX', '1.0.3', 1, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (4, 'Receitas em Cartão de Crédito', '1.0.4', 1, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (5, 'Receitas em Cartão de Débito', '1.0.5', 1, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (6, 'Outros Produtos/Serviços', '1.0.6', 1, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (7, 'Simples Nacional', '2.0.1', 2, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (8, 'Taxas de Cartões', '2.0.2', 2, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (9, 'Taxas de Boleto', '2.0.3', 2, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (10, 'Compras com Fornecedores', '2.1.1', 3, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (11, 'Frete de Compras', '2.1.2', 3, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (12, 'Outros custos com Fornecedor', '2.1.3', 3, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (13, 'Combustível', '2.2.1', 4, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (14, 'Estacionamento', '2.2.2', 4, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (15, 'Alimentação', '2.2.3', 4, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (16, 'Manuteção de Veículos', '2.2.4', 4, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (17, 'Terceirização da entrega', '2.2.5', 4, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (18, 'Outros custos com Entregas', '2.2.6', 4, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (19, 'Embalagens', '2.3.1', 5, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (20, 'Sacolas', '2.3.2', 5, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (21, 'Caixas', '2.3.3', 5, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (22, 'Outros custos com Embalagens', '2.3.4', 5, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (23, 'Comissão Vendedor', '2.4.1', 6, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (24, 'Telefone e Internet', '3.0.1', 7, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (25, 'Energia Elétrica', '3.0.2', 7, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (26, 'Água', '3.0.3', 7, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (27, 'Aluguel e Condomínio', '3.0.4', 7, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (28, 'IPTU e Taxas Públicas', '3.0.5', 7, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (29, 'Almoço / Supermercado / Lanches', '3.0.6', 7, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (30, 'Contador', '3.0.7', 7, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (31, 'Salário de Funcionários', '3.1.1', 8, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (32, 'Bolsa de Estágio', '3.1.2', 8, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (33, 'VT e VR', '3.1.3', 8, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (34, 'Rescisão', '3.1.4', 8, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (35, 'FGTS', '3.1.5', 8, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (36, 'INSS - Sindicato - IR', '3.1.6', 8, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (37, '13º e Férias', '3.1.7', 8, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (38, 'Exames ocupacionais', '3.1.8', 8, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (39, 'Pro-Labores', '3.1.9', 8, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (40, 'Plano de Saúde', '3.1.10', 8, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (41, 'Confraternizações / Festas da Empresa', '3.1.11', 8, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (42, 'Manutenção Máquinas e Equipamentos', '3.2.1', 9, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (43, 'Serviços Técnicos em geral', '3.2.2', 9, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (44, 'Materiais de Expediente/Escritório', '3.2.3', 9, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (45, 'Materiais de Limpeza e Manutenção da Loja', '3.2.4', 9, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (46, 'Papelaria Materiais impressos (folder, cartão visitas, etc.)', '4.0.1', 10, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (47, 'Site / Sistema', '4.0.2', 10, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (48, 'Mídias/ Propaganda', '4.0.3', 10, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (49, 'Prestadores de serviços de marketing', '4.0.4', 10, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (50, 'Compra de Equipamentos', '4.1.1', 11, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (51, 'Reformas / Estrutura', '4.1.2', 11, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (52, 'Mobiliário', '4.1.3', 11, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (53, 'Consultoria', '4.2.1', 12, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (54, 'Treinamentos', '4.2.2', 12, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (55, 'Capitalização dos sócios', '5.0.1', 13, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (56, 'Empréstimos obtidos', '5.0.2', 13, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (57, 'Venda de equipamentos usados', '5.0.3', 13, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (58, 'Pagamento de Empréstimos', '6.0.1', 14, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (59, 'Juros Bancários e por Atraso', '6.0.2', 14, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (60, 'Pagamento de dívidas passadas', '6.0.3', 14, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (61, 'Distribuição de Lucros ', '6.0.4', 14, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (62, 'Juros de Antecipação de Recebíveis', '6.0.5', 14, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (63, 'Passagem', '2.5.1', 15, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (64, 'Viagem Uber / Taxi', '2.5.2', 15, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (65, 'Hospedagem', '2.5.3', 15, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (66, 'Viagem Alimentação', '2.5.4', 15, 1);
INSERT INTO TB_CATEGORIA_FC_NETA (co_categoria_fc_neta, ds_texto, nu_codigo, co_categoria_fc_filha, co_assinante) VALUES (67, 'Estorno de Capital', '6.0.6', 14, 0);