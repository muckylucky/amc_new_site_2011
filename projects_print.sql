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
-- Table structure for table `projects_print`
--

CREATE TABLE `projects_print` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `projects_print`
--

INSERT INTO `projects_print` VALUES(1, 'CD Covers', 'print', 'multi', '', 'CD Covers for university project', '', 'thumb.gif', 'project_main_holder.gif, project_main_holder.gif, project_main_holder.gif, project_main_holder.gif', '', '2006-06-25 17:00:08');
INSERT INTO `projects_print` VALUES(2, 'Book Project', 'print', 'multi', '', 'Series of book coves and layouts', 'Series of book coves and layouts', 'thumb.gif', 'project_main_holder.gif, project_main_holder.gif, project_main_holder.gif, project_main_holder.gif', '', '2006-06-25 17:01:27');
INSERT INTO `projects_print` VALUES(3, 'ENO Posters', 'print', 'multi', '', 'Series of posters for various operas', 'Series of posters for various operas', 'thumb.gif', 'project_main_holder.gif, project_main_holder.gif, project_main_holder.gif', '', '2006-05-25 17:05:24');
INSERT INTO `projects_print` VALUES(5, 'Club Flyers', 'print', 'multi', 'design', 'Series of flyers for various club nights', 'Series of flyers for various club nights', 'thumb.gif', 'project_main_holder.gif, project_main_holder.gif, project_main_holder.gif, project_main_holder.gif, project_main_holder.gif', '', '2010-09-26 16:39:34');
