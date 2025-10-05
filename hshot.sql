-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 05-Out-2025 às 20:12
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hshot`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comunidades`
--

DROP TABLE IF EXISTS `comunidades`;
CREATE TABLE IF NOT EXISTS `comunidades` (
  `id_com` int NOT NULL AUTO_INCREMENT,
  `nome_com` varchar(200) DEFAULT NULL,
  `desc_com` text,
  `dataCriacao_com` date DEFAULT NULL,
  `imagem_com` varchar(200) DEFAULT 'versiculo-do-dia.jpg',
  `status_com` enum('Ativo','Inativo') DEFAULT 'Inativo',
  `regras_com` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_com`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `comunidades`
--

INSERT INTO `comunidades` (`id_com`, `nome_com`, `desc_com`, `dataCriacao_com`, `imagem_com`, `status_com`, `regras_com`) VALUES
(1, '1 Comunidade', 'Olá, Mundo!', '2025-10-05', 'HS.png', 'Inativo', NULL),
(2, '1 Comunidade', 'Olá, Mundo!', '2025-10-05', 'HS.png', 'Inativo', NULL),
(3, '1 Comunidade', 'Olá, Mundo!', '2025-10-05', 'HS.png', 'Inativo', NULL),
(4, '1 Comunidade', 'Olá, Mundo!', '2025-10-05', 'HS.png', 'Inativo', NULL),
(5, '1 Comunidade', 'Olá, Mundo!', '2025-10-05', 'HS.png', 'Inativo', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
