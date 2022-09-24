-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Set-2022 às 16:52
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `luiza`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `funcao` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `nome`, `nickname`, `email`, `senha`, `endereco`, `uf`, `telefone`, `funcao`) VALUES
(1, 'Clara Machado ', 'clara', 'claramachado@gmail.com', 'clarinha123', 'Rua dos Pardais, bairro Miranda, número 56', 'SP', '(11) 9988947576', 'cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfunc`
--

CREATE TABLE `tbfunc` (
  `idFunc` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `funcao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbfunc`
--

INSERT INTO `tbfunc` (`idFunc`, `email`, `senha`, `nome`, `funcao`) VALUES
(1, 'micaelpinard@luizapasteis.com', '12345678', 'Micael', 'gerente'),
(2, 'luizaleoni@luizapasteis.com ', 'luiza123', 'Luiza', 'gerente'),
(3, 'nicolasgodoy@luizapasteis.com', '123456789', 'Nicolas', 'vendedor'),
(5, 'viniciusoliveira@luizapasteis.com', 'vini1234', 'Vinicius ', 'caixa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpedido`
--

CREATE TABLE `tbpedido` (
  `idPedito` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `data` date NOT NULL,
  `precoPago` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbproduto`
--

CREATE TABLE `tbproduto` (
  `idProduto` int(11) NOT NULL,
  `produto` varchar(30) NOT NULL,
  `descricaoProduto` varchar(100) NOT NULL,
  `precoVenda` decimal(10,2) NOT NULL,
  `promocao` char(1) NOT NULL,
  `precoPromocao` decimal(10,2) NOT NULL,
  `nomeFoto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbproduto`
--

INSERT INTO `tbproduto` (`idProduto`, `produto`, `descricaoProduto`, `precoVenda`, `promocao`, `precoPromocao`, `nomeFoto`) VALUES
(1, 'Pizzael', 'Presunto, queijo, tomate e requeijão', '10.00', 'n', '8.00', 'pizzael.png'),
(2, 'Calagodoy', 'Calabresa, catupiry, azeitona e cebola', '11.00', 'n', '9.00', 'caladoy.png'),
(3, 'Carlo', 'Carne, tomate e azeitona ', '8.00', 'n', '6.00', 'carlo.png'),
(4, 'Franchini', 'Frango, catupiry, cheddar e bacon', '12.00', 'n', '10.00', 'franchini.png'),
(5, 'Lilombo ', 'Lombo, mozarela e tomate', '12.00', 'n', '10.00', 'lilombo.png'),
(6, 'Palmigas', 'Palmito, tomate e queijo', '13.00', 'n', '11.00', 'palmigas.png'),
(7, 'Brocaceres', 'Brócolis, bacon e queijo ', '12.00', 'n', '10.00', 'brocaceres.png'),
(8, 'Baconamo', 'Parmesão, bacon e mozarela', '10.00', 'n', '8.00', 'baconamo.png'),
(9, 'Portugu', 'Presunto, queijo e ovo', '10.00', 'n', '8.00', 'portugu.png'),
(10, 'Chocoiza', 'Chocolate e banana', '10.00', 'n', '8.00', 'chocoiza.png'),
(11, 'Cesta de Pastéis', 'Cesta de pastéis com 5 sabores de cada pastel', '85.00', 's', '55.00', 'pastel.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbfunc`
--
ALTER TABLE `tbfunc`
  ADD PRIMARY KEY (`idFunc`);

--
-- Índices para tabela `tbpedido`
--
ALTER TABLE `tbpedido`
  ADD PRIMARY KEY (`idPedito`);

--
-- Índices para tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  ADD PRIMARY KEY (`idProduto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbfunc`
--
ALTER TABLE `tbfunc`
  MODIFY `idFunc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbpedido`
--
ALTER TABLE `tbpedido`
  MODIFY `idPedito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
