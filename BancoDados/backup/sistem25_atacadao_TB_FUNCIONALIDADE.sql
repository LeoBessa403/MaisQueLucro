create table TB_FUNCIONALIDADE
(
    co_funcionalidade int auto_increment,
    no_funcionalidade varchar(150) charset latin1           not null,
    ds_action         varchar(120) charset latin1           null,
    st_status         varchar(1) charset latin1 default 'A' null comment '''A - Ativo / I - Inativo''',
    st_menu           varchar(1) charset latin1 default 'S' null comment 'S - Sim / N - Não (Se apresenta no menu)',
    co_controller     int                                   not null,
    primary key (co_funcionalidade, co_controller)
);

INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (1, 'Perfil Master', 'PerfilMaster', 'A', 'S', 0);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (2, 'Auditoria Listar', 'ListarAuditoria', 'A', 'S', 2);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (3, 'Auditoria Detalhar', 'DetalharAuditoria', 'A', 'N', 2);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (4, 'Usuario Cadastrar', 'CadastroUsuario', 'A', 'N', 6);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (5, 'Usuario Listar', 'ListarUsuario', 'A', 'S', 6);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (6, 'Meu Perfil Usuario', 'MeuPerfilUsuario', 'A', 'S', 6);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (7, 'Perfil Listar', 'ListarPerfil', 'A', 'S', 5);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (8, 'Perfil Cadastrar', 'CadastroPerfil', 'A', 'S', 5);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (9, 'Funcionalidade Listar', 'ListarFuncionalidade', 'A', 'S', 4);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (10, 'Funcionalidade Cadastrar', 'CadastroFuncionalidade', 'A', 'S', 4);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (11, 'Troca Senha Usuario', 'TrocaSenhaUsuario', 'A', 'S', 6);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (13, 'Listar Visita', 'ListarVisita', 'A', 'S', 7);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (14, 'Config Gestao', 'ConfigGestao', 'A', 'S', 1);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (15, 'Gerar Entidades Gestao', 'GerarEntidadesGestao', 'A', 'S', 1);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (16, 'Gerar Backup Gestao', 'GerarBackupGestao', 'A', 'S', 1);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (17, 'Listar Acesso', 'ListarAcesso', 'A', 'S', 3);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (22, 'Pre Projeto Gestao', 'PreProjetoGestao', 'A', 'S', 1);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (23, 'Acompanhar Projeto Gestao', 'AcompanharProjetoGestao', 'A', 'N', 1);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (24, 'Limpar Banco Gestao', 'LimparBancoGestao', 'A', 'S', 1);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (28, 'Crons', 'CronsGestao', 'A', 'S', 1);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (29, 'Minificação', 'MinificacaoGestao', 'A', 'S', 1);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (30, 'Gráfico', 'GraficoRelatorio', 'A', 'S', 8);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (31, 'Listar Suporte', 'ListarSuporte', 'A', 'S', 9);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (32, 'Cadastro Suporte', 'CadastroSuporte', 'A', 'N', 9);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (33, 'Deleta Suporte', 'DeletaSuporte', 'A', 'N', 9);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (34, 'Lançamento', 'Lancamento', 'A', 'S', 10);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (35, 'Análise', 'ListarFluxoCaixa', 'A', 'S', 10);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (36, 'Comparador', 'Comparador', 'A', 'S', 10);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (37, 'Listar Plano', 'ListarPlano', 'A', 'S', 11);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (38, 'Cadastro Plano', 'CadastroPlano', 'A', 'S', 11);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (39, 'Dados Complementares Assinante', 'DadosComplementaresAssinante', 'A', 'S', 12);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (40, 'Listar Assinante', 'ListarAssinante', 'A', 'S', 12);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (41, 'Cadastro Assinante', 'CadastroAssinante', 'A', 'N', 12);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (42, 'Meu Plano Assinante', 'MeuPlanoAssinante', 'A', 'S', 12);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (43, 'Renova Plano Assinante', 'RenovaPlanoAssinante', 'A', 'S', 12);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (44, 'Detalhar Assinatura Assinante', 'DetalharAssinaturaAssinante', 'A', 'N', 12);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (45, 'Notificação PagSeguro', 'NotificacaoPagSeguro', 'A', 'S', 12);
INSERT INTO TB_FUNCIONALIDADE (co_funcionalidade, no_funcionalidade, ds_action, st_status, st_menu, co_controller) VALUES (46, 'ChatGPT', 'ChatGPT', 'A', 'S', 13);