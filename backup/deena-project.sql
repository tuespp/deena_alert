-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2022 at 11:46 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deena-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `custom_p`
--

CREATE TABLE `custom_p` (
  `p_id` int(10) NOT NULL,
  `p_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `p_image` text CHARACTER SET latin1 NOT NULL,
  `p_detail` varchar(255) CHARACTER SET latin1 NOT NULL,
  `p_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom_p`
--

INSERT INTO `custom_p` (`p_id`, `p_name`, `p_image`, `p_detail`, `p_price`) VALUES
(102, 'The Great Irish Science Book', '../img/book1.jpg', 'Science book 1', 20),
(103, 'The Science Book', '../img/book3.jpg', 'Science book 2', 25),
(104, 'My Frist Science Book ', '../img/book2.jpg', 'Science book 3', 10);

-- --------------------------------------------------------

--
-- Table structure for table `data_insurance`
--

CREATE TABLE `data_insurance` (
  `id` int(10) NOT NULL,
  `insurance` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `car_license` varchar(255) NOT NULL,
  `exp` date NOT NULL,
  `interest` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_send` date NOT NULL DEFAULT current_timestamp(),
  `time_send` time NOT NULL,
  `status_sms` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_insurance`
--

INSERT INTO `data_insurance` (`id`, `insurance`, `phone`, `type`, `car_license`, `exp`, `interest`, `status`, `date_send`, `time_send`, `status_sms`, `note`) VALUES
(2, 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'ป3', 'ทส 2604กรุงเทพมหานคร', '2021-07-09', '14,859.09', '1', '2022-01-02', '11:15:00', '1', ' -'),
(3, 'คุณ พลญาเดช  ', '0829985001', 'ป3', '1มข 6370กรุงเทพมหานคร', '2021-10-11', '11,858.81', '1', '2022-01-03', '12:15:00', '1', ' -'),
(4, 'คุณ สำราญ', '0624316866', 'ป3', '1มค 5804กรุงเทพมหานคร', '2021-10-12', '11,858.81', '1', '2022-01-14', '13:15:00', '0', ' -'),
(5, 'คุณ ศุภชัย  ', '0899213825', 'ป3', '1มค 5513กรุงเทพมหานคร', '2021-09-13', '11,858.81', '0', '2022-01-05', '14:15:00', '0', ' -'),
(6, 'คุณ ยุทธการ ', '0899213825', 'ป3', '1มข 9957กรุงเทพมหานคร', '2021-07-14', '11,858.81', '0', '2022-01-06', '15:15:00', '0', ' -'),
(7, 'คุณ มนัสสิทธิ์ ', '0899213825', 'ป3', '1มค 8064กรุงเทพมหานคร', '2021-11-15', '11,858.81', '0', '2022-01-07', '16:15:00', '0', ' -'),
(8, 'สหกรณ์ ไทยเจริญแท็กซี่ จำกัด', '0950658887', 'ป3', 'ทห 1573กรุงเทพมหานคร', '2021-12-19', '14,859.09', '0', '2022-01-08', '17:15:00', '0', ' -'),
(9, 'สหกรณ์ ไทยเจริญแท็กซี่ จำกัด', '0950658887', 'พ.ร.บ.', 'ทห 1573กรุงเทพมหานคร', '2021-12-19', '2,041.56', '0', '2022-01-09', '18:15:00', '0', ' -'),
(10, '﻿สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'ป3', 'ทส 2609กรุงเทพมหานคร', '2021-07-09', '14,859.09', '0', '2022-01-01', '10:15:00', '0', ' -'),
(11, 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'ป3', 'ทส 2604กรุงเทพมหานคร', '2021-07-09', '14,859.09', '0', '2022-01-02', '11:15:00', '0', ' -'),
(12, 'คุณ พลญาเดช  ', '0829985001', 'ป3', '1มข 6370กรุงเทพมหานคร', '2021-10-11', '11,858.81', '0', '2022-01-03', '12:15:00', '0', ' -'),
(13, 'คุณ สำราญ', '0829985001', 'ป3', '1มค 5804กรุงเทพมหานคร', '2021-10-12', '11,858.81', '0', '2022-01-04', '13:15:00', '0', ' -'),
(14, 'คุณ ศุภชัย  ', '0899213825', 'ป3', '1มค 5513กรุงเทพมหานคร', '2021-09-13', '11,858.81', '0', '2022-01-05', '14:15:00', '0', ' -'),
(15, 'คุณ ยุทธการ ', '0899213825', 'ป3', '1มข 9957กรุงเทพมหานคร', '2021-07-14', '11,858.81', '0', '2022-01-06', '15:15:00', '0', ' -'),
(16, 'คุณ มนัสสิทธิ์ ', '0899213825', 'ป3', '1มค 8064กรุงเทพมหานคร', '2021-11-15', '11,858.81', '0', '2022-01-07', '16:15:00', '0', ' -'),
(17, 'สหกรณ์ ไทยเจริญแท็กซี่ จำกัด', '0950658887', 'ป3', 'ทห 1573กรุงเทพมหานคร', '2021-12-19', '14,859.09', '0', '2022-01-08', '17:15:00', '0', ' -'),
(18, 'สหกรณ์ ไทยเจริญแท็กซี่ จำกัด', '0950658887', 'พ.ร.บ.', 'ทห 1573กรุงเทพมหานคร', '2021-12-19', '2,041.56', '0', '2022-01-09', '18:15:00', '0', ' -');

-- --------------------------------------------------------

--
-- Table structure for table `line_oa`
--

CREATE TABLE `line_oa` (
  `oa_id` int(10) NOT NULL,
  `oa_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `line_oa`
--

INSERT INTO `line_oa` (`oa_id`, `oa_name`) VALUES
(1, 'TEST_chat'),
(2, 'TEST_chats 2');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `invoice_date` date NOT NULL,
  `insurance_id` varchar(255) NOT NULL,
  `insurance` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `car_license` varchar(255) NOT NULL,
  `date_start` date NOT NULL,
  `premium` varchar(255) NOT NULL,
  `premium_total` varchar(255) NOT NULL,
  `agent` varchar(255) NOT NULL,
  `installment_no` varchar(255) NOT NULL,
  `date_end` date NOT NULL,
  `installment` varchar(255) NOT NULL,
  `date_send` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL,
  `time_send` time NOT NULL,
  `status_sms` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `invoice_id`, `invoice_date`, `insurance_id`, `insurance`, `name`, `phone`, `type`, `car_license`, `date_start`, `premium`, `premium_total`, `agent`, `installment_no`, `date_end`, `installment`, `date_send`, `status`, `time_send`, `status_sms`, `note`) VALUES
