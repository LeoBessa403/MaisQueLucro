-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 15/07/2023 às 17:27
-- Versão do servidor: 5.7.23-23
-- Versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistem25_atacadao`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_ACESSO`
--

CREATE TABLE `TB_ACESSO` (
  `co_acesso` int(11) NOT NULL,
  `ds_session_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_inicio_acesso` datetime DEFAULT NULL,
  `dt_fim_acesso` datetime DEFAULT NULL,
  `tp_situacao` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'A - Ativo / F - Finalizado',
  `co_usuario` int(10) NOT NULL,
  `co_trafego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_ANOTACAO`
--

CREATE TABLE `TB_ANOTACAO` (
  `co_anotacao` int(11) NOT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_observacao` text COLLATE utf8_unicode_ci,
  `ds_titulo` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_historia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_ASSINANTE`
--

CREATE TABLE `TB_ASSINANTE` (
  `co_assinante` int(11) NOT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_expiracao` date DEFAULT NULL COMMENT 'Data da expiração de utilização do sistema',
  `st_dados_complementares` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'N' COMMENT 'S - Sim / N - Não',
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'A' COMMENT 'A - Ativo / I - inativo',
  `tp_assinante` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'M' COMMENT 'M  - Matriz / F - Filial',
  `co_empresa` int(11) NOT NULL,
  `co_pessoa` int(11) NOT NULL COMMENT 'Responsável pelo Assinante'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_ASSINANTE`
--

INSERT INTO `TB_ASSINANTE` (`co_assinante`, `dt_cadastro`, `dt_expiracao`, `st_dados_complementares`, `st_status`, `tp_assinante`, `co_empresa`, `co_pessoa`) VALUES
(1, '2023-02-06 12:02:29', '2033-10-13', 'N', 'A', 'M', 1, 2),
(2, '2023-04-26 10:52:06', '2033-10-13', 'S', 'A', 'M', 2, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_AUDITORIA`
--

CREATE TABLE `TB_AUDITORIA` (
  `co_auditoria` int(11) NOT NULL,
  `dt_realizado` datetime DEFAULT NULL,
  `ds_perfil_usuario` text COLLATE utf8_unicode_ci,
  `co_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_AUDITORIA_ITENS`
--

CREATE TABLE `TB_AUDITORIA_ITENS` (
  `co_auditoria_itens` int(11) NOT NULL,
  `ds_item_anterior` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_item_atual` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_campo` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_auditoria_tabela` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_AUDITORIA_TABELA`
--

CREATE TABLE `TB_AUDITORIA_TABELA` (
  `co_auditoria_tabela` int(11) NOT NULL,
  `no_tabela` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tp_operacao` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_registro` int(11) DEFAULT NULL,
  `co_auditoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_BANCO`
--

CREATE TABLE `TB_BANCO` (
  `co_banco` int(11) NOT NULL COMMENT 'Código do banco',
  `no_banco` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_BOTAO`
--

CREATE TABLE `TB_BOTAO` (
  `co_botao` int(11) NOT NULL COMMENT 'Tabela das informações dos botõs para ir para a págna de venda e dentro da página',
  `no_botao` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Texto do Botão',
  `ds_botao` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Descrição do Botão (Posição/cor)',
  `nu_total_cliques` int(8) DEFAULT NULL COMMENT 'Número de cliques no botão',
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'S - Sim / N - Não'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_CATEGORIA_FC`
--

CREATE TABLE `TB_CATEGORIA_FC` (
  `co_categoria_fc` int(11) NOT NULL,
  `ds_texto` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_codigo` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_assinante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_CATEGORIA_FC`
--

INSERT INTO `TB_CATEGORIA_FC` (`co_categoria_fc`, `ds_texto`, `nu_codigo`, `co_assinante`) VALUES
(1, 'RECEITA / FATURAMENTO', '1', 0),
(2, 'DESPESAS DIRETAS (cv)', '2', 0),
(3, 'DESPESAS INDIRETAS (cf)', '3', 0),
(4, 'INVESTIMENTOS', '4', 0),
(5, 'ENTRADAS NÃO OPERACIONAIS', '5', 0),
(6, 'SAÍDAS NÃO OPERACIONAIS', '6', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_CATEGORIA_FC_FILHA`
--

CREATE TABLE `TB_CATEGORIA_FC_FILHA` (
  `co_categoria_fc_filha` int(11) NOT NULL,
  `ds_texto` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_codigo` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_categoria_fc` int(11) NOT NULL,
  `co_assinante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_CATEGORIA_FC_FILHA`
--

INSERT INTO `TB_CATEGORIA_FC_FILHA` (`co_categoria_fc_filha`, `ds_texto`, `nu_codigo`, `co_categoria_fc`, `co_assinante`) VALUES
(1, 'Receita de Vendas', '1.0', 1, 1),
(2, 'Custos Tributários ou Financeiros', '2.0', 2, 1),
(3, 'Custos com Fornecedores', '2.1', 2, 1),
(4, 'Custos com Entregas', '2.2', 2, 1),
(5, 'Custos com Embalagens', '2.3', 2, 1),
(6, 'Custo com Vendas', '2.4', 2, 1),
(7, 'Despesas Administrativas', '3.0', 3, 1),
(8, 'Despesas com Pessoal', '3.1', 3, 1),
(9, 'Despesas com Materiais e Equipamentos', '3.2', 3, 1),
(10, 'Investimentos em Marketing', '4.0', 4, 1),
(11, 'Investimentos em Bens Materiais', '4.1', 4, 1),
(12, 'Investimentos em Desenvolvimento Empresarial', '4.2', 4, 1),
(13, 'Entradas não Operacionais', '5.0', 5, 1),
(14, 'Saídas não Operacionais', '6.0', 6, 1),
(15, 'Viagem para Compra de Produtos', '2.5', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_CATEGORIA_FC_NETA`
--

CREATE TABLE `TB_CATEGORIA_FC_NETA` (
  `co_categoria_fc_neta` int(11) NOT NULL,
  `ds_texto` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_codigo` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_categoria_fc_filha` int(11) NOT NULL,
  `co_assinante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_CATEGORIA_FC_NETA`
--

INSERT INTO `TB_CATEGORIA_FC_NETA` (`co_categoria_fc_neta`, `ds_texto`, `nu_codigo`, `co_categoria_fc_filha`, `co_assinante`) VALUES
(1, 'Receitas em Dinheiro', '1.0.1', 1, 1),
(2, 'Receitas em Boleto', '1.0.2', 1, 1),
(3, 'Receitas em PIX', '1.0.3', 1, 1),
(4, 'Receitas em Cartão de Crédito', '1.0.4', 1, 1),
(5, 'Receitas em Cartão de Débito', '1.0.5', 1, 1),
(6, 'Outros Produtos/Serviços', '1.0.6', 1, 1),
(7, 'Simples Nacional', '2.0.1', 2, 1),
(8, 'Taxas de Cartões', '2.0.2', 2, 1),
(9, 'Taxas de Boleto', '2.0.3', 2, 1),
(10, 'Compras com Fornecedores', '2.1.1', 3, 1),
(11, 'Frete de Compras', '2.1.2', 3, 1),
(12, 'Outros custos com Fornecedor', '2.1.3', 3, 1),
(13, 'Combustível', '2.2.1', 4, 1),
(14, 'Estacionamento', '2.2.2', 4, 1),
(15, 'Alimentação', '2.2.3', 4, 1),
(16, 'Manuteção de Veículos', '2.2.4', 4, 1),
(17, 'Terceirização da entrega', '2.2.5', 4, 1),
(18, 'Outros custos com Entregas', '2.2.6', 4, 1),
(19, 'Embalagens', '2.3.1', 5, 1),
(20, 'Sacolas', '2.3.2', 5, 1),
(21, 'Caixas', '2.3.3', 5, 1),
(22, 'Outros custos com Embalagens', '2.3.4', 5, 1),
(23, 'Comissão Vendedor', '2.4.1', 6, 1),
(24, 'Telefone e Internet', '3.0.1', 7, 1),
(25, 'Energia Elétrica', '3.0.2', 7, 1),
(26, 'Água', '3.0.3', 7, 1),
(27, 'Aluguel e Condomínio', '3.0.4', 7, 1),
(28, 'IPTU e Taxas Públicas', '3.0.5', 7, 1),
(29, 'Almoço / Supermercado / Lanches', '3.0.6', 7, 1),
(30, 'Contador', '3.0.7', 7, 1),
(31, 'Salário de Funcionários', '3.1.1', 8, 1),
(32, 'Bolsa de Estágio', '3.1.2', 8, 1),
(33, 'VT e VR', '3.1.3', 8, 1),
(34, 'Rescisão', '3.1.4', 8, 1),
(35, 'FGTS', '3.1.5', 8, 1),
(36, 'INSS - Sindicato - IR', '3.1.6', 8, 1),
(37, '13º e Férias', '3.1.7', 8, 1),
(38, 'Exames ocupacionais', '3.1.8', 8, 1),
(39, 'Pro-Labores', '3.1.9', 8, 1),
(40, 'Plano de Saúde', '3.1.10', 8, 1),
(41, 'Confraternizações / Festas da Empresa', '3.1.11', 8, 1),
(42, 'Manutenção Máquinas e Equipamentos', '3.2.1', 9, 1),
(43, 'Serviços Técnicos em geral', '3.2.2', 9, 1),
(44, 'Materiais de Expediente/Escritório', '3.2.3', 9, 1),
(45, 'Materiais de Limpeza e Manutenção da Loja', '3.2.4', 9, 1),
(46, 'Papelaria Materiais impressos (folder, cartão visitas, etc.)', '4.0.1', 10, 1),
(47, 'Site / Sistema', '4.0.2', 10, 1),
(48, 'Mídias/ Propaganda', '4.0.3', 10, 1),
(49, 'Prestadores de serviços de marketing', '4.0.4', 10, 1),
(50, 'Compra de Equipamentos', '4.1.1', 11, 1),
(51, 'Reformas / Estrutura', '4.1.2', 11, 1),
(52, 'Mobiliário', '4.1.3', 11, 1),
(53, 'Consultoria', '4.2.1', 12, 1),
(54, 'Treinamentos', '4.2.2', 12, 1),
(55, 'Capitalização dos sócios', '5.0.1', 13, 1),
(56, 'Empréstimos obtidos', '5.0.2', 13, 1),
(57, 'Venda de equipamentos usados', '5.0.3', 13, 1),
(58, 'Pagamento de Empréstimos', '6.0.1', 14, 1),
(59, 'Juros Bancários e por Atraso', '6.0.2', 14, 1),
(60, 'Pagamento de dívidas passadas', '6.0.3', 14, 1),
(61, 'Distribuição de Lucros ', '6.0.4', 14, 1),
(62, 'Juros de Antecipação de Recebíveis', '6.0.5', 14, 1),
(63, 'Passagem', '2.5.1', 15, 1),
(64, 'Viagem Uber / Taxi', '2.5.2', 15, 1),
(65, 'Hospedagem', '2.5.3', 15, 1),
(66, 'Viagem Alimentação', '2.5.4', 15, 1),
(67, 'Estorno de Capital', '6.0.6', 14, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_CENTRO_CUSTO`
--

CREATE TABLE `TB_CENTRO_CUSTO` (
  `co_centro_custo` int(11) NOT NULL,
  `no_centro_custos` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_codigo` int(6) DEFAULT NULL,
  `ds_descricao` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_assinante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_CHECKOUT`
--

CREATE TABLE `TB_CHECKOUT` (
  `co_checkout` int(11) NOT NULL,
  `nu_visitas_total` int(11) DEFAULT NULL,
  `dt_ultima_visita` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_CLIQUE`
--

CREATE TABLE `TB_CLIQUE` (
  `co_clique` int(11) NOT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `co_botao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_CONTATO`
--

CREATE TABLE `TB_CONTATO` (
  `co_contato` int(11) NOT NULL,
  `nu_tel1` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_tel2` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_tel3` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_tel_0800` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_site` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_facebook` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_twitter` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_instagram` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_CONTATO`
--

INSERT INTO `TB_CONTATO` (`co_contato`, `nu_tel1`, `nu_tel2`, `nu_tel3`, `nu_tel_0800`, `ds_email`, `ds_site`, `ds_facebook`, `ds_twitter`, `ds_instagram`) VALUES
(1, '61993274991', '6130826060', '', '', 'sistema@atacadaobessa.com.br', '', '', '', ''),
(2, '61993274991', '6130826060', '', '', 'gestor@atacadaobessa.com.br', '', '', '', ''),
(3, '61992931084', '', '', '', 'ramos.amaury96@gmail.com', NULL, NULL, NULL, 'loja.sangiuseppe');

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_CONTA_BANCARIA`
--

CREATE TABLE `TB_CONTA_BANCARIA` (
  `co_conta_bancaria` int(11) NOT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `no_banco` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_agencia` int(6) DEFAULT NULL,
  `nu_conta` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_assinante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_CONTA_BANCARIA`
--

INSERT INTO `TB_CONTA_BANCARIA` (`co_conta_bancaria`, `dt_cadastro`, `no_banco`, `st_status`, `nu_agencia`, `nu_conta`, `co_assinante`) VALUES
(2, '2023-02-06 12:26:41', 'DINHEIRO (Arnaldo)', 'S', 1, '000002', 1),
(3, '2023-02-06 12:50:59', 'Pag Seguro', 'S', 1, '327994885', 1),
(4, '2023-02-10 10:35:00', 'DINHEIRO (Leo)', 'S', 1, '000002', 1),
(5, '2023-02-10 11:47:25', 'Pag Seguro Cartão de Crédito', 'S', 1, '3345455', 1),
(6, '2023-02-25 09:43:54', 'Marretada', 'S', 1, '000002', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_CONTROLLER`
--

CREATE TABLE `TB_CONTROLLER` (
  `co_controller` int(11) NOT NULL,
  `no_controller` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_class_icon` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Classe do Ícone'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_CONTROLLER`
--

INSERT INTO `TB_CONTROLLER` (`co_controller`, `no_controller`, `ds_class_icon`) VALUES
(1, 'Gestão', 'bi bi-kanban'),
(2, 'Auditoria', 'bi bi-calendar2-check'),
(3, 'Acesso', 'bi bi-ticket-detailed'),
(4, 'Funcionalidade', 'bi bi-list-check'),
(5, 'Perfil', 'bi bi-person-lines-fill'),
(6, 'Usuário', 'bi bi-person-check'),
(7, 'Visita', 'bi bi-bookmark-star-fill'),
(8, 'Relatorio', 'bi bi-bar-chart-line'),
(9, 'Suporte', 'bi bi-tools'),
(10, 'Fluxocaixa', 'bi bi-file-earmark-bar-graph'),
(11, 'Plano', 'bi bi-cash-coin'),
(12, 'Assinante', 'bi bi-person-circle'),
(13, 'Ai', 'bi bi-globe');

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_CRONS`
--

CREATE TABLE `TB_CRONS` (
  `co_cron` int(11) NOT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `no_cron` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_sql` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_CRONS`
--

INSERT INTO `TB_CRONS` (`co_cron`, `dt_cadastro`, `no_cron`, `ds_sql`) VALUES
(1, '2023-02-09 14:35:53', 'Atualiza Lançamentos em atraso', 'update TB_FLUXO_CAIXA set st_pagamento = 4 where dt_vencimento < SYSDATE() and dt_realizado is null and st_pagamento in (1,2)');

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_EMPRESA`
--

CREATE TABLE `TB_EMPRESA` (
  `co_empresa` int(11) NOT NULL,
  `no_empresa` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Razão Social\n',
  `no_fantasia` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `nu_cnpj` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_insc_estadual` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_observacao` text COLLATE utf8_unicode_ci,
  `tp_empresa` int(1) DEFAULT NULL COMMENT '1 - Fornecedor / 2 - Cliente\n',
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_pessoa` int(11) NOT NULL COMMENT 'Pessoa responsável pela empresa\n',
  `co_endereco` int(11) NOT NULL,
  `co_contato` int(11) NOT NULL,
  `co_imagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_EMPRESA`
--

INSERT INTO `TB_EMPRESA` (`co_empresa`, `no_empresa`, `no_fantasia`, `dt_cadastro`, `nu_cnpj`, `nu_insc_estadual`, `ds_observacao`, `tp_empresa`, `st_status`, `co_pessoa`, `co_endereco`, `co_contato`, `co_imagem`) VALUES
(1, 'Atacadão Bessa', 'Atacadão Bessa', '2022-05-31 14:23:16', '44777359000145', NULL, NULL, NULL, '0', 2, 2, 2, 2),
(2, 'SAN GIUSEPPE ARTIGOS RELIGIOSOS E PRESENTES', 'LOJA SAN GIUSEPPE ARTIGOS RELIGIOSOS', '2023-04-26 10:53:14', NULL, NULL, NULL, NULL, '0', 3, 3, 3, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_ENDERECO`
--

CREATE TABLE `TB_ENDERECO` (
  `co_endereco` int(11) NOT NULL,
  `ds_endereco` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_complemento` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_bairro` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_cep` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_cidade` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sg_uf` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_ENDERECO`
--

INSERT INTO `TB_ENDERECO` (`co_endereco`, `ds_endereco`, `ds_complemento`, `ds_bairro`, `nu_cep`, `no_cidade`, `sg_uf`) VALUES
(1, 'qr 10 casa 10', '', 'Samambaia', '72111111', 'Brasília', 'DF'),
(2, 'Qr 403 10 28', '', 'Samambaia', '72111111', 'Brasília', 'DF'),
(3, 'QR 403 Conjunto 10', '37', 'Samambaia Norte (Samambaia)', '72319111', 'Brasília', 'DF');

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_ESTOQUE`
--

CREATE TABLE `TB_ESTOQUE` (
  `co_estoque` int(11) NOT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `nu_estoque` int(10) DEFAULT NULL,
  `co_produto` int(11) NOT NULL,
  `co_negociacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_FLUXO_CAIXA`
--

CREATE TABLE `TB_FLUXO_CAIXA` (
  `co_fluxo_caixa` int(11) NOT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_realizado` date DEFAULT NULL,
  `dt_vencimento` date DEFAULT NULL,
  `nu_valor` float(12,2) DEFAULT NULL,
  `nu_valor_pago` float(12,2) DEFAULT NULL,
  `ds_descricao` text COLLATE utf8_unicode_ci,
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

--
-- Despejando dados para a tabela `TB_FLUXO_CAIXA`
--

INSERT INTO `TB_FLUXO_CAIXA` (`co_fluxo_caixa`, `dt_cadastro`, `dt_realizado`, `dt_vencimento`, `nu_valor`, `nu_valor_pago`, `ds_descricao`, `tp_fluxo`, `tp_pagamento`, `st_pagamento`, `co_categoria_fc`, `co_categoria_fc_filha`, `co_categoria_fc_neta`, `co_centro_custo`, `co_conta_bancaria`, `co_representacao`, `co_usuario`, `co_assinante`) VALUES
(1, '2023-02-08 12:23:36', '2023-01-20', NULL, NULL, 400.00, 'Adiantamento de passagem para viagem', 1, 1, 3, 5, 13, 55, 0, 2, 20, 2, 1),
(2, '2023-02-08 12:35:27', '2023-01-23', NULL, NULL, 3700.00, 'Era 4mil porem sobrou 300', 1, 1, 3, 5, 13, 55, 0, 2, 20, 2, 1),
(3, '2023-02-08 12:37:52', '2023-02-01', NULL, NULL, 1800.00, 'Pagamento Toalhinhas de personagem', 1, 4, 3, 5, 13, 55, 0, 2, 21, 2, 1),
(4, '2023-02-08 12:41:36', '2023-02-01', NULL, NULL, 1800.00, 'COmpra de toalhas de personagem 52 duzias', 2, 4, 3, 2, 3, 10, 0, 2, 22, 2, 1),
(5, '2023-02-08 15:42:40', '2023-01-22', NULL, NULL, 560.00, 'Passagem viagem Brás SP', 2, 4, 3, 2, 15, 63, 0, 3, 0, 2, 1),
(6, '2023-02-08 15:44:14', '2023-01-22', NULL, NULL, 80.00, 'Locomoção na viagem', 2, 3, 3, 2, 15, 64, 0, 3, 0, 2, 1),
(7, '2023-02-08 15:45:47', '2023-01-22', NULL, NULL, 80.00, 'Pago cartão C6 CRÉDITO', 1, 3, 3, 5, 13, 55, 0, 3, 21, 2, 1),
(8, '2023-02-08 15:48:00', '2023-01-22', NULL, NULL, 260.00, 'Custo da alimentação da viagem toda', 2, 3, 3, 2, 15, 66, 0, 3, 0, 2, 1),
(9, '2023-02-08 15:56:23', '2023-01-25', NULL, NULL, 94.25, 'Hospedagem do site', 2, 3, 3, 4, 10, 47, 0, 3, 0, 2, 1),
(10, '2023-02-08 15:58:33', '2023-01-22', NULL, NULL, 3600.00, 'Compra das mochilas', 2, 3, 3, 2, 3, 10, 0, 3, 6, 2, 1),
(11, '2023-02-08 16:09:20', '2023-01-22', NULL, NULL, 150.00, 'Compra dos talheres inox', 2, 3, 3, 2, 3, 10, 0, 3, 2, 2, 1),
(12, '2023-02-08 16:11:03', '2023-01-22', NULL, NULL, 1530.00, 'Materiais diversos', 2, 1, 3, 2, 3, 10, 0, 2, 3, 2, 1),
(13, '2023-02-08 16:12:12', '2023-01-22', NULL, NULL, 220.00, 'Compra de pilhas AAA e AA', 2, 4, 3, 2, 3, 10, 0, 2, 4, 2, 1),
(15, '2023-02-08 16:16:00', '2023-01-23', NULL, NULL, 579.00, 'Compra porta lapis', 2, 1, 3, 2, 3, 10, 0, 2, 7, 2, 1),
(16, '2023-02-08 19:07:38', '2023-01-23', NULL, NULL, 112.00, 'Compras porta lápis', 2, 1, 3, 2, 3, 10, 0, 2, 0, 2, 1),
(17, '2023-02-08 19:13:40', '2023-01-23', NULL, NULL, 712.50, 'Compras dos panos de prato e panos de chão', 2, 1, 3, 2, 3, 10, 0, 2, 5, 2, 1),
(19, '2023-02-08 19:17:40', '2023-01-24', NULL, NULL, 95.00, 'Porta lápis 2 ziper', 1, 4, 3, 1, 1, 3, 0, 3, 0, 2, 1),
(21, '2023-02-08 19:21:19', '2023-01-24', NULL, NULL, 340.00, 'Porta lápis e mochila', 1, 4, 3, 1, 1, 3, 0, 3, 10, 2, 1),
(22, '2023-02-08 19:23:13', '2023-01-25', NULL, NULL, 410.00, 'Mochilas e portas lápis', 1, 4, 3, 1, 1, 3, 0, 3, 24, 2, 1),
(24, '2023-02-08 19:25:04', '2023-02-08', NULL, NULL, 532.00, 'Porta lápis', 1, 4, 3, 1, 1, 3, 0, 3, 25, 2, 1),
(25, '2023-02-08 19:29:18', '2023-02-13', '2023-02-05', 162.00, 162.00, 'Mochilas', 1, 4, 3, 1, 1, 3, 0, 3, 26, 2, 1),
(26, '2023-02-08 19:30:50', '2023-01-26', NULL, NULL, 100.00, 'Mochilas', 1, 4, 3, 1, 1, 3, 0, 3, 0, 2, 1),
(29, '2023-02-08 19:34:34', '2023-01-31', NULL, NULL, 108.00, 'Pago depois pix', 1, 1, 3, 1, 1, 1, 0, 2, 10, 2, 1),
(30, '2023-02-08 19:36:17', '2023-02-10', '2023-02-07', 492.00, 492.00, 'Toalha personagem e mochilas', 1, 4, 3, 1, 1, 3, 0, 3, 11, 2, 1),
(31, '2023-02-08 19:37:24', '2023-05-12', '2023-02-10', 102.00, 162.00, 'Mochilas', 1, 1, 3, 1, 1, 3, 0, 2, 27, 2, 1),
(33, '2023-02-08 19:40:45', '2023-01-31', NULL, NULL, 30.00, '1 dz colher inox', 1, 1, 3, 1, 1, 1, 0, 2, 0, 2, 1),
(34, '2023-02-08 19:41:58', '2023-02-01', NULL, NULL, 543.00, 'Toalhas personagem e porta lapis e mochilas', 1, 4, 3, 1, 1, 3, 0, 3, 12, 2, 1),
(35, '2023-02-08 19:43:04', '2023-02-10', '2023-02-08', 200.00, 200.00, 'Toalhas personagem e porta lapis e mochilas', 1, 4, 3, 1, 1, 3, 0, 3, 12, 2, 1),
(38, '2023-02-08 19:46:29', '2023-02-03', NULL, NULL, 162.00, 'Toalhas pers.', 1, 1, 3, 1, 1, 1, 0, 2, 24, 2, 1),
(39, '2023-02-08 19:47:56', '2023-02-01', NULL, NULL, 175.00, 'Toalhas', 1, 1, 3, 1, 1, 1, 0, 2, 29, 2, 1),
(41, '2023-02-08 19:50:00', '2023-03-04', '2023-02-15', 312.00, 312.00, 'Toalhas mochilas e porta lapis', 1, 4, 3, 1, 1, 3, 0, 3, 16, 2, 1),
(42, '2023-02-08 19:51:20', '2023-02-03', NULL, NULL, 237.00, 'toalhas', 1, 1, 3, 1, 1, 1, 0, 2, 17, 2, 1),
(43, '2023-02-08 19:52:53', '2023-02-05', NULL, NULL, 54.00, 'Toalhas', 1, 1, 3, 1, 1, 1, 0, 2, 30, 2, 1),
(44, '2023-02-08 19:54:05', '2023-02-05', NULL, NULL, 156.00, 'Mochilas', 1, 1, 3, 1, 1, 1, 0, 2, 28, 2, 1),
(45, '2023-02-09 14:09:31', '2023-02-06', '2023-02-03', 420.00, 420.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 9, 2, 1),
(46, '2023-02-09 14:14:15', '2023-02-06', NULL, NULL, 208.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 18, 2, 1),
(47, '2023-02-09 14:14:56', '2023-02-06', NULL, NULL, 125.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 19, 2, 1),
(48, '2023-02-09 14:16:57', '2023-02-15', '2023-02-15', 276.00, 276.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 31, 2, 1),
(49, '2023-02-09 14:19:12', '2023-02-23', '2023-02-15', 108.00, 108.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 32, 2, 1),
(50, '2023-02-09 14:20:40', '2023-02-08', NULL, NULL, 54.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 33, 2, 1),
(51, '2023-02-09 14:23:13', '2023-02-07', '2023-02-06', 687.00, 687.00, 'Toalhas personagem e porta lapis', 1, 4, 3, 1, 1, 3, 0, 3, 13, 2, 1),
(52, '2023-02-09 14:26:46', '2023-02-07', NULL, NULL, 364.00, 'Pagamento Porta Lápis', 2, 4, 3, 6, 14, 60, 0, 2, 20, 2, 1),
(53, '2023-02-09 14:28:21', '2023-02-07', '2023-02-01', 386.00, 386.00, 'Mochilas e Porta Lápis', 1, 4, 3, 1, 1, 3, 0, 3, 8, 2, 1),
(54, '2023-02-09 14:33:15', '2023-01-26', '2023-01-26', 100.00, 100.00, 'Mochilas', 1, 4, 3, 1, 1, 3, 0, 3, 0, 2, 1),
(55, '2023-02-09 14:43:05', '2023-01-27', NULL, NULL, 180.00, 'Pix Hélio Ferreira', 2, 4, 3, 6, 14, 67, 0, 3, 20, 2, 1),
(57, '2023-02-09 14:48:02', '2023-01-31', NULL, NULL, 600.00, '', 2, 4, 3, 6, 14, 67, 0, 2, 20, 2, 1),
(58, '2023-02-09 14:49:09', '2023-01-30', NULL, NULL, 700.00, '', 2, 4, 3, 6, 14, 67, 0, 2, 20, 2, 1),
(59, '2023-02-09 14:51:04', '2023-02-09', '2023-02-08', 312.00, 312.00, 'Toalhas mochilas e porta lapis', 1, 4, 3, 1, 1, 3, 0, 3, 16, 2, 1),
(60, '2023-02-09 14:54:28', '2023-01-20', NULL, NULL, 6360.00, '', 1, 4, 3, 5, 13, 55, 0, 3, 21, 2, 1),
(61, '2023-02-09 15:19:10', '2023-01-23', NULL, NULL, 112.00, 'Porta lápis 2 xíper Troca de produto calça e blusa', 1, 1, 3, 1, 1, 1, 0, 2, 34, 2, 1),
(62, '2023-02-09 22:38:35', '2023-03-04', '2023-02-22', 150.00, 150.00, 'Pct toalhas coloridas', 1, 4, 3, 1, 1, 3, 0, 3, 16, 2, 1),
(63, '2023-02-09 22:40:41', '2023-02-09', '2023-02-08', 200.00, 200.00, 'Toalhas mochilas', 1, 4, 3, 1, 1, 3, 0, 3, 14, 2, 1),
(64, '2023-02-09 22:44:37', '2023-02-27', '2023-02-15', 267.00, 200.00, 'Toalhas personagem 39 unidades', 1, 1, 3, 1, 1, 1, 0, 2, 14, 2, 1),
(65, '2023-02-09 22:46:45', '2023-02-03', NULL, NULL, 70.00, '', 2, 1, 3, 2, 6, 23, 0, 2, 1, 2, 1),
(66, '2023-02-10 10:33:19', '2023-02-08', '2023-02-03', 138.00, 138.00, 'Porta lapis', 1, 4, 3, 1, 1, 3, 0, 3, 23, 2, 1),
(71, '2023-02-12 15:53:29', '2023-02-13', '2023-02-14', 750.00, 750.00, 'Toalhas coloridas', 2, 4, 3, 2, 3, 10, 0, 5, 22, 2, 1),
(72, '2023-02-12 15:54:32', '2023-02-13', '2023-02-14', 1050.00, 1050.00, 'Toalhas Personagem', 2, 4, 3, 2, 3, 10, 0, 3, 22, 2, 1),
(73, '2023-02-14 14:30:22', '2023-02-10', NULL, NULL, 137.00, 'Toalha', 1, 1, 3, 1, 1, 3, 0, 2, 35, 2, 1),
(74, '2023-02-14 14:36:13', '2023-02-13', NULL, NULL, 370.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 36, 2, 1),
(76, '2023-02-14 16:24:59', '2023-02-14', NULL, NULL, 108.00, 'Lápis de cor', 1, 4, 3, 1, 1, 3, 0, 3, 29, 2, 1),
(77, '2023-02-15 12:10:13', '2023-02-15', NULL, NULL, 1000.00, 'Pagamento Cartão de Crédito Bradesco', 2, 4, 3, 6, 14, 67, 0, 3, 20, 2, 1),
(78, '2023-02-24 11:35:41', '2023-02-23', NULL, NULL, 213.00, '', 2, 4, 3, 2, 6, 23, 0, 2, 20, 2, 1),
(79, '2023-02-24 11:44:24', '2023-02-15', NULL, NULL, 75.00, 'Grossa de lapis e toalhas', 1, 1, 3, 1, 1, 1, 0, 2, 10, 2, 1),
(80, '2023-02-24 11:45:54', '2023-02-22', '2023-02-22', 162.00, 162.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 39, 2, 1),
(81, '2023-02-24 11:46:57', '2023-02-15', NULL, NULL, 288.00, 'Mochilas e toalhas', 1, 4, 3, 1, 1, 3, 0, 3, 38, 2, 1),
(82, '2023-02-24 11:47:59', '2023-02-23', NULL, NULL, 50.00, 'Mochilas e porta lapis', 1, 4, 3, 1, 1, 3, 0, 3, 40, 2, 1),
(83, '2023-02-24 11:48:37', '2023-03-03', '2023-02-23', 196.00, 100.00, 'Mochilas e toalhas', 1, 4, 3, 1, 1, 3, 0, 3, 40, 2, 1),
(84, '2023-02-24 11:50:12', '2023-02-17', NULL, NULL, 54.00, 'Toalhas person.', 1, 1, 3, 1, 1, 1, 0, 2, 41, 2, 1),
(85, '2023-02-24 11:51:22', '2023-02-17', '2023-02-17', 30.00, 30.00, 'Colher', 1, 4, 3, 1, 1, 3, 0, 3, 42, 2, 1),
(86, '2023-02-24 11:53:12', '2023-02-24', NULL, NULL, 153.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 43, 2, 1),
(87, '2023-03-04 11:22:13', '2023-02-27', NULL, NULL, 2950.00, 'Havaianas', 2, 4, 3, 2, 3, 10, 0, 3, 45, 2, 1),
(88, '2023-03-04 11:24:03', '2023-02-27', NULL, NULL, 670.00, 'Mochilqs', 2, 4, 3, 2, 3, 10, 0, 3, 44, 2, 1),
(89, '2023-03-04 11:32:15', '2023-03-14', '2023-03-01', 46.00, 96.00, 'Restante do pagamento', 1, 4, 3, 1, 1, 3, 0, 4, 40, 2, 1),
(90, '2023-03-04 11:33:53', '2023-03-25', '2023-03-01', 67.00, 67.00, 'Restante do pagamento', 1, 1, 3, 1, 1, 1, 0, 2, 14, 2, 1),
(91, '2023-03-06 08:45:10', '2023-03-03', NULL, NULL, 310.00, '', 2, 1, 3, 2, 6, 23, 0, 2, 20, 2, 1),
(92, '2023-03-06 08:48:49', '2023-03-04', NULL, NULL, 180.00, 'Havaianas', 1, 1, 3, 1, 1, 1, 0, 2, 35, 2, 1),
(93, '2023-03-06 08:49:32', '2023-03-10', NULL, NULL, 225.00, 'Havaianas', 1, 1, 3, 1, 1, 1, 0, 2, 14, 2, 1),
(94, '2023-03-06 08:58:13', '2023-02-27', NULL, NULL, 120.00, '', 2, 3, 3, 2, 15, 64, 0, 5, 0, 2, 1),
(95, '2023-03-06 08:58:46', '2023-02-27', NULL, NULL, 80.00, '', 2, 1, 3, 2, 15, 66, 0, 5, 0, 2, 1),
(96, '2023-03-06 08:59:13', '2023-02-27', NULL, NULL, 400.00, '', 2, 1, 3, 2, 15, 63, 0, 5, 0, 2, 1),
(97, '2023-03-07 14:04:02', '2023-03-07', NULL, NULL, 16.50, '', 1, 1, 3, 1, 1, 1, 0, 2, 48, 2, 1),
(98, '2023-03-07 14:05:28', '2023-03-23', '2023-03-10', 110.00, 110.00, 'Panos de prato', 1, 4, 3, 1, 1, 3, 0, 2, 47, 2, 1),
(99, '2023-03-09 10:59:23', '2023-03-09', NULL, NULL, 107.00, 'Panos de prato', 1, 4, 3, 1, 1, 1, 0, 3, 49, 2, 1),
(100, '2023-03-09 11:04:05', '2023-03-23', '2023-03-20', 476.50, 476.50, 'Havaianas', 1, 1, 3, 1, 1, 3, 0, 3, 50, 2, 1),
(101, '2023-03-09 11:05:02', '2023-04-04', '2023-04-01', 476.50, 353.50, 'Havaianas', 1, 4, 3, 1, 1, 3, 0, 3, 50, 2, 1),
(102, '2023-03-09 11:06:41', '2023-03-07', NULL, NULL, 84.00, 'Panos de chão', 1, 1, 3, 1, 1, 1, 0, 4, 51, 2, 1),
(103, '2023-03-09 11:08:11', '2023-03-07', NULL, NULL, 140.00, 'Havaianas', 1, 1, 3, 1, 1, 1, 0, 4, 52, 2, 1),
(104, '2023-03-14 08:45:00', '2023-03-25', '2023-03-20', 294.25, 294.25, 'Materias diversos', 1, 1, 3, 1, 1, 1, 0, 2, 14, 2, 1),
(105, '2023-03-14 08:46:23', '2023-05-03', '2023-03-27', 149.75, 150.00, 'Materias DIversos', 1, 1, 3, 1, 1, 1, 0, 2, 14, 2, 1),
(106, '2023-03-14 08:46:23', '2023-04-14', '2023-04-03', 294.25, 200.00, 'Materias DIversos', 1, 1, 3, 1, 1, 1, 0, 2, 14, 2, 1),
(107, '2023-03-14 08:46:23', '2023-06-12', '2023-04-10', 144.25, 150.00, 'Materias DIversos', 1, 1, 3, 1, 1, 1, 0, 2, 14, 2, 1),
(108, '2023-03-14 13:44:55', '2023-03-14', NULL, NULL, 236.82, 'Havaianas e extensão', 1, 4, 3, 1, 1, 3, 0, 3, 10, 2, 1),
(109, '2023-03-14 14:06:16', '2023-03-10', NULL, NULL, 80.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 27, 2, 1),
(110, '2023-03-14 14:09:25', '2023-03-11', NULL, NULL, 29.52, '', 1, 1, 3, 1, 1, 1, 0, 3, 0, 2, 1),
(111, '2023-03-14 16:25:44', '2023-03-14', NULL, NULL, 100.00, 'Havaianas', 1, 1, 3, 1, 1, 1, 0, 4, 38, 2, 1),
(112, '2023-03-14 16:26:37', '2023-04-01', '2023-03-22', 72.00, 72.00, 'Havaianas', 1, 4, 3, 1, 1, 3, 0, 3, 38, 2, 1),
(113, '2023-03-14 16:41:24', '2023-03-14', NULL, NULL, 100.00, 'Havaianas', 1, 1, 3, 1, 1, 1, 0, 4, 10, 2, 1),
(114, '2023-03-14 17:15:18', '2023-04-05', '2023-03-30', 168.00, 184.00, 'Havaianas', 1, 1, 3, 1, 1, 1, 0, 2, 40, 2, 1),
(115, '2023-03-14 17:15:18', '2023-04-29', '2023-04-09', 168.00, 150.00, 'Havaianas', 1, 1, 3, 1, 1, 1, 0, 2, 40, 2, 1),
(116, '2023-03-14 17:16:17', '2023-03-14', NULL, NULL, 22.00, 'Esc e cola', 1, 1, 3, 1, 1, 1, 0, 4, 40, 2, 1),
(117, '2023-03-27 09:18:04', '2023-03-22', NULL, NULL, 50.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 27, 2, 1),
(118, '2023-03-27 09:21:43', '2023-03-24', NULL, NULL, 106.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 53, 2, 1),
(119, '2023-03-27 10:31:35', '2023-03-14', NULL, NULL, 100.00, '', 2, 1, 3, 2, 6, 23, 0, 4, 1, 2, 1),
(120, '2023-03-27 10:33:39', '2023-03-16', NULL, NULL, 56.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 55, 2, 1),
(121, '2023-04-06 11:14:41', '2023-04-24', NULL, NULL, 17.55, '', 2, 3, 3, 2, 2, 8, 0, 3, 54, 2, 1),
(122, '2023-04-06 11:17:12', '2023-04-27', NULL, NULL, 4.90, 'Segura da conta PagBank', 2, 3, 3, 2, 2, 8, 0, 3, 0, 2, 1),
(123, '2023-04-06 11:19:52', '2023-04-28', NULL, NULL, 315.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 56, 2, 1),
(124, '2023-04-06 11:22:44', '2023-03-30', NULL, NULL, 67.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 57, 2, 1),
(125, '2023-04-06 11:23:24', '2023-03-30', NULL, NULL, 65.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 57, 2, 1),
(126, '2023-04-06 11:24:56', '2023-03-24', NULL, NULL, 123.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 50, 2, 1),
(127, '2023-04-06 11:28:07', '2023-03-30', NULL, NULL, 40.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 58, 2, 1),
(128, '2023-04-06 11:38:39', '2023-03-30', NULL, NULL, 200.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 14, 2, 1),
(129, '2023-04-11 14:20:34', '2023-04-01', NULL, NULL, 40.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 14, 2, 1),
(130, '2023-04-20 14:28:17', '2023-04-13', NULL, NULL, 60.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 59, 2, 1),
(131, '2023-04-20 14:31:01', '2023-04-14', NULL, NULL, 106.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 60, 2, 1),
(132, '2023-04-20 14:32:50', '2023-04-20', '2023-04-20', 240.00, 240.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 61, 2, 1),
(133, '2023-04-20 14:34:18', '2023-04-19', NULL, NULL, 106.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 15, 2, 1),
(134, '2023-04-20 14:35:02', '2023-04-20', '2023-04-20', 100.00, 205.00, '', 1, 1, 3, 1, 1, 3, 0, 3, 15, 2, 1),
(135, '2023-04-20 14:37:40', '2023-04-11', NULL, NULL, 80.00, '', 1, 4, 3, 1, 1, 1, 0, 3, 38, 2, 1),
(137, '2023-04-20 14:39:19', NULL, '2023-04-26', 60.00, NULL, '', 1, 1, 4, 1, 1, 3, 0, 3, 38, 2, 1),
(138, '2023-04-20 14:52:44', '2023-04-18', NULL, NULL, 580.00, 'Cadeado ao barbear filtro de linha', 2, 4, 3, 2, 3, 10, 0, 3, 62, 2, 1),
(139, '2023-04-22 12:11:55', '2023-04-20', NULL, NULL, 953.00, '', 2, 4, 3, 2, 3, 10, 0, 3, 62, 2, 1),
(140, '2023-04-25 14:54:15', '2023-04-24', NULL, NULL, 80.00, '', 1, 1, 3, 1, 1, 3, 0, 2, 27, 2, 1),
(141, '2023-04-25 14:59:57', '2023-04-24', NULL, NULL, 95.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 63, 2, 1),
(142, '2023-04-25 15:02:28', '2023-04-24', NULL, NULL, 30.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 64, 2, 1),
(143, '2023-04-25 17:34:31', '2023-04-25', NULL, NULL, 136.00, '', 1, 1, 3, 1, 1, 1, 0, 4, 66, 2, 1),
(144, '2023-04-25 17:35:27', '2023-04-25', NULL, NULL, 50.00, '', 1, 1, 3, 1, 1, 1, 0, 4, 13, 2, 1),
(145, '2023-04-25 17:36:22', '2023-04-25', NULL, NULL, 50.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 13, 2, 1),
(146, '2023-04-25 17:37:48', '2023-04-25', NULL, NULL, 169.95, '', 1, 1, 3, 1, 1, 1, 0, 4, 65, 2, 1),
(147, '2023-04-25 17:46:52', '2023-04-24', NULL, NULL, 26.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 67, 2, 1),
(148, '2023-04-26 22:36:00', '2023-04-26', NULL, NULL, 470.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 68, 2, 1),
(149, '2023-04-27 14:24:07', '2023-04-26', NULL, NULL, 38.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 69, 2, 1),
(150, '2023-04-27 14:26:26', '2023-04-27', NULL, NULL, 80.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 53, 2, 1),
(151, '2023-04-27 14:28:15', '2023-04-26', NULL, NULL, 220.00, '', 2, 1, 3, 2, 3, 10, 0, 4, 70, 2, 1),
(152, '2023-04-27 14:29:46', '2023-05-04', '2023-05-02', 88.00, 88.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 71, 2, 1),
(153, '2023-04-27 17:34:46', NULL, '2023-04-29', NULL, 183.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 11, 2, 1),
(154, '2023-04-27 18:55:41', '2023-04-27', NULL, NULL, 50.00, '', 1, 1, 3, 1, 1, 1, 0, 4, 72, 2, 1),
(155, '2023-04-27 18:57:19', '2023-04-27', NULL, NULL, 50.00, '', 2, 1, 3, 2, 4, 13, 0, 4, 21, 2, 1),
(156, '2023-05-04 15:20:02', '2023-05-01', NULL, NULL, 100.00, 'Toalhinhas', 1, 1, 3, 1, 1, 1, 0, 2, 74, 2, 1),
(157, '2023-05-04 15:21:31', '2023-06-08', '2023-05-03', 37.00, 37.00, 'Restante toalhinhas', 1, 1, 3, 1, 1, 1, 0, 2, 74, 2, 1),
(158, '2023-05-04 15:23:00', '2023-05-03', NULL, NULL, 110.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 73, 2, 1),
(159, '2023-05-05 16:11:21', '2023-05-04', NULL, NULL, 88.00, '', 2, 1, 3, 2, 6, 23, 0, 4, 1, 2, 1),
(160, '2023-05-05 16:15:20', '2023-05-04', NULL, NULL, 420.00, '', 2, 1, 3, 2, 3, 10, 0, 3, 70, 2, 1),
(161, '2023-05-05 16:18:11', '2023-05-04', NULL, NULL, 555.00, '', 2, 1, 3, 2, 3, 10, 0, 3, 75, 2, 1),
(162, '2023-05-09 14:49:25', '2023-05-08', NULL, NULL, 150.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 38, 2, 1),
(163, '2023-05-09 14:50:51', '2023-05-03', NULL, NULL, 150.00, '', 2, 1, 3, 2, 4, 13, 0, 4, 0, 2, 1),
(164, '2023-05-15 15:34:22', '2023-05-11', NULL, NULL, 200.00, 'Vendas Arnaldo caldas', 1, 1, 3, 1, 1, 1, 0, 4, 0, 2, 1),
(165, '2023-05-15 15:35:18', '2023-05-09', NULL, NULL, 68.00, 'Vendas Arnaldo caldas', 1, 1, 3, 1, 1, 1, 0, 2, 0, 2, 1),
(166, '2023-05-15 16:16:10', '2023-05-15', NULL, NULL, 58.00, 'Cadeado 20', 1, 1, 3, 1, 1, 1, 0, 4, 76, 2, 1),
(167, '2023-05-15 17:03:18', '2023-05-15', NULL, NULL, 57.00, '', 1, 1, 3, 1, 1, 1, 0, 4, 77, 2, 1),
(168, '2023-05-18 16:56:31', '2023-05-18', NULL, NULL, 229.00, '', 1, 1, 3, 1, 1, 1, 0, 4, 0, 2, 1),
(169, '2023-05-23 15:34:16', '2023-05-16', NULL, NULL, 125.00, '', 1, 1, 3, 1, 1, 1, 0, 4, 78, 2, 1),
(170, '2023-05-23 15:38:29', '2023-06-02', '2023-06-02', 180.00, 180.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 79, 2, 1),
(171, '2023-05-23 15:40:26', '2023-05-16', NULL, NULL, 194.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 80, 2, 1),
(172, '2023-05-23 16:54:54', '2023-05-16', NULL, NULL, 128.00, '', 2, 1, 3, 2, 3, 10, 0, 4, 75, 2, 1),
(173, '2023-05-23 16:56:12', '2023-05-16', NULL, NULL, 130.00, '', 2, 1, 3, 2, 3, 10, 0, 2, 70, 2, 1),
(174, '2023-05-23 16:58:00', '2023-05-12', NULL, NULL, 1528.00, '', 2, 1, 3, 2, 3, 10, 0, 3, 22, 2, 1),
(175, '2023-05-23 16:59:56', '2023-06-01', '2023-06-02', 296.00, 446.00, '', 2, 1, 3, 2, 3, 10, 0, 3, 22, 2, 1),
(176, '2023-05-23 22:59:26', '2023-05-23', NULL, NULL, 50.28, '', 2, 1, 3, 2, 4, 15, 0, 4, 0, 2, 1),
(177, '2023-05-23 23:00:43', '2023-05-23', NULL, NULL, 126.00, '', 1, 1, 3, 1, 1, 1, 0, 4, 0, 2, 1),
(178, '2023-05-25 14:47:59', '2023-06-01', '2023-06-02', 1584.00, 1584.00, 'Sandálias', 2, 4, 3, 2, 3, 10, 0, 3, 22, 2, 1),
(179, '2023-05-25 14:49:33', '2023-05-25', NULL, NULL, 150.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 14, 2, 1),
(180, '2023-05-25 15:00:04', '2023-05-24', NULL, NULL, 110.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 81, 2, 1),
(181, '2023-05-25 15:04:29', '2023-05-24', NULL, NULL, 35.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 82, 2, 1),
(182, '2023-05-25 15:05:29', '2023-05-24', NULL, NULL, 30.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 83, 2, 1),
(183, '2023-05-25 15:07:30', '2023-05-24', NULL, NULL, 70.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 0, 2, 1),
(184, '2023-05-26 18:02:34', '2023-05-23', NULL, NULL, 150.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 14, 2, 1),
(185, '2023-05-30 16:10:03', '2023-05-30', NULL, NULL, 168.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 84, 2, 1),
(186, '2023-05-30 16:11:02', NULL, '2023-06-22', 200.00, NULL, '', 1, 1, 4, 1, 1, 3, 0, 3, 84, 2, 1),
(187, '2023-05-30 17:15:54', '2023-06-10', '2023-06-10', 695.00, 695.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 85, 2, 1),
(188, '2023-05-30 17:15:54', NULL, '2023-06-25', 495.00, NULL, '', 1, 1, 4, 1, 1, 1, 0, 2, 85, 2, 1),
(189, '2023-05-30 17:15:54', NULL, '2023-07-10', 695.00, NULL, '', 1, 1, 4, 1, 1, 1, 0, 2, 85, 2, 1),
(190, '2023-05-30 17:17:45', '2023-05-17', NULL, NULL, 82.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 0, 2, 1),
(191, '2023-05-30 18:02:42', '2023-05-30', NULL, NULL, 356.00, '', 1, 4, 3, 1, 1, 1, 0, 3, 86, 2, 1),
(192, '2023-05-30 18:04:30', '2023-07-01', '2023-06-30', 300.00, 300.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 86, 2, 1),
(193, '2023-05-30 19:00:10', '2023-05-30', NULL, NULL, 150.00, '', 1, 1, 3, 1, 1, 1, 0, 4, 87, 2, 1),
(194, '2023-05-30 22:56:13', '2023-05-30', NULL, NULL, 75.60, '', 2, 1, 3, 3, 7, 29, 0, 4, 0, 2, 1),
(195, '2023-05-30 22:57:39', '2023-05-30', NULL, NULL, 1000.00, '', 2, 1, 3, 2, 3, 10, 0, 3, 22, 2, 1),
(196, '2023-06-01 14:17:45', '2023-06-01', NULL, NULL, 75.00, '', 2, 4, 3, 2, 6, 23, 0, 3, 1, 2, 1),
(197, '2023-06-01 14:20:08', '2023-06-01', NULL, NULL, 80.00, '', 2, 1, 3, 2, 6, 23, 0, 2, 20, 2, 1),
(198, '2023-06-05 15:30:57', '2023-06-05', NULL, NULL, 50.00, '', 1, 1, 3, 1, 1, 3, 0, 3, 0, 2, 1),
(199, '2023-06-05 15:33:21', '2023-06-05', '2023-06-05', 100.00, 100.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 88, 2, 1),
(200, '2023-06-05 15:36:35', '2023-06-01', NULL, NULL, 63.50, '', 2, 4, 3, 2, 3, 10, 0, 3, 75, 2, 1),
(201, '2023-06-05 15:38:05', '2023-06-01', NULL, NULL, 196.83, '', 2, 1, 3, 2, 3, 10, 0, 2, 75, 2, 1),
(202, '2023-06-05 15:42:32', '2023-06-02', NULL, NULL, 180.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 79, 2, 1),
(203, '2023-06-05 15:47:11', '2023-06-10', '2023-06-15', 1635.00, 1635.00, '', 2, 1, 3, 2, 3, 10, 0, 2, 89, 2, 1),
(204, '2023-06-05 15:57:04', '2023-06-09', '2023-06-09', 500.00, 500.00, '', 2, 1, 3, 2, 3, 10, 0, 3, 70, 2, 1),
(205, '2023-06-05 16:40:59', '2023-06-10', '2023-06-09', 299.00, 299.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 90, 2, 1),
(206, '2023-06-08 10:22:14', '2023-06-07', NULL, NULL, 189.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 54, 2, 1),
(207, '2023-06-08 10:27:02', '2023-06-07', NULL, NULL, 109.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 38, 2, 1),
(208, '2023-06-09 15:01:42', '2023-06-07', NULL, NULL, 50.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 91, 2, 1),
(209, '2023-06-09 15:15:22', '2023-06-06', NULL, NULL, 60.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 92, 2, 1),
(210, '2023-06-09 15:23:57', '2023-06-07', NULL, NULL, 397.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 93, 2, 1),
(211, '2023-06-09 15:25:19', '2023-06-06', NULL, NULL, 19.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 0, 2, 1),
(212, '2023-06-09 17:38:43', '2023-06-09', NULL, NULL, 150.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 0, 2, 1),
(213, '2023-06-12 14:21:57', NULL, '2023-07-04', 355.00, NULL, '', 2, 4, 4, 2, 3, 10, 0, 3, 94, 2, 1),
(214, '2023-06-12 14:21:57', NULL, '2023-07-24', 355.00, NULL, '', 2, 4, 1, 2, 3, 10, 0, 3, 94, 2, 1),
(215, '2023-06-12 14:21:57', NULL, '2023-08-13', 355.00, NULL, '', 2, 4, 1, 2, 3, 10, 0, 3, 94, 2, 1),
(216, '2023-06-12 14:21:57', NULL, '2023-09-02', 355.00, NULL, '', 2, 4, 1, 2, 3, 10, 0, 3, 94, 2, 1),
(217, '2023-06-12 14:21:57', NULL, '2023-09-22', 355.00, NULL, '', 2, 4, 1, 2, 3, 10, 0, 3, 94, 2, 1),
(218, '2023-06-12 14:28:23', '2023-06-10', NULL, NULL, 660.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 95, 2, 1),
(219, '2023-06-12 14:29:58', '2023-07-03', '2023-06-16', 50.00, 50.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 14, 2, 1),
(220, '2023-06-12 14:32:50', '2023-06-12', NULL, NULL, 24.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 0, 2, 1),
(221, '2023-06-13 15:01:53', '2023-06-13', NULL, NULL, 70.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 96, 2, 1),
(222, '2023-06-13 15:03:32', '2023-06-13', NULL, NULL, 260.00, '', 2, 1, 3, 2, 5, 22, 0, 2, 22, 2, 1),
(223, '2023-06-13 16:50:02', '2023-06-13', NULL, NULL, 28.00, '', 1, 1, 3, 1, 1, 1, 0, 4, 12, 2, 1),
(224, '2023-06-13 16:51:30', '2023-06-19', '2023-06-13', 264.00, 264.00, '', 1, 4, 3, 1, 1, 1, 0, 3, 24, 2, 1),
(225, '2023-06-13 17:19:12', '2023-06-13', NULL, NULL, 45.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 30, 2, 1),
(226, '2023-06-13 17:55:59', '2023-06-26', '2023-06-16', 40.00, 40.00, '', 1, 1, 3, 1, 1, 3, 0, 2, 98, 2, 1),
(227, '2023-06-14 16:08:59', '2023-06-14', NULL, NULL, 100.00, '', 1, 4, 3, 1, 1, 1, 0, 3, 38, 2, 1),
(228, '2023-06-15 11:51:43', '2023-06-30', '2023-06-17', 500.00, 500.00, 'Compras de sandálias', 2, 4, 3, 2, 3, 10, 0, 3, 22, 2, 1),
(229, '2023-06-15 16:00:05', '2023-06-15', NULL, NULL, 470.00, 'Havaianas', 1, 1, 3, 1, 1, 1, 0, 4, 99, 2, 1),
(230, '2023-06-19 16:11:54', '2023-06-26', '2023-06-23', 62.00, 62.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 100, 2, 1),
(231, '2023-06-19 16:14:28', '2023-06-17', NULL, NULL, 89.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 0, 2, 1),
(232, '2023-06-19 16:17:14', '2023-06-15', NULL, NULL, 562.00, '', 1, 1, 3, 1, 1, 1, 0, 4, 101, 2, 1),
(233, '2023-06-19 16:20:45', '2023-06-15', NULL, NULL, 123.00, '', 1, 1, 3, 1, 1, 1, 0, 4, 0, 2, 1),
(234, '2023-06-19 16:33:01', '2023-06-17', NULL, NULL, 1760.00, '', 2, 1, 3, 2, 3, 10, 0, 4, 22, 2, 1),
(235, '2023-06-19 17:58:23', '2023-06-16', NULL, NULL, 878.00, '', 1, 1, 3, 1, 1, 3, 0, 3, 70, 2, 1),
(236, '2023-06-19 17:59:34', '2023-06-16', NULL, NULL, 112.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 70, 2, 1),
(237, '2023-06-19 18:03:41', '2023-06-16', NULL, NULL, 62.00, '', 2, 1, 3, 2, 6, 23, 0, 3, 1, 2, 1),
(238, '2023-06-22 16:26:31', '2023-06-22', NULL, NULL, 92.40, '', 1, 4, 3, 1, 1, 1, 0, 3, 103, 2, 1),
(239, '2023-06-22 16:30:32', '2023-06-27', '2023-06-26', 50.00, 50.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 103, 2, 1),
(240, '2023-06-22 16:37:20', '2023-06-21', NULL, NULL, 100.00, '', 1, 4, 3, 1, 1, 1, 0, 3, 104, 2, 1),
(241, '2023-06-22 16:38:19', '2023-06-21', NULL, NULL, 20.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 104, 2, 1),
(242, '2023-06-22 16:39:33', '2023-07-03', '2023-06-28', 83.00, 83.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 104, 2, 1),
(243, '2023-06-22 16:45:31', NULL, '2023-06-28', 27.00, NULL, '', 1, 4, 4, 1, 1, 3, 0, 3, 105, 2, 1),
(244, '2023-06-22 16:53:22', '2023-06-21', NULL, NULL, 60.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 98, 2, 1),
(245, '2023-06-27 14:53:07', '2023-06-27', NULL, NULL, 90.00, '', 1, 1, 3, 1, 1, 1, 0, 2, 106, 2, 1),
(246, '2023-06-27 14:55:24', '2023-06-23', NULL, NULL, 740.00, 'Colas', 1, 1, 3, 1, 1, 1, 0, 2, 70, 2, 1),
(247, '2023-06-27 17:17:34', '2023-06-27', NULL, NULL, 180.00, '', 1, 1, 3, 1, 1, 1, 0, 4, 84, 2, 1),
(248, '2023-06-29 09:42:32', '2023-06-30', '2023-06-30', 486.00, 486.00, '', 2, 4, 3, 2, 3, 10, 0, 4, 22, 2, 1),
(249, '2023-07-03 12:37:50', '2023-07-28', NULL, NULL, 100.00, '', 2, 4, 3, 2, 6, 23, 0, 3, 1, 2, 1),
(250, '2023-07-03 13:51:45', '2023-06-29', NULL, NULL, 130.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 105, 2, 1),
(251, '2023-07-03 13:54:38', '2023-06-29', NULL, NULL, 200.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 85, 2, 1),
(254, '2023-07-03 14:16:51', '2023-06-30', NULL, NULL, 138.50, '', 2, 1, 3, 2, 4, 15, 0, 3, 1, 2, 1),
(255, '2023-07-05 17:26:27', NULL, '2023-07-14', 190.00, NULL, '', 1, 1, 4, 1, 1, 1, 0, 2, 108, 2, 1),
(256, '2023-07-05 17:29:22', '2023-07-05', NULL, NULL, 200.00, '', 1, 1, 3, 1, 1, 1, 0, 4, 109, 2, 1),
(257, '2023-07-07 13:04:39', '2023-07-07', '2023-07-07', 268.00, 268.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 110, 2, 1),
(258, '2023-07-07 13:04:39', NULL, '2023-07-22', 268.00, NULL, '', 1, 4, 2, 1, 1, 3, 0, 3, 110, 2, 1),
(259, '2023-07-07 15:20:19', '2023-07-07', NULL, NULL, 333.00, '', 1, 4, 3, 1, 1, 3, 0, 3, 111, 2, 1),
(260, '2023-07-07 15:20:19', NULL, '2023-07-25', 333.00, NULL, '', 1, 4, 2, 1, 1, 3, 0, 3, 111, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_FUNCIONALIDADE`
--

CREATE TABLE `TB_FUNCIONALIDADE` (
  `co_funcionalidade` int(11) NOT NULL,
  `no_funcionalidade` varchar(150) CHARACTER SET latin1 NOT NULL,
  `ds_action` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `st_status` varchar(1) CHARACTER SET latin1 DEFAULT 'A' COMMENT '''A - Ativo / I - Inativo''',
  `st_menu` varchar(1) CHARACTER SET latin1 DEFAULT 'S' COMMENT 'S - Sim / N - Não (Se apresenta no menu)',
  `co_controller` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_FUNCIONALIDADE`
--

INSERT INTO `TB_FUNCIONALIDADE` (`co_funcionalidade`, `no_funcionalidade`, `ds_action`, `st_status`, `st_menu`, `co_controller`) VALUES
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
(36, 'Comparador', 'Comparador', 'A', 'S', 10),
(37, 'Listar Plano', 'ListarPlano', 'A', 'S', 11),
(38, 'Cadastro Plano', 'CadastroPlano', 'A', 'S', 11),
(39, 'Dados Complementares Assinante', 'DadosComplementaresAssinante', 'A', 'S', 12),
(40, 'Listar Assinante', 'ListarAssinante', 'A', 'S', 12),
(41, 'Cadastro Assinante', 'CadastroAssinante', 'A', 'N', 12),
(42, 'Meu Plano Assinante', 'MeuPlanoAssinante', 'A', 'S', 12),
(43, 'Renova Plano Assinante', 'RenovaPlanoAssinante', 'A', 'S', 12),
(44, 'Detalhar Assinatura Assinante', 'DetalharAssinaturaAssinante', 'A', 'N', 12),
(45, 'Notificação PagSeguro', 'NotificacaoPagSeguro', 'A', 'S', 12),
(46, 'ChatGPT', 'ChatGPT', 'A', 'S', 13);

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_HISTORIA`
--

CREATE TABLE `TB_HISTORIA` (
  `co_historia` int(11) NOT NULL,
  `ds_titulo` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_observacao` text COLLATE utf8_unicode_ci,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_atualizado` datetime DEFAULT NULL,
  `st_situacao` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'N' COMMENT 'N - Não iniciada / I - Iniciada / C - Concluida',
  `co_sessao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_HISTORIA`
--

INSERT INTO `TB_HISTORIA` (`co_historia`, `ds_titulo`, `ds_observacao`, `dt_cadastro`, `dt_atualizado`, `st_situacao`, `co_sessao`) VALUES
(1, 'Gráfico Comparação receitas/despesas', 'Gráfico Comparação receitas/despesas (Toda estrutura de categoria FC, período Meses)', '2022-05-30 12:37:06', '2023-05-19 12:58:44', 'N', 8),
(2, 'Gráfico Indicadores financeiros', 'Gráfico Indicadores financeiros (Todos indicadores múltipla escolha) \"Período por meses\"', '2022-05-30 12:37:38', '2022-05-30 12:37:38', 'N', 8),
(3, 'Gráfico Previsão de entradas, saídas e saldo', 'Gráfico Previsão de entradas, saídas e saldo a partir de hoje e atrasados', '2022-05-30 12:38:00', '2023-05-19 12:58:59', 'I', 8),
(4, 'Saldos disponíveis', 'Saldos disponíveis das Contas (Data) \"Data Futuras considera os Pagamentos e recebimentos futuros\"', '2022-05-30 12:38:23', '2023-05-19 12:59:18', 'I', 8),
(5, 'Pagamentos e recebimentos', 'Painel Pagamentos e recebimentos (Dia, da semana, do mês, do ano), coluna de atrasados e total', '2022-05-30 12:38:43', '2023-05-19 12:59:31', 'I', 8),
(6, 'Meta de recebimento mensal', 'Painel de PE Econômico (Com Lucro) com campo para Simulação do percentual de lucro desejado', '2022-05-30 12:39:09', '2023-05-19 12:59:50', 'N', 8),
(7, 'Ponto de equilíbrio operacional', 'Informação do PE', '2022-05-30 12:39:38', '2023-05-21 15:49:13', 'N', 8),
(8, 'Cron Atualização de Status Pagamento', 'Cron Atualização de Status Pagamento', '2022-05-30 12:40:34', '2022-06-29 17:53:51', 'C', 7),
(9, 'Multi Seleção dar Baixa Pagamento / Recebimento Botão', 'Multi Seleção dar Baixa Pagamento / Recebimento', '2022-05-30 12:41:06', '2022-05-30 12:41:06', 'C', 7),
(10, 'Histórico de Transferências', 'Histórico de Transferências', '2022-05-30 12:41:33', '2022-05-30 12:41:33', 'C', 7),
(11, 'Validação dos dados dos cadastros', 'Validar tipo de dados, dados obrigatórios, exclusão (Status inativar) , saldos', '2022-05-30 12:42:04', '2022-07-05 10:20:00', 'C', 7),
(12, 'Transferência entre contas', 'Transferência entre contas', '2022-05-30 12:42:25', '2022-05-30 12:42:25', 'C', 7),
(13, 'Histórico das Contas Transferências Modal cadastro de contas', 'Histórico das Contas Modal cadastro de contas\n2 VISÕES: Time Line e Gráficos', '2022-05-30 12:42:57', '2022-05-30 12:42:57', 'C', 7),
(14, 'Edição e exclusão Lançamento', 'Edição e exclusão Lançamento', '2022-05-30 12:43:25', '2022-05-30 12:43:25', 'C', 7),
(15, 'Listagem de Lançamentos', 'Listagem de Lançamentos', '2022-05-30 12:43:51', '2022-05-30 12:43:51', 'C', 7),
(16, 'Painel de Filtros', 'Painel de Filtros (Períodos, Data vencimento, data realizado, categoria FC, conta, centro de custo, valor a pagar, valor pago, representação, meio de pagamento)', '2022-05-30 12:44:33', '2022-05-30 12:44:33', 'C', 7),
(17, 'Modal Glossário', 'Modal Glossário (Por palavra)', '2022-05-30 12:45:03', '2022-05-30 12:45:03', 'N', 7),
(18, 'Apresentação de Vídeos Tutoriais MODAL', 'Apresentação de Vídeos Tutoriais MODAL', '2022-05-30 12:45:44', '2022-05-30 12:45:44', 'N', 7),
(19, 'Manter centro de custo', 'Manter centro de custo', '2022-05-30 12:46:16', '2022-05-30 12:46:16', 'C', 7),
(20, 'Manter Representações', 'Manter Representações (Clientes e fornecedores)', '2022-05-30 12:46:48', '2022-05-30 12:46:48', 'C', 7),
(21, 'Manter conta bancária', 'Manter conta bancária', '2022-05-30 12:47:19', '2022-05-30 12:51:56', 'C', 7),
(22, 'Visualizar e editar Estrutura de categorias FC', 'Visualizar e editar Estrutura de categorias FC', '2022-05-30 12:47:50', '2022-05-30 12:52:29', 'C', 7),
(23, 'Manter Saída', 'Manter de Lançamentos de Saída', '2022-05-30 12:48:31', '2022-05-30 12:48:31', 'C', 7),
(24, 'Manter Entrada', 'Manter os lançamentos de entrada', '2022-05-30 12:49:00', '2022-05-30 12:53:14', 'C', 7),
(25, 'Manter Categoria FC', 'Manter Categoria FC', '2022-05-30 12:49:26', '2022-05-30 12:49:26', 'C', 7),
(26, 'Gravação e edição dos Vídeos Tutoriais', 'Gravação e edição dos Vídeos Tutoriais', '2022-05-30 14:12:22', '2022-05-30 14:12:22', 'N', 6),
(27, 'Listar Fluxo de Caixa', 'Listar Fluxo de Caixa \nCada Linha:\nCategorias PAI e Indicadores Financeiros\nCategorias Filhas\nMatriz:\nMês / Total (Período por ano)\nesperado, realizado, analise Total AT, analise Comparativa AC', '2022-05-30 14:13:27', '2022-05-30 14:13:27', 'C', 5),
(28, 'Painel de Filtros', 'Painel de Filtros (Realizado, Esperado, ano, centro de custo, Categorias Pais ou Filhas)', '2022-05-30 14:13:50', '2022-05-30 14:13:50', 'C', 5),
(29, 'Listar dados Comparador', 'Listar dados Comparador', '2022-05-30 14:14:28', '2022-05-30 14:14:28', 'C', 4),
(30, 'Painel de Filtros', 'Período 1 (Mês/Ano a Mês/Ano) com Período 2 (Mês/Ano a Mês/Ano) e centro de custo e Categorias Pais ou Filhas', '2022-05-30 14:14:49', '2022-05-30 14:14:49', 'C', 4),
(31, 'Tela de análises e sugestões dos dados', 'Guru, génio das finanças, oráculo, Personal FInanceiro (Maria Clara)\r\nDar dicas de como melhoraar o Fluxo de caixa os pontos positivos e negativos, analise mais elaborada.,', '2022-05-30 14:15:36', '2023-05-19 12:51:41', 'N', 3),
(32, 'Acelerador De Preços de Serviços', 'Acelerador De Preços de Serviços\ndividi história', '2022-05-30 14:17:06', '2022-05-30 14:17:06', 'N', 2),
(33, 'Acelerador De Preços de Produtos', 'Acelerador De Preços de Produtos\nDividi história', '2022-05-30 14:17:41', '2022-05-30 14:17:41', 'N', 2),
(34, 'Acelerador De Ponto de Equilíbrio', 'Acelerador De Ponto de Equilíbrio', '2022-05-30 14:18:01', '2022-05-30 14:18:01', 'N', 2),
(35, 'Acelerador De Lucros', 'Acelerador De Lucros', '2022-05-30 14:18:20', '2022-05-30 14:18:20', 'N', 2),
(36, 'Acelerador De Pro-labore', 'Acelerador De Pro-labore', '2022-05-30 14:18:37', '2022-05-30 14:18:37', 'N', 2),
(37, 'Acelerador De Custo', 'Acelerador De Custo', '2022-05-30 14:19:05', '2022-05-30 14:19:05', 'N', 2),
(38, 'Cadastro Categorias FC na mesma modal de edição', 'Cadastro Categorias FC na mesma modal de edição', '2022-05-30 14:20:11', '2022-05-30 14:20:11', 'N', 1),
(39, 'Load edição e exclusão categorias FC', 'Load edição e exclusão categorias FC', '2022-05-30 14:20:38', '2022-05-30 14:20:38', 'N', 1),
(40, 'Unificação dos Métodos Entrada e Saída FC', 'Unificação dos Métodos Entrada e Saída FC', '2022-05-30 14:20:59', '2022-05-30 14:20:59', 'N', 1),
(41, 'Histórico Lançamento', 'Histórico Lançamento', '2022-05-30 14:21:21', '2022-05-30 14:21:21', 'N', 1),
(42, 'Lançamentos Esconder/Apresentar Colunas', 'Lançamentos Esconder/Apresentar Colunas', '2022-05-30 14:21:46', '2022-05-30 14:21:46', 'N', 1),
(43, 'Histórico Conta Bancária', 'Histórico Conta Bancária (Entradas / Saídas / Transferências)', '2022-05-30 14:22:13', '2022-08-29 17:41:57', 'C', 1),
(44, 'Melhorias no filtro de pesquisa', 'Campo de intervalo de valor, múltiplas categorias, múltiplas contas, múltiplos centro de custos , múltiplas representações e múltiplas formas de pagamento', '2022-05-30 14:22:37', '2023-05-19 12:44:16', 'N', 1),
(45, 'Baixa nos lançamentos com Data selecionada', 'Baixa nos lançamentos com Data selecionada ou data esperada', '2022-05-30 14:23:04', '2022-05-30 14:23:04', 'N', 1),
(46, 'Criar Botão de Estorno de Pagamento', 'Criar Botão de Estorno de Pagamento para voltar a não pago', '2022-05-30 14:23:50', '2022-05-30 14:23:50', 'N', 1),
(47, 'Criar opção Lançamentos Repetidos e Parcelados', 'Criar opção Lançamentos Repetidos e Parcelados', '2022-05-30 14:24:18', '2022-06-24 09:20:51', 'C', 1),
(48, 'Impressão Personalizada Lançamentos', 'Impressão Personalizada Lançamentos (PDF/ EXCEL) escolher campos', '2022-05-30 14:24:43', '2022-05-30 14:24:43', 'N', 1),
(49, 'Impressão Personalizada Fluxo de Caixa', 'Impressão Personalizada FC(PDF/ EXCEL) escolher campos', '2022-05-30 14:25:04', '2022-05-30 14:25:04', 'N', 1),
(50, 'Impressão Personalizada Comparador', 'Impressão Personalizada Comparador de Períodos (PDF/ EXCEL) escolher campos', '2022-05-30 14:25:31', '2022-05-30 14:25:31', 'N', 1),
(51, 'Criar funcionalidades anti crise', 'Vamos lá', '2022-06-18 07:26:11', '2022-06-18 07:26:11', 'N', 9),
(52, 'Lançamentos repetidos e parcelados', 'Lançamentos repetidos e parcelados', '2022-06-19 23:11:27', '2022-06-19 23:11:27', 'C', 7),
(53, 'Pesquisa Avançada dos Assinantes', 'Pesquisa Avançada dos Assinantes por razão social, nome fantasia, Responsável, cidade e UF, email, valor assinatura atual.', '2022-06-21 10:49:11', '2022-06-21 10:49:11', 'N', 13),
(54, 'Criar mensagem de expiração e bloqueio do sistema', 'Criar mensagem de expiração e bloqueio do sistema', '2022-06-21 10:49:32', '2022-06-21 10:49:32', 'N', 13),
(55, 'Mudar loguin', 'Mudar loguin para logar com email tb, recuperar senha e notificar de mudar senha.', '2022-06-21 10:50:26', '2022-06-21 10:50:26', 'N', 13),
(56, 'Configuração inicial do projeto', 'Configuração inicial do projeto', '2022-06-21 10:50:47', '2022-06-21 10:50:47', 'N', 13),
(57, 'Manter Assinante', 'Manter assinante do sistema e com data de expiração do sistema para o assinante, criar contato, criar pessoa, envio de email de confirmação com senha gerada.', '2022-06-21 10:51:08', '2022-06-21 10:51:08', 'N', 13),
(58, 'Trocar Senha', 'Confirmar senha antiga e nova e se esqueceu a senha encaminhar no email', '2022-06-21 10:53:17', '2022-06-21 10:53:17', 'N', 11),
(59, 'Manter Usuário', 'Manter Usuário', '2022-06-21 10:53:40', '2022-06-21 10:53:40', 'N', 11),
(60, 'Dados complementares Perfil Master edição', 'Dados complementares Perfil Master edição', '2022-06-21 10:54:25', '2022-06-21 10:54:25', 'N', 12),
(61, 'Gestão de notificações', 'Gestão de notificações com as mensagens geradas do sistema de sucesso erro e avisos', '2022-06-21 11:05:59', '2022-06-21 11:05:59', 'N', 12),
(62, 'Manter Fotos do Estabelecimento', 'Manter Fotos do Estabelecimento para o Site', '2022-06-21 11:07:07', '2022-06-21 11:07:07', 'N', 12),
(63, 'Dados complementares básicos', 'Manter dados: (Endereço, telefone, CNPJ, fantasia, razão e outros)', '2022-06-21 11:07:31', '2022-06-21 11:07:31', 'N', 12),
(64, 'Abrir Boleto e redirecionar para banco', 'Abrir Boleto e redirecionar para banco', '2022-06-21 11:09:13', '2022-06-21 11:09:13', 'N', 10),
(65, 'Notificação do PagSeguro', 'Notificação do PagSeguro atualização automática mais funcionalidade de teste', '2022-06-21 11:09:33', '2022-06-21 11:09:33', 'N', 10),
(66, 'Manter Planos do Assinante Sistema Expirado', 'Manter Planos do Assinante Sistema Expirado', '2022-06-21 11:13:46', '2022-06-21 11:13:46', 'N', 10),
(67, 'Detalhes da transação da assinatura', 'Modal Detalhes da transação da assinatura', '2022-06-21 11:14:02', '2022-06-21 11:14:02', 'N', 10),
(68, 'Estorno / Cancelamento do assinatura', 'Estorno / Cancelamento do assinatura', '2022-06-21 11:14:26', '2022-06-21 11:14:26', 'N', 10),
(69, 'Renovar Assinatura', 'Renovar Assinatura Boleto / Cartão e transferência', '2022-06-21 11:15:47', '2022-06-21 11:15:47', 'N', 10),
(70, 'Listar pagamentos', 'Listar pagamentos Assinante / Perfil Master', '2022-06-21 11:19:30', '2022-06-21 11:19:30', 'N', 10),
(71, 'Cadastro pelo site para o assinante', 'verificar o cadastro pelo site para manter um plano mesmo que que por experiência', '2022-06-21 11:23:16', '2022-06-21 11:23:16', 'N', 14),
(72, 'Página de captura de lead', 'Página de captura de lead', '2022-06-21 11:23:36', '2022-06-21 11:23:36', 'N', 14),
(73, 'Vídeos para a Página de captura de cliente', 'Vídeos para a Página de captura de cliente', '2022-06-21 11:25:58', '2022-06-21 11:25:58', 'N', 14),
(74, 'Página de captura de cliente', 'Página de captura de cliente', '2022-06-21 11:26:19', '2022-06-21 11:26:19', 'N', 14),
(75, 'Vídeos para lançamento de vendas', 'produção de Vídeos para lançamento de vendas', '2022-06-21 11:28:13', '2022-06-21 11:28:13', 'N', 15),
(76, 'Lançamento das Vendas', 'de 1 a 7 dias de vendas com página aquecida', '2022-06-21 11:28:37', '2022-06-21 11:28:37', 'N', 15),
(77, 'Direcionar para o lançamento', 'Após Lançamento Direcionar para o lançamento o tráfego do PL', '2022-06-21 11:29:58', '2022-06-21 11:29:58', 'N', 16),
(78, 'Material do Pré Lançamento', 'Produção e Disponibilização do material para lista de lead', '2022-06-21 11:30:31', '2022-06-21 11:30:31', 'N', 16),
(79, 'Criar conteúdos e Entregas', 'Criar conteúdos para entrega e ir formulando a lista de lead', '2022-06-21 11:31:26', '2022-06-21 11:31:26', 'N', 17),
(80, 'Criação da Lista de Lead', 'Criação da Lista de Lead já trabalhadas nas redes sociais e mais..', '2022-06-21 11:32:09', '2022-06-21 11:32:09', 'N', 17),
(81, 'Gerar Entidades', 'Gerar Entidades Verificar a geração das entidades', '2022-06-21 22:31:02', '2022-06-21 22:31:02', 'N', 18),
(82, 'Realizar Backup (Sepadados por listas)', 'Criar funcionalidade para realizar o backup do banco do projeto, com a opção de enviar o arquivo sql por email.\n\nCriar lista de tabelas para backup:\n- Tabelas Auditorias\n- Tabelas essenciais ( acesso, visitas, trafego e outras)\n- Tabelas Sistema', '2022-06-21 22:33:33', '2022-06-21 22:33:33', 'N', 18),
(83, 'Separação do banco de Auditoria', 'Separação do banco de Auditoria em outro banco', '2022-06-21 22:35:58', '2022-06-21 22:35:58', 'N', 18),
(84, 'Limpar dados acesso', 'Limpar dados acesso', '2022-06-21 22:36:55', '2022-06-21 22:36:55', 'N', 18),
(85, 'Limpar Dados Auditoria', 'EM outro banco Limpar Dados Auditoria com periodo e auditoria tabela e auditoria itens', '2022-06-21 22:37:53', '2022-06-21 22:37:53', 'N', 18),
(86, 'Limpar dados de das Visitas e trafego', 'Limpar dados de das Visitas e trafego páginas e tudo mais', '2022-06-21 22:38:39', '2022-06-21 22:38:39', 'N', 18),
(87, 'Padronizar os templetes das Views', 'Padronizar os templetes das Views', '2022-06-21 22:41:42', '2022-06-21 22:41:42', 'N', 19),
(88, 'Relacionamentos na Entidade', 'Passar os relacionamento de cada entidade para seu arquivo de ENTIDADE', '2022-06-21 22:43:16', '2022-06-21 22:43:16', 'N', 19),
(89, 'Unificar as Classe GRID', 'Unificar as Classe GRID', '2022-06-21 22:50:29', '2022-06-21 22:50:29', 'N', 19),
(90, 'Inicializar o Banco de dados', 'Inicializar o Banco de dados com os dados iniciais necessários padrões\n\ntabelas do banco e inserts iniciais (Usuário padrão perfil maste e etc..)', '2022-06-21 22:51:23', '2022-06-21 22:51:23', 'N', 19),
(91, 'Visualização da Auditoria', 'Melhorias na funcionalidade de auditoria onde tem que separar os itens da auditoria quando usa o metodo deletar quando e unificar a auditoria item quando são vários inserts na mesma tabela e vincular as chaves estrangeiras para aparecer a descrição da chave\n\nEx.: (Código usuário/ nome do usuário \'Leo Bessa\')\n\n(Código Empresa/ nome da empresa \'Minha empresa\')', '2022-06-21 22:53:15', '2022-06-21 22:53:15', 'N', 19),
(92, 'Exclusão de arquivos do projeto', 'Exclusão de arquivos desnecessários do projeto', '2022-06-21 22:54:22', '2022-06-21 22:54:22', 'N', 19),
(93, 'Validação dos includes', 'Validação dos includes o que é necessário e se é preciso pro arquivo', '2022-06-21 22:55:29', '2022-06-21 22:55:29', 'N', 19),
(94, 'Alterar Info', 'Alterar Info dos campo para Tooltip', '2022-06-21 22:56:33', '2022-06-21 22:56:33', 'N', 19),
(95, 'Campo Tags', 'Criar opção para campos Tags', '2022-06-21 22:57:27', '2022-06-21 22:57:27', 'N', 19),
(96, 'Versionamento do sistema', 'Controle da versão do sistema por commit', '2022-06-21 22:58:44', '2022-06-21 22:58:44', 'N', 19),
(97, 'Manter Usuário Assinante', 'Manter Usuário Assinante', '2022-06-21 23:00:28', '2022-06-21 23:00:28', 'N', 19),
(98, 'Manter Itens', 'Manter Itens com prioridade', '2022-06-24 09:24:14', '2022-06-24 09:24:55', 'N', 20),
(99, 'Manter Pagamentos', 'Manter Pagamentos com prioridades', '2022-06-24 09:24:38', '2022-06-24 09:24:38', 'N', 21),
(100, 'Criar vídeos da consultoria', 'Criar vídeos da consultoria', '2022-06-24 09:27:08', '2022-06-24 09:27:08', 'N', 22),
(101, 'Criar vídeos cursos rápidos', 'Criar vídeos cursos rápidos', '2022-06-24 09:27:36', '2022-06-24 09:27:36', 'N', 23),
(102, 'Criar vídeos cursos avançados', 'Criar vídeos cursos avançados', '2022-06-24 09:28:01', '2022-06-24 09:28:01', 'N', 24),
(103, 'Página de captura de cliente', 'Página de captura de cliente', '2022-06-24 09:30:12', '2022-06-24 09:30:12', 'N', 25),
(104, 'Vídeos para a Página de captura de cliente', 'Vídeos para a Página de captura de cliente', '2022-06-24 09:30:36', '2022-06-24 09:30:36', 'N', 25),
(105, 'Página de captura de lead', 'Página de captura de lead', '2022-06-24 09:31:02', '2022-06-24 09:31:02', 'N', 25),
(106, 'Cadastro pelo site para o assinante', '', '2022-06-24 09:31:28', '2022-06-24 09:31:28', 'N', 25),
(107, 'Metodo pesquisa sem dependencias', 'Metodo pesquisa sem dependencias e sem orientação a objeto pesquisa direto e mais rápida', '2022-06-28 16:43:56', '2022-06-28 16:43:56', 'N', 19),
(108, 'Manter Planejamento mensal de cada categoria neta', 'Fazer o planejamento mensal de cada categoria neta', '2022-06-28 16:49:47', '2022-06-28 16:50:04', 'N', 26),
(109, 'Atualização via AJAX', 'todas asa laterações serão feitas via AJAX de modo que não precise recarregar a página de forma alguma', '2022-07-05 10:21:05', '2022-07-05 10:21:05', 'N', 1),
(110, 'Criar Funcionalidade de acerto de saldo', 'Criar Funcionalidade de acerto de saldo', '2022-07-05 10:22:28', '2022-07-14 10:27:55', 'N', 7),
(111, 'Criar linha na anlise de acerto de saldo', 'Criar linha na anlise de acerto de saldo', '2022-07-05 10:23:34', '2022-07-05 10:23:34', 'N', 3),
(112, 'Criar linha na anlise de ponto de equilíbrio', 'Criar linha na anlise de ponto de equilíbrio onde (70%) da renda estara comprometida para despesas e o restante investimentos e reserva financeira (Flexibilidade orçamentária)', '2022-07-05 10:24:55', '2022-07-05 10:24:55', 'N', 3),
(113, 'Reformular painel de filtros', 'Campo de intervalo de valor, múltiplas categorias, múltiplas contas, múltiplos centro de custos , múltiplas representações e múltiplas formas de pagamento', '2022-07-05 12:00:33', '2022-08-04 18:20:31', 'I', 7),
(114, 'Gráfico 5 maiores despesas cat Filhas', 'Gráfico 5 maiores despesas cat Filhas', '2022-07-05 12:05:29', '2023-05-19 13:00:37', 'I', 27),
(115, 'Gráfico 5 maiores despesas cat Netas', 'Gráfico 5 maiores despesas cat Netas', '2022-07-05 12:05:42', '2023-05-19 13:00:45', 'I', 27),
(116, 'Gráfico geral cat filhas %', 'Gráfico geral cat filhas %', '2022-07-05 12:07:01', '2023-05-19 13:00:56', 'I', 27),
(117, 'Criar linha do tempo da Reserva financeira', 'Criar linha do tempo da Reserva financeira', '2022-07-05 12:15:17', '2023-05-21 15:42:08', 'N', 3),
(118, 'Manter rendimentos', 'Manter Rendimentos', '2022-07-05 12:16:10', '2023-05-21 15:46:36', 'N', 7),
(119, 'Botão de configuração do Lançamento', 'Botão de configuração do Lançamento, abrir modal com os dados do lancamento e com as opções para o mesmo como: edição exclusão, Confirmar pagamento .', '2023-05-19 12:43:11', '2023-05-19 12:43:11', 'N', 1),
(120, 'Edição do Lançamento com contas diferentes', 'Edição do Lançamento com contas diferentes corrigir o saldo anterior criado', '2023-05-19 12:47:01', '2023-05-19 12:47:01', 'N', 5),
(121, 'Carregar dados dos clientes no FC de Entrada', 'Carregar dados dos clientes no FC de Entrada', '2023-05-19 13:02:34', '2023-05-19 13:02:34', 'N', 7),
(122, 'Carregar dados dos Fornecedores no FC de Saída', 'Carregar dados dos Fornecedores no FC de Saída', '2023-05-19 13:02:53', '2023-05-19 13:02:53', 'N', 7),
(123, 'Filtro de Periodo mudar para select', 'Filtro de Periodo mudar para select', '2023-05-21 15:44:12', '2023-05-21 15:44:12', 'N', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_HISTORICO_HISTORIA`
--

CREATE TABLE `TB_HISTORICO_HISTORIA` (
  `co_historico_historia` int(11) NOT NULL,
  `nu_esforco` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_esforco_restante` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `co_historia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_HISTORICO_HISTORIA`
--

INSERT INTO `TB_HISTORICO_HISTORIA` (`co_historico_historia`, `nu_esforco`, `nu_esforco_restante`, `dt_cadastro`, `co_historia`) VALUES
(1, '8', '8', '2022-05-30 12:37:06', 1),
(2, '8', '8', '2022-05-30 12:37:38', 2),
(3, '8', '8', '2022-05-30 12:38:00', 3),
(4, '8', '8', '2022-05-30 12:38:23', 4),
(5, '13', '13', '2022-05-30 12:38:43', 5),
(6, '5', '5', '2022-05-30 12:39:09', 6),
(7, '3', '3', '2022-05-30 12:39:38', 7),
(8, '5', '5', '2022-05-30 12:40:34', 8),
(9, '13', '0', '2022-05-30 12:41:06', 9),
(10, '5', '0', '2022-05-30 12:41:33', 10),
(11, '20', '20', '2022-05-30 12:42:04', 11),
(12, '8', '0', '2022-05-30 12:42:25', 12),
(13, '8', '0', '2022-05-30 12:42:57', 13),
(14, '5', '0', '2022-05-30 12:43:25', 14),
(15, '8', '0', '2022-05-30 12:43:51', 15),
(16, '20', '0', '2022-05-30 12:44:33', 16),
(17, '13', '13', '2022-05-30 12:45:03', 17),
(18, '8', '8', '2022-05-30 12:45:44', 18),
(19, '5', '0', '2022-05-30 12:46:16', 19),
(20, '5', '0', '2022-05-30 12:46:48', 20),
(21, '5', '0', '2022-05-30 12:47:19', 21),
(22, '13', '13', '2022-05-30 12:47:50', 22),
(23, '13', '0', '2022-05-30 12:48:31', 23),
(24, '13', '13', '2022-05-30 12:49:00', 24),
(25, '8', '0', '2022-05-30 12:49:26', 25),
(26, '8', '0', '2022-05-30 12:51:56', 21),
(27, '13', '0', '2022-05-30 12:52:29', 22),
(28, '13', '0', '2022-05-30 12:53:14', 24),
(29, '30', '30', '2022-05-30 14:12:22', 26),
(30, '40', '0', '2022-05-30 14:13:27', 27),
(31, '13', '0', '2022-05-30 14:13:50', 28),
(32, '20', '0', '2022-05-30 14:14:28', 29),
(33, '13', '0', '2022-05-30 14:14:49', 30),
(34, '30', '30', '2022-05-30 14:15:36', 31),
(35, '40', '40', '2022-05-30 14:17:06', 32),
(36, '30', '30', '2022-05-30 14:17:41', 33),
(37, '8', '8', '2022-05-30 14:18:01', 34),
(38, '20', '20', '2022-05-30 14:18:20', 35),
(39, '20', '20', '2022-05-30 14:18:37', 36),
(40, '13', '13', '2022-05-30 14:19:05', 37),
(41, '5', '5', '2022-05-30 14:20:11', 38),
(42, '3', '3', '2022-05-30 14:20:38', 39),
(43, '8', '8', '2022-05-30 14:20:59', 40),
(44, '13', '13', '2022-05-30 14:21:21', 41),
(45, '8', '8', '2022-05-30 14:21:46', 42),
(46, '8', '8', '2022-05-30 14:22:13', 43),
(47, '8', '8', '2022-05-30 14:22:37', 44),
(48, '5', '5', '2022-05-30 14:23:04', 45),
(49, '8', '8', '2022-05-30 14:23:50', 46),
(50, '8', '8', '2022-05-30 14:24:18', 47),
(51, '13', '13', '2022-05-30 14:24:43', 48),
(52, '13', '13', '2022-05-30 14:25:04', 49),
(53, '13', '13', '2022-05-30 14:25:31', 50),
(54, '40', '40', '2022-06-18 07:26:11', 51),
(55, '20', '0', '2022-06-19 23:11:27', 52),
(56, '20', '20', '2022-06-21 10:49:11', 53),
(57, '13', '13', '2022-06-21 10:49:32', 54),
(58, '8', '8', '2022-06-21 10:50:26', 55),
(59, '8', '8', '2022-06-21 10:50:47', 56),
(60, '30', '30', '2022-06-21 10:51:08', 57),
(61, '8', '8', '2022-06-21 10:53:17', 58),
(62, '40', '40', '2022-06-21 10:53:40', 59),
(63, '5', '5', '2022-06-21 10:54:25', 60),
(64, '20', '20', '2022-06-21 11:05:59', 61),
(65, '8', '8', '2022-06-21 11:07:07', 62),
(66, '20', '20', '2022-06-21 11:07:31', 63),
(67, '5', '5', '2022-06-21 11:09:13', 64),
(68, '20', '20', '2022-06-21 11:09:33', 65),
(69, '13', '13', '2022-06-21 11:13:46', 66),
(70, '8', '8', '2022-06-21 11:14:02', 67),
(71, '20', '20', '2022-06-21 11:14:26', 68),
(72, '40', '40', '2022-06-21 11:15:47', 69),
(73, '13', '13', '2022-06-21 11:19:30', 70),
(74, '8', '8', '2022-06-21 11:23:16', 71),
(75, '20', '20', '2022-06-21 11:23:36', 72),
(76, '30', '30', '2022-06-21 11:25:58', 73),
(77, '40', '40', '2022-06-21 11:26:19', 74),
(78, '30', '30', '2022-06-21 11:28:13', 75),
(79, '40', '40', '2022-06-21 11:28:37', 76),
(80, '13', '13', '2022-06-21 11:29:58', 77),
(81, '40', '40', '2022-06-21 11:30:31', 78),
(82, '40', '40', '2022-06-21 11:31:26', 79),
(83, '40', '40', '2022-06-21 11:32:09', 80),
(84, '8', '8', '2022-06-21 22:31:02', 81),
(85, '20', '20', '2022-06-21 22:33:33', 82),
(86, '5', '5', '2022-06-21 22:35:58', 83),
(87, '3', '3', '2022-06-21 22:36:55', 84),
(88, '5', '5', '2022-06-21 22:37:53', 85),
(89, '5', '5', '2022-06-21 22:38:39', 86),
(90, '13', '13', '2022-06-21 22:41:42', 87),
(91, '20', '20', '2022-06-21 22:43:16', 88),
(92, '3', '3', '2022-06-21 22:50:29', 89),
(93, '13', '13', '2022-06-21 22:51:23', 90),
(94, '20', '20', '2022-06-21 22:53:15', 91),
(95, '8', '8', '2022-06-21 22:54:22', 92),
(96, '8', '8', '2022-06-21 22:55:29', 93),
(97, '8', '8', '2022-06-21 22:56:33', 94),
(98, '5', '5', '2022-06-21 22:57:27', 95),
(99, '3', '3', '2022-06-21 22:58:44', 96),
(100, '13', '13', '2022-06-21 23:00:28', 97),
(101, '13', '0', '2022-06-24 09:20:51', 47),
(102, '8', '8', '2022-06-24 09:24:14', 98),
(103, '8', '8', '2022-06-24 09:24:38', 99),
(104, '8', '8', '2022-06-24 09:24:55', 98),
(105, '40', '40', '2022-06-24 09:27:08', 100),
(106, '40', '40', '2022-06-24 09:27:36', 101),
(107, '40', '40', '2022-06-24 09:28:01', 102),
(108, '40', '40', '2022-06-24 09:30:12', 103),
(109, '40', '40', '2022-06-24 09:30:36', 104),
(110, '20', '20', '2022-06-24 09:31:02', 105),
(111, '8', '8', '2022-06-24 09:31:28', 106),
(112, '20', '20', '2022-06-28 16:43:56', 107),
(113, '40', '40', '2022-06-28 16:49:47', 108),
(114, '40', '40', '2022-06-28 16:50:04', 108),
(115, '5', '0', '2022-06-29 17:53:51', 8),
(116, '20', '5', '2022-06-29 23:42:27', 11),
(117, '20', '0', '2022-07-05 10:20:00', 11),
(118, '40', '40', '2022-07-05 10:21:05', 109),
(119, '8', '8', '2022-07-05 10:22:28', 110),
(120, '5', '5', '2022-07-05 10:22:38', 110),
(121, '5', '5', '2022-07-05 10:23:34', 111),
(122, '8', '8', '2022-07-05 10:24:55', 112),
(123, '20', '20', '2022-07-05 12:00:33', 113),
(124, '3', '13', '2022-07-05 12:01:53', 7),
(125, '13', '13', '2022-07-05 12:02:02', 7),
(126, '13', '13', '2022-07-05 12:05:29', 114),
(127, '13', '13', '2022-07-05 12:05:42', 115),
(128, '5', '5', '2022-07-05 12:07:01', 116),
(129, '13', '13', '2022-07-05 12:12:27', 113),
(130, '1', '0', '2022-07-05 12:12:47', 44),
(131, '8', '8', '2022-07-05 12:15:17', 117),
(132, '20', '20', '2022-07-05 12:16:10', 118),
(133, '8', '8', '2022-07-14 10:27:55', 110),
(134, '13', '8', '2022-08-04 18:20:31', 113),
(135, '5', '0', '2022-08-12 13:10:12', 116),
(136, '13', '0', '2022-08-12 13:10:21', 115),
(137, '13', '0', '2022-08-12 13:10:28', 114),
(138, '8', '0', '2022-08-25 18:03:15', 4),
(139, '13', '0', '2022-08-26 21:55:48', 5),
(140, '1', '0', '2022-08-26 21:57:03', 1),
(141, '1', '0', '2022-08-26 21:58:15', 6),
(142, '8', '0', '2022-08-29 15:34:45', 3),
(143, '8', '0', '2022-08-29 17:41:57', 43),
(144, '5', '5', '2023-05-19 12:43:11', 119),
(145, '20', '20', '2023-05-19 12:44:16', 44),
(146, '8', '8', '2023-05-19 12:47:01', 120),
(147, '30', '30', '2023-05-19 12:51:41', 31),
(148, '8', '8', '2023-05-19 12:54:20', 117),
(149, '8', '8', '2023-05-19 12:58:44', 1),
(150, '8', '5', '2023-05-19 12:58:59', 3),
(151, '8', '3', '2023-05-19 12:59:18', 4),
(152, '13', '5', '2023-05-19 12:59:31', 5),
(153, '13', '13', '2023-05-19 12:59:50', 6),
(154, '13', '13', '2023-05-19 13:00:21', 7),
(155, '13', '5', '2023-05-19 13:00:37', 114),
(156, '13', '5', '2023-05-19 13:00:45', 115),
(157, '5', '3', '2023-05-19 13:00:56', 116),
(158, '5', '5', '2023-05-19 13:02:34', 121),
(159, '5', '5', '2023-05-19 13:02:53', 122),
(160, '8', '8', '2023-05-21 15:42:08', 117),
(161, '5', '5', '2023-05-21 15:44:12', 123),
(162, '20', '20', '2023-05-21 15:46:36', 118),
(163, '13', '13', '2023-05-21 15:49:13', 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_HISTORICO_PAG_ASSINATURA`
--

CREATE TABLE `TB_HISTORICO_PAG_ASSINATURA` (
  `co_historico_pag_assinatura` int(11) NOT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_acao` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_usuario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_pagamento` int(1) DEFAULT NULL COMMENT '0 - Pendente / 1 - Aguardando pagamento / 2 - Em análise / 3 - Pago / 4 - Disponível / 5 - Em disputa / 6 - Devolvida / 7 - Cancelada\n',
  `co_plano_assinante_assinatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_HISTORICO_SUPORTE`
--

CREATE TABLE `TB_HISTORICO_SUPORTE` (
  `co_historico_suporte` int(11) NOT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_mensagem` text COLLATE utf8_unicode_ci,
  `st_lido` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'N' COMMENT 'S - Sim / N - Não',
  `co_suporte` int(11) NOT NULL,
  `co_usuario` int(10) NOT NULL,
  `co_imagem` int(10) UNSIGNED NOT NULL COMMENT 'Chave do Anexo.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_HIST_SALDO_CB`
--

CREATE TABLE `TB_HIST_SALDO_CB` (
  `co_hist_saldo_cb` int(11) NOT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `tp_fluxo` int(1) DEFAULT NULL COMMENT '1 - Entrada / 2 - Saída',
  `nu_valor_pago` float(12,2) DEFAULT NULL,
  `nu_saldo` float(12,2) DEFAULT NULL,
  `ds_observacao` text COLLATE utf8_unicode_ci,
  `co_conta_bancaria` int(11) NOT NULL,
  `co_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_HIST_SALDO_CB`
--

INSERT INTO `TB_HIST_SALDO_CB` (`co_hist_saldo_cb`, `dt_cadastro`, `tp_fluxo`, `nu_valor_pago`, `nu_saldo`, `ds_observacao`, `co_conta_bancaria`, `co_usuario`) VALUES
(1, '2023-02-06 12:26:41', NULL, NULL, 0.01, '', 2, 2),
(2, '2023-02-06 12:50:59', NULL, NULL, 0.01, '', 3, 2),
(3, '2023-02-08 12:23:36', 1, 400.00, 400.01, 'Adiantamento de passagem para viagem', 2, 2),
(4, '2023-02-08 12:35:27', 1, 3700.00, 4100.01, 'Era 4mil porem sobrou 300', 2, 2),
(5, '2023-02-08 12:37:52', 1, 1800.00, 5900.01, 'Pagamento Toalhinhas de personagem', 2, 2),
(6, '2023-02-08 12:41:36', 2, 1800.00, 4100.01, 'COmpra de toalhas de personagem 52 duzias', 2, 2),
(7, '2023-02-08 15:42:40', 2, 560.00, -559.99, 'Passagem viagem Brás SP', 3, 2),
(8, '2023-02-08 15:44:14', 2, 80.00, -639.99, 'Locomoção na viagem', 3, 2),
(9, '2023-02-08 15:45:47', 1, 80.00, -559.99, 'Pago cartão C6 CRÉDITO', 3, 2),
(10, '2023-02-08 15:48:00', 2, 260.00, -819.99, 'Custo da alimentação da viagem toda', 3, 2),
(11, '2023-02-08 15:56:23', 2, 94.25, -914.24, 'Hospedagem do site', 3, 2),
(12, '2023-02-08 15:58:33', 2, 3600.00, -4514.24, 'Compra das mochilas', 3, 2),
(13, '2023-02-08 16:09:20', 2, 150.00, -4664.24, 'Compra dos talheres inox', 3, 2),
(14, '2023-02-08 16:11:03', 2, 1530.00, 2570.01, 'Materiais diversos', 2, 2),
(15, '2023-02-08 16:12:12', 2, 220.00, 2350.01, 'Compra de pilhas AAA e AA', 2, 2),
(16, '2023-02-08 16:14:33', 2, 698.50, 1651.51, 'Compras dos panos de prato e panos de chão', 2, 2),
(17, '2023-02-08 16:16:00', 2, 579.00, 1072.51, 'Compra porta lapis', 2, 2),
(18, '2023-02-08 19:07:38', 2, 112.00, 960.51, 'Compras porta lápis', 2, 2),
(19, '2023-02-08 19:13:40', 2, 712.50, 248.01, 'Compras dos panos de prato e panos de chão', 2, 2),
(20, '2023-02-08 19:13:50', 2, 698.50, 946.51, 'Exclusão de Lançamento, Compras dos panos de prato e panos de chão', 2, 2),
(21, '2023-02-08 19:17:40', 1, 95.00, -4569.24, 'Porta lápis 2 ziper', 3, 2),
(22, '2023-02-08 19:21:19', 1, 340.00, -4229.24, 'Porta lápis e mochila', 3, 2),
(23, '2023-02-08 19:23:13', 1, 410.00, -3819.24, 'Mochilas e portas lápis', 3, 2),
(24, '2023-02-08 19:24:35', 1, 532.00, -3287.24, 'Porta lápis', 3, 2),
(25, '2023-02-08 19:25:04', 1, 532.00, -2755.24, 'Porta lápis', 3, 2),
(26, '2023-02-08 19:25:12', 1, 532.00, -3287.24, 'Exclusão de Lançamento, Porta lápis', 3, 2),
(27, '2023-02-08 19:30:50', 1, 100.00, -3187.24, 'Mochilas', 3, 2),
(28, '2023-02-08 19:34:34', 1, 108.00, 1054.51, 'Pago depois pix', 2, 2),
(29, '2023-02-08 19:38:56', 1, 156.00, 1210.51, 'Mochilas', 2, 2),
(30, '2023-02-08 19:40:45', 1, 30.00, 1240.51, '1 dz colher inox', 2, 2),
(31, '2023-02-08 19:41:58', 1, 543.00, -2644.24, 'Toalhas personagem e porta lapis e mochilas', 3, 2),
(32, '2023-02-08 19:46:29', 1, 162.00, 1402.51, 'Toalhas pers.', 2, 2),
(33, '2023-02-08 19:47:56', 1, 175.00, 1577.51, 'Toalhas', 2, 2),
(34, '2023-02-08 19:51:20', 1, 237.00, 1814.51, 'toalhas', 2, 2),
(35, '2023-02-08 19:52:53', 1, 54.00, 1868.51, 'Toalhas', 2, 2),
(36, '2023-02-08 19:54:05', 1, 156.00, 2024.51, 'Mochilas', 2, 2),
(37, '2023-02-08 19:54:18', 1, 156.00, 1868.51, 'Exclusão de Lançamento, Mochilas', 2, 2),
(38, '2023-02-09 14:09:31', 1, 420.00, -2224.24, '', 3, 2),
(39, '2023-02-09 14:09:41', 1, 420.00, -2644.24, 'Exclusão de Lançamento, ', 3, 2),
(40, '2023-02-09 14:14:15', 1, 208.00, 2076.51, '', 2, 2),
(41, '2023-02-09 14:14:56', 1, 125.00, -2519.24, '', 3, 2),
(42, '2023-02-09 14:20:40', 1, 54.00, 2130.51, '', 2, 2),
(43, '2023-02-09 14:23:13', 1, 687.00, -1832.24, 'Toalhas personagem e porta lapis', 3, 2),
(44, '2023-02-09 14:23:47', 1, 687.00, -2519.24, 'Exclusão de Lançamento, Toalhas personagem e porta lapis', 3, 2),
(45, '2023-02-09 14:25:28', 2, 1118.00, 1012.51, 'Transferência entre contas.', 2, 2),
(46, '2023-02-09 14:25:28', 1, 1118.00, -1401.24, 'transferência entre contas.', 3, 2),
(47, '2023-02-09 14:26:46', 2, 364.00, 648.51, 'Pagamento Porta Lápis', 2, 2),
(48, '2023-02-09 14:28:21', 1, 386.00, -1015.24, 'Mochilas e Porta Lápis', 3, 2),
(49, '2023-02-09 14:28:46', 1, 286.00, -1301.24, 'Exclusão de Lançamento, Mochilas e Porta Lápis', 3, 2),
(50, '2023-02-09 14:33:15', 1, 100.00, -1201.24, 'Mochilas', 3, 2),
(51, '2023-02-09 14:33:34', 1, 100.00, -1301.24, 'Exclusão de Lançamento, Mochilas', 3, 2),
(52, '2023-02-09 14:43:05', 2, 180.00, -1481.24, 'Pix Hélio Ferreira', 3, 2),
(53, '2023-02-09 14:47:17', 2, 700.00, -51.49, '', 2, 2),
(54, '2023-02-09 14:48:02', 2, 600.00, -651.49, '', 2, 2),
(55, '2023-02-09 14:49:09', 2, 700.00, -1351.49, '', 2, 2),
(56, '2023-02-09 14:49:23', 2, 700.00, -651.49, 'Exclusão de Lançamento, ', 2, 2),
(57, '2023-02-09 14:51:04', 1, 312.00, -1169.24, 'Toalhas mochilas e porta lapis', 3, 2),
(58, '2023-02-09 14:51:22', 1, 312.00, -1481.24, 'Exclusão de Lançamento, Toalhas mochilas e porta lapis', 3, 2),
(59, '2023-02-09 14:54:28', 1, 6360.00, 4878.76, '', 3, 2),
(60, '2023-02-09 15:19:10', 1, 112.00, -539.49, 'Porta lápis 2 xíper Troca de produto calça e blusa', 2, 2),
(61, '2023-02-09 22:40:41', 1, 200.00, 5078.76, 'Toalhas mochilas', 3, 2),
(62, '2023-02-09 22:42:04', 1, 108.00, 4970.76, 'Exclusão de Lançamento, Toalhas', 3, 2),
(63, '2023-02-09 22:46:45', 2, 70.00, -609.49, '', 2, 2),
(64, '2023-02-10 10:33:19', 1, 138.00, 5108.76, 'Porta lapis', 3, 2),
(65, '2023-02-10 10:33:28', 1, 138.00, 4970.76, 'Exclusão de Lançamento, Porta lapis', 3, 2),
(66, '2023-02-10 10:34:34', NULL, NULL, -609.49, '', 2, 2),
(67, '2023-02-10 10:35:00', NULL, NULL, 0.01, '', 4, 2),
(68, '2023-02-10 11:47:25', NULL, NULL, 0.01, '', 5, 2),
(69, '2023-02-10 12:18:32', 1, 138.01, 5108.77, 'Porta lapis', 3, 2),
(70, '2023-02-10 12:18:42', 1, 138.01, 4970.76, 'Exclusão de Lançamento, Porta lapis', 3, 2),
(71, '2023-02-10 12:40:17', 1, 138.01, 5108.77, 'Porta lapis', 3, 2),
(72, '2023-02-10 12:40:28', 1, 138.01, 4970.76, 'Exclusão de Lançamento, Porta lapis', 3, 2),
(73, '2023-02-10 12:42:49', 1, 138.01, 5108.77, 'Porta lapis', 3, 2),
(74, '2023-02-10 12:43:31', 1, 138.01, 4970.76, 'Exclusão de Lançamento, Porta lapis', 3, 2),
(79, '2023-02-10 12:48:14', 1, 138.01, 5108.77, 'Porta lapis', 3, 2),
(80, '2023-02-10 12:48:29', 1, 138.00, 5246.77, 'Porta lapis', 3, 2),
(81, '2023-02-10 12:49:51', 1, 1000.00, 390.51, '', 2, 2),
(82, '2023-02-10 12:49:59', 1, 1000.00, -609.49, 'Exclusão de Lançamento, ', 2, 2),
(83, '2023-02-14 14:22:04', 1, 492.00, 5738.77, 'Toalha personagem e mochilas', 3, 2),
(84, '2023-02-14 14:22:57', 2, 1050.00, 4688.77, 'Toalhas Personagem', 3, 2),
(85, '2023-02-14 14:24:04', 2, 750.00, -749.99, 'Toalhas coloridas', 5, 2),
(86, '2023-02-14 14:24:42', 1, 200.00, 4888.77, 'Toalhas personagem e porta lapis e mochilas', 3, 2),
(87, '2023-02-14 14:28:46', 1, 162.00, 5050.77, 'Mochilas', 3, 2),
(88, '2023-02-14 14:30:22', 1, 137.00, -472.49, 'Toalha', 2, 2),
(89, '2023-02-14 14:36:13', 1, 370.00, 5420.77, '', 3, 2),
(90, '2023-02-14 16:24:59', 1, 108.00, 5528.77, 'Lápis de cor', 3, 2),
(91, '2023-02-15 03:54:01', 1, 137.00, -335.49, 'Toalha', 2, 2),
(92, '2023-02-15 12:10:13', 2, 1000.00, 4528.77, '', 3, 2),
(93, '2023-02-15 12:10:34', 2, 1000.00, 3528.77, 'Pagamento Cartão de Crédito Bradesco', 3, 2),
(98, '2023-02-24 11:35:41', 2, 213.00, -548.49, '', 2, 2),
(101, '2023-02-24 11:44:24', 1, 75.00, -473.49, 'Grossa de lapis e toalhas', 2, 2),
(102, '2023-02-24 11:46:57', 1, 288.00, 3816.77, 'Mochilas e toalhas', 3, 2),
(103, '2023-02-24 11:47:59', 1, 50.00, 3866.77, 'Mochilas e porta lapis', 3, 2),
(104, '2023-02-24 11:50:12', 1, 54.00, -419.49, 'Toalhas person.', 2, 2),
(105, '2023-02-24 11:53:12', 1, 153.00, -266.49, '', 2, 2),
(108, '2023-02-25 09:39:44', 1, 108.00, 3974.77, '', 3, 2),
(109, '2023-02-25 09:40:29', 2, 318.00, -584.49, 'Transferência entre contas.', 2, 2),
(110, '2023-02-25 09:40:29', 1, 318.00, 4292.77, 'transferência entre contas.', 3, 2),
(111, '2023-02-25 09:43:54', NULL, NULL, 0.01, '', 6, 2),
(112, '2023-02-25 09:45:30', 2, 3598.77, 694.00, 'Transferência entre contas.', 3, 2),
(113, '2023-02-25 09:45:30', 1, 3598.77, 3598.78, 'transferência entre contas.', 6, 2),
(114, '2023-02-25 09:47:29', 2, 2240.19, -2990.18, 'Transferência entre contas.', 5, 2),
(115, '2023-02-25 09:47:29', 1, 2240.19, 5838.97, 'transferência entre contas.', 6, 2),
(116, '2023-02-25 09:48:00', 2, 0.01, -2990.19, 'Transferência entre contas.', 5, 2),
(117, '2023-02-25 09:48:00', 1, 0.01, 5838.98, 'transferência entre contas.', 6, 2),
(118, '2023-02-25 09:49:15', 2, 737.49, 5101.49, 'Transferência entre contas.', 6, 2),
(119, '2023-02-25 09:49:15', 1, 737.49, 153.00, 'transferência entre contas.', 2, 2),
(120, '2023-02-25 09:49:48', 2, 0.01, 0.00, 'Transferência entre contas.', 4, 2),
(121, '2023-02-25 09:49:48', 1, 0.01, 5101.50, 'transferência entre contas.', 6, 2),
(122, '2023-03-04 11:22:13', 2, 2950.00, -2256.00, 'Havaianas', 3, 2),
(123, '2023-03-04 11:24:03', 2, 670.00, -2926.00, 'Mochilqs', 3, 2),
(124, '2023-03-04 11:27:46', 1, 30.00, -2896.00, 'Baixa no Pagamento', 3, 2),
(125, '2023-03-04 11:27:46', 1, 162.00, -2734.00, 'Baixa no Pagamento', 3, 2),
(126, '2023-03-04 11:27:46', 1, 276.00, -2458.00, 'Baixa no Pagamento', 3, 2),
(127, '2023-03-04 11:29:08', 1, 150.00, -2308.00, 'Mochilas e toalhas', 3, 2),
(128, '2023-03-04 11:33:02', 1, 200.00, 353.00, 'Toalhas personagem 39 unidades', 2, 2),
(129, '2023-03-06 08:45:10', 2, 310.00, 43.00, '', 2, 2),
(130, '2023-03-06 08:48:49', 1, 180.00, 223.00, 'Havaianas', 2, 2),
(131, '2023-03-06 08:49:32', 1, 225.00, 448.00, 'Havaianas', 2, 2),
(132, '2023-03-06 08:50:37', 2, 82.00, 5019.50, 'Transferência entre contas.', 6, 2),
(133, '2023-03-06 08:50:37', 1, 82.00, 530.00, 'transferência entre contas.', 2, 2),
(134, '2023-03-06 08:51:45', 2, 2850.00, 2169.50, 'Transferência entre contas.', 6, 2),
(135, '2023-03-06 08:51:45', 1, 2850.00, 542.00, 'transferência entre contas.', 3, 2),
(136, '2023-03-06 08:52:22', 1, 150.00, 692.00, 'Pct toalhas coloridas', 3, 2),
(137, '2023-03-06 08:52:39', 1, 312.00, 1004.00, 'Toalhas mochilas e porta lapis', 3, 2),
(138, '2023-03-06 08:53:48', 2, 462.00, 542.00, 'Transferência entre contas.', 3, 2),
(139, '2023-03-06 08:53:48', 1, 462.00, 2631.50, 'transferência entre contas.', 6, 2),
(140, '2023-03-06 08:54:21', 2, 20.00, 2611.50, 'Transferência entre contas.', 6, 2),
(141, '2023-03-06 08:54:21', 1, 20.00, 562.00, 'transferência entre contas.', 3, 2),
(142, '2023-03-06 08:58:13', 2, 120.00, -3110.19, '', 5, 2),
(143, '2023-03-06 08:58:46', 2, 80.00, -3190.19, '', 5, 2),
(144, '2023-03-06 08:59:13', 2, 400.00, -3590.19, '', 5, 2),
(145, '2023-03-07 13:54:43', 2, 450.00, 80.00, 'Transferência entre contas.', 2, 2),
(146, '2023-03-07 13:54:43', 1, 450.00, 1012.00, 'transferência entre contas.', 3, 2),
(147, '2023-03-07 14:04:02', 1, 16.50, 96.50, '', 2, 2),
(148, '2023-03-09 10:59:23', 1, 107.00, 1119.00, 'Panos de prato', 3, 2),
(149, '2023-03-09 11:06:41', 1, 84.00, 84.00, 'Panos de chão', 4, 2),
(150, '2023-03-09 11:08:11', 1, 140.00, 224.00, 'Havaianas', 4, 2),
(151, '2023-03-14 13:44:55', 1, 236.82, 1355.82, 'Havaianas e extensão', 3, 2),
(152, '2023-03-14 13:54:19', 2, 224.00, 0.00, 'Transferência entre contas.', 4, 2),
(153, '2023-03-14 13:54:19', 1, 224.00, 320.50, 'transferência entre contas.', 2, 2),
(154, '2023-03-14 13:55:47', 2, 350.00, -29.50, 'Transferência entre contas.', 2, 2),
(155, '2023-03-14 13:55:47', 1, 350.00, 1705.82, 'transferência entre contas.', 3, 2),
(156, '2023-03-14 13:56:51', 2, 1679.75, 26.07, 'Transferência entre contas.', 3, 2),
(157, '2023-03-14 13:56:51', 1, 1679.75, -1910.44, 'transferência entre contas.', 5, 2),
(158, '2023-03-14 13:58:42', 2, 225.00, 2386.50, 'Transferência entre contas.', 6, 2),
(159, '2023-03-14 13:58:42', 1, 225.00, 251.07, 'transferência entre contas.', 3, 2),
(160, '2023-03-14 14:06:16', 1, 80.00, 331.07, '', 3, 2),
(161, '2023-03-14 14:09:25', 1, 29.52, 360.59, '', 3, 2),
(162, '2023-03-14 14:11:07', 2, 398.00, 1988.50, 'Transferência entre contas.', 6, 2),
(163, '2023-03-14 14:11:07', 1, 398.00, -1512.44, 'transferência entre contas.', 5, 2),
(164, '2023-03-14 14:14:17', 2, 29.50, 1959.00, 'Transferência entre contas.', 6, 2),
(165, '2023-03-14 14:14:17', 1, 29.50, 0.00, 'transferência entre contas.', 2, 2),
(166, '2023-03-14 16:25:44', 1, 100.00, 460.59, 'Havaianas', 3, 2),
(167, '2023-03-14 16:41:24', 1, 100.00, 100.00, 'Havaianas', 4, 2),
(168, '2023-03-14 16:43:08', 1, 100.00, 560.59, 'Mochilas e toalhas', 3, 2),
(169, '2023-03-14 16:43:46', 1, 96.00, 656.59, 'Restante do pagamento', 3, 2),
(170, '2023-03-14 17:11:51', 1, 100.00, 200.00, 'Havaianas', 4, 2),
(171, '2023-03-14 17:13:29', 1, 96.00, 296.00, 'Restante do pagamento', 4, 2),
(172, '2023-03-14 17:16:17', 1, 22.00, 318.00, 'Esc e cola', 4, 2),
(173, '2023-03-27 09:16:54', 1, 67.00, 67.00, 'Restante do pagamento', 2, 2),
(174, '2023-03-27 09:17:22', 1, 294.25, 361.25, 'Materias diversos', 2, 2),
(175, '2023-03-27 09:18:04', 1, 50.00, 411.25, '', 2, 2),
(176, '2023-03-27 09:18:56', 1, 110.00, 521.25, 'Panos de prato', 2, 2),
(177, '2023-03-27 09:19:27', 1, 476.50, 1133.09, 'Havaianas', 3, 2),
(178, '2023-03-27 09:20:04', 2, 476.50, 656.59, 'Transferência entre contas.', 3, 2),
(179, '2023-03-27 09:20:04', 1, 476.50, 997.75, 'transferência entre contas.', 2, 2),
(180, '2023-03-27 09:21:43', 1, 106.00, 1103.75, '', 2, 2),
(181, '2023-03-27 10:31:35', 2, 100.00, 218.00, '', 4, 2),
(182, '2023-03-27 10:33:39', 1, 56.00, 1159.75, '', 2, 2),
(183, '2023-03-27 10:44:30', 2, 450.00, 709.75, 'Transferência entre contas.', 2, 2),
(184, '2023-03-27 10:44:30', 1, 450.00, 1106.59, 'transferência entre contas.', 3, 2),
(185, '2023-04-06 11:14:41', 2, 17.55, 1089.04, '', 3, 2),
(186, '2023-04-06 11:17:12', 2, 4.90, 1084.14, 'Segura da conta PagBank', 3, 2),
(187, '2023-04-06 11:18:02', 2, 300.00, 409.75, 'Transferência entre contas.', 2, 2),
(188, '2023-04-06 11:18:03', 1, 300.00, 1384.14, 'transferência entre contas.', 3, 2),
(189, '2023-04-06 11:19:52', 1, 315.00, 1699.14, '', 3, 2),
(190, '2023-04-06 11:21:02', 1, 72.00, 1771.14, 'Havaianas', 3, 2),
(191, '2023-04-06 11:22:44', 1, 67.00, 1838.14, '', 3, 2),
(192, '2023-04-06 11:23:24', 1, 65.00, 474.75, '', 2, 2),
(193, '2023-04-06 11:24:11', 1, 353.50, 2191.64, 'Havaianas', 3, 2),
(194, '2023-04-06 11:24:56', 1, 123.00, 597.75, '', 2, 2),
(195, '2023-04-06 11:28:07', 1, 40.00, 637.75, '', 2, 2),
(196, '2023-04-06 11:38:39', 1, 200.00, 837.75, '', 2, 2),
(197, '2023-04-06 11:40:21', 1, 184.00, 1021.75, 'Havaianas', 2, 2),
(198, '2023-04-06 11:40:54', 2, 184.00, 837.75, 'Transferência entre contas.', 2, 2),
(199, '2023-04-06 11:40:55', 1, 184.00, 2375.64, 'transferência entre contas.', 3, 2),
(200, '2023-04-11 14:20:34', 1, 40.00, 877.75, '', 2, 2),
(201, '2023-04-20 14:24:25', 2, 500.00, 377.75, 'Transferência entre contas.', 2, 2),
(202, '2023-04-20 14:24:25', 1, 500.00, 2875.64, 'transferência entre contas.', 3, 2),
(203, '2023-04-20 14:28:17', 1, 60.00, 437.75, '', 2, 2),
(204, '2023-04-20 14:31:01', 1, 106.00, 543.75, '', 2, 2),
(205, '2023-04-20 14:34:18', 1, 106.00, 649.75, '', 2, 2),
(206, '2023-04-20 14:37:40', 1, 80.00, 2955.64, '', 3, 2),
(207, '2023-04-20 14:46:25', 1, 200.00, 849.75, 'Materias DIversos', 2, 2),
(208, '2023-04-20 14:52:44', 2, 580.00, 2375.64, 'Cadeado ao barbear filtro de linha', 3, 2),
(209, '2023-04-22 11:51:54', 1, 205.00, 2580.64, '', 3, 2),
(210, '2023-04-22 11:52:37', 1, 240.00, 1089.75, '', 2, 2),
(211, '2023-04-22 12:11:55', 2, 953.00, 1627.64, '', 3, 2),
(212, '2023-04-25 14:54:15', 1, 80.00, 1169.75, '', 2, 2),
(213, '2023-04-25 14:59:57', 1, 95.00, 1722.64, '', 3, 2),
(214, '2023-04-25 15:02:28', 1, 30.00, 1199.75, '', 2, 2),
(215, '2023-04-25 17:34:31', 1, 136.00, 354.00, '', 4, 2),
(216, '2023-04-25 17:35:27', 1, 50.00, 404.00, '', 4, 2),
(217, '2023-04-25 17:36:22', 1, 50.00, 1772.64, '', 3, 2),
(218, '2023-04-25 17:36:55', 1, 50.00, 1822.64, '', 3, 2),
(219, '2023-04-25 17:37:48', 1, 169.95, 573.95, '', 4, 2),
(220, '2023-04-25 17:46:52', 1, 26.00, 1225.75, '', 2, 2),
(221, '2023-04-25 17:48:13', 1, 26.00, 1251.75, '', 2, 2),
(222, '2023-04-26 22:36:00', 1, 470.00, 1721.75, '', 2, 2),
(223, '2023-04-27 14:24:07', 1, 38.00, 1759.75, '', 2, 2),
(224, '2023-04-27 14:26:26', 1, 80.00, 1839.75, '', 2, 2),
(225, '2023-04-27 14:28:15', 2, 220.00, 353.95, '', 4, 2),
(226, '2023-04-27 14:31:45', 2, 220.00, 1619.75, 'Transferência entre contas.', 2, 2),
(227, '2023-04-27 14:31:45', 1, 220.00, 573.95, 'transferência entre contas.', 4, 2),
(228, '2023-04-27 17:34:46', 1, 183.00, 1802.75, '', 2, 2),
(229, '2023-04-27 18:55:41', 1, 50.00, 623.95, '', 4, 2),
(230, '2023-04-27 18:57:19', 2, 50.00, 573.95, '', 4, 2),
(231, '2023-04-30 13:02:12', 1, 150.00, 1952.75, 'Havaianas', 2, 2),
(232, '2023-05-04 15:13:35', 1, 150.00, 2102.75, 'Materias DIversos', 2, 2),
(233, '2023-05-04 15:20:02', 1, 100.00, 2202.75, 'Toalhinhas', 2, 2),
(234, '2023-05-04 15:23:00', 1, 110.00, 2312.75, '', 2, 2),
(235, '2023-05-04 15:25:10', 2, 220.00, 2092.75, 'Transferência entre contas.', 2, 2),
(236, '2023-05-04 15:25:10', 1, 220.00, 793.95, 'transferência entre contas.', 4, 2),
(237, '2023-05-04 15:26:26', 2, 30.00, 2062.75, 'Transferência entre contas.', 2, 2),
(238, '2023-05-04 15:26:26', 1, 30.00, 823.95, 'transferência entre contas.', 4, 2),
(239, '2023-05-05 16:11:21', 2, 88.00, 735.95, '', 4, 2),
(240, '2023-05-05 16:12:42', 2, 1000.00, 1062.75, 'Transferência entre contas.', 2, 2),
(241, '2023-05-05 16:12:42', 1, 1000.00, 2822.64, 'transferência entre contas.', 3, 2),
(242, '2023-05-05 16:13:50', 2, 1512.44, 1310.20, 'Transferência entre contas.', 3, 2),
(243, '2023-05-05 16:13:50', 1, 1512.44, 0.00, 'transferência entre contas.', 5, 2),
(244, '2023-05-05 16:15:20', 2, 420.00, 890.20, '', 3, 2),
(245, '2023-05-05 16:18:11', 2, 555.00, 335.20, '', 3, 2),
(246, '2023-05-09 14:47:00', 1, 88.00, 1150.75, '', 2, 2),
(247, '2023-05-09 14:47:47', 2, 88.00, 1062.75, 'Transferência entre contas.', 2, 2),
(248, '2023-05-09 14:47:48', 1, 88.00, 423.20, 'transferência entre contas.', 3, 2),
(249, '2023-05-09 14:49:25', 1, 150.00, 573.20, '', 3, 2),
(250, '2023-05-09 14:50:51', 2, 150.00, 585.95, '', 4, 2),
(251, '2023-05-09 14:51:42', 2, 585.95, 0.00, 'Transferência entre contas.', 4, 2),
(252, '2023-05-09 14:51:42', 1, 585.95, 2544.95, 'transferência entre contas.', 6, 2),
(253, '2023-05-09 14:52:35', 2, 573.20, 0.00, 'Transferência entre contas.', 3, 2),
(254, '2023-05-09 14:52:35', 1, 573.20, 3118.15, 'transferência entre contas.', 6, 2),
(255, '2023-05-15 15:34:22', 1, 200.00, 200.00, 'Vendas Arnaldo caldas', 4, 2),
(256, '2023-05-15 15:35:18', 1, 68.00, 1130.75, 'Vendas Arnaldo caldas', 2, 2),
(257, '2023-05-15 16:16:10', 1, 58.00, 258.00, 'Cadeado 20', 4, 2),
(258, '2023-05-15 17:03:18', 1, 57.00, 315.00, '', 4, 2),
(259, '2023-05-15 17:52:18', 2, 450.00, -135.00, 'Transferência entre contas.', 4, 2),
(260, '2023-05-15 17:52:18', 1, 450.00, 450.00, 'transferência entre contas.', 3, 2),
(261, '2023-05-18 16:56:31', 1, 172.00, 37.00, '', 4, 2),
(262, '2023-05-19 09:48:25', 1, 229.00, 266.00, '', 4, 2),
(263, '2023-05-23 15:34:16', 1, 125.00, 391.00, '', 4, 2),
(264, '2023-05-23 15:40:26', 1, 194.00, 1324.75, '', 2, 2),
(265, '2023-05-23 15:46:08', 1, 162.00, 1486.75, 'Mochilas', 2, 2),
(268, '2023-05-23 16:54:54', 2, 128.00, 263.00, '', 4, 2),
(269, '2023-05-23 16:56:12', 2, 130.00, 1356.75, '', 2, 2),
(270, '2023-05-23 16:58:00', 2, 1528.00, -1078.00, '', 3, 2),
(271, '2023-05-23 22:59:26', 2, 50.28, 212.72, '', 4, 2),
(272, '2023-05-23 23:00:43', 1, 126.00, 338.72, '', 4, 2),
(273, '2023-05-25 14:49:33', 1, 150.00, 1506.75, '', 2, 2),
(274, '2023-05-25 15:00:04', 1, 110.00, -968.00, '', 3, 2),
(275, '2023-05-25 15:04:29', 1, 35.00, 1541.75, '', 2, 2),
(276, '2023-05-25 15:05:29', 1, 30.00, 1571.75, '', 2, 2),
(277, '2023-05-25 15:07:30', 1, 70.00, -898.00, '', 3, 2),
(278, '2023-05-26 18:02:34', 1, 150.00, 1721.75, '', 2, 2),
(279, '2023-05-30 16:10:03', 1, 168.00, -730.00, '', 3, 2),
(280, '2023-05-30 17:17:45', 1, 82.00, 1803.75, '', 2, 2),
(281, '2023-05-30 17:18:47', 2, 350.00, 1453.75, 'Transferência entre contas.', 2, 2),
(282, '2023-05-30 17:18:47', 1, 350.00, -380.00, 'transferência entre contas.', 3, 2),
(283, '2023-05-30 18:02:42', 1, 356.00, -24.00, '', 3, 2),
(284, '2023-05-30 18:08:57', 2, 500.00, 953.75, 'Transferência entre contas.', 2, 2),
(285, '2023-05-30 18:08:57', 1, 500.00, 476.00, 'transferência entre contas.', 3, 2),
(286, '2023-05-30 19:00:10', 1, 150.00, 488.72, '', 4, 2),
(287, '2023-05-30 22:53:30', 2, 548.59, 2569.56, 'Transferência entre contas.', 6, 2),
(288, '2023-05-30 22:53:30', 1, 548.59, 1024.59, 'transferência entre contas.', 3, 2),
(289, '2023-05-30 22:56:13', 2, 75.60, 413.12, '', 4, 2),
(290, '2023-05-30 22:57:39', 2, 1000.00, 24.59, '', 3, 2),
(291, '2023-06-01 14:03:26', 2, 800.00, 153.75, 'Transferência entre contas.', 2, 2),
(292, '2023-06-01 14:03:26', 1, 800.00, 824.59, 'transferência entre contas.', 3, 2),
(293, '2023-06-01 14:17:45', 2, 75.00, 749.59, '', 3, 2),
(294, '2023-06-01 14:20:08', 2, 80.00, 73.75, '', 2, 2),
(295, '2023-06-05 15:30:57', 1, 50.00, 799.59, '', 3, 2),
(296, '2023-06-05 15:36:35', 2, 63.50, 736.09, '', 3, 2),
(297, '2023-06-05 15:38:05', 2, 196.83, -123.08, '', 2, 2),
(298, '2023-06-05 15:42:32', 1, 180.00, 916.09, '', 3, 2),
(299, '2023-06-05 17:09:12', 2, 1584.00, -667.91, 'Sandálias', 3, 2),
(300, '2023-06-05 17:10:03', 2, 446.00, -1113.91, '', 3, 2),
(301, '2023-06-05 17:11:39', 1, 180.00, -933.91, '', 3, 2),
(302, '2023-06-08 10:22:14', 1, 189.00, -744.91, '', 3, 2),
(303, '2023-06-08 10:27:02', 1, 109.00, -635.91, '', 3, 2),
(304, '2023-06-09 15:01:42', 1, 50.00, -585.91, '', 3, 2),
(305, '2023-06-09 15:15:22', 1, 60.00, -63.08, '', 2, 2),
(306, '2023-06-09 15:23:57', 1, 397.00, 333.92, '', 2, 2),
(307, '2023-06-09 15:25:19', 1, 19.00, 352.92, '', 2, 2),
(308, '2023-06-09 17:38:43', 1, 150.00, 502.92, '', 2, 2),
(309, '2023-06-09 17:40:03', 2, 800.00, -297.08, 'Transferência entre contas.', 2, 2),
(310, '2023-06-09 17:40:03', 1, 800.00, 214.09, 'transferência entre contas.', 3, 2),
(311, '2023-06-09 17:42:57', 2, 500.00, -285.91, '', 3, 2),
(312, '2023-06-09 17:56:15', 2, 530.00, 244.09, 'Exclusão de Lançamento, Lápis cor, lápis preto e agulha de desentupir boca de fogão', 3, 2),
(313, '2023-06-09 17:57:40', 1, 60.00, 184.09, 'Exclusão de Lançamento, ', 3, 2),
(314, '2023-06-11 00:01:15', 1, 299.00, 483.09, '', 3, 2),
(315, '2023-06-12 14:28:23', 1, 660.00, 362.92, '', 2, 2),
(316, '2023-06-12 14:31:12', 1, 150.00, 512.92, 'Materias DIversos', 2, 2),
(317, '2023-06-12 14:32:50', 1, 24.00, 536.92, '', 2, 2),
(318, '2023-06-12 23:18:37', 1, 695.00, 1231.92, 'Baixa no Pagamento', 2, 2),
(319, '2023-06-12 23:19:59', 2, 695.00, 536.92, 'Transferência entre contas.', 2, 2),
(320, '2023-06-12 23:19:59', 1, 695.00, 1108.12, 'transferência entre contas.', 4, 2),
(321, '2023-06-13 15:01:53', 1, 70.00, 606.92, '', 2, 2),
(322, '2023-06-13 15:03:32', 2, 260.00, 346.92, '', 2, 2),
(323, '2023-06-13 16:50:02', 1, 28.00, 1136.12, '', 4, 2),
(324, '2023-06-13 17:19:12', 1, 45.00, 528.09, '', 3, 2),
(325, '2023-06-14 16:08:59', 1, 100.00, 628.09, '', 3, 2),
(326, '2023-06-15 16:00:05', 1, 470.00, 1606.12, 'Havaianas', 4, 2),
(327, '2023-06-19 16:14:28', 1, 89.00, 435.92, '', 2, 2),
(328, '2023-06-19 16:17:14', 1, 562.00, 2168.12, '', 4, 2),
(329, '2023-06-19 16:20:45', 1, 123.00, 2291.12, '', 4, 2),
(330, '2023-06-19 16:33:01', 2, 1760.00, 531.12, '', 4, 2),
(331, '2023-06-19 16:36:35', 1, 37.00, 472.92, 'Restante toalhinhas', 2, 2),
(332, '2023-06-19 16:39:22', 2, 1635.00, -1162.08, '', 2, 2),
(333, '2023-06-19 17:07:55', 2, 1330.00, -798.88, 'Transferência entre contas.', 4, 2),
(334, '2023-06-19 17:07:55', 1, 1330.00, 3899.56, 'transferência entre contas.', 6, 2),
(335, '2023-06-19 17:09:00', 2, 628.00, 0.09, 'Transferência entre contas.', 3, 2),
(336, '2023-06-19 17:09:00', 1, 628.00, 4527.56, 'transferência entre contas.', 6, 2),
(337, '2023-06-19 17:51:44', 1, 264.00, 264.09, '', 3, 2),
(338, '2023-06-19 17:58:23', 1, 878.00, 1142.09, '', 3, 2),
(339, '2023-06-19 17:59:34', 1, 112.00, -1050.08, '', 2, 2),
(340, '2023-06-19 18:03:41', 2, 62.00, 1080.09, '', 3, 2),
(341, '2023-06-22 16:26:31', 1, 92.40, 1172.49, '', 3, 2),
(342, '2023-06-22 16:28:28', 2, 90.00, -1140.08, 'Transferência entre contas.', 2, 2),
(343, '2023-06-22 16:28:28', 1, 90.00, 1262.49, 'transferência entre contas.', 3, 2),
(344, '2023-06-22 16:37:20', 1, 100.00, 1362.49, '', 3, 2),
(345, '2023-06-22 16:38:18', 1, 20.00, -1120.08, '', 2, 2),
(346, '2023-06-22 16:39:33', 1, 83.00, 1445.49, '', 3, 2),
(347, '2023-06-22 16:53:22', 1, 60.00, -1060.08, '', 2, 2),
(348, '2023-06-26 12:56:34', 1, 62.00, 1507.49, '', 3, 2),
(349, '2023-06-27 14:49:58', 1, 40.00, -1020.08, '', 2, 2),
(350, '2023-06-27 14:51:29', 1, 100.00, -920.08, 'Baixa no Pagamento', 2, 2),
(351, '2023-06-27 14:53:07', 1, 90.00, -830.08, '', 2, 2),
(352, '2023-06-27 14:55:24', 1, 740.00, -90.08, 'Colas', 2, 2),
(353, '2023-06-27 17:17:34', 1, 180.00, -618.88, '', 4, 2),
(354, '2023-06-29 09:40:45', 1, 50.00, 1557.49, '', 3, 2),
(355, '2023-06-29 09:49:16', 2, 512.00, 1045.49, 'Transferência entre contas.', 3, 2),
(356, '2023-06-29 09:49:16', 1, 512.00, -106.88, 'transferência entre contas.', 4, 2),
(357, '2023-06-29 09:52:44', 2, 1045.49, 0.00, 'Transferência entre contas.', 3, 2),
(358, '2023-06-29 09:52:44', 1, 1045.49, 5573.05, 'transferência entre contas.', 6, 2),
(359, '2023-07-03 12:36:55', 2, 486.00, -592.88, '', 4, 2),
(360, '2023-07-03 12:37:50', 2, 100.00, -100.00, '', 3, 2),
(361, '2023-07-03 12:39:22', 1, 300.00, 200.00, '', 3, 2),
(362, '2023-07-03 13:49:50', 2, 500.00, -300.00, 'Compras de sandálias', 3, 2),
(363, '2023-07-03 13:50:38', 2, 200.00, -290.08, 'Transferência entre contas.', 2, 2),
(364, '2023-07-03 13:50:38', 1, 200.00, -100.00, 'transferência entre contas.', 3, 2),
(365, '2023-07-03 13:51:45', 1, 130.00, 30.00, '', 3, 2),
(366, '2023-07-03 13:53:58', 2, 50.00, -20.00, 'Transferência entre contas.', 3, 2),
(367, '2023-07-03 13:53:58', 1, 50.00, -240.08, 'transferência entre contas.', 2, 2),
(368, '2023-07-03 13:54:38', 1, 200.00, 180.00, '', 3, 2),
(369, '2023-07-03 14:02:01', 2, 304.00, -124.00, 'Transferência entre contas.', 3, 2),
(370, '2023-07-03 14:02:01', 1, 304.00, 63.92, 'transferência entre contas.', 2, 2),
(371, '2023-07-03 14:08:45', 2, 486.00, -1078.88, '', 4, 2),
(372, '2023-07-03 14:16:51', 2, 138.50, -262.50, '', 3, 2),
(373, '2023-07-03 14:18:29', 2, 608.00, -544.08, 'Transferência entre contas.', 2, 2),
(374, '2023-07-03 14:18:29', 1, 608.00, 345.50, 'transferência entre contas.', 3, 2),
(375, '2023-07-03 14:19:31', 2, 680.00, -334.50, 'Transferência entre contas.', 3, 2),
(376, '2023-07-03 14:19:31', 1, 680.00, -398.88, 'transferência entre contas.', 4, 2),
(377, '2023-07-03 14:20:28', 2, 334.50, 5238.55, 'Transferência entre contas.', 6, 2),
(378, '2023-07-03 14:20:28', 1, 334.50, 0.00, 'transferência entre contas.', 3, 2),
(379, '2023-07-05 17:29:22', 1, 200.00, -198.88, '', 4, 2),
(380, '2023-07-07 15:20:19', 1, 333.00, 333.00, '', 3, 2),
(381, '2023-07-07 15:24:42', 1, 333.00, 0.00, 'Exclusão de Lançamento, ', 3, 2),
(382, '2023-07-07 15:25:32', 1, 333.00, -333.00, 'Exclusão de Lançamento, ', 3, 2),
(383, '2023-07-07 15:28:05', 1, 50.00, -494.08, '', 2, 2),
(384, '2023-07-07 15:29:26', 1, 83.00, -250.00, '', 3, 2),
(385, '2023-07-07 18:26:12', 1, 268.00, 18.00, '', 3, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_HIST_TRANSFERENCIA`
--

CREATE TABLE `TB_HIST_TRANSFERENCIA` (
  `co_hist_transferencia` int(11) NOT NULL,
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
  `co_assinante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_HIST_TRANSFERENCIA`
--

INSERT INTO `TB_HIST_TRANSFERENCIA` (`co_hist_transferencia`, `dt_cadastro`, `dt_realizado`, `nu_saldo_origem_ant`, `nu_saldo_origem_dep`, `nu_saldo_destino_ant`, `nu_saldo_destino_dep`, `nu_valor_transferido`, `co_conta_bancaria_origem`, `co_conta_bancaria_destino`, `co_usuario`, `co_assinante`) VALUES
(1, '2023-02-09 14:25:28', '2023-02-07 14:25:28', 2130.51, 1012.51, -2519.24, -1401.24, 1118.00, 2, 3, 2, 1),
(2, '2023-02-25 09:40:29', '2023-02-23 09:40:29', -266.49, -584.49, 3974.77, 4292.77, 318.00, 2, 3, 2, 1),
(3, '2023-02-25 09:45:30', '2023-02-25 09:45:30', 4292.77, 694.00, 0.01, 3598.78, 3598.77, 3, 6, 2, 1),
(4, '2023-02-25 09:47:29', '2023-02-25 09:47:29', -749.99, -2990.18, 3598.78, 5838.97, 2240.19, 5, 6, 2, 1),
(5, '2023-02-25 09:48:00', '2023-02-25 09:48:00', -2990.18, -2990.19, 5838.97, 5838.98, 0.01, 5, 6, 2, 1),
(6, '2023-02-25 09:49:15', '2023-02-25 09:49:15', 5838.98, 5101.49, -584.49, 153.00, 737.49, 6, 2, 2, 1),
(7, '2023-02-25 09:49:48', '2023-02-25 09:49:48', 0.01, 0.00, 5101.49, 5101.50, 0.01, 4, 6, 2, 1),
(8, '2023-03-06 08:50:37', '2023-03-06 08:50:37', 5101.50, 5019.50, 448.00, 530.00, 82.00, 6, 2, 2, 1),
(9, '2023-03-06 08:51:45', '2023-03-06 08:51:45', 5019.50, 2169.50, -2308.00, 542.00, 2850.00, 6, 3, 2, 1),
(10, '2023-03-06 08:53:48', '2023-03-06 08:53:48', 1004.00, 542.00, 2169.50, 2631.50, 462.00, 3, 6, 2, 1),
(11, '2023-03-06 08:54:21', '2023-03-06 08:54:21', 2631.50, 2611.50, 542.00, 562.00, 20.00, 6, 3, 2, 1),
(12, '2023-03-07 13:54:43', '2023-03-06 13:54:43', 530.00, 80.00, 562.00, 1012.00, 450.00, 2, 3, 2, 1),
(13, '2023-03-14 13:54:19', '2023-03-14 13:54:19', 224.00, 0.00, 96.50, 320.50, 224.00, 4, 2, 2, 1),
(14, '2023-03-14 13:55:47', '2023-03-10 13:55:47', 320.50, -29.50, 1355.82, 1705.82, 350.00, 2, 3, 2, 1),
(15, '2023-03-14 13:56:51', '2023-03-10 13:56:51', 1705.82, 26.07, -3590.19, -1910.44, 1679.75, 3, 5, 2, 1),
(16, '2023-03-14 13:58:42', '2023-03-10 13:58:42', 2611.50, 2386.50, 26.07, 251.07, 225.00, 6, 3, 2, 1),
(17, '2023-03-14 14:11:07', '2023-03-13 14:11:07', 2386.50, 1988.50, -1910.44, -1512.44, 398.00, 6, 5, 2, 1),
(18, '2023-03-14 14:14:17', '2023-03-14 14:14:17', 1988.50, 1959.00, -29.50, 0.00, 29.50, 6, 2, 2, 1),
(19, '2023-03-27 09:20:04', '2023-03-24 09:20:04', 1133.09, 656.59, 521.25, 997.75, 476.50, 3, 2, 2, 1),
(20, '2023-03-27 10:44:30', '2023-03-24 10:44:30', 1159.75, 709.75, 656.59, 1106.59, 450.00, 2, 3, 2, 1),
(21, '2023-04-06 11:18:02', '2023-04-28 11:18:02', 709.75, 409.75, 1084.14, 1384.14, 300.00, 2, 3, 2, 1),
(22, '2023-04-06 11:40:54', '2023-04-05 11:40:54', 1021.75, 837.75, 2191.64, 2375.64, 184.00, 2, 3, 2, 1),
(23, '2023-04-20 14:24:25', '2023-04-18 14:24:25', 877.75, 377.75, 2375.64, 2875.64, 500.00, 2, 3, 2, 1),
(24, '2023-04-27 14:31:45', '2023-04-27 14:31:45', 1839.75, 1619.75, 353.95, 573.95, 220.00, 2, 4, 2, 1),
(25, '2023-05-04 15:25:10', '2023-05-04 15:25:10', 2312.75, 2092.75, 573.95, 793.95, 220.00, 2, 4, 2, 1),
(26, '2023-05-04 15:26:26', '2023-05-04 15:26:26', 2092.75, 2062.75, 793.95, 823.95, 30.00, 2, 4, 2, 1),
(27, '2023-05-05 16:12:42', '2023-05-04 16:12:42', 2062.75, 1062.75, 1822.64, 2822.64, 1000.00, 2, 3, 2, 1),
(28, '2023-05-05 16:13:49', '2023-05-04 16:13:49', 2822.64, 1310.20, -1512.44, 0.00, 1512.44, 3, 5, 2, 1),
(29, '2023-05-09 14:47:47', '2023-05-04 14:47:47', 1150.75, 1062.75, 335.20, 423.20, 88.00, 2, 3, 2, 1),
(30, '2023-05-09 14:51:42', '2023-05-09 14:51:42', 585.95, 0.00, 1959.00, 2544.95, 585.95, 4, 6, 2, 1),
(31, '2023-05-09 14:52:34', '2023-05-09 14:52:34', 573.20, 0.00, 2544.95, 3118.15, 573.20, 3, 6, 2, 1),
(32, '2023-05-15 17:52:18', '2023-05-15 17:52:18', 315.00, -135.00, 0.00, 450.00, 450.00, 4, 3, 2, 1),
(33, '2023-05-30 17:18:47', '2023-05-29 17:18:47', 1803.75, 1453.75, -730.00, -380.00, 350.00, 2, 3, 2, 1),
(34, '2023-05-30 18:08:57', '2023-05-30 18:08:57', 1453.75, 953.75, -24.00, 476.00, 500.00, 2, 3, 2, 1),
(35, '2023-05-30 22:53:30', '2023-05-30 22:53:30', 3118.15, 2569.56, 476.00, 1024.59, 548.59, 6, 3, 2, 1),
(36, '2023-06-01 14:03:26', '2023-06-01 14:03:26', 953.75, 153.75, 24.59, 824.59, 800.00, 2, 3, 2, 1),
(37, '2023-06-09 17:40:03', '2023-06-09 17:40:03', 502.92, -297.08, -585.91, 214.09, 800.00, 2, 3, 2, 1),
(38, '2023-06-12 23:19:59', '2023-06-13 23:19:59', 1231.92, 536.92, 413.12, 1108.12, 695.00, 2, 4, 2, 1),
(39, '2023-06-19 17:07:55', '2023-06-17 17:07:55', 531.12, -798.88, 2569.56, 3899.56, 1330.00, 4, 6, 2, 1),
(40, '2023-06-19 17:09:00', '2023-06-19 17:09:00', 628.09, 0.09, 3899.56, 4527.56, 628.00, 3, 6, 2, 1),
(41, '2023-06-22 16:28:28', '2023-06-22 16:28:28', -1050.08, -1140.08, 1172.49, 1262.49, 90.00, 2, 3, 2, 1),
(42, '2023-06-29 09:49:16', '2023-06-28 09:49:16', 1557.49, 1045.49, -618.88, -106.88, 512.00, 3, 4, 2, 1),
(43, '2023-06-29 09:52:44', '2023-06-28 09:52:44', 1045.49, 0.00, 4527.56, 5573.05, 1045.49, 3, 6, 2, 1),
(44, '2023-07-03 13:50:38', '2023-06-29 13:50:38', -90.08, -290.08, -300.00, -100.00, 200.00, 2, 3, 2, 1),
(45, '2023-07-03 13:53:57', '2023-06-29 13:53:57', 30.00, -20.00, -290.08, -240.08, 50.00, 3, 2, 2, 1),
(46, '2023-07-03 14:02:01', '2023-07-10 14:02:01', 180.00, -124.00, -240.08, 63.92, 304.00, 3, 2, 2, 1),
(47, '2023-07-03 14:18:29', '2023-06-29 14:18:29', 63.92, -544.08, -262.50, 345.50, 608.00, 2, 3, 2, 1),
(48, '2023-07-03 14:19:31', '2023-07-03 14:19:31', 345.50, -334.50, -1078.88, -398.88, 680.00, 3, 4, 2, 1),
(49, '2023-07-03 14:20:28', '2023-07-03 14:20:28', 5573.05, 5238.55, -334.50, 0.00, 334.50, 6, 3, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_IMAGEM`
--

CREATE TABLE `TB_IMAGEM` (
  `co_imagem` int(10) UNSIGNED NOT NULL,
  `ds_caminho` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_IMAGEM`
--

INSERT INTO `TB_IMAGEM` (`co_imagem`, `ds_caminho`) VALUES
(1, 'leonardo-m-c-bessa-56e8920c23ab66.jpg'),
(2, 'leonardo-m-c-bessa-56e8920c23ab66.jpg'),
(3, ''),
(4, 'fp-loja-san-giuseppe-artigos-religiosos-2-6449721eb8b77.jpeg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_IMAGEM_ASSINANTE`
--

CREATE TABLE `TB_IMAGEM_ASSINANTE` (
  `co_imagem_assinante` int(10) NOT NULL,
  `co_assinante` int(11) NOT NULL,
  `co_imagem` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_MIDIAS_PRODUTO`
--

CREATE TABLE `TB_MIDIAS_PRODUTO` (
  `co_midias_produto` int(11) NOT NULL,
  `co_imagem` int(10) NOT NULL,
  `co_produto` int(12) NOT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `tp_midia` int(1) DEFAULT NULL COMMENT '1 - Imagem / 2 - Vídeo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_MODULO`
--

CREATE TABLE `TB_MODULO` (
  `co_modulo` int(11) NOT NULL,
  `no_modulo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `co_projeto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_MODULO`
--

INSERT INTO `TB_MODULO` (`co_modulo`, `no_modulo`, `dt_cadastro`, `co_projeto`) VALUES
(10, 'Fluxo de Caixa', '2022-05-30 12:32:36', 1),
(11, 'Assinante', '2022-06-21 10:48:05', 1),
(12, 'Site', '2022-06-21 11:21:34', 1),
(13, 'Lançamento do SOL Familiar', '2022-06-21 11:27:06', 1),
(14, 'Arquitetura', '2022-06-21 22:27:04', 1),
(15, 'Listas', '2022-06-24 09:22:16', 1),
(16, 'Cursos', '2022-06-24 09:25:46', 1),
(17, 'Relatórios', '2023-05-21 15:54:16', 1),
(18, 'Compras', '2023-05-24 14:04:57', 1),
(19, 'Vendas', '2023-05-24 14:05:05', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_NEGOCIACAO`
--

CREATE TABLE `TB_NEGOCIACAO` (
  `co_negociacao` int(11) NOT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `tp_negociacao` int(1) DEFAULT NULL COMMENT '1 - Compra / 2 - Venda / 3 - Cotação',
  `nu_valor` float(12,2) DEFAULT NULL,
  `tp_modelo` int(1) DEFAULT NULL COMMENT 'Modelo do Tipo da Negociação ///  1 - Compra Pessoal / 2 - Compra online / 3 - Compra Vendedor / 4 - Venda loja Física / 5 - Venda Vendedor / 6 - Venda online / 7 - Venda TeleVenda',
  `co_produto` int(12) NOT NULL,
  `co_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_PACOTE`
--

CREATE TABLE `TB_PACOTE` (
  `co_pacote` int(11) NOT NULL,
  `no_pacote` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_descricao` text COLLATE utf8_unicode_ci,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_lancamento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_PAGINA`
--

CREATE TABLE `TB_PAGINA` (
  `co_pagina` int(11) NOT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_titulo_url_amigavel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Url amigável da página',
  `nu_visualizacao` int(11) DEFAULT NULL,
  `nu_usuario` int(11) DEFAULT NULL COMMENT 'Número de usuário que visitou a página'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_PAGINA_VISITA`
--

CREATE TABLE `TB_PAGINA_VISITA` (
  `co_pagina_visita` int(11) NOT NULL,
  `co_visita` int(11) NOT NULL,
  `co_pagina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_PERFIL`
--

CREATE TABLE `TB_PERFIL` (
  `co_perfil` int(11) NOT NULL,
  `no_perfil` varchar(45) CHARACTER SET latin1 NOT NULL COMMENT 'Nome do Perfil',
  `st_status` varchar(1) CHARACTER SET latin1 NOT NULL DEFAULT 'A' COMMENT '''A - Ativo / I - Inativo'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_PERFIL`
--

INSERT INTO `TB_PERFIL` (`co_perfil`, `no_perfil`, `st_status`) VALUES
(1, 'Master', 'A'),
(2, 'Gestor', 'A');

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_PERFIL_ASSINANTE`
--

CREATE TABLE `TB_PERFIL_ASSINANTE` (
  `co_perfil_assinante` int(11) NOT NULL,
  `no_perfil` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_assinante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_PERFIL_FUNCIONALIDADE`
--

CREATE TABLE `TB_PERFIL_FUNCIONALIDADE` (
  `co_perfil_funcionalidade` int(11) NOT NULL,
  `co_funcionalidade` int(11) NOT NULL,
  `co_perfil` int(11) NOT NULL,
  `co_perfil_assinante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_PERFIL_FUNCIONALIDADE`
--

INSERT INTO `TB_PERFIL_FUNCIONALIDADE` (`co_perfil_funcionalidade`, `co_funcionalidade`, `co_perfil`, `co_perfil_assinante`) VALUES
(1, 1, 1, 1),
(2, 45, 2, 1),
(3, 44, 2, 1),
(4, 43, 2, 1),
(5, 42, 2, 1),
(6, 41, 2, 1),
(7, 40, 2, 1),
(8, 39, 2, 1),
(9, 37, 2, 1),
(10, 36, 2, 1),
(12, 34, 2, 1),
(13, 32, 2, 1),
(14, 31, 2, 1),
(15, 30, 2, 1),
(16, 11, 2, 1),
(17, 6, 2, 1),
(19, 35, 2, 1),
(20, 46, 2, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_PESSOA`
--

CREATE TABLE `TB_PESSOA` (
  `co_pessoa` int(11) NOT NULL,
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
-- Despejando dados para a tabela `TB_PESSOA`
--

INSERT INTO `TB_PESSOA` (`co_pessoa`, `nu_cpf`, `no_pessoa`, `nu_rg`, `dt_cadastro`, `dt_nascimento`, `st_sexo`, `co_endereco`, `co_contato`, `co_imagem`) VALUES
(1, '', 'Leo Bessa', '', '2016-10-31 00:00:00', NULL, 'M', 1, 1, 1),
(2, '', 'Usuário Atacadão', '', '2016-10-31 00:00:00', NULL, 'M', 2, 2, 2),
(3, NULL, 'AMAURY RAMOS', NULL, '2023-04-26 10:54:17', NULL, 'M', 3, 3, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_PLANO`
--

CREATE TABLE `TB_PLANO` (
  `co_plano` int(11) NOT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `no_plano` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_mes_ativo` int(1) DEFAULT NULL COMMENT 'Número de meses ativo do plano (1, 3, 6, 12 e 24)',
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'A' COMMENT 'Status do plano A - Ativo / I - Inativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_PLANO_ASSINANTE`
--

CREATE TABLE `TB_PLANO_ASSINANTE` (
  `co_plano_assinante` int(11) NOT NULL COMMENT 'Tabela de Histórico de dados do Plano',
  `nu_valor` decimal(8,2) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_observacao` text COLLATE utf8_unicode_ci,
  `co_plano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_PLANO_ASSINANTE_ASSINATURA`
--

CREATE TABLE `TB_PLANO_ASSINANTE_ASSINATURA` (
  `co_plano_assinante_assinatura` int(11) NOT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_expiracao` date DEFAULT NULL COMMENT 'data de expiriração da assinatura',
  `dt_confirma_pagamento` datetime DEFAULT NULL COMMENT 'Data que confirmou o pagamento',
  `tp_pagamento` int(1) DEFAULT NULL COMMENT '3 - Cartão de Crédito / 4 - Depósito ou Transferência / 5 - Boleto',
  `st_pagamento` int(1) DEFAULT '0' COMMENT '0 - Pendente / 1 - Aguardando pagamento / 2 - Em análise / 3 - Pago / 4 - Disponível / 5 - Em disputa / 6 - Devolvida / 7 - Cancelada',
  `dt_modificado` datetime DEFAULT NULL COMMENT 'Data da ùltima modificação',
  `nu_valor_desconto` decimal(8,2) DEFAULT NULL COMMENT 'Valor de Desconto do PagSeguro',
  `nu_valor_real` decimal(8,2) DEFAULT NULL COMMENT 'Valor de recebimento do PagSeguro\n',
  `ds_link_boleto` text COLLATE utf8_unicode_ci COMMENT 'Link do Boleto que retorno da PagSeguro',
  `nu_filiais` int(11) DEFAULT '0' COMMENT 'Número de filiais para a assinatura',
  `co_plano_assinante_assinatura_ativo` int(11) DEFAULT '0' COMMENT 'Número do co_plano_assinante_assinatura que esta ativo',
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'I' COMMENT 'A - Ativo / I - Inativo',
  `ds_code_transacao` varchar(80) COLLATE utf8_unicode_ci DEFAULT 'null' COMMENT 'Code da transação do PagSeguro',
  `nu_valor_assinatura` decimal(8,2) DEFAULT NULL COMMENT 'Valor final da assinatura',
  `co_assinante` int(11) NOT NULL,
  `co_plano_assinante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_PLANO_PACOTE`
--

CREATE TABLE `TB_PLANO_PACOTE` (
  `co_plano_pacote` int(10) NOT NULL COMMENT 'Planos do Módulo',
  `co_plano` int(11) NOT NULL,
  `co_pacote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_PRODUTO`
--

CREATE TABLE `TB_PRODUTO` (
  `co_produto` int(12) NOT NULL,
  `no_produto` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_descrição` text COLLATE utf8_unicode_ci,
  `dt_cadastro` datetime DEFAULT NULL,
  `tp_unidade_venda` int(1) DEFAULT NULL COMMENT '1 - Unidade / 2 - Pacote / 3 - Cartela'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_PROJETO`
--

CREATE TABLE `TB_PROJETO` (
  `co_projeto` int(11) NOT NULL,
  `no_projeto` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_PROJETO`
--

INSERT INTO `TB_PROJETO` (`co_projeto`, `no_projeto`, `dt_cadastro`) VALUES
(1, 'Atacadão Bessa', '2023-05-19 10:05:57');

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_REPRESENTACAO`
--

CREATE TABLE `TB_REPRESENTACAO` (
  `co_representacao` int(11) NOT NULL,
  `no_representacao` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nu_tel1` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_assinante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_REPRESENTACAO`
--

INSERT INTO `TB_REPRESENTACAO` (`co_representacao`, `no_representacao`, `nu_tel1`, `ds_email`, `co_assinante`) VALUES
(1, 'AMAURY', '', '', 1),
(2, 'XDX INOX', '', '', 1),
(3, 'BAIP', '11947019863', '', 1),
(4, 'CASA GORDÃO', '11911818090', '', 1),
(5, 'MAGAZINE BRÁS', '', '', 1),
(6, 'ELISA MIX IMPORTAÇÃO', '11948131475', '', 1),
(7, 'ABC CHAVEIRO ALEXANDRE', '11977627345', '', 1),
(8, 'SUPERM. ORIENTE', '', '', 1),
(9, 'MARLISON', '', '', 1),
(10, 'TARCIANA', '', '', 1),
(11, 'ERISLUCIA', '', '', 1),
(12, 'CAMARGO E QUEIROZ CONECT', '61984900102', '', 1),
(13, 'NATHAN E CIA', '', '', 1),
(14, 'JOSIAS', '', '', 1),
(15, 'ADJ COMERCIO', '', '', 1),
(16, 'MONISE', '', '', 1),
(17, 'ANDRÉIA ARMARINHO RECANTO', '', '', 1),
(18, 'BAZAR DO ALUNO', '', '', 1),
(19, 'ANDRÉ', '', '', 1),
(20, 'Arnaldo Sócio', '61993003405', '', 1),
(21, 'Leo Sócio', '61993274991', 'leonardomcbessa@gmail.com', 1),
(22, 'Ibanes Fornecedor', '', '', 1),
(23, 'Utilidades Primas Guara', '', '', 1),
(24, 'Brenda novidades', '', '', 1),
(25, 'China Junior', '', '', 1),
(26, 'ivaldo', '', '', 1),
(27, 'Dodô', '', '', 1),
(28, 'Rogério', '', '', 1),
(29, 'Antônia Casa das malas', '', '', 1),
(30, 'Josefino', '', '', 1),
(31, 'FRANKILE', '', '', 1),
(32, 'PAPEL. RAFAS', '', '', 1),
(33, 'ELIANE', '', '', 1),
(34, 'Raiane', '', '', 1),
(35, 'BAZAR DA FAMÍLIA ', '', '', 1),
(36, 'KEVIN MARLEY', '', '', 1),
(37, 'Digg', '', '', 1),
(38, 'CASA DA MOCHILA. LEILANE', '', '', 1),
(39, 'Drogaria PD', '', '', 1),
(40, 'ESTER FARMáCIA E PAPELARIA', '', '', 1),
(41, 'A casa do Portugues', '', '', 1),
(42, 'Central da Construção', '', '', 1),
(43, 'Papelaria Escritiva', '', '', 1),
(44, 'Tina novidades mochilas', '', '', 1),
(45, 'Outlet das Havaianas ', '', '', 1),
(46, 'Rocha turismo ', '', '', 1),
(47, 'Armarinho Scalla', '', '', 1),
(48, 'Panificadora Lindo Pão ', '', '', 1),
(49, 'Colégio CCI ', '', '', 1),
(50, 'Maria R Silva Recanto', '', '', 1),
(51, 'Antônia Taubate', '', '', 1),
(52, 'Lira Recanto ', '', '', 1),
(53, 'Supermercado Lucena', '', '', 1),
(54, 'Supermercado BH', '', '', 1),
(55, 'Ponto Arte', '', '', 1),
(56, 'Eletrica hidraúlica Manjolinho', '', '', 1),
(57, 'Mercado Manjolinho', '', '', 1),
(58, 'Suíno bom', '', '', 1),
(59, 'Shopping das frutas', '', '', 1),
(60, 'Maria Inês recanto', '', '', 1),
(61, 'Priscila e Diego', '', '', 1),
(62, 'JM novidades ', '', '', 1),
(63, 'JM Motos', '', '', 1),
(64, 'Neto matérias de construção', '', '', 1),
(65, 'Panificadora Roma', '', '', 1),
(66, 'Agro vita agropecuária ', '', '', 1),
(67, 'Fátima agropecuária 401', '', '', 1),
(68, 'Junior ideal', '', '', 1),
(69, 'Drogaria Natal', '', '', 1),
(70, 'Br 10 celulares ', '', '', 1),
(71, 'Drogaria Rina', '', '', 1),
(72, 'Mercado bem bom ', '', '', 1),
(73, 'Seu Guilherme ', '', '', 1),
(74, 'Baixinho gás ', '', '', 1),
(75, 'Ok celular ', '', '', 1),
(76, 'Conexão hidráulica ', '', '', 1),
(77, 'Armarinho e papelaria Crucial', '', '', 1),
(78, 'Alcides', '', '', 1),
(79, 'José Antônio ', '', '', 1),
(80, 'Abudabi', '', '', 1),
(81, 'Luciana ferragens ponte alta', '', '', 1),
(82, 'Drogaria ponte alta', '', '', 1),
(83, 'Verdurão Ponte Alta', '', '', 1),
(84, 'Frank Maranhão ', '', '', 1),
(85, 'Socorro felix', '', '', 1),
(86, 'Star papelaria Rogério ', '', '', 1),
(87, 'TOKA DO CRIADOR CEARA', '', '', 1),
(88, 'Jonas hidráulica e elétrica ', '', '', 1),
(89, 'Zé fei discos', '', '', 1),
(90, 'Bazar M Norte Goia', '', '', 1),
(91, 'Qasim utilidades ', '', '', 1),
(92, 'Rosi barracão ', '', '', 1),
(93, 'Lc papelaria ', '', '', 1),
(94, 'Bartofil ', '', '', 1),
(95, 'Fj novidades ', '', '', 1),
(96, 'Dê ', '', '', 1),
(97, 'Josefino', '', '', 1),
(98, 'AGROPET AUAU ELIZABETH ', '', '', 1),
(99, 'Mercado do seu Zé ', '', '', 1),
(100, 'Rosa armarinho ', '', '', 1),
(101, 'Paulo mercadinho psul', '', '', 1),
(102, 'Panificadora Italiana', '', '', 1),
(103, 'Gileno armarinho', '', '', 1),
(104, 'Agropet 504', '', '', 1),
(105, 'Mercadinho Sr. Mauro', '', '', 1),
(106, 'Cap ', '', '', 1),
(107, 'Araujo pereira', '', '', 1),
(108, 'Raimundinha feira permanente ', '', '', 1),
(109, 'Josué informática feira', '', '', 1),
(110, 'Milênio Calçados pedro', '', '', 1),
(111, 'Juarismar Araújo Pereira ', '', '', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_SESSAO`
--

CREATE TABLE `TB_SESSAO` (
  `co_sessao` int(11) NOT NULL,
  `no_sessao` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `co_modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_SESSAO`
--

INSERT INTO `TB_SESSAO` (`co_sessao`, `no_sessao`, `dt_cadastro`, `co_modulo`) VALUES
(1, 'Melhorias', '2022-05-30 12:32:51', 10),
(2, 'Acelerador de Resultados', '2022-05-30 12:32:58', 10),
(3, 'Analitíca', '2022-05-30 12:33:06', 10),
(4, 'Comparador', '2022-05-30 12:33:12', 10),
(5, 'Fluxo Mensal', '2022-05-30 12:33:21', 10),
(6, 'Tutorial', '2022-05-30 12:33:29', 10),
(7, 'Lançamentos', '2022-05-30 12:33:37', 10),
(8, 'Painel Inicial', '2022-05-30 12:33:44', 10),
(9, 'Gestão Anti Crise', '2022-06-18 07:25:26', 10),
(10, 'Pagamento', '2022-06-21 10:48:14', 11),
(11, 'Usuário', '2022-06-21 10:48:19', 11),
(12, 'Complemento do assinante', '2022-06-21 10:48:24', 11),
(13, 'Assinante', '2022-06-21 10:48:29', 11),
(14, 'App e Sistema', '2022-06-21 11:21:50', 12),
(15, 'L - Lançamento', '2022-06-21 11:27:27', 13),
(16, 'PL - Pré Lançamento', '2022-06-21 11:27:35', 13),
(17, 'PPL - Pré Pré Lançamento', '2022-06-21 11:27:43', 13),
(18, 'Gestão Arquitetura', '2022-06-21 22:27:51', 14),
(19, 'Melhorias Arquitetura', '2022-06-21 22:28:03', 14),
(20, 'Lista de itens', '2022-06-24 09:22:59', 15),
(21, 'Lista de Pagamentos', '2022-06-24 09:23:18', 15),
(22, 'Consultoria', '2022-06-24 09:26:20', 16),
(23, 'Cursos Rápidos', '2022-06-24 09:26:32', 16),
(24, 'Cursos Avançados', '2022-06-24 09:26:41', 16),
(25, 'Cursos', '2022-06-24 09:29:20', 12),
(26, 'Planejamento', '2022-06-28 16:48:37', 10),
(27, 'Financiero', '2023-05-21 15:54:31', 17),
(28, 'Compras', '2023-05-21 15:54:40', 17),
(29, 'Vendas', '2023-05-21 15:54:48', 17),
(30, 'Estoque', '2023-05-21 15:54:56', 17);

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_SUPORTE`
--

CREATE TABLE `TB_SUPORTE` (
  `co_suporte` int(11) NOT NULL,
  `st_status` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'A' COMMENT 'A - Ativa / I - Inativa',
  `dt_cadastro` datetime DEFAULT NULL,
  `ds_assunto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_tipo_assunto` int(1) DEFAULT NULL COMMENT '1 - Sugestão ou Melhorias / 2 - Reclamação / 3 -  Correção no Sistema / 4 - Outros',
  `co_assinante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_TRAFEGO`
--

CREATE TABLE `TB_TRAFEGO` (
  `co_trafego` int(11) NOT NULL,
  `nu_ip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_pais` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_code_pais` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_uf` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_estado` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_cidade` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_navegador` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_sistema_operacional` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_dispositivo` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_agente` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_USUARIO`
--

CREATE TABLE `TB_USUARIO` (
  `co_usuario` int(10) NOT NULL,
  `ds_senha` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ds_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Senha criptografada',
  `st_status` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'I' COMMENT '''A - Ativo / I - Inativo''',
  `st_troca_senha` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'N',
  `dt_cadastro` datetime NOT NULL,
  `co_imagem` int(10) NOT NULL,
  `co_pessoa` int(11) NOT NULL,
  `co_assinante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_USUARIO`
--

INSERT INTO `TB_USUARIO` (`co_usuario`, `ds_senha`, `ds_code`, `st_status`, `st_troca_senha`, `dt_cadastro`, `co_imagem`, `co_pessoa`, `co_assinante`) VALUES
(1, '123456**', 'TVRJek5EVTJLaW89', 'A', 'S', '2016-10-31 00:00:00', 1, 1, 0),
(2, '123456**', 'TVRJek5EVTJLaW89', 'A', 'S', '2016-10-31 00:00:00', 2, 2, 1),
(3, '123456**', 'TVRJek5EVTJLaW89', 'A', 'S', '2023-04-26 10:57:31', 3, 3, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_USUARIO_PERFIL`
--

CREATE TABLE `TB_USUARIO_PERFIL` (
  `co_usuario_perfil` int(11) NOT NULL,
  `co_usuario` int(10) NOT NULL,
  `co_perfil` int(11) NOT NULL,
  `co_perfil_assinante` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `TB_USUARIO_PERFIL`
--

INSERT INTO `TB_USUARIO_PERFIL` (`co_usuario_perfil`, `co_usuario`, `co_perfil`, `co_perfil_assinante`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1),
(3, 3, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_VALOR_PRODUTO`
--

CREATE TABLE `TB_VALOR_PRODUTO` (
  `co_valor_produto` int(11) NOT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `nu_valor` float(12,2) DEFAULT NULL,
  `co_negociacao` int(11) NOT NULL,
  `co_produto` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_VISITA`
--

CREATE TABLE `TB_VISITA` (
  `co_visita` int(11) NOT NULL,
  `dt_realizado` datetime DEFAULT NULL,
  `dt_atualizado` datetime DEFAULT NULL,
  `nu_visitas` int(11) DEFAULT NULL,
  `co_trafego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TB_VISITA_CHECKOUT`
--

CREATE TABLE `TB_VISITA_CHECKOUT` (
  `co_visita_checkout` int(11) NOT NULL,
  `co_visita` int(11) NOT NULL,
  `co_checkout` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `TB_ACESSO`
--
ALTER TABLE `TB_ACESSO`
  ADD PRIMARY KEY (`co_acesso`,`co_usuario`,`co_trafego`);

--
-- Índices de tabela `TB_ANOTACAO`
--
ALTER TABLE `TB_ANOTACAO`
  ADD PRIMARY KEY (`co_anotacao`,`co_historia`);

--
-- Índices de tabela `TB_ASSINANTE`
--
ALTER TABLE `TB_ASSINANTE`
  ADD PRIMARY KEY (`co_assinante`,`co_empresa`,`co_pessoa`);

--
-- Índices de tabela `TB_AUDITORIA`
--
ALTER TABLE `TB_AUDITORIA`
  ADD PRIMARY KEY (`co_auditoria`,`co_usuario`);

--
-- Índices de tabela `TB_AUDITORIA_ITENS`
--
ALTER TABLE `TB_AUDITORIA_ITENS`
  ADD PRIMARY KEY (`co_auditoria_itens`,`co_auditoria_tabela`);

--
-- Índices de tabela `TB_AUDITORIA_TABELA`
--
ALTER TABLE `TB_AUDITORIA_TABELA`
  ADD PRIMARY KEY (`co_auditoria_tabela`,`co_auditoria`);

--
-- Índices de tabela `TB_BANCO`
--
ALTER TABLE `TB_BANCO`
  ADD PRIMARY KEY (`co_banco`);

--
-- Índices de tabela `TB_BOTAO`
--
ALTER TABLE `TB_BOTAO`
  ADD PRIMARY KEY (`co_botao`);

--
-- Índices de tabela `TB_CATEGORIA_FC`
--
ALTER TABLE `TB_CATEGORIA_FC`
  ADD PRIMARY KEY (`co_categoria_fc`,`co_assinante`);

--
-- Índices de tabela `TB_CATEGORIA_FC_FILHA`
--
ALTER TABLE `TB_CATEGORIA_FC_FILHA`
  ADD PRIMARY KEY (`co_categoria_fc_filha`,`co_categoria_fc`,`co_assinante`);

--
-- Índices de tabela `TB_CATEGORIA_FC_NETA`
--
ALTER TABLE `TB_CATEGORIA_FC_NETA`
  ADD PRIMARY KEY (`co_categoria_fc_neta`,`co_categoria_fc_filha`,`co_assinante`);

--
-- Índices de tabela `TB_CENTRO_CUSTO`
--
ALTER TABLE `TB_CENTRO_CUSTO`
  ADD PRIMARY KEY (`co_centro_custo`,`co_assinante`);

--
-- Índices de tabela `TB_CHECKOUT`
--
ALTER TABLE `TB_CHECKOUT`
  ADD PRIMARY KEY (`co_checkout`);

--
-- Índices de tabela `TB_CLIQUE`
--
ALTER TABLE `TB_CLIQUE`
  ADD PRIMARY KEY (`co_clique`,`co_botao`);

--
-- Índices de tabela `TB_CONTATO`
--
ALTER TABLE `TB_CONTATO`
  ADD PRIMARY KEY (`co_contato`);

--
-- Índices de tabela `TB_CONTA_BANCARIA`
--
ALTER TABLE `TB_CONTA_BANCARIA`
  ADD PRIMARY KEY (`co_conta_bancaria`,`co_assinante`);

--
-- Índices de tabela `TB_CONTROLLER`
--
ALTER TABLE `TB_CONTROLLER`
  ADD PRIMARY KEY (`co_controller`);

--
-- Índices de tabela `TB_CRONS`
--
ALTER TABLE `TB_CRONS`
  ADD PRIMARY KEY (`co_cron`);

--
-- Índices de tabela `TB_EMPRESA`
--
ALTER TABLE `TB_EMPRESA`
  ADD PRIMARY KEY (`co_empresa`,`co_pessoa`,`co_endereco`,`co_contato`,`co_imagem`);

--
-- Índices de tabela `TB_ENDERECO`
--
ALTER TABLE `TB_ENDERECO`
  ADD PRIMARY KEY (`co_endereco`);

--
-- Índices de tabela `TB_ESTOQUE`
--
ALTER TABLE `TB_ESTOQUE`
  ADD PRIMARY KEY (`co_estoque`,`co_produto`,`co_negociacao`);

--
-- Índices de tabela `TB_FLUXO_CAIXA`
--
ALTER TABLE `TB_FLUXO_CAIXA`
  ADD PRIMARY KEY (`co_fluxo_caixa`,`co_categoria_fc`,`co_categoria_fc_filha`,`co_categoria_fc_neta`,`co_centro_custo`,`co_conta_bancaria`,`co_representacao`,`co_usuario`,`co_assinante`);

--
-- Índices de tabela `TB_FUNCIONALIDADE`
--
ALTER TABLE `TB_FUNCIONALIDADE`
  ADD PRIMARY KEY (`co_funcionalidade`,`co_controller`);

--
-- Índices de tabela `TB_HISTORIA`
--
ALTER TABLE `TB_HISTORIA`
  ADD PRIMARY KEY (`co_historia`,`co_sessao`);

--
-- Índices de tabela `TB_HISTORICO_HISTORIA`
--
ALTER TABLE `TB_HISTORICO_HISTORIA`
  ADD PRIMARY KEY (`co_historico_historia`,`co_historia`);

--
-- Índices de tabela `TB_HISTORICO_PAG_ASSINATURA`
--
ALTER TABLE `TB_HISTORICO_PAG_ASSINATURA`
  ADD PRIMARY KEY (`co_historico_pag_assinatura`,`co_plano_assinante_assinatura`);

--
-- Índices de tabela `TB_HISTORICO_SUPORTE`
--
ALTER TABLE `TB_HISTORICO_SUPORTE`
  ADD PRIMARY KEY (`co_historico_suporte`,`co_suporte`,`co_usuario`,`co_imagem`);

--
-- Índices de tabela `TB_HIST_SALDO_CB`
--
ALTER TABLE `TB_HIST_SALDO_CB`
  ADD PRIMARY KEY (`co_hist_saldo_cb`,`co_conta_bancaria`,`co_usuario`);

--
-- Índices de tabela `TB_HIST_TRANSFERENCIA`
--
ALTER TABLE `TB_HIST_TRANSFERENCIA`
  ADD PRIMARY KEY (`co_hist_transferencia`,`co_conta_bancaria_origem`,`co_conta_bancaria_destino`,`co_usuario`);

--
-- Índices de tabela `TB_IMAGEM`
--
ALTER TABLE `TB_IMAGEM`
  ADD PRIMARY KEY (`co_imagem`);

--
-- Índices de tabela `TB_IMAGEM_ASSINANTE`
--
ALTER TABLE `TB_IMAGEM_ASSINANTE`
  ADD PRIMARY KEY (`co_imagem_assinante`,`co_assinante`,`co_imagem`);

--
-- Índices de tabela `TB_MIDIAS_PRODUTO`
--
ALTER TABLE `TB_MIDIAS_PRODUTO`
  ADD PRIMARY KEY (`co_midias_produto`,`co_imagem`,`co_produto`);

--
-- Índices de tabela `TB_MODULO`
--
ALTER TABLE `TB_MODULO`
  ADD PRIMARY KEY (`co_modulo`,`co_projeto`);

--
-- Índices de tabela `TB_NEGOCIACAO`
--
ALTER TABLE `TB_NEGOCIACAO`
  ADD PRIMARY KEY (`co_negociacao`,`co_produto`,`co_empresa`);

--
-- Índices de tabela `TB_PACOTE`
--
ALTER TABLE `TB_PACOTE`
  ADD PRIMARY KEY (`co_pacote`);

--
-- Índices de tabela `TB_PAGINA`
--
ALTER TABLE `TB_PAGINA`
  ADD PRIMARY KEY (`co_pagina`);

--
-- Índices de tabela `TB_PAGINA_VISITA`
--
ALTER TABLE `TB_PAGINA_VISITA`
  ADD PRIMARY KEY (`co_pagina_visita`,`co_visita`,`co_pagina`);

--
-- Índices de tabela `TB_PERFIL`
--
ALTER TABLE `TB_PERFIL`
  ADD PRIMARY KEY (`co_perfil`);

--
-- Índices de tabela `TB_PERFIL_ASSINANTE`
--
ALTER TABLE `TB_PERFIL_ASSINANTE`
  ADD PRIMARY KEY (`co_perfil_assinante`,`co_assinante`);

--
-- Índices de tabela `TB_PERFIL_FUNCIONALIDADE`
--
ALTER TABLE `TB_PERFIL_FUNCIONALIDADE`
  ADD PRIMARY KEY (`co_perfil_funcionalidade`,`co_funcionalidade`,`co_perfil`,`co_perfil_assinante`);

--
-- Índices de tabela `TB_PESSOA`
--
ALTER TABLE `TB_PESSOA`
  ADD PRIMARY KEY (`co_pessoa`,`co_endereco`,`co_contato`,`co_imagem`);

--
-- Índices de tabela `TB_PLANO`
--
ALTER TABLE `TB_PLANO`
  ADD PRIMARY KEY (`co_plano`);

--
-- Índices de tabela `TB_PLANO_ASSINANTE`
--
ALTER TABLE `TB_PLANO_ASSINANTE`
  ADD PRIMARY KEY (`co_plano_assinante`,`co_plano`);

--
-- Índices de tabela `TB_PLANO_ASSINANTE_ASSINATURA`
--
ALTER TABLE `TB_PLANO_ASSINANTE_ASSINATURA`
  ADD PRIMARY KEY (`co_plano_assinante_assinatura`,`co_assinante`,`co_plano_assinante`);

--
-- Índices de tabela `TB_PLANO_PACOTE`
--
ALTER TABLE `TB_PLANO_PACOTE`
  ADD PRIMARY KEY (`co_plano_pacote`,`co_plano`,`co_pacote`);

--
-- Índices de tabela `TB_PRODUTO`
--
ALTER TABLE `TB_PRODUTO`
  ADD PRIMARY KEY (`co_produto`);

--
-- Índices de tabela `TB_PROJETO`
--
ALTER TABLE `TB_PROJETO`
  ADD PRIMARY KEY (`co_projeto`);

--
-- Índices de tabela `TB_REPRESENTACAO`
--
ALTER TABLE `TB_REPRESENTACAO`
  ADD PRIMARY KEY (`co_representacao`,`co_assinante`);

--
-- Índices de tabela `TB_SESSAO`
--
ALTER TABLE `TB_SESSAO`
  ADD PRIMARY KEY (`co_sessao`,`co_modulo`);

--
-- Índices de tabela `TB_SUPORTE`
--
ALTER TABLE `TB_SUPORTE`
  ADD PRIMARY KEY (`co_suporte`,`co_assinante`);

--
-- Índices de tabela `TB_TRAFEGO`
--
ALTER TABLE `TB_TRAFEGO`
  ADD PRIMARY KEY (`co_trafego`);

--
-- Índices de tabela `TB_USUARIO`
--
ALTER TABLE `TB_USUARIO`
  ADD PRIMARY KEY (`co_usuario`,`co_imagem`,`co_pessoa`,`co_assinante`);

--
-- Índices de tabela `TB_USUARIO_PERFIL`
--
ALTER TABLE `TB_USUARIO_PERFIL`
  ADD PRIMARY KEY (`co_usuario_perfil`,`co_usuario`,`co_perfil`,`co_perfil_assinante`);

--
-- Índices de tabela `TB_VALOR_PRODUTO`
--
ALTER TABLE `TB_VALOR_PRODUTO`
  ADD PRIMARY KEY (`co_valor_produto`,`co_negociacao`,`co_produto`);

--
-- Índices de tabela `TB_VISITA_CHECKOUT`
--
ALTER TABLE `TB_VISITA_CHECKOUT`
  ADD PRIMARY KEY (`co_visita_checkout`,`co_visita`,`co_checkout`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `TB_ACESSO`
--
ALTER TABLE `TB_ACESSO`
  MODIFY `co_acesso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_ANOTACAO`
--
ALTER TABLE `TB_ANOTACAO`
  MODIFY `co_anotacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_ASSINANTE`
--
ALTER TABLE `TB_ASSINANTE`
  MODIFY `co_assinante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `TB_AUDITORIA`
--
ALTER TABLE `TB_AUDITORIA`
  MODIFY `co_auditoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_AUDITORIA_ITENS`
--
ALTER TABLE `TB_AUDITORIA_ITENS`
  MODIFY `co_auditoria_itens` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_AUDITORIA_TABELA`
--
ALTER TABLE `TB_AUDITORIA_TABELA`
  MODIFY `co_auditoria_tabela` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_BOTAO`
--
ALTER TABLE `TB_BOTAO`
  MODIFY `co_botao` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Tabela das informações dos botõs para ir para a págna de venda e dentro da página';

--
-- AUTO_INCREMENT de tabela `TB_CATEGORIA_FC`
--
ALTER TABLE `TB_CATEGORIA_FC`
  MODIFY `co_categoria_fc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `TB_CATEGORIA_FC_FILHA`
--
ALTER TABLE `TB_CATEGORIA_FC_FILHA`
  MODIFY `co_categoria_fc_filha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `TB_CATEGORIA_FC_NETA`
--
ALTER TABLE `TB_CATEGORIA_FC_NETA`
  MODIFY `co_categoria_fc_neta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de tabela `TB_CENTRO_CUSTO`
--
ALTER TABLE `TB_CENTRO_CUSTO`
  MODIFY `co_centro_custo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_CHECKOUT`
--
ALTER TABLE `TB_CHECKOUT`
  MODIFY `co_checkout` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_CLIQUE`
--
ALTER TABLE `TB_CLIQUE`
  MODIFY `co_clique` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_CONTATO`
--
ALTER TABLE `TB_CONTATO`
  MODIFY `co_contato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `TB_CONTA_BANCARIA`
--
ALTER TABLE `TB_CONTA_BANCARIA`
  MODIFY `co_conta_bancaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `TB_CONTROLLER`
--
ALTER TABLE `TB_CONTROLLER`
  MODIFY `co_controller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `TB_CRONS`
--
ALTER TABLE `TB_CRONS`
  MODIFY `co_cron` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `TB_EMPRESA`
--
ALTER TABLE `TB_EMPRESA`
  MODIFY `co_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `TB_ENDERECO`
--
ALTER TABLE `TB_ENDERECO`
  MODIFY `co_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `TB_ESTOQUE`
--
ALTER TABLE `TB_ESTOQUE`
  MODIFY `co_estoque` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_FLUXO_CAIXA`
--
ALTER TABLE `TB_FLUXO_CAIXA`
  MODIFY `co_fluxo_caixa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT de tabela `TB_FUNCIONALIDADE`
--
ALTER TABLE `TB_FUNCIONALIDADE`
  MODIFY `co_funcionalidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `TB_HISTORIA`
--
ALTER TABLE `TB_HISTORIA`
  MODIFY `co_historia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de tabela `TB_HISTORICO_HISTORIA`
--
ALTER TABLE `TB_HISTORICO_HISTORIA`
  MODIFY `co_historico_historia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT de tabela `TB_HISTORICO_PAG_ASSINATURA`
--
ALTER TABLE `TB_HISTORICO_PAG_ASSINATURA`
  MODIFY `co_historico_pag_assinatura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_HISTORICO_SUPORTE`
--
ALTER TABLE `TB_HISTORICO_SUPORTE`
  MODIFY `co_historico_suporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_HIST_SALDO_CB`
--
ALTER TABLE `TB_HIST_SALDO_CB`
  MODIFY `co_hist_saldo_cb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=386;

--
-- AUTO_INCREMENT de tabela `TB_HIST_TRANSFERENCIA`
--
ALTER TABLE `TB_HIST_TRANSFERENCIA`
  MODIFY `co_hist_transferencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `TB_IMAGEM`
--
ALTER TABLE `TB_IMAGEM`
  MODIFY `co_imagem` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `TB_IMAGEM_ASSINANTE`
--
ALTER TABLE `TB_IMAGEM_ASSINANTE`
  MODIFY `co_imagem_assinante` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_MIDIAS_PRODUTO`
--
ALTER TABLE `TB_MIDIAS_PRODUTO`
  MODIFY `co_midias_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_MODULO`
--
ALTER TABLE `TB_MODULO`
  MODIFY `co_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `TB_NEGOCIACAO`
--
ALTER TABLE `TB_NEGOCIACAO`
  MODIFY `co_negociacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_PACOTE`
--
ALTER TABLE `TB_PACOTE`
  MODIFY `co_pacote` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_PAGINA`
--
ALTER TABLE `TB_PAGINA`
  MODIFY `co_pagina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_PAGINA_VISITA`
--
ALTER TABLE `TB_PAGINA_VISITA`
  MODIFY `co_pagina_visita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_PERFIL`
--
ALTER TABLE `TB_PERFIL`
  MODIFY `co_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `TB_PERFIL_ASSINANTE`
--
ALTER TABLE `TB_PERFIL_ASSINANTE`
  MODIFY `co_perfil_assinante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_PERFIL_FUNCIONALIDADE`
--
ALTER TABLE `TB_PERFIL_FUNCIONALIDADE`
  MODIFY `co_perfil_funcionalidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `TB_PESSOA`
--
ALTER TABLE `TB_PESSOA`
  MODIFY `co_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `TB_PLANO`
--
ALTER TABLE `TB_PLANO`
  MODIFY `co_plano` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_PLANO_ASSINANTE`
--
ALTER TABLE `TB_PLANO_ASSINANTE`
  MODIFY `co_plano_assinante` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Tabela de Histórico de dados do Plano';

--
-- AUTO_INCREMENT de tabela `TB_PLANO_ASSINANTE_ASSINATURA`
--
ALTER TABLE `TB_PLANO_ASSINANTE_ASSINATURA`
  MODIFY `co_plano_assinante_assinatura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_PLANO_PACOTE`
--
ALTER TABLE `TB_PLANO_PACOTE`
  MODIFY `co_plano_pacote` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Planos do Módulo';

--
-- AUTO_INCREMENT de tabela `TB_PRODUTO`
--
ALTER TABLE `TB_PRODUTO`
  MODIFY `co_produto` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_PROJETO`
--
ALTER TABLE `TB_PROJETO`
  MODIFY `co_projeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `TB_REPRESENTACAO`
--
ALTER TABLE `TB_REPRESENTACAO`
  MODIFY `co_representacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de tabela `TB_SESSAO`
--
ALTER TABLE `TB_SESSAO`
  MODIFY `co_sessao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `TB_SUPORTE`
--
ALTER TABLE `TB_SUPORTE`
  MODIFY `co_suporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_TRAFEGO`
--
ALTER TABLE `TB_TRAFEGO`
  MODIFY `co_trafego` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_USUARIO`
--
ALTER TABLE `TB_USUARIO`
  MODIFY `co_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `TB_USUARIO_PERFIL`
--
ALTER TABLE `TB_USUARIO_PERFIL`
  MODIFY `co_usuario_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `TB_VALOR_PRODUTO`
--
ALTER TABLE `TB_VALOR_PRODUTO`
  MODIFY `co_valor_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `TB_VISITA_CHECKOUT`
--
ALTER TABLE `TB_VISITA_CHECKOUT`
  MODIFY `co_visita_checkout` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
