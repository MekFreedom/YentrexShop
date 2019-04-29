-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2018 at 03:04 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yentrex`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `D_ID` int(11) NOT NULL,
  `D_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`D_ID`, `D_Name`) VALUES
(1, 'LineMan'),
(2, 'Kerry'),
(3, 'EMS');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `USER_Username` varchar(50) NOT NULL,
  `ACT` varchar(50) NOT NULL,
  `DAT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `USER_Username`, `ACT`, `DAT`) VALUES
(1, 'PP', 'INSERTED', '2018-11-30 21:15:35'),
(2, 'ai', 'INSERTED', '2018-11-30 21:20:25'),
(3, 'qwerty', 'INSERTED', '2018-11-30 21:22:16'),
(4, 'mek', 'INSERTED', '2018-11-30 21:24:17'),
(5, 'jin', 'INSERTED', '2018-11-30 21:26:24'),
(6, 'à¸Ÿà¸«à¸à¸«à¸Ÿà¸«à¸à¸«à¸Ÿà¸à¸Ÿ', 'INSERTED', '2018-11-30 21:27:35'),
(7, 'er', 'INSERTED', '2018-11-30 21:29:02'),
(8, 'der', 'INSERTED', '2018-11-30 21:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `d_id` int(10) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `d_qty` int(11) NOT NULL,
  `d_subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`d_id`, `USER_ID`, `o_id`, `p_id`, `d_qty`, `d_subtotal`) VALUES
(1, 2, 1, 9, 50, 250000),
(2, 3, 2, 16, 1, 12000),
(3, 3, 2, 7, 1, 7200),
(4, 3, 2, 13, 1, 5500),
(5, 3, 2, 23, 1, 62000),
(6, 4, 3, 6, 10, 170000),
(7, 5, 4, 9, 1, 5000),
(8, 5, 4, 24, 1, 32000),
(9, 5, 4, 2, 1, 5100),
(10, 7, 5, 16, 1, 12000),
(11, 8, 6, 11, 1, 3500),
(12, 8, 6, 29, 2, 17600),
(13, 7, 7, 3, 1, 3800),
(14, 7, 7, 13, 1, 5500),
(15, 7, 7, 15, 1, 12000),
(16, 2, 8, 1, 1, 8499),
(17, 2, 9, 3, 1, 3800),
(18, 2, 10, 1, 1, 8499);

-- --------------------------------------------------------

--
-- Table structure for table `order_head`
--

CREATE TABLE `order_head` (
  `o_id` int(10) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `o_dttm` datetime NOT NULL,
  `o_name` varchar(100) NOT NULL,
  `o_addr` varchar(500) NOT NULL,
  `o_email` varchar(100) NOT NULL,
  `o_phone` varchar(20) NOT NULL,
  `D_ID` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_head`
--

INSERT INTO `order_head` (`o_id`, `USER_ID`, `o_dttm`, `o_name`, `o_addr`, `o_email`, `o_phone`, `D_ID`, `status_id`) VALUES
(1, 2, '2018-11-30 09:20:52', 'Ge7ex  Bestfriend', 'D condo', 'getex@gmail.com', '0587954887', 3, 1),
(2, 3, '2018-11-30 09:22:53', 'tanarak  chunsanit', 'chiangrak', 'ton22222@gmail,com', '0948755879', 2, 1),
(3, 4, '2018-11-30 09:25:21', 'mek  freedom', 'bangkadi siit', 'freedim1234@gmail,com', '946587412', 1, 1),
(4, 5, '2018-11-30 09:26:48', 'jin  mak', 'village of jin', 'jin111@gmail.com', '0945687412', 1, 1),
(5, 7, '2018-11-30 09:29:17', 'tuter  error', 'dusittani', 'error404@gmail.com', '0827469852', 1, 1),
(6, 8, '2018-11-30 09:31:36', 'Hung  Hung', 'siit bkd', 'hung123456789@siit.tu.ac.th', '0975498742', 1, 1),
(7, 7, '2018-11-30 10:43:40', 'tuter  error', 'dusittani', 'error404@gmail.com', '0827469852', 3, 1),
(8, 2, '2018-12-02 08:25:19', 'Ge7ex  Bestfriend', 'D condo', 'getex@gmail.com', '0587954887', 1, 1),
(9, 2, '2018-12-02 08:53:52', 'Ge7ex  Bestfriend', 'D condo', 'getex@gmail.com', '0587954887', 1, 1),
(10, 2, '2018-12-02 08:59:05', 'Ge7ex  Bestfriend', 'D condo', 'getex@gmail.com', '0587954887', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_ID` int(10) NOT NULL,
  `o_id` int(10) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `payment_date` varchar(50) NOT NULL,
  `payment_bank` varchar(50) NOT NULL,
  `payment_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_ID`, `o_id`, `USER_ID`, `payment_date`, `payment_bank`, `payment_pic`) VALUES
