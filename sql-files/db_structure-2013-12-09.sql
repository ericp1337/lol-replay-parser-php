-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2013 at 09:23 PM
-- Server version: 5.5.34-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cakephp`
--

-- --------------------------------------------------------

--
-- Table structure for table `champions`
--

CREATE TABLE IF NOT EXISTS `champions` (
  `version` varchar(256) NOT NULL,
  `id` varchar(256) NOT NULL,
  `key` bigint(20) NOT NULL,
  `name` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `blurb` varchar(256) NOT NULL,
  `attack` mediumint(9) NOT NULL,
  `defense` mediumint(9) NOT NULL,
  `magic` mediumint(9) NOT NULL,
  `difficulty` mediumint(9) NOT NULL,
  `full` varchar(256) NOT NULL,
  `sprite` varchar(256) NOT NULL,
  `group` varchar(256) NOT NULL,
  `partype` varchar(256) NOT NULL,
  `hp` mediumint(9) NOT NULL,
  `hpperlevel` mediumint(9) NOT NULL,
  `mp` mediumint(9) NOT NULL,
  `mpperlevel` mediumint(9) NOT NULL,
  `movespeed` mediumint(9) NOT NULL,
  `armor` mediumint(9) NOT NULL,
  `armorperlevel` mediumint(9) NOT NULL,
  `spellblock` mediumint(9) NOT NULL,
  `spellblockperlevel` mediumint(9) NOT NULL,
  `attackrange` mediumint(9) NOT NULL,
  `hpregen` float NOT NULL,
  `hpregenperlevel` float NOT NULL,
  `mpregen` float NOT NULL,
  `mpregenperlevel` float NOT NULL,
  `crit` mediumint(9) NOT NULL,
  `critperlevel` mediumint(9) NOT NULL,
  `attackdamage` float NOT NULL,
  `attackdamageperlevel` float NOT NULL,
  `attackspeedoffset` float NOT NULL,
  `attackspeedperlevel` float NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` bigint(20) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `plaintext` varchar(256) NOT NULL,
  `full` varchar(256) NOT NULL,
  `sprite` varchar(256) NOT NULL,
  `base` varchar(256) NOT NULL,
  `purchasable` tinyint(1) NOT NULL,
  `total` bigint(20) NOT NULL,
  `sell` bigint(20) NOT NULL,
  `FlatMovementSpeedMod` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
