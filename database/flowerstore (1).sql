-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2022 at 04:04 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flowerstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `color_id` int(50) NOT NULL,
  `colorName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `colorName`) VALUES
(1, 'đỏ'),
(2, 'xanh'),
(3, 'vàng'),
(4, 'tím');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(50) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sexual` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emolyee`
--

CREATE TABLE `emolyee` (
  `employee_id` int(50) NOT NULL,
  `employeeName` varchar(500) DEFAULT NULL,
  `phoneNumber` varchar(500) DEFAULT NULL,
  `userName` varchar(500) DEFAULT NULL,
  `passWord` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `flower`
--

CREATE TABLE `flower` (
  `flower_id` int(11) NOT NULL,
  `flowerName` varchar(500) NOT NULL,
  `colorID` int(50) NOT NULL,
  `unit` int(50) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `available` int(50) DEFAULT NULL,
  `flowerPicture` varchar(500) NOT NULL,
  `typeflower_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flower`
--

INSERT INTO `flower` (`flower_id`, `flowerName`, `colorID`, `unit`, `price`, `available`, `flowerPicture`, `typeflower_id`) VALUES
(16, 'Hoa Lan Hồ Điệp                                        ', 3, 80, 3000000, 150, 'uploads/20220411094848lan-ho-diep-vang-30.png', 1),
(17, '     Hoa Hồng Bó                          ', 1, 50, 50000, 150, 'uploads/20220411100804hoahongbo.png', 2),
(18, 'Tình mơ – hoa sinh nhật                                                ', 1, 50, 420000, 230, 'uploads/20220411101310hoahongtinhmo.jpg', 2),
(19, 'Hoa sinh nhật – thiên đường tình yêu', 4, 50, 1280000, 250, 'uploads/20220411101310hoahongtinhmo.jpg', 1),
(21, 'Hoa sinh nhật – Tình em đại dương                                               ', 1, 50, 500000, 150, 'uploads/20220411115322B30-4340d__17269.1417291838.500.500.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `oder`
--

CREATE TABLE `oder` (
  `oder_id` int(11) NOT NULL,
  `employee_id` int(50) NOT NULL,
  `customer_id` int(50) NOT NULL,
  `createDay` date NOT NULL,
  `total` double NOT NULL,
  `customerName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `oderdetail`
--

CREATE TABLE `oderdetail` (
  `flower_id` int(50) NOT NULL,
  `oder_id` int(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `unitPice` double NOT NULL,
  `detail_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `typeofflower`
--

CREATE TABLE `typeofflower` (
  `typeflower_id` int(50) NOT NULL,
  `typeName` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typeofflower`
--

INSERT INTO `typeofflower` (`typeflower_id`, `typeName`) VALUES
(1, 'Hoa Lan'),
(2, 'Hoa Hồng'),
(3, 'Cẩm chướng'),
(4, 'Tulip');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `emolyee`
--
ALTER TABLE `emolyee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `flower`
--
ALTER TABLE `flower`
  ADD PRIMARY KEY (`flower_id`),
  ADD KEY `flower_colorid` (`colorID`),
  ADD KEY `typeflower` (`typeflower_id`);

--
-- Indexes for table `oder`
--
ALTER TABLE `oder`
  ADD PRIMARY KEY (`oder_id`),
  ADD KEY `employee_id` (`employee_id`,`customer_id`),
  ADD KEY `custom_employee` (`customer_id`);

--
-- Indexes for table `oderdetail`
--
ALTER TABLE `oderdetail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `detail_floid` (`flower_id`),
  ADD KEY `details_oder` (`oder_id`);

--
-- Indexes for table `typeofflower`
--
ALTER TABLE `typeofflower`
  ADD PRIMARY KEY (`typeflower_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emolyee`
--
ALTER TABLE `emolyee`
  MODIFY `employee_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flower`
--
ALTER TABLE `flower`
  MODIFY `flower_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `oder`
--
ALTER TABLE `oder`
  MODIFY `oder_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oderdetail`
--
ALTER TABLE `oderdetail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `typeofflower`
--
ALTER TABLE `typeofflower`
  MODIFY `typeflower_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flower`
--
ALTER TABLE `flower`
  ADD CONSTRAINT `flower_colorid` FOREIGN KEY (`colorID`) REFERENCES `color` (`color_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `typeflower` FOREIGN KEY (`typeflower_id`) REFERENCES `typeofflower` (`typeflower_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `oder`
--
ALTER TABLE `oder`
  ADD CONSTRAINT `custom_employee` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `oder_employ` FOREIGN KEY (`employee_id`) REFERENCES `emolyee` (`employee_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `oderdetail`
--
ALTER TABLE `oderdetail`
  ADD CONSTRAINT `detail_floid` FOREIGN KEY (`flower_id`) REFERENCES `flower` (`flower_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `details_oder` FOREIGN KEY (`oder_id`) REFERENCES `oder` (`oder_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
