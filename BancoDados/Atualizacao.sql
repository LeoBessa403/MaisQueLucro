INSERT INTO TB_HIST_SALDO_CB (dt_cadastro, co_usuario, co_conta_bancaria, nu_valor_pago, tp_fluxo, ds_observacao, nu_saldo) VALUES ("2023-07-26 06:58:27", "3", "8", "2145.69", "1", "", "56441.86");

INSERT INTO TB_FLUXO_CAIXA (tp_pagamento, co_categoria_fc_neta, co_categoria_fc_filha, co_categoria_fc, dt_vencimento, dt_realizado, nu_valor, nu_valor_pago, co_conta_bancaria, co_representacao, co_centro_custo, ds_descricao, co_usuario, st_pagamento, tp_fluxo, dt_cadastro, co_assinante) VALUES ("1", "3", "1", "1", "", "2023-06-20", "", ""_pago, "8", "112", "", "", "3", "3", "1", "2023-07-26 06:58:28", "2");

INSERT INTO TB_HIST_SALDO_CB (dt_cadastro, co_usuario, co_conta_bancaria, nu_valor_pago, tp_fluxo, ds_observacao, nu_saldo) VALUES ("2023-07-27 14:40:31", "2", "3", "333.00", "1", "", "351");

UPDATE TB_FLUXO_CAIXA SET tp_pagamento = "4", co_categoria_fc_neta = "3", co_categoria_fc_filha = "1", co_categoria_fc = "1", dt_vencimento = "2023-07-25", dt_realizado = "2023-07-25", nu_valor = "333.00", nu_valor_pago = "333.00"_pago, co_conta_bancaria = "3", co_representacao = "111", co_centro_custo = "", ds_descricao = "", co_usuario = "2", st_pagamento = "3" where co_fluxo_caixa = 260;

UPDATE TB_FLUXO_CAIXA SET tp_pagamento = "1", co_categoria_fc_neta = "1", co_categoria_fc_filha = "1", co_categoria_fc = "1", dt_vencimento = "2023-07-14", dt_realizado = "", nu_valor = "90.00", nu_valor_pago = "90.00"_pago, co_conta_bancaria = "2", co_representacao = "108", co_centro_custo = "", ds_descricao = "", co_usuario = "2", st_pagamento = "4" where co_fluxo_caixa = 255;

INSERT INTO TB_HIST_SALDO_CB (dt_cadastro, co_usuario, nu_valor_pago, tp_fluxo, co_conta_bancaria, ds_observacao, nu_saldo) VALUES ("2023-07-27 14:43:29", "2", "355.00", "2", "3", "Baixa no Pagamento", "-4");

UPDATE TB_FLUXO_CAIXA SET dt_realizado = "2023-07-24", nu_valor_pago = "355.00", co_usuario = "2", st_pagamento = "3" where co_fluxo_caixa = 214;

INSERT INTO TB_HIST_SALDO_CB (dt_cadastro, co_usuario, co_conta_bancaria, nu_valor_pago, tp_fluxo, ds_observacao, nu_saldo) VALUES ("2023-07-27 14:44:36", "2", "2", "100.00", "1", "", "-394.08");

INSERT INTO TB_FLUXO_CAIXA (tp_pagamento, co_categoria_fc_neta, co_categoria_fc_filha, co_categoria_fc, dt_vencimento, dt_realizado, nu_valor, nu_valor_pago, co_conta_bancaria, co_representacao, co_centro_custo, ds_descricao, co_usuario, st_pagamento, tp_fluxo, dt_cadastro, co_assinante) VALUES ("1", "1", "1", "1", "", "2023-07-21", "", ""_pago, "2", "108", "", "", "2", "3", "1", "2023-07-27 14:44:36", "1");

INSERT INTO TB_HIST_SALDO_CB (dt_cadastro, co_usuario, co_conta_bancaria, nu_valor_pago, tp_fluxo, ds_observacao, nu_saldo) VALUES ("2023-07-27 14:46:02", "2", "3", "100.00", "1", "", "96");

INSERT INTO TB_FLUXO_CAIXA (tp_pagamento, co_categoria_fc_neta, co_categoria_fc_filha, co_categoria_fc, dt_vencimento, dt_realizado, nu_valor, nu_valor_pago, co_conta_bancaria, co_representacao, co_centro_custo, ds_descricao, co_usuario, st_pagamento, tp_fluxo, dt_cadastro, co_assinante) VALUES ("4", "3", "1", "1", "", "2023-07-27", "", ""_pago, "3", "84", "", "", "2", "3", "1", "2023-07-27 14:46:02", "1");

