-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 20, 2018 at 10:35 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doxfory`
--

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `time_posted` int(16) NOT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `description` varchar(4098) NOT NULL,
  `image` varchar(4098) NOT NULL,
  `notify` tinyint(1) NOT NULL DEFAULT '0',
  `posted_by_id` int(11) NOT NULL,
  `accepted_by_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `time_posted`, `is_completed`, `title`, `description`, `image`, `notify`, `posted_by_id`, `accepted_by_id`) VALUES
(1, 1518725049, 0, 'Eat an apple', 'I need a friend to eat an apple a day to keep the doctor away', '/doxfory/html/img/uploads/job/1.png', 1, 1, 1),
(2, 1518725372, 0, 'Some thing', 'other thing', '', 1, 1, 1),
(3, 1518725488, 0, 'Some other job', 'yea', '/doxfory/html/img/uploads/job/3.png', 1, 1, 1),
(4, 1518725630, 0, 'Title', 'Job Description', '', 1, 1, 1),
(5, 1518725661, 0, 'Title2', 'Description', '', 1, 1, 1),
(6, 1518732135, 0, 'Grass', 'Can someone cut my grass?', '/doxfory/html/img/uploads/job/6.png', 1, 1, 1),
(7, 1518834428, 0, 'Coin miner', 'Need someone to lend me their computer for about 3 months to use it to mine doge coins', '/doxfory/html/img/uploads/job/7.png', 1, 1, 1),
(8, 1518841782, 0, 'House Paint', 'Can someone come paint my house like a nice blue color??', '/doxfory/html/img/uploads/job/8.png', 1, 1, 1),
(9, 1518899676, 0, 'Programmer', 'Need someone to do my programming homework for me', '/doxfory/html/img/uploads/job/9.png', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_payment`
--

CREATE TABLE `job_payment` (
  `job_id` int(11) NOT NULL,
  `money_amount` double(8,2) NOT NULL,
  `is_online_pay` tinyint(1) NOT NULL DEFAULT '0',
  `is_in_person_pay` tinyint(1) NOT NULL DEFAULT '0',
  `is_barter` tinyint(1) NOT NULL DEFAULT '0',
  `barter_item` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_payment`
--

INSERT INTO `job_payment` (`job_id`, `money_amount`, `is_online_pay`, `is_in_person_pay`, `is_barter`, `barter_item`) VALUES
(1, 9000.00, 1, 0, 0, ''),
(2, 9090.90, 1, 0, 0, ''),
(3, 9090.90, 1, 0, 0, ''),
(4, 10.00, 1, 0, 0, ''),
(5, 10.00, 1, 0, 0, ''),
(6, 25.00, 1, 0, 0, ''),
(7, 90.00, 1, 0, 0, ''),
(8, 100.00, 1, 0, 0, ''),
(9, 0.00, 0, 0, 1, 'Chair');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(16) NOT NULL,
  `last_name` varchar(16) NOT NULL,
  `occupation` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `about_me` varchar(4098) NOT NULL,
  `up_votes` int(11) NOT NULL,
  `date_joined` int(16) NOT NULL,
  `confirmation_key` varchar(32) NOT NULL,
  `reset_key` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `occupation`, `password`, `profile_picture`, `about_me`, `up_votes`, `date_joined`, `confirmation_key`, `reset_key`) VALUES
(1, 'Oscar', 'Torres', '', '$2a$12$PMsAIq3xwSxNo8JoyM/D6.DmfCB5tCoBqfqjDrFJR8npNEermBUJ.', '/doxfory/html/img/uploads/pfp/1.png', 'College dropout 1 semester before graduation, now a millioniare', 0, 1518501600, '', ''),
(2, 'Oscar2', 'Torres', '', '$2a$12$8odCYzwQrIWAEIMtoS/PGOSs0XX0KNA/jejvyzJefDKqpRYP060u2', '', '', 0, 1518760800, '', ''),
(3, 'Oscar3', 'Torres', '', '$2a$12$Q8pEKiNFTSDJeXowueHGYuTkBM7fsRML7ze0gkZqonl4X/nGBn0L.', '', '', 0, 1519106400, '', ''),
(4, 'Oscar4', 'Torres', '', '$2a$12$T0vfNvMhCcuPbg.I2ntKgOkE24znSyZxcL/Cta9nd8LhdJfH9vhY.', '', '', 0, 1519106400, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_contact_info`
--

CREATE TABLE `user_contact_info` (
  `user_id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone_number` varchar(32) NOT NULL,
  `facebook` varchar(64) NOT NULL,
  `twitter` varchar(64) NOT NULL,
  `instagram` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_contact_info`
--

INSERT INTO `user_contact_info` (`user_id`, `email`, `phone_number`, `facebook`, `twitter`, `instagram`) VALUES
(1, 'oscar0812torres@gmail.com', '(956) 261-0575', '', '', 'oscarr0812'),
(2, 'oscar0812torres2@gmail.com', '', '', '', ''),
(3, 'oscar0812torres3@gmail.com', '', '', '', ''),
(4, 'oscar0812torres4@gmail.com', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posted_by_id` (`posted_by_id`),
  ADD KEY `accepted_by_id` (`accepted_by_id`);

--
-- Indexes for table `job_payment`
--
ALTER TABLE `job_payment`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_contact_info`
--
ALTER TABLE `user_contact_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_contact_info`
--
ALTER TABLE `user_contact_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`posted_by_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`accepted_by_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `job_payment`
--
ALTER TABLE `job_payment`
  ADD CONSTRAINT `job_payment_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`);

--
-- Constraints for table `user_contact_info`
--
ALTER TABLE `user_contact_info`
  ADD CONSTRAINT `user_contact_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
