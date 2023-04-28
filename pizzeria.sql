-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2023 at 02:37 AM
-- Server version: 8.0.32-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzeria`
--

-- --------------------------------------------------------

--
-- Table structure for table `command`
--

CREATE TABLE `command` (
  `id` int NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` varchar(256) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `command`
--

INSERT INTO `command` (`id`, `datetime`, `address`, `user_id`) VALUES
(2, '2023-04-20 11:15:45', 'Street1', 4),
(3, '2023-04-20 11:21:24', 'Street 2', 4),
(4, '2023-04-20 11:22:38', 'Street 3', 4),
(5, '2023-04-20 11:23:19', 'Street 3', 4),
(6, '2023-04-20 12:42:33', 'Street 4', 3),
(7, '2023-04-24 10:51:40', 'dsa', 4);

-- --------------------------------------------------------

--
-- Table structure for table `drink`
--

CREATE TABLE `drink` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `size` int NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `drink`
--

INSERT INTO `drink` (`id`, `name`, `size`, `price`, `image`) VALUES
(1, 'Coca-Cola Mic', 250, 5, 'images/database/a176237466ee5faf3e100152708e127dCoca-Cola-025.png'),
(2, 'Bucovina', 500, 5, 'images/database/dc29688ed1a96fd218e3db3d63b38f9esticlaMobil.png'),
(3, 'Fanta', 500, 6, 'images/database/3d3198dd09069078c18104fed0cde6affanta-1-5l-1710-3620.png'),
(5, 'Aqua Carpatica Minerală', 330, 3, 'images/database/313e261e92ee4ecb2319e46ccc2f228ares_adbbf26154dadf6ec9b8c106e2aa3992-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `drink_archive`
--

CREATE TABLE `drink_archive` (
  `id` int NOT NULL,
  `drink_id` int NOT NULL,
  `command_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `drink_archive`
--

INSERT INTO `drink_archive` (`id`, `drink_id`, `command_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 2, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `ingredients` text NOT NULL,
  `price` float NOT NULL,
  `weight` float NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`id`, `name`, `ingredients`, `price`, `weight`, `image`) VALUES
(1, 'Diavola', 'Blat Pufos, Mozzarella, Salam Picant, Sos de Roșii', 27, 500, 'images/database/49e0ad26228a4b6c53261cf8216ca9ebDiavola.png'),
(2, 'Pizza cu Bacon', 'Blat Pufos, Mozzarella, Bacon, Măsline, Sos de Roșii', 28, 560, 'images/database/b39504b0d037baa950465091dc931054Bacon-.png'),
(4, 'Capriciosa', 'Blat Pufos, Sos de roșii, Șuncă, Ardei, Măsline, Ciuperci', 32, 520, 'images/database/9dec64eb17a95f3ab5e8c1bb633cdf27delicio-capriciosa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pizza_archive`
--

CREATE TABLE `pizza_archive` (
  `id` int NOT NULL,
  `pizza_id` int NOT NULL,
  `command_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pizza_archive`
--

INSERT INTO `pizza_archive` (`id`, `pizza_id`, `command_id`) VALUES
(1, 2, 2),
(2, 1, 2),
(3, 2, 3),
(4, 1, 3),
(5, 2, 3),
(6, 2, 4),
(7, 1, 5),
(8, 2, 6),
(9, 1, 6),
(10, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `lastname`, `firstname`, `email`, `phone`, `password`, `admin`) VALUES
(3, 'Aron', 'Vlad', 'vlad@gmail.com', '2223334444', '$2y$10$FHZJ8U65F8ueJytov2CgXuDgiNIFxg/42xcIeDT1VcUOEixvjsse6', 0),
(4, 'Valahi', 'Maria', 'maria@gmail.com', '1112223333', '$2y$10$LfuKQMldZlreNvh2hGm7EuEqrSjEq6pZYLysTwv4MnixTKPjZdFXG', 0),
(5, 'Gutic', 'Gabi', 'gabi@gmail.com', '0757203584', '$2y$10$XvUe2IJ.oxhuwNTtW4psLOo76m2bfM9P3WgcZx83JybneL9UEDTfG', 1),
(9, 'Abalasei', 'Cristina', 'cristina@gmail.com', '0001112222', '$2y$10$L7RP4AILhwhWLLDquhgak.jAtegzjxNwS0VqH.bAbzbzGO33KKSki', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `command`
--
ALTER TABLE `command`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_link` (`user_id`);

--
-- Indexes for table `drink`
--
ALTER TABLE `drink`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drink_archive`
--
ALTER TABLE `drink_archive`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drink_link` (`drink_id`),
  ADD KEY `command_link2` (`command_id`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pizza_archive`
--
ALTER TABLE `pizza_archive`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pizza_link` (`pizza_id`),
  ADD KEY `command_link` (`command_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `command`
--
ALTER TABLE `command`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `drink`
--
ALTER TABLE `drink`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `drink_archive`
--
ALTER TABLE `drink_archive`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pizza_archive`
--
ALTER TABLE `pizza_archive`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `command`
--
ALTER TABLE `command`
  ADD CONSTRAINT `user_link` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `drink_archive`
--
ALTER TABLE `drink_archive`
  ADD CONSTRAINT `command_link2` FOREIGN KEY (`command_id`) REFERENCES `command` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `drink_link` FOREIGN KEY (`drink_id`) REFERENCES `drink` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pizza_archive`
--
ALTER TABLE `pizza_archive`
  ADD CONSTRAINT `command_link` FOREIGN KEY (`command_id`) REFERENCES `command` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pizza_link` FOREIGN KEY (`pizza_id`) REFERENCES `pizza` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
