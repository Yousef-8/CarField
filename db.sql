-- Host: localhost    Database: carfield_database
-- ------------------------------------------------------
-- Server version	8.0.44


DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
);

DROP TABLE IF EXISTS `cars`;

CREATE TABLE `cars` (
  `car_id` int NOT NULL AUTO_INCREMENT,
  `car_uploader` int DEFAULT NULL,
  `car_model` varchar(255) NOT NULL,
  `car_type` varchar(255) DEFAULT NULL,
  `car_year` int DEFAULT NULL,
  `car_image` varchar(255) DEFAULT NULL,
  `car_description` text,
  `car_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`car_id`),
  KEY `car_uploader` (`car_uploader`),
  CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`car_uploader`) REFERENCES `admins` (`admin_id`)
);

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `comment_post_id` int NOT NULL,
  `comment_uploader` varchar(255) NOT NULL,
  `comment_description` text NOT NULL,
  `comment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`),
  KEY `comment_post_id` (`comment_post_id`),
  KEY `comment_uploader` (`comment_uploader`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`comment_post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE,
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`comment_uploader`) REFERENCES `users` (`username`) ON DELETE CASCADE
);

DROP TABLE IF EXISTS `featured_posts`;

CREATE TABLE `featured_posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uploader_admin` varchar(100) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `uploader_admin` (`uploader_admin`)
);



DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `post_uploader` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `post_description` text,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`),
  KEY `post_uploader` (`post_uploader`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_uploader`) REFERENCES `users` (`user_id`)
);


DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
);
