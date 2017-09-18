-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 18, 2017 at 10:53 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `angular_demo_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `pro_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `pro_name`) VALUES
(1, 'Ontario'),
(2, 'Québec'),
(3, 'Nova Scotia'),
(4, 'New Brunswick'),
(5, 'Manitoba'),
(6, 'British Columbia'),
(7, 'Prince Edward Island'),
(8, 'Saskatchewan'),
(9, 'Alberta'),
(10, 'Newfoundland and Labrador'),
(11, 'Northwest Territories'),
(12, 'Yukon'),
(13, 'Nunavut');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `telephone` varchar(20) NOT NULL,
  `postal_code` varchar(7) NOT NULL,
  `salary` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `province_id`, `telephone`, `postal_code`, `salary`) VALUES
(1, 'Smith', 4, '343-243-5433', 'M3W 4H4', '90000.00'),
(2, 'Karla', 3, '243-545-2345', 'M3G 6K9', '75000.00'),
(3, 'David', 8, '245-643-2345', 'K4T 2T5', '50000.00'),
(4, 'Nency', 7, '246-675-7856', 'G8F 3G6', '24000.00'),
(5, 'Marry', 12, '875-356-3456', 'M2R 5G4', '46000.00'),
(6, 'Boby', 10, '245-644-6576', 'M5D 8S0', '98000.00'),
(7, 'DEBORAH', 5, '643-546-5635', 'O4H 4H4', '84000.00'),
(8, 'JOOLY', 13, '244-243-2343', 'M2J 4J5', '65000.00'),
(9, 'Aaric', 13, '246-464-2435', 'M3M 5J0', '76000.00'),
(10, 'Aiyana', 1, '647-453-2335', 'M9F 8D0', '88000.00'),
(11, 'Pacey', 11, '546-345-2435', 'D9O 9D0', '85000.00'),
(12, 'Jacinto', 5, '345-234-5464', 'M8F 0F8', '93409.00'),
(13, 'Kaden', 2, '453-644-2345', 'M3D 5F3', '75656.00'),
(14, 'Sabrina', 7, '345-643-6453', 'D9S 4D5', '54433.00'),
(15, 'Panthea', 4, '344-353-5323', 'M3K 3K6', '98090.00'),
(16, 'Paola', 1, '435-543-2343', 'F9S 4J4', '98000.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);
