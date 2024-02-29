-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 06:20 AM
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
-- Database: `aadvik`
--

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `Email` varchar(255) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`Email`, `Name`, `Password`) VALUES
('email.random789@yopmail.com', 'Sofia Garcia', 'fMlAiC7J'),
('email.test456@live.com', 'Daniel Kim', 'qvY0sMfE'),
('emailrandom456@rediffmail.com', 'Lucas Rodriguez', 'LyBbjNLC'),
('emailuser654@outlook.com', 'Sarah Lee', '9NPw229W'),
('example.user890@zoho.com', 'Sophia Garcia', 'YZZ6yzWt'),
('example123@email.com', 'Alice Smith', 'TV6le4pr'),
('mail.random789@protonmail.com', 'Rachel Adams', 'nWVEoSqF'),
('mailtest123@fastmail.com', 'Oliver Smith', '1av0dvED'),
('mishita@gmail.com', 'Mishita Soni', 'mishita'),
('random.email123@tutanota.com', 'William Johnson', 'wXwdlJJf'),
('random.mail123@icloud.com', 'Jessica Miller', 'HY2UIE5n'),
('randomuser1234@inbox.com', 'Alexander Nguyen', 'Zia4ulmE'),
('random_user456@hotmail.com', 'Bob Johnson', 'wBRnfRNh'),
('sample.user456@rocketmail.com', 'Daniel Brown', '9bcUd7FL'),
('sampleemail987@aol.com', 'Michael Chang', 'jzDcpTTH'),
('test.email567@yandex.com', 'Emma Wilson', 'StZ4Eubi'),
('test.email789@gmail.com', 'Emily Brown', 'AWEsMiVD'),
('user.random321@yahoo.com', 'David Wilson', 'Jb8gkw59'),
('user.test789@mail.com', 'Isabella Martinez', 'PVRrsHk0'),
('useremail789@domain.com', 'Laura Martinez', 'ZWzV74Ac'),
('usermail123@mailinator.com', 'Ethan Wilson', 'JYmCba9c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
