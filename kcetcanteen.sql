-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2022 at 05:25 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kcetcanteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `item_name` varchar(20) NOT NULL,
  `price` int(10) NOT NULL,
  `Include` int(11) NOT NULL DEFAULT 0,
  `image` varchar(200) NOT NULL,
  `stock` int(100) NOT NULL,
  `description` varchar(50) NOT NULL,
  `cat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`item_name`, `price`, `Include`, `image`, `stock`, `description`, `cat`) VALUES
('Chicken Noodles', 80, 1, 'Chicken-Hakka-Noodles-.jpg', 20, '', 'Lunch'),
('Dosa', 40, 1, 'DOSA.jpg', 20, '', 'Breakfast'),
('Ice cream', 30, 1, 'ICE CREAM.jpg', 20, '', 'Evening'),
('Idly', 30, 1, 'Idly2.jpg', 20, '', 'Breakfast'),
('Meal', 60, 1, 'MEAL.jpg', 20, '', 'Lunch'),
('Medu vada', 6, 1, 'medu vada.JPG', 20, '', 'Snacks Time'),
('Mountain dew', 20, 1, 'mountain dew.jpg', 20, '', 'Snacks Time'),
('Noodles', 50, 1, 'noodles.jpg', 20, '', 'Lunch'),
('Snacks', 10, 1, 'SNACKS.jpg', 20, '', 'Evening'),
('Soft Drinks', 20, 1, 'soft-drinks-500x500.jpg', 20, '', 'Evening'),
('Somas', 10, 1, 'somas.jpg', 20, '', 'Snacks Time'),
('Tea', 10, 1, 'tea 2.jpg', 20, '', 'Snacks Time'),
('Thakkali sadham', 40, 1, 'thakkali.jpg', 20, '', 'Lunch'),
('Ven Pongal', 40, 1, 'Ven-Pongal.JPG', 20, '', 'Breakfast');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `username` varchar(20) NOT NULL,
  `item_name` varchar(10) NOT NULL,
  `item_qty` int(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` tinyint(1) NOT NULL DEFAULT 0,
  `Order_id` int(11) NOT NULL,
  `d_address` varchar(30) NOT NULL,
  `location` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`username`, `item_name`, `item_qty`, `timestamp`, `Status`, `Order_id`, `d_address`, `location`) VALUES
('19ucse011', 'paniyaram', 1, '2022-05-26 06:53:22', 0, 1, '', 'canteen'),
('19ucse011', 'paniyaram', 2, '2022-05-26 06:53:40', 0, 2, '', 'home'),
('19ucse011', 'paniyaram', 2, '2022-05-26 06:54:06', 0, 3, '', 'canteen'),
('19ucse019', 'dosa', 2, '2022-05-26 07:21:29', 0, 4, '', 'canteen'),
('19ucse019', 'dosa', 1, '2022-05-26 07:21:50', 0, 5, '', 'home'),
('19ucse019', 'dosa', 2, '2022-05-26 15:38:18', 0, 6, '', 'home'),
('19ucse019', 'dosa', 1, '2022-05-26 15:39:08', 0, 7, '', 'canteen'),
('19ucse019', 'gvhgvg', 4, '2022-05-26 15:45:39', 0, 8, '', 'canteen');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `name`, `comment`) VALUES
(1, '19ucse019', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `credit_amount` int(20) NOT NULL DEFAULT 0,
  `username2` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `type`, `credit_amount`, `username2`) VALUES
('admin', 'admin', 1, 0, ''),
('Admin', 'Admin', 1, 0, 'admin2'),
('19ucse011', '1234', 0, 500, 'Dinesh'),
('19ucse019', '1234', 0, 920, 'yogesh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
