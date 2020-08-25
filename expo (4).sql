-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2020 at 03:33 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expo`
--

-- --------------------------------------------------------

--
-- Table structure for table `change_details`
--

CREATE TABLE `change_details` (
  `change_id` int(11) NOT NULL,
  `new_order_details_product_id` int(11) NOT NULL,
  `new_order_details_product_id_qty` int(11) NOT NULL,
  `change_price` int(11) NOT NULL,
  `change_status` text NOT NULL,
  `order_id` int(11) NOT NULL,
  `change_details_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `change_details`
--

INSERT INTO `change_details` (`change_id`, `new_order_details_product_id`, `new_order_details_product_id_qty`, `change_price`, `change_status`, `order_id`, `change_details_id`) VALUES
(65, 29, 1, 0, '', 50, 114),
(73, 2, 4, 0, '', 75, 121),
(74, 0, 0, 0, '', 72, 122),
(75, 1, 2, 0, '', 72, 123);

-- --------------------------------------------------------

--
-- Table structure for table `change_order`
--

CREATE TABLE `change_order` (
  `change_id` int(11) NOT NULL,
  `old_product_id` int(11) NOT NULL,
  `old_product_id_qty` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `change_order`
--

INSERT INTO `change_order` (`change_id`, `old_product_id`, `old_product_id_qty`, `order_id`) VALUES
(64, 1, 0, 50),
(65, 1, 2, 50),
(73, 63, 2, 75),
(74, 2, 1, 72),
(75, 28, 3, 72);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `client_FullName` varchar(50) NOT NULL,
  `client_Address` text NOT NULL,
  `client_Phone` text NOT NULL,
  `client_Notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_FullName`, `client_Address`, `client_Phone`, `client_Notes`) VALUES
(1, 'Client Rami Mamdouh Shook', 'Kalamoun/Beside the girls\' public school/Shook Building', '79103686', 'VIP.Client'),
(2, 'Client Ahmed One', 'Tripoli/BlaBla', '70245698', NULL),
(13, 'Client Full Name', 'Address', '71456789', 'No Notes~.'),
(14, 'Ahmed Mhamad', 'Tripoli/Sehet Lnjme', '70124578', 'wierd'),
(15, 'mR.mAHMOUD bADDOUR', 'Kalamoun', '76405054', 'Ma bYDF3');

-- --------------------------------------------------------

