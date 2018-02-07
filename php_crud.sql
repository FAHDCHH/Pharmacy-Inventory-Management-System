-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 07, 2018 at 06:30 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `stockNum` int(11) NOT NULL,
  `price` double NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `name`, `stockNum`, `price`, `user_id`) VALUES
(1, 'a', 12, 221, 1),
(3, 'panadol', 131, 50, 3),
(4, 'epinephrine', 313, 312, 3),
(20, 'insulin', 200, 60, 3),
(7, 'Meh', 1, 1, 5),
(8, 'Gg', 11, 11, 6),
(21, 'herceptin', 28, 120, 3),
(14, 'Weed', 69, 6969, 8),
(15, 'Hi', 123, 123, 5),
(16, 'Ggg', 123, 123, 9),
(22, 'taxol', 300, 100, 3),
(19, 'penicillin ', 100, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `salt`) VALUES
(1, 'test', '651fb18ac8ab2c72e6622a62f94f9024813fc143c68f78b237c08890ad37455f', '¨*öõD+E¹ÌmŽe]ÛgµRà+P\n?Uøò®†'),
(3, 'abc', 'c6fada4cc473f24ca776909b51befaed8aac7f3958eaf7e5a9ab12962ecd87d4', 'T×†Ê[æ@‚Ís}¹ZúÍï´Fëõ¬½çzÕ'),
(5, 'ys', 'a31b86f97b64f82714f368213624751df8ec685dec9a9a5af3ecd4ea025fc4c8', 'i‚íÕ[ Lñâ©–ùgBP\n¯¦Í`û³¯,Ö-'),
(6, 'Gg', '1831880936a07968bcea906a8206cac7071420e6c5a26bbedac315f3b43f9387', 'e{\0œ·ãž1Ž‡ÎJZÖijIáxq#u\n#ÅX'),
(7, 'tmy', '08eb63a8914fa8a1fe926a8185d8662b74ccbd90267094636a3bd56f3f39204c', '½î¶~V–°/šjvÓËÓxßÍ»RB¹åS[GèVr*'),
(8, 'Testtest', 'd7eae1e8319d27ee95fbcc8f901d77efef001d0a8de3dfa2472addae1ddcb97f', '(c0Gan¹êÊÇ¬ýÇKðïX<Eò'),
(9, 'ysg', '2823e5f1e1c19f82ccf6a84f5ed9439c3c7abcd64cc418cd7907497ea5d26a77', '‚ðcµÔÌ¨™òßö•À¼Ø\ZÔ¼P6`ÙÂEUC');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
