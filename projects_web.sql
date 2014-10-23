-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 12, 2011 at 12:16 PM
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
-- Table structure for table `projects_web`
--

CREATE TABLE `projects_web` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `category` varchar(20) NOT NULL,
  `class` varchar(10) NOT NULL,
  `skillset` varchar(100) NOT NULL,
  `shortDescr` varchar(80) NOT NULL,
  `longDescr` varchar(1000) NOT NULL,
  `thumb` varchar(40) NOT NULL,
  `images` varchar(240) NOT NULL,
  `link` varchar(80) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `projects_web`
--

INSERT INTO `projects_web` VALUES(1, 'Flash Banners', 'web', 'html', 'flash', '<p>Various flash banners.</p>', '', 'thumb.gif', '', '', '2010-03-25 17:00:08');
INSERT INTO `projects_web` VALUES(2, 'Shortlist', 'web', 'single', 'html, php, MySQL', 'Shortlist Magazine Competition', '<p>Single page for a Shortlist magazine promotion. Used PHP & MySQL.</p>', 'shortlist_thumb.gif', '', '', '2010-04-25 17:01:27');
INSERT INTO `projects_web` VALUES(3, 'Fantasy Footy', 'web', 'multi', 'design', 'Micro-site for a promotion.', '<p>Micro-site based around a <em>very popular international football competition</em>.</p>', 'fantasy_footy_thumb.gif', '', '', '2010-05-25 17:05:24');
INSERT INTO `projects_web` VALUES(5, 'Winstanley Architects', 'web', 'multi', 'design', 'Proposed design for architects', '<p>Proposed design for architects...</p>', 'winstanley_thumb.gif', '', '', '2010-09-26 16:39:34');
INSERT INTO `projects_web` VALUES(6, 'AMC21 Mobile', 'mobile', 'multi', 'design, html, jquery, php, mobile', 'Mobile version of this website', '<p>Mobile version of this website...</p>', 'amc_mobile_thumb.gif', '', '', '2011-01-26 16:40:57');
INSERT INTO `projects_web` VALUES(7, 'Money Manager Tool', 'web', 'single', 'design, html, jquery', 'Online money manager tool', '<p>Online money manager tool for PruProtect...</p>', 'money_manager_thumb.gif', '', 'https://www.pruprotect.co.uk/money_manager/', '2010-05-26 16:41:47');
INSERT INTO `projects_web` VALUES(8, 'Conditions Covered', 'web', 'multi', 'design, html, jquery, xml', 'Online medical conditions tool', 'Online medical conditions tool...', 'conditions_thumb.gif', '', '', '2010-10-26 16:45:14');
INSERT INTO `projects_web` VALUES(9, 'PruProtect Website', 'web', 'multi', 'design, html, jquery', 'Website for PruProtect', '<p>One of the first major projects I undertook after joining <a href="http://www.pruprotect.co.uk">PruProtect</a> was to redesign the site. I was given sole responsibility for not only the design and build but also did all UI research and implementation.</p> <p>Work for this site is currently ongoing. Some of my favourite parts: <a href="https://www.pruprotect.co.uk/adviser/literature_and_tools/">Literature and Tools</a> this section uses an Apple inspired three column browser to locate any of the 130 items of literature.</p>', 'pruprotect_site_thumb.gif', 'pruprotect_main_1.jpg, project_main_holder.gif, project_main_holder.gif', 'http://www.pruprotect.co.uk', '2011-02-26 16:46:42');
INSERT INTO `projects_web` VALUES(10, 'Money Manager Mobile', 'mobile', 'multi', 'design, html, jquery, phonegap, mobile', 'Mobile version of Money Manager', 'Mobile version of Money Manager...', 'money_manager_mobile_thumb.gif', '', '', '2011-04-26 16:49:05');
INSERT INTO `projects_web` VALUES(11, 'Conditions Covered Mobile', 'mobile', 'single', 'design, html, jquery, xml, mobile', 'Mobile version of Conditions Covered', 'Mobile version of Conditions Covered...', 'conditions_mobile_thumb.gif', '', '', '2011-03-26 16:48:54');
INSERT INTO `projects_web` VALUES(12, 'Literature & Tools', 'web', 'html', 'design, html, jquery, php', 'Literature Broswer', 'Literature Broswer...', 'literature_thumb.gif', '', 'http://www.amc21.co.uk/literature_and_tools/index.php', '2011-03-26 16:50:09');
