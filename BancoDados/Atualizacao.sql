INSERT INTO TB_SUPORTE (dt_cadastro, ds_assunto, st_tipo_assunto, co_assinante) VALUES ("2024-06-10 23:52:09", "dwdwdw", "1", "12");

INSERT INTO sol.TB_IMAGEM (ds_caminho) VALUES ("suporte-1-6667bbda04ea5.PNG");

INSERT INTO TB_HISTORICO_SUPORTE (co_suporte, dt_cadastro, ds_mensagem, st_lido, co_usuario, co_imagem) VALUES ("1", "2024-06-10 23:52:09", "<p>dd oidslkakdlsa d</p>", "N", "13", "5");

INSERT INTO sol.TB_ENDERECO (ds_endereco) VALUES ("");

UPDATE sol.TB_EMPRESA SET co_endereco = "6" where co_empresa = 14;

INSERT INTO sol.TB_CONTATO (ds_email, nu_tel1) VALUES ("leonardomcbessa@gmail.com", "61993274991");

INSERT INTO sol.TB_PESSOA (no_pessoa, co_contato, dt_cadastro) VALUES ("Rodrigo", "16", "2024-06-11 14:56:30");

INSERT INTO sol.TB_EMPRESA (no_fantasia, dt_cadastro) VALUES ("Arm. e Papelaria Rosa de Saron", "2024-06-11 14:56:30");

INSERT INTO TB_ASSINANTE (tp_assinante, co_pessoa, co_empresa, dt_cadastro, dt_expiracao) VALUES ("M", "16", "15", "2024-06-11 14:56:30", "2024-12-11");

INSERT INTO sol.TB_USUARIO (co_assinante, co_pessoa, ds_senha, ds_code, st_status, dt_cadastro) VALUES ("13", "16", "PQK8FST9", "VUZGTE9FWlRWRGs9", "A", "2024-06-11 14:56:30");

INSERT INTO TB_PLANO_ASSINANTE_ASSINATURA (co_plano_assinante, co_assinante, nu_filiais, nu_valor_assinatura, tp_pagamento, dt_cadastro, dt_expiracao, co_plano_assinante_assinatura_ativo, st_pagamento, dt_modificado, st_status) VALUES ("11", "13", "0", "487.00", "9", "2024-06-11 14:56:30", "2025-06-11", "11"_assinatura_ativo, "3", "2024-06-11 14:56:30", "A");

INSERT INTO TB_HISTORICO_PAG_ASSINATURA (co_plano_assinante_assinatura, dt_cadastro, ds_acao, ds_usuario, st_pagamento) VALUES ("13", "2024-06-11 14:56:30", "Cadastro no Sistema", "Leo Bessa Fez o Cadastro", "3");

INSERT INTO sol.TB_USUARIO_PERFIL (co_perfil, co_usuario) VALUES ("2", "14");

INSERT INTO sol.TB_CONTATO (ds_email, nu_tel1) VALUES ("leonardomcbessa@gmail.com", "61993274991");

INSERT INTO sol.TB_PESSOA (no_pessoa, co_contato, dt_cadastro) VALUES ("LEONARDO MACHADO CARVALHO BESSA", "17", "2024-06-11 15:03:13");

INSERT INTO sol.TB_EMPRESA (no_fantasia, dt_cadastro) VALUES ("LEONARDO MACHADO CARVALHO BESSA", "2024-06-11 15:03:13");

INSERT INTO TB_ASSINANTE (tp_assinante, co_pessoa, co_empresa, dt_cadastro, dt_expiracao) VALUES ("M", "17", "16", "2024-06-11 15:03:13", "2024-12-11");

INSERT INTO sol.TB_USUARIO (co_assinante, co_pessoa, ds_senha, ds_code, st_status, dt_cadastro) VALUES ("14", "17", "GPF1JHK0", "UjFCR01VcElTekE9", "A", "2024-06-11 15:03:13");

INSERT INTO TB_PLANO_ASSINANTE_ASSINATURA (co_plano_assinante, co_assinante, nu_filiais, nu_valor_assinatura, tp_pagamento, dt_cadastro, dt_expiracao, co_plano_assinante_assinatura_ativo, st_pagamento, dt_modificado, st_status) VALUES ("11", "14", "0", "487.00", "9", "2024-06-11 15:03:13", "2025-06-11", "11"_assinatura_ativo, "3", "2024-06-11 15:03:13", "A");

