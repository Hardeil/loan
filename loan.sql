-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 05:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loan`
--

-- --------------------------------------------------------

--
-- Table structure for table `reg_tbl`
--

CREATE TABLE `reg_tbl` (
  `reg_id` int(100) NOT NULL,
  `reg_type` varchar(100) NOT NULL,
  `reg_add` varchar(100) NOT NULL,
  `reg_gend` varchar(100) NOT NULL,
  `reg_age` int(100) NOT NULL,
  `reg_email` varchar(100) NOT NULL,
  `reg_contact` varchar(100) NOT NULL,
  `reg_bankName` varchar(100) NOT NULL,
  `reg_bankAcc` varchar(100) NOT NULL,
  `reg_cardName` varchar(100) NOT NULL,
  `reg_tinNum` varchar(100) NOT NULL,
  `reg_companyName` varchar(100) NOT NULL,
  `reg_password` varchar(100) NOT NULL,
  `reg_companyAdd` varchar(100) NOT NULL,
  `reg_ompanyCon` int(100) NOT NULL,
  `reg_position` varchar(100) NOT NULL,
  `reg_monthly` int(100) NOT NULL,
  `reg_proofBil` varchar(100) NOT NULL,
  `reg_validId` varchar(100) NOT NULL,
  `reg_coe` varchar(100) NOT NULL,
  `reg_status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg_tbl`
--

INSERT INTO `reg_tbl` (`reg_id`, `reg_type`, `reg_add`, `reg_gend`, `reg_age`, `reg_email`, `reg_contact`, `reg_bankName`, `reg_bankAcc`, `reg_cardName`, `reg_tinNum`, `reg_companyName`, `reg_password`, `reg_companyAdd`, `reg_ompanyCon`, `reg_position`, `reg_monthly`, `reg_proofBil`, `reg_validId`, `reg_coe`, `reg_status`) VALUES
(1, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', 0, '', '', '', 0),
(2, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', 0, 'WPS.PNG', 'WPS.PNG', 'Screenshot 2024-03-20 124135.png', 0),
(3, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', 0, '', '', '', 0),
(4, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', 0, '', '', '', 0),
(5, 'sadd', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', 0, '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reg_tbl`
--
ALTER TABLE `reg_tbl`
  ADD PRIMARY KEY (`reg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reg_tbl`
--
ALTER TABLE `reg_tbl`
  MODIFY `reg_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
