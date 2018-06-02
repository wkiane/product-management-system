-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Jun-2018 às 07:28
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'esporte'),
(2, 'escolar'),
(3, 'mobilidade'),
(4, 'gamer'),
(5, 'outro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `descricao` text,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `descricao`, `categoria_id`) VALUES
(1, 'Fusca Azul', '5000.00', 'FUSCA AZUL!!!!!', 3),
(6, 'Caneta Azul', '2.00', 'Descrição deste produto.', 2),
(26, 'blusa', '20.00', 'Descrição deste produto.', 5),
(35, 'pc gamer', '4000.00', 'Descrição deste produto.', 4),
(36, 'golzin', '10000.00', 'Descrição deste produto.', 3),
(38, 'Ferrari', '99999999.99', 'Descrição deste produto.', 3),
(40, 'lapis', '2.00', 'Descrição deste produto.', 2),
(53, 'casaco', '80.00', 'Descrição deste produto.', 5),
(58, 'Casa', '70000.00', 'De frente para o mar.', 5),
(61, 'Caneta Colorida', '4.00', 'Caneta cor de rosa que brilha no escuro', 2),
(62, 'Fone Razer', '500.00', 'Fone Razer 7.1 com luzes coloridas, muito gay comprem.', 4),
(64, 'TV 50 Polegadas', '1500.00', 'Uma tv grandona', 5),
(65, 'Cama de Casal', '250.00', 'Cama de casal barata que quebra atoa, não transem violento nela.', 5),
(66, 'Mouse Razer', '300.00', 'Mouse razer colorido de viado.', 4),
(68, 'Caderno da Barbie', '30.00', 'Caderno da barbie de capa dura.', NULL),
(69, 'Camisa Rosa', '15.00', 'Uma camisa rosa.', 5),
(70, 'Tênis de corrida', '200.00', 'um tênis de corrida ué.', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome_completo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome_completo`, `email`, `senha`, `created_at`, `status`) VALUES
(1, 'willa kiane siqueira de abreu', 'willa@outlook.com', '81dc9bdb52d04dc20036dbd8313ed055', '2018-05-31 21:33:26', 'admin'),
(3, 'laryssa', 'lary@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2018-05-31 22:05:11', 'customer'),
(4, 'denise maria siqueira', 'denise@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2018-06-01 17:06:11', 'customer'),
(5, 'paulo abreu sardinha', 'paulo_abreu@outlook.com', '81dc9bdb52d04dc20036dbd8313ed055', '2018-06-01 17:08:05', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
