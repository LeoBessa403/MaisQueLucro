INSERT INTO TB_HIST_SALDO_CB (dt_cadastro, co_usuario, nu_valor_pago, tp_fluxo, co_conta_bancaria, ds_observacao, nu_saldo) VALUES ("2024-06-25 14:26:24", "3", "0", "2", "8", "Exclusão de Lançamento, ", "43430.07");

DELETE FROM TB_FLUXO_CAIXA where co_fluxo_caixa = "419";

UPDATE TB_CATEGORIA_FC_FILHA SET ds_texto = "Receita de Vendas 22" where co_categoria_fc_filha = 16;

DELETE FROM TB_CATEGORIA_FC_NETA where co_categoria_fc_filha in (16);

DELETE FROM TB_CATEGORIA_FC_FILHA where co_categoria_fc_filha = "16";

INSERT INTO TB_HIST_SALDO_CB (dt_cadastro, co_usuario, co_conta_bancaria, nu_valor_pago, tp_fluxo, ds_observacao, nu_saldo) VALUES ("2024-06-26 11:03:47", "3", "7", "155.99", "1", "", "19939.49");

INSERT INTO TB_FLUXO_CAIXA (tp_pagamento, co_categoria_fc_neta, co_categoria_fc_filha, co_categoria_fc, dt_vencimento, dt_realizado, nu_valor, nu_valor_pago, co_conta_bancaria, co_representacao, co_centro_custo, ds_descricao, co_usuario, st_pagamento, tp_fluxo, dt_cadastro, co_assinante) VALUES ("2", "79", "32", "1", "", "2023-06-07", "", ""_pago, "7", "112", "3", "", "3", "3", "1", "2024-06-26 11:03:47", "2");

INSERT INTO TB_HIST_SALDO_CB (dt_cadastro, co_usuario, co_conta_bancaria, nu_valor_pago, tp_fluxo, ds_observacao, nu_saldo) VALUES ("2024-06-26 11:19:49", "3", "7", "2344.44", "1", "", "22283.93");

INSERT INTO TB_FLUXO_CAIXA (tp_pagamento, co_categoria_fc_neta, co_categoria_fc_filha, co_categoria_fc, dt_vencimento, dt_realizado, nu_valor, nu_valor_pago, co_conta_bancaria, co_representacao, co_centro_custo, ds_descricao, co_usuario, st_pagamento, tp_fluxo, dt_cadastro, co_assinante) VALUES ("2", "79", "32", "1", "", "2023-06-07", "", ""_pago, "7", "", "3", "", "3", "3", "1", "2024-06-26 11:19:49", "2");

INSERT INTO TB_HIST_SALDO_CB (dt_cadastro, co_usuario, nu_valor_pago, tp_fluxo, co_conta_bancaria, ds_observacao, nu_saldo) VALUES ("2024-06-26 11:28:18", "3", "799.36", "2", "9", "", "14379.02");

INSERT INTO TB_FLUXO_CAIXA (tp_pagamento, co_categoria_fc_neta, co_categoria_fc_filha, co_categoria_fc, dt_vencimento, dt_realizado, nu_valor, nu_valor_pago, co_conta_bancaria, co_representacao, co_centro_custo, ds_descricao, co_usuario, st_pagamento, tp_fluxo, dt_cadastro, co_assinante) VALUES ("2", "92", "22", "3", "", "2024-06-09", "", ""_pago, "9", "112", "", "", "3", "3", "2", "2024-06-26 11:28:18", "2");

