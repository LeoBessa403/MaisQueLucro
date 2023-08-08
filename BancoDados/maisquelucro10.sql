-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Maio-2022 às 17:33
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `maisquelucro10`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_acesso`
--

CREATE TABLE `tb_acesso` (
  `co_acesso` int(11) NOT NULL AUTO_INCREMENT,
  `ds_session_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_inicio_acesso` datetime DEFAULT NULL,
  `dt_fim_acesso` datetime DEFAULT NULL,
  `tp_situacao` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'A - Ativo / F - Finalizado',
  `co_usuario` int(10) NOT NULL,
  `co_trafego` int(11) NOT NULL,
  PRIMARY KEY (`co_acesso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_acesso`
--

INSERT INTO `tb_acesso` (`co_acesso`, `ds_session_id`, `dt_inicio_acesso`, `dt_fim_acesso`, `tp_situacao`, `co_usuario`, `co_trafego`) VALUES
(1, '8overdl2hlrtooug008eu2b0u9', '2022-03-14 12:15:15', '2022-03-14 12:41:41', 'F', 1, 1),
(2, '8overdl2hlrtooug008eu2b0u9', '2022-03-14 12:42:27', '2022-03-14 13:12:32', 'F', 1, 2),
(3, 'bie0joq2f3cjasc4g806ihqrdh', '2022-03-25 11:24:22', '2022-03-25 12:40:49', 'F', 1, 3),
(4, 'iue0r2fe4j6qera1ls3jne6h8e', '2022-05-09 08:36:18', '2022-05-09 09:18:41', 'F', 1, 4),
(5, 'kgirrbb5vlrkc9llercauv8mu9', '2022-05-12 10:38:16', '2022-05-12 11:11:34', 'F', 1, 5),
(6, 'kgirrbb5vlrkc9llercauv8mu9', '2022-05-13 11:17:40', '2022-05-13 13:00:15', 'F', 1, 6),
(7, 'kgirrbb5vlrkc9llercauv8mu9', '2022-05-16 12:11:52', '2022-05-16 12:12:37', 'F', 1, 7),
(8, 'kgirrbb5vlrkc9llercauv8mu9', '2022-05-16 12:13:53', '2022-05-16 12:44:04', 'A', 1, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_anotacao`
--

