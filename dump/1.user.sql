-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2014 at 02:21 PM
-- Server version: 5.1.40
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zphotos`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `type` enum('Guest','User','Admin') NOT NULL DEFAULT 'Guest',
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `type`, `status`, `changed`) VALUES
(1, NULL, NULL, NULL, 'Guest', 'Active', '2014-06-07 18:11:19'),
(2, NULL, NULL, NULL, 'Guest', 'Active', '2014-06-22 11:59:15'),
(3, NULL, NULL, NULL, 'Guest', 'Active', '2014-08-01 19:00:11'),
(4, NULL, NULL, NULL, 'Guest', 'Active', '2014-09-08 10:24:10'),
(5, NULL, NULL, NULL, 'Guest', 'Active', '2014-09-08 10:25:14'),
(6, NULL, NULL, NULL, 'Guest', 'Active', '2014-09-08 10:26:14'),
(11, 'Юсупов Ренат', 'zymanch@gmail.com', 'c041fa6c179143bb4bfd4b73cdeffe02', 'User', 'Active', '2014-11-02 14:16:19');
