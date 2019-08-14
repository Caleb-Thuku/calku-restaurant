-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2019 at 12:05 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calku_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `FoodItem` varchar(256) NOT NULL,
  `Picture` varchar(256) NOT NULL,
  `Price` int(11) NOT NULL,
  `FoodID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`FoodItem`, `Picture`, `Price`, `FoodID`) VALUES
('PIZZA', 'pizza.png', 1250, 1),
('BURGER', 'burger.png', 800, 2),
('CHICKEN', 'chicken.png', 500, 3),
('NYAMACHOMA', 'nyamachoma.jpg', 600, 4),
('CHAPATI', 'chapati.jpg', 50, 5),
('CHIPS', 'chips.jpg', 100, 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `UserID`, `date_created`, `amount`, `status`) VALUES
(26590, 3, '2019-07-06 08:17:43', 200, 'pending'),
(70584, 3, '2019-07-06 08:17:37', 1500, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `unit_amount` int(11) NOT NULL,
  `description` varchar(256) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `unit_amount`, `description`, `quantity`, `date_created`, `status`) VALUES
(359305, 23092, 800, 'BURGER', 2, '2019-07-05 09:43:25', 'pending'),
(2281448, 69083, 500, 'CHICKEN', 3, '2019-07-05 12:56:28', 'pending'),
(3533706, 80651, 600, 'NYAMACHOMA', 2, '2019-07-05 12:47:18', 'pending'),
(11657162, 92550, 800, 'BURGER', 4, '2019-07-05 10:06:24', 'pending'),
(19817351, 8151, 800, 'BURGER', 1, '2019-07-05 11:45:58', 'pending'),
(24751100, 51384, 800, 'BURGER', 2, '2019-07-05 12:56:24', 'pending'),
(28250374, 66611, 1250, 'PIZZA', 6, '2019-07-05 11:07:12', 'pending'),
(34641202, 87114, 600, 'NYAMACHOMA', 1, '2019-07-05 09:43:40', 'pending'),
(35923157, 26590, 50, 'CHAPATI', 4, '2019-07-06 08:17:43', 'pending'),
(39712865, 82687, 50, 'CHAPATI', 1, '2019-07-05 10:06:34', 'pending'),
(45781678, 9927, 100, 'CHIPS', 3, '2019-07-05 10:38:32', 'pending'),
(48969297, 70584, 500, 'CHICKEN', 3, '2019-07-06 08:17:37', 'pending'),
(52569858, 8016, 500, 'CHICKEN', 2, '2019-07-05 10:08:51', 'pending'),
(56633228, 81098, 1250, 'PIZZA', 4, '2019-07-05 12:47:08', 'pending'),
(63629983, 59653, 1250, 'PIZZA', 2, '2019-07-05 10:08:48', 'pending'),
(66227648, 27827, 800, 'BURGER', 4, '2019-07-05 10:08:44', 'pending'),
(72426660, 93448, 600, 'NYAMACHOMA', 1, '2019-07-05 09:44:29', 'pending'),
(92218886, 56187, 1250, 'PIZZA', 0, '2019-07-05 11:46:01', 'pending'),
(92598160, 19, 800, 'BURGER', 4, '2019-07-05 10:38:16', 'pending'),
(99200465, 99693, 100, 'CHIPS', 3, '2019-07-05 10:06:30', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `PIZZA` varchar(256) NOT NULL,
  `PRICE` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`PIZZA`, `PRICE`) VALUES
('Pizza1', 1000),
('Pizza2', 2000),
('Pizza3', 3000),
('Pizza4', 3500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `FName` varchar(25) NOT NULL,
  `LName` varchar(25) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `UserType` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FName`, `LName`, `Username`, `Password`, `UserType`) VALUES
(1, 'Caleb', 'Nyaga', 'de_nyaga', '$2y$10$V3wksFcgIAJllOZz0zmf9.c7TUVXwyby4vmdsrDO0T10ukY02Y7fy', 'Administrator'),
(2, 'Faith', 'Muthoni', 'sonnie', '$2y$10$rD.mBHqZnB4KfbF20wf.BOESDoSsqbF9IuTYk5q95vO3NdDGFwTbK', 'Administrator'),
(3, 'Grace', 'Wachuka', 'cucu', '$2y$10$HbXgS9MslMUCbNWLjE2UGu1l6JLEqRac7FFRpGhHwCkY5Y27Ys8xi', 'Client'),
(4, 'Esther', 'Mumbi', 'mumbi', '$2y$10$1HZinqve6cq2o82t77e3ZO7jB9tvftqgVZcEV8j85VRv92sESLXvS', 'Client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`FoodID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `FoodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
