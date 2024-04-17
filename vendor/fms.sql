-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 07:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fms`
--

-- --------------------------------------------------------

--
-- Table structure for table `dailymilk`
--

CREATE TABLE `dailymilk` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `farmer_name` varchar(40) NOT NULL,
  `temp` decimal(5,2) NOT NULL,
  `fat` decimal(5,2) DEFAULT NULL,
  `qty` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dailymilk`
--

INSERT INTO `dailymilk` (`id`, `date`, `user_id`, `contact_no`, `farmer_name`, `temp`, `fat`, `qty`) VALUES
(8, '2023-12-07 08:57:16', 1, '9819819790', 'Ram Singh', 24.00, 6.00, 33.00),
(9, '2023-12-07 09:00:59', 3, '9819819792', 'Arjun karn', 0.00, 5.00, 2.00),
(10, '2023-12-07 09:02:22', 6, '9877875769', 'Vijay Singh', 0.00, 0.00, 1.00),
(11, '2023-12-07 09:05:36', 3, '9819819792', 'Arjun karn', 0.00, 5.00, 4.00),
(12, '2023-12-07 09:06:21', 1, '9819819790', 'Ram Singh', 0.00, 6.00, 2.00),
(13, '2023-12-07 09:07:24', 4, '9877776654', 'Sita Shah', 0.00, 0.00, 5.00),
(14, '2023-12-07 09:07:42', 1, '9819819790', 'Ram Singh', 22.00, 6.00, 3.00),
(15, '2023-12-07 09:07:54', 1, '9819819790', 'Ram Singh', 22.00, 6.00, 4.00),
(16, '2023-12-07 09:08:03', 3, '9819819792', 'Arjun karn', 0.00, 5.00, 4.00),
(17, '2023-12-08 02:05:16', 1, '9877453224', 'Rahul Sharma', 22.00, 6.00, 7.00),
(19, '2023-12-08 02:59:20', 8, '9877765434', 'Hari Ram', 0.00, 0.00, 1.00),
(20, '2023-12-08 02:59:49', 8, '9877765434', 'Hari Ram', 0.00, 0.00, 1.00),
(21, '2023-12-08 03:00:14', 8, '9877765434', 'Hari Ram', 0.00, 0.00, 12.00),
(22, '2023-12-08 03:33:22', 10, '9819819790', 'Pradip Mahato', 22.00, 7.00, 12.00),
(23, '2023-12-08 03:33:48', 10, '9819819790', 'Pradip Mahato', 22.00, 7.00, 2.00),
(24, '2023-12-08 03:34:01', 10, '9819819790', 'Pradip Mahato', 22.00, 7.00, 22.00),
(25, '2023-12-11 07:22:30', 10, '9819819790', 'Pradip Mahato', 22.00, 7.00, 6.00),
(26, '2023-12-27 15:01:54', 10, '9819819790', 'Pradip Mahato', 22.00, 7.00, 6.00);

-- --------------------------------------------------------

--
-- Table structure for table `farmer_login`
--

