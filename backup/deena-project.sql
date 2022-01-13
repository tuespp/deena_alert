-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 03:07 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

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
(73, ' สหมิตรแท็กซี่ จำกัด ', '0624316866', 'ป1', 'ทส 2609ชลบุรี', '2021-07-16', '50,000', '1', '2022-01-21', '10:15:00', '0', 'ชำระล่วงหน้า'),
(74, 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'ป3', 'ทส 2604กรุงเทพมหานคร', '2021-07-09', '14,859.09', '1', '2022-01-02', '11:15:00', '0', ' -'),
(75, 'คุณ พลญาเดช  ', '0829985001', 'ป3', '1มข 6370กรุงเทพมหานคร', '2021-10-11', '11,858.81', '1', '2022-01-03', '12:15:00', '0', ' -'),
(76, 'คุณ สำราญ', '0829985001', 'ป3', '1มค 5804กรุงเทพมหานคร', '2021-10-12', '11,858.81', '0', '2022-01-04', '13:15:00', '0', ' -'),
(77, 'คุณ ศุภชัย  ', '0899213825', 'ป3', '1มค 5513กรุงเทพมหานคร', '2021-09-13', '11,858.81', '0', '2022-01-05', '14:15:00', '0', ' -'),
(78, 'คุณ ยุทธการ ', '0899213825', 'ป3', '1มข 9957กรุงเทพมหานคร', '2021-07-14', '11,858.81', '0', '2022-01-06', '15:15:00', '0', ' -'),
(79, 'คุณ มนัสสิทธิ์ ', '0899213825', 'ป3', '1มค 8064กรุงเทพมหานคร', '2021-11-15', '11,858.81', '0', '2022-01-07', '16:15:00', '0', ' -'),
(80, 'สหกรณ์ ไทยเจริญแท็กซี่ จำกัด', '0950658887', 'ป3', 'ทห 1573กรุงเทพมหานคร', '2021-12-19', '14,859.09', '0', '2022-01-08', '17:15:00', '0', ' -'),
(81, 'สหกรณ์ ไทยเจริญแท็กซี่ จำกัด', '0950658887', 'พ.ร.บ.', 'ทห 1573กรุงเทพมหานคร', '2021-12-19', '2,041.56', '0', '2022-01-09', '18:15:00', '0', ' -'),
(83, 'หมีทอง ประกันภัย', '0624316866', 'ป1', '280กำแพงแสน', '2022-01-12', '2,000', '1', '2022-01-04', '00:00:00', '0', 'ชำระล่วงหน้า'),
(84, '﻿สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'ป3', 'ทส 2609กรุงเทพมหานคร', '2021-07-09', '14,859.09', '0', '2022-01-01', '10:15:00', '0', ' -'),
(85, 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'ป3', 'ทส 2604กรุงเทพมหานคร', '2021-07-09', '14,859.09', '0', '2022-01-02', '11:15:00', '0', ' -'),
(86, 'คุณ พลญาเดช  ', '0829985001', 'ป3', '1มข 6370กรุงเทพมหานคร', '2021-10-11', '11,858.81', '0', '2022-01-03', '12:15:00', '0', ' -'),
(87, 'คุณ สำราญ', '0829985001', 'ป3', '1มค 5804กรุงเทพมหานคร', '2021-10-12', '11,858.81', '0', '2022-01-04', '13:15:00', '0', ' -'),
(88, 'คุณ ศุภชัย  ', '0899213825', 'ป3', '1มค 5513กรุงเทพมหานคร', '2021-09-13', '11,858.81', '0', '2022-01-05', '14:15:00', '0', ' -'),
(89, 'คุณ ยุทธการ ', '0899213825', 'ป3', '1มข 9957กรุงเทพมหานคร', '2021-07-14', '11,858.81', '0', '2022-01-06', '15:15:00', '0', ' -'),
(90, 'คุณ มนัสสิทธิ์ ', '0899213825', 'ป3', '1มค 8064กรุงเทพมหานคร', '2021-11-15', '11,858.81', '0', '2022-01-07', '16:15:00', '0', ' -'),
(91, 'สหกรณ์ ไทยเจริญแท็กซี่ จำกัด', '0950658887', 'ป3', 'ทห 1573กรุงเทพมหานคร', '2021-12-19', '14,859.09', '0', '2022-01-08', '17:15:00', '0', ' -'),
(92, 'สหกรณ์ ไทยเจริญแท็กซี่ จำกัด', '0950658887', 'พ.ร.บ.', 'ทห 1573กรุงเทพมหานคร', '2021-12-19', '2,041.56', '0', '2022-01-09', '18:15:00', '0', ' -');

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
(59, '﻿64-01934', '2021-07-09', '210901/M002034085', 'ไทยศรี', 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'ป3', 'ทส 2609กรุงเทพมหานคร', '2021-07-09', '13,831.', '14,859.09', 'A0', '6/6', '2021-12-09', ' 1,900.00 ', '2022-01-01', '0', '10:30:00', '0', ''),
(60, '64-01936', '2021-07-09', '210901/M002034094', 'ไทยศรี', 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'ป3', 'ทส 2604กรุงเทพมหานคร', '2021-07-09', '13,831.', '14,859.09', 'A1', '6/6', '2021-12-09', ' 2,500.00 ', '2022-01-02', '0', '10:30:00', '0', ''),
(61, '64-03003', '2021-10-11', '210901/M002048404', 'ไทยศรี', 'คุณ พลญาเดช  ', '0829985001', 'ป3', '1มข 6370กรุงเทพมหานคร', '2021-10-11', '11,038.', '11,858.81', 'S01 - หน้าร้าน', '3/6', '2021-12-11', ' 15,000.00 ', '2022-01-03', '0', '10:30:00', '0', ''),
(62, '64-03016', '2021-10-12', '210901/M002048546', 'ไทยศรี', 'คุณ สำราญ', '0829985001', 'ป3', '1มค 5804กรุงเทพมหานคร', '2021-10-12', '11,038.', '11,858.81', 'S01 - หน้าร้าน', '3/6', '2021-12-12', ' 8,000.00 ', '2022-01-04', '0', '10:30:00', '0', ''),
(63, '64-02566', '2021-09-13', '210901/M002043267', 'ไทยศรี', 'คุณ ศุภชัย  ', '0899213825', 'ป3', '1มค 5513กรุงเทพมหานคร', '2021-09-13', '11,038.', '11,858.81', 'S01 - หน้าร้าน', '4/6', '2021-12-13', ' 5,000.00 ', '2022-01-05', '0', '10:30:00', '0', ''),
(64, '64-01984', '2021-07-14', '210901/M002034739', 'ไทยศรี', 'คุณ ยุทธการ ', '0899213825', 'ป3', '1มข 9957กรุงเทพมหานคร', '2021-07-14', '11,038.', '11,858.81', 'S01 - หน้าร้าน', '6/6', '2021-12-14', ' 2,546.00 ', '2022-01-06', '0', '10:30:00', '0', ''),
(65, '64-03503', '2021-11-15', '210901/M002055382', 'ไทยศรี', 'คุณ มนัสสิทธิ์ ', '0899213825', 'ป3', '1มค 8064กรุงเทพมหานคร', '2021-11-15', '11,038.', '11,858.81', 'S01 - หน้าร้าน', '2/6', '2021-12-15', ' 7,999.00 ', '2022-01-07', '0', '10:30:00', '0', ''),
(66, '64-03929', '2021-12-19', '210901/M002062134', 'ไทยศรี', 'สหกรณ์ ไทยเจริญแท็กซี่ จำกัด', '0950658887', 'ป3', 'ทห 1573กรุงเทพมหานคร', '2021-12-19', '13,831.', '14,859.09', 'A1', '1', '2021-12-19', ' 45,944.00 ', '2022-01-08', '0', '10:30:00', '0', ''),
(67, '64-03930', '2021-12-19', '210901/M007764780', 'ไทยศรี', 'สหกรณ์ ไทยเจริญแท็กซี่ จำกัด', '0950658887', 'พ.ร.บ.', 'ทห 1573กรุงเทพมหานคร', '2021-12-19', '1,900.', '2,041.56', 'A1', '1', '2021-12-19', ' 8,000.00 ', '2022-01-09', '0', '10:30:00', '0', ''),
(68, '555-325', '2021-12-14', '111', 'หมีทอง ประกันภัย', 'teerapat meeyhong', '0624316866', 'ป1', '280กำแพงแสน', '2021-12-09', '111', '111', '552', '6/10', '2021-12-26', '5,000', '2022-01-04', '0', '00:00:00', '0', '-'),
(69, '﻿64-01934', '2021-07-09', '210901/M002034085', 'ไทยศรี', 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'ป3', 'ทส 2609กรุงเทพมหานคร', '2021-07-09', '13,831.', '14,859.09', 'A0', '6/6', '2021-12-09', ' 1,900.00 ', '2022-01-01', '0', '10:30:00', '0', ''),
(70, '64-01936', '2021-07-09', '210901/M002034094', 'ไทยศรี', 'สหกรณ์ สหมิตรแท็กซี่ จำกัด ', '0829985001', 'ป3', 'ทส 2604กรุงเทพมหานคร', '2021-07-09', '13,831.', '14,859.09', 'A1', '6/6', '2021-12-09', ' 2,500.00 ', '2022-01-02', '0', '10:30:00', '0', ''),
(71, '64-03003', '2021-10-11', '210901/M002048404', 'ไทยศรี', 'คุณ พลญาเดช  ', '0829985001', 'ป3', '1มข 6370กรุงเทพมหานคร', '2021-10-11', '11,038.', '11,858.81', 'S01 - หน้าร้าน', '3/6', '2021-12-11', ' 15,000.00 ', '2022-01-03', '0', '10:30:00', '0', ''),
(72, '64-03016', '2021-10-12', '210901/M002048546', 'ไทยศรี', 'คุณ สำราญ', '0829985001', 'ป3', '1มค 5804กรุงเทพมหานคร', '2021-10-12', '11,038.', '11,858.81', 'S01 - หน้าร้าน', '3/6', '2021-12-12', ' 8,000.00 ', '2022-01-04', '0', '10:30:00', '0', ''),
(73, '64-02566', '2021-09-13', '210901/M002043267', 'ไทยศรี', 'คุณ ศุภชัย  ', '0899213825', 'ป3', '1มค 5513กรุงเทพมหานคร', '2021-09-13', '11,038.', '11,858.81', 'S01 - หน้าร้าน', '4/6', '2021-12-13', ' 5,000.00 ', '2022-01-05', '0', '10:30:00', '0', ''),
(74, '64-01984', '2021-07-14', '210901/M002034739', 'ไทยศรี', 'คุณ ยุทธการ ', '0899213825', 'ป3', '1มข 9957กรุงเทพมหานคร', '2021-07-14', '11,038.', '11,858.81', 'S01 - หน้าร้าน', '6/6', '2021-12-14', ' 2,546.00 ', '2022-01-06', '0', '10:30:00', '0', ''),
(75, '64-03503', '2021-11-15', '210901/M002055382', 'ไทยศรี', 'คุณ มนัสสิทธิ์ ', '0899213825', 'ป3', '1มค 8064กรุงเทพมหานคร', '2021-11-15', '11,038.', '11,858.81', 'S01 - หน้าร้าน', '2/6', '2021-12-15', ' 7,999.00 ', '2022-01-07', '0', '10:30:00', '0', ''),
(76, '64-03929', '2021-12-19', '210901/M002062134', 'ไทยศรี', 'สหกรณ์ ไทยเจริญแท็กซี่ จำกัด', '0950658887', 'ป3', 'ทห 1573กรุงเทพมหานคร', '2021-12-19', '13,831.', '14,859.09', 'A1', '1', '2021-12-19', ' 45,944.00 ', '2022-01-08', '0', '10:30:00', '0', ''),
(77, '64-03930', '2021-12-19', '210901/M007764780', 'ไทยศรี', 'สหกรณ์ ไทยเจริญแท็กซี่ จำกัด', '0950658887', 'พ.ร.บ.', 'ทห 1573กรุงเทพมหานคร', '2021-12-19', '1,900.', '2,041.56', 'A1', '1', '2021-12-19', ' 8,000.00 ', '2022-01-09', '0', '10:30:00', '0', '');

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
(257, 'หมีทอง ประกันภัย', '0624316866', 'line', '2022-01-04 04:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `shop_payment`
--

CREATE TABLE `shop_payment` (
  `id` int(10) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `time_payment` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_payment`
--

INSERT INTO `shop_payment` (`id`, `user_id`, `price`, `status`, `time_payment`, `payment_type`) VALUES
(1, '16', '50', '1', '2022-01-06 10:28:46', 'mobile');

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
-- Table structure for table `table_p`
--

CREATE TABLE `table_p` (
  `p_id` int(10) NOT NULL,
  `p_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `p_image` text CHARACTER SET latin1 NOT NULL,
  `p_detail` varchar(255) CHARACTER SET latin1 NOT NULL,
  `p_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_p`
--

INSERT INTO `table_p` (`p_id`, `p_name`, `p_image`, `p_detail`, `p_price`) VALUES
(1, 'The Great Irish Science Book', '../img/book1.jpg', 'Science book 1', 20),
(2, 'The Science Book', '../img/book3.jpg', 'Science book 2', 25),
(3, 'My Frist Science Book ', '../img/book2.jpg', 'Science book 3', 10),
(4, 'Stem Activity Book Science', '../img/book4.jpg', 'Science book 4', 15);

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
  `user_id` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `sub_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `username`, `password`, `tel`, `address`, `level`, `img`, `name`, `user_id`, `access_token`, `email`, `status`, `sub_status`) VALUES
(1, 'admin', '12345678', '0800605960', '39/2 หมู่ 3 ต.สามพราน อ.สามพราน จ.นครปฐม 73110 ', 'admin', 'user.png', 'Admin', 'null', 'null', '', '2', '3'),
(2, 'ausiri', '123456', '0922766755', '39/2 หมู่ 3 ต.สามพราน อ.สามพราน จ.นครปฐม 73110', 'member', 'user.png', 'Siriporn Ketbunlue', 'U0a6ca091be45a9c880fc1d8f8922c4d2', 'eyJhbGciOiJIUzI1NiJ9.cfRJJ48AhqS8nhaTh1thpHFA5U6890V8i1Rz8jTtnzvB0stgJHWMkpzvYyCwORhXvETQktnEzBuP7BgG-1ViS4P-48JlVHMwyddvdMnt6pQIVzdrZoroIdRSJjaKO6ii4ksmpd6U2F5fFNbk1VfXQvBTv8QcEHUnZ4vLTZZgdC8.ND4k6qD-SW06I3vpUBUiqnyr7Rj46koYHuvUEAk-BdI', '', '1', '1'),
(3, 'nackky', '12345678', '0624316818', '6/139 หมู่ 8 ตำบลอ้อมใหญ่ อำเภอสามพราน จังหวัดนครปฐม 73160', 'employee', 'user.png', 'Tanapon Visetsung', '', '', '', '2', '4'),
(12, '', '', '0619807818', '', 'member', 'user.png', 'Nack', 'U0a8896c1801b01944bd27eb7c154d52d', 'eyJhbGciOiJIUzI1NiJ9.GDPKzG7oWT4-B56vsC65EV0DIb3M7JrnYxUTwz3er8J5QhsIk-8hdWoLJJFz6dVpubL6juCTvlZaahA9tcEE38_yF7Ga3o_HPprLAjWO6aKgqqLstQHT6fFQLY2eYQlE9wycwySaUz3ipQwCoOgwA_jsB8ms90LVcUAeqCXex8c.LwntgpoLrqMScSZeB3He-ZCwYmBQ_lfYcyoxhsZVhiM', '', '3', '6'),
(16, '', '', '0624316866', '', 'member', 'user.png', 'pppond', 'Ue5ea86966c0f46b6bad0f62a43293c88', 'eyJhbGciOiJIUzI1NiJ9.sBLYH_V8Osv19gIbLAK5y1yPfPBPIHkbGEvote8aqP4cSRTwOaTS1ZFfs-OFZzEJ9b9ZNrUgeEoVHCWyQbbwZrBA77HcUkSTR8hGA-SthpbG0B0P7F6nqyXYs2R1qf58hvRm8XHq7-FXI7AE0AeLpMO8shqMaoMn5dDondPUXrI.0sCImOiM1BFlycyrLEfdI3KfPbEnuTmciQHxlWGyHe0', 'pangpond575@gmail.com', '3', '5');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `page` varchar(200) NOT NULL,
  `role` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `page`, `role`, `link`, `icon`) VALUES
(1, 'Profile', 'admin1,0,employee1,0,member1,0,admin2,0,admin3,0,employee3,0,member3,0,admin4,employee4,0,admin5,0,employee5,0,member5,0,admin9', 'profile.php', 'nav-icon far fa-id-card'),
(2, 'Control Setting', 'admin1,0,employee1,0,member1,0,admin2,0,admin3,0,employee3,0,member3,0,admin4,employee4,0,admin5,0,employee5,0,member5,0,admin9', 'control.php', 'nav-icon fas fa-cogs'),
(3, 'Insurance', 'admin1,0,employee1,0,member1,0,admin2,0,admin3,0,employee3,0,member3,0,admin4,employee4,0,admin5,0,employee5,0,member5,0,admin9', 'insurance_data.php', 'nav-icon fas fa-receipt'),
(4, 'Payment', 'admin1,0,employee1,0,member1,0,admin2,0,admin3,0,employee3,0,member3,0,admin4,employee4,0,admin5,0,employee5,0,member5,0,admin9', 'payment_data.php', 'nav-icon fas fa-money-check-alt'),
(5, 'renewal history', 'admin1,0,employee1,0,member1,0,admin2,0,admin3,0,employee3,0,member3,0,admin4,employee4,0,admin5,0,employee5,0,member5,0,admin9', 'renewal_history.php', 'nav-icon fas fa-store'),
(9, 'payment history', 'admin1,0,employee1,0,member1,0,admin2,0,admin3,0,employee3,0,member3,0,admin4,0,employee4,0,admin5,0,employee5,0,member5,0,admin9', 'payment_history.php', 'nav-icon fas fa-columns'),
(10, 'Insert csv', 'admin1,0,employee1,0,member1,0,admin2,0,admin3,0,employee3,0,member3,0,admin4,0,employee4,0,admin5,0,employee5,0,member5,0,admin9,0,admin10', 'insert_csv_form.php', 'nav-icon fas fa-file-import'),
(11, 'report', 'admin1,0,employee1,0,member1,0,admin2,0,admin3,0,employee3,0,member3,0,admin4,0,employee4,0,admin5,0,employee5,0,member5,0,admin9,0,admin10,0,admin11', 'report.php', 'nav-icon fas fa-paper-plane'),
(12, 'member', 'admin1,0,employee1,0,member1,0,admin2,0,admin3,0,employee3,0,member3,0,admin4,0,employee4,0,admin5,0,employee5,0,member5,0,admin9,0,admin10,0,admin11,0,admin12', 'member.php', 'nav-icon fas fa-users'),
(13, 'payment method', 'admin1,0,employee1,0,member1,0,admin2,0,admin3,0,employee3,0,member3,0,admin4,0,employee4,0,admin5,0,employee5,0,member5,0,admin9,0,admin10,0,admin11,0,admin12,0,admin13,employee13,member13', 'payment_method.php', 'nav-icon fas fa-cash-register'),
(14, 'cart ทดสอบ', 'admin14,employee14,member14,admin15,employee15,member15', 'cart.php', 'nav-icon fas fa-shopping-cart'),
(15, 'compare ทดสอบ', 'admin14,employee14,member14,admin15,employee15,member15', 'compare.php', 'nav-icon fas fa-glasses'),
(16, 'Shop payment', '', 'shop_payment.php', 'nav-icon fas fa-receipt');


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
(24, '', '', '', '2022-01-05 11:40:55');

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
-- Indexes for table `table_p`
--
ALTER TABLE `table_p`
  ADD PRIMARY KEY (`p_id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `renewal_history`
--
ALTER TABLE `renewal_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

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
-- AUTO_INCREMENT for table `table_p`
--
ALTER TABLE `table_p`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_timestamp`
--
ALTER TABLE `user_timestamp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
