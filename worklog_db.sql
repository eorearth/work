-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 07, 2025 at 08:02 PM
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
-- Database: `worklog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `work_logs`
--

CREATE TABLE `work_logs` (
  `id` int(11) NOT NULL,
  `task_type` enum('Development','Test','Document') NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `status` enum('ดำเนินการ','เสร็จสิ้น','ยกเลิก') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work_logs`
--

INSERT INTO `work_logs` (`id`, `task_type`, `task_name`, `start_time`, `end_time`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Test', 'API Testing', '2025-07-01 13:00:00', '2025-07-01 15:00:00', 'ดำเนินการ', '2025-07-08 00:31:27', '2025-07-08 00:31:27'),
(3, 'Document', 'User Manual', '2025-07-01 15:30:00', '2025-07-01 17:00:00', 'เสร็จสิ้น', '2025-07-08 00:31:27', '2025-07-08 00:31:27'),
(4, 'Development', 'Dashboard UI', '2025-07-01 10:00:00', '2025-07-01 11:30:00', 'เสร็จสิ้น', '2025-07-08 00:31:27', '2025-07-08 00:38:41'),
(5, 'Test', 'Unit Test', '2025-07-01 11:45:00', '2025-07-01 12:45:00', 'ดำเนินการ', '2025-07-08 00:31:27', '2025-07-08 00:31:27'),
(6, 'Development', 'พัฒนา Login Page', '2025-07-01 09:00:00', '2025-07-01 12:00:00', 'เสร็จสิ้น', '2025-07-08 00:42:08', '2025-07-08 00:42:08'),
(7, 'Test', 'ทดสอบระบบ API', '2025-07-01 13:00:00', '2025-07-01 14:30:00', 'ดำเนินการ', '2025-07-08 00:42:08', '2025-07-08 00:42:08'),
(8, 'Document', 'จัดทำเอกสาร Test Case', '2025-07-02 10:00:00', '2025-07-02 12:00:00', 'เสร็จสิ้น', '2025-07-08 00:42:08', '2025-07-08 00:42:08'),
(9, 'Development', 'เขียน Backend ระบบสั่งซื้อ', '2025-07-02 13:00:00', '2025-07-02 17:00:00', 'ดำเนินการ', '2025-07-08 00:42:08', '2025-07-08 00:42:08'),
(10, 'Test', 'Unit Test ระบบสั่งซื้อ', '2025-07-03 09:00:00', '2025-07-03 10:30:00', 'ยกเลิก', '2025-07-08 00:42:08', '2025-07-08 00:42:08'),
(11, 'Development', 'ปรับปรุงหน้า Dashboard', '2025-07-03 11:00:00', '2025-07-03 12:30:00', 'เสร็จสิ้น', '2025-07-08 00:42:08', '2025-07-08 00:42:08'),
(12, 'Document', 'อัปเดตเอกสารคู่มือผู้ใช้งาน', '2025-07-04 09:30:00', '2025-07-04 11:30:00', 'ดำเนินการ', '2025-07-08 00:42:08', '2025-07-08 00:42:08'),
(13, 'Test', 'ทดสอบหน้า Report', '2025-07-04 13:00:00', '2025-07-04 15:00:00', 'เสร็จสิ้น', '2025-07-08 00:42:08', '2025-07-08 00:42:08'),
(14, 'Development', 'Refactor Code Module A', '2025-07-05 10:00:00', '2025-07-05 12:00:00', 'เสร็จสิ้น', '2025-07-08 00:42:08', '2025-07-08 00:42:08'),
(15, 'Test', 'System Test ทุกฟีเจอร์', '2025-07-05 13:00:00', '2025-07-05 16:00:00', 'ดำเนินการ', '2025-07-08 00:42:08', '2025-07-08 00:42:08'),
(16, 'Development', 'fae', '2025-06-05 00:50:00', '2025-09-03 00:50:00', 'ดำเนินการ', '2025-07-08 00:50:45', '2025-07-08 00:50:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `work_logs`
--
ALTER TABLE `work_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `work_logs`
--
ALTER TABLE `work_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
