-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 25, 2019 at 02:21 PM
-- Server version: 5.7.24
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_jokes`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `email`, `name`, `password`, `date_created`) VALUES
(2, 'b4hakim@gmail.com', 'Hakim Bwanika', '34c0366d6cf1b9498351a7dc34582b27', '2019-06-21 19:48:55'),
(3, 'seller@gmail.com', 'Seller One', '1e62e6ce22608229f9e7d30baae981ee', '2019-06-25 13:46:47'),
(4, 'bingo@gmail.com', 'Bingo Lotto', '6b99fc04045eae98af76b6eb6a259cef', '2019-06-25 14:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `joke`
--

DROP TABLE IF EXISTS `joke`;
CREATE TABLE IF NOT EXISTS `joke` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `joketext` text,
  `author_id` int(11) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `joke`
--

INSERT INTO `joke` (`id`, `joketext`, `author_id`, `date_created`) VALUES
(1, 'A programmer was found dead in the shower. The instructions read: lather, rinse, repeat.', 1, '2019-06-20 09:27:52'),
(2, '!false - it\'s funny because it\'s true.', 1, '2019-06-20 09:28:27'),
(3, 'How many programmers does it take to screw\r\nin a lightbulb? None, it\'s a hardware problem.', 1, '2019-06-20 10:17:17'),
(4, 'A programmer\'s wife tells him to go to the store\r\nand \'get a gallon of milk, and if they have eggs, get a dozen.\'He returns with 13 gallons of milk.', 1, '2019-06-20 10:18:32'),
(19, 'Teacher: How old is your Father? Kid: He is 6 years old. Teacher: What? How is that possible? Kid: He only became a father when I was born. --- Logic', 2, '2019-06-25 13:15:04'),
(21, 'In a Nursery School Canteen... There is a basket of apples with a notice written over it:\r\n\"Do not take more than one, God is watching\"\r\nOn the other counter there is a box of chocolates, a small child went and wrote: Take as many as you want, God is busy watching the apples. ', 2, '2019-06-25 13:43:07'),
(22, 'A programmer was found dead in the shower. The instructions read: lather, rinse, repeat.', 4, '2019-06-25 14:12:13'),
(23, 'How many programmers does it take to screw\r\nin a lightbulb? None, it\'s a hardware problem.', 4, '2019-06-25 14:12:47'),
(24, 'A programmer\'s wife tells him to go to the store\r\nand \'get a gallon of milk, and if they have eggs, get a dozen.\'He returns with 13 gallons of milk.', 3, '2019-06-25 14:13:58'),
(25, 'Child: Mummy why Gandhi has no hair on his head? Mummy: because he speaks only the truth.\r\nChild: Now I understand why ladies have long hair.', 3, '2019-06-25 14:16:12');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
