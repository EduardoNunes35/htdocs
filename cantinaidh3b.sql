-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/05/2026 às 15:45
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
-- Banco de dados: `cantinaidh3b`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `caixa`
--

CREATE TABLE `caixa` (
  `id` int(11) NOT NULL,
  `venda_id` int(11) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `tipo` enum('entrada','saida') DEFAULT 'entrada',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `tipo` enum('professor','aluno','avulso') NOT NULL,
  `desconto` decimal(5,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `tipo`, `desconto`, `created_at`) VALUES
(1, 'João Professor', 'professor', 5.00, '2026-03-24 16:30:14'),
(2, 'Maria Aluna', 'aluno', 10.00, '2026-03-24 16:30:14'),
(3, 'Cliente Avulso', 'avulso', 0.00, '2026-03-24 16:30:14'),
(4, 'João', 'aluno', 0.00, '2026-03-24 22:16:23'),
(5, 'Josefa', 'aluno', 0.00, '2026-03-24 22:21:36');

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_venda`
--

CREATE TABLE `itens_venda` (
  `id` int(11) NOT NULL,
  `venda_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco_unitario` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `estoque` int(11) DEFAULT 0,
  `ativo` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `estoque`, `ativo`, `created_at`) VALUES
(1, 'Salgado Assado (Frango com Catupiry)', 7.50, 40, 1, '2026-03-24 16:37:00'),
(2, 'Salgado Assado (Hamburgão)', 8.00, 35, 1, '2026-03-24 16:37:00'),
(3, 'Pão de Queijo Grande', 5.00, 50, 1, '2026-03-24 16:37:00'),
(4, 'Esfiha de Carne', 7.00, 30, 1, '2026-03-24 16:37:00'),
(5, 'Enroladinho de Presunto e Queijo', 7.50, 25, 1, '2026-03-24 16:37:00'),
(6, 'Mini Pizza de Muçarela', 8.50, 20, 1, '2026-03-24 16:37:00'),
(7, 'Sanduíche Natural de Frango', 12.00, 15, 1, '2026-03-24 16:37:00'),
(8, 'Suco de Lata 350ml (Uva/Laranja)', 6.50, 45, 1, '2026-03-24 16:37:00'),
(9, 'Suco Natural de Laranja 400ml', 9.00, 20, 1, '2026-03-24 16:37:00'),
(10, 'Refrigerante Lata 350ml', 6.00, 60, 1, '2026-03-24 16:37:00'),
(11, 'Água Mineral 500ml', 3.50, 100, 1, '2026-03-24 16:37:00'),
(12, 'Água de Coco Caixinha', 7.00, 25, 1, '2026-03-24 16:37:00'),
(13, 'Achocolatado de Caixinha', 5.50, 40, 1, '2026-03-24 16:37:00'),
(14, 'Barra de Cereal Morango', 3.00, 50, 1, '2026-03-24 16:37:00'),
(15, 'Pacote de Bolacha Recheada', 4.50, 30, 1, '2026-03-24 16:37:00'),
(16, 'Batata Chips Pacote Médio', 7.00, 25, 1, '2026-03-24 16:37:00'),
(17, 'Chocolate em Barra (30g)', 4.00, 40, 1, '2026-03-24 16:37:00'),
(18, 'Gelatina no Copo', 3.50, 15, 1, '2026-03-24 16:37:00'),
(19, 'Salada de Frutas Pequena', 8.00, 12, 1, '2026-03-24 16:37:00'),
(20, 'Bolo de Cenoura (Fatia)', 6.00, 18, 1, '2026-03-24 16:37:00'),
(21, 'Coxinha', 5.00, 100, 1, '2026-03-24 22:16:23');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4ISwBKALbHHJxbPTPt2P4YQvaLzVHLgk5TdTYhGz', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaWlSNXJXcW1DSGxsWmpGWVRVNjJLb2hkN1RYU2ZXYlRJM3M4OEFDNiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9jYW50aW5hL3B1YmxpYy90ZXJtaW5hbF9hYmVydG8iO3M6NToicm91dGUiO3M6MTU6InRlcm1pbmFsX2FiZXJ0byI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1779277510),
('4XXhsmBNDgMvWcr2Ff7Sl7XVAiFlbhT9PKAqcTSP', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ05IdTdaYkd0MXdTRTgyTE5Nd1JTWG9FOUhIbmh0M09sZjFWbUxSYSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9jYW50aW5hL3B1YmxpYyI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1779283576),
('D0ZRifoEbAmQymLz8taCA5OlJf5tisbFuAqLLY7r', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYWlRQ1FDdlRoZ1lva1FQMmxxTEo2VzFYMU5STkpGTFkxUkV0YW8yTyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9jYW50aW5hL3B1YmxpYy90ZXJtaW5hbF9hYmVydG8iO3M6NToicm91dGUiO3M6MTU6InRlcm1pbmFsX2FiZXJ0byI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1779214032),
('DjbzexgiNYji4GUa9f0sYkyVmuRKvzNHvqxdZSJn', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM1VUZGJ4TWpQbWluRHZNNFFrOW5OdXpsUnRLeEhxRXRYemhrMzZ4OSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9jYW50aW5hL3B1YmxpYy9zdGF0dXNfYmFuY28iO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1779196903),
('gi74gseLEnEG3CeHKgNEisTNEPpSF3PMgxjK6LbB', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQko0SVlVSms5V2x2REF6R1hsVzVjOXdySTNueWNUWGVMTEJCeFhaZCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9jYW50aW5hL3B1YmxpYyI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1779283576),
('mrKVsIFe1Ya4TEMMQidb3ztJP3f4KpckungjfsbO', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib2plSnRtODZVUU5SVjhyN3hBTUxJWGZmTmpwanUzT04wcTVxWlNlcSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9jYW50aW5hL3B1YmxpYy9leGVtcGxvc19qcyI7czo1OiJyb3V0ZSI7czoxMToiZXhlbXBsb3NfanMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1778856039),
('op9Bu9BKSSmydvDp2rohXLsP59SSEq1pHyx4nO90', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianJRanhuNUJaM3poWlNFc2Y2b2hIVEJHbzE4REprWWRLWjU3TlcwZiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9jYW50aW5hL3B1YmxpYy9zdGF0dXNfYmFuY28iO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1779283577),
('OUnBWUhLSj1OyhRAoa4G5b9xpfevHYKdMTJzQVyW', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNVZqQWNFQWlHMDlQWnUyWVJJVWc4bzhnWnlFTUxxbEh1RnllbTd6RiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9jYW50aW5hL3B1YmxpYy9zdGF0dXNfYmFuY28iO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1779221854),
('oXJEtY9WhGs4tTzuGEZlG8TQgoiQeKlNdiFOxky2', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMzdnZ2hWR0ZTcDJVVmdxZmZOeU4wNkVuSng0OFk0Y3RkRGtsa0sydiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9jYW50aW5hL3B1YmxpYyI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1778855797),
('TA5ZVRxKDB2rSgmN1QOT3LXgO7XUxxgBfhpD01fB', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVlRodzBGSkplN3lqOUlkc1hsR1pmU25qaUVxUVZnVm96ZzJtUlBIRyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9jYW50aW5hL3B1YmxpYyI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1778855797),
('whI8KMJhKLaR36M02ibxvfzLaBRgOeZO8IjlJyyD', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWFl6SHJ3VUV1TWkyNWhhU3p4Q09VaGZEbmZLb1JoemQ0MDk3aGRpdyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9jYW50aW5hL3B1YmxpYy90ZXJtaW5hbF9hYmVydG8iO3M6NToicm91dGUiO3M6MTU6InRlcm1pbmFsX2FiZXJ0byI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1779217273),
('WZ1di5hMOsqKfsfsmJIA2YJP6Y1eAHyQeY9yJsye', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSFFuS2pONWtPM1RkdDBPVjlUTXAzY0VKRUtsQjRTSnRaRmQwdGtQYSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9jYW50aW5hL3B1YmxpYy90ZXJtaW5hbF9hYmVydG8iO3M6NToicm91dGUiO3M6MTU6InRlcm1pbmFsX2FiZXJ0byI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1779117092),
('xqPTOdlIAR78p46Y30EQJoDA7ZEHswMmEfJekqMO', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieVJvNEFZbVRKQzdoM0o3NzV2YWhkVFFpU3dmbWR5Y2FUb0E5WXg5YSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9jYW50aW5hL3B1YmxpYy9kYXNoYm9hcmQiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1779197062);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `total_bruto` decimal(10,2) DEFAULT NULL,
  `total_desconto` decimal(10,2) DEFAULT NULL,
  `total_liquido` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_final` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `desconto` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`id`, `cliente_id`, `total_bruto`, `total_desconto`, `total_liquido`, `created_at`, `total_final`, `total`, `desconto`) VALUES
