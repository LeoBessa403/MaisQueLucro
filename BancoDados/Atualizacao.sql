INSERT INTO TB_CENTRO_CUSTO (no_centro_custos) VALUES ("");

INSERT INTO TB_CENTRO_CUSTO (no_centro_custos) VALUES ("");

INSERT INTO TB_CENTRO_CUSTO (no_centro_custos) VALUES ("Delivery");

INSERT INTO TB_CENTRO_CUSTO (no_centro_custos, co_assinante) VALUES ("Matriz", "2");

INSERT INTO TB_CATEGORIA_FC_NETA (ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("Imposto do Governo", "1.0.7", "1");

UPDATE TB_CATEGORIA_FC_FILHA SET ds_texto = "Custos com Fornecedores 2" where co_categoria_fc_filha = 18;

DELETE FROM TB_CATEGORIA_FC_FILHA where co_categoria_fc_filha = "30";

UPDATE TB_CATEGORIA_FC_FILHA SET ds_texto = "Custos Tributários ou Financeiros 2" where co_categoria_fc_filha = 17;

DELETE FROM TB_CATEGORIA_FC_NETA where co_categoria_fc_neta = "17";

DELETE FROM TB_CATEGORIA_FC_FILHA where co_categoria_fc_filha = "17";

DELETE FROM TB_CATEGORIA_FC_NETA where co_categoria_fc_filha in (18);

DELETE FROM TB_CATEGORIA_FC_FILHA where co_categoria_fc_filha = "18";

DELETE FROM TB_CATEGORIA_FC_NETA where co_categoria_fc_neta = "98";

UPDATE TB_CATEGORIA_FC_NETA SET ds_texto = "Almoço / Supermercado / Lanches 2" where co_categoria_fc_neta = 97;

UPDATE sol.TB_FUNCIONALIDADE SET no_funcionalidade = "ChatGPT", ds_action = "ChatGPT", st_menu = "N", co_controller = "13" where co_funcionalidade = 46;

DELETE FROM sol.TB_PERFIL_FUNCIONALIDADE where co_funcionalidade in (46);

UPDATE sol.TB_FUNCIONALIDADE SET no_funcionalidade = "Notificação PagSeguro", ds_action = "NotificacaoPagSeguro", st_menu = "S", co_controller = "12" where co_funcionalidade = 45;

DELETE FROM sol.TB_PERFIL_FUNCIONALIDADE where co_funcionalidade in (45);

UPDATE sol.TB_FUNCIONALIDADE SET no_funcionalidade = "Cadastro Assinante", ds_action = "CadastroAssinante", st_menu = "N", co_controller = "12" where co_funcionalidade = 41;

DELETE FROM sol.TB_PERFIL_FUNCIONALIDADE where co_funcionalidade in (41);

UPDATE sol.TB_FUNCIONALIDADE SET no_funcionalidade = "Gráfico", ds_action = "GraficoRelatorio", st_menu = "S", co_controller = "8" where co_funcionalidade = 30;

DELETE FROM sol.TB_PERFIL_FUNCIONALIDADE where co_funcionalidade in (30);

INSERT INTO sol.TB_CONTATO (ds_email, nu_tel1) VALUES ("leonardomcbessa@gmail.com", "61993055454");

INSERT INTO sol.TB_PESSOA (no_pessoa, co_contato, dt_cadastro) VALUES ("LEONARDO MACHADO CARVALHO BESSA", "4", "2024-06-21 09:57:52");

INSERT INTO sol.TB_EMPRESA (no_fantasia, dt_cadastro) VALUES ("LEONARDO MACHADO CARVALHO BESSA", "2024-06-21 09:57:52");

INSERT INTO TB_ASSINANTE (tp_assinante, co_pessoa, co_empresa, dt_cadastro, dt_expiracao) VALUES ("M", "4", "3", "2024-06-21 09:57:52", "2024-12-21");

INSERT INTO sol.TB_USUARIO (co_assinante, co_pessoa, ds_senha, ds_code, st_status, dt_cadastro) VALUES ("3", "4", "VPM0BRK6", "VmxCTk1FSlNTelk9", "A", "2024-06-21 09:57:52");

INSERT INTO TB_PLANO_ASSINANTE_ASSINATURA (co_plano_assinante, co_assinante, nu_filiais, nu_valor_assinatura, tp_pagamento, dt_cadastro, dt_expiracao, co_plano_assinante_assinatura_ativo, st_pagamento, dt_modificado, st_status) VALUES ("11", "3", "0", "127.97", "9", "2024-06-21 09:57:52", "2025-06-21", "11"_assinatura_ativo, "3", "2024-06-21 09:57:52", "A");

INSERT INTO TB_HISTORICO_PAG_ASSINATURA (co_plano_assinante_assinatura, dt_cadastro, ds_acao, ds_usuario, st_pagamento) VALUES ("12", "2024-06-21 09:57:52", "Cadastro no Sistema", "Leo Bessa Fez o Cadastro", "3");

INSERT INTO sol.TB_CONTATO (ds_email, nu_tel1) VALUES ("leonardomcbessa@gmail.com", "61993055454");

INSERT INTO sol.TB_PESSOA (no_pessoa, co_contato, dt_cadastro) VALUES ("LEONARDO MACHADO CARVALHO BESSA", "5", "2024-06-21 10:00:49");

INSERT INTO sol.TB_EMPRESA (no_fantasia, dt_cadastro) VALUES ("LEONARDO MACHADO CARVALHO BESSA", "2024-06-21 10:00:49");

INSERT INTO TB_ASSINANTE (tp_assinante, co_pessoa, co_empresa, dt_cadastro, dt_expiracao) VALUES ("M", "5", "4", "2024-06-21 10:00:49", "2024-12-21");

INSERT INTO sol.TB_USUARIO (co_assinante, co_pessoa, ds_senha, ds_code, st_status, dt_cadastro) VALUES ("4", "5", "WVP4KTG1", "VjFaUU5FdFVSekU9", "A", "2024-06-21 10:00:50");

INSERT INTO TB_PLANO_ASSINANTE_ASSINATURA (co_plano_assinante, co_assinante, nu_filiais, nu_valor_assinatura, tp_pagamento, dt_cadastro, dt_expiracao, co_plano_assinante_assinatura_ativo, st_pagamento, dt_modificado, st_status) VALUES ("11", "4", "0", "127.97", "9", "2024-06-21 10:00:50", "2025-06-21", "11"_assinatura_ativo, "3", "2024-06-21 10:00:50", "A");

INSERT INTO TB_HISTORICO_PAG_ASSINATURA (co_plano_assinante_assinatura, dt_cadastro, ds_acao, ds_usuario, st_pagamento) VALUES ("13", "2024-06-21 10:00:50", "Cadastro no Sistema", "Leo Bessa Fez o Cadastro", "3");

INSERT INTO sol.TB_CONTATO (ds_email, nu_tel1) VALUES ("leonardomcbessa@gmail.com", "61993055454");

INSERT INTO sol.TB_PESSOA (no_pessoa, co_contato, dt_cadastro) VALUES ("LEONARDO MACHADO CARVALHO BESSA", "6", "2024-06-21 10:01:54");

INSERT INTO sol.TB_EMPRESA (no_fantasia, dt_cadastro) VALUES ("LEONARDO MACHADO CARVALHO BESSA", "2024-06-21 10:01:54");

INSERT INTO TB_ASSINANTE (tp_assinante, co_pessoa, co_empresa, dt_cadastro, dt_expiracao) VALUES ("M", "6", "5", "2024-06-21 10:01:54", "2024-12-21");

INSERT INTO sol.TB_USUARIO (co_assinante, co_pessoa, ds_senha, ds_code, st_status, dt_cadastro) VALUES ("5", "6", "AVE8MSK7", "UVZaRk9FMVRTemM9", "A", "2024-06-21 10:01:54");

INSERT INTO TB_PLANO_ASSINANTE_ASSINATURA (co_plano_assinante, co_assinante, nu_filiais, nu_valor_assinatura, tp_pagamento, dt_cadastro, dt_expiracao, co_plano_assinante_assinatura_ativo, st_pagamento, dt_modificado, st_status) VALUES ("11", "5", "0", "127.97", "9", "2024-06-21 10:01:54", "2025-06-21", "11"_assinatura_ativo, "3", "2024-06-21 10:01:54", "A");

INSERT INTO TB_HISTORICO_PAG_ASSINATURA (co_plano_assinante_assinatura, dt_cadastro, ds_acao, ds_usuario, st_pagamento) VALUES ("14", "2024-06-21 10:01:54", "Cadastro no Sistema", "Leo Bessa Fez o Cadastro", "3");

INSERT INTO sol.TB_CONTATO (ds_email, nu_tel1) VALUES ("leonardomcbessa@gmail.com", "61993055454");

INSERT INTO sol.TB_PESSOA (no_pessoa, co_contato, dt_cadastro) VALUES ("LEONARDO MACHADO CARVALHO BESSA", "7", "2024-06-21 10:03:31");

INSERT INTO sol.TB_EMPRESA (no_fantasia, dt_cadastro) VALUES ("LEONARDO MACHADO CARVALHO BESSA", "2024-06-21 10:03:31");

INSERT INTO TB_ASSINANTE (tp_assinante, co_pessoa, co_empresa, dt_cadastro, dt_expiracao) VALUES ("M", "7", "6", "2024-06-21 10:03:31", "2024-12-21");

INSERT INTO sol.TB_USUARIO (co_assinante, co_pessoa, ds_senha, ds_code, st_status, dt_cadastro) VALUES ("6", "7", "VXZ6MQE3", "VmxoYU5rMVJSVE09", "A", "2024-06-21 10:03:31");

INSERT INTO TB_PLANO_ASSINANTE_ASSINATURA (co_plano_assinante, co_assinante, nu_filiais, nu_valor_assinatura, tp_pagamento, dt_cadastro, dt_expiracao, co_plano_assinante_assinatura_ativo, st_pagamento, dt_modificado, st_status) VALUES ("11", "6", "0", "127.97", "9", "2024-06-21 10:03:31", "2025-06-21", "11"_assinatura_ativo, "3", "2024-06-21 10:03:31", "A");

INSERT INTO TB_HISTORICO_PAG_ASSINATURA (co_plano_assinante_assinatura, dt_cadastro, ds_acao, ds_usuario, st_pagamento) VALUES ("15", "2024-06-21 10:03:31", "Cadastro no Sistema", "Leo Bessa Fez o Cadastro", "3");

INSERT INTO TB_CATEGORIA_FC_FILHA (ds_texto, nu_codigo, co_categoria_fc, co_assinante) VALUES ("Receita de Vendas", "1.0", "1", "6");

INSERT INTO sol.TB_CONTATO (ds_email, nu_tel1) VALUES ("leonardomcbessa@gmail.com", "61993055454");

INSERT INTO sol.TB_PESSOA (no_pessoa, co_contato, dt_cadastro) VALUES ("LEONARDO MACHADO CARVALHO BESSA", "8", "2024-06-21 10:05:07");

INSERT INTO sol.TB_EMPRESA (no_fantasia, dt_cadastro) VALUES ("LEONARDO MACHADO CARVALHO BESSA", "2024-06-21 10:05:07");

INSERT INTO TB_ASSINANTE (tp_assinante, co_pessoa, co_empresa, dt_cadastro, dt_expiracao) VALUES ("M", "8", "7", "2024-06-21 10:05:07", "2024-12-21");

INSERT INTO sol.TB_USUARIO (co_assinante, co_pessoa, ds_senha, ds_code, st_status, dt_cadastro) VALUES ("7", "8", "ZRU6GCF9", "V2xKVk5rZERSams9", "A", "2024-06-21 10:05:07");

INSERT INTO TB_PLANO_ASSINANTE_ASSINATURA (co_plano_assinante, co_assinante, nu_filiais, nu_valor_assinatura, tp_pagamento, dt_cadastro, dt_expiracao, co_plano_assinante_assinatura_ativo, st_pagamento, dt_modificado, st_status) VALUES ("11", "7", "0", "127.97", "9", "2024-06-21 10:05:07", "2025-06-21", "11"_assinatura_ativo, "3", "2024-06-21 10:05:07", "A");

INSERT INTO TB_HISTORICO_PAG_ASSINATURA (co_plano_assinante_assinatura, dt_cadastro, ds_acao, ds_usuario, st_pagamento) VALUES ("16", "2024-06-21 10:05:07", "Cadastro no Sistema", "Leo Bessa Fez o Cadastro", "3");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("7", "Receita de Vendas", "1.0", "1");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("7", "Custos Tributários ou Financeiros", "2.0", "2");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("7", "Custos com Fornecedores", "2.1", "2");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("7", "Custos com Entregas", "2.2", "2");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("7", "Custos com Embalagens", "2.3", "2");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("7", "Custo com Vendas", "2.4", "2");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("7", "Despesas Administrativas", "3.0", "3");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("7", "Despesas com Pessoal", "3.1", "3");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("7", "Despesas com Materiais e Equipamentos", "3.2", "3");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("7", "Investimentos em Marketing", "4.0", "4");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("7", "Investimentos em Bens Materiais", "4.1", "4");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("7", "Investimentos em Desenvolvimento Empresarial", "4.2", "4");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("7", "Entradas não Operacionais", "5.0", "5");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("7", "Saídas não Operacionais", "6.0", "6");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("7", "Viagem para Compra de Produtos", "2.5", "2");

INSERT INTO sol.TB_USUARIO_PERFIL (co_perfil, co_usuario) VALUES ("2", "8");

INSERT INTO sol.TB_CONTATO (ds_email, nu_tel1) VALUES ("leonardomcbessa@gmail.com", "6193274991");

INSERT INTO sol.TB_PESSOA (no_pessoa, co_contato, dt_cadastro) VALUES ("LEONARDO MACHADO CARVALHO BESSA", "9", "2024-06-21 10:58:14");

INSERT INTO sol.TB_EMPRESA (no_fantasia, dt_cadastro) VALUES ("LEONARDO MACHADO CARVALHO BESSA", "2024-06-21 10:58:14");

INSERT INTO TB_ASSINANTE (tp_assinante, co_pessoa, co_empresa, dt_cadastro, dt_expiracao) VALUES ("M", "9", "8", "2024-06-21 10:58:14", "2024-12-21");

INSERT INTO sol.TB_USUARIO (co_assinante, co_pessoa, ds_senha, ds_code, st_status, dt_cadastro) VALUES ("8", "9", "RDO0RNT6", "VWtSUE1GSk9WRFk9", "A", "2024-06-21 10:58:14");

INSERT INTO TB_PLANO_ASSINANTE_ASSINATURA (co_plano_assinante, co_assinante, nu_filiais, nu_valor_assinatura, tp_pagamento, dt_cadastro, dt_expiracao, co_plano_assinante_assinatura_ativo, st_pagamento, dt_modificado, st_status) VALUES ("11", "8", "0", "127.97", "9", "2024-06-21 10:58:14", "2025-06-21", "11"_assinatura_ativo, "3", "2024-06-21 10:58:14", "A");

INSERT INTO TB_HISTORICO_PAG_ASSINATURA (co_plano_assinante_assinatura, dt_cadastro, ds_acao, ds_usuario, st_pagamento) VALUES ("17", "2024-06-21 10:58:14", "Cadastro no Sistema", "Leo Bessa Fez o Cadastro", "3");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("8", "Receita de Vendas", "1.0", "1");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("8", "Custos Tributários ou Financeiros", "2.0", "2");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("8", "Custos com Fornecedores", "2.1", "2");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("8", "Custos com Entregas", "2.2", "2");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("8", "Custos com Embalagens", "2.3", "2");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("8", "Custo com Vendas", "2.4", "2");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("8", "Despesas Administrativas", "3.0", "3");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("8", "Despesas com Pessoal", "3.1", "3");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("8", "Despesas com Materiais e Equipamentos", "3.2", "3");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("8", "Investimentos em Marketing", "4.0", "4");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("8", "Investimentos em Bens Materiais", "4.1", "4");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("8", "Investimentos em Desenvolvimento Empresarial", "4.2", "4");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("8", "Entradas não Operacionais", "5.0", "5");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("8", "Saídas não Operacionais", "6.0", "6");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("8", "Viagem para Compra de Produtos", "2.5", "2");

INSERT INTO sol.TB_CONTATO (ds_email, nu_tel1) VALUES ("leonardomcbessa@gmail.com", "6193274991");

INSERT INTO sol.TB_PESSOA (no_pessoa, co_contato, dt_cadastro) VALUES ("LEONARDO MACHADO CARVALHO BESSA", "10", "2024-06-21 11:00:39");

INSERT INTO sol.TB_EMPRESA (no_fantasia, dt_cadastro) VALUES ("LEONARDO MACHADO CARVALHO BESSA", "2024-06-21 11:00:39");

INSERT INTO TB_ASSINANTE (tp_assinante, co_pessoa, co_empresa, dt_cadastro, dt_expiracao) VALUES ("M", "10", "9", "2024-06-21 11:00:39", "2024-12-21");

INSERT INTO sol.TB_USUARIO (co_assinante, co_pessoa, ds_senha, ds_code, st_status, dt_cadastro) VALUES ("9", "10", "KXX9LOS9", "UzFoWU9VeFBVems9", "A", "2024-06-21 11:00:40");

INSERT INTO TB_PLANO_ASSINANTE_ASSINATURA (co_plano_assinante, co_assinante, nu_filiais, nu_valor_assinatura, tp_pagamento, dt_cadastro, dt_expiracao, co_plano_assinante_assinatura_ativo, st_pagamento, dt_modificado, st_status) VALUES ("11", "9", "0", "127.97", "9", "2024-06-21 11:00:40", "2025-06-21", "11"_assinatura_ativo, "3", "2024-06-21 11:00:40", "A");

INSERT INTO TB_HISTORICO_PAG_ASSINATURA (co_plano_assinante_assinatura, dt_cadastro, ds_acao, ds_usuario, st_pagamento) VALUES ("18", "2024-06-21 11:00:40", "Cadastro no Sistema", "Leo Bessa Fez o Cadastro", "3");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("9", "Receita de Vendas", "1.0", "1");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("9", "Custos Tributários ou Financeiros", "2.0", "2");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("9", "Custos com Fornecedores", "2.1", "2");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("9", "Custos com Entregas", "2.2", "2");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("9", "Custos com Embalagens", "2.3", "2");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("9", "Custo com Vendas", "2.4", "2");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("9", "Despesas Administrativas", "3.0", "3");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("9", "Despesas com Pessoal", "3.1", "3");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("9", "Despesas com Materiais e Equipamentos", "3.2", "3");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("9", "Investimentos em Marketing", "4.0", "4");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("9", "Investimentos em Bens Materiais", "4.1", "4");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("9", "Investimentos em Desenvolvimento Empresarial", "4.2", "4");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("9", "Entradas não Operacionais", "5.0", "5");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("9", "Saídas não Operacionais", "6.0", "6");

INSERT INTO TB_CATEGORIA_FC_FILHA (co_assinante, ds_texto, nu_codigo, co_categoria_fc) VALUES ("9", "Viagem para Compra de Produtos", "2.5", "2");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Receitas em Dinheiro", "1.0.1", "62");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Receitas em Boleto", "1.0.2", "62");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Receitas em PIX", "1.0.3", "62");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Receitas em Cartão de Crédito", "1.0.4", "62");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Receitas em Cartão de Débito", "1.0.5", "62");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Outros Produtos/Serviços", "1.0.6", "62");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Simples Nacional", "2.0.1", "63");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Taxas de Cartões", "2.0.2", "63");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Taxas de Boleto", "2.0.3", "63");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Compras com Fornecedores", "2.1.1", "64");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Frete de Compras", "2.1.2", "64");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Outros custos com Fornecedor", "2.1.3", "64");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Combustível", "2.2.1", "65");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Estacionamento", "2.2.2", "65");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Alimentação", "2.2.3", "65");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Manuteção de Veículos", "2.2.4", "65");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Terceirização da entrega", "2.2.5", "65");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Outros custos com Entregas", "2.2.6", "65");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Embalagens", "2.3.1", "66");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Sacolas", "2.3.2", "66");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Caixas", "2.3.3", "66");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Outros custos com Embalagens", "2.3.4", "66");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Comissão Vendedor", "2.4.1", "67");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Telefone e Internet", "3.0.1", "68");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Energia Elétrica", "3.0.2", "68");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Água", "3.0.3", "68");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Aluguel e Condomínio", "3.0.4", "68");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "IPTU e Taxas Públicas", "3.0.5", "68");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Almoço / Supermercado / Lanches", "3.0.6", "68");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Contador", "3.0.7", "68");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Salário de Funcionários", "3.1.1", "69");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Bolsa de Estágio", "3.1.2", "69");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "VT e VR", "3.1.3", "69");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Rescisão", "3.1.4", "69");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "FGTS", "3.1.5", "69");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "INSS - Sindicato - IR", "3.1.6", "69");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "13º e Férias", "3.1.7", "69");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Exames ocupacionais", "3.1.8", "69");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Pro-Labores", "3.1.9", "69");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Plano de Saúde", "3.1.10", "69");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Confraternizações / Festas da Empresa", "3.1.11", "69");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Manutenção Máquinas e Equipamentos", "3.2.1", "70");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Serviços Técnicos em geral", "3.2.2", "70");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Materiais de Expediente/Escritório", "3.2.3", "70");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Materiais de Limpeza e Manutenção da Loja", "3.2.4", "70");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Papelaria Materiais impressos (folder, cartão visitas, etc.)", "4.0.1", "71");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Site / Sistema", "4.0.2", "71");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Mídias/ Propaganda", "4.0.3", "71");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Prestadores de serviços de marketing", "4.0.4", "71");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Compra de Equipamentos", "4.1.1", "72");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Reformas / Estrutura", "4.1.2", "72");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Mobiliário", "4.1.3", "72");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Consultoria", "4.2.1", "73");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Treinamentos", "4.2.2", "73");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Capitalização dos sócios", "5.0.1", "74");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Empréstimos obtidos", "5.0.2", "74");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Venda de equipamentos usados", "5.0.3", "74");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Pagamento de Empréstimos", "6.0.1", "75");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Juros Bancários e por Atraso", "6.0.2", "75");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Pagamento de dívidas passadas", "6.0.3", "75");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Distribuição de Lucros ", "6.0.4", "75");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Juros de Antecipação de Recebíveis", "6.0.5", "75");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Estorno de Capital", "6.0.6", "75");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Passagem", "2.5.1", "76");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Viagem Uber / Taxi", "2.5.2", "76");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Hospedagem", "2.5.3", "76");

INSERT INTO TB_CATEGORIA_FC_NETA (co_assinante, ds_texto, nu_codigo, co_categoria_fc_filha) VALUES ("9", "Viagem Alimentação", "2.5.4", "76");

INSERT INTO sol.TB_USUARIO_PERFIL (co_perfil, co_usuario) VALUES ("2", "10");

