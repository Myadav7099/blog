-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 10, 2024 at 07:05 AM
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
-- Database: `app_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `creation_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updation_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `category_image`, `creation_time`, `updation_time`) VALUES
(1, 'Nature', 'image-1714986549.jpeg', '2024-05-06 14:39:09', '2024-05-06 14:39:09'),
(2, 'Sports', 'image-1714986781.jpeg', '2024-05-06 14:43:01', '2024-05-06 14:43:01'),
(3, 'Programming', 'image-1714986796.jpeg', '2024-05-06 14:43:16', '2024-05-06 14:43:16'),
(4, 'Technology', 'image-1714986828.jpeg', '2024-05-06 14:43:48', '2024-05-06 14:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updaation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_id` int NOT NULL,
  `admin_id` int NOT NULL,
  `comment` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `creation_date`, `updaation_date`, `post_id`, `admin_id`, `comment`) VALUES
(3, '2024-05-03 11:32:58', '2024-05-03 11:32:58', 13, 3, 'this is a sample comment'),
(20, '2024-05-03 13:33:17', '2024-05-03 13:33:17', 13, 3, 'comment!..'),
(29, '2024-05-06 15:45:18', '2024-05-06 15:45:18', 13, 3, 'temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp temp '),
(32, '2024-05-06 15:50:47', '2024-05-06 15:50:47', 7, 3, 'temp...'),
(33, '2024-05-07 13:49:57', '2024-05-07 13:49:57', 13, 4, 'temp'),
(34, '2024-05-07 13:50:50', '2024-05-07 13:50:50', 14, 4, 'temp'),
(36, '2024-05-08 07:24:43', '2024-05-08 07:24:43', 12, 3, 'ryhshehdweg'),
(37, '2024-05-09 18:34:28', '2024-05-09 18:34:28', 14, 3, 'fhfnh');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `des` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `auther_id` int NOT NULL,
  `creation_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updation_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tags` blob,
  `video` varchar(255) DEFAULT NULL,
  `category` int DEFAULT NULL,
  `view` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `des`, `auther_id`, `creation_time`, `updation_time`, `image`, `tags`, `video`, `category`, `view`) VALUES
