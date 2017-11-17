-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2017 at 09:10 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `super_dating`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `recipient` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `sender`, `recipient`, `time`) VALUES
(164, 'hello beautiful', 'Superman', 'Wonder Woman', '2017-11-17 17:54:47'),
(165, 'y u no answer my comments :(', 'Superman', 'Wonder Woman', '2017-11-17 20:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `gifts`
--

CREATE TABLE `gifts` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `recipient` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gifts`
--

INSERT INTO `gifts` (`id`, `type`, `sender`, `recipient`, `time`) VALUES
(40, 'flowers', 'Batman', '', '2017-11-17 09:21:54'),
(41, 'ring', 'Batman', '', '2017-11-17 09:59:42'),
(42, 'ring', 'Batman', '', '2017-11-17 10:01:34'),
(43, 'ring', 'Batman', '', '2017-11-17 10:02:35'),
(44, 'teddy', 'Superman', '', '2017-11-17 15:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `recipient` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `content`, `sender`, `recipient`, `time`) VALUES
(22, 'Hey babe, I m home alone, come over', 'Batman', 'Catwoman', '2017-11-17 13:14:17'),
(23, 'Hey you Batman', 'Catwoman', 'Batman', '2017-11-17 13:16:32'),
(24, 'hey :*', 'Superman', 'Wonder Woman', '2017-11-17 19:08:15'),
(25, 'yay', 'Wonder Woman', 'Superman', '2017-11-17 19:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `known_as` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `age` int(5) NOT NULL,
  `city` varchar(50) NOT NULL,
  `job` varchar(50) NOT NULL,
  `superpower` varchar(200) NOT NULL,
  `picture` varchar(1000) NOT NULL,
  `likes_number` int(6) NOT NULL,
  `is_liked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `first_name`, `last_name`, `known_as`, `description`, `age`, `city`, `job`, `superpower`, `picture`, `likes_number`, `is_liked`) VALUES
(1, 'Clark', 'Kent', 'Superman', 'Superman is ready to make a superwoman out of you', 32, 'Metropolis', 'Journalist', 'Flying', 'https://upload.wikimedia.org/wikipedia/en/e/eb/SupermanRoss.png', 0, 0),
(2, 'Diana', 'Prince', 'Wonder Woman', 'I am wonderful', 25, 'Themyscira', 'Military intelligence officer', 'Divine abilities', 'https://upload.wikimedia.org/wikipedia/en/9/93/Wonder_Woman.jpg', 315, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT for table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
