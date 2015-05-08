-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2015 at 12:14 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9
 
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
 
 
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
 
--
-- Database: `kazi_app`
--
 
-- --------------------------------------------------------
 
--
-- Table structure for table `employee`
--
 
CREATE TABLE IF NOT EXISTS `employee` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phone` int(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
 
--
-- Dumping data for table `employee`
--
 
INSERT INTO `employee` (`eid`, `first_name`, `last_name`, `phone`, `email`, `password`) VALUES
(1, 'kim', 'tom', 71978455, 'kim@email.com', 'dde6ecd6406700aa000b213c843a30'),
(2, 'lucy', 'wewe', 7444, 'lucy@email.com', '0d61130a6dd5eea85c2c5facfe1c15'),
(3, 'nick', 'more', 755, 'nick@email.com', 'e9f5713dec55d727bb35392cec6190'),
(4, 'admin', 'boss', 719676788, 'admin@email.com', 'bossman');
 
-- --------------------------------------------------------
 
--
-- Table structure for table `project`
--
 
CREATE TABLE IF NOT EXISTS `project` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(30) NOT NULL,
  `start_date` varchar(30) NOT NULL,
  `end_date` varchar(30) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
 
--
-- Dumping data for table `project`
--
 
INSERT INTO `project` (`pid`, `project_name`, `start_date`, `end_date`) VALUES
(1, 'hiring', '8/8/15', '8/9/15'),
(2, 'homerun', '7/8/15', '9/9/15'),
(3, 'sing', '8/9/15', '8/9/15'),
(4, 'review', '5/7/15', '6/7/15');
 
-- --------------------------------------------------------
 
--
-- Table structure for table `task2`
--
 
CREATE TABLE IF NOT EXISTS `task2` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `date_done` varchar(30) NOT NULL,
  `task` varchar(30) NOT NULL,
  `time_taken` varchar(30) DEFAULT NULL,
  `comments` varchar(30) NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `eid` (`eid`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
 
--
-- Dumping data for table `task2`
--
 
INSERT INTO `task2` (`tid`, `eid`, `pid`, `date_done`, `task`, `time_taken`, `comments`) VALUES
(1, 4, 1, '4/4/15', 'testing', NULL, 'this will work'),
(2, 4, 2, '4/7/15', 'hitting', NULL, 'Oh running, running'),
(3, 4, 3, '6/6/15', 'vocals', NULL, 'vocals were aiit :-)'),
(4, 4, 3, '7/7/15', 'rapping', NULL, 'mad skillz from the dudes n du');
 
--
-- Constraints for dumped tables
--
 
--
-- Constraints for table `task2`
--
ALTER TABLE `task2`
  ADD CONSTRAINT `task2_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`),
  ADD CONSTRAINT `task2_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `project` (`pid`);
 
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
