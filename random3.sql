-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 10:06 AM
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
(20, 5, 3),
(21, 5, 4),
(25, 3, 48),
(26, 3, 47),
(27, 3, 46),
(28, 3, 45),
(29, 4, 48),
(30, 4, 47),
(31, 4, 46),
(32, 4, 45),
(33, 4, 44),
(34, 4, 43),
(35, 4, 42),
(36, 4, 41),
(37, 4, 40),
(38, 4, 39),
(39, 4, 38),
(40, 4, 37),
(41, 4, 36),
(42, 4, 35),
(43, 4, 34),
(44, 4, 33),
(45, 4, 32),
(46, 4, 31),
(47, 4, 30),
(48, 4, 29),
(49, 4, 28),
(50, 4, 27),
(51, 4, 26),
(52, 4, 25),
(53, 4, 24),
(54, 4, 23),
(55, 4, 22),
(56, 4, 21),
(57, 4, 20),
(58, 4, 19),
(59, 4, 18),
(60, 4, 17),
(61, 4, 16),
(62, 4, 15),
(63, 4, 14),
(64, 4, 13),
(65, 4, 12),
(66, 4, 11),
(67, 4, 10),
(68, 4, 9),
(69, 4, 8),
(70, 4, 7),
(71, 4, 6),
(72, 4, 5),
(73, 4, 3);

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
(6, 'haiiiiisyg', 3);

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
(35, 3, 35),
(36, 5, 36),
(37, 3, 36),
(39, 3, 41),
(40, 3, 56),
(41, 4, 64),
(42, 4, 63),
(43, 4, 62),
(44, 4, 61);

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
  `anonym` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `timestamp`, `user`, `parent`, `anonym`) VALUES
