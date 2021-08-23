-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2019 at 01:37 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restapi_tuts`
--

-- --------------------------------------------------------

--
-- Table structure for table `apiusers`
--

CREATE TABLE `apiusers` (
  `apiuser_id` int(11) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(250) NOT NULL,
  `auth_key` varchar(250) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apiusers`
--

INSERT INTO `apiusers` (`apiuser_id`, `firstname`, `lastname`, `email`, `password`, `auth_key`, `status`) VALUES
(2, 'frank', 'john', 'frank@gmail.com', '$2y$12$1KdgxI1Ddn6hVAA6vQEbyeAbNZVj51CValsILqGII9cZYPKi1vP7u', '$2y$12$MQJ.uYoQKRROdlhPOHLDzueB5eEW3.saS499SiIgojekLb6KRrNaq', 'Active'),
(3, 'Nicolas', 'cage', 'nicolas@gmail.com', '$2y$12$IOVJvNJE8RZG1237GCefe.gymvCGDhbZSVbreZGldeQ73U9m6vhfq', '$2y$12$TWQje2ZxCiKWMEvzQj5YDuqcfMRW4wFiq6htqeMQT0JNHHIXaPd16', 'Active'),
(6, 'justin', 'maddison', 'maddison@gmail.com', '$2y$12$m.Yws/xUpXQJoId8jxmdq.3vH3.Xm1.gWLMtM5svbIjWkNXzmj86m', '$2y$12$MIN2k4oGccEaaOW58fAANe2Vp3J2AQktaUkko/6tuSJDRbw2iM9AW', 'Active'),
(7, 'daniel', 'maddison', 'daniel@gmail.com', '$2y$12$CIL.WrhngXxxIW5QloLEVOg9TYbQeMH6Pze3RM/64Xy7cKMRSwJRG', '$2y$12$r8D1wjT5ohn5zmf079L0SeiWBVw7Qjki4KLswk0PX9cLcE1AWlTi2', 'Active'),
(8, 'daniel', 'maddison', 'danielm@gmail.com', '$2y$12$miHHn0j8BbdbhWmn/tASte2OuzSMYY.//wImk.YxjFY/0ypYjnGNm', '$2y$12$OtPOEkz6e.oGlOz1Kd8wCOxS9ddrU10lmliuWfucctFKFJlmzLnye', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `article_title` varchar(150) NOT NULL,
  `article_body` varchar(500) NOT NULL,
  `article_created_on` date NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `user_id`, `category_id`, `article_title`, `article_body`, `article_created_on`, `status`) VALUES
(26, 8, 2, 'article_edited from RestletClient', 'Edited body by RestletClient', '2019-01-28', 'Active'),
(30, 8, 2, 'Thanos will loose in the End Game', 'Porpoise some apart wow some much one dear this useful mawkish before zebra objective adoring this lantern heard overshot huge wasp heartless oriole more quietly misspelled so and amongst beaver hare fitted up articulate past otter after one floated hey gecko that before or responsible demonstrably terrier one outside guardedly gosh one banal opposite strident penguin jeez that impudent much', '2019-01-28', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`, `status`) VALUES
(1, 'Sports', 'Active'),
(2, 'Entertainment', 'Active'),
(3, 'Politics', 'Active'),
(4, 'World', 'Active'),
(5, 'Others', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `status`) VALUES
(7, 'roman', 'reigns', 'roman@gmail.com', '$2y$12$PFc8SVqaMeCA8QqoR1uxmehmb0CknBpcDaNRQsN9i8LlcvW.SqIUe', 'Active'),
(8, 'dean', 'ambrose', 'dean@gmail.com', '$2y$12$PLJvRcHqhKK2xktGnIbEo.oT0RpkjP3rOkxLCWQOQ3ipkxwFtGFGC', 'Active'),
(9, 'becky', 'lynch', 'becky@gmail.com', '$2y$12$BaY8wZ2Y8H26JKYscR4HReqy2iwTWNByVguA4GlvOun5EjBp8MQjO', 'Active'),
(10, 'justin', 'miller', 'justin@gmail.com', '$2y$12$EvkNRuYmJmR6tJtFBh3.FurxEXcFmpeIk5TEETt3XKPFAdoYBvwkK', 'Active'),
(11, 'seth', 'rollins', 'seth@gmail.com', '$2y$12$WNgFzHjN9Qmj570MIeRf6urP0dRz/TcdJrWT3vO8j1EAAvrFtGFB6', 'Active'),
(12, 'becky', 'lynch', 'lynch@gmail.com', '$2y$12$AffHWTEN4JCMtvLqxiwbsuEF0VvND5JCFP9BMQE3scdfCQiwDCeAi', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apiusers`
--
ALTER TABLE `apiusers`
  ADD PRIMARY KEY (`apiuser_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apiusers`
--
ALTER TABLE `apiusers`
  MODIFY `apiuser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