--
-- Stand-in structure for view `clientview`
-- (See below for the actual view)
--
CREATE TABLE `clientview` (
`product_id` int(11)
,`Product_Name` text
,`product_Code` text
,`product_Size` text
,`product_Color` text
,`product_Quantity` int(11)
,`product_Price` double
,`product_Note` text
,`product_Availability` char(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `multiple_reserved`
--

CREATE TABLE `multiple_reserved` (
  `multiple_reserve_id` int(11) NOT NULL,
  `multiple_reserve_worker_id` int(11) NOT NULL,
  `multiple_reserve_client_id` int(11) NOT NULL,
  `multiple_reserve_note` text DEFAULT NULL,
  `reserve_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `reserve_full_price` double NOT NULL,
  `multiple_reserve_status` text NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `multiple_reserved`
--

INSERT INTO `multiple_reserved` (`multiple_reserve_id`, `multiple_reserve_worker_id`, `multiple_reserve_client_id`, `multiple_reserve_note`, `reserve_date`, `reserve_full_price`, `multiple_reserve_status`) VALUES
(-1, 2, 1, '0', '2020-08-24 02:39:33', 0, '0'),
(8, 1, 1, '', '2020-07-24 22:45:58', 0, 'Pending'),
(13, 2, 1, '', '2020-07-24 23:26:31', 0, 'Pendinng'),
(16, 2, 2, '', '2020-07-25 00:51:27', 0, 'Pending'),
(17, 2, 1, '', '2020-07-26 22:55:47', 0, 'Pending'),
(18, 2, 1, '', '2020-07-26 23:54:39', 0, 'Pending'),
(19, 2, 1, '', '2020-07-27 00:22:21', 0, 'Pending'),
(20, 2, 1, '', '2020-07-27 00:23:43', 0, 'Pending'),
(21, 2, 1, '', '2020-07-27 00:24:05', 0, 'Pending'),
(22, 2, 1, '', '2020-07-27 00:24:54', 0, 'Pending'),
(23, 2, 1, '', '2020-07-27 00:25:57', 0, 'Pending'),
(24, 2, 1, '', '2020-07-27 00:27:33', 0, 'Pending'),
(25, 2, 1, '', '2020-07-27 00:28:03', 0, 'Pending'),
(26, 2, 1, '', '2020-07-27 00:28:24', 0, 'Pending'),
(27, 2, 1, '', '2020-07-27 00:33:00', 0, 'Pending'),
(31, 2, 1, '', '2020-07-27 00:48:58', 0, 'Pending'),
(33, 2, 1, '', '2020-07-27 01:07:39', 0, 'Pending'),
(34, 2, 1, '', '2020-07-27 01:08:07', 0, 'Pending'),
(35, 2, 15, '', '2020-07-27 09:23:47', 0, 'Pending'),
(36, 2, 15, '', '2020-07-27 09:32:22', 0, 'Pending'),
(37, 2, 15, '', '2020-07-27 09:33:59', 0, 'Pending'),
(38, 2, 15, '', '2020-07-27 09:36:08', 0, 'Pending'),
(39, 2, 1, '', '2020-07-27 10:13:03', 0, 'Pending'),
(40, 2, 15, '', '2020-07-27 16:47:12', 0, 'Pending'),
(41, 2, 15, '', '2020-07-27 16:47:24', 0, 'Pending'),
(42, 2, 15, '', '2020-07-27 16:47:37', 0, 'Pending'),
(43, 2, 1, '', '2020-07-27 16:55:53', 0, 'Pending'),
(44, 2, 1, '', '2020-07-27 16:56:24', 0, 'Pending'),
(45, 2, 1, '', '2020-07-27 16:57:14', 0, 'Pending'),
(46, 2, 1, '', '2020-07-27 16:57:50', 0, 'Pending'),
(47, 2, 1, '', '2020-07-27 17:05:51', 0, 'Pending'),
(48, 2, 1, '', '2020-07-27 17:12:57', 0, 'Pending'),
(49, 2, 1, '', '2020-07-30 09:07:25', 0, 'Pending'),
(50, 2, 1, '', '2020-07-30 09:12:52', 0, 'Replacement'),
(51, 2, 1, '', '2020-08-02 23:29:20', 0, 'Pending'),
(52, 2, 14, '', '2020-08-02 23:31:18', 0, 'Pending'),
(53, 2, 14, '', '2020-08-02 23:35:08', 0, 'Pending'),
(54, 2, 14, '', '2020-08-02 23:40:55', 0, 'Pending'),
(55, 2, 14, '', '2020-08-02 23:44:25', 0, 'Pending'),
(56, 2, 1, '', '2020-08-02 23:44:45', 0, 'Pending'),
(57, 2, 1, '', '2020-08-02 23:51:48', 0, 'Pending'),
(58, 2, 14, '', '2020-08-02 23:51:50', 0, 'Pending'),
(59, 2, 1, '', '2020-08-02 23:51:50', 0, 'Pending'),
(60, 2, 1, '', '2020-08-02 23:52:51', 0, 'Pending'),
(61, 2, 1, '', '2020-08-02 23:58:17', 0, 'Pending'),
(62, 2, 1, '', '2020-08-03 00:00:18', 0, 'Pending'),
(63, 2, 1, '', '2020-08-03 00:06:54', 0, 'Sended'),
(64, 2, 14, '', '2020-08-03 00:08:02', 0, 'Replacement'),
(65, 2, 1, '', '2020-08-03 00:12:17', 0, 'Pending'),
(66, 2, 1, '', '2020-08-06 12:32:01', 0, 'Pending'),
(67, 2, 1, '', '2020-08-06 18:23:25', 0, 'Pending'),
(68, 2, 1, '', '2020-08-11 09:26:13', 0, 'Pending'),
(70, 2, 1, '', '2020-08-12 08:04:56', 0, 'Pending'),
(71, 2, 1, '', '2020-08-14 11:59:49', 0, 'Pending'),
(72, 2, 2, '', '2020-08-22 10:44:51', 0, 'Replacement'),
(73, 2, 1, NULL, '2020-08-24 02:35:15', 0, '0'),
(74, 2, 1, '0', '2020-08-24 02:37:52', 0, '0'),
(75, 2, 1, '', '2020-08-24 09:31:22', 0, 'Replacement');

-- --------------------------------------------------------

--
-- Table structure for table `multiple_reserved_product`
--

CREATE TABLE `multiple_reserved_product` (
  `multiple_reserve_id` int(11) NOT NULL,
  `multiple_reserve_product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `row_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `multiple_reserved_product`
--

INSERT INTO `multiple_reserved_product` (`multiple_reserve_id`, `multiple_reserve_product_id`, `quantity`, `price`, `row_id`) VALUES
(8, 1, 4, '160000', 0),
(8, 2, 3, '120000', 0),
(13, 1, 2, '80000', 0),
(13, 4, 2, '80000', 0),
(16, 1, 3, '120000', 0),
(50, 1, 2, '80000', 4074490),
(50, 2, 4, '60000', 1162567),
(63, 1, 2, '80000', 9021869),
(63, 2, 2, '30000', 6511042),
(67, 1, 2, '80000', 70789),
(67, 2, 3, '45000', 9133681),
(72, 2, 1, '15000', 2402310),
(72, 28, 3, '90000', 7746121),
(75, 59, 2, '20000', 9151012),
(75, 63, 2, '58000', 8025361);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `Product_Name` text NOT NULL,
  `product_Code` text NOT NULL,
  `product_Size` text NOT NULL,
  `product_Color` text NOT NULL,
  `product_Quantity` int(11) NOT NULL,
  `product_Price` double NOT NULL,
  `product_Note` text DEFAULT NULL,
  `product_Availability` char(1) NOT NULL DEFAULT 'A' COMMENT 'A:Available,O:Out Of Stock',
  `product_photo_path` text NOT NULL,
  `Real_Size` double DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `Product_Name`, `product_Code`, `product_Size`, `product_Color`, `product_Quantity`, `product_Price`, `product_Note`, `product_Availability`, `product_photo_path`, `Real_Size`) VALUES
(1, 'Shoe', '123456', '36', 'Black', 60, 40000, NULL, 'A', './photo/123456.jpg', 0),
(2, 'heel', '321456', '37', 'Red', 81, 15000, 'Comming Soon', 'A', '', 0),
(3, 'Product 1', '782123', '36', 'Yellow', 15, 50000, NULL, 'A', './photo/782123.jpg', 0),
(4, 'Product 2', '383939', '34', 'Blue', 43, 40000, 'njnjnjnjnjnjnjnjnjnjnj nj njnjnjnjn jnjnjnjnjn jnjnj', 'A', './photo/383939.jpg', 0),
(5, 'Product 3', 'c200BLK28F28.1', '37', 'Black', 60, 200000, 'Not Available For Testing', 'A', './photo/32e232.jpg', 0),
(26, '', 'c200BLK38', '38', 'Black', 18, 30000, '', 'A', '', 0),
(27, '', 'c200BLK36', '36', 'Black', 20, 30000, '', 'A', '', 0),
(28, '', 'c200BLK39', '39', 'Black', 63, 30000, '', 'A', '', 0),
(29, '', 'c200BLK37', '37', 'Black', 9, 30000, '', 'A', '', 0),
(30, '', 'c200BLK40', '40', 'Black', 10, 30000, '', 'A', '', 0),
(31, '', 'c200BLK41', '41', 'Black', 10, 30000, '', 'A', '', 0),
(59, 'Shoe', 'x220BLK30F29.6', '30', 'Black', 20, 10000, '', 'A', '', 29.6),
(60, 'Shoe', 'x220BLK30F29.5', '30', 'Black', 20, 10000, '', 'A', '', 29.5),
(61, 'Shoe', 'x220BLK30F29.8', '30', 'Black', 20, 10000, '', 'A', '', 29.8),
(62, '', 'mm2BLK37', '37', 'Black', 4, 29000, '', 'A', '', 0),
(63, '', 'mm2BLK38', '38', 'Black', 2, 29000, '', 'A', '', 0),
(64, '', 'mm2BLK39', '39', 'Black', 4, 29000, '', 'A', '', 0),
(65, '', 'mm2BLK36', '36', 'Black', 4, 29000, '', 'A', '', 0),
(66, '', 'mm2BLK40', '40', 'Black', 4, 29000, '', 'A', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reserved`
--

CREATE TABLE `reserved` (
  `reserve_id` int(11) NOT NULL,
  `reserve_product_id` int(11) NOT NULL,
  `reserve_worker_id` int(11) NOT NULL,
  `reserve_client_id` int(11) NOT NULL,
  `reverse_Status` text DEFAULT 'Pending',
  `reverse_Notes` text NOT NULL,
  `reserve_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `reserve_Price` int(5) NOT NULL,
  `reserve_Quantity` int(11) NOT NULL,
  `rw_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserved`
--

INSERT INTO `reserved` (`reserve_id`, `reserve_product_id`, `reserve_worker_id`, `reserve_client_id`, `reverse_Status`, `reverse_Notes`, `reserve_Date`, `reserve_Price`, `reserve_Quantity`, `rw_id`) VALUES
(4, 1, 2, 1, 'Fulfillment', 'MayBeCancelled', '2020-07-18 00:17:45', 80000, 2, 0),
(13, 5, 2, 13, 'Pending', '', '2020-07-18 23:15:02', 4000000, 20, 0),
(15, 2, 1, 14, 'Pending', 'Dlivery!', '2020-07-19 01:35:35', 15000, 1, 0),
(19, 1, 2, 1, 'Pending', '', '2020-07-20 16:57:10', 200000, 5, 0),
(20, 4, 2, 1, 'Pending', 'b hbhbh', '2020-07-23 12:49:46', 0, 5, 0),
(162, 4, 2, 14, 'Pending', '', '2020-07-25 01:08:08', 200000, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `worker_id` int(11) NOT NULL,
  `worker_Full_Name` text NOT NULL,
  `worker_Uname` text NOT NULL,
  `worker_Pass` text NOT NULL,
  `worker_Address` text NOT NULL,
  `worker_Phone` text NOT NULL,
  `worker_Type` text NOT NULL DEFAULT 'worker'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`worker_id`, `worker_Full_Name`, `worker_Uname`, `worker_Pass`, `worker_Address`, `worker_Phone`, `worker_Type`) VALUES
(1, 'Mahmoud Baddour', 'MBaddour', 'baddour123', 'Tripoli, Blaaah', '71478523', 'worker'),
(2, 'Worker Rami Mamdouh Shook', 'RShook', 'rami123', 'Kalamoun/ SomeWhere', '79103686', 'admin'),
(3, 'Worker ahmad mhamad', 'AhmadM', 'ahmad123', 'tripoli/ddd', '79854789', 'Fulfillment');

-- --------------------------------------------------------

--
-- Structure for view `clientview`
--
DROP TABLE IF EXISTS `clientview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `clientview`  AS  select `products`.`product_id` AS `product_id`,`products`.`Product_Name` AS `Product_Name`,`products`.`product_Code` AS `product_Code`,`products`.`product_Size` AS `product_Size`,`products`.`product_Color` AS `product_Color`,`products`.`product_Quantity` AS `product_Quantity`,`products`.`product_Price` AS `product_Price`,`products`.`product_Note` AS `product_Note`,`products`.`product_Availability` AS `product_Availability` from `products` order by `products`.`Product_Name` desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `change_details`
--
ALTER TABLE `change_details`
  ADD PRIMARY KEY (`change_details_id`),
  ADD KEY `new_order_details_product_id` (`new_order_details_product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `change_id` (`change_id`);

--
-- Indexes for table `change_order`
--
ALTER TABLE `change_order`
  ADD PRIMARY KEY (`change_id`),
  ADD KEY `old_product_id` (`old_product_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `client_Phone` (`client_Phone`) USING HASH;

--
-- Indexes for table `multiple_reserved`
--
ALTER TABLE `multiple_reserved`
  ADD PRIMARY KEY (`multiple_reserve_id`),
  ADD KEY `clnt` (`multiple_reserve_client_id`),
  ADD KEY `wrkr` (`multiple_reserve_worker_id`);

--
-- Indexes for table `multiple_reserved_product`
--
ALTER TABLE `multiple_reserved_product`
  ADD PRIMARY KEY (`multiple_reserve_id`,`multiple_reserve_product_id`,`quantity`,`row_id`),
  ADD KEY `prdct` (`multiple_reserve_product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reserved`
--
ALTER TABLE `reserved`
  ADD PRIMARY KEY (`reserve_id`,`reserve_product_id`),
  ADD KEY `RESERVE_CLIENT` (`reserve_client_id`),
  ADD KEY `RESERVE_PRODUCT` (`reserve_product_id`),
  ADD KEY `RESERVE_WORKER` (`reserve_worker_id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`worker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `change_details`
--
ALTER TABLE `change_details`
  MODIFY `change_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `change_order`
--
ALTER TABLE `change_order`
  MODIFY `change_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `multiple_reserved`
--
ALTER TABLE `multiple_reserved`
  MODIFY `multiple_reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `reserved`
--
ALTER TABLE `reserved`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `change_details`
--
ALTER TABLE `change_details`
  ADD CONSTRAINT `change_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `multiple_reserved` (`multiple_reserve_id`),
  ADD CONSTRAINT `change_details_ibfk_3` FOREIGN KEY (`change_id`) REFERENCES `change_order` (`change_id`);

--
-- Constraints for table `multiple_reserved`
--
ALTER TABLE `multiple_reserved`
  ADD CONSTRAINT `clnt` FOREIGN KEY (`multiple_reserve_client_id`) REFERENCES `clients` (`client_id`),
  ADD CONSTRAINT `wrkr` FOREIGN KEY (`multiple_reserve_worker_id`) REFERENCES `workers` (`worker_id`);

--
-- Constraints for table `multiple_reserved_product`
--
ALTER TABLE `multiple_reserved_product`
  ADD CONSTRAINT `prdct` FOREIGN KEY (`multiple_reserve_product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `rsrv` FOREIGN KEY (`multiple_reserve_id`) REFERENCES `multiple_reserved` (`multiple_reserve_id`);

--
-- Constraints for table `reserved`
--
ALTER TABLE `reserved`
  ADD CONSTRAINT `RESERVE_CLIENT` FOREIGN KEY (`reserve_client_id`) REFERENCES `clients` (`client_id`),
  ADD CONSTRAINT `RESERVE_PRODUCT` FOREIGN KEY (`reserve_product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `RESERVE_WORKER` FOREIGN KEY (`reserve_worker_id`) REFERENCES `workers` (`worker_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
