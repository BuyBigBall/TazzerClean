ALTER TABLE `providers` ADD `total_limit` VARCHAR(255) NULL AFTER `is_online`, ADD `use_limit` VARCHAR(255) NULL AFTER `total_limit`;

ALTER TABLE `subscription_fee` ADD `limit` VARCHAR(250) NULL AFTER `status`;





ALTER TABLE `services` ADD `dimension` VARCHAR(255) NULL AFTER `cat_id`;


-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 04:17 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webwieco_tazzer`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_reviews`
--

CREATE TABLE `job_reviews` (
  `id` int(255) NOT NULL,
  `job_post_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `reviews` varchar(255) DEFAULT NULL,
  `title_of_review` varchar(255) DEFAULT NULL,
  `review_comment` varchar(255) DEFAULT NULL,
  `date_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_reviews`
--

INSERT INTO `job_reviews` (`id`, `job_post_id`, `user_id`, `provider_id`, `reviews`, `title_of_review`, `review_comment`, `date_time`) VALUES
(21, '7', '1', ' ', '3', '2', 'regre', 'June07:15:00pm'),
(22, '2', '1', ' ', '4', '2', 'ewrfewr', 'June07:29:46pm'),
(23, '7', ' ', '1', '3', '3', 'dfgds', 'June07:34:09pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_reviews`
--
ALTER TABLE `job_reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_reviews`
--
ALTER TABLE `job_reviews`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


