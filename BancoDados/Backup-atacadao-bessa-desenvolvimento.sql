-- Atualizado em: 01/02/2023 12:17:19
-- Link HOME: http://localhost/AtacadaoBessa/
-- AMBIENTE: 1
-- BANCO: atacadao10

CREATE DATABASE IF NOT EXISTS atacadao10;

USE atacadao10;

DROP TABLE IF EXISTS TB_ANOTACAO;


CREATE TABLE `TB_ANOTACAO` (
  `co_anotacao` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_observacao` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_titulo` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_historia` int(11) NOT NULL,
  PRIMARY KEY (`co_anotacao`,`co_historia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_ASSINANTE;


CREATE TABLE `TB_ASSINANTE` (
  `co_assinante` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_expiracao` date DEFAULT NULL COMMENT 'Data da expiração de utilização do sistema',
  `st_dados_complementares` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'N' COMMENT 'S - Sim / N - Não',
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'A' COMMENT 'A - Ativo / I - inativo',
  `tp_assinante` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'M' COMMENT 'M  - Matriz / F - Filial',
  `co_empresa` int(11) NOT NULL,
  `co_pessoa` int(11) NOT NULL COMMENT 'Responsável pelo Assinante',
  PRIMARY KEY (`co_assinante`,`co_empresa`,`co_pessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_BANCO;


CREATE TABLE `TB_BANCO` (
  `co_banco` int(11) NOT NULL COMMENT 'Código do banco',
  `no_banco` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`co_banco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_BOTAO;


CREATE TABLE `TB_BOTAO` (
  `co_botao` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Tabela das informações dos botõs para ir para a págna de venda e dentro da página',
  `no_botao` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Texto do Botão',
  `ds_botao` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Descrição do Botão (Posição/cor)',
  `nu_total_cliques` int(8) DEFAULT NULL COMMENT 'Número de cliques no botão',
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'S - Sim / N - Não',
  PRIMARY KEY (`co_botao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_CATEGORIA_FC;


CREATE TABLE `TB_CATEGORIA_FC` (
  `co_categoria_fc` int(11) NOT NULL AUTO_INCREMENT,
  `ds_texto` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_codigo` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_categoria_fc`,`co_assinante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_CATEGORIA_FC_FILHA;


CREATE TABLE `TB_CATEGORIA_FC_FILHA` (
  `co_categoria_fc_filha` int(11) NOT NULL AUTO_INCREMENT,
  `ds_texto` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_codigo` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_categoria_fc` int(11) NOT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_categoria_fc_filha`,`co_categoria_fc`,`co_assinante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_CATEGORIA_FC_NETA;


CREATE TABLE `TB_CATEGORIA_FC_NETA` (
  `co_categoria_fc_neta` int(11) NOT NULL AUTO_INCREMENT,
  `ds_texto` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_codigo` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_categoria_fc_filha` int(11) NOT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_categoria_fc_neta`,`co_categoria_fc_filha`,`co_assinante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_CENTRO_CUSTO;


CREATE TABLE `TB_CENTRO_CUSTO` (
  `co_centro_custo` int(11) NOT NULL AUTO_INCREMENT,
  `no_centro_custos` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_codigo` int(6) DEFAULT NULL,
  `ds_descricao` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_centro_custo`,`co_assinante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_CHECKOUT;


CREATE TABLE `TB_CHECKOUT` (
  `co_checkout` int(11) NOT NULL AUTO_INCREMENT,
  `nu_visitas_total` int(11) DEFAULT NULL,
  `dt_ultima_visita` datetime DEFAULT NULL,
  PRIMARY KEY (`co_checkout`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_CLIQUE;


CREATE TABLE `TB_CLIQUE` (
  `co_clique` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `co_botao` int(11) NOT NULL,
  PRIMARY KEY (`co_clique`,`co_botao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_CONTA_BANCARIA;


CREATE TABLE `TB_CONTA_BANCARIA` (
  `co_conta_bancaria` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `no_banco` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_agencia` int(6) DEFAULT NULL,
  `nu_conta` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_conta_bancaria`,`co_assinante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_CONTATO;


CREATE TABLE `TB_CONTATO` (
  `co_contato` int(11) NOT NULL AUTO_INCREMENT,
  `nu_tel1` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_tel2` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_tel3` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_tel_0800` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_site` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_facebook` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_twitter` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_instagram` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`co_contato`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_CONTATO VALUES('1','61993274991','6130826060',NULL,NULL,'sistema@atacadaobessa.com.br',NULL,NULL,NULL,NULL);




DROP TABLE IF EXISTS TB_CONTROLLER;


CREATE TABLE `TB_CONTROLLER` (
  `co_controller` int(11) NOT NULL AUTO_INCREMENT,
  `no_controller` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_class_icon` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Classe do Ícone',
  PRIMARY KEY (`co_controller`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_CONTROLLER VALUES('1','Gestão','clip-data');

INSERT INTO TB_CONTROLLER VALUES('2','Auditoria','fa fa-crosshairs');

INSERT INTO TB_CONTROLLER VALUES('3','Acesso','clip-connection-2');

INSERT INTO TB_CONTROLLER VALUES('4','Funcionalidade','fa fa-outdent');

INSERT INTO TB_CONTROLLER VALUES('5','Perfil','clip-stack-empty');

INSERT INTO TB_CONTROLLER VALUES('6','Usuário','fa fa-group');

INSERT INTO TB_CONTROLLER VALUES('7','Visita','clip-airplane');

INSERT INTO TB_CONTROLLER VALUES('8','Relatorio','fa fa-clipboard');

INSERT INTO TB_CONTROLLER VALUES('9','Suporte','fa fa-envelope');

INSERT INTO TB_CONTROLLER VALUES('10','Fluxocaixa','fa fa-money');




DROP TABLE IF EXISTS TB_CRONS;


CREATE TABLE `TB_CRONS` (
  `co_cron` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `no_cron` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_sql` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`co_cron`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_EMPRESA;


CREATE TABLE `TB_EMPRESA` (
  `co_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `no_empresa` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Razão Social\n',
  `no_fantasia` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `nu_cnpj` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_insc_estadual` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_observacao` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `tp_empresa` int(1) DEFAULT NULL COMMENT '1 - Fornecedor / 2 - Cliente\n',
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_pessoa` int(11) NOT NULL COMMENT 'Pessoa responsável pela empresa\n',
  `co_endereco` int(11) NOT NULL,
  `co_contato` int(11) NOT NULL,
  `co_imagem` int(11) NOT NULL,
  PRIMARY KEY (`co_empresa`,`co_pessoa`,`co_endereco`,`co_contato`,`co_imagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_ENDERECO;


CREATE TABLE `TB_ENDERECO` (
  `co_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `ds_endereco` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_complemento` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_bairro` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_cep` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_cidade` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sg_uf` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`co_endereco`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_ENDERECO VALUES('1','qr 10 casa 10',NULL,'Samambaia','72111111','Brasília','DF');




DROP TABLE IF EXISTS TB_ESTOQUE;


CREATE TABLE `TB_ESTOQUE` (
  `co_estoque` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `nu_estoque` int(10) DEFAULT NULL,
  `co_produto` int(11) NOT NULL,
  `co_negociacao` int(11) NOT NULL,
  PRIMARY KEY (`co_estoque`,`co_produto`,`co_negociacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_FLUXO_CAIXA;


CREATE TABLE `TB_FLUXO_CAIXA` (
  `co_fluxo_caixa` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_realizado` date DEFAULT NULL,
  `dt_vencimento` date DEFAULT NULL,
  `nu_valor` float(12,2) DEFAULT NULL,
  `nu_valor_pago` float(12,2) DEFAULT NULL,
  `ds_descricao` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `tp_fluxo` int(1) DEFAULT NULL COMMENT '1 - Entrada / 2 - Saída',
  `tp_pagamento` int(1) DEFAULT NULL COMMENT 'GRATIS = 0 / DINHEIRO = 1 / CARTAO_DEBITO = 2 / CARTAO_CREDITO = 3 /  PIX = 4 / BOLETO = 5 / PROMISSORIA = 6 / CHEQUE = 7 / PARCELAMENTO_PROPRIO = 8 / OUTROS = 9 ',
  `st_pagamento` int(1) DEFAULT NULL COMMENT '1 - A Pagar / 2 - A Receber / 3 - Pago / 4 - Em Atraso ',
  `co_categoria_fc` int(11) NOT NULL,
  `co_categoria_fc_filha` int(11) NOT NULL,
  `co_categoria_fc_neta` int(11) NOT NULL,
  `co_centro_custo` int(11) NOT NULL,
  `co_conta_bancaria` int(11) NOT NULL,
  `co_representacao` int(11) NOT NULL,
  `co_usuario` int(10) NOT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_fluxo_caixa`,`co_categoria_fc`,`co_categoria_fc_filha`,`co_categoria_fc_neta`,`co_centro_custo`,`co_conta_bancaria`,`co_representacao`,`co_usuario`,`co_assinante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_FUNCIONALIDADE;


CREATE TABLE `TB_FUNCIONALIDADE` (
  `co_funcionalidade` int(11) NOT NULL AUTO_INCREMENT,
  `no_funcionalidade` varchar(150) CHARACTER SET latin1 NOT NULL,
  `ds_action` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `st_status` varchar(1) CHARACTER SET latin1 DEFAULT 'A' COMMENT '''A - Ativo / I - Inativo''',
  `st_menu` varchar(1) CHARACTER SET latin1 DEFAULT 'S' COMMENT 'S - Sim / N - Não (Se apresenta no menu)',
  `co_controller` int(11) NOT NULL,
  PRIMARY KEY (`co_funcionalidade`,`co_controller`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_FUNCIONALIDADE VALUES('1','Perfil Master','PerfilMaster','A','S',NULL);

INSERT INTO TB_FUNCIONALIDADE VALUES('2','Auditoria Listar','ListarAuditoria','A','S','2');

INSERT INTO TB_FUNCIONALIDADE VALUES('3','Auditoria Detalhar','DetalharAuditoria','A','N','2');

INSERT INTO TB_FUNCIONALIDADE VALUES('4','Usuario Cadastrar','CadastroUsuario','A','N','6');

INSERT INTO TB_FUNCIONALIDADE VALUES('5','Usuario Listar','ListarUsuario','A','S','6');

INSERT INTO TB_FUNCIONALIDADE VALUES('6','Meu Perfil Usuario','MeuPerfilUsuario','A','S','6');

INSERT INTO TB_FUNCIONALIDADE VALUES('7','Perfil Listar','ListarPerfil','A','S','5');

INSERT INTO TB_FUNCIONALIDADE VALUES('8','Perfil Cadastrar','CadastroPerfil','A','S','5');

INSERT INTO TB_FUNCIONALIDADE VALUES('9','Funcionalidade Listar','ListarFuncionalidade','A','S','4');

INSERT INTO TB_FUNCIONALIDADE VALUES('10','Funcionalidade Cadastrar','CadastroFuncionalidade','A','S','4');

INSERT INTO TB_FUNCIONALIDADE VALUES('11','Troca Senha Usuario','TrocaSenhaUsuario','A','S','6');

INSERT INTO TB_FUNCIONALIDADE VALUES('13','Listar Visita','ListarVisita','A','S','7');

INSERT INTO TB_FUNCIONALIDADE VALUES('14','Config Gestao','ConfigGestao','A','S','1');

INSERT INTO TB_FUNCIONALIDADE VALUES('15','Gerar Entidades Gestao','GerarEntidadesGestao','A','S','1');

INSERT INTO TB_FUNCIONALIDADE VALUES('16','Gerar Backup Gestao','GerarBackupGestao','A','S','1');

INSERT INTO TB_FUNCIONALIDADE VALUES('17','Listar Acesso','ListarAcesso','A','S','3');

INSERT INTO TB_FUNCIONALIDADE VALUES('22','Pre Projeto Gestao','PreProjetoGestao','A','S','1');

INSERT INTO TB_FUNCIONALIDADE VALUES('23','Acompanhar Projeto Gestao','AcompanharProjetoGestao','A','N','1');

INSERT INTO TB_FUNCIONALIDADE VALUES('24','Limpar Banco Gestao','LimparBancoGestao','A','S','1');

INSERT INTO TB_FUNCIONALIDADE VALUES('28','Crons','CronsGestao','A','S','1');

INSERT INTO TB_FUNCIONALIDADE VALUES('29','Minificação','MinificacaoGestao','A','S','1');

INSERT INTO TB_FUNCIONALIDADE VALUES('30','Gráfico','GraficoRelatorio','A','S','8');

INSERT INTO TB_FUNCIONALIDADE VALUES('31','Listar Suporte','ListarSuporte','A','S','9');

INSERT INTO TB_FUNCIONALIDADE VALUES('32','Cadastro Suporte','CadastroSuporte','A','N','9');

INSERT INTO TB_FUNCIONALIDADE VALUES('33','Deleta Suporte','DeletaSuporte','A','N','9');

INSERT INTO TB_FUNCIONALIDADE VALUES('34','Lançamento','Lancamento','A','S','10');

INSERT INTO TB_FUNCIONALIDADE VALUES('35','Análise','ListarFluxoCaixa','A','S','10');

INSERT INTO TB_FUNCIONALIDADE VALUES('36','Comparador','Comparador','A','S','10');




DROP TABLE IF EXISTS TB_HIST_SALDO_CB;


CREATE TABLE `TB_HIST_SALDO_CB` (
  `co_hist_saldo_cb` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `tp_fluxo` int(1) DEFAULT NULL COMMENT '1 - Entrada / 2 - Saída',
  `nu_valor_pago` float(12,2) DEFAULT NULL,
  `nu_saldo` float(12,2) DEFAULT NULL,
  `ds_observacao` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_conta_bancaria` int(11) NOT NULL,
  `co_usuario` int(10) NOT NULL,
  PRIMARY KEY (`co_hist_saldo_cb`,`co_conta_bancaria`,`co_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_HIST_TRANSFERENCIA;


CREATE TABLE `TB_HIST_TRANSFERENCIA` (
  `co_hist_transferencia` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_realizado` datetime DEFAULT NULL,
  `nu_saldo_origem_ant` float(12,2) DEFAULT NULL,
  `nu_saldo_origem_dep` float(12,2) DEFAULT NULL,
  `nu_saldo_destino_ant` float(12,2) DEFAULT NULL,
  `nu_saldo_destino_dep` float(12,2) DEFAULT NULL,
  `nu_valor_transferido` float(12,2) DEFAULT NULL,
  `co_conta_bancaria_origem` int(11) NOT NULL,
  `co_conta_bancaria_destino` int(11) NOT NULL,
  `co_usuario` int(11) NOT NULL,
  PRIMARY KEY (`co_hist_transferencia`,`co_conta_bancaria_origem`,`co_conta_bancaria_destino`,`co_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_HISTORIA;


CREATE TABLE `TB_HISTORIA` (
  `co_historia` int(11) NOT NULL AUTO_INCREMENT,
  `ds_titulo` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_observacao` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_atualizado` datetime DEFAULT NULL,
  `st_situacao` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'N' COMMENT 'N - Não iniciada / I - Iniciada / C - Concluida',
  `co_sessao` int(11) NOT NULL,
  PRIMARY KEY (`co_historia`,`co_sessao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_HISTORICO_HISTORIA;


CREATE TABLE `TB_HISTORICO_HISTORIA` (
  `co_historico_historia` int(11) NOT NULL AUTO_INCREMENT,
  `nu_esforco` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_esforco_restante` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `co_historia` int(11) NOT NULL,
  PRIMARY KEY (`co_historico_historia`,`co_historia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_HISTORICO_PAG_ASSINATURA;


CREATE TABLE `TB_HISTORICO_PAG_ASSINATURA` (
  `co_historico_pag_assinatura` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_acao` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_usuario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_pagamento` int(1) DEFAULT NULL COMMENT '0 - Pendente / 1 - Aguardando pagamento / 2 - Em análise / 3 - Pago / 4 - Disponível / 5 - Em disputa / 6 - Devolvida / 7 - Cancelada\n',
  `co_plano_assinante_assinatura` int(11) NOT NULL,
  PRIMARY KEY (`co_historico_pag_assinatura`,`co_plano_assinante_assinatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_HISTORICO_SUPORTE;


CREATE TABLE `TB_HISTORICO_SUPORTE` (
  `co_historico_suporte` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_mensagem` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_lido` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'N' COMMENT 'S - Sim / N - Não',
  `co_suporte` int(11) NOT NULL,
  `co_usuario` int(10) NOT NULL,
  `co_imagem` int(10) unsigned NOT NULL COMMENT 'Chave do Anexo.',
  PRIMARY KEY (`co_historico_suporte`,`co_suporte`,`co_usuario`,`co_imagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_IMAGEM;


CREATE TABLE `TB_IMAGEM` (
  `co_imagem` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ds_caminho` varchar(150) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`co_imagem`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_IMAGEM VALUES('1','leonardo-m-c-bessa-56e8920c23ab66.jpg');




DROP TABLE IF EXISTS TB_IMAGEM_ASSINANTE;


CREATE TABLE `TB_IMAGEM_ASSINANTE` (
  `co_imagem_assinante` int(10) NOT NULL AUTO_INCREMENT,
  `co_assinante` int(11) NOT NULL,
  `co_imagem` int(10) unsigned NOT NULL,
  PRIMARY KEY (`co_imagem_assinante`,`co_assinante`,`co_imagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_MIDIAS_PRODUTO;


CREATE TABLE `TB_MIDIAS_PRODUTO` (
  `co_midias_produto` int(11) NOT NULL AUTO_INCREMENT,
  `co_imagem` int(10) NOT NULL,
  `co_produto` int(12) NOT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `tp_midia` int(1) DEFAULT NULL COMMENT '1 - Imagem / 2 - Vídeo',
  PRIMARY KEY (`co_midias_produto`,`co_imagem`,`co_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_MODULO;


CREATE TABLE `TB_MODULO` (
  `co_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `no_modulo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `co_projeto` int(11) NOT NULL,
  PRIMARY KEY (`co_modulo`,`co_projeto`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_NEGOCIACAO;


CREATE TABLE `TB_NEGOCIACAO` (
  `co_negociacao` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `tp_negociacao` int(1) DEFAULT NULL COMMENT '1 - Compra / 2 - Venda / 3 - Cotação',
  `nu_valor` float(12,2) DEFAULT NULL,
  `tp_modelo` int(1) DEFAULT NULL COMMENT 'Modelo do Tipo da Negociação ///  1 - Compra Pessoal / 2 - Compra online / 3 - Compra Vendedor / 4 - Venda loja Física / 5 - Venda Vendedor / 6 - Venda online / 7 - Venda TeleVenda',
  `co_produto` int(12) NOT NULL,
  `co_empresa` int(11) NOT NULL,
  PRIMARY KEY (`co_negociacao`,`co_produto`,`co_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_PACOTE;


CREATE TABLE `TB_PACOTE` (
  `co_pacote` int(11) NOT NULL AUTO_INCREMENT,
  `no_pacote` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_descricao` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_lancamento` date DEFAULT NULL,
  PRIMARY KEY (`co_pacote`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_PERFIL;


CREATE TABLE `TB_PERFIL` (
  `co_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `no_perfil` varchar(45) CHARACTER SET latin1 NOT NULL COMMENT 'Nome do Perfil',
  `st_status` varchar(1) CHARACTER SET latin1 NOT NULL DEFAULT 'A' COMMENT '''A - Ativo / I - Inativo''',
  PRIMARY KEY (`co_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_PERFIL VALUES('1','Master','A');




DROP TABLE IF EXISTS TB_PERFIL_ASSINANTE;


CREATE TABLE `TB_PERFIL_ASSINANTE` (
  `co_perfil_assinante` int(11) NOT NULL AUTO_INCREMENT,
  `no_perfil` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_perfil_assinante`,`co_assinante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_PERFIL_FUNCIONALIDADE;


CREATE TABLE `TB_PERFIL_FUNCIONALIDADE` (
  `co_perfil_funcionalidade` int(11) NOT NULL AUTO_INCREMENT,
  `co_funcionalidade` int(11) NOT NULL,
  `co_perfil` int(11) NOT NULL,
  `co_perfil_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_perfil_funcionalidade`,`co_funcionalidade`,`co_perfil`,`co_perfil_assinante`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('1','1','1','1');




DROP TABLE IF EXISTS TB_PESSOA;


CREATE TABLE `TB_PESSOA` (
  `co_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nu_cpf` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_pessoa` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_rg` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `st_sexo` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'M - Masculino ou F - Feminino',
  `co_endereco` int(11) NOT NULL,
  `co_contato` int(11) NOT NULL,
  `co_imagem` int(10) NOT NULL,
  PRIMARY KEY (`co_pessoa`,`co_endereco`,`co_contato`,`co_imagem`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_PESSOA VALUES('1',NULL,'Usuário Atacadão',NULL,'2016-10-31 00:00:00',NULL,'M','1','1','1');




DROP TABLE IF EXISTS TB_PLANO;


CREATE TABLE `TB_PLANO` (
  `co_plano` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `no_plano` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_mes_ativo` int(1) DEFAULT NULL COMMENT 'Número de meses ativo do plano (1, 3, 6, 12 e 24)',
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'A' COMMENT 'Status do plano A - Ativo / I - Inativo',
  PRIMARY KEY (`co_plano`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_PLANO_ASSINANTE;


CREATE TABLE `TB_PLANO_ASSINANTE` (
  `co_plano_assinante` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Tabela de Histórico de dados do Plano',
  `nu_valor` decimal(8,2) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_observacao` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_plano` int(11) NOT NULL,
  PRIMARY KEY (`co_plano_assinante`,`co_plano`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_PLANO_ASSINANTE_ASSINATURA;


CREATE TABLE `TB_PLANO_ASSINANTE_ASSINATURA` (
  `co_plano_assinante_assinatura` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_expiracao` date DEFAULT NULL COMMENT 'data de expiriração da assinatura',
  `dt_confirma_pagamento` datetime DEFAULT NULL COMMENT 'Data que confirmou o pagamento',
  `tp_pagamento` int(1) DEFAULT NULL COMMENT '3 - Cartão de Crédito / 4 - Depósito ou Transferência / 5 - Boleto',
  `st_pagamento` int(1) DEFAULT 0 COMMENT '0 - Pendente / 1 - Aguardando pagamento / 2 - Em análise / 3 - Pago / 4 - Disponível / 5 - Em disputa / 6 - Devolvida / 7 - Cancelada',
  `dt_modificado` datetime DEFAULT NULL COMMENT 'Data da ùltima modificação',
  `nu_valor_desconto` decimal(8,2) DEFAULT NULL COMMENT 'Valor de Desconto do PagSeguro',
  `nu_valor_real` decimal(8,2) DEFAULT NULL COMMENT 'Valor de recebimento do PagSeguro\n',
  `ds_link_boleto` text COLLATE utf8_unicode_ci DEFAULT 'null' COMMENT 'Link do Boleto que retorno da PagSeguro',
  `nu_filiais` int(11) DEFAULT 0 COMMENT 'Número de filiais para a assinatura',
  `co_plano_assinante_assinatura_ativo` int(11) DEFAULT 0 COMMENT 'Número do co_plano_assinante_assinatura que esta ativo',
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'I' COMMENT 'A - Ativo / I - Inativo',
  `ds_code_transacao` varchar(80) COLLATE utf8_unicode_ci DEFAULT 'null' COMMENT 'Code da transação do PagSeguro',
  `nu_valor_assinatura` decimal(8,2) DEFAULT NULL COMMENT 'Valor final da assinatura',
  `co_assinante` int(11) NOT NULL,
  `co_plano_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_plano_assinante_assinatura`,`co_assinante`,`co_plano_assinante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_PLANO_PACOTE;


CREATE TABLE `TB_PLANO_PACOTE` (
  `co_plano_pacote` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Planos do Módulo',
  `co_plano` int(11) NOT NULL,
  `co_pacote` int(11) NOT NULL,
  PRIMARY KEY (`co_plano_pacote`,`co_plano`,`co_pacote`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_PRODUTO;


CREATE TABLE `TB_PRODUTO` (
  `co_produto` int(12) NOT NULL AUTO_INCREMENT,
  `no_produto` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_descrição` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `tp_unidade_venda` int(1) DEFAULT NULL COMMENT '1 - Unidade / 2 - Pacote / 3 - Cartela',
  PRIMARY KEY (`co_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_PROJETO;


CREATE TABLE `TB_PROJETO` (
  `co_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `no_projeto` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`co_projeto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_REPRESENTACAO;


CREATE TABLE `TB_REPRESENTACAO` (
  `co_representacao` int(11) NOT NULL AUTO_INCREMENT,
  `no_representacao` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_tel1` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_representacao`,`co_assinante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_SESSAO;


CREATE TABLE `TB_SESSAO` (
  `co_sessao` int(11) NOT NULL AUTO_INCREMENT,
  `no_sessao` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `co_modulo` int(11) NOT NULL,
  PRIMARY KEY (`co_sessao`,`co_modulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_SUPORTE;


CREATE TABLE `TB_SUPORTE` (
  `co_suporte` int(11) NOT NULL AUTO_INCREMENT,
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'A' COMMENT 'A - Ativa / I - Inativa',
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_assunto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_tipo_assunto` int(1) DEFAULT NULL COMMENT '1 - Sugestão ou Melhorias / 2 - Reclamação / 3 -  Correção no Sistema / 4 - Outros',
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_suporte`,`co_assinante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_USUARIO;


CREATE TABLE `TB_USUARIO` (
  `co_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `ds_senha` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ds_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Senha criptografada',
  `st_status` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'I' COMMENT '''A - Ativo / I - Inativo''',
  `st_troca_senha` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'N',
  `dt_cadastro` datetime NOT NULL,
  `co_imagem` int(10) NOT NULL,
  `co_pessoa` int(11) NOT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_usuario`,`co_imagem`,`co_pessoa`,`co_assinante`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_USUARIO VALUES('1','123456**','TVRJek5EVTJLaW89','A','S','2016-10-31 00:00:00','1','1',NULL);




DROP TABLE IF EXISTS TB_USUARIO_PERFIL;


CREATE TABLE `TB_USUARIO_PERFIL` (
  `co_usuario_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `co_usuario` int(10) NOT NULL,
  `co_perfil` int(11) NOT NULL,
  `co_perfil_assinante` int(10) NOT NULL,
  PRIMARY KEY (`co_usuario_perfil`,`co_usuario`,`co_perfil`,`co_perfil_assinante`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_USUARIO_PERFIL VALUES('1','1','1','1');




DROP TABLE IF EXISTS TB_VALOR_PRODUTO;


CREATE TABLE `TB_VALOR_PRODUTO` (
  `co_valor_produto` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `nu_valor` float(12,2) DEFAULT NULL,
  `co_negociacao` int(11) NOT NULL,
  `co_produto` int(12) NOT NULL,
  PRIMARY KEY (`co_valor_produto`,`co_negociacao`,`co_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





DROP TABLE IF EXISTS TB_VISITA_CHECKOUT;


CREATE TABLE `TB_VISITA_CHECKOUT` (
  `co_visita_checkout` int(11) NOT NULL AUTO_INCREMENT,
  `co_visita` int(11) NOT NULL,
  `co_checkout` int(11) NOT NULL,
  PRIMARY KEY (`co_visita_checkout`,`co_visita`,`co_checkout`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





