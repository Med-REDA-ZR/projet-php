-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2024 at 04:02 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medic`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoiments`
--

CREATE TABLE `appoiments` (
  `id_app` int NOT NULL,
  `date_app` date NOT NULL,
  `time_app` time NOT NULL,
  `injury` varchar(100) NOT NULL,
  `id_pat` int NOT NULL,
  `id_dr` int NOT NULL,
  `id_dep` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appoiments`
--

INSERT INTO `appoiments` (`id_app`, `date_app`, `time_app`, `injury`, `id_pat`, `id_dr`, `id_dep`) VALUES
(62, '2024-02-26', '15:02:00', 'heart', 46, 56, 19),
(63, '2024-03-02', '19:01:00', 'heart', 47, 57, 20),
(64, '2024-03-31', '17:02:00', 'heart', 51, 59, 21),
(65, '2024-04-03', '17:02:00', 'heart', 49, 57, 20),
(66, '2024-02-26', '17:02:00', 'heart', 49, 58, 20),
(67, '2024-03-02', '19:01:00', 'heart', 50, 57, 20),
(68, '2024-03-31', '17:02:00', 'heart', 54, 59, 21),
(69, '2024-04-03', '17:02:00', 'heart', 51, 57, 20);

-- --------------------------------------------------------

--
-- Table structure for table `command`
--

CREATE TABLE `command` (
  `id_cmd` int NOT NULL,
  `product_id_cmd` int NOT NULL,
  `doctor_id_cmd` int NOT NULL,
  `date_cmd` date NOT NULL,
  `time_cmd` time NOT NULL,
  `qty_cmd` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `command`
--

INSERT INTO `command` (`id_cmd`, `product_id_cmd`, `doctor_id_cmd`, `date_cmd`, `time_cmd`, `qty_cmd`) VALUES
(1, 1, 1, '2023-06-23', '00:05:00', 50),
(2, 5, 4, '2023-06-21', '03:06:00', 9),
(3, 2, 1, '2023-06-23', '00:13:00', 20),
(4, 1, 3, '2023-06-23', '05:22:00', 100),
(5, 1, 4, '2023-07-01', '00:27:00', 100),
(6, 2, 47, '2023-06-26', '10:22:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id_dep` int NOT NULL,
  `name_dep` varchar(50) NOT NULL,
  `desc_dep` varchar(500) NOT NULL,
  `photo_dep` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_dr` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id_dep`, `name_dep`, `desc_dep`, `photo_dep`, `id_dr`) VALUES
(19, 'dep 1', 'DEPARTMENT OF', '471892close-up-heart-rate-monitor-measuring-heartbeat-patient-doing-gymnastics-physical-recovery-retired-man-using-sport-equipment-exercise-physiotherapy-strength.jpg', 58),
(20, 'dep 2', 'DEPARTMENT OF', '838762close-up-heart-rate-monitor-measuring-heartbeat-patient-doing-gymnastics-physical-recovery-retired-man-using-sport-equipment-exercise-physiotherapy-strength.jpg', 60),
(21, 'dep 3', 'DEPARTMENT OF\r\n', '51085close-up-heart-rate-monitor-measuring-heartbeat-patient-doing-gymnastics-physical-recovery-retired-man-using-sport-equipment-exercise-physiotherapy-strength.jpg', 60);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id_dr` int NOT NULL,
  `name_dr` varchar(50) NOT NULL,
  `speciality_dr` varchar(50) NOT NULL,
  `phone_dr` varchar(20) NOT NULL,
  `adresse_dr` varchar(500) NOT NULL,
  `profile_dr` varchar(500) NOT NULL,
  `email_dr` varchar(100) NOT NULL,
  `gender_dr` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id_dr`, `name_dr`, `speciality_dr`, `phone_dr`, `adresse_dr`, `profile_dr`, `email_dr`, `gender_dr`) VALUES