CREATE TABLE `tb_anotacao` (
  `co_anotacao` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_observacao` text DEFAULT NULL,
  `ds_titulo` varchar(80) DEFAULT NULL,
  `co_historia` int(11) NOT NULL,
  PRIMARY KEY (`co_anotacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_assinante`
--

CREATE TABLE `tb_assinante` (
  `co_assinante` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_expiracao` date DEFAULT NULL COMMENT 'Data da expiração de utilização do sistema',
  `st_dados_complementares` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'N' COMMENT 'S - Sim / N - Não',
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'A' COMMENT 'A - Ativo / I - inativo',
  `tp_assinante` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'M' COMMENT 'M  - Matriz / F - Filial',
  `co_empresa` int(11) NOT NULL,
  `co_pessoa` int(11) NOT NULL COMMENT 'Responsável pelo Assinante',
  PRIMARY KEY (`co_assinante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_auditoria`
--

CREATE TABLE `tb_auditoria` (
  `co_auditoria` int(11) NOT NULL AUTO_INCREMENT,
  `dt_realizado` datetime DEFAULT NULL,
  `ds_perfil_usuario` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_usuario` int(10) NOT NULL,
  PRIMARY KEY (`co_auditoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_auditoria`
--

INSERT INTO `tb_auditoria` (`co_auditoria`, `dt_realizado`, `ds_perfil_usuario`, `co_usuario`) VALUES
(1, '2022-03-25 12:08:01', 'Master', 1),
(2, '2022-03-25 12:10:45', 'Master', 1),
(3, '2022-05-13 11:42:16', 'Master', 1),
(4, '2022-05-13 11:42:53', 'Master', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_auditoria_itens`
--

CREATE TABLE `tb_auditoria_itens` (
  `co_auditoria_itens` int(11) NOT NULL AUTO_INCREMENT,
  `ds_item_anterior` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_item_atual` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_campo` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_auditoria_tabela` int(11) NOT NULL,
  PRIMARY KEY (`co_auditoria_itens`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_auditoria_itens`
--

INSERT INTO `tb_auditoria_itens` (`co_auditoria_itens`, `ds_item_anterior`, `ds_item_atual`, `ds_campo`, `co_auditoria_tabela`) VALUES
(1, NULL, 'Fluxocaixa', 'no_controller', 1),
(2, NULL, 'fafa-money', 'ds_class_icon', 1),
(3, NULL, 'Lancamento', 'no_funcionalidade', 2),
(4, NULL, 'Lancamento', 'ds_action', 2),
(5, NULL, 'S', 'st_menu', 2),
(6, NULL, '10', 'co_controller', 2),
(7, NULL, 'A', 'st_status', 2),
(8, '34', NULL, 'co_funcionalidade', 3),
(9, 'Lancamento', 'Lançamento', 'no_funcionalidade', 3),
(10, 'Lancamento', 'Lancamento', 'ds_action', 3),
(11, 'A', NULL, 'st_status', 3),
(12, 'S', 'S', 'st_menu', 3),
(13, '10', '10', 'co_controller', 3),
(14, NULL, 'Análise', 'no_funcionalidade', 5),
(15, NULL, 'ListarFluxoCaixa', 'ds_action', 5),
(16, NULL, 'S', 'st_menu', 5),
(17, NULL, '10', 'co_controller', 5),
(18, NULL, 'A', 'st_status', 5),
(19, NULL, 'Comparador', 'no_funcionalidade', 6),
(20, NULL, 'Comparador', 'ds_action', 6),
(21, NULL, 'S', 'st_menu', 6),
(22, NULL, '10', 'co_controller', 6),
(23, NULL, 'A', 'st_status', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_auditoria_tabela`
--

CREATE TABLE `tb_auditoria_tabela` (
  `co_auditoria_tabela` int(11) NOT NULL AUTO_INCREMENT,
  `no_tabela` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tp_operacao` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_registro` int(11) DEFAULT NULL,
  `co_auditoria` int(11) NOT NULL,
  PRIMARY KEY (`co_auditoria_tabela`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_auditoria_tabela`
--

INSERT INTO `tb_auditoria_tabela` (`co_auditoria_tabela`, `no_tabela`, `tp_operacao`, `co_registro`, `co_auditoria`) VALUES
(1, 'maisquelucro10.TB_CONTROLLER', 'I', 10, 1),
(2, 'maisquelucro10.TB_FUNCIONALIDADE', 'I', 34, 1),
(3, 'maisquelucro10.TB_FUNCIONALIDADE', 'U', 34, 2),
(4, 'maisquelucro10.TB_PERFIL_FUNCIONALIDADE', 'D', NULL, 2),
(5, 'maisquelucro10.TB_FUNCIONALIDADE', 'I', 35, 3),
(6, 'maisquelucro10.TB_FUNCIONALIDADE', 'I', 36, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_banco`
--

CREATE TABLE `tb_banco` (
  `co_banco` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código do banco',
  `no_banco` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`co_banco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_botao`
--

CREATE TABLE `tb_botao` (
  `co_botao` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Tabela das informações dos botõs para ir para a págna de venda e dentro da página',
  `no_botao` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Texto do Botão',
  `ds_botao` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Descrição do Botão (Posição/cor)',
  `nu_total_cliques` int(8) DEFAULT NULL COMMENT 'Número de cliques no botão',
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'S - Sim / N - Não',
  PRIMARY KEY (`co_botao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categoria_fc`
--

CREATE TABLE `tb_categoria_fc` (
  `co_categoria_fc` int(11) NOT NULL AUTO_INCREMENT,
  `ds_texto` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_codigo` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_categoria_fc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categoria_fc_filha`
--

CREATE TABLE `tb_categoria_fc_filha` (
  `co_categoria_fc_filha` int(11) NOT NULL AUTO_INCREMENT,
  `ds_texto` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_codigo` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_categoria_fc` int(11) NOT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_categoria_fc_filha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categoria_fc_neta`
--

CREATE TABLE `tb_categoria_fc_neta` (
  `co_categoria_fc_neta` int(11) NOT NULL AUTO_INCREMENT,
  `ds_texto` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_codigo` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_categoria_fc_filha` int(11) NOT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_categoria_fc_neta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_centro_custo`
--

CREATE TABLE `tb_centro_custo` (
  `co_centro_custo` int(11) NOT NULL AUTO_INCREMENT,
  `nu_codigo` int(6) DEFAULT NULL,
  `ds_descricao` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_assinante` int(11) NOT NULL,
  `no_centro_custos` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`co_centro_custo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_checkout`
--

CREATE TABLE `tb_checkout` (
  `co_checkout` int(11) NOT NULL AUTO_INCREMENT,
  `nu_visitas_total` int(11) DEFAULT NULL,
  `dt_ultima_visita` datetime DEFAULT NULL,
  PRIMARY KEY (`co_checkout`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clique`
--

CREATE TABLE `tb_clique` (
  `co_clique` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `co_botao` int(11) NOT NULL,
  PRIMARY KEY (`co_clique`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_contato`
--

CREATE TABLE `tb_contato` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_contato`
--

INSERT INTO `tb_contato` (`co_contato`, `nu_tel1`, `nu_tel2`, `nu_tel3`, `nu_tel_0800`, `ds_email`, `ds_site`, `ds_facebook`, `ds_twitter`, `ds_instagram`) VALUES
(1, '61993274991', '6130826060', '0', '', 'maisquelucro@gmail.com', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_conta_bancaria`
--

CREATE TABLE `tb_conta_bancaria` (
  `co_conta_bancaria` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `no_banco` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_agencia` int(6) DEFAULT NULL,
  `nu_conta` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_assinante` int(11) NOT NULL,
  PRIMARY KEY (`co_conta_bancaria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_controller`
--

CREATE TABLE `tb_controller` (
  `co_controller` int(11) NOT NULL AUTO_INCREMENT,
  `no_controller` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_class_icon` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Classe do Ícone',
  PRIMARY KEY (`co_controller`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_controller`
--

INSERT INTO `tb_controller` (`co_controller`, `no_controller`, `ds_class_icon`) VALUES
(1, 'Gestão', 'clip-data'),
(2, 'Auditoria', 'fa fa-crosshairs'),
(3, 'Acesso', 'clip-connection-2'),
(4, 'Funcionalidade', 'fa fa-outdent'),
(5, 'Perfil', 'clip-stack-empty'),
(6, 'Usuário', 'fa fa-group'),
(7, 'Visita', 'clip-airplane'),
(8, 'Relatorio', 'fa fa-clipboard'),
(9, 'Suporte', 'fa fa-envelope'),
(10, 'Fluxocaixa', 'fa fa-money');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_crons`
--

CREATE TABLE `tb_crons` (
  `co_cron` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `no_cron` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_sql` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_empresa`
--

CREATE TABLE `tb_empresa` (
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
  `co_imagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_endereco`
--

CREATE TABLE `tb_endereco` (
  `co_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `ds_endereco` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_complemento` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_bairro` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_cep` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_cidade` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sg_uf` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_endereco`
--

INSERT INTO `tb_endereco` (`co_endereco`, `ds_endereco`, `ds_complemento`, `ds_bairro`, `nu_cep`, `no_cidade`, `sg_uf`) VALUES
(1, 'qr 10 casa 10', '', 'Samambaia', '72111111', 'Brasília', 'DF');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fluxo_caixa`
--

CREATE TABLE `tb_fluxo_caixa` (
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
  `co_assinante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionalidade`
--

CREATE TABLE `tb_funcionalidade` (
  `co_funcionalidade` int(11) NOT NULL AUTO_INCREMENT,
  `no_funcionalidade` varchar(150) CHARACTER SET latin1 NOT NULL,
  `ds_action` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `st_status` varchar(1) CHARACTER SET latin1 DEFAULT 'A' COMMENT '''A - Ativo / I - Inativo''',
  `st_menu` varchar(1) CHARACTER SET latin1 DEFAULT 'S' COMMENT 'S - Sim / N - Não (Se apresenta no menu)',
  `co_controller` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_funcionalidade`
--

INSERT INTO `tb_funcionalidade` (`co_funcionalidade`, `no_funcionalidade`, `ds_action`, `st_status`, `st_menu`, `co_controller`) VALUES
(1, 'Perfil Master', 'PerfilMaster', 'A', 'S', 0),
(2, 'Auditoria Listar', 'ListarAuditoria', 'A', 'S', 2),
(3, 'Auditoria Detalhar', 'DetalharAuditoria', 'A', 'N', 2),
(4, 'Usuario Cadastrar', 'CadastroUsuario', 'A', 'N', 6),
(5, 'Usuario Listar', 'ListarUsuario', 'A', 'S', 6),
(6, 'Meu Perfil Usuario', 'MeuPerfilUsuario', 'A', 'S', 6),
(7, 'Perfil Listar', 'ListarPerfil', 'A', 'S', 5),
(8, 'Perfil Cadastrar', 'CadastroPerfil', 'A', 'S', 5),
(9, 'Funcionalidade Listar', 'ListarFuncionalidade', 'A', 'S', 4),
(10, 'Funcionalidade Cadastrar', 'CadastroFuncionalidade', 'A', 'S', 4),
(11, 'Troca Senha Usuario', 'TrocaSenhaUsuario', 'A', 'S', 6),
(13, 'Listar Visita', 'ListarVisita', 'A', 'S', 7),
(14, 'Config Gestao', 'ConfigGestao', 'A', 'S', 1),
(15, 'Gerar Entidades Gestao', 'GerarEntidadesGestao', 'A', 'S', 1),
(16, 'Gerar Backup Gestao', 'GerarBackupGestao', 'A', 'S', 1),
(17, 'Listar Acesso', 'ListarAcesso', 'A', 'S', 3),
(22, 'Pre Projeto Gestao', 'PreProjetoGestao', 'A', 'S', 1),
(23, 'Acompanhar Projeto Gestao', 'AcompanharProjetoGestao', 'A', 'N', 1),
(24, 'Limpar Banco Gestao', 'LimparBancoGestao', 'A', 'S', 1),
(28, 'Crons', 'CronsGestao', 'A', 'S', 1),
(29, 'Minificação', 'MinificacaoGestao', 'A', 'S', 1),
(30, 'Gráfico', 'GraficoRelatorio', 'A', 'S', 8),
(31, 'Listar Suporte', 'ListarSuporte', 'A', 'S', 9),
(32, 'Cadastro Suporte', 'CadastroSuporte', 'A', 'N', 9),
(33, 'Deleta Suporte', 'DeletaSuporte', 'A', 'N', 9),
(34, 'Lançamento', 'Lancamento', 'A', 'S', 10),
(35, 'Análise', 'ListarFluxoCaixa', 'A', 'S', 10),
(36, 'Comparador', 'Comparador', 'A', 'S', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_historia`
--

CREATE TABLE `tb_historia` (
  `co_historia` int(11) NOT NULL AUTO_INCREMENT,
  `ds_titulo` varchar(80) DEFAULT NULL,
  `ds_observacao` text DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_atualizado` datetime DEFAULT NULL,
  `st_situacao` varchar(1) DEFAULT 'N' COMMENT 'N - Não iniciada / I - Iniciada / C - Concluida',
  `co_sessao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_historico_historia`
--

CREATE TABLE `tb_historico_historia` (
  `co_historico_historia` int(11) NOT NULL AUTO_INCREMENT,
  `nu_esforco` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_esforco_restante` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `co_historia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_historico_pag_assinatura`
--

CREATE TABLE `tb_historico_pag_assinatura` (
  `co_historico_pag_assinatura` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_acao` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_usuario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_pagamento` int(1) DEFAULT NULL COMMENT '0 - Pendente / 1 - Aguardando pagamento / 2 - Em análise / 3 - Pago / 4 - Disponível / 5 - Em disputa / 6 - Devolvida / 7 - Cancelada\n',
  `co_plano_assinante_assinatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_historico_suporte`
--

CREATE TABLE `tb_historico_suporte` (
  `co_historico_suporte` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_mensagem` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_lido` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'N' COMMENT 'S - Sim / N - Não',
  `co_suporte` int(11) NOT NULL,
  `co_usuario` int(10) NOT NULL,
  `co_imagem` int(10) UNSIGNED NOT NULL COMMENT 'Chave do Anexo.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_hist_saldo_cb`
--

CREATE TABLE `tb_hist_saldo_cb` (
  `co_hist_saldo_cb` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `tp_fluxo` int(1) DEFAULT NULL COMMENT '1 - Entrada / 2 - Saída',
  `nu_valor_pago` float(12,2) DEFAULT NULL,
  `nu_saldo` float(12,2) DEFAULT NULL,
  `ds_observacao` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_conta_bancaria` int(11) NOT NULL,
  `co_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_hist_transferencia`
--

CREATE TABLE `tb_hist_transferencia` (
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
  `co_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_imagem`
--

CREATE TABLE `tb_imagem` (
  `co_imagem` int(10) UNSIGNED NOT NULL,
  `ds_caminho` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_imagem`
--

INSERT INTO `tb_imagem` (`co_imagem`, `ds_caminho`) VALUES
(1, 'leonardo-m-c-bessa-56e8920c23ab66.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_imagem_assinante`
--

CREATE TABLE `tb_imagem_assinante` (
  `co_imagem_assinante` int(11) NOT NULL AUTO_INCREMENT,
  `co_assinante` int(11) NOT NULL,
  `co_imagem` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_modulo`
--

CREATE TABLE `tb_modulo` (
  `co_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `no_modulo` varchar(50) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `co_projeto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pacote`
--

CREATE TABLE `tb_pacote` (
  `co_pacote` int(11) NOT NULL AUTO_INCREMENT,
  `no_pacote` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_descricao` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_lancamento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pagina`
--

CREATE TABLE `tb_pagina` (
  `co_pagina` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_titulo_url_amigavel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Url amigável da página',
  `nu_visualizacao` int(11) DEFAULT NULL,
  `nu_usuario` int(11) DEFAULT NULL COMMENT 'Número de usuário que visitou a página',
  PRIMARY KEY (`co_pagina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pagina_visita`
--

CREATE TABLE `tb_pagina_visita` (
  `co_pagina_visita` int(11) NOT NULL AUTO_INCREMENT,
  `co_visita` int(11) NOT NULL,
  `co_pagina` int(11) NOT NULL,
  PRIMARY KEY (`co_pagina_visita`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_perfil`
--

CREATE TABLE `tb_perfil` (
  `co_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `no_perfil` varchar(45) CHARACTER SET latin1 NOT NULL COMMENT 'Nome do Perfil',
  `st_status` varchar(1) CHARACTER SET latin1 NOT NULL DEFAULT 'A' COMMENT '''A - Ativo / I - Inativo'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_perfil`
--

INSERT INTO `tb_perfil` (`co_perfil`, `no_perfil`, `st_status`) VALUES
(1, 'Master', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_perfil_assinante`
--

CREATE TABLE `tb_perfil_assinante` (
  `co_perfil_assinante` int(11) NOT NULL AUTO_INCREMENT,
  `no_perfil` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_assinante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_perfil_funcionalidade`
--

CREATE TABLE `tb_perfil_funcionalidade` (
  `co_perfil_funcionalidade` int(11) NOT NULL AUTO_INCREMENT,
  `co_funcionalidade` int(11) NOT NULL,
  `co_perfil` int(11) NOT NULL,
  `co_perfil_assinante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_perfil_funcionalidade`
--

INSERT INTO `tb_perfil_funcionalidade` (`co_perfil_funcionalidade`, `co_funcionalidade`, `co_perfil`, `co_perfil_assinante`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pessoa`
--

CREATE TABLE `tb_pessoa` (
  `co_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nu_cpf` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_pessoa` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_rg` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `st_sexo` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'M - Masculino ou F - Feminino',
  `co_endereco` int(11) NOT NULL,
  `co_contato` int(11) NOT NULL,
  `co_imagem` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_pessoa`
--

INSERT INTO `tb_pessoa` (`co_pessoa`, `nu_cpf`, `no_pessoa`, `nu_rg`, `dt_cadastro`, `dt_nascimento`, `st_sexo`, `co_endereco`, `co_contato`, `co_imagem`) VALUES
(1, '', 'Sis Mais Que Lucro', '', '2016-10-31 00:00:00', NULL, 'M', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_plano`
--

CREATE TABLE `tb_plano` (
  `co_plano` int(11) NOT NULL AUTO_INCREMENT,
  `dt_cadastro` datetime DEFAULT NULL,
  `no_plano` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_mes_ativo` int(1) DEFAULT NULL COMMENT 'Número de meses ativo do plano (1, 3, 6, 12 e 24)',
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'A' COMMENT 'Status do plano A - Ativo / I - Inativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_plano_assinante`
--

CREATE TABLE `tb_plano_assinante` (
  `co_plano_assinante` int(11) NOT NULL COMMENT 'Tabela de Histórico de dados do Plano',
  `nu_valor` decimal(8,2) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_observacao` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_plano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_plano_assinante_assinatura`
--

CREATE TABLE `tb_plano_assinante_assinatura` (
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
  `co_plano_assinante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_plano_pacote`
--

CREATE TABLE `tb_plano_pacote` (
  `co_plano_pacote` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Planos do Módulo',
  `co_plano` int(11) NOT NULL,
  `co_pacote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_projeto`
--

CREATE TABLE `tb_projeto` (
  `co_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `no_projeto` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_projeto`
--

INSERT INTO `tb_projeto` (`co_projeto`, `no_projeto`, `dt_cadastro`) VALUES
(1, 'Enovus', '2020-09-05 11:07:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_representacao`
--

CREATE TABLE `tb_representacao` (
  `co_representacao` int(11) NOT NULL AUTO_INCREMENT,
  `no_representacao` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_tel1` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_assinante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sessao`
--

CREATE TABLE `tb_sessao` (
  `co_sessao` int(11) NOT NULL AUTO_INCREMENT,
  `no_sessao` varchar(80) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `co_modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_suporte`
--

CREATE TABLE `tb_suporte` (
  `co_suporte` int(11) NOT NULL AUTO_INCREMENT,
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'A' COMMENT 'A - Ativa / I - Inativa',
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_assunto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_tipo_assunto` int(1) DEFAULT NULL COMMENT '1 - Sugestão ou Melhorias / 2 - Reclamação / 3 -  Correção no Sistema / 4 - Outros',
  `co_assinante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_trafego`
--

CREATE TABLE `tb_trafego` (
  `co_trafego` int(11) NOT NULL AUTO_INCREMENT,
  `nu_ip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_pais` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_code_pais` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_uf` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_estado` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_cidade` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_navegador` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_sistema_operacional` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_dispositivo` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_agente` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`co_trafego`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_trafego`
--

INSERT INTO `tb_trafego` (`co_trafego`, `nu_ip`, `ds_pais`, `ds_code_pais`, `ds_uf`, `ds_estado`, `ds_cidade`, `ds_navegador`, `ds_sistema_operacional`, `ds_dispositivo`, `ds_agente`) VALUES
(1, '127.0.0.1', 'Desconhecido', 'Desconhecida', 'Desconhecida', 'Desconhecida', 'Desconhecida', 'Firefox', 'Windows 10', 'Desktop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0'),
(2, '127.0.0.1', 'Desconhecido', 'Desconhecida', 'Desconhecida', 'Desconhecida', 'Desconhecida', 'Firefox', 'Windows 10', 'Desktop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0'),
(3, '127.0.0.1', 'Desconhecido', 'Desconhecida', 'Desconhecida', 'Desconhecida', 'Desconhecida', 'Firefox', 'Windows 10', 'Desktop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0'),
(4, '127.0.0.1', 'Desconhecido', 'Desconhecida', 'Desconhecida', 'Desconhecida', 'Desconhecida', 'Firefox', 'Windows 10', 'Desktop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0'),
(5, '127.0.0.1', 'Desconhecido', 'Desconhecida', 'Desconhecida', 'Desconhecida', 'Desconhecida', 'Firefox', 'Windows 10', 'Desktop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:100.0) Gecko/20100101 Firefox/100.0'),
(6, '127.0.0.1', 'Desconhecido', 'Desconhecida', 'Desconhecida', 'Desconhecida', 'Desconhecida', 'Firefox', 'Windows 10', 'Desktop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:100.0) Gecko/20100101 Firefox/100.0'),
(7, '127.0.0.1', 'Desconhecido', 'Desconhecida', 'Desconhecida', 'Desconhecida', 'Desconhecida', 'Firefox', 'Windows 10', 'Desktop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:100.0) Gecko/20100101 Firefox/100.0'),
(8, '127.0.0.1', 'Desconhecido', 'Desconhecida', 'Desconhecida', 'Desconhecida', 'Desconhecida', 'Firefox', 'Windows 10', 'Desktop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:100.0) Gecko/20100101 Firefox/100.0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `co_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `ds_senha` varchar(100) NOT NULL,
  `ds_code` varchar(50) NOT NULL COMMENT 'Senha criptografada',
  `st_status` varchar(1) NOT NULL DEFAULT 'I' COMMENT '''A - Ativo / I - Inativo''',
  `st_troca_senha` varchar(1) DEFAULT 'N',
  `dt_cadastro` datetime NOT NULL,
  `co_imagem` int(10) NOT NULL,
  `co_pessoa` int(11) NOT NULL,
  `co_assinante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`co_usuario`, `ds_senha`, `ds_code`, `st_status`, `st_troca_senha`, `dt_cadastro`, `co_imagem`, `co_pessoa`, `co_assinante`) VALUES
(1, '123456**', 'TVRJek5EVTJLaW89', 'A', 'S', '2016-10-31 00:00:00', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario_perfil`
--

CREATE TABLE `tb_usuario_perfil` (
  `co_usuario_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `co_usuario` int(10) NOT NULL,
  `co_perfil` int(11) NOT NULL,
  `co_perfil_assinante` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_usuario_perfil`
--

INSERT INTO `tb_usuario_perfil` (`co_usuario_perfil`, `co_usuario`, `co_perfil`, `co_perfil_assinante`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_visita`
--

CREATE TABLE `tb_visita` (
  `co_visita` int(11) NOT NULL AUTO_INCREMENT,
  `dt_realizado` datetime DEFAULT NULL,
  `dt_atualizado` datetime DEFAULT NULL,
  `nu_visitas` int(11) DEFAULT NULL,
  `co_trafego` int(11) NOT NULL,
  PRIMARY KEY (`co_visita`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_visita_checkout`
--

CREATE TABLE `tb_visita_checkout` (
  `co_visita_checkout` int(11) NOT NULL AUTO_INCREMENT,
  `co_visita` int(11) NOT NULL,
  `co_checkout` int(11) NOT NULL,
  PRIMARY KEY (`co_visita_checkout`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_acesso`
--
ALTER TABLE `tb_acesso`
  ADD PRIMARY KEY (`co_acesso`,`co_usuario`,`co_trafego`);

--
-- Índices para tabela `tb_anotacao`
--
ALTER TABLE `tb_anotacao`
  ADD PRIMARY KEY (`co_anotacao`,`co_historia`);

--
-- Índices para tabela `tb_assinante`
--
ALTER TABLE `tb_assinante`
  ADD PRIMARY KEY (`co_assinante`,`co_empresa`,`co_pessoa`);

--
-- Índices para tabela `tb_auditoria`
--
ALTER TABLE `tb_auditoria`
  ADD PRIMARY KEY (`co_auditoria`,`co_usuario`);

--
-- Índices para tabela `tb_auditoria_itens`
--
ALTER TABLE `tb_auditoria_itens`
  ADD PRIMARY KEY (`co_auditoria_itens`,`co_auditoria_tabela`);

--
-- Índices para tabela `tb_auditoria_tabela`
--
ALTER TABLE `tb_auditoria_tabela`
  ADD PRIMARY KEY (`co_auditoria_tabela`,`co_auditoria`);

--
-- Índices para tabela `tb_banco`
--
ALTER TABLE `tb_banco`
  ADD PRIMARY KEY (`co_banco`);

--
-- Índices para tabela `tb_botao`
--
ALTER TABLE `tb_botao`
  ADD PRIMARY KEY (`co_botao`);

--
-- Índices para tabela `tb_categoria_fc`
--
ALTER TABLE `tb_categoria_fc`
  ADD PRIMARY KEY (`co_categoria_fc`,`co_assinante`);

--
-- Índices para tabela `tb_categoria_fc_filha`
--
ALTER TABLE `tb_categoria_fc_filha`
  ADD PRIMARY KEY (`co_categoria_fc_filha`,`co_categoria_fc`,`co_assinante`);

--
-- Índices para tabela `tb_categoria_fc_neta`
--
ALTER TABLE `tb_categoria_fc_neta`
  ADD PRIMARY KEY (`co_categoria_fc_neta`,`co_categoria_fc_filha`,`co_assinante`);

--
-- Índices para tabela `tb_centro_custo`
--
ALTER TABLE `tb_centro_custo`
  ADD PRIMARY KEY (`co_centro_custo`,`co_assinante`);

--
-- Índices para tabela `tb_checkout`
--
ALTER TABLE `tb_checkout`
  ADD PRIMARY KEY (`co_checkout`);

--
-- Índices para tabela `tb_clique`
--
ALTER TABLE `tb_clique`
  ADD PRIMARY KEY (`co_clique`,`co_botao`);

--
-- Índices para tabela `tb_contato`
--
ALTER TABLE `tb_contato`
  ADD PRIMARY KEY (`co_contato`);

--
-- Índices para tabela `tb_conta_bancaria`
--
ALTER TABLE `tb_conta_bancaria`
  ADD PRIMARY KEY (`co_conta_bancaria`,`co_assinante`);

--
-- Índices para tabela `tb_controller`
--
ALTER TABLE `tb_controller`
  ADD PRIMARY KEY (`co_controller`);

--
-- Índices para tabela `tb_crons`
--
ALTER TABLE `tb_crons`
  ADD PRIMARY KEY (`co_cron`);

--
-- Índices para tabela `tb_empresa`
--
ALTER TABLE `tb_empresa`
  ADD PRIMARY KEY (`co_empresa`,`co_pessoa`,`co_endereco`,`co_contato`,`co_imagem`);

--
-- Índices para tabela `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD PRIMARY KEY (`co_endereco`);

--
-- Índices para tabela `tb_fluxo_caixa`
--
ALTER TABLE `tb_fluxo_caixa`
  ADD PRIMARY KEY (`co_fluxo_caixa`,`co_categoria_fc`,`co_categoria_fc_filha`,`co_categoria_fc_neta`,`co_centro_custo`,`co_conta_bancaria`,`co_representacao`,`co_usuario`,`co_assinante`);

--
-- Índices para tabela `tb_funcionalidade`
--
ALTER TABLE `tb_funcionalidade`
  ADD PRIMARY KEY (`co_funcionalidade`,`co_controller`);

--
-- Índices para tabela `tb_historia`
--
ALTER TABLE `tb_historia`
  ADD PRIMARY KEY (`co_historia`,`co_sessao`);

--
-- Índices para tabela `tb_historico_historia`
--
ALTER TABLE `tb_historico_historia`
  ADD PRIMARY KEY (`co_historico_historia`,`co_historia`);

--
-- Índices para tabela `tb_historico_pag_assinatura`
--
ALTER TABLE `tb_historico_pag_assinatura`
  ADD PRIMARY KEY (`co_historico_pag_assinatura`,`co_plano_assinante_assinatura`);

--
-- Índices para tabela `tb_historico_suporte`
--
ALTER TABLE `tb_historico_suporte`
  ADD PRIMARY KEY (`co_historico_suporte`,`co_suporte`,`co_usuario`,`co_imagem`);

--
-- Índices para tabela `tb_hist_saldo_cb`
--
ALTER TABLE `tb_hist_saldo_cb`
  ADD PRIMARY KEY (`co_hist_saldo_cb`,`co_conta_bancaria`,`co_usuario`);

--
-- Índices para tabela `tb_hist_transferencia`
--
ALTER TABLE `tb_hist_transferencia`
  ADD PRIMARY KEY (`co_hist_transferencia`,`co_conta_bancaria_origem`,`co_conta_bancaria_destino`,`co_usuario`);

--
-- Índices para tabela `tb_imagem`
--
ALTER TABLE `tb_imagem`
  ADD PRIMARY KEY (`co_imagem`);

--
-- Índices para tabela `tb_imagem_assinante`
--
ALTER TABLE `tb_imagem_assinante`
  ADD PRIMARY KEY (`co_imagem_assinante`,`co_assinante`,`co_imagem`);

--
-- Índices para tabela `tb_modulo`
--
ALTER TABLE `tb_modulo`
  ADD PRIMARY KEY (`co_modulo`,`co_projeto`);

--
-- Índices para tabela `tb_pacote`
--
ALTER TABLE `tb_pacote`
  ADD PRIMARY KEY (`co_pacote`);

--
-- Índices para tabela `tb_pagina`
--
ALTER TABLE `tb_pagina`
  ADD PRIMARY KEY (`co_pagina`);

--
-- Índices para tabela `tb_pagina_visita`
--
ALTER TABLE `tb_pagina_visita`
  ADD PRIMARY KEY (`co_pagina_visita`,`co_visita`,`co_pagina`);

--
-- Índices para tabela `tb_perfil`
--
ALTER TABLE `tb_perfil`
  ADD PRIMARY KEY (`co_perfil`);

--
-- Índices para tabela `tb_perfil_assinante`
--
ALTER TABLE `tb_perfil_assinante`
  ADD PRIMARY KEY (`co_perfil_assinante`,`co_assinante`);

--
-- Índices para tabela `tb_perfil_funcionalidade`
--
ALTER TABLE `tb_perfil_funcionalidade`
  ADD PRIMARY KEY (`co_perfil_funcionalidade`,`co_funcionalidade`,`co_perfil`,`co_perfil_assinante`);

--
-- Índices para tabela `tb_pessoa`
--
ALTER TABLE `tb_pessoa`
  ADD PRIMARY KEY (`co_pessoa`,`co_endereco`,`co_contato`,`co_imagem`);

--
-- Índices para tabela `tb_plano`
--
ALTER TABLE `tb_plano`
  ADD PRIMARY KEY (`co_plano`);

--
-- Índices para tabela `tb_plano_assinante`
--
ALTER TABLE `tb_plano_assinante`
  ADD PRIMARY KEY (`co_plano_assinante`,`co_plano`);

--
-- Índices para tabela `tb_plano_assinante_assinatura`
--
ALTER TABLE `tb_plano_assinante_assinatura`
  ADD PRIMARY KEY (`co_plano_assinante_assinatura`,`co_assinante`,`co_plano_assinante`);

--
-- Índices para tabela `tb_plano_pacote`
--
ALTER TABLE `tb_plano_pacote`
  ADD PRIMARY KEY (`co_plano_pacote`,`co_plano`,`co_pacote`);

--
-- Índices para tabela `tb_projeto`
--
ALTER TABLE `tb_projeto`
  ADD PRIMARY KEY (`co_projeto`);

--
-- Índices para tabela `tb_representacao`
--
ALTER TABLE `tb_representacao`
  ADD PRIMARY KEY (`co_representacao`,`co_assinante`);

--
-- Índices para tabela `tb_sessao`
--
ALTER TABLE `tb_sessao`
  ADD PRIMARY KEY (`co_sessao`,`co_modulo`);

--
-- Índices para tabela `tb_suporte`
--
ALTER TABLE `tb_suporte`
  ADD PRIMARY KEY (`co_suporte`,`co_assinante`);

--
-- Índices para tabela `tb_trafego`
--
ALTER TABLE `tb_trafego`
  ADD PRIMARY KEY (`co_trafego`);

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`co_usuario`,`co_imagem`,`co_pessoa`,`co_assinante`);

--
-- Índices para tabela `tb_usuario_perfil`
--
ALTER TABLE `tb_usuario_perfil`
  ADD PRIMARY KEY (`co_usuario_perfil`,`co_usuario`,`co_perfil`,`co_perfil_assinante`);

--
-- Índices para tabela `tb_visita`
--
ALTER TABLE `tb_visita`
  ADD PRIMARY KEY (`co_visita`,`co_trafego`);

--
-- Índices para tabela `tb_visita_checkout`
--
ALTER TABLE `tb_visita_checkout`
  ADD PRIMARY KEY (`co_visita_checkout`,`co_visita`,`co_checkout`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_acesso`
--
ALTER TABLE `tb_acesso`
  MODIFY `co_acesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tb_anotacao`
--
ALTER TABLE `tb_anotacao`
  MODIFY `co_anotacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_assinante`
--
ALTER TABLE `tb_assinante`
  MODIFY `co_assinante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_auditoria`
--
ALTER TABLE `tb_auditoria`
  MODIFY `co_auditoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_auditoria_itens`
--
ALTER TABLE `tb_auditoria_itens`
  MODIFY `co_auditoria_itens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tb_auditoria_tabela`
--
ALTER TABLE `tb_auditoria_tabela`
  MODIFY `co_auditoria_tabela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_botao`
--
ALTER TABLE `tb_botao`
  MODIFY `co_botao` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Tabela das informações dos botõs para ir para a págna de venda e dentro da página';

--
-- AUTO_INCREMENT de tabela `tb_categoria_fc`
--
ALTER TABLE `tb_categoria_fc`
  MODIFY `co_categoria_fc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_categoria_fc_filha`
--
ALTER TABLE `tb_categoria_fc_filha`
  MODIFY `co_categoria_fc_filha` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_categoria_fc_neta`
--
ALTER TABLE `tb_categoria_fc_neta`
  MODIFY `co_categoria_fc_neta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_centro_custo`
--
ALTER TABLE `tb_centro_custo`
  MODIFY `co_centro_custo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_checkout`
--
ALTER TABLE `tb_checkout`
  MODIFY `co_checkout` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_clique`
--
ALTER TABLE `tb_clique`
  MODIFY `co_clique` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_contato`
--
ALTER TABLE `tb_contato`
  MODIFY `co_contato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_conta_bancaria`
--
ALTER TABLE `tb_conta_bancaria`
  MODIFY `co_conta_bancaria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_controller`
--
ALTER TABLE `tb_controller`
  MODIFY `co_controller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_crons`
--
ALTER TABLE `tb_crons`
  MODIFY `co_cron` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_empresa`
--
ALTER TABLE `tb_empresa`
  MODIFY `co_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_endereco`
--
ALTER TABLE `tb_endereco`
  MODIFY `co_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_fluxo_caixa`
--
ALTER TABLE `tb_fluxo_caixa`
  MODIFY `co_fluxo_caixa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_funcionalidade`
--
ALTER TABLE `tb_funcionalidade`
  MODIFY `co_funcionalidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `tb_historia`
--
ALTER TABLE `tb_historia`
  MODIFY `co_historia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_historico_historia`
--
ALTER TABLE `tb_historico_historia`
  MODIFY `co_historico_historia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_historico_pag_assinatura`
--
ALTER TABLE `tb_historico_pag_assinatura`
  MODIFY `co_historico_pag_assinatura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_historico_suporte`
--
ALTER TABLE `tb_historico_suporte`
  MODIFY `co_historico_suporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_hist_saldo_cb`
--
ALTER TABLE `tb_hist_saldo_cb`
  MODIFY `co_hist_saldo_cb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_hist_transferencia`
--
ALTER TABLE `tb_hist_transferencia`
  MODIFY `co_hist_transferencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_imagem`
--
ALTER TABLE `tb_imagem`
  MODIFY `co_imagem` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_imagem_assinante`
--
ALTER TABLE `tb_imagem_assinante`
  MODIFY `co_imagem_assinante` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_modulo`
--
ALTER TABLE `tb_modulo`
  MODIFY `co_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_pacote`
--
ALTER TABLE `tb_pacote`
  MODIFY `co_pacote` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_pagina`
--
ALTER TABLE `tb_pagina`
  MODIFY `co_pagina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_pagina_visita`
--
ALTER TABLE `tb_pagina_visita`
  MODIFY `co_pagina_visita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_perfil`
--
ALTER TABLE `tb_perfil`
  MODIFY `co_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_perfil_assinante`
--
ALTER TABLE `tb_perfil_assinante`
  MODIFY `co_perfil_assinante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_perfil_funcionalidade`
--
ALTER TABLE `tb_perfil_funcionalidade`
  MODIFY `co_perfil_funcionalidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_pessoa`
--
ALTER TABLE `tb_pessoa`
  MODIFY `co_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_plano`
--
ALTER TABLE `tb_plano`
  MODIFY `co_plano` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_plano_assinante`
--
ALTER TABLE `tb_plano_assinante`
  MODIFY `co_plano_assinante` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Tabela de Histórico de dados do Plano';

--
-- AUTO_INCREMENT de tabela `tb_plano_assinante_assinatura`
--
ALTER TABLE `tb_plano_assinante_assinatura`
  MODIFY `co_plano_assinante_assinatura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_plano_pacote`
--
ALTER TABLE `tb_plano_pacote`
  MODIFY `co_plano_pacote` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Planos do Módulo';

--
-- AUTO_INCREMENT de tabela `tb_projeto`
--
ALTER TABLE `tb_projeto`
  MODIFY `co_projeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_representacao`
--
ALTER TABLE `tb_representacao`
  MODIFY `co_representacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_sessao`
--
ALTER TABLE `tb_sessao`
  MODIFY `co_sessao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_suporte`
--
ALTER TABLE `tb_suporte`
  MODIFY `co_suporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_trafego`
--
ALTER TABLE `tb_trafego`
  MODIFY `co_trafego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `co_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_usuario_perfil`
--
ALTER TABLE `tb_usuario_perfil`
  MODIFY `co_usuario_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_visita`
--
ALTER TABLE `tb_visita`
  MODIFY `co_visita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_visita_checkout`
--
ALTER TABLE `tb_visita_checkout`
  MODIFY `co_visita_checkout` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
