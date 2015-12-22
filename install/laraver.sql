-- phpMyAdmin SQL Dump
-- version 4.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-12-22 14:03:00
-- 服务器版本： 5.6.25
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laraver`
--

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(60) NOT NULL,
  `remember_token` char(60) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'koocyton@gmail.com', '$2y$10$nESxkc/IhXhXsWyJw8HdOuaSfEpSGJc0YusciWhe2LlzN/w64EptS', 'Bv5deDP13oRgc1SwUHAZmj9hJkcZXoRG8m9nQfURbRHtUkmURFnKKgvnrXvW', '2015-12-01 10:10:36', '2015-12-22 13:47:36'),
(2, 'liuyi@doopp.com', '$2y$10$btLBNhu6kBBnc5muoFc.Q.u9ymPO.5nv3gRxewdsihUsFGfMhrEx6', 'pQI0AN5VIoRHJl4nrH3PBVJmUnKNJn1kIJCGK9UIqSp4g1V5FpVoVSoKyNXP', '2015-12-19 05:14:57', '2015-12-19 05:15:11'),
(4, 'koocyton1@gmail.com', '$2y$10$8dcBu.B0niI9nKnd81ejP.hhUqnRdfev0dLzug5Ud7neQ9wJB6FU2', '', '2015-12-20 12:40:12', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
