-- Atualizado em: 21/05/2023 15:35:50
-- Link HOME: http://localhost/AtacadaoBessa/
-- AMBIENTE: 1
-- BANCO: maisquelucro10

CREATE DATABASE IF NOT EXISTS maisquelucro10;

USE maisquelucro10;

DROP TABLE IF EXISTS TB_ANOTACAO;


CREATE TABLE `TB_ANOTACAO` (
  `co_anotacao` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_observacao` text DEFAULT NULL,
  `ds_titulo` varchar(80) DEFAULT NULL,
  `co_historia` int(11) NOT NULL,
  PRIMARY KEY (`co_anotacao`,`co_historia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_ASSINANTE VALUES('2','2022-05-31 14:23:16','2022-06-15','N','A','M','4','5');

INSERT INTO TB_ASSINANTE VALUES('4','2022-05-31 14:39:28','2022-06-15','N','A','M','6','7');




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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_CATEGORIA_FC VALUES('1','RECEITA / FATURAMENTO','1',NULL);

INSERT INTO TB_CATEGORIA_FC VALUES('2','DESPESAS DIRETAS (cv)','2',NULL);

INSERT INTO TB_CATEGORIA_FC VALUES('3','DESPESAS INDIRETAS (cf)','3',NULL);

INSERT INTO TB_CATEGORIA_FC VALUES('4','INVESTIMENTOS','4',NULL);

INSERT INTO TB_CATEGORIA_FC VALUES('5','ENTRADAS NÃO OPERACIONAIS','5',NULL);

INSERT INTO TB_CATEGORIA_FC VALUES('6','SAÍDAS NÃO OPERACIONAIS','6',NULL);




DROP TABLE IF EXISTS TB_CATEGORIA_FC_FILHA;


CREATE TABLE `TB_CATEGORIA_FC_FILHA` (
  `co_categoria_fc_filha` int(11) NOT NULL AUTO_INCREMENT,
  `ds_texto` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_codigo` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_categoria_fc` int(11) NOT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_categoria_fc_filha`,`co_categoria_fc`,`co_assinante`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('1','Receitas Principal','1.1','1','2');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('2','Receitas setor cuidados da pela','1.2','1','2');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('3','Receitas setor cuidados da pela','1.1','1','4');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('4','Compras Consignado Lojinha','1.2','1','4');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('5','Custos tributários ou Financeiros','2.1','2','4');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('6','Custos com Fornecedores','2.2','2','4');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('7','Custos com Comissão','2.3','2','4');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('8','Despesas Financeiras','3.1','3','4');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('9','Despesas Administrativas','3.2','3','4');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('10','Despesas com Pessoal','3.3','3','4');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('11','Despesas com Materiais e Equipamentos','3.4','3','4');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('12','Investimentos em Marketing','4.1','4','4');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('13','Investimentos em Bens Materiais','4.2','4','4');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('14','Investimentos em Desenvolvimento Empresarial','4.3','4','4');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('15',' Pagamento de Empréstimos','6.1','6','4');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('16','Juros Bancários e por Atraso','6.2','6','4');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('17','Pagamento de dívidas passadas','6.3','6','4');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('18','Distribuição de Lucros','6.4','6','4');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('19','Juros de Antecipação de Recebíveis','6.5','6','4');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('20','Empréstimo','5.1','5','4');




DROP TABLE IF EXISTS TB_CATEGORIA_FC_NETA;


CREATE TABLE `TB_CATEGORIA_FC_NETA` (
  `co_categoria_fc_neta` int(11) NOT NULL AUTO_INCREMENT,
  `ds_texto` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_codigo` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_categoria_fc_filha` int(11) NOT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_categoria_fc_neta`,`co_categoria_fc_filha`,`co_assinante`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_CATEGORIA_FC_NETA VALUES('1','Receitas setor cuidados da pela','1.2.1','4','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('2','Serviço 12','1.1.1','3','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('3','Serviço 20','1.1.2','3','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('4','Simples Nacional','2.1.1','5','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('5','Taxas de Cartões','2.1.2','5','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('6','Produtos de Revenda','2.2.1','6','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('7','Produtos Uso Interno','2.2.2','6','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('8','Acessórios para venda','2.2.3','6','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('9','Aluguel de Equipamentos','2.2.4','6','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('10','Comissão para profissionais','2.3.1','7','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('11','Tarifas Bancárias','3.1.1','8','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('12','Aluguel de Máquinas de Cartão','3.1.2','8','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('13','Tarifas DOC/TED','3.1.3','8','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('14','Telefone e Internet','3.2.1','9','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('15','Celular','3.2.2','9','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('16','Energia Elétrica','3.2.3','9','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('17','Aluguel e Condomínio','3.2.4','9','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('18','Água','3.2.5','9','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('19','IPTU e Taxas Públicas','3.2.6','9','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('20','Táxi / Uber','3.2.7','9','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('21','Almoço / Supermercado / Lanches','3.2.8','9','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('22','Correios','3.2.9','9','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('23','Cartórios','3.2.10','9','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('24','Contador','3.2.11','9','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('25','Mensalidade de Softwares','3.2.12','9','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('26','Salário de Funcionários','3.3.1','10','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('27','Bolsa de Estágio','3.3.2','10','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('28','VT e VR','3.3.3','10','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('29','Rescisão','3.3.4','10','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('30','FGTS','3.3.5','10','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('31','INSS - Federação - Sindicato - IR','3.3.6','10','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('32','13º e Férias','3.3.7','10','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('33','Exames ocupacionais','3.3.8','10','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('34','Pro-Labores','3.3.9','10','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('35','Plano de Saúde','3.3.10','10','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('36','Confraternizações / Festas da Empresa','3.3.11','10','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('37','Manutenção Máquinas e Equipamentos','3.4.1','11','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('38','Serviços Técnicos em geral','3.4.2','11','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('39','Papelaria (folder, cartão visitas, etc.)','4.1.1','12','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('40','Site / internet','4.1.2','12','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('41','Mídias/ Propaganda','4.1.3','12','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('42','Prestadores de serviços de marketing','4.1.4','12','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('43','Compra de Equipamentos de Informárica','4.2.1','13','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('44','Reformas / Estrutura','4.2.2','13','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('45','Mobiliário','4.2.3','13','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('46','Consultoria','4.3.1','14','4');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('47','Treinamentos','4.3.2','14','4');




DROP TABLE IF EXISTS TB_CENTRO_CUSTO;


CREATE TABLE `TB_CENTRO_CUSTO` (
  `co_centro_custo` int(11) NOT NULL AUTO_INCREMENT,
  `no_centro_custos` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `nu_codigo` int(6) DEFAULT NULL,
  `ds_descricao` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_centro_custo`,`co_assinante`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_CENTRO_CUSTO VALUES('1','PROJETO AS',NULL,NULL,'4');

INSERT INTO TB_CENTRO_CUSTO VALUES('2','Projeto B',NULL,NULL,'4');




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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_CONTA_BANCARIA VALUES('2','2022-06-06 16:08:53','Corrente caixa','S','1','224567','4');

INSERT INTO TB_CONTA_BANCARIA VALUES('3','2022-06-06 18:22:15','Caixa Dinheiro','S','111','1','4');

INSERT INTO TB_CONTA_BANCARIA VALUES('4','2022-06-07 10:27:49','Nu Bank','S','1','224567','4');




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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_CONTATO VALUES('1','61993274991','6130826060',NULL,NULL,'maisquelucro@gmail.com',NULL,NULL,NULL,NULL);

INSERT INTO TB_CONTATO VALUES('5','32432432535',NULL,NULL,NULL,'leonardomcbessa@gmail.com',NULL,NULL,NULL,NULL);

INSERT INTO TB_CONTATO VALUES('7','13243532523',NULL,NULL,NULL,'leonardomcbessa@gmail.com',NULL,NULL,NULL,NULL);




DROP TABLE IF EXISTS TB_CONTROLLER;


CREATE TABLE `TB_CONTROLLER` (
  `co_controller` int(11) NOT NULL AUTO_INCREMENT,
  `no_controller` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_class_icon` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Classe do Ícone',
  PRIMARY KEY (`co_controller`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_CONTROLLER VALUES('1','Gestão','clip-data');

INSERT INTO TB_CONTROLLER VALUES('2','Auditoria','fa fa-crosshairs');

INSERT INTO TB_CONTROLLER VALUES('3','Acesso','clip-connection-2');

INSERT INTO TB_CONTROLLER VALUES('4','Funcionalidade','fa fa-outdent');

INSERT INTO TB_CONTROLLER VALUES('5','Perfil','clip-stack-empty');

INSERT INTO TB_CONTROLLER VALUES('6','Usuário','fa fa-group');

INSERT INTO TB_CONTROLLER VALUES('7','Visita','clip-airplane');

INSERT INTO TB_CONTROLLER VALUES('8','Relatorio','fa fa-clipboard');

INSERT INTO TB_CONTROLLER VALUES('9','Suporte','fa fa-envelope');

INSERT INTO TB_CONTROLLER VALUES('10','Financeiro','fa fa-money');

INSERT INTO TB_CONTROLLER VALUES('11','Plano','clip-banknote');

INSERT INTO TB_CONTROLLER VALUES('12','Assinante','clip-user-5');




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
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_pessoa` int(11) NOT NULL COMMENT 'Pessoa responsável pela empresa\n',
  `co_endereco` int(11) NOT NULL,
  `co_contato` int(11) NOT NULL,
  `co_imagem` int(11) NOT NULL,
  PRIMARY KEY (`co_empresa`,`co_pessoa`,`co_endereco`,`co_contato`,`co_imagem`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_EMPRESA VALUES('4',NULL,'teste 1','2022-05-31 14:23:16',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

INSERT INTO TB_EMPRESA VALUES('6',NULL,'Super Cei','2022-05-31 14:39:28',NULL,NULL,NULL,NULL,NULL,'2',NULL,NULL);




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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_ENDERECO VALUES('1','qr 10 casa 10',NULL,'Samambaia','72111111','Brasília','DF');

INSERT INTO TB_ENDERECO VALUES('2',NULL,NULL,NULL,NULL,NULL,NULL);




DROP TABLE IF EXISTS TB_FINANCEIRO;


CREATE TABLE `TB_FINANCEIRO` (
  `co_financeiro` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`co_financeiro`,`co_categoria_fc`,`co_categoria_fc_filha`,`co_categoria_fc_neta`,`co_centro_custo`,`co_conta_bancaria`,`co_representacao`,`co_usuario`,`co_assinante`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_FINANCEIRO VALUES('1','2022-06-07 10:59:20','2022-06-07','2022-06-15','298.90','298.90',NULL,'1','1','3','1','3','2','1','2','2','5','4');

INSERT INTO TB_FINANCEIRO VALUES('2','2022-06-07 11:00:47','2022-06-03',NULL,NULL,'1298.90',NULL,'1','1','3','1','3','3','1','4','1','5','4');

INSERT INTO TB_FINANCEIRO VALUES('3','2022-06-07 11:01:44','2022-06-04','2022-06-04','568.90','568.90',NULL,'1','5','3','1','4',NULL,NULL,'3',NULL,'5','4');

INSERT INTO TB_FINANCEIRO VALUES('4','2022-06-07 11:04:32','2022-06-05',NULL,NULL,'12000.00',NULL,'1','1','3','5','20',NULL,'2','4','1','5','4');

INSERT INTO TB_FINANCEIRO VALUES('5','2022-06-07 11:08:03','2022-06-05',NULL,NULL,'1222222.25',NULL,'2','1','3','6','18',NULL,NULL,'4',NULL,'5','4');

INSERT INTO TB_FINANCEIRO VALUES('6','2022-06-07 11:08:47',NULL,'2022-06-15','288.90',NULL,NULL,'2','1','1','2','5','5','1','2','1','5','4');

INSERT INTO TB_FINANCEIRO VALUES('7','2022-06-07 11:09:25',NULL,'2022-06-21','190000.00',NULL,NULL,'2','2','1','2','6','9',NULL,'4',NULL,'5','4');

INSERT INTO TB_FINANCEIRO VALUES('8','2022-06-07 11:10:04','2022-06-01',NULL,'0.00','7800.00',NULL,'2','2','3','3','9','17',NULL,'4',NULL,'5','4');

INSERT INTO TB_FINANCEIRO VALUES('9','2022-06-07 11:12:32','2022-06-04',NULL,NULL,'1875000.00',NULL,'1','1','3','1','4','1',NULL,'4',NULL,'5','4');




DROP TABLE IF EXISTS TB_FUNCIONALIDADE;


CREATE TABLE `TB_FUNCIONALIDADE` (
  `co_funcionalidade` int(11) NOT NULL AUTO_INCREMENT,
  `no_funcionalidade` varchar(150) CHARACTER SET latin1 NOT NULL,
  `ds_action` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `st_status` varchar(1) CHARACTER SET latin1 DEFAULT 'A' COMMENT '''A - Ativo / I - Inativo''',
  `st_menu` varchar(1) CHARACTER SET latin1 DEFAULT 'S' COMMENT 'S - Sim / N - Não (Se apresenta no menu)',
  `co_controller` int(11) NOT NULL,
  PRIMARY KEY (`co_funcionalidade`,`co_controller`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


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

INSERT INTO TB_FUNCIONALIDADE VALUES('35','Fluxo Caixa','ListarFluxoCaixa','A','S','10');

INSERT INTO TB_FUNCIONALIDADE VALUES('36','Comparador','Comparador','A','S','10');

INSERT INTO TB_FUNCIONALIDADE VALUES('37','Listar Plano','ListarPlano','A','S','11');

INSERT INTO TB_FUNCIONALIDADE VALUES('38','Cadastro Plano','CadastroPlano','A','S','11');

INSERT INTO TB_FUNCIONALIDADE VALUES('39','Dados Complementares Assinante','DadosComplementaresAssinante','A','S','12');

INSERT INTO TB_FUNCIONALIDADE VALUES('40','Listar Assinante','ListarAssinante','A','S','12');

INSERT INTO TB_FUNCIONALIDADE VALUES('41','Cadastro Assinante','CadastroAssinante','A','N','12');

INSERT INTO TB_FUNCIONALIDADE VALUES('42','Meu Plano Assinante','MeuPlanoAssinante','A','S','12');

INSERT INTO TB_FUNCIONALIDADE VALUES('43','Renova Plano Assinante','RenovaPlanoAssinante','A','S','12');

INSERT INTO TB_FUNCIONALIDADE VALUES('44','Detalhar Assinatura Assinante','DetalharAssinaturaAssinante','A','N','12');

INSERT INTO TB_FUNCIONALIDADE VALUES('45','Notificação PagSeguro','NotificacaoPagSeguro','A','S','12');




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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_HIST_SALDO_CB VALUES('1','2022-06-06 16:08:53',NULL,NULL,'139.90','oo','2','5');

INSERT INTO TB_HIST_SALDO_CB VALUES('2','2022-06-06 18:22:15',NULL,NULL,'238.50',NULL,'3','5');

INSERT INTO TB_HIST_SALDO_CB VALUES('3','2022-06-07 10:27:49',NULL,NULL,'1890.99','Conta de Reserva','4','5');

INSERT INTO TB_HIST_SALDO_CB VALUES('4','2022-06-07 10:29:13','2','622.78','1268.21','Transferência entre contas.','4','5');

INSERT INTO TB_HIST_SALDO_CB VALUES('5','2022-06-07 10:29:13','1','622.78','861.28','transferência entre contas.','3','5');

INSERT INTO TB_HIST_SALDO_CB VALUES('6','2022-06-07 10:51:51','2','18.30','842.98','Transferência entre contas.','3','5');

INSERT INTO TB_HIST_SALDO_CB VALUES('7','2022-06-07 10:51:51','1','18.30','158.20','transferência entre contas.','2','5');

INSERT INTO TB_HIST_SALDO_CB VALUES('8','2022-06-07 11:00:46','1','12989.09','14257.30',NULL,'4','5');

INSERT INTO TB_HIST_SALDO_CB VALUES('9','2022-06-07 11:01:04','1','1298909.00','1313166.25',NULL,'4','5');

INSERT INTO TB_HIST_SALDO_CB VALUES('10','2022-06-07 11:02:37','1','568.90','1411.88','Baixa no Pagamento','3','5');

INSERT INTO TB_HIST_SALDO_CB VALUES('11','2022-06-07 11:02:37','1','298.90','457.10','Baixa no Pagamento','2','5');

INSERT INTO TB_HIST_SALDO_CB VALUES('12','2022-06-07 11:04:32','1','12000.00','1325166.25',NULL,'4','5');

INSERT INTO TB_HIST_SALDO_CB VALUES('13','2022-06-07 11:05:17','1','1298.90','1326465.12',NULL,'4','5');

INSERT INTO TB_HIST_SALDO_CB VALUES('14','2022-06-07 11:08:02','2','1222222.25','104242.90',NULL,'4','5');

INSERT INTO TB_HIST_SALDO_CB VALUES('15','2022-06-07 11:10:04','2','7800.00','96442.90',NULL,'4','5');

INSERT INTO TB_HIST_SALDO_CB VALUES('16','2022-06-07 11:12:32','1','18750.00','115192.90',NULL,'4','5');

INSERT INTO TB_HIST_SALDO_CB VALUES('17','2022-06-07 11:45:47','1','1875000.00','1990192.88',NULL,'4','5');

INSERT INTO TB_HIST_SALDO_CB VALUES('18','2022-06-07 11:56:45','2','7800.00','1982392.88',NULL,'4','5');




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
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_hist_transferencia`,`co_conta_bancaria_origem`,`co_conta_bancaria_destino`,`co_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_HIST_TRANSFERENCIA VALUES('1','2022-06-07 10:29:13','2022-06-07 10:29:13','1890.99','1268.21','238.50','861.28','622.78','4','3','5','4');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('2','2022-06-07 10:51:51','2022-06-07 10:51:51','861.28','842.98','139.90','158.20','18.30','3','2','5','4');




DROP TABLE IF EXISTS TB_HISTORIA;


CREATE TABLE `TB_HISTORIA` (
  `co_historia` int(11) NOT NULL AUTO_INCREMENT,
  `ds_titulo` varchar(80) DEFAULT NULL,
  `ds_observacao` text DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_atualizado` datetime DEFAULT NULL,
  `st_situacao` varchar(1) DEFAULT 'N' COMMENT 'N - Não iniciada / I - Iniciada / C - Concluida',
  `co_sessao` int(11) NOT NULL,
  PRIMARY KEY (`co_historia`,`co_sessao`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;


INSERT INTO TB_HISTORIA VALUES('1','Gráfico Comparação receitas/despesas','Gráfico Comparação receitas/despesas (Toda estrutura de categoria FC, período Meses)','2022-05-30 12:37:06','2022-05-30 12:37:06','N','8');

INSERT INTO TB_HISTORIA VALUES('2','Gráfico Indicadores financeiros','Gráfico Indicadores financeiros (Todos indicadores múltipla escolha) \"Período por meses\"','2022-05-30 12:37:38','2022-05-30 12:37:38','N','8');

INSERT INTO TB_HISTORIA VALUES('3','Gráfico Previsão de entradas, saídas e saldo','Gráfico Previsão de entradas, saídas e saldo a partir de hoje e atrasados','2022-05-30 12:38:00','2022-05-30 12:38:00','N','8');

INSERT INTO TB_HISTORIA VALUES('4','Saldos disponíveis','Saldos disponíveis das Contas (Data) \"Data Futuras considera os Pagamentos e recebimentos futuros\"','2022-05-30 12:38:23','2022-05-30 12:38:23','N','8');

INSERT INTO TB_HISTORIA VALUES('5','Pagamentos e recebimentos','Painel Pagamentos e recebimentos (Dia, da semana, do mês, do ano), coluna de atrasados e total','2022-05-30 12:38:43','2022-05-30 12:38:43','N','8');

INSERT INTO TB_HISTORIA VALUES('6','Meta de recebimento mensal','Painel de PE Econômico (Com Lucro) com campo para Simulação do percentual de lucro desejado','2022-05-30 12:39:09','2022-05-30 12:39:09','N','8');

INSERT INTO TB_HISTORIA VALUES('7','Ponto de equilíbrio operacional','Informação do PE','2022-05-30 12:39:38','2022-05-30 12:39:38','N','8');

INSERT INTO TB_HISTORIA VALUES('8','Cron Atualização de Status Pagamento','Cron Atualização de Status Pagamento','2022-05-30 12:40:34','2022-05-30 12:40:34','N','7');

INSERT INTO TB_HISTORIA VALUES('9','Multi Seleção dar Baixa Pagamento / Recebimento Botão','Multi Seleção dar Baixa Pagamento / Recebimento','2022-05-30 12:41:06','2022-05-30 12:41:06','C','7');

INSERT INTO TB_HISTORIA VALUES('10','Histórico de Transferências','Histórico de Transferências','2022-05-30 12:41:33','2022-05-30 12:41:33','C','7');

INSERT INTO TB_HISTORIA VALUES('11','Validação dos dados dos cadastros','Validar tipo de dados, dados obrigatórios, exclusão (Status inativar) , saldos','2022-05-30 12:42:04','2022-05-30 12:42:04','N','7');

INSERT INTO TB_HISTORIA VALUES('12','Transferência entre contas','Transferência entre contas','2022-05-30 12:42:25','2022-05-30 12:42:25','C','7');

INSERT INTO TB_HISTORIA VALUES('13','Histórico das Contas Transferências Modal cadastro de contas','Histórico das Contas Modal cadastro de contas\n2 VISÕES: Time Line e Gráficos','2022-05-30 12:42:57','2022-05-30 12:42:57','C','7');

INSERT INTO TB_HISTORIA VALUES('14','Edição e exclusão Lançamento','Edição e exclusão Lançamento','2022-05-30 12:43:25','2022-05-30 12:43:25','C','7');

INSERT INTO TB_HISTORIA VALUES('15','Listagem de Lançamentos','Listagem de Lançamentos','2022-05-30 12:43:51','2022-05-30 12:43:51','C','7');

INSERT INTO TB_HISTORIA VALUES('16','Painel de Filtros','Painel de Filtros (Períodos, Data vencimento, data realizado, categoria FC, conta, centro de custo, valor a pagar, valor pago, representação, meio de pagamento)','2022-05-30 12:44:33','2022-05-30 12:44:33','C','7');

INSERT INTO TB_HISTORIA VALUES('17','Modal Glossário','Modal Glossário (Por palavra)','2022-05-30 12:45:03','2022-05-30 12:45:03','N','7');

INSERT INTO TB_HISTORIA VALUES('18','Apresentação de Vídeos Tutoriais MODAL','Apresentação de Vídeos Tutoriais MODAL','2022-05-30 12:45:44','2022-05-30 12:45:44','N','7');

INSERT INTO TB_HISTORIA VALUES('19','Manter centro de custo','Manter centro de custo','2022-05-30 12:46:16','2022-05-30 12:46:16','C','7');

INSERT INTO TB_HISTORIA VALUES('20','Manter Representações','Manter Representações (Clientes e fornecedores)','2022-05-30 12:46:48','2022-05-30 12:46:48','C','7');

INSERT INTO TB_HISTORIA VALUES('21','Manter conta bancária','Manter conta bancária','2022-05-30 12:47:19','2022-05-30 12:51:56','C','7');

INSERT INTO TB_HISTORIA VALUES('22','Visualizar e editar Estrutura de categorias FC','Visualizar e editar Estrutura de categorias FC','2022-05-30 12:47:50','2022-05-30 12:52:29','C','7');

INSERT INTO TB_HISTORIA VALUES('23','Manter Saída','Manter de Lançamentos de Saída','2022-05-30 12:48:31','2022-05-30 12:48:31','C','7');

INSERT INTO TB_HISTORIA VALUES('24','Manter Entrada','Manter os lançamentos de entrada','2022-05-30 12:49:00','2022-05-30 12:53:14','C','7');

INSERT INTO TB_HISTORIA VALUES('25','Manter Categoria FC','Manter Categoria FC','2022-05-30 12:49:26','2022-05-30 12:49:26','C','7');

INSERT INTO TB_HISTORIA VALUES('26','Gravação e edição dos Vídeos Tutoriais','Gravação e edição dos Vídeos Tutoriais','2022-05-30 14:12:22','2022-05-30 14:12:22','N','6');

INSERT INTO TB_HISTORIA VALUES('27','Listar Fluxo de Caixa','Listar Fluxo de Caixa \nCada Linha:\nCategorias PAI e Indicadores Financeiros\nCategorias Filhas\nMatriz:\nMês / Total (Período por ano)\nesperado, realizado, analise Total AT, analise Comparativa AC','2022-05-30 14:13:27','2022-05-30 14:13:27','C','5');

INSERT INTO TB_HISTORIA VALUES('28','Painel de Filtros','Painel de Filtros (Realizado, Esperado, ano, centro de custo, Categorias Pais ou Filhas)','2022-05-30 14:13:50','2022-05-30 14:13:50','C','5');

INSERT INTO TB_HISTORIA VALUES('29','Listar dados Comparador','Listar dados Comparador','2022-05-30 14:14:28','2022-05-30 14:14:28','C','4');

INSERT INTO TB_HISTORIA VALUES('30','Painel de Filtros','Período 1 (Mês/Ano a Mês/Ano) com Período 2 (Mês/Ano a Mês/Ano) e centro de custo e Categorias Pais ou Filhas','2022-05-30 14:14:49','2022-05-30 14:14:49','C','4');

INSERT INTO TB_HISTORIA VALUES('31','Tela de análises e sugestões dos dados','Guru, génio das finanças, oráculo (Maria Clara)','2022-05-30 14:15:36','2022-05-30 14:15:36','N','3');

INSERT INTO TB_HISTORIA VALUES('32','Acelerador De Preços de Serviços','Acelerador De Preços de Serviços\ndividi história','2022-05-30 14:17:06','2022-05-30 14:17:06','N','2');

INSERT INTO TB_HISTORIA VALUES('33','Acelerador De Preços de Produtos','Acelerador De Preços de Produtos\nDividi história','2022-05-30 14:17:41','2022-05-30 14:17:41','N','2');

INSERT INTO TB_HISTORIA VALUES('34','Acelerador De Ponto de Equilíbrio','Acelerador De Ponto de Equilíbrio','2022-05-30 14:18:01','2022-05-30 14:18:01','N','2');

INSERT INTO TB_HISTORIA VALUES('35','Acelerador De Lucros','Acelerador De Lucros','2022-05-30 14:18:20','2022-05-30 14:18:20','N','2');

INSERT INTO TB_HISTORIA VALUES('36','Acelerador De Pro-labore','Acelerador De Pro-labore','2022-05-30 14:18:37','2022-05-30 14:18:37','N','2');

INSERT INTO TB_HISTORIA VALUES('37','Acelerador De Custo','Acelerador De Custo','2022-05-30 14:19:05','2022-05-30 14:19:05','N','2');

INSERT INTO TB_HISTORIA VALUES('38','Cadastro Categorias FC na mesma modal de edição','Cadastro Categorias FC na mesma modal de edição','2022-05-30 14:20:11','2022-05-30 14:20:11','N','1');

INSERT INTO TB_HISTORIA VALUES('39','Load edição e exclusão categorias FC','Load edição e exclusão categorias FC','2022-05-30 14:20:38','2022-05-30 14:20:38','N','1');

INSERT INTO TB_HISTORIA VALUES('40','Unificação dos Métodos Entrada e Saída FC','Unificação dos Métodos Entrada e Saída FC','2022-05-30 14:20:59','2022-05-30 14:20:59','N','1');

INSERT INTO TB_HISTORIA VALUES('41','Histórico Lançamento','Histórico Lançamento','2022-05-30 14:21:21','2022-05-30 14:21:21','N','1');

INSERT INTO TB_HISTORIA VALUES('42','Lançamentos Esconder/Apresentar Colunas','Lançamentos Esconder/Apresentar Colunas','2022-05-30 14:21:46','2022-05-30 14:21:46','N','1');

INSERT INTO TB_HISTORIA VALUES('43','Histórico Conta Bancária','Histórico Conta Bancária (Entradas / Saídas / Transferências)','2022-05-30 14:22:13','2022-05-30 14:22:13','N','1');

INSERT INTO TB_HISTORIA VALUES('44','Melhorias no filtro de pesquisa','Campo de intervalo de valor, múltiplas categorias, múltiplas contas, múltiplos centro de custos , múltiplas representações e múltiplas formas de pagamento','2022-05-30 14:22:37','2022-05-30 14:22:37','N','1');

INSERT INTO TB_HISTORIA VALUES('45','Baixa nos lançamentos com Data selecionada','Baixa nos lançamentos com Data selecionada ou data esperada','2022-05-30 14:23:04','2022-05-30 14:23:04','N','1');

INSERT INTO TB_HISTORIA VALUES('46','Criar Botão de Estorno de Pagamento','Criar Botão de Estorno de Pagamento para voltar a não pago','2022-05-30 14:23:50','2022-05-30 14:23:50','N','1');

INSERT INTO TB_HISTORIA VALUES('47','Criar opção Lançamentos Repetidos e Parcelados','Criar opção Lançamentos Repetidos e Parcelados','2022-05-30 14:24:18','2022-05-30 14:24:18','N','1');

INSERT INTO TB_HISTORIA VALUES('48','Impressão Personalizada Lançamentos','Impressão Personalizada Lançamentos (PDF/ EXCEL) escolher campos','2022-05-30 14:24:43','2022-05-30 14:24:43','N','1');

INSERT INTO TB_HISTORIA VALUES('49','Impressão Personalizada Fluxo de Caixa','Impressão Personalizada FC(PDF/ EXCEL) escolher campos','2022-05-30 14:25:04','2022-05-30 14:25:04','N','1');

INSERT INTO TB_HISTORIA VALUES('50','Impressão Personalizada Comparador','Impressão Personalizada Comparador de Períodos (PDF/ EXCEL) escolher campos','2022-05-30 14:25:31','2022-05-30 14:25:31','N','1');




DROP TABLE IF EXISTS TB_HISTORICO_HISTORIA;


CREATE TABLE `TB_HISTORICO_HISTORIA` (
  `co_historico_historia` int(11) NOT NULL AUTO_INCREMENT,
  `nu_esforco` varchar(2) DEFAULT NULL,
  `nu_esforco_restante` varchar(2) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `co_historia` int(11) NOT NULL,
  PRIMARY KEY (`co_historico_historia`,`co_historia`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;


INSERT INTO TB_HISTORICO_HISTORIA VALUES('1','8','8','2022-05-30 12:37:06','1');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('2','8','8','2022-05-30 12:37:38','2');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('3','8','8','2022-05-30 12:38:00','3');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('4','8','8','2022-05-30 12:38:23','4');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('5','13','13','2022-05-30 12:38:43','5');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('6','5','5','2022-05-30 12:39:09','6');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('7','3','3','2022-05-30 12:39:38','7');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('8','5','5','2022-05-30 12:40:34','8');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('9','13',NULL,'2022-05-30 12:41:06','9');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('10','5',NULL,'2022-05-30 12:41:33','10');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('11','20','20','2022-05-30 12:42:04','11');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('12','8',NULL,'2022-05-30 12:42:25','12');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('13','8',NULL,'2022-05-30 12:42:57','13');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('14','5',NULL,'2022-05-30 12:43:25','14');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('15','8',NULL,'2022-05-30 12:43:51','15');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('16','20',NULL,'2022-05-30 12:44:33','16');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('17','13','13','2022-05-30 12:45:03','17');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('18','8','8','2022-05-30 12:45:44','18');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('19','5',NULL,'2022-05-30 12:46:16','19');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('20','5',NULL,'2022-05-30 12:46:48','20');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('21','5',NULL,'2022-05-30 12:47:19','21');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('22','13','13','2022-05-30 12:47:50','22');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('23','13',NULL,'2022-05-30 12:48:31','23');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('24','13','13','2022-05-30 12:49:00','24');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('25','8',NULL,'2022-05-30 12:49:26','25');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('26','8',NULL,'2022-05-30 12:51:56','21');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('27','13',NULL,'2022-05-30 12:52:29','22');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('28','13',NULL,'2022-05-30 12:53:14','24');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('29','30','30','2022-05-30 14:12:22','26');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('30','40',NULL,'2022-05-30 14:13:27','27');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('31','13',NULL,'2022-05-30 14:13:50','28');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('32','20',NULL,'2022-05-30 14:14:28','29');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('33','13',NULL,'2022-05-30 14:14:49','30');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('34','30','30','2022-05-30 14:15:36','31');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('35','40','40','2022-05-30 14:17:06','32');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('36','30','30','2022-05-30 14:17:41','33');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('37','8','8','2022-05-30 14:18:01','34');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('38','20','20','2022-05-30 14:18:20','35');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('39','20','20','2022-05-30 14:18:37','36');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('40','13','13','2022-05-30 14:19:05','37');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('41','5','5','2022-05-30 14:20:11','38');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('42','3','3','2022-05-30 14:20:38','39');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('43','8','8','2022-05-30 14:20:59','40');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('44','13','13','2022-05-30 14:21:21','41');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('45','8','8','2022-05-30 14:21:46','42');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('46','8','8','2022-05-30 14:22:13','43');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('47','8','8','2022-05-30 14:22:37','44');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('48','5','5','2022-05-30 14:23:04','45');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('49','8','8','2022-05-30 14:23:50','46');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('50','8','8','2022-05-30 14:24:18','47');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('51','13','13','2022-05-30 14:24:43','48');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('52','13','13','2022-05-30 14:25:04','49');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('53','13','13','2022-05-30 14:25:31','50');




DROP TABLE IF EXISTS TB_HISTORICO_PAG_ASSINATURA;


CREATE TABLE `TB_HISTORICO_PAG_ASSINATURA` (
  `co_historico_pag_assinatura` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_acao` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_usuario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_pagamento` int(1) DEFAULT NULL COMMENT '0 - Pendente / 1 - Aguardando pagamento / 2 - Em análise / 3 - Pago / 4 - Disponível / 5 - Em disputa / 6 - Devolvida / 7 - Cancelada\n',
  `co_plano_assinante_assinatura` int(11) NOT NULL,
  PRIMARY KEY (`co_historico_pag_assinatura`,`co_plano_assinante_assinatura`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_HISTORICO_PAG_ASSINATURA VALUES('2','2022-05-31 14:23:16','Cadastro Assinante','Sistema iniciou um plano Grátis','1','2');

INSERT INTO TB_HISTORICO_PAG_ASSINATURA VALUES('4','2022-05-31 14:39:28','Cadastro Assinante','Sistema iniciou um plano Grátis','1','4');




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





DROP TABLE IF EXISTS TB_MODULO;


CREATE TABLE `TB_MODULO` (
  `co_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `no_modulo` varchar(50) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `co_projeto` int(11) NOT NULL,
  PRIMARY KEY (`co_modulo`,`co_projeto`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;


INSERT INTO TB_MODULO VALUES('10','Financeiro','2022-05-30 12:32:36','1');




DROP TABLE IF EXISTS TB_PACOTE;


CREATE TABLE `TB_PACOTE` (
  `co_pacote` int(11) NOT NULL AUTO_INCREMENT,
  `no_pacote` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_descricao` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_lancamento` date DEFAULT NULL,
  PRIMARY KEY (`co_pacote`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_PACOTE VALUES('1','Padrão','Onde consta todas as funcionalidades padrões e básicas do sistema','2022-05-30 00:00:00',NULL);

INSERT INTO TB_PACOTE VALUES('2','Assinante','Gestão do assinante no sistema da beleza','2022-05-30 00:00:00',NULL);




DROP TABLE IF EXISTS TB_PERFIL;


CREATE TABLE `TB_PERFIL` (
  `co_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `no_perfil` varchar(45) CHARACTER SET latin1 NOT NULL COMMENT 'Nome do Perfil',
  `st_status` varchar(1) CHARACTER SET latin1 NOT NULL DEFAULT 'A' COMMENT '''A - Ativo / I - Inativo''',
  PRIMARY KEY (`co_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_PERFIL VALUES('1','Master','A');

INSERT INTO TB_PERFIL VALUES('2','Gestor','A');




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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('1','1','1','1');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('2','45','2',NULL);

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('3','44','2',NULL);

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('4','43','2',NULL);

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('5','42','2',NULL);

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('6','41','2',NULL);

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('7','40','2',NULL);

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('8','39','2',NULL);

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('9','37','2',NULL);

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('10','36','2',NULL);

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('12','34','2',NULL);

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('13','32','2',NULL);

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('14','31','2',NULL);

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('15','30','2',NULL);

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('16','11','2',NULL);

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('17','6','2',NULL);

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('18','35','2',NULL);




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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_PESSOA VALUES('1',NULL,'Usuário SOL',NULL,'2016-10-31 00:00:00',NULL,'M','1','1','1');

INSERT INTO TB_PESSOA VALUES('5',NULL,'teste',NULL,'2022-05-31 14:23:16',NULL,NULL,NULL,'5',NULL);

INSERT INTO TB_PESSOA VALUES('7',NULL,'Nonato silva',NULL,'2022-05-31 14:39:28',NULL,NULL,NULL,'7',NULL);




DROP TABLE IF EXISTS TB_PLANO;


CREATE TABLE `TB_PLANO` (
  `co_plano` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `no_plano` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_mes_ativo` int(1) DEFAULT NULL COMMENT 'Número de meses ativo do plano (1, 3, 6, 12 e 24)',
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'A' COMMENT 'Status do plano A - Ativo / I - Inativo',
  PRIMARY KEY (`co_plano`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_PLANO VALUES('1','2022-05-30 17:01:56','Grátis','1','A');

INSERT INTO TB_PLANO VALUES('2','2022-05-30 17:02:28','Mensal','1','A');

INSERT INTO TB_PLANO VALUES('3','2022-05-30 17:02:48','Semestral','6','A');

INSERT INTO TB_PLANO VALUES('4','2022-05-30 17:03:10','Anual','12','A');




DROP TABLE IF EXISTS TB_PLANO_ASSINANTE;


CREATE TABLE `TB_PLANO_ASSINANTE` (
  `co_plano_assinante` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Tabela de Histórico de dados do Plano',
  `nu_valor` decimal(8,2) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_observacao` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_plano` int(11) NOT NULL,
  PRIMARY KEY (`co_plano_assinante`,`co_plano`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_PLANO_ASSINANTE VALUES('1','0.01','2022-05-30 17:01:56',NULL,'1');

INSERT INTO TB_PLANO_ASSINANTE VALUES('2','19.90','2022-05-30 17:02:28',NULL,'2');

INSERT INTO TB_PLANO_ASSINANTE VALUES('3','49.90','2022-05-30 17:02:48',NULL,'3');

INSERT INTO TB_PLANO_ASSINANTE VALUES('4','99.99','2022-05-30 17:03:10',NULL,'4');




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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_PLANO_ASSINANTE_ASSINATURA VALUES('2','2022-05-31 14:23:16','2022-06-15',NULL,NULL,NULL,NULL,NULL,NULL,'null',NULL,NULL,'I','null','0.00','2','1');

INSERT INTO TB_PLANO_ASSINANTE_ASSINATURA VALUES('4','2022-05-31 14:39:28','2022-06-15',NULL,NULL,NULL,NULL,NULL,NULL,'null',NULL,NULL,'I','null','0.00','4','1');




DROP TABLE IF EXISTS TB_PLANO_PACOTE;


CREATE TABLE `TB_PLANO_PACOTE` (
  `co_plano_pacote` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Planos do Módulo',
  `co_plano` int(11) NOT NULL,
  `co_pacote` int(11) NOT NULL,
  PRIMARY KEY (`co_plano_pacote`,`co_plano`,`co_pacote`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_PLANO_PACOTE VALUES('1','1','2');

INSERT INTO TB_PLANO_PACOTE VALUES('2','1','1');

INSERT INTO TB_PLANO_PACOTE VALUES('3','2','2');

INSERT INTO TB_PLANO_PACOTE VALUES('4','2','1');

INSERT INTO TB_PLANO_PACOTE VALUES('5','3','2');

INSERT INTO TB_PLANO_PACOTE VALUES('6','3','1');

INSERT INTO TB_PLANO_PACOTE VALUES('7','4','2');

INSERT INTO TB_PLANO_PACOTE VALUES('8','4','1');




DROP TABLE IF EXISTS TB_PROJETO;


CREATE TABLE `TB_PROJETO` (
  `co_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `no_projeto` varchar(80) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`co_projeto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


INSERT INTO TB_PROJETO VALUES('1','SOL','2022-05-30 12:31:20');




DROP TABLE IF EXISTS TB_REPRESENTACAO;


CREATE TABLE `TB_REPRESENTACAO` (
  `co_representacao` int(11) NOT NULL AUTO_INCREMENT,
  `no_representacao` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_tel1` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_representacao`,`co_assinante`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_REPRESENTACAO VALUES('1','Bartofil',NULL,'bartofil@gmail.com','4');

INSERT INTO TB_REPRESENTACAO VALUES('2','CéSAR FILHO novo','61998875562','cesinha2@gmail.com','4');




DROP TABLE IF EXISTS TB_SESSAO;


CREATE TABLE `TB_SESSAO` (
  `co_sessao` int(11) NOT NULL AUTO_INCREMENT,
  `no_sessao` varchar(80) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `co_modulo` int(11) NOT NULL,
  PRIMARY KEY (`co_sessao`,`co_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;


INSERT INTO TB_SESSAO VALUES('1','Melhorias','2022-05-30 12:32:51','10');

INSERT INTO TB_SESSAO VALUES('2','Acelerador de Resultados','2022-05-30 12:32:58','10');

INSERT INTO TB_SESSAO VALUES('3','Analitíca','2022-05-30 12:33:06','10');

INSERT INTO TB_SESSAO VALUES('4','Comparador','2022-05-30 12:33:12','10');

INSERT INTO TB_SESSAO VALUES('5','Fluxo Caixa','2022-05-30 12:33:21','10');

INSERT INTO TB_SESSAO VALUES('6','Tutorial','2022-05-30 12:33:29','10');

INSERT INTO TB_SESSAO VALUES('7','Lançamentos','2022-05-30 12:33:37','10');

INSERT INTO TB_SESSAO VALUES('8','Painel Inicial','2022-05-30 12:33:44','10');




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
  `ds_senha` varchar(100) NOT NULL,
  `ds_code` varchar(50) NOT NULL COMMENT 'Senha criptografada',
  `st_status` varchar(1) NOT NULL DEFAULT 'I' COMMENT '''A - Ativo / I - Inativo''',
  `st_troca_senha` varchar(1) DEFAULT 'N',
  `dt_cadastro` datetime NOT NULL,
  `co_imagem` int(10) NOT NULL,
  `co_pessoa` int(11) NOT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_usuario`,`co_imagem`,`co_pessoa`,`co_assinante`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;


INSERT INTO TB_USUARIO VALUES('1','123456**','TVRJek5EVTJLaW89','A','S','2016-10-31 00:00:00','1','1',NULL);

INSERT INTO TB_USUARIO VALUES('3','YEF0SOT1','V1VWR01GTlBWREU9','I','N','2022-05-31 14:23:16',NULL,'5','2');

INSERT INTO TB_USUARIO VALUES('5','ANV6DQY6','UVU1V05rUlJXVFk9','A','N','2022-05-31 14:39:28',NULL,'7','4');




DROP TABLE IF EXISTS TB_USUARIO_PERFIL;


CREATE TABLE `TB_USUARIO_PERFIL` (
  `co_usuario_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `co_usuario` int(10) NOT NULL,
  `co_perfil` int(11) NOT NULL,
  `co_perfil_assinante` int(10) NOT NULL,
  PRIMARY KEY (`co_usuario_perfil`,`co_usuario`,`co_perfil`,`co_perfil_assinante`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_USUARIO_PERFIL VALUES('1','1','1','1');

INSERT INTO TB_USUARIO_PERFIL VALUES('3','3','2',NULL);

INSERT INTO TB_USUARIO_PERFIL VALUES('5','5','2',NULL);




DROP TABLE IF EXISTS TB_VISITA_CHECKOUT;


CREATE TABLE `TB_VISITA_CHECKOUT` (
  `co_visita_checkout` int(11) NOT NULL AUTO_INCREMENT,
  `co_visita` int(11) NOT NULL,
  `co_checkout` int(11) NOT NULL,
  PRIMARY KEY (`co_visita_checkout`,`co_visita`,`co_checkout`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





