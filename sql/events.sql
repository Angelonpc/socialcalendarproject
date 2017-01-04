-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: db8.papaki.gr:3306
-- Χρόνος δημιουργίας: 30 Δεκ 2016 στις 10:48:57
-- Έκδοση διακομιστή: 5.5.53-MariaDB
-- Έκδοση PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `kasnakis_hotel`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `events`
--

CREATE TABLE `events` (
  `eid` int(16) NOT NULL,
  `uid` int(16) NOT NULL,
  `date` date NOT NULL,
  `data` varchar(30) NOT NULL,
  `public` tinyint(1) NOT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Άδειασμα δεδομένων του πίνακα `events`
--

INSERT INTO `events` (`eid`, `uid`, `date`, `data`, `public`, `time`) VALUES
(92, 1, '2016-12-07', 'fbsfsfggsg', 0, '10:00:00'),
(93, 2, '2016-12-21', 'hgskdjfhgd', 0, NULL),
(94, 2, '2016-12-01', 'wertwerewr', 0, NULL),
(95, 1, '2016-12-30', 'gjhdrkgjhgd', 0, NULL);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eid`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `events`
--
ALTER TABLE `events`
  MODIFY `eid` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
