-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2021 at 05:16 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 3, '3zGyDFKHuOGhIRlDQSZB8jKwlQAdTa1e', 1, '2021-08-25 04:47:53', '2021-08-25 04:47:53', '2021-08-25 04:47:53'),
(2, 4, 'Hzt2PYPTeeD9RNhiGTCGmkJxrJ3ZaYGy', 1, '2021-08-25 06:39:58', '2021-08-25 06:39:58', '2021-08-25 06:39:58'),
(3, 7, 'C0mUSxFHtL14PrbE9iCimgsXOoiCprkt', 1, '2021-08-25 09:20:12', '2021-08-25 09:20:12', '2021-08-25 09:20:13'),
(4, 8, 'eE2nxcUU6bDPZCoDVwJoJ0kyKovjmvAw', 1, '2021-08-25 09:22:38', '2021-08-25 09:22:38', '2021-08-25 09:22:38'),
(10, 14, 'pGFiPvaY8t34ebPKaW80XVhhAuWT5YEN', 1, '2021-08-25 10:25:11', '2021-08-25 10:25:11', '2021-08-25 10:25:11'),
(11, 15, 'OP784agB9ds5ZRzmb5DD8Ky6YqPBdrKF', 1, '2021-08-25 10:37:40', '2021-08-25 10:37:40', '2021-08-25 10:37:40'),
(12, 16, 'qYjhXnQDieUUrqUoHMxl2VkfDBLoSRyT', 1, '2021-08-25 10:39:52', '2021-08-25 10:39:51', '2021-08-25 10:39:52'),
(13, 17, 'jNCjqKitA0YzabpmdMZYSVRF2x92pjnc', 1, '2021-08-25 10:53:42', '2021-08-25 10:53:42', '2021-08-25 10:53:42'),
(14, 18, 'rgdcn13tXw4bh43fiQ3HbHduB0osdSmj', 1, '2021-08-25 10:54:57', '2021-08-25 10:54:57', '2021-08-25 10:54:57'),
(15, 19, '92CQ4hfS9Vgfe7JcVXOzuT44ugR06v0j', 1, '2021-08-25 10:56:01', '2021-08-25 10:56:01', '2021-08-25 10:56:01'),
(16, 20, 'W14BSVLS2tSD2AWFOUK61u46bwdyHsIE', 1, '2021-08-25 10:57:02', '2021-08-25 10:57:02', '2021-08-25 10:57:02'),
(17, 21, 'FymMC3OcRzMIZCpwkETNG4sXykAarij0', 1, '2021-08-25 10:58:34', '2021-08-25 10:58:34', '2021-08-25 10:58:34'),
(18, 22, 'hTmGE2t2PO0hCGOEzVtMeETerso7w6g6', 1, '2021-08-25 11:01:24', '2021-08-25 11:01:24', '2021-08-25 11:01:24'),
(19, 23, 'BoP3ylAkd9SnI6cAGblKdgqO28ztLirc', 1, '2021-08-25 11:02:35', '2021-08-25 11:02:35', '2021-08-25 11:02:35'),
(20, 24, 'kdfz46xURW2tqk1nd4sZT01Hqek6j1Mx', 1, '2021-08-25 11:06:00', '2021-08-25 11:06:00', '2021-08-25 11:06:00'),
(21, 25, 'gkD1zAZ9aMSsDF6SnH299Mams7a6Kysl', 1, '2021-08-25 11:07:25', '2021-08-25 11:07:25', '2021-08-25 11:07:25'),
(22, 26, 'JznZ6cspcwLnkcDOOmUHZXDgBUPiQXbf', 1, '2021-08-25 11:10:08', '2021-08-25 11:10:07', '2021-08-25 11:10:08'),
(23, 27, '9vFDNgujT2x6v0SUwhmzt7aSrcqLDQow', 1, '2021-08-25 11:16:39', '2021-08-25 11:16:39', '2021-08-25 11:16:39'),
(24, 28, 'HMZ9lHTfsI39aqrS4wvwdXZdpI0kU4MV', 1, '2021-08-25 13:56:01', '2021-08-25 13:56:01', '2021-08-25 13:56:01'),
(25, 29, 'wMMmZ5kDG9slRH4LKO26FdLfpb5ELn3O', 1, '2021-08-25 14:01:16', '2021-08-25 14:01:16', '2021-08-25 14:01:16'),
(26, 30, 'vPvsGwU5N8RqDG3qtTHGA1zvehXb48nB', 1, '2021-08-25 15:06:13', '2021-08-25 15:06:13', '2021-08-25 15:06:13'),
(27, 31, 'MjXxnOtjJAUdo7Wol6EMrR5jma3yqt15', 1, '2021-08-25 15:19:33', '2021-08-25 15:19:33', '2021-08-25 15:19:33'),
(28, 32, 'Zy0q02cuFBF0qm4m2mLkd8c1IHOfhMeh', 1, '2021-08-25 15:22:25', '2021-08-25 15:22:25', '2021-08-25 15:22:25'),
(29, 33, 'w3OAibPsvl9koxHSwxQXBkEIQdGvMrBa', 1, '2021-08-25 15:29:56', '2021-08-25 15:29:56', '2021-08-25 15:29:56'),
(30, 34, '0bbpmVJZQki3DrDAPGyCdd6lY4DB10se', 1, '2021-08-25 15:31:36', '2021-08-25 15:31:36', '2021-08-25 15:31:36'),
(31, 35, 'MhtiI2sygb4zMzKd2PakAQAktzeOzN07', 1, '2021-08-25 15:36:17', '2021-08-25 15:36:17', '2021-08-25 15:36:17'),
(32, 36, '0Wv5T5OHh9HgufX0pB1ar1UBvU1wnymP', 1, '2021-08-25 15:42:07', '2021-08-25 15:42:07', '2021-08-25 15:42:07'),
(33, 37, '3GUZyTXulQpeqNHaa2qhthbQOw5SVDrV', 1, '2021-08-26 06:26:16', '2021-08-26 06:26:16', '2021-08-26 06:26:16'),
(34, 38, '3ePjGMUZ2sZAx4umFiajfVBGwLYADslu', 1, '2021-08-26 06:36:16', '2021-08-26 06:36:15', '2021-08-26 06:36:16'),
(35, 39, 'CpVuIUZSeLGWOdvxYe47MejkK86hY0yJ', 1, '2021-08-26 06:50:39', '2021-08-26 06:50:39', '2021-08-26 06:50:39'),
(36, 40, 'qVvpEf0zoApBb4SQxgX3dQmPLJRDOzKP', 1, '2021-08-26 08:04:14', '2021-08-26 08:04:14', '2021-08-26 08:04:14'),
(37, 41, 'TwgBG39JxnfhwHu0pMRiZ9JFxufv2kwr', 1, '2021-08-26 08:06:31', '2021-08-26 08:06:31', '2021-08-26 08:06:31'),
(38, 42, 'qzjxReYLr70QMxvYMEHH0R7FoM3ebEhq', 1, '2021-08-26 08:09:02', '2021-08-26 08:09:02', '2021-08-26 08:09:02'),
(39, 43, 'MUtKHEu7lwGCeCXElo7drR0qbIGcDNkR', 1, '2021-08-26 08:20:40', '2021-08-26 08:20:40', '2021-08-26 08:20:40'),
(40, 44, 'vtPKxbSOnmKE39EwinQkMAuvVO2CSANj', 1, '2021-08-26 08:58:17', '2021-08-26 08:58:17', '2021-08-26 08:58:17'),
(41, 45, 'Neup2y9kAS9t0NZyETEm8RYJEUTran4V', 1, '2021-08-26 09:35:16', '2021-08-26 09:35:16', '2021-08-26 09:35:16'),
(42, 46, 'nyfOim29PJipg2UMS7eaVsk0ry2aQdUz', 1, '2021-08-26 09:44:07', '2021-08-26 09:44:07', '2021-08-26 09:44:07'),
(43, 47, 'ozenXBSPeW0NEZ6qp5mzr4YGpmP1K1GF', 1, '2021-08-26 09:45:22', '2021-08-26 09:45:21', '2021-08-26 09:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `id` int(11) NOT NULL,
  `template_name` varchar(255) DEFAULT NULL,
  `template_from` varchar(255) DEFAULT NULL,
  `template_from_mail` varchar(255) DEFAULT NULL,
  `template_subject` text,
  `template_html` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`id`, `template_name`, `template_from`, `template_from_mail`, `template_subject`, `template_html`) VALUES
