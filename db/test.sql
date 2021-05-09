-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2019 at 04:44 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `test_multi_sets` ()  begin
        select user() as first_col;
        select user() as first_col, now() as second_col;
        select user() as first_col, now() as second_col, now() as third_col;
        end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `bid` int(10) NOT NULL,
  `user_id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(7) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`bid`, `user_id`, `name`, `email`, `phone`, `address`, `city`, `state`, `zip`, `date`) VALUES
(1, 4, 'Sonam Ankush Bhosale', 'sonam123@gmail.com', '2147483647', ' A/p Kanherkhed Tal-Koregaon Dist-Satara', 'Koregaon', 'Maharashtra', 415501, '2019-03-16'),
(2, 3, 'Sonam Ankush Bhosale', 'sonam@gmail.com', '9820700553', ' Satara', 'Satara', 'Maharashtra', 415512, '2019-03-16'),
(3, 3, 'Sonali Jedhe', 'sona@gmail.com', '84120700542', 'Near Maruti Mandir Koregaon', 'Koregaon', 'Maharashtra', 415501, '2019-03-16'),
(4, 3, 'Sonali Jedhe', 'sona@gmail.com', '8805007423', ' Near Maruti Temple Koregaon', 'Koregaon', 'Maharashtra', 415501, '2019-03-16'),
(5, 4, 'Amar Ankush Bhosale', 'amar@gmail.com', '8412070052', 'Near High way flat no.12\r\nSatara', 'Satara', 'Maharashtra', 415001, '2019-03-16'),
(6, 5, 'Bhagyashree Shinde', 'bhagi@gmail.com', '9820700553', ' Limb,Khed Satara', 'Satara', 'Maharashtra', 415001, '2019-03-16'),
(7, 3, 'Bhosale Nilam Ankush', 'nilam@gmail.com', '84172569635', ' New Stand Koregaon', 'Koregaon', 'Maharashtra', 415501, '2019-03-17'),
(8, 3, 'Bhosale Nilam Ankush', 'nilam@gmail.com', '8805007423', ' New Stand Koregaon', 'Koregaon', 'Maharashtra', 415501, '2019-03-17'),
(9, 3, 'Sonam Ankush Bhosale', 'sonam@gmail.com', '8805007423', 'A/P kanherkhed ', 'Koregaon', 'Maharashtra', 415501, '2019-03-17'),
(10, 3, 'Sonali Jedhe', 'sona@gmail.com', '8805007423', 'Satara', 'Satara', 'Maharashtra', 415001, '2019-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `product_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `qty` int(4) NOT NULL DEFAULT '0',
  `cust_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `checkout` varchar(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'n',
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `checkedon` date NOT NULL,
  `trans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `qty`, `cust_id`, `checkout`, `added`, `checkedon`, `trans`) VALUES
(0001, 0012, 1, 0004, 'y', '2019-03-16 11:20:58', '2019-03-16', 11759),
(0002, 0002, 1, 0003, 'y', '2019-03-16 11:29:48', '2019-03-16', 10205),
(0003, 0006, 1, 0003, 'y', '2019-03-16 11:32:27', '2019-03-16', 32127),
(0004, 0025, 1, 0004, 'y', '2019-03-16 12:22:02', '2019-03-16', 24451),
(0005, 0024, 1, 0004, 'y', '2019-03-16 12:22:12', '2019-03-16', 24451),
(0006, 0017, 1, 0005, 'y', '2019-03-16 12:34:08', '2019-03-16', 5889),
(0008, 0027, 1, 0003, 'y', '2019-03-17 10:38:25', '2019-03-17', 9214),
(0009, 0048, 1, 0003, 'y', '2019-03-17 10:57:35', '2019-03-17', 4233),
(0010, 0017, 2, 0003, 'y', '2019-03-17 11:04:04', '2019-03-17', 11053);

-- --------------------------------------------------------

--
-- Table structure for table `tblcat`
--

