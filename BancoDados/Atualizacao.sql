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

