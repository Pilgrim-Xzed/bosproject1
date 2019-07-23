-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2019 at 08:02 AM
-- Server version: 5.7.26-0ubuntu0.19.04.1
-- PHP Version: 7.2.19-0ubuntu0.19.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bos`
--

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `content_title` text CHARACTER SET utf8 NOT NULL,
  `content_img` varchar(200) NOT NULL,
  `content_desc` text NOT NULL,
  `posted_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `content_title`, `content_img`, `content_desc`, `posted_on`) VALUES
(2, 'Governor\'s Speech', '/uploads/gallery/thump_1563105870.Array', '<p>sad</p>', '2019-07-14 13:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `doc_desc` varchar(200) NOT NULL,
  `doc_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title`, `doc_desc`, `doc_path`) VALUES
(1, 'Governor\'s Speech', 'description', 'uploads/documents/GOVERNORS SPEECH.pdf'),
(2, 'Borno State Government Summary of Budget 2019', 'description', 'uploads/documents/PAGE 1.pdf'),
(3, 'Borno State Government Consolidated Capital Budget Summary (MASTER BUDGET) Based on Programme', 'description', 'uploads/documents/PAGE 2-3.pdf'),
(4, 'Borno State Government Consolidated Capital Budget Summary (MASTER BUDGET) Based on Functions', 'description', 'uploads/documents/PAGE 4-5.pdf'),
(5, 'BORNO STATE GOVERNMENT CONSOLIDATED CAPITAL BUDGET SUMMARY 2019 (MASTER BUDGET) BASED ON SECTORS', 'description', 'uploads/documents/PAGE 6-7.pdf'),
(6, 'BORNO STATE GOVERNMENT SUMMARY OF TRANSFERS FROM CONSOLIDATED REVENUE FUND (CRF) TO CAPITAL DEVELOPMENT FUND (CDF) 2019', 'description', 'uploads/documents/PAGE 8-9.pdf'),
(7, 'BORNO STATE GOVERNMENT 2019 REVENUE BUDGET REVENUE BUDGET BASED ON NATURE (PAID TO CRF) 2019- 2021', 'description', 'uploads/documents/PAGE 10-11.pdf'),
(8, 'BORNO STATE GOVERNMENT 2019 REVENUE BUDGET SUMMARY OF TOTAL REVENUE BUDGET BY SECTOR 2019 - 2021', 'description', 'uploads/documents/PAGE 12-13.pdf'),
(9, 'BORNO STATE GOVERNMENT 2019 APPROVED BUDGET SUMMARY OF BUDGETED EXPENDITURE BY SECTOR (2019 - 2021)', 'description', 'uploads/documents/PAGE 14-15.pdf'),
(10, 'BORNO STATE GOVERNMENT 2019 REVENUE BUDGET REVENUE BUDGET BASED ON NATURE (PAID TO CRF) 2019- 2021', 'description', 'uploads/documents/PAGE 16-17.pdf'),
(11, 'BORNO STATE GOVERNMENT SUMMARY OF TOTAL REVENUE BUDGET BY TYPE/NATURE 2019 - 2021', 'description', 'uploads/documents/PAGE 18.pdf'),
(12, 'BORNO STATE GOVERNMENT 2019 REVENUE BUDGET SUMMARY OF TOTAL REVENUE BUDGET BY SECTOR 2019 - 2021', 'description', 'uploads/documents/PAGE 19-20.pdf'),
(13, 'BORNO STATE GOVERNMENT 2019 APPROVED BUDGET RECURRENT REVENUE', 'description', 'uploads/documents/PAGE 21-48.pdf'),
(14, 'BORNO STATE GOVERNMENT 2019 BUDGET SUMMARY OF BUDGETED EXPENDITURE BY SECTOR (2019 - 2021)', 'description', 'uploads/documents/PAGE 49-50.pdf'),
(15, 'FIRST SCHEDULE BORNO STATE GOVERNMENT 2019 BUDGET SUMMARY OF BUDGETED EXPENDITURE BY SECTOR (2019 - 2021)', 'description', 'uploads/documents/PAGE 51-52.pdf'),
(16, '2019 BUDGET RECURRENT EXPENDITURE BY SECTOR', 'description', 'uploads/documents/PAGE 53-57.pdf'),
(17, 'BORNO STATE BUDGET 2019 RECURRENT EXPENDITURE', 'description', 'uploads/documents/PAGE 58-186.pdf'),
(18, 'SECOND SCHEDULE BORNO STATE GOVERNMENT 2019 BUDGET SUMMARY OF CAPITAL EXPENDITURE BY SECTOR (2019 - 2021)', 'description', 'uploads/documents/PAGE 187-293.pdf'),
(19, 'BORNO STATE GOVERNMENT N18,000 NATIONAL MINIMUM WAGE PUBLIC SERVICE SALARY TABLE', 'description', 'uploads/documents/PAGE 294-297.pdf'),
(20, 'CONSOLIDATED MEDICAL SALARY STRUCTURE (CONMESS)', 'description', 'uploads/documents/PAGE 298-303.pdf'),
(21, 'BORNO STATE BUDGET 2019 APPENDIX \'A\'', 'description', 'uploads/documents/PAGE 304-306.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `image_path`) VALUES
(1, 'RED BRICK MOULDING FACTORY ALONG BAGA ROAD AFTER RAILWAY CROSSING', '/uploads/gallery/thump_1562995629.Array'),
(3, 'PRESIDENTIAL LODGE IN GOVERNMENT HOUSE', '/uploads/gallery/thump_1562995962.Array'),
(4, 'AGRICULTURAL IMPLEMENTS', '/uploads/gallery/thump_1562996037.Array');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `mda_email` varchar(200) NOT NULL,
  `mda_address` varchar(200) NOT NULL,
  `mda_phone` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `mda_email`, `mda_address`, `mda_phone`) VALUES
(1, 'info@bornostate.gov.ng', 'Maiduguri', '000000000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `phone` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `phone`) VALUES
(1, 'Saidu Isah Bello', 'saeedbello12@gmail.com', '92144355d7c0f5b90e67a17af1d93681', '09094815738');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