(1, 1, 2, '2018-11-30', 'SCB', 'img_5c015508c8840.jpg'),
(2, 2, 3, '2018-11-30', 'KBANK', 'img_5c0155763b00e.jpg'),
(3, 3, 4, '2018-11-30', 'KTB', 'img_5c015591aca52.jpg'),
(4, 4, 5, '2018-11-30', 'KBANK', 'img_5c0155a930231.jpg'),
(5, 5, 7, '2018-11-30', 'KTB', 'img_5c0155d2aaa0c.jpg'),
(6, 6, 8, '2018-11-30', 'SCB', 'img_5c0155f66cd39.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `P_ID` int(10) NOT NULL,
  `P_Name` varchar(255) NOT NULL,
  `P_Details` mediumtext NOT NULL,
  `P_Pic` varchar(100) NOT NULL,
  `P_Price` int(10) NOT NULL,
  `P_Company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`P_ID`, `P_Name`, `P_Details`, `P_Pic`, `P_Price`, `P_Company`) VALUES
(1, 'Casio G-Shock Bluetooth Watch GW-B5600BC-1BER', 'These GW-B5600 Connected Engine models feature the distinctive square design of the 5000/5600 Series, which still maintains the same basic form as the original DW-5000C. Function-wise, these models are designed for outstanding timekeeping accuracy using BluetoothÂ® data communication and Multi Band 6, which supports automatic time setting adjustment based on one of six time calibration signals around the globe. Time information also can be acquired from an internet time server using the G-SHOCK Connected app running on a smartphone.', 'img_5bfe8d39bb20d.jpg', 8499, 'CASIO'),
(2, 'Mens Casio G-Shock Alarm Chronograph Radio Controlled Watch AWG-M100SF-1BEF', 'Casio AWG-M100SF-1BEF is a practical and very impressive Gents watch. Case material is Stainless Steel and Resin. The features of the watch include (among others) a chronograph as well as an alarm. The watch is shipped with an original box and a guarantee from the manufacturer.', 'img_5bfe8e1e275f3.jpg', 5100, 'CASIO'),
(3, 'Mens Casio G-Shock Alarm Chronograph Watch GA-800-4AER', 'Casio G-Shock GA-800-4AER is an amazing and special Gents watch. Case is made out of Plastic/Resin and the Grey dial gives the watch that unique look. The features of the watch include (among others) a chronograph and date function as well as an alarm. In regards to the water resistance, the watch has got a resistancy up to 200 metres. This means it can be used for professional marine activity, skin diving and high impact water sports, but not deep sea or mixed gas diving. We ship it with an original box and a guarantee from the manufacturer.', 'img_5bfe8e7b27cfc.jpg', 3800, 'CASIO'),
(4, 'Ladies Casio Baby-G Step Counter Alarm Chronograph Watch BGS-100-7A2ER', 'Casio Baby-G Step Counter BGS-100-7A2ER is an amazing and attractive Ladies watch. Case is made out of Plastic/Resin, which stands for a high quality of the item and the Cream dial gives the watch that unique look. The features of the watch include (among others) a chronograph and date function as well as an alarm. 100 metres water resistancy will protect the watch and allows it to get submerged in the water for everyday usage including swimming, but not high impact water sports. The watch is shipped with an original box and a guarantee from the manufacturer.', 'img_5bfe90f2daf01.jpg', 4600, 'CASIO'),
(6, 'Ladies Citizen L Sunrise Diamond Watch EM0324-58D', 'The Sunrise collection unites the beauty of nature with innovative design and functionality. With its subtle graduation of colour, the dial conveys the essence of a gentle breeze in a meadow, evoking a sense of romance and eloquence. Suspended beneath the stainless steel case is a unique oblique ring design in which three diamonds float freely, creating a sparkling interplay of light on the wrist. The exquisitely designed new Sunrise models feature a mother of pearl dial and a two tone PVD gold plated stainless steel case that are both beautifully rendered and adorned with 10 precious diamonds and sapphire crystal. ', 'img_5bfe93aae1552.jpg', 17000, 'CITIZEN'),
(7, 'Mens Citizen Axiom Diamond Watch AU1060-51G', 'Citizen Axiom AU1060-51G is a super very impressive Gents watch . Material of the case is Stainless Steel and the Black dial gives the watch that unique look. The features of the watch include (among others) a date function. This watch is market as water resistant. It means it can withstand slight splashes and rain, but is NOT to be immersed in water. We ship it with an original box and a guarantee from the manufacturer.', 'img_5bfe94590f849.jpg', 7200, 'CITIZEN'),
(8, 'Fossil Q Watch (Gen 4) (FTW4012)', 'Smartwatches powered with Wear OS by Google are compatible with iPhoneÂ® and Androidâ„¢ phones. Wear OS by Google and other related marks are trademarks of Google LLC.', 'img_5bfe9521b3a64.jpg', 11400, 'FOSSIL'),
(9, 'Fossil Watch FS5500SET', 'This Men\'s Fossil Grant watch is the perfect gift or self purchase', 'img_5bfe95c01e872.jpg', 5000, 'FOSSIL'),
(10, 'Ladies Fossil Virginia Watch ES4298', 'Fossil Virginia ES4298 is an amazing and attractive Ladies watch. Case material is Blue Ion-Plated Steel while the dial colour is Grey. In regards to the water resistance, the watch has got a resistancy up to 50 metres. It means it can be submerged in water for periods, so can be used for swimming and fishing. It is not reccomended for high impact water sports. The watch is shipped with an original box and a guarantee from the manufacturer.', 'img_5bfe962c32ee5.jpg', 5400, 'FOSSIL'),
(11, 'Ladies Fossil Georgia Cuff Watch ES3565', 'Fossil Georgia ES3565 is an amazing and eye-catching Ladies watch. Case is made out of Two-Tone Steel and Rose Plate while the dial colour is White. 50 metres water resistancy will protect the watch and allows it to be submerged in water for periods, so can be used for swimming and fishing. It is not reccomended for high impact water sports. We ship it with an original box and a guarantee from the manufacturer.', 'img_5bfe96a3aad47.jpg', 3500, 'FOSSIL'),
(12, 'Ladies Calvin Klein Seamless Size Small Watch K8C2S516', 'Calvin Klein Seamless Size Small K8C2S516 is an amazing and trendy Ladies watch. Material of the case is PVD Gold plated while the dial colour is Silver. In regards to the water resistance, the watch has got a resistancy up to 30 metres. It means it can be worn in scenarios where it is likely to be splashed but not immersed in water. It can be worn while washing your hands and will be fine in rain. We ship it with an original box and a guarantee from the manufacturer.', 'img_5bfe9737f3dde.jpg', 11000, 'Calvin Klein'),
(13, 'Unisex Calvin Klein Minimal 40mm Watch K3M211WL', 'Calvin Klein Minimal 40mm K3M211WL is a trendy Unisex watch. Case material is Blue Ion-Plated Steel, which stands for a high quality of the item while the dial colour is Green. This model has got 30 metres water resistancy - it can be worn in scenarios where it is likely to be splashed but not immersed in water. It can be worn while washing your hands and will be fine in rain. The watch is shipped with an original box and a guarantee from the manufacturer.', 'img_5bfe97d8cec09.jpg', 5500, 'Calvin Klein'),
(14, 'Unisex Calvin Klein Banner Watch K4513138', 'Calvin Klein Banner K4513138 is a great Unisex watch. Material of the case is Stainless Steel, which stands for a high quality of the item while the dial colour is White. In regards to the water resistance, the watch has got a resistancy up to 30 metres. It means it can be worn in scenarios where it is likely to be splashed but not immersed in water. It can be worn while washing your hands and will be fine in rain. The watch is shipped with an original box and a guarantee from the manufacturer.', 'img_5bfe984fb47a0.jpg', 6500, 'Calvin Klein'),
(15, 'Mens Calvin Klein Masculine Chronograph Watch K2H27102', 'Calvin Klein Masculine K2H27102 is a functional and attractive Gents watch. Case is made out of Stainless Steel and the Black dial gives the watch that unique look. The features of the watch include (among others) a chronograph and date function. 30 metres water resistancy will protect the watch and allows it to be worn in scenarios where it is likely to be splashed but not immersed in water. It can be worn while washing your hands and will be fine in rain. The watch is shipped with an original box and a guarantee from the manufacturer.', 'img_5bfe98ffd3b35.jpg', 12000, 'Calvin Klein'),
(16, 'Mens Diesel Daddy 2.0 Chronograph Watch DZ7312', 'Diesel The Daddies DZ7312 is a super very impressive Gents watch. Material of the case is Black Ion-plated Steel while the dial colour is Black. The features of the watch include (among others) a chronograph and date function. In regards to the water resistance, the watch has got a resistancy up to 30 metres. It means it can be worn in scenarios where it is likely to be splashed but not immersed in water. It can be worn while washing your hands and will be fine in rain. We ship it with an original box and a guarantee from the manufacturer.', 'img_5bfe9a218a86e.jpg', 12000, 'DIESEL'),
(17, 'Mens Diesel Overfow Chronograph Watch DZ4413', 'Diesel Overfow DZ4413 is a functional and special Gents watch. Case material is Stainless Steel while the dial colour is Silver. The features of the watch include (among others) a chronograph and date function. This model has 100 metres water resistancy - it is suitable for swimming, but not high impact. We ship it with an original box and a guarantee from the manufacturer.', 'img_5bfe9abe0b39e.jpg', 5200, 'DIESEL'),
(18, 'Ladies Gucci New G-Frame Watch YA147403', 'Gucci G-Frame YA147403 is an incredible attractive Ladies watch from G-Frame collection. Material of the case is Stainless Steel and the MultiColour dial gives the watch that unique look. In regards to the water resistance, the watch has got a resistancy up to 50 metres. It means it can be submerged in water for periods, so can be used for swimming and fishing. It is not reccomended for high impact water sports. The watch is shipped with an original box and a guarantee from the manufacturer.', 'img_5bfe9b7855533.jpg', 42000, 'GUCCI'),
(19, 'Unisex Gucci G-Timeless Watch YA126332', 'Gucci G-Timeless GMT YA126332 is a trendy Unisex watch. Case material is Stainless Steel, which stands for a high quality of the item while the dial colour is Silver. The features of the watch include (among others) a date function. This model has got 50 metres water resistancy - it can be submerged in water for periods, so can be used for swimming and fishing. It is not reccomended for high impact water sports. The watch is shipped with an original box and a guarantee from the manufacturer.', 'img_5bfe9be3e5323.jpg', 69000, 'GUCCI'),
(20, 'Gents Gucci Eryx Watch YA126339', 'Gucci YA126339 is a functional and attractive Gents watch. Case is made out of Stainless Steel and the Silver dial gives the watch that unique look. In regards to the water resistance, the watch has got a resistancy up to 50 metres. It means it can be submerged in water for periods, so can be used for swimming and fishing. It is not reccomended for high impact water sports. The watch is shipped with an original box and a guarantee from the manufacturer.', 'img_5bfe9c40dee76.jpg', 73000, 'GUCCI'),
(21, 'Mens Hugo Boss Signature Watch 1513655', 'Hugo Boss Signature 1513655 is a functional and handsome Gents watch from Signature Timepiece Collection Skeleton collection. Case material is Black Ion-plated Steel while the dial colour is Multi-Colour. This model has got 50 metres water resistancy - it can be submerged in water for periods, so can be used for swimming and fishing. It is not reccomended for high impact water sports. We ship it with an original box and a guarantee from the manufacturer.', 'img_5bfe9cc2c5560.jpg', 20000, 'BOSS'),
(22, 'Mens Hugo Boss Cufflink Box Set Watch 157BLACKIPWCUFFLINKS', 'Hugo Boss Cufflink Box Set 1570067 is an amazing and very impressive Gents watch from Horizon collection. Case material is Black Ion-plated Steel, which stands for a high quality of the item and the Black dial gives the watch that unique look. In regards to the water resistance, the watch has got a resistancy up to 30 metres. It means it can be worn in scenarios where it is likely to be splashed but not immersed in water. It can be worn while washing your hands and will be fine in rain. The watch is shipped with an original box and a guarantee from the manufacturer.', 'img_5bfe9d362cf54.jpg', 7200, 'BOSS'),
(23, 'Mens Tissot Chemin Des Tourelles Squelette Mechanical Watch T0994053641800', 'Tissot Chemin Des Tourelles Squelette T0994053641800 is an amazing and attractive Gents watch from T-Classic collection. Case material is PVD rose plating while the dial colour is Silver. This model has got 50 metres water resistancy - it can be submerged in water for periods, so can be used for swimming and fishing. It is not reccomended for high impact water sports. The watch is shipped with an original box and a guarantee from the manufacturer.', 'img_5bfe9e48721a0.jpg', 62000, 'TISSOT'),
(24, 'Ladies Tissot Chemin Des Tourelles Automatic Watch T0992072211800', 'Tissot Chemin Des Tourelles T0992072211800 is a beautiful and attractive Ladies watch from T-Classic collection. Case is made out of Two-tone steel/gold plate while the dial colour is Mother of pearl. The features of the watch include (among others) a date function. In regards to the water resistance, the watch has got a resistancy up to 50 metres. It means it can be submerged in water for periods, so can be used for swimming and fishing. It is not reccomended for high impact water sports. We ship it with an original box and a guarantee from the manufacturer.', 'img_5bfe9eb17eb0d.jpg', 32000, 'TISSOT'),
(25, 'Mens Bulova Telc Automatic Watch 63B185', 'Bulova Telc 63B185 is a super attractive Gents watch. Case material is Stainless Steel and the Blue dial gives the watch that unique look. The features of the watch include (among others) a date function. This watch is market as water resistant. It means it can withstand slight splashes and rain, but is NOT to be immersed in water. We ship it with an original box and a guarantee from the manufacturer.  This watch is supplied with:', 'img_5bfe9f3be2506.jpg', 27800, 'BULOVA'),
(26, 'Mens Bulova Savvy Watch 98D144', 'Bulova Savvy 98D144 is a super attractive Gents watch. Material of the case is Stainless Steel and the Black dial gives the watch that unique look. The features of the watch include (among others) a date function. This watch is market as water resistant. It means it can withstand slight splashes and rain, but is NOT to be immersed in water. The watch is shipped with an original box and a guarantee from the manufacturer.', 'img_5bfe9fc4736ff.jpg', 8500, 'BULOVA'),
(27, 'Mens Rotary Cambridge Automatic Watch GS05250/01', 'Rotary Cambridge GS05250/01 is an amazing and special Gents watch. Case is made out of Stainless Steel, which stands for a high quality of the item while the dial colour is White. The features of the watch include (among others) a date function. This watch is water resistant for most water based activities where a person can complete these without breathing apparatus. The watch is shipped with an original box and a guarantee from the manufacturer.', 'img_5bfea080796fd.jpg', 12000, 'ROTARY'),
(28, 'Ladies Rotary Kensington Watch LB05190/33', 'Rotary Kensington LB05190/33 is a beautiful and attractive Ladies watch. Material of the case is Stainless Steel, which stands for a high quality of the item while the dial colour is Silver. This watch is water resistant for most water based activities where a person can complete these without breathing apparatus. The watch is shipped with an original box and a guarantee from the manufacturer.', 'img_5bfea1011f76d.jpg', 11000, 'ROTARY'),
(29, 'Mens Skagen Hald Solar Powered Watch SKW6278', 'Skagen Hald SKW6278 is an amazing and handsome Gents watch . Case is made out of Stainless Steel, which stands for a high quality of the item while the dial colour is MultiColour. The features of the watch include (among others) a date function. 50 metres water resistancy will protect the watch and allows it to be submerged in water for periods, so can be used for swimming and fishing. It is not reccomended for high impact water sports. We ship it with an original box and a guarantee from the manufacturer.', 'img_5bfea1a40ce46.jpg', 8800, 'SKAGEN'),
(30, 'Mens Skagen Havene Chronograph Watch SKW6070', 'Skagen Havene SKW6070 is a super special Gents watch. Case is made out of Stainless Steel, which stands for a high quality of the item and the Black dial gives the watch that unique look. The features of the watch include (among others) a chronograph and date function. In regards to the water resistance, the watch has got a resistancy up to 50 metres. It means it can be submerged in water for periods, so can be used for swimming and fishing. It is not reccomended for high impact water sports. We ship it with an original box and a guarantee from the manufacturer.', 'img_5bfea2cc808e4.jpg', 6400, 'SKAGEN');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'Waiting for payment'),
(2, 'Payment confirmed'),
(3, 'Waiting for shipment'),
(4, 'Order has been sent'),
(5, 'Order has been delivered');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL,
  `USER_FName` varchar(50) NOT NULL,
  `USER_LName` varchar(50) NOT NULL,
  `USER_GenderID` int(11) NOT NULL,
  `USER_Address` varchar(200) NOT NULL,
  `USER_DOB` varchar(50) NOT NULL,
  `USER_Email` varchar(50) NOT NULL,
  `USER_PhoneNo` varchar(10) NOT NULL,
  `USER_Username` varchar(50) NOT NULL,
  `USER_Password` varchar(50) NOT NULL,
  `USERGROUP_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USER_FName`, `USER_LName`, `USER_GenderID`, `USER_Address`, `USER_DOB`, `USER_Email`, `USER_PhoneNo`, `USER_Username`, `USER_Password`, `USERGROUP_ID`) VALUES
(1, 'Sasin', 'Suwannachot', 1, 'C11', '1997-10-23', 'pp2_thesauce@hotmail.com', '0958271456', 'PP', '1111', 1),
(2, 'Ge7ex', 'Bestfriend', 1, 'D condo', '1924-11-28', 'getex@gmail.com', '0587954887', 'ai', 'ai', 2),
(3, 'tanarak', 'chunsanit', 1, 'chiangrak', '2010-07-27', 'ton22222@gmail,com', '0948755879', 'qwerty', 'qwerty', 2),
(4, 'mek', 'freedom', 2, 'bangkadi siit', '1998-06-25', 'freedim1234@gmail,com', '946587412', 'mek', 'mek', 2),
(5, 'jin', 'mak', 2, 'village of jin', '2006-08-03', 'jin111@gmail.com', '0945687412', 'jin', 'jin', 2),
(6, 'à¸à¸Ÿà¸«à¸', 'à¸Ÿà¸«à¸à¸Ÿà¸«', 1, 'à¸à¸Ÿà¸«à¸à¸Ÿà¸«', '2018-08-30', 'à¸Ÿà¸«à¸à¸Ÿà¸«', 'à¸Ÿà¸«à¸à', 'à¸Ÿà¸«à¸à¸«à¸Ÿà¸«à¸à¸«à¸Ÿà¸à¸Ÿ', 'à¸Ÿà¸«à¸à¸à¸Ÿà¸«', 2),
(7, 'tuter', 'error', 1, 'dusittani', '1991-10-30', 'error404@gmail.com', '0827469852', 'er', 'er', 2),
(8, 'Hung', 'Hung', 1, 'siit bkd', '1985-08-28', 'hung123456789@siit.tu.ac.th', '0975498742', 'der', 'der', 2);

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `log_insert` BEFORE INSERT ON `user` FOR EACH ROW BEGIN
INSERT INTO log SET 
USER_Username = new.USER_Username,
ACT = "INSERTED",
DAT = now();
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `usergender`
--

CREATE TABLE `usergender` (
  `USER_GenderID` int(11) NOT NULL,
  `USER_Gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usergender`
--

INSERT INTO `usergender` (`USER_GenderID`, `USER_Gender`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE `usergroup` (
  `USERGROUP_ID` int(10) NOT NULL,
  `USERGROUP_CODE` int(10) NOT NULL,
  `USERGROUP_NAME` varchar(50) NOT NULL,
  `USER_REMARK` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`USERGROUP_ID`, `USERGROUP_CODE`, `USERGROUP_NAME`, `USER_REMARK`) VALUES
(1, 1, 'Staff', 'Staff'),
(2, 2, 'Customer', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`D_ID`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `order_head`
--
ALTER TABLE `order_head`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `usergender`
--
ALTER TABLE `usergender`
  ADD PRIMARY KEY (`USER_GenderID`);

--
-- Indexes for table `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`USERGROUP_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `D_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_head`
--
ALTER TABLE `order_head`
  MODIFY `o_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `P_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `USERGROUP_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
