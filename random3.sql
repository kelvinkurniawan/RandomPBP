-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 08:06 PM
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
  `post` int(11) NOT NULL,
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
(77, 3, 4),
(78, 4, 91),
(79, 4, 90),
(80, 4, 89),
(81, 4, 88),
(82, 4, 87),
(83, 4, 86),
(85, 3, 5),
(86, 3, 91);

-- --------------------------------------------------------

--
-- Table structure for table `hashtag`
--

CREATE TABLE `hashtag` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hashtag`
--

INSERT INTO `hashtag` (`id`, `text`, `count`) VALUES
(1, '#hashtag', 1),
(2, '#trending', 1),
(3, '#haloGan', 1),
(5, 'akukamudandia', 1),
(6, 'haiiiiisyg', 3),
(7, 'cuk', 6),
(8, 'heheh', 4),
(9, 'ini', 1),
(10, 'contoh', 1),
(11, 'hashtag', 1),
(12, 'kelvin', 1),
(13, 'ardian', 1),
(14, 'kezia', 1),
(15, 'world', 1),
(16, 'halo', 1),
(17, 'dunia', 1),
(18, 'ku', 1);

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
(60, 3, 33),
(61, 3, 30),
(62, 3, 58),
(63, 3, 71),
(64, 3, 63),
(65, 3, 86),
(66, 3, 59),
(67, 3, 90),
(68, 3, 91),
(69, 3, 96),
(71, 3, 1),
(72, 3, 4),
(73, 4, 6),
(74, 3, 12),
(75, 3, 15),
(77, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `notification` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `post` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `read_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notification`, `user_id`, `user_from`, `post`, `timestamp`, `read_status`) VALUES
(1, 'started following you', 5, 3, NULL, '2020-12-14 17:44:50', 0),
(3, 'started following you', 91, 3, NULL, '2020-12-14 17:44:50', 0),
(4, 'liked your post', 4, 3, 6, '2020-12-14 17:44:50', 0),
(5, 'reply to your post', 4, 3, 12, '2020-12-14 17:47:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `user` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `anonym` int(11) NOT NULL DEFAULT 0,
  `have_attachment` int(11) NOT NULL,
  `files` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `timestamp`, `user`, `parent`, `anonym`, `have_attachment`, `files`) VALUES
(1, 'samlekom', '2020-12-11 19:24:25', 3, 0, 0, 0, ''),
(2, 'haloooo', '2020-12-12 18:55:19', 3, 0, 0, 0, ''),
(3, 'haloo haloooo @kelvin', '2020-12-12 18:55:46', 4, 0, 0, 0, ''),
(6, 'test', '2020-12-13 18:58:02', 4, 0, 0, 0, NULL),
(12, 'ini aku teman teman salam kenal', '2020-12-13 19:05:07', 4, 0, 0, 1, 'Ardian_Pramudya-20201213.png'),
(13, 'tesss', '2020-12-13 19:22:17', 3, 0, 0, 0, NULL),
(14, 'anjayy', '2020-12-13 19:22:28', 3, 12, 0, 0, NULL),
(15, 'Kesimpulan dari tugas bahasa indonesia kemarin', '2020-12-13 19:25:35', 3, 0, 0, 1, 'Kelvin_Kurniawan-20201213.mp4'),
(16, '#cuk', '2020-12-14 16:47:33', 3, 0, 0, 0, NULL),
(17, 'Hellooo #world', '2020-12-14 17:10:17', 3, 0, 0, 0, NULL),
(18, '#halo #dunia #ku', '2020-12-14 17:12:40', 3, 0, 0, 0, NULL),
(19, 'uwauu', '2020-12-14 17:47:39', 3, 12, 0, 0, NULL),
(20, 'test', '2020-12-14 19:02:07', 3, 0, 0, 0, NULL);

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
  `bio` text DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.png',
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `bio`, `birth`, `photo`, `role`) VALUES
(3, 'Kelvin Kurniawan', 'tepinnko@gmail.com', 'kelvink', '$2y$10$9qGzPwFbRkaEjW6wZPfrJODz5UC94Np9LHR8YHPW0usc9/2SS8V0.', 'Aku memang pencinta wanita namun ku bukan buaya', '1999-10-16', 'photo.png', 1),
(4, 'Ardian Pramudya', 'ardianpramudya81@gmail.com', 'ardianp', '$2y$10$lDniUB9857sz13Pg3pzqkOaZyRKB73N4tElF4Z1/d.Cfm2Qk9Z2Ru', 'wanita memanggilku buaya namun aku hanya lah se ekor kadal yang mencoba menjadi buaya', NULL, 'cio.png', 0),
(5, 'Bambang', 'user100@mail.com', 'bambank', '$2y$10$rtT9nlprkqCN4udnPWmdyezYvCnSL8di1JXYmg95RjYEaanVLwC1q', NULL, NULL, 'default.png', 0),
(71, 'John Sellers', 'John.Sellers@mail.com', 'Sellers.99', '$2y$10$TSoUCzbkx7grIMX5XImnWuE3B/oVyQml4tX6TmIcamTNtcsz9AK.e', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(72, 'Ethan Simpson', 'Ethan.Simpson@mail.com', 'Simpson.100', '$2y$10$nZBEIrs/WdY.aqf8QXsiTerO3RVyxYIM7KceC9DTVwutEX8QSiBSe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(73, 'Christopher Johnson', 'Christopher.Johnson@mail.com', 'Johnson.101', '$2y$10$fbIrdx//2AVTzDcb9WRq8O0FQCHo4IXD3tig0Be.5kibkCGeTZQlO', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(74, 'Sarah Simpson', 'Sarah.Simpson@mail.com', 'Simpson.102', '$2y$10$deceCh/QAjRkHyUYOz6Dp.04q1YLg/VuUofXBBWDapa77CNlulsm6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(75, 'Ryan Johnson', 'Ryan.Johnson@mail.com', 'Johnson.103', '$2y$10$eO1DZQYnb/2Lwx2ONu86p.t.4FqYpqEopTkF.MSXMoRKXZM081zp.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(76, 'Christopher Anderson', 'Christopher.Anderson@mail.com', 'Anderson.104', '$2y$10$T8uhzbSPdYas43VCUqNaHuX27eQ62q5Ab7fzrOyHG/Wsw6CoalFua', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(77, 'Sarah Mercado', 'Sarah.Mercado@mail.com', 'Mercado.105', '$2y$10$mnhJkaxc.1OpFP3vmyGybuJKTRBhAL9nYv2mXNzEv/bF/L3BULdZC', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(78, 'Michelle Cunningham', 'Michelle.Cunningham@mail.com', 'Cunningham.106', '$2y$10$q0tr2zSN/kTSSJxSitvPjuIgX6Z9DxovtnXIWFAX3R1D/OfWF0JbK', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(79, 'John Tremblay', 'John.Tremblay@mail.com', 'Tremblay.107', '$2y$10$KVFAW5dxMU4B/C9mfiUwHeMRCsySdkp3lFlYyCIGDub3J2anlitAm', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(80, 'Ryan Peltier', 'Ryan.Peltier@mail.com', 'Peltier.108', '$2y$10$w5PCFke2g3nVZ.i4nR8gyuX3ZbOvfoqNUfAE7QIOBmIVdiXqlvdzC', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(81, 'Sarah Johnson', 'Sarah.Johnson@mail.com', 'Johnson.109', '$2y$10$/WLwVBdQT4DlvFC4y5GGS.bhJ5wHNwodNSnhVjFOJszfpNxFR9K7q', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(82, 'Zoey Walker', 'Zoey.Walker@mail.com', 'Walker.110', '$2y$10$4xmQKO3aj3qhbFLN/ko0iO1pjdeKyOTVriPEYqeSUcEjUeMuBvUHu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(83, 'Ethan Peltier', 'Ethan.Peltier@mail.com', 'Peltier.111', '$2y$10$gmtx3boA64j4m5isDP2b7uVuJ/qXVsZ9mH2epEkN.IfRbnqMXMvaS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(84, 'John Peltier', 'John.Peltier@mail.com', 'Peltier.112', '$2y$10$jAwJdVWfihHo1GkemIFNEOPCAcBPd6EZ5kRve7nuIwiaJXPimJ4QO', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(85, 'Samantha Cunningham', 'Samantha.Cunningham@mail.com', 'Cunningham.113', '$2y$10$UFX6BKC1zVBWBRMpMMdF8esQ1B8aT04UnmrxeleX8f/i/srlUiO1i', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(86, 'Ryan Johnson', 'Ryan.Johnson@mail.com', 'Johnson.114', '$2y$10$a2a9ONIR2zmvE5zmNNMjRuDGSxtSdJ0UTdM2kmpaFu1vtQSJOb2Ji', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(87, 'Christopher Sellers', 'Christopher.Sellers@mail.com', 'Sellers.115', '$2y$10$YribTRoOcvTi0hYBfPmpGes.NVjwcsPtRtq8lo94.oxZnDKODzHO6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(88, 'Michelle Peltier', 'Michelle.Peltier@mail.com', 'Peltier.116', '$2y$10$MaJ.GoUInHbyLSEogVzHpeeusFbvA17tMj/V4AwtIVn7q15eDk/DC', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(89, 'Sarah Johnson', 'Sarah.Johnson@mail.com', 'Johnson.117', '$2y$10$7TrtSdT0SlhH1ESVQ60IjeZyyLWfGeLFqKH.kXHuZb.P24SxyxAx6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(90, 'John Walker', 'John.Walker@mail.com', 'Walker.118', '$2y$10$pJCjz9H5xuTclz/yIbgylucQYJSbGIy4V8GyNseRRl.gSEUasogHq', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(91, 'Zoey Sellers', 'Zoey.Sellers@mail.com', 'Sellers.119', '$2y$10$pO0brHQGnRsNYpqnh6Y.KO0ARuGTIMaLQAk7bLM6fvkCHW6OBezZq', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0);

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
-- Indexes for table `hashtag`
--
ALTER TABLE `hashtag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `hashtag`
--
ALTER TABLE `hashtag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
