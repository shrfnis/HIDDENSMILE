-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2022 at 06:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hiddensmiledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_ID` varchar(15) NOT NULL,
  `admin_Name` varchar(45) NOT NULL,
  `admin_Email` varchar(45) NOT NULL,
  `admin_PhoneNo` varchar(15) NOT NULL,
  `admin_Password` varchar(100) NOT NULL,
  `admin_Img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_ID`, `admin_Name`, `admin_Email`, `admin_PhoneNo`, `admin_Password`, `admin_Img`) VALUES
('admin1', 'Harith Irfan', 'admin@gmail.com', '011-1518168', '2e33a9b0b06aa0a01ede70995674ee23', 'ProfilePic.png'),
('admin2', 'Kita1', 'kita@gmail.com', '011-12314155', '21eed4f2e9ab214fdbf00a2a091d63c4', 'NULL.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_ID` int(11) NOT NULL,
  `cust_ID` varchar(45) NOT NULL,
  `shipping_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_ID`, `cust_ID`, `shipping_ID`) VALUES
(266, 'cust1', 1),
(267, 'azeze', 1),
(271, 'guest62dbea3c58fa1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cartdetails`
--

CREATE TABLE `cartdetails` (
  `cart_DetailsID` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `cart_ID` int(11) NOT NULL,
  `item_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cartdetails`
--

INSERT INTO `cartdetails` (`cart_DetailsID`, `Qty`, `cart_ID`, `item_ID`) VALUES
(249, 1, 266, 58),
(250, 1, 266, 12),
(251, 1, 266, 6),
(254, 1, 267, 22),
(255, 3, 267, 14);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_ID` varchar(45) NOT NULL,
  `cust_Name` varchar(45) NOT NULL,
  `cust_Email` varchar(45) NOT NULL,
  `cust_PhoneNo` varchar(15) NOT NULL,
  `cust_Password` varchar(100) NOT NULL,
  `addr1` varchar(70) NOT NULL,
  `addr2` varchar(70) DEFAULT NULL,
  `postcode` char(5) NOT NULL,
  `city` varchar(45) NOT NULL,
  `state` varchar(45) NOT NULL,
  `acc_Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_ID`, `cust_Name`, `cust_Email`, `cust_PhoneNo`, `cust_Password`, `addr1`, `addr2`, `postcode`, `city`, `state`, `acc_Status`) VALUES
('azeze', 'azeze', 'azeze@gmail', '011-15181685', '6cafa00dc9a0107b8bc31654cc6f8cb8', '10-A-3 JALAN AMANIAH MULIA 3 TAMAN AMANIAH MULIA', '', '68100', 'BATU CAVES', 'Selangor', 'Active'),
('cust1', 'Harith', 'harith@gmail.com', '012-02398135', 'becfb907888c8d48f8328dba7edf6969', '', NULL, '', '', '', ''),
('cust2', 'Aiqal', 'aiqal@gmail.com', '013-412423', '0b0216b290922f789dd3efd0926d898e', '', NULL, '', '', '', ''),
('cust3', 'Hanis', 'hanis@gmail.com', '014-2352351', '2c988de9d49d47c78f9f1588a1f99934', '', NULL, '', '', '', ''),
('cust4', 'Anis', 'anis@gmail.com', '017-87623714', 'b7ca9bb43a9387d6f16cd7b93a7e5fb0', '', NULL, '', '', '', ''),
('cust5', 'Bella', 'bella@gmail.com', '011-2414514', 'd4fe80f5b9c74f498f3ba02bccafbd73', '', NULL, '', '', '', ''),
('guest62dbe7a4713b6', 'Mimi', 'mimi@gmail.com', '014-211234123', '', 'TAMAN BUNGA MEKAR', 'JALAN BUNGA LAYU', '78520', 'BATU KIL', 'Johor', 'Active'),
('guest62dbea3c58fa1', 'Ahmad', 'ahmad@gmail.com', '013-12312415', '', 'TAMAN BUNGA CEMPEDAK', 'JALAN CEMPAKA', '89100', 'BUAH JAMBU', 'Kedah', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_ID` int(11) NOT NULL,
  `item_Type` varchar(45) NOT NULL,
  `loop_Type` varchar(15) NOT NULL,
  `itemQtyInStock` int(11) NOT NULL,
  `retail_Price` decimal(11,2) NOT NULL,
  `selling_Price` decimal(11,2) NOT NULL,
  `item_Name` varchar(45) DEFAULT NULL,
  `categories` varchar(6) DEFAULT NULL,
  `item_Status` varchar(15) NOT NULL,
  `item_Img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_ID`, `item_Type`, `loop_Type`, `itemQtyInStock`, `retail_Price`, `selling_Price`, `item_Name`, `categories`, `item_Status`, `item_Img`) VALUES
(1, 'Cloth Mask', 'Earloop', 200, '12.00', '15.00', 'Clarissa', 'Adults', 'Instock', '9.png'),
(2, 'Cloth Mask', 'Earloop', 200, '12.00', '15.00', 'Perdita', 'Adults', 'Instock', '10.png'),
(3, 'Cloth Mask', 'Earloop', 200, '12.00', '15.00', 'Theodara', 'Adults', 'Instock', '11.png'),
(4, 'Cloth Mask', 'Earloop', 200, '12.00', '15.00', 'Marshall', 'Adults', 'Instock', '12.png'),
(5, 'Cloth Mask', 'Earloop', 200, '12.00', '15.00', 'Pandora', 'Adults', 'Instock', '13.png'),
(6, 'Cloth Mask', 'Headloop', 200, '16.00', '19.00', 'Clarissa', 'Adults', 'Instock', '9.png'),
(7, 'Cloth Mask', 'Headloop', 200, '16.00', '19.00', 'Perdita', 'Adults', 'Instock', '10.png'),
(8, 'Cloth Mask', 'Headloop', 200, '16.00', '19.00', 'Theodara', 'Adults', 'Instock', '11.png'),
(9, 'Cloth Mask', 'Headloop', 200, '16.00', '19.00', 'Marshall', 'Adults', 'Instock', '12.png'),
(10, 'Cloth Mask', 'Headloop', 200, '16.00', '19.00', 'Pandora', 'Adults', 'Instock', '13.png'),
(11, 'Cloth Mask With Filter', 'Earloop', 200, '17.00', '20.00', 'Mamba', 'Adults', 'Instock', 'mamba.png'),
(12, 'Cloth Mask With Filter', 'Headloop', 200, '21.00', '24.00', 'Mamba', 'Adults', 'Instock', 'mamba.png'),
(13, 'T-shirt Face Mask', 'Earloop', 200, '12.00', '15.00', 'Pitch', 'Adults', 'Instock', 'c1.png'),
(14, 'T-shirt Face Mask', 'Headloop', 200, '16.00', '19.00', 'Pitch', 'Adults', 'Instock', 'c1.png'),
(15, 'Disposable Face Mask', 'Earloop', 200, '22.00', '25.00', 'Ice Blue', 'Adults', 'Instock', 'd1.png'),
(16, 'Disposable Face Mask', 'Earloop', 200, '22.00', '25.00', 'Buttermilk', 'Adults', 'Instock', 'd2.png'),
(17, 'Disposable Face Mask', 'Earloop', 200, '22.00', '25.00', 'Taffy', 'Adults', 'Instock', 'd3.png'),
(18, 'Disposable Face Mask', 'Earloop', 200, '22.00', '25.00', 'Sacramento', 'Adults', 'Instock', 'd4.png'),
(19, 'Disposable Face Mask', 'Earloop', 200, '22.00', '25.00', 'Chinoise Green', 'Adults', 'Instock', 'd5.png'),
(20, 'Disposable Face Mask', 'Earloop', 200, '22.00', '25.00', 'Juniper', 'Adults', 'Instock', 'd6.png'),
(21, 'Disposable Face Mask', 'Earloop', 200, '22.00', '25.00', 'Jet Black', 'Adults', 'Instock', 'd7.png'),
(22, 'Disposable Face Mask', 'Headloop', 200, '26.00', '29.00', 'Ice Blue', 'Adults', 'Instock', 'd1.png'),
(23, 'Disposable Face Mask', 'Headloop', 200, '26.00', '29.00', 'Buttermilk', 'Adults', 'Instock', 'd2.png'),
(24, 'Disposable Face Mask', 'Headloop', 200, '26.00', '29.00', 'Taffy', 'Adults', 'Instock', 'd3.png'),
(25, 'Disposable Face Mask', 'Headloop', 200, '26.00', '29.00', 'Sacramento', 'Adults', 'Instock', 'd4.png'),
(26, 'Disposable Face Mask', 'Headloop', 200, '26.00', '29.00', 'Chinoise Green', 'Adults', 'Instock', 'd5.png'),
(27, 'Disposable Face Mask', 'Headloop', 200, '26.00', '29.00', 'Juniper', 'Adults', 'Instock', 'd6.png'),
(28, 'Disposable Face Mask', 'Headloop', 200, '26.00', '29.00', 'Jet Black', 'Adults', 'Instock', 'd7.png'),
(29, 'KF94 Face Mask', 'Earloop', 200, '22.00', '25.00', 'Heavenly Pink', 'Adults', 'Instock', 'kf1.png'),
(30, 'KF94 Face Mask', 'Earloop', 200, '22.00', '25.00', 'Cathedral Gray', 'Adults', 'Instock', 'kf4.png'),
(31, 'KF94 Face Mask', 'Earloop', 200, '22.00', '25.00', 'Biscotti', 'Adults', 'Instock', 'kf3.png'),
(32, 'KF94 Face Mask', 'Earloop', 200, '22.00', '25.00', 'Bud Green', 'Adults', 'Instock', 'kf2.png'),
(33, 'KF94 Face Mask', 'Earloop', 200, '22.00', '25.00', 'Imperial Blue', 'Adults', 'Instock', 'kf5.png'),
(34, 'KF94 Face Mask', 'Earloop', 200, '22.00', '25.00', 'Glacial Green', 'Adults', 'Instock', 'kf7.png'),
(35, 'KF94 Face Mask', 'Earloop', 200, '22.00', '25.00', 'Periwinkle', 'Adults', 'Instock', 'kf6.png'),
(36, 'KF94 Face Mask', 'Earloop', 200, '22.00', '25.00', 'Cloud White', 'Adults', 'Instock', 'kf8.png'),
(37, 'KF94 Face Mask', 'Earloop', 200, '22.00', '25.00', 'Jade', 'Adults', 'Instock', 'kf9.png'),
(38, 'KF94 Face Mask', 'Headloop', 200, '26.00', '29.00', 'Heavenly Pink', 'Adults', 'Instock', 'kf1.png'),
(39, 'KF94 Face Mask', 'Headloop', 200, '26.00', '29.00', 'Cathedral Gray', 'Adults', 'Instock', 'kf4.png'),
(40, 'KF94 Face Mask', 'Headloop', 200, '26.00', '29.00', 'Biscotti', 'Adults', 'Instock', 'kf3.png'),
(41, 'KF94 Face Mask', 'Headloop', 200, '26.00', '29.00', 'Bud Green', 'Adults', 'Instock', 'kf2.png'),
(42, 'KF94 Face Mask', 'Headloop', 200, '26.00', '29.00', 'Imperial Blue', 'Adults', 'Instock', 'kf5.png'),
(43, 'KF94 Face Mask', 'Headloop', 200, '26.00', '29.00', 'Glacial Green', 'Adults', 'Instock', 'kf7.png'),
(44, 'KF94 Face Mask', 'Headloop', 200, '26.00', '29.00', 'Periwinkle', 'Adults', 'Instock', 'kf6.png'),
(45, 'KF94 Face Mask', 'Headloop', 200, '26.00', '29.00', 'Cloud White', 'Adults', 'Instock', 'kf8.png'),
(46, 'KF94 Face Mask', 'Headloop', 200, '26.00', '29.00', 'Jade', 'Adults', 'Instock', 'kf9.png'),
(47, 'Cloth Mask', 'Earloop', 200, '9.00', '12.00', 'Octavia', 'Kids', 'Instock', '14.png'),
(48, 'Cloth Mask', 'Earloop', 200, '9.00', '12.00', 'Miranda', 'Kids', 'Instock', '15.png'),
(49, 'Cloth Mask', 'Earloop', 200, '9.00', '12.00', 'Cammilla', 'Kids', 'Instock', '16.png'),
(50, 'Cloth Mask', 'Earloop', 200, '9.00', '12.00', 'Xanthe', 'Kids', 'Instock', '17.png'),
(51, 'Cloth Mask', 'Earloop', 200, '9.00', '12.00', 'Bexon', 'Kids', 'Instock', '18.png'),
(52, 'Cloth Mask', 'Headloop', 200, '13.00', '16.00', 'Octavia', 'Kids', 'Instock', '14.png'),
(53, 'Cloth Mask', 'Headloop', 200, '13.00', '16.00', 'Miranda', 'Kids', 'Instock', '15.png'),
(54, 'Cloth Mask', 'Headloop', 200, '13.00', '16.00', 'Cammilla', 'Kids', 'Instock', '16.png'),
(55, 'Cloth Mask', 'Headloop', 200, '13.00', '16.00', 'Xanthe', 'Kids', 'Instock', '17.png'),
(56, 'Cloth Mask', 'Headloop', 200, '13.00', '16.00', 'Bexon', 'Kids', 'Instock', '18.png'),
(57, 'Cloth Mask With Filter', 'Earloop', 200, '13.00', '16.00', 'Diego', 'Kids', 'Instock', 'diego.png'),
(58, 'Cloth Mask With Filter', 'Headloop', 200, '16.00', '20.00', 'Diego', 'Kids', 'Instock', 'diego.png'),
(59, 'T-shirt Face Mask', 'Earloop', 200, '7.00', '10.00', 'Grease', 'Kids', 'Instock', 'c2.png'),
(60, 'T-shirt Face Mask', 'Headloop', 200, '11.00', '14.00', 'Grease', 'Kids', 'Instock', 'c2.png'),
(61, 'Disposable Face Mask', 'Earloop', 200, '12.00', '15.00', 'Fabian', 'Kids', 'Instock', '32.png'),
(62, 'Disposable Face Mask', 'Earloop', 200, '12.00', '15.00', 'Chaunsey', 'Kids', 'Instock', '33.png'),
(63, 'Disposable Face Mask', 'Earloop', 200, '12.00', '15.00', 'Calla Lily', 'Kids', 'Instock', '34.png'),
(64, 'Disposable Face Mask', 'Earloop', 200, '12.00', '15.00', 'Dashiell', 'Kids', 'Instock', '35.png'),
(65, 'Disposable Face Mask', 'Earloop', 200, '12.00', '15.00', 'Leonara', 'Kids', 'Instock', '36.png'),
(66, 'Disposable Face Mask', 'Earloop', 200, '12.00', '15.00', 'Calvin', 'Kids', 'Instock', '38.png'),
(67, 'Disposable Face Mask', 'Earloop', 200, '12.00', '15.00', 'Busybee', 'Kids', 'Instock', '37.png'),
(68, 'Disposable Face Mask', 'Headloop', 200, '16.00', '19.00', 'Fabian', 'Kids', 'Instock', '32.png'),
(69, 'Disposable Face Mask', 'Headloop', 200, '16.00', '19.00', 'Chaunsey', 'Kids', 'Instock', '33.png'),
(70, 'Disposable Face Mask', 'Headloop', 200, '16.00', '19.00', 'Calla Lily', 'Kids', 'Instock', '34.png'),
(71, 'Disposable Face Mask', 'Headloop', 200, '16.00', '19.00', 'Dashiell', 'Kids', 'Instock', '35.png'),
(72, 'Disposable Face Mask', 'Headloop', 200, '16.00', '19.00', 'Leonara', 'Kids', 'Instock', '36.png'),
(73, 'Disposable Face Mask', 'Headloop', 200, '16.00', '19.00', 'Calvin', 'Kids', 'Instock', '38.png'),
(74, 'Disposable Face Mask', 'Headloop', 200, '16.00', '19.00', 'Busybee', 'Kids', 'Instock', '37.png'),
(75, 'KF94 Face Mask', 'Earloop', 200, '12.00', '15.00', 'Kylie', 'Kids', 'Instock', 'a.png'),
(76, 'KF94 Face Mask', 'Earloop', 200, '12.00', '15.00', 'Koya', 'Kids', 'Instock', 'b.png'),
(77, 'KF94 Face Mask', 'Earloop', 200, '12.00', '15.00', 'Patrick', 'Kids', 'Instock', 'c.png'),
(78, 'KF94 Face Mask', 'Earloop', 200, '12.00', '15.00', 'Oliver', 'Kids', 'Instock', 'd.png'),
(79, 'KF94 Face Mask', 'Earloop', 200, '12.00', '15.00', 'Magical', 'Kids', 'Instock', 'e.png'),
(80, 'KF94 Face Mask', 'Earloop', 200, '12.00', '15.00', 'Jumbo', 'Kids', 'Instock', 'f.png'),
(81, 'KF94 Face Mask', 'Earloop', 200, '12.00', '15.00', 'Madagascar', 'Kids', 'Instock', 'g.png'),
(82, 'KF94 Face Mask', 'Headloop', 200, '16.00', '19.00', 'Kylie', 'Kids', 'Instock', 'a.png'),
(83, 'KF94 Face Mask', 'Headloop', 200, '16.00', '19.00', 'Koya', 'Kids', 'Instock', 'b.png'),
(84, 'KF94 Face Mask', 'Headloop', 200, '16.00', '19.00', 'Patrick', 'Kids', 'Instock', 'c.png'),
(85, 'KF94 Face Mask', 'Headloop', 200, '16.00', '19.00', 'Oliver', 'Kids', 'Instock', 'd.png'),
(86, 'KF94 Face Mask', 'Headloop', 200, '16.00', '19.00', 'Magical', 'Kids', 'Instock', 'e.png'),
(87, 'KF94 Face Mask', 'Headloop', 200, '16.00', '19.00', 'Jumbo', 'Kids', 'Instock', 'f.png'),
(88, 'KF94 Face Mask', 'Headloop', 200, '16.00', '19.00', 'Madagascar', 'Kids', 'Instock', 'g.png');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_DetailsID` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `order_ID` int(11) NOT NULL,
  `item_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`order_DetailsID`, `Qty`, `order_ID`, `item_ID`) VALUES
