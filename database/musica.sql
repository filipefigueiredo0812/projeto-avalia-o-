-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Jan-2021 às 18:27
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `albuns`
--

CREATE TABLE `albuns` (
  `id_album` int(11) NOT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_genero` int(11) NOT NULL,
  `id_musico` int(11) DEFAULT NULL,
  `data_lancamento` date DEFAULT NULL,
  `observacoes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `albuns`
--

INSERT INTO `albuns` (`id_album`, `titulo`, `id_genero`, `id_musico`, `data_lancamento`, `observacoes`, `updated_at`, `created_at`) VALUES
(1, 'Reflexo', 1, 1, '2016-05-26', 'Muito Bom', NULL, NULL),
(2, 'Minho Trapstar', 1, 2, '2019-09-22', 'O melhor.', NULL, NULL),
(3, 'Thiller', 2, 3, '1980-11-30', 'Foi bom', NULL, NULL),
(4, 'The First Story: Tunes for Lovers', 3, 4, '2018-07-20', 'Bom estilo musical.', NULL, NULL),
(5, 'And so We Danced', 3, 4, '2019-01-15', 'Bom estilo musical.', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL,
  `designacao` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacoes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `generos`
--

INSERT INTO `generos` (`id_genero`, `designacao`, `observacoes`, `created_at`, `updated_at`) VALUES
(1, 'Rap', NULL, NULL, NULL),
(2, 'Pop', NULL, NULL, NULL),
(3, 'Lo-Fi', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `musicas`
--

CREATE TABLE `musicas` (
  `id_musica` int(11) NOT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_musico` int(11) DEFAULT NULL,
  `id_genero` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `id_album` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `musicas`
--

INSERT INTO `musicas` (`id_musica`, `titulo`, `id_musico`, `id_genero`, `updated_at`, `created_at`, `id_album`) VALUES
(1, 'Sonhar Nesta Vida', 1, 1, NULL, NULL, 1),
(2, 'Protagonista', 1, 1, NULL, NULL, 1),
(3, 'Romarias', 2, 1, NULL, NULL, 2),
(4, 'Castolo', 2, 1, NULL, NULL, 2),
(5, 'Baby Be Mine', 3, 2, NULL, NULL, 3),
(6, 'The Girl is Mine', 3, 2, NULL, NULL, 3),
(7, 'A Steady Beginning', 4, 3, NULL, NULL, 4),
(8, 'This Is What Happens', 4, 3, NULL, NULL, 4),
(9, 'Nightmares', 4, 3, NULL, NULL, 5),
(10, 'Blue Light', 4, 3, NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `musicos`
--

CREATE TABLE `musicos` (
  `id_musico` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nacionalidade` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_nascimento` datetime DEFAULT NULL,
  `fotografia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `musicos`
--

INSERT INTO `musicos` (`id_musico`, `nome`, `nacionalidade`, `data_nascimento`, `fotografia`, `updated_at`, `created_at`) VALUES
(1, 'Dillaz', 'Português', '1993-08-15 00:00:00', 'Foto1', NULL, NULL),
(2, 'Chico da Tina', 'Português', '1996-06-11 00:00:00', 'Foto3', NULL, NULL),
(3, 'Michael Jackson', 'Norte-Americano', '1958-08-29 00:00:00', 'Foto2', NULL, NULL),
(4, 'Peachy!', 'Norte-Americano', '2001-02-22 00:00:00', 'Foto4', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal' COMMENT 'admin ou normal',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `tipo_user`, `remember_token`, `created_at`, `updated_at`, `id_user`) VALUES
(1, 'Filipe', 'filipe1234@gmail.com', NULL, '$2y$10$mCN.2EYZJi97YalH1RZ/C.lMrkuRzEXdTWjsQQgInrJwkjEOOApd2', 'admin', NULL, '2021-01-08 17:10:03', '2021-01-08 17:10:03', NULL),
(2, 'Alberto', 'alberto1234@gmail.com', NULL, '$2y$10$6CLarNQmKt0LfRb.5qAgweJarV6WrAgqbsu0305C4ro8PfhufetCa', 'normal', NULL, '2021-01-11 17:27:37', '2021-01-11 17:27:37', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albuns`
--
ALTER TABLE `albuns`
  ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indexes for table `musicas`
--
ALTER TABLE `musicas`
  ADD PRIMARY KEY (`id_musica`);

--
-- Indexes for table `musicos`
--
ALTER TABLE `musicos`
  ADD PRIMARY KEY (`id_musico`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albuns`
--
ALTER TABLE `albuns`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `musicas`
--
ALTER TABLE `musicas`
  MODIFY `id_musica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `musicos`
--
ALTER TABLE `musicos`
  MODIFY `id_musico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
