-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 09:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telemedicine`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `approved` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `doctor_name`, `patient_name`, `appointment_date`, `appointment_time`, `status`, `created_at`, `updated_at`, `approved`) VALUES
(1, 'sarahjohnson@gmail.com', 'muthokingumbau@zetech.ac.ke', '2023-10-04', '09:50:03', 'Approved', '2023-10-02 09:50:03', '2023-10-02 09:50:03', 0),
(2, 'janesmith@gmail.com', 'muthokingumbau@zetech.ac.ke', '2023-10-05', '09:58:51', 'Approved', '2023-10-02 09:58:51', '2023-10-02 09:58:51', 0),
(3, 'sarahjohnson@gmail.com', 'Eunice Mwende', '2023-10-13', '09:45:00', 'Approved', '2023-10-04 09:45:00', '2023-10-04 09:45:00', 0),
(4, 'sarahjohnson@gmail.com', 'kezziah@gmail.com', '2023-11-05', '10:40:49', 'Approved', '2023-10-04 10:40:49', '2023-10-04 10:40:49', 0),
(5, 'janesmith@gmail.com', 'rennyx@gmail.com', '2023-10-21', '10:59:19', 'Pending', '2023-10-04 10:59:19', '2023-10-04 10:59:19', 0),
(6, 'sarahjohnson@gmail.com', 'kezziah@gmail.com', '2023-10-20', '10:02:10', 'Pending', '2023-10-06 10:02:10', '2023-10-06 10:02:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `consultants`
--

CREATE TABLE `consultants` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultants`
--

