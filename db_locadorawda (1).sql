-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/05/2023 às 02:43
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_locadorawda`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluguel`
--

CREATE TABLE `aluguel` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` text NOT NULL,
  `id_livro` int(11) NOT NULL,
  `nome_livro` text NOT NULL,
  `autor_livro` text NOT NULL,
  `editora_livro` text NOT NULL,
  `data_alu` date NOT NULL,
  `data_devo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aluguel`
--

INSERT INTO `aluguel` (`id`, `id_cliente`, `nome_cliente`, `id_livro`, `nome_livro`, `autor_livro`, `editora_livro`, `data_alu`, `data_devo`) VALUES
(2, 1, 'Emanoell Edvan Souza da Silva', 8, 'Dom Quixote', 'Dom Quixote de La Mancha', 'Record', '2023-05-09', '2023-05-29'),
(3, 1, 'Emanoell Edvan Souza da Silva', 5, 'Ao farol', 'Virginia Woolf', 'Rocco', '2023-05-09', '2023-05-30'),
(8, 6, 'José Edilson Freires da Silva', 4, 'Em Busca do Tempo Perdido', 'Marcel Proust', 'Record', '2023-05-09', '2023-05-30'),
(10, 6, 'José Edilson Freires da Silva', 1, 'Imperador das Trevas', 'Ashley darwin', 'Paella', '2023-05-09', '2023-05-22'),
(17, 7, 'Usuario teste1', 3, 'A grande Princesa', 'Ashley darwin', 'Mother', '2023-05-09', '2023-05-23'),
(18, 2, 'Ashley darwin de Souza Duarte', 3, 'A grande Princesa', 'Ashley darwin', 'Mother', '2023-05-09', '2023-05-22'),
(19, 3, 'Juliana Ramos Lopes', 1, 'Imperador das Trevas', 'Ashley darwin', 'Paella', '2023-05-09', '2023-05-24'),
(20, 4, 'Pedro Lucas Portela Carlos', 1, 'Imperador das Trevas', 'Ashley darwin', 'Paella', '2023-05-09', '2023-05-24');

-- --------------------------------------------------------

--
-- Estrutura para tabela `atrasos`
--

CREATE TABLE `atrasos` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` text NOT NULL,
  `id_livro` int(11) NOT NULL,
  `nome_livro` text NOT NULL,
  `autor_livro` text NOT NULL,
  `editora_livro` text NOT NULL,
  `data_alug` date NOT NULL,
  `data_devo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `atrasos`
--

INSERT INTO `atrasos` (`id`, `id_cliente`, `nome_cliente`, `id_livro`, `nome_livro`, `autor_livro`, `editora_livro`, `data_alug`, `data_devo`) VALUES
(4, 7, 'Usuario teste1', 4, 'Em Busca do Tempo Perdido', 'Marcel Proust', 'Record', '2023-05-06', '2023-05-07'),
(5, 7, 'Usuario teste1', 2, 'As tranças do rei careca', 'Juliana Ramos', 'Suma', '2023-05-06', '2023-05-07'),
(6, 7, 'Usuario teste1', 7, 'A Divina Comédia', 'Dante Alighieri', 'Mother', '2023-05-06', '2023-05-07'),
(7, 7, 'Usuario teste1', 3, 'A grande Princesa', 'Ashley darwin', 'Mother', '2023-05-06', '2023-05-07');

-- --------------------------------------------------------

--
-- Estrutura para tabela `controle_devo`
--

CREATE TABLE `controle_devo` (
  `id_controle` int(11) NOT NULL,
  `devolvidos_prazo` int(11) NOT NULL,
  `devolvidos_atraso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `controle_devo`
--

