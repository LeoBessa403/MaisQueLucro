-- Atualizado em: 17/08/2021 15:34:27
-- AMBIENTE: http://localhost/SisBela/
-- BANCO: sisbela100

CREATE DATABASE IF NOT EXISTS sisbela100;

USE sisbela100;

DROP TABLE IF EXISTS TB_AGENDA;


CREATE TABLE `TB_AGENDA` (
  `co_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `ds_motivo` text DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_agenda`,`co_assinante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





DROP TABLE IF EXISTS TB_ASSINANTE;


CREATE TABLE `TB_ASSINANTE` (
  `co_assinante` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_expiracao` date DEFAULT NULL COMMENT 'Data da expiração de utilização do sistema',
  `st_dados_complementares` varchar(1) DEFAULT 'N' COMMENT 'S - Sim / N - Não',
  `st_status` varchar(1) DEFAULT 'A' COMMENT 'A - Ativo / I - inativo',
  `tp_assinante` varchar(1) DEFAULT 'M' COMMENT 'M  - Matriz / F - Filial',
  `co_empresa` int(11) NOT NULL,
  `co_pessoa` int(11) NOT NULL COMMENT 'Responsável pelo Assinante',
  PRIMARY KEY (`co_assinante`,`co_empresa`,`co_pessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;


INSERT INTO TB_ASSINANTE VALUES('1','2020-04-11 18:29:33','2020-10-26','N','A','M','1','2');

INSERT INTO TB_ASSINANTE VALUES('2','2020-04-11 18:35:42','2020-04-26','N','A','M','2','3');

INSERT INTO TB_ASSINANTE VALUES('3','2020-04-13 17:01:03','2020-04-28','N','A','M','3','4');




DROP TABLE IF EXISTS TB_BANCO;


CREATE TABLE `TB_BANCO` (
  `co_banco` int(11) NOT NULL COMMENT 'Código do banco',
  `no_banco` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`co_banco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





DROP TABLE IF EXISTS TB_BOTAO;


CREATE TABLE `TB_BOTAO` (
  `co_botao` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Tabela das informações dos botõs para ir para a págna de venda e dentro da página',
  `no_botao` varchar(45) DEFAULT NULL COMMENT 'Texto do Botão',
  `ds_botao` varchar(250) DEFAULT NULL COMMENT 'Descrição do Botão (Posição/cor)',
  `nu_total_cliques` int(8) DEFAULT NULL COMMENT 'Número de cliques no botão',
  `st_status` varchar(1) DEFAULT NULL COMMENT 'S - Sim / N - Não',
  PRIMARY KEY (`co_botao`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;


INSERT INTO TB_BOTAO VALUES('1','Inicio','Barra de navegação menu superior','2','A');

INSERT INTO TB_BOTAO VALUES('2','Planos','Barra de navegação menu superior','5','A');

INSERT INTO TB_BOTAO VALUES('3','Dúvidas','Barra de navegação menu superior','2','A');

INSERT INTO TB_BOTAO VALUES('4','Saiba Mais','Barra de navegação menu superior','2','A');

INSERT INTO TB_BOTAO VALUES('5','Bônus','Barra de navegação menu superior','1','A');

INSERT INTO TB_BOTAO VALUES('6','Comprar','Barra de navegação menu superior Botão Checkout','4','A');

INSERT INTO TB_BOTAO VALUES('7','Quero começar agora 1','Botão super promessa','0','A');

INSERT INTO TB_BOTAO VALUES('8','Quero começar agora 2','Botão MultiPlataforma','0','A');

INSERT INTO TB_BOTAO VALUES('9','Adquirir Plano Mensal','Comprar plano','0','A');

INSERT INTO TB_BOTAO VALUES('10','Adquirir Plano Semestral','Comprar plano','2','A');

INSERT INTO TB_BOTAO VALUES('11','Adquirir Plano Anual','Comprar Plano','1','A');

INSERT INTO TB_BOTAO VALUES('12','Quero organizar minha agenda agora','Botão das Dúvidas, direto para o checkout','0','A');

INSERT INTO TB_BOTAO VALUES('13','Visualizar Vídeo','Botão para visualizar o vídeo de Saiba Mais','3','A');

INSERT INTO TB_BOTAO VALUES('14','Quero esse bônus 1','Comprar o plano mensal direto no checkout','0','A');

INSERT INTO TB_BOTAO VALUES('15','Quero esse bônus 2','Comprar o plano semestral direto no checkout','2','A');

INSERT INTO TB_BOTAO VALUES('16','Quero esse bônus 3','Comprar o plano Anual direto no checkout','5','A');

INSERT INTO TB_BOTAO VALUES('17','Botão do WhatsApp','Botão de suporte no Site do nosso WhatsApp','4','A');




DROP TABLE IF EXISTS TB_CHECKOUT;


CREATE TABLE `TB_CHECKOUT` (
  `co_checkout` int(11) NOT NULL AUTO_INCREMENT,
  `nu_visitas_total` int(11) DEFAULT NULL,
  `dt_ultima_visita` datetime DEFAULT NULL,
  PRIMARY KEY (`co_checkout`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





DROP TABLE IF EXISTS TB_CLIENTE;


CREATE TABLE `TB_CLIENTE` (
  `co_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `st_status` varchar(1) DEFAULT 'A' COMMENT 'A - Ativo / I - Inativo\n',
  `no_apelido` varchar(45) DEFAULT NULL,
  `ds_observacao` text DEFAULT NULL,
  `st_receber_email_agendamento` varchar(1) DEFAULT 'S' COMMENT 'S - Sim / N - Não',
  `st_lembrete_horario_agendamento` varchar(1) DEFAULT 'S' COMMENT 'S - Sim / N - Não',
  `st_sms_marketing` varchar(1) DEFAULT 'S' COMMENT 'S - Sim / N - Não',
  `st_email_marketing` varchar(1) DEFAULT 'S' COMMENT 'S - Sim / N - Não',
  `nu_como_conheceu` varchar(1) DEFAULT NULL COMMENT 'ComoConheceuEnum',
  `co_assinante` int(11) NOT NULL,
  `co_pessoa` int(11) NOT NULL,
  PRIMARY KEY (`co_cliente`,`co_assinante`,`co_pessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





DROP TABLE IF EXISTS TB_CLIQUE;


CREATE TABLE `TB_CLIQUE` (
  `co_clique` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `co_botao` int(11) NOT NULL,
  PRIMARY KEY (`co_clique`,`co_botao`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;


INSERT INTO TB_CLIQUE VALUES('1','2021-06-23 19:10:46','2');

INSERT INTO TB_CLIQUE VALUES('2','2021-06-23 19:14:55','10');

INSERT INTO TB_CLIQUE VALUES('3','2021-06-23 19:15:09','10');

INSERT INTO TB_CLIQUE VALUES('4','2021-06-23 19:15:22','11');

INSERT INTO TB_CLIQUE VALUES('5','2021-06-23 23:05:23','17');

INSERT INTO TB_CLIQUE VALUES('6','2021-06-23 23:05:33','13');

INSERT INTO TB_CLIQUE VALUES('7','2021-06-23 23:06:34','17');

INSERT INTO TB_CLIQUE VALUES('8','2021-06-23 23:06:59','15');

INSERT INTO TB_CLIQUE VALUES('9','2021-06-23 23:12:25','3');

INSERT INTO TB_CLIQUE VALUES('10','2021-06-23 23:13:05','3');

INSERT INTO TB_CLIQUE VALUES('11','2021-06-23 23:14:35','16');

INSERT INTO TB_CLIQUE VALUES('12','2021-06-23 23:30:44','16');

INSERT INTO TB_CLIQUE VALUES('13','2021-06-23 23:30:49','6');

INSERT INTO TB_CLIQUE VALUES('14','2021-06-23 23:30:56','16');

INSERT INTO TB_CLIQUE VALUES('15','2021-06-23 23:31:01','5');

INSERT INTO TB_CLIQUE VALUES('16','2021-06-23 23:31:03','6');

INSERT INTO TB_CLIQUE VALUES('17','2021-06-23 23:31:40','15');

INSERT INTO TB_CLIQUE VALUES('18','2021-06-24 00:19:03','6');

INSERT INTO TB_CLIQUE VALUES('19','2021-06-24 00:19:07','16');

INSERT INTO TB_CLIQUE VALUES('20','2021-06-24 00:19:10','17');

INSERT INTO TB_CLIQUE VALUES('21','2021-07-03 12:39:43','2');

INSERT INTO TB_CLIQUE VALUES('22','2021-07-05 10:51:07','1');

INSERT INTO TB_CLIQUE VALUES('23','2021-07-05 10:52:39','1');

INSERT INTO TB_CLIQUE VALUES('24','2021-07-05 10:52:41','2');

INSERT INTO TB_CLIQUE VALUES('25','2021-07-05 10:52:54','4');

INSERT INTO TB_CLIQUE VALUES('26','2021-07-05 10:53:46','2');

INSERT INTO TB_CLIQUE VALUES('27','2021-07-05 10:53:54','6');

INSERT INTO TB_CLIQUE VALUES('28','2021-07-05 10:59:41','13');

INSERT INTO TB_CLIQUE VALUES('29','2021-07-05 11:01:03','4');

INSERT INTO TB_CLIQUE VALUES('30','2021-07-05 18:50:08','13');

INSERT INTO TB_CLIQUE VALUES('31','2021-07-05 18:56:07','16');

INSERT INTO TB_CLIQUE VALUES('32','2021-07-05 19:35:16','17');

INSERT INTO TB_CLIQUE VALUES('33','2021-08-02 17:53:42','2');




DROP TABLE IF EXISTS TB_CONTATO;


CREATE TABLE `TB_CONTATO` (
  `co_contato` int(11) NOT NULL AUTO_INCREMENT,
  `nu_tel1` varchar(15) DEFAULT NULL,
  `nu_tel2` varchar(15) DEFAULT NULL,
  `nu_tel3` varchar(15) DEFAULT NULL,
  `nu_tel_0800` varchar(30) DEFAULT NULL,
  `ds_email` varchar(150) DEFAULT NULL,
  `ds_site` varchar(100) DEFAULT NULL,
  `ds_facebook` varchar(90) DEFAULT NULL,
  `ds_twitter` varchar(90) DEFAULT NULL,
  `ds_instagram` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`co_contato`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;


INSERT INTO TB_CONTATO VALUES('1','61993274991','6130826060','0','','sisbela@gmail.com','','','','');

INSERT INTO TB_CONTATO VALUES('2','61993055454','','','','moita@hotmail.com','','','','');

INSERT INTO TB_CONTATO VALUES('3','6193394999','','','','marcelo.moita@gmail.com','','','','');

INSERT INTO TB_CONTATO VALUES('4','61983576841','','','','jebengacoiffer@gmail.com.br','','','','');




DROP TABLE IF EXISTS TB_CONTROLLER;


CREATE TABLE `TB_CONTROLLER` (
  `co_controller` int(11) NOT NULL AUTO_INCREMENT,
  `no_controller` varchar(60) DEFAULT NULL,
  `ds_class_icon` varchar(30) DEFAULT NULL COMMENT 'Classe do Ícone',
  PRIMARY KEY (`co_controller`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;


INSERT INTO TB_CONTROLLER VALUES('1','Gestão','clip-data');

INSERT INTO TB_CONTROLLER VALUES('2','Auditoria','fa fa-crosshairs');

INSERT INTO TB_CONTROLLER VALUES('3','Acesso','clip-connection-2');

INSERT INTO TB_CONTROLLER VALUES('4','Funcionalidade','fa fa-outdent');

INSERT INTO TB_CONTROLLER VALUES('5','Perfil','clip-stack-empty');

INSERT INTO TB_CONTROLLER VALUES('6','Usuário','fa fa-group');

INSERT INTO TB_CONTROLLER VALUES('7','Visita','clip-airplane');

INSERT INTO TB_CONTROLLER VALUES('8','Plano','clip-banknote');

INSERT INTO TB_CONTROLLER VALUES('9','Assinante','clip-user-5');

INSERT INTO TB_CONTROLLER VALUES('10','Agenda','fa fa-calendar');

INSERT INTO TB_CONTROLLER VALUES('11','Relatorio','fa fa-clipboard');

INSERT INTO TB_CONTROLLER VALUES('12','Suporte','fa fa-envelope');




DROP TABLE IF EXISTS TB_CRONS;


CREATE TABLE `TB_CRONS` (
  `co_cron` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `no_cron` varchar(70) DEFAULT NULL,
  `ds_sql` text DEFAULT NULL,
  PRIMARY KEY (`co_cron`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





DROP TABLE IF EXISTS TB_EMPRESA;


CREATE TABLE `TB_EMPRESA` (
  `co_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `no_empresa` varchar(250) DEFAULT NULL COMMENT 'Razão Social\n',
  `no_fantasia` varchar(150) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `nu_cnpj` varchar(20) DEFAULT NULL,
  `nu_insc_estadual` varchar(20) DEFAULT NULL,
  `ds_observacao` text DEFAULT NULL,
  `st_status` varchar(1) DEFAULT NULL,
  `co_pessoa` int(11) NOT NULL COMMENT 'Pessoa responsável pela empresa\n',
  `co_endereco` int(11) NOT NULL,
  `co_contato` int(11) NOT NULL,
  `co_imagem` int(11) NOT NULL,
  PRIMARY KEY (`co_empresa`,`co_pessoa`,`co_endereco`,`co_contato`,`co_imagem`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;


INSERT INTO TB_EMPRESA VALUES('1','','Cabelos Hair','2020-04-11 18:29:33','','','','','0','3','0','0');

INSERT INTO TB_EMPRESA VALUES('2','','Moitaa coiffer','2020-04-11 18:35:42','','','','','0','2','0','0');

INSERT INTO TB_EMPRESA VALUES('3','','Jubenga Coiffer','2020-04-13 17:01:03','','','','','0','5','0','0');




DROP TABLE IF EXISTS TB_ENDERECO;


CREATE TABLE `TB_ENDERECO` (
  `co_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `ds_endereco` varchar(150) DEFAULT NULL,
  `ds_complemento` varchar(100) DEFAULT NULL,
  `ds_bairro` varchar(80) DEFAULT NULL,
  `nu_cep` varchar(12) DEFAULT NULL,
  `no_cidade` varchar(80) DEFAULT NULL,
  `sg_uf` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`co_endereco`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;


INSERT INTO TB_ENDERECO VALUES('1','qr 403 conjunto 10 casa 28','','Samambaia Norte','72319111','Brasília','DF');

INSERT INTO TB_ENDERECO VALUES('2','','','','','','');

INSERT INTO TB_ENDERECO VALUES('3','','','','','','');

INSERT INTO TB_ENDERECO VALUES('4','','','','','','');

INSERT INTO TB_ENDERECO VALUES('5','','','','','','');




DROP TABLE IF EXISTS TB_FUNCIONALIDADE;


CREATE TABLE `TB_FUNCIONALIDADE` (
  `co_funcionalidade` int(11) NOT NULL AUTO_INCREMENT,
  `no_funcionalidade` varchar(150) NOT NULL,
  `ds_action` varchar(120) DEFAULT NULL,
  `st_status` varchar(1) DEFAULT 'A' COMMENT '''A - Ativo / I - Inativo''',
  `st_menu` varchar(1) DEFAULT 'S' COMMENT 'S - Sim / N - Não (Se apresenta no menu)',
  `co_controller` int(11) NOT NULL,
  PRIMARY KEY (`co_funcionalidade`,`co_controller`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;


INSERT INTO TB_FUNCIONALIDADE VALUES('1','Perfil Master','PerfilMaster','A','S','0');

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

INSERT INTO TB_FUNCIONALIDADE VALUES('12','Dados Complementares Assinante','DadosComplementaresAssinante','A','S','9');

INSERT INTO TB_FUNCIONALIDADE VALUES('13','Listar Visita','ListarVisita','A','S','7');

INSERT INTO TB_FUNCIONALIDADE VALUES('14','Config Gestao','ConfigGestao','A','S','1');

INSERT INTO TB_FUNCIONALIDADE VALUES('15','Gerar Entidades Gestao','GerarEntidadesGestao','A','S','1');

INSERT INTO TB_FUNCIONALIDADE VALUES('16','Gerar Backup Gestao','GerarBackupGestao','A','S','1');

INSERT INTO TB_FUNCIONALIDADE VALUES('17','Listar Acesso','ListarAcesso','A','S','3');

INSERT INTO TB_FUNCIONALIDADE VALUES('18','Listar Plano','ListarPlano','A','S','8');

INSERT INTO TB_FUNCIONALIDADE VALUES('19','Cadastro Plano','CadastroPlano','A','S','8');

INSERT INTO TB_FUNCIONALIDADE VALUES('20','Listar Assinante','ListarAssinante','A','S','9');

INSERT INTO TB_FUNCIONALIDADE VALUES('21','Cadastro Assinante','CadastroAssinante','A','N','9');

INSERT INTO TB_FUNCIONALIDADE VALUES('22','Pre Projeto Gestao','PreProjetoGestao','A','S','1');

INSERT INTO TB_FUNCIONALIDADE VALUES('23','Acompanhar Projeto Gestao','AcompanharProjetoGestao','A','N','1');

INSERT INTO TB_FUNCIONALIDADE VALUES('24','Limpar Banco Gestao','LimparBancoGestao','A','S','1');

INSERT INTO TB_FUNCIONALIDADE VALUES('25','Meu Plano Assinante','MeuPlanoAssinante','A','S','9');

INSERT INTO TB_FUNCIONALIDADE VALUES('26','Calendário','Agendamento','A','S','10');

INSERT INTO TB_FUNCIONALIDADE VALUES('27','Historico agendamento','HistoricoAgendamento','A','N','10');

INSERT INTO TB_FUNCIONALIDADE VALUES('28','Crons','CronsGestao','A','S','1');

INSERT INTO TB_FUNCIONALIDADE VALUES('29','Minificação','MinificacaoGestao','A','S','1');

INSERT INTO TB_FUNCIONALIDADE VALUES('30','Gráfico','GraficoRelatorio','A','S','11');

INSERT INTO TB_FUNCIONALIDADE VALUES('31','Listar Suporte','ListarSuporte','A','S','12');

INSERT INTO TB_FUNCIONALIDADE VALUES('32','Cadastro Suporte','CadastroSuporte','A','N','12');

INSERT INTO TB_FUNCIONALIDADE VALUES('33','Deleta Suporte','DeletaSuporte','A','N','12');

INSERT INTO TB_FUNCIONALIDADE VALUES('34','Renova Plano Assinante','RenovaPlanoAssinante','A','S','9');

INSERT INTO TB_FUNCIONALIDADE VALUES('35','Detalhar Assinatura Assinante','DetalharAssinaturaAssinante','A','N','9');

INSERT INTO TB_FUNCIONALIDADE VALUES('36','Notificação PagSeguro','NotificacaoPagSeguro','A','S','9');

INSERT INTO TB_FUNCIONALIDADE VALUES('37','Botões Site','ListarBotao','A','S','1');




DROP TABLE IF EXISTS TB_HISTORICO_PAG_ASSINATURA;


CREATE TABLE `TB_HISTORICO_PAG_ASSINATURA` (
  `co_historico_pag_assinatura` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_acao` varchar(100) DEFAULT NULL,
  `ds_usuario` varchar(100) DEFAULT NULL,
  `st_pagamento` int(1) DEFAULT NULL COMMENT '0 - Pendente / 1 - Aguardando pagamento / 2 - Em análise / 3 - Pago / 4 - Disponível / 5 - Em disputa / 6 - Devolvida / 7 - Cancelada\n',
  `co_plano_assinante_assinatura` int(11) NOT NULL,
  PRIMARY KEY (`co_historico_pag_assinatura`,`co_plano_assinante_assinatura`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;


INSERT INTO TB_HISTORICO_PAG_ASSINATURA VALUES('1','2020-04-11 18:29:34','Plano Grátis','Usuário SisBela Iniciou o plano de experiência de 15 Dias.','3','1');

INSERT INTO TB_HISTORICO_PAG_ASSINATURA VALUES('2','2020-04-11 18:35:42','Plano Grátis','Usuário SisBela Iniciou o plano de experiência de 15 Dias.','3','2');

INSERT INTO TB_HISTORICO_PAG_ASSINATURA VALUES('3','2020-04-13 17:01:04','Plano Grátis','Usuário SisBela Iniciou o plano de experiência de 15 Dias.','3','3');

INSERT INTO TB_HISTORICO_PAG_ASSINATURA VALUES('4','2020-04-24 20:48:52','Inicia o pagamento','MARCELO MOITA Iniciou o pagamento','0','4');

INSERT INTO TB_HISTORICO_PAG_ASSINATURA VALUES('5','2020-04-24 20:48:55','Mudou para o Status do pagamento de Aguardando pagamento','Retorno da operadora do pagamento','1','4');

INSERT INTO TB_HISTORICO_PAG_ASSINATURA VALUES('6','2020-04-24 20:50:09','Mudou para o Status do pagamento de Pago ','Retorno da operadora do pagamento','3','4');

INSERT INTO TB_HISTORICO_PAG_ASSINATURA VALUES('7','2021-03-24 11:56:56','Inicia o pagamento','MARCELO MOITA Iniciou o pagamento','0','5');

INSERT INTO TB_HISTORICO_PAG_ASSINATURA VALUES('8','2021-03-24 11:57:01','Mudou o Status do pagamento para Aguardando pagamento','Retorno da operadora do pagamento','1','5');

INSERT INTO TB_HISTORICO_PAG_ASSINATURA VALUES('14','2021-08-02 18:37:11','Inicia o pagamento','Moita Marcelo Iniciou o pagamento','0','11');

INSERT INTO TB_HISTORICO_PAG_ASSINATURA VALUES('15','2021-08-02 18:37:17','Mudou o Status do pagamento para Aguardando pagamento','Retorno da operadora do pagamento','1','11');




DROP TABLE IF EXISTS TB_HISTORICO_SUPORTE;


CREATE TABLE `TB_HISTORICO_SUPORTE` (
  `co_historico_suporte` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_mensagem` text DEFAULT NULL,
  `st_lido` varchar(1) DEFAULT 'N' COMMENT 'S - Sim / N - Não',
  `co_suporte` int(11) NOT NULL,
  `co_usuario` int(10) NOT NULL,
  `co_imagem` int(10) unsigned NOT NULL COMMENT 'Chave do Anexo.',
  PRIMARY KEY (`co_historico_suporte`,`co_suporte`,`co_usuario`,`co_imagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





DROP TABLE IF EXISTS TB_IMAGEM;


CREATE TABLE `TB_IMAGEM` (
  `co_imagem` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ds_caminho` varchar(150) NOT NULL,
  PRIMARY KEY (`co_imagem`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


INSERT INTO TB_IMAGEM VALUES('1','leonardo-m-c-bessa-56e8920c23ab66.jpg');




DROP TABLE IF EXISTS TB_IMAGEM_ASSINANTE;


CREATE TABLE `TB_IMAGEM_ASSINANTE` (
  `co_imagem_assinante` int(10) NOT NULL AUTO_INCREMENT,
  `co_assinante` int(11) NOT NULL,
  `co_imagem` int(10) unsigned NOT NULL,
  PRIMARY KEY (`co_imagem_assinante`,`co_assinante`,`co_imagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





DROP TABLE IF EXISTS TB_PACOTE;


CREATE TABLE `TB_PACOTE` (
  `co_pacote` int(11) NOT NULL AUTO_INCREMENT,
  `no_pacote` varchar(50) DEFAULT NULL,
  `ds_descricao` text DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_lancamento` date DEFAULT NULL,
  PRIMARY KEY (`co_pacote`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


INSERT INTO TB_PACOTE VALUES('1','Assinante','Gestão do assinante no sistema da beleza','2018-07-30 14:00:00','2018-11-02');

INSERT INTO TB_PACOTE VALUES('2','Principal','Onde consta todas as funcionalidades padrões e básicas do sistema','2018-07-30 14:00:00','2018-11-02');




DROP TABLE IF EXISTS TB_PERFIL;


CREATE TABLE `TB_PERFIL` (
  `co_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `no_perfil` varchar(45) NOT NULL COMMENT 'Nome do Perfil',
  `st_status` varchar(1) NOT NULL DEFAULT 'A' COMMENT '''A - Ativo / I - Inativo''',
  PRIMARY KEY (`co_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


INSERT INTO TB_PERFIL VALUES('1','Master','A');

INSERT INTO TB_PERFIL VALUES('2','Gestor','A');

INSERT INTO TB_PERFIL VALUES('3','Colaborador','A');

INSERT INTO TB_PERFIL VALUES('4','Gerente','A');




DROP TABLE IF EXISTS TB_PERFIL_ASSINANTE;


CREATE TABLE `TB_PERFIL_ASSINANTE` (
  `co_perfil_assinante` int(11) NOT NULL AUTO_INCREMENT,
  `no_perfil` varchar(45) DEFAULT NULL,
  `st_status` varchar(1) DEFAULT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_perfil_assinante`,`co_assinante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





DROP TABLE IF EXISTS TB_PERFIL_FUNCIONALIDADE;


CREATE TABLE `TB_PERFIL_FUNCIONALIDADE` (
  `co_perfil_funcionalidade` int(11) NOT NULL AUTO_INCREMENT,
  `co_funcionalidade` int(11) NOT NULL,
  `co_perfil` int(11) NOT NULL,
  `co_perfil_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_perfil_funcionalidade`,`co_funcionalidade`,`co_perfil`,`co_perfil_assinante`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;


INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('1','1','1','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('2','27','2','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('3','26','2','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('4','25','2','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('5','12','2','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('6','11','2','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('7','6','2','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('8','5','2','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('10','27','3','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('11','26','3','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('12','11','3','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('13','6','3','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('22','27','4','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('23','26','4','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('24','12','4','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('25','11','4','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('26','6','4','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('27','5','4','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('29','4','4','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('30','4','3','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('31','4','2','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('32','30','2','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('33','31','4','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('34','31','3','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('35','31','2','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('36','32','4','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('37','32','3','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('38','32','2','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('39','33','4','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('40','33','3','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('41','33','2','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('42','34','4','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('43','34','2','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('44','35','4','0');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('45','35','2','0');




DROP TABLE IF EXISTS TB_PESSOA;


CREATE TABLE `TB_PESSOA` (
  `co_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nu_cpf` varchar(15) DEFAULT NULL,
  `no_pessoa` varchar(100) DEFAULT NULL,
  `nu_rg` varchar(45) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `st_sexo` varchar(1) DEFAULT NULL COMMENT 'M - Masculino ou F - Feminino',
  `co_endereco` int(11) NOT NULL,
  `co_contato` int(11) NOT NULL,
  `co_imagem` int(10) NOT NULL,
  PRIMARY KEY (`co_pessoa`,`co_endereco`,`co_contato`,`co_imagem`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;


INSERT INTO TB_PESSOA VALUES('1','','Usuário Teste','','2019-10-31 00:00:00','','M','1','1','1');

INSERT INTO TB_PESSOA VALUES('2','04804195157','MARCELO MOITA','','2020-04-11 18:29:33','','','4','2','0');

INSERT INTO TB_PESSOA VALUES('3','','Moita Marcelo','','2020-04-11 18:35:42','','','0','3','0');

INSERT INTO TB_PESSOA VALUES('4','','Juju Beleza','','2020-04-13 17:01:03','','','0','4','0');




DROP TABLE IF EXISTS TB_PLANO;


CREATE TABLE `TB_PLANO` (
  `co_plano` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `no_plano` varchar(100) DEFAULT NULL,
  `nu_mes_ativo` int(1) DEFAULT NULL COMMENT 'Número de meses ativo do plano (1, 3, 6, 12 e 24)',
  `st_status` varchar(1) DEFAULT 'A' COMMENT 'Status do plano A - Ativo / I - Inativo',
  PRIMARY KEY (`co_plano`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;


INSERT INTO TB_PLANO VALUES('1','2018-07-31 10:17:46','Padrão','1','A');

INSERT INTO TB_PLANO VALUES('2','2020-01-29 18:49:51','Mensal','1','A');

INSERT INTO TB_PLANO VALUES('3','2020-01-29 18:59:12','Trimestral','3','I');

INSERT INTO TB_PLANO VALUES('4','2020-01-29 19:00:40','Semestral','6','A');

INSERT INTO TB_PLANO VALUES('5','2020-01-29 19:01:53','Anual','12','A');

INSERT INTO TB_PLANO VALUES('6','2020-01-29 19:03:13','Bienal','24','I');

INSERT INTO TB_PLANO VALUES('7','2020-03-18 10:39:16','Trienal','36','I');

INSERT INTO TB_PLANO VALUES('8','2021-08-02 17:53:18','Novidades','1','I');




DROP TABLE IF EXISTS TB_PLANO_ASSINANTE;


CREATE TABLE `TB_PLANO_ASSINANTE` (
  `co_plano_assinante` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Tabela de Histórico de dados do Plano',
  `nu_valor` decimal(8,2) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_observacao` text DEFAULT NULL,
  `co_plano` int(11) NOT NULL,
  PRIMARY KEY (`co_plano_assinante`,`co_plano`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;


INSERT INTO TB_PLANO_ASSINANTE VALUES('1','0.00','2018-07-31 10:17:46','Plano Padrão','1');

INSERT INTO TB_PLANO_ASSINANTE VALUES('2','29.90','2020-03-18 10:33:16','Por 1 meses','2');

INSERT INTO TB_PLANO_ASSINANTE VALUES('3','79.90','2020-03-18 10:33:46','Por 3 meses','3');

INSERT INTO TB_PLANO_ASSINANTE VALUES('4','139.90','2020-03-18 10:34:07','Por 6 Meses','4');

INSERT INTO TB_PLANO_ASSINANTE VALUES('5','249.90','2020-03-18 10:35:36','Por 12 Meses','5');

INSERT INTO TB_PLANO_ASSINANTE VALUES('6','449.90','2020-03-18 10:35:18','Por 24 Meses','6');

INSERT INTO TB_PLANO_ASSINANTE VALUES('7','599.90','2020-03-18 10:39:16','Por 36 Meses','7');

INSERT INTO TB_PLANO_ASSINANTE VALUES('8','599.90','2021-06-17 17:04:49','Por 36 Meses','7');

INSERT INTO TB_PLANO_ASSINANTE VALUES('9','449.90','2021-06-17 17:04:57','Por 24 Meses','6');

INSERT INTO TB_PLANO_ASSINANTE VALUES('10','187.97','2021-06-17 17:05:21','Por 12 Meses','5');

INSERT INTO TB_PLANO_ASSINANTE VALUES('11','127.97','2021-06-17 17:05:34','Por 6 Meses','4');

INSERT INTO TB_PLANO_ASSINANTE VALUES('12','79.90','2021-06-17 17:05:40','Por 3 meses','3');

INSERT INTO TB_PLANO_ASSINANTE VALUES('13','27.97','2021-06-17 17:05:52','Por 1 meses','2');

INSERT INTO TB_PLANO_ASSINANTE VALUES('14','599.97','2021-08-02 17:51:58','Por 36 Meses','7');

INSERT INTO TB_PLANO_ASSINANTE VALUES('15','599.97','2021-08-02 17:52:40','Por 36 Meses','7');

INSERT INTO TB_PLANO_ASSINANTE VALUES('16','0.99','2021-08-02 17:53:18','','8');

INSERT INTO TB_PLANO_ASSINANTE VALUES('17','0.99','2021-08-02 17:54:00','','8');




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
  `ds_link_boleto` text DEFAULT 'null' COMMENT 'Link do Boleto que retorno da PagSeguro',
  `nu_filiais` int(11) DEFAULT 0 COMMENT 'Número de filiais para a assinatura',
  `co_plano_assinante_assinatura_ativo` int(11) DEFAULT 0 COMMENT 'Número do co_plano_assinante_assinatura que esta ativo',
  `st_status` varchar(1) DEFAULT 'I' COMMENT 'A - Ativo / I - Inativo',
  `ds_code_transacao` varchar(80) DEFAULT 'null' COMMENT 'Code da transação do PagSeguro',
  `nu_valor_assinatura` decimal(8,2) DEFAULT NULL COMMENT 'Valor final da assinatura',
  `co_assinante` int(11) NOT NULL,
  `co_plano_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_plano_assinante_assinatura`,`co_assinante`,`co_plano_assinante`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;


INSERT INTO TB_PLANO_ASSINANTE_ASSINATURA VALUES('1','2020-04-11 18:29:34','2020-04-26','','','3','2020-04-11 18:29:34','','','','0','0','I','null','0.00','1','1');

INSERT INTO TB_PLANO_ASSINANTE_ASSINATURA VALUES('2','2020-04-11 18:35:42','2020-04-26','','','3','2020-04-11 18:35:42','','','','0','0','A','null','0.00','2','1');

INSERT INTO TB_PLANO_ASSINANTE_ASSINATURA VALUES('3','2020-04-13 17:01:04','2020-04-28','','','3','2020-04-13 17:01:04','','','','0','0','A','null','0.00','3','1');

INSERT INTO TB_PLANO_ASSINANTE_ASSINATURA VALUES('4','2020-04-24 20:48:52','2020-10-26','2020-04-24 20:50:09','5','3','2020-04-24 20:50:09','3.19','66.71','https://sandbox.pagseguro.uol.com.br/checkout/payment/booklet/print.jhtml?c=dc32d79804b4792135fdf414dc5b8bde71bdbe5abc6f9198850cbcc0f58ca6f8c51fa4a9e8452e21','0','1','A','1416BF63-2C4D-40CE-8DC9-D0050F281A5D','69.90','1','4');

INSERT INTO TB_PLANO_ASSINANTE_ASSINATURA VALUES('5','2021-03-24 11:56:56','2020-11-26','','5','1','2021-03-24 11:57:01','1.59','28.31','https://sandbox.pagseguro.uol.com.br/checkout/payment/booklet/print.jhtml?c=cf048c50827b4ca54f151c24101678ed2f79652ee39aea3e31a5aedba857a890c48b41754b5c6b1c','0','4','I','EAFFE1DE-25A7-41F8-B825-420C272F5366','29.90','1','2');

INSERT INTO TB_PLANO_ASSINANTE_ASSINATURA VALUES('11','2021-08-02 18:37:11','2021-04-26','','5','1','2021-08-02 18:37:17','7.90','180.07','https://sandbox.pagseguro.uol.com.br/checkout/payment/booklet/print.jhtml?c=aaf6480ac797fa3c8b616e4c8268f6928a55911ca955d9a7867ea517fc887b51ebae6017dc1a22d1','0','2','I','76C6DB19-2E89-45B9-A4DF-D86246EE951E','187.97','2','10');




DROP TABLE IF EXISTS TB_PLANO_PACOTE;


CREATE TABLE `TB_PLANO_PACOTE` (
  `co_plano_pacote` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Planos do Módulo',
  `co_plano` int(11) NOT NULL,
  `co_pacote` int(11) NOT NULL,
  PRIMARY KEY (`co_plano_pacote`,`co_plano`,`co_pacote`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;


INSERT INTO TB_PLANO_PACOTE VALUES('1','1','1');

INSERT INTO TB_PLANO_PACOTE VALUES('2','1','2');

INSERT INTO TB_PLANO_PACOTE VALUES('17','6','1');

INSERT INTO TB_PLANO_PACOTE VALUES('18','6','2');

INSERT INTO TB_PLANO_PACOTE VALUES('19','5','1');

INSERT INTO TB_PLANO_PACOTE VALUES('20','5','2');

INSERT INTO TB_PLANO_PACOTE VALUES('21','4','1');

INSERT INTO TB_PLANO_PACOTE VALUES('22','4','2');

INSERT INTO TB_PLANO_PACOTE VALUES('23','3','1');

INSERT INTO TB_PLANO_PACOTE VALUES('24','3','2');

INSERT INTO TB_PLANO_PACOTE VALUES('25','2','1');

INSERT INTO TB_PLANO_PACOTE VALUES('26','2','2');

INSERT INTO TB_PLANO_PACOTE VALUES('29','7','1');

INSERT INTO TB_PLANO_PACOTE VALUES('30','7','2');

INSERT INTO TB_PLANO_PACOTE VALUES('33','8','1');

INSERT INTO TB_PLANO_PACOTE VALUES('34','8','2');




DROP TABLE IF EXISTS TB_PRECO_SERVICO;


CREATE TABLE `TB_PRECO_SERVICO` (
  `co_preco_servico` int(11) NOT NULL AUTO_INCREMENT,
  `nu_valor` decimal(6,2) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_observacao` varchar(120) DEFAULT NULL,
  `co_servico` int(11) NOT NULL,
  `co_usuario` int(10) NOT NULL,
  PRIMARY KEY (`co_preco_servico`,`co_servico`,`co_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





DROP TABLE IF EXISTS TB_PROFISSIONAL;


CREATE TABLE `TB_PROFISSIONAL` (
  `co_profissional` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_cor_agenda` varchar(7) DEFAULT NULL COMMENT 'Valor Hexadecimal',
  `st_assistente` varchar(1) DEFAULT 'S' COMMENT 'S - Sim / N - Não * Se pode ser assitente de outro profissional',
  `ds_sobre` text DEFAULT NULL,
  `no_apelido` varchar(45) DEFAULT NULL,
  `ds_motivo` text DEFAULT NULL,
  `st_agenda` varchar(1) DEFAULT 'S' COMMENT 'S - Sim / N - Não * Se possui agenda',
  `st_agenda_online` varchar(1) DEFAULT 'S' COMMENT 'S - Sim / N - Não * Se pode ser ter agendamento on line',
  `st_status` varchar(1) DEFAULT 'A' COMMENT 'A - Ativo / I - Inativo',
  `tp_contratacao` int(1) DEFAULT NULL COMMENT '1 - Contrato de trabalho CLT / 2 - Contrato de trabalho por prazo determinado / 3 - Sem vínculo empregatício / 4 - Contrato de Locação de espaço / 5 - Outros',
  `dt_admissao` date DEFAULT NULL,
  `dt_demissao` date DEFAULT NULL,
  `co_imagem` int(10) unsigned NOT NULL,
  `co_pessoa` int(10) unsigned NOT NULL,
  `co_usuario` int(10) NOT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_profissional`,`co_imagem`,`co_pessoa`,`co_usuario`,`co_assinante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





DROP TABLE IF EXISTS TB_SERVICO;


CREATE TABLE `TB_SERVICO` (
  `co_servico` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `st_status` varchar(1) DEFAULT 'A' COMMENT 'A - Ativo / I - Inativo',
  `st_assistente` varchar(1) DEFAULT NULL COMMENT 'S - Sim / N - Não * Se precisa ter um assitente',
  `no_servico` varchar(100) DEFAULT NULL,
  `nu_duracao` int(3) DEFAULT NULL,
  `ds_descricao` text DEFAULT NULL,
  `co_categoria_servico` int(11) NOT NULL,
  `co_imagem` int(10) NOT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_servico`,`co_categoria_servico`,`co_imagem`,`co_assinante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





DROP TABLE IF EXISTS TB_STATUS_AGENDA;


CREATE TABLE `TB_STATUS_AGENDA` (
  `co_status_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `st_status` int(2) DEFAULT NULL COMMENT '1 - Agendado / 2 - Confirmado / 3 - Aguardando / 4 - Em Atendimento / 5 - Cancelado / 6 - Faltou / 7 - Finalizado \n',
  `dt_inicio_agenda` datetime DEFAULT NULL,
  `dt_fim_agenda` datetime DEFAULT NULL,
  `nu_valor` decimal(8,2) DEFAULT NULL COMMENT 'Valor total do agendamento',
  `nu_duracao` int(3) DEFAULT NULL COMMENT 'Em minutos',
  `ds_observacao` text DEFAULT NULL,
  `co_cliente` int(11) NOT NULL,
  `co_agenda` int(11) NOT NULL,
  `co_usuario` int(10) NOT NULL,
  `co_profissional` int(11) NOT NULL,
  `co_servico` int(11) NOT NULL,
  PRIMARY KEY (`co_status_agenda`,`co_cliente`,`co_agenda`,`co_usuario`,`co_profissional`,`co_servico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





DROP TABLE IF EXISTS TB_SUPORTE;


CREATE TABLE `TB_SUPORTE` (
  `co_suporte` int(11) NOT NULL AUTO_INCREMENT,
  `st_status` varchar(1) DEFAULT 'A' COMMENT 'A - Ativa / I - Inativa',
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_assunto` varchar(100) DEFAULT NULL,
  `st_tipo_assunto` int(1) DEFAULT NULL COMMENT '1 - Sugestão ou Melhorias / 2 - Reclamação / 3 -  Correção no Sistema / 4 - Outros',
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_suporte`,`co_assinante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





DROP TABLE IF EXISTS TB_USUARIO;


CREATE TABLE `TB_USUARIO` (
  `co_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `ds_senha` varchar(100) NOT NULL,
  `ds_code` varchar(50) NOT NULL COMMENT 'Senha criptografada',
  `st_status` varchar(1) NOT NULL DEFAULT 'I' COMMENT '''A - Ativo / I - Inativo''',
  `st_troca_senha` varchar(1) DEFAULT 'N',
  `dt_cadastro` datetime NOT NULL,
  `co_imagem` int(10) NOT NULL,
  `co_pessoa` int(11) NOT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_usuario`,`co_imagem`,`co_pessoa`,`co_assinante`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;


INSERT INTO TB_USUARIO VALUES('1','123456**','TVRJek5EVTJLaW89','A','S','2019-10-31 00:00:00','1','1','0');

INSERT INTO TB_USUARIO VALUES('2','123456**','TVRJek5EVTJLaW89','A','N','2020-04-11 18:29:33','0','2','1');

INSERT INTO TB_USUARIO VALUES('3','123456**','TVRJek5EVTJLaW89','A','N','2020-04-11 18:35:42','0','3','2');

INSERT INTO TB_USUARIO VALUES('4','123456**','TVRJek5EVTJLaW89','A','N','2020-04-13 17:01:03','0','4','3');




DROP TABLE IF EXISTS TB_USUARIO_PERFIL;


CREATE TABLE `TB_USUARIO_PERFIL` (
  `co_usuario_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `co_usuario` int(10) NOT NULL,
  `co_perfil` int(11) NOT NULL,
  `co_perfil_assinante` int(10) NOT NULL,
  PRIMARY KEY (`co_usuario_perfil`,`co_usuario`,`co_perfil`,`co_perfil_assinante`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;


INSERT INTO TB_USUARIO_PERFIL VALUES('1','1','1','0');

INSERT INTO TB_USUARIO_PERFIL VALUES('2','2','2','0');

INSERT INTO TB_USUARIO_PERFIL VALUES('3','3','2','0');

INSERT INTO TB_USUARIO_PERFIL VALUES('4','4','2','0');

INSERT INTO TB_USUARIO_PERFIL VALUES('5','0','2','0');

INSERT INTO TB_USUARIO_PERFIL VALUES('6','0','3','0');

INSERT INTO TB_USUARIO_PERFIL VALUES('7','0','3','0');




DROP TABLE IF EXISTS TB_VISITA_CHECKOUT;


CREATE TABLE `TB_VISITA_CHECKOUT` (
  `co_visita_checkout` int(11) NOT NULL AUTO_INCREMENT,
  `co_visita` int(11) NOT NULL,
  `co_checkout` int(11) NOT NULL,
  PRIMARY KEY (`co_visita_checkout`,`co_visita`,`co_checkout`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





