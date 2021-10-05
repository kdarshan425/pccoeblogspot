-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2021 at 04:54 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `blog_owner` int(11) NOT NULL,
  `Heading` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_owner`, `Heading`, `name`, `image`, `content`, `timestamp`) VALUES
(68, 1, 'FestX Website Developement', 'Darshan Khope', 'IMG-20210921-WA0037.jpg', '<h1 style=\"text-align: center; \"><span style=\"font-family: Impact; background-color: rgb(255, 255, 0);\"><font color=\"#000000\">FestX | PCCOE\'s TECHFEST</font></span></h1><h1 style=\"text-align: center; \"><span style=\"font-family: Impact; background-color: rgb(255, 255, 0);\"><font color=\"#000000\"><br></font></span></h1><h4 style=\"\">Two days Before I got opportunity to develope website for Techfest Pccoe that is knows as FESTX.<br>The event was very big i.e. all India event  .</h4><h4 style=\"\"><b><u>The content of FestX :</u></b></h4><h4 style=\"\">Department of Electronics and Telecommunications  In Association with ETSA and IETE student forum are thrilled to announce a techfest for you all. </h4><p><span style=\"color: rgb(32, 33, 36); font-family: consolas, \"lucida console\", \"courier new\", monospace; font-size: 12px; white-space: pre-wrap;\"> All work and no play makes jack a dull boy!</span></p><p><h4><span style=\"color: rgb(32, 33, 36); font-family: consolas, \"lucida console\", \"courier new\", monospace; font-size: 12px; white-space: pre-wrap;\">So FestX is going to be an all inclusive package for learning, fun, and much more! <br></span><span style=\"color: rgb(32, 33, 36); font-family: consolas, \"lucida console\", \"courier new\", monospace; font-size: 12px; white-space: pre-wrap;\">The sole purpose of the event is to provide a platform for students to showcase their knowledge and bring together students from colleges in healthy competition.  We look forward to seeing you! </span></h4><h4>This was the information about FestX.</h4><p>I am very glad to inform that I\'ve developed the website for FestX Pccoe . Do visite the website!</p><p><a href=\"https://festx.tech/\" target=\"_blank\">FestX.tech</a><br></p></p>', '2021-10-01 07:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `re_id` int(11) NOT NULL,
  `re_content` text NOT NULL,
  `th_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `reply_by` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`re_id`, `re_content`, `th_id`, `blog_id`, `reply_by`, `timestamp`) VALUES
(10, 'Yes everything working fine', 211, 68, '1', '2021-10-01 07:22:20'),
(11, 'Yes That also done correctly!', 212, 68, '1', '2021-10-01 07:26:17'),
(14, 'Its After ', 215, 68, '1', '2021-10-01 16:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reset_password`
--

INSERT INTO `reset_password` (`id`, `email`, `token`, `status`, `created`) VALUES
(1, 'kdarshan425@gmail.com', '606402165b7dfa692f7ac595', '1', '2021-10-04 08:25:43'),
(2, 'darshan.khope19@pccoepune.org', 'f40dddddc1783477d09bf8fe', '0', '2021-10-04 08:35:18'),
(3, 'darshan.khope19@pccoepune.org', '9f0914ccf6b1cb377bce5c7c', '1', '2021-10-04 08:40:17'),
(4, 'kdarshan425@gmail.com', 'd3b119363539345c0ed14121', '0', '2021-10-04 08:44:57'),
(5, 'kdarshan425@gmail.com', '5210abfedff44179ab2730a6', '1', '2021-10-04 08:46:10'),
(6, 'darshan.khope19@pccoepune.org', '9c1901a283b5f824e103f99c', '1', '2021-10-04 11:29:22');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `th_id` int(11) NOT NULL,
  `th_desc` text NOT NULL,
  `th_blog_id` int(11) NOT NULL,
  `th_by` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`th_id`, `th_desc`, `th_blog_id`, `th_by`, `timestamp`) VALUES
(211, 'So Blog added Successfully !', 68, '1', '2021-10-01 07:22:01'),
(212, 'I am trying to adding new image by editing this blog!\r\n', 68, '1', '2021-10-01 07:22:51'),
(215, 'After Login', 68, '1', '2021-10-01 16:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `acc_status` varchar(255) NOT NULL DEFAULT 'Inactive',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_email`, `user_name`, `user_pass`, `token`, `acc_status`, `timestamp`) VALUES
(1, 'kdarshan425@gmail.com', 'kdarshan', '$2y$10$BHIn32YrtCiUBMemuHNc/OQGEHgINe.LpthDsddrC3VgcfCww7X3G', 'ebb9316d38908dd0a4fd1d31', 'Active', '2021-09-30 10:20:02'),
(3, 'a@a.com', 'a', '$2y$10$.F/breHGYyyOnNt1th5.geHF059Jt4LLA0S7U27PiJQgK5gSr9vme', '', 'Active', '2021-09-30 12:34:21'),
(4, 'try25@try25.com', 'try25', '$2y$10$t/K7dr9uVH.2Sc9deMBuE.oDM0rHuLvDaQZsPQwvTZrtRh9N4BAaG', '', 'Inactive', '2021-09-30 12:42:09'),
(5, 'try1@try1.com', 'try1', '$2y$10$uL8zAPj5x7KlByiaEX34LuXQzeloUu4ARLWqGabDme0KWg7mgWPQq', '', 'Active', '2021-09-30 12:48:53'),
(8, 'try2@try2.c', 'tr', '$2y$10$/QhZo9Zj4cK1rT24FJfRr.gBfwB5J.fgr8/mOIDBNEDWOsZ3q/Pvi', 'ae9585e06010d3900133209f', 'Active', '2021-10-03 17:05:23'),
(9, 'darshan.khope19@pccoepune.org', 'darshan', '$2y$10$/9uqLTWvzLAiEg4dithN3.GoqS1PM.JUP1cKeYkG1ccOMud98HDhu', '6d0f2fd06edb87d25e57737d', 'Active', '2021-10-04 11:28:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `blogs` ADD FULLTEXT KEY `Heading` (`Heading`,`name`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`re_id`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`th_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `th_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
