-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 31, 2021 at 05:39 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

DROP TABLE IF EXISTS `exams`;
CREATE TABLE IF NOT EXISTS `exams` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject_id` int NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `exam_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `total_marks` int NOT NULL,
  `pass_marks` int NOT NULL,
  `duration` bigint NOT NULL COMMENT 'in minutes',
  `eatch_questions_marks` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `subject_id`, `thumbnail`, `exam_name`, `description`, `total_marks`, `pass_marks`, `duration`, `eatch_questions_marks`, `created_at`, `updated_at`) VALUES
(1, 4, '', 'Uriel', 'Harum quia maxime od', 21, 70, 4, 1, '2021-10-29 21:20:42', '2021-10-29 21:20:42'),
(2, 4, '', 'Uriel', 'Harum quia maxime od', 21, 70, 4, 1, '2021-10-29 21:22:07', '2021-10-29 21:22:07'),
(3, 2, '6040bebc-f2b0-4aff-9cfa-5eee397dc981.jpg', 'Haley', 'Quaerat magnam dolor', 47, 96, 44, 1, '2021-10-31 08:39:55', '2021-10-31 08:39:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2021_10_28_011900_user_exams', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `exam_id` int NOT NULL,
  `question` text NOT NULL,
  `option_one` text NOT NULL,
  `option_two` text NOT NULL,
  `option_three` text NOT NULL,
  `option_four` text NOT NULL,
  `correct_answer` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `exam_id`, `question`, `option_one`, `option_two`, `option_three`, `option_four`, `correct_answer`, `created_at`, `updated_at`) VALUES
(1, 2, 'Neque voluptatibus c', 'Cupidatat qui aperia', 'Quo ea ex qui cupidi', 'Odit sapiente irure', 'Accusamus labore id', 3, '2021-10-31 07:53:39', '2021-10-31 08:23:07'),
(2, 2, 'Laborum Nostrum dol', 'Qui quas mollitia es', 'Placeat assumenda a', 'Temporibus qui volup', 'Laudantium enim nih', 1, '2021-10-31 07:53:49', '2021-10-31 07:53:49'),
(3, 2, 'Rerum ducimus quo a', 'In rerum tempor qui', 'Ipsum quia cum magna', 'Vel ut minim ut arch', 'Quo qui non aut et e', 4, '2021-10-31 07:54:03', '2021-10-31 07:54:03'),
(4, 2, 'Dignissimos voluptat', 'Et non quaerat in ad', 'Libero et nesciunt', 'Qui enim voluptas et', 'Illum quas quasi mi', 3, '2021-10-31 07:54:06', '2021-10-31 07:54:06'),
(5, 2, 'Cupidatat officiis e', 'Nulla id odio quidem', 'Est vel dolorum do q', 'Laudantium duis sed', 'Reprehenderit hic c', 3, '2021-10-31 07:54:10', '2021-10-31 07:54:10'),
(6, 2, 'Deserunt laborum vol', 'Proident ea quis co', 'In iste in tempora q', 'Officia explicabo S', 'Suscipit ullamco dol', 1, '2021-10-31 07:54:12', '2021-10-31 07:54:12'),
(7, 2, 'Consequatur Totam d', 'Impedit veniam qua', 'A molestiae sint dui', 'Harum nesciunt reru', 'Libero enim mollit a', 4, '2021-10-31 07:54:15', '2021-10-31 07:54:15'),
(8, 2, 'Proident consequatu', 'Ad porro ea perspici', 'Dolore quia in quas', 'Fugit recusandae D', 'Lorem laboriosam re', 4, '2021-10-31 07:54:18', '2021-10-31 07:54:18'),
(12, 3, 'Neque iste do qui as', 'Officiis culpa quos', 'Nobis velit quidem c', 'Minus eos ut qui quo', 'Ea obcaecati magni i', 3, '2021-10-31 12:08:30', '2021-10-31 12:08:30'),
(11, 3, 'Obcaecati temporibus', 'Repudiandae eos ips', 'Eum cumque anim aliq', 'Aliquam atque nostru', 'Reiciendis ipsum in', 1, '2021-10-31 08:44:17', '2021-10-31 08:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `created_at`, `updated_at`) VALUES
(1, 'subject one', '2021-10-28 01:21:04', '2021-10-29 01:21:10'),
(2, 'subject two', '2021-10-28 01:21:20', '2021-10-29 01:21:24'),
(3, 'subject three', '2021-10-28 01:21:04', '2021-10-29 01:21:10'),
(4, 'subject four', '2021-10-28 01:21:20', '2021-10-29 01:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `usertype` enum('teacher','student') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'student', 'Devin Foley', 'kipeju@mailinator.com', NULL, '$2y$10$/wNNgpA1mjaJxrOj.JTJMuykhdnOyUDZ2SoW2JbEvfJfr02JOd0Wq', NULL, '2021-10-26 19:51:23', '2021-10-26 19:51:23'),
(2, 'student', 'Roanna Cohen', 'capaxu@mailinator.com', NULL, '$2y$10$PPOyPmk.EUR6J9xyralvPOWq63lZ2rVFXPagfz1qGqGLpkn.W2IMe', NULL, '2021-10-26 20:22:42', '2021-10-26 20:22:42'),
(3, 'student', 'aditya saha', 'student@gmail.com', NULL, '$2y$10$g0vLmL2Nf7ZEFFvK6DGK4.kdrr.t6NekDZrPOXxqvWUjezNiwzaba', NULL, '2021-10-27 20:29:04', '2021-10-27 20:29:04'),
(4, 'teacher', 'Teacher Aditya Saha', 'teacher@gmail.com', NULL, '$2y$10$g0vLmL2Nf7ZEFFvK6DGK4.kdrr.t6NekDZrPOXxqvWUjezNiwzaba', NULL, '2021-10-27 20:29:04', '2021-10-27 20:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_exams`
--

DROP TABLE IF EXISTS `user_exams`;
CREATE TABLE IF NOT EXISTS `user_exams` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `exam_id` int NOT NULL,
  `total_marks` smallint UNSIGNED NOT NULL DEFAULT '0',
  `pass_marks` smallint UNSIGNED NOT NULL DEFAULT '0',
  `total_question` smallint UNSIGNED NOT NULL,
  `time_taken` smallint UNSIGNED NOT NULL DEFAULT '0' COMMENT 'user take time to give exam',
  `each_question_mark` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `total_right_ans` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `total_wrong_ans` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `total_not_attempt` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `total_marks_obtain` smallint NOT NULL DEFAULT '0',
  `is_active` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `is_deleted` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_ans` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
