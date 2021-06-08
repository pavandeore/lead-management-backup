-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 05:45 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lead_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `call_log`
--

CREATE TABLE `call_log` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `call_message` varchar(255) NOT NULL,
  `call_time` datetime(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `call_log`
--

INSERT INTO `call_log` (`id`, `cust_id`, `call_message`, `call_time`) VALUES
(1, 1, 'kay', '2021-02-02 15:43:48.00000'),
(2, 45, 'gfhf', '2021-02-02 15:55:09.00000'),
(3, 2, 'gfjggjh', '2021-02-04 14:48:36.00000'),
(4, 46, 'new msg', '2021-06-06 17:34:32.00000');

-- --------------------------------------------------------

--
-- Table structure for table `customer_data`
--

CREATE TABLE `customer_data` (
  `cust_id` int(200) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_number` varchar(50) NOT NULL,
  `customer_alternative_number` varchar(50) NOT NULL,
  `cutomer_address` varchar(100) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `gstno` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_data`
--

INSERT INTO `customer_data` (`cust_id`, `customer_name`, `customer_number`, `customer_alternative_number`, `cutomer_address`, `customer_email`, `company_name`, `gstno`, `date`) VALUES
(1, 'akash', '1234567890', '9887667899', 'pune', 'akash@gmail.com', 'Akash pvt ltd', 'gstno8765434678', '2021-01-14 10:30:48'),
(2, 'nilesh', '987654321', '0', 'wagholi', 'nilesh@gmail.com', 'Nilesh pvt ltd', '987234356789', '2021-01-14 10:30:48'),
(3, 'nila', '876543980', '0', 'mumbai', 'nila@gmail.com', 'nila pvt ltd', '87652345678', '2021-01-14 10:33:48'),
(45, 'bablu pandit', '4567834567', '', '', '', '', '', '2021-01-25 11:38:57'),
(46, 'vikas gupta', '9874832910', '', 'mumbai', 'vikas@gmail.com', 'vikas pvt Ltd', '938kk2', '2021-01-28 10:28:34'),
(47, 'raju', '4567894567', '', 'asdfsdf', '', '', '', '2021-01-28 16:09:40'),
(48, 'haidar', '4567845678', '', '', '', '', '', '2021-01-28 18:14:42'),
(49, 'gangadhar', '7438383939', '', '', '', '', '', '2021-01-28 18:15:01'),
(50, 'shubham awale', '9595850087', '', 'vadgoan sheri ,Pune', 'awales000@gmail.com', 'awale pvt. Ltd.', '679098awale', '2021-02-01 14:47:58'),
(51, 'pappu gandhi', '8383838383', '', 'kalalyas sangto', 'admin@admin.com', 'non pvt ltd', '2022h', '2021-02-05 10:30:30'),
(52, 'pd', '1234567890', '1234567890', 'rhtjykjul', 'pd@gmail.com', 'dhfghhj', '5467', '2021-06-08 21:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `name` varchar(200) NOT NULL,
  `number` int(200) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`name`, `number`, `role`) VALUES
('shubham ', 1234567890, 'intern');

-- --------------------------------------------------------

--
-- Table structure for table `item_master`
--

CREATE TABLE `item_master` (
  `item_name` varchar(200) NOT NULL,
  `item_desc` varchar(200) NOT NULL,
  `rate` int(100) NOT NULL,
  `gst` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_master`
--

INSERT INTO `item_master` (`item_name`, `item_desc`, `rate`, `gst`) VALUES
('laptop', '2gb ram 128 gb ssd', 2000, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leaddata`
--

CREATE TABLE `tbl_leaddata` (
  `id` int(50) NOT NULL,
  `cust_id` int(50) NOT NULL,
  `lead_source` varchar(200) NOT NULL,
  `lead_type` varchar(200) NOT NULL,
  `assign_to` varchar(100) NOT NULL,
  `priority` varchar(100) NOT NULL,
  `requirement` varchar(300) NOT NULL,
  `followup_date` date DEFAULT NULL,
  `last_contacted` datetime DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_leaddata`
--

INSERT INTO `tbl_leaddata` (`id`, `cust_id`, `lead_source`, `lead_type`, `assign_to`, `priority`, `requirement`, `followup_date`, `last_contacted`, `status`) VALUES
(43, 7, 'kaju', 'CCTV', 'bablu', '', 'dfghjk', '2021-01-22', NULL, 'OPEN'),
(44, 1, 'kaju', 'New Projector', 'ajinkya', '', 'dya', '2021-01-27', NULL, 'OPEN'),
(45, 1, 'pawan', 'New Projector', 'rahul', '', 'pahije', '2021-01-29', NULL, 'Contacted'),
(46, 2, 'gandhi ', 'Networking', 'vilas', '', 'err', '2020-12-31', NULL, 'contacted'),
(47, 1, 'karam', 'Old Projector', 'vijay', '', 'good condition', '2021-01-16', NULL, 'OPEN'),
(48, 1, 'mohit', 'CCTV', 'vikas', '', '5 qty', '2021-01-15', NULL, 'OPEN'),
(49, 46, 'ram', 'Networking', 'vishal', '', 'net', '2021-01-20', NULL, 'OPEN'),
(50, 1, 'sahil', 'Old Laptop', 'aanand', '', 'dedo', '2021-01-29', NULL, 'OPEN'),
(51, 1, 'rohit', 'Data Recovery', 'raju', '', 'kra', '2021-02-05', NULL, 'OPEN'),
(52, 1, 'vijay', 'Old Desktop', 'vishal', '', 'bga changla', '2021-01-29', NULL, 'OPEN'),
(53, 1, 'dinu', 'rental', 'aanad', '', 'good good good', '2021-01-22', NULL, 'contacted'),
(54, 49, 'shaktiman', 'New Desktop', 'neha', '', 'gangadhar hi shaktiman', '2021-01-29', NULL, 'OPEN'),
(55, 50, 'pawan', 'Software', 'Anand', 'urgent', 'create a software for me', '2021-02-09', NULL, 'draft'),
(56, 46, 'kaliya', 'rental', 'Anand', 'normal', 'give me', '2021-02-02', NULL, 'open'),
(57, 45, 'bumba', 'rental', 'Pawan', 'low', 'kkakakakaka', '2021-02-03', NULL, 'draft'),
(58, 45, 'kkkkkkkkkkkkkk', 'Data Recovery', 'Shubham', 'normal', 'sddsfsdfsdfdfsfsdfsdfsdfsdf', '2021-02-03', NULL, 'open'),
(59, 51, 'vishhu', 'Data Recovery', 'Shubham', 'normal', 'kra patkan', '2021-02-06', NULL, 'open');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'admin@admin.com', 'admin123'),
(2, 'user@user.com', 'user123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `call_log`
--
ALTER TABLE `call_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_data`
--
ALTER TABLE `customer_data`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `tbl_leaddata`
--
ALTER TABLE `tbl_leaddata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `call_log`
--
ALTER TABLE `call_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_data`
--
ALTER TABLE `customer_data`
  MODIFY `cust_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_leaddata`
--
ALTER TABLE `tbl_leaddata`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
