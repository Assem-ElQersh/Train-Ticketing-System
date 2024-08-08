-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 06:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travels_and_trains`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`) VALUES
(1, 'admin@example.com', '$2y$10$vd6VjVR/R4ZnJcnavjWo6u0w90h2txqZX2As1iIrRAXW99njKM3X6');

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`id`, `email`, `name`, `password`, `location`) VALUES
(1, 'aya@gmail.com', 'Ayatollah', '$2y$10$uMi06DAXXrPKb0tDlJNyfuloEo3y6Rb.guq8jqPbLc7ICNnWDAksm', 'Mansoura'),
(2, 'ayaelkolaly60@gmail.com', 'Ayatollah', '$2y$10$zJhZri02uNIt3lcjun56p.Dt3HsLWjtc8DwUu9B4x85cUQHofmow.', 'BorgElArab');

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `id` int(11) NOT NULL,
  `train_id` int(11) NOT NULL,
  `train_name` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `leaving_time` time NOT NULL,
  `expected_arrival` time NOT NULL,
  `class` varchar(50) NOT NULL,
  `train_stops` text NOT NULL,
  `total_seats` int(11) NOT NULL,
  `available_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`id`, `train_id`, `train_name`, `destination`, `date`, `leaving_time`, `expected_arrival`, `class`, `train_stops`, `total_seats`, `available_seats`) VALUES
(1, 235, 'Alexandria Express', 'Alexandria', '2024-05-20', '08:00:00', '12:30:00', 'Standard', 'Cairo, Giza, Mansoura', 50, 44),
(2, 236, 'Nile Voyager', 'Luxor', '2024-05-20', '10:30:00', '04:45:00', 'First', 'Aswan, Edfu, Kom Ombo', 80, 79),
(3, 237, 'Delta Star', 'Tanta', '2024-05-20', '12:45:00', '02:15:00', 'Business', 'Zagazig, Banha', 100, 99),
(4, 238, 'Pharaoh\'s Journey', 'Aswan', '2024-05-20', '09:15:00', '07:00:00', 'Standard', 'Kom Ombo, Edfu, Luxor', 20, 17),
(5, 239, 'Oasis Express', 'Siwa', '2024-05-20', '06:30:00', '04:00:00', 'First', 'Marsa Matruh, Sallum', 50, 49),
(6, 240, 'Red Sea Explorer', 'Hurghada', '2024-05-20', '11:00:00', '02:45:00', 'Business', 'Safaga, El Quseir, Marsa Alam', 90, 90),
(7, 241, 'Pyramids Express', 'Giza', '2024-05-21', '03:45:00', '06:30:00', 'Standard', 'Cairo, Beni Suef', 155, 155),
(8, 242, 'Upper Egypt Majesty', 'Aswan', '2024-05-21', '07:30:00', '05:45:00', 'First', 'Edfu, Luxor, Qena', 80, 80),
(9, 243, 'Delta Dawn', 'Mansoura', '2024-05-21', '05:00:00', '07:30:00', 'Business', 'Zagazig, Tanta', 75, 73),
(10, 244, 'Oasis Oasis', 'Siwa', '2024-05-21', '01:00:00', '11:00:00', 'Standard', 'Marsa Matruh, Sallum', 76, 76),
(11, 245, 'Cairo Comet', 'Cairo', '2024-05-21', '09:00:00', '10:30:00', 'First', 'Giza', 44, 44),
(12, 246, 'Sphinx Sprinter', 'Luxor', '2024-05-21', '08:30:00', '02:00:00', 'Business', 'Aswan, Edfu', 80, 80),
(13, 247, 'Desert Eagle', 'Aswan', '2024-05-22', '07:15:00', '05:00:00', 'Standard', 'Kom Ombo, Edfu, Luxor, Qena', 60, 60),
(14, 248, 'Oasis Pioneer', 'Siwa', '2024-05-22', '05:45:00', '03:15:00', 'First', 'Marsa Matruh', 70, 69),
(15, 249, 'Suez Seeker', 'Suez', '2024-05-22', '04:30:00', '06:30:00', 'Standard', 'Ismailia', 190, 190),
(16, 250, 'Nile Navigator', 'Luxor', '2024-05-22', '02:00:00', '08:00:00', 'Business', 'Aswan', 70, 70),
(17, 251, 'Alexandria Adventurer', 'Alexandria', '2024-05-22', '07:00:00', '11:30:00', 'First', 'Cairo, Giza', 60, 59),
(18, 252, 'Delta Delight', 'Mansoura', '2024-05-23', '01:45:00', '04:15:00', 'Standard', 'Tanta, Zagazig', 90, 90),
(19, 253, 'Red Sea Racer', 'Hurghada', '2024-05-23', '06:00:00', '09:45:00', 'Business', 'El Quseir', 50, 50),
(20, 254, 'Pharaoh\'s Pride', 'Aswan', '2024-05-23', '08:00:00', '06:30:00', 'Standard', 'Edfu, Luxor', 80, 80),
(21, 255, 'Upper Egypt Express', 'Qena', '2024-05-23', '07:45:00', '04:30:00', 'First', 'Edfu, Luxor, Aswan', 100, 100),
(22, 256, 'Giza Glider', 'Giza', '2024-05-23', '10:15:00', '01:00:00', 'Standard', 'Cairo, Beni Suef', 20, 20),
(23, 257, 'Cairo Cruiser', 'Cairo', '2024-05-23', '11:00:00', '12:30:00', 'Business', 'Giza', 50, 50),
(24, 258, 'Delta Drifter', 'Tanta', '2024-05-24', '09:30:00', '11:00:00', 'First', 'Zagazig, Banha', 90, 90),
(25, 259, 'Nile Nomad', 'Luxor', '2024-05-24', '06:15:00', '12:30:00', 'Standard', 'Edfu, Kom Ombo', 155, 155),
(26, 260, 'Sphinx Soarer', 'Aswan', '2024-05-24', '03:00:00', '01:00:00', 'Business', 'Luxor, Edfu', 80, 80),
(27, 261, 'Red Sea Roamer', 'Hurghada', '2024-05-24', '05:30:00', '09:15:00', 'First', 'Safaga, El Quseir', 75, 75),
(28, 262, 'Desert Dasher', 'Aswan', '2024-05-24', '06:00:00', '04:00:00', 'Standard', 'Edfu, Luxor', 76, 76),
(29, 263, 'Upper Egypt Voyager', 'Luxor', '2024-05-24', '08:00:00', '02:00:00', 'First', 'Qena, Edfu', 44, 44),
(30, 264, 'Oasis Traveler', 'Siwa', '2024-05-24', '02:15:00', '11:45:00', 'Business', 'Marsa Matruh, Sallum', 80, 80),
(31, 265, 'Delta Voyager', 'Mansoura', '2024-05-24', '04:00:00', '06:30:00', 'Standard', 'Zagazig, Tanta', 60, 60),
(32, 111, 'Alexandria Express', 'Alexandria', '2024-05-23', '23:10:00', '01:10:00', 'Standard', 'Cairo, Giza, Mansoura', 80, 77),
(33, 333, 'Cairo Express', 'Cairo', '2024-05-24', '18:08:00', '21:08:00', 'Standard', 'Mansoura', 100, 3),
(34, 555, 'Oasis Oasis', 'Luxor', '2024-05-24', '12:09:00', '13:09:00', 'Standard', 'Aswan', 50, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trains`
--
ALTER TABLE `trains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