INSERT INTO TB_HISTORICO_PAG_ASSINATURA (co_plano_assinante_assinatura, dt_cadastro, ds_acao, ds_usuario, st_pagamento) VALUES ("14", "2024-06-11 15:03:13", "Cadastro no Sistema", "Leo Bessa Fez o Cadastro", "3");

INSERT INTO sol.TB_USUARIO_PERFIL (co_perfil, co_usuario) VALUES ("2", "15");

INSERT INTO sol.TB_CONTATO (ds_email, nu_tel1) VALUES ("leonardomcbessa@gmail.com", "61993274991");

INSERT INTO sol.TB_PESSOA (no_pessoa, co_contato, dt_cadastro) VALUES ("LEONARDO MACHADO CARVALHO BESSA", "18", "2024-06-11 15:08:06");

INSERT INTO sol.TB_EMPRESA (no_fantasia, dt_cadastro) VALUES ("LEONARDO MACHADO CARVALHO BESSA", "2024-06-11 15:08:06");

INSERT INTO TB_ASSINANTE (tp_assinante, co_pessoa, co_empresa, dt_cadastro, dt_expiracao) VALUES ("M", "18", "17", "2024-06-11 15:08:06", "2024-09-11");

INSERT INTO sol.TB_USUARIO (co_assinante, co_pessoa, ds_senha, ds_code, st_status, dt_cadastro) VALUES ("15", "18", "CFG1JRO0", "UTBaSE1VcFNUekE9", "A", "2024-06-11 15:08:06");

INSERT INTO TB_PLANO_ASSINANTE_ASSINATURA (co_plano_assinante, co_assinante, nu_filiais, nu_valor_assinatura, tp_pagamento, dt_cadastro, dt_expiracao, co_plano_assinante_assinatura_ativo, st_pagamento, dt_modificado, st_status) VALUES ("12", "15", "0", "247.00", "9", "2024-06-11 15:08:06", "2024-12-11", "12"_assinatura_ativo, "3", "2024-06-11 15:08:06", "A");

INSERT INTO TB_HISTORICO_PAG_ASSINATURA (co_plano_assinante_assinatura, dt_cadastro, ds_acao, ds_usuario, st_pagamento) VALUES ("15", "2024-06-11 15:08:06", "Cadastro no Sistema", "Leo Bessa Fez o Cadastro", "3");

INSERT INTO sol.TB_USUARIO_PERFIL (co_perfil, co_usuario) VALUES ("2", "16");

UPDATE sol.TB_USUARIO SET st_status = "A" where co_usuario = 16;

INSERT INTO sol.TB_CONTATO (ds_email, nu_tel1) VALUES ("leonardomcbessa@gmail.com", "61993274991");

INSERT INTO sol.TB_PESSOA (no_pessoa, co_contato, dt_cadastro) VALUES ("MARIA KARLENE RAMOS LIMA", "19", "2024-06-11 15:14:39");

INSERT INTO sol.TB_EMPRESA (no_fantasia, dt_cadastro) VALUES ("Arm. e Papelaria Rosa de Saron", "2024-06-11 15:14:39");

INSERT INTO TB_ASSINANTE (tp_assinante, co_pessoa, co_empresa, dt_cadastro, dt_expiracao) VALUES ("M", "19", "18", "2024-06-11 15:14:39", "2024-12-11");

INSERT INTO sol.TB_USUARIO (co_assinante, co_pessoa, ds_senha, ds_code, st_status, dt_cadastro) VALUES ("16", "19", "DJM2MAK4", "UkVwTk1rMUJTelE9", "A", "2024-06-11 15:14:39");

INSERT INTO TB_PLANO_ASSINANTE_ASSINATURA (co_plano_assinante, co_assinante, nu_filiais, nu_valor_assinatura, tp_pagamento, dt_cadastro, dt_expiracao, co_plano_assinante_assinatura_ativo, st_pagamento, dt_modificado, st_status) VALUES ("11", "16", "0", "487.00", "9", "2024-06-11 15:14:39", "2025-06-11", "11"_assinatura_ativo, "3", "2024-06-11 15:14:40", "A");

INSERT INTO TB_HISTORICO_PAG_ASSINATURA (co_plano_assinante_assinatura, dt_cadastro, ds_acao, ds_usuario, st_pagamento) VALUES ("16", "2024-06-11 15:14:40", "Cadastro no Sistema", "Leo Bessa Fez o Cadastro", "3");

INSERT INTO sol.TB_USUARIO_PERFIL (co_perfil, co_usuario) VALUES ("2", "17");