(110, 1, 116, 7),
(111, 1, 116, 12),
(112, 1, 117, 12),
(113, 3, 117, 1),
(114, 2, 117, 14),
(115, 3, 117, 22),
(116, 1, 117, 38),
(117, 1, 118, 6),
(118, 3, 118, 48),
(119, 2, 118, 58),
(120, 3, 118, 60),
(121, 3, 118, 68),
(122, 2, 118, 76),
(123, 1, 119, 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_ID` int(11) NOT NULL,
  `order_Date` date NOT NULL,
  `cust_ID` varchar(45) NOT NULL,
  `order_Status` varchar(25) NOT NULL,
  `shipping_ID` int(11) DEFAULT NULL,
  `order_Comment` varchar(200) DEFAULT NULL,
  `payment_Status` varchar(15) DEFAULT NULL,
  `admin_ID` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_ID`, `order_Date`, `cust_ID`, `order_Status`, `shipping_ID`, `order_Comment`, `payment_Status`, `admin_ID`) VALUES
(116, '2022-07-23', 'azeze', 'Processing', 1, 'ikat tepi', 'Unpaid', 'admin1'),
(117, '2022-07-23', 'guest62dbe7a4713b6', 'Processing', 2, 'taknak sayur', 'Paid', 'admin1'),
(118, '2022-07-23', 'guest62dbe7a4713b6', 'Completed', 1, '', 'Paid', 'admin2'),
(119, '2022-07-23', 'guest62dbea3c58fa1', 'Cancelled', 1, '', 'Unpaid', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_ID` int(11) NOT NULL,
  `location` varchar(15) NOT NULL,
  `shipping_Subtotal` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_ID`, `location`, `shipping_Subtotal`) VALUES