UPDATE TB_FLUXO_CAIXA SET tp_pagamento = "1", co_categoria_fc_neta = "3", co_categoria_fc_filha = "1", co_categoria_fc = "1", dt_vencimento = "2023-06-22", dt_realizado = "", nu_valor = "100.00", nu_valor_pago = "100.00"_pago, co_conta_bancaria = "3", co_representacao = "84", co_centro_custo = "", ds_descricao = "", co_usuario = "2", st_pagamento = "4" where co_fluxo_caixa = 186;

INSERT INTO TB_HIST_SALDO_CB (dt_cadastro, co_usuario, co_conta_bancaria, nu_valor_pago, tp_fluxo, ds_observacao, nu_saldo) VALUES ("2023-07-27 21:32:14", "2", "3", "60.00", "1", "", "156");

UPDATE TB_FLUXO_CAIXA SET tp_pagamento = "1", co_categoria_fc_neta = "3", co_categoria_fc_filha = "1", co_categoria_fc = "1", dt_vencimento = "2023-04-26", dt_realizado = "2023-07-27", nu_valor = "60.00", nu_valor_pago = "60.00"_pago, co_conta_bancaria = "3", co_representacao = "38", co_centro_custo = "", ds_descricao = "", co_usuario = "2", st_pagamento = "3" where co_fluxo_caixa = 137;

INSERT INTO TB_HIST_SALDO_CB (dt_cadastro, co_usuario, co_conta_bancaria, nu_valor_pago, tp_fluxo, ds_observacao, nu_saldo) VALUES ("2023-07-27 21:33:42", "2", "3", "268.00", "1", "", "424");

UPDATE TB_FLUXO_CAIXA SET tp_pagamento = "4", co_categoria_fc_neta = "3", co_categoria_fc_filha = "1", co_categoria_fc = "1", dt_vencimento = "2023-07-22", dt_realizado = "2023-07-27", nu_valor = "268.00", nu_valor_pago = "268.00"_pago, co_conta_bancaria = "3", co_representacao = "110", co_centro_custo = "", ds_descricao = "", co_usuario = "2", st_pagamento = "3" where co_fluxo_caixa = 258;

INSERT INTO TB_REPRESENTACAO (no_representacao, ds_email, nu_tel1, co_assinante) VALUES ("Dona Zélia armarinho LTG", "", "", "1");

INSERT INTO TB_FLUXO_CAIXA (tp_pagamento, co_categoria_fc_neta, co_categoria_fc_filha, co_categoria_fc, dt_vencimento, dt_realizado, nu_valor, nu_valor_pago, co_conta_bancaria, co_representacao, co_centro_custo, ds_descricao, co_usuario, st_pagamento, tp_fluxo, dt_cadastro, co_assinante) VALUES ("3", "4", "1", "1", "2023-08-01", "", "279.30", "279.30"_pago, "3", "118", "", "", "2", "2", "1", "2023-07-27 21:37:30", "1");

INSERT INTO TB_REPRESENTACAO (no_representacao, ds_email, nu_tel1, co_assinante) VALUES ("Benedito Recanto", "", "", "1");

INSERT INTO TB_HIST_SALDO_CB (dt_cadastro, co_usuario, co_conta_bancaria, nu_valor_pago, tp_fluxo, ds_observacao, nu_saldo) VALUES ("2023-07-27 21:39:42", "2", "2", "115.00", "1", "", "-279.08");

INSERT INTO TB_FLUXO_CAIXA (tp_pagamento, co_categoria_fc_neta, co_categoria_fc_filha, co_categoria_fc, dt_vencimento, dt_realizado, nu_valor, nu_valor_pago, co_conta_bancaria, co_representacao, co_centro_custo, ds_descricao, co_usuario, st_pagamento, tp_fluxo, dt_cadastro, co_assinante) VALUES ("1", "1", "1", "1", "", "2023-07-19", "", ""_pago, "2", "119", "", "", "2", "3", "1", "2023-07-27 21:39:42", "1");

INSERT INTO TB_HIST_SALDO_CB (dt_cadastro, co_usuario, co_conta_bancaria, nu_valor_pago, tp_fluxo, ds_observacao, nu_saldo) VALUES ("2023-07-27 21:45:26", "2", "2", "200.00", "1", "", "-79.08");

