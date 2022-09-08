-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2022 at 07:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_admin`
--

CREATE TABLE `db_admin` (
  `ID_Admin` int(8) NOT NULL,
  `FN_Admin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LN_Admin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PHONE_Admin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `USERNAME_Admin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PASS_Admin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `db_admin`
--

INSERT INTO `db_admin` (`ID_Admin`, `FN_Admin`, `LN_Admin`, `PHONE_Admin`, `USERNAME_Admin`, `PASS_Admin`) VALUES
(63410043, 'เชษฐมาส', 'ไผ่จันทร์', '0982627881', 'chaumas16@gmail.com', '0818082015aA@');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_admin`
--
ALTER TABLE `db_admin`
  ADD PRIMARY KEY (`ID_Admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_admin`
--
ALTER TABLE `db_admin`
  MODIFY `ID_Admin` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63410045;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
