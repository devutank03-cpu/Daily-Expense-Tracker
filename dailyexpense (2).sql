-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2013 at 02:25 AM
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
-- Database: `dailyexpense`
--

-- --------------------------------------------------------

--
-- Table structure for table `expensecategory`
--

CREATE TABLE `expensecategory` (
  `category_id` int(20) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expensecategory`
--

INSERT INTO `expensecategory` (`category_id`, `category_name`) VALUES
(1, 'MEDICINE'),
(2, 'FOOD'),
(3, 'BILL & RECHARGES'),
(4, 'ENTERTAINMENT'),
(5, 'CLOTHEING'),
(6, 'RENT'),
(7, 'HOUSE HOLD ITEMS'),
(8, 'MOVIE'),
(9, 'OTHER');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` int(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `expense` int(20) NOT NULL,
  `expensedate` varchar(15) NOT NULL,
  `expensecategory` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `user_id`, `expense`, `expensedate`, `expensecategory`) VALUES
(1, '3', 100, '2013-07-02', 'MEDICINE'),
(2, '3', 200, '2013-07-02', 'MEDICINE'),
(3, '3', 200, '2013-07-02', 'MEDICINE'),
(4, '3', 200, '2013-07-02', 'MEDICINE'),
(5, '3', 100, '2013-07-02', 'MEDICINE'),
(6, '3', 100, '2013-07-01', 'FOOD'),
(7, '4', 200, '2013-07-02', 'MEDICINE'),
(8, '4', 1000, '2013-07-01', 'MEDICINE'),
(9, '7', 100, '2013-07-02', 'MEDICINE'),
(10, '8', 3000, '2013-07-02', 'FOOD'),
(11, '8', 5000, '2013-05-08', 'BILL & RECHARGES'),
(12, '8', 6000, '2012-09-02', 'HOUSE HOLD ITEMS'),
(13, '8', 500000, '2013-07-01', 'FOOD'),
(14, '9', 100, '2013-07-02', 'CLOTHEING'),
(16, '9', 800, '2013-07-02', 'MOVIE'),
(17, '9', 500, '2013-07-02', 'RENT'),
(18, '9', 1200, '2013-07-01', 'MOVIE'),
(20, '11', 500, '2013-07-02', 'ENTERTAINMENT'),
(21, '11', 6000, '2013-07-02', 'BILL & RECHARGES'),
(22, '11', 100, '2013-07-01', 'RENT'),
(23, '11', 300, '2013-07-02', 'MEDICINE'),
(24, '11', 120, '2013-07-02', 'BILL & RECHARGES'),
(25, '11', 10, '2013-07-01', 'OTHER');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`) VALUES
(10, 'Dora', 'Dora', 'dora@gmail.com', 0),
(11, 'devang', 'tank', 'devang@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
