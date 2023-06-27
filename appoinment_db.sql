-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 08:08 PM
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
-- Database: `appoinment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `admin_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `email`, `password`, `admin_name`) VALUES
(1, 'superadmin@gmail.com', '$2y$10$Utfk/h7zcioes8Zfxvi0uec3dI1GaHLXgkpT3rDQobRaXxvx24.Vu', 'Shermayne OOI Francisco'),
(2, 'mariel_sicuan@gmail.com', '$2y$10$soHfGUKA465eGF4xJH13m.fulkHML2Hb54RwUMZQOMmwHk.mQPw2i', 'Mariel Sicuan'),
(3, 'marcelo_abalos@gmail.com', '$2y$10$soHfGUKA465eGF4xJH13m.fulkHML2Hb54RwUMZQOMmwHk.mQPw2i', 'Marcelo Abalos Jr.');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_tbl`
--

CREATE TABLE `appointment_tbl` (
  `app_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `app_type` text NOT NULL,
  `status` text NOT NULL,
  `app_date` date NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `app_time` time NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_tbl`
--

INSERT INTO `appointment_tbl` (`app_id`, `user_id`, `pet_id`, `app_type`, `status`, `app_date`, `created_at`, `app_time`, `updated_at`) VALUES
(9, 3, 17, 'grooming', 'Completed', '2023-04-19', '2023-04-21', '00:00:00', '2023-06-26 06:01:46'),
(22, 6, 19, 'grooming', 'Pending', '2023-06-22', '2023-06-22', '00:00:00', '2023-06-26 06:01:46'),
(23, 7, 22, 'deworming', 'Pending', '2023-06-22', '2023-06-22', '00:00:00', '2023-06-26 06:01:46'),
(24, 3, 17, 'vaccination', 'Confirm', '2023-06-21', '2023-06-23', '00:00:00', '2023-06-27 09:56:36'),
(25, 6, 19, 'other', 'Completed', '2023-06-30', '2023-06-23', '00:00:00', '2023-06-27 09:49:04'),
(26, 7, 22, 'grooming', 'Cancel', '2023-06-28', '2023-06-23', '00:00:00', '2023-06-25 22:05:34'),
(27, 3, 17, 'heartworm', 'Completed', '2023-06-23', '2023-06-23', '00:00:00', '2023-06-27 09:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `completed_tbl`
--

CREATE TABLE `completed_tbl` (
  `completed_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `app_type` text NOT NULL,
  `name_of_medicine` text NOT NULL,
  `pet_weight` text NOT NULL,
  `app_date` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `completed_tbl`
--

INSERT INTO `completed_tbl` (`completed_id`, `user_id`, `pet_id`, `app_type`, `name_of_medicine`, `pet_weight`, `app_date`, `updated_at`, `created_at`) VALUES
(1, 3, 17, 'Deworming', 'Solmux', '6.8kg', '2023-04-24', '2023-06-27 17:13:37', '2023-06-27 17:13:37'),
(3, 3, 17, 'Vaccination', 'Nobivac', '5.5kg', '2023-05-15', '2023-06-27 17:13:37', '2023-06-27 17:13:37'),
(14, 6, 19, 'Grooming', 'Bactidol', '8kg', '2023-06-30', '2023-06-27 09:49:04', '2023-06-27 09:49:04'),
(15, 3, 17, 'heartworm', 'Bactidol , Solmux , Biogesic', '8kg', '2023-06-23', '2023-06-27 09:54:03', '2023-06-27 09:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `pending_tbl`
--

CREATE TABLE `pending_tbl` (
  `pending_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `app_type` text NOT NULL,
  `app_date` date NOT NULL,
  `app_time` time NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pet_tbl`
--

CREATE TABLE `pet_tbl` (
  `pet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pet_name` text NOT NULL,
  `pet_cm` text NOT NULL,
  `pet_breed` text NOT NULL,
  `birthdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gender` text NOT NULL,
  `species` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_tbl`
--

INSERT INTO `pet_tbl` (`pet_id`, `user_id`, `pet_name`, `pet_cm`, `pet_breed`, `birthdate`, `gender`, `species`) VALUES
(17, 3, 'Akios', 'Brown', 'Shih Tzu', '2023-06-23 06:41:47', 'Female', ''),
(19, 6, 'Negra', 'Black', 'Aspin', '2023-05-17 16:00:00', 'Female', ''),
(22, 7, 'Negra', 'black', 'beagle', '2023-06-26 04:24:12', 'Female', 'Canine');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fname` text NOT NULL,
  `user_lname` text NOT NULL,
  `contact` text NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `contact`, `address`, `email`, `password`) VALUES
(3, 'Shermayne', 'Francisco', '09705759514', 'Olongapo City', 'ooi@gmail.com', '$2y$10$soHfGUKA465eGF4xJH13m.fulkHML2Hb54RwUMZQOMmwHk.mQPw2i'),
(6, 'Mirasol', 'Francisco', '09762419911', 'Calapacuan, Subic, Zambales', 'mira@gmail.com', '$2y$10$es5kcRAM8v91baQDlX1E.uY8b4KfQ9ALqA/wMYYr0pRFLvwCU.Jjm'),
(7, 'Edrian', 'Francisco', '09705759514', 'Calapacuan, Subic, Zambales', 'edrian.f@gmail.com', '$2y$10$VNk1aHP3lJVIpOklux17/eVfQdiJ.IWK6NdRs9E8xDQIGHjifVLFm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointment_tbl`
--
ALTER TABLE `appointment_tbl`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `completed_tbl`
--
ALTER TABLE `completed_tbl`
  ADD PRIMARY KEY (`completed_id`);

--
-- Indexes for table `pending_tbl`
--
ALTER TABLE `pending_tbl`
  ADD PRIMARY KEY (`pending_id`);

--
-- Indexes for table `pet_tbl`
--
ALTER TABLE `pet_tbl`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointment_tbl`
--
ALTER TABLE `appointment_tbl`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `completed_tbl`
--
ALTER TABLE `completed_tbl`
  MODIFY `completed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pet_tbl`
--
ALTER TABLE `pet_tbl`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
