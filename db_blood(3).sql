-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2015 at 11:20 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_blood`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donation`
--

CREATE TABLE IF NOT EXISTS `tbl_donation` (
  `donation_id` int(11) NOT NULL AUTO_INCREMENT,
  `donation_date` datetime NOT NULL,
  `donor_id` int(11) NOT NULL,
  `donation_latitude` varchar(255) NOT NULL,
  `donation_longitude` varchar(255) NOT NULL,
  `donation_number` int(11) NOT NULL,
  PRIMARY KEY (`donation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_donation`
--

INSERT INTO `tbl_donation` (`donation_id`, `donation_date`, `donor_id`, `donation_latitude`, `donation_longitude`, `donation_number`) VALUES
(1, '2015-02-01 00:00:00', 1, '27.676743375934265', '85.34317052917481', 24455),
(2, '2014-10-05 00:00:00', 1, '27.695896249846502', '85.37020719604493', 325566);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donor`
--

CREATE TABLE IF NOT EXISTS `tbl_donor` (
  `donor_id` int(11) NOT NULL AUTO_INCREMENT,
  `donor_name` varchar(250) NOT NULL,
  `donor_email` varchar(100) NOT NULL,
  `donor_group` varchar(5) NOT NULL,
  `donor_sex` varchar(4) NOT NULL,
  `donor_number` int(11) NOT NULL,
  `donor_latitude` varchar(255) NOT NULL,
  `donor_longitude` varchar(255) NOT NULL,
  `donor_phone` varchar(255) NOT NULL,
  `donor_password` varchar(255) NOT NULL,
  `donor_phone_hide` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`donor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_donor`
--

INSERT INTO `tbl_donor` (`donor_id`, `donor_name`, `donor_email`, `donor_group`, `donor_sex`, `donor_number`, `donor_latitude`, `donor_longitude`, `donor_phone`, `donor_password`, `donor_phone_hide`) VALUES
(1, 'Summit Bajracharya', 'ilooklikesumit@gmail.com', 'A+', 'm', 9876543, '27.69513627918177', '85.32471693115235', '9860147718', 'cc8c62879d34d166787ec074e98f73a8', 1),
(2, 'utkarsha ghimire', 'puku@gmail.com', 'A+', 'f', 23423423, '27.7000', '85.3333', '984989899', '0cc175b9c0f1b6a831c399e269772661', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE IF NOT EXISTS `tbl_events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(255) NOT NULL,
  `event_date` datetime NOT NULL,
  `event_description` varchar(255) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `event_latitude` varchar(255) NOT NULL,
  `event_longitude` varchar(255) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`event_id`, `event_title`, `event_date`, `event_description`, `donor_id`, `event_latitude`, `event_longitude`) VALUES
(2, 'sahid memorial blood donation program 2013', '2013-04-03 00:00:00', 'Sed bibendum suscipit posuere fringilla sagittis auctor fringilla sagittis auctor. Phasellus nulla est, rhoncus non ultrices eu, lacinia ut est. Donec sodales viverra elit. Ut a malesuada diam. Suspendisse fringilla sagittis auctor. Mauris aliquam suscipi', 1, '85.39578474121095', '85.39578474121095'),
(3, 'Marvadi samaj rakta daan karyakram 2014', '2014-12-12 00:00:00', 'Sed Suspendisse fringilla sagittis auctor. Mauris aliquam suscipit adipiscing. Pellentesque ultrices.\r\n\r\nSed Suspendisse fringilla sagittis auctor. Mauris aliquam suscipit adipiscing. Pellentesque ultrices.', 1, '27.67537518497451', '85.32334364013673');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requests`
--

CREATE TABLE IF NOT EXISTS `tbl_requests` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `request_title` varchar(255) NOT NULL,
  `request_details` text NOT NULL,
  `request_group` varchar(255) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_requests`
--

INSERT INTO `tbl_requests` (`request_id`, `request_title`, `request_details`, `request_group`, `donor_id`, `request_date`) VALUES
(4, 'Urgently A+ve needed', 'Sed Suspendisse fringilla sagittis auctor fringilla sagittis auctor fringilla sagittis auctor. Mauris aliquam suscipit adipiscing. Pellentesque adipiscing ultrices fringilla. Maecenas semper neque nec nulla varius ultrices. Aenean rhoncus enim nec justo.', 'A+', 1, '2015-02-19 03:15:05');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
