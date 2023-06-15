-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 01:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finance`
--

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(11,0) NOT NULL,
  `profit_loss` int(11) NOT NULL,
  `overall_balance` decimal(11,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balances`
--

INSERT INTO `balances` (`id`, `name`, `reference`, `type`, `amount`, `profit_loss`, `overall_balance`, `created_at`, `updated_at`) VALUES
(1, 'Set Balance', 'Initializing balance account', 'Initial Injection', '0', 1, '0', '2023-04-11 17:30:38', '2023-04-11 17:30:38'),
(2, 'Initial Capital', 'Capital by the company (2023)', 'Annual Investment', '16000', 1, '10000', '2023-04-13 12:34:17', '2023-04-14 11:25:12'),
(3, 'Payment to the bosses', 'Boss withdrawal of money', 'Payment', '3000', 0, '21073', '2023-04-13 12:36:27', '2023-05-27 09:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_type` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'V',
  `document_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_purchase` timestamp NULL DEFAULT NULL,
  `total_purchases` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `total_paid` decimal(8,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `balance` decimal(8,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `document_type`, `document_id`, `name`, `email`, `phone`, `last_purchase`, `total_purchases`, `total_paid`, `created_at`, `updated_at`, `deleted_at`, `balance`) VALUES
(1, 'V', 1, 'Econet Wireless', 'econet@gmaill.com', '+263783028721', NULL, 0, '0.00', '2023-03-30 15:13:55', '2023-04-20 06:54:31', NULL, '-45.00');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `index` decimal(8,2) NOT NULL,
  `selected` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `sign`, `index`, `selected`, `created_at`, `updated_at`) VALUES
(1, 'Euro', '£', '0.75', 0, '2023-04-21 17:12:16', '2023-06-02 06:00:28'),
(4, 'Pound', '€', '0.69', 1, '2023-04-24 08:21:33', '2023-06-02 06:55:03'),
(5, 'USD', '$', '1.00', 0, '2023-04-24 08:24:01', '2023-06-02 06:55:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_02_214601_create_clients_table_migration', 1),
(5, '2019_11_03_032131_create_products_categories_table_migration', 1),
(6, '2019_11_03_032233_create_products_table_migration', 1),
(7, '2019_11_04_000745_create_payment_methods_table_migration', 1),
(8, '2019_11_04_001238_create_sales_table_migration', 1),
(9, '2019_11_04_001246_create_sold_products_table_migration', 1),
(10, '2019_11_04_001339_create_providers_table_migration', 1),
(11, '2019_12_23_065221_create_transfers_table', 1),
(12, '2019_12_24_001440_create_transactions_table_migration', 1),
(13, '2020_01_15_193356_create_receipts_table', 1),
(14, '2020_01_15_193828_create_received_products_table', 1),
(15, '2020_01_20_191734_add_balance_column_clients_table', 1),
(16, '2023_03_31_171512_create_companies_table', 2),
(17, '2023_04_07_180257_create_balances_table', 3),
(18, '2023_04_21_072708_create_currencies_table', 4);

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
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cash (USD)', 'Payment by cash in United State Dollars', '2023-03-28 10:30:10', '2023-03-28 10:30:10', NULL),
(2, 'Cash (RTGS)', 'Payment  in cash (RTGS)', '2023-03-28 10:30:29', '2023-03-28 10:30:29', NULL),
(3, 'Swipe', 'Swipe using bank card', '2023-03-28 10:30:59', '2023-03-28 10:30:59', NULL),
(4, 'Ecocash', 'Ecocash payment', '2023-03-28 10:31:14', '2023-03-28 10:31:14', NULL),
(5, 'Bank Transfer', 'Transferring money from one bank to another', '2023-03-28 10:31:34', '2023-04-08 05:50:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_category_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) UNSIGNED NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `stock_defective` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `product_category_id`, `price`, `stock`, `stock_defective`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Network cables', 'UTP Cables', 1, '10.00', 0, 1, '2023-04-07 19:32:36', '2023-04-20 06:54:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Stock Take', '2023-03-28 10:27:00', '2023-03-28 10:27:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentinfo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `name`, `description`, `paymentinfo`, `email`, `phone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Telone', 'WIFI monthly/Annually', 'Paying $10 monthly for wifi', 'telone@gmail.com', '0783028721', '2023-04-26 07:28:44', '2023-05-19 14:50:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `finalized_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `received_products`
--

CREATE TABLE `received_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receipt_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_defective` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `finalized_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `client_id`, `total_amount`, `finalized_at`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '40.00', '2023-04-19 11:34:10', '2023-03-30 16:24:36', '2023-04-19 11:34:10'),
(3, 5, 1, '5.00', '2023-04-20 06:54:31', '2023-04-20 06:54:01', '2023-04-20 06:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `sold_products`
--

CREATE TABLE `sold_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sold_products`
--

INSERT INTO `sold_products` (`id`, `sale_id`, `product_id`, `qty`, `price`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 4, '10.00', '40.00', '2023-04-07 19:32:56', '2023-04-17 17:03:38'),
(2, 3, 1, 1, '5.00', '5.00', '2023-04-20 06:54:24', '2023-04-20 06:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sale_id` bigint(20) UNSIGNED DEFAULT NULL,
  `provider_id` bigint(20) UNSIGNED DEFAULT NULL,
  `transfer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `type`, `title`, `reference`, `client_id`, `sale_id`, `provider_id`, `transfer_id`, `payment_method_id`, `amount`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'expense', 'Petty Cash', 'Bought trunching for UTP cables.', NULL, NULL, NULL, NULL, 1, '-10500.00', 5, '2023-04-19 11:42:09', '2023-04-19 11:42:09'),
(2, 'expense', 'TransferID: 1', 'Requested 25 000 RTGS', NULL, NULL, NULL, 1, 1, '-20.00', 5, '2023-04-20 06:43:31', '2023-04-20 06:43:31'),
(3, 'income', 'TransferID: 1', 'Requested 25 000 RTGS', NULL, NULL, NULL, 1, 5, '20.00', 5, '2023-04-20 06:43:31', '2023-04-20 06:43:31'),
(4, 'expense', 'readers', 'rrr', NULL, NULL, NULL, NULL, 1, '-120.00', 5, '2023-04-20 06:50:31', '2023-04-20 06:50:31'),
(5, 'expense', 'Lunch for management team.', 'Food for people that attended meeting.', NULL, NULL, NULL, NULL, 3, '-20.00', 5, '2023-04-20 06:55:28', '2023-04-20 06:55:28'),
(6, 'expense', 'Transport money', 'executives money.', NULL, NULL, NULL, NULL, 3, '-12.00', 5, '2023-04-20 06:58:28', '2023-04-20 06:58:28'),
(7, 'expense', 'TransferID: 2', 'ccc', NULL, NULL, NULL, 2, 1, '-100.00', 5, '2023-04-20 07:00:31', '2023-04-20 07:00:31'),
(8, 'income', 'TransferID: 2', 'ccc', NULL, NULL, NULL, 2, 4, '50.00', 5, '2023-04-20 07:00:31', '2023-04-20 07:00:31'),
(9, 'payment', 'WIFI monthly payment', 'Wifi', NULL, NULL, 1, NULL, 1, '-10.00', 5, '2023-04-26 07:29:10', '2023-04-26 07:29:10'),
(10, 'income', 'Annual License', 'Received from Econet - Service License', NULL, NULL, NULL, NULL, 1, '10000.00', 5, '2023-05-27 09:11:06', '2023-05-27 09:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_method_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_method_id` bigint(20) UNSIGNED NOT NULL,
  `sended_amount` decimal(10,2) NOT NULL,
  `received_amount` decimal(10,2) NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `title`, `sender_method_id`, `receiver_method_id`, `sended_amount`, `received_amount`, `reference`, `created_at`, `updated_at`) VALUES
(1, 'Money Changer', 1, 5, '20.00', '20.00', 'Requested 25 000 RTGS', '2023-04-20 06:43:31', '2023-04-20 06:43:31'),
(2, 'Money changer dealership.', 1, 4, '100.00', '50.00', 'ccc', '2023-04-20 07:00:31', '2023-04-20 07:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `position` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `position`) VALUES
(1, 'Tawona', 'tnrwatida@gmail.com', NULL, '$2y$10$.v44yjNyzmllNqAB8STZme.2mmSmw5VFVlDGmY.cEZpAWZffdnwfu', NULL, '2023-03-28 10:24:20', '2023-04-01 18:28:26', NULL, 'System Administrator'),
(5, 'Tawonga', 'trwatida@gmail.com', NULL, '$2y$10$f9kMXZPXj41SktYMUupp2u2JA0NflE37QG1HnjVCbjAIqp5Xa4m46', NULL, '2023-04-03 16:28:15', '2023-04-03 16:28:15', NULL, 'Business Clerk'),
(6, 'Test Person', 'admin@gmail.com', NULL, '$2y$10$jTwdBKeIivTyBIwvWesoteCYOqjioASxBa74ygdcRwTB4eFVosaP.', NULL, '2023-04-11 17:30:38', '2023-04-11 17:30:38', NULL, 'Administrator'),
(7, 'Test Clerk', 'clerk@gmail.com', NULL, '$2y$10$CQfYIqYX0y7MnOIEchPhWugfbdrGcD7p2zpxM4lu6T5pzjYq.olWS', NULL, '2023-04-11 17:32:52', '2023-04-11 17:32:52', NULL, 'Business Clerk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_document_id_unique` (`document_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_product_category_id_foreign` (`product_category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipts_provider_id_foreign` (`provider_id`),
  ADD KEY `receipts_user_id_foreign` (`user_id`);

--
-- Indexes for table `received_products`
--
ALTER TABLE `received_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `received_products_receipt_id_foreign` (`receipt_id`),
  ADD KEY `received_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_user_id_foreign` (`user_id`),
  ADD KEY `sales_client_id_foreign` (`client_id`);

--
-- Indexes for table `sold_products`
--
ALTER TABLE `sold_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sold_products_sale_id_foreign` (`sale_id`),
  ADD KEY `sold_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_payment_method_id_foreign` (`payment_method_id`),
  ADD KEY `transactions_client_id_foreign` (`client_id`),
  ADD KEY `transactions_sale_id_foreign` (`sale_id`),
  ADD KEY `transactions_provider_id_foreign` (`provider_id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_transfer_id_foreign` (`transfer_id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transfers_sender_method_id_foreign` (`sender_method_id`),
  ADD KEY `transfers_receiver_method_id_foreign` (`receiver_method_id`);

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
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `received_products`
--
ALTER TABLE `received_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sold_products`
--
ALTER TABLE `sold_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`);

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`),
  ADD CONSTRAINT `receipts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `received_products`
--
ALTER TABLE `received_products`
  ADD CONSTRAINT `received_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `received_products_receipt_id_foreign` FOREIGN KEY (`receipt_id`) REFERENCES `receipts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sold_products`
--
ALTER TABLE `sold_products`
  ADD CONSTRAINT `sold_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `sold_products_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `transactions_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`),
  ADD CONSTRAINT `transactions_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`),
  ADD CONSTRAINT `transactions_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_transfer_id_foreign` FOREIGN KEY (`transfer_id`) REFERENCES `transfers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `transfers_receiver_method_id_foreign` FOREIGN KEY (`receiver_method_id`) REFERENCES `payment_methods` (`id`),
  ADD CONSTRAINT `transfers_sender_method_id_foreign` FOREIGN KEY (`sender_method_id`) REFERENCES `payment_methods` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
