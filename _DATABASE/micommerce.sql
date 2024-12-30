-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2024 at 02:59 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `micommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `qty` int NOT NULL,
  `total_price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_08_27_140712_create_products_table', 1),
(6, '2021_08_28_072054_create_carts_table', 1),
(7, '2021_08_28_104500_create_transactions_table', 1),
(8, '2021_08_28_104520_create_transaction_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Happy Place', 70000, 'products/December2024/uzwCBBt1lKf5Um3R8OtRIfrNhw9L1iknNYWHWiDH.jpg', '2024-12-30 14:20:13', '2024-12-30 14:20:13'),
(2, 'Lelaki - lelaki tanpa perempuan', 80000, 'products/December2024/P9wHwzYlJ3hovvGnKv8UteMK9SJfaNY8HIxZSCtV.jpg', '2024-12-30 14:48:31', '2024-12-30 14:48:31'),
(3, 'The midnight library', 50000, 'products/December2024/3IZc23vw9BAcjqghNHeWldGbPo0A87q7TXofRM58.jpg', '2024-12-30 14:48:48', '2024-12-30 14:48:48'),
(4, '7 prajurit bapak', 78000, 'products/December2024/aAFlobnJXybZNifmrksL3uT8GE94EvvfQbiPt18t.jpg', '2024-12-30 14:49:12', '2024-12-30 14:49:12'),
(5, 'Seribu wajah ayah', 56000, 'products/December2024/iSADPtGPTIWVCWyhK9QgOPPPc4x3a4GaGYtBJ3cJ.jpg', '2024-12-30 14:50:29', '2024-12-30 14:50:29'),
(6, 'The nightingale', 66000, 'products/December2024/2UwGKc3K2FuyM6prg9ZyTmCLFMdqwHWUy6ZlNrds.jpg', '2024-12-30 14:50:54', '2024-12-30 14:50:54'),
(7, 'Namaku alam', 79000, 'products/December2024/DDNVut6XVObsByYfFPVEoYNj1ZJqZOM0BjSIJtVy.jpg', '2024-12-30 14:51:15', '2024-12-30 14:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `total`, `created_at`, `updated_at`) VALUES
(1, 2, 140000, '2024-12-30 14:28:06', '2024-12-30 14:28:06'),
(2, 2, 122000, '2024-12-30 14:55:24', '2024-12-30 14:55:24'),
(3, 2, 180000, '2024-12-30 14:55:40', '2024-12-30 14:55:40'),
(4, 2, 78000, '2024-12-30 14:55:48', '2024-12-30 14:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint UNSIGNED NOT NULL,
  `transaction_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `qty` int NOT NULL,
  `total_price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `product_id`, `qty`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 140000, '2024-12-30 14:28:06', '2024-12-30 14:28:06'),
(2, 2, 6, 1, 66000, '2024-12-30 14:55:24', '2024-12-30 14:55:24'),
(3, 2, 5, 1, 56000, '2024-12-30 14:55:24', '2024-12-30 14:55:24'),
(4, 3, 2, 1, 80000, '2024-12-30 14:55:40', '2024-12-30 14:55:40'),
(5, 3, 3, 2, 100000, '2024-12-30 14:55:40', '2024-12-30 14:55:40'),
(6, 4, 4, 1, 78000, '2024-12-30 14:55:48', '2024-12-30 14:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role` enum('USER','ADMIN') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'Admin Micommerce', 'admin@micommerce.com', NULL, '$2y$10$IdmUiMj5efX.EE03CHOk6.dU5OAlwe6ai6N4hMzIyNRoO9mmJXV8C', 'RPJ96EOvVABweZjB6xKAA0LkRTpKrcCrsq3KshbrZv4dZx2MqASK905dYJtE', '2024-12-30 14:17:05', '2024-12-30 14:17:05'),
(2, 'USER', 'Chaney Beck', 'weni@mailinator.com', NULL, '$2y$10$9q37qbDI5c2LCad10pfO5uV5Z1buI37htprQ16POTqgnFbOd7KUoW', NULL, '2024-12-30 14:20:37', '2024-12-30 14:20:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_details_product_id_foreign` (`product_id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
