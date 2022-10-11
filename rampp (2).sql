-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 10, 2022 at 01:59 PM
-- Server version: 5.7.36
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rampp`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `catname` varchar(200) NOT NULL,
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catname`, `id`, `type`) VALUES
('Drink', 2, 1),
('Funiture', 5, 0),
('Soup', 6, 1),
('Noodle ', 7, 1),
('Utensil  ', 8, 0),
('Writing Material', 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customaudit`
--

DROP TABLE IF EXISTS `customaudit`;
CREATE TABLE IF NOT EXISTS `customaudit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expensesCapital` int(100) NOT NULL,
  `expensesRecurrent` int(100) NOT NULL,
  `expensesReinvestment` int(100) NOT NULL,
  `stockCostValue` int(100) NOT NULL,
  `stockSellingValue` int(100) NOT NULL,
  `stockProfit` int(100) NOT NULL,
  `totalBar` int(100) NOT NULL,
  `totalKitchen` int(100) NOT NULL,
  `salesProfit` int(100) NOT NULL,
  `date` date NOT NULL DEFAULT '1111-11-11',
  `lost` int(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customaudit`
--

INSERT INTO `customaudit` (`id`, `expensesCapital`, `expensesRecurrent`, `expensesReinvestment`, `stockCostValue`, `stockSellingValue`, `stockProfit`, `totalBar`, `totalKitchen`, `salesProfit`, `date`, `lost`) VALUES
(7, 0, 0, 0, 1602, 3146, 1544, 1300, 2640, 1784, '2022-10-05', 1710);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customerId` int(11) NOT NULL AUTO_INCREMENT,
  `customerName` varchar(100) DEFAULT NULL,
  `orderCount` int(100) NOT NULL,
  `completeCount` int(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `sallerId` int(70) NOT NULL,
  `date` date NOT NULL DEFAULT '1111-11-11',
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`customerId`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `customerName`, `orderCount`, `completeCount`, `status`, `sallerId`, `date`, `time`) VALUES
(16, 'victor', 1, 1, 0, 0, '2022-10-10', '11:06 am'),
(13, 'samm', 1, 1, 0, 0, '2022-10-04', '3:01 am'),
(14, 'samm22', 1, 0, 0, 0, '2022-10-06', '10:01 am'),
(15, 'me', 1, 1, 0, 0, '2022-10-07', '12:42 pm'),
(17, 'Nick', 1, 1, 0, 0, '2022-10-10', '11:25 am'),
(18, 'davis', 1, 1, 0, 0, '2022-10-10', '11:43 am');

-- --------------------------------------------------------

--
-- Table structure for table `dailyincentive`
--

DROP TABLE IF EXISTS `dailyincentive`;
CREATE TABLE IF NOT EXISTS `dailyincentive` (
  `stafftag` varchar(10) NOT NULL,
  `staffincentive` varchar(20) NOT NULL,
  `fd` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyincentive`
--

INSERT INTO `dailyincentive` (`stafftag`, `staffincentive`, `fd`) VALUES
('1001', '50', '2020-2-1'),
('1005', '0', '2020-2-1'),
('1001', '140', '2020-2-1'),
('1005', '0', '2020-2-1'),
('1001', '95', '2020-2-1'),
('1001', '80', '2020-2-1'),
('1007', '260', '2020-2-1'),
('1007', '130', '2020-2-1'),
('1001', '140', '2020-2-1'),
('1007', '220', '2020-2-1'),
('1007', '780', '2020-2-1'),
('1007', '265', '2020-2-1'),
('1007', '60', '2020-2-1'),
('1005', '0', '2020-2-10'),
('1005', '0', '2020-4-9'),
('1001', '150', '2020-9-24');

-- --------------------------------------------------------

--
-- Table structure for table `debtpaymenttable`
--

DROP TABLE IF EXISTS `debtpaymenttable`;
CREATE TABLE IF NOT EXISTS `debtpaymenttable` (
  `customer` varchar(100) NOT NULL,
  `amountowed` double NOT NULL,
  `fulldate` date NOT NULL,
  `salesp` varchar(100) NOT NULL,
  `day` int(10) NOT NULL,
  `month` int(10) NOT NULL,
  `year` int(10) NOT NULL,
  `amountpd` double NOT NULL,
  `debtbal` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debtpaymenttable`
--

INSERT INTO `debtpaymenttable` (`customer`, `amountowed`, `fulldate`, `salesp`, `day`, `month`, `year`, `amountpd`, `debtbal`) VALUES
('Victor Peters', 4500, '2020-02-01', '1001', 1, 2, 2020, 2000, 2500);

-- --------------------------------------------------------

--
-- Table structure for table `debtsummary`
--

DROP TABLE IF EXISTS `debtsummary`;
CREATE TABLE IF NOT EXISTS `debtsummary` (
  `customer` varchar(100) NOT NULL,
  `totaldebt` double NOT NULL,
  PRIMARY KEY (`customer`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debtsummary`
--

INSERT INTO `debtsummary` (`customer`, `totaldebt`) VALUES
('Victor Peters', 12500);

-- --------------------------------------------------------

--
-- Table structure for table `debttable`
--

DROP TABLE IF EXISTS `debttable`;
CREATE TABLE IF NOT EXISTS `debttable` (
  `customer` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `fulldate` date NOT NULL,
  `salesp` varchar(100) NOT NULL,
  `day` int(10) NOT NULL,
  `month` int(10) NOT NULL,
  `year` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debttable`
--

INSERT INTO `debttable` (`customer`, `amount`, `fulldate`, `salesp`, `day`, `month`, `year`) VALUES
('Victor Peters', 4500, '2020-02-01', '1005', 1, 2, 2020),
('Victor Peters', 10000, '2020-02-10', '1001', 10, 2, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

DROP TABLE IF EXISTS `deductions`;
CREATE TABLE IF NOT EXISTS `deductions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `staffId` int(10) NOT NULL,
  `amount` int(100) NOT NULL,
  `reason` varchar(300) NOT NULL,
  `date` date NOT NULL DEFAULT '1111-11-11',
  `issuerId` int(10) NOT NULL,
  `type` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`id`, `staffId`, `amount`, `reason`, `date`, `issuerId`, `type`) VALUES
(1, 1998, 200, 'Braking of kichen utensles (2 plates)', '2022-08-10', 1, NULL),
(2, 5481, 500, 'two glass cup damaged', '2022-08-23', 1, 'Damage'),
(5, 5481, 5000, 'Parthly loan repay', '2022-08-23', 1, 'LoanRepay');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(3, 'Driver'),
(2, 'Cook');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
CREATE TABLE IF NOT EXISTS `expenses` (
  `date` date NOT NULL DEFAULT '1111-11-11',
  `expensesNo` int(10) NOT NULL AUTO_INCREMENT,
  `staffId` int(10) NOT NULL,
  `purchaser` varchar(200) NOT NULL,
  `expensesType` varchar(200) NOT NULL,
  `itemBought` varchar(200) NOT NULL,
  `description` varchar(300) NOT NULL,
  `amount` int(10) NOT NULL,
  `justification` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`expensesNo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`date`, `expensesNo`, `staffId`, `purchaser`, `expensesType`, `itemBought`, `description`, `amount`, `justification`) VALUES
('2022-08-09', 1, 1, 'Davis', 'reinvestment', 'Crypto', 'crypto for investment', 2000, 'this investment is agenst next year ');

-- --------------------------------------------------------

--
-- Table structure for table `fundrequisition`
--

DROP TABLE IF EXISTS `fundrequisition`;
CREATE TABLE IF NOT EXISTS `fundrequisition` (
  `fregno` int(30) NOT NULL,
  `from` varchar(200) NOT NULL,
  `datecreated` date NOT NULL,
  `ammount` int(50) NOT NULL,
  `ammountword` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `justification` varchar(300) NOT NULL,
  `manstatus` varchar(30) NOT NULL,
  `mandsatus` varchar(30) NOT NULL,
  `supstatus` varchar(200) NOT NULL,
  `manremark` varchar(300) NOT NULL,
  `mandremark` varchar(300) NOT NULL,
  `supremark` varchar(300) NOT NULL,
  `mansig` varchar(200) NOT NULL,
  `mandsig` varchar(200) NOT NULL,
  `supsig` varchar(200) NOT NULL,
  `to` varchar(200) NOT NULL,
  `reqfrom` varchar(200) NOT NULL,
  `supdate` varchar(200) NOT NULL,
  `manddate` varchar(200) NOT NULL,
  `mandate` varchar(200) NOT NULL,
  PRIMARY KEY (`fregno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fundrequisition`
--

INSERT INTO `fundrequisition` (`fregno`, `from`, `datecreated`, `ammount`, `ammountword`, `subject`, `file`, `justification`, `manstatus`, `mandsatus`, `supstatus`, `manremark`, `mandremark`, `supremark`, `mansig`, `mandsig`, `supsig`, `to`, `reqfrom`, `supdate`, `manddate`, `mandate`) VALUES
(2, 'nick davis', '2022-06-23', 50000, 'fifty thousand nira only', 'restock', '', 'to buy new items', 'approve', 'approve', 'approve', 'too much', 'nice plan', 'ok', '../Upload/62b2f29123e749.48953053.png', '../Upload/62b2f2d43a0354.47316097.png', '../Upload/62b2f22ac5b1d3.95862652.png', 'you', 'adnindavis', '2022-06-23', '2022-06-23', '2022-06-23'),
(3, 'nick davis', '2022-06-23', 60000, 'sixty thousand nira only', ' to replace the broken jar', '../Upload/62b43d87c42ab1.40116584.pdf', 'Background/Justification', 'Pending', 'Pending', 'Pending', '', '', '', '', '', '', 'you', 'adnindavis', '0000-00-00', '0000-00-00', '0000-00-00'),
(4, 'nick davis', '2022-10-04', 50000, 'Fifty thousand naira only', 'school fees', '', 'the money is for school fees', 'approve', 'approve', 'approve', 'nice', 'good', 'ok', '', '', '', 'manager', 'adnindavis', '2022-10-04', '2022-10-04', '2022-10-04'),
(5, 'nick davis', '2022-10-04', 10000, 'Ten thousand naira only', 'Transportation', '../Upload/633c14cbc52036.08860968.jpeg', 'movement to school', 'approve', 'approve', 'approve', 'nice', 'good', 'ok', '', '', '', 'manager', 'adnindavis', '2022-10-04', '2022-10-04', '2022-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `incentive`
--

DROP TABLE IF EXISTS `incentive`;
CREATE TABLE IF NOT EXISTS `incentive` (
  `incntv` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `incentives`
--

DROP TABLE IF EXISTS `incentives`;
CREATE TABLE IF NOT EXISTS `incentives` (
  `stafftag` varchar(20) NOT NULL,
  `totalincentive` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incentives`
--

INSERT INTO `incentives` (`stafftag`, `totalincentive`) VALUES
('1007', 1715);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `catname` varchar(100) NOT NULL,
  `productname` varchar(200) NOT NULL,
  `quantityadded` int(200) NOT NULL,
  `minnimumlevle` int(200) NOT NULL,
  `costprice` int(200) NOT NULL,
  `profit` int(200) NOT NULL,
  `preparationtime` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sellingprice` int(100) NOT NULL,
  `salable` int(11) NOT NULL,
  `prepAt` varchar(100) NOT NULL,
  `oderingunit` varchar(200) NOT NULL,
  `numberSold` int(100) NOT NULL,
  `productImg` varchar(200) DEFAULT NULL,
  `subCategory` varchar(200) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `productname` (`productname`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`catname`, `productname`, `quantityadded`, `minnimumlevle`, `costprice`, `profit`, `preparationtime`, `id`, `sellingprice`, `salable`, `prepAt`, `oderingunit`, `numberSold`, `productImg`, `subCategory`, `description`) VALUES
('Funiture', 'Saivite ', 50, 10, 1000, 0, 'noTime', 14, 0, 1, 'none', 'none', 0, NULL, '', ''),
('Drink', ' Malt', 46, 10, 270, 300, '1', 13, 570, 2, 'Bar', 'Bottle', 20, NULL, '', ''),
('Noodle ', ' spak', 14, 9, 270, 930, '2', 9, 1200, 2, 'Kitchen', 'Plate ', 34, NULL, '', ''),
('Funiture', 'Tabless', 5, 0, 10500, 0, 'noTime', 10, 0, 1, 'none', 'none', 0, NULL, '', ''),
('Soup', ' Ewedu', 21, 9, 1000, 400, '2', 11, 1400, 2, 'Kitchen', 'Plate ', 20, NULL, '', ''),
('Funiture', 'Chair ', 50, 0, 10200, 0, 'noTime', 12, 0, 1, 'none', 'none', 0, NULL, '', ''),
('Drink', ' Pepsi', 19, 10, 170, 200, '1', 15, 370, 2, 'Bar', 'Bottle', 18, NULL, '', ''),
('Funiture', ' Jagua', 13, 5, 250, 50, '1', 16, 300, 2, 'Bar', 'Bottle', 5, '../Upload/6325cf7e92fed2.36419457.jpeg', '', ''),
('Drink', ' Vinnes', 50, 5, 200, 50, '1', 17, 250, 2, 'Bar', 'Bottle', 0, NULL, '', ''),
('Utensil  ', 'Spoon ', 20, 0, 2000, 0, 'noTime', 18, 0, 1, 'none', 'none', 0, NULL, '', ''),
('Drink', ' Mirinda', 20, 5, 250, 50, '1', 19, 300, 2, 'Bar', 'Bottle', 0, '../Upload/633337acbe84d3.68608896.jpeg', 'Soft Drink', 'soft drink for everyone'),
('Drink', ' Fanta', 18, 5, 250, 50, '1', 20, 300, 2, 'Bar', 'Bottle', 2, '../Upload/63333bb2849240.34861504.png', 'Soft Drink', '');

-- --------------------------------------------------------

--
-- Table structure for table `inventryhistory`
--

DROP TABLE IF EXISTS `inventryhistory`;
CREATE TABLE IF NOT EXISTS `inventryhistory` (
  `inid` int(200) NOT NULL,
  `date` date NOT NULL,
  `restock` int(10) NOT NULL,
  `reduce` int(10) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `increasby` int(200) NOT NULL,
  `reduceby` int(200) NOT NULL,
  `type` int(4) DEFAULT NULL,
  `price` int(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventryhistory`
--

INSERT INTO `inventryhistory` (`inid`, `date`, `restock`, `reduce`, `reason`, `increasby`, `reduceby`, `type`, `price`) VALUES
(6, '2022-06-16', 2, 0, '', 10, 0, 0, 0),
(6, '2022-06-19', 2, 0, '', 10, 0, 0, 0),
(7, '2022-06-19', 0, 2, 'its too much', 0, 5, 1, 0),
(6, '2022-06-21', 2, 0, 'its too much', 10, 0, 0, 0),
(7, '2022-06-21', 0, 2, 'its too much', 0, 1, 1, 0),
(6, '2022-06-21', 2, 0, '', 50, 0, 0, 0),
(7, '2022-06-21', 2, 0, '', 50, 0, 0, 0),
(7, '2022-06-21', 0, 2, '', 0, 4, 1, 0),
(7, '2022-06-22', 0, 2, '', 0, 0, 1, 0),
(7, '2022-06-22', 0, 2, 'it\'s too much', 0, 10, 1, 0),
(6, '2022-06-22', 2, 0, 'it\'s too low', 10, 0, 0, 0),
(7, '2022-06-22', 0, 2, 'it\'s too much', 0, 10, 1, 0),
(6, '2022-06-28', 2, 0, 'it was too low', 40, 0, 0, 0),
(7, '2022-06-30', 0, 2, 'it\'s too much ', 0, 3, 1, 0),
(6, '2022-07-01', 2, 0, '', 1, 0, 0, 0),
(7, '2022-07-01', 0, 2, 'I just feel like doing this', 0, 1, 1, 0),
(13, '2022-08-01', 0, 2, 'Ordered', 0, 2, 1, 0),
(11, '2022-08-01', 0, 2, 'Ordered', 0, 2, 1, 0),
(11, '2022-08-02', 0, 2, 'Ordered', 0, 2, 1, 0),
(13, '2022-08-02', 0, 2, 'Ordered', 0, 2, 1, 0),
(15, '2022-08-02', 0, 2, 'Ordered', 0, 2, 1, 0),
(11, '2022-08-02', 0, 2, 'Ordered', 0, 2, 1, 0),
(11, '2022-08-02', 0, 2, 'Ordered', 0, 1, 1, 0),
(15, '2022-08-02', 0, 2, 'Ordered', 0, 3, 1, 0),
(13, '2022-08-02', 0, 2, 'Ordered', 0, 2, 1, 0),
(13, '2022-08-03', 2, 0, 'Deleted Order', 2, 0, 0, 0),
(11, '2022-08-03', 2, 0, 'Deleted Order', 1, 0, 0, 0),
(15, '2022-08-03', 2, 0, 'Deleted Order', 3, 0, 0, 0),
(11, '2022-08-03', 2, 0, 'Deleted Order', 2, 0, 0, 0),
(13, '2022-08-03', 2, 0, 'Deleted Order', 2, 0, 0, 0),
(15, '2022-08-03', 0, 2, 'Ordered', 0, 2, 1, 0),
(11, '2022-08-03', 0, 2, 'Ordered', 0, 2, 1, 0),
(11, '2022-08-03', 0, 2, 'Ordered', 0, 2, 1, 0),
(15, '2022-08-03', 0, 2, 'Ordered', 0, 2, 1, 0),
(13, '2022-08-03', 0, 2, 'Ordered', 0, 1, 1, 0),
(15, '2022-08-04', 0, 2, 'Ordered', 0, 2, 1, 0),
(9, '2022-08-04', 0, 2, 'Ordered', 0, 1, 1, 0),
(15, '2022-08-24', 0, 2, 'Ordered', 0, 2, 1, 0),
(13, '2022-08-24', 0, 2, 'Ordered', 0, 1, 1, 0),
(9, '2022-08-24', 0, 2, 'Ordered', 0, 1, 1, 0),
(15, '2022-08-25', 0, 2, 'Ordered', 0, 1, 1, 0),
(13, '2022-08-25', 0, 2, 'Ordered', 0, 1, 1, 0),
(11, '2022-08-25', 0, 2, 'Ordered', 0, 1, 1, 0),
(11, '2022-08-25', 0, 2, 'Ordered', 0, 2, 1, 0),
(13, '2022-08-25', 0, 2, 'Ordered', 0, 1, 1, 0),
(11, '2022-08-25', 0, 2, 'Ordered', 0, 2, 1, 0),
(13, '2022-08-25', 0, 2, 'Ordered', 0, 1, 1, 0),
(15, '2022-08-25', 0, 2, 'Ordered', 0, 2, 1, 0),
(13, '2022-08-25', 0, 2, 'Ordered', 0, 1, 1, 0),
(9, '2022-08-25', 0, 2, 'Ordered', 0, 2, 1, 0),
(11, '2022-08-25', 0, 2, 'Ordered', 0, 1, 1, 0),
(11, '2022-08-31', 0, 2, 'Ordered', 0, 2, 1, 0),
(15, '2022-08-31', 0, 2, 'Ordered', 0, 2, 1, 0),
(9, '2022-08-31', 0, 2, 'Ordered', 0, 1, 1, 0),
(13, '2022-08-31', 0, 2, 'Ordered', 0, 1, 1, 0),
(9, '2022-08-31', 0, 2, 'Ordered', 0, 2, 1, 0),
(13, '2022-09-03', 0, 2, 'damage', 0, 1, 2, 570),
(13, '2022-09-03', 0, 2, 'damage', 0, 2, 2, 1140),
(11, '2022-09-07', 0, 2, 'Ordered', 0, 2, NULL, NULL),
(15, '2022-09-07', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(11, '2022-09-07', 0, 2, 'Ordered', 0, 2, NULL, NULL),
(13, '2022-09-07', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(11, '2022-09-07', 0, 2, 'Ordered', 0, 2, NULL, NULL),
(9, '2022-09-07', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(9, '2022-09-07', 0, 2, 'Ordered', 0, 3, NULL, NULL),
(13, '2022-09-07', 0, 2, 'Ordered', 0, 2, NULL, NULL),
(11, '2022-09-07', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(13, '2022-09-07', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(15, '2022-09-07', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(13, '2022-09-07', 0, 2, 'Ordered', 0, 2, NULL, NULL),
(15, '2022-09-07', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(11, '2022-09-07', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(15, '2022-09-07', 0, 2, 'Ordered', 0, 2, NULL, NULL),
(9, '2022-09-08', 0, 2, 'Ordered', 0, 2, NULL, NULL),
(9, '2022-09-08', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(13, '2022-09-08', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(11, '2022-09-08', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(9, '2022-09-08', 0, 2, 'Ordered', 0, 2, NULL, NULL),
(9, '2022-09-08', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(15, '2022-09-08', 0, 2, 'Ordered', 0, 2, NULL, NULL),
(11, '2022-09-08', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(9, '2022-09-08', 0, 2, 'Ordered', 0, 2, NULL, NULL),
(15, '2022-09-08', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(9, '2022-09-13', 0, 2, 'Ordered', 0, 2, NULL, NULL),
(15, '2022-09-13', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(9, '2022-09-13', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(9, '2022-09-13', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(9, '2022-09-16', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(15, '2022-09-16', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(11, '2022-09-16', 0, 2, 'Ordered', 0, 3, NULL, NULL),
(13, '2022-09-16', 0, 2, 'Ordered', 0, 3, NULL, NULL),
(9, '2022-09-16', 0, 2, 'Ordered', 0, 2, NULL, NULL),
(13, '2022-09-16', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(15, '2022-09-16', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(9, '2022-09-16', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(13, '2022-09-16', 2, 0, 'order reduction', 2, 0, 2, 1140),
(9, '2022-09-16', 2, 0, 'order reduction', 1, 0, 2, 1200),
(9, '2022-09-16', 2, 0, 'rejected order', 1, 0, 2, 1200),
(13, '2022-09-27', 0, 2, 'Ordered', 0, 2, NULL, NULL),
(16, '2022-09-27', 0, 2, 'Ordered', 0, 2, NULL, NULL),
(11, '2022-09-27', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(9, '2022-09-28', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(16, '2022-09-28', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(13, '2022-09-28', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(15, '2022-09-28', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(15, '2022-09-28', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(11, '2022-09-28', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(15, '2022-09-28', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(11, '2022-10-04', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(20, '2022-10-04', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(16, '2022-10-04', 0, 2, 'Ordered', 0, 2, NULL, NULL),
(9, '2022-10-04', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(15, '2022-10-06', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(9, '2022-10-06', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(13, '2022-10-07', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(9, '2022-10-07', 0, 2, 'Ordered', 0, 2, NULL, NULL),
(9, '2022-10-10', 2, 0, 'damage', 1, 0, 2, 1200),
(13, '2022-10-10', 0, 2, 'Ordered', 0, 2, NULL, NULL),
(9, '2022-10-10', 0, 2, 'Ordered', 0, 2, NULL, NULL),
(13, '2022-10-10', 2, 0, 'damage', 1, 0, 2, 570),
(15, '2022-10-10', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(11, '2022-10-10', 0, 2, 'Ordered', 0, 2, NULL, NULL),
(11, '2022-10-10', 2, 0, 'damage', 1, 0, 2, 1400),
(11, '2022-10-10', 2, 0, 'damage', 1, 0, 2, 1400),
(20, '2022-10-10', 0, 2, 'Ordered', 0, 1, NULL, NULL),
(9, '2022-10-10', 0, 2, 'Ordered', 0, 2, NULL, NULL),
(20, '2022-10-10', 2, 0, 'damage', 1, 0, 2, 300),
(9, '2022-10-10', 2, 0, 'damage', 1, 0, 2, 1200),
(13, '2022-10-10', 0, 2, 'Ordered', 0, 2, NULL, NULL),
(9, '2022-10-10', 0, 2, 'Ordered', 0, 2, NULL, NULL),
(13, '2022-10-10', 2, 0, 'damage', 1, 0, 2, 570);

-- --------------------------------------------------------

--
-- Table structure for table `locationproduct`
--

DROP TABLE IF EXISTS `locationproduct`;
CREATE TABLE IF NOT EXISTS `locationproduct` (
  `locationId` int(200) NOT NULL,
  `productId` int(100) DEFAULT NULL,
  `productName` longtext,
  `quantityAdded` int(100) DEFAULT NULL,
  `lpId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`lpId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lowerpricelpo`
--

DROP TABLE IF EXISTS `lowerpricelpo`;
CREATE TABLE IF NOT EXISTS `lowerpricelpo` (
  `purchaseId` int(100) NOT NULL,
  `vendorId` int(100) NOT NULL,
  `itemName` varchar(200) NOT NULL,
  `itemDescription` varchar(200) NOT NULL,
  `itemQuantity` int(20) NOT NULL,
  `itemUnitMeasure` varchar(200) NOT NULL,
  `vendorUnitPrice` double NOT NULL,
  `itemNumber` int(100) NOT NULL,
  `venname` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lowerpricelpo`
--

INSERT INTO `lowerpricelpo` (`purchaseId`, `vendorId`, `itemName`, `itemDescription`, `itemQuantity`, `itemUnitMeasure`, `vendorUnitPrice`, `itemNumber`, `venname`) VALUES
(3456, 8, 'gawn', 'flay', 3, '', 1000, 2, 'WOERKA NIG CO LTD'),
(3456, 9, 'shoe', 'adidas', 3, '', 500, 1, 'BUNN REGENCY'),
(3457, 6, 'Belt', 'rollex', 3, 'pic', 800, 3, 'MAC MORRIS INTL CO LTD'),
(3457, 9, 'T-shirt', 'Gooshe', 4, 'lng', 3000, 2, 'BUNN REGENCY'),
(3457, 9, 'Shoe', 'Adidas', 3, 'par', 6000, 1, 'BUNN REGENCY'),
(3459, 6, 'book', 'statistic textbook', 1, 'pic', 2500, 1, 'MAC MORRIS INTL CO LTD'),
(3459, 6, 'matras', 'six spring bed', 1, 'pic', 1500, 2, 'MAC MORRIS INTL CO LTD'),
(3460, 13, 'laptop', '8gb ram of any type', 1, 'pic', 285000, 1, 'NAS AUTO LINK '),
(3460, 8, 'mouse', 'wireless mouse', 1, 'pic', 1500, 2, 'WOERKA NIG CO LTD'),
(3461, 6, 'Phone', 'android ', 1, 'pic', 65000, 1, 'MAC MORRIS INTL CO LTD'),
(3461, 6, 'T-shirt', 'blue tShirt', 3, 'pic', 2500, 2, 'MAC MORRIS INTL CO LTD'),
(3462, 6, 'pen', 'big', 10, 'pic', 70, 1, 'MAC MORRIS INTL CO LTD'),
(3462, 6, 'note book', 'hard cover', 7, 'pic', 500, 2, 'MAC MORRIS INTL CO LTD'),
(3463, 27, 'bag', 'cross bag', 1, 'pic', 3400, 1, 'ABDULRAJIF SALIU'),
(3463, 9, 'trouser', 'genes trouser', 5, 'pic', 2500, 2, 'BUNN REGENCY'),
(3464, 6, 'Milo', 'tea', 2, 'can', 1200, 1, 'MAC MORRIS INTL CO LTD'),
(3464, 6, 'clipper', 'canon clipper for barbing', 1, 'pic', 6400, 2, 'MAC MORRIS INTL CO LTD'),
(3465, 6, 'shoe', 'school shoe', 2, 'pair', 3200, 1, 'MAC MORRIS INTL CO LTD'),
(3465, 9, 'shirt', 'school shirt', 2, 'pic', 3000, 2, 'BUNN REGENCY');

-- --------------------------------------------------------

--
-- Table structure for table `lpouniquevendor`
--

DROP TABLE IF EXISTS `lpouniquevendor`;
CREATE TABLE IF NOT EXISTS `lpouniquevendor` (
  `purchaseId` int(100) NOT NULL,
  `vendorId` int(100) NOT NULL,
  `venname` varchar(200) NOT NULL,
  `discount` int(100) NOT NULL,
  `vat` varchar(30) NOT NULL,
  `grandtotal` int(100) NOT NULL,
  `lpocreated` varchar(20) NOT NULL,
  `approvesup` varchar(100) NOT NULL,
  `approveman` varchar(100) NOT NULL,
  `approvemand` varchar(100) NOT NULL,
  `remsup` varchar(200) NOT NULL,
  `remman` varchar(200) NOT NULL,
  `remmand` varchar(200) NOT NULL,
  `sigsup` varchar(200) NOT NULL,
  `sigman` varchar(200) NOT NULL,
  `sigmand` varchar(200) NOT NULL,
  `mountwords` varchar(200) NOT NULL,
  `lpono` int(100) NOT NULL,
  `lpodate` date NOT NULL,
  `disc` int(100) NOT NULL,
  `vt` int(100) NOT NULL,
  `mandate` varchar(200) NOT NULL,
  `manddate` varchar(200) NOT NULL,
  `supdate` varchar(200) NOT NULL,
  `subtotal` int(200) NOT NULL,
  `lposent` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lpouniquevendor`
--

INSERT INTO `lpouniquevendor` (`purchaseId`, `vendorId`, `venname`, `discount`, `vat`, `grandtotal`, `lpocreated`, `approvesup`, `approveman`, `approvemand`, `remsup`, `remman`, `remmand`, `sigsup`, `sigman`, `sigmand`, `mountwords`, `lpono`, `lpodate`, `disc`, `vt`, `mandate`, `manddate`, `supdate`, `subtotal`, `lposent`) VALUES
(3456, 9, 'BUNN REGENCY', 60, '72', 1512, 'Yes', 'approve', 'approve', 'approve', 'good to go', 'nice', 'move on', '../Upload/62b2f22ac5b1d3.95862652.png', '../Upload/62b2f29123e749.48953053.png', '../Upload/62b2f2d43a0354.47316097.png', 'One thousand five hundred and twelve Naira', 3913, '2022-06-26', 4, 5, '2022-06-26', '2022-06-26', '2022-06-26', 1500, 0),
(3456, 8, 'WOERKA NIG CO LTD', 60, '147', 3087, 'Yes', 'approve', 'approve', 'approve', 'go on', 'nice one', 'ok', '../Upload/62b2f22ac5b1d3.95862652.png', '../Upload/62b2f29123e749.48953053.png', '../Upload/62b2f2d43a0354.47316097.png', 'three thousand eighty seven naira only', 8482, '2022-06-28', 2, 5, '2022-06-28', '2022-06-28', '2022-06-28', 3000, 0),
(3457, 9, 'BUNN REGENCY', 600, '2250', 31650, 'Yes', 'Pending', 'Pending', 'Pending', '', '', '', '', '', '', 'thirty one thousand six hundred and fifty naira only', 3382, '2022-07-03', 2, 5, '0000-00-00', '0000-00-00', '0000-00-00', 30000, 0),
(3465, 6, 'MAC MORRIS INTL CO LTD', 1280, '384', 5504, 'Yes', 'approve', 'approve', 'approve', 'ok', 'good', 'nice', '', '', '', 'Five thousand five hundred and four', 8483, '2022-10-04', 20, 5, '2022-10-04', '2022-10-04', '2022-10-04', 6400, 0),
(3465, 9, 'BUNN REGENCY', 600, '405', 5805, 'Yes', 'approve', 'approve', 'approve', 'ok', 'good', 'good', '', '', '', 'Five thousand eight hundred and five', 8484, '2022-10-04', 10, 5, '2022-10-04', '2022-10-04', '2022-10-04', 6000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `altphone` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthmonth` varchar(20) NOT NULL,
  `birthday` int(10) NOT NULL,
  PRIMARY KEY (`fullname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`fullname`, `phone`, `altphone`, `address`, `email`, `birthmonth`, `birthday`) VALUES
('Victor Peters', '08035840779', '', 'Autograph', 'victor_peters57@yahoo.com', 'May', 26);

-- --------------------------------------------------------

--
-- Table structure for table `newpresonnel`
--

DROP TABLE IF EXISTS `newpresonnel`;
CREATE TABLE IF NOT EXISTS `newpresonnel` (
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `office` varchar(60) NOT NULL,
  `signature` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newpresonnel`
--

INSERT INTO `newpresonnel` (`fname`, `lname`, `email`, `phone`, `address`, `office`, `signature`, `sex`) VALUES
('Nyakno-Abasi', 'Davis', 'nyaknodavis318@gmail.com', '09036103607', 'cgbar', 'managingDirector', '../Upload/628b53ef2571a9.75095800.png', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `oderid` int(70) NOT NULL,
  `salerid` int(20) NOT NULL,
  `printed` int(10) NOT NULL,
  `k` int(10) NOT NULL,
  `b` int(10) NOT NULL,
  `kk` int(10) NOT NULL,
  `bb` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`oderid`, `salerid`, `printed`, `k`, `b`, `kk`, `bb`) VALUES
(3, 1, 0, 0, 1, 0, 1),
(3, 1, 0, 0, 1, 0, 1),
(4, 1, 0, 1, 1, 1, 0),
(4, 1, 0, 1, 1, 1, 0),
(4, 1, 0, 1, 1, 1, 0),
(4, 1, 0, 1, 1, 0, 1),
(4, 1, 0, 1, 1, 1, 0),
(3, 1, 0, 0, 1, 0, 1),
(3, 1, 0, 0, 1, 0, 1),
(4, 1, 0, 1, 1, 0, 1),
(4, 1, 0, 1, 1, 1, 0),
(4, 1, 0, 1, 1, 1, 0),
(4, 1, 0, 1, 1, 1, 0),
(4, 1, 0, 1, 1, 1, 0),
(4, 1, 0, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderditems`
--

DROP TABLE IF EXISTS `orderditems`;
CREATE TABLE IF NOT EXISTS `orderditems` (
  `productname` varchar(200) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `amount` int(200) NOT NULL,
  `preptime` int(60) NOT NULL,
  `orderid` int(100) NOT NULL,
  `productcat` varchar(200) NOT NULL,
  `sn` int(200) NOT NULL,
  `finish` int(10) NOT NULL,
  `prepAt` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `dateOrderd` date DEFAULT NULL,
  `productId` int(100) NOT NULL,
  `profit` int(100) NOT NULL,
  `costprice` int(100) DEFAULT NULL,
  `sellingprice` int(100) DEFAULT NULL,
  `unitOfMeasure` varchar(70) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderditems`
--

INSERT INTO `orderditems` (`productname`, `price`, `quantity`, `amount`, `preptime`, `orderid`, `productcat`, `sn`, `finish`, `prepAt`, `description`, `dateOrderd`, `productId`, `profit`, `costprice`, `sellingprice`, `unitOfMeasure`, `id`, `location`) VALUES
(' Pepsi', 370, 1, 370, 1, 51, 'Drink', 2, 1, 'Bar', '1 Bottle', '2022-09-16', 15, 200, 170, 370, 'Bottle', 1, NULL),
(' Ewedu', 1400, 3, 4200, 6, 52, 'Soup', 1, 1, 'Kitchen', '3 Plate ', '2022-09-16', 11, 1200, 1000, 1400, 'Plate', 2, NULL),
(' Malt', 570, 1, 570, 3, 52, 'Drink', 2, 1, 'Bar', '3 Bottle', '2022-09-16', 13, 300, 270, 570, 'Bottle', 3, NULL),
(' spak', 1200, 1, 1200, 4, 53, 'Noodle ', 1, 1, 'Kitchen', '2 Plate ', '2022-09-16', 9, 930, 270, 1200, 'Plate', 4, NULL),
(' Malt', 570, 1, 570, 1, 53, 'Drink', 2, 1, 'Bar', '1 Bottle', '2022-09-16', 13, 300, 270, 570, 'Bottle', 5, NULL),
(' Pepsi', 370, 1, 370, 1, 54, 'Drink', 1, 1, 'Bar', '1 Bottle', '2022-09-16', 15, 200, 170, 370, 'Bottle', 6, NULL),
(' spak', 1200, 1, 1200, 2, 54, 'Noodle ', 2, 1, 'Kitchen', '1 Plate ', '2022-09-16', 9, 930, 270, 1200, 'Plate', 7, NULL),
(' Malt', 570, 2, 1140, 2, 55, 'Drink', 1, 1, 'Bar', '2 Bottle', '2022-09-27', 13, 600, 270, 570, 'Bottle', 9, NULL),
(' Jagua', 300, 2, 600, 2, 56, 'Funiture', 1, 1, 'Bar', '2 Bottle', '2022-09-27', 16, 100, 250, 300, 'Bottle', 10, NULL),
(' Ewedu', 1400, 1, 1400, 2, 57, 'Soup', 1, 1, 'Kitchen', '1 Plate ', '2022-09-27', 11, 400, 1000, 1400, 'Plate ', 11, NULL),
(' spak', 1200, 1, 1200, 2, 58, 'Noodle ', 1, 1, 'Kitchen', '1 Plate ', '2022-09-28', 9, 930, 270, 1200, 'Plate ', 12, NULL),
(' Jagua', 300, 1, 300, 1, 59, 'Funiture', 1, 1, 'Bar', '1 Bottle', '2022-09-28', 16, 50, 250, 300, 'Bottle', 13, NULL),
(' Malt', 570, 1, 570, 1, 59, 'Drink', 2, 1, 'Bar', '1 Bottle', '2022-09-28', 13, 300, 270, 570, 'Bottle', 14, NULL),
(' Pepsi', 370, 1, 370, 1, 60, 'Drink', 1, 1, 'Bar', '1 Bottle', '2022-09-28', 15, 200, 170, 370, 'Bottle', 15, NULL),
(' Pepsi', 370, 1, 370, 1, 61, 'Drink', 1, 1, 'Bar', '1 Bottle', '2022-09-28', 15, 200, 170, 370, 'Bottle', 16, NULL),
(' Ewedu', 1400, 1, 1400, 2, 62, 'Soup', 1, 1, 'Kitchen', '1 Plate ', '2022-09-28', 11, 400, 1000, 1400, 'Plate ', 17, NULL),
(' Pepsi', 370, 1, 370, 1, 62, 'Drink', 2, 1, 'Bar', '1 Bottle', '2022-09-28', 15, 200, 170, 370, 'Bottle', 18, NULL),
(' Ewedu', 1400, 1, 1400, 2, 63, 'Soup', 1, 1, 'Kitchen', '1 Plate ', '2022-10-04', 11, 400, 1000, 1400, 'Plate ', 19, NULL),
(' Fanta', 300, 1, 300, 1, 63, 'Drink', 2, 1, 'Bar', '1 Bottle', '2022-10-04', 20, 50, 250, 300, 'Bottle', 20, NULL),
(' Jagua', 300, 2, 600, 2, 64, 'Funiture', 1, 1, 'Bar', '2 Bottle', '2022-10-04', 16, 100, 250, 300, 'Bottle', 21, NULL),
(' spak', 1200, 1, 1200, 2, 64, 'Noodle ', 2, 1, 'Kitchen', '1 Plate ', '2022-10-04', 9, 930, 270, 1200, 'Plate ', 22, NULL),
(' Pepsi', 370, 1, 370, 1, 65, 'Drink', 1, 1, 'Bar', '1 Bottle', '2022-10-06', 15, 200, 170, 370, 'Bottle', 23, 'Garden bar'),
(' spak', 1200, 1, 1200, 2, 65, 'Noodle ', 2, 1, 'Kitchen', '1 Plate ', '2022-10-06', 9, 930, 270, 1200, 'Plate ', 24, 'Garden bar'),
(' Malt', 570, 1, 570, 1, 66, 'Drink', 1, 1, 'Bar', '1 Bottle', '2022-10-07', 13, 300, 270, 570, 'Bottle', 25, 'Pool bar'),
(' spak', 1200, 1, 1200, 4, 66, 'Noodle ', 2, 1, 'Kitchen', '2 Plate ', '2022-10-07', 9, 930, 270, 1200, 'Plate ', 26, 'Pool bar'),
(' Malt', 570, 1, 570, 2, 67, 'Drink', 1, 1, 'Bar', '2 Bottle', '2022-10-10', 13, 300, 270, 570, 'Bottle', 27, 'Reception 1'),
(' spak', 1200, 2, 2400, 4, 67, 'Noodle ', 2, 1, 'Kitchen', '2 Plate ', '2022-10-10', 9, 1860, 270, 1200, 'Plate ', 28, 'Reception 1'),
(' Pepsi', 370, 1, 370, 1, 68, 'Drink', 1, 1, 'Bar', '1 Bottle', '2022-10-10', 15, 200, 170, 370, 'Bottle', 29, 'Reception 2'),
(' Ewedu', 1400, 0, 0, 4, 68, 'Soup', 2, 1, 'Kitchen', '2 Plate ', '2022-10-10', 11, 0, 1000, 1400, 'Plate ', 30, 'Reception 2'),
(' Fanta', 300, 0, 0, 1, 69, 'Drink', 1, 1, 'Bar', '1 Bottle', '2022-10-10', 20, 0, 250, 300, 'Bottle', 31, 'Reception 1'),
(' spak', 1200, 1, 1200, 4, 69, 'Noodle ', 2, 1, 'Kitchen', '2 Plate ', '2022-10-10', 9, 930, 270, 1200, 'Plate ', 32, 'Reception 1'),
(' Malt', 570, 1, 570, 2, 70, 'Drink', 1, 1, 'Bar', '2 Bottle', '2022-10-10', 13, 300, 270, 570, 'Bottle', 33, 'Reception 1'),
(' spak', 1200, 2, 2400, 4, 70, 'Noodle ', 2, 1, 'Kitchen', '2 Plate ', '2022-10-10', 9, 1860, 270, 1200, 'Plate ', 34, 'Reception 1');

-- --------------------------------------------------------

--
-- Table structure for table `orderingunit`
--

DROP TABLE IF EXISTS `orderingunit`;
CREATE TABLE IF NOT EXISTS `orderingunit` (
  `unit` varchar(200) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unit` (`unit`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderingunit`
--

INSERT INTO `orderingunit` (`unit`, `id`) VALUES
('Bottle', 1),
('Bottles ', 2),
('Plate', 3),
('Plates', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `sellerid` int(10) DEFAULT NULL,
  `orderid` int(10) NOT NULL,
  `totaltime` int(30) NOT NULL,
  `totalammount` int(200) NOT NULL,
  `status` int(10) NOT NULL,
  `orderdate` date NOT NULL,
  `odertime` varchar(30) NOT NULL,
  `hr` int(10) NOT NULL,
  `min` int(10) NOT NULL,
  `ampm` varchar(20) NOT NULL,
  `br` int(20) NOT NULL,
  `kch` int(20) NOT NULL,
  `receipt` int(10) NOT NULL,
  `k` int(10) NOT NULL,
  `b` int(10) NOT NULL,
  `bill` int(10) NOT NULL,
  `kt` int(100) NOT NULL,
  `bt` int(100) NOT NULL,
  `totalProfit` int(100) NOT NULL,
  `customerId` int(70) NOT NULL,
  `hasKechenDisc` tinyint(1) DEFAULT NULL,
  `hasBarDisc` tinyint(1) DEFAULT NULL,
  `kechenDisc` longtext,
  `barDisc` longtext,
  `locationName` longtext,
  `serviceCharge` int(200) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`sellerid`, `orderid`, `totaltime`, `totalammount`, `status`, `orderdate`, `odertime`, `hr`, `min`, `ampm`, `br`, `kch`, `receipt`, `k`, `b`, `bill`, `kt`, `bt`, `totalProfit`, `customerId`, `hasKechenDisc`, `hasBarDisc`, `kechenDisc`, `barDisc`, `locationName`, `serviceCharge`) VALUES
(0, 64, 4, 1800, 1, '2022-10-04', '3:01 am ', 3, 1, 'am', 1, 1, 0, 1, 1, 0, 2, 2, 1030, 13, NULL, NULL, NULL, NULL, NULL, 0),
(0, 63, 3, 1700, 1, '2022-10-04', '2:50 am ', 2, 50, 'am', 1, 1, 1, 1, 1, 2, 2, 1, 450, 12, NULL, NULL, NULL, NULL, NULL, 0),
(0, 62, 3, 1770, 1, '2022-09-28', '7:06 pm ', 7, 6, 'pm', 1, 1, 1, 1, 1, 0, 2, 1, 600, 11, NULL, NULL, NULL, NULL, NULL, 0),
(0, 61, 1, 370, 1, '2022-09-28', '6:03 pm ', 6, 3, 'pm', 1, 0, 1, 0, 1, 0, 0, 1, 200, 10, NULL, NULL, NULL, NULL, NULL, 0),
(0, 60, 1, 370, 1, '2022-09-28', '5:16 pm ', 5, 16, 'pm', 1, 0, 1, 0, 1, 1, 0, 1, 200, 9, NULL, NULL, NULL, NULL, NULL, 0),
(0, 59, 2, 870, 1, '2022-09-28', '4:57 pm ', 4, 57, 'pm', 1, 0, 1, 0, 1, 0, 0, 2, 350, 8, NULL, NULL, NULL, NULL, NULL, 0),
(0, 58, 2, 1200, 1, '2022-09-28', '4:45 pm ', 4, 45, 'pm', 0, 1, 1, 1, 0, 1, 2, 0, 930, 7, NULL, NULL, NULL, NULL, NULL, 0),
(0, 57, 2, 1400, 1, '2022-09-27', '9:28 pm ', 9, 28, 'pm', 0, 1, 1, 1, 0, 3, 2, 0, 400, 6, NULL, NULL, NULL, NULL, NULL, 0),
(0, 56, 2, 600, 1, '2022-09-27', '9:24 pm ', 9, 24, 'pm', 1, 0, 0, 0, 1, 0, 0, 2, 100, 5, NULL, NULL, NULL, NULL, NULL, 0),
(0, 54, 3, 1570, 1, '2022-09-16', '2:41 am ', 2, 41, 'am', 1, 1, 1, 1, 1, 5, 2, 1, 1130, 3, NULL, NULL, NULL, NULL, NULL, 0),
(0, 53, 5, 1770, 1, '2022-09-16', '2:36 am ', 2, 36, 'am', 1, 1, 1, 1, 1, 5, 4, 1, 1230, 3, NULL, NULL, NULL, NULL, NULL, 0),
(0, 52, 9, 5910, 1, '2022-09-16', '2:19 am ', 2, 19, 'am', 1, 1, 1, 1, 1, 5, 6, 3, 2100, 3, NULL, NULL, NULL, NULL, NULL, 0),
(0, 55, 2, 1140, 1, '2022-09-27', '9:17 pm ', 9, 17, 'pm', 1, 0, 0, 0, 1, 0, 0, 2, 600, 4, NULL, NULL, NULL, NULL, NULL, 0),
(0, 51, 3, 370, 1, '2022-09-16', '1:32 am ', 1, 32, 'am', 1, 1, 0, 1, 1, 5, 2, 1, 200, 3, NULL, NULL, NULL, NULL, NULL, 0),
(0, 65, 3, 1570, 1, '2022-10-06', '10:01 am ', 10, 1, 'am', 1, 1, 0, 1, 1, 0, 2, 1, 1130, 14, 0, 1, '', 'Prepsi not too cheld', 'Garden bar', 0),
(0, 66, 5, 1770, 1, '2022-10-07', '12:42 pm ', 12, 42, 'pm', 1, 1, 0, 1, 1, 0, 4, 1, 1230, 15, 1, 1, 'spak with boild egg only no meat', 'cheeld can malt', 'Pool bar', 0),
(0, 67, 6, 2970, 1, '2022-10-10', '11:06 am ', 11, 6, 'am', 1, 1, 0, 1, 1, 1, 4, 2, 2160, 16, 1, 1, 'food shoul not be cold', 'cool can malt drink', 'Reception 1', 177),
(0, 68, 5, 370, 1, '2022-10-10', '11:25 am ', 11, 25, 'am', 1, 1, 0, 1, 1, 2, 4, 1, 200, 17, 1, 1, 'hot ewedu', 'malt not coold', 'Reception 2', 19),
(0, 69, 5, 1200, 1, '2022-10-10', '11:43 am ', 11, 43, 'am', 1, 1, 0, 1, 1, 2, 4, 1, 930, 18, 1, 1, 'warm spak', 'one cool one not cool', 'Reception 1', 60),
(0, 70, 6, 2970, 1, '2022-10-10', '12:15 pm ', 12, 15, 'pm', 1, 1, 1, 1, 1, 2, 4, 2, 2160, 19, 1, 1, 'warm', 'cool', 'Reception 1', 149);

-- --------------------------------------------------------

--
-- Table structure for table `paidincentive`
--

DROP TABLE IF EXISTS `paidincentive`;
CREATE TABLE IF NOT EXISTS `paidincentive` (
  `staffid` varchar(20) NOT NULL,
  `incentive` varchar(20) NOT NULL,
  `paiddate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

DROP TABLE IF EXISTS `payroll`;
CREATE TABLE IF NOT EXISTS `payroll` (
  `sn` int(10) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `monthlySalary` int(100) NOT NULL,
  `deduction` int(100) NOT NULL,
  `salaryAdvance` int(100) NOT NULL,
  `commission` int(100) NOT NULL,
  `amountPayable` int(200) NOT NULL,
  `date` date NOT NULL DEFAULT '1111-11-11',
  `monthFor` int(10) NOT NULL,
  `yearFor` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`sn`, `firstName`, `lastName`, `monthlySalary`, `deduction`, `salaryAdvance`, `commission`, `amountPayable`, `date`, `monthFor`, `yearFor`) VALUES
(1, 'John', ' doe', 20000, 200, 10000, 0, 9800, '2022-08-20', 8, 2022),
(2, 'Vera', ' Davis', 9000, 0, 0, 0, 9000, '2022-08-20', 8, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `payrollinfo`
--

DROP TABLE IF EXISTS `payrollinfo`;
CREATE TABLE IF NOT EXISTS `payrollinfo` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL DEFAULT '1111-11-11',
  `createdby` int(10) NOT NULL,
  `approve1` int(10) NOT NULL DEFAULT '1',
  `approve2` int(10) NOT NULL DEFAULT '1',
  `approve3` int(10) NOT NULL DEFAULT '1',
  `remark1` varchar(200) DEFAULT NULL,
  `remark2` varchar(200) DEFAULT NULL,
  `remark3` varchar(200) DEFAULT NULL,
  `sgnature1` varchar(300) DEFAULT NULL,
  `sgnature2` varchar(300) DEFAULT NULL,
  `sgnature3` varchar(300) DEFAULT NULL,
  `approveDate1` date NOT NULL DEFAULT '1111-11-11',
  `approveDate2` date NOT NULL DEFAULT '1111-11-11',
  `approveDate3` date NOT NULL DEFAULT '1111-11-11',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payrollinfo`
--

INSERT INTO `payrollinfo` (`id`, `date`, `createdby`, `approve1`, `approve2`, `approve3`, `remark1`, `remark2`, `remark3`, `sgnature1`, `sgnature2`, `sgnature3`, `approveDate1`, `approveDate2`, `approveDate3`) VALUES
(14, '2022-08-20', 1, 2, 2, 2, 'go ahead', 'ok', 'pls send me the excel sheet ', '../Upload/62b2f22ac5b1d3.95862652.png', '../Upload/62b2f29123e749.48953053.png', '../Upload/62b2f2d43a0354.47316097.png', '2022-08-20', '2022-08-20', '2022-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `preqitem`
--

DROP TABLE IF EXISTS `preqitem`;
CREATE TABLE IF NOT EXISTS `preqitem` (
  `itemname` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `unitprice` int(16) NOT NULL,
  `qty` int(20) NOT NULL,
  `subtotal` int(20) NOT NULL,
  `preqno` int(33) NOT NULL,
  `um` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preqitem`
--

INSERT INTO `preqitem` (`itemname`, `description`, `unitprice`, `qty`, `subtotal`, `preqno`, `um`) VALUES
('shoe', 'adidas', 7000, 3, 21000, 3456, 'pcs'),
('gawn', 'flay', 8000, 3, 24000, 3456, 'pkt'),
('Table', 'Flat Glass table', 18000, 5, 90000, 12345, ''),
('Camry', 'Car ', 8000000, 2, 16000000, 12345, ''),
('Cardboard ', 'Designers ', 4000, 20, 80000, 12348, ''),
('Lexus', ' New Car Jeep', 14000000, 2, 28000000, 12348, ''),
('Shoe', 'Adidas', 4500, 3, 13500, 3457, 'par'),
('T-shirt', 'Gooshe', 3000, 4, 12000, 3457, 'lng'),
('Belt', 'rollex', 1500, 3, 4500, 3457, 'pic'),
('Shoe ', 'Addidas', 9500, 2, 19000, 3458, 'pr'),
('T-shirt', 'Field make', 4600, 3, 13800, 3458, 'pic'),
('Trouser ', 'Jeans ', 3000, 3, 9000, 3458, 'pic'),
('Inner Wears ', 'singlet and boxers ', 2600, 3, 7800, 3458, 'pak'),
('book', 'statistic textbook', 3000, 1, 3000, 3459, 'pic'),
('matras', 'six spring bed', 20000, 1, 20000, 3459, 'pic'),
('laptop', '8gb ram of any type', 280000, 1, 280000, 3460, 'pic'),
('mouse', 'wireless mouse', 2000, 1, 2000, 3460, 'pic'),
('Phone', 'android ', 70000, 1, 70000, 3461, 'pic'),
('T-shirt', 'blue tShirt', 3700, 3, 11100, 3461, 'pic'),
('pen', 'big', 100, 10, 1000, 3462, 'pic'),
('note book', 'hard cover', 570, 7, 3990, 3462, 'pic'),
('bag', 'cross bag', 7000, 1, 7000, 3463, 'pic'),
('trouser', 'genes trouser', 4000, 5, 20000, 3463, 'pic'),
('Milo', 'tea', 1700, 2, 3400, 3464, 'can'),
('clipper', 'canon clipper for barbing', 7000, 1, 7000, 3464, 'pic'),
('shoe', 'school shoe', 9000, 2, 18000, 3465, 'pair'),
('shirt', 'school shirt', 2400, 2, 4800, 3465, 'pic');

-- --------------------------------------------------------

--
-- Table structure for table `prequisitionconfirm`
--

DROP TABLE IF EXISTS `prequisitionconfirm`;
CREATE TABLE IF NOT EXISTS `prequisitionconfirm` (
  `pregno` int(100) NOT NULL,
  `vendorid` varchar(200) NOT NULL,
  `for` varchar(200) NOT NULL,
  `vname` varchar(200) NOT NULL,
  `from` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `lpo` int(20) NOT NULL,
  `ca` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prequisitionconfirm`
--

INSERT INTO `prequisitionconfirm` (`pregno`, `vendorid`, `for`, `vname`, `from`, `date`, `lpo`, `ca`) VALUES
(3456, '6', 'saturday stuff', 'MAC MORRIS INTL CO LTD', 'nick davis', '2022-06-01', 0, NULL),
(3456, '8', 'saturday stuff', 'WOERKA NIG CO LTD', 'nick davis', '2022-06-01', 0, NULL),
(3456, '12', 'saturday stuff', 'PROMPT MULTI LINK VENTURES', 'nick davis', '2022-06-01', 0, NULL),
(3456, '9', 'saturday stuff', 'BUNN REGENCY', 'nick davis', '2022-06-01', 0, NULL),
(3457, '6', 'December Budget', 'MAC MORRIS INTL CO LTD', 'nick davis', '2022-06-22', 0, NULL),
(3457, '9', 'December Budget', 'BUNN REGENCY', 'nick davis', '2022-06-22', 0, NULL),
(3459, '6', 'school2', 'MAC MORRIS INTL CO LTD', 'nick davis', '2022-04-10', 0, NULL),
(3459, '9', 'school2', 'BUNN REGENCY', 'nick davis', '2022-04-10', 0, NULL),
(3460, '10', 'school33', 'SILVERBURTON NIGERIA LTD', 'nick davis', '2022-04-10', 0, NULL),
(3460, '13', 'school33', 'NAS AUTO LINK', 'nick davis', '2022-04-10', 0, NULL),
(3460, '8', 'school33', 'WOERKA NIG CO LTD', 'nick davis', '2022-04-10', 0, NULL),
(3461, '6', 'school44', 'MAC MORRIS INTL CO LTD', 'nick davis', '2022-04-10', 0, NULL),
(3461, '9', 'school44', 'BUNN REGENCY', 'nick davis', '2022-04-10', 0, NULL),
(3461, '8', 'school44', 'WOERKA NIG CO LTD', 'nick davis', '2022-04-10', 0, NULL),
(3462, '6', 'school55', 'MAC MORRIS INTL CO LTD', 'nick davis', '2022-04-10', 0, NULL),
(3462, '26', 'school55', 'SHAAYAU SHEHU', 'nick davis', '2022-04-10', 0, NULL),
(3462, '9', 'school55', 'BUNN REGENCY', 'nick davis', '2022-04-10', 0, NULL),
(3463, '6', 'school66', 'MAC MORRIS INTL CO LTD', 'nick davis', '2022-04-10', 0, 1),
(3463, '9', 'school66', 'BUNN REGENCY', 'nick davis', '2022-04-10', 0, 1),
(3463, '27', 'school66', 'ABDULRAJIF SALIU', 'nick davis', '2022-04-10', 0, 1),
(3464, '9', 'school77', 'BUNN REGENCY', 'nick davis', '2022-04-10', 0, 1),
(3464, '6', 'school77', 'MAC MORRIS INTL CO LTD', 'nick davis', '2022-04-10', 0, 1),
(3464, '13', 'school77', 'NAS AUTO LINK', 'nick davis', '2022-04-10', 0, 1),
(3464, '8', 'school77', 'WOERKA NIG CO LTD', 'nick davis', '2022-04-10', 0, 1),
(3465, '9', 'school11', 'BUNN REGENCY', 'nick davis', '2022-04-10', 0, 1),
(3465, '8', 'school11', 'WOERKA NIG CO LTD', 'nick davis', '2022-04-10', 0, 1),
(3465, '6', 'school11', 'MAC MORRIS INTL CO LTD', 'nick davis', '2022-04-10', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prequisitioninfo`
--

DROP TABLE IF EXISTS `prequisitioninfo`;
CREATE TABLE IF NOT EXISTS `prequisitioninfo` (
  `preqno` int(99) NOT NULL,
  `from` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `date` date NOT NULL DEFAULT '1111-11-11',
  `summary` varchar(200) NOT NULL,
  `total` int(99) NOT NULL,
  `supapprove` varchar(30) NOT NULL,
  `manapprove` varchar(30) NOT NULL,
  `mandapprove` varchar(30) NOT NULL,
  `manremark` varchar(300) NOT NULL DEFAULT '',
  `mandremark` varchar(300) NOT NULL,
  `supremark` varchar(300) NOT NULL,
  `mansig` varchar(200) NOT NULL,
  `mandsig` varchar(200) NOT NULL,
  `supsig` varchar(200) NOT NULL,
  `reqfrom` varchar(100) NOT NULL,
  `compappsup` varchar(100) NOT NULL,
  `compappman` varchar(100) NOT NULL,
  `compappmand` varchar(100) NOT NULL,
  `compremsup` varchar(200) NOT NULL,
  `compremman` varchar(200) NOT NULL,
  `compremmand` varchar(200) NOT NULL,
  `csupsig` varchar(200) NOT NULL,
  `cmansig` varchar(200) NOT NULL,
  `cmandsig` varchar(200) NOT NULL,
  `supdate` date NOT NULL DEFAULT '1111-11-11',
  `mandate` date NOT NULL DEFAULT '1111-11-11',
  `manddate` date NOT NULL DEFAULT '1111-11-11',
  `quoted` int(100) NOT NULL,
  `csupapprove` varchar(200) NOT NULL,
  `supcappdate` date NOT NULL DEFAULT '1111-11-11',
  `mandcappdate` date NOT NULL DEFAULT '1111-11-11',
  `mancappdate` date NOT NULL DEFAULT '1111-11-01',
  PRIMARY KEY (`preqno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prequisitioninfo`
--

INSERT INTO `prequisitioninfo` (`preqno`, `from`, `subject`, `date`, `summary`, `total`, `supapprove`, `manapprove`, `mandapprove`, `manremark`, `mandremark`, `supremark`, `mansig`, `mandsig`, `supsig`, `reqfrom`, `compappsup`, `compappman`, `compappmand`, `compremsup`, `compremman`, `compremmand`, `csupsig`, `cmansig`, `cmandsig`, `supdate`, `mandate`, `manddate`, `quoted`, `csupapprove`, `supcappdate`, `mandcappdate`, `mancappdate`) VALUES
(3456, 'nick davis', 'saturday stuff', '2022-06-01', 'for clube', 45000, 'approve', 'approve', 'approve', '', '', '', '', '', '', 'adnindavis', 'approve', 'approve', 'approve', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', 4, 'approve', '0000-00-00', '0000-00-00', '0000-00-00'),
(3457, 'nick davis', 'December Budget', '2022-06-22', 'to restock my wordrob ', 30000, 'approve', 'approve', 'approve', 'good collection', 'good stuff', 'nice items', '../Upload/62b2f29123e749.48953053.png', '../Upload/62b2f2d43a0354.47316097.png', '../Upload/62b2f22ac5b1d3.95862652.png', 'adnindavis', 'approve', 'approve', 'approve', 'fegrgreg', 'hellouh', 'jtjtjjrrr', '../Upload/62b2f22ac5b1d3.95862652.png', '../Upload/62b2f29123e749.48953053.png', '../Upload/62b2f2d43a0354.47316097.png', '2022-06-22', '2022-06-22', '2022-06-22', 2, '', '2022-06-25', '2022-06-25', '2022-06-25'),
(3458, 'nick davis', 'My Personal needs', '2022-06-27', 'This are just for my personal needs', 49600, 'approve', 'approve', 'decline', 'Good', 'this is crazy ', 'Nice', '../Upload/62b2f29123e749.48953053.png', '../Upload/62b2f2d43a0354.47316097.png', '../Upload/62b2f22ac5b1d3.95862652.png', 'adnindavis', 'Pending', 'Pending', 'Pending', '', '', '', '', '', '', '2022-06-27', '2022-06-27', '2022-06-27', 0, '', '0000-00-00', '0000-00-00', '0000-00-00'),
(3459, 'nick davis', 'school2', '2022-10-04', 'things to be used in school', 23000, 'approve', 'approve', 'approve', 'nice', 'go', 'ok', '', '', '', 'adnindavis', 'approve', 'approve', 'approve', 'ok', 'nice', 'go', '', '', '', '2022-10-04', '2022-10-04', '2022-10-04', 2, '', '2022-10-04', '2022-10-04', '2022-10-04'),
(3460, 'nick davis', 'school33', '2022-10-04', 'For school final project', 282000, 'approve', 'approve', 'approve', 'Keep going', 'hope this will be enough ', 'do it', '', '', '', 'adnindavis', 'Pending', 'Pending', 'Pending', '', '', '', '', '', '', '2022-10-04', '2022-10-04', '2022-10-04', 3, '', '1111-11-11', '1111-11-11', '1111-11-01'),
(3461, 'nick davis', 'school44', '2022-10-04', 'used in school', 81100, 'approve', 'approve', 'approve', 'ok', 'go', 'nice', '', '', '', 'adnindavis', 'Pending', 'Pending', 'Pending', '', '', '', '', '', '', '2022-10-04', '2022-10-04', '2022-10-04', 3, '', '1111-11-11', '1111-11-11', '1111-11-01'),
(3462, 'nick davis', 'school55', '2022-10-04', 'for school', 4990, 'approve', 'approve', 'approve', 'good', 'nice', 'go', '', '', '', 'adnindavis', 'Pending', 'Pending', 'Pending', '', '', '', '', '', '', '2022-10-04', '2022-10-04', '2022-10-04', 3, '', '1111-11-11', '1111-11-11', '1111-11-01'),
(3463, 'nick davis', 'school66', '2022-10-04', 'for school', 27000, 'approve', 'approve', 'approve', 'nice', 'ok', 'good', '', '', '', 'adnindavis', 'Pending', 'Pending', 'Pending', '', '', '', '', '', '', '2022-10-04', '2022-10-04', '2022-10-04', 3, '', '1111-11-11', '1111-11-11', '1111-11-01'),
(3464, 'nick davis', 'school77', '2022-10-04', 'for school', 10400, 'approve', 'approve', 'approve', 'nice', 'good', 'ok', '', '', '', 'adnindavis', 'Pending', 'Pending', 'Pending', '', '', '', '', '', '', '2022-10-04', '2022-10-04', '2022-10-04', 3, '', '1111-11-11', '1111-11-11', '1111-11-01'),
(3465, 'nick davis', 'school11', '2022-10-04', 'for school', 22800, 'approve', 'approve', 'approve', 'nice', 'good', 'ok', '', '', '', 'adnindavis', 'Pending', 'Pending', 'Pending', '', '', '', '', '', '', '2022-10-04', '2022-10-04', '2022-10-04', 3, '', '1111-11-11', '1111-11-11', '1111-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `productcat`
--

DROP TABLE IF EXISTS `productcat`;
CREATE TABLE IF NOT EXISTS `productcat` (
  `prodcat` varchar(100) NOT NULL,
  UNIQUE KEY `category` (`prodcat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcat`
--

INSERT INTO `productcat` (`prodcat`) VALUES
('Cigarette'),
('Drinks'),
('Food'),
('Photography'),
('Takeaway Pack');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `ptype` varchar(200) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `price` int(10) NOT NULL,
  `curlevel` int(10) NOT NULL,
  `minlevel` int(10) NOT NULL,
  `profit` double NOT NULL,
  `costprice` int(10) NOT NULL,
  PRIMARY KEY (`pname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ptype`, `pname`, `price`, `curlevel`, `minlevel`, `profit`, `costprice`) VALUES
('Drinks', 'Star Radler', 500, 24, 24, 354, 146),
('Drinks', 'Monster', 1000, 18, 6, 625, 375),
('Drinks', 'Budweiser', 500, 38, 36, 258, 242),
('Drinks', 'Guinness Malt', 500, 15, 24, 383, 117),
('Drinks', 'Fayrouz', 250, 42, 24, 170, 80),
('Drinks', 'Guinness Medium size', 500, 24, 24, 283, 217),
('Drinks', 'Hero', 500, 32, 24, 332, 168),
('Drinks', 'Gulder', 500, 19, 12, 290, 210),
('Drinks', 'Smirnoff Ice', 500, 25, 24, 312, 188),
('Drinks', 'Heineken', 500, 116, 60, 258, 242),
('Drinks', 'Star', 500, 25, 12, 316, 184),
('Drinks', 'Origin', 500, 9, 12, 290, 210),
('Drinks', '33 Export', 500, 20, 10, 332, 168),
('Drinks', 'Water', 200, 140, 12, 148, 52),
('Drinks', 'Fearless', 500, 51, 12, 290, 210),
('Drinks', 'Soda', 250, 81, 36, 133, 117),
('Drinks', 'Life', 500, 53, 12, 275, 225),
('Drinks', 'Chivita Active', 700, 40, 10, 350, 350),
('Drinks', 'Hollandia', 800, 20, 10, 330, 470),
('Drinks', 'Cranberry', 2000, 19, 8, 1188, 812),
('Drinks', 'Power Horse', 1000, 18, 0, 729, 271),
('Drinks', 'Black Bullet', 1000, 18, 6, 729, 271),
('Drinks', 'Blue Bullet', 1000, 1, 6, 770, 230),
('Drinks', 'Red Bull', 1000, 32, 12, 625, 375),
('Drinks', 'Chi Exotic', 1000, 18, 8, 650, 350),
('Drinks', 'Snap', 500, 23, 12, 316, 184),
('Drinks', 'Harp', 500, 7, 0, 340, 160),
('Drinks', 'African Special', 500, 0, 0, 300, 200),
('Drinks', 'Carlo Rossi', 3000, -17, 5, 900, 2100),
('Drinks', 'Hennesy', 15000, 4, 2, 5000, 10000),
('Drinks', 'Smirnoff Vodka X1 Big', 5000, 5, 5, 3500, 1500),
('Drinks', 'Smirnoff Vodka X1 Small', 1000, 30, 12, 600, 400),
('Drinks', 'Jameson Big', 10000, 4, 2, 3500, 6500),
('Drinks', 'Jameson Small', 3500, 0, 0, 2000, 1500),
('Drinks', 'Dorado', 3000, 2, 5, 2080, 920),
('Drinks', 'Origin Bitters', 700, 13, 6, 400, 300),
('Drinks', 'Gordons', 1000, 1, 6, 700, 300),
('Drinks', 'Guinness Smooth', 500, 18, 0, 308, 192),
('Drinks', 'Baileys Cream Small', 1500, 13, 6, 1000, 500),
('Drinks', 'Climax', 1000, 11, 6, 800, 200),
('Drinks', 'Best Small', 1500, 5, 6, 1000, 500),
('Drinks', 'Andre Rose', 5000, 3, 0, 2500, 2500),
('Drinks', 'Campari Small', 3500, -5, 6, 2000, 1500),
('Drinks', 'Red Label', 10000, 2, 5, 5000, 5000),
('Drinks', 'Martinellis', 4500, 6, 3, 3000, 1500),
('Drinks', 'Legend', 500, 18, 12, 308, 192),
('Drinks', 'Red Label Small', 3500, 10, 6, 2000, 1500),
('Drinks', 'Langs', 7000, 3, 2, 3500, 3500),
('Takeaway Pack', 'Big Takeaway Pack', 100, 1, 10, 10, 90),
('Takeaway Pack', 'Small Takeaway Pack', 50, 1, 0, 10, 40),
('Food', 'Goat', 1000, 26, 5, 450, 550),
('Food', 'Chicken', 1000, 30, 5, 550, 450),
('Food', 'Assorted Peppersoup', 1000, 14, 5, 450, 550),
('Food', 'Catfish Peppersoup (Head)', 1500, 0, 5, 875, 625),
('Food', 'Catfish Peppersoup (Tail)', 1500, 0, 5, 875, 625),
('Food', 'Catfish Peppersoup (Middle)', 1000, 0, 5, 375, 625),
('Food', 'Nkwobi', 1000, 29, 5, 350, 650),
('Food', 'Isiewu', 3000, 1, 5, 1400, 1600),
('Food', 'Whit Rice', 500, 100, 5, 450, 50),
('Food', 'Jollof Rice', 700, 20, 5, 550, 150),
('Food', 'Croaker Fish', 2500, -4, 5, 1000, 1500),
('Food', 'Salad', 300, 1, 5, 200, 100),
('Food', 'Chips', 500, 1, 5, 340, 160),
('Photography', 'Photo Session', 3000, 999, 1, 3000, 0),
('Drinks', 'Hoest', 7000, 20, 10, 3400, 3600);

-- --------------------------------------------------------

--
-- Table structure for table `salaryadvance`
--

DROP TABLE IF EXISTS `salaryadvance`;
CREATE TABLE IF NOT EXISTS `salaryadvance` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `staffId` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `date` date NOT NULL DEFAULT '1111-11-11',
  `issuerId` int(10) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salaryadvance`
--

INSERT INTO `salaryadvance` (`id`, `staffId`, `amount`, `date`, `issuerId`, `name`) VALUES
(1, 1998, 10000, '2022-08-10', 1, NULL),
(2, 5481, 20000, '2022-08-22', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `day` int(10) NOT NULL,
  `month` int(10) NOT NULL,
  `year` int(10) NOT NULL,
  `stafftag` varchar(50) NOT NULL,
  `item1` varchar(100) NOT NULL,
  `price1` double NOT NULL,
  `qty1` double NOT NULL,
  `total1` double NOT NULL,
  `item2` varchar(100) NOT NULL,
  `price2` double NOT NULL,
  `qty2` double NOT NULL,
  `total2` double NOT NULL,
  `item3` varchar(100) NOT NULL,
  `price3` double NOT NULL,
  `qty3` double NOT NULL,
  `total3` double NOT NULL,
  `item4` varchar(100) NOT NULL,
  `price4` double NOT NULL,
  `qty4` double NOT NULL,
  `total4` double NOT NULL,
  `item5` varchar(100) NOT NULL,
  `price5` double NOT NULL,
  `qty5` double NOT NULL,
  `total5` double NOT NULL,
  `item6` varchar(100) NOT NULL,
  `price6` double NOT NULL,
  `qty6` double NOT NULL,
  `total6` double NOT NULL,
  `item7` varchar(100) NOT NULL,
  `price7` double NOT NULL,
  `qty7` double NOT NULL,
  `total7` double NOT NULL,
  `item8` varchar(100) NOT NULL,
  `price8` double NOT NULL,
  `qty8` double NOT NULL,
  `total8` double NOT NULL,
  `item9` varchar(100) NOT NULL,
  `price9` double NOT NULL,
  `qty9` double NOT NULL,
  `total9` double NOT NULL,
  `item10` varchar(100) NOT NULL,
  `price10` double NOT NULL,
  `qty10` double NOT NULL,
  `total10` double NOT NULL,
  `sumtotal` double NOT NULL,
  `discount` double NOT NULL,
  `grandtotal` double NOT NULL,
  `salesid` varchar(50) NOT NULL,
  `fulldate` date NOT NULL,
  `paytype` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`day`, `month`, `year`, `stafftag`, `item1`, `price1`, `qty1`, `total1`, `item2`, `price2`, `qty2`, `total2`, `item3`, `price3`, `qty3`, `total3`, `item4`, `price4`, `qty4`, `total4`, `item5`, `price5`, `qty5`, `total5`, `item6`, `price6`, `qty6`, `total6`, `item7`, `price7`, `qty7`, `total7`, `item8`, `price8`, `qty8`, `total8`, `item9`, `price9`, `qty9`, `total9`, `item10`, `price10`, `qty10`, `total10`, `sumtotal`, `discount`, `grandtotal`, `salesid`, `fulldate`, `paytype`) VALUES
(1, 2, 2020, '1001', 'Andre Rose', 5000, 1, 5000, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 5000, 0, 5000, '0', '2020-02-01', ''),
(1, 2, 2020, '1005', 'Carlo Rossi', 3000, 9, 27000, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 27000, 0, 27000, '0', '2020-02-01', ''),
(1, 2, 2020, '1001', 'Blue Bullet', 1000, 2, 2000, 'Baileys Cream Small', 1500, 8, 12000, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 14000, 0, 14000, '0', '2020-02-01', 'cash'),
(1, 2, 2020, '1005', '33 Export', 500, 12, 6000, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 6000, 0, 6000, '0', '2020-02-01', 'Cash'),
(1, 2, 2020, '1001', '33 Export', 500, 3, 1500, 'Heineken', 500, 16, 8000, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 9500, 0, 9500, '1', '2020-02-01', 'Cash'),
(1, 2, 2020, '1001', 'Fayrouz', 250, 32, 8000, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 8000, 0, 8000, '2', '2020-02-01', 'Cash'),
(1, 2, 2020, '1007', 'Gordons', 1000, 13, 13000, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 13000, 0, 13000, '3', '2020-02-01', 'Cash'),
(1, 2, 2020, '1007', 'Guinness Malt', 500, 13, 6500, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 6500, 0, 6500, '4', '2020-02-01', 'Cash'),
(1, 2, 2020, '1001', 'Campari Small', 3500, 4, 14000, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 14000, 0, 14000, '5', '2020-02-01', 'Cash'),
(1, 2, 2020, '1007', 'Chivita Active', 700, 5, 3500, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 'Guinness Medium size', 500, 7, 3500, '', 0, 0, 0, 'Cranberry', 2000, 2, 4000, '', 0, 0, 0, 11000, 0, 11000, '6', '2020-02-01', 'Cash'),
(1, 2, 2020, '1007', 'Best Small', 1500, 4, 6000, 'Campari Small', 3500, 6, 21000, 'Budweiser', 500, 4, 2000, 'Best Small', 1500, 5, 7500, 'Budweiser', 500, 5, 2500, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 39000, 0, 39000, '7', '2020-02-01', 'Pos'),
(1, 2, 2020, '1007', '33 Export', 500, 4, 2000, 'Fayrouz', 250, 3, 750, 'Catfish Peppersoup (Head)', 1500, 1, 1500, 'Dorado', 3000, 3, 9000, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 13250, 0, 13250, '8', '2020-02-01', 'Transfer'),
(1, 2, 2020, '1007', 'Photo Session', 3000, 1, 3000, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 3000, 0, 3000, '9', '2020-02-01', 'Cash'),
(10, 2, 2020, '1005', 'Campari Small', 3500, 7, 24500, 'Budweiser', 500, 3, 1500, 'Croaker Fish', 2500, 5, 12500, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 38500, 2, 37730, '10', '2020-02-10', 'Pos'),
(9, 4, 2020, '1005', 'Budweiser', 500, 6, 3000, 'Best Small', 1500, 7, 10500, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 13500, 5, 12825, '11', '2020-04-09', 'Pos'),
(24, 9, 2020, '1001', 'Andre Rose', 5000, 3, 15000, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 15000, 0, 15000, '12', '2020-09-24', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `salescounter`
--

DROP TABLE IF EXISTS `salescounter`;
CREATE TABLE IF NOT EXISTS `salescounter` (
  `counter` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salescounter`
--

INSERT INTO `salescounter` (`counter`) VALUES
(12);

-- --------------------------------------------------------

--
-- Table structure for table `saleslocation`
--

DROP TABLE IF EXISTS `saleslocation`;
CREATE TABLE IF NOT EXISTS `saleslocation` (
  `salesLocationId` int(11) NOT NULL AUTO_INCREMENT,
  `salesLocationName` longtext,
  `productQty` int(100) DEFAULT '0',
  PRIMARY KEY (`salesLocationId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saleslocation`
--

INSERT INTO `saleslocation` (`salesLocationId`, `salesLocationName`, `productQty`) VALUES
(1, 'Bush bar', 0),
(2, 'Garden bar', 0),
(3, 'Pool bar', 0),
(4, 'Reception 1', 0),
(5, 'Reception 2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `salesreport`
--

DROP TABLE IF EXISTS `salesreport`;
CREATE TABLE IF NOT EXISTS `salesreport` (
  `item` varchar(100) NOT NULL,
  `qty` int(20) NOT NULL,
  `total` double NOT NULL,
  `fulldate` date NOT NULL,
  `profit` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesreport`
--

INSERT INTO `salesreport` (`item`, `qty`, `total`, `fulldate`, `profit`) VALUES
('Andre Rose', 1, 5000, '2020-02-01', 2500),
('Andre Rose', 1, 5000, '2020-02-01', 2500),
('Carlo Rossi', 9, 27000, '2020-02-01', 8100),
('Andre Rose', 1, 5000, '2020-02-01', 2500),
('Carlo Rossi', 9, 27000, '2020-02-01', 8100),
('Blue Bullet', 2, 2000, '2020-02-01', 1540),
('Baileys Cream Small', 8, 12000, '2020-02-01', 8000),
('Andre Rose', 1, 5000, '2020-02-01', 2500),
('Carlo Rossi', 9, 27000, '2020-02-01', 8100),
('Blue Bullet', 2, 2000, '2020-02-01', 1540),
('Baileys Cream Small', 8, 12000, '2020-02-01', 8000),
('33 Export', 12, 6000, '2020-02-01', 3984),
('33 Export', 3, 1500, '2020-02-01', 996),
('Heineken', 16, 8000, '2020-02-01', 4128),
('Fayrouz', 32, 8000, '2020-02-01', 5440),
('Gordons', 13, 13000, '2020-02-01', 9100),
('Guinness Malt', 13, 6500, '2020-02-01', 4979),
('Campari Small', 4, 14000, '2020-02-01', 8000),
('Chivita Active', 5, 3500, '2020-02-01', 1750),
('Guinness Medium size', 7, 3500, '2020-02-01', 1981),
('Cranberry', 2, 4000, '2020-02-01', 2376),
('Best Small', 4, 6000, '2020-02-01', 4000),
('Campari Small', 6, 21000, '2020-02-01', 12000),
('Budweiser', 4, 2000, '2020-02-01', 1032),
('Best Small', 5, 7500, '2020-02-01', 5000),
('Budweiser', 5, 2500, '2020-02-01', 1290),
('33 Export', 4, 2000, '2020-02-01', 1328),
('Fayrouz', 3, 750, '2020-02-01', 510),
('Catfish Peppersoup (Head)', 1, 1500, '2020-02-01', 875),
('Dorado', 3, 9000, '2020-02-01', 6240),
('Photo Session', 1, 3000, '2020-02-01', 3000),
('Campari Small', 7, 24500, '2020-02-10', 14000),
('Budweiser', 3, 1500, '2020-02-10', 774),
('Croaker Fish', 5, 12500, '2020-02-10', 5000),
('Budweiser', 6, 3000, '2020-04-09', 1548),
('Best Small', 7, 10500, '2020-04-09', 7000),
('Andre Rose', 3, 15000, '2020-09-24', 7500);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `sex` varchar(30) NOT NULL,
  `address` varchar(300) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `stafftag` varchar(100) NOT NULL,
  `staffincentive` int(10) NOT NULL,
  `premonth` int(200) NOT NULL,
  `perannum` int(200) NOT NULL,
  `deptAmount` int(200) DEFAULT '0',
  PRIMARY KEY (`stafftag`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`fname`, `lname`, `sex`, `address`, `phone`, `dept`, `stafftag`, `staffincentive`, `premonth`, `perannum`, `deptAmount`) VALUES
('John', ' doe', 'male', 'USA', '98773848', 'Driver', '1998', 3, 20000, 240000, NULL),
('Vera', ' Davis', 'female', 'qwert fghg', '12345678908', 'Cook', '9238', 3, 9000, 108000, NULL),
('Danni', ' Joe', 'male', 'CGbar', '13256573', 'Cook', '5481', 2, 40000, 480000, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `subCategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `subCategoryName` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  PRIMARY KEY (`subCategoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subCategoryId`, `subCategoryName`, `category`) VALUES
(1, 'Soft Drink', 'Drink'),
(3, 'Hard Drink', 'Drink');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pword` varchar(100) NOT NULL,
  `privilege` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `profilepic` varchar(200) DEFAULT NULL,
  `signature` varchar(200) DEFAULT NULL,
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `staffTag` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `uname`, `pword`, `privilege`, `email`, `address`, `phone`, `sex`, `designation`, `profilepic`, `signature`, `id`, `staffTag`) VALUES
('nick', 'davis', 'adnindavis', 'davis3188', 'Admin', 'admindavis@gmail.com', 'C.G. bar', '09036103607', 'male', 'manager', '', '', 1, NULL),
('victor', 'joe', 'victty', 'victor12345', 'Admin', 'vict@gmail.com', 'GRA', '93680877977', 'male', 'manager', '../Upload/629496a9685d63.12393436.jpg', '../Upload/629496a9685b95.08288872.jpg', 2, NULL),
('Nick', 'Dann', 'dann', 'dann123', 'Admin', 'nickdann@email.com', 'USA', '345281353546', 'male', 'supervisor', '../Upload/62975c0161d9d1.74152793.jpg', '../Upload/62975c01432fc2.68271303.jpeg', 3, NULL),
('Joe', 'Lu', 'joelu', 'joelu123', 'Supervisor', 'joelu1@gmail.com', 'CANADA', '23545367842', 'male', 'Supervisor', '../Upload/62b2f22ada0ba0.26121542.', '../Upload/62b2f22ac5b1d3.95862652.png', 4, NULL),
('Davis', 'Sa', 'davissa', 'davissa123', 'Manager', 'davissa@gmail.com', 'USA', '03889584', 'male', 'Manager', '../Upload/62b2f29123e897.29334946.', '../Upload/62b2f29123e749.48953053.png', 5, NULL),
('Nick', 'do', 'nickdo', 'nickdo123', 'Managing Director', 'nickdo@gmail.com', 'UK', '848739822', 'male', 'Managing Director', '../Upload/62b2f2d43a04a7.54870956.', '../Upload/62b2f2d43a0354.47316097.png', 6, NULL),
('Vera', 'davis', 'vera', 'vera123', 'Staff', 'veradavis@gmail.com', 'qwert fghg', '1234567', 'female', 'Staff', NULL, NULL, 10, 9238),
('emmanue', 'Davis', 'emmanuel', 'emmanuel123', 'Supervisor', 'emmanueldavis@gmail.com', 'qwert fghg', '12345678', 'male', 'Supervisor', '../Upload/6300e3863edda7.39518000.jpg', NULL, 11, NULL),
('john', 'john', 'johnjohn', 'john123', 'Staff', 'johnjohn@gmail.com', 'dfdefdf fdef', '124567', 'male', 'Staff', NULL, NULL, 9, 1998);

-- --------------------------------------------------------

--
-- Table structure for table `vedorquote`
--

DROP TABLE IF EXISTS `vedorquote`;
CREATE TABLE IF NOT EXISTS `vedorquote` (
  `purchaseId` int(20) NOT NULL,
  `vendorId` int(20) NOT NULL,
  `itemName` varchar(200) NOT NULL,
  `itemDescription` varchar(200) NOT NULL,
  `itemQuantity` int(20) NOT NULL,
  `itemUnitMeasure` varchar(200) NOT NULL,
  `vendorUnitPrice` double NOT NULL,
  `itemNumber` int(100) NOT NULL,
  `venname` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vedorquote`
--

INSERT INTO `vedorquote` (`purchaseId`, `vendorId`, `itemName`, `itemDescription`, `itemQuantity`, `itemUnitMeasure`, `vendorUnitPrice`, `itemNumber`, `venname`) VALUES
(3456, 8, 'shoe', 'adidas', 3, '', 2000, 1, 'WOERKA NIG CO LTD'),
(3456, 6, 'gawn', 'flay', 3, '', 6000, 2, 'MAC MORRIS INTL CO LTD'),
(3456, 6, 'shoe', 'adidas', 3, '', 5000.55, 1, 'MAC MORRIS INTL CO LTD'),
(3456, 9, 'shoe', 'adidas', 3, '', 500, 1, 'BUNN REGENCY'),
(3456, 12, 'gawn', 'flay', 3, '', 0, 2, 'PROMPT MULTI LINK VENTURES'),
(3456, 9, 'gawn', 'flay', 3, '', 1500.32, 2, 'BUNN REGENCY'),
(3456, 12, 'shoe', 'adidas', 3, '', 1000.43, 1, 'PROMPT MULTI LINK VENTURES'),
(3456, 8, 'gawn', 'flay', 3, '', 1000, 2, 'WOERKA NIG CO LTD'),
(3457, 6, 'Shoe', 'Adidas', 3, 'par', 8000, 1, 'MAC MORRIS INTL CO LTD'),
(3457, 6, 'T-shirt', 'Gooshe', 4, 'lng', 3500, 2, 'MAC MORRIS INTL CO LTD'),
(3457, 6, 'Belt', 'rollex', 3, 'pic', 800, 3, 'MAC MORRIS INTL CO LTD'),
(3457, 9, 'Shoe', 'Adidas', 3, 'par', 6000, 1, 'BUNN REGENCY'),
(3457, 9, 'T-shirt', 'Gooshe', 4, 'lng', 3000, 2, 'BUNN REGENCY'),
(3457, 9, 'Belt', 'rollex', 3, 'pic', 1200, 3, 'BUNN REGENCY'),
(3459, 6, 'book', 'statistic textbook', 1, 'pic', 2500, 1, 'MAC MORRIS INTL CO LTD'),
(3459, 6, 'matras', 'six spring bed', 1, 'pic', 1500, 2, 'MAC MORRIS INTL CO LTD'),
(3459, 9, 'book', 'statistic textbook', 1, 'pic', 2700, 1, 'BUNN REGENCY'),
(3459, 9, 'matras', 'six spring bed', 1, 'pic', 12200, 2, 'BUNN REGENCY'),
(3460, 10, 'laptop', '8gb ram of any type', 1, 'pic', 700000, 1, 'SILVERBURTON NIGERIA LTD'),
(3460, 10, 'mouse', 'wireless mouse', 1, 'pic', 3500, 2, 'SILVERBURTON NIGERIA LTD'),
(3460, 13, 'laptop', '8gb ram of any type', 1, 'pic', 285000, 1, 'NAS AUTO LINK '),
(3460, 13, 'mouse', 'wireless mouse', 1, 'pic', 1800, 2, 'NAS AUTO LINK '),
(3460, 8, 'laptop', '8gb ram of any type', 1, 'pic', 300000, 1, 'WOERKA NIG CO LTD'),
(3460, 8, 'mouse', 'wireless mouse', 1, 'pic', 1500, 2, 'WOERKA NIG CO LTD'),
(3461, 6, 'Phone', 'android ', 1, 'pic', 65000, 1, 'MAC MORRIS INTL CO LTD'),
(3461, 6, 'T-shirt', 'blue tShirt', 3, 'pic', 2500, 2, 'MAC MORRIS INTL CO LTD'),
(3461, 9, 'Phone', 'android ', 1, 'pic', 66000, 1, 'BUNN REGENCY'),
(3461, 9, 'T-shirt', 'blue tShirt', 3, 'pic', 3200, 2, 'BUNN REGENCY'),
(3461, 8, 'Phone', 'android ', 1, 'pic', 70000, 1, 'WOERKA NIG CO LTD'),
(3461, 8, 'T-shirt', 'blue tShirt', 3, 'pic', 2500, 2, 'WOERKA NIG CO LTD'),
(3462, 6, 'pen', 'big', 10, 'pic', 70, 1, 'MAC MORRIS INTL CO LTD'),
(3462, 6, 'note book', 'hard cover', 7, 'pic', 500, 2, 'MAC MORRIS INTL CO LTD'),
(3462, 26, 'pen', 'big', 10, 'pic', 90, 1, 'SHAAYAU SHEHU'),
(3462, 26, 'note book', 'hard cover', 7, 'pic', 550, 2, 'SHAAYAU SHEHU'),
(3462, 9, 'pen', 'big', 10, 'pic', 80, 1, 'BUNN REGENCY'),
(3462, 9, 'note book', 'hard cover', 7, 'pic', 850, 2, 'BUNN REGENCY'),
(3463, 6, 'bag', 'cross bag', 1, 'pic', 6500, 1, 'MAC MORRIS INTL CO LTD'),
(3463, 6, 'trouser', 'genes trouser', 5, 'pic', 5300, 2, 'MAC MORRIS INTL CO LTD'),
(3463, 9, 'bag', 'cross bag', 1, 'pic', 4800, 1, 'BUNN REGENCY'),
(3463, 9, 'trouser', 'genes trouser', 5, 'pic', 2500, 2, 'BUNN REGENCY'),
(3463, 27, 'bag', 'cross bag', 1, 'pic', 3400, 1, 'ABDULRAJIF SALIU'),
(3463, 27, 'trouser', 'genes trouser', 5, 'pic', 2500, 2, 'ABDULRAJIF SALIU'),
(3464, 9, 'Milo', 'tea', 2, 'can', 1800, 1, 'BUNN REGENCY'),
(3464, 9, 'clipper', 'canon clipper for barbing', 1, 'pic', 6500, 2, 'BUNN REGENCY'),
(3464, 6, 'Milo', 'tea', 2, 'can', 1200, 1, 'MAC MORRIS INTL CO LTD'),
(3464, 6, 'clipper', 'canon clipper for barbing', 1, 'pic', 6400, 2, 'MAC MORRIS INTL CO LTD'),
(3464, 8, 'Milo', 'tea', 2, 'can', 0, 1, 'WOERKA NIG CO LTD'),
(3464, 8, 'clipper', 'canon clipper for barbing', 1, 'pic', 6400, 2, 'WOERKA NIG CO LTD'),
(3465, 9, 'shoe', 'school shoe', 2, 'pair', 7000, 1, 'BUNN REGENCY'),
(3465, 9, 'shirt', 'school shirt', 2, 'pic', 3000, 2, 'BUNN REGENCY'),
(3465, 8, 'shoe', 'school shoe', 2, 'pair', 11000, 1, 'WOERKA NIG CO LTD'),
(3465, 8, 'shirt', 'school shirt', 2, 'pic', 3500, 2, 'WOERKA NIG CO LTD'),
(3465, 6, 'shoe', 'school shoe', 2, 'pair', 3200, 1, 'MAC MORRIS INTL CO LTD'),
(3465, 6, 'shirt', 'school shirt', 2, 'pic', 3000, 2, 'MAC MORRIS INTL CO LTD');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
CREATE TABLE IF NOT EXISTS `vendors` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `vcode` varchar(100) NOT NULL,
  `compname` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpname` varchar(100) NOT NULL,
  `cpphone` varchar(100) NOT NULL,
  `acctno` varchar(100) NOT NULL,
  `bankname` varchar(200) NOT NULL,
  `bankcode` varchar(100) NOT NULL,
  `tin` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `vcode`, `compname`, `address`, `phone`, `email`, `cpname`, `cpphone`, `acctno`, `bankname`, `bankcode`, `tin`) VALUES
(6, 'VEN00006', 'MAC MORRIS INTL CO LTD', '', '2348069723337', 'info@bualogistics.com', '', '', '1013088795', 'ZENITH BANK PLC', '', ''),
(7, 'VEN00007', 'SINOTRUST MINING & ENGINEERING CO LTD ', '', '2348164986129', 'info@bualogistics.com', '', '', '1013510843', 'ZENITH BANK PLC', '', ''),
(8, 'VEN00008', 'WOERKA NIG CO LTD', '', '2349036133277', 'info@bualogistics.com', '', '', '1014684352', 'ZENITH BANK PLC', '', ''),
(9, 'VEN00009', 'BUNN REGENCY', '', '2348033769674', 'info@bualogistics.com', '', '', '', '', '', ''),
(10, 'VEN00010', 'SILVERBURTON NIGERIA LTD', '', '2348032827341', 'info@bualogistics.com', '', '', '0003682471', 'GUARANTY TRUST BANK LTD', '', ''),
(11, 'VEN00011', 'SIZU INTERNATIONAL COMPANY', '', '2348188315643', 'info@bualogistics.com', '', '', '', '', '', ''),
(12, 'VEN00012', 'PROMPT MULTI LINK VENTURES ', '', '2348183889112', 'info@bualogistics.com', '', '', '0200836923', 'FIRST BANK OF NIGERIA PLC', '', ''),
(13, 'VEN00013', 'NAS AUTO LINK ', '', '2348035030325', 'info@bualogistics.com', '', '', '1011599460', 'ZENITH BANK PLC', '', ''),
(14, 'VEN00014', 'NNAYCON  BUSINESS CONCERNS LTD', '', '2348054308170', 'info@bualogistics.com', '', '', '1016928186', 'ZENITH BANK PLC', '', ''),
(16, 'VEN00016', 'TDE GLOBAL VENTURE', '', '2348054026344', 'info@bualogistics.com', '', '', '2095753793', 'UNITED BANK FOR AFRICA PLC', '', ''),
(17, 'VEN00017', 'LET YOUR GLORY COME INTL', '', '2347089571750', 'info@bualogistics.com', '', '', '4032022130', 'ECO BANK NIGERIA PLC', '', ''),
(18, 'VEN00018', 'DIVINE JOE VENAS GLOBAL LINK', '', '2348056771117', 'info@bualogistics.com', '', '', '2091482556', 'UNITED BANK FOR AFRICA PLC', '', ''),
(19, 'VEN00019', 'PRINCE CHEDON COMPANY ', '', '2348029460425', 'info@bualogistics.com', 'Uche', '', '1022255506', 'UNITED BANK FOR AFRICA PLC', '', ''),
(20, 'VEN00020', 'HYDROTRANS ', '', '2348034181818', 'info@bualogistics.com', '', '', '', '', '', ''),
(21, 'VEN00021', 'JEANFRED COMM. MERCHANDISE', '', '2348030640842', 'info@bualogistics.com', '', '', '1012065160', 'UNITED BANK FOR AFRICA PLC', '', ''),
(22, 'VEN00022', 'LUBSERVE ENGINEERING LTD ', '', '2348080376371', 'info@bualogistics.com', '', '', '1014842194', 'UNITED BANK FOR AFRICA PLC', '', ''),
(23, 'VEN00023', 'BACE GLOBAL RESOURCE LTD ', '', '2348022913462', 'info@bualogistics.com', '', '', '1010613176', 'ZENITH BANK PLC', '', ''),
(24, 'VEN00024', 'J JOE BEST NIG ENTERPRISES', '', '2348051999197', 'info@bualogistics.com', '', '', '0061509000', 'UNION BANK NIGERIA PLC', '', ''),
(25, 'VEN00025', 'DAVE GOSHEN GLOBAL RESOURCES', '', '08168768032', 'info@bualogistics.com', '', '', '4011269994', 'FIDELITY BANK PLC', '', ''),
(26, 'SAP5300', 'SHAAYAU SHEHU', 'TRK DRV', '', 'shaayau@gmail.com', '', '', '1450313472', 'ACCESS BANK PLC', '044', ''),
(27, 'SAP3875', 'ABDULRAJIF SALIU', 'TRK DRV', '', 'abdulrajif@gmail.com', '', '', '3092553391', 'FIRST BANK PLC', '011', ''),
(28, 'VEN00217-', 'ABACHE GODGIFT (WOODEN)', '', '09057353831', 'WALE@YAHOO.COM', '', '', '2111660579', 'ZENITH BANK', '057', ''),
(29, 'VEN00218', 'YAKUBU BABA', '', '', 'BABA@YAHOO.COM', '', '', '5622012241', 'ECO BANK PLC', '070', ''),
(30, 'VEN00092', 'EST CONSULT', '8, IYALODE AMOKE STREET, ALAKUKO, LAGOS STATE.', '08087234846', 'estconsult2@gmail.com', '', '', '0600109858', 'ECO BANK', '', '24996224'),
(31, 'VEN00219', 'PROFESSIONAL TRADE\'S SALES', 'OKPELLA', '', 'SEYI200@YAHOO.COM', '', '', '0601040417', 'ECOBANK PLC', '050', ''),
(32, 'VEN00153', 'MANOKEY NIG ENTS', '45,OTARU ROAD AUCHI EDO STATE', '08038291758', 'MANKEY@YAHOO.COM', '', '', '0047016800', 'ACCESS BANK PLC', '044', ''),
(33, 'SAP3564', 'MATHIAS COLLINS', 'OKPELLA', '07078781827', 'COLLINGSM@YAHOO.COM', '', '', '0047514747', 'GTBANK PLC', '058', ''),
(34, 'SAP5258', 'EMMANUEL UGBAJE', 'OKPELLA', '', 'UGBAJEE@YAHOO.COM', '', '', '2081139709', 'ZENITH BANK', '057', ''),
(35, 'VEN00220', 'VINCENT HAPPINESS', 'OKPELLA', '', 'VINCENTH@YAHOO.COM', '', '', '0167942509', 'GTBANK PLC', '058', ''),
(36, 'TAV001', 'TAVICOM SYSTEMS', '30 SANI ABACHA ROAD GRA PHASE 3, PORT HARCOURT', '08035840779', 'iamvictorpeters@gmail.com', 'Victor Peters', '08038984300', '0595864019', 'FCMB', 'BCODE', '2224563');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