(1, 1, NULL, NULL, NULL, '2026-03-24 22:20:36', 9.00, 10.00, 1.00),
(2, 1, NULL, NULL, NULL, '2026-03-24 22:22:01', 18.00, 20.00, 2.00);

--
-- Acionadores `vendas`
--
DELIMITER $$
CREATE TRIGGER `trg_calcular_desconto` BEFORE INSERT ON `vendas` FOR EACH ROW BEGIN
    DECLARE perc DECIMAL(5,2);

    SELECT desconto INTO perc FROM clientes WHERE id = NEW.cliente_id;

    SET NEW.total_desconto = NEW.total_bruto * (perc / 100);
    SET NEW.total_liquido = NEW.total_bruto - NEW.total_desconto;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vw_faturamento_diario`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vw_faturamento_diario` (
`data` date
,`total` decimal(32,2)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vw_produtos_mais_vendidos`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vw_produtos_mais_vendidos` (
`nome` varchar(150)
,`total_vendido` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vw_vendas_detalhadas`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vw_vendas_detalhadas` (
`id` int(11)
,`cliente` varchar(150)
,`tipo` enum('professor','aluno','avulso')
,`total_bruto` decimal(10,2)
,`total_desconto` decimal(10,2)
,`total_liquido` decimal(10,2)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Estrutura para view `vw_faturamento_diario`
--
DROP TABLE IF EXISTS `vw_faturamento_diario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_faturamento_diario`  AS SELECT cast(`vendas`.`created_at` as date) AS `data`, sum(`vendas`.`total_liquido`) AS `total` FROM `vendas` GROUP BY cast(`vendas`.`created_at` as date) ;

-- --------------------------------------------------------

--
-- Estrutura para view `vw_produtos_mais_vendidos`
--
DROP TABLE IF EXISTS `vw_produtos_mais_vendidos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_produtos_mais_vendidos`  AS SELECT `p`.`nome` AS `nome`, sum(`i`.`quantidade`) AS `total_vendido` FROM (`itens_venda` `i` join `produtos` `p` on(`p`.`id` = `i`.`produto_id`)) GROUP BY `p`.`nome` ORDER BY sum(`i`.`quantidade`) DESC ;

-- --------------------------------------------------------

--
-- Estrutura para view `vw_vendas_detalhadas`
--
DROP TABLE IF EXISTS `vw_vendas_detalhadas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_vendas_detalhadas`  AS SELECT `v`.`id` AS `id`, `c`.`nome` AS `cliente`, `c`.`tipo` AS `tipo`, `v`.`total_bruto` AS `total_bruto`, `v`.`total_desconto` AS `total_desconto`, `v`.`total_liquido` AS `total_liquido`, `v`.`created_at` AS `created_at` FROM (`vendas` `v` join `clientes` `c` on(`c`.`id` = `v`.`cliente_id`)) ;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Índices de tabela `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Índices de tabela `caixa`
--
ALTER TABLE `caixa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venda_id` (`venda_id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `itens_venda`
--
ALTER TABLE `itens_venda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venda_id` (`venda_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Índices de tabela `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `caixa`
--
ALTER TABLE `caixa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `itens_venda`
--
ALTER TABLE `itens_venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `caixa`
--
ALTER TABLE `caixa`
  ADD CONSTRAINT `caixa_ibfk_1` FOREIGN KEY (`venda_id`) REFERENCES `vendas` (`id`);

--
-- Restrições para tabelas `itens_venda`
--
ALTER TABLE `itens_venda`
  ADD CONSTRAINT `itens_venda_ibfk_1` FOREIGN KEY (`venda_id`) REFERENCES `vendas` (`id`),
  ADD CONSTRAINT `itens_venda_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

--
-- Restrições para tabelas `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
