-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2022 at 07:44 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ry_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`) VALUES
(1, 'อนุบาลชั้นที่ 1'),
(2, 'อนุบาลชั้นที่ 2'),
(3, 'อนุบาลชั้นที่ 3'),
(4, 'เตรียมอนุบาล');

-- --------------------------------------------------------

--
-- Table structure for table `finances`
--

CREATE TABLE `finances` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `size` varchar(200) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finances`
--

INSERT INTO `finances` (`id`, `code`, `name`, `size`, `price`, `quantity`, `created_at`) VALUES
(1, '001', 'ชุดพละ', 's', 120, 5, '2022-09-30'),
(2, '001', 'ชุดพละ', 'm', 150, 6, '2022-09-30'),
(3, '001', 'ชุดพละ', 'l', 190, 7, '2022-09-30'),
(4, '101', 'ค่าเทอม', 'ืnone', 3900, NULL, '2022-09-30'),
(5, '101', 'ค่าเทอมอนุบาล 2', 'none', 2000, 0, '2022-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `role` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `class` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `role`, `status`, `year`, `class`) VALUES
(1, 'admin', 'กำลังศึกษาอยู่', '1/2665', 'เตรียมอนุบาล'),
(2, 'การเงิน', 'พ้นสภาพนักเรียน', '2/2565', 'อนุบาลชั้นที่ 1'),
(3, 'ธุรการ', 'สำเร็จการศึกษา', '3/2565', 'อนุบาลชั้นที่ 2'),
(4, 'ทะเบียน', NULL, '1/2566', 'อนุบาลชั้นที่ 3');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `finance_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `pay` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `is_finish` varchar(10) NOT NULL DEFAULT 'false',
  `finished_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `finance_id`, `student_id`, `pay`, `quantity`, `is_finish`, `finished_at`, `user_id`) VALUES