(1, '﻿64-01934', '2021-07-09', '210901/M002034085', 'ไทยศรี', 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'ป3', 'ทส 2609กรุงเทพมหานคร', '2021-07-09', '13,831.', '14,859.09', 'A0', '6/6', '2021-12-09', ' 1,900.00 ', '2022-01-01', '0', '10:30:00', '0', ''),
(2, '64-01936', '2021-07-09', '210901/M002034094', 'ไทยศรี', 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'ป3', 'ทส 2604กรุงเทพมหานคร', '2021-07-09', '13,831.', '14,859.09', 'A1', '6/6', '2021-12-09', ' 2,500.00 ', '2022-01-02', '0', '10:30:00', '0', ''),
(3, '64-03003', '2021-10-11', '210901/M002048404', 'ไทยศรี', 'คุณ พลญาเดช  ', '0829985001', 'ป3', '1มข 6370กรุงเทพมหานคร', '2021-10-11', '11,038.', '11,858.81', 'S01 - หน้าร้าน', '3/6', '2021-12-11', ' 15,000.00 ', '2022-01-03', '0', '10:30:00', '0', ''),
(4, '64-03016', '2021-10-12', '210901/M002048546', 'ไทยศรี', 'คุณ สำราญ', '0829985001', 'ป3', '1มค 5804กรุงเทพมหานคร', '2021-10-12', '11,038.', '11,858.81', 'S01 - หน้าร้าน', '3/6', '2021-12-12', ' 8,000.00 ', '2022-01-04', '0', '10:30:00', '0', ''),
(5, '64-02566', '2021-09-13', '210901/M002043267', 'ไทยศรี', 'คุณ ศุภชัย  ', '0899213825', 'ป3', '1มค 5513กรุงเทพมหานคร', '2021-09-13', '11,038.', '11,858.81', 'S01 - หน้าร้าน', '4/6', '2021-12-13', ' 5,000.00 ', '2022-01-05', '0', '10:30:00', '0', ''),
(6, '64-01984', '2021-07-14', '210901/M002034739', 'ไทยศรี', 'คุณ ยุทธการ ', '0899213825', 'ป3', '1มข 9957กรุงเทพมหานคร', '2021-07-14', '11,038.', '11,858.81', 'S01 - หน้าร้าน', '6/6', '2021-12-14', ' 2,546.00 ', '2022-01-06', '0', '10:30:00', '0', ''),
(7, '64-03503', '2021-11-15', '210901/M002055382', 'ไทยศรี', 'คุณ มนัสสิทธิ์ ', '0899213825', 'ป3', '1มค 8064กรุงเทพมหานคร', '2021-11-15', '11,038.', '11,858.81', 'S01 - หน้าร้าน', '2/6', '2021-12-15', ' 7,999.00 ', '2022-01-07', '0', '10:30:00', '0', ''),
(8, '64-03929', '2021-12-19', '210901/M002062134', 'ไทยศรี', 'สหกรณ์ ไทยเจริญแท็กซี่ จำกัด', '0950658887', 'ป3', 'ทห 1573กรุงเทพมหานคร', '2021-12-19', '13,831.', '14,859.09', 'A1', '1', '2021-12-19', ' 45,944.00 ', '2022-01-08', '0', '10:30:00', '0', ''),
(9, '64-03930', '2021-12-19', '210901/M007764780', 'ไทยศรี', 'สหกรณ์ ไทยเจริญแท็กซี่ จำกัด', '0950658887', 'พ.ร.บ.', 'ทห 1573กรุงเทพมหานคร', '2021-12-19', '1,900.', '2,041.56', 'A1', '1', '2021-12-19', ' 8,000.00 ', '2022-01-09', '0', '10:30:00', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`id`, `name`, `phone`, `type`, `date`) VALUES
(154, '111', '0624316866', 'line', '2021-12-28 11:35:14'),
(155, '111', '0624316866', 'line', '2021-12-29 02:05:35'),
(156, '111', '0624316866', 'line', '2021-12-29 02:08:00'),
(157, '111', '0624316866', 'line', '2021-12-29 02:09:01'),
(158, '111', '0624316866', 'line', '2021-12-29 02:10:00'),
(159, '111', '0624316866', 'line', '2021-12-29 03:43:41'),
(160, '111', '0624316866', 'line', '2021-12-29 03:44:59'),
(161, 'ไทยศรี', '0829985001', 'line', '2021-12-29 03:44:59'),
(162, '111', '0624316866', 'line', '2021-12-29 03:47:00'),
(163, 'ไทยศรี', '0829985001', 'line', '2021-12-29 03:47:01'),
(164, '111', '0624316866', 'line', '2021-12-29 03:48:00'),
(165, 'ไทยศรี', '0829985001', 'line', '2021-12-29 03:48:01'),
(166, '111', '0624316866', 'line', '2021-12-29 03:49:01'),
(167, 'ไทยศรี', '0829985001', 'line', '2021-12-29 03:49:01'),
(168, '111', '0624316866', 'line', '2021-12-29 03:50:00'),
(169, 'ไทยศรี', '0829985001', 'line', '2021-12-29 03:50:01'),
(170, '111', '0624316866', 'line', '2021-12-29 03:51:00'),
(171, 'ไทยศรี', '0829985001', 'line', '2021-12-29 03:51:01'),
(172, '111', '0624316866', 'line', '2021-12-29 03:52:01'),
(173, 'ไทยศรี', '0829985001', 'line', '2021-12-29 03:52:01'),
(174, '111', '0624316866', 'line', '2021-12-29 03:53:00'),
(175, 'ไทยศรี', '0829985001', 'line', '2021-12-29 03:53:00'),
(176, 'มนัสสิทธิ์ ', '0922766755', 'sms', '2021-12-29 04:10:00'),
(177, 'มนัสสิทธิ์ ', '0922766755', 'sms', '2021-12-29 07:43:04'),
(178, 'มนัสสิทธิ์ ', '0922766755', 'line', '2021-12-29 08:12:18'),
(179, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 04:01:28'),
(180, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 04:02:33'),
(181, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 04:02:38'),
(182, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 04:02:41'),
(183, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 04:02:49'),
(184, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 04:03:15'),
(185, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 04:03:25'),
(186, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 04:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `renewal_history`
--

CREATE TABLE `renewal_history` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renewal_history`
--

INSERT INTO `renewal_history` (`id`, `name`, `phone`, `type`, `date`) VALUES
(199, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-28 11:22:19'),
(200, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-28 11:31:56'),
(201, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 02:04:05'),
(202, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 02:04:52'),
(203, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 02:05:03'),
(204, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 02:06:12'),
(205, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 02:08:00'),
(206, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 02:09:01'),
(207, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 02:10:01'),
(208, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 03:43:43'),
(209, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 03:45:09'),
(210, 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'line', '2021-12-29 03:45:09'),
(211, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 03:47:00'),
(212, 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'line', '2021-12-29 03:47:01'),
(213, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 03:48:00'),
(214, 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'line', '2021-12-29 03:48:01'),
(215, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 03:49:01'),
(216, 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'line', '2021-12-29 03:49:01'),
(217, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 03:50:00'),
(218, 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'line', '2021-12-29 03:50:01'),
(219, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 03:51:00'),
(220, 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'line', '2021-12-29 03:51:00'),
(221, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 03:52:00'),
(222, 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'line', '2021-12-29 03:52:01'),
(223, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 03:53:01'),
(224, 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'line', '2021-12-29 03:53:01'),
(225, 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'line', '2021-12-29 08:05:57'),
(226, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 08:06:32'),
(227, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 08:06:50'),
(228, 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'line', '2021-12-29 08:06:50'),
(229, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 08:27:16'),
(230, 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'line', '2021-12-29 08:27:16'),
(231, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 08:39:16'),
(232, 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'line', '2021-12-29 08:39:16'),
(233, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 08:39:39'),
(234, 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'line', '2021-12-29 08:39:39'),
(235, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 08:39:52'),
(236, 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'line', '2021-12-29 08:39:52'),
(237, 'ธีรภัทร หมีทอง', '0624316866', 'line', '2021-12-29 09:34:20'),
(238, 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'line', '2021-12-29 09:34:20'),
(239, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-02 04:54:13'),
(240, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-02 04:54:43'),
(241, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-02 04:55:19'),
(242, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-02 04:55:53'),
(243, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 03:15:19'),
(244, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 03:15:48'),
(245, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 03:42:47'),
(246, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 03:43:36'),
(247, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 03:43:56'),
(248, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 03:45:37'),
(249, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 03:49:16'),
(250, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 03:49:36'),
(251, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 03:50:29'),
(252, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 03:54:17'),
(253, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 03:54:34'),
(254, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 03:54:49'),
(255, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 03:57:05'),
(256, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 03:57:48'),
(257, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 04:04:20'),
(258, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-07 03:46:50'),
(259, 'คุณ สำราญ', '0624316866', 'line', '2022-01-14 04:02:53'),
(260, 'คุณ สำราญ', '0624316866', 'line', '2022-01-14 04:03:37'),
(261, 'คุณ สำราญ', '0624316866', 'line', '2022-01-14 04:05:57');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(10) NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status_name`) VALUES
(1, 'silver'),
(2, 'gold'),
(3, 'platinum'),
(4, 'diamond');

-- --------------------------------------------------------

--
-- Table structure for table `sub_status`
--

CREATE TABLE `sub_status` (
  `id` int(10) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_status`
--

INSERT INTO `sub_status` (`id`, `sub_name`, `status`) VALUES
(1, 'silver 1', '1'),
(2, 'silver 2', '1'),
(3, 'gold 1', '2'),
(4, 'gold 2', '2'),
(5, 'platinum 1', '3'),
(6, 'platinum 2', '3'),
(7, 'diamond 1', '4'),
(8, 'diamond 2', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tues_chat_1`
--

CREATE TABLE `tues_chat_1` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `oa_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tues_chat_2`
--

CREATE TABLE `tues_chat_2` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `oa_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tues_chat_2`
--

INSERT INTO `tues_chat_2` (`id`, `name`, `email`, `user_id`, `access_token`, `oa_id`) VALUES
(4, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', 'eyJhbGciOiJIUzI1NiJ9.2jsnSu4uTahSQICGSbeYUCkEQU62jzh5Ast2zZ7jHKNN03EUfEK9_onMRmHfVtMCQwmYYMm7rrwnpkZ_acGfxZnKO2TvJMlC7fFR0LAsbju4inC2lSC1cROdNv256Be0qLqnGbUiU0Q6W95dCvph0jC_fdAc-IZ9WuviVtrMxuA.UKI4CRAxnM18AFtREXGKGG3Mr5mr6QdH0jsGMw_rpvA', '2');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `level` varchar(200) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'user.png',
  `name` varchar(200) NOT NULL,
  `user_id` varchar(255) DEFAULT '',
  `access_token` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `sub_status` varchar(255) NOT NULL,
  `oa_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `username`, `password`, `tel`, `address`, `level`, `img`, `name`, `user_id`, `access_token`, `email`, `facebook_id`, `status`, `sub_status`, `oa_id`) VALUES
(1, 'ADMIN', '12345678', '0622222', '225/1', 'admin', '16418417319237.png', 'teerapat', 'null', 'null', 'teerapat0829@gmail.com', '', '', '', ''),
(2, 'ausiri', '123456', '39/2 หมู่ 3 ต.สามพรา', '39/2 หมู่ 3 ต.สามพราน อ.สามพราน จ.นครปฐม 73110', 'member', 'user.png', 'Siriporn Ketbunlue', 'U0a6ca091be45a9c880fc1d8f8922c4d2', 'eyJhbGciOiJIUzI1NiJ9.cfRJJ48AhqS8nhaTh1thpHFA5U6890V8i1Rz8jTtnzvB0stgJHWMkpzvYyCwORhXvETQktnEzBuP7BgG-1ViS4P-48JlVHMwyddvdMnt6pQIVzdrZoroIdRSJjaKO6ii4ksmpd6U2F5fFNbk1VfXQvBTv8QcEHUnZ4vLTZZgdC8.ND4k6qD-SW06I3vpUBUiqnyr7Rj46koYHuvUEAk-BdI', '', '', '3', '5', ''),
(3, 'nackky', '12345678', '0624316818', '6/139 หมู่ 8 ตำบลอ้อมใหญ่ อำเภอสามพราน จังหวัดนครปฐม 73160', 'employee', 'user.png', 'Tanapon Visetsung', '', '', '', '', '', '', ''),
(12, 'nack', '12345678', '0619807818', '123', 'member', '16418367367365.png', 'AU SAN', '', '', 'xxx12345@gmail.com', '', '3', '5', ''),
(94, 'pppondd', '12345678', 'ม.14 225/1', 'ม.14 225/1', 'member', '16419194882614.jpeg', 'ปอน ', '', '', 'teerapat0829@gmail.com', '', '3', '5', ''),
(111, '', '', '0624316866', '', 'member', 'user.png', 'pppond', 'Ue5ea86966c0f46b6bad0f62a43293c88', 'eyJhbGciOiJIUzI1NiJ9.12fvuvSSqyZ5X2B5KkMpC6_-3vcOwOHC6BfwazZ4x5CTkmxTHKVIIUGSTxsHGyC8ils1XJ0kApYyra7kFBe5LOD2xp276HVeJcz72FMhIw03cxmGWiY-fdspHTBGuKWMwQxaoxu1GQv9qtzwUbJPWgIvkbUB74_04f3J2b1BkGQ.OUXJJJSCZPYpvsGcEkvz_f6DNWgSDvMawQpUV-UGH2Q', 'pangpond575@gmail.com', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `page` varchar(200) NOT NULL,
  `type` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `page`, `type`, `role`, `link`, `icon`) VALUES
(1, 'ข้อมูลส่วนตัว', '1', 'admin1,employee1,0,member1,0', 'profile.php', 'nav-icon fas fa-address-book'),
(2, 'กำหนดสิทธิ์ผู้ใช้', '3', 'admin1,0,employee1,0,member1,0,admin2,0,admin3,0,employee3,0,member3,0,admin4,0,employee4,0,admin5,0,employee5,0,member5,0,admin9,0,admin10,0,admin11,0,admin12,0,admin13,0,employee13,0,member13,0', 'control.php', 'nav-icon fas fa-users-cog'),
(3, 'แจ้งต่ออายุ', '4', 'admin3,0,employee3,0,member3,0,admin4,0,employee4,0,admin5,0,employee5,0,member5,0,0,0,member10,0,0', 'insurance_data.php', 'nav-icon fas fa-receipt'),
(4, 'แจ้งชำระ', '4', 'admin3,0,employee3,0,member3,0,admin4,0,employee4,0,admin5,0,employee5,0,member5,0,0,0,member10,0,0', 'payment_data.php', 'nav-icon fas fa-money-check-alt'),
(5, 'ประวัติการแจ้งต่ออายุ', '4', 'admin3,0,employee3,0,member3,0,admin4,0,employee4,0,admin5,0,employee5,0,member5,0,0,0,member10,0,0', 'renewal_history.php', 'nav-icon fas fa-store'),
(9, 'ประวัติการแจ้งชำระ', '4', 'admin3,0,employee3,0,member3,0,admin4,0,employee4,0,admin5,0,employee5,0,member5,0,0,0,member10,0,0', 'payment_history.php', 'nav-icon fas fa-columns'),
(10, 'อัพโหลดข้อมูลแจ้งเตือน (CSV)', '4', 'admin3,0,employee3,0,member3,0,admin4,0,employee4,0,admin5,0,employee5,0,member5,0,0,0,member10,0,0', 'insert_csv_form.php', 'nav-icon fas fa-file-import'),
(11, 'แจ้งข่าวสาร', '4', 'admin3,0,employee3,0,member3,0,admin4,0,employee4,0,admin5,0,employee5,0,member5,0,0,0,member10,0,0', 'report.php', 'nav-icon fas fa-paper-plane'),
(12, 'ลูกค้า', '2', 'admin12', 'member.php', 'nav-icon fas fa-user'),
(20, 'พนักงาน', '2', 'admin12,0,admin20', 'staff.php', 'nav-icon fa fa-user-tie');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_type`
--

CREATE TABLE `user_role_type` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role_type`
--

INSERT INTO `user_role_type` (`id`, `name`) VALUES
(1, 'ข้อมูลส่วนตัว'),
(2, 'สมาชิก'),
(3, 'ตั้งค่า'),
(4, 'แจ้งเตือน');

-- --------------------------------------------------------

--
-- Table structure for table `user_timestamp`
--

CREATE TABLE `user_timestamp` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_timestamp`
--

INSERT INTO `user_timestamp` (`id`, `name`, `email`, `user_id`, `date`) VALUES
(11, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2021-12-27 01:42:53'),
(12, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2021-12-27 01:53:19'),
(13, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2021-12-27 01:53:49'),
(14, 'Nack', 'thanapon7818@gmail.com', 'U0a8896c1801b01944bd27eb7c154d52d', '2021-12-27 02:03:31'),
(15, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2021-12-27 02:40:02'),
(16, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2021-12-29 02:09:56'),
(17, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2021-12-29 02:14:31'),
(18, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2021-12-29 03:38:49'),
(19, 'หลิน-กุลิสรา', 'nmichel99999@gmail.com', 'U24cf8c696866a48aaa1da60ed0304798', '2021-12-29 03:43:49'),
(20, '', '', '', '2021-12-29 03:43:52'),
(21, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-02 04:45:56'),
(22, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-02 04:47:50'),
(23, '', '', '', '2022-01-05 11:40:37'),
(24, '', '', '', '2022-01-05 11:40:55'),
(25, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-07 03:03:38'),
(26, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-07 04:28:14'),
(27, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-08 17:31:53'),
(28, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-08 17:37:28'),
(29, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-08 17:47:21'),
(30, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-08 17:55:19'),
(31, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-08 17:57:06'),
(32, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-08 18:00:52'),
(33, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-08 18:04:17'),
(34, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-08 18:16:31'),
(35, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-08 18:17:55'),
(36, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-08 18:18:44'),
(37, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-08 18:19:22'),
(38, '', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 02:23:11'),
(39, '', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 02:23:30'),
(40, '', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 02:26:54'),
(41, '', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 02:28:26'),
(42, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 02:36:15'),
(43, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 02:36:33'),
(44, '', '', '', '2022-01-10 02:41:41'),
(45, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 02:55:57'),
(46, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 02:56:45'),
(47, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 03:02:35'),
(48, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 03:13:30'),
(49, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 03:13:46'),
(50, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 03:21:22'),
(51, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 03:21:44'),
(52, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 03:25:57'),
(53, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 03:26:11'),
(54, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 03:26:23'),
(55, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 03:28:33'),
(56, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 03:30:36'),
(57, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 03:31:39'),
(58, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 03:31:57'),
(59, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 03:36:53'),
(60, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 03:37:05'),
(61, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 03:39:41'),
(62, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 03:44:30'),
(63, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 03:55:50'),
(64, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 03:56:50'),
(65, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 03:58:07'),
(66, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 03:58:19'),
(67, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 04:04:01'),
(68, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 04:04:14'),
(69, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 04:04:34'),
(70, '', '', '', '2022-01-10 04:41:19'),
(71, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 04:41:32'),
(72, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 04:43:25'),
(73, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 04:51:11'),
(74, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 04:59:35'),
(75, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 07:18:02'),
(76, '', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-10 11:52:38'),
(77, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 14:08:08'),
(78, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 14:59:50'),
(79, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 15:07:02'),
(80, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 15:26:39'),
(81, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 15:27:33'),
(82, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 15:27:47'),
(83, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 15:29:38'),
(84, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 15:47:22'),
(85, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 15:53:37'),
(86, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 15:55:43'),
(87, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:04:09'),
(88, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:05:18'),
(89, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:08:21'),
(90, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:09:27'),
(91, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:10:45'),
(92, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:12:03'),
(93, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:12:13'),
(94, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:12:31'),
(95, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:12:42'),
(96, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:13:38'),
(97, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:14:43'),
(98, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:14:55'),
(99, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:28:56'),
(100, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:32:09'),
(101, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:32:23'),
(102, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:32:37'),
(103, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:33:35'),
(104, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:35:13'),
(105, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:35:52'),
(106, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:36:41'),
(107, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:41:31'),
(108, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:44:20'),
(109, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:47:33'),
(110, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:50:08'),
(111, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:50:22'),
(112, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:52:15'),
(113, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:53:25'),
(114, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:53:37'),
(115, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:54:09'),
(116, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 16:54:21'),
(117, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 17:15:29'),
(118, '', '', '', '2022-01-11 17:24:54'),
(119, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 17:25:03'),
(120, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 17:29:46'),
(121, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-11 17:42:39'),
(122, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-12 02:19:38'),
(123, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-12 02:31:05'),
(124, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-12 02:51:47'),
(125, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-12 03:17:06'),
(126, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-12 12:45:10'),
(127, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-12 12:46:26'),
(128, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-12 12:48:50'),
(129, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-12 14:32:18'),
(130, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-12 15:08:59'),
(131, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-12 17:11:58'),
(132, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-13 02:32:37'),
(133, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-13 05:56:03'),
(134, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-13 06:57:01'),
(135, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-13 10:58:48'),
(136, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-14 03:04:29'),
(137, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-14 03:09:05'),
(138, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-14 04:02:38'),
(139, 'pppond', 'pangpond575@gmail.com', 'Ue5ea86966c0f46b6bad0f62a43293c88', '2022-01-14 09:13:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `custom_p`
--
ALTER TABLE `custom_p`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `data_insurance`
--
ALTER TABLE `data_insurance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `line_oa`
--
ALTER TABLE `line_oa`
  ADD PRIMARY KEY (`oa_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renewal_history`
--
ALTER TABLE `renewal_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_status`
--
ALTER TABLE `sub_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tues_chat_1`
--
ALTER TABLE `tues_chat_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tues_chat_2`
--
ALTER TABLE `tues_chat_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role_type`
--
ALTER TABLE `user_role_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_timestamp`
--
ALTER TABLE `user_timestamp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `custom_p`
--
ALTER TABLE `custom_p`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `data_insurance`
--
ALTER TABLE `data_insurance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `line_oa`
--
ALTER TABLE `line_oa`
  MODIFY `oa_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `renewal_history`
--
ALTER TABLE `renewal_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_status`
--
ALTER TABLE `sub_status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tues_chat_1`
--
ALTER TABLE `tues_chat_1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tues_chat_2`
--
ALTER TABLE `tues_chat_2`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_role_type`
--
ALTER TABLE `user_role_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_timestamp`
--
ALTER TABLE `user_timestamp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
