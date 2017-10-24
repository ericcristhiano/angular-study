-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Ago-2017 às 19:44
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `br_server_side_a`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `airline`
--

CREATE TABLE `airline` (
  `airline_id` int(11) NOT NULL,
  `airline_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `city_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `airline`
--

INSERT INTO `airline` (`airline_id`, `airline_name`, `city_name`, `logo`) VALUES
(1, 'Latam', NULL, 'uploads/d60796427b4369d3dc723508f20715f7.jpg'),
(2, 'Latam', NULL, 'uploads/08ef9a8be5fe29259be42fa9d94d9f5f.jpg'),
(3, 'Airfrance', NULL, 'uploads/2153df88ddb842d47fc6a26cb9386ec1.jpg'),
(4, 'Airfrance', 'SP', 'uploads/0361da634fc290530e8b9b9f05ea1af4.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `flight`
--

CREATE TABLE `flight` (
  `flight_id` int(11) NOT NULL,
  `departure_date` date NOT NULL,
  `arrival_date` date NOT NULL,
  `flight_code` varchar(255) COLLATE utf8_bin NOT NULL,
  `departure_time` varchar(255) COLLATE utf8_bin NOT NULL,
  `arrival_time` varchar(255) COLLATE utf8_bin NOT NULL,
  `duration_of_the_flight` varchar(255) COLLATE utf8_bin NOT NULL,
  `departure_city_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `destination_city_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `airline_id` int(11) NOT NULL,
  `fare_price_economy` int(11) NOT NULL,
  `fare_price_business` int(11) NOT NULL,
  `fare_price_first_class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `flight`
--

INSERT INTO `flight` (`flight_id`, `departure_date`, `arrival_date`, `flight_code`, `departure_time`, `arrival_time`, `duration_of_the_flight`, `departure_city_name`, `destination_city_name`, `airline_id`, `fare_price_economy`, `fare_price_business`, `fare_price_first_class`) VALUES
(3, '2017-08-20', '2017-08-20', 'JJ3727', '11:00', '14:00', '03:00', 'JJG', 'CGH', 1, 100, 150, 200),
(4, '2017-08-20', '2017-08-20', 'JJ3727', '11:00', '14:00', '03:00', 'JJG', 'CGH', 1, 100, 150, 200),
(5, '2017-08-20', '2017-08-20', 'JJ3727', '11:00', '14:00', '03:00', 'JJG', 'CGH', 1, 100, 150, 200),
(6, '2017-08-20', '2017-08-20', 'JJ3727', '11:00', '14:00', '03:00', 'JJG', 'CGH', 1, 100, 150, 200),
(7, '2017-08-20', '2017-08-20', 'JJ3727', '11:00', '14:00', '03:00', 'JJG', 'CGH', 1, 100, 150, 200),
(8, '2017-08-20', '2017-08-20', 'JJ3728', '11:00', '14:00', '03:00', 'JJG', 'CGH', 1, 140, 160, 210);

-- --------------------------------------------------------

--
-- Estrutura da tabela `flight_booking`
--

CREATE TABLE `flight_booking` (
  `flight_booking_id` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `flight_booking`
--

INSERT INTO `flight_booking` (`flight_booking_id`, `cost`, `flight_id`) VALUES
(1, 100, 3),
(2, 0, 3),
(3, 0, 3),
(4, 0, 3),
(5, 0, 3),
(6, 0, 3),
(7, 0, 3),
(8, 0, 3),
(9, 0, 3),
(10, 0, 3),
(11, 0, 3),
(12, 0, 3),
(13, 0, 3),
(14, 0, 3),
(15, 0, 3),
(16, 0, 3),
(17, 0, 3),
(18, 0, 3),
(19, 0, 3),
(20, 0, 3),
(21, 0, 3),
(22, 0, 3),
(23, 0, 3),
(24, 0, 3),
(25, 0, 3),
(26, 0, 3),
(27, 0, 3),
(28, 0, 3),
(29, 0, 3),
(30, 0, 3),
(31, 0, 3),
(32, 0, 3),
(33, 0, 3),
(34, 0, 3),
(35, 0, 3),
(36, 0, 3),
(37, 0, 3),
(38, 0, 3),
(39, 0, 3),
(40, 0, 3),
(41, 0, 3),
(42, 0, 3),
(43, 0, 3),
(44, 0, 3),
(45, 0, 3),
(46, 0, 3),
(47, 0, 3),
(48, 0, 3),
(49, 0, 3),
(50, 0, 3),
(51, 0, 3),
(52, 0, 3),
(53, 0, 3),
(54, 0, 3),
(55, 0, 3),
(56, 0, 3),
(57, 0, 3),
(58, 0, 3),
(59, 0, 3),
(60, 0, 3),
(61, 0, 3),
(62, 0, 3),
(63, 0, 3),
(64, 0, 3),
(65, 0, 3),
(66, 0, 3),
(67, 0, 3),
(68, 0, 3),
(69, 0, 3),
(70, 0, 3),
(71, 0, 3),
(72, 0, 3),
(73, 0, 3),
(74, 0, 3),
(75, 0, 3),
(76, 0, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `hotel_booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `guest`
--

INSERT INTO `guest` (`guest_id`, `first_name`, `last_name`, `hotel_booking_id`) VALUES
(1, 'Fulano', 'De tal', 1),
(2, 'Ciclano', 'De tal', 1),
(3, 'Fulano', 'Ciclano', 3),
(4, 'Fulano', 'Ciclano', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `city_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin,
  `price_per_guest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_name`, `city_name`, `description`, `price_per_guest`) VALUES
(3, 'Laguna Plaza', 'Brasilia', NULL, 150),
(4, 'Laguna Plaza', 'Brasilia', NULL, 150),
(5, 'Laguna Plaza', 'Brasilia', NULL, 150),
(6, 'Laguna Plaza', 'Brasilia', NULL, 150),
(7, 'Laguna Plaza', 'Brasilia', NULL, 150),
(8, 'Manhattan Plaza', 'Brasilia', 'Cool', 100),
(9, 'Manhattan Plaza', 'Brasilia', 'Cool', 100),
(10, 'Manhattan Plaza', 'Brasilia', 'Cool', 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `hotel_booking`
--

CREATE TABLE `hotel_booking` (
  `hotel_booking_id` int(11) NOT NULL,
  `total_guests` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `hotel_booking`
--

INSERT INTO `hotel_booking` (`hotel_booking_id`, `total_guests`, `cost`, `hotel_id`) VALUES
(1, 2, 300, 3),
(2, 1, 150, 3),
(3, 1, 150, 3),
(4, 1, 150, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_bin NOT NULL,
  `hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `image`
--

INSERT INTO `image` (`image_id`, `url`, `hotel_id`) VALUES
(1, 'image1.png', 7),
(2, 'image2.png', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `passenger`
--

CREATE TABLE `passenger` (
  `passenger_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `flight_booking_id` int(11) NOT NULL,
  `flight_class` enum('economy','business','first_class') COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `passenger`
--

INSERT INTO `passenger` (`passenger_id`, `first_name`, `last_name`, `flight_booking_id`, `flight_class`) VALUES
(1, 'Kenjir', 'Filhor', 2, ''),
(2, 'Kenjir', 'Filhor', 3, ''),
(3, 'Kenjir', 'Filhor', 4, ''),
(4, 'Kenjir', 'Filhor', 5, ''),
(5, 'Kenjir', 'Filhor', 6, ''),
(6, 'Kenjir', 'Filhor', 7, ''),
(7, 'Kenjir', 'Filhor', 8, ''),
(8, 'Kenjir', 'Filhor', 9, ''),
(9, 'Kenjir', 'Filhor', 10, ''),
(10, 'Kenjir', 'Filhor', 11, ''),
(11, 'Kenjir', 'Filhor', 12, ''),
(12, 'Kenjir', 'Filhor', 13, ''),
(13, 'Kenjir', 'Filhor', 14, ''),
(14, 'Kenjir', 'Filhor', 15, ''),
(15, 'Kenjir', 'Filhor', 16, ''),
(16, 'Kenjir', 'Filhor', 17, ''),
(17, 'Kenjir', 'Filhor', 18, ''),
(18, 'Kenjir', 'Filhor', 19, ''),
(19, 'Kenjir', 'Filhor', 20, ''),
(20, 'Kenjir', 'Filhor', 21, ''),
(21, 'Kenjir', 'Filhor', 22, ''),
(22, 'Kenjir', 'Filhor', 23, ''),
(23, 'Kenjir', 'Filhor', 24, ''),
(24, 'Kenjir', 'Filhor', 25, ''),
(25, 'Kenjir', 'Filhor', 26, ''),
(26, 'Kenjir', 'Filhor', 27, ''),
(27, 'Kenjir', 'Filhor', 28, ''),
(28, 'Kenjir', 'Filhor', 29, ''),
(29, 'Kenjir', 'Filhor', 30, ''),
(30, 'Kenjir', 'Filhor', 31, ''),
(31, 'Kenjir', 'Filhor', 32, ''),
(32, 'Kenjir', 'Filhor', 33, ''),
(33, 'Kenjir', 'Filhor', 34, ''),
(34, 'Kenjir', 'Filhor', 35, ''),
(35, 'Kenjir', 'Filhor', 36, ''),
(36, 'Kenjir', 'Filhor', 37, ''),
(37, 'Kenjir', 'Filhor', 38, ''),
(38, 'Kenjir', 'Filhor', 39, ''),
(39, 'Kenjir', 'Filhor', 40, ''),
(40, 'Kenjir', 'Filhor', 41, ''),
(41, 'Kenjir', 'Filhor', 42, ''),
(42, 'Kenjir', 'Filhor', 43, ''),
(43, 'Kenjir', 'Filhor', 44, ''),
(44, 'Kenjir', 'Filhor', 45, ''),
(45, 'Kenjir', 'Filhor', 46, ''),
(46, 'Kenjir', 'Filhor', 47, ''),
(47, 'Kenjir', 'Filhor', 48, ''),
(48, 'Kenjir', 'Filhor', 49, ''),
(49, 'Kenjir', 'Filhor', 50, ''),
(50, 'Kenjir', 'Filhor', 51, ''),
(51, 'Kenjir', 'Filhor', 52, ''),
(52, 'Kenjir', 'Filhor', 53, ''),
(53, 'Kenjir', 'Filhor', 54, ''),
(54, 'Kenjir', 'Filhor', 55, ''),
(55, 'Kenjir', 'Filhor', 56, ''),
(56, 'Kenjir', 'Filhor', 57, ''),
(57, 'Kenjir', 'Filhor', 58, ''),
(58, 'Kenjir', 'Filhor', 59, ''),
(59, 'Kenjir', 'Filhor', 60, ''),
(60, 'Kenjir', 'Filhor', 61, ''),
(61, 'Kenjir', 'Filhor', 62, ''),
(62, 'Kenjir', 'Filhor', 64, ''),
(63, 'Kenjir', 'Filhor', 63, ''),
(64, 'Kenjir', 'Filhor', 65, ''),
(65, 'Kenjir', 'Filhor', 66, ''),
(66, 'Kenjir', 'Filhor', 67, ''),
(67, 'Kenjir', 'Filhor', 68, ''),
(68, 'Kenjir', 'Filhor', 69, ''),
(69, 'Kenjir', 'Filhor', 70, ''),
(70, 'Kenjir', 'Filhor', 71, ''),
(71, 'Kenjir', 'Filhor', 72, ''),
(72, 'Kenjir', 'Filhor', 73, ''),
(73, 'Kenjir', 'Filhor', 74, ''),
(74, 'Kenjir', 'Filhor', 75, ''),
(75, 'hncfh', 'fghfghgfh', 76, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `room_type`
--

CREATE TABLE `room_type` (
  `room_type_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `capacity` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `room_type`
--

INSERT INTO `room_type` (`room_type_id`, `name`, `capacity`, `quantity`, `hotel_id`) VALUES
(2, 'Single', 1, 10, 3),
(3, 'Single', 1, 10, 4),
(4, 'Single', 1, 10, 5),
(5, 'Single', 1, 10, 6),
(6, 'Single', 1, 10, 7),
(7, 'single', 1, 40, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `users_title` varchar(255) COLLATE utf8_bin NOT NULL,
  `users_first_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `users_last_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `email_address` varchar(255) COLLATE utf8_bin NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_bin NOT NULL,
  `payment_method` enum('transfer','credit_card','paypal') COLLATE utf8_bin NOT NULL,
  `credit_cards_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `credit_cards_number` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `ccv` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `hotel_booking_id` int(11) DEFAULT NULL,
  `flight_booking_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `users_title`, `users_first_name`, `users_last_name`, `email_address`, `phone_number`, `payment_method`, `credit_cards_name`, `credit_cards_number`, `ccv`, `hotel_booking_id`, `flight_booking_id`) VALUES
(5, 'Mr', 'Fulano', 'de tal', 'fulano@gmail.com', '454545', 'transfer', NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `access_token`) VALUES
(1, 'kenji', 'shiroma', 'kenjishiromajp@gmail.com', '123456', '6_kCMiJv8uOqSeMNNmFGSLnLjoGL33tW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airline`
--
ALTER TABLE `airline`
  ADD PRIMARY KEY (`airline_id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flight_id`),
  ADD KEY `fk_flight_airline_idx` (`airline_id`);

--
-- Indexes for table `flight_booking`
--
ALTER TABLE `flight_booking`
  ADD PRIMARY KEY (`flight_booking_id`),
  ADD KEY `fk_flight_booking_flight1_idx` (`flight_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`),
  ADD KEY `fk_guest_hotel_booking1_idx` (`hotel_booking_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `hotel_booking`
--
ALTER TABLE `hotel_booking`
  ADD PRIMARY KEY (`hotel_booking_id`),
  ADD KEY `fk_hotel_booking_hotel1_idx` (`hotel_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `fk_image_hotel1_idx` (`hotel_id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`passenger_id`),
  ADD KEY `fk_passenger_flight_booking1_idx` (`flight_booking_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`room_type_id`),
  ADD KEY `fk_room_type_hotel1_idx` (`hotel_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `fk_transaction_hotel_booking1_idx` (`hotel_booking_id`),
  ADD KEY `fk_transaction_flight_booking1_idx` (`flight_booking_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airline`
--
ALTER TABLE `airline`
  MODIFY `airline_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `flight_booking`
--
ALTER TABLE `flight_booking`
  MODIFY `flight_booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hotel_booking`
--
ALTER TABLE `hotel_booking`
  MODIFY `hotel_booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `passenger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `room_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `fk_flight_airline` FOREIGN KEY (`airline_id`) REFERENCES `airline` (`airline_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `flight_booking`
--
ALTER TABLE `flight_booking`
  ADD CONSTRAINT `fk_flight_booking_flight1` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`flight_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `guest`
--
ALTER TABLE `guest`
  ADD CONSTRAINT `fk_guest_hotel_booking1` FOREIGN KEY (`hotel_booking_id`) REFERENCES `hotel_booking` (`hotel_booking_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `hotel_booking`
--
ALTER TABLE `hotel_booking`
  ADD CONSTRAINT `fk_hotel_booking_hotel1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_image_hotel1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `passenger`
--
ALTER TABLE `passenger`
  ADD CONSTRAINT `fk_passenger_flight_booking1` FOREIGN KEY (`flight_booking_id`) REFERENCES `flight_booking` (`flight_booking_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `room_type`
--
ALTER TABLE `room_type`
  ADD CONSTRAINT `fk_room_type_hotel1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fk_transaction_flight_booking1` FOREIGN KEY (`flight_booking_id`) REFERENCES `flight_booking` (`flight_booking_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaction_hotel_booking1` FOREIGN KEY (`hotel_booking_id`) REFERENCES `hotel_booking` (`hotel_booking_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