(1, 'West Malaysia', '5.00'),
(2, 'East Malaysia', '10.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_ID`),
  ADD KEY `shipping_ID` (`shipping_ID`),
  ADD KEY `cart_ibfk_1` (`cust_ID`);

--
-- Indexes for table `cartdetails`
--
ALTER TABLE `cartdetails`
  ADD PRIMARY KEY (`cart_DetailsID`),
  ADD KEY `cart_ID` (`cart_ID`),
  ADD KEY `item_ID` (`item_ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_ID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_ID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_DetailsID`),
  ADD KEY `order_ID` (`order_ID`),
  ADD KEY `item_ID` (`item_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `cust_ID` (`cust_ID`),
  ADD KEY `shipping_ID` (`shipping_ID`),
  ADD KEY `admin_ID` (`admin_ID`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `cartdetails`
--
ALTER TABLE `cartdetails`
  MODIFY `cart_DetailsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `order_DetailsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`cust_ID`) REFERENCES `customers` (`cust_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`shipping_ID`) REFERENCES `shipping` (`shipping_ID`);

--
-- Constraints for table `cartdetails`
--
ALTER TABLE `cartdetails`
  ADD CONSTRAINT `cartdetails_ibfk_1` FOREIGN KEY (`cart_ID`) REFERENCES `cart` (`cart_ID`),
  ADD CONSTRAINT `cartdetails_ibfk_2` FOREIGN KEY (`item_ID`) REFERENCES `items` (`item_ID`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `order_ID` FOREIGN KEY (`order_ID`) REFERENCES `orders` (`order_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`item_ID`) REFERENCES `items` (`item_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `cust_ID` FOREIGN KEY (`cust_ID`) REFERENCES `customers` (`cust_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`shipping_ID`) REFERENCES `shipping` (`shipping_ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`admin_ID`) REFERENCES `admins` (`admin_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
