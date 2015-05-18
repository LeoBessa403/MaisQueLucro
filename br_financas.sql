-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `br_financas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_dados`
--

CREATE TABLE IF NOT EXISTS `tb_dados` (
  `id_dados` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pessoa` int(10) unsigned NOT NULL,
  `tel1` varchar(15) DEFAULT NULL,
  `tel2` varchar(15) DEFAULT NULL,
  `tel3` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `site` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_dados`),
  KEY `tb_dados_FKIndex1` (`id_pessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tb_dados`
--

INSERT INTO `tb_dados` (`id_dados`, `id_pessoa`, `tel1`, `tel2`, `tel3`, `email`, `site`) VALUES
(2, 2, '(66) 6666-6666', '(11) 1111-1111', '(99) 9999-9999', '', 'www.bartofil.com.br'),
(3, 3, '(61) 3374-2126', '(61) 3374-2126', '(61) 3374-2126', 'contato@opcaoatacadista.com.br', 'www.casalimautilidades.com.br'),
(4, 4, '(11) 3546-5000', '(11) 3546-5000', '(11) 3546-5000', '', 'www.casadolojista.com.br'),
(5, 5, '(46) 5466-5226', '(65) 5666-5959', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_entidade`
--

CREATE TABLE IF NOT EXISTS `tb_entidade` (
  `id_entidade` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `observacao` varchar(255) DEFAULT NULL,
  `cadastro` datetime DEFAULT NULL,
  `tipo_entidade` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_entidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tb_entidade`
--

INSERT INTO `tb_entidade` (`id_entidade`, `observacao`, `cadastro`, `tipo_entidade`) VALUES
(2, '', '2014-12-04 17:14:22', 'C'),
(3, '', '2014-12-04 17:26:10', 'R'),
(4, '', '2014-12-04 17:27:21', 'R'),
(5, '', '2014-12-05 16:20:29', 'C');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_negociacao`
--

CREATE TABLE IF NOT EXISTS `tb_negociacao` (
  `id_negociacao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_entidade` int(10) unsigned NOT NULL,
  `cadastro` datetime DEFAULT NULL,
  `tipo_negociacao` varchar(2) DEFAULT NULL,
  `observacao` text,
  PRIMARY KEY (`id_negociacao`),
  KEY `tb_negociacao_FKIndex1` (`id_entidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_negociacao`
--

INSERT INTO `tb_negociacao` (`id_negociacao`, `id_entidade`, `cadastro`, `tipo_negociacao`, `observacao`) VALUES
(1, 5, '2014-12-09 10:45:36', 'PG', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pagamento`
--

CREATE TABLE IF NOT EXISTS `tb_pagamento` (
  `id_pagamento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_negociacao` int(10) unsigned NOT NULL,
  `tipo_pagamento` varchar(2) DEFAULT NULL,
  `valor_pago` decimal(10,2) DEFAULT NULL,
  `valor_total` decimal(10,2) DEFAULT NULL,
  `situacao` varchar(1) DEFAULT NULL,
  `numero_parcelas` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_pagamento`),
  KEY `tb_pagamento_FKIndex1` (`id_negociacao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_pagamento`
--

INSERT INTO `tb_pagamento` (`id_pagamento`, `id_negociacao`, `tipo_pagamento`, `valor_pago`, `valor_total`, `situacao`, `numero_parcelas`) VALUES
(1, 1, 'CH', 0.00, 1005.49, 'F', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_parcelamento`
--

CREATE TABLE IF NOT EXISTS `tb_parcelamento` (
  `id_parcelamento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pagamento` int(10) unsigned NOT NULL,
  `parcela` int(10) unsigned NOT NULL,
  `valor_parcela` decimal(10,2) DEFAULT NULL,
  `valor_parcela_pago` decimal(10,2) DEFAULT NULL,
  `vencimento` date DEFAULT NULL,
  `vencimento_pago` date DEFAULT NULL,
  `observacao_parcela` text,
  PRIMARY KEY (`id_parcelamento`),
  KEY `tb_parcelamento_FKIndex1` (`id_pagamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `tb_parcelamento`
--

INSERT INTO `tb_parcelamento` (`id_parcelamento`, `id_pagamento`, `parcela`, `valor_parcela`, `valor_parcela_pago`, `vencimento`, `vencimento_pago`, `observacao_parcela`) VALUES
(17, 1, 1, 201.10, 210.25, '2014-12-03', '2014-12-10', ''),
(18, 1, 2, 201.10, 216.00, '2014-12-16', '2014-12-10', ''),
(19, 1, 3, 201.10, 210.00, '2014-12-29', '2014-12-10', ''),
(20, 1, 4, 201.10, 210.00, '2015-01-11', '2014-12-10', ''),
(21, 1, 5, 201.10, 210.00, '2015-01-24', '2014-12-10', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pessoa`
--

CREATE TABLE IF NOT EXISTS `tb_pessoa` (
  `id_pessoa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_entidade` int(10) unsigned NOT NULL,
  `nome_razao` varchar(200) DEFAULT NULL,
  `cpf_cnpj` varchar(18) DEFAULT NULL,
  `tipo_pessoa` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_pessoa`),
  KEY `tb_pessoa_FKIndex1` (`id_entidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tb_pessoa`
--

INSERT INTO `tb_pessoa` (`id_pessoa`, `id_entidade`, `nome_razao`, `cpf_cnpj`, `tipo_pessoa`) VALUES
(2, 2, 'credor 10', '', 'J'),
(3, 3, 'Mundial Center Atacadista ltda Mundial', '123.456.789-09', 'F'),
(4, 4, 'Casa lima com. de util. e ferramentas Casa Lima', '', 'J'),
(5, 5, 'credor 10103', '', 'J');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `perfil` text COLLATE utf8_unicode_ci NOT NULL,
  `ultimo_acesso` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_user`
--

INSERT INTO `tb_user` (`id`, `nome`, `login`, `senha`, `code`, `perfil`, `ultimo_acesso`) VALUES
(1, 'Leonardo M C Bessa', 'leobessa', '123456', '123456', 'administrador, todo_acesso', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
