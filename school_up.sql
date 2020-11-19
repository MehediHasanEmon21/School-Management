-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2020 at 10:38 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_employee_salaries`
--

CREATE TABLE `account_employee_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_other_costs`
--

CREATE TABLE `account_other_costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` double NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_other_costs`
--

INSERT INTO `account_other_costs` (`id`, `date`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(3, '2020-11-18', 500, '1 box marker', '2020-11-18 04:02:19', '2020-11-18 04:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `account_student_fees`
--

CREATE TABLE `account_student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_student_fees`
--

INSERT INTO `account_student_fees` (`id`, `year_id`, `class_id`, `student_id`, `fee_category_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 16, 5, '2020-01', 500, '2020-11-18 04:00:14', '2020-11-18 04:00:14'),
(5, 1, 1, 17, 5, '2020-01', 500, '2020-11-18 04:00:14', '2020-11-18 04:00:14'),
(6, 1, 1, 16, 4, '2020-11', 100, '2020-11-18 04:01:31', '2020-11-18 04:01:31'),
(7, 1, 1, 17, 4, '2020-11', 100, '2020-11-18 04:01:31', '2020-11-18 04:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

CREATE TABLE `assign_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `roll` int(11) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_students`
--

INSERT INTO `assign_students` (`id`, `student_id`, `roll`, `class_id`, `year_id`, `group_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(16, 16, 1, 1, 1, NULL, NULL, '2020-11-18 02:52:51', '2020-11-18 03:18:27'),
(17, 17, 2, 1, 1, NULL, NULL, '2020-11-18 02:55:20', '2020-11-18 03:18:27'),
(18, 18, 2, 2, 1, NULL, NULL, '2020-11-18 02:57:09', '2020-11-18 03:18:57'),
(19, 19, 1, 2, 1, NULL, NULL, '2020-11-18 02:58:44', '2020-11-18 03:18:57'),
(20, 20, 1, 3, 1, NULL, NULL, '2020-11-18 03:00:18', '2020-11-18 03:19:35'),
(21, 21, 2, 4, 1, NULL, NULL, '2020-11-18 03:01:34', '2020-11-18 03:19:46'),
(22, 22, 1, 4, 1, NULL, NULL, '2020-11-18 03:02:38', '2020-11-18 03:19:46'),
(23, 23, 2, 7, 1, NULL, NULL, '2020-11-18 03:04:02', '2020-11-18 03:20:00'),
(24, 24, 1, 7, 1, NULL, NULL, '2020-11-18 03:05:09', '2020-11-18 03:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `full_mark` double NOT NULL,
  `pass_mark` double NOT NULL,
  `subjective_mark` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `class_id`, `subject_id`, `full_mark`, `pass_mark`, `subjective_mark`, `created_at`, `updated_at`) VALUES
(20, 1, 1, 100, 33, 100, '2020-10-13 21:14:21', '2020-10-13 21:14:21'),
(21, 1, 2, 100, 33, 33, '2020-10-13 21:14:21', '2020-10-13 21:14:21'),
(22, 1, 3, 100, 33, 100, '2020-10-13 21:14:21', '2020-10-14 18:50:56'),
(23, 2, 1, 100, 33, 100, '2020-11-18 02:35:04', '2020-11-18 02:35:04'),
(24, 2, 2, 100, 33, 100, '2020-11-18 02:35:04', '2020-11-18 02:35:04'),
(25, 2, 3, 100, 33, 100, '2020-11-18 02:35:04', '2020-11-18 02:35:04'),
(26, 3, 1, 100, 33, 100, '2020-11-18 02:35:58', '2020-11-18 02:35:58'),
(27, 3, 2, 100, 33, 100, '2020-11-18 02:35:58', '2020-11-18 02:35:58'),
(28, 3, 3, 100, 33, 100, '2020-11-18 02:35:58', '2020-11-18 02:35:58'),
(29, 3, 4, 100, 33, 100, '2020-11-18 02:36:57', '2020-11-18 02:36:57'),
(30, 3, 5, 100, 33, 100, '2020-11-18 02:36:57', '2020-11-18 02:36:57'),
(31, 3, 6, 100, 33, 100, '2020-11-18 02:36:57', '2020-11-18 02:36:57'),
(32, 4, 1, 100, 33, 100, '2020-11-18 02:38:13', '2020-11-18 02:38:13'),
(33, 4, 2, 100, 33, 100, '2020-11-18 02:38:13', '2020-11-18 02:38:13'),
(34, 4, 3, 100, 33, 100, '2020-11-18 02:38:13', '2020-11-18 02:38:13'),
(35, 4, 4, 100, 33, 100, '2020-11-18 02:38:13', '2020-11-18 02:38:13'),
(36, 4, 5, 100, 33, 100, '2020-11-18 02:38:13', '2020-11-18 02:38:13'),
(37, 4, 6, 100, 33, 100, '2020-11-18 02:38:13', '2020-11-18 02:38:13'),
(38, 7, 1, 100, 33, 100, '2020-11-18 02:40:04', '2020-11-18 02:40:04'),
(39, 7, 2, 100, 33, 100, '2020-11-18 02:40:04', '2020-11-18 02:40:04'),
(40, 7, 3, 100, 33, 100, '2020-11-18 02:40:04', '2020-11-18 02:40:04'),
(41, 7, 4, 100, 33, 100, '2020-11-18 02:40:04', '2020-11-18 02:40:04'),
(42, 7, 5, 100, 33, 100, '2020-11-18 02:40:04', '2020-11-18 02:40:04'),
(43, 7, 6, 100, 33, 100, '2020-11-18 02:40:04', '2020-11-18 02:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Assistant Teacher', '2020-07-05 02:18:20', '2020-07-05 02:18:20'),
(2, 'Associate Teacher', '2020-07-05 02:19:14', '2020-07-05 02:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `discount_students`
--

CREATE TABLE `discount_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_student_id` int(11) NOT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_students`
--

INSERT INTO `discount_students` (`id`, `assign_student_id`, `fee_category_id`, `discount`, `created_at`, `updated_at`) VALUES
(10, 16, 5, NULL, '2020-11-18 02:52:51', '2020-11-18 02:52:51'),
(11, 17, 5, NULL, '2020-11-18 02:55:20', '2020-11-18 02:55:20'),
(12, 18, 5, 10, '2020-11-18 02:57:09', '2020-11-18 02:57:09'),
(13, 19, 5, NULL, '2020-11-18 02:58:45', '2020-11-18 02:58:45'),
(14, 20, 5, NULL, '2020-11-18 03:00:18', '2020-11-18 03:00:18'),
(15, 21, 5, 15, '2020-11-18 03:01:34', '2020-11-18 03:01:34'),
(16, 22, 5, 20, '2020-11-18 03:02:38', '2020-11-18 03:02:38'),
(17, 23, 5, NULL, '2020-11-18 03:04:02', '2020-11-18 03:04:02'),
(18, 24, 5, NULL, '2020-11-18 03:05:09', '2020-11-18 03:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `attend_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_attendances`
--

INSERT INTO `employee_attendances` (`id`, `employee_id`, `date`, `attend_status`, `created_at`, `updated_at`) VALUES
(9, 25, '2020-11-18', 'Present', '2020-11-18 03:53:15', '2020-11-18 03:53:15'),
(10, 26, '2020-11-18', 'Present', '2020-11-18 03:53:15', '2020-11-18 03:53:15'),
(11, 27, '2020-11-18', 'Present', '2020-11-18 03:53:15', '2020-11-18 03:53:15'),
(12, 25, '2020-11-17', 'Absent', '2020-11-18 03:53:28', '2020-11-18 03:53:28'),
(13, 26, '2020-11-17', 'Present', '2020-11-18 03:53:28', '2020-11-18 03:53:28'),
(14, 27, '2020-11-17', 'Present', '2020-11-18 03:53:28', '2020-11-18 03:53:28'),
(15, 25, '2020-11-16', 'Present', '2020-11-18 03:53:50', '2020-11-18 03:53:50'),
(16, 26, '2020-11-16', 'Absent', '2020-11-18 03:53:50', '2020-11-18 03:53:50'),
(17, 27, '2020-11-16', 'Present', '2020-11-18 03:53:50', '2020-11-18 03:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leaves`
--

CREATE TABLE `employee_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `leave_purpose_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_leaves`
--

INSERT INTO `employee_leaves` (`id`, `employee_id`, `leave_purpose_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(3, 25, 4, '2020-11-10', '2020-11-12', '2020-11-18 03:52:12', '2020-11-18 03:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_logs`
--

CREATE TABLE `employee_salary_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'emp_id = user-id',
  `previous_salary` double DEFAULT NULL,
  `present_salary` double DEFAULT NULL,
  `increment_salary` double DEFAULT NULL,
  `effected_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salary_logs`
--

INSERT INTO `employee_salary_logs` (`id`, `employee_id`, `previous_salary`, `present_salary`, `increment_salary`, `effected_date`, `created_at`, `updated_at`) VALUES
(8, 25, NULL, 20000, 0, '2020-11-18', '2020-11-18 03:38:43', '2020-11-18 03:38:43'),
(9, 26, NULL, 20000, 0, '1970-01-01', '2020-11-18 03:40:11', '2020-11-18 03:40:11'),
(10, 27, NULL, 25000, 0, '2020-09-16', '2020-11-18 03:41:29', '2020-11-18 03:41:29'),
(11, 27, 25000, 27000, 2000, '2020-12-01', '2020-11-18 03:46:38', '2020-11-18 03:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, '1st Term Examination', '2020-07-01 00:22:20', '2020-07-01 00:22:20'),
(5, '2nd Term Examination', '2020-07-01 00:22:36', '2020-07-01 00:22:36'),
(6, '3rd Term Examination', '2020-07-01 00:22:58', '2020-07-01 00:22:58');

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
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Exam Fee', '2020-06-29 04:24:27', '2020-06-29 04:24:27'),
(4, 'Monthly Fee', '2020-06-29 04:24:37', '2020-06-29 04:24:37'),
(5, 'Registration Fee', '2020-06-29 04:24:57', '2020-06-29 04:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `fee_category_amounts`
--

CREATE TABLE `fee_category_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `student_class_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_category_amounts`
--

INSERT INTO `fee_category_amounts` (`id`, `fee_category_id`, `student_class_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 500, '2020-06-29 13:05:28', '2020-06-29 13:05:28'),
(2, 5, 2, 500, '2020-06-29 13:05:28', '2020-06-29 13:05:28'),
(3, 5, 3, 800, '2020-06-29 13:05:28', '2020-06-29 13:05:28'),
(4, 5, 4, 800, '2020-06-29 13:05:28', '2020-06-29 13:05:28'),
(5, 5, 7, 1000, '2020-06-29 13:05:28', '2020-06-29 13:05:28'),
(6, 4, 1, 100, '2020-06-29 13:09:04', '2020-06-29 13:09:04'),
(7, 4, 2, 100, '2020-06-29 13:09:04', '2020-06-29 13:09:04'),
(8, 4, 3, 200, '2020-06-29 13:09:04', '2020-06-29 13:09:04'),
(9, 4, 4, 200, '2020-06-29 13:09:04', '2020-06-29 13:09:04'),
(10, 4, 7, 500, '2020-06-29 13:09:04', '2020-06-29 13:09:04'),
(16, 3, 1, 150, '2020-06-29 14:08:26', '2020-06-29 14:08:26'),
(17, 3, 2, 150, '2020-06-29 14:08:26', '2020-06-29 14:08:26'),
(18, 3, 3, 250, '2020-06-29 14:08:26', '2020-06-29 14:08:26'),
(19, 3, 4, 250, '2020-06-29 14:08:26', '2020-06-29 14:08:26'),
(20, 3, 7, 350, '2020-06-29 14:08:26', '2020-06-29 14:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Science', '2020-06-29 03:24:12', '2020-06-29 03:24:12'),
(2, 'Commerce', '2020-06-29 03:24:23', '2020-06-29 03:24:23'),
(3, 'Arts', '2020-06-29 03:24:30', '2020-06-29 03:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `leave_purposes`
--

CREATE TABLE `leave_purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_purposes`
--

INSERT INTO `leave_purposes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'Personal Problem', '2020-11-18 03:52:12', '2020-11-18 03:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `mark_grades`
--

CREATE TABLE `mark_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_mark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_mark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mark_grades`
--

INSERT INTO `mark_grades` (`id`, `grade_name`, `grade_point`, `start_mark`, `end_mark`, `start_point`, `end_point`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'A+', '5', '80', '100', '5', '5', 'Excelent', '2020-10-20 21:24:51', '2020-10-20 21:24:51'),
(2, 'A', '4', '70', '79', '4', '4.99', 'Very Good', '2020-11-05 01:08:34', '2020-11-05 01:08:34'),
(3, 'A-', '3.5', '60', '69', '3.5', '3.99', 'Good', '2020-11-05 01:09:46', '2020-11-05 01:09:46'),
(4, 'B', '3', '50', '59', '3', '3.49', 'Average', '2020-11-05 01:10:46', '2020-11-05 01:10:46'),
(5, 'C', '2', '40', '49', '2', '2.99', 'Dissapoint', '2020-11-05 01:11:33', '2020-11-05 01:11:33'),
(6, 'D', '1', '33', '39', '1', '1.99', 'Bad', '2020-11-05 01:12:13', '2020-11-05 01:12:13'),
(7, 'F', '0', '00', '32', '0', '0.99', 'Fail', '2020-11-05 01:12:58', '2020-11-05 01:12:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2020_05_03_173502_create_categories_table', 5),
(20, '2020_06_29_065403_create_student_classes_table', 6),
(21, '2020_06_29_071657_create_years_table', 7),
(22, '2020_06_29_090939_create_shifts_table', 8),
(23, '2020_06_29_090952_create_groups_table', 8),
(24, '2020_06_29_100612_create_fee_categories_table', 9),
(25, '2020_06_29_114154_create_fee_category_amounts_table', 10),
(26, '2020_07_01_054646_create_subjects_table', 11),
(27, '2020_07_01_054702_create_exam_types_table', 11),
(28, '2020_07_02_034021_create_assign_subjects_table', 12),
(29, '2020_07_05_081043_create_designations_table', 13),
(31, '2014_10_12_000000_create_users_table', 14),
(32, '2020_07_05_091438_create_assign_students_table', 15),
(33, '2020_07_05_091502_create_discount_students_table', 15),
(34, '2020_07_14_062135_create_employee_salary_logs_table', 16),
(35, '2020_09_08_182716_create_employee_leaves_table', 17),
(36, '2020_09_08_182744_create_leave_purposes_table', 17),
(37, '2020_09_13_181514_create_employee_attendances_table', 18),
(38, '2020_10_14_024306_create_student_marks_table', 19),
(39, '2020_10_21_025342_create_mark_grades_table', 20),
(40, '2020_11_01_052809_create_account_student_fees_table', 21),
(41, '2020_11_03_041435_create_account_employee_salaries_table', 22),
(42, '2020_11_03_092726_create_account_other_costs_table', 23);

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
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Shift A', '2020-06-29 03:25:04', '2020-06-29 03:25:04'),
(2, 'Shift B', '2020-06-29 03:25:12', '2020-06-29 03:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'One', '2020-06-29 01:08:04', '2020-06-29 01:08:04'),
(2, 'Two', '2020-06-29 01:08:11', '2020-06-29 01:08:11'),
(3, 'Three', '2020-06-29 01:08:17', '2020-06-29 01:08:17'),
(4, 'Four', '2020-06-29 01:08:25', '2020-06-29 01:08:25'),
(7, 'Five', '2020-06-29 06:09:32', '2020-06-29 06:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'student_id = user_id',
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `assign_subject_id` int(11) DEFAULT NULL,
  `exam_type_id` int(11) DEFAULT NULL,
  `marks` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `student_id`, `id_no`, `year_id`, `class_id`, `assign_subject_id`, `exam_type_id`, `marks`, `created_at`, `updated_at`) VALUES
(21, 16, '20200001', 1, 1, 20, 4, 67, '2020-11-18 03:55:55', '2020-11-18 03:55:55'),
(22, 17, '20200017', 1, 1, 20, 4, 89, '2020-11-18 03:55:55', '2020-11-18 03:55:55'),
(23, 16, '20200001', 1, 1, 21, 4, 78, '2020-11-18 03:56:19', '2020-11-18 03:56:19'),
(24, 17, '20200017', 1, 1, 21, 4, 67, '2020-11-18 03:56:19', '2020-11-18 03:56:19'),
(25, 16, '20200001', 1, 1, 22, 4, 90, '2020-11-18 03:56:39', '2020-11-18 03:56:39'),
(26, 17, '20200017', 1, 1, 22, 4, 85, '2020-11-18 03:56:39', '2020-11-18 03:56:39'),
(27, 18, '20200018', 1, 2, 23, 4, 46, '2020-11-18 03:58:06', '2020-11-18 03:58:06'),
(28, 19, '20200019', 1, 2, 23, 4, 76, '2020-11-18 03:58:06', '2020-11-18 03:58:06'),
(29, 18, '20200018', 1, 2, NULL, 4, 54, '2020-11-18 03:58:31', '2020-11-18 03:58:31'),
(30, 19, '20200019', 1, 2, NULL, 4, 58, '2020-11-18 03:58:31', '2020-11-18 03:58:31'),
(31, 18, '20200018', 1, 2, 25, 4, 77, '2020-11-18 03:58:48', '2020-11-18 03:58:48'),
(32, 19, '20200019', 1, 2, 25, 4, 69, '2020-11-18 03:58:48', '2020-11-18 03:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bangla', '2020-07-01 00:23:24', '2020-07-01 00:23:24'),
(2, 'English', '2020-07-01 00:23:33', '2020-07-01 00:23:33'),
(3, 'Mathematics', '2020-07-01 00:23:42', '2020-07-01 00:23:42'),
(4, 'Social Science', '2020-07-01 00:23:51', '2020-07-01 00:23:51'),
(5, 'General Science', '2020-07-01 00:24:05', '2020-07-01 00:24:05'),
(6, 'Islamic Studies', '2020-07-01 00:24:16', '2020-07-01 00:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'admin',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'admin=head of software, operator=computer operator, user=employee',
  `join_date` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `userType`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `fname`, `mname`, `religion`, `id_no`, `dob`, `code`, `role`, `join_date`, `designation_id`, `salary`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Emon', 'Admin', 'admin@gmail.com', NULL, '$2y$10$vaEpYyfjRmjIxYYRIl2y9O0gJ/fmHBIcEi9ywnMY6XfOcmjxw8kJO', '01783354905', NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', NULL, NULL, NULL, 1, NULL, NULL, '2020-11-17 06:11:46'),
(14, 'Samim', 'Admin', 'op@gmail.com', NULL, '$2y$10$5Y9.b7Ijo8e2mgppUBttCe6/DwSh2pHYpm.Nowt0VdbXvioJvBR4y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3187', 'operator', NULL, NULL, NULL, 1, NULL, '2020-11-17 05:48:39', '2020-11-17 05:48:39'),
(16, 'Samia Rahman', 'student', NULL, NULL, '$2y$10$TELNgg9NPqpTY0rsiPYfZ.Mm7QP9T6zfi6ZyKoyxjL7lBMMZdDea.', '01676546754', 'Dhaka', 'Female', 'public/assets/backend/images/student/2PGwYRZf9K.jpg', 'Sumon Rahman', 'Sakina Rahman', 'Muslim', '20200001', '2015-07-17', '2900', NULL, NULL, NULL, NULL, 1, NULL, '2020-11-18 02:52:51', '2020-11-18 02:52:51'),
(17, 'Siam Hossain', 'student', NULL, NULL, '$2y$10$45UJxuswmJ6Z3ffKHkMj6esIIjnMZZGHtJ/9AXN/0JpsZTBgkVxhm', '01765465467', 'Dhaka', 'Male', 'public/assets/backend/images/student/wgCaOBXcAP.jpg', 'Sujon Molla', 'Samima Khatun', 'Muslim', '20200017', '2015-07-19', '2292', NULL, NULL, NULL, NULL, 1, NULL, '2020-11-18 02:55:20', '2020-11-18 02:55:20'),
(18, 'Sumon Chakraborti', 'student', NULL, NULL, '$2y$10$NRTmL7naABeYAVAg6ucoPek6Oj03gFS6th9EvmLMPL9gw4rJSa9/.', '01876545543', 'Dhaka', 'Male', 'public/assets/backend/images/student/QhUftMR17k.jpg', 'Himel Chakraborti', 'Rani Biswas', 'Hindu', '20200018', '2014-07-17', '9763', NULL, NULL, NULL, NULL, 1, NULL, '2020-11-18 02:57:09', '2020-11-18 02:57:09'),
(19, 'Sumona', 'student', NULL, NULL, '$2y$10$yiKJUsmNrolX7WxjRKSeK.JRJabZDMss/a3qUaB.OVr9uC2x4f6BW', '0176545363', 'Dhaka', 'Female', 'public/assets/backend/images/student/Ns0n5MW0X2.jpg', 'Sumon', 'Sathi', 'Muslim', '20200019', '2014-07-17', '9243', NULL, NULL, NULL, NULL, 1, NULL, '2020-11-18 02:58:44', '2020-11-18 02:58:44'),
(20, 'Alan Gomez', 'student', NULL, NULL, '$2y$10$Eobk49w2xs4L/ZtgQcAsIu0bis/tFnQD6bhUT0g4gtaJ1.gngFNqq', '01765466456', 'Dhaka', 'Male', 'public/assets/backend/images/student/YQmCMlUkUO.jpg', 'Stafin Gomez', 'Alastin Gomez', 'Christian', '20200020', '2013-07-17', '6387', NULL, NULL, NULL, NULL, 1, NULL, '2020-11-18 03:00:18', '2020-11-18 03:00:18'),
(21, 'Samia Othoi', 'student', NULL, NULL, '$2y$10$GsBSd7wiczGbd4dlrhARj.4D75sli7LulUObFvx0TX/jrHr27kkRy', '016745355432', 'Dhaka', 'Female', 'public/assets/backend/images/student/p8PvnqKmnz.jpg', 'Sujon', 'Shikah', 'Muslim', '20200021', '2012-07-17', '68', NULL, NULL, NULL, NULL, 1, NULL, '2020-11-18 03:01:34', '2020-11-18 03:01:34'),
(22, 'Sima', 'student', NULL, NULL, '$2y$10$99y8bB5i6cs7zm3F3egTHuJoSUHs/3.01dUPFMqCamGVVW9fljn9u', '01765435435', 'Dhaka', 'Female', 'public/assets/backend/images/student/1yfWtVJTin.jpg', 'Sahin', 'Sarmin', 'Muslim', '20200022', '2013-07-17', '3300', NULL, NULL, NULL, NULL, 1, NULL, '2020-11-18 03:02:38', '2020-11-18 03:02:38'),
(23, 'Sumona Akter', 'student', NULL, NULL, '$2y$10$vqDHK9Zm46XTRv/7JmLsXO7FfUxXT4FtU7JFDs.a9f3E2NGGaegz6', '01657655546', 'Dhaka', 'Female', 'public/assets/backend/images/student/3iMCMDpTpT.jpg', 'Siam', 'Sarmin', 'Muslim', '20200023', '2012-07-17', '2733', NULL, NULL, NULL, NULL, 1, NULL, '2020-11-18 03:04:02', '2020-11-18 03:04:02'),
(24, 'Sanjana', 'student', NULL, NULL, '$2y$10$P0WZhlbu8jBGjPAMh0xwEOd1M6dCDtx56OkUGgFk5.c6HesVFGGna', '01786654536', 'Dhaka', 'Female', 'public/assets/backend/images/student/Koyo5ltqqC.jpg', 'Sabir Ali', 'Sabera Khatun', 'Muslim', '20200024', '2013-07-17', '3483', NULL, NULL, NULL, NULL, 1, NULL, '2020-11-18 03:05:09', '2020-11-18 03:05:09'),
(25, 'Delwar Hossain', 'employee', NULL, NULL, '$2y$10$Hlor2ZAcCqLf9RBZ97E0u.xScX4h/Gs.sS3IbsrEog9IQXju2VOZG', '01875544436', 'Dhaka', 'Male', 'public/assets/backend/images/employee/PkLsro3TLN.jpg', 'Hamza', 'Sumona', 'Muslim', '2020110001', '1990-06-30', '2493', NULL, '2020-11-18', 1, 20000, 1, NULL, '2020-11-18 03:38:43', '2020-11-18 03:38:43'),
(26, 'Sazzad Ali', 'employee', NULL, NULL, '$2y$10$E3lIxWwM5AFxtLUX0Yb7jOk4KBBYtuBjVNiWtPsA2G.o37fb36hsO', '01765565436', 'Dhaka', 'Male', 'public/assets/backend/images/employee/sAB0tijHVS.jpg', 'Fakrul', 'Sarmin', 'Muslim', '1970010026', '1991-11-22', '6680', NULL, '1970-01-01', 2, 20000, 1, NULL, '2020-11-18 03:40:11', '2020-11-18 03:40:11'),
(27, 'Sumaiya Rahman', 'employee', NULL, NULL, '$2y$10$m2/MdjTBWXTGSAbsSuzjdurghww/wURHWXuAK5mE.04orrM/PMs3O', '01876465433', 'Dhaka', 'Male', 'public/assets/backend/images/employee/aYJiXYL9zb.jpg', 'Rahman Ali', 'Sumona', 'Muslim', '2020090027', '1990-02-09', '3925', NULL, '2020-09-16', 2, 27000, 1, NULL, '2020-11-18 03:41:29', '2020-11-18 03:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2020', '2020-06-29 01:27:32', '2020-06-29 01:27:32'),
(2, '2019', '2020-07-06 12:43:34', '2020-07-06 12:43:34'),
(3, '2021', '2020-09-06 12:13:04', '2020-09-06 12:13:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_other_costs`
--
ALTER TABLE `account_other_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_students`
--
ALTER TABLE `discount_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark_grades`
--
ALTER TABLE `mark_grades`
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
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `account_other_costs`
--
ALTER TABLE `account_other_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discount_students`
--
ALTER TABLE `discount_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mark_grades`
--
ALTER TABLE `mark_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
