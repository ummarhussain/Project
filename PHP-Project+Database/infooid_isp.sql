-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 01, 2016 at 12:54 PM
-- Server version: 5.5.46-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `infooid_isp`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE IF NOT EXISTS `Admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`username`, `password`) VALUES
('salman', '123'),
('ummar', '123');

-- --------------------------------------------------------

--
-- Table structure for table `Area`
--

CREATE TABLE IF NOT EXISTS `Area` (
  `name` varchar(50) NOT NULL,
  `city_code` varchar(20) NOT NULL,
  PRIMARY KEY (`name`),
  KEY `city_code` (`city_code`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bridge`
--

CREATE TABLE IF NOT EXISTS `bridge` (
  `username` varchar(20) NOT NULL,
  `nas_ip` varchar(20) NOT NULL,
  `c_code` int(20) NOT NULL,
  `pkg_name` varchar(20) NOT NULL,
  `Area` varchar(50) NOT NULL,
  KEY `nas_ip` (`nas_ip`),
  KEY `username` (`username`),
  KEY `nas_ip_2` (`nas_ip`),
  KEY `username_2` (`username`),
  KEY `c_code` (`c_code`),
  KEY `pkg_name` (`pkg_name`),
  KEY `Area` (`Area`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `City`
--

CREATE TABLE IF NOT EXISTS `City` (
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `nas_ip` varchar(100) NOT NULL,
  `nas_name` varchar(100) NOT NULL,
  `ip_pool` varchar(100) NOT NULL,
  PRIMARY KEY (`code`),
  KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `City`
--

INSERT INTO `City` (`name`, `code`, `nas_ip`, `nas_name`, `ip_pool`) VALUES
('Islamabad', '051', '10.0.0.1', 'ISB_Router 1', ''),
('Karachi', '052', '119.112.38.10', 'KTR_RTR', ''),
('Abbotabad', '0992', '172.16.100.1', 'ABT_RTR', ''),
('Peshawar', '0996', '192.168.88.1', 'Pshwr_RTR', '');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE IF NOT EXISTS `Customer` (
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `PHONE` varchar(100) NOT NULL,
  `CNIC` varchar(100) NOT NULL,
  `PACKAGE` varchar(100) NOT NULL,
  `REGDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `c_code` varchar(100) NOT NULL,
  `m_username` varchar(100) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `package` (`PACKAGE`),
  KEY `username` (`username`),
  KEY `c_code` (`c_code`),
  KEY `m_username` (`m_username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`name`, `username`, `password`, `PHONE`, `CNIC`, `PACKAGE`, `REGDate`, `c_code`, `m_username`) VALUES
('AliAhmed', 'ali', '123', '00923202221117', '7891516546156', 'Home', '2015-12-30 19:23:18', '052', 'awais'),
('AnzaSaddat', 'anza', '123', '00923325577896', '8887934146613', 'Student', '2015-12-30 19:26:05', '0996', 'hassan'),
('DrErajKhan', 'eraj', '123', '00923338547896', '4579931447566', 'Unlimited', '2015-12-30 19:21:56', '051', 'ummar'),
('rajabali', 'rajab', '0315', '87648762', '8734572364786', 'Free256K', '2016-01-01 04:45:20', '0996', 'awais');

-- --------------------------------------------------------

--
-- Table structure for table `IP_Pool`
--

CREATE TABLE IF NOT EXISTS `IP_Pool` (
  `p_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `space` varchar(100) NOT NULL,
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `space` (`space`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `IP_Pool`
--

INSERT INTO `IP_Pool` (`p_id`, `name`, `space`) VALUES
('10', 'Corporate', '10.0.0.1/16'),
('20', 'Residential', '172.16.0.0/16'),
('30', 'VPN', '198.10.10.0/24'),
('40', 'Private', '192.168.1.1/24');

-- --------------------------------------------------------

--
-- Table structure for table `Manager`
--

CREATE TABLE IF NOT EXISTS `Manager` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `admin` varchar(100) NOT NULL,
  `c_code` varchar(100) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `admin` (`admin`),
  KEY `c_code` (`c_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Manager`
--

INSERT INTO `Manager` (`username`, `password`, `name`, `email`, `phone`, `admin`, `c_code`) VALUES
('awais', '123', 'AwaisAhmed', 'awaisahmed@ciit.net.pk', '00923202221117', 'salman', '051'),
('eraj', '12345', 'erajkhan', '', '09963258712', 'salman', '051'),
('hassan', '132', 'HassanAhmed', 'hassan@ymail.com', '00923409100068', 'salman', '052'),
('ummar', '123', 'UmmarHussain', 'ummarkashmiri@gmail.com', '00923338522454', 'salman', '0992');

-- --------------------------------------------------------

--
-- Table structure for table `Package`
--

CREATE TABLE IF NOT EXISTS `Package` (
  `name` varchar(100) NOT NULL,
  `speed` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `validity` varchar(100) NOT NULL,
  PRIMARY KEY (`name`),
  KEY `Name` (`name`),
  KEY `Name_2` (`name`),
  KEY `Name_3` (`name`),
  KEY `name_4` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Package`
--

INSERT INTO `Package` (`name`, `speed`, `price`, `validity`) VALUES
('Free256K', '1', '000', '1Week'),
('Home', '2', '3000', '1Month'),
('Student', '1', '3000', '2Month'),
('Unlimited', '10', '15000', '1Month');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Area`
--
ALTER TABLE `Area`
  ADD CONSTRAINT `Area_ibfk_1` FOREIGN KEY (`city_code`) REFERENCES `City` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bridge`
--
ALTER TABLE `bridge`
  ADD CONSTRAINT `bridge_ibfk_1` FOREIGN KEY (`username`) REFERENCES `Customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bridge_ibfk_6` FOREIGN KEY (`pkg_name`) REFERENCES `Package` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bridge_ibfk_7` FOREIGN KEY (`Area`) REFERENCES `Area` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Customer`
--
ALTER TABLE `Customer`
  ADD CONSTRAINT `Customer_ibfk_2` FOREIGN KEY (`m_username`) REFERENCES `Manager` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Customer_ibfk_1` FOREIGN KEY (`PACKAGE`) REFERENCES `Package` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Customer_ibfk_3` FOREIGN KEY (`c_code`) REFERENCES `City` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PKG_FK` FOREIGN KEY (`package`) REFERENCES `Package` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Manager`
--
ALTER TABLE `Manager`
  ADD CONSTRAINT `admin_fk` FOREIGN KEY (`admin`) REFERENCES `Admin` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Manager_ibfk_1` FOREIGN KEY (`c_code`) REFERENCES `City` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
