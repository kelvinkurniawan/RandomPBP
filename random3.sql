-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 02:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `random3`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `followId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `userId`, `followId`) VALUES
(20, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user`, `post`) VALUES
(26, 3, 27),
(27, 3, 25),
(28, 3, 31),
(33, 4, 35),
(35, 3, 35);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `user` int(11) NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `timestamp`, `user`, `parent`) VALUES
(25, 'Whatsapp @everyone', '2020-11-30 15:32:11', 3, 0),
(26, 'Whats are #trending now ?', '2020-11-30 15:33:06', 3, 0),
(27, 'update status terussssss', '2020-11-30 15:57:04', 3, 0),
(28, 'ini akan menjadi sebuah threads', '2020-11-30 15:57:43', 3, 27),
(29, 'orang kok protes terus', '2020-11-30 22:29:58', 3, 27),
(30, 'ngetest button', '2020-11-30 22:31:55', 3, 27),
(31, 'ngetest button lagi', '2020-11-30 22:34:43', 3, 27),
(32, 'haloooo @kelvink', '2020-11-30 23:06:11', 4, 0),
(33, 'ngapaa', '2020-11-30 23:06:37', 3, 32),
(34, 'gapapaaaa', '2020-11-30 23:07:04', 4, 33),
(35, 'update status terus', '2020-11-30 23:15:16', 4, 27),
(36, 'test', '2020-12-02 10:06:17', 3, 0),
(37, 'Halooooo', '2020-12-02 12:38:20', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth` date DEFAULT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.png',
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `birth`, `photo`, `role`) VALUES
(3, 'Kelvin Kurniawan Oktavianto', 'tepinnko@gmail.com', 'kelvink', '$2y$10$9qGzPwFbRkaEjW6wZPfrJODz5UC94Np9LHR8YHPW0usc9/2SS8V0.', NULL, 'photo.png', 0),
(4, 'Ardian Pramudya', 'ardianpramudya81@gmail.com', 'ardianp', '$2y$10$lDniUB9857sz13Pg3pzqkOaZyRKB73N4tElF4Z1/d.Cfm2Qk9Z2Ru', NULL, 'cio.png', 0),
(5, 'Bambang', 'user100@mail.com', 'bambank', '$2y$10$rtT9nlprkqCN4udnPWmdyezYvCnSL8di1JXYmg95RjYEaanVLwC1q', NULL, 'default.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
