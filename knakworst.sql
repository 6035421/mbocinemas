-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Versie:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Databasestructuur van mbocinemas wordt geschreven
CREATE DATABASE IF NOT EXISTS `mbocinemas` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mbocinemas`;

-- Structuur van  tabel mbocinemas.categories wordt geschreven
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumpen data van tabel mbocinemas.categories: ~3 rows (ongeveer)
REPLACE INTO `categories` (`id`, `name`, `image_path`) VALUES
	(1, 'Action', '/assets/images/action.jpg'),
	(2, 'Fiction', '/assets/images/fiction.jpg'),
	(3, 'Adventure', '/assets/images/adventure.jpg'),
	(4, 'Horror', '/assets/images/horror.jpg'),
	(5, 'Romance', '/assets/images/romance.jpg'),
	(6, 'Anime', '/assets/images/anime.jpg');

-- Structuur van  tabel mbocinemas.films wordt geschreven
CREATE TABLE IF NOT EXISTS `films` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `films_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumpen data van tabel mbocinemas.films: ~7 rows (ongeveer)
REPLACE INTO `films` (`id`, `name`, `image_path`, `category_id`) VALUES
	(8, 'Dune', '/assets/images/dune.webp', 1),
	(9, 'Inception', '/assets/images/inception.jpg', 1),
	(10, 'Interstellar', '/assets/images/interstellar.jpg', 2),
	(11, 'Avatar', '/assets/images/avatar.webp', 3),
	(12, 'Fight Club', '/assets/images/fight_club.webp', 1),
	(13, 'The Dark Knight', '/assets/images/darkknight.jpg', 3),
	(14, 'Black Panther', '/assets/images/blackpanther.jpg', 2);

-- Structuur van  tabel mbocinemas.users wordt geschreven
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumpen data van tabel mbocinemas.users: ~2 rows (ongeveer)
REPLACE INTO `users` (`id`, `username`, `password`, `email`) VALUES
	(1, 'audixdev', '$2y$10$JIFHHcrXK4hPMskDCwITQ.1pgRCdG9Fm5d5sDDJlq9gCO.RMl1UfK', 'audixdev@gmail.com'),
	(2, 'luke', '$2y$10$CeuPMwEk81xfOlyewA7mQ.sxRkKev2F.BIRWTjENQXKZySsJ6.zyq', 'luke@gmail.conm');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