CREATE TABLE `tblcat` (
  `cat_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `cat_name` varchar(30) NOT NULL,
  `cat_link` varchar(200) NOT NULL,
  `detail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcat`
--

INSERT INTO `tblcat` (`cat_id`, `cat_name`, `cat_link`, `detail`) VALUES
(0003, 'Guitar', 'javascript:void(0)', 'Guitar products'),
(0004, 'Drums', 'javascript:void(0)', 'Drums brands and instruments'),
(0005, 'Keyboard and Pianos', 'javascript:void(0)', 'keyboards and Pianos eqipments'),
(0006, 'Traditional Instrument', 'javascript:void(0)', 'Traditional Intstruments');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `contact_id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phoneno` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfeedback`
--

INSERT INTO `tblfeedback` (`contact_id`, `name`, `phoneno`, `email`, `Message`) VALUES
(1, 'Sonam Ankush Bhosale', '9820700851', 'sonam@gmail.com', 'Improves your services');

-- --------------------------------------------------------

--
-- Table structure for table `tblitem`
--

CREATE TABLE `tblitem` (
  `itemid` int(4) NOT NULL,
  `date` varchar(255) NOT NULL,
  `item_cat` varchar(50) NOT NULL,
  `item_subcat` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `image` varchar(300) NOT NULL,
  `stock` int(4) NOT NULL,
  `purchase_price` int(7) NOT NULL,
  `price` int(7) NOT NULL,
  `description` text,
  `noviews` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblitem`
--

INSERT INTO `tblitem` (`itemid`, `date`, `item_cat`, `item_subcat`, `item_name`, `image`, `stock`, `purchase_price`, `price`, `description`, `noviews`) VALUES
(1, '2018-12-27', '0003', '1', 'Ibanez MD39C 39 inch Cutaway ', 'Ibanez MD39C 39 inch Cutaway Acoustic Guitar.jpg', 20, 6000, 6390, 'The Ibanez MD39C Cutaway Acoustic Guitar is built with excellent craftsmanship and functionality expected from a brand like Ibanez and still being easy on the pocket.', 0),
(2, '2018-12-27', '0003', '1', 'Yamaha F310 Dreadnought ', 'Yamaha F310 Dreadnought Acoustic Guitar.jpg', 9, 8000, 8890, 'Yamaha F310 Dreadnought Acoustic Guitar.', 2),
(3, '2018-12-28', '0003', '1', 'yamahaac guitar', 'yamahaac guitar.jpg', 5, 7000, 7500, 'yamahaac guitar', 0),
(4, '2018-12-28', '0003', '1', 'YAMAHA F310 TBS', 'YAMAHA F310 TBS.jpg', 14, 3000, 4000, 'YAMAHA F310 TBS', 1),
(5, '2019-01-15', '0003', '2', '60SCENAT_medium Electrical Guitar', '60SCENAT_medium.jpg', 5, 5000, 7000, '60SCENAT_medium Electrical Guitar', 0),
(6, '2019-01-15', '0003', '2', 'Vault RG1 Soloist Electric Guitar', 'Vault RG1 Soloist Electric Guitar.jpg', 9, 9600, 9699, 'The Vault RG1RW Soloist Electric Guitar exhibits shark-tooth inlays, which add an exquisite appeal to the instrument. Includes a whammy bar for extended playing styles.', 1),
(7, '2019-01-15', '0003', '3', 'Cordoba Protege C1M Classical Guitar', 'Cordoba Protege C1M Classical Guitar.jpg', 9, 11000, 11799, 'Cordoba Protege C1M Classical Guitar', 1),
(9, '2019-01-15', '0004', '5', 'Alesis Burst Kit 7-Piece Electronic Drum Kit', 'Alesis Burst Kit 7-Piece Electronic Drum Kit.jpg', 5, 29500, 29666, 'Alesis Burst Kit 7-Piece Electronic Drum Kit.', 0),
(10, '2019-01-25', '0004', '5', 'Roland TD-1K Electronic Drum Kit', 'Roland TD-1K Electronic Drum Kit.jpg', 10, 61000, 62000, 'Roland TD-1K Electronic Drum Kit', 3),
(11, '2019-01-25', '0004', '5', 'Roland TD-1KV V-Drums Electronic Drumkit', 'Roland TD-1KV V-Drums Electronic Drumkit.jpg', 4, 51000, 51400, 'Roland TD-1KV V-Drums Electronic Drumkit', 1),
(12, '2019-01-27', '0003', '4', 'Vault PJ Style 4-String Bass Guitar', 'Vault PJ Style 4-String Bass Guitar.jpg', 3, 10000, 10990, 'Vault PJ Style 4-String Bass Guitar', 2),
(13, '2019-01-27', '0003', '3', 'Ibanez GSR320 Electric Bass Guitar', 'Ibanez GSR320 Electric Bass Guitar.jpg', 5, 22000, 22199, 'Ibanez GSR320 Electric Bass Guitar', 0),
(14, '2019-01-27', '0003', '4', 'Harley Benton B-550 Black Progressive Series', 'Harley Benton B-550 Black Progressive Series.jpg', 5, 33600, 33699, 'Harley Benton B-550 Black Progressive Series', 1),
(15, '2019-01-27', '0003', '4', 'Harley Benton PJ-74 OW Vintage Series', 'Harley Benton PJ-74 OW Vintage Series.jpg', 7, 29200, 29299, 'Harley Benton PJ-74 OW Vintage Series', 0),
(16, '2019-02-17', '0003', '3', 'Thomann Classic Guitar', 'Thomann Classic Guitar.jpg', 4, 13500, 13599, 'Thomann Classic Guitar', 1),
(17, '2019-02-17', '0003', '3', 'Vault EC3920CYW 39 inch Premium Cutaway Classical', 'Vault EC3920CYW 39 inch Premium Cutaway Classical.jpg', 4, 6400, 6499, 'Vault EC3920CYW 39 inch Premium Cutaway Classical', 2),
(18, '2019-02-17', '0006', '14', 'Bajaao Professional Ekanda Veena With Light Case', 'Bajaao Professional Ekanda Veena With Light Case.jpg', 5, 32400, 32500, 'Bajaao Professional Ekanda Veena With Light Case', 0),
(19, '2019-02-17', '0006', '14', 'BAJAAO Santoor 31 Notes - Brown', 'BAJAAO Santoor 31 Notes - Brown.jpg', 7, 16700, 16800, 'BAJAAO Santoor 31 Notes - Brown', 0),
(20, '2019-02-18', '0006', '14', 'BAJAAO Semi Decorative Tanpura Male with Flight Ca', 'BAJAAO Semi Decorative Tanpura Male with Flight Case.jpg', 8, 12000, 12075, 'BAJAAO Semi Decorative Tanpura Male with Flight Case', 0),
(21, '2019-02-18', '0006', '15', 'Carlo 205 Series Cello Outfit', 'Carlo 205 Series Cello Outfit.jpg', 9, 82000, 82025, 'Carlo 205 Series Cello Outfit', 1),
(22, '2019-02-18', '0006', '15', 'Granada GM760R Cello', 'Granada GM760R Cello.jpg', 7, 27750, 27769, 'Granada GM760R Cello', 3),
(23, '2019-02-18', '0006', '11', 'Havana M1103B Clarinet', 'Havana M1103B Clarinet.jpg', 12, 10000, 10099, 'Havana M1103B Clarinet', 0),
(24, '2019-02-18', '0006', '11', 'Havana M1115S 16H Flute ', 'Havana M1115S 16H Flute - Silver Plated.jpg', 9, 20100, 20199, 'Havana M1115S 16H Flute - Silver Plated', 1),
(25, '2019-02-18', '0006', '11', 'Jinbao JBCL- 560 Clarinet', 'Jinbao JBCL- 560 Clarinet.jpg', 5, 10000, 10099, 'Jinbao JBCL- 560 Clarinet', 7),
(26, '2019-02-19', '0005', '10', 'Midi Keyboard with RGB Pads', 'Vault APEX 25 USB MIDI Keyboard With RGB Pads.jpg', 10, 11900, 11999, 'Vault APEX 25 USB MIDI Keyboard With RGB Pads.', 1),
(27, '2019-02-21', '0005', '10', 'Yamaha PSR-E263 61-Key Portable Keyboard', 'Yamaha PSR-E263 61-Key Portable Keyboard.jpg', 9, 6400, 6499, 'Yamaha PSR-E263 61-Key Portable Keyboard', 2),
(28, '2019-02-21', '0005', '10', 'Yamaha PSR-E263 61-Key Portable Keyboard', 'Yamaha PSR-E263 61-Key Portable Keyboard.jpg', 15, 8500, 8540, 'Yamaha PSR-E263 61-Key Portable Keyboard', 0),
(29, '2019-02-25', '0005', '10', 'Casio Privia PX-770BK 88 Key Digital Piano With Pi', 'Casio Privia PX-770BK 88 Key Digital Piano With Pianos.jpg', 20, 41700, 41795, 'Casio Privia PX-770BK 88 Key Digital Piano With Pianos', 0),
(30, '2019-02-25', '0006', '12', 'ULTIMATE GURU MUSIC DHOLAK', 'ULTIMATEGURUMUSICDHOLKI1_1e58fee1-19aa-4c29-83a6-82fc8d277193_medium.jpg', 3, 5000, 6775, 'ULTIMATEGURUMUSICDHOLKI1_1e58fee1-19aa-4c29-83a6-82fc8d277193_medium', 3),
(31, '2019-03-10', '0006', '13', 'HOHNERM564016_medium', 'HOHNERM564016_medium.jpeg', 13, 5000, 4899, 'HOHNERM564016_medium', 0),
(45, '2019-03-10', '0004', '6', 'Havana HV 522 5Pcs Acoustic Drum Set', 'Havana HV 522 5Pcs Acoustic Drum Set.jpg', 10, 35000, 38000, 'Havana HV 522 5Pcs Acoustic Drum Set', 1),
(46, '2019-03-17', '0004', '9', 'Netkar Pianos', 'nek-impactgx61_medium.jpg', 10, 25000, 27850, 'Netkar Pianos', 1),
(47, '2019-03-17', '0006', '11', 'Flute', 'THM-289582_medium.jpg', 5, 10000, 10099, 'Flute THM-289582_medium', 1),
(48, '2019-03-17', '0006', '11', 'ULTIMATEGURUCONCERTBANSURI1_medium Flute', 'ULTIMATEGURUCONCERTBANSURI1_medium.jpg', 14, 25000, 25500, 'ULTIMATEGURUCONCERTBANSURI1_medium Flute', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE `tbllogin` (
  `l_id` int(4) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `login` timestamp NULL DEFAULT NULL,
  `logout` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`l_id`, `u_name`, `pwd`, `login`, `logout`) VALUES
(3, 'Sonamab', 'sonam12345', '2019-03-09 21:33:42', '2019-03-16 21:33:29'),
(4, 'Sonamab', 'sonam12345', '2019-03-09 21:33:06', '2019-03-16 21:33:29'),
(5, 'Sonamab', 'sonam12345', '2019-03-13 23:33:04', '2019-03-16 21:33:29'),
(6, 'Bhagyashree', 'asdfg12345', '2019-03-13 23:33:27', '2019-03-16 21:33:29'),
(7, 'Sonamab', 'sonam12345', '2019-03-16 05:33:27', '2019-03-16 21:33:29'),
(8, 'Sonamab', 'sonam12345', '2019-03-16 06:33:50', '2019-03-16 21:33:29'),
(9, 'amarab', 'amar123456', '2019-03-15 22:33:31', '2019-03-16 21:33:29'),
(10, 'Sonamab', 'sonam12345', '2019-03-15 22:33:24', '2019-03-16 21:33:29'),
(11, 'amarab', 'amar123456', '2019-03-15 23:33:52', '2019-03-16 21:33:29'),
(12, 'Bhagyashree', 'asdfg12345', '2019-03-16 00:33:57', '2019-03-16 21:33:29'),
(13, 'Sonamab', 'sonam12345', '2019-03-16 19:33:39', '2019-03-16 21:33:29'),
(14, 'Sonamab', 'sonam12345', '2019-03-16 21:33:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `order_id` int(5) NOT NULL,
  `c_id` int(5) NOT NULL,
  `i_id` int(5) NOT NULL,
  `qty` int(7) NOT NULL,
  `o_date` date NOT NULL,
  `trans` int(10) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `o_status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`order_id`, `c_id`, `i_id`, `qty`, `o_date`, `trans`, `payment`, `o_status`) VALUES
(2, 3, 6, 1, '2019-03-16', 17830, '1', 'Pending'),
(4, 4, 24, 1, '2019-03-16', 27588, '1', 'Delivered'),
(5, 5, 17, 1, '2019-03-16', 18803, '2', 'Confirmed'),
(6, 3, 27, 1, '2019-03-17', 30361, '1', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcat`
--

CREATE TABLE `tblsubcat` (
  `subcat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `subcat_name` varchar(50) NOT NULL,
  `sub_link` varchar(250) NOT NULL DEFAULT 'viewproduct.php 	',
  `details` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubcat`
--

INSERT INTO `tblsubcat` (`subcat_id`, `cat_id`, `subcat_name`, `sub_link`, `details`) VALUES
(1, 3, 'Acoustic Guitars ', 'viewproduct.php', 'This includes Acoustic Guitars '),
(2, 3, 'Electrical Guitar', 'viewproduct.php', 'Electrical Guitar'),
(3, 3, 'Classical Guitar', 'viewproduct.php', 'Classical Guitar'),
(4, 3, 'Bass Guitar', 'viewproduct.php', 'Bass Guitar'),
(5, 4, 'Drums Brands', 'viewproduct.php', 'Drums Brands'),
(6, 4, 'Drums Kits', 'viewproduct.php', 'Drums Kits'),
(7, 4, 'Drums Accessories', 'viewproduct.php', 'Drums Accessories'),
(8, 5, 'Keyboard Brands', 'viewproduct.php', 'Keyboard Brands'),
(9, 5, 'Pianos Brands', 'viewproduct.php', 'Pianos Brands'),
(10, 5, 'Keyboard and Pianos Types', 'viewproduct.php', 'Keyboard and Pianos Types'),
(11, 6, 'Wind Instrument', 'viewproduct.php', 'Wind Instruments'),
(12, 6, 'Dholak', 'viewproduct.php', 'Dholak'),
(13, 6, 'Harmoniums', 'viewproduct.php', 'Harmoniums'),
(14, 6, 'Indian Instrument', 'viewproduct.php', 'Indian Instrument'),
(15, 6, 'Violins', 'viewproduct.php', 'Violins instruments');

-- --------------------------------------------------------

--
-- Table structure for table `tblsupplier`
--

CREATE TABLE `tblsupplier` (
  `s_id` int(5) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsupplier`
--

INSERT INTO `tblsupplier` (`s_id`, `s_name`, `item_name`, `price`, `qty`, `amount`) VALUES
(1, 'Aadarsh Music Store', 'Guitar', 5000, 1, 5000),
(2, 'Saroj Dholak and Drum Store', 'Drums', 5000, 2, 10000),
(1, 'Aadarsh Music Store', 'Pianos', 3900, 1, 3900);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `userid` int(4) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `ac_type` varchar(30) NOT NULL DEFAULT 'user',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`userid`, `first_name`, `last_name`, `username`, `password`, `email`, `address`, `phone`, `ac_type`, `status`, `date`) VALUES
(1, 'Musical Instruments', 'Online Store', 'Admin', '12345', 'admin@gmail.com', 'Satara', '9820700539', 'Administrator', 0, '2019-02-18'),
(3, 'Sonam', 'Bhosale', 'Sonamab', 'sonam12345', 'sonam@gmail.com', 'Satara', '9820700454', 'user', 1, '2019-02-18'),
(4, 'Amar', 'Bhosale', 'amarab', 'amar123456', 'amar@gmail.com', 'koregaon', '8805006723', 'user', 1, '2019-02-18'),
(5, 'Bhagyashree', 'Shinde', 'Bhagyashree', 'asdfg12345', 'bhagi@gmail.com', 'Satara', '9820700563', 'user', 1, '2019-02-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcat`
--
ALTER TABLE `tblcat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`contact_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tblitem`
--
ALTER TABLE `tblitem`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `tbllogin`
--
ALTER TABLE `tbllogin`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tblsubcat`
--
ALTER TABLE `tblsubcat`
  ADD PRIMARY KEY (`subcat_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `bid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblcat`
--
ALTER TABLE `tblcat`
  MODIFY `cat_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `contact_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblitem`
--
ALTER TABLE `tblitem`
  MODIFY `itemid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbllogin`
--
ALTER TABLE `tbllogin`
  MODIFY `l_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblsubcat`
--
ALTER TABLE `tblsubcat`
  MODIFY `subcat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `userid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
