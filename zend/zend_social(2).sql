-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 09, 2013 at 10:47 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zend_social`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE IF NOT EXISTS `conversation` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  `ip` varchar(30) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`c_id`),
  KEY `user_one` (`user_one`),
  KEY `user_two` (`user_two`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `conversation_reply`
--

CREATE TABLE IF NOT EXISTS `conversation_reply` (
  `cr_id` int(11) NOT NULL AUTO_INCREMENT,
  `reply` text,
  `user_id_fk` int(11) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `time` int(11) NOT NULL,
  `c_id_fk` int(11) NOT NULL,
  PRIMARY KEY (`cr_id`),
  KEY `user_id_fk` (`user_id_fk`),
  KEY `c_id_fk` (`c_id_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courses_name` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE IF NOT EXISTS `friend_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `reciever` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `friend_request`
--

INSERT INTO `friend_request` (`id`, `sender`, `reciever`, `status`) VALUES
(1, 16, 15, 'active'),
(2, 15, 16, 'active'),
(3, 19, 15, 'active'),
(4, 15, 19, 'active'),
(6, 15, 18, 'active'),
(7, 18, 15, 'active'),
(8, 25, 15, 'active'),
(9, 15, 25, 'active'),
(10, 25, 16, 'inactive'),
(11, 25, 18, 'active'),
(12, 18, 25, 'active'),
(13, 18, 16, 'inactive'),
(14, 23, 18, 'active'),
(15, 18, 23, 'active'),
(16, 23, 16, 'inactive'),
(17, 23, 20, 'inactive'),
(18, 23, 25, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `message_list`
--

CREATE TABLE IF NOT EXISTS `message_list` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `reciever` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `message_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `message_list`
--

INSERT INTO `message_list` (`msg_id`, `sender`, `reciever`, `message`, `message_status`) VALUES
(1, 15, 16, 'hii first testing message', 'inactive'),
(2, 16, 15, 'reply the first testing message', 'inactive'),
(3, 15, 16, 'thanks for reply', 'inactive'),
(4, 15, 16, 'sdsdf', 'inactive'),
(5, 15, 16, 'last message', 'inactive'),
(6, 15, 0, 'last message', 'active'),
(7, 15, 16, 'sfsdf', 'inactive'),
(8, 15, 16, 'dsfsdf', 'inactive'),
(9, 15, 16, 'check view', 'inactive'),
(10, 15, 16, 'again chek view', 'inactive'),
(11, 15, 16, 'second time check view', 'inactive'),
(12, 16, 15, 'hello thanks for checking this', 'inactive'),
(13, 15, 16, 'sadfsdfsd', 'inactive'),
(14, 15, 16, 'asdfsadfsdf', 'inactive'),
(15, 15, 16, 'first test messaget\n', 'inactive'),
(16, 16, 15, 'timing message', 'inactive'),
(17, 15, 19, 'test', 'inactive'),
(18, 19, 15, 'bnm', 'inactive'),
(19, 15, 19, 'sadfsadfsad', 'active'),
(20, 19, 15, 'nv', 'inactive'),
(21, 16, 15, 'timing message\n', 'inactive'),
(22, 16, 15, 'timing message\n', 'inactive'),
(23, 16, 15, 'hey dude\n', 'inactive'),
(24, 15, 16, 'hello how are you', 'inactive'),
(25, 15, 16, 'sdfsafdsafsafd\nsdfsafdsafsafd\nsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafd', 'inactive'),
(26, 15, 16, 'sdfsafdsafsafd\nsdfsafdsafsafd\nsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafd', 'inactive'),
(27, 15, 16, 'sdfsafdsafsafd\nsdfsafdsafsafd\nsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafdsafsafdsdfsafds', 'inactive'),
(28, 16, 15, 'go to hell', 'inactive'),
(29, 15, 16, 'sadfsadfsadf', 'inactive'),
(30, 18, 15, 'hello dude', 'inactive'),
(31, 15, 18, 'test', 'inactive'),
(32, 25, 15, 'hhh', 'inactive'),
(33, 15, 25, 'hello dear', 'inactive'),
(34, 25, 15, 'hell......\n', 'inactive'),
(35, 15, 25, 'tesitng\n', 'inactive'),
(36, 25, 15, 'hell......\nsss', 'inactive'),
(37, 25, 15, 'hell......\nsssdffdf', 'inactive'),
(38, 25, 15, 'hell......\nsssdffdf', 'inactive'),
(39, 25, 15, 'hell......\nsssdffdfgj\n', 'inactive'),
(40, 15, 25, 'tesitng\n', 'inactive'),
(41, 25, 15, 'hell......\nsssdffdfgj\n', 'inactive'),
(42, 25, 15, 'hell......\nsssdffdfgj\n', 'inactive'),
(43, 18, 25, 'hello dear', 'inactive'),
(44, 15, 16, 'sdfsdfsd', 'active'),
(45, 15, 16, 'sdfsd', 'active'),
(46, 15, 18, 'sfsdfsdf', 'inactive'),
(47, 15, 18, 'werwerwer', 'inactive'),
(48, 18, 15, 'sdfadf', 'active'),
(49, 18, 15, 'sdfadf', 'active'),
(50, 18, 15, 'sdfadf', 'active'),
(51, 18, 23, 'hiii.....', 'inactive'),
(52, 23, 18, 'hiii...', 'inactive'),
(53, 18, 23, 'hru', 'active'),
(54, 23, 18, 'tiwari this side', 'inactive'),
(55, 18, 15, 'sadfsadfsad', 'active'),
(56, 18, 15, 'sdfsd\n', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_data`
--

CREATE TABLE IF NOT EXISTS `tmp_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `current_userid` int(11) NOT NULL,
  `alluser_id` int(11) NOT NULL,
  `request_status` enum('sending','pending') NOT NULL DEFAULT 'pending',
  `display_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `tmp_data`
--

INSERT INTO `tmp_data` (`id`, `current_userid`, `alluser_id`, `request_status`, `display_status`) VALUES
(1, 15, 16, 'pending', 'inactive'),
(2, 15, 17, 'pending', 'active'),
(3, 15, 18, 'sending', 'inactive'),
(4, 15, 19, 'pending', 'inactive'),
(5, 15, 20, 'pending', 'active'),
(6, 15, 21, 'pending', 'active'),
(7, 15, 22, 'pending', 'active'),
(8, 15, 23, 'pending', 'active'),
(9, 16, 15, 'sending', 'inactive'),
(10, 16, 17, 'pending', 'active'),
(11, 16, 18, 'pending', 'active'),
(12, 16, 19, 'pending', 'active'),
(13, 16, 20, 'pending', 'active'),
(14, 16, 21, 'pending', 'active'),
(15, 16, 22, 'pending', 'active'),
(16, 16, 23, 'pending', 'active'),
(17, 19, 15, 'sending', 'inactive'),
(18, 19, 16, 'pending', 'active'),
(19, 19, 17, 'pending', 'active'),
(20, 19, 18, 'pending', 'active'),
(21, 19, 20, 'pending', 'active'),
(22, 19, 21, 'pending', 'active'),
(23, 19, 22, 'pending', 'active'),
(24, 19, 23, 'pending', 'active'),
(25, 15, 24, 'pending', 'active'),
(26, 16, 24, 'pending', 'active'),
(27, 19, 24, 'pending', 'active'),
(28, 18, 15, 'pending', 'inactive'),
(29, 18, 16, 'sending', 'active'),
(30, 18, 17, 'pending', 'active'),
(31, 18, 19, 'pending', 'active'),
(32, 18, 20, 'pending', 'active'),
(33, 18, 21, 'pending', 'active'),
(34, 18, 22, 'pending', 'active'),
(35, 18, 23, 'pending', 'inactive'),
(36, 18, 24, 'pending', 'active'),
(37, 25, 15, 'sending', 'inactive'),
(38, 25, 16, 'sending', 'active'),
(39, 25, 17, 'pending', 'active'),
(40, 25, 18, 'sending', 'inactive'),
(41, 25, 19, 'pending', 'active'),
(42, 25, 20, 'pending', 'active'),
(43, 25, 21, 'pending', 'active'),
(44, 25, 22, 'pending', 'active'),
(45, 25, 23, 'pending', 'active'),
(46, 25, 24, 'pending', 'active'),
(47, 15, 25, 'pending', 'inactive'),
(48, 18, 25, 'pending', 'inactive'),
(49, 23, 15, 'pending', 'active'),
(50, 23, 16, 'sending', 'active'),
(51, 23, 17, 'pending', 'active'),
(52, 23, 18, 'sending', 'inactive'),
(53, 23, 19, 'pending', 'active'),
(54, 23, 20, 'sending', 'active'),
(55, 23, 21, 'pending', 'active'),
(56, 23, 22, 'pending', 'active'),
(57, 23, 24, 'pending', 'active'),
(58, 23, 25, 'sending', 'active'),
(59, 15, 26, 'pending', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `gender` text NOT NULL,
  `userfile` varchar(500) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `gender`, `userfile`, `status`) VALUES
(15, 'testing@gmail.com', 'testing6', 'asdf', 'male', 'Hydrangeas.jpg', 'active'),
(16, 'asfd@gmail.com', 'testing7', 'asdf', 'male', 'Desert.jpg', 'active'),
(17, 'testing@gmail.com', 'testing', 'asdf', 'male', 'Tulips.jpg', 'active'),
(18, 'demo@gmail.com', 'demo', 'demo12345', 'male', 'Penguins.jpg', 'active'),
(19, 'khemraj@gmail.com', 'khemraj', 'khemraj', 'male', 'Jellyfish.jpg', 'active'),
(20, 'tesing10@gmail.com', 'testing10', '12345678', 'female', 'Jellyfish.jpg', 'active'),
(21, 'testing8@gmail.com', 'testing8', '12345678', 'male', 'Tulips.jpg', 'active'),
(22, 'demo1@gmail.com', 'demo1', 'asdf', 'male', '', 'active'),
(23, 'tiwari@gmail.com', 'tiwari', 'tiwari', 'male', 'Koala.jpg', 'active'),
(24, 'new@gmail.com', 'new', 'new', 'male', '', 'active'),
(25, 'sandeep@gmail.com', 'sandeep', 'sandeep', 'male', '', 'active'),
(26, 'sdfg@gmail.com', 'sdfsadf', 'asdf', 'male', '', 'active');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `conversation_ibfk_1` FOREIGN KEY (`user_one`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `conversation_ibfk_2` FOREIGN KEY (`user_two`) REFERENCES `users` (`id`);

--
-- Constraints for table `conversation_reply`
--
ALTER TABLE `conversation_reply`
  ADD CONSTRAINT `conversation_reply_ibfk_1` FOREIGN KEY (`user_id_fk`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `conversation_reply_ibfk_2` FOREIGN KEY (`c_id_fk`) REFERENCES `conversation` (`c_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
