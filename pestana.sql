-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 28, 2022 at 10:34 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pestana`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `cin` varchar(80) NOT NULL,
  `country` varchar(100) NOT NULL,
  `poste` varchar(100) NOT NULL,
  `img` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `birthday`, `cin`, `country`, `poste`, `img`, `date`) VALUES
(2, 'Samir', '2022-12-23', 'HH30293', 'AR', 'Security', 'ait elkadi.jpeg', '2022-12-19 14:06:54'),
(3, 'Mohamed Moustaghfir', '2022-12-04', 'HH782733', 'CL', 'Manager', 'mousta.jpeg', '2022-12-21 09:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `name`, `birthday`, `reservation_id`, `user_id`) VALUES
(1, 'hiuh', '2022-12-14', 31, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `debut_date` date NOT NULL,
  `final_date` date NOT NULL,
  `persons_num` int(11) DEFAULT NULL,
  `total` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `user_id`, `room_id`, `debut_date`, `final_date`, `persons_num`, `total`, `date`) VALUES
(16, 10, 18, '2023-01-01', '2023-01-10', NULL, 7704, '2022-12-27 21:44:51'),
(18, 11, 28, '2023-01-21', '2023-01-25', NULL, 3780, '2022-12-28 10:59:04'),
(19, 11, 10, '2023-01-03', '2023-01-08', NULL, 1225, '2022-12-28 11:01:49'),
(20, 11, 15, '2023-01-06', '2023-01-10', NULL, 28, '2022-12-28 11:02:02'),
(21, 10, 10, '2022-12-29', '2022-12-31', NULL, 250, '2022-12-28 15:13:29'),
(28, 1, 14, '2023-01-11', '2023-01-14', 3, 2232, '2022-12-28 18:03:20'),
(30, 1, 24, '2023-01-05', '2023-01-17', NULL, 5928, '2022-12-28 19:40:15'),
(31, 1, 14, '2023-01-07', '2023-01-10', 3, 2232, '2022-12-28 21:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `price` double NOT NULL,
  `type` enum('single','double','suite') NOT NULL,
  `suite_type` varchar(80) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `media` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `num`, `capacity`, `price`, `type`, `suite_type`, `date`, `media`) VALUES
(10, 62, 85, 245, 'single', '', '2022-12-27 14:47:14', 'Array'),
(11, 50, 2, 538, 'double', '', '2022-12-21 16:00:54', 'Array'),
(12, 6, 2, 77, 'double', '', '2022-12-20 21:50:22', 'Array'),
(13, 75, 2, 451, 'double', '', '2022-12-20 21:50:50', 'Array'),
(14, 12, 6, 744, 'suite', 'Presidential', '2022-12-25 15:27:11', 'Array'),
(15, 1, 1, 7, 'single', '', '2022-12-23 09:11:55', 'Array'),
(16, 76, 6, 552, 'suite', 'Presidential', '2022-12-25 15:27:26', 'Array'),
(17, 25, 2, 150, 'double', '', '2022-12-24 16:02:37', 'Array'),
(18, 16, 1, 856, 'single', '', '2022-12-20 21:52:35', 'Array'),
(19, 19, 1, 102, 'single', '', '2022-12-20 21:52:46', 'Array'),
(20, 45, 6, 65, 'suite', 'Honeymoon', '2022-12-25 15:27:32', 'Array'),
(21, 43, 1, 617, 'single', '', '2022-12-20 21:53:20', 'Array'),
(22, 61, 1, 139, 'single', '', '2022-12-20 22:24:37', 'Array'),
(23, 11, 6, 663, 'suite', 'Honeymoon', '2022-12-25 15:27:47', 'Array'),
(24, 20, 2, 494, 'double', '', '2022-12-20 22:34:02', 'Array'),
(25, 768, 6, 32, 'suite', 'Honeymoon', '2022-12-25 15:27:53', 'Array'),
(26, 90, 6, 213, 'suite', 'Junior', '2022-12-22 13:52:23', 'Array'),
(27, 56, 6, 200, 'suite', 'Junior', '2022-12-24 14:59:49', 'Array'),
(28, 85, 1, 945, 'single', '', '2022-12-24 20:31:53', 'Array'),
(29, 99, 2, 300, 'double', '', '2022-12-28 17:37:28', 'Array'),
(30, 123, 1, 40, 'single', '', '2022-12-28 20:58:08', 'Array');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(80) NOT NULL,
  `cin` varchar(20) NOT NULL,
  `loyal` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `country` varchar(80) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `birthday`, `email`, `password`, `cin`, `loyal`, `role`, `country`, `img`) VALUES
(1, 'Ahmed Ennaime', '2002-04-19', 'ahmedennaime20@gmail.com', '$2y$10$kQOo58GMh/eaYoyiSeIKbOl5JLFUlWBYT9bK33gJt2tUCXQJweaHu', 'HH33020', 0, 0, 'MA', 'ennaime.jpeg'),
(10, 'Jalal lagdimi', '2022-12-02', 'zray9a@gmail.com', '$2y$10$WzihFOEiIAnCmf5t0rEbAOcB0N9x5D4.oVy7rzWxHdPl/vBN4a.au', 'HH213242', 1, 1, 'FR', 'lagdimi.jpeg'),
(11, 'Mohamed Moustaghfir', '2022-12-17', 'mousta@gmail.com', '$2y$10$FhNGipXhfzkpugN5BtKeGedakyIEwZBIPetbaIV9pGN/UaF3hirbe', 'HH238823', 1, 1, 'DK', 'mousta.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cin` (`cin`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_id` (`reservation_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `num` (`num`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cin` (`cin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guests`
--
ALTER TABLE `guests`
  ADD CONSTRAINT `guests_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `guests_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