INSERT INTO TB_FLUXO_CAIXA (tp_pagamento, co_categoria_fc_neta, co_categoria_fc_filha, co_categoria_fc, dt_vencimento, dt_realizado, nu_valor, nu_valor_pago, co_conta_bancaria, co_representacao, co_centro_custo, ds_descricao, co_usuario, st_pagamento, tp_fluxo, dt_cadastro, co_assinante) VALUES ("1", "1", "1", "1", "", "2023-07-18", "", ""_pago, "2", "86", "", "", "2", "3", "1", "2023-07-27 21:45:26", "1");

INSERT INTO TB_FLUXO_CAIXA (tp_pagamento, co_categoria_fc_neta, co_categoria_fc_filha, co_categoria_fc, dt_vencimento, dt_realizado, nu_valor, nu_valor_pago, co_conta_bancaria, co_representacao, co_centro_custo, ds_descricao, co_usuario, st_pagamento, tp_fluxo, dt_cadastro, co_assinante) VALUES ("1", "1", "1", "1", "2023-07-23", "", "200.00", "200.00"_pago, "2", "86", "", "", "2", "2", "1", "2023-07-27 21:45:26", "1");

UPDATE TB_FLUXO_CAIXA SET tp_pagamento = "4", co_categoria_fc_neta = "3", co_categoria_fc_filha = "1", co_categoria_fc = "1", dt_vencimento = "2023-07-21", dt_realizado = "", nu_valor = "202.00", nu_valor_pago = "202.00"_pago, co_conta_bancaria = "3", co_representacao = "86", co_centro_custo = "", ds_descricao = "", co_usuario = "2", st_pagamento = "4" where co_fluxo_caixa = 335;

INSERT INTO TB_FLUXO_CAIXA (tp_pagamento, co_categoria_fc_neta, co_categoria_fc_filha, co_categoria_fc, dt_vencimento, dt_realizado, nu_valor, nu_valor_pago, co_conta_bancaria, co_representacao, co_centro_custo, ds_descricao, co_usuario, st_pagamento, tp_fluxo, dt_cadastro, co_assinante) VALUES ("1", "3", "1", "1", "2023-07-24", "", "110.00", "110.00"_pago, "2", "105", "", "", "2", "4", "1", "2023-07-27 21:49:07", "1");

INSERT INTO TB_HIST_SALDO_CB (dt_cadastro, co_usuario, co_conta_bancaria, nu_valor_pago, tp_fluxo, ds_observacao, nu_saldo) VALUES ("2023-07-27 21:56:23", "2", "2", "274.00", "1", "", "194.92");

INSERT INTO TB_FLUXO_CAIXA (tp_pagamento, co_categoria_fc_neta, co_categoria_fc_filha, co_categoria_fc, dt_vencimento, dt_realizado, nu_valor, nu_valor_pago, co_conta_bancaria, co_representacao, co_centro_custo, ds_descricao, co_usuario, st_pagamento, tp_fluxo, dt_cadastro, co_assinante) VALUES ("1", "1", "1", "1", "", "2023-07-14", "", ""_pago, "2", "", "", "", "2", "3", "1", "2023-07-27 21:56:23", "1");

INSERT INTO TB_HIST_SALDO_CB (dt_cadastro, co_usuario, nu_valor_pago, tp_fluxo, co_conta_bancaria, ds_observacao, nu_saldo) VALUES ("2023-07-27 21:58:10", "2", "610.00", "2", "3", "Transferência entre contas.", "-186");

INSERT INTO TB_HIST_SALDO_CB (dt_cadastro, co_usuario, nu_valor_pago, tp_fluxo, co_conta_bancaria, ds_observacao, nu_saldo) VALUES ("2023-07-27 21:58:10", "2", "610.00", "1", "2", "transferência entre contas.", "804.92");

INSERT INTO TB_HIST_TRANSFERENCIA (co_conta_bancaria_origem, dt_realizado, co_conta_bancaria_destino, nu_valor_transferido, dt_cadastro, co_usuario, co_assinante, nu_saldo_origem_ant, nu_saldo_origem_dep, nu_saldo_destino_ant, nu_saldo_destino_dep) VALUES ("3", "2023-07-13 21:58:10", "2", "610.00", "2023-07-27 21:58:10", "2", "1", "424.00", "-186", "194.92", "804.92");

