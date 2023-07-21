-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 12, 2022 at 12:07 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gms`
--

-- --------------------------------------------------------

--
-- Table structure for table `gms_customer`
--

DROP TABLE IF EXISTS `gms_customer`;
CREATE TABLE IF NOT EXISTS `gms_customer` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(40) DEFAULT NULL,
  `customer_address` varchar(60) DEFAULT NULL,
  `customer_phoneno` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gms_customer`
--

INSERT INTO `gms_customer` (`customer_id`, `customer_name`, `customer_address`, `customer_phoneno`) VALUES
(1, 'Abhishek Das', 'at road', '9954432478'),
(2, 'Jai Kishan', 'xx', '9954432772'),
(3, 'Biraj Khound', 'xx', '8822151519'),
(4, 'Barun Biplab', 'ss', '820554687'),
(5, 'Jumi Kalita', 'Jec Road', '9706820577'),
(6, 'M Das', 'sib', ' 9705532580');

-- --------------------------------------------------------

--
-- Table structure for table `gms_item`
--

DROP TABLE IF EXISTS `gms_item`;
CREATE TABLE IF NOT EXISTS `gms_item` (
  `ITEM_ID` int(5) NOT NULL AUTO_INCREMENT,
  `ITEM_CODE` varchar(20) NOT NULL,
  `ITEM_NAME` varchar(60) NOT NULL,
  `ITEM_HSN_CODE` varchar(20) DEFAULT NULL,
  `ITEM_DESC` varchar(40) DEFAULT NULL,
  `ITEM_SIZE` varchar(20) DEFAULT NULL,
  `ITEM_UNIT` varchar(20) DEFAULT NULL,
  `ITEM_STOCK_QUANTITY` int(10) DEFAULT NULL,
  `ITEM_STOCK_Weight` int(10) DEFAULT NULL,
  `ITEM_MRP` int(10) DEFAULT NULL,
  `ITEM_GST_SLAB` int(5) DEFAULT NULL,
  `ITEM_DISCOUNT` int(5) DEFAULT NULL,
  `ITEM_FLOOR_NO` varchar(12) DEFAULT NULL,
  `ITEM_DISPLAY_NO` varchar(12) DEFAULT NULL,
  `ITEM_IMG` varchar(40) DEFAULT NULL,
  `REMARKS` varchar(15) DEFAULT NULL,
  `ENCODED_BY` varchar(20) DEFAULT NULL,
  `ITEM_DATE` datetime DEFAULT NULL,
  `ITEM_CATEGORY` int(10) DEFAULT NULL,
  `ADDITIONAL_INFO1` varchar(20) DEFAULT NULL,
  `ADDITIONAL_INFO2` int(20) DEFAULT NULL,
  PRIMARY KEY (`ITEM_ID`),
  KEY `itemcat` (`ITEM_CATEGORY`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gms_item`
--

INSERT INTO `gms_item` (`ITEM_ID`, `ITEM_CODE`, `ITEM_NAME`, `ITEM_HSN_CODE`, `ITEM_DESC`, `ITEM_SIZE`, `ITEM_UNIT`, `ITEM_STOCK_QUANTITY`, `ITEM_STOCK_Weight`, `ITEM_MRP`, `ITEM_GST_SLAB`, `ITEM_DISCOUNT`, `ITEM_FLOOR_NO`, `ITEM_DISPLAY_NO`, `ITEM_IMG`, `REMARKS`, `ENCODED_BY`, `ITEM_DATE`, `ITEM_CATEGORY`, `ADDITIONAL_INFO1`, `ADDITIONAL_INFO2`) VALUES
(8, '100000051', 'Hajmola Imli', '125625', '', 'small', 'pcs', 7, 0, 200, 5, 1, 'ground', 's101', NULL, 'available', 'Debojit Debnath', '2022-07-07 16:58:27', 11, NULL, NULL),
(9, '100000052', 'Colgate 200g', '12465', '', 'big', 'pcs', 47, 0, 99, 5, 2, 'ground', 's101', NULL, 'available', 'Debojit Debnath', '2022-07-07 17:16:53', 10, NULL, NULL),
(10, '100000053', 'ocean fruit drinks', '1256225', '', '500g', 'pcs', 0, 0, 50, 12, 0, 'ground', 's101', NULL, 'Unavailable', 'Debojit Debnath', '2022-07-07 17:19:25', 1, NULL, NULL),
(11, '100000054', 'Denver deodrant', '1256225', 'Red', '', 'pcs', 24, 0, 210, 18, 20, 'ground', 's101', NULL, 'available', 'Debojit Debnath', '2022-07-07 17:21:15', 25, NULL, NULL),
(12, '100000055', 'Nivea Men Silver Protect ', '1256225', '', 'big', 'pcs', 14, 0, 185, 18, 5, 'ground', 's101', NULL, 'available', 'Debojit Debnath', '2022-07-07 17:24:08', 10, NULL, NULL),
(13, '100000056', 'Axe signature ', '1256225', '', 'small', 'pcs', 14, 0, 190, 18, 5, 'ground', 's102', NULL, 'available', 'Debojit Debnath', '2022-07-07 17:25:04', 10, NULL, NULL),
(14, '100000057', 'Amul tru jeera seltzer', '1256225', '', 'small', 'pcs', 7, 0, 20, 5, 1, 'ground', 's101', NULL, 'available', 'Debojit Debnath', '2022-07-07 17:26:19', 25, NULL, NULL),
(15, '100000058', 'Lifebouy hand sanitizer', '1256225', '', 'small', 'pcs', 7, 0, 45, 0, 0, 'ground', 's102', NULL, 'available', 'Debojit Debnath', '2022-07-07 17:27:18', 25, NULL, NULL),
(16, '100000059', 'Rice Basmati', '1256225', '', 'big', 'Kg', 0, 750, 80, 5, 0, 'ground', '12', NULL, 'available', 'Debojit Debnath', '2022-07-11 11:05:20', 11, NULL, NULL),
(17, '100000060', 'Sugar', '12563', '', '', 'Kg', 0, 40250, 40, 5, 1, 'ground', '12', NULL, 'available', 'Debojit Debnath', '2022-07-12 07:13:07', 26, NULL, NULL),
(18, '100000061', 'Potato', '125645', '', '', 'Kg', 0, 12500, 10, 0, 0, 'ground', '10', NULL, 'available', 'Debojit Debnath', '2022-07-12 07:14:02', 26, NULL, NULL),
(19, '100000062', 'Onion', '125652', '', '', 'Kg', 0, 20000, 22, 0, 0, 'ground', '12', NULL, 'available', 'Debojit Debnath', '2022-07-12 07:15:13', 23, NULL, NULL),
(20, '100000063', 'Gooday Biscuit', '1256225', '', 'small', 'pcs', 20, 0, 25, 5, 0, 'ground', '12', NULL, 'available', 'Debojit Debnath', '2022-07-12 07:16:25', 13, NULL, NULL),
(21, '100000064', 'Parle Milk Bikis', '1256225', '', 'small', 'pcs', 52, 0, 25, 0, 0, 'ground', '', NULL, 'available', 'Debojit Debnath', '2022-07-12 07:17:14', 26, NULL, NULL),
(22, '100000065', 'Boroline', '1223', '', '', 'pcs', 4, 0, 60, 5, 0, 'ground', '121', NULL, 'available', 'Debojit Debnath', '2022-07-12 10:30:11', 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gms_item_category`
--

DROP TABLE IF EXISTS `gms_item_category`;
CREATE TABLE IF NOT EXISTS `gms_item_category` (
  `CATEGORY_ID` int(10) NOT NULL AUTO_INCREMENT,
  `CATEGORY_NAME` varchar(30) NOT NULL,
  `CATEGORY_DESC` varchar(40) NOT NULL,
  PRIMARY KEY (`CATEGORY_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gms_item_category`
--

INSERT INTO `gms_item_category` (`CATEGORY_ID`, `CATEGORY_NAME`, `CATEGORY_DESC`) VALUES
(1, 'Baby Items', 'Baby food, diapers'),
(2, 'Bread/Bakery', 'sandwich, Bread, Cake'),
(3, 'Canned Products', 'ketchup, Fish, Paneer '),
(4, 'Dairy', 'cheeses, eggs, milk, yogurt'),
(5, 'Dry/Baking Goods ', 'cereals, flour, sugar, pasta'),
(6, 'Meat', 'poultry, beef, pork'),
(8, 'Cleaners', 'laundry detergent, dishwashing'),
(9, 'Paper Goods', ' paper towels, toilet paper'),
(10, 'Personal Care', 'shampoo, soap, hand soap'),
(11, 'Other', 'baby items, pet items'),
(12, 'Spices', 'Black pepper, oregano, cinnamon, sugar'),
(13, 'Snacks', 'Chips, pretzels, popcorn, crackers, nuts'),
(14, 'Health Care', 'band-aid, cleaning alcohol,antiseptic'),
(21, 'Frozen Foods', ' waffles, vegetables,ice-cream'),
(22, 'Fruits ', 'Apples, bananas,  grapes, oranges'),
(23, 'Vegetables', 'Potatoes, onions, carrots, salad greens'),
(25, 'Beverages', 'Coffee/tea, juice soda'),
(26, 'Food Items', 'Daily need products');

-- --------------------------------------------------------

--
-- Table structure for table `gms_purchase_details`
--

DROP TABLE IF EXISTS `gms_purchase_details`;
CREATE TABLE IF NOT EXISTS `gms_purchase_details` (
  `PURCHASE_ID` int(10) NOT NULL AUTO_INCREMENT,
  `INVOICE_NO` varchar(20) DEFAULT NULL,
  `ITEM_NAME` varchar(40) DEFAULT NULL,
  `ITEM_ID` int(10) DEFAULT NULL,
  `ITEM_QTY` float DEFAULT NULL,
  `ITEM_PRICE` int(10) DEFAULT NULL,
  `UNIT` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`PURCHASE_ID`),
  KEY `item_fk` (`ITEM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gms_purchase_details`
--

INSERT INTO `gms_purchase_details` (`PURCHASE_ID`, `INVOICE_NO`, `ITEM_NAME`, `ITEM_ID`, `ITEM_QTY`, `ITEM_PRICE`, `UNIT`) VALUES
(74, 'G00001', 'Amul tru jeera seltzer', 14, 12, 20, 'pcs'),
(75, 'G00001', 'Hajmola Imli', 8, 20, 20, 'pcs'),
(76, 'G00002', 'ocean fruit drink', 10, 5, 50, 'pcs'),
(93, 'G00003', 'Amul tru jeera seltzer', 14, 4, 20, 'pcs'),
(104, 'G00004', 'Rice Basmati', 16, 1000, 80, 'Kg'),
(105, 'G00005', 'Rice Basmati', 16, 20000, 80, 'Kg'),
(106, 'G00005', 'Rice Basmati', 16, 5000, 80, 'Kg');

--
-- Triggers `gms_purchase_details`
--
DROP TRIGGER IF EXISTS `purchase_trig`;
DELIMITER $$
CREATE TRIGGER `purchase_trig` AFTER INSERT ON `gms_purchase_details` FOR EACH ROW begin
if(new.unit ='Kg' or new.unit ='Ltr'  ) then
update  gms_item
set gms_item.ITEM_STOCK_Weight =  gms_item.ITEM_STOCK_Weight + new.Item_qty where gms_item.ITEM_ID=new.ITEM_ID;
ELSE
update  gms_item
set gms_item.ITEM_STOCK_QUANTITY =  gms_item.ITEM_STOCK_QUANTITY + new.Item_qty where gms_item.ITEM_ID=new.ITEM_ID;
end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `gms_purchase_master`
--

DROP TABLE IF EXISTS `gms_purchase_master`;
CREATE TABLE IF NOT EXISTS `gms_purchase_master` (
  `PURCHASE_ID` int(10) NOT NULL AUTO_INCREMENT,
  `INVOICE_NO` varchar(20) DEFAULT NULL,
  `PURCHASE_DATE` date DEFAULT NULL,
  `TOTAL` float DEFAULT NULL,
  `GST_AMOUNT` float DEFAULT NULL,
  `DISCOUNT` int(10) DEFAULT NULL,
  `ADDITIONAL_CHARGE` int(10) DEFAULT NULL,
  `REMARKS` varchar(20) DEFAULT NULL,
  `SUB_TOTAL` float DEFAULT NULL,
  `CREATED_ON` datetime DEFAULT NULL,
  `ADDITIONAL_INFO1` varchar(20) DEFAULT NULL,
  `ADDITIONAL_INFO2` varchar(20) DEFAULT NULL,
  `SUPPLIER_ID` int(10) DEFAULT NULL,
  PRIMARY KEY (`PURCHASE_ID`),
  KEY `supplier_fk` (`SUPPLIER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gms_purchase_master`
--

INSERT INTO `gms_purchase_master` (`PURCHASE_ID`, `INVOICE_NO`, `PURCHASE_DATE`, `TOTAL`, `GST_AMOUNT`, `DISCOUNT`, `ADDITIONAL_CHARGE`, `REMARKS`, `SUB_TOTAL`, `CREATED_ON`, `ADDITIONAL_INFO1`, `ADDITIONAL_INFO2`, `SUPPLIER_ID`) VALUES
(22, 'G00001', '2022-07-01', 608, 32, 0, NULL, NULL, 640, '2022-07-07 17:29:05', NULL, NULL, 1),
(23, 'G00002', '2022-07-10', 220, 30, 0, NULL, NULL, 250, '2022-07-10 09:32:21', NULL, NULL, 9),
(24, 'G00003', '2022-07-11', 76, 4, 0, NULL, NULL, 80, '2022-07-11 17:48:30', NULL, NULL, 1),
(25, 'G00004', '2022-07-11', 76, 4, 0, NULL, NULL, 80, '2022-07-11 17:52:17', NULL, NULL, 1),
(26, 'G00005', '2022-07-11', 380, 20, 0, NULL, NULL, 400, '2022-07-11 17:55:07', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gms_sales_details`
--

DROP TABLE IF EXISTS `gms_sales_details`;
CREATE TABLE IF NOT EXISTS `gms_sales_details` (
  `SALES_ID` int(10) NOT NULL AUTO_INCREMENT,
  `SALES_INVOICE_ID` varchar(15) DEFAULT NULL,
  `ITEM_ID` varchar(50) DEFAULT NULL,
  `ITEM_UNIT` varchar(10) DEFAULT NULL,
  `ITEM_QTY` double(40,2) DEFAULT NULL,
  `ITEM_RATE` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  PRIMARY KEY (`SALES_ID`),
  KEY `sd` (`SALES_INVOICE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gms_sales_details`
--

INSERT INTO `gms_sales_details` (`SALES_ID`, `SALES_INVOICE_ID`, `ITEM_ID`, `ITEM_UNIT`, `ITEM_QTY`, `ITEM_RATE`, `discount`) VALUES
(57, 'S00001', ' 14', 'pcs', 1.00, 20, 1),
(59, 'S00003', ' 16', 'Kg', 1000.00, 80, 0),
(60, 'S00004', ' 16', 'Kg', 1200.00, 80, 0),
(61, 'S00005', ' 16', 'Kg', 1000.00, 80, 0),
(62, 'S00005', ' 14', 'pcs', 3.00, 20, 3),
(72, 'S00006', ' 16', 'Kg', 1000.00, 80, 0),
(74, 'S00007', ' 16', 'Kg', 3000.00, 80, 0),
(75, 'S00008', ' 14', 'pcs', 3.00, 20, 3),
(76, 'S00008', ' 16', 'Kg', 5000.00, 80, 0),
(77, 'S00009', ' 16', 'Kg', 4250.00, 80, 0),
(78, 'S00009', ' 13', 'pcs', 3.00, 190, 15),
(79, 'S00010', ' 17', 'Kg', 10000.00, 40, 10),
(80, 'S00010', ' 20', 'pcs', 2.00, 25, 0),
(84, 'S00011', ' 16', 'Kg', 2000.00, 80, 0),
(87, 'S00012', ' 16', 'Kg', 4000.00, 80, 0),
(90, 'S00013', ' 16', 'Kg', 5000.00, 80, 0),
(91, 'S00013', ' 14', 'pcs', 20.00, 20, 20),
(93, 'S00014', ' 8', 'pcs', 2.00, 200, 2),
(94, 'S00015', ' 8', 'pcs', 3.00, 200, 3);

--
-- Triggers `gms_sales_details`
--
DROP TRIGGER IF EXISTS `sales_quantity`;
DELIMITER $$
CREATE TRIGGER `sales_quantity` AFTER INSERT ON `gms_sales_details` FOR EACH ROW begin
 DECLARE stock_qty integer;
 DECLARE stock_wt integer;
  SET stock_qty = (select item_stock_quantity from gms_item where 
ITEM_ID=new.item_id);
  SET stock_wt = (select item_stock_weight from gms_item where 
ITEM_ID=new.item_id);

if(new.item_unit ='Kg' or new.item_unit ='Ltr'  ) then

	if(new.item_qty<=stock_wt  ) then
update  gms_item
set gms_item.ITEM_STOCK_weight =  gms_item.ITEM_STOCK_weight - new.Item_qty where gms_item.ITEM_ID=new.ITEM_ID;
else
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT='Please Try with a lower amount.Stock Low';

end if;


else
if(new.item_qty<=stock_qty  ) then
update  gms_item
set gms_item.ITEM_STOCK_QUANTITY =  gms_item.ITEM_STOCK_QUANTITY - new.Item_qty where gms_item.ITEM_ID=new.ITEM_ID;
else
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT='Please Try with a lower amount.Stock Low';

end if;



end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `gms_sales_master`
--

DROP TABLE IF EXISTS `gms_sales_master`;
CREATE TABLE IF NOT EXISTS `gms_sales_master` (
  `INVOICE_NO` varchar(15) NOT NULL,
  `INVOICE_DATE` date DEFAULT NULL,
  `CUST_ID` int(10) DEFAULT NULL,
  `TOTAL` double(40,2) DEFAULT NULL,
  `DISCOUNT` float(10,2) DEFAULT NULL,
  `GST` float(10,2) DEFAULT NULL,
  `AMOUNT_RECEIVED` int(10) DEFAULT NULL,
  `DUE` int(10) DEFAULT NULL,
  `TOTAL_AMOUNT` double(40,2) DEFAULT NULL,
  `AMOUNT_BEFORE_TAX` float DEFAULT NULL,
  PRIMARY KEY (`INVOICE_NO`),
  KEY `customer_fk` (`CUST_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gms_sales_master`
--

INSERT INTO `gms_sales_master` (`INVOICE_NO`, `INVOICE_DATE`, `CUST_ID`, `TOTAL`, `DISCOUNT`, `GST`, `AMOUNT_RECEIVED`, `DUE`, `TOTAL_AMOUNT`, `AMOUNT_BEFORE_TAX`) VALUES
('S00001', '2022-07-11', 5, 19.00, 1.00, 0.95, NULL, NULL, 19.00, NULL),
('S00002', '2022-07-11', 5, 798.00, 42.00, 39.90, NULL, NULL, 798.00, NULL),
('S00003', '2022-07-11', 5, 80.00, 0.00, 4.00, NULL, NULL, 80.00, NULL),
('S00004', '2022-07-11', 5, 96.00, 0.00, 4.80, NULL, NULL, 96.00, NULL),
('S00005', '2022-07-11', 5, 137.00, 3.00, 6.85, NULL, NULL, 137.00, NULL),
('S00006', '2022-07-12', 5, 688.00, 32.00, 34.40, NULL, NULL, 688.00, NULL),
('S00007', '2022-07-12', 5, 848.00, 32.00, 42.40, NULL, NULL, 848.00, NULL),
('S00008', '2022-07-12', 3, 457.00, 3.00, 22.85, NULL, NULL, 457.00, NULL),
('S00009', '2022-07-12', 5, 895.00, 15.00, 116.90, NULL, NULL, 895.00, NULL),
('S00010', '2022-07-12', 4, 440.00, 12.00, 22.00, NULL, NULL, 438.00, NULL),
('S00011', '2022-07-12', 3, 160.00, 0.00, 8.00, NULL, NULL, 160.00, NULL),
('S00012', '2022-07-12', 5, 320.00, 0.00, 16.00, NULL, NULL, 320.00, NULL),
('S00013', '2022-07-12', 6, 780.00, 27.80, 39.00, NULL, NULL, 787.80, NULL),
('S00014', '2022-07-12', 2, 398.00, 2.00, 19.90, NULL, NULL, 398.00, NULL),
('S00015', '2022-07-12', 1, 597.00, 8.97, 29.85, NULL, NULL, 591.03, NULL);

--
-- Triggers `gms_sales_master`
--
DROP TRIGGER IF EXISTS `Discount`;
DELIMITER $$
CREATE TRIGGER `Discount` BEFORE INSERT ON `gms_sales_master` FOR EACH ROW BEGIN
if(new.TOTAL_AMOUNT >= 300 AND new.TOTAL_AMOUNT >= 499 )
THEN
set new.discount=((new.TOTAL_AMOUNT*1)/100)+new.discount;
set new.TOTAL_AMOUNT=new.TOTAL_AMOUNT -(new.TOTAL_AMOUNT*1)/100;

ELSEIF(new.TOTAL_AMOUNT >= 500 ) then
set new.discount=((new.TOTAL_AMOUNT*2)/100)+new.discount;
set new.TOTAL_AMOUNT=new.TOTAL_AMOUNT -(new.TOTAL_AMOUNT*2)/100;


end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `gms_supplier`
--

DROP TABLE IF EXISTS `gms_supplier`;
CREATE TABLE IF NOT EXISTS `gms_supplier` (
  `SUPPLIER_ID` int(10) NOT NULL AUTO_INCREMENT,
  `SUPPLIER_NAME` varchar(30) NOT NULL,
  `SUPPLIER_ADDRESS` varchar(40) NOT NULL,
  `SUPPLIER_PHNO` varchar(12) NOT NULL,
  `SUPPLIER_GSTNO` varchar(20) NOT NULL,
  `SUPPLIER_GSTTYPE` varchar(12) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`SUPPLIER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gms_supplier`
--

INSERT INTO `gms_supplier` (`SUPPLIER_ID`, `SUPPLIER_NAME`, `SUPPLIER_ADDRESS`, `SUPPLIER_PHNO`, `SUPPLIER_GSTNO`, `SUPPLIER_GSTTYPE`, `status`) VALUES
(1, 'Mohan Lal Bagris', 'Marwari Patty', '8484848448', '18ap45685385156a', 'regular', 'active'),
(2, 'Bhuyan pvt ltd.', 'Marwari Patty,sivasagar', '848484848', '18ap456853851211', 'regular', 'active'),
(4, 'The Home', ' JEc Road, Jorhat', '9706820571', '18ATTPH2270D1ZN', 'Regular', 'active'),
(8, 'Mohan Lal Bagris', ' Marwari Patty', '8484848448', '18ap45685385156a', 'regular', 'active'),
(9, 'Pashupati Enterprise', ' babupatty', '9706820555', '18ATTPH2270D1CC', 'Regular', 'Discontinue');

-- --------------------------------------------------------

--
-- Table structure for table `gms_user_account`
--

DROP TABLE IF EXISTS `gms_user_account`;
CREATE TABLE IF NOT EXISTS `gms_user_account` (
  `USER_ID` int(10) NOT NULL AUTO_INCREMENT,
  `PASSWORD` varchar(60) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `emp_phno` varchar(15) NOT NULL,
  `emp_address` varchar(60) NOT NULL,
  `emp_uniqueid` varchar(15) DEFAULT NULL,
  `emp_joindate` varchar(12) NOT NULL,
  `emp_dateofbirth` varchar(12) NOT NULL,
  `emp_shift` varchar(20) DEFAULT NULL,
  `emp_salary` int(10) DEFAULT NULL,
  `emp_image` varchar(40) NOT NULL,
  `emp_designation` varchar(15) DEFAULT NULL,
  `emp_gender` varchar(10) NOT NULL,
  `additional_info1` varchar(20) DEFAULT NULL,
  `USER_STATUS` varchar(10) NOT NULL,
  `USER_TYPE` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gms_user_account`
--

INSERT INTO `gms_user_account` (`USER_ID`, `PASSWORD`, `EMAIL`, `emp_name`, `emp_phno`, `emp_address`, `emp_uniqueid`, `emp_joindate`, `emp_dateofbirth`, `emp_shift`, `emp_salary`, `emp_image`, `emp_designation`, `emp_gender`, `additional_info1`, `USER_STATUS`, `USER_TYPE`) VALUES
(10, '$2y$10$0tbVv8YlS3f.B/aTDr.u/.u/w4/pcfbd.L2W5o2fP5FtZ2l4X1zHW', 'assamenter5@gmail.com', 'Debojit Debnath', '9706820555', 'Bg. Road', 'GMS00001', '2022-07-06', '2005-12-26', 'Morning', 12000, 'Images/Screenshot (26).jpeg', 'manager', 'Male', NULL, 'Y', 'admin'),
(11, '$2y$10$ccV4nLX84pE4xXkYt8YgWOjlUQ/oQW0BAjKPeE9jap5FNOlhcZ.K.', 'jec@gmail.com', 'Debojit Debnath', '9999999999', 'Bg. Road', 'GMS00002', '2022-07-07', '2022-07-06', 'Evening', 11000, 'Images/tl.jpg', 'Staff', 'Male', NULL, 'Y', 'user'),
(12, '$2y$10$1x4l2Ki.hmv3sI0acZ0BW.Q60zLZJ2PFQs/LMGmhiMCm5SOVHeizS', 'pmanna097@gmail.com', 'Prasenjit Manna', '9706820571', 'Babupatty Road,Sivasagar,Assam', 'GMS00003', '2022-07-01', '1998-11-08', 'Morning', 12000, 'Images/Passport.jpg', 'Staff', 'Male', NULL, 'Y', 'user');

-- --------------------------------------------------------

--
-- Stand-in structure for view `items_cat`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `items_cat`;
CREATE TABLE IF NOT EXISTS `items_cat` (
`ITEM_ID` int(5)
,`ITEM_CODE` varchar(20)
,`ITEM_NAME` varchar(60)
,`ITEM_HSN_CODE` varchar(20)
,`ITEM_DESC` varchar(40)
,`ITEM_SIZE` varchar(20)
,`ITEM_UNIT` varchar(20)
,`ITEM_STOCK_QUANTITY` int(10)
,`ITEM_STOCK_Weight` int(10)
,`ITEM_MRP` int(10)
,`ITEM_GST_SLAB` int(5)
,`ITEM_DISCOUNT` int(5)
,`ITEM_FLOOR_NO` varchar(12)
,`ITEM_DISPLAY_NO` varchar(12)
,`ITEM_IMG` varchar(40)
,`REMARKS` varchar(15)
,`ENCODED_BY` varchar(20)
,`ITEM_DATE` datetime
,`ITEM_CATEGORY` int(10)
,`ADDITIONAL_INFO1` varchar(20)
,`ADDITIONAL_INFO2` int(20)
,`CATEGORY_ID` int(10)
,`CATEGORY_NAME` varchar(30)
,`CATEGORY_DESC` varchar(40)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `low_stock`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `low_stock`;
CREATE TABLE IF NOT EXISTS `low_stock` (
`ITEM_ID` int(5)
,`ITEM_CODE` varchar(20)
,`ITEM_NAME` varchar(60)
,`ITEM_HSN_CODE` varchar(20)
,`ITEM_DESC` varchar(40)
,`ITEM_SIZE` varchar(20)
,`ITEM_UNIT` varchar(20)
,`ITEM_STOCK_QUANTITY` int(10)
,`ITEM_STOCK_Weight` int(10)
,`ITEM_MRP` int(10)
,`ITEM_GST_SLAB` int(5)
,`ITEM_DISCOUNT` int(5)
,`ITEM_FLOOR_NO` varchar(12)
,`ITEM_DISPLAY_NO` varchar(12)
,`ITEM_IMG` varchar(40)
,`REMARKS` varchar(15)
,`ENCODED_BY` varchar(20)
,`ITEM_DATE` datetime
,`ITEM_CATEGORY` int(10)
,`ADDITIONAL_INFO1` varchar(20)
,`ADDITIONAL_INFO2` int(20)
,`CATEGORY_ID` int(10)
,`CATEGORY_NAME` varchar(30)
,`CATEGORY_DESC` varchar(40)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `monthlypurchase`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `monthlypurchase`;
CREATE TABLE IF NOT EXISTS `monthlypurchase` (
`year` int(4)
,`month` int(2)
,`total` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `monthlysale`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `monthlysale`;
CREATE TABLE IF NOT EXISTS `monthlysale` (
`year` int(4)
,`month` int(2)
,`monthlysale` double(19,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `salesbycat`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `salesbycat`;
CREATE TABLE IF NOT EXISTS `salesbycat` (
`category_name` varchar(30)
,`total_amount` double(19,2)
);

-- --------------------------------------------------------

--
-- Structure for view `items_cat`
--
DROP TABLE IF EXISTS `items_cat`;

DROP VIEW IF EXISTS `items_cat`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `items_cat`  AS SELECT `i`.`ITEM_ID` AS `ITEM_ID`, `i`.`ITEM_CODE` AS `ITEM_CODE`, `i`.`ITEM_NAME` AS `ITEM_NAME`, `i`.`ITEM_HSN_CODE` AS `ITEM_HSN_CODE`, `i`.`ITEM_DESC` AS `ITEM_DESC`, `i`.`ITEM_SIZE` AS `ITEM_SIZE`, `i`.`ITEM_UNIT` AS `ITEM_UNIT`, `i`.`ITEM_STOCK_QUANTITY` AS `ITEM_STOCK_QUANTITY`, `i`.`ITEM_STOCK_Weight` AS `ITEM_STOCK_Weight`, `i`.`ITEM_MRP` AS `ITEM_MRP`, `i`.`ITEM_GST_SLAB` AS `ITEM_GST_SLAB`, `i`.`ITEM_DISCOUNT` AS `ITEM_DISCOUNT`, `i`.`ITEM_FLOOR_NO` AS `ITEM_FLOOR_NO`, `i`.`ITEM_DISPLAY_NO` AS `ITEM_DISPLAY_NO`, `i`.`ITEM_IMG` AS `ITEM_IMG`, `i`.`REMARKS` AS `REMARKS`, `i`.`ENCODED_BY` AS `ENCODED_BY`, `i`.`ITEM_DATE` AS `ITEM_DATE`, `i`.`ITEM_CATEGORY` AS `ITEM_CATEGORY`, `i`.`ADDITIONAL_INFO1` AS `ADDITIONAL_INFO1`, `i`.`ADDITIONAL_INFO2` AS `ADDITIONAL_INFO2`, `c`.`CATEGORY_ID` AS `CATEGORY_ID`, `c`.`CATEGORY_NAME` AS `CATEGORY_NAME`, `c`.`CATEGORY_DESC` AS `CATEGORY_DESC` FROM (`gms_item` `i` join `gms_item_category` `c` on((`i`.`ITEM_CATEGORY` = `c`.`CATEGORY_ID`))) ORDER BY `i`.`ITEM_NAME` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `low_stock`
--
DROP TABLE IF EXISTS `low_stock`;

DROP VIEW IF EXISTS `low_stock`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `low_stock`  AS SELECT `items_cat`.`ITEM_ID` AS `ITEM_ID`, `items_cat`.`ITEM_CODE` AS `ITEM_CODE`, `items_cat`.`ITEM_NAME` AS `ITEM_NAME`, `items_cat`.`ITEM_HSN_CODE` AS `ITEM_HSN_CODE`, `items_cat`.`ITEM_DESC` AS `ITEM_DESC`, `items_cat`.`ITEM_SIZE` AS `ITEM_SIZE`, `items_cat`.`ITEM_UNIT` AS `ITEM_UNIT`, `items_cat`.`ITEM_STOCK_QUANTITY` AS `ITEM_STOCK_QUANTITY`, `items_cat`.`ITEM_STOCK_Weight` AS `ITEM_STOCK_Weight`, `items_cat`.`ITEM_MRP` AS `ITEM_MRP`, `items_cat`.`ITEM_GST_SLAB` AS `ITEM_GST_SLAB`, `items_cat`.`ITEM_DISCOUNT` AS `ITEM_DISCOUNT`, `items_cat`.`ITEM_FLOOR_NO` AS `ITEM_FLOOR_NO`, `items_cat`.`ITEM_DISPLAY_NO` AS `ITEM_DISPLAY_NO`, `items_cat`.`ITEM_IMG` AS `ITEM_IMG`, `items_cat`.`REMARKS` AS `REMARKS`, `items_cat`.`ENCODED_BY` AS `ENCODED_BY`, `items_cat`.`ITEM_DATE` AS `ITEM_DATE`, `items_cat`.`ITEM_CATEGORY` AS `ITEM_CATEGORY`, `items_cat`.`ADDITIONAL_INFO1` AS `ADDITIONAL_INFO1`, `items_cat`.`ADDITIONAL_INFO2` AS `ADDITIONAL_INFO2`, `items_cat`.`CATEGORY_ID` AS `CATEGORY_ID`, `items_cat`.`CATEGORY_NAME` AS `CATEGORY_NAME`, `items_cat`.`CATEGORY_DESC` AS `CATEGORY_DESC` FROM `items_cat` WHERE ((`items_cat`.`ITEM_STOCK_QUANTITY` between 1 and 5) OR (`items_cat`.`ITEM_STOCK_Weight` between 1 and 5000)) ;

-- --------------------------------------------------------

--
-- Structure for view `monthlypurchase`
--
DROP TABLE IF EXISTS `monthlypurchase`;

DROP VIEW IF EXISTS `monthlypurchase`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `monthlypurchase`  AS SELECT year(`gms_purchase_master`.`PURCHASE_DATE`) AS `year`, month(`gms_purchase_master`.`PURCHASE_DATE`) AS `month`, sum(`gms_purchase_master`.`SUB_TOTAL`) AS `total` FROM `gms_purchase_master` GROUP BY year(`gms_purchase_master`.`PURCHASE_DATE`), month(`gms_purchase_master`.`PURCHASE_DATE`) ORDER BY year(`gms_purchase_master`.`PURCHASE_DATE`) ASC, month(`gms_purchase_master`.`PURCHASE_DATE`) ASC ;

-- --------------------------------------------------------

--
-- Structure for view `monthlysale`
--
DROP TABLE IF EXISTS `monthlysale`;

DROP VIEW IF EXISTS `monthlysale`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `monthlysale`  AS SELECT year(`gms_sales_master`.`INVOICE_DATE`) AS `year`, month(`gms_sales_master`.`INVOICE_DATE`) AS `month`, sum(`gms_sales_master`.`TOTAL_AMOUNT`) AS `monthlysale` FROM `gms_sales_master` GROUP BY year(`gms_sales_master`.`INVOICE_DATE`), month(`gms_sales_master`.`INVOICE_DATE`) ORDER BY year(`gms_sales_master`.`INVOICE_DATE`) ASC, month(`gms_sales_master`.`INVOICE_DATE`) ASC ;

-- --------------------------------------------------------

--
-- Structure for view `salesbycat`
--
DROP TABLE IF EXISTS `salesbycat`;

DROP VIEW IF EXISTS `salesbycat`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `salesbycat`  AS SELECT `c`.`CATEGORY_NAME` AS `category_name`, sum(`m`.`TOTAL_AMOUNT`) AS `total_amount` FROM (((`gms_sales_details` `s` join `gms_sales_master` `m` on((`s`.`SALES_INVOICE_ID` = `m`.`INVOICE_NO`))) join `gms_item` `i` on((`i`.`ITEM_ID` = `s`.`ITEM_ID`))) join `gms_item_category` `c` on((`i`.`ITEM_CATEGORY` = `c`.`CATEGORY_ID`))) GROUP BY `c`.`CATEGORY_NAME` ORDER BY `total_amount` DESC ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gms_item`
--
ALTER TABLE `gms_item`
  ADD CONSTRAINT `itemcat` FOREIGN KEY (`ITEM_CATEGORY`) REFERENCES `gms_item_category` (`CATEGORY_ID`);

--
-- Constraints for table `gms_purchase_details`
--
ALTER TABLE `gms_purchase_details`
  ADD CONSTRAINT `item_fk` FOREIGN KEY (`ITEM_ID`) REFERENCES `gms_item` (`ITEM_ID`);

--
-- Constraints for table `gms_purchase_master`
--
ALTER TABLE `gms_purchase_master`
  ADD CONSTRAINT `supplier_fk` FOREIGN KEY (`SUPPLIER_ID`) REFERENCES `gms_supplier` (`SUPPLIER_ID`);

--
-- Constraints for table `gms_sales_master`
--
ALTER TABLE `gms_sales_master`
  ADD CONSTRAINT `customer_fk` FOREIGN KEY (`CUST_ID`) REFERENCES `gms_customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
