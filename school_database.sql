-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2014 at 08:12 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_level` bigint(2) NOT NULL DEFAULT '4',
  `first_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `m_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `salt` varchar(40) COLLATE utf8_bin NOT NULL,
  `password` varchar(40) COLLATE utf8_bin NOT NULL,
  `bio` text COLLATE utf8_bin,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_level`, `first_name`, `m_name`, `last_name`, `email`, `salt`, `password`, `bio`) VALUES
(1, 1, 'admin', NULL, 'user', 'admin@admin.com', '0f38586bae2b8e4adc8eafda1b0373cacabeebab', 'ef07bd904964fbe14d188c23f16ef1c6c5fb5769', NULL),
(2, 2, 'staff', NULL, 'user', 'staff@staff.com', 'ad37f2ffe3c920922cefaf299c81bcfd456607d4', '5c360953c9dfea948a6c7b346c038e8757ba25be', NULL),
(3, 4, 'student', NULL, 'user', 'student@student.com', '55b3a0b5585e06d1671cafedd021fbd223099d8f', '2eb1bd018ea4ad59e53dbef634a99b22c8cc7f57', NULL),
(4, 3, 'teacher', NULL, 'user', 'teacher@teacher.com', '0503906575f5d107e73ec2a54797b1f6937504d6', 'e7342a39c22622cbdc196178b168f9660901ac34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_level`
--

CREATE TABLE IF NOT EXISTS `users_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(255) COLLATE utf8_bin NOT NULL,
  `login_level` int(4) NOT NULL,
  `permission` enum('on','off') COLLATE utf8_bin NOT NULL DEFAULT 'on',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users_level`
--

INSERT INTO `users_level` (`id`, `level`, `login_level`, `permission`) VALUES
(1, 'admin', 1, 'on'),
(2, 'Prouser', 2, 'on'),
(3, 'Teacher', 3, 'on'),
(4, 'User', 4, 'on');
