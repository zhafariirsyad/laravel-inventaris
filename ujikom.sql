-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2019 at 02:50 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujikom`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_tipe` (IN `type_id` INTEGER(12))  BEGIN
    	DELETE FROM types where id = type_id;
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `borrows`
--

CREATE TABLE `borrows` (
  `id` int(10) UNSIGNED NOT NULL,
  `borrow_date` datetime NOT NULL,
  `return_date` datetime NOT NULL,
  `status` enum('booked','borrowed','uncomplete','returned') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'uncomplete',
  `employee_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `approve` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrows`
--

INSERT INTO `borrows` (`id`, `borrow_date`, `return_date`, `status`, `employee_id`, `user_id`, `approve`, `created_at`, `updated_at`) VALUES
(2, '2019-05-06 07:36:07', '2019-05-06 07:36:07', 'returned', 4, 1, 0, '2019-05-03 00:36:07', '2019-05-03 00:45:04'),
(5, '2019-05-06 07:51:20', '2019-05-06 07:51:20', 'returned', 4, 1, 0, '2019-05-03 00:51:20', '2019-05-03 00:51:41'),
(6, '2019-05-06 07:53:02', '2019-05-06 07:53:02', 'returned', 1, 1, 1, '2019-05-03 00:53:02', '2019-05-03 00:53:50'),
(7, '2019-05-06 07:54:01', '2019-05-06 07:54:01', 'returned', 6, 1, 1, '2019-05-03 00:54:01', '2019-05-03 00:54:12'),
(8, '2019-05-06 09:24:20', '2019-05-06 09:24:20', 'returned', 1, 1, 1, '2019-05-03 02:24:20', '2019-05-03 02:30:41'),
(9, '2019-05-06 09:43:21', '2019-05-06 09:43:21', 'returned', 1, 1, 1, '2019-05-03 02:43:21', '2019-05-03 11:53:33'),
(10, '2019-05-06 09:46:01', '2019-05-06 09:46:01', 'returned', 1, 1, 1, '2019-05-03 02:46:01', '2019-05-03 12:20:15'),
(11, '2019-05-06 09:46:26', '2019-05-06 09:46:26', 'returned', 1, 1, 1, '2019-05-03 02:46:26', '2019-05-03 11:52:08'),
(12, '2019-05-06 09:58:47', '2019-05-06 09:58:47', 'returned', 4, 1, 1, '2019-05-03 02:58:47', '2019-05-03 03:01:42'),
(13, '2019-05-06 10:00:37', '2019-05-06 10:00:37', 'booked', 4, NULL, 0, '2019-05-03 03:00:37', '2019-05-03 03:00:37'),
(14, '2019-05-06 10:09:53', '2019-05-06 10:09:53', 'booked', 4, NULL, 0, '2019-05-03 03:09:53', '2019-05-03 03:09:53'),
(15, '2019-05-06 10:30:55', '2019-05-06 10:30:55', 'returned', 4, 1, 0, '2019-05-03 03:30:55', '2019-05-03 12:21:33'),
(16, '2019-05-06 10:42:19', '2019-05-06 10:42:19', 'returned', 4, 1, 0, '2019-05-03 03:42:19', '2019-05-03 12:21:17'),
(17, '2019-05-06 11:37:20', '2019-05-06 11:37:20', 'returned', 1, 1, 1, '2019-05-03 04:37:20', '2019-05-03 04:49:22'),
(18, '2019-05-06 11:50:08', '2019-05-06 11:50:08', 'returned', 6, 1, 1, '2019-05-03 04:50:08', '2019-05-03 04:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_details`
--

CREATE TABLE `borrow_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `borrow_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `status` enum('booked','returned','borrowed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'borrowed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrow_details`
--

INSERT INTO `borrow_details` (`id`, `borrow_id`, `item_id`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 9, 'borrowed', '2019-05-03 00:44:57', '2019-05-03 00:44:57'),
(2, 5, 1, 9, 'borrowed', '2019-05-03 00:51:36', '2019-05-03 00:51:36'),
(3, 6, 1, 9, 'borrowed', '2019-05-03 00:53:19', '2019-05-03 00:53:19'),
(4, 7, 1, 9, 'borrowed', '2019-05-03 00:54:05', '2019-05-03 00:54:05'),
(5, 8, 5, 5, 'borrowed', '2019-05-03 02:24:31', '2019-05-03 02:24:31'),
(6, 9, 11, 2, 'borrowed', '2019-05-03 02:43:38', '2019-05-03 02:43:38'),
(7, 11, 2, 3, 'borrowed', '2019-05-03 02:46:42', '2019-05-03 02:46:42'),
(8, 12, 9, 2, 'borrowed', '2019-05-03 02:58:58', '2019-05-03 02:58:58'),
(9, 12, 9, 2, 'borrowed', '2019-05-03 02:59:07', '2019-05-03 02:59:07'),
(10, 12, 11, 2, 'borrowed', '2019-05-03 02:59:20', '2019-05-03 02:59:20'),
(11, 17, 1, 7, 'borrowed', '2019-05-03 04:48:29', '2019-05-03 04:49:15'),
(12, 18, 1, 4, 'borrowed', '2019-05-03 04:50:15', '2019-05-03 04:50:19'),
(13, 10, 1, 2, 'borrowed', '2019-05-03 12:18:49', '2019-05-03 12:18:49'),
(14, 16, 1, 2, 'borrowed', '2019-05-03 12:21:10', '2019-05-03 12:21:10'),
(15, 15, 1, 5, 'borrowed', '2019-05-03 12:21:26', '2019-05-03 12:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `broken_items`
--

CREATE TABLE `broken_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `borrow_id` int(10) UNSIGNED NOT NULL,
  `broken_date` datetime NOT NULL,
  `fix_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `broken_items`
--

INSERT INTO `broken_items` (`id`, `item_id`, `total`, `borrow_id`, `broken_date`, `fix_date`, `created_at`, `updated_at`) VALUES
(6, 1, 1, 16, '2019-05-03 19:21:17', '2019-05-03 19:21:42', '2019-05-03 12:21:17', '2019-05-03 12:21:42'),
(7, 1, 3, 15, '2019-05-03 19:21:33', '2019-05-03 19:24:04', '2019-05-03 12:21:33', '2019-05-03 12:24:04');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` int(10) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `nip`, `address`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Gawati Safitri S.Farm', 11605502, 'Kpg. Veteran No. 714, Makassar 65284, DIY', '11605502', '$2y$10$92ljrrND33rqZVWbYZps7.MQWfpn7gbVwr4o3h.yLMU.tjJ3GFNTO', '2019-05-02 00:02:35', '2019-05-02 00:02:35'),
(2, 'Lala Diah Pudjiastuti', 11605503, 'Jln. Cikutra Barat No. 756, Tebing Tinggi 27432, SulTeng', '11605503', '$2y$10$LR.8ykVXN.PcXWmTPeUxWOxZpKWFmYRskaEkZHDenTVveDa8.OaQK', '2019-05-02 00:02:35', '2019-05-02 00:02:35'),
(3, 'Elisa Wijayanti', 11605504, 'Kpg. Hang No. 142, Banda Aceh 46966, BaBel', '11605504', '$2y$10$p9mozaBogjc/jOJ2GPGEaunqTtavYKf4vmJ9iGoHkOnkozu3h3oGi', '2019-05-02 00:02:35', '2019-05-02 00:02:35'),
(4, 'Jessica Usada', 11605505, 'Gg. Bakin No. 982, Makassar 70363, SumUt', '11605505', '$2y$10$s7SwVQloA3qXhvBBq1t7besykf5MbugJkCVSQHANw20ViiRqf8GA.', '2019-05-02 00:02:36', '2019-05-02 00:02:36'),
(5, 'Chelsea Hartati', 11605506, 'Dk. Abdul. Muis No. 716, Madiun 39938, JaTim', '11605506', '$2y$10$SElHb2veW6dXInXhbnyMpeD5j23dqFl6gjw4EMMFgszxiwuDorL8K', '2019-05-02 00:02:36', '2019-05-02 00:02:36'),
(6, 'Okto Bahuraksa Prakasa', 11605507, 'Jln. K.H. Maskur No. 217, Tual 19897, JaTeng', '11605507', '$2y$10$33qD64XcNqf9I0mqWlgCiOwCnBcUPra1ZbGUDqP2GXh0CAYq4J3L.', '2019-05-02 00:02:36', '2019-05-02 00:02:36'),
(7, 'Wirda Kusmawati', 11605508, 'Ki. Merdeka No. 259, Padang 45847, Riau', '11605508', '$2y$10$ZlZZVBJEOq1YXGn1xBKgXufEn6euV/nrOF9Cd9JdgqkP6oI.TU6RS', '2019-05-02 00:02:36', '2019-05-02 00:02:36'),
(8, 'Okta Cakrajiya Pratama S.IP', 11605509, 'Kpg. Merdeka No. 15, Palembang 65918, Bali', '11605509', '$2y$10$OrgX0alDyrM51j12I/XoNeywWrB2R6my625kWhA64532J32.Q1OPK', '2019-05-02 00:02:37', '2019-05-02 00:02:37'),
(9, 'Maya Aryani', 11605510, 'Kpg. Basmol Raya No. 986, Tidore Kepulauan 30234, Banten', '11605510', '$2y$10$wbElb2hT8V6EvVLPXP88JOX.0HaJe3eGAHuv3iRyayr21R4qb7wda', '2019-05-02 00:02:37', '2019-05-02 00:02:37'),
(10, 'Elvin Waskita', 11605511, 'Dk. Basoka No. 532, Subulussalam 47058, JaTeng', '11605511', '$2y$10$D3LE7IW25/lYrmf2TKgD9eJUX8rFH55e7W2hjrVf7a/8sFML0FNcW', '2019-05-02 00:02:37', '2019-05-02 00:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'good',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `register_date` date NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `item_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `condition`, `description`, `total`, `type_id`, `register_date`, `room_id`, `item_code`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Kursi', 'good', 'Velit necessitatibus commodi eius optio magnam. Error voluptas porro iste veniam dicta. Atque ex odit porro architecto. Quod magni occaecati qui ab debitis quae veritatis.', 101, 3, '2019-05-02', 12, NULL, 1, '2019-05-02 00:02:35', '2019-05-03 12:24:04'),
(2, 'Meja', 'good', 'Debitis aut aperiam enim odit. Et quasi ad iure facilis itaque laborum. Rem corrupti placeat in adipisci voluptatem quis libero commodi.', 13, 2, '2019-05-02', 2, NULL, 1, '2019-05-02 00:02:35', '2019-05-03 11:52:12'),
(3, 'Piring', 'good', 'Enim eos molestias debitis magni. Quibusdam odio rerum corporis dolore molestiae voluptate deserunt. Accusamus veniam velit et repellat magnam ea. Quo non est sit sit minus modi.', 10, 3, '2019-05-02', 3, NULL, 1, '2019-05-02 00:02:35', '2019-05-02 00:02:35'),
(4, 'Garpu', 'good', 'Ut consequatur soluta vel illo ab omnis. Cupiditate quisquam beatae et saepe minus. Vel sit quas sed et illum.', 10, 4, '2019-05-02', 4, NULL, 1, '2019-05-02 00:02:35', '2019-05-02 00:02:35'),
(5, 'Sendok', 'good', 'Libero odio sit officiis ratione. Tempora sint molestiae aut repellat. Quisquam enim quis ipsa blanditiis ratione voluptatum aliquid.', 10, 5, '2019-05-02', 5, NULL, 1, '2019-05-02 00:02:36', '2019-05-03 02:30:41'),
(6, 'Taplak', 'good', 'Qui a hic a ea libero. Quis quisquam est minus consequatur iste rerum. Consequatur aut excepturi nihil impedit sed.', 10, 6, '2019-05-02', 6, NULL, 1, '2019-05-02 00:02:36', '2019-05-02 00:02:36'),
(7, 'Panci', 'good', 'Veniam temporibus esse velit aut molestiae deleniti assumenda. Distinctio asperiores dignissimos omnis laudantium consequatur non consequuntur. Neque assumenda et quis et aut placeat.', 10, 7, '2019-05-02', 7, NULL, 1, '2019-05-02 00:02:36', '2019-05-02 00:02:36'),
(8, 'Handphone', 'good', 'Placeat porro nemo sit repudiandae eum. Odit occaecati et qui natus magnam culpa sunt doloremque. Dicta eligendi eum ratione labore dolor.', 10, 8, '2019-05-02', 8, NULL, 1, '2019-05-02 00:02:36', '2019-05-02 00:02:36'),
(9, 'Laptop', 'good', 'Vero cumque impedit est illo. Hic laudantium ratione voluptatum et. Ut sed sed aut quia qui. Quia nam vero sit aut.', 10, 9, '2019-05-02', 9, NULL, 1, '2019-05-02 00:02:37', '2019-05-03 03:02:38'),
(10, 'Komputer', 'good', 'Vel repudiandae culpa omnis temporibus occaecati. Fugiat autem porro quas libero. Et voluptas maiores et optio. Sed aut eos excepturi reiciendis placeat accusamus impedit maxime.', 10, 10, '2019-05-02', 10, NULL, 1, '2019-05-02 00:02:37', '2019-05-02 00:02:37'),
(11, 'Laptop', 'good', 'Laptop HP terbaru', 19, 2, '2019-05-03', 11, NULL, 1, '2019-05-02 20:58:50', '2019-05-03 11:53:37'),
(12, 'Tablet', 'good', 'Tablet', 5, 2, '2019-05-03', 11, NULL, 1, '2019-05-02 20:59:10', '2019-05-02 20:59:10'),
(13, 'Sapu', 'good', 'Test', 10, 3, '2019-05-03', 11, NULL, 1, '2019-05-03 12:38:40', '2019-05-03 12:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-05-02 00:02:34', '2019-05-02 00:02:34'),
(2, 'operator', '2019-05-02 00:02:34', '2019-05-02 00:02:34');

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
(3, '2019_05_02_004742_create_rooms_table', 1),
(4, '2019_05_02_004759_create_types_table', 1),
(5, '2019_05_02_004821_create_employees_table', 1),
(6, '2019_05_02_004837_create_levels_table', 1),
(7, '2019_05_02_004916_create_items_table', 1),
(8, '2019_05_02_004929_create_supplies_table', 1),
(14, '2019_05_02_005248_create_borrows_table', 3),
(15, '2019_05_02_005308_create_borrow_details_table', 3),
(16, '2019_05_02_004952_create_broken_items_table', 4);

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
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `room_code`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Room - 1', NULL, 'Voluptatem adipisci error sint autem. Est et magni aperiam. Nesciunt tenetur similique illo totam hic quo veniam. Praesentium non id quae sunt.', '2019-05-02 00:02:34', '2019-05-02 00:02:34'),
(2, 'Room - 2', NULL, 'Eveniet pariatur illum architecto. Soluta aut blanditiis et in praesentium. Totam quae eius officiis vero necessitatibus nostrum aspernatur.', '2019-05-02 00:02:35', '2019-05-02 00:02:35'),
(3, 'Room - 3', NULL, 'Deserunt alias saepe voluptates rerum earum voluptas non. Sunt quaerat fugiat quia placeat rerum totam eaque. Placeat odio necessitatibus temporibus perferendis.', '2019-05-02 00:02:35', '2019-05-02 00:02:35'),
(4, 'Room - 4', NULL, 'Nisi natus in dicta aut ut. Dolores vel autem qui et mollitia reiciendis. Numquam est at excepturi eius.', '2019-05-02 00:02:35', '2019-05-02 00:02:35'),
(5, 'Room - 5', NULL, 'Non exercitationem minus facilis illo. Alias et a qui sunt velit repudiandae accusamus. Beatae minima accusamus consequatur consequatur quod est nemo. Beatae sunt deleniti quae amet voluptas.', '2019-05-02 00:02:36', '2019-05-02 00:02:36'),
(6, 'Room - 6', NULL, 'Autem exercitationem nisi est officia molestiae illo. Assumenda autem fugiat in nobis similique. Rerum veritatis voluptatem deleniti placeat doloremque voluptatem.', '2019-05-02 00:02:36', '2019-05-02 00:02:36'),
(7, 'Room - 7', NULL, 'Quo in non commodi aliquid dolor fuga. Itaque autem enim sit praesentium qui. Incidunt consequatur est et et voluptates.', '2019-05-02 00:02:36', '2019-05-02 00:02:36'),
(8, 'Room - 8', NULL, 'Dolor sunt ducimus beatae cum. Dicta enim quae qui dignissimos odit facilis esse est.', '2019-05-02 00:02:36', '2019-05-02 00:02:36'),
(9, 'Room - 9', NULL, 'Eveniet veniam quisquam molestiae minima perspiciatis. Ea voluptatum magnam culpa provident sit sequi. Nobis eaque similique libero occaecati placeat omnis blanditiis.', '2019-05-02 00:02:37', '2019-05-02 00:02:37'),
(10, 'Room - 10', NULL, 'Eligendi odio tempora commodi aut voluptatem qui. Dignissimos suscipit est deleniti nesciunt qui. Mollitia voluptatum adipisci perspiciatis dolorem libero.', '2019-05-02 00:02:37', '2019-05-02 00:02:37'),
(11, 'Ruang 202', NULL, 'Lab RPL', '2019-05-02 20:57:24', '2019-05-02 20:57:24'),
(12, 'Ruang 206', NULL, 'Lab TKJ', '2019-05-02 20:57:36', '2019-05-02 20:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `register_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`id`, `item_id`, `total`, `register_date`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '2019-05-02', '2019-05-02 00:32:32', '2019-05-02 00:32:32'),
(2, 2, 5, '2019-05-02', '2019-05-02 00:32:49', '2019-05-02 00:32:49'),
(3, 1, 1, '2019-05-03', '2019-05-02 21:00:22', '2019-05-02 21:00:22'),
(4, 9, 2, '2019-05-03', '2019-05-02 21:00:31', '2019-05-02 21:00:31');

--
-- Triggers `supplies`
--
DELIMITER $$
CREATE TRIGGER `pasok` AFTER INSERT ON `supplies` FOR EACH ROW BEGIN
	UPDATE items SET items.total = items.total + NEW.total
    WHERE items.id = NEW.item_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `type_code`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Elektronik', NULL, 'Barang Elektronik', '2019-05-02 00:02:35', '2019-05-02 20:56:03'),
(3, 'Peralatan Kelas', NULL, 'Iste eaque reprehenderit sunt suscipit molestiae soluta iusto. Et sapiente delectus est aut qui exercitationem ipsam. Ad nisi corrupti qui dolor optio.', '2019-05-02 00:02:35', '2019-05-02 21:00:02'),
(6, 'Type - 6', NULL, 'Est ea dolorem omnis. Cupiditate aut unde odio et. Omnis corrupti quasi quaerat ut explicabo ab. Facilis quam expedita sit ut consectetur.', '2019-05-02 00:02:36', '2019-05-02 00:02:36'),
(7, 'Type - 7', NULL, 'Magni ducimus explicabo quibusdam eos est. Quia suscipit perspiciatis quis qui eaque. Voluptas omnis incidunt magni odio libero quasi. Distinctio non quisquam et saepe rerum quaerat.', '2019-05-02 00:02:36', '2019-05-02 00:02:36'),
(8, 'Type - 8', NULL, 'Ad maiores fuga non nihil quae dolorum. Quasi sunt rerum recusandae ullam. Corporis dolor est rerum maiores consectetur ullam. Qui veniam quo autem non minus.', '2019-05-02 00:02:36', '2019-05-02 00:02:36'),
(9, 'Type - 9', NULL, 'Iste ad a nulla rerum. Eveniet distinctio aut veniam cumque et numquam. Aut eveniet praesentium numquam officiis doloribus tempora quo. Sit hic omnis consectetur eos.', '2019-05-02 00:02:37', '2019-05-02 00:02:37'),
(10, 'Type - 10', NULL, 'Ex velit quo laborum. Enim voluptatem dolorum repellat a. Velit sed dolorem quod modi explicabo labore velit. Consequatur ex voluptatem maxime et.', '2019-05-02 00:02:37', '2019-05-02 00:02:37'),
(11, 'Alat Kebersihan', NULL, 'test', '2019-05-02 20:56:18', '2019-05-02 20:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$0sr7z/sNZPXxY6ndGTodnOD9.WSvvP4PczEUQIr39ZRPt7moz0JSW', 1, 'RYepK1oL5ArqEkcSRZwhWJiJwAzUWnOko89j8q1RuH2bXznWjbKlVgMYLtT3', '2019-05-02 00:02:34', '2019-05-02 23:45:01'),
(2, 'Operator', 'operator@gmail.com', NULL, '$2y$10$ax/LY0/8namx11jhKcFyEOjvrmzoqjywZVZCZoTHGbKYO8dcvdBwu', 2, '7gr9MzgCBXoIEByWRezrOUYYI7LXZ9y6EKRFgOt977rwGh6o2wGNRR691uad', '2019-05-02 00:02:34', '2019-05-02 00:02:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrows`
--
ALTER TABLE `borrows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrow_details`
--
ALTER TABLE `borrow_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `broken_items`
--
ALTER TABLE `broken_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
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
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `borrows`
--
ALTER TABLE `borrows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `borrow_details`
--
ALTER TABLE `borrow_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `broken_items`
--
ALTER TABLE `broken_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
