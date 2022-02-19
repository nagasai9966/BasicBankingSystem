-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 07:09 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nsbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(5) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `acc_no` int(10) NOT NULL,
  `balance` double(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `customer_name`, `acc_no`, `balance`) VALUES
(1, 'Akhilesh', 1, 31441.00),
(2, 'Mahesh', 2, 825299.99),
(3, 'Murali', 3, 25183.99),
(4, 'Umesh', 4, 220191.00),
(5, 'Vicky', 5, 158689.00),
(6, 'sanjay', 6, 90009.99),
(7, 'Rakesh', 7, 99000.99),
(8, 'sai shanker', 8, 188650.00),
(9, 'Lokesh', 9, 12001.01),
(10, 'Nag pam', 10, 29809.77);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `trans_id` int(5) NOT NULL,
  `sender` varchar(35) NOT NULL,
  `receiver` varchar(35) NOT NULL,
  `amount` double(12,2) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `sender`, `receiver`, `amount`, `time`) VALUES
(1, 'Akhilesh', 'Mahesh', 2000.00, '2022-02-19 22:34:11'),
(2, 'Mahesh', 'Vicky', 2100.00, '2022-02-19 22:36:31'),
(3, 'Akhilesh', 'Umesh', 54541.00, '2022-02-19 23:23:46'),
(4, 'Akhilesh', 'Murali', 2562.00, '2022-02-19 23:31:11'),
(5, 'Akhilesh', 'Murali', 222.00, '2022-02-19 23:33:25'),
(6, 'Akhilesh', 'Vicky', 222.00, '2022-02-19 23:37:29'),
(7, 'Akhilesh', 'Vicky', 222.00, '2022-02-19 23:37:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`trans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `trans_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
