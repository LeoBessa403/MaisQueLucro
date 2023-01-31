INSERT INTO `arquitetura`.`TB_IMAGEM` (`co_imagem`, `ds_caminho`) VALUES (1, 'nova_imagem.jpg');

INSERT INTO `arquitetura`.`TB_CONTATO` (`co_contato`, `nu_tel1`, `nu_tel2`, `nu_tel3`, `nu_tel_0800`, `ds_email`, `ds_site`, `ds_facebook`, `ds_twitter`, `ds_instagram`) VALUES (1, '61961616161', '6161616161', NULL, NULL, 'email@emaill.com', NULL, NULL, NULL, NULL);

INSERT INTO `arquitetura`.`TB_ENDERECO` (`co_endereco`, `ds_endereco`, `ds_complemento`, `ds_bairro`, `nu_cep`, `no_cidade`, `sg_uf`) VALUES (1, 'QR 205 Conjunto 25 casa 07', NULL, 'Samambaia', '72319106', 'Brasília', 'DF');

INSERT INTO `arquitetura`.`TB_PERFIL` (`co_perfil`, `no_perfil`, `st_status`) VALUES (1, 'Master', 'A');

INSERT INTO `arquitetura`.`TB_FUNCIONALIDADE` (`co_funcionalidade`, `no_funcionalidade`, `st_status`) VALUES (1, 'Perfil Master', 'A');
INSERT INTO `arquitetura`.`TB_FUNCIONALIDADE` (`co_funcionalidade`, `no_funcionalidade`, `st_status`) VALUES (2, 'Auditoria Listar', 'A');
INSERT INTO `arquitetura`.`TB_FUNCIONALIDADE` (`co_funcionalidade`, `no_funcionalidade`, `st_status`) VALUES (3, 'Auditoria Detalhar', 'A');
INSERT INTO `arquitetura`.`TB_FUNCIONALIDADE` (`co_funcionalidade`, `no_funcionalidade`, `st_status`) VALUES (4, 'Usuario Cadastrar', 'A');
INSERT INTO `arquitetura`.`TB_FUNCIONALIDADE` (`co_funcionalidade`, `no_funcionalidade`, `st_status`) VALUES (5, 'Usuario Listar', 'A');
INSERT INTO `arquitetura`.`TB_FUNCIONALIDADE` (`co_funcionalidade`, `no_funcionalidade`, `st_status`) VALUES (6, 'Meu Usuario', 'A');
INSERT INTO `arquitetura`.`TB_FUNCIONALIDADE` (`co_funcionalidade`, `no_funcionalidade`, `st_status`) VALUES (7, 'Perfil Listar', 'A');
INSERT INTO `arquitetura`.`TB_FUNCIONALIDADE` (`co_funcionalidade`, `no_funcionalidade`, `st_status`) VALUES (8, 'Perfil Cadastrar', 'A');
INSERT INTO `arquitetura`.`TB_FUNCIONALIDADE` (`co_funcionalidade`, `no_funcionalidade`, `st_status`) VALUES (9, 'Funcionalidade Listar', 'A');
INSERT INTO `arquitetura`.`TB_FUNCIONALIDADE` (`co_funcionalidade`, `no_funcionalidade`, `st_status`) VALUES (10, 'Funcionalidade Cadastrar', 'A');
INSERT INTO `arquitetura`.`TB_FUNCIONALIDADE` (`co_funcionalidade`, `no_funcionalidade`, `st_status`) VALUES (11, 'Funcionalidades Perfil', 'A');

INSERT INTO `arquitetura`.`TB_PERFIL_FUNCIONALIDADE` (`co_perfil_funcionalidade`, `co_perfil`, `co_funcionalidade`) VALUES (1, 1, 1);

INSERT INTO `arquitetura`.`TB_PESSOA` (`co_pessoa`, `nu_cpf`, `no_pessoa`, `nu_rg`, `dt_cadastro`, `dt_nascimento`, `st_sexo`, `co_endereco`, `co_contato`, `co_imagem`) VALUES (1, '12345678909', 'Usuário Padrão', '11111', '2016-10-31 00:00:00', '1984-07-06', 'M', 1, 1, 1);

INSERT INTO `arquitetura`.`TB_USUARIO` (`co_usuario`, `ds_senha`, `ds_code`, `st_status`, `st_troca_senha`, `dt_cadastro`, `co_imagem`, `co_pessoa`, `co_assinante`) VALUES (1, '123456**', 'TVRJek5EVTJLaW89', 'A', 'N', '2016-02-18 10:10:10', 1, 1, DEFAULT);

INSERT INTO `arquitetura`.`TB_USUARIO_PERFIL` (`co_usuario_perfil`, `co_usuario`, `co_perfil`) VALUES (1, 1, 1);

