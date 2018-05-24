-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2017 at 07:43 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `our_mess`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `id` int(10) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `asset_amount` double NOT NULL,
  `asset_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bazar`
--

CREATE TABLE `bazar` (
  `id` int(10) UNSIGNED NOT NULL,
  `member_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bazar_amount` double NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE `meal` (
  `id` int(10) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `meal_amount` double NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Shakhawat', 0, '2017-07-08 07:26:53', '2017-07-08 07:26:53'),
(2, 'Rakib', 0, '2017-07-08 07:27:00', '2017-07-08 07:27:00'),
(3, 'Saif', 0, '2017-07-08 07:27:08', '2017-07-08 07:27:08'),
(4, 'Abraham', 0, '2017-07-08 07:27:13', '2017-07-08 07:27:13'),
(5, 'Sadik', 0, '2017-07-08 07:27:18', '2017-07-08 07:27:18'),
(6, 'Shakil', 0, '2017-07-08 07:27:23', '2017-07-08 07:27:23'),
(7, 'Foysal', 0, '2017-07-08 07:27:28', '2017-07-08 09:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_06_16_022348_create_members_table', 1),
(4, '2017_06_16_022421_create_assets_table', 1),
(5, '2017_06_16_022455_create_bazars_table', 1),
(6, '2017_06_16_022518_create_meals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shakhawat', 'shakhawat@mess.com', '$2y$10$txS68u0b6Qmc.xvDI1qo.eYLm/5S2BxdtAQeq7V2FmDcBG4/LB16C', 'oijngX4EtT4ilEFIW71QN3BKSCLGPYIUs8kMv6w11zuFXRUJUaNL0gO45MVs', '2017-07-08 06:56:23', '2017-07-08 06:56:23'),
(2, 'Rakib', 'rakib@mess.com', '$2y$10$ICNUlYsG1YkPloHnrp9b..srNxT.4VhLREQNRcvtn/Y2mfPI8kSZW', 'KE7ZgVCqNWsLBoiCFmwrere937ldqNHQgKdVwJkcB6ecWnPBcgwZyg1RD4CP', '2017-07-08 07:02:36', '2017-07-08 07:02:36'),
(3, 'Saif', 'saif@mess.com', '$2y$10$y51vATdCaPt4rSY1FzDKd.rKK8XgDZ0//q9/hdsNBhoHha1ipi73q', 'bKfq0c65AxWPSOhphHBrqiQ3uTGZtgfyJwHkLJ6YJ6GsAL88kyIJW29LrbzP', '2017-07-08 07:03:07', '2017-07-08 07:03:07'),
(4, 'Abraham', 'abraham@mess.com', '$2y$10$xfSkBh7gKZCQ0yqTl/A5VuY4QXpdpFCjopTEgBjfQlap4fDxgJ5VW', '8CnJbJzpKHA5U4zyN3j7Y7vZKS1Erc9Ua6hJIXeaEuw0U1riNEt3xkbZbBcZ', '2017-07-08 07:03:37', '2017-07-08 07:03:37'),
(5, 'Foysal', 'foysal@mess.com', '$2y$10$6qjesf9qJMGQL6hea0VuU.3cNqLWHLwZMqfyPDCc0/vGo2ZWP9S6i', 'OQen6cRqHVS1LEZrXV88EtISavz0NBc1fnYjbQnq0NS4MibHHsSNoukNeKS2', '2017-07-08 07:04:15', '2017-07-08 07:04:15'),
(6, 'Shakil', 'shakil@mess.com', '$2y$10$JtZaYLb/zx9TsUuHk.2KeOTI/G42qNg0xUNa9qX5c/.wMQOArI6cy', 'N3wGn9ppQZw3BznyZkUyRFbRdfbcA4NipU0897QgjFYsP0FcPV0AJi94WB5A', '2017-07-08 07:05:09', '2017-07-08 07:05:09'),
(7, 'Sadik', 'sadik@gmail.com', '$2y$10$EDfNwMNuHL/OIHrRU8b3aeMl7H05TXdPEsX4DGzl8tVpJUBOM6NrC', '4fo9VMjMVpZ3YBZ4G3L69Oxt2lhaKWQxAKgPcnfKTxtLemoYwVhB1X2Xpbxp', '2017-07-08 07:06:15', '2017-07-08 07:06:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bazar`
--
ALTER TABLE `bazar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bazar`
--
ALTER TABLE `bazar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meal`
--
ALTER TABLE `meal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
