-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for mbocinemas
CREATE DATABASE IF NOT EXISTS `mbocinemas` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mbocinemas`;

-- Dumping structure for table mbocinemas.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table mbocinemas.categories: ~6 rows (approximately)
REPLACE INTO `categories` (`id`, `name`, `image_path`) VALUES
	(1, 'Action', '/assets/images/action.jpg'),
	(2, 'Fiction', '/assets/images/fiction.jpg'),
	(3, 'Adventure', '/assets/images/adventure.jpg'),
	(4, 'Horror', '/assets/images/horror.jpg'),
	(5, 'Romance', '/assets/images/romance.jpg'),
	(6, 'Anime', '/assets/images/anime.jpg');

-- Dumping structure for table mbocinemas.films
CREATE TABLE IF NOT EXISTS `films` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `category_id` int NOT NULL,
  `duur` time(6) NOT NULL DEFAULT '12:00:00.000000',
  `datums` date NOT NULL DEFAULT '2008-11-11',
  `tijden` time(6) NOT NULL DEFAULT '12:00:00.000000',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `films_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table mbocinemas.films: ~9 rows (approximately)
REPLACE INTO `films` (`id`, `name`, `image_path`, `category_id`, `duur`, `datums`, `tijden`) VALUES
	(8, 'Dune', '/assets/images/dune.webp', 1, '12:00:00.000000', '2008-11-11', '12:00:00.000000'),
	(9, 'Inception', '/assets/images/inception.jpg', 1, '12:00:00.000000', '2008-11-11', '12:00:00.000000'),
	(10, 'Interstellar', '/assets/images/interstellar.jpg', 2, '12:00:00.000000', '2008-11-11', '12:00:00.000000'),
	(11, 'Avatar', '/assets/images/avatar.webp', 3, '12:00:00.000000', '2008-11-11', '12:00:00.000000'),
	(12, 'Fight Club', '/assets/images/fight_club.webp', 1, '12:00:00.000000', '2008-11-11', '12:00:00.000000'),
	(13, 'The Dark Knight', '/assets/images/darkknight.jpg', 3, '12:00:00.000000', '2008-11-11', '12:00:00.000000'),
	(14, 'Black Panther', '/assets/images/blackpanther.jpg', 2, '12:00:00.000000', '2008-11-11', '12:00:00.000000'),
	(15, 'C:\\fakepath\\60645202_2336027466611965_827412457298329600_n.jpg', '13670962-jqfxwwjq-v4.jpg', 1, '12:06:00.000000', '2024-11-29', '13:02:00.000000'),
	(16, 'Quinten', '', 1, '15:05:00.000000', '2025-01-02', '13:06:00.000000');

-- Dumping structure for table mbocinemas.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rol` enum('Medewerker','Manager','Klant') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Klant',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table mbocinemas.users: ~6 rows (approximately)
REPLACE INTO `users` (`id`, `username`, `password`, `email`, `rol`) VALUES
	(1, 'audixdev', '$2y$10$JIFHHcrXK4hPMskDCwITQ.1pgRCdG9Fm5d5sDDJlq9gCO.RMl1UfK', 'audixdev@gmail.com', 'Klant'),
	(2, 'luke', '$2y$10$CeuPMwEk81xfOlyewA7mQ.sxRkKev2F.BIRWTjENQXKZySsJ6.zyq', 'luke@gmail.conm', 'Medewerker'),
	(4, 'aaaaaaaaaaa', '$2y$10$9iUpTo31TLNctqPCMnFYAu9ZTBtMLWfvNwWkSETOpOTikjt8G.kCC', '', 'Klant'),
	(5, 'quinty', '$2y$10$el/KfMVDY6SrAZsgttGH2OwUnqs.jtJILx3BVylFW7JdAbnQxabVK', 'quinty@gmail.com', 'Klant'),
	(6, 'aaaaaaaaaaaaaa', '$2y$10$NXi8gn8l5Lo4g4ZyXRVIGuYiUWjIl9m9tLE8RZ0/iD/5JLh9pdsBa', 'bbbbbbbbbbbbbbbb', 'Klant'),
	(8, 'aaaaaaaaaaaaaaaaa', '$2y$10$OA54ubGv4XMs8DfNpU2bwOwAp.r2CAQd/2i8Wng7o8zOt2864INEK', 'bbbbbbbbbbbbbbbb', 'Klant');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
