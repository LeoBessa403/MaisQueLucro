-- Atualizado em: 08/08/2023 11:17:40
-- Link HOME: http://localhost/MaisQueLucro/
-- AMBIENTE: 1
-- BANCO: atacadao10

CREATE DATABASE IF NOT EXISTS atacadao10;

USE atacadao10;

DROP TABLE IF EXISTS TB_ANOTACAO;


CREATE TABLE `TB_ANOTACAO` (
  `co_anotacao` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_observacao` text DEFAULT NULL,
  `ds_titulo` varchar(80) DEFAULT NULL,
  `co_historia` int(11) NOT NULL,
  PRIMARY KEY (`co_anotacao`)
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_ASSINANTE VALUES('1','2023-02-06 12:02:29','2033-10-13','N','A','M','1','2');

INSERT INTO TB_ASSINANTE VALUES('2','2023-04-26 10:52:06','2033-10-13','S','A','M','2','3');




DROP TABLE IF EXISTS TB_BANCO;


CREATE TABLE `TB_BANCO` (
  `co_banco` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código do banco',
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
  PRIMARY KEY (`co_categoria_fc`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_CATEGORIA_FC VALUES('1','RECEITA / FATURAMENTO','1');

INSERT INTO TB_CATEGORIA_FC VALUES('2','DESPESAS DIRETAS (cv)','2');

INSERT INTO TB_CATEGORIA_FC VALUES('3','DESPESAS INDIRETAS (cf)','3');

INSERT INTO TB_CATEGORIA_FC VALUES('4','INVESTIMENTOS','4');

INSERT INTO TB_CATEGORIA_FC VALUES('5','ENTRADAS NÃO OPERACIONAIS','5');

INSERT INTO TB_CATEGORIA_FC VALUES('6','SAÍDAS NÃO OPERACIONAIS','6');




DROP TABLE IF EXISTS TB_CATEGORIA_FC_FILHA;


CREATE TABLE `TB_CATEGORIA_FC_FILHA` (
  `co_categoria_fc_filha` int(11) NOT NULL AUTO_INCREMENT,
  `ds_texto` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_codigo` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_categoria_fc` int(11) NOT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_categoria_fc_filha`,`co_categoria_fc`,`co_assinante`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('1','Receita de Vendas','1.0','1','1');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('2','Custos Tributários ou Financeiros','2.0','2','1');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('3','Custos com Fornecedores','2.1','2','1');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('4','Custos com Entregas','2.2','2','1');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('5','Custos com Embalagens','2.3','2','1');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('6','Custo com Vendas','2.4','2','1');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('7','Despesas Administrativas','3.0','3','1');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('8','Despesas com Pessoal','3.1','3','1');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('9','Despesas com Materiais e Equipamentos','3.2','3','1');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('10','Investimentos em Marketing','4.0','4','1');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('11','Investimentos em Bens Materiais','4.1','4','1');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('12','Investimentos em Desenvolvimento Empresarial','4.2','4','1');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('13','Entradas não Operacionais','5.0','5','1');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('14','Saídas não Operacionais','6.0','6','1');

INSERT INTO TB_CATEGORIA_FC_FILHA VALUES('15','Viagem para Compra de Produtos','2.5','2','1');




DROP TABLE IF EXISTS TB_CATEGORIA_FC_NETA;


CREATE TABLE `TB_CATEGORIA_FC_NETA` (
  `co_categoria_fc_neta` int(11) NOT NULL AUTO_INCREMENT,
  `ds_texto` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_codigo` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_categoria_fc_filha` int(11) NOT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_categoria_fc_neta`,`co_categoria_fc_filha`,`co_assinante`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_CATEGORIA_FC_NETA VALUES('1','Receitas em Dinheiro','1.0.1','1','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('2','Receitas em Boleto','1.0.2','1','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('3','Receitas em PIX','1.0.3','1','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('4','Receitas em Cartão de Crédito','1.0.4','1','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('5','Receitas em Cartão de Débito','1.0.5','1','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('6','Outros Produtos/Serviços','1.0.6','1','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('7','Simples Nacional','2.0.1','2','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('8','Taxas de Cartões','2.0.2','2','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('9','Taxas de Boleto','2.0.3','2','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('10','Compras com Fornecedores','2.1.1','3','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('11','Frete de Compras','2.1.2','3','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('12','Outros custos com Fornecedor','2.1.3','3','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('13','Combustível','2.2.1','4','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('14','Estacionamento','2.2.2','4','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('15','Alimentação','2.2.3','4','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('16','Manuteção de Veículos','2.2.4','4','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('17','Terceirização da entrega','2.2.5','4','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('18','Outros custos com Entregas','2.2.6','4','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('19','Embalagens','2.3.1','5','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('20','Sacolas','2.3.2','5','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('21','Caixas','2.3.3','5','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('22','Outros custos com Embalagens','2.3.4','5','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('23','Comissão Vendedor','2.4.1','6','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('24','Telefone e Internet','3.0.1','7','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('25','Energia Elétrica','3.0.2','7','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('26','Água','3.0.3','7','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('27','Aluguel e Condomínio','3.0.4','7','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('28','IPTU e Taxas Públicas','3.0.5','7','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('29','Almoço / Supermercado / Lanches','3.0.6','7','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('30','Contador','3.0.7','7','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('31','Salário de Funcionários','3.1.1','8','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('32','Bolsa de Estágio','3.1.2','8','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('33','VT e VR','3.1.3','8','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('34','Rescisão','3.1.4','8','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('35','FGTS','3.1.5','8','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('36','INSS - Sindicato - IR','3.1.6','8','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('37','13º e Férias','3.1.7','8','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('38','Exames ocupacionais','3.1.8','8','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('39','Pro-Labores','3.1.9','8','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('40','Plano de Saúde','3.1.10','8','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('41','Confraternizações / Festas da Empresa','3.1.11','8','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('42','Manutenção Máquinas e Equipamentos','3.2.1','9','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('43','Serviços Técnicos em geral','3.2.2','9','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('44','Materiais de Expediente/Escritório','3.2.3','9','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('45','Materiais de Limpeza e Manutenção da Loja','3.2.4','9','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('46','Papelaria Materiais impressos (folder, cartão visitas, etc.)','4.0.1','10','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('47','Site / Sistema','4.0.2','10','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('48','Mídias/ Propaganda','4.0.3','10','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('49','Prestadores de serviços de marketing','4.0.4','10','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('50','Compra de Equipamentos','4.1.1','11','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('51','Reformas / Estrutura','4.1.2','11','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('52','Mobiliário','4.1.3','11','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('53','Consultoria','4.2.1','12','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('54','Treinamentos','4.2.2','12','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('55','Capitalização dos sócios','5.0.1','13','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('56','Empréstimos obtidos','5.0.2','13','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('57','Venda de equipamentos usados','5.0.3','13','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('58','Pagamento de Empréstimos','6.0.1','14','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('59','Juros Bancários e por Atraso','6.0.2','14','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('60','Pagamento de dívidas passadas','6.0.3','14','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('61','Distribuição de Lucros ','6.0.4','14','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('62','Juros de Antecipação de Recebíveis','6.0.5','14','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('63','Passagem','2.5.1','15','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('64','Viagem Uber / Taxi','2.5.2','15','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('65','Hospedagem','2.5.3','15','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('66','Viagem Alimentação','2.5.4','15','1');

INSERT INTO TB_CATEGORIA_FC_NETA VALUES('67','Estorno de Capital','6.0.6','14','1');




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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_CONTA_BANCARIA VALUES('2','2023-02-06 12:26:41','DINHEIRO (Arnaldo)','S','1','000002','1');

INSERT INTO TB_CONTA_BANCARIA VALUES('3','2023-02-06 12:50:59','Pag Seguro','S','1','327994885','1');

INSERT INTO TB_CONTA_BANCARIA VALUES('4','2023-02-10 10:35:00','DINHEIRO (Leo)','S','1','000002','1');

INSERT INTO TB_CONTA_BANCARIA VALUES('5','2023-02-10 11:47:25','Pag Seguro Cartão de Crédito','S','1','3345455','1');

INSERT INTO TB_CONTA_BANCARIA VALUES('6','2023-02-25 09:43:54','Marretada','S','1','000002','1');

INSERT INTO TB_CONTA_BANCARIA VALUES('7','2023-07-20 20:33:26','Nu Bank','S','1','3345455','2');

INSERT INTO TB_CONTA_BANCARIA VALUES('8','2023-07-20 20:34:19','Caixa','S','2345','000002','2');

INSERT INTO TB_CONTA_BANCARIA VALUES('9','2023-07-20 20:35:04','DINHEIRO (Caixa da loja)','S','1','000002','2');




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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_CONTATO VALUES('1','61993274991','6130826060',NULL,NULL,'sistema@maisquelucro.com.br',NULL,NULL,NULL,NULL);

INSERT INTO TB_CONTATO VALUES('2','61993274991','6130826060',NULL,NULL,'gestor@maisquelucro.com.br',NULL,NULL,NULL,NULL);

INSERT INTO TB_CONTATO VALUES('3','61992931084',NULL,NULL,NULL,'ramos.amaury96@gmail.com',NULL,NULL,NULL,'loja.sangiuseppe');




DROP TABLE IF EXISTS TB_CONTROLLER;


CREATE TABLE `TB_CONTROLLER` (
  `co_controller` int(11) NOT NULL AUTO_INCREMENT,
  `no_controller` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_class_icon` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Classe do Ícone',
  PRIMARY KEY (`co_controller`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_CONTROLLER VALUES('1','Gestão','bi bi-kanban clip-cog');

INSERT INTO TB_CONTROLLER VALUES('2','Auditoria','bi bi-calendar2-check clip-stack-2');

INSERT INTO TB_CONTROLLER VALUES('3','Acesso','bi bi-ticket-detailed clip-earth-2');

INSERT INTO TB_CONTROLLER VALUES('4','Funcionalidade','bi bi-list-check fa-file-text-o fa');

INSERT INTO TB_CONTROLLER VALUES('5','Perfil','bi bi-person-lines-fill fa-meh-o fa');

INSERT INTO TB_CONTROLLER VALUES('6','Usuário','bi bi-person-check clip-users');

INSERT INTO TB_CONTROLLER VALUES('7','Visita','bi bi-bookmark-star-fill fa-bookmark fa');

INSERT INTO TB_CONTROLLER VALUES('8','Relatorio','bi bi-bar-chart-line clip-bars');

INSERT INTO TB_CONTROLLER VALUES('9','Suporte','bi bi-tools fa fa-comments-o');

INSERT INTO TB_CONTROLLER VALUES('10','Fluxocaixa','bi bi-file-earmark-bar-graph clip-stats');

INSERT INTO TB_CONTROLLER VALUES('11','Plano','bi bi-cash-coin fa-money fa');

INSERT INTO TB_CONTROLLER VALUES('12','Assinante','bi bi-person-circle clip-user-5');

INSERT INTO TB_CONTROLLER VALUES('13','Ai','bi bi-globe clip-globe');




DROP TABLE IF EXISTS TB_CRONS;


CREATE TABLE `TB_CRONS` (
  `co_cron` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `no_cron` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_sql` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`co_cron`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_CRONS VALUES('1','2023-02-09 14:35:53','Atualiza Lançamentos em atraso','update TB_FLUXO_CAIXA set st_pagamento = 4 where dt_vencimento < SYSDATE() and dt_realizado is null and st_pagamento in (1,2)');




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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_EMPRESA VALUES('1','Atacadão Bessa','Atacadão Bessa','2022-05-31 14:23:16','44777359000145',NULL,NULL,NULL,NULL,'2','2','2','2');

INSERT INTO TB_EMPRESA VALUES('2','SAN GIUSEPPE ARTIGOS RELIGIOSOS E PRESENTES','LOJA SAN GIUSEPPE ARTIGOS RELIGIOSOS','2023-04-26 10:53:14',NULL,NULL,NULL,NULL,NULL,'3','3','3','3');




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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_ENDERECO VALUES('1','qr 10 casa 10',NULL,'Samambaia','72111111','Brasília','DF');

INSERT INTO TB_ENDERECO VALUES('2','Qr 403 10 28',NULL,'Samambaia','72111111','Brasília','DF');

INSERT INTO TB_ENDERECO VALUES('3','QR 403 Conjunto 10','37','Samambaia Norte (Samambaia)','72319111','Brasília','DF');




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
  `co_centro_custo` int(11) DEFAULT NULL,
  `co_conta_bancaria` int(11) NOT NULL,
  `co_representacao` int(11) DEFAULT NULL,
  `co_usuario` int(10) NOT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_fluxo_caixa`,`co_categoria_fc`,`co_categoria_fc_filha`,`co_categoria_fc_neta`,`co_conta_bancaria`,`co_usuario`,`co_assinante`)
) ENGINE=InnoDB AUTO_INCREMENT=338 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_FLUXO_CAIXA VALUES('1','2023-02-08 12:23:36','2023-01-20',NULL,NULL,'400.00','Adiantamento de passagem para viagem','1','1','3','5','13','55',NULL,'2','20','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('2','2023-02-08 12:35:27','2023-01-23',NULL,NULL,'3700.00','Era 4mil porem sobrou 300','1','1','3','5','13','55',NULL,'2','20','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('3','2023-02-08 12:37:52','2023-02-01',NULL,NULL,'1800.00','Pagamento Toalhinhas de personagem','1','4','3','5','13','55',NULL,'2','21','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('4','2023-02-08 12:41:36','2023-02-01',NULL,NULL,'1800.00','COmpra de toalhas de personagem 52 duzias','2','4','3','2','3','10',NULL,'2','22','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('5','2023-02-08 15:42:40','2023-01-22',NULL,NULL,'560.00','Passagem viagem Brás SP','2','4','3','2','15','63',NULL,'3',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('6','2023-02-08 15:44:14','2023-01-22',NULL,NULL,'80.00','Locomoção na viagem','2','3','3','2','15','64',NULL,'3',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('7','2023-02-08 15:45:47','2023-01-22',NULL,NULL,'80.00','Pago cartão C6 CRÉDITO','1','3','3','5','13','55',NULL,'3','21','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('8','2023-02-08 15:48:00','2023-01-22',NULL,NULL,'260.00','Custo da alimentação da viagem toda','2','3','3','2','15','66',NULL,'3',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('9','2023-02-08 15:56:23','2023-01-25',NULL,NULL,'94.25','Hospedagem do site','2','3','3','4','10','47',NULL,'3',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('10','2023-02-08 15:58:33','2023-01-22',NULL,NULL,'3600.00','Compra das mochilas','2','3','3','2','3','10',NULL,'3','6','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('11','2023-02-08 16:09:20','2023-01-22',NULL,NULL,'150.00','Compra dos talheres inox','2','3','3','2','3','10',NULL,'3','2','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('12','2023-02-08 16:11:03','2023-01-22',NULL,NULL,'1530.00','Materiais diversos','2','1','3','2','3','10',NULL,'2','3','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('13','2023-02-08 16:12:12','2023-01-22',NULL,NULL,'220.00','Compra de pilhas AAA e AA','2','4','3','2','3','10',NULL,'2','4','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('15','2023-02-08 16:16:00','2023-01-23',NULL,NULL,'579.00','Compra porta lapis','2','1','3','2','3','10',NULL,'2','7','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('16','2023-02-08 19:07:38','2023-01-23',NULL,NULL,'112.00','Compras porta lápis','2','1','3','2','3','10',NULL,'2',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('17','2023-02-08 19:13:40','2023-01-23',NULL,NULL,'712.50','Compras dos panos de prato e panos de chão','2','1','3','2','3','10',NULL,'2','5','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('19','2023-02-08 19:17:40','2023-01-24',NULL,NULL,'95.00','Porta lápis 2 ziper','1','4','3','1','1','3',NULL,'3',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('21','2023-02-08 19:21:19','2023-01-24',NULL,NULL,'340.00','Porta lápis e mochila','1','4','3','1','1','3',NULL,'3','10','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('22','2023-02-08 19:23:13','2023-01-25',NULL,NULL,'410.00','Mochilas e portas lápis','1','4','3','1','1','3',NULL,'3','24','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('24','2023-02-08 19:25:04','2023-02-08',NULL,NULL,'532.00','Porta lápis','1','4','3','1','1','3',NULL,'3','25','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('25','2023-02-08 19:29:18','2023-02-13','2023-02-05','162.00','162.00','Mochilas','1','4','3','1','1','3',NULL,'3','26','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('26','2023-02-08 19:30:50','2023-01-26',NULL,NULL,'100.00','Mochilas','1','4','3','1','1','3',NULL,'3',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('29','2023-02-08 19:34:34','2023-01-31',NULL,NULL,'108.00','Pago depois pix','1','1','3','1','1','1',NULL,'2','10','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('30','2023-02-08 19:36:17','2023-02-10','2023-02-07','492.00','492.00','Toalha personagem e mochilas','1','4','3','1','1','3',NULL,'3','11','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('31','2023-02-08 19:37:24','2023-05-12','2023-02-10','102.00','162.00','Mochilas','1','1','3','1','1','3',NULL,'2','27','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('33','2023-02-08 19:40:45','2023-01-31',NULL,NULL,'30.00','1 dz colher inox','1','1','3','1','1','1',NULL,'2',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('34','2023-02-08 19:41:58','2023-02-01',NULL,NULL,'543.00','Toalhas personagem e porta lapis e mochilas','1','4','3','1','1','3',NULL,'3','12','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('35','2023-02-08 19:43:04','2023-02-10','2023-02-08','200.00','200.00','Toalhas personagem e porta lapis e mochilas','1','4','3','1','1','3',NULL,'3','12','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('38','2023-02-08 19:46:29','2023-02-03',NULL,NULL,'162.00','Toalhas pers.','1','1','3','1','1','1',NULL,'2','24','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('39','2023-02-08 19:47:56','2023-02-01',NULL,NULL,'175.00','Toalhas','1','1','3','1','1','1',NULL,'2','29','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('41','2023-02-08 19:50:00','2023-03-04','2023-02-15','312.00','312.00','Toalhas mochilas e porta lapis','1','4','3','1','1','3',NULL,'3','16','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('42','2023-02-08 19:51:20','2023-02-03',NULL,NULL,'237.00','toalhas','1','1','3','1','1','1',NULL,'2','17','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('43','2023-02-08 19:52:53','2023-02-05',NULL,NULL,'54.00','Toalhas','1','1','3','1','1','1',NULL,'2','30','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('44','2023-02-08 19:54:05','2023-02-05',NULL,NULL,'156.00','Mochilas','1','1','3','1','1','1',NULL,'2','28','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('45','2023-02-09 14:09:31','2023-02-06','2023-02-03','420.00','420.00',NULL,'1','4','3','1','1','3',NULL,'3','9','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('46','2023-02-09 14:14:15','2023-02-06',NULL,NULL,'208.00',NULL,'1','1','3','1','1','1',NULL,'2','18','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('47','2023-02-09 14:14:56','2023-02-06',NULL,NULL,'125.00',NULL,'1','4','3','1','1','3',NULL,'3','19','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('48','2023-02-09 14:16:57','2023-02-15','2023-02-15','276.00','276.00',NULL,'1','4','3','1','1','3',NULL,'3','31','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('49','2023-02-09 14:19:12','2023-02-23','2023-02-15','108.00','108.00',NULL,'1','4','3','1','1','3',NULL,'3','32','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('50','2023-02-09 14:20:40','2023-02-08',NULL,NULL,'54.00',NULL,'1','1','3','1','1','1',NULL,'2','33','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('51','2023-02-09 14:23:13','2023-02-07','2023-02-06','687.00','687.00','Toalhas personagem e porta lapis','1','4','3','1','1','3',NULL,'3','13','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('52','2023-02-09 14:26:46','2023-02-07',NULL,NULL,'364.00','Pagamento Porta Lápis','2','4','3','6','14','60',NULL,'2','20','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('53','2023-02-09 14:28:21','2023-02-07','2023-02-01','386.00','386.00','Mochilas e Porta Lápis','1','4','3','1','1','3',NULL,'3','8','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('54','2023-02-09 14:33:15','2023-01-26','2023-01-26','100.00','100.00','Mochilas','1','4','3','1','1','3',NULL,'3',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('55','2023-02-09 14:43:05','2023-01-27',NULL,NULL,'180.00','Pix Hélio Ferreira','2','4','3','6','14','67',NULL,'3','20','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('57','2023-02-09 14:48:02','2023-01-31',NULL,NULL,'600.00',NULL,'2','4','3','6','14','67',NULL,'2','20','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('58','2023-02-09 14:49:09','2023-01-30',NULL,NULL,'700.00',NULL,'2','4','3','6','14','67',NULL,'2','20','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('59','2023-02-09 14:51:04','2023-02-09','2023-02-08','312.00','312.00','Toalhas mochilas e porta lapis','1','4','3','1','1','3',NULL,'3','16','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('60','2023-02-09 14:54:28','2023-01-20',NULL,NULL,'6360.00',NULL,'1','4','3','5','13','55',NULL,'3','21','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('61','2023-02-09 15:19:10','2023-01-23',NULL,NULL,'112.00','Porta lápis 2 xíper Troca de produto calça e blusa','1','1','3','1','1','1',NULL,'2','34','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('62','2023-02-09 22:38:35','2023-03-04','2023-02-22','150.00','150.00','Pct toalhas coloridas','1','4','3','1','1','3',NULL,'3','16','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('63','2023-02-09 22:40:41','2023-02-09','2023-02-08','200.00','200.00','Toalhas mochilas','1','4','3','1','1','3',NULL,'3','14','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('64','2023-02-09 22:44:37','2023-02-27','2023-02-15','267.00','200.00','Toalhas personagem 39 unidades','1','1','3','1','1','1',NULL,'2','14','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('65','2023-02-09 22:46:45','2023-02-03',NULL,NULL,'70.00',NULL,'2','1','3','2','6','23',NULL,'2','1','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('66','2023-02-10 10:33:19','2023-02-08','2023-02-03','138.00','138.00','Porta lapis','1','4','3','1','1','3',NULL,'3','23','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('71','2023-02-12 15:53:29','2023-02-13','2023-02-14','750.00','750.00','Toalhas coloridas','2','4','3','2','3','10',NULL,'5','22','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('72','2023-02-12 15:54:32','2023-02-13','2023-02-14','1050.00','1050.00','Toalhas Personagem','2','4','3','2','3','10',NULL,'3','22','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('73','2023-02-14 14:30:22','2023-02-10',NULL,NULL,'137.00','Toalha','1','1','3','1','1','3',NULL,'2','35','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('74','2023-02-14 14:36:13','2023-02-13',NULL,NULL,'370.00',NULL,'1','4','3','1','1','3',NULL,'3','36','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('76','2023-02-14 16:24:59','2023-02-14',NULL,NULL,'108.00','Lápis de cor','1','4','3','1','1','3',NULL,'3','29','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('77','2023-02-15 12:10:13','2023-02-15',NULL,NULL,'1000.00','Pagamento Cartão de Crédito Bradesco','2','4','3','6','14','67',NULL,'3','20','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('78','2023-02-24 11:35:41','2023-02-23',NULL,NULL,'213.00',NULL,'2','4','3','2','6','23',NULL,'2','20','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('79','2023-02-24 11:44:24','2023-02-15',NULL,NULL,'75.00','Grossa de lapis e toalhas','1','1','3','1','1','1',NULL,'2','10','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('80','2023-02-24 11:45:54','2023-02-22','2023-02-22','162.00','162.00',NULL,'1','4','3','1','1','3',NULL,'3','39','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('81','2023-02-24 11:46:57','2023-02-15',NULL,NULL,'288.00','Mochilas e toalhas','1','4','3','1','1','3',NULL,'3','38','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('82','2023-02-24 11:47:59','2023-02-23',NULL,NULL,'50.00','Mochilas e porta lapis','1','4','3','1','1','3',NULL,'3','40','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('83','2023-02-24 11:48:37','2023-03-03','2023-02-23','196.00','100.00','Mochilas e toalhas','1','4','3','1','1','3',NULL,'3','40','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('84','2023-02-24 11:50:12','2023-02-17',NULL,NULL,'54.00','Toalhas person.','1','1','3','1','1','1',NULL,'2','41','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('85','2023-02-24 11:51:22','2023-02-17','2023-02-17','30.00','30.00','Colher','1','4','3','1','1','3',NULL,'3','42','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('86','2023-02-24 11:53:12','2023-02-24',NULL,NULL,'153.00',NULL,'1','1','3','1','1','1',NULL,'2','43','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('87','2023-03-04 11:22:13','2023-02-27',NULL,NULL,'2950.00','Havaianas','2','4','3','2','3','10',NULL,'3','45','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('88','2023-03-04 11:24:03','2023-02-27',NULL,NULL,'670.00','Mochilqs','2','4','3','2','3','10',NULL,'3','44','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('89','2023-03-04 11:32:15','2023-03-14','2023-03-01','46.00','96.00','Restante do pagamento','1','4','3','1','1','3',NULL,'4','40','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('90','2023-03-04 11:33:53','2023-03-25','2023-03-01','67.00','67.00','Restante do pagamento','1','1','3','1','1','1',NULL,'2','14','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('91','2023-03-06 08:45:10','2023-03-03',NULL,NULL,'310.00',NULL,'2','1','3','2','6','23',NULL,'2','20','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('92','2023-03-06 08:48:49','2023-03-04',NULL,NULL,'180.00','Havaianas','1','1','3','1','1','1',NULL,'2','35','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('93','2023-03-06 08:49:32','2023-03-10',NULL,NULL,'225.00','Havaianas','1','1','3','1','1','1',NULL,'2','14','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('94','2023-03-06 08:58:13','2023-02-27',NULL,NULL,'120.00',NULL,'2','3','3','2','15','64',NULL,'5',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('95','2023-03-06 08:58:46','2023-02-27',NULL,NULL,'80.00',NULL,'2','1','3','2','15','66',NULL,'5',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('96','2023-03-06 08:59:13','2023-02-27',NULL,NULL,'400.00',NULL,'2','1','3','2','15','63',NULL,'5',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('97','2023-03-07 14:04:02','2023-03-07',NULL,NULL,'16.50',NULL,'1','1','3','1','1','1',NULL,'2','48','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('98','2023-03-07 14:05:28','2023-03-23','2023-03-10','110.00','110.00','Panos de prato','1','4','3','1','1','3',NULL,'2','47','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('99','2023-03-09 10:59:23','2023-03-09',NULL,NULL,'107.00','Panos de prato','1','4','3','1','1','1',NULL,'3','49','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('100','2023-03-09 11:04:05','2023-03-23','2023-03-20','476.50','476.50','Havaianas','1','1','3','1','1','3',NULL,'3','50','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('101','2023-03-09 11:05:02','2023-04-04','2023-04-01','476.50','353.50','Havaianas','1','4','3','1','1','3',NULL,'3','50','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('102','2023-03-09 11:06:41','2023-03-07',NULL,NULL,'84.00','Panos de chão','1','1','3','1','1','1',NULL,'4','51','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('103','2023-03-09 11:08:11','2023-03-07',NULL,NULL,'140.00','Havaianas','1','1','3','1','1','1',NULL,'4','52','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('104','2023-03-14 08:45:00','2023-03-25','2023-03-20','294.25','294.25','Materias diversos','1','1','3','1','1','1',NULL,'2','14','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('105','2023-03-14 08:46:23','2023-05-03','2023-03-27','149.75','150.00','Materias DIversos','1','1','3','1','1','1',NULL,'2','14','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('106','2023-03-14 08:46:23','2023-04-14','2023-04-03','294.25','200.00','Materias DIversos','1','1','3','1','1','1',NULL,'2','14','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('107','2023-03-14 08:46:23','2023-06-12','2023-04-10','144.25','150.00','Materias DIversos','1','1','3','1','1','1',NULL,'2','14','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('108','2023-03-14 13:44:55','2023-03-14',NULL,NULL,'236.82','Havaianas e extensão','1','4','3','1','1','3',NULL,'3','10','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('109','2023-03-14 14:06:16','2023-03-10',NULL,NULL,'80.00',NULL,'1','4','3','1','1','3',NULL,'3','27','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('110','2023-03-14 14:09:25','2023-03-11',NULL,NULL,'29.52',NULL,'1','1','3','1','1','1',NULL,'3',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('111','2023-03-14 16:25:44','2023-03-14',NULL,NULL,'100.00','Havaianas','1','1','3','1','1','1',NULL,'4','38','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('112','2023-03-14 16:26:37','2023-04-01','2023-03-22','72.00','72.00','Havaianas','1','4','3','1','1','3',NULL,'3','38','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('113','2023-03-14 16:41:24','2023-03-14',NULL,NULL,'100.00','Havaianas','1','1','3','1','1','1',NULL,'4','10','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('114','2023-03-14 17:15:18','2023-04-05','2023-03-30','168.00','184.00','Havaianas','1','1','3','1','1','1',NULL,'2','40','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('115','2023-03-14 17:15:18','2023-04-29','2023-04-09','168.00','150.00','Havaianas','1','1','3','1','1','1',NULL,'2','40','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('116','2023-03-14 17:16:17','2023-03-14',NULL,NULL,'22.00','Esc e cola','1','1','3','1','1','1',NULL,'4','40','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('117','2023-03-27 09:18:04','2023-03-22',NULL,NULL,'50.00',NULL,'1','1','3','1','1','1',NULL,'2','27','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('118','2023-03-27 09:21:43','2023-03-24',NULL,NULL,'106.00',NULL,'1','1','3','1','1','1',NULL,'2','53','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('119','2023-03-27 10:31:35','2023-03-14',NULL,NULL,'100.00',NULL,'2','1','3','2','6','23',NULL,'4','1','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('120','2023-03-27 10:33:39','2023-03-16',NULL,NULL,'56.00',NULL,'1','1','3','1','1','1',NULL,'2','55','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('121','2023-04-06 11:14:41','2023-04-24',NULL,NULL,'17.55',NULL,'2','3','3','2','2','8',NULL,'3','54','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('122','2023-04-06 11:17:12','2023-04-27',NULL,NULL,'4.90','Segura da conta PagBank','2','3','3','2','2','8',NULL,'3',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('123','2023-04-06 11:19:52','2023-04-28',NULL,NULL,'315.00',NULL,'1','4','3','1','1','3',NULL,'3','56','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('124','2023-04-06 11:22:44','2023-03-30',NULL,NULL,'67.00',NULL,'1','4','3','1','1','3',NULL,'3','57','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('125','2023-04-06 11:23:24','2023-03-30',NULL,NULL,'65.00',NULL,'1','1','3','1','1','1',NULL,'2','57','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('126','2023-04-06 11:24:56','2023-03-24',NULL,NULL,'123.00',NULL,'1','1','3','1','1','1',NULL,'2','50','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('127','2023-04-06 11:28:07','2023-03-30',NULL,NULL,'40.00',NULL,'1','1','3','1','1','1',NULL,'2','58','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('128','2023-04-06 11:38:39','2023-03-30',NULL,NULL,'200.00',NULL,'1','1','3','1','1','1',NULL,'2','14','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('129','2023-04-11 14:20:34','2023-04-01',NULL,NULL,'40.00',NULL,'1','1','3','1','1','1',NULL,'2','14','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('130','2023-04-20 14:28:17','2023-04-13',NULL,NULL,'60.00',NULL,'1','1','3','1','1','1',NULL,'2','59','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('131','2023-04-20 14:31:01','2023-04-14',NULL,NULL,'106.00',NULL,'1','1','3','1','1','1',NULL,'2','60','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('132','2023-04-20 14:32:50','2023-04-20','2023-04-20','240.00','240.00',NULL,'1','1','3','1','1','1',NULL,'2','61','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('133','2023-04-20 14:34:18','2023-04-19',NULL,NULL,'106.00',NULL,'1','1','3','1','1','1',NULL,'2','15','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('134','2023-04-20 14:35:02','2023-04-20','2023-04-20','100.00','205.00',NULL,'1','1','3','1','1','3',NULL,'3','15','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('135','2023-04-20 14:37:40','2023-04-11',NULL,NULL,'80.00',NULL,'1','4','3','1','1','1',NULL,'3','38','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('137','2023-04-20 14:39:19','2023-07-27','2023-04-26','60.00','60.00',NULL,'1','1','3','1','1','3',NULL,'3','38','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('138','2023-04-20 14:52:44','2023-04-18',NULL,NULL,'580.00','Cadeado ao barbear filtro de linha','2','4','3','2','3','10',NULL,'3','62','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('139','2023-04-22 12:11:55','2023-04-20',NULL,NULL,'953.00',NULL,'2','4','3','2','3','10',NULL,'3','62','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('140','2023-04-25 14:54:15','2023-04-24',NULL,NULL,'80.00',NULL,'1','1','3','1','1','3',NULL,'2','27','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('141','2023-04-25 14:59:57','2023-04-24',NULL,NULL,'95.00',NULL,'1','4','3','1','1','3',NULL,'3','63','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('142','2023-04-25 15:02:28','2023-04-24',NULL,NULL,'30.00',NULL,'1','1','3','1','1','1',NULL,'2','64','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('143','2023-04-25 17:34:31','2023-04-25',NULL,NULL,'136.00',NULL,'1','1','3','1','1','1',NULL,'4','66','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('144','2023-04-25 17:35:27','2023-04-25',NULL,NULL,'50.00',NULL,'1','1','3','1','1','1',NULL,'4','13','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('145','2023-04-25 17:36:22','2023-04-25',NULL,NULL,'50.00',NULL,'1','4','3','1','1','3',NULL,'3','13','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('146','2023-04-25 17:37:48','2023-04-25',NULL,NULL,'169.95',NULL,'1','1','3','1','1','1',NULL,'4','65','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('147','2023-04-25 17:46:52','2023-04-24',NULL,NULL,'26.00',NULL,'1','1','3','1','1','1',NULL,'2','67','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('148','2023-04-26 22:36:00','2023-04-26',NULL,NULL,'470.00',NULL,'1','1','3','1','1','1',NULL,'2','68','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('149','2023-04-27 14:24:07','2023-04-26',NULL,NULL,'38.00',NULL,'1','1','3','1','1','1',NULL,'2','69','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('150','2023-04-27 14:26:26','2023-04-27',NULL,NULL,'80.00',NULL,'1','1','3','1','1','1',NULL,'2','53','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('151','2023-04-27 14:28:15','2023-04-26',NULL,NULL,'220.00',NULL,'2','1','3','2','3','10',NULL,'4','70','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('152','2023-04-27 14:29:46','2023-05-04','2023-05-02','88.00','88.00',NULL,'1','1','3','1','1','1',NULL,'2','71','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('153','2023-04-27 17:34:46',NULL,'2023-04-29',NULL,'183.00',NULL,'1','1','3','1','1','1',NULL,'2','11','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('154','2023-04-27 18:55:41','2023-04-27',NULL,NULL,'50.00',NULL,'1','1','3','1','1','1',NULL,'4','72','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('155','2023-04-27 18:57:19','2023-04-27',NULL,NULL,'50.00',NULL,'2','1','3','2','4','13',NULL,'4','21','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('156','2023-05-04 15:20:02','2023-05-01',NULL,NULL,'100.00','Toalhinhas','1','1','3','1','1','1',NULL,'2','74','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('157','2023-05-04 15:21:31','2023-06-08','2023-05-03','37.00','37.00','Restante toalhinhas','1','1','3','1','1','1',NULL,'2','74','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('158','2023-05-04 15:23:00','2023-05-03',NULL,NULL,'110.00',NULL,'1','1','3','1','1','1',NULL,'2','73','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('159','2023-05-05 16:11:21','2023-05-04',NULL,NULL,'88.00',NULL,'2','1','3','2','6','23',NULL,'4','1','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('160','2023-05-05 16:15:20','2023-05-04',NULL,NULL,'420.00',NULL,'2','1','3','2','3','10',NULL,'3','70','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('161','2023-05-05 16:18:11','2023-05-04',NULL,NULL,'555.00',NULL,'2','1','3','2','3','10',NULL,'3','75','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('162','2023-05-09 14:49:25','2023-05-08',NULL,NULL,'150.00',NULL,'1','4','3','1','1','3',NULL,'3','38','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('163','2023-05-09 14:50:51','2023-05-03',NULL,NULL,'150.00',NULL,'2','1','3','2','4','13',NULL,'4',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('164','2023-05-15 15:34:22','2023-05-11',NULL,NULL,'200.00','Vendas Arnaldo caldas','1','1','3','1','1','1',NULL,'4',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('165','2023-05-15 15:35:18','2023-05-09',NULL,NULL,'68.00','Vendas Arnaldo caldas','1','1','3','1','1','1',NULL,'2',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('166','2023-05-15 16:16:10','2023-05-15',NULL,NULL,'58.00','Cadeado 20','1','1','3','1','1','1',NULL,'4','76','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('167','2023-05-15 17:03:18','2023-05-15',NULL,NULL,'57.00',NULL,'1','1','3','1','1','1',NULL,'4','77','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('168','2023-05-18 16:56:31','2023-05-18',NULL,NULL,'229.00',NULL,'1','1','3','1','1','1',NULL,'4',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('169','2023-05-23 15:34:16','2023-05-16',NULL,NULL,'125.00',NULL,'1','1','3','1','1','1',NULL,'4','78','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('170','2023-05-23 15:38:29','2023-06-02','2023-06-02','180.00','180.00',NULL,'1','4','3','1','1','3',NULL,'3','79','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('171','2023-05-23 15:40:26','2023-05-16',NULL,NULL,'194.00',NULL,'1','1','3','1','1','1',NULL,'2','80','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('172','2023-05-23 16:54:54','2023-05-16',NULL,NULL,'128.00',NULL,'2','1','3','2','3','10',NULL,'4','75','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('173','2023-05-23 16:56:12','2023-05-16',NULL,NULL,'130.00',NULL,'2','1','3','2','3','10',NULL,'2','70','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('174','2023-05-23 16:58:00','2023-05-12',NULL,NULL,'1528.00',NULL,'2','1','3','2','3','10',NULL,'3','22','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('175','2023-05-23 16:59:56','2023-06-01','2023-06-02','296.00','446.00',NULL,'2','1','3','2','3','10',NULL,'3','22','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('176','2023-05-23 22:59:26','2023-05-23',NULL,NULL,'50.28',NULL,'2','1','3','2','4','15',NULL,'4',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('177','2023-05-23 23:00:43','2023-05-23',NULL,NULL,'126.00',NULL,'1','1','3','1','1','1',NULL,'4',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('178','2023-05-25 14:47:59','2023-06-01','2023-06-02','1584.00','1584.00','Sandálias','2','4','3','2','3','10',NULL,'3','22','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('179','2023-05-25 14:49:33','2023-05-25',NULL,NULL,'150.00',NULL,'1','1','3','1','1','1',NULL,'2','14','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('180','2023-05-25 15:00:04','2023-05-24',NULL,NULL,'110.00',NULL,'1','4','3','1','1','3',NULL,'3','81','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('181','2023-05-25 15:04:29','2023-05-24',NULL,NULL,'35.00',NULL,'1','1','3','1','1','1',NULL,'2','82','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('182','2023-05-25 15:05:29','2023-05-24',NULL,NULL,'30.00',NULL,'1','1','3','1','1','1',NULL,'2','83','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('183','2023-05-25 15:07:30','2023-05-24',NULL,NULL,'70.00',NULL,'1','4','3','1','1','3',NULL,'3',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('184','2023-05-26 18:02:34','2023-05-23',NULL,NULL,'150.00',NULL,'1','1','3','1','1','1',NULL,'2','14','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('185','2023-05-30 16:10:03','2023-05-30',NULL,NULL,'168.00',NULL,'1','4','3','1','1','3',NULL,'3','84','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('186','2023-05-30 16:11:02',NULL,'2023-06-22','100.00',NULL,NULL,'1','1','4','1','1','3',NULL,'3','84','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('187','2023-05-30 17:15:54','2023-06-10','2023-06-10','695.00','695.00',NULL,'1','1','3','1','1','1',NULL,'2','85','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('188','2023-05-30 17:15:54',NULL,'2023-06-25','495.00',NULL,NULL,'1','1','4','1','1','1',NULL,'2','85','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('189','2023-05-30 17:15:54',NULL,'2023-07-10','695.00',NULL,NULL,'1','1','4','1','1','1',NULL,'2','85','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('190','2023-05-30 17:17:45','2023-05-17',NULL,NULL,'82.00',NULL,'1','1','3','1','1','1',NULL,'2',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('191','2023-05-30 18:02:42','2023-05-30',NULL,NULL,'356.00',NULL,'1','4','3','1','1','1',NULL,'3','86','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('192','2023-05-30 18:04:30','2023-07-01','2023-06-30','300.00','300.00',NULL,'1','4','3','1','1','3',NULL,'3','86','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('193','2023-05-30 19:00:10','2023-05-30',NULL,NULL,'150.00',NULL,'1','1','3','1','1','1',NULL,'4','87','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('194','2023-05-30 22:56:13','2023-05-30',NULL,NULL,'75.60',NULL,'2','1','3','3','7','29',NULL,'4',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('195','2023-05-30 22:57:39','2023-05-30',NULL,NULL,'1000.00',NULL,'2','1','3','2','3','10',NULL,'3','22','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('196','2023-06-01 14:17:45','2023-06-01',NULL,NULL,'75.00',NULL,'2','4','3','2','6','23',NULL,'3','1','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('197','2023-06-01 14:20:08','2023-06-01',NULL,NULL,'80.00',NULL,'2','1','3','2','6','23',NULL,'2','20','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('198','2023-06-05 15:30:57','2023-06-05',NULL,NULL,'50.00',NULL,'1','1','3','1','1','3',NULL,'3',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('199','2023-06-05 15:33:21','2023-06-05','2023-06-05','100.00','100.00',NULL,'1','1','3','1','1','1',NULL,'2','88','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('200','2023-06-05 15:36:35','2023-06-01',NULL,NULL,'63.50',NULL,'2','4','3','2','3','10',NULL,'3','75','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('201','2023-06-05 15:38:05','2023-06-01',NULL,NULL,'196.83',NULL,'2','1','3','2','3','10',NULL,'2','75','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('202','2023-06-05 15:42:32','2023-06-02',NULL,NULL,'180.00',NULL,'1','4','3','1','1','3',NULL,'3','79','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('203','2023-06-05 15:47:11','2023-06-10','2023-06-15','1635.00','1635.00',NULL,'2','1','3','2','3','10',NULL,'2','89','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('204','2023-06-05 15:57:04','2023-06-09','2023-06-09','500.00','500.00',NULL,'2','1','3','2','3','10',NULL,'3','70','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('205','2023-06-05 16:40:59','2023-06-10','2023-06-09','299.00','299.00',NULL,'1','4','3','1','1','3',NULL,'3','90','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('206','2023-06-08 10:22:14','2023-06-07',NULL,NULL,'189.00',NULL,'1','4','3','1','1','3',NULL,'3','54','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('207','2023-06-08 10:27:02','2023-06-07',NULL,NULL,'109.00',NULL,'1','4','3','1','1','3',NULL,'3','38','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('208','2023-06-09 15:01:42','2023-06-07',NULL,NULL,'50.00',NULL,'1','4','3','1','1','3',NULL,'3','91','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('209','2023-06-09 15:15:22','2023-06-06',NULL,NULL,'60.00',NULL,'1','1','3','1','1','1',NULL,'2','92','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('210','2023-06-09 15:23:57','2023-06-07',NULL,NULL,'397.00',NULL,'1','1','3','1','1','1',NULL,'2','93','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('211','2023-06-09 15:25:19','2023-06-06',NULL,NULL,'19.00',NULL,'1','1','3','1','1','1',NULL,'2',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('212','2023-06-09 17:38:43','2023-06-09',NULL,NULL,'150.00',NULL,'1','1','3','1','1','1',NULL,'2',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('213','2023-06-12 14:21:57',NULL,'2023-07-04','355.00',NULL,NULL,'2','4','4','2','3','10',NULL,'3','94','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('214','2023-06-12 14:21:57','2023-07-24','2023-07-24','355.00','355.00',NULL,'2','4','3','2','3','10',NULL,'3','94','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('215','2023-06-12 14:21:57',NULL,'2023-08-13','355.00',NULL,NULL,'2','4','1','2','3','10',NULL,'3','94','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('216','2023-06-12 14:21:57',NULL,'2023-09-02','355.00',NULL,NULL,'2','4','1','2','3','10',NULL,'3','94','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('217','2023-06-12 14:21:57',NULL,'2023-09-22','355.00',NULL,NULL,'2','4','1','2','3','10',NULL,'3','94','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('218','2023-06-12 14:28:23','2023-06-10',NULL,NULL,'660.00',NULL,'1','1','3','1','1','1',NULL,'2','95','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('219','2023-06-12 14:29:58','2023-07-03','2023-06-16','50.00','50.00',NULL,'1','1','3','1','1','1',NULL,'2','14','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('220','2023-06-12 14:32:50','2023-06-12',NULL,NULL,'24.00',NULL,'1','1','3','1','1','1',NULL,'2',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('221','2023-06-13 15:01:53','2023-06-13',NULL,NULL,'70.00',NULL,'1','1','3','1','1','1',NULL,'2','96','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('222','2023-06-13 15:03:32','2023-06-13',NULL,NULL,'260.00',NULL,'2','1','3','2','5','22',NULL,'2','22','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('223','2023-06-13 16:50:02','2023-06-13',NULL,NULL,'28.00',NULL,'1','1','3','1','1','1',NULL,'4','12','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('224','2023-06-13 16:51:30','2023-06-19','2023-06-13','264.00','264.00',NULL,'1','4','3','1','1','1',NULL,'3','24','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('225','2023-06-13 17:19:12','2023-06-13',NULL,NULL,'45.00',NULL,'1','4','3','1','1','3',NULL,'3','30','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('226','2023-06-13 17:55:59','2023-06-26','2023-06-16','40.00','40.00',NULL,'1','1','3','1','1','3',NULL,'2','98','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('227','2023-06-14 16:08:59','2023-06-14',NULL,NULL,'100.00',NULL,'1','4','3','1','1','1',NULL,'3','38','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('228','2023-06-15 11:51:43','2023-06-30','2023-06-17','500.00','500.00','Compras de sandálias','2','4','3','2','3','10',NULL,'3','22','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('229','2023-06-15 16:00:05','2023-06-15',NULL,NULL,'470.00','Havaianas','1','1','3','1','1','1',NULL,'4','99','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('230','2023-06-19 16:11:54','2023-06-26','2023-06-23','62.00','62.00',NULL,'1','4','3','1','1','3',NULL,'3','100','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('231','2023-06-19 16:14:28','2023-06-17',NULL,NULL,'89.00',NULL,'1','1','3','1','1','1',NULL,'2',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('232','2023-06-19 16:17:14','2023-06-15',NULL,NULL,'562.00',NULL,'1','1','3','1','1','1',NULL,'4','101','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('233','2023-06-19 16:20:45','2023-06-15',NULL,NULL,'123.00',NULL,'1','1','3','1','1','1',NULL,'4',NULL,'2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('234','2023-06-19 16:33:01','2023-06-17',NULL,NULL,'1760.00',NULL,'2','1','3','2','3','10',NULL,'4','22','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('235','2023-06-19 17:58:23','2023-06-16',NULL,NULL,'878.00',NULL,'1','1','3','1','1','3',NULL,'3','70','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('236','2023-06-19 17:59:34','2023-06-16',NULL,NULL,'112.00',NULL,'1','1','3','1','1','1',NULL,'2','70','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('237','2023-06-19 18:03:41','2023-06-16',NULL,NULL,'62.00',NULL,'2','1','3','2','6','23',NULL,'3','1','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('238','2023-06-22 16:26:31','2023-06-22',NULL,NULL,'92.40',NULL,'1','4','3','1','1','1',NULL,'3','103','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('239','2023-06-22 16:30:32','2023-06-27','2023-06-26','50.00','50.00',NULL,'1','4','3','1','1','3',NULL,'3','103','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('240','2023-06-22 16:37:20','2023-06-21',NULL,NULL,'100.00',NULL,'1','4','3','1','1','1',NULL,'3','104','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('241','2023-06-22 16:38:19','2023-06-21',NULL,NULL,'20.00',NULL,'1','1','3','1','1','1',NULL,'2','104','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('242','2023-06-22 16:39:33','2023-07-03','2023-06-28','83.00','83.00',NULL,'1','4','3','1','1','3',NULL,'3','104','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('243','2023-06-22 16:45:31',NULL,'2023-06-28','27.00',NULL,NULL,'1','4','4','1','1','3',NULL,'3','105','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('244','2023-06-22 16:53:22','2023-06-21',NULL,NULL,'60.00',NULL,'1','1','3','1','1','1',NULL,'2','98','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('245','2023-06-27 14:53:07','2023-06-27',NULL,NULL,'90.00',NULL,'1','1','3','1','1','1',NULL,'2','106','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('246','2023-06-27 14:55:24','2023-06-23',NULL,NULL,'740.00','Colas','1','1','3','1','1','1',NULL,'2','70','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('247','2023-06-27 17:17:34','2023-06-27',NULL,NULL,'180.00',NULL,'1','1','3','1','1','1',NULL,'4','84','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('248','2023-06-29 09:42:32','2023-06-30','2023-06-30','486.00','486.00',NULL,'2','4','3','2','3','10',NULL,'4','22','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('249','2023-07-03 12:37:50','2023-07-28',NULL,NULL,'100.00',NULL,'2','4','3','2','6','23',NULL,'3','1','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('250','2023-07-03 13:51:45','2023-06-29',NULL,NULL,'130.00',NULL,'1','4','3','1','1','3',NULL,'3','105','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('251','2023-07-03 13:54:38','2023-06-29',NULL,NULL,'200.00',NULL,'1','4','3','1','1','3',NULL,'3','85','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('254','2023-07-03 14:16:51','2023-06-30',NULL,NULL,'138.50',NULL,'2','1','3','2','4','15',NULL,'3','1','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('255','2023-07-05 17:26:27',NULL,'2023-07-14','90.00',NULL,NULL,'1','1','4','1','1','1',NULL,'2','108','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('256','2023-07-05 17:29:22','2023-07-05',NULL,NULL,'200.00',NULL,'1','1','3','1','1','1',NULL,'4','109','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('257','2023-07-07 13:04:39','2023-07-07','2023-07-07','268.00','268.00',NULL,'1','4','3','1','1','3',NULL,'3','110','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('258','2023-07-07 13:04:39','2023-07-27','2023-07-22','268.00','268.00',NULL,'1','4','3','1','1','3',NULL,'3','110','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('259','2023-07-07 15:20:19','2023-07-07',NULL,NULL,'333.00',NULL,'1','4','3','1','1','3',NULL,'3','111','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('260','2023-07-07 15:20:19','2023-07-25','2023-07-25','333.00','333.00',NULL,'1','4','3','1','1','3',NULL,'3','111','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('261','2023-07-20 20:50:55','2023-04-06',NULL,NULL,'6788.90',NULL,'1','1','3','1','1','1',NULL,'7','112','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('262','2023-07-20 20:53:32','2023-04-04',NULL,NULL,'18766.59',NULL,'1','4','3','1','1','3',NULL,'8','113','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('263','2023-07-20 20:55:01','2023-04-12',NULL,NULL,'38765.35',NULL,'1','3','3','1','1','4',NULL,'7','114','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('264','2023-07-20 20:55:58','2023-04-18',NULL,NULL,'11789.23',NULL,'1','2','3','1','1','5',NULL,'7','113','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('265','2023-07-20 20:57:59','2023-05-11',NULL,NULL,'5789.33',NULL,'1','1','3','1','1','1',NULL,'9','114','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('266','2023-07-20 20:58:57','2023-05-10',NULL,NULL,'13465.69',NULL,'1','4','3','1','1','3',NULL,'8','112','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('267','2023-07-20 20:59:41','2023-05-14',NULL,NULL,'43511.23',NULL,'1','3','3','1','1','4',NULL,'8','113','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('268','2023-07-20 21:00:27','2023-05-24',NULL,NULL,'15435.55',NULL,'1','2','3','1','1','5',NULL,'8','114','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('269','2023-07-20 21:01:50','2023-05-12',NULL,NULL,'6789.99',NULL,'1','3','3','1','1','4',NULL,'7','112','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('270','2023-07-20 21:02:44','2023-06-06',NULL,NULL,'18977.72',NULL,'1','1','3','1','1','1',NULL,'9','113','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('271','2023-07-20 21:04:20','2023-06-21',NULL,NULL,'11099.88',NULL,'1','4','3','1','1','3',NULL,'7','113','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('272','2023-07-20 21:05:03','2023-06-19',NULL,NULL,'46712.12',NULL,'1','3','3','1','1','4',NULL,'8','114','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('273','2023-07-20 21:05:46','2023-06-14',NULL,NULL,'9877.85',NULL,'1','2','3','1','1','5',NULL,'7','114','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('274','2023-07-20 21:07:11','2023-07-10',NULL,NULL,'29077.34',NULL,'1','3','3','1','1','4',NULL,'9','112','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('275','2023-07-20 21:08:00','2023-07-03',NULL,NULL,'5678.88',NULL,'1','2','3','1','1','5',NULL,'9','113','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('276','2023-07-20 21:08:54','2023-07-17',NULL,NULL,'3790.01',NULL,'1','4','3','1','1','3',NULL,'9','112','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('277','2023-07-20 21:10:36','2023-04-05',NULL,NULL,'42334.43',NULL,'2','4','3','2','3','10',NULL,'7','116','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('278','2023-07-20 21:11:45','2023-04-21',NULL,NULL,'3908.82',NULL,'2','4','3','2','3','11',NULL,'8','116','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('279','2023-07-20 21:12:46','2023-04-20',NULL,NULL,'4612.33',NULL,'2','3','3','2','4','17',NULL,'8','117','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('280','2023-07-20 21:14:21','2023-04-26',NULL,NULL,'230.00',NULL,'2','1','3','3','7','24',NULL,'9','117','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('281','2023-07-20 21:14:21',NULL,'2023-05-26','230.00',NULL,NULL,'2','1','4','3','7','24',NULL,'9','117','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('282','2023-07-20 21:14:21',NULL,'2023-06-25','230.00',NULL,NULL,'2','1','4','3','7','24',NULL,'9','117','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('283','2023-07-20 21:14:21',NULL,'2023-07-25','230.00',NULL,NULL,'2','1','4','3','7','24',NULL,'9','117','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('284','2023-07-20 21:14:21',NULL,'2023-08-24','230.00',NULL,NULL,'2','1','1','3','7','24',NULL,'9','117','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('285','2023-07-20 21:14:21',NULL,'2023-09-23','230.00',NULL,NULL,'2','1','1','3','7','24',NULL,'9','117','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('286','2023-07-20 21:14:21',NULL,'2023-10-23','230.00',NULL,NULL,'2','1','1','3','7','24',NULL,'9','117','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('287','2023-07-20 21:14:21',NULL,'2023-11-22','230.00',NULL,NULL,'2','1','1','3','7','24',NULL,'9','117','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('288','2023-07-20 21:14:21',NULL,'2023-12-22','230.00',NULL,NULL,'2','1','1','3','7','24',NULL,'9','117','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('289','2023-07-20 21:14:21',NULL,'2024-01-21','230.00',NULL,NULL,'2','1','1','3','7','24',NULL,'9','117','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('290','2023-07-20 21:16:00','2023-04-28',NULL,NULL,'6550.00',NULL,'2','4','3','3','7','27',NULL,'8','115','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('291','2023-07-20 21:16:00','2023-05-28','2023-05-28','6550.00','6550.00',NULL,'2','4','3','3','7','27',NULL,'8','115','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('292','2023-07-20 21:16:00',NULL,'2023-06-27','6550.00',NULL,NULL,'2','4','4','3','7','27',NULL,'8','115','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('293','2023-07-20 21:16:00',NULL,'2023-07-27','6550.00',NULL,NULL,'2','4','4','3','7','27',NULL,'8','115','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('294','2023-07-20 21:16:00',NULL,'2023-08-26','6550.00',NULL,NULL,'2','4','1','3','7','27',NULL,'8','115','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('295','2023-07-20 21:16:00',NULL,'2023-09-25','6550.00',NULL,NULL,'2','4','1','3','7','27',NULL,'8','115','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('296','2023-07-20 21:16:00',NULL,'2023-10-25','6550.00',NULL,NULL,'2','4','1','3','7','27',NULL,'8','115','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('297','2023-07-20 21:16:00',NULL,'2023-11-24','6550.00',NULL,NULL,'2','4','1','3','7','27',NULL,'8','115','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('298','2023-07-20 21:16:00',NULL,'2023-12-24','6550.00',NULL,NULL,'2','4','1','3','7','27',NULL,'8','115','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('299','2023-07-20 21:16:00',NULL,'2024-01-23','6550.00',NULL,NULL,'2','4','1','3','7','27',NULL,'8','115','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('300','2023-07-20 21:18:20','2023-04-25',NULL,NULL,'18789.90',NULL,'2','4','3','3','8','31',NULL,'7','113','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('301','2023-07-20 21:18:20','2023-05-25','2023-05-25','18789.90','18789.90',NULL,'2','4','3','3','8','31',NULL,'7','113','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('302','2023-07-20 21:18:20','2023-06-24','2023-06-24','18789.90','18789.90',NULL,'2','4','3','3','8','31',NULL,'7','113','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('303','2023-07-20 21:18:20',NULL,'2023-07-24','18789.90',NULL,NULL,'2','4','4','3','8','31',NULL,'7','113','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('304','2023-07-20 21:18:20',NULL,'2023-08-23','18789.90',NULL,NULL,'2','4','1','3','8','31',NULL,'7','113','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('305','2023-07-20 21:18:20',NULL,'2023-09-22','18789.90',NULL,NULL,'2','4','1','3','8','31',NULL,'7','113','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('306','2023-07-20 21:18:20',NULL,'2023-10-22','18789.90',NULL,NULL,'2','4','1','3','8','31',NULL,'7','113','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('307','2023-07-20 21:18:20',NULL,'2023-11-21','18789.90',NULL,NULL,'2','4','1','3','8','31',NULL,'7','113','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('308','2023-07-20 21:18:20',NULL,'2023-12-21','18789.90',NULL,NULL,'2','4','1','3','8','31',NULL,'7','113','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('309','2023-07-20 21:18:20',NULL,'2024-01-20','18789.90',NULL,NULL,'2','4','1','3','8','31',NULL,'7','113','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('310','2023-07-22 10:57:51','2023-04-19',NULL,NULL,'897.65',NULL,'2','4','3','2','5','19',NULL,'8',NULL,'3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('311','2023-07-22 11:02:47','2023-05-04',NULL,NULL,'762.34',NULL,'2','1','3','2','2','8',NULL,'7','116','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('312','2023-07-22 11:03:49','2023-04-14',NULL,NULL,'456.11',NULL,'2','4','3','2','2','8',NULL,'8','117','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('313','2023-07-22 11:08:11','2023-05-22',NULL,NULL,'39876.11',NULL,'2','1','3','2','3','10',NULL,'9','115','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('314','2023-07-22 11:09:51','2023-05-16',NULL,NULL,'3451.15',NULL,'2','1','3','2','4','17',NULL,'7','117','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('316','2023-07-22 11:12:50','2023-05-08',NULL,NULL,'1466.68',NULL,'2','1','3','2','5','19',NULL,'8','115','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('317','2023-07-22 11:14:11','2023-05-09',NULL,NULL,'10544.80',NULL,'2','1','3','3','8','37',NULL,'9','115','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('318','2023-07-22 11:16:48','2023-05-27',NULL,NULL,'2250.00',NULL,'2','1','3','4','10','49',NULL,'9',NULL,'3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('319','2023-07-22 11:22:48','2023-06-06',NULL,NULL,'37662.21',NULL,'2','3','3','2','3','10',NULL,'8','115','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('320','2023-07-22 11:24:20','2023-06-06',NULL,NULL,'1456.88',NULL,'2','2','3','2','2','8',NULL,'7','115','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('321','2023-07-22 11:25:26','2023-06-12',NULL,NULL,'7612.20',NULL,'2','1','3','2','4','17',NULL,'9','117','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('322','2023-07-22 11:26:30','2023-06-12',NULL,NULL,'4562.39',NULL,'2','4','3','2','5','19',NULL,'7','116','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('323','2023-07-22 11:28:28','2023-06-29',NULL,NULL,'2564.42',NULL,'2','4','3','2','4','16',NULL,'7','115','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('324','2023-07-22 11:31:47','2023-07-03',NULL,NULL,'22567.23',NULL,'2','4','3','2','3','10',NULL,'9','116','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('325','2023-07-22 11:33:02',NULL,'2023-07-31','4098.86',NULL,NULL,'2','1','4','2','4','17',NULL,'9','115','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('326','2023-07-22 11:34:02',NULL,'2023-07-28','1234.56',NULL,NULL,'2','1','4','2','5','19',NULL,'9','116','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('327','2023-07-22 11:34:46','2023-07-21',NULL,NULL,'3209.88',NULL,'2','1','3','2','2','8',NULL,'9','115','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('328','2023-07-22 14:32:32',NULL,'2023-07-31','28906.00',NULL,NULL,'1','3','4','1','1','4',NULL,'7','113','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('329','2023-07-26 06:58:28','2023-06-20',NULL,NULL,'2145.69',NULL,'1','1','3','1','1','3',NULL,'8','112','3','2');

INSERT INTO TB_FLUXO_CAIXA VALUES('330','2023-07-27 14:44:36','2023-07-21',NULL,NULL,'100.00',NULL,'1','1','3','1','1','1',NULL,'2','108','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('331','2023-07-27 14:46:02','2023-07-27',NULL,NULL,'100.00',NULL,'1','4','3','1','1','3',NULL,'3','84','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('332','2023-07-27 21:37:30',NULL,'2023-08-01','279.30',NULL,NULL,'1','3','4','1','1','4',NULL,'3','118','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('333','2023-07-27 21:39:42','2023-07-19',NULL,NULL,'115.00',NULL,'1','1','3','1','1','1',NULL,'2','119','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('334','2023-07-27 21:45:26','2023-07-18',NULL,NULL,'200.00',NULL,'1','1','3','1','1','1',NULL,'2','86','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('335','2023-07-27 21:45:26',NULL,'2023-07-21','202.00',NULL,NULL,'1','4','4','1','1','3',NULL,'3','86','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('336','2023-07-27 21:49:07',NULL,'2023-07-24','110.00',NULL,NULL,'1','1','4','1','1','3',NULL,'2','105','2','1');

INSERT INTO TB_FLUXO_CAIXA VALUES('337','2023-07-27 21:56:23','2023-07-14',NULL,NULL,'274.00',NULL,'1','1','3','1','1','1',NULL,'2',NULL,'2','1');




DROP TABLE IF EXISTS TB_FUNCIONALIDADE;


CREATE TABLE `TB_FUNCIONALIDADE` (
  `co_funcionalidade` int(11) NOT NULL AUTO_INCREMENT,
  `no_funcionalidade` varchar(150) CHARACTER SET latin1 NOT NULL,
  `ds_action` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `st_status` varchar(1) CHARACTER SET latin1 DEFAULT 'A' COMMENT '''A - Ativo / I - Inativo''',
  `st_menu` varchar(1) CHARACTER SET latin1 DEFAULT 'S' COMMENT 'S - Sim / N - Não (Se apresenta no menu)',
  `co_controller` int(11) NOT NULL,
  PRIMARY KEY (`co_funcionalidade`,`co_controller`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_FUNCIONALIDADE VALUES('1','Perfil Master','PerfilMaster','A','S','1');

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

INSERT INTO TB_FUNCIONALIDADE VALUES('37','Listar Plano','ListarPlano','A','S','11');

INSERT INTO TB_FUNCIONALIDADE VALUES('38','Cadastro Plano','CadastroPlano','A','S','11');

INSERT INTO TB_FUNCIONALIDADE VALUES('39','Dados Complementares Assinante','DadosComplementaresAssinante','A','S','12');

INSERT INTO TB_FUNCIONALIDADE VALUES('40','Listar Assinante','ListarAssinante','A','S','12');

INSERT INTO TB_FUNCIONALIDADE VALUES('41','Cadastro Assinante','CadastroAssinante','A','N','12');

INSERT INTO TB_FUNCIONALIDADE VALUES('42','Meu Plano Assinante','MeuPlanoAssinante','A','S','12');

INSERT INTO TB_FUNCIONALIDADE VALUES('43','Renova Plano Assinante','RenovaPlanoAssinante','A','S','12');

INSERT INTO TB_FUNCIONALIDADE VALUES('44','Detalhar Assinatura Assinante','DetalharAssinaturaAssinante','A','N','12');

INSERT INTO TB_FUNCIONALIDADE VALUES('45','Notificação PagSeguro','NotificacaoPagSeguro','A','S','12');

INSERT INTO TB_FUNCIONALIDADE VALUES('46','ChatGPT','ChatGPT','A','S','13');

INSERT INTO TB_FUNCIONALIDADE VALUES('47','Planejamento','PlanejamentoFinanceiro','A','S','10');




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
) ENGINE=InnoDB AUTO_INCREMENT=449 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_HIST_SALDO_CB VALUES('1','2023-02-06 12:26:41',NULL,NULL,'0.01',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('2','2023-02-06 12:50:59',NULL,NULL,'0.01',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('3','2023-02-08 12:23:36','1','400.00','400.01','Adiantamento de passagem para viagem','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('4','2023-02-08 12:35:27','1','3700.00','4100.01','Era 4mil porem sobrou 300','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('5','2023-02-08 12:37:52','1','1800.00','5900.01','Pagamento Toalhinhas de personagem','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('6','2023-02-08 12:41:36','2','1800.00','4100.01','COmpra de toalhas de personagem 52 duzias','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('7','2023-02-08 15:42:40','2','560.00','-559.99','Passagem viagem Brás SP','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('8','2023-02-08 15:44:14','2','80.00','-639.99','Locomoção na viagem','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('9','2023-02-08 15:45:47','1','80.00','-559.99','Pago cartão C6 CRÉDITO','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('10','2023-02-08 15:48:00','2','260.00','-819.99','Custo da alimentação da viagem toda','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('11','2023-02-08 15:56:23','2','94.25','-914.24','Hospedagem do site','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('12','2023-02-08 15:58:33','2','3600.00','-4514.24','Compra das mochilas','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('13','2023-02-08 16:09:20','2','150.00','-4664.24','Compra dos talheres inox','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('14','2023-02-08 16:11:03','2','1530.00','2570.01','Materiais diversos','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('15','2023-02-08 16:12:12','2','220.00','2350.01','Compra de pilhas AAA e AA','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('16','2023-02-08 16:14:33','2','698.50','1651.51','Compras dos panos de prato e panos de chão','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('17','2023-02-08 16:16:00','2','579.00','1072.51','Compra porta lapis','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('18','2023-02-08 19:07:38','2','112.00','960.51','Compras porta lápis','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('19','2023-02-08 19:13:40','2','712.50','248.01','Compras dos panos de prato e panos de chão','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('20','2023-02-08 19:13:50','2','698.50','946.51','Exclusão de Lançamento, Compras dos panos de prato e panos de chão','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('21','2023-02-08 19:17:40','1','95.00','-4569.24','Porta lápis 2 ziper','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('22','2023-02-08 19:21:19','1','340.00','-4229.24','Porta lápis e mochila','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('23','2023-02-08 19:23:13','1','410.00','-3819.24','Mochilas e portas lápis','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('24','2023-02-08 19:24:35','1','532.00','-3287.24','Porta lápis','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('25','2023-02-08 19:25:04','1','532.00','-2755.24','Porta lápis','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('26','2023-02-08 19:25:12','1','532.00','-3287.24','Exclusão de Lançamento, Porta lápis','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('27','2023-02-08 19:30:50','1','100.00','-3187.24','Mochilas','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('28','2023-02-08 19:34:34','1','108.00','1054.51','Pago depois pix','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('29','2023-02-08 19:38:56','1','156.00','1210.51','Mochilas','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('30','2023-02-08 19:40:45','1','30.00','1240.51','1 dz colher inox','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('31','2023-02-08 19:41:58','1','543.00','-2644.24','Toalhas personagem e porta lapis e mochilas','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('32','2023-02-08 19:46:29','1','162.00','1402.51','Toalhas pers.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('33','2023-02-08 19:47:56','1','175.00','1577.51','Toalhas','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('34','2023-02-08 19:51:20','1','237.00','1814.51','toalhas','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('35','2023-02-08 19:52:53','1','54.00','1868.51','Toalhas','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('36','2023-02-08 19:54:05','1','156.00','2024.51','Mochilas','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('37','2023-02-08 19:54:18','1','156.00','1868.51','Exclusão de Lançamento, Mochilas','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('38','2023-02-09 14:09:31','1','420.00','-2224.24',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('39','2023-02-09 14:09:41','1','420.00','-2644.24','Exclusão de Lançamento, ','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('40','2023-02-09 14:14:15','1','208.00','2076.51',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('41','2023-02-09 14:14:56','1','125.00','-2519.24',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('42','2023-02-09 14:20:40','1','54.00','2130.51',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('43','2023-02-09 14:23:13','1','687.00','-1832.24','Toalhas personagem e porta lapis','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('44','2023-02-09 14:23:47','1','687.00','-2519.24','Exclusão de Lançamento, Toalhas personagem e porta lapis','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('45','2023-02-09 14:25:28','2','1118.00','1012.51','Transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('46','2023-02-09 14:25:28','1','1118.00','-1401.24','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('47','2023-02-09 14:26:46','2','364.00','648.51','Pagamento Porta Lápis','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('48','2023-02-09 14:28:21','1','386.00','-1015.24','Mochilas e Porta Lápis','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('49','2023-02-09 14:28:46','1','286.00','-1301.24','Exclusão de Lançamento, Mochilas e Porta Lápis','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('50','2023-02-09 14:33:15','1','100.00','-1201.24','Mochilas','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('51','2023-02-09 14:33:34','1','100.00','-1301.24','Exclusão de Lançamento, Mochilas','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('52','2023-02-09 14:43:05','2','180.00','-1481.24','Pix Hélio Ferreira','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('53','2023-02-09 14:47:17','2','700.00','-51.49',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('54','2023-02-09 14:48:02','2','600.00','-651.49',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('55','2023-02-09 14:49:09','2','700.00','-1351.49',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('56','2023-02-09 14:49:23','2','700.00','-651.49','Exclusão de Lançamento, ','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('57','2023-02-09 14:51:04','1','312.00','-1169.24','Toalhas mochilas e porta lapis','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('58','2023-02-09 14:51:22','1','312.00','-1481.24','Exclusão de Lançamento, Toalhas mochilas e porta lapis','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('59','2023-02-09 14:54:28','1','6360.00','4878.76',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('60','2023-02-09 15:19:10','1','112.00','-539.49','Porta lápis 2 xíper Troca de produto calça e blusa','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('61','2023-02-09 22:40:41','1','200.00','5078.76','Toalhas mochilas','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('62','2023-02-09 22:42:04','1','108.00','4970.76','Exclusão de Lançamento, Toalhas','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('63','2023-02-09 22:46:45','2','70.00','-609.49',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('64','2023-02-10 10:33:19','1','138.00','5108.76','Porta lapis','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('65','2023-02-10 10:33:28','1','138.00','4970.76','Exclusão de Lançamento, Porta lapis','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('66','2023-02-10 10:34:34',NULL,NULL,'-609.49',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('67','2023-02-10 10:35:00',NULL,NULL,'0.01',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('68','2023-02-10 11:47:25',NULL,NULL,'0.01',NULL,'5','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('69','2023-02-10 12:18:32','1','138.01','5108.77','Porta lapis','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('70','2023-02-10 12:18:42','1','138.01','4970.76','Exclusão de Lançamento, Porta lapis','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('71','2023-02-10 12:40:17','1','138.01','5108.77','Porta lapis','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('72','2023-02-10 12:40:28','1','138.01','4970.76','Exclusão de Lançamento, Porta lapis','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('73','2023-02-10 12:42:49','1','138.01','5108.77','Porta lapis','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('74','2023-02-10 12:43:31','1','138.01','4970.76','Exclusão de Lançamento, Porta lapis','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('79','2023-02-10 12:48:14','1','138.01','5108.77','Porta lapis','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('80','2023-02-10 12:48:29','1','138.00','5246.77','Porta lapis','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('81','2023-02-10 12:49:51','1','1000.00','390.51',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('82','2023-02-10 12:49:59','1','1000.00','-609.49','Exclusão de Lançamento, ','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('83','2023-02-14 14:22:04','1','492.00','5738.77','Toalha personagem e mochilas','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('84','2023-02-14 14:22:57','2','1050.00','4688.77','Toalhas Personagem','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('85','2023-02-14 14:24:04','2','750.00','-749.99','Toalhas coloridas','5','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('86','2023-02-14 14:24:42','1','200.00','4888.77','Toalhas personagem e porta lapis e mochilas','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('87','2023-02-14 14:28:46','1','162.00','5050.77','Mochilas','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('88','2023-02-14 14:30:22','1','137.00','-472.49','Toalha','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('89','2023-02-14 14:36:13','1','370.00','5420.77',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('90','2023-02-14 16:24:59','1','108.00','5528.77','Lápis de cor','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('91','2023-02-15 03:54:01','1','137.00','-335.49','Toalha','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('92','2023-02-15 12:10:13','2','1000.00','4528.77',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('93','2023-02-15 12:10:34','2','1000.00','3528.77','Pagamento Cartão de Crédito Bradesco','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('98','2023-02-24 11:35:41','2','213.00','-548.49',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('101','2023-02-24 11:44:24','1','75.00','-473.49','Grossa de lapis e toalhas','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('102','2023-02-24 11:46:57','1','288.00','3816.77','Mochilas e toalhas','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('103','2023-02-24 11:47:59','1','50.00','3866.77','Mochilas e porta lapis','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('104','2023-02-24 11:50:12','1','54.00','-419.49','Toalhas person.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('105','2023-02-24 11:53:12','1','153.00','-266.49',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('108','2023-02-25 09:39:44','1','108.00','3974.77',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('109','2023-02-25 09:40:29','2','318.00','-584.49','Transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('110','2023-02-25 09:40:29','1','318.00','4292.77','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('111','2023-02-25 09:43:54',NULL,NULL,'0.01',NULL,'6','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('112','2023-02-25 09:45:30','2','3598.77','694.00','Transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('113','2023-02-25 09:45:30','1','3598.77','3598.78','transferência entre contas.','6','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('114','2023-02-25 09:47:29','2','2240.19','-2990.18','Transferência entre contas.','5','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('115','2023-02-25 09:47:29','1','2240.19','5838.97','transferência entre contas.','6','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('116','2023-02-25 09:48:00','2','0.01','-2990.19','Transferência entre contas.','5','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('117','2023-02-25 09:48:00','1','0.01','5838.98','transferência entre contas.','6','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('118','2023-02-25 09:49:15','2','737.49','5101.49','Transferência entre contas.','6','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('119','2023-02-25 09:49:15','1','737.49','153.00','transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('120','2023-02-25 09:49:48','2','0.01','0.00','Transferência entre contas.','4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('121','2023-02-25 09:49:48','1','0.01','5101.50','transferência entre contas.','6','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('122','2023-03-04 11:22:13','2','2950.00','-2256.00','Havaianas','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('123','2023-03-04 11:24:03','2','670.00','-2926.00','Mochilqs','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('124','2023-03-04 11:27:46','1','30.00','-2896.00','Baixa no Pagamento','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('125','2023-03-04 11:27:46','1','162.00','-2734.00','Baixa no Pagamento','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('126','2023-03-04 11:27:46','1','276.00','-2458.00','Baixa no Pagamento','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('127','2023-03-04 11:29:08','1','150.00','-2308.00','Mochilas e toalhas','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('128','2023-03-04 11:33:02','1','200.00','353.00','Toalhas personagem 39 unidades','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('129','2023-03-06 08:45:10','2','310.00','43.00',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('130','2023-03-06 08:48:49','1','180.00','223.00','Havaianas','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('131','2023-03-06 08:49:32','1','225.00','448.00','Havaianas','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('132','2023-03-06 08:50:37','2','82.00','5019.50','Transferência entre contas.','6','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('133','2023-03-06 08:50:37','1','82.00','530.00','transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('134','2023-03-06 08:51:45','2','2850.00','2169.50','Transferência entre contas.','6','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('135','2023-03-06 08:51:45','1','2850.00','542.00','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('136','2023-03-06 08:52:22','1','150.00','692.00','Pct toalhas coloridas','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('137','2023-03-06 08:52:39','1','312.00','1004.00','Toalhas mochilas e porta lapis','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('138','2023-03-06 08:53:48','2','462.00','542.00','Transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('139','2023-03-06 08:53:48','1','462.00','2631.50','transferência entre contas.','6','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('140','2023-03-06 08:54:21','2','20.00','2611.50','Transferência entre contas.','6','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('141','2023-03-06 08:54:21','1','20.00','562.00','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('142','2023-03-06 08:58:13','2','120.00','-3110.19',NULL,'5','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('143','2023-03-06 08:58:46','2','80.00','-3190.19',NULL,'5','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('144','2023-03-06 08:59:13','2','400.00','-3590.19',NULL,'5','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('145','2023-03-07 13:54:43','2','450.00','80.00','Transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('146','2023-03-07 13:54:43','1','450.00','1012.00','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('147','2023-03-07 14:04:02','1','16.50','96.50',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('148','2023-03-09 10:59:23','1','107.00','1119.00','Panos de prato','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('149','2023-03-09 11:06:41','1','84.00','84.00','Panos de chão','4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('150','2023-03-09 11:08:11','1','140.00','224.00','Havaianas','4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('151','2023-03-14 13:44:55','1','236.82','1355.82','Havaianas e extensão','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('152','2023-03-14 13:54:19','2','224.00','0.00','Transferência entre contas.','4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('153','2023-03-14 13:54:19','1','224.00','320.50','transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('154','2023-03-14 13:55:47','2','350.00','-29.50','Transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('155','2023-03-14 13:55:47','1','350.00','1705.82','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('156','2023-03-14 13:56:51','2','1679.75','26.07','Transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('157','2023-03-14 13:56:51','1','1679.75','-1910.44','transferência entre contas.','5','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('158','2023-03-14 13:58:42','2','225.00','2386.50','Transferência entre contas.','6','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('159','2023-03-14 13:58:42','1','225.00','251.07','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('160','2023-03-14 14:06:16','1','80.00','331.07',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('161','2023-03-14 14:09:25','1','29.52','360.59',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('162','2023-03-14 14:11:07','2','398.00','1988.50','Transferência entre contas.','6','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('163','2023-03-14 14:11:07','1','398.00','-1512.44','transferência entre contas.','5','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('164','2023-03-14 14:14:17','2','29.50','1959.00','Transferência entre contas.','6','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('165','2023-03-14 14:14:17','1','29.50','0.00','transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('166','2023-03-14 16:25:44','1','100.00','460.59','Havaianas','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('167','2023-03-14 16:41:24','1','100.00','100.00','Havaianas','4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('168','2023-03-14 16:43:08','1','100.00','560.59','Mochilas e toalhas','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('169','2023-03-14 16:43:46','1','96.00','656.59','Restante do pagamento','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('170','2023-03-14 17:11:51','1','100.00','200.00','Havaianas','4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('171','2023-03-14 17:13:29','1','96.00','296.00','Restante do pagamento','4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('172','2023-03-14 17:16:17','1','22.00','318.00','Esc e cola','4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('173','2023-03-27 09:16:54','1','67.00','67.00','Restante do pagamento','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('174','2023-03-27 09:17:22','1','294.25','361.25','Materias diversos','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('175','2023-03-27 09:18:04','1','50.00','411.25',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('176','2023-03-27 09:18:56','1','110.00','521.25','Panos de prato','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('177','2023-03-27 09:19:27','1','476.50','1133.09','Havaianas','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('178','2023-03-27 09:20:04','2','476.50','656.59','Transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('179','2023-03-27 09:20:04','1','476.50','997.75','transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('180','2023-03-27 09:21:43','1','106.00','1103.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('181','2023-03-27 10:31:35','2','100.00','218.00',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('182','2023-03-27 10:33:39','1','56.00','1159.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('183','2023-03-27 10:44:30','2','450.00','709.75','Transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('184','2023-03-27 10:44:30','1','450.00','1106.59','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('185','2023-04-06 11:14:41','2','17.55','1089.04',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('186','2023-04-06 11:17:12','2','4.90','1084.14','Segura da conta PagBank','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('187','2023-04-06 11:18:02','2','300.00','409.75','Transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('188','2023-04-06 11:18:03','1','300.00','1384.14','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('189','2023-04-06 11:19:52','1','315.00','1699.14',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('190','2023-04-06 11:21:02','1','72.00','1771.14','Havaianas','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('191','2023-04-06 11:22:44','1','67.00','1838.14',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('192','2023-04-06 11:23:24','1','65.00','474.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('193','2023-04-06 11:24:11','1','353.50','2191.64','Havaianas','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('194','2023-04-06 11:24:56','1','123.00','597.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('195','2023-04-06 11:28:07','1','40.00','637.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('196','2023-04-06 11:38:39','1','200.00','837.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('197','2023-04-06 11:40:21','1','184.00','1021.75','Havaianas','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('198','2023-04-06 11:40:54','2','184.00','837.75','Transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('199','2023-04-06 11:40:55','1','184.00','2375.64','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('200','2023-04-11 14:20:34','1','40.00','877.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('201','2023-04-20 14:24:25','2','500.00','377.75','Transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('202','2023-04-20 14:24:25','1','500.00','2875.64','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('203','2023-04-20 14:28:17','1','60.00','437.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('204','2023-04-20 14:31:01','1','106.00','543.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('205','2023-04-20 14:34:18','1','106.00','649.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('206','2023-04-20 14:37:40','1','80.00','2955.64',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('207','2023-04-20 14:46:25','1','200.00','849.75','Materias DIversos','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('208','2023-04-20 14:52:44','2','580.00','2375.64','Cadeado ao barbear filtro de linha','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('209','2023-04-22 11:51:54','1','205.00','2580.64',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('210','2023-04-22 11:52:37','1','240.00','1089.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('211','2023-04-22 12:11:55','2','953.00','1627.64',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('212','2023-04-25 14:54:15','1','80.00','1169.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('213','2023-04-25 14:59:57','1','95.00','1722.64',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('214','2023-04-25 15:02:28','1','30.00','1199.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('215','2023-04-25 17:34:31','1','136.00','354.00',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('216','2023-04-25 17:35:27','1','50.00','404.00',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('217','2023-04-25 17:36:22','1','50.00','1772.64',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('218','2023-04-25 17:36:55','1','50.00','1822.64',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('219','2023-04-25 17:37:48','1','169.95','573.95',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('220','2023-04-25 17:46:52','1','26.00','1225.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('221','2023-04-25 17:48:13','1','26.00','1251.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('222','2023-04-26 22:36:00','1','470.00','1721.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('223','2023-04-27 14:24:07','1','38.00','1759.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('224','2023-04-27 14:26:26','1','80.00','1839.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('225','2023-04-27 14:28:15','2','220.00','353.95',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('226','2023-04-27 14:31:45','2','220.00','1619.75','Transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('227','2023-04-27 14:31:45','1','220.00','573.95','transferência entre contas.','4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('228','2023-04-27 17:34:46','1','183.00','1802.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('229','2023-04-27 18:55:41','1','50.00','623.95',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('230','2023-04-27 18:57:19','2','50.00','573.95',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('231','2023-04-30 13:02:12','1','150.00','1952.75','Havaianas','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('232','2023-05-04 15:13:35','1','150.00','2102.75','Materias DIversos','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('233','2023-05-04 15:20:02','1','100.00','2202.75','Toalhinhas','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('234','2023-05-04 15:23:00','1','110.00','2312.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('235','2023-05-04 15:25:10','2','220.00','2092.75','Transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('236','2023-05-04 15:25:10','1','220.00','793.95','transferência entre contas.','4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('237','2023-05-04 15:26:26','2','30.00','2062.75','Transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('238','2023-05-04 15:26:26','1','30.00','823.95','transferência entre contas.','4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('239','2023-05-05 16:11:21','2','88.00','735.95',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('240','2023-05-05 16:12:42','2','1000.00','1062.75','Transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('241','2023-05-05 16:12:42','1','1000.00','2822.64','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('242','2023-05-05 16:13:50','2','1512.44','1310.20','Transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('243','2023-05-05 16:13:50','1','1512.44','0.00','transferência entre contas.','5','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('244','2023-05-05 16:15:20','2','420.00','890.20',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('245','2023-05-05 16:18:11','2','555.00','335.20',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('246','2023-05-09 14:47:00','1','88.00','1150.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('247','2023-05-09 14:47:47','2','88.00','1062.75','Transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('248','2023-05-09 14:47:48','1','88.00','423.20','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('249','2023-05-09 14:49:25','1','150.00','573.20',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('250','2023-05-09 14:50:51','2','150.00','585.95',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('251','2023-05-09 14:51:42','2','585.95','0.00','Transferência entre contas.','4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('252','2023-05-09 14:51:42','1','585.95','2544.95','transferência entre contas.','6','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('253','2023-05-09 14:52:35','2','573.20','0.00','Transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('254','2023-05-09 14:52:35','1','573.20','3118.15','transferência entre contas.','6','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('255','2023-05-15 15:34:22','1','200.00','200.00','Vendas Arnaldo caldas','4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('256','2023-05-15 15:35:18','1','68.00','1130.75','Vendas Arnaldo caldas','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('257','2023-05-15 16:16:10','1','58.00','258.00','Cadeado 20','4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('258','2023-05-15 17:03:18','1','57.00','315.00',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('259','2023-05-15 17:52:18','2','450.00','-135.00','Transferência entre contas.','4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('260','2023-05-15 17:52:18','1','450.00','450.00','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('261','2023-05-18 16:56:31','1','172.00','37.00',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('262','2023-05-19 09:48:25','1','229.00','266.00',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('263','2023-05-23 15:34:16','1','125.00','391.00',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('264','2023-05-23 15:40:26','1','194.00','1324.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('265','2023-05-23 15:46:08','1','162.00','1486.75','Mochilas','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('268','2023-05-23 16:54:54','2','128.00','263.00',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('269','2023-05-23 16:56:12','2','130.00','1356.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('270','2023-05-23 16:58:00','2','1528.00','-1078.00',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('271','2023-05-23 22:59:26','2','50.28','212.72',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('272','2023-05-23 23:00:43','1','126.00','338.72',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('273','2023-05-25 14:49:33','1','150.00','1506.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('274','2023-05-25 15:00:04','1','110.00','-968.00',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('275','2023-05-25 15:04:29','1','35.00','1541.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('276','2023-05-25 15:05:29','1','30.00','1571.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('277','2023-05-25 15:07:30','1','70.00','-898.00',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('278','2023-05-26 18:02:34','1','150.00','1721.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('279','2023-05-30 16:10:03','1','168.00','-730.00',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('280','2023-05-30 17:17:45','1','82.00','1803.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('281','2023-05-30 17:18:47','2','350.00','1453.75','Transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('282','2023-05-30 17:18:47','1','350.00','-380.00','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('283','2023-05-30 18:02:42','1','356.00','-24.00',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('284','2023-05-30 18:08:57','2','500.00','953.75','Transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('285','2023-05-30 18:08:57','1','500.00','476.00','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('286','2023-05-30 19:00:10','1','150.00','488.72',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('287','2023-05-30 22:53:30','2','548.59','2569.56','Transferência entre contas.','6','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('288','2023-05-30 22:53:30','1','548.59','1024.59','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('289','2023-05-30 22:56:13','2','75.60','413.12',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('290','2023-05-30 22:57:39','2','1000.00','24.59',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('291','2023-06-01 14:03:26','2','800.00','153.75','Transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('292','2023-06-01 14:03:26','1','800.00','824.59','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('293','2023-06-01 14:17:45','2','75.00','749.59',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('294','2023-06-01 14:20:08','2','80.00','73.75',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('295','2023-06-05 15:30:57','1','50.00','799.59',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('296','2023-06-05 15:36:35','2','63.50','736.09',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('297','2023-06-05 15:38:05','2','196.83','-123.08',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('298','2023-06-05 15:42:32','1','180.00','916.09',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('299','2023-06-05 17:09:12','2','1584.00','-667.91','Sandálias','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('300','2023-06-05 17:10:03','2','446.00','-1113.91',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('301','2023-06-05 17:11:39','1','180.00','-933.91',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('302','2023-06-08 10:22:14','1','189.00','-744.91',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('303','2023-06-08 10:27:02','1','109.00','-635.91',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('304','2023-06-09 15:01:42','1','50.00','-585.91',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('305','2023-06-09 15:15:22','1','60.00','-63.08',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('306','2023-06-09 15:23:57','1','397.00','333.92',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('307','2023-06-09 15:25:19','1','19.00','352.92',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('308','2023-06-09 17:38:43','1','150.00','502.92',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('309','2023-06-09 17:40:03','2','800.00','-297.08','Transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('310','2023-06-09 17:40:03','1','800.00','214.09','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('311','2023-06-09 17:42:57','2','500.00','-285.91',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('312','2023-06-09 17:56:15','2','530.00','244.09','Exclusão de Lançamento, Lápis cor, lápis preto e agulha de desentupir boca de fogão','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('313','2023-06-09 17:57:40','1','60.00','184.09','Exclusão de Lançamento, ','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('314','2023-06-11 00:01:15','1','299.00','483.09',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('315','2023-06-12 14:28:23','1','660.00','362.92',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('316','2023-06-12 14:31:12','1','150.00','512.92','Materias DIversos','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('317','2023-06-12 14:32:50','1','24.00','536.92',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('318','2023-06-12 23:18:37','1','695.00','1231.92','Baixa no Pagamento','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('319','2023-06-12 23:19:59','2','695.00','536.92','Transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('320','2023-06-12 23:19:59','1','695.00','1108.12','transferência entre contas.','4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('321','2023-06-13 15:01:53','1','70.00','606.92',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('322','2023-06-13 15:03:32','2','260.00','346.92',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('323','2023-06-13 16:50:02','1','28.00','1136.12',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('324','2023-06-13 17:19:12','1','45.00','528.09',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('325','2023-06-14 16:08:59','1','100.00','628.09',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('326','2023-06-15 16:00:05','1','470.00','1606.12','Havaianas','4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('327','2023-06-19 16:14:28','1','89.00','435.92',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('328','2023-06-19 16:17:14','1','562.00','2168.12',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('329','2023-06-19 16:20:45','1','123.00','2291.12',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('330','2023-06-19 16:33:01','2','1760.00','531.12',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('331','2023-06-19 16:36:35','1','37.00','472.92','Restante toalhinhas','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('332','2023-06-19 16:39:22','2','1635.00','-1162.08',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('333','2023-06-19 17:07:55','2','1330.00','-798.88','Transferência entre contas.','4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('334','2023-06-19 17:07:55','1','1330.00','3899.56','transferência entre contas.','6','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('335','2023-06-19 17:09:00','2','628.00','0.09','Transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('336','2023-06-19 17:09:00','1','628.00','4527.56','transferência entre contas.','6','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('337','2023-06-19 17:51:44','1','264.00','264.09',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('338','2023-06-19 17:58:23','1','878.00','1142.09',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('339','2023-06-19 17:59:34','1','112.00','-1050.08',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('340','2023-06-19 18:03:41','2','62.00','1080.09',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('341','2023-06-22 16:26:31','1','92.40','1172.49',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('342','2023-06-22 16:28:28','2','90.00','-1140.08','Transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('343','2023-06-22 16:28:28','1','90.00','1262.49','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('344','2023-06-22 16:37:20','1','100.00','1362.49',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('345','2023-06-22 16:38:18','1','20.00','-1120.08',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('346','2023-06-22 16:39:33','1','83.00','1445.49',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('347','2023-06-22 16:53:22','1','60.00','-1060.08',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('348','2023-06-26 12:56:34','1','62.00','1507.49',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('349','2023-06-27 14:49:58','1','40.00','-1020.08',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('350','2023-06-27 14:51:29','1','100.00','-920.08','Baixa no Pagamento','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('351','2023-06-27 14:53:07','1','90.00','-830.08',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('352','2023-06-27 14:55:24','1','740.00','-90.08','Colas','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('353','2023-06-27 17:17:34','1','180.00','-618.88',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('354','2023-06-29 09:40:45','1','50.00','1557.49',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('355','2023-06-29 09:49:16','2','512.00','1045.49','Transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('356','2023-06-29 09:49:16','1','512.00','-106.88','transferência entre contas.','4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('357','2023-06-29 09:52:44','2','1045.49','0.00','Transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('358','2023-06-29 09:52:44','1','1045.49','5573.05','transferência entre contas.','6','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('359','2023-07-03 12:36:55','2','486.00','-592.88',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('360','2023-07-03 12:37:50','2','100.00','-100.00',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('361','2023-07-03 12:39:22','1','300.00','200.00',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('362','2023-07-03 13:49:50','2','500.00','-300.00','Compras de sandálias','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('363','2023-07-03 13:50:38','2','200.00','-290.08','Transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('364','2023-07-03 13:50:38','1','200.00','-100.00','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('365','2023-07-03 13:51:45','1','130.00','30.00',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('366','2023-07-03 13:53:58','2','50.00','-20.00','Transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('367','2023-07-03 13:53:58','1','50.00','-240.08','transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('368','2023-07-03 13:54:38','1','200.00','180.00',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('369','2023-07-03 14:02:01','2','304.00','-124.00','Transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('370','2023-07-03 14:02:01','1','304.00','63.92','transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('371','2023-07-03 14:08:45','2','486.00','-1078.88',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('372','2023-07-03 14:16:51','2','138.50','-262.50',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('373','2023-07-03 14:18:29','2','608.00','-544.08','Transferência entre contas.','2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('374','2023-07-03 14:18:29','1','608.00','345.50','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('375','2023-07-03 14:19:31','2','680.00','-334.50','Transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('376','2023-07-03 14:19:31','1','680.00','-398.88','transferência entre contas.','4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('377','2023-07-03 14:20:28','2','334.50','5238.55','Transferência entre contas.','6','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('378','2023-07-03 14:20:28','1','334.50','0.00','transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('379','2023-07-05 17:29:22','1','200.00','-198.88',NULL,'4','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('380','2023-07-07 15:20:19','1','333.00','333.00',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('381','2023-07-07 15:24:42','1','333.00','0.00','Exclusão de Lançamento, ','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('382','2023-07-07 15:25:32','1','333.00','-333.00','Exclusão de Lançamento, ','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('383','2023-07-07 15:28:05','1','50.00','-494.08',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('384','2023-07-07 15:29:26','1','83.00','-250.00',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('385','2023-07-07 18:26:12','1','268.00','18.00',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('386','2023-07-20 20:33:26',NULL,NULL,'0.18',NULL,'7','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('387','2023-07-20 20:34:20',NULL,NULL,'0.12',NULL,'8','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('388','2023-07-20 20:35:05',NULL,NULL,'0.30',NULL,'9','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('389','2023-07-20 20:50:55','1','6788.90','6789.08',NULL,'7','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('390','2023-07-20 20:53:32','1','18766.59','18766.71',NULL,'8','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('391','2023-07-20 20:55:01','1','38765.35','45554.43',NULL,'7','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('392','2023-07-20 20:55:58','1','11789.23','57343.66',NULL,'7','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('393','2023-07-20 20:57:59','1','5789.33','5789.63',NULL,'9','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('394','2023-07-20 20:58:57','1','13465.69','32232.40',NULL,'8','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('395','2023-07-20 20:59:41','1','43511.23','75743.63',NULL,'8','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('396','2023-07-20 21:00:27','1','15435.55','91179.18',NULL,'8','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('397','2023-07-20 21:01:50','1','6789.99','64133.65',NULL,'7','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('398','2023-07-20 21:02:44','1','189777.23','195566.86',NULL,'9','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('399','2023-07-20 21:03:13','1','18977.72','214544.58',NULL,'9','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('400','2023-07-20 21:04:20','1','11099.88','75233.53',NULL,'7','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('401','2023-07-20 21:05:03','1','46712.12','137891.30',NULL,'8','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('402','2023-07-20 21:05:46','1','9877.85','85111.38',NULL,'7','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('403','2023-07-20 21:07:11','1','29077.34','243621.92',NULL,'9','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('404','2023-07-20 21:08:00','1','5678.88','249300.80',NULL,'9','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('405','2023-07-20 21:08:54','1','3790.01','253090.81',NULL,'9','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('406','2023-07-20 21:10:36','2','42334.43','42776.95',NULL,'7','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('407','2023-07-20 21:11:45','2','3908.82','133982.48',NULL,'8','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('408','2023-07-20 21:12:46','2','14612.33','119370.15',NULL,'8','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('409','2023-07-20 21:14:21','2','230.00','252860.81',NULL,'9','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('410','2023-07-20 21:15:59','2','6550.00','112820.15',NULL,'8','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('411','2023-07-20 21:16:53','2','6550.00','106270.15',NULL,'8','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('412','2023-07-20 21:18:20','2','18789.90','23987.05',NULL,'7','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('413','2023-07-20 21:18:56','2','18789.90','5197.15',NULL,'7','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('414','2023-07-20 21:19:44','2','18789.90','-13592.75',NULL,'7','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('415','2023-07-22 10:57:51','2','6879.00','99391.15',NULL,'8','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('416','2023-07-22 10:59:57','2','897.65','98493.50',NULL,'8','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('417','2023-07-22 11:02:47','2','762.34','-14355.09',NULL,'7','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('418','2023-07-22 11:03:49','2','456.11','98037.39',NULL,'8','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('419','2023-07-22 11:06:09','2','4612.33','93425.06',NULL,'8','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('420','2023-07-22 11:08:11','2','39876.11','212984.70',NULL,'9','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('421','2023-07-22 11:09:50','2','3451.15','-17806.24',NULL,'7','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('422','2023-07-22 11:10:01','2','3451.15','-21257.39',NULL,'7','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('423','2023-07-22 11:10:37','2','3451.15','-17806.24','Exclusão de Lançamento, ','7','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('424','2023-07-22 11:12:50','2','1466.68','91958.38',NULL,'8','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('425','2023-07-22 11:14:11','2','10544.80','202439.91',NULL,'9','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('426','2023-07-22 11:16:48','2','2250.00','200189.91',NULL,'9','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('427','2023-07-22 11:22:48','2','37662.21','54296.17',NULL,'8','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('428','2023-07-22 11:24:20','2','1456.88','-19263.12',NULL,'7','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('429','2023-07-22 11:25:26','2','7612.20','192577.70',NULL,'9','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('430','2023-07-22 11:26:30','2','4562.39','-23825.51',NULL,'7','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('431','2023-07-22 11:28:28','2','2564.42','-26389.93',NULL,'7','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('432','2023-07-22 11:29:32','2','97654.30','94923.40','Transferência entre contas.','9','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('433','2023-07-22 11:29:32','1','97654.30','71264.37','transferência entre contas.','7','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('434','2023-07-22 11:31:47','2','41567.23','53356.17',NULL,'9','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('435','2023-07-22 11:34:46','2','3209.88','50146.29',NULL,'9','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('436','2023-07-22 11:36:20','2','22567.23','27579.06',NULL,'9','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('437','2023-07-26 06:58:27','1','2145.69','56441.86',NULL,'8','3');

INSERT INTO TB_HIST_SALDO_CB VALUES('438','2023-07-27 14:40:31','1','333.00','351.00',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('439','2023-07-27 14:43:29','2','355.00','-4.00','Baixa no Pagamento','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('440','2023-07-27 14:44:36','1','100.00','-394.08',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('441','2023-07-27 14:46:02','1','100.00','96.00',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('442','2023-07-27 21:32:14','1','60.00','156.00',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('443','2023-07-27 21:33:42','1','268.00','424.00',NULL,'3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('444','2023-07-27 21:39:42','1','115.00','-279.08',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('445','2023-07-27 21:45:26','1','200.00','-79.08',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('446','2023-07-27 21:56:23','1','274.00','194.92',NULL,'2','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('447','2023-07-27 21:58:10','2','610.00','-186.00','Transferência entre contas.','3','2');

INSERT INTO TB_HIST_SALDO_CB VALUES('448','2023-07-27 21:58:10','1','610.00','804.92','transferência entre contas.','2','2');




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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_HIST_TRANSFERENCIA VALUES('1','2023-02-09 14:25:28','2023-02-07 14:25:28','2130.51','1012.51','-2519.24','-1401.24','1118.00','2','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('2','2023-02-25 09:40:29','2023-02-23 09:40:29','-266.49','-584.49','3974.77','4292.77','318.00','2','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('3','2023-02-25 09:45:30','2023-02-25 09:45:30','4292.77','694.00','0.01','3598.78','3598.77','3','6','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('4','2023-02-25 09:47:29','2023-02-25 09:47:29','-749.99','-2990.18','3598.78','5838.97','2240.19','5','6','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('5','2023-02-25 09:48:00','2023-02-25 09:48:00','-2990.18','-2990.19','5838.97','5838.98','0.01','5','6','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('6','2023-02-25 09:49:15','2023-02-25 09:49:15','5838.98','5101.49','-584.49','153.00','737.49','6','2','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('7','2023-02-25 09:49:48','2023-02-25 09:49:48','0.01','0.00','5101.49','5101.50','0.01','4','6','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('8','2023-03-06 08:50:37','2023-03-06 08:50:37','5101.50','5019.50','448.00','530.00','82.00','6','2','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('9','2023-03-06 08:51:45','2023-03-06 08:51:45','5019.50','2169.50','-2308.00','542.00','2850.00','6','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('10','2023-03-06 08:53:48','2023-03-06 08:53:48','1004.00','542.00','2169.50','2631.50','462.00','3','6','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('11','2023-03-06 08:54:21','2023-03-06 08:54:21','2631.50','2611.50','542.00','562.00','20.00','6','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('12','2023-03-07 13:54:43','2023-03-06 13:54:43','530.00','80.00','562.00','1012.00','450.00','2','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('13','2023-03-14 13:54:19','2023-03-14 13:54:19','224.00','0.00','96.50','320.50','224.00','4','2','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('14','2023-03-14 13:55:47','2023-03-10 13:55:47','320.50','-29.50','1355.82','1705.82','350.00','2','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('15','2023-03-14 13:56:51','2023-03-10 13:56:51','1705.82','26.07','-3590.19','-1910.44','1679.75','3','5','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('16','2023-03-14 13:58:42','2023-03-10 13:58:42','2611.50','2386.50','26.07','251.07','225.00','6','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('17','2023-03-14 14:11:07','2023-03-13 14:11:07','2386.50','1988.50','-1910.44','-1512.44','398.00','6','5','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('18','2023-03-14 14:14:17','2023-03-14 14:14:17','1988.50','1959.00','-29.50','0.00','29.50','6','2','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('19','2023-03-27 09:20:04','2023-03-24 09:20:04','1133.09','656.59','521.25','997.75','476.50','3','2','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('20','2023-03-27 10:44:30','2023-03-24 10:44:30','1159.75','709.75','656.59','1106.59','450.00','2','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('21','2023-04-06 11:18:02','2023-04-28 11:18:02','709.75','409.75','1084.14','1384.14','300.00','2','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('22','2023-04-06 11:40:54','2023-04-05 11:40:54','1021.75','837.75','2191.64','2375.64','184.00','2','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('23','2023-04-20 14:24:25','2023-04-18 14:24:25','877.75','377.75','2375.64','2875.64','500.00','2','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('24','2023-04-27 14:31:45','2023-04-27 14:31:45','1839.75','1619.75','353.95','573.95','220.00','2','4','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('25','2023-05-04 15:25:10','2023-05-04 15:25:10','2312.75','2092.75','573.95','793.95','220.00','2','4','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('26','2023-05-04 15:26:26','2023-05-04 15:26:26','2092.75','2062.75','793.95','823.95','30.00','2','4','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('27','2023-05-05 16:12:42','2023-05-04 16:12:42','2062.75','1062.75','1822.64','2822.64','1000.00','2','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('28','2023-05-05 16:13:49','2023-05-04 16:13:49','2822.64','1310.20','-1512.44','0.00','1512.44','3','5','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('29','2023-05-09 14:47:47','2023-05-04 14:47:47','1150.75','1062.75','335.20','423.20','88.00','2','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('30','2023-05-09 14:51:42','2023-05-09 14:51:42','585.95','0.00','1959.00','2544.95','585.95','4','6','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('31','2023-05-09 14:52:34','2023-05-09 14:52:34','573.20','0.00','2544.95','3118.15','573.20','3','6','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('32','2023-05-15 17:52:18','2023-05-15 17:52:18','315.00','-135.00','0.00','450.00','450.00','4','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('33','2023-05-30 17:18:47','2023-05-29 17:18:47','1803.75','1453.75','-730.00','-380.00','350.00','2','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('34','2023-05-30 18:08:57','2023-05-30 18:08:57','1453.75','953.75','-24.00','476.00','500.00','2','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('35','2023-05-30 22:53:30','2023-05-30 22:53:30','3118.15','2569.56','476.00','1024.59','548.59','6','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('36','2023-06-01 14:03:26','2023-06-01 14:03:26','953.75','153.75','24.59','824.59','800.00','2','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('37','2023-06-09 17:40:03','2023-06-09 17:40:03','502.92','-297.08','-585.91','214.09','800.00','2','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('38','2023-06-12 23:19:59','2023-06-13 23:19:59','1231.92','536.92','413.12','1108.12','695.00','2','4','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('39','2023-06-19 17:07:55','2023-06-17 17:07:55','531.12','-798.88','2569.56','3899.56','1330.00','4','6','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('40','2023-06-19 17:09:00','2023-06-19 17:09:00','628.09','0.09','3899.56','4527.56','628.00','3','6','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('41','2023-06-22 16:28:28','2023-06-22 16:28:28','-1050.08','-1140.08','1172.49','1262.49','90.00','2','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('42','2023-06-29 09:49:16','2023-06-28 09:49:16','1557.49','1045.49','-618.88','-106.88','512.00','3','4','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('43','2023-06-29 09:52:44','2023-06-28 09:52:44','1045.49','0.00','4527.56','5573.05','1045.49','3','6','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('44','2023-07-03 13:50:38','2023-06-29 13:50:38','-90.08','-290.08','-300.00','-100.00','200.00','2','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('45','2023-07-03 13:53:57','2023-06-29 13:53:57','30.00','-20.00','-290.08','-240.08','50.00','3','2','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('46','2023-07-03 14:02:01','2023-07-10 14:02:01','180.00','-124.00','-240.08','63.92','304.00','3','2','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('47','2023-07-03 14:18:29','2023-06-29 14:18:29','63.92','-544.08','-262.50','345.50','608.00','2','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('48','2023-07-03 14:19:31','2023-07-03 14:19:31','345.50','-334.50','-1078.88','-398.88','680.00','3','4','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('49','2023-07-03 14:20:28','2023-07-03 14:20:28','5573.05','5238.55','-334.50','0.00','334.50','6','3','2','1');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('50','2023-07-22 11:29:31','2023-06-02 11:29:31','192577.70','94923.40','-26389.93','71264.37','97654.30','9','7','3','2');

INSERT INTO TB_HIST_TRANSFERENCIA VALUES('51','2023-07-27 21:58:10','2023-07-13 21:58:10','424.00','-186.00','194.92','804.92','610.00','3','2','2','1');




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
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_HISTORIA VALUES('1','Gráfico Comparação receitas/despesas','Gráfico Comparação receitas/despesas (Toda estrutura de categoria FC, período Meses)','2022-05-30 12:37:06','2023-07-27 22:55:37','C','8');

INSERT INTO TB_HISTORIA VALUES('2','Gráfico Indicadores financeiros','Gráfico Indicadores financeiros (Todos indicadores múltipla escolha) \"Período por meses\"','2022-05-30 12:37:38','2023-07-27 22:55:26','C','8');

INSERT INTO TB_HISTORIA VALUES('3','Gráfico Previsão de entradas, saídas e saldo','Gráfico Previsão de entradas, saídas e saldo a partir de hoje e atrasados','2022-05-30 12:38:00','2023-07-27 22:55:12','C','8');

INSERT INTO TB_HISTORIA VALUES('4','Saldos disponíveis','Saldos disponíveis das Contas (Data) \"Data Futuras considera os Pagamentos e recebimentos futuros\"','2022-05-30 12:38:23','2023-07-27 22:54:56','C','8');

INSERT INTO TB_HISTORIA VALUES('5','Pagamentos e recebimentos','Painel Pagamentos e recebimentos (Dia, da semana, do mês, do ano), coluna de atrasados e total','2022-05-30 12:38:43','2023-07-27 22:54:46','C','8');

INSERT INTO TB_HISTORIA VALUES('6','Meta de recebimento mensal','Painel de PE Econômico (Com Lucro) com campo para Simulação do percentual de lucro desejado','2022-05-30 12:39:09','2023-07-27 22:54:35','C','8');

INSERT INTO TB_HISTORIA VALUES('7','Ponto de equilíbrio operacional','Informação do PE','2022-05-30 12:39:38','2023-07-27 22:54:25','C','8');

INSERT INTO TB_HISTORIA VALUES('8','Cron Atualização de Status Pagamento','Cron Atualização de Status Pagamento','2022-05-30 12:40:34','2022-06-29 17:53:51','C','7');

INSERT INTO TB_HISTORIA VALUES('9','Multi Seleção dar Baixa Pagamento / Recebimento Botão','Multi Seleção dar Baixa Pagamento / Recebimento','2022-05-30 12:41:06','2022-05-30 12:41:06','C','7');

INSERT INTO TB_HISTORIA VALUES('10','Histórico de Transferências','Histórico de Transferências','2022-05-30 12:41:33','2022-05-30 12:41:33','C','7');

INSERT INTO TB_HISTORIA VALUES('11','Validação dos dados dos cadastros','Validar tipo de dados, dados obrigatórios, exclusão (Status inativar) , saldos','2022-05-30 12:42:04','2022-07-05 10:20:00','C','7');

INSERT INTO TB_HISTORIA VALUES('12','Transferência entre contas','Transferência entre contas','2022-05-30 12:42:25','2022-05-30 12:42:25','C','7');

INSERT INTO TB_HISTORIA VALUES('13','Histórico das Contas Transferências Modal cadastro de contas','Histórico das Contas Modal cadastro de contas\n2 VISÕES: Time Line e Gráficos','2022-05-30 12:42:57','2022-05-30 12:42:57','C','7');

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

INSERT INTO TB_HISTORIA VALUES('27','Listar Fluxo de Caixa','Listar Fluxo de Caixa \nCada Linha:\nCategorias PAI e Indicadores Financeiros\nCategorias Filhas\nMatriz:\nMês / Total (Período por ano)\nesperado, realizado, analise Total AT, analise Comparativa AC','2022-05-30 14:13:27','2022-05-30 14:13:27','C','5');

INSERT INTO TB_HISTORIA VALUES('28','Painel de Filtros','Painel de Filtros (Realizado, Esperado, ano, centro de custo, Categorias Pais ou Filhas)','2022-05-30 14:13:50','2022-05-30 14:13:50','C','5');

INSERT INTO TB_HISTORIA VALUES('29','Listar dados Comparador','Listar dados Comparador','2022-05-30 14:14:28','2022-05-30 14:14:28','C','4');

INSERT INTO TB_HISTORIA VALUES('30','Painel de Filtros','Período 1 (Mês/Ano a Mês/Ano) com Período 2 (Mês/Ano a Mês/Ano) e centro de custo e Categorias Pais ou Filhas','2022-05-30 14:14:49','2022-05-30 14:14:49','C','4');

INSERT INTO TB_HISTORIA VALUES('31','Tela de análises e sugestões dos dados','Guru, génio das finanças, oráculo, Personal FInanceiro (Maria Clara)\n\nDar dicas de como melhoraar o Fluxo de caixa os pontos positivos e negativos, analise mais elaborada.,','2022-05-30 14:15:36','2023-05-19 12:51:41','N','3');

INSERT INTO TB_HISTORIA VALUES('32','Acelerador De Preços de Serviços','Acelerador De Preços de Serviços\ndividi história','2022-05-30 14:17:06','2022-05-30 14:17:06','N','2');

INSERT INTO TB_HISTORIA VALUES('33','Acelerador De Preços de Produtos','Acelerador De Preços de Produtos\n\nDividi história','2022-05-30 14:17:41','2023-07-19 11:26:28','N','2');

INSERT INTO TB_HISTORIA VALUES('34','Acelerador De Ponto de Equilíbrio','Acelerador De Ponto de Equilíbrio','2022-05-30 14:18:01','2022-05-30 14:18:01','N','2');

INSERT INTO TB_HISTORIA VALUES('35','Acelerador De Lucros','Acelerador De Lucros','2022-05-30 14:18:20','2022-05-30 14:18:20','N','2');

INSERT INTO TB_HISTORIA VALUES('36','Acelerador De Pro-labore','Acelerador De Pro-labore','2022-05-30 14:18:37','2022-05-30 14:18:37','N','2');

INSERT INTO TB_HISTORIA VALUES('37','Acelerador De Custo','Acelerador De Custo','2022-05-30 14:19:05','2022-05-30 14:19:05','N','2');

INSERT INTO TB_HISTORIA VALUES('38','Cadastro Categorias FC na mesma modal de edição','Cadastro Categorias FC na mesma modal de edição','2022-05-30 14:20:11','2022-05-30 14:20:11','N','1');

INSERT INTO TB_HISTORIA VALUES('39','Load edição e exclusão categorias FC','Load edição e exclusão categorias FC','2022-05-30 14:20:38','2022-05-30 14:20:38','N','1');

INSERT INTO TB_HISTORIA VALUES('40','Unificação dos Métodos Entrada e Saída FC','Unificação dos Métodos Entrada e Saída FC','2022-05-30 14:20:59','2022-05-30 14:20:59','N','1');

INSERT INTO TB_HISTORIA VALUES('41','Histórico Lançamento','Histórico Lançamento','2022-05-30 14:21:21','2022-05-30 14:21:21','N','1');

INSERT INTO TB_HISTORIA VALUES('42','Lançamentos Esconder/Apresentar Colunas','Lançamentos Esconder/Apresentar Colunas','2022-05-30 14:21:46','2022-05-30 14:21:46','N','1');

INSERT INTO TB_HISTORIA VALUES('43','Histórico Conta Bancária','Histórico Conta Bancária (Entradas / Saídas / Transferências)','2022-05-30 14:22:13','2022-08-29 17:41:57','C','1');

INSERT INTO TB_HISTORIA VALUES('44','Melhorias no filtro de pesquisa','Campo de intervalo de valor, múltiplas categorias, múltiplas contas, múltiplos centro de custos , múltiplas representações e múltiplas formas de pagamento','2022-05-30 14:22:37','2023-05-19 12:44:16','N','1');

INSERT INTO TB_HISTORIA VALUES('45','Baixa nos lançamentos com Data selecionada','Baixa nos lançamentos com Data selecionada ou data esperada','2022-05-30 14:23:04','2022-05-30 14:23:04','N','1');

INSERT INTO TB_HISTORIA VALUES('46','Criar Botão de Estorno de Pagamento','Criar Botão de Estorno de Pagamento para voltar a não pago','2022-05-30 14:23:50','2022-05-30 14:23:50','N','1');

INSERT INTO TB_HISTORIA VALUES('47','Criar opção Lançamentos Repetidos e Parcelados','Criar opção Lançamentos Repetidos e Parcelados','2022-05-30 14:24:18','2022-06-24 09:20:51','C','1');

INSERT INTO TB_HISTORIA VALUES('48','Impressão Personalizada Lançamentos','Impressão Personalizada Lançamentos (PDF/ EXCEL) escolher campos','2022-05-30 14:24:43','2022-05-30 14:24:43','N','1');

INSERT INTO TB_HISTORIA VALUES('49','Impressão Personalizada Fluxo de Caixa','Impressão Personalizada FC(PDF/ EXCEL) escolher campos','2022-05-30 14:25:04','2022-05-30 14:25:04','N','1');

INSERT INTO TB_HISTORIA VALUES('50','Impressão Personalizada Comparador','Impressão Personalizada Comparador de Períodos (PDF/ EXCEL) escolher campos','2022-05-30 14:25:31','2022-05-30 14:25:31','N','1');

INSERT INTO TB_HISTORIA VALUES('51','Criar funcionalidades anti crise','Vamos lá','2022-06-18 07:26:11','2022-06-18 07:26:11','N','9');

INSERT INTO TB_HISTORIA VALUES('52','Lançamentos repetidos e parcelados','Lançamentos repetidos e parcelados','2022-06-19 23:11:27','2022-06-19 23:11:27','C','7');

INSERT INTO TB_HISTORIA VALUES('53','Pesquisa Avançada dos Assinantes','Pesquisa Avançada dos Assinantes por razão social, nome fantasia, Responsável, cidade e UF, email, valor assinatura atual.','2022-06-21 10:49:11','2022-06-21 10:49:11','N','13');

INSERT INTO TB_HISTORIA VALUES('54','Criar mensagem de expiração e bloqueio do sistema','Criar mensagem de expiração e bloqueio do sistema','2022-06-21 10:49:32','2022-06-21 10:49:32','N','13');

INSERT INTO TB_HISTORIA VALUES('55','Mudar loguin','Mudar loguin para logar com email tb, recuperar senha e notificar de mudar senha.','2022-06-21 10:50:26','2022-06-21 10:50:26','N','13');

INSERT INTO TB_HISTORIA VALUES('56','Configuração inicial do projeto','Configuração inicial do projeto','2022-06-21 10:50:47','2022-06-21 10:50:47','N','13');

INSERT INTO TB_HISTORIA VALUES('57','Manter Assinante','Manter assinante do sistema e com data de expiração do sistema para o assinante, criar contato, criar pessoa, envio de email de confirmação com senha gerada.','2022-06-21 10:51:08','2022-06-21 10:51:08','N','13');

INSERT INTO TB_HISTORIA VALUES('58','Trocar Senha','Confirmar senha antiga e nova e se esqueceu a senha encaminhar no email','2022-06-21 10:53:17','2022-06-21 10:53:17','N','11');

INSERT INTO TB_HISTORIA VALUES('59','Manter Usuário','Manter Usuário','2022-06-21 10:53:40','2022-06-21 10:53:40','N','11');

INSERT INTO TB_HISTORIA VALUES('60','Dados complementares Perfil Master edição','Dados complementares Perfil Master edição','2022-06-21 10:54:25','2022-06-21 10:54:25','N','12');

INSERT INTO TB_HISTORIA VALUES('61','Gestão de notificações','Gestão de notificações com as mensagens geradas do sistema de sucesso erro e avisos','2022-06-21 11:05:59','2022-06-21 11:05:59','N','12');

INSERT INTO TB_HISTORIA VALUES('62','Manter Fotos do Estabelecimento','Manter Fotos do Estabelecimento para o Site','2022-06-21 11:07:07','2022-06-21 11:07:07','N','12');

INSERT INTO TB_HISTORIA VALUES('63','Dados complementares básicos','Manter dados: (Endereço, telefone, CNPJ, fantasia, razão e outros)','2022-06-21 11:07:31','2022-06-21 11:07:31','N','12');

INSERT INTO TB_HISTORIA VALUES('64','Abrir Boleto e redirecionar para banco','Abrir Boleto e redirecionar para banco','2022-06-21 11:09:13','2022-06-21 11:09:13','N','10');

INSERT INTO TB_HISTORIA VALUES('65','Notificação do PagSeguro','Notificação do PagSeguro atualização automática mais funcionalidade de teste','2022-06-21 11:09:33','2022-06-21 11:09:33','N','10');

INSERT INTO TB_HISTORIA VALUES('66','Manter Planos do Assinante Sistema Expirado','Manter Planos do Assinante Sistema Expirado','2022-06-21 11:13:46','2022-06-21 11:13:46','N','10');

INSERT INTO TB_HISTORIA VALUES('67','Detalhes da transação da assinatura','Modal Detalhes da transação da assinatura','2022-06-21 11:14:02','2022-06-21 11:14:02','N','10');

INSERT INTO TB_HISTORIA VALUES('68','Estorno / Cancelamento do assinatura','Estorno / Cancelamento do assinatura','2022-06-21 11:14:26','2022-06-21 11:14:26','N','10');

INSERT INTO TB_HISTORIA VALUES('69','Renovar Assinatura','Renovar Assinatura Boleto / Cartão e transferência','2022-06-21 11:15:47','2022-06-21 11:15:47','N','10');

INSERT INTO TB_HISTORIA VALUES('70','Listar pagamentos','Listar pagamentos Assinante / Perfil Master','2022-06-21 11:19:30','2022-06-21 11:19:30','N','10');

INSERT INTO TB_HISTORIA VALUES('71','Cadastro pelo site para o assinante','verificar o cadastro pelo site para manter um plano mesmo que que por experiência','2022-06-21 11:23:16','2022-06-21 11:23:16','N','14');

INSERT INTO TB_HISTORIA VALUES('72','Página de captura de lead','Página de captura de lead','2022-06-21 11:23:36','2022-06-21 11:23:36','N','14');

INSERT INTO TB_HISTORIA VALUES('73','Vídeos para a Página de captura de cliente','Vídeos para a Página de captura de cliente','2022-06-21 11:25:58','2022-06-21 11:25:58','N','14');

INSERT INTO TB_HISTORIA VALUES('74','Landing pag de alta conversão','Página de captura de cliente','2022-06-21 11:26:19','2023-07-19 18:00:13','N','14');

INSERT INTO TB_HISTORIA VALUES('75','Vídeos para lançamento de vendas','produção de Vídeos para lançamento de vendas','2022-06-21 11:28:13','2022-06-21 11:28:13','N','15');

INSERT INTO TB_HISTORIA VALUES('76','Lançamento das Vendas','de 1 a 7 dias de vendas com página aquecida','2022-06-21 11:28:37','2022-06-21 11:28:37','N','15');

INSERT INTO TB_HISTORIA VALUES('77','Direcionar para o lançamento','Após Lançamento Direcionar para o lançamento o tráfego do PL','2022-06-21 11:29:58','2022-06-21 11:29:58','N','16');

INSERT INTO TB_HISTORIA VALUES('78','Material do Pré Lançamento','Produção e Disponibilização do material para lista de lead','2022-06-21 11:30:31','2022-06-21 11:30:31','N','16');

INSERT INTO TB_HISTORIA VALUES('79','Criar conteúdos e Entregas','Criar conteúdos para entrega e ir formulando a lista de lead','2022-06-21 11:31:26','2022-06-21 11:31:26','N','17');

INSERT INTO TB_HISTORIA VALUES('80','Criação da Lista de Lead','Criação da Lista de Lead já trabalhadas nas redes sociais e mais..','2022-06-21 11:32:09','2022-06-21 11:32:09','N','17');

INSERT INTO TB_HISTORIA VALUES('81','Gerar Entidades','Gerar Entidades Verificar a geração das entidades','2022-06-21 22:31:02','2022-06-21 22:31:02','N','18');

INSERT INTO TB_HISTORIA VALUES('82','Realizar Backup (Sepadados por listas)','Criar funcionalidade para realizar o backup do banco do projeto, com a opção de enviar o arquivo sql por email.\n\nCriar lista de tabelas para backup:\n- Tabelas Auditorias\n- Tabelas essenciais ( acesso, visitas, trafego e outras)\n- Tabelas Sistema','2022-06-21 22:33:33','2022-06-21 22:33:33','N','18');

INSERT INTO TB_HISTORIA VALUES('83','Separação do banco de Auditoria','Separação do banco de Auditoria em outro banco','2022-06-21 22:35:58','2022-06-21 22:35:58','N','18');

INSERT INTO TB_HISTORIA VALUES('84','Limpar dados acesso','Limpar dados acesso','2022-06-21 22:36:55','2022-06-21 22:36:55','N','18');

INSERT INTO TB_HISTORIA VALUES('85','Limpar Dados Auditoria','EM outro banco Limpar Dados Auditoria com periodo e auditoria tabela e auditoria itens','2022-06-21 22:37:53','2022-06-21 22:37:53','N','18');

INSERT INTO TB_HISTORIA VALUES('86','Limpar dados de das Visitas e trafego','Limpar dados de das Visitas e trafego páginas e tudo mais','2022-06-21 22:38:39','2022-06-21 22:38:39','N','18');

INSERT INTO TB_HISTORIA VALUES('87','Padronizar os templetes das Views','Padronizar os templetes das Views','2022-06-21 22:41:42','2022-06-21 22:41:42','N','19');

INSERT INTO TB_HISTORIA VALUES('88','Relacionamentos na Entidade','Passar os relacionamento de cada entidade para seu arquivo de ENTIDADE','2022-06-21 22:43:16','2022-06-21 22:43:16','N','19');

INSERT INTO TB_HISTORIA VALUES('89','Unificar as Classe GRID','Unificar as Classe GRID','2022-06-21 22:50:29','2022-06-21 22:50:29','N','19');

INSERT INTO TB_HISTORIA VALUES('90','Inicializar o Banco de dados','Inicializar o Banco de dados com os dados iniciais necessários padrões\n\ntabelas do banco e inserts iniciais (Usuário padrão perfil maste e etc..)','2022-06-21 22:51:23','2022-06-21 22:51:23','N','19');

INSERT INTO TB_HISTORIA VALUES('91','Visualização da Auditoria','Melhorias na funcionalidade de auditoria onde tem que separar os itens da auditoria quando usa o metodo deletar quando e unificar a auditoria item quando são vários inserts na mesma tabela e vincular as chaves estrangeiras para aparecer a descrição da chave\n\nEx.: (Código usuário/ nome do usuário \'Leo Bessa\')\n\n(Código Empresa/ nome da empresa \'Minha empresa\')','2022-06-21 22:53:15','2022-06-21 22:53:15','N','19');

INSERT INTO TB_HISTORIA VALUES('92','Exclusão de arquivos do projeto','Exclusão de arquivos desnecessários do projeto','2022-06-21 22:54:22','2022-06-21 22:54:22','N','19');

INSERT INTO TB_HISTORIA VALUES('93','Validação dos includes','Validação dos includes o que é necessário e se é preciso pro arquivo','2022-06-21 22:55:29','2022-06-21 22:55:29','N','19');

INSERT INTO TB_HISTORIA VALUES('94','Alterar Info','Alterar Info dos campo para Tooltip','2022-06-21 22:56:33','2022-06-21 22:56:33','N','19');

INSERT INTO TB_HISTORIA VALUES('95','Campo Tags','Criar opção para campos Tags','2022-06-21 22:57:27','2022-06-21 22:57:27','N','19');

INSERT INTO TB_HISTORIA VALUES('96','Versionamento do sistema','Controle da versão do sistema por commit','2022-06-21 22:58:44','2022-06-21 22:58:44','N','19');

INSERT INTO TB_HISTORIA VALUES('97','Manter Usuário Assinante','Manter Usuário Assinante','2022-06-21 23:00:28','2022-06-21 23:00:28','N','19');

INSERT INTO TB_HISTORIA VALUES('98','Manter Itens','Manter Itens com prioridade','2022-06-24 09:24:14','2022-06-24 09:24:55','N','20');

INSERT INTO TB_HISTORIA VALUES('99','Manter Pagamentos','Manter Pagamentos com prioridades','2022-06-24 09:24:38','2022-06-24 09:24:38','N','21');

INSERT INTO TB_HISTORIA VALUES('100','Criar vídeos da consultoria','Criar vídeos da consultoria','2022-06-24 09:27:08','2022-06-24 09:27:08','N','22');

INSERT INTO TB_HISTORIA VALUES('101','Criar vídeos cursos rápidos','Criar vídeos cursos rápidos','2022-06-24 09:27:36','2022-06-24 09:27:36','N','23');

INSERT INTO TB_HISTORIA VALUES('102','Criar vídeos cursos avançados','Criar vídeos cursos avançados','2022-06-24 09:28:01','2022-06-24 09:28:01','N','24');

INSERT INTO TB_HISTORIA VALUES('103','Página de captura de cliente','Página de captura de cliente','2022-06-24 09:30:12','2022-06-24 09:30:12','N','25');

INSERT INTO TB_HISTORIA VALUES('104','Vídeos para a Página de captura de cliente','Vídeos para a Página de captura de cliente','2022-06-24 09:30:36','2022-06-24 09:30:36','N','25');

INSERT INTO TB_HISTORIA VALUES('105','Página de captura de lead','Página de captura de lead','2022-06-24 09:31:02','2022-06-24 09:31:02','N','25');

INSERT INTO TB_HISTORIA VALUES('106','Cadastro pelo site para o assinante',NULL,'2022-06-24 09:31:28','2022-06-24 09:31:28','N','25');

INSERT INTO TB_HISTORIA VALUES('107','Metodo pesquisa sem dependencias','Metodo pesquisa sem dependencias e sem orientação a objeto pesquisa direto e mais rápida','2022-06-28 16:43:56','2022-06-28 16:43:56','N','19');

INSERT INTO TB_HISTORIA VALUES('108','Manter Planejamento mensal de cada categoria neta','Fazer o planejamento mensal de cada categoria neta','2022-06-28 16:49:47','2022-06-28 16:50:04','N','26');

INSERT INTO TB_HISTORIA VALUES('109','Atualização via AJAX','todas asa laterações serão feitas via AJAX de modo que não precise recarregar a página de forma alguma','2022-07-05 10:21:05','2022-07-05 10:21:05','N','1');

INSERT INTO TB_HISTORIA VALUES('110','Criar Funcionalidade de acerto de saldo','Criar Funcionalidade de acerto de saldo','2022-07-05 10:22:28','2022-07-14 10:27:55','N','7');

INSERT INTO TB_HISTORIA VALUES('111','Criar linha na anlise de acerto de saldo','Criar linha na anlise de acerto de saldo','2022-07-05 10:23:34','2022-07-05 10:23:34','N','3');

INSERT INTO TB_HISTORIA VALUES('112','Criar linha na anlise de ponto de equilíbrio','Criar linha na anlise de ponto de equilíbrio onde (70%) da renda estara comprometida para despesas e o restante investimentos e reserva financeira (Flexibilidade orçamentária)','2022-07-05 10:24:55','2022-07-05 10:24:55','N','3');

INSERT INTO TB_HISTORIA VALUES('113','Reformular painel de filtros','Campo de intervalo de valor, múltiplas categorias, múltiplas contas, múltiplos centro de custos , múltiplas representações e múltiplas formas de pagamento','2022-07-05 12:00:33','2022-08-04 18:20:31','I','7');

INSERT INTO TB_HISTORIA VALUES('114','Gráfico 5 maiores despesas cat Filhas','Gráfico 5 maiores despesas cat Filhas','2022-07-05 12:05:29','2023-05-19 13:00:37','I','27');

INSERT INTO TB_HISTORIA VALUES('115','Gráfico 5 maiores despesas cat Netas','Gráfico 5 maiores despesas cat Netas','2022-07-05 12:05:42','2023-05-19 13:00:45','I','27');

INSERT INTO TB_HISTORIA VALUES('116','Gráfico geral cat filhas %','Gráfico geral cat filhas %','2022-07-05 12:07:01','2023-05-19 13:00:56','I','27');

INSERT INTO TB_HISTORIA VALUES('117','Criar linha do tempo da Reserva financeira','Criar linha do tempo da Reserva financeira','2022-07-05 12:15:17','2023-05-21 15:42:08','N','3');

INSERT INTO TB_HISTORIA VALUES('118','Manter rendimentos','Manter Rendimentos','2022-07-05 12:16:10','2023-05-21 15:46:36','N','7');

INSERT INTO TB_HISTORIA VALUES('119','Botão de configuração do Lançamento','Botão de configuração do Lançamento, abrir modal com os dados do lancamento e com as opções para o mesmo como: edição exclusão, Confirmar pagamento .','2023-05-19 12:43:11','2023-05-19 12:43:11','N','1');

INSERT INTO TB_HISTORIA VALUES('120','Edição do Lançamento com contas diferentes','Edição do Lançamento com contas diferentes corrigir o saldo anterior criado','2023-05-19 12:47:01','2023-05-19 12:47:01','N','5');

INSERT INTO TB_HISTORIA VALUES('121','Carregar dados dos clientes no FC de Entrada','Carregar dados dos clientes no FC de Entrada','2023-05-19 13:02:34','2023-05-19 13:02:34','N','7');

INSERT INTO TB_HISTORIA VALUES('122','Carregar dados dos Fornecedores no FC de Saída','Carregar dados dos Fornecedores no FC de Saída','2023-05-19 13:02:53','2023-05-19 13:02:53','N','7');

INSERT INTO TB_HISTORIA VALUES('123','Filtro de Periodo mudar para select','Filtro de Periodo mudar para select','2023-05-21 15:44:12','2023-05-21 15:44:12','N','4');

INSERT INTO TB_HISTORIA VALUES('124','Refazer class Form Assistente','Refazer para o novo Layout com a classe','2023-07-19 11:30:43','2023-07-19 11:30:43','N','31');

INSERT INTO TB_HISTORIA VALUES('125','Refazer a classe Form','Refazer para o novo Layout com a classe de todos os campos','2023-07-19 11:31:45','2023-07-19 11:31:45','N','31');

INSERT INTO TB_HISTORIA VALUES('126','Refazer classe de gráficos','Refazer classe de gráficos','2023-07-19 11:32:27','2023-07-19 11:32:46','N','31');

INSERT INTO TB_HISTORIA VALUES('127','Refazer classe de Grid','Refazer classe de Grid, apresentação de colunas , campo pesquisa, campos filtros, páginação, adicionar linha e retirar linha.','2023-07-19 11:33:57','2023-07-19 11:35:24','I','31');

INSERT INTO TB_HISTORIA VALUES('128','Refazer classe Model','Refazer classe Model todos os tipos de modais','2023-07-19 11:36:24','2023-07-19 11:36:24','N','31');

INSERT INTO TB_HISTORIA VALUES('129','Refazer classe de Notificações','Refazer classe de Notificações mensagens','2023-07-19 11:37:15','2023-07-19 11:37:15','N','31');

INSERT INTO TB_HISTORIA VALUES('130','Refazer classe Valida','Refazer classe Valida (Labels comuns)','2023-07-19 11:38:48','2023-07-19 11:38:48','N','31');

INSERT INTO TB_HISTORIA VALUES('131','Criar barra de identificação de Ambiente','Criar barra de identificação de Ambiente / 1 - DEV / 2 - TST / 3 - PRD','2023-07-19 11:39:54','2023-07-19 11:39:54','N','31');

INSERT INTO TB_HISTORIA VALUES('132','Refazer classe Funções .js','Refazer classe Funções .js','2023-07-19 11:41:42','2023-07-19 11:41:42','N','31');

INSERT INTO TB_HISTORIA VALUES('133','Refazer classe Validações .js','Refazer classe Validações .js','2023-07-19 11:43:46','2023-07-19 11:43:46','N','31');

INSERT INTO TB_HISTORIA VALUES('134','Refazer Partial linha do tempo','Refazer Partial linha do tempo','2023-07-19 11:45:01','2023-07-19 11:45:01','N','31');

INSERT INTO TB_HISTORIA VALUES('135','Gestão  - Config','Gestão  - Config','2023-07-19 11:52:30','2023-07-19 17:51:03','N','32');

INSERT INTO TB_HISTORIA VALUES('136','Gestão - Gerar Entidades','Gestão - Gerar Entidades','2023-07-19 11:53:18','2023-07-19 17:50:38','N','32');

INSERT INTO TB_HISTORIA VALUES('137','Gestão - Gerar Backup','Gestão - Gerar Backup','2023-07-19 11:55:35','2023-07-19 17:50:22','N','32');

INSERT INTO TB_HISTORIA VALUES('138','Gestão - Pre Projeto','Gestão - Pre Projeto e todas telas internas da funcionalidade','2023-07-19 11:56:37','2023-07-19 17:50:00','N','32');

INSERT INTO TB_HISTORIA VALUES('139','Gestão - Limpar dados bnaco','Gestão - Limpar dados bnaco','2023-07-19 11:58:42','2023-07-19 17:49:36','N','32');

INSERT INTO TB_HISTORIA VALUES('140','Gestão - Crons','Gestão - Crons','2023-07-19 11:59:26','2023-07-19 17:49:19','N','32');

INSERT INTO TB_HISTORIA VALUES('141','Gestão - Minificação','Gestão - Minificação','2023-07-19 12:00:01','2023-07-19 12:00:01','N','32');

INSERT INTO TB_HISTORIA VALUES('142','Auditoria','Auditoria e suas telas, filtros e apresentação dae dados','2023-07-19 12:00:41','2023-07-19 17:38:34','N','32');

INSERT INTO TB_HISTORIA VALUES('143','Acesso','Funcionalidade de acesso e filtros','2023-07-19 12:01:46','2023-07-19 17:38:16','N','32');

INSERT INTO TB_HISTORIA VALUES('144','Funcionalidade','Funcionalidade listar e cadastro','2023-07-19 12:02:37','2023-07-19 17:37:45','N','32');

INSERT INTO TB_HISTORIA VALUES('145','Perfil','Funcionalidade de Perfil listar e cadastro','2023-07-19 12:03:13','2023-07-19 17:37:20','N','32');

INSERT INTO TB_HISTORIA VALUES('146','Usuario','Funcionalidade Usuário listar e cadastro','2023-07-19 17:21:08','2023-07-19 17:36:57','N','32');

INSERT INTO TB_HISTORIA VALUES('147','Visita','Funcionalidade Visita gráficos','2023-07-19 17:21:41','2023-07-19 17:36:33','N','32');

INSERT INTO TB_HISTORIA VALUES('148','Fluxo de Caixa lançamentos 1','Listagem dos lançamentos','2023-07-19 17:24:05','2023-07-19 17:35:29','C','32');

INSERT INTO TB_HISTORIA VALUES('149','Fluxo de Caixa lançamentos 2','Manter lançamentos Modais','2023-07-19 17:24:44','2023-07-19 17:35:55','I','32');

INSERT INTO TB_HISTORIA VALUES('151','Fluxo de Caixa Analise','Recriar a tabela de fluxo de caixa de analise e filtros','2023-07-19 17:26:29','2023-07-19 17:26:29','N','32');

INSERT INTO TB_HISTORIA VALUES('152','Fluxo de Caixa Comparador','recriar as tabelas de comparador e filtros','2023-07-19 17:27:09','2023-07-19 17:27:09','N','32');

INSERT INTO TB_HISTORIA VALUES('153','Planos de assinatura','listagem e cadastro','2023-07-19 17:27:56','2023-07-19 17:33:53','N','32');

INSERT INTO TB_HISTORIA VALUES('154','Assinantes Dados complementares','Assinantes Dados complementares','2023-07-19 17:28:37','2023-07-19 17:33:32','N','32');

INSERT INTO TB_HISTORIA VALUES('155','Assinantes Listagem','Assinantes Listagem','2023-07-19 17:29:49','2023-07-19 17:33:10','N','32');

INSERT INTO TB_HISTORIA VALUES('156','Assinantes Meu planos','Assinantes Meu planos e Modal','2023-07-19 17:31:21','2023-07-19 17:32:52','N','32');

INSERT INTO TB_HISTORIA VALUES('157','Assinantes Renovação de planos','Assinantes Renovação de planos','2023-07-19 17:31:50','2023-07-19 17:31:50','N','32');

INSERT INTO TB_HISTORIA VALUES('158','Assinantes Notificação','Assinantes Notificação','2023-07-19 17:32:27','2023-07-19 17:32:27','N','32');




DROP TABLE IF EXISTS TB_HISTORICO_HISTORIA;


CREATE TABLE `TB_HISTORICO_HISTORIA` (
  `co_historico_historia` int(11) NOT NULL AUTO_INCREMENT,
  `nu_esforco` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_esforco_restante` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `co_historia` int(11) NOT NULL,
  PRIMARY KEY (`co_historico_historia`,`co_historia`)
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


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

INSERT INTO TB_HISTORICO_HISTORIA VALUES('54','40','40','2022-06-18 07:26:11','51');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('55','20',NULL,'2022-06-19 23:11:27','52');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('56','20','20','2022-06-21 10:49:11','53');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('57','13','13','2022-06-21 10:49:32','54');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('58','8','8','2022-06-21 10:50:26','55');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('59','8','8','2022-06-21 10:50:47','56');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('60','30','30','2022-06-21 10:51:08','57');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('61','8','8','2022-06-21 10:53:17','58');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('62','40','40','2022-06-21 10:53:40','59');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('63','5','5','2022-06-21 10:54:25','60');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('64','20','20','2022-06-21 11:05:59','61');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('65','8','8','2022-06-21 11:07:07','62');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('66','20','20','2022-06-21 11:07:31','63');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('67','5','5','2022-06-21 11:09:13','64');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('68','20','20','2022-06-21 11:09:33','65');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('69','13','13','2022-06-21 11:13:46','66');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('70','8','8','2022-06-21 11:14:02','67');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('71','20','20','2022-06-21 11:14:26','68');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('72','40','40','2022-06-21 11:15:47','69');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('73','13','13','2022-06-21 11:19:30','70');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('74','8','8','2022-06-21 11:23:16','71');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('75','20','20','2022-06-21 11:23:36','72');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('76','30','30','2022-06-21 11:25:58','73');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('77','40','40','2022-06-21 11:26:19','74');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('78','30','30','2022-06-21 11:28:13','75');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('79','40','40','2022-06-21 11:28:37','76');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('80','13','13','2022-06-21 11:29:58','77');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('81','40','40','2022-06-21 11:30:31','78');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('82','40','40','2022-06-21 11:31:26','79');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('83','40','40','2022-06-21 11:32:09','80');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('84','8','8','2022-06-21 22:31:02','81');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('85','20','20','2022-06-21 22:33:33','82');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('86','5','5','2022-06-21 22:35:58','83');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('87','3','3','2022-06-21 22:36:55','84');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('88','5','5','2022-06-21 22:37:53','85');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('89','5','5','2022-06-21 22:38:39','86');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('90','13','13','2022-06-21 22:41:42','87');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('91','20','20','2022-06-21 22:43:16','88');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('92','3','3','2022-06-21 22:50:29','89');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('93','13','13','2022-06-21 22:51:23','90');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('94','20','20','2022-06-21 22:53:15','91');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('95','8','8','2022-06-21 22:54:22','92');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('96','8','8','2022-06-21 22:55:29','93');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('97','8','8','2022-06-21 22:56:33','94');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('98','5','5','2022-06-21 22:57:27','95');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('99','3','3','2022-06-21 22:58:44','96');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('100','13','13','2022-06-21 23:00:28','97');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('101','13',NULL,'2022-06-24 09:20:51','47');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('102','8','8','2022-06-24 09:24:14','98');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('103','8','8','2022-06-24 09:24:38','99');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('104','8','8','2022-06-24 09:24:55','98');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('105','40','40','2022-06-24 09:27:08','100');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('106','40','40','2022-06-24 09:27:36','101');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('107','40','40','2022-06-24 09:28:01','102');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('108','40','40','2022-06-24 09:30:12','103');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('109','40','40','2022-06-24 09:30:36','104');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('110','20','20','2022-06-24 09:31:02','105');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('111','8','8','2022-06-24 09:31:28','106');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('112','20','20','2022-06-28 16:43:56','107');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('113','40','40','2022-06-28 16:49:47','108');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('114','40','40','2022-06-28 16:50:04','108');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('115','5',NULL,'2022-06-29 17:53:51','8');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('116','20','5','2022-06-29 23:42:27','11');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('117','20',NULL,'2022-07-05 10:20:00','11');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('118','40','40','2022-07-05 10:21:05','109');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('119','8','8','2022-07-05 10:22:28','110');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('120','5','5','2022-07-05 10:22:38','110');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('121','5','5','2022-07-05 10:23:34','111');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('122','8','8','2022-07-05 10:24:55','112');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('123','20','20','2022-07-05 12:00:33','113');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('124','3','13','2022-07-05 12:01:53','7');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('125','13','13','2022-07-05 12:02:02','7');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('126','13','13','2022-07-05 12:05:29','114');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('127','13','13','2022-07-05 12:05:42','115');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('128','5','5','2022-07-05 12:07:01','116');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('129','13','13','2022-07-05 12:12:27','113');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('130','1',NULL,'2022-07-05 12:12:47','44');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('131','8','8','2022-07-05 12:15:17','117');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('132','20','20','2022-07-05 12:16:10','118');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('133','8','8','2022-07-14 10:27:55','110');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('134','13','8','2022-08-04 18:20:31','113');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('135','5',NULL,'2022-08-12 13:10:12','116');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('136','13',NULL,'2022-08-12 13:10:21','115');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('137','13',NULL,'2022-08-12 13:10:28','114');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('138','8',NULL,'2022-08-25 18:03:15','4');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('139','13',NULL,'2022-08-26 21:55:48','5');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('140','1',NULL,'2022-08-26 21:57:03','1');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('141','1',NULL,'2022-08-26 21:58:15','6');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('142','8',NULL,'2022-08-29 15:34:45','3');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('143','8',NULL,'2022-08-29 17:41:57','43');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('144','5','5','2023-05-19 12:43:11','119');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('145','20','20','2023-05-19 12:44:16','44');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('146','8','8','2023-05-19 12:47:01','120');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('147','30','30','2023-05-19 12:51:41','31');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('148','8','8','2023-05-19 12:54:20','117');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('149','8','8','2023-05-19 12:58:44','1');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('150','8','5','2023-05-19 12:58:59','3');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('151','8','3','2023-05-19 12:59:18','4');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('152','13','5','2023-05-19 12:59:31','5');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('153','13','13','2023-05-19 12:59:50','6');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('154','13','13','2023-05-19 13:00:21','7');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('155','13','5','2023-05-19 13:00:37','114');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('156','13','5','2023-05-19 13:00:45','115');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('157','5','3','2023-05-19 13:00:56','116');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('158','5','5','2023-05-19 13:02:34','121');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('159','5','5','2023-05-19 13:02:53','122');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('160','8','8','2023-05-21 15:42:08','117');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('161','5','5','2023-05-21 15:44:12','123');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('162','20','20','2023-05-21 15:46:36','118');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('163','13','13','2023-05-21 15:49:13','7');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('164','40','40','2023-07-19 11:26:28','33');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('165','13','13','2023-07-19 11:30:43','124');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('166','40','40','2023-07-19 11:31:45','125');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('167','20','20','2023-07-19 11:32:27','126');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('168','13','13','2023-07-19 11:32:46','126');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('169','20','20','2023-07-19 11:33:57','127');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('170','30','25','2023-07-19 11:35:24','127');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('171','8','8','2023-07-19 11:36:24','128');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('172','8','8','2023-07-19 11:37:15','129');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('173','5','5','2023-07-19 11:38:48','130');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('174','5','5','2023-07-19 11:39:54','131');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('175','8','8','2023-07-19 11:41:42','132');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('176','3','3','2023-07-19 11:43:46','133');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('177','8','8','2023-07-19 11:45:01','134');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('178','8','8','2023-07-19 11:52:30','135');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('179','3','3','2023-07-19 11:53:18','136');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('180','3','3','2023-07-19 11:55:35','137');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('181','20','20','2023-07-19 11:56:37','138');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('182','30','30','2023-07-19 11:57:08','138');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('183','30','30','2023-07-19 11:58:03','138');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('184','3','3','2023-07-19 11:58:42','139');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('185','3','3','2023-07-19 11:59:26','140');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('186','3','3','2023-07-19 12:00:01','141');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('187','8','8','2023-07-19 12:00:41','142');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('188','8','8','2023-07-19 12:00:59','142');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('189','5','5','2023-07-19 12:01:46','143');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('190','5','5','2023-07-19 12:02:37','144');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('191','5','5','2023-07-19 12:03:13','145');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('192','20','20','2023-07-19 17:21:08','146');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('193','8','8','2023-07-19 17:21:41','147');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('194','30',NULL,'2023-07-19 17:24:05','148');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('195','30','20','2023-07-19 17:24:44','149');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('196','30','30','2023-07-19 17:26:11','150');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('197','30','30','2023-07-19 17:26:29','151');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('198','20','20','2023-07-19 17:27:09','152');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('199','13','13','2023-07-19 17:27:56','153');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('200','20','20','2023-07-19 17:28:37','154');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('201','5','5','2023-07-19 17:29:49','155');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('202','13','13','2023-07-19 17:30:14','155');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('203','5','5','2023-07-19 17:30:38','155');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('204','8','8','2023-07-19 17:31:21','156');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('205','5','5','2023-07-19 17:31:50','157');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('206','1','1','2023-07-19 17:32:27','158');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('207','5','5','2023-07-19 17:32:52','156');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('208','3','3','2023-07-19 17:33:10','155');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('209','8','8','2023-07-19 17:33:32','154');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('210','5','5','2023-07-19 17:33:53','153');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('211','20',NULL,'2023-07-19 17:35:29','148');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('212','20','15','2023-07-19 17:35:55','149');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('213','5','5','2023-07-19 17:36:33','147');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('214','13','13','2023-07-19 17:36:57','146');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('215','3','3','2023-07-19 17:37:20','145');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('216','3','3','2023-07-19 17:37:45','144');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('217','3','3','2023-07-19 17:38:16','143');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('218','5','5','2023-07-19 17:38:34','142');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('219','1','1','2023-07-19 17:49:19','140');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('220','1','1','2023-07-19 17:49:36','139');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('221','13','13','2023-07-19 17:50:00','138');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('222','1','1','2023-07-19 17:50:22','137');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('223','1','1','2023-07-19 17:50:38','136');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('224','3','3','2023-07-19 17:51:03','135');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('225','40','40','2023-07-19 17:59:47','74');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('226','30','30','2023-07-19 18:00:13','74');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('227','13',NULL,'2023-07-27 22:54:25','7');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('228','13',NULL,'2023-07-27 22:54:35','6');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('229','13',NULL,'2023-07-27 22:54:46','5');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('230','8',NULL,'2023-07-27 22:54:56','4');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('231','8',NULL,'2023-07-27 22:55:12','3');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('232','8',NULL,'2023-07-27 22:55:26','2');

INSERT INTO TB_HISTORICO_HISTORIA VALUES('233','8',NULL,'2023-07-27 22:55:37','1');




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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_IMAGEM VALUES('1','leonardo-m-c-bessa-56e8920c23ab66.jpg');

INSERT INTO TB_IMAGEM VALUES('2','leonardo-m-c-bessa-56e8920c23ab66.jpg');

INSERT INTO TB_IMAGEM VALUES('3','leonardo-m-c-bessa-56e8920c23ab66.jpg');

INSERT INTO TB_IMAGEM VALUES('4','fp-loja-san-giuseppe-artigos-religiosos-2-6449721eb8b77.jpeg');




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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_MODULO VALUES('10','Fluxo de Caixa','2022-05-30 12:32:36','1');

INSERT INTO TB_MODULO VALUES('11','Assinante','2022-06-21 10:48:05','1');

INSERT INTO TB_MODULO VALUES('12','Site','2022-06-21 11:21:34','1');

INSERT INTO TB_MODULO VALUES('13','Lançamento do SOL Familiar','2022-06-21 11:27:06','2');

INSERT INTO TB_MODULO VALUES('14','Arquitetura','2022-06-21 22:27:04','1');

INSERT INTO TB_MODULO VALUES('15','Listas','2022-06-24 09:22:16','2');

INSERT INTO TB_MODULO VALUES('16','Consultoria','2022-06-24 09:25:46','1');

INSERT INTO TB_MODULO VALUES('17','Relatórios','2023-05-21 15:54:16','1');

INSERT INTO TB_MODULO VALUES('18','Compras','2023-05-24 14:04:57','2');

INSERT INTO TB_MODULO VALUES('19','Vendas','2023-05-24 14:05:05','2');

INSERT INTO TB_MODULO VALUES('20','Novo Layout','2023-07-19 11:49:27','1');




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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('1','1','1','1');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('2','45','2','1');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('3','44','2','1');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('4','43','2','1');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('5','42','2','1');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('6','41','2','1');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('7','40','2','1');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('8','39','2','1');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('9','37','2','1');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('10','36','2','1');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('12','34','2','1');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('13','32','2','1');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('14','31','2','1');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('15','30','2','1');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('16','11','2','1');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('17','6','2','1');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('19','35','2','1');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('20','46','2','1');

INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES('21','47','2','1');




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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_PESSOA VALUES('1',NULL,'Leo Bessa',NULL,'2016-10-31 00:00:00',NULL,'M','1','1','1');

INSERT INTO TB_PESSOA VALUES('2',NULL,'Usuário Atacadão',NULL,'2016-10-31 00:00:00',NULL,'M','2','2','2');

INSERT INTO TB_PESSOA VALUES('3',NULL,'AMAURY RAMOS',NULL,'2023-04-26 10:54:17',NULL,'M','3','3','3');




DROP TABLE IF EXISTS TB_PLANEJAMENTO_FINANCEIRO;


CREATE TABLE `TB_PLANEJAMENTO_FINANCEIRO` (
  `co_planejamento_financeiro` int(11) NOT NULL AUTO_INCREMENT,
  `nu_valor` float(12,2) DEFAULT NULL,
  `dt_atualizado` datetime DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_campo` varchar(25) DEFAULT NULL,
  `nu_ano` int(4) DEFAULT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_planejamento_financeiro`,`co_assinante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;





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
  `ds_link_boleto` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Link do Boleto que retorno da PagSeguro',
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_PROJETO VALUES('1','Atacadão Bessa','2023-05-19 10:05:57');




DROP TABLE IF EXISTS TB_REPRESENTACAO;


CREATE TABLE `TB_REPRESENTACAO` (
  `co_representacao` int(11) NOT NULL AUTO_INCREMENT,
  `no_representacao` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_tel1` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_representacao`,`co_assinante`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_REPRESENTACAO VALUES('1','AMAURY',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('2','XDX INOX',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('3','BAIP','11947019863',NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('4','CASA GORDÃO','11911818090',NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('5','MAGAZINE BRÁS',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('6','ELISA MIX IMPORTAÇÃO','11948131475',NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('7','ABC CHAVEIRO ALEXANDRE','11977627345',NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('8','SUPERM. ORIENTE',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('9','MARLISON',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('10','TARCIANA',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('11','ERISLUCIA',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('12','CAMARGO E QUEIROZ CONECT','61984900102',NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('13','NATHAN E CIA',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('14','JOSIAS',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('15','ADJ COMERCIO',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('16','MONISE',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('17','ANDRÉIA ARMARINHO RECANTO',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('18','BAZAR DO ALUNO',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('19','ANDRÉ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('20','Arnaldo Sócio','61993003405',NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('21','Leo Sócio','61993274991','leonardomcbessa@gmail.com','1');

INSERT INTO TB_REPRESENTACAO VALUES('22','Ibanes Fornecedor',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('23','Utilidades Primas Guara',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('24','Brenda novidades',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('25','China Junior',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('26','ivaldo',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('27','Dodô',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('28','Rogério',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('29','Antônia Casa das malas',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('30','Josefino',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('31','FRANKILE',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('32','PAPEL. RAFAS',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('33','ELIANE',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('34','Raiane',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('35','BAZAR DA FAMÍLIA ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('36','KEVIN MARLEY',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('37','Digg',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('38','CASA DA MOCHILA. LEILANE',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('39','Drogaria PD',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('40','ESTER FARMáCIA E PAPELARIA',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('41','A casa do Portugues',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('42','Central da Construção',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('43','Papelaria Escritiva',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('44','Tina novidades mochilas',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('45','Outlet das Havaianas ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('46','Rocha turismo ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('47','Armarinho Scalla',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('48','Panificadora Lindo Pão ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('49','Colégio CCI ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('50','Maria R Silva Recanto',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('51','Antônia Taubate',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('52','Lira Recanto ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('53','Supermercado Lucena',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('54','Supermercado BH',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('55','Ponto Arte',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('56','Eletrica hidraúlica Manjolinho',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('57','Mercado Manjolinho',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('58','Suíno bom',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('59','Shopping das frutas',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('60','Maria Inês recanto',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('61','Priscila e Diego',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('62','JM novidades ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('63','JM Motos',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('64','Neto matérias de construção',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('65','Panificadora Roma',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('66','Agro vita agropecuária ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('67','Fátima agropecuária 401',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('68','Junior ideal',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('69','Drogaria Natal',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('70','Br 10 celulares ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('71','Drogaria Rina',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('72','Mercado bem bom ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('73','Seu Guilherme ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('74','Baixinho gás ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('75','Ok celular ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('76','Conexão hidráulica ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('77','Armarinho e papelaria Crucial',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('78','Alcides',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('79','José Antônio ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('80','Abudabi',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('81','Luciana ferragens ponte alta',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('82','Drogaria ponte alta',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('83','Verdurão Ponte Alta',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('84','Frank Maranhão ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('85','Socorro felix',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('86','Star papelaria Rogério ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('87','TOKA DO CRIADOR CEARA',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('88','Jonas hidráulica e elétrica ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('89','Zé fei discos',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('90','Bazar M Norte Goia',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('91','Qasim utilidades ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('92','Rosi barracão ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('93','Lc papelaria ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('94','Bartofil ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('95','Fj novidades ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('96','Dê ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('97','Josefino',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('98','AGROPET AUAU ELIZABETH ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('99','Mercado do seu Zé ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('100','Rosa armarinho ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('101','Paulo mercadinho psul',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('102','Panificadora Italiana',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('103','Gileno armarinho',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('104','Agropet 504',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('105','Mercadinho Sr. Mauro',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('106','Cap ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('107','Araujo pereira',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('108','Raimundinha feira permanente ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('109','Josué informática feira',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('110','Milênio Calçados pedro',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('111','Juarismar Araújo Pereira ',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('112','Cliente A',NULL,NULL,'2');

INSERT INTO TB_REPRESENTACAO VALUES('113','Cliente B',NULL,NULL,'2');

INSERT INTO TB_REPRESENTACAO VALUES('114','Cliente C',NULL,NULL,'2');

INSERT INTO TB_REPRESENTACAO VALUES('115','Fornecedor 1',NULL,NULL,'2');

INSERT INTO TB_REPRESENTACAO VALUES('116','Fornecedor 2',NULL,NULL,'2');

INSERT INTO TB_REPRESENTACAO VALUES('117','Fornecedor 3',NULL,NULL,'2');

INSERT INTO TB_REPRESENTACAO VALUES('118','Dona Zélia armarinho LTG',NULL,NULL,'1');

INSERT INTO TB_REPRESENTACAO VALUES('119','Benedito Recanto',NULL,NULL,'1');




DROP TABLE IF EXISTS TB_SESSAO;


CREATE TABLE `TB_SESSAO` (
  `co_sessao` int(11) NOT NULL AUTO_INCREMENT,
  `no_sessao` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `co_modulo` int(11) NOT NULL,
  PRIMARY KEY (`co_sessao`,`co_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_SESSAO VALUES('1','Melhorias','2022-05-30 12:32:51','10');

INSERT INTO TB_SESSAO VALUES('2','Acelerador de Resultados','2022-05-30 12:32:58','10');

INSERT INTO TB_SESSAO VALUES('3','Analitíca','2022-05-30 12:33:06','10');

INSERT INTO TB_SESSAO VALUES('4','Comparador','2022-05-30 12:33:12','10');

INSERT INTO TB_SESSAO VALUES('5','Fluxo Mensal','2022-05-30 12:33:21','10');

INSERT INTO TB_SESSAO VALUES('6','Tutorial','2022-05-30 12:33:29','10');

INSERT INTO TB_SESSAO VALUES('7','Lançamentos','2022-05-30 12:33:37','10');

INSERT INTO TB_SESSAO VALUES('8','Painel Inicial','2022-05-30 12:33:44','10');

INSERT INTO TB_SESSAO VALUES('9','Gestão Anti Crise','2022-06-18 07:25:26','10');

INSERT INTO TB_SESSAO VALUES('10','Pagamento','2022-06-21 10:48:14','11');

INSERT INTO TB_SESSAO VALUES('11','Usuário','2022-06-21 10:48:19','11');

INSERT INTO TB_SESSAO VALUES('12','Complemento do assinante','2022-06-21 10:48:24','11');

INSERT INTO TB_SESSAO VALUES('13','Assinante','2022-06-21 10:48:29','11');

INSERT INTO TB_SESSAO VALUES('14','App e Sistema','2022-06-21 11:21:50','12');

INSERT INTO TB_SESSAO VALUES('15','L - Lançamento','2022-06-21 11:27:27','13');

INSERT INTO TB_SESSAO VALUES('16','PL - Pré Lançamento','2022-06-21 11:27:35','13');

INSERT INTO TB_SESSAO VALUES('17','PPL - Pré Pré Lançamento','2022-06-21 11:27:43','13');

INSERT INTO TB_SESSAO VALUES('18','Gestão Arquitetura','2022-06-21 22:27:51','14');

INSERT INTO TB_SESSAO VALUES('19','Melhorias Arquitetura','2022-06-21 22:28:03','14');

INSERT INTO TB_SESSAO VALUES('20','Lista de itens','2022-06-24 09:22:59','15');

INSERT INTO TB_SESSAO VALUES('21','Lista de Pagamentos','2022-06-24 09:23:18','15');

INSERT INTO TB_SESSAO VALUES('22','Produto de Entrada','2022-06-24 09:26:20','16');

INSERT INTO TB_SESSAO VALUES('23','Produto 2','2022-06-24 09:26:32','16');

INSERT INTO TB_SESSAO VALUES('24','Produto 3','2022-06-24 09:26:41','16');

INSERT INTO TB_SESSAO VALUES('25','Cursos','2022-06-24 09:29:20','12');

INSERT INTO TB_SESSAO VALUES('26','Planejamento','2022-06-28 16:48:37','10');

INSERT INTO TB_SESSAO VALUES('27','Financiero','2023-05-21 15:54:31','17');

INSERT INTO TB_SESSAO VALUES('28','Compras','2023-05-21 15:54:40','17');

INSERT INTO TB_SESSAO VALUES('29','Vendas','2023-05-21 15:54:48','17');

INSERT INTO TB_SESSAO VALUES('30','Estoque','2023-05-21 15:54:56','17');

INSERT INTO TB_SESSAO VALUES('31','Arquitetura','2023-07-19 11:19:20','20');

INSERT INTO TB_SESSAO VALUES('32','Funcionalidades','2023-07-19 11:51:40','20');




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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_USUARIO VALUES('1','123456**','TVRJek5EVTJLaW89','A','S','2016-10-31 00:00:00','1','1','1');

INSERT INTO TB_USUARIO VALUES('2','123456**','TVRJek5EVTJLaW89','A','S','2016-10-31 00:00:00','2','2','1');

INSERT INTO TB_USUARIO VALUES('3','123456**','TVRJek5EVTJLaW89','A','S','2023-04-26 10:57:31','3','3','2');




DROP TABLE IF EXISTS TB_USUARIO_PERFIL;


CREATE TABLE `TB_USUARIO_PERFIL` (
  `co_usuario_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `co_usuario` int(10) NOT NULL,
  `co_perfil` int(11) NOT NULL,
  `co_perfil_assinante` int(10) NOT NULL,
  PRIMARY KEY (`co_usuario_perfil`,`co_usuario`,`co_perfil`,`co_perfil_assinante`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO TB_USUARIO_PERFIL VALUES('1','1','1','1');

INSERT INTO TB_USUARIO_PERFIL VALUES('2','2','2','1');

INSERT INTO TB_USUARIO_PERFIL VALUES('3','3','2','1');




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
  PRIMARY KEY (`co_visita_checkout`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