(25, 'Whatsapp @everyone', '2020-11-30 15:32:11', 3, 0, 0),
(26, 'Whats are #trending now ?', '2020-11-30 15:33:06', 3, 0, 0),
(27, 'update status terussssss', '2020-11-30 15:57:04', 3, 0, 0),
(28, 'ini akan menjadi sebuah threads', '2020-11-30 15:57:43', 3, 27, 0),
(29, 'orang kok protes terus', '2020-11-30 22:29:58', 3, 27, 0),
(30, 'ngetest button', '2020-11-30 22:31:55', 3, 27, 0),
(31, 'ngetest button lagi', '2020-11-30 22:34:43', 3, 27, 0),
(32, 'haloooo @kelvink', '2020-11-30 23:06:11', 4, 0, 0),
(33, 'ngapaa', '2020-11-30 23:06:37', 3, 32, 0),
(34, 'gapapaaaa', '2020-11-30 23:07:04', 4, 33, 0),
(35, 'update status terus', '2020-11-30 23:15:16', 4, 27, 0),
(36, 'test', '2020-12-02 10:06:17', 3, 0, 0),
(37, 'Halooooo', '2020-12-02 12:38:20', 5, 0, 0),
(38, '@Bambang', '2020-12-02 22:48:42', 3, 0, 0),
(39, 'haloooo @ardian', '2020-12-04 09:00:35', 3, 0, 0),
(40, 'testttttt', '2020-12-04 09:03:54', 3, 0, 0),
(41, '#haloGan', '2020-12-04 09:04:01', 3, 0, 0),
(42, 'heheheh', '2020-12-04 09:04:19', 3, 41, 0),
(43, 'heheheh', '2020-12-04 09:04:24', 3, 41, 0),
(44, 'testttt', '2020-12-05 16:37:36', 3, 0, 0),
(47, 'test', '2020-12-05 16:46:41', 3, 0, 0),
(48, 'tessss', '2020-12-05 16:47:11', 3, 0, 1),
(49, 'testt anonim', '2020-12-05 16:47:26', 3, 0, 1),
(50, 'test akun biasa', '2020-12-05 16:49:18', 3, 0, 1),
(51, 'tsssss', '2020-12-05 16:49:34', 3, 0, 1),
(52, 'ddd', '2020-12-05 16:49:59', 3, 0, 0),
(53, 'testtt', '2020-12-05 16:50:06', 3, 0, 0),
(54, '123', '2020-12-05 16:53:59', 3, 0, 0),
(55, 'heheheh', '2020-12-05 16:54:24', 3, 0, 0),
(56, 'hahahah', '2020-12-05 16:54:29', 3, 0, 1),
(57, 'ini siapa woi', '2020-12-05 17:12:08', 3, 56, 0),
(58, 'we', '2020-12-07 08:20:20', 3, 0, 0),
(59, '#haiiiiisyg', '2020-12-07 08:33:14', 3, 0, 0),
(60, '#haiiiiisyg', '2020-12-07 08:34:17', 3, 0, 0),
(61, '#haiiiiisyg', '2020-12-07 08:40:36', 4, 0, 0),
(62, '#haiiiiisyg', '2020-12-07 08:41:04', 4, 0, 0),
(63, '#haiiiiisyg', '2020-12-07 08:41:41', 3, 0, 0),
(64, '#haiiiiisyg', '2020-12-07 08:42:26', 3, 0, 0),
(65, '#haiiiiisyg', '2020-12-07 08:42:47', 4, 0, 0),
(66, 'haloo juga', '2020-12-07 08:44:42', 4, 63, 0);

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
(3, 'Kelvin Kurniawan', 'tepinnko@gmail.com', 'kelvink', '$2y$10$9qGzPwFbRkaEjW6wZPfrJODz5UC94Np9LHR8YHPW0usc9/2SS8V0.', 'aku memang pencinta wanita, namun ku bukan buaya', NULL, 'photo.png', 0),
(4, 'Ardian Pramudya', 'ardianpramudya81@gmail.com', 'ardianp', '$2y$10$lDniUB9857sz13Pg3pzqkOaZyRKB73N4tElF4Z1/d.Cfm2Qk9Z2Ru', 'wanita memanggilku buaya namun aku hanya lah se ekor kadal yang mencoba menjadi buaya', NULL, 'cio.png', 0),
(5, 'Bambang', 'user100@mail.com', 'bambank', '$2y$10$rtT9nlprkqCN4udnPWmdyezYvCnSL8di1JXYmg95RjYEaanVLwC1q', NULL, NULL, 'default.png', 0),
(6, 'Zoey Peltier', 'Zoey.Peltier@mail.com', 'Peltier.', '$2y$10$ESV0/wCp9tPVu9b1L5muNea019TQCVky99VlRGFbVBEl5er0eM.ZO', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(7, 'Christopher Cunningham', 'Christopher.Cunningham@mail.com', 'Cunningham.', '$2y$10$9OeYJqjdCwqnpNCv0eSmr.UpLANk/k6eQXUPZ2sr1dOfL3Rl5F7b2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(8, 'John Anderson', 'John.Anderson@mail.com', 'Anderson.', '$2y$10$hBkbN6eCkkHfzyjuecNgreP5HS8ZlZIRBSgphGsl7.ZWuArCw8dk6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(9, 'Ryan Johnson', 'Ryan.Johnson@mail.com', 'Johnson.', '$2y$10$37yXXGHagYy0ceGFOEGXGeZm7ql9w2fin1B6wyieejSHDfDaewZfa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(10, 'Michelle Mercado', 'Michelle.Mercado@mail.com', 'Mercado.', '$2y$10$wjmiyp5ZftmT0lKkluFBROq8MgvLBq0XjQZejKPSrLypMny87dZwu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(11, 'Christopher Thompson', 'Christopher.Thompson@mail.com', 'Thompson.', '$2y$10$fXAYvcbta9K01ZUpaIZ6x.eWp6xd.qshvQOauXHK4bXLgtONTzpY.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(12, 'Christopher Mercado', 'Christopher.Mercado@mail.com', 'Mercado.', '$2y$10$GfiB.Q2PE1Pt7Svqxwur6Ovk.2Hm9RqGgINtTnThzQEwIHULdYmHi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(13, 'Sarah Sellers', 'Sarah.Sellers@mail.com', 'Sellers.', '$2y$10$sA9VCZ7qo.M7wFyFckBoE.HLFZfwDoG5XghmGARTO3K95nvNSKMVG', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(14, 'Ryan Mercado', 'Ryan.Mercado@mail.com', 'Mercado.', '$2y$10$F.qpJCz3ApmDLavPr8uE6uGYDWwFbBZZWOsJyuKrURLOyX3X3JxKy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(15, 'Michelle Anderson', 'Michelle.Anderson@mail.com', 'Anderson.', '$2y$10$4rPWGwkXf8ApWwAvqPLD6.4JP85EuGeo5GuA7Ljif5fOKADUvSJMK', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(16, 'Zoey Anderson', 'Zoey.Anderson@mail.com', 'Anderson.', '$2y$10$OzZnpc9CTozdVnCApDIMnuyXL.eRXTAO3tDvvTpaEBIjjZnUT5HWK', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(17, 'Ethan Mercado', 'Ethan.Mercado@mail.com', 'Mercado.', '$2y$10$d2W0gIWC6O4qkzTXN4pywuPcuhDatixIT5H73HsLDuiGFIhg6pD4u', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(18, 'Zoey Thompson', 'Zoey.Thompson@mail.com', 'Thompson.', '$2y$10$DmDyHUVNya/75MTg25l9K.mu1QvBNtNap29gZj1DbQrDmkr2ttMUS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(19, 'Christopher Tremblay', 'Christopher.Tremblay@mail.com', 'Tremblay.', '$2y$10$FyLkzwSbAag3L/T2rzy/ae4bARU/1KDlimclxDeZJziVgODeg05ci', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(20, 'Michelle Johnson', 'Michelle.Johnson@mail.com', 'Johnson.', '$2y$10$xfkVJz5hZh/joHosYPbLYuu1AD1VQASdqNsooGsuvnanZ26aX4r5q', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(21, 'Sarah Tremblay', 'Sarah.Tremblay@mail.com', 'Tremblay.', '$2y$10$.XwyRbEqKhx97jnmOBe/9uDKCzQHiLNV.kyr0QnOomJtUarbaj9UW', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(22, 'Sarah Peltier', 'Sarah.Peltier@mail.com', 'Peltier.', '$2y$10$KReflXsf7C3lrJUrqg9kRO7QP6kszfCs7WU5yts19lcP7RxjHmSym', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(23, 'John Walker', 'John.Walker@mail.com', 'Walker.', '$2y$10$e5o3Hkh7JYFgQ0O2EgxBHOvLy5nLr2sgxTItyZIhzpk3cx4zQc3VK', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(24, 'Ryan Johnson', 'Ryan.Johnson@mail.com', 'Johnson.', '$2y$10$3RYLtenIdtp.u7vDdd7k9eGr4S4xiUoXpFwpgriWqSqHtnwbIrzXi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(25, 'Ryan Walker', 'Ryan.Walker@mail.com', 'Walker.', '$2y$10$4TxCLzUKinTsAzyEZFCUR.U6d.TXPqm53Ih5Gp3rbtb7rnpnzWRU.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(26, 'John Anderson', 'John.Anderson@mail.com', 'Anderson.', '$2y$10$gQ8M2EFLUwC3sDq9c1PBAubD/HrKRkm.F2D7KwnKXjnb81RDgD7sG', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(27, 'Ethan Mercado', 'Ethan.Mercado@mail.com', 'Mercado.', '$2y$10$FcY/yhaYAvzSuW5XZtB.h.KvvPzqyamVzsES5xGOhrHXEzH42C8Da', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(28, 'Michelle Walker', 'Michelle.Walker@mail.com', 'Walker.Michelle', '$2y$10$.zifJvI0F/DpsVn6zJIL3.cNb7flu0dAQp3Zb3lkCGtAszMhEcb0q', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(29, 'Michelle Thompson', 'Michelle.Thompson@mail.com', 'Thompson.Michelle', '$2y$10$b7Lz7qsPR7rMTlbTl0k/ge3jKyVUnLWjkJEKEhHlxcrizfeRl37J2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(30, 'Zoey Mercado', 'Zoey.Mercado@mail.com', 'Mercado.Zoey', '$2y$10$4gij9AXb/Acn0aMyPL/J9eqcGonCJx6w3pRYMD1KLJNppTXD6CQ1.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(31, 'Zoey Mercado', 'Zoey.Mercado@mail.com', 'Mercado.Zoey', '$2y$10$fgPFRYYOc7LNfL7nl.pSaeWJrdQuup/PJ2Q7e.1f7OTk/Cnhq.GH6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(32, 'Christopher Simpson', 'Christopher.Simpson@mail.com', 'Simpson.Christopher', '$2y$10$dddu/R8ns5buR0KLV4TiEOpFcyXRm.FSU5Tiirt4g6Rh47lAAwEhS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(33, 'John Walker', 'John.Walker@mail.com', 'Walker.John', '$2y$10$QmKPLXGcxWYlHXhm1uWjmuVG1OocnLzhb3Xj56btiqswqOMzn7lju', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(34, 'Ryan Anderson', 'Ryan.Anderson@mail.com', 'Anderson.Ryan', '$2y$10$ImQOFdf/iQfbV.OU1vl/.uVVRqXypOUE3wS/99F5M.K9Nc/MPOSNK', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(35, 'Sarah Mercado', 'Sarah.Mercado@mail.com', 'Mercado.Sarah', '$2y$10$yL7k5JP4a4TjkVrMxdpjSOf4wkTg/1/qTvlDWjqlGT/vKbWK9bNz6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(36, 'Sarah Johnson', 'Sarah.Johnson@mail.com', 'Johnson.Sarah', '$2y$10$8XNYo8bSEMQmbWEaQKJWUuOLLCEpcQqMPzDlwdvoTvZy14yALXcLe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(37, 'Michelle Simpson', 'Michelle.Simpson@mail.com', 'Simpson.Michelle', '$2y$10$xtvpranoabfihjKRpvlBIODQR7jP5Eynq4KolgsBXXwcrNjYMEU1O', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(38, 'Zoey Sellers', 'Zoey.Sellers@mail.com', 'Sellers.Zoey', '$2y$10$Qmj7whqYUF0d3iy9e4YAd.Bj6urK0t.JcYaycY5dVpopUSu5DIjTm', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(39, 'Ryan Peltier', 'Ryan.Peltier@mail.com', 'Peltier.Ryan', '$2y$10$1ge2tWi0fOjnHFWQay58gOcgvB8pAce95iksiHreALgSAyxFxy4SS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(40, 'Ryan Johnson', 'Ryan.Johnson@mail.com', 'Johnson.Ryan', '$2y$10$wBf6uye.AMiIRI3c8c3TluB.89voqVDLrNCqKjBRcUm8kEqtiz2Yq', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(41, 'Michelle Walker', 'Michelle.Walker@mail.com', 'Walker.Michelle', '$2y$10$HvKgz4s6kQE5vJEG15SQmOC3riIgVnkkGNAk9DtGE5fNjzxYzkf/2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(42, 'Sarah Thompson', 'Sarah.Thompson@mail.com', 'Thompson.Sarah', '$2y$10$u0QrsquXNEO.PD1VmSqMg.vivLbzGpEzixgNERPzTQ9Z2C3OuYMFu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(43, 'Zoey Tremblay', 'Zoey.Tremblay@mail.com', 'Tremblay.Zoey', '$2y$10$Y71gnFD4Sb9hxsJ14wbhuONF8d18jGUUW.vZchBOA57t9TNYLhY1m', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(44, 'John Sellers', 'John.Sellers@mail.com', 'Sellers.John', '$2y$10$I80/guJfMd94/SseMnig3.vZBwv55bnVMSnKt3.1Kuv.aN69Iqy8W', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(45, 'John Thompson', 'John.Thompson@mail.com', 'Thompson.John', '$2y$10$JEkkqkxcpUYgTGKmKFVi/.Qlzs9CYfPgpSaL0s/vUqcdBJkyT4K36', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(46, 'Michelle Mercado', 'Michelle.Mercado@mail.com', 'Mercado.Michelle', '$2y$10$bhNsuv12Rwuy6W7LWdPoG.i/oR0qMXTggc.aUOS7PlUaYIz1H85qC', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(47, 'Sarah Mercado', 'Sarah.Mercado@mail.com', 'Mercado.Sarah', '$2y$10$7h7B7wUy0ydf2J5YsjJqBOFTTdkUVeMFEu65N4ttsuL4/f58l4tLS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0),
(48, 'Ethan Simpson', 'Ethan.Simpson@mail.com', 'Simpson.Ethan', '$2y$10$yymOYmrVlvz.3QoIj/71NOInuXBZlDtKKrPHQbCSxImricHjLWune', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis', NULL, 'default.png', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `hashtag`
--
ALTER TABLE `hashtag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
