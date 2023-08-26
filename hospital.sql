-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2023 at 05:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `birth_c`
--

CREATE TABLE `birth_c` (
  `b_id` int(8) NOT NULL,
  `name` varchar(55) NOT NULL,
  `sex` int(2) NOT NULL,
  `father` varchar(55) NOT NULL,
  `mother` varchar(55) NOT NULL,
  `address` varchar(55) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `time` varchar(15) NOT NULL,
  `nature` varchar(55) NOT NULL,
  `user` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `dr_id` int(3) NOT NULL,
  `dr_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`dr_id`, `dr_name`) VALUES
(1, 'dr.manoj'),
(2, 'dr.rasmi'),
(3, 'dr.ekbal'),
(4, 'dr.b.k'),
(5, 'dr.r.s');

-- --------------------------------------------------------

--
-- Table structure for table `hdu`
--

CREATE TABLE `hdu` (
  `hdu_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `ad_time` datetime NOT NULL,
  `ex_time` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `icu`
--

CREATE TABLE `icu` (
  `icu_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `ad_time` datetime NOT NULL,
  `ex_time` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ipd`
--

CREATE TABLE `ipd` (
  `ipd_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `ad_time` datetime NOT NULL,
  `ex_time` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nicu`
--

CREATE TABLE `nicu` (
  `nicu_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `ad_time` datetime NOT NULL,
  `ex_time` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ot`
--

CREATE TABLE `ot` (
  `ot_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `ad_time` datetime NOT NULL,
  `ex_time` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `p_id` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `p_address` varchar(55) NOT NULL,
  `p_mobile` bigint(10) NOT NULL,
  `p_sex` int(3) NOT NULL,
  `p_age` int(3) NOT NULL,
  `p_weight` int(3) NOT NULL,
  `gurdian` varchar(20) DEFAULT NULL,
  `p_bp` int(11) DEFAULT NULL,
  `p_pulse` int(11) DEFAULT NULL,
  `p_spo2` int(8) DEFAULT NULL,
  `p_temp` int(8) DEFAULT NULL,
  `p_rr` int(8) DEFAULT NULL,
  `p_ht` int(8) DEFAULT NULL,
  `p_bmi` int(8) DEFAULT NULL,
  `p_lmp` varchar(11) DEFAULT NULL,
  `p_edd` varchar(11) DEFAULT NULL,
  `doctor` int(11) NOT NULL DEFAULT 1,
  `co` varchar(20) DEFAULT NULL,
  `adv` varchar(20) DEFAULT NULL,
  `rx` varchar(20) DEFAULT NULL,
  `p_transfer` int(8) NOT NULL DEFAULT 0,
  `p_status` int(2) NOT NULL DEFAULT 1,
  `a_user` int(11) DEFAULT 0,
  `t_user` int(11) DEFAULT 0,
  `d_user` int(11) DEFAULT 0,
  `bill` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '{}',
  `discount` int(11) NOT NULL DEFAULT 0,
  `deposit` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '{}' CHECK (json_valid(`deposit`)),
  `d_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(5) NOT NULL,
  `service_name` varchar(20) NOT NULL,
  `service_price` int(10) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `type` int(8) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(8) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_password` varchar(55) NOT NULL,
  `user_type` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birth_c`
--
ALTER TABLE `birth_c`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`dr_id`);

--
-- Indexes for table `hdu`
--
ALTER TABLE `hdu`
  ADD PRIMARY KEY (`hdu_id`);

--
-- Indexes for table `icu`
--
ALTER TABLE `icu`
  ADD PRIMARY KEY (`icu_id`);

--
-- Indexes for table `ipd`
--
ALTER TABLE `ipd`
  ADD PRIMARY KEY (`ipd_id`);

--
-- Indexes for table `nicu`
--
ALTER TABLE `nicu`
  ADD PRIMARY KEY (`nicu_id`);

--
-- Indexes for table `ot`
--
ALTER TABLE `ot`
  ADD PRIMARY KEY (`ot_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `birth_c`
--
ALTER TABLE `birth_c`
  MODIFY `b_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `dr_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hdu`
--
ALTER TABLE `hdu`
  MODIFY `hdu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `icu`
--
ALTER TABLE `icu`
  MODIFY `icu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ipd`
--
ALTER TABLE `ipd`
  MODIFY `ipd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nicu`
--
ALTER TABLE `nicu`
  MODIFY `nicu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ot`
--
ALTER TABLE `ot`
  MODIFY `ot_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
