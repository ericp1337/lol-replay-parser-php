-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2013 at 10:07 PM
-- Server version: 5.5.34-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lol_replay_parser`
--

-- --------------------------------------------------------

--
-- Table structure for table `champions`
--

CREATE TABLE IF NOT EXISTS `champions` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `attackRank` tinyint(4) unsigned DEFAULT NULL,
  `defenseRank` tinyint(3) unsigned DEFAULT NULL,
  `magicRank` tinyint(3) unsigned DEFAULT NULL,
  `difficultyRank` tinyint(3) unsigned DEFAULT NULL,
  `botEnabled` tinyint(1) NOT NULL DEFAULT '0',
  `freeToPlay` tinyint(1) NOT NULL DEFAULT '0',
  `botMmEnabled` tinyint(1) NOT NULL DEFAULT '0',
  `rankedPlayEnabled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