(1, 'User Registration', 'SUPER-ADMIN', 'mendheanup21@gmail.com', 'User Registration', '<table style=\"margin-bottom: 0;\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n<tbody>\r\n<tr>\r\n<td style=\"color: #333333; font-size: 15px; padding-top: 3px; text-align: center; font-family: robotomedium;\">Registration Successful!</td>\r\n</tr>\r\n<tr style=\"height: 50px;\">\r\n<td style=\"height: 50px;\" height=\"40\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 23px;\">\r\n<td style=\"color: #333333; font-size: 16px; padding: 0px 30px; height: 23px;\">Hello <span style=\"color: #0050a0; font-family: \'ubuntumedium\',sans-serif;\">##FIRST_NAME##,</span></td>\r\n</tr>\r\n<tr style=\"height: 64px;\">\r\n<td style=\"color: #545454; font-size: 15px; padding: 12px 30px; height: 64px;\">\r\n<p>&nbsp; &nbsp;Thank you for your registration @##PROJECT_NAME##!</p>\r\n<p>Enjoy our services.</p>\r\n<p>Login details:</p>\r\n<p>Email&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp; ##EMAIL##</p>\r\n<p>Password&nbsp; &nbsp; &nbsp;:&nbsp; ##PASSWORD##</p>\r\n<p>To verify email ##LINK##</p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 21px;\">\r\n<td style=\"color: #0050a0; font-size: 15px; padding: 0px 30px; height: 21px;\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_07_02_230147_migration_cartalyst_sentinel', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(1, 3, 'WsUzaGQ2kEVrROQlgw9im4Lh37F2DLto', '2021-08-25 04:50:48', '2021-08-25 04:50:48'),
(2, 3, 'WiuuTVjlcLJ4RJwwoeqoIVl9gRXkQHGk', '2021-08-25 04:55:54', '2021-08-25 04:55:54'),
(17, 4, 'qqtjw0OVFQXRWVaEzx8ThsCVw5QygcUl', '2021-08-25 06:57:08', '2021-08-25 06:57:08'),
(19, 4, 'X0aakxu6ovBScJgXAAnmH3nzOO2v6oVm', '2021-08-25 07:18:23', '2021-08-25 07:18:23'),
(20, 4, 'JZd7KYCWuNK8JHZYpYjSvjfRueT1Smlq', '2021-08-25 08:05:43', '2021-08-25 08:05:43'),
(21, 4, 'B0A9VCOQ7TEH8VlsALjRZOVCdkXkdBuV', '2021-08-25 08:16:14', '2021-08-25 08:16:14'),
(22, 4, 'u0GxjRFIQktEbsqNJSwZXL5JX99AdTjX', '2021-08-25 08:19:26', '2021-08-25 08:19:26'),
(23, 4, 'Cz84sRDVTOxWZ3GdprZUAlJoC0zNRXFG', '2021-08-25 13:07:12', '2021-08-25 13:07:12'),
(24, 4, 'LxTapxSWV3DDpo9Zb5VtdbYNxNyzWOO0', '2021-08-25 13:51:38', '2021-08-25 13:51:38'),
(25, 35, 'SUaLltj5IoMQjFhaD9nOlGdhNZEg21DQ', '2021-08-26 04:21:36', '2021-08-26 04:21:36'),
(26, 4, 'qqcRlmv7JabNUdO8XCtNbFCXFh1nfcIU', '2021-08-26 04:28:41', '2021-08-26 04:28:41'),
(27, 4, 'nztcsXXzKMmqfQm7e4harlZcB5I5OAPZ', '2021-08-26 04:31:02', '2021-08-26 04:31:02'),
(28, 4, 'Dacix9YAvTXoWxYdRHRijDL2mLjgicw1', '2021-08-26 04:32:34', '2021-08-26 04:32:34'),
(29, 4, 'h6jaLcOwYBg1sk5RVGorO0J3bpUVu3Nw', '2021-08-26 04:34:04', '2021-08-26 04:34:04'),
(32, 36, 'pVyhz4fezEX1uWndffvXNsJTNIA2p5g3', '2021-08-26 04:46:31', '2021-08-26 04:46:31'),
(45, 47, 'q6LygzB6O6p2KPWCU0BAm5Lf584txuJL', '2021-08-26 09:45:22', '2021-08-26 09:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', '{\"admin\":true}', '2021-08-17 18:30:00', NULL),
(2, 'vendor', 'Vendor', NULL, NULL, NULL),
(3, 'customer', 'Customer', NULL, '2021-08-24 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-08-24 18:30:00', NULL),
(3, 2, NULL, NULL),
(4, 1, '2021-08-24 18:30:00', NULL),
(8, 3, '2021-08-25 09:22:38', '2021-08-25 09:22:38'),
(10, 3, '2021-08-25 09:51:37', '2021-08-25 09:51:37'),
(11, 3, '2021-08-25 09:56:07', '2021-08-25 09:56:07'),
(12, 3, '2021-08-25 10:15:41', '2021-08-25 10:15:41'),
(19, 3, '2021-08-25 10:56:01', '2021-08-25 10:56:01'),
(20, 3, '2021-08-25 10:57:02', '2021-08-25 10:57:02'),
(21, 3, '2021-08-25 10:58:35', '2021-08-25 10:58:35'),
(23, 3, '2021-08-25 11:02:39', '2021-08-25 11:02:39'),
(25, 3, '2021-08-25 11:07:31', '2021-08-25 11:07:31'),
(26, 3, '2021-08-25 11:10:11', '2021-08-25 11:10:11'),
(27, 3, '2021-08-25 11:16:42', '2021-08-25 11:16:42'),
(28, 2, '2021-08-25 13:56:11', '2021-08-25 13:56:11'),
(29, 2, '2021-08-25 14:01:20', '2021-08-25 14:01:20'),
(30, 2, '2021-08-25 15:06:17', '2021-08-25 15:06:17'),
(35, 2, '2021-08-25 15:36:21', '2021-08-25 15:36:21'),
(36, 3, '2021-08-25 15:42:11', '2021-08-25 15:42:11'),
(38, 3, '2021-08-26 06:36:16', '2021-08-26 06:36:16'),
(39, 3, '2021-08-26 06:50:40', '2021-08-26 06:50:40'),
(43, 3, '2021-08-26 08:20:40', '2021-08-26 08:20:40'),
(44, 2, '2021-08-26 08:58:24', '2021-08-26 08:58:24'),
(45, 3, '2021-08-26 09:35:16', '2021-08-26 09:35:16'),
(46, 3, '2021-08-26 09:44:07', '2021-08-26 09:44:07'),
(47, 3, '2021-08-26 09:45:22', '2021-08-26 09:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(1, NULL, 'global', NULL, '2021-08-25 04:21:30', '2021-08-25 04:21:30'),
(2, NULL, 'ip', '::1', '2021-08-25 04:21:30', '2021-08-25 04:21:30'),
(3, 1, 'user', NULL, '2021-08-25 04:21:30', '2021-08-25 04:21:30'),
(4, NULL, 'global', NULL, '2021-08-25 04:33:56', '2021-08-25 04:33:56'),
(5, NULL, 'ip', '::1', '2021-08-25 04:33:56', '2021-08-25 04:33:56'),
(6, 1, 'user', NULL, '2021-08-25 04:33:56', '2021-08-25 04:33:56'),
(7, NULL, 'global', NULL, '2021-08-25 06:30:43', '2021-08-25 06:30:43'),
(8, NULL, 'ip', '::1', '2021-08-25 06:30:43', '2021-08-25 06:30:43'),
(9, NULL, 'global', NULL, '2021-08-25 06:32:06', '2021-08-25 06:32:06'),
(10, NULL, 'ip', '::1', '2021-08-25 06:32:06', '2021-08-25 06:32:06'),
(11, NULL, 'global', NULL, '2021-08-25 06:32:18', '2021-08-25 06:32:18'),
(12, NULL, 'ip', '::1', '2021-08-25 06:32:18', '2021-08-25 06:32:18'),
(13, NULL, 'global', NULL, '2021-08-26 04:21:45', '2021-08-26 04:21:45'),
(14, NULL, 'ip', '::1', '2021-08-26 04:21:45', '2021-08-26 04:21:45'),
(15, 35, 'user', NULL, '2021-08-26 04:21:45', '2021-08-26 04:21:45'),
(16, NULL, 'global', NULL, '2021-08-26 04:22:59', '2021-08-26 04:22:59'),
(17, NULL, 'ip', '::1', '2021-08-26 04:22:59', '2021-08-26 04:22:59'),
(18, NULL, 'global', NULL, '2021-08-26 04:25:18', '2021-08-26 04:25:18'),
(19, NULL, 'ip', '::1', '2021-08-26 04:25:18', '2021-08-26 04:25:18'),
(20, NULL, 'global', NULL, '2021-08-26 04:26:51', '2021-08-26 04:26:51'),
(21, NULL, 'ip', '::1', '2021-08-26 04:26:51', '2021-08-26 04:26:51'),
(22, NULL, 'global', NULL, '2021-08-26 04:44:39', '2021-08-26 04:44:39'),
(23, NULL, 'ip', '::1', '2021-08-26 04:44:39', '2021-08-26 04:44:39'),
(24, 35, 'user', NULL, '2021-08-26 04:44:39', '2021-08-26 04:44:39'),
(25, NULL, 'global', NULL, '2021-08-26 06:01:07', '2021-08-26 06:01:07'),
(26, NULL, 'ip', '::1', '2021-08-26 06:01:07', '2021-08-26 06:01:07'),
(27, 36, 'user', NULL, '2021-08-26 06:01:07', '2021-08-26 06:01:07'),
(28, NULL, 'global', NULL, '2021-08-26 06:46:01', '2021-08-26 06:46:01'),
(29, NULL, 'ip', '::1', '2021-08-26 06:46:01', '2021-08-26 06:46:01'),
(30, NULL, 'global', NULL, '2021-08-26 06:46:09', '2021-08-26 06:46:09'),
(31, NULL, 'ip', '::1', '2021-08-26 06:46:09', '2021-08-26 06:46:09'),
(32, NULL, 'global', NULL, '2021-08-26 08:06:32', '2021-08-26 08:06:32'),
(33, NULL, 'ip', '::1', '2021-08-26 08:06:32', '2021-08-26 08:06:32'),
(34, 41, 'user', NULL, '2021-08-26 08:06:32', '2021-08-26 08:06:32'),
(35, NULL, 'global', NULL, '2021-08-26 08:09:03', '2021-08-26 08:09:03'),
(36, NULL, 'ip', '::1', '2021-08-26 08:09:03', '2021-08-26 08:09:03'),
(37, 42, 'user', NULL, '2021-08-26 08:09:03', '2021-08-26 08:09:03'),
(38, NULL, 'global', NULL, '2021-08-26 08:17:45', '2021-08-26 08:17:45'),
(39, NULL, 'ip', '::1', '2021-08-26 08:17:45', '2021-08-26 08:17:45'),
(40, 42, 'user', NULL, '2021-08-26 08:17:45', '2021-08-26 08:17:45'),
(41, NULL, 'global', NULL, '2021-08-26 08:20:40', '2021-08-26 08:20:40'),
(42, NULL, 'ip', '::1', '2021-08-26 08:20:40', '2021-08-26 08:20:40'),
(43, 43, 'user', NULL, '2021-08-26 08:20:40', '2021-08-26 08:20:40'),
(44, NULL, 'global', NULL, '2021-08-26 09:35:17', '2021-08-26 09:35:17'),
(45, NULL, 'ip', '::1', '2021-08-26 09:35:17', '2021-08-26 09:35:17'),
(46, 45, 'user', NULL, '2021-08-26 09:35:17', '2021-08-26 09:35:17'),
(47, NULL, 'global', NULL, '2021-08-26 09:38:16', '2021-08-26 09:38:16'),
(48, NULL, 'ip', '::1', '2021-08-26 09:38:16', '2021-08-26 09:38:16'),
(49, 45, 'user', NULL, '2021-08-26 09:38:16', '2021-08-26 09:38:16'),
(50, NULL, 'global', NULL, '2021-08-26 09:40:46', '2021-08-26 09:40:46'),
(51, NULL, 'ip', '::1', '2021-08-26 09:40:46', '2021-08-26 09:40:46'),
(52, 45, 'user', NULL, '2021-08-26 09:40:46', '2021-08-26 09:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_address` text COLLATE utf8mb4_unicode_ci,
  `store_descriptioin` text COLLATE utf8mb4_unicode_ci,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `register_via` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `address`, `store_name`, `store_address`, `store_descriptioin`, `contact_number`, `profile_picture`, `banner_picture`, `google_id`, `register_via`, `created_at`, `updated_at`) VALUES
(4, 'mendheanup21@gmail.com', '$2y$10$1gpmv0xn6ZUvEJUJQsql5uIi0xWBiqHDwTesOfVy7WOI4vhsAMNrq', NULL, '2021-08-26 08:22:17', 'anup', 'mendhe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-25 06:39:58', '2021-08-26 08:22:17'),
(7, 'alok@gmail.com', '$2y$10$7kgybh/jCSZYG0GdV5OweegDhk.5F3LIQop4tbca/C2gglm.r4B6S', NULL, NULL, 'alok', 'nath', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-25 09:20:12', '2021-08-25 09:20:12'),
(8, 'sangita@gmail.com', '$2y$10$3i3NtlceA59MLXwLA/PNTe47tLOEHd305P3kqeJL8w82wKw1MjFgm', NULL, NULL, 'sangita', 'rao', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-25 09:22:37', '2021-08-25 09:22:37'),
(26, 'amendhe.nitgsm2015@gmail.com', '$2y$10$VBJxzdiZeFESr34iU.u69ObNgtDhPyjNymGbnCHSdKLFNI0xDhPua', NULL, NULL, 'sdsa', 'sdffs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-25 11:10:07', '2021-08-25 11:10:07'),
(29, 'giyafag818@5sword.com', '$2y$10$WUtuo9de3A2W3Y.wwbZmuuTN9.v79IwkOicRMSVlHa4gUD.6psE4G', NULL, NULL, 'rajendra', 'desai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-25 14:01:16', '2021-08-25 14:01:16'),
(30, 'user2anup21@gmail.com', '$2y$10$ZaiFK5rBGIy3UeUJyDwtWu5OjCzdDC54r6pNYDlbtNOqss..VhkSS', NULL, NULL, 'akash', 'chopra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-25 15:06:13', '2021-08-25 15:06:13'),
(36, 'vickys.mendhe82@gmail.com', '$2y$10$h4Q3YYQ3XDDQPavZyCfdauCjSELWZiTGVVN8cqKW3YbSdj1rMtlUS', NULL, '2021-08-26 06:06:02', 'Aloknath', 'Singhs', 'asdasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-25 15:42:07', '2021-08-26 06:06:02'),
(37, 'user12@gmail.com', '$2y$10$I5Bua5u08KpeI1KdpkzT1OKfwBbvikc6JllWjXDdJlUYzy8y./6s2', NULL, '2021-08-26 06:35:14', 'sdf', 'sdfsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-26 06:26:15', '2021-08-26 06:35:14'),
(38, 'ratan@gmail.com', '$2y$10$t/U0VnqAOcrdmPQIg8WvqO2VqPr0ZQXpBo0XxD30uO9Yq62JXvS4i', NULL, NULL, 'ratan', 'shah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-26 06:36:15', '2021-08-26 06:36:15'),
(39, 'rahul@gmail.com', '$2y$10$RPNRKA03cZ/htubU..xoC.DD25yGB.zWOHRPvTdiwrO26fT7dRKJy', NULL, NULL, 'rahul', 'dev', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-26 06:50:37', '2021-08-26 06:50:37'),
(44, 'rakesh@gmail.com', '$2y$10$mX1Ra1KSFUpKxkIewPhIwOAsVzVPZXlumPPHkMrUSrsJg4Xf3LOv6', NULL, NULL, 'rakesh', 'sharma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-26 08:58:17', '2021-08-26 08:58:17'),
(47, 'useranup21@gmail.com', '$2y$10$fmJzeEYP6ET/Q8VXuYJrweTOv6Kl5/8Tn9Fx/58kaeYAGkTT/uYcS', NULL, '2021-08-26 09:45:22', 'Tenacious Techno', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '110934333904897757180', 'Google', '2021-08-26 09:45:21', '2021-08-26 09:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_name` varchar(255) DEFAULT NULL,
  `store_address` text,
  `store_description` text,
  `contact_number` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `banner_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `user_id`, `store_name`, `store_address`, `store_description`, `contact_number`, `profile_picture`, `banner_picture`, `created_at`, `updated_at`) VALUES
(1, 32, 'ram', 'ram nagar', 'nagpur area', '', 'b3f3662bf3273d4168055d4fc0948761cf5d5438.jpg', '6ee9205422d666701012909ec8846c6d15f1c457.jpg', '2021-08-25 15:22:26', '2021-08-25 15:22:26'),
(2, 33, 'riya', 'riya nagar', 'nagpur area', '23432424234', '979568a76b9dead8045ac2860e2e693537a4e088.jpg', '5014848d644a9306a08a467b046a879ac0c31206.jpg', '2021-08-25 15:29:56', '2021-08-25 15:29:56'),
(3, 34, 'sham', 'sham nagar', 'nagpur area', '4574747', 'b17dce3cca22ea05498584a9bf33b5ebcb930f02.jpg', 'a25f5be44243af2a3cac0c46e9f4c29ad9b8bec9.jpg', '2021-08-25 15:31:36', '2021-08-25 15:31:36'),
(4, 35, 'akshay', 'akshay nagar', 'nagpur area', '435353535', 'aaae19699f544ad0a1752e0e726a6780fcac752f.jpg', 'dcd32ffd712395492f02f2c650410e6103112609.jpg', '2021-08-25 15:36:17', '2021-08-25 15:36:17'),
(5, 36, 'alok', 'alok nagar', 'nagpur area', '43534535', '1038124feaa16c9e114a620a573db9b9d6fe57ee.jpg', 'af0587f728d357a6c5c4a8333ea0466fc75bdc0b.jpg', '2021-08-25 15:42:07', '2021-08-25 15:42:07'),
(6, 44, 'rakesh store', 'rakesh nagar', 'nagpur', '2342343424', '13f7cd39beac900f1dca731e93bc14f37e9b6cc7.jpg', '47be2cb59666821198dd94e5aa9edf5c702439e5.jpg', '2021-08-26 08:58:17', '2021-08-26 08:58:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