INSERT INTO `consultants` (`user_id`, `full_name`, `gender`, `email`, `password`, `dob`, `phone`, `role_id`, `date_created`, `date_updated`) VALUES
(1, 'Daniel Munene', 'Male', 'dan@gmail.com', '$2y$10$eejmoXayKprqpWgEoJ.d4e1mjn8vcZywNetX33KiBSB2fiFWsXUkS', '2023-09-14', 713507242, 1, '2021-10-15 10:34:00', '2021-10-15 12:58:34'),
(2, 'Barack Adams', 'Female', 'barack@gmail.com', '$2y$10$Gb9.v2fjU8YySqf6EwzG8e/m4dDgejeYrbwgWpOMqUoa4iG96WvRi', '2023-09-18', 110530914, 0, '2021-10-15 11:34:00', NULL),
(3, 'Jones Joshua', 'Male', 'jones@gmail.com', '$2y$10$nUQGQtuF419391KG6ywXE.uoglGCU/1chVAKmanVDzrQeu3H7Hlme', '2023-09-11', 746294664, 0, '2021-10-15 12:34:00', NULL),
(4, 'Ngumbau Muthoki', 'Male', 'muthokingumbau@zetech.ac.ke', '$2y$10$hlaX1gzx0jkNPCenFCVGMed.V6W.XBVMrEkhzHOxu3jnk68BWqLra', '2001-02-14', 713507242, 0, '2021-10-15 13:34:00', NULL),
(5, 'Rennyx Calyx', 'Male', 'rennyx@gmail.com', '$2y$10$J0oTPz9lFqgyjhH9kuhcfu4Lt2v97zzvsIh7WSUibiLmU7tkz8I72', '2023-09-06', 713507242, 0, '2021-10-15 14:34:00', NULL),
(6, 'Dr. Jane Smith', '', 'janesmith@gmail.com', '$2y$10$LjxeJRZK8KGR4YwuJ5Colu3t9sMeCeeWOUcJxoBmqUiIhY/NQdsL6', '2023-02-14', 712346523, 1, '2023-09-26 13:29:40', '2023-09-26 13:32:45'),
(7, 'Dr. John Doe', '', 'johndoe@gmail.com', '$2y$10$ABmVoPmnMZ7vfHIoBDnkaOqkEf955AA5vycgEA91CJV7Ci2w.eY0G', '2001-02-14', 713507241, 1, '2023-09-27 15:32:01', '2023-09-27 15:32:46'),
(8, 'Dr. Sarah Johnson', '', 'sarahjohnson@gmail.com', '$2y$10$iuG3u5Mh/n2LX0v7WGnsq.ecu0I4ANI7Yvq138lbaYmYWrcG7lSB.', '1997-04-23', 110530914, 1, '2023-09-27 17:00:50', '2023-09-27 17:01:22'),
(9, 'Keziah Rennyx', 'Female', 'kezziah@gmail.com', '$2y$10$LgHsSl/tH2i0s/79w6pRuOlycQ40.a4ZMwPBtb.5Md.HywaRwrIX.', '2023-09-27', 746294664, 0, '2023-10-02 09:42:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

CREATE TABLE `consultations` (
  `id` int(11) NOT NULL,
  `consultant` varchar(100) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `appointment_date` datetime NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultations`
--

INSERT INTO `consultations` (`id`, `consultant`, `doctor_name`, `appointment_date`, `description`) VALUES
(1, 'michaelmbuvi@gmail.com', 'Buza', '2023-09-25 08:00:00', 'Kindly if possible'),
(3, 'reubenngumbau@gmail.com', 'Dan', '2023-09-30 15:30:00', 'Kindly sir');

-- --------------------------------------------------------

--
-- Table structure for table `convo_list`
--

CREATE TABLE `convo_list` (
  `user_id` int(30) NOT NULL,
  `from_user` int(30) NOT NULL,
  `to_user` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `area_of_treatment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `area_of_treatment`) VALUES
(1, 'johndoe@gmail.com', 'Cardiology'),
(2, 'janesmith@gmail.com', 'Orthopedics'),
(3, 'sarahjohnson@gmail.com', 'Pediatrics');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `user_id` int(30) NOT NULL,
  `from_user` int(30) NOT NULL,
  `to_user` int(30) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = text , 2 = photos,3 = videos, 4 = documents',
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `popped` tinyint(1) NOT NULL DEFAULT 0,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`user_id`, `from_user`, `to_user`, `type`, `message`, `status`, `popped`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 1, 2, 1, 'test', 1, 1, 0, '2021-10-16 11:45:21', '2021-10-17 19:36:34'),
(2, 1, 2, 1, '1', 1, 1, 0, '2021-10-16 11:45:25', '2021-10-17 19:36:34'),
(3, 1, 2, 1, '2', 1, 1, 0, '2021-10-16 11:45:26', '2021-10-17 19:36:34'),
(4, 1, 2, 1, '3', 1, 1, 0, '2021-10-16 11:45:28', '2021-10-17 19:36:34'),
(5, 1, 2, 1, '4', 1, 1, 0, '2021-10-16 11:45:30', '2021-10-17 19:36:34'),
(6, 1, 2, 1, '5', 1, 1, 0, '2021-10-16 11:45:31', '2021-10-17 19:36:34'),
(7, 1, 2, 1, '6', 1, 1, 0, '2021-10-16 11:45:32', '2021-10-17 19:36:34'),
(8, 1, 2, 1, '7', 1, 1, 0, '2021-10-16 11:45:34', '2021-10-17 19:36:34'),
(9, 1, 2, 1, '8', 1, 1, 0, '2021-10-16 11:45:35', '2021-10-17 19:36:34'),
(10, 1, 2, 1, '9', 1, 1, 0, '2021-10-16 11:45:37', '2021-10-17 19:36:34'),
(11, 1, 2, 1, '10', 1, 1, 0, '2021-10-16 11:45:42', '2021-10-17 19:36:34'),
(12, 1, 2, 1, '11', 1, 1, 0, '2021-10-16 11:45:44', '2021-10-17 19:36:34'),
(13, 1, 2, 1, '12', 1, 1, 0, '2021-10-16 11:45:47', '2021-10-17 19:36:34'),
(14, 1, 2, 1, '13', 1, 1, 0, '2021-10-16 11:45:51', '2021-10-17 19:36:34'),
(15, 1, 2, 1, '14', 1, 1, 0, '2021-10-16 11:45:54', '2021-10-17 19:36:34'),
(16, 1, 2, 1, '15', 1, 1, 0, '2021-10-16 11:45:57', '2021-10-17 19:36:34'),
(17, 2, 1, 1, '16', 1, 1, 0, '2021-10-16 11:52:45', '2021-10-17 19:37:00'),
(18, 2, 1, 1, '17', 1, 1, 0, '2021-10-16 11:52:49', '2021-10-17 19:37:00'),
(19, 2, 1, 1, '18', 1, 1, 0, '2021-10-16 11:52:54', '2021-10-17 19:37:00'),
(20, 2, 1, 1, '19', 1, 1, 0, '2021-10-16 11:52:57', '2021-10-17 19:37:00'),
(21, 2, 1, 1, '20', 1, 1, 0, '2021-10-16 11:53:06', '2021-10-17 19:37:00'),
(22, 2, 1, 1, '21', 1, 1, 0, '2021-10-16 11:58:48', '2021-10-17 19:37:00'),
(23, 2, 1, 1, 'test', 1, 1, 0, '2021-10-16 12:03:40', '2021-10-17 19:37:00'),
(24, 2, 1, 1, 'test', 1, 1, 0, '2021-10-16 12:04:48', '2021-10-17 19:37:00'),
(25, 1, 2, 1, 're', 1, 1, 0, '2021-10-16 12:05:03', '2021-10-17 19:36:34'),
(26, 1, 2, 1, 'wew', 1, 1, 0, '2021-10-16 12:05:19', '2021-10-17 19:36:34'),
(27, 2, 1, 1, 'hey John', 1, 1, 0, '2021-10-17 18:43:58', '2021-10-17 19:37:00'),
(28, 1, 3, 1, 'Hi Sam', 1, 1, 0, '2021-10-17 18:50:20', '2021-10-17 19:42:15'),
(29, 1, 2, 1, 'claire', 1, 1, 0, '2021-10-17 18:50:37', '2021-10-17 19:36:34'),
(30, 3, 1, 1, 'hey john', 1, 1, 0, '2021-10-17 19:42:31', '2021-10-17 19:43:18'),
(31, 1, 2, 1, 'test', 1, 0, 0, '2021-10-17 19:42:43', '2021-10-17 19:42:44'),
(32, 3, 1, 1, 'yow', 1, 1, 0, '2021-10-17 19:43:22', '2021-10-17 19:43:49'),
(33, 1, 2, 1, 'claire', 1, 0, 1, '2021-10-17 19:43:57', '2021-10-18 00:01:46'),
(34, 3, 1, 1, 'john??', 1, 1, 0, '2021-10-17 19:44:30', '2021-10-17 19:46:01'),
(35, 3, 1, 1, 'test', 1, 1, 0, '2021-10-17 19:45:42', '2021-10-17 19:46:01'),
(36, 3, 1, 1, 'hey', 1, 1, 0, '2021-10-17 19:46:12', '2021-10-17 19:46:26'),
(37, 3, 1, 1, 'psst', 1, 1, 0, '2021-10-17 19:46:33', '2021-10-17 19:47:47'),
(38, 3, 1, 1, 'John??', 1, 1, 0, '2021-10-17 19:47:00', '2021-10-17 19:47:47'),
(39, 3, 1, 1, 'hey you', 1, 1, 0, '2021-10-17 19:47:27', '2021-10-17 19:47:47'),
(40, 3, 1, 1, 'test', 1, 1, 0, '2021-10-17 19:47:54', '2021-10-17 19:50:50'),
(41, 1, 2, 1, '123', 1, 0, 0, '2021-10-17 19:49:08', '2021-10-17 19:49:09'),
(42, 3, 1, 1, '1234', 1, 1, 0, '2021-10-17 19:49:17', '2021-10-17 19:50:50'),
(43, 3, 1, 1, 'test', 1, 1, 0, '2021-10-17 19:50:04', '2021-10-17 19:50:50'),
(44, 3, 1, 1, 'qweqwe', 1, 1, 0, '2021-10-17 19:50:42', '2021-10-17 19:50:50'),
(45, 3, 1, 1, 'aaa', 1, 1, 0, '2021-10-17 19:50:57', '2021-10-17 19:52:52'),
(46, 3, 1, 1, 'John??', 1, 1, 0, '2021-10-17 19:51:38', '2021-10-17 19:52:52'),
(47, 1, 2, 1, 'calire??', 1, 0, 0, '2021-10-17 19:51:50', '2021-10-17 19:51:51'),
(48, 3, 1, 1, 'hey', 1, 1, 0, '2021-10-17 19:52:02', '2021-10-17 19:52:52'),
(49, 3, 1, 1, 'yes ?', 1, 1, 0, '2021-10-17 19:52:58', '2021-10-17 19:53:09'),
(59, 4, 1, 1, 'dude', 1, 1, 0, '2021-10-17 20:15:38', '2021-10-17 20:15:43'),
(60, 1, 4, 1, 'hey', 1, 1, 0, '2021-10-17 20:15:50', '2021-10-17 20:16:04'),
(61, 4, 1, 1, 'men', 1, 1, 0, '2021-10-17 21:28:39', '2021-10-17 21:39:08'),
(62, 4, 1, 1, 'test', 1, 1, 0, '2021-10-17 21:32:31', '2021-10-17 21:39:08'),
(63, 1, 3, 1, 'test', 1, 1, 0, '2021-10-17 21:32:53', '2021-10-18 00:02:20'),
(64, 4, 1, 1, 'test', 1, 1, 0, '2021-10-17 21:33:00', '2021-10-17 21:39:08'),
(65, 4, 1, 1, 'dude', 1, 1, 0, '2021-10-17 21:33:27', '2021-10-17 21:39:08'),
(66, 4, 1, 1, 'yow', 1, 1, 0, '2021-10-17 21:35:24', '2021-10-17 21:39:08'),
(67, 4, 1, 1, 'test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test ', 1, 1, 0, '2021-10-17 21:38:07', '2021-10-17 21:42:42'),
(68, 4, 1, 1, 'teest', 1, 1, 0, '2021-10-17 21:49:16', '2021-10-17 21:49:18'),
(69, 4, 1, 1, 'dude??', 1, 1, 0, '2021-10-17 21:52:38', '2021-10-17 21:52:41'),
(70, 4, 1, 1, 'sup', 1, 1, 0, '2021-10-17 21:52:48', '2021-10-17 21:54:47'),
(71, 1, 4, 1, 'hey', 1, 1, 0, '2021-10-17 21:53:02', '2021-10-17 21:54:13'),
(72, 1, 4, 1, 'What ??', 1, 1, 0, '2021-10-17 21:54:54', '2021-10-17 21:55:15'),
(73, 1, 4, 1, 'How can I help you ?', 1, 1, 0, '2021-10-17 21:55:29', '2021-10-17 21:56:46'),
(74, 4, 1, 1, 'test only', 1, 1, 0, '2021-10-17 21:56:51', '2021-10-17 22:19:00'),
(75, 4, 1, 1, 'test', 1, 1, 0, '2021-10-17 21:57:08', '2021-10-17 22:19:00'),
(76, 4, 1, 1, 'a', 1, 1, 0, '2021-10-17 21:57:14', '2021-10-17 22:19:00'),
(77, 4, 1, 1, '123', 1, 1, 0, '2021-10-17 21:58:26', '2021-10-17 22:19:00'),
(78, 4, 1, 1, '123', 1, 1, 0, '2021-10-17 21:58:31', '2021-10-17 22:19:00'),
(79, 4, 1, 1, '2221\r\n25', 1, 1, 0, '2021-10-17 21:58:38', '2021-10-17 22:19:00'),
(80, 1, 4, 1, 'yes?\r\n22', 1, 1, 0, '2021-10-17 21:59:39', '2021-10-17 21:59:43'),
(81, 4, 1, 1, 'hey', 1, 1, 0, '2021-10-17 22:01:22', '2021-10-17 22:19:00'),
(82, 4, 1, 1, 'what\r\n??', 1, 1, 0, '2021-10-17 22:01:58', '2021-10-17 22:19:00'),
(83, 4, 1, 1, 'test\r\n', 1, 1, 0, '2021-10-17 22:15:43', '2021-10-17 22:19:00'),
(84, 4, 1, 1, 'test\r\n', 1, 1, 0, '2021-10-17 22:16:01', '2021-10-17 23:07:20'),
(85, 4, 1, 1, 'yow\r\n\r\nsup', 1, 1, 0, '2021-10-17 22:16:11', '2021-10-17 23:07:20'),
(86, 4, 1, 1, 'wew\r\ntest', 1, 1, 0, '2021-10-17 22:18:30', '2021-10-17 23:07:20'),
(87, 1, 4, 1, 'test', 1, 1, 0, '2021-10-17 22:19:08', '2021-10-17 22:29:46'),
(88, 1, 4, 1, 'test\r\ntest', 1, 1, 0, '2021-10-17 22:19:14', '2021-10-17 22:29:46'),
(89, 1, 4, 1, 'test\r\ntest', 1, 1, 0, '2021-10-17 22:21:13', '2021-10-17 22:29:46'),
(90, 1, 4, 1, 'dude\r\nCan I Ask ?', 1, 1, 1, '2021-10-17 22:30:01', '2021-10-17 23:36:55'),
(91, 4, 1, 1, 'What?\r\nIs it about something?', 1, 1, 1, '2021-10-17 22:30:32', '2021-10-17 23:37:56'),
(92, 1, 4, 1, 'Remeber test 101\r\nCan you check the bug ?', 1, 1, 1, '2021-10-17 22:31:09', '2021-10-17 23:36:01'),
(93, 4, 1, 1, 'test', 1, 1, 1, '2021-10-17 22:42:23', '2021-10-17 23:38:02'),
(94, 4, 1, 1, 'test', 1, 1, 1, '2021-10-17 22:43:28', '2021-10-17 23:07:29'),
(95, 4, 1, 1, 'test', 1, 1, 1, '2021-10-17 23:21:14', '2021-10-17 23:35:50'),
(96, 4, 1, 1, 'hey dude', 1, 1, 0, '2021-10-17 23:44:45', '2021-10-17 23:46:14'),
(97, 4, 1, 1, 'yow', 1, 1, 0, '2021-10-17 23:46:04', '2021-10-17 23:46:14'),
(98, 4, 1, 1, 'fs', 1, 1, 0, '2021-10-17 23:48:34', '2021-10-17 23:55:38'),
(99, 4, 1, 1, 'test', 1, 1, 0, '2021-10-17 23:49:12', '2021-10-17 23:55:38'),
(100, 1, 4, 1, 'what?', 1, 1, 0, '2021-10-17 23:49:22', '2021-10-17 23:51:07'),
(101, 1, 4, 1, 'yow', 1, 1, 0, '2021-10-17 23:55:42', '2021-10-18 00:01:56'),
(102, 3, 1, 1, 'JOhn?', 0, 1, 0, '2021-10-18 00:02:29', '2021-10-18 00:02:30'),
(103, 3, 1, 1, 'Hey John', 0, 1, 0, '2021-10-18 00:02:33', '2021-10-18 00:03:13'),
(104, 3, 1, 1, 'John', 0, 1, 0, '2021-10-18 00:02:49', '2021-10-18 00:03:13'),
(105, 3, 1, 1, 'test', 0, 1, 0, '2021-10-18 00:03:21', '2021-10-18 00:03:21'),
(106, 3, 1, 1, 'john', 0, 1, 0, '2021-10-18 00:03:26', '2021-10-18 00:03:42'),
(107, 3, 1, 1, 'hey', 0, 1, 0, '2021-10-18 00:03:58', '2021-10-18 00:03:58'),
(108, 3, 1, 1, 'hey', 0, 1, 0, '2021-10-18 00:04:06', '2021-10-18 00:07:16'),
(109, 3, 1, 1, 'test', 0, 1, 0, '2021-10-18 00:07:23', '2021-10-18 00:07:23'),
(110, 3, 1, 1, 'test', 0, 1, 0, '2021-10-18 00:07:56', '2021-10-18 00:07:56'),
(111, 3, 1, 1, 'test', 0, 1, 0, '2021-10-18 00:07:59', '2021-10-18 00:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Default User');

-- --------------------------------------------------------

--
-- Table structure for table `survey_responses`
--

CREATE TABLE `survey_responses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `feedback` text DEFAULT NULL,
  `submission_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey_responses`
--

INSERT INTO `survey_responses` (`id`, `name`, `email`, `rating`, `feedback`, `submission_time`) VALUES
(1, 'Barrack Adams', 'barack@gmail.com', 5, 'Very good one', '2023-09-28 06:22:06'),
(2, 'Barack Adams', 'barack@gmail.com', 4, 'Woow', '2023-09-28 06:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `tinypesa`
--

CREATE TABLE `tinypesa` (
  `ID` int(11) NOT NULL,
  `PhoneNumber` varchar(255) NOT NULL,
  `MpesaReceiptNumber` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultants`
--
ALTER TABLE `consultants`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `survey_responses`
--
ALTER TABLE `survey_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tinypesa`
--
ALTER TABLE `tinypesa`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `consultants`
--
ALTER TABLE `consultants`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `survey_responses`
--
ALTER TABLE `survey_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tinypesa`
--
ALTER TABLE `tinypesa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
