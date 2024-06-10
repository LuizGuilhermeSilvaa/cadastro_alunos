-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/06/2024 às 20:45
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_alunos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `id_aluno` int(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `idade` int(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `nome`, `idade`, `genero`, `curso`) VALUES
(21, 'Maycon', 26, 'Masculino', 'Progmador Senior'),
(22, 'Vitor', 30, 'Masculino', 'Gestão'),
(23, 'Carol', 20, 'Feminino', 'adm'),
(29, 'Luiz Guilherme', 18, 'Masculino', 'Progamação em Nuvem'),
(30, 'Carla', 25, 'Feminino', 'aux.Administrativo'),
(31, 'Adriana Brandão', 36, 'Feminino', 'Pedagogo'),
(32, 'Sergio', 38, 'Masculino', 'Flutter');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`),
  ADD UNIQUE KEY `user` (`nome`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
