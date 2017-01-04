-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: db8.papaki.gr:3306
-- Χρόνος δημιουργίας: 30 Δεκ 2016 στις 10:51:14
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
-- Δομή πίνακα για τον πίνακα `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `menus`
--

INSERT INTO `menus` (`id`, `parent`, `name`, `icon`, `slug`, `number`) VALUES
(1, NULL, 'Login', 'glyphicon glyphicon-plus-sign', 'user/login/login', 1),
(2, NULL, 'Register', 'glyphicon glyphicon-remove', 'user/register/register', 2),
(3, NULL, 'Logout', 'glyphicon glyphicon-pencil', 'user/login/logout', 3),
(4, NULL, 'Αναζήτηση', 'glyphicon glyphicon-search', '', 4),
(5, NULL, 'Ημέρα', '', '', 5),
(6, NULL, 'Μήνας', '', '', 6),
(7, NULL, 'Χρόνος', '', '', 7);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menus` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