INSERT INTO `controle_devo` (`id_controle`, `devolvidos_prazo`, `devolvidos_atraso`) VALUES
(1, 8, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `editora`
--

CREATE TABLE `editora` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `email` text NOT NULL,
  `telefone` text NOT NULL,
  `site` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `editora`
--

INSERT INTO `editora` (`id`, `nome`, `email`, `telefone`, `site`) VALUES
(1, 'Prado', 'prado@gmail.com', '(85) 9 1111-1111', 'www.prado.com'),
(2, 'Aleph', 'aleph@gmail.com', '(85) 9 2222-2222', 'www.aleph.com'),
(3, 'Queso', 'queso@gmail.com', '(85) 9 3333-3333', 'www.queso.com'),
(4, 'Paella', 'paella@gmail.com', '(85)9 4444-4444', 'www.paella.com'),
(7, 'Mother', 'mother@gmail.com', '(85) 95555-5555', 'www.mother.com'),
(8, 'Rocco', 'rocco@gmail.com', '(85) 96666-6666', 'www.rocco.com'),
(9, 'Record', 'record@gmail.com', '(85) 97777-7777', 'www.record.com'),
(10, 'Suma', 'suma@gmail.com', '(85) 98888-8888', 'www.suma.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro`
--

CREATE TABLE `livro` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `autor` text NOT NULL,
  `editora` text NOT NULL,
  `data_lanca` text NOT NULL,
  `estoque` int(11) NOT NULL,
  `alugados_agr` int(11) NOT NULL,
  `alugados_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livro`
--

INSERT INTO `livro` (`id`, `nome`, `autor`, `editora`, `data_lanca`, `estoque`, `alugados_agr`, `alugados_total`) VALUES
(1, 'Imperador das Trevas', 'Ashley darwin', 'Paella', '2021-03-03', 77, 3, 11),
(3, 'A grande Princesa', 'Ashley darwin', 'Mother', '2022-10-03', 37, 3, 3),
(4, 'Em Busca do Tempo Perdido', 'Marcel Proust', 'Record', '2019-06-07', 68, 2, 2),
(5, 'Ao farol', 'Virginia Woolf', 'Rocco', '2001-06-07', 89, 1, 1),
(6, 'Moby Dick', 'Herman Melville', 'Suma', '1851-07-19', 20, 0, 0),
(7, 'A Divina Comédia', 'Dante Alighieri', 'Mother', '1304-09-01', 9, 1, 1),
(8, 'Dom Quixote', 'Dom Quixote de La Mancha', 'Record', '1605-09-07', 49, 1, 1),
(9, 'As Mil e uma Noites', 'Marcel Proust', 'Mother', '1705-09-06', 0, 0, 0),
(10, 'O Estrangeiro', 'Albert Camus', 'Suma', '1942-09-20', 60, 0, 0),
(11, 'Cem Anos de Solidão', 'Gabriel García', 'Record', '1967-11-07', 10, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `locadora`
--

CREATE TABLE `locadora` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `email` text NOT NULL,
  `senha` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `locadora`
--

INSERT INTO `locadora` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'edvan', 'edvan@gmail.com', '123'),
(2, 'caio', 'caio@gmail.com', '123'),
(3, 'locadorawda', 'wda@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `email` text NOT NULL,
  `celular` text NOT NULL,
  `endereco` text NOT NULL,
  `cpf` text DEFAULT NULL,
  `alugados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `celular`, `endereco`, `cpf`, `alugados`) VALUES
(1, 'Emanoell Edvan Souza da Silva', 'edvan@gmail.com', '(85) 11111-1111', 'segredo', '111.111.111-11', 2),
(2, 'Ashley darwin de Souza Duarte', 'ash@gmail.com', '(85) 22222-2222', 'segredo', '222.222.222-22', 1),
(3, 'Juliana Ramos Lopes', 'juh@gmail.com', '(85) 33333-3333', 'não sei', '333.333.333-33', 1),
(4, 'Pedro Lucas Portela Carlos', 'pedro@gmail.com', '(85) 44444-4444', 'não sei', '444.444.444-44', 1),
(5, 'Maria Luiza de Souza Monteiro', 'maria@gmail.com', '(85) 55555-5555', 'A descobrir', '555.555.555-55', 0),
(6, 'José Edilson Freires da Silva', 'edilson@gmail.com', '(85) 66666-6666', 'A descobrir', '666.666.666-66', 2),
(7, 'Usuario teste1', 'teste1@gmail.com', '(85) 77777-7777', 'não se sabe', '777.777.777-77', 5);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluguel`
--
ALTER TABLE `aluguel`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `atrasos`
--
ALTER TABLE `atrasos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `controle_devo`
--
ALTER TABLE `controle_devo`
  ADD PRIMARY KEY (`id_controle`);

--
-- Índices de tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `locadora`
--
ALTER TABLE `locadora`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluguel`
--
ALTER TABLE `aluguel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `atrasos`
--
ALTER TABLE `atrasos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `controle_devo`
--
ALTER TABLE `controle_devo`
  MODIFY `id_controle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `locadora`
--
ALTER TABLE `locadora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
