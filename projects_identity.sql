-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 12, 2011 at 05:19 PM
-- Server version: 5.1.37
-- PHP Version: 5.2.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects_identity`
--

CREATE TABLE `projects_identity` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `category` varchar(20) NOT NULL,
  `class` varchar(10) NOT NULL,
  `skillset` varchar(100) NOT NULL,
  `shortDescr` varchar(80) NOT NULL,
  `longDescr` varchar(240) NOT NULL,
  `thumb` varchar(40) NOT NULL,
  `images` varchar(240) NOT NULL,
  `link` varchar(80) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `projects_identity`
--

INSERT INTO `projects_identity` VALUES(1, 'Travelbag', 'identity', 'single', '', 'Proposed redesign of Travelbag logo', 'Proposed redesign of Travelbag logo', 'thumb.gif', 'project_main_holder.gif', '', '2009-03-25 17:00:08');
INSERT INTO `projects_identity` VALUES(2, 'Split Second Films', 'identity', 'multi', '', 'Logo redesign for post-production outfit.', 'Logo redesign for post-production outfit.', 'thumb.gif', 'project_main_holder.gif, project_main_holder.gif, project_main_holder.gif, project_main_holder.gif, project_main_holder.gif', '', '2005-04-25 17:01:27');
INSERT INTO `projects_identity` VALUES(3, 'Campbell Muir', 'identity', 'multi', '', 'Identity for London-based jeweller.', 'Identity for London-based jeweller.', 'thumb.gif', 'project_main_holder.gif, project_main_holder.gif, project_main_holder.gif, project_main_holder.gif, project_main_holder.gif', '', '2008-05-25 17:05:24');
INSERT INTO `projects_identity` VALUES(17, 'Undun', 'identity', 'single', '', 'Identity for London club night.', '', 'thumb.gif', 'project_main_holder.gif', '', '2004-08-19 12:37:28');
INSERT INTO `projects_identity` VALUES(16, 'Sub Sessions', 'identity', 'single', '', 'Identity for Glasgow based club night.', '', 'thumb.gif', 'project_main_holder.gif', '', '2004-07-15 12:34:33');
INSERT INTO `projects_identity` VALUES(15, 'Liberation Films', 'identity', 'single', '', 'Identity for fictional film company.', '', 'thumb.gif', 'project_main_holder.gif', '', '2006-07-12 12:34:23');
INSERT INTO `projects_identity` VALUES(14, 'The Castle', 'identity', 'single', '', '', '', 'thumb.gif', 'project_main_holder.gif', '', '2006-07-12 12:33:16');
INSERT INTO `projects_identity` VALUES(13, 'Halliday''s Hair & Beauty', 'identity', 'single', '', '', '', 'thumb.gif', 'project_main_holder.gif', '', '2005-07-12 12:32:35');
