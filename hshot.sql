-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 03-Out-2025 às 16:08
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
-- Estrutura da tabela `capitulos`
--

DROP TABLE IF EXISTS `capitulos`;
CREATE TABLE IF NOT EXISTS `capitulos` (
  `id_c` int NOT NULL AUTO_INCREMENT,
  `quant_c` int NOT NULL,
  PRIMARY KEY (`id_c`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `capitulos`
--

INSERT INTO `capitulos` (`id_c`, `quant_c`) VALUES
(1, 50),
(2, 40),
(3, 27),
(4, 36),
(5, 34),
(6, 24),
(7, 21),
(8, 4),
(9, 31),
(10, 24),
(11, 22),
(12, 25),
(13, 29),
(14, 36),
(15, 10),
(16, 13),
(17, 10),
(18, 42),
(19, 150),
(20, 31),
(21, 12),
(22, 8),
(23, 66),
(24, 53),
(25, 5),
(26, 48),
(27, 12),
(28, 14),
(29, 3),
(30, 9),
(31, 1),
(32, 4),
(33, 7),
(34, 3),
(35, 3),
(36, 3),
(37, 2),
(38, 14),
(39, 4),
(40, 28),
(41, 16),
(42, 24),
(43, 21),
(44, 28),
(45, 16),
(46, 16),
(47, 13),
(48, 6),
(49, 6),
(50, 4),
(51, 4),
(52, 5),
(53, 3),
(54, 6),
(55, 4),
(56, 3),
(57, 1),
(58, 13),
(59, 5),
(60, 5),
(61, 3),
(62, 5),
(63, 1),
(64, 1),
(65, 1),
(66, 22);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

DROP TABLE IF EXISTS `livros`;
CREATE TABLE IF NOT EXISTS `livros` (
  `id_l` int NOT NULL AUTO_INCREMENT,
  `nome_livro` varchar(40) NOT NULL,
  `testa_livro` varchar(40) NOT NULL,
  PRIMARY KEY (`id_l`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id_l`, `nome_livro`, `testa_livro`) VALUES
(1, 'Gênesis', 'Antigo Testamento'),
(2, 'Êxodo', 'Antigo Testamento'),
(3, 'Levítico', 'Antigo Testamento'),
(4, 'Números', 'Antigo Testamento'),
(5, 'Deuteronômio', 'Antigo Testamento'),
(6, 'Josué', 'Antigo Testamento'),
(7, 'Juízes', 'Antigo Testamento'),
(8, 'Rute', 'Antigo Testamento'),
(9, '1 Samuel', 'Antigo Testamento'),
(10, '2 Samuel', 'Antigo Testamento'),
(11, '1 Reis', 'Antigo Testamento'),
(12, '2 Reis', 'Antigo Testamento'),
(13, '1 Crônicas', 'Antigo Testamento'),
(14, '2 Crônicas', 'Antigo Testamento'),
(15, 'Esdras', 'Antigo Testamento'),
(16, 'Neemias', 'Antigo Testamento'),
(17, 'Ester', 'Antigo Testamento'),
(18, 'Jó', 'Antigo Testamento'),
(19, 'Salmos', 'Antigo Testamento'),
(20, 'Provérbios', 'Antigo Testamento'),
(21, 'Eclesiastes', 'Antigo Testamento'),
(22, 'Cânticos', 'Antigo Testamento'),
(23, 'Isaías', 'Antigo Testamento'),
(24, 'Jeremias', 'Antigo Testamento'),
(25, 'Lamentações', 'Antigo Testamento'),
(26, 'Ezequiel', 'Antigo Testamento'),
(27, 'Daniel', 'Antigo Testamento'),
(28, 'Oséias', 'Antigo Testamento'),
(29, 'Joel', 'Antigo Testamento'),
(30, 'Amós', 'Antigo Testamento'),
(31, 'Obadias', 'Antigo Testamento'),
(32, 'Jonas', 'Antigo Testamento'),
(33, 'Miquéias', 'Antigo Testamento'),
(34, 'Naum', 'Antigo Testamento'),
(35, 'Habacuque', 'Antigo Testamento'),
(36, 'Sofonias', 'Antigo Testamento'),
(37, 'Ageu', 'Antigo Testamento'),
(38, 'Zararias', 'Antigo Testamento'),
(39, 'Malaquias', 'Antigo Testamento'),
(40, 'Mateus', 'Novo Testamento'),
(41, 'Marcos', 'Novo Testamento'),
(42, 'Lucas', 'Novo Testamento'),
(43, 'João', 'Novo Testamento'),
(44, 'Atos', 'Novo Testamento'),
(45, 'Romanos', 'Novo Testamento'),
(46, '1 Coríntios', 'Novo Testamento'),
(47, '2 Coríntios', 'Novo Testamento'),
(48, 'Gálatas', 'Novo Testamento'),
(49, 'Efésios', 'Novo Testamento'),
(50, 'Filipenses', 'Novo Testamento'),
(51, 'Colossenses', 'Novo Testamento'),
(52, '1 Tessalonicenses', 'Novo Testamento'),
(53, '2 Tessalocicenses', 'Novo Testamento'),
(54, '1 Timóteo', 'Novo Testamento'),
(55, '2 Timóteo', 'Novo Testamento'),
(56, 'Tito', 'Novo Testamento'),
(57, 'Filemon', 'Novo Testamento'),
(58, 'Hebreus', 'Novo Testamento'),
(59, 'Tiago', 'Novo Testamento'),
(60, '1 Pedro', 'Novo Testamento'),
(61, '2 Pedro', 'Novo Testamento'),
(62, '1 João', 'Novo Testamento'),
(63, '2 João', 'Novo Testamento'),
(64, '3 João', 'Novo Testamento'),
(65, 'Judas', 'Novo Testamento'),
(66, 'Apocalipse', 'Novo Testamento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros`
--

DROP TABLE IF EXISTS `membros`;
CREATE TABLE IF NOT EXISTS `membros` (
  `id_membro` int NOT NULL AUTO_INCREMENT,
  `IP_membro` varchar(200) NOT NULL,
  `nome_membro` varchar(200) DEFAULT 'Novo Membro',
  `nasc_membro` date DEFAULT NULL,
  `email_membro` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_membro`),
  UNIQUE KEY `email_membro` (`email_membro`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `membros`
--

INSERT INTO `membros` (`id_membro`, `IP_membro`, `nome_membro`, `nasc_membro`, `email_membro`) VALUES
(1, '::1', 'Novo Membro', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `meus_propositos`
--

DROP TABLE IF EXISTS `meus_propositos`;
CREATE TABLE IF NOT EXISTS `meus_propositos` (
  `id_mp` int NOT NULL AUTO_INCREMENT,
  `id_pl_mp` int NOT NULL,
  `nome_mp` varchar(200) NOT NULL,
  `desc_mp` text,
  `dataCriacao_mp` date DEFAULT '0000-00-00',
  `dataAcabar_mp` date DEFAULT '0000-00-00',
  `baseBiblica_mp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status_mp` enum('Ligado','Desligado') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Ligado',
  `IP_mp` varchar(200) NOT NULL,
  PRIMARY KEY (`id_mp`),
  UNIQUE KEY `nome_mp` (`nome_mp`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `meus_propositos`
--

INSERT INTO `meus_propositos` (`id_mp`, `id_pl_mp`, `nome_mp`, `desc_mp`, `dataCriacao_mp`, `dataAcabar_mp`, `baseBiblica_mp`, `status_mp`, `IP_mp`) VALUES
(3, 11, 'Um Coração Circuncidado', 'Romanos abre os olhos espirituais de todo filho de Deus!', '2025-09-24', '2025-10-24', 'Romanos 2:29', 'Ligado', '::1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pl_inserircap`
--

DROP TABLE IF EXISTS `pl_inserircap`;
CREATE TABLE IF NOT EXISTS `pl_inserircap` (
  `id_ic` int NOT NULL AUTO_INCREMENT,
  `id_l` int DEFAULT NULL,
  `id_pl` int NOT NULL,
  `quant_ic` int DEFAULT NULL,
  `data_ic` date DEFAULT NULL,
  `IP_mem_ic` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_ic`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `pl_inserircap`
--

INSERT INTO `pl_inserircap` (`id_ic`, `id_l`, `id_pl`, `quant_ic`, `data_ic`, `IP_mem_ic`) VALUES
(7, 45, 11, 1, '2025-09-24', '::1'),
(6, 45, 11, 1, '2025-09-23', '::1'),
(8, 45, 11, 1, '2025-09-25', '::1'),
(15, 45, 11, 1, '2025-09-27', '::1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `processo_leitura`
--

DROP TABLE IF EXISTS `processo_leitura`;
CREATE TABLE IF NOT EXISTS `processo_leitura` (
  `id_pl` int NOT NULL AUTO_INCREMENT,
  `id_l` int NOT NULL,
  `titulo_pl` varchar(100) NOT NULL,
  `desc_pl` text,
  `data_ini_pl` date DEFAULT NULL,
  `data_fim_pl` date DEFAULT NULL,
  `status_pl` enum('Aberto','Finalizado') DEFAULT NULL,
  `IP_mem` varchar(200) NOT NULL,
  PRIMARY KEY (`id_pl`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `processo_leitura`
--

INSERT INTO `processo_leitura` (`id_pl`, `id_l`, `titulo_pl`, `desc_pl`, `data_ini_pl`, `data_fim_pl`, `status_pl`, `IP_mem`) VALUES
(11, 45, 'De Volta pra Casa', 'Caminho de preparação', '2025-09-23', NULL, 'Aberto', '::1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `versiculos_destacados`
--

DROP TABLE IF EXISTS `versiculos_destacados`;
CREATE TABLE IF NOT EXISTS `versiculos_destacados` (
  `id_vd` int NOT NULL AUTO_INCREMENT,
  `id_pl` int DEFAULT NULL,
  `cap_vd` int DEFAULT NULL,
  `vers_cs` varchar(10) DEFAULT NULL,
  `versiculo_ic` text,
  `pensamento_ic` text,
  `IP_mem_vd` varchar(200) NOT NULL,
  PRIMARY KEY (`id_vd`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `versiculos_destacados`
--

INSERT INTO `versiculos_destacados` (`id_vd`, `id_pl`, `cap_vd`, `vers_cs`, `versiculo_ic`, `pensamento_ic`, `IP_mem_vd`) VALUES
(3, 11, 1, '8-9', '⁸ Antes de tudo, sou grato a meu Deus, mediante Jesus Cristo, por todos vocês, porque em todo o mundo está sendo anunciada a fé que vocês têm. \n\nRomanos 1:8', 'Quero fazer dessa a minha oração de agradecimento, não sei orar. Nada mais justo do que orar a bíblia', '::1'),
(4, 11, 5, '3-4', '³ E não somente isto, mas também nos gloriamos nas tribulações; sabendo que a tribulação produz a paciência,\n⁴ E a paciência a experiência, e a experiência a esperança. \n\nRomanos 5:3,4', 'Versículo destacado', '::1'),
(5, 11, 5, '18-19', '¹⁸ Pois assim como por uma só ofensa veio o juízo sobre todos os homens para condenação, assim também por um só ato de justiça veio a graça sobre todos os homens para justificação de vida.\n¹⁹ Porque, como pela desobediência de um só homem, muitos foram feitos pecadores, assim pela obediência de um muitos serão feitos justos. \n\nRomanos 5:18,19', 'Versículo Destacado', '::1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `versiculo_do_dia`
--

DROP TABLE IF EXISTS `versiculo_do_dia`;
CREATE TABLE IF NOT EXISTS `versiculo_do_dia` (
  `id_vdd` int NOT NULL AUTO_INCREMENT,
  `ref_vdd` varchar(50) NOT NULL,
  `vers_vdd` text,
  PRIMARY KEY (`id_vdd`),
  UNIQUE KEY `id_vdd` (`id_vdd`),
  UNIQUE KEY `ref_vdd` (`ref_vdd`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `versiculo_do_dia`
--

INSERT INTO `versiculo_do_dia` (`id_vdd`, `ref_vdd`, `vers_vdd`) VALUES
(1, 'Mateus 10:16', '¹⁶ Eis que vos envio como ovelhas ao meio de lobos; portanto, sede prudentes como as serpentes e inofensivos como as pombas.'),
(2, 'Hebrueus 5:13-14', 'Quem se alimenta de leite ainda é criança e não tem experiência no ensino da justiça. 14No entanto, o alimento sólido é para os adultos, os quais, pelo exercício constante, se tornaram aptos para discernir tanto o bem quanto o mal.'),
(3, 'Salmos 50:14-15', '“Ofereça a Deus em sacrifício a sua gratidão, cumpra os seus votos para com o Altíssimo! Clame a mim no dia da angústia; eu o livrarei, e você me honrará.”'),
(4, 'Obadias 1:3-4', 'Orgulho do seu coração o tem enganado, você que vive nas fendas das rochas e na sua elevada morada; que diz a você mesmo: ‘Quem pode me derrubar?’. Ainda que você suba tão alto como a águia e faça o seu ninho entre as estrelas, de lá eu o derrubarei”, declara o Senhor.'),
(5, '2 João 1:5-6', 'E agora, senhora, peço — não como se estivesse escrevendo um mandamento novo, mas o que já tínhamos desde o princípio — que amemos uns aos outros. Nisto consiste o amor: que andemos em obediência aos seus mandamentos. Como vocês já têm ouvido desde o princípio, o mandamento é este: andem em amor.'),
(6, '2 João 1:9-10', 'Todo aquele que não permanece no ensino de Cristo, mas vai além dele, não tem Deus; aquele que permanece no ensino tem o Pai e também o Filho. 10Se alguém vier a vocês e não trouxer esse ensino, não o recebam em casa nem o saúdem.'),
(7, 'Ageu 2:4', 'Coragem, Zorobabel!”, declara o Senhor. “Coragem, sumo sacerdote Josué, filho de Jeozadaque. Coragem, ó povo da terra”, declara o Senhor. “Ao trabalho! Pois eu estou com vocês”, declara o Senhor dos Exércitos. '),
(8, 'Ageu 2:10-14', 'No vigésimo quarto dia do nono mês, no segundo ano do reinado de Dario, a palavra do Senhor veio ao profeta Ageu: ― Assim diz o Senhor dos Exércitos: “Faça aos sacerdotes a seguinte pergunta sobre a lei: 12‘Se alguém levar carne consagrada na borda das suas vestes e com elas tocar em pão, ou em algo cozido, ou em vinho, ou em azeite, ou em qualquer comida, isso ficará consagrado?’ ”Os sacerdotes responderam: ― Não. Em seguida, Ageu perguntou: ― Se alguém ficar impuro por tocar em cadáver e, depois, tocar em alguma dessas coisas, ela ficará impura? ― Sim — responderam os sacerdotes —, ficará impura. Então, Ageu replicou: ― Declara o Senhor: “Assim é este povo e esta nação diante de mim. Tudo o que fazem e tudo o que me oferecem é impuro.'),
(9, 'Mateus 21:43', 'Portanto, eu digo que o reino de Deus será tirado de vocês e entregue a um povo que dê os frutos do reino'),
(10, 'Salmos 3:3-4', 'Porém tu, Senhor, és um escudo para mim, a minha glória, e o que exalta a minha cabeça. Com a minha voz clamei ao Senhor, e ouviu-me desde o seu santo monte. (Selá.)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `versiculo_grifado`
--

DROP TABLE IF EXISTS `versiculo_grifado`;
CREATE TABLE IF NOT EXISTS `versiculo_grifado` (
  `id_gf` int NOT NULL AUTO_INCREMENT,
  `ref_gf` varchar(20) DEFAULT NULL,
  `vers_gf` text,
  `limite_gf` date NOT NULL,
  PRIMARY KEY (`id_gf`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `versiculo_grifado`
--

INSERT INTO `versiculo_grifado` (`id_gf`, `ref_gf`, `vers_gf`, `limite_gf`) VALUES
(8, 'Salmos 50:14-15', '“Ofereça a Deus em sacrifício a sua gratidão, cumpra os seus votos para com o Altíssimo! Clame a mim no dia da angústia; eu o livrarei, e você me honrará.”', '2025-10-04');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `versiculo_do_dia`
--
ALTER TABLE `versiculo_do_dia` ADD FULLTEXT KEY `vers_vdd` (`vers_vdd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
