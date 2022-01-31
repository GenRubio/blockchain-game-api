-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2022 a las 06:05:17
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blockchain_app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Gen', 'keylorubio@gmail.com', '$2y$10$hoWDVemm3bxsff/wWkCzJeBO5iigk8Hri6KZ/1R0HC1T2WCiJuMkK', NULL, '2022-01-29 11:38:14', '2022-01-29 11:38:14'),
(3, 'Test', 'test@gmai.com', '$2y$10$YWaxNwtff80ZKVdUOAMsAulMkr16mfcbo8O2vuuR8wzLYgQO7AqMa', NULL, '2022-01-29 11:43:22', '2022-01-29 11:43:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `characters`
--

CREATE TABLE `characters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stars` int(11) NOT NULL DEFAULT 1,
  `min_power` int(11) NOT NULL DEFAULT 1,
  `max_power` int(11) NOT NULL DEFAULT 1,
  `live` int(11) NOT NULL DEFAULT 1,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `probability` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `characters`
--

INSERT INTO `characters` (`id`, `name`, `stars`, `min_power`, `max_power`, `live`, `image`, `probability`, `created_at`, `updated_at`) VALUES
(1, 'Humano 1', 1, 15, 50, 15, NULL, 44.00, '2022-01-29 20:59:34', '2022-01-30 17:47:35'),
(2, 'Humano 2', 2, 50, 100, 15, NULL, 35.00, '2022-01-29 20:59:51', '2022-01-30 17:47:42'),
(3, 'Humano 3', 3, 100, 150, 15, NULL, 15.00, '2022-01-29 21:00:12', '2022-01-30 17:47:47'),
(4, 'Humano 4', 4, 150, 200, 20, NULL, 5.00, '2022-01-29 21:00:23', '2022-01-30 17:47:54'),
(5, 'Humano 5', 5, 200, 250, 30, 'images/characters/d36521b8e316a83d50def0ed4ecfecb9-image.jpg', 0.50, '2022-01-29 21:00:41', '2022-01-30 17:47:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_01_29_123016_create_admins_table', 2),
(7, '2022_01_29_131053_add_metamask_to_users_table', 3),
(8, '2022_01_29_133116_delete_fields_in_users_table', 4),
(9, '2022_01_29_214451_add_credits_to_users_table', 5),
(10, '2022_01_29_214640_create_characters_table', 6),
(11, '2022_01_29_220253_create_missions_table', 7),
(12, '2022_01_29_223014_create_object_types_table', 8),
(13, '2022_01_29_224052_create_objects_table', 9),
(14, '2022_01_30_085054_add_image_to_characters_table', 10),
(15, '2022_01_30_091512_add_image_to_missions_table', 11),
(16, '2022_01_30_091811_add_image_to_objects_table', 12),
(17, '2022_01_30_094101_create_user_fleets_table', 13),
(18, '2022_01_30_095010_create_user_characters_table', 14),
(19, '2022_01_30_095526_create_user_objects_table', 15),
(20, '2022_01_30_095719_create_user_transports_table', 16),
(22, '2022_01_30_100355_create_transports_table', 17),
(23, '2022_01_30_164358_add_power_to_characters_table', 18),
(24, '2022_01_30_184545_add_live_to_characters_table', 19),
(25, '2022_01_30_185421_add_live_to_user_transports_table', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `missions`
--

CREATE TABLE `missions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` int(11) NOT NULL DEFAULT 1,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_win_credits` int(11) NOT NULL DEFAULT 0,
  `max_win_credits` int(11) NOT NULL DEFAULT 0,
  `win_rate` double(8,2) NOT NULL DEFAULT 0.00,
  `power` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `missions`
--

INSERT INTO `missions` (`id`, `level`, `image`, `rank_name`, `min_win_credits`, `max_win_credits`, `win_rate`, `power`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Rango A', 1, 5, 80.00, 100, '2022-01-29 21:13:20', '2022-01-29 21:13:20'),
(2, 2, NULL, 'Rango A', 5, 10, 78.00, 200, '2022-01-29 21:14:18', '2022-01-29 21:14:18'),
(3, 3, NULL, 'Rango A', 10, 15, 76.00, 300, '2022-01-29 21:14:42', '2022-01-29 21:14:42'),
(4, 4, NULL, 'Rango A', 15, 20, 74.00, 400, '2022-01-29 21:15:17', '2022-01-29 21:15:17'),
(5, 5, NULL, 'Rango A', 20, 25, 72.00, 500, '2022-01-29 21:15:35', '2022-01-29 21:15:35'),
(6, 6, NULL, 'Rango A', 25, 30, 70.00, 600, '2022-01-29 21:15:54', '2022-01-29 21:15:54'),
(7, 7, NULL, 'Rango A', 30, 35, 70.00, 700, '2022-01-29 21:16:11', '2022-01-29 21:16:15'),
(8, 8, NULL, 'Rango A', 35, 40, 68.00, 800, '2022-01-29 21:16:36', '2022-01-29 21:16:36'),
(9, 9, NULL, 'Rango A', 40, 45, 66.00, 900, '2022-01-29 21:16:59', '2022-01-29 21:16:59'),
(10, 10, NULL, 'Rango A', 45, 50, 64.00, 1000, '2022-01-29 21:17:16', '2022-01-29 21:17:16'),
(11, 11, NULL, 'Rango B', 50, 60, 59.00, 1100, '2022-01-29 21:17:36', '2022-01-29 21:17:36'),
(12, 12, NULL, 'Rango B', 60, 70, 57.00, 1200, '2022-01-29 21:17:55', '2022-01-29 21:17:55'),
(13, 13, NULL, 'Rango B', 70, 80, 55.00, 1300, '2022-01-29 21:18:12', '2022-01-29 21:18:12'),
(14, 14, NULL, 'Rango B', 80, 90, 53.00, 1400, '2022-01-29 21:18:30', '2022-01-29 21:18:30'),
(15, 15, NULL, 'Rango B', 90, 100, 51.00, 1500, '2022-01-29 21:18:50', '2022-01-29 21:18:50'),
(16, 16, NULL, 'Rango B', 100, 110, 49.00, 1600, '2022-01-29 21:19:08', '2022-01-29 21:19:08'),
(17, 17, NULL, 'Rango B', 110, 120, 47.00, 1700, '2022-01-29 21:19:26', '2022-01-29 21:19:26'),
(18, 18, NULL, 'Rango B', 120, 130, 45.00, 1800, '2022-01-29 21:19:42', '2022-01-29 21:19:42'),
(19, 19, NULL, 'Rango B', 130, 140, 43.00, 1900, '2022-01-29 21:20:01', '2022-01-29 21:20:01'),
(20, 20, NULL, 'Rango B', 140, 150, 41.00, 2000, '2022-01-29 21:20:17', '2022-01-29 21:20:17'),
(21, 21, NULL, 'Rango C', 150, 170, 40.00, 2100, '2022-01-29 21:20:36', '2022-01-29 21:20:36'),
(22, 22, NULL, 'Rango C', 170, 190, 38.00, 2200, '2022-01-29 21:20:55', '2022-01-29 21:20:55'),
(23, 23, NULL, 'Rango C', 190, 210, 37.00, 2300, '2022-01-29 21:21:13', '2022-01-29 21:21:13'),
(24, 24, NULL, 'Rango C', 210, 230, 36.00, 2400, '2022-01-29 21:21:31', '2022-01-29 21:21:31'),
(25, 25, NULL, 'Rango C', 230, 250, 35.00, 2500, '2022-01-29 21:21:54', '2022-01-29 21:21:54'),
(26, 26, NULL, 'Rango C', 250, 270, 30.00, 2600, '2022-01-29 21:22:12', '2022-01-29 21:22:12'),
(27, 27, NULL, 'Rango C', 270, 290, 30.00, 2700, '2022-01-29 21:22:30', '2022-01-29 21:22:30'),
(28, 28, NULL, 'Rango C', 290, 310, 27.00, 2800, '2022-01-29 21:22:48', '2022-01-29 21:22:48'),
(29, 29, NULL, 'Rango C', 310, 330, 27.00, 2900, '2022-01-29 21:23:14', '2022-01-29 21:23:14'),
(30, 30, NULL, 'Rango C', 330, 350, 25.00, 3000, '2022-01-29 21:23:32', '2022-01-29 21:23:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objects`
--

CREATE TABLE `objects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `object_type_id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `objects`
--

INSERT INTO `objects` (`id`, `name`, `object_type_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Objeto 1', 3, NULL, '2022-01-29 21:58:34', '2022-01-29 21:58:34'),
(2, 'Objeto 2', 5, NULL, '2022-01-29 21:58:43', '2022-01-29 21:58:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `object_types`
--

CREATE TABLE `object_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `power` double(8,2) NOT NULL DEFAULT 0.00,
  `win_rate` double(8,2) NOT NULL DEFAULT 0.00,
  `profits` double(8,2) NOT NULL DEFAULT 0.00,
  `probability` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `object_types`
--

INSERT INTO `object_types` (`id`, `name`, `power`, `win_rate`, `profits`, `probability`, `created_at`, `updated_at`) VALUES
(1, 'Comun', 2.00, 2.00, 2.00, 44.00, '2022-01-29 21:36:55', '2022-01-29 21:36:55'),
(2, 'Uncomun', 4.00, 4.00, 4.00, 35.00, '2022-01-29 21:37:08', '2022-01-29 21:37:08'),
(3, 'Rare', 6.00, 6.00, 6.00, 15.00, '2022-01-29 21:37:22', '2022-01-29 21:37:22'),
(4, 'Legendario', 10.00, 10.00, 10.00, 5.00, '2022-01-29 21:37:37', '2022-01-29 21:37:37'),
(5, 'Epico', 15.00, 15.00, 15.00, 0.50, '2022-01-29 21:37:51', '2022-01-29 21:37:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transports`
--

CREATE TABLE `transports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stars` int(11) NOT NULL DEFAULT 1,
  `live` int(11) NOT NULL DEFAULT 1,
  `max_characters` int(11) NOT NULL DEFAULT 1,
  `probability` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `transports`
--

INSERT INTO `transports` (`id`, `name`, `image`, `stars`, `live`, `max_characters`, `probability`, `created_at`, `updated_at`) VALUES
(1, 'Transport 1', NULL, 1, 15, 1, 44.00, '2022-01-30 09:14:45', '2022-01-31 03:58:02'),
(2, 'Transport 2', NULL, 2, 15, 2, 35.00, '2022-01-30 09:14:56', '2022-01-31 03:58:07'),
(3, 'Transport 3', NULL, 3, 15, 3, 15.00, '2022-01-30 09:15:09', '2022-01-31 03:58:12'),
(4, 'Transport 4', NULL, 4, 20, 4, 5.00, '2022-01-30 09:15:23', '2022-01-31 03:58:17'),
(5, 'Transport 5', NULL, 5, 30, 5, 0.50, '2022-01-30 09:15:37', '2022-01-31 03:57:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `metamask` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credits` double NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `metamask`, `credits`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1234', 0, NULL, NULL, '2022-01-29 08:18:39', '2022-01-29 08:18:39'),
(2, 'potato', 0, NULL, NULL, '2022-01-30 12:12:46', '2022-01-30 12:12:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_characters`
--

CREATE TABLE `user_characters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_transport_id` bigint(20) UNSIGNED DEFAULT NULL,
  `character_id` bigint(20) UNSIGNED NOT NULL,
  `live` int(11) NOT NULL DEFAULT 1,
  `power` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_characters`
--

INSERT INTO `user_characters` (`id`, `user_id`, `user_transport_id`, `character_id`, `live`, `power`, `created_at`, `updated_at`) VALUES
(6, 2, NULL, 4, 20, 199, '2022-01-30 17:49:21', '2022-01-30 17:49:21'),
(7, 2, 4, 4, 20, 175, '2022-01-30 17:49:28', '2022-01-31 03:40:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_fleets`
--

CREATE TABLE `user_fleets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mission_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_start_mission` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_fleets`
--

INSERT INTO `user_fleets` (`id`, `user_id`, `mission_id`, `date_start_mission`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-01-30 10:37:10', '2022-01-30 09:37:14', '2022-01-30 09:37:14'),
(2, 1, 4, '2022-01-30 13:21:08', '2022-01-30 12:21:19', '2022-01-30 12:21:19'),
(3, 2, 4, '2022-01-30 13:22:09', '2022-01-30 12:22:12', '2022-01-30 12:22:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_objects`
--

CREATE TABLE `user_objects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `object_id` bigint(20) UNSIGNED NOT NULL,
  `user_fleet_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_objects`
--

INSERT INTO `user_objects` (`id`, `user_id`, `object_id`, `user_fleet_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, '2022-01-31 03:54:52', '2022-01-31 03:54:52'),
(2, 1, 2, NULL, '2022-01-31 03:56:07', '2022-01-31 03:56:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_transports`
--

CREATE TABLE `user_transports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_fleet_id` bigint(20) UNSIGNED DEFAULT NULL,
  `live` int(11) NOT NULL DEFAULT 1,
  `transport_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_transports`
--

INSERT INTO `user_transports` (`id`, `user_id`, `user_fleet_id`, `live`, `transport_id`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, 20, 4, '2022-01-30 17:58:09', '2022-01-30 17:58:09'),
(3, 1, NULL, 30, 5, '2022-01-30 17:58:30', '2022-01-30 17:58:30'),
(4, 2, NULL, 15, 2, '2022-01-30 17:59:36', '2022-01-30 17:59:36'),
(5, 2, NULL, 15, 3, '2022-01-30 17:59:41', '2022-01-31 03:34:52');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `objects`
--
ALTER TABLE `objects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `objects_object_type_id_foreign` (`object_type_id`);

--
-- Indices de la tabla `object_types`
--
ALTER TABLE `object_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `transports`
--
ALTER TABLE `transports`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_characters`
--
ALTER TABLE `user_characters`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_fleets`
--
ALTER TABLE `user_fleets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_objects`
--
ALTER TABLE `user_objects`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_transports`
--
ALTER TABLE `user_transports`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `characters`
--
ALTER TABLE `characters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `missions`
--
ALTER TABLE `missions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `objects`
--
ALTER TABLE `objects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `object_types`
--
ALTER TABLE `object_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `transports`
--
ALTER TABLE `transports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user_characters`
--
ALTER TABLE `user_characters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `user_fleets`
--
ALTER TABLE `user_fleets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user_objects`
--
ALTER TABLE `user_objects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user_transports`
--
ALTER TABLE `user_transports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `objects`
--
ALTER TABLE `objects`
  ADD CONSTRAINT `objects_object_type_id_foreign` FOREIGN KEY (`object_type_id`) REFERENCES `object_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