(56, 'doctor 1', 'HEART', 'ooooooooooooooo', 'maroc', '960192portrait-smiling-handsome-male-doctor-man.jpg', 'xxxxxx@gmail.com', 'Male'),
(57, 'doctor 2', 'HEART2', 'ooooooooooooooo', 'maroc', '54913portrait-smiling-handsome-male-doctor-man.jpg', 'xxxxxx@gmail.com', ''),
(58, 'doctor 3', 'HEART2', 'ooooooooooooooo', 'maroc', '527628portrait-smiling-handsome-male-doctor-man.jpg', 'xxxxxx@gmail.com', 'Female'),
(59, 'doctor 4', 'HEART2', 'ooooooooooooooo', 'maroc', '941909portrait-smiling-handsome-male-doctor-man.jpg', 'xxxxxx@gmail.com', 'Male'),
(60, 'doctor 5', 'HEART2', 'ooooooooooooooo', 'maroc', '736461portrait-smiling-young-woman-doctor-healthcare-medical-worker-pointing-fingers-left-showing-clini.jpg', 'xxxxxx@gmail.com', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id_pat` int NOT NULL,
  `name_pat` varchar(100) NOT NULL,
  `phone_pat` varchar(20) NOT NULL,
  `age_pat` int NOT NULL,
  `gender_pat` varchar(10) NOT NULL,
  `adresse_pat` varchar(500) NOT NULL,
  `profile_pat` varchar(500) NOT NULL,
  `email_pat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id_pat`, `name_pat`, `phone_pat`, `age_pat`, `gender_pat`, `adresse_pat`, `profile_pat`, `email_pat`) VALUES
(46, 'PATIENT 1', '00000000000', 18, 'Male', 'maroc', 'P1.png', 'PATIENT1@gmail.com'),
(47, 'PATIENT 2', '00000000000', 25, 'Male', 'maroc', 'P1.png', 'PATIENT2@gmail.com'),
(48, 'PATIENT 3', '00000000000', 27, 'Male', 'maroc', 'P1.png', 'PATIENT3@gmail.com'),
(49, 'PATIENT 4', '00000000000', 50, 'Male', 'maroc', 'P1.png', 'PATIENT4@gmail.com'),
(50, 'PATIENT 5', '00000000000', 89, 'Male', 'maroc', 'P1.png', 'PATIENT5@gmail.com'),
(51, 'PATIENT 6', '00000000000', 56, 'Male', 'maroc', 'P1.png', 'PATIENT6@gmail.com'),
(52, 'PATIENT 7', '00000000000', 45, 'Male', 'maroc', 'P1.png', 'PATIENT7@gmail.com'),
(53, 'PATIENT 8', '00000000000', 50, 'MALE', 'maroc', 'P1.png', 'PATIENT8@gmail.com'),
(54, 'PATIENT 9', '00000000000', 78, 'Female', 'maroc', '380856P1.png', 'PATIENT9@gmail.com'),
(55, 'PATIENT 10', '00000000000', 98, 'Female', 'maroc', '380856P1.png', 'PATIENT10@gmail.com'),
(56, 'PATIENT 11', '00000000000', 98, 'Female', 'maroc', '380856P1.png', 'PATIENT11@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id_pay` int NOT NULL,
  `date_pay` date NOT NULL,
  `id_pat` int NOT NULL,
  `id_dr` int NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id_pay`, `date_pay`, `id_pat`, `id_dr`, `total`) VALUES
(10, '2024-03-31', 47, 57, 62.8),
(11, '2024-03-13', 49, 57, 964.8);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_prod` int NOT NULL,
  `name_prod` varchar(250) NOT NULL,
  `img_prod` varchar(500) NOT NULL,
  `prix_prod` double NOT NULL,
  `qty_prod` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_prod`, `name_prod`, `img_prod`, `prix_prod`, `qty_prod`) VALUES
(1, 'prod 1', 'prod1.png', 500, 0),
(2, 'prod 2', 'prod1.png', 430.5, 18),
(3, 'prod 3', 'prod1.png', 95, 123),
(5, 'prod x', 'photo.jpeg', 56, 787);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(1, 'Sample 101', 'This is a sample schedule only.', '2022-01-10 10:30:00', '2022-01-11 18:00:00'),
(2, 'Sample 102', 'Sample Description 102', '2022-01-08 09:30:00', '2022-01-08 11:30:00'),
(4, 'Sample 102', 'Sample Description', '2022-01-12 14:00:00', '2022-01-12 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `Pwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `Nom`, `login`, `Pwd`) VALUES
(2, 'reda', 'reda', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoiments`
--
ALTER TABLE `appoiments`
  ADD PRIMARY KEY (`id_app`),
  ADD KEY `FK_app_pat` (`id_pat`),
  ADD KEY `FK_app_dr` (`id_dr`),
  ADD KEY `FK_app_dep` (`id_dep`);

--
-- Indexes for table `command`
--
ALTER TABLE `command`
  ADD PRIMARY KEY (`id_cmd`),
  ADD KEY `FK_Comm_Prod` (`product_id_cmd`),
  ADD KEY `FK_Comm_Dr` (`doctor_id_cmd`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id_dep`),
  ADD KEY `FK_dep_dr` (`id_dr`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id_dr`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id_pat`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id_pay`),
  ADD KEY `FK_pay_pat` (`id_pat`),
  ADD KEY `FK_pay_dr` (`id_dr`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoiments`
--
ALTER TABLE `appoiments`
  MODIFY `id_app` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `command`
--
ALTER TABLE `command`
  MODIFY `id_cmd` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id_dep` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id_dr` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id_pat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id_pay` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_prod` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appoiments`
--
ALTER TABLE `appoiments`
  ADD CONSTRAINT `FK_app_dep` FOREIGN KEY (`id_dep`) REFERENCES `department` (`id_dep`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_app_dr` FOREIGN KEY (`id_dr`) REFERENCES `doctors` (`id_dr`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_app_pat` FOREIGN KEY (`id_pat`) REFERENCES `patients` (`id_pat`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `FK_dep_dr` FOREIGN KEY (`id_dr`) REFERENCES `doctors` (`id_dr`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `FK_pay_dr` FOREIGN KEY (`id_dr`) REFERENCES `doctors` (`id_dr`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_pay_pat` FOREIGN KEY (`id_pat`) REFERENCES `patients` (`id_pat`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
