-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 09:30 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender` varchar(125) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `message`, `timestamp`) VALUES
(1, 'Admin', 'hi', '2024-05-07 14:25:30'),
(2, 'Admin', 'heloo', '2024-05-07 14:35:39'),
(3, 'Admin', 'heloo', '2024-05-07 14:36:59'),
(4, 'Admin', 'heloo', '2024-05-07 14:37:00'),
(5, 'Admin', 'heloo', '2024-05-07 14:37:01'),
(6, 'Admin', 'heloo', '2024-05-07 14:37:01'),
(7, 'Oppap', 'yeah bro', '2024-05-07 14:37:59'),
(8, 'Admin', '', '2024-05-07 14:41:27'),
(9, '1', 'hi', '2024-05-07 14:47:40'),
(10, '1', 'hello', '2024-05-09 15:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(150) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `post`, `image`, `timestamp`) VALUES
(2, 2, 'Good Morning mina san!!!!\r\n', '', '2024-05-09 15:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `gmail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `contact` bigint(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  `documents` varchar(255) NOT NULL DEFAULT '',
  `company` varchar(255) NOT NULL,
  `compaddress` varchar(255) NOT NULL,
  `compcontact` bigint(11) NOT NULL,
  `years` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_approve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `gmail`, `password`, `fullname`, `birthday`, `contact`, `facebook`, `image`, `documents`, `company`, `compaddress`, `compcontact`, `years`, `position`, `description`, `is_approve`) VALUES
(1, 'louie@trimexcolleges.edu.ph', '$2y$10$705cht8VAx8p8mF4TpWKpOtQZZfLTF3DdBcgGt75CTcdxEHXWZJra', 'TJ Hotdog', '2002-05-03', 12345678923, 'hotdogsellerss', 'hotdogseller_Screenshot 2023-07-07 154305.png', 'hotdogseller_Ice Candy.docx', 'Tender Juicy', '', 0, 0, 'Seller', 'TJ Hotdog seller and supplier', 1),
(2, 'mattloteria0@gmail.com', '$2y$10$1xvW9rBs2XhWMc1Wku.lIuRjXyJSEJ3l8WDT3OqwDKvPCtm2po42S', 'Matt Rogine C. Loteria', '0000-00-00', 0, 'mattloteria', 'Matt Rogine C. Loteria_2x2.jpg', '', 'Metrobank', '', 0, 0, 'Head', '', 0),
(3, 'adrianandrewb@gmail.com', '$2y$10$WDe3q.e9Q5Qo.ZlbOwE2Ve/cCES2cwHUChi6KUENkPKaPYDuhnoSe', 'Adrian Andrew Balita', '2002-01-09', 9217459313, 'adrian', 'Adrian Andrew M. Balita_download.png', '', 'Metrobank', '', 0, 0, 'Head', 'IT Dept Head', 1),
(4, 'mattrogineloteria@trimexcolleges.edu.ph', '$2y$10$EZG4B3GDIfajT/yH1qKXBe4uvM0vaIC3oRDDs3beBj0P2r5PP5wCy', 'Matty Rogine C. Loteria', '0000-00-00', 0, 'mattloteria', 'Matty Rogine C. Loteria_Screenshot 2023-07-07 131611.png', 'Matty Rogine C. Loteria_Asynchronus Activity.pdf', 'Metrobank', '', 0, 0, 'Head', '', 1),
(5, 'amismissy01@gmail.com', '$2y$10$IfUgi16EAUDaa/1nxoUY2.YjLaZwqMDNY4/Xza4SHorP3w1X9l8um', 'Missy', '0000-00-00', 0, 'hotdogseller', '', '', 'Tender Juicy', '', 0, 0, 'seller', '', 1),
(6, 'deecelescano20@gmail.com', '$2y$10$cu09H/D3yLa563wUgmNsseIM76XW4TnrCyyQNPzlRGnNlaE6gU.76', 'Deecel Escaño', '0000-00-00', 0, 'hotdogseller', '', '', 'Tender Juicy', '', 0, 0, 'seller', '', 1),
(18, 'hotdogseller@gmail.com', '$2y$10$OvArf4zYDm7e/m4.4nsOLu/X.nED7gXOs22JWJAW6brll6FGOuerK', 'hotdogseller', '2002-02-21', 9123456789, 'hotdogseller', 'hotdogseller_Screenshot 2023-07-07 154305.png', 'hotdogseller_Ice Candy.docx', 'Tender Juicy', 'hotdog store', 91233456789, 100, 'seller', 'Seller', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
