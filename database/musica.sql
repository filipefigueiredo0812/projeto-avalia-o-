-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jan-2021 às 21:29
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `musica`
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
-- Estrutura da tabela `likes`
--

CREATE TABLE `likes` (
  `id_user` int(11) NOT NULL,
  `id_musica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `likes`
--

INSERT INTO `likes` (`id_user`, `id_musica`) VALUES
(1, 1),
(1, 3);

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
  `id_album` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `musicas`
--

INSERT INTO `musicas` (`id_musica`, `titulo`, `id_musico`, `id_genero`, `updated_at`, `created_at`, `id_album`, `id_user`) VALUES
(1, 'Sonhar Nesta Vida', 1, 1, '2021-01-14 11:48:21', NULL, 1, 0),
(2, 'Protagonista', 1, 1, NULL, NULL, 1, 0),
(3, 'Romarias', 2, 1, '2021-01-15 17:08:01', NULL, 2, 0),
(4, 'Castolo', 2, 1, '2021-01-15 17:08:01', NULL, 2, 0),
(5, 'Baby Be Mine', 3, 2, '2021-01-15 17:08:39', NULL, 3, 0),
(6, 'The Girl is Mine', 3, 2, NULL, NULL, 3, 0),
(7, 'A Steady Beginning', 4, 3, NULL, NULL, 4, 0),
(8, 'This Is What Happens', 4, 3, NULL, NULL, 4, 0),
(9, 'Nightmares', 4, 3, NULL, NULL, 5, 0),
(10, 'Blue Light', 4, 3, NULL, NULL, 5, 0);

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
(1, 'Dillaz', 'Português', NULL, '1610634020_unnamed.jpg', '2021-01-14 14:20:20', NULL),
(2, 'Chico da Tina', 'Português', NULL, '1610634109_maxresdefault.jpg', '2021-01-14 14:21:49', NULL),
(3, 'Michael Jackson', 'Norte-Americano', NULL, '1610634150_michael-jackson-ok-1550763542.jpg', '2021-01-14 14:22:30', NULL),
(4, 'Peachy!', 'Norte-Americano', NULL, '1610634191_avatars-pm7EjfSyX6gANyAV-ypvl3g-t240x240.jpg', '2021-01-14 14:23:11', NULL);

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
(1, 'Filipe', 'filipe1234@gmail.com', NULL, '$2y$10$mCN.2EYZJi97YalH1RZ/C.lMrkuRzEXdTWjsQQgInrJwkjEOOApd2', 'admin', NULL, '2021-01-08 17:10:03', '2021-01-08 17:10:03', 1),
(2, 'Alberto', 'alberto1234@gmail.com', NULL, '$2y$10$6CLarNQmKt0LfRb.5qAgweJarV6WrAgqbsu0305C4ro8PfhufetCa', 'normal', NULL, '2021-01-11 17:27:37', '2021-01-11 17:27:37', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `albuns`
--
ALTER TABLE `albuns`
  ADD PRIMARY KEY (`id_album`);

--
-- Índices para tabela `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Índices para tabela `musicas`
--
ALTER TABLE `musicas`
  ADD PRIMARY KEY (`id_musica`);

--
-- Índices para tabela `musicos`
--
ALTER TABLE `musicos`
  ADD PRIMARY KEY (`id_musico`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `albuns`
--
ALTER TABLE `albuns`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `musicas`
--
ALTER TABLE `musicas`
  MODIFY `id_musica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `musicos`
--
ALTER TABLE `musicos`
  MODIFY `id_musico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