(1, 'sdfg', 'Description of post Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, suscipit. Dolores dolor reprehenderit quibusdam nulla ratione eos id fuga beatae.', 1, '2024-05-01 16:17:07', '2024-05-01 16:17:07', '1714560427.jpg', 0x613a303a7b7d, NULL, 2, 2),
(2, 'temp', 'temp description Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, suscipit. Dolores dolor reprehenderit quibusdam nulla ratione eos id fuga beatae.', 1, '2024-05-01 16:42:20', '2024-05-01 16:42:20', '1714561940.png', 0x613a313a7b693a303b733a343a2274656d70223b7d, '1714561940.jpg', 3, 18),
(3, 'sfesdff', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, suscipit. Dolores dolor reprehenderit quibusdam nulla ratione eos id fuga beatae.', 1, '2024-05-01 16:48:38', '2024-05-01 16:48:38', '1714562318.png', 0x613a323a7b693a303b733a373a2273616461646173223b693a313b733a31313a227361646173647361646166223b7d, '1714562318.png', 1, 0),
(4, 'nature', 'Nature  Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, suscipit. Dolores dolor reprehenderit quibusdam nulla ratione eos id fuga beatae.', 1, '2024-05-02 14:54:02', '2024-05-02 14:54:02', 'image-1714641842.jpg', 0x613a313a7b693a303b733a363a226e6174757265223b7d, 'video-1714641842.png', 1, 0),
(5, 'one', 'one one one one one one one one one one one one one one one one one Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, eum! Hic consequuntur vitae voluptatum qui voluptate ullam voluptas quibusdam magnam.', 1, '2024-05-02 15:49:41', '2024-05-02 15:49:41', 'image-1714645181.jpeg', 0x613a313a7b693a303b733a333a226f6e65223b7d, 'video-1714645181.jpeg', 2, 0),
(6, 'Two', 'Two two two two two two two two two two two two two two two two two two two Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, eum! Hic consequuntur vitae voluptatum qui voluptate ullam voluptas quibusdam magnam.', 1, '2024-05-02 15:51:01', '2024-05-02 15:51:01', 'image-1714645261.jpeg', 0x613a313a7b693a303b733a333a2274776f223b7d, 'video-1714645261.jpeg', 2, 0),
(7, 'Significance of Different Plant Species', 'Biotic components are primarily composed of flora and fauna. The word flora refers to plants, and fauna is all about the animals and their life. The abiotic features mainly include rocks, mountains, water bodies, etc.\r\nThere are more than 400,000 species of plants on this planet, and all play an essential role in supporting life on earth. This is done by maintaining the quality of the atmosphere by releasing oxygen into the atmosphere, absorbing carbon dioxide, and a lot more.\r\nWe have found a massive number of plants that are useful in our day to day lives. Plants are more intelligent than we think. Here we have many more details about plants that you might not be aware of.', 3, '2024-05-03 06:58:43', '2024-05-03 06:58:43', 'image-1714699723.jpeg', 0x613a333a7b693a303b733a363a22706c616e7473223b693a313b733a353a22666c6f7261223b693a323b733a363a22666f72657374223b7d, 'video-1714699723.mp4', 1, 1),
(8, ' Nature of Technology', 'Technology is constrained by laws of nature, such as gravity.\r\nScientists are concerned with what exists in nature; engineers modify natural materials to meet human needs and wants.\r\nTechnologies developed for one purpose are sometimes adapted to serve other purposes.\r\ntechnology coevolves with science and other fields to allow people to accomplish challenging tasks.', 3, '2024-05-03 07:05:55', '2024-05-03 07:05:55', 'image-1714700155.jpeg', 0x613a323a7b693a303b733a363a226e6174757265223b693a313b733a31303a22746563686e6f6c6f6779223b7d, 'video-1714700155.mp4', 2, 9),
(9, 'Sportsmanship', 'When playing a team sport, players share a common goal: victory! Every player has an important role. No matter your strengths, a close-knit team will help you win. Teammates support, motivate and encourage each other.\r\nTeam sports make it easier to grow and gain self confidence. Evolving within a community helps build relationships and break down numerous barriers. Because whether you play on a pitch or court, you are sure to grow into your role as a teammate.', 3, '2024-05-03 07:13:03', '2024-05-03 07:13:03', 'image-1714700583.jpeg', 0x613a333a7b693a303b733a363a2273706f727473223b693a313b733a343a227465616d223b693a323b733a353a227472757374223b7d, 'video-1714700583.mp4', 3, 6),
(10, 'Importance of Forests', 'Forests help prevent erosion and enrich and conserve soil, helping to protect communities from landslides and floods and producing the rich topsoil needed to grow plants and crops. Forests also play an important role in the global water cycle, moving water across the earth by releasing water vapor and capturing rainfall.\r\n Deforestation has serious consequences on the health of people directly dependent on forests, as well as those living in cities and towns, as it increases the risk of diseases crossing over from animals to humans. ', 3, '2024-05-03 09:56:43', '2024-05-03 09:56:43', 'image-1714710403.jpeg', 0x613a323a7b693a303b733a363a22466f72657374223b693a313b733a31373a224e61747572616c205265736f7572636573223b7d, 'video-1714710403.mp4', 1, 6),
(11, 'Impact of Technology', 'Technology has witnessed impressive evolution in the past few decades which has in turn transformed our lives and helped us evolve with it. Right from roadways or  railways and aircraft for seamless travel to making communication effortless from any part of the world. technology has contributed more than anything to help mankind live a life of luxury and convenience.\r\nTechnology has witnessed impressive evolution in the past few decades which has in turn transformed our lives and helped us evolve with it. Right from roadways and railways and aircraft for seamless travel to making communication effortless from any part of the world technology has contributed more than anything to help mankind live a life of luxury and convenience.\r\nIt is also because of technology that we know our world and outer space better. Every field owes its advancement to technology, and this clearly indicates the importance of technology in every aspect of our lives. ', 3, '2024-05-03 10:01:37', '2024-05-03 10:01:37', 'image-1714710697.jpeg', 0x613a303a7b7d, 'video-1714710697.mp4', 2, 7),
(12, 'Video', 'nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature ', 3, '2024-05-03 10:40:19', '2024-05-03 10:40:19', 'image-1714713019.jpeg', 0x613a303a7b7d, 'video-1714713019.mp4', 1, 8),
(13, 'Nature2', 'nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature nature ', 3, '2024-05-03 10:42:12', '2024-05-03 10:42:12', 'image-1714713132.jpeg', 0x613a323a7b693a303b733a373a226e617475726520223b693a313b733a383a2277696c656c696665223b7d, 'video-1714713132.mp4', 1, 11),
(14, 'Forest', 'Forest are lungs of the earth ', 4, '2024-05-07 13:44:08', '2024-05-07 13:44:08', 'image-1715069648.jpeg', 0x613a323a7b693a303b733a373a226e617475726520223b693a313b733a363a22666f72657374223b7d, 'video-1715069648.mp4', 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `creation_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updation_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `unique_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `address`, `description`, `creation_time`, `updation_time`, `unique_name`) VALUES
(1, 'a', 'a', 'a@a', '123', '1234567890', 'aaa', NULL, '2024-04-30 14:37:12', '2024-04-30 14:37:12', '1714468032.png'),
(2, 'x', 'x', 'x@x', '123', '1234567890', 'x', NULL, '2024-04-30 15:20:36', '2024-04-30 15:20:36', '1714470636.png'),
(3, 'Pranshu', 'sharma', 'Pranshu@gmail.com', '123', '9876543210', 'Ludhiana , Punjab  , India', NULL, '2024-05-03 06:47:12', '2024-05-03 06:47:12', 'image-1714699032.jpg'),
(4, 'user', 'user', 'user@gmail.com', '123', '9876543210', 'Ludhiana', NULL, '2024-05-07 13:42:42', '2024-05-07 13:42:42', 'image-1715069562.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
