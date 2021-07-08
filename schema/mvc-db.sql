-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 08, 2021 at 09:33 PM
-- Server version: 8.0.23
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `isbn` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `author` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`isbn`, `title`, `author`, `genre`) VALUES
(1234, 'The Kite Runner', 'Khaled Hosseini', 'Non-Fiction'),
(1235, 'book2', 'auth2', 'genre2'),
(1236, 'book3', 'auth3', 'genre2'),
(1237, 'book4', 'auth4', 'genre2'),
(1238, 'book5', 'auth5', 'genre2'),
(1239, 'book6', 'auth6', 'genre2'),
(1240, 'book7', 'auth7', 'genre2'),
(1241, 'book8', 'auth8', 'genre2'),
(1242, 'book9', 'auth9', 'genre2'),
(1243, 'book10', 'aut10', 'genre2'),
(12344, 'hello', 'hi', 'bye');

-- --------------------------------------------------------

--
-- Table structure for table `book_status`
--

CREATE TABLE `book_status` (
  `id` int NOT NULL,
  `isbn` varchar(280) NOT NULL,
  `email` varchar(280) NOT NULL,
  `status` varchar(280) NOT NULL,
  `request_date` date DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `password`, `role`) VALUES
('admin', 'admin@admin', '$2y$11$EQHqZyrCAopMsXCr9FNV6ezqrGRpsRbzW1PTXp1bbi.oyf1TCyRaa', 'admin'),
('shr', 's@s', '$2y$11$sZ2A5NpcX9EmevCVVinuDOMHIj7C/ACxtvR5ZMkG0XE/Knk/k1o8K', 'user'),
('xxx', 'x@x', '$2y$11$L/e5.TJKK0ktdj5vWxnH3u12hegHlbL6NHIWgRKPB8BWbiXCECp46', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `book_status`
--
ALTER TABLE `book_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_status`
--
ALTER TABLE `book_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