CREATE TABLE `farmer_login` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmer_login`
--

INSERT INTO `farmer_login` (`id`, `first_name`, `last_name`, `address`, `contact_no`, `password`, `gender`) VALUES
(4, 'Ram', 'Singh', 'Barahathawa,', '8776556454', '6a660357993859347877bfe7399d962626fe352e', 'male'),
(5, 'Shiva', 'singh', 'Sarlahi', '9888888888', '9c501fccc9663d6b23bd2d098f483960ab09c8ea', 'male'),
(6, 'Vijay', 'Singh', 'Sarlahi', '9877875769', 'c7c3ef52119e55790b7dd5b1603c355338efe6f0', 'male'),
(9, 'Sita', 'Shah', 'Sarlahi', '9876545432', '875ad08465756b79b381cd52ed07ccd5deb24ed1', 'female'),
(10, 'Pradip', 'Mahato', 'Barahathawa, Sarlahi, Barahathawa 4, (near Lalbandi city)', '9819819790', '4efa63182cf614f963dbad96d9f1bd4a6fc61e96', 'male'),
(11, 'Vijay', 'Mahato', 'Sarlahi', '9877777777', 'c7c3ef52119e55790b7dd5b1603c355338efe6f0', 'male'),
(12, 'Rahul', 'Singh', 'Sarlahi', '9888888881', 'e7b3fae2e65175774b0b491ff6f2b8f151bc2e46', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `user_id`, `amount`, `payment_date`) VALUES
(1, 4, 50.00, '2023-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `current_rate` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `current_rate`) VALUES
(1, 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `totalmilk`
--

CREATE TABLE `totalmilk` (
  `user_id` int(11) NOT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `total_qty` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`user_id`, `username`, `password`) VALUES
(3, 'Hanuman', '6babccecd90dffafb922dbc7ec93a7200c214469'),
(15, 'Shiva', '9c501fccc9663d6b23bd2d098f483960ab09c8ea');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view2_totalmilk`
-- (See below for the actual view)
--
CREATE TABLE `view2_totalmilk` (
`farmer_id` int(11)
,`farmer_name` varchar(511)
,`contact_no` varchar(10)
,`total_qty` decimal(27,2)
,`total_amount` decimal(37,4)
,`paid_amount` decimal(32,2)
,`due_amount` decimal(38,4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_totalmilk`
-- (See below for the actual view)
--
CREATE TABLE `view_totalmilk` (
`farmer_id` int(11)
,`farmer_name` varchar(511)
,`contact_no` varchar(10)
,`total_qty` decimal(27,2)
,`total_amount` decimal(37,4)
,`paid_amount` decimal(32,2)
,`due_amount` decimal(38,4)
);

-- --------------------------------------------------------

--
-- Structure for view `view2_totalmilk`
--
DROP TABLE IF EXISTS `view2_totalmilk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view2_totalmilk`  AS SELECT `f`.`id` AS `farmer_id`, concat(`f`.`first_name`,' ',`f`.`last_name`) AS `farmer_name`, `f`.`contact_no` AS `contact_no`, sum(`d`.`qty`) AS `total_qty`, sum(`d`.`qty` * `r`.`current_rate`) AS `total_amount`, ifnull(sum(`p`.`amount`),0) AS `paid_amount`, sum(`d`.`qty` * `r`.`current_rate`) - ifnull(sum(`p`.`amount`),0) AS `due_amount` FROM (((`farmer_login` `f` left join `dailymilk` `d` on(`f`.`id` = `d`.`user_id`)) left join `rate` `r` on(1 = 1)) left join `payments` `p` on(`f`.`id` = `p`.`user_id`)) GROUP BY `f`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `view_totalmilk`
--
DROP TABLE IF EXISTS `view_totalmilk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_totalmilk`  AS SELECT `f`.`id` AS `farmer_id`, concat(`f`.`first_name`,' ',`f`.`last_name`) AS `farmer_name`, `f`.`contact_no` AS `contact_no`, coalesce(sum(`d`.`qty`),0) AS `total_qty`, coalesce(sum(`d`.`qty` * `r`.`current_rate`),0) AS `total_amount`, coalesce(sum(`p`.`amount`),0) AS `paid_amount`, coalesce(sum(`d`.`qty` * `r`.`current_rate`),0) - coalesce(sum(`p`.`amount`),0) AS `due_amount` FROM (((`farmer_login` `f` left join `dailymilk` `d` on(`f`.`id` = `d`.`user_id`)) left join `rate` `r` on(1 = 1)) left join `payments` `p` on(`f`.`id` = `p`.`user_id`)) GROUP BY `f`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dailymilk`
--
ALTER TABLE `dailymilk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmer_login`
--
ALTER TABLE `farmer_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `totalmilk`
--
ALTER TABLE `totalmilk`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dailymilk`
--
ALTER TABLE `dailymilk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `farmer_login`
--
ALTER TABLE `farmer_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
