-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: localhost
-- Čas generovania: Št 04.Aug 2022, 08:55
-- Verzia serveru: 10.4.22-MariaDB
-- Verzia PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+02:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `ulohaactiveit`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `weather`
--
DROP TABLE IF EXISTS `weather`;
CREATE TABLE `weather` (
  `id` bigint(20) NOT NULL,
  `city` varchar(255) NOT NULL,
  `current_weather` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `weather`
--

INSERT INTO `weather` (`id`, `city`, `current_weather`, `updated_at`, `created_at`) VALUES
(1, 'Bratislava', NULL, '2022-08-04 06:41:28', '2022-08-01 17:21:39'),
(2, 'Košice', NULL, '2022-08-04 06:41:30', '2022-08-01 17:22:16'),
(3, 'Banská Bystrica', NULL, '2022-08-04 06:41:34', '2022-08-01 17:22:49'),
(49, 'Vienna', NULL, '2022-08-04 04:43:30', '2022-08-04 04:43:30'),
(50, 'Ufa', NULL, '2022-08-04 04:44:02', '2022-08-04 04:44:02'),
(54, 'London', NULL, '2022-08-04 06:46:04', '2022-08-04 06:46:04'),
(55, 'Paris', NULL, '2022-08-04 06:54:25', '2022-08-04 06:54:25');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `weather`
--
ALTER TABLE `weather`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `weather`
--
ALTER TABLE `weather`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