(1, 2, 1, 0, 4, 'false', NULL, 2),
(2, 4, 1, 0, 1, 'false', NULL, 2),
(3, 3, 1, 0, 1, 'false', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `prefixes`
--

CREATE TABLE `prefixes` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prefixes`
--

INSERT INTO `prefixes` (`id`, `name`) VALUES
(1, 'เด็กชาย'),
(2, 'เด็กหญิง'),
(3, 'นาย'),
(4, 'นางสาว'),
(5, 'นาง');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'การเงิน'),
(3, 'ธุรการ');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'กำลังศึกษาอยู่'),
(2, 'พ้นสภาพนักเรียน'),
(3, 'สำเร็จการศึกษา');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `code` text NOT NULL,
  `prefix` varchar(50) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `nickname` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `class` varchar(50) NOT NULL,
  `room` int(10) NOT NULL,
  `term` varchar(50) NOT NULL,
  `year` int(4) NOT NULL,
  `status` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `p_prefix` text NOT NULL,
  `p_firstname` text NOT NULL,
  `p_lastname` text NOT NULL,
  `p_fullname` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `code`, `prefix`, `firstname`, `lastname`, `nickname`, `fullname`, `class`, `room`, `term`, `year`, `status`, `user_id`, `p_prefix`, `p_firstname`, `p_lastname`, `p_fullname`, `phone`, `address`) VALUES
(1, '650101001', 'เด็กชาย', 'ทดสอบ', 'ทดสอบ', 'ทดสอบ', 'เด็กชายทดสอบ ทดสอบ', 'อนุบาลชั้นที่ 1', 1, 'ภาคเรียนที่ 1', 2565, 'สำเร็จการศึกษา', 1, 'นาย', 'ทดสอบ', 'ทดสอบ', 'นายทดสอบ ทดสอบ', '0999999999', 'ทดสอบ'),
(2, '650101002', 'เด็กชาย', 'เกม', 'เกม', 'เกม', 'เด็กชายเกม เกม', 'อนุบาลชั้นที่ 1', 1, 'ภาคเรียนที่ 1', 2565, 'กำลังศึกษาอยู่', 1, 'นาย', 'เกม', 'เกม', 'นายเกม เกม', '0999999999', 'เกม'),
(3, '650101003', 'เด็กชาย', 'เกมม', 'เกมม', 'เกมม', 'เด็กชายเกมม เกมม', 'อนุบาลชั้นที่ 1', 2, 'ภาคเรียนที่ 1', 2565, 'กำลังศึกษาอยู่', 1, 'นาย', 'เกมม', 'เกมม', 'นายเกมม เกมม', '0999999999', 'เกมม'),
(4, '650101004', 'เด็กชาย', 'ทัก', 'ทัก', 'ทัก', 'เด็กชายทัก ทัก', 'อนุบาลชั้นที่ 1', 1, 'ภาคเรียนที่ 1', 2565, 'กำลังศึกษาอยู่', 1, 'นาย', 'ทัก', 'ทัก', 'นายทัก ทัก', '0999999999', 'ทัก'),
(5, '650301001', 'เด็กชาย', 'ืกบ', 'กบ', 'กบ', 'เด็กชายืกบ กบ', 'อนุบาลชั้นที่ 3', 1, 'summer', 2565, 'กำลังศึกษาอยู่', 1, 'นาย', 'กบ', 'กบ', 'นายกบ กบ', '0999999999', 'กบ'),
(6, '650401001', 'เด็กชาย', 'ป๋อง', 'ป๋อง', 'ป๋อง', 'เด็กชายป๋อง ป๋อง', 'เตรียมอนุบาล', 1, 'ภาคเรียนที่ 1', 2565, 'กำลังศึกษาอยู่', 1, 'นาย', 'ป๋อง', 'ป๋อง', 'นายป๋อง ป๋อง', '0999999999', 'ป๋อง'),
(7, '650301002', 'เด็กชาย', 'กด', 'กด', 'กด', 'เด็กชายกด กด', 'อนุบาลชั้นที่ 3', 1, 'ภาคเรียนที่ 1', 2565, 'กำลังศึกษาอยู่', 1, 'นาย', 'กด', 'กด', 'นายกด กด', '0999999999', 'df'),
(8, '650101005', 'เด็กชาย', 'กดด', 'กดกด', 'กดกด', 'เด็กชายกดด กดกด', 'อนุบาลชั้นที่ 1', 2, 'ภาคเรียนที่ 1', 2565, 'กำลังศึกษาอยู่', 1, 'นาย', 'กดด', 'กดด', 'นายกดด กดด', '0999999990', 'กด'),
(9, '650101006', 'เด็กชาย', 'กดดดด', 'กดดดด', 'กดดดด', 'เด็กชายกดดดด กดดดด', 'อนุบาลชั้นที่ 1', 2, 'ภาคเรียนที่ 1', 2565, 'กำลังศึกษาอยู่', 1, 'นาย', 'กดดดด', 'กดดดดด', 'นายกดดดด กดดดดด', '0999999999', 'กดดดด'),
(10, '650101007', 'เด็กชาย', 'มี', 'มี', 'มี', 'เด็กชายมี มี', 'อนุบาลชั้นที่ 1', 1, 'ภาคเรียนที่ 1', 2565, 'กำลังศึกษาอยู่', 1, 'นาย', 'มี', 'มี', 'นายมี มี', '0999999999', 'มี'),
(11, '650101008', 'เด็กชาย', 'มุ้ย', 'มุ้ย', 'มุ้ย', 'เด็กชายมุ้ย มุ้ย', 'อนุบาลชั้นที่ 1', 1, 'ภาคเรียนที่ 1', 2565, 'กำลังศึกษาอยู่', 1, 'นาย', 'มุ้ย', 'มุ้ย', 'นายมุ้ย มุ้ย', '0999999999', '1');

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id`, `name`) VALUES
(1, 'ภาคเรียนที่ 1'),
(2, 'ภาคเรียนที่ 2'),
(3, 'summer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `prefix` varchar(50) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `prefix`, `firstname`, `lastname`, `fullname`, `phone`, `username`, `password`, `role`) VALUES
(1, 'นาย', 'ผู้ดูแล', 'ระบบ', 'นายผู้ดูแล ระบบ', NULL, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finances`
--
ALTER TABLE `finances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prefixes`
--
ALTER TABLE `prefixes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `finances`
--
ALTER TABLE `finances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prefixes`
--
ALTER TABLE `prefixes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
