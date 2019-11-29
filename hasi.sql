/*
MySQL Data Transfer
Source Host: localhost
Source Database: hasi
Target Host: localhost
Target Database: hasi
Date: 11/29/2019 4:00:57 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for bid_board
-- ----------------------------
DROP TABLE IF EXISTS `bid_board`;
CREATE TABLE `bid_board` (
  `bid_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `cat_name` varchar(50) DEFAULT '',
  `location` varchar(100) DEFAULT NULL,
  `start_date` varchar(20) DEFAULT NULL,
  `end_date` varchar(20) DEFAULT NULL,
  `start_price` int(10) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `u_name` varchar(50) DEFAULT '',
  `img` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`bid_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) DEFAULT '',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `comment_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `bid_id` int(10) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `FK_2` (`bid_id`),
  CONSTRAINT `FK_2` FOREIGN KEY (`bid_id`) REFERENCES `bid_board` (`bid_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for delivery
-- ----------------------------
DROP TABLE IF EXISTS `delivery`;
CREATE TABLE `delivery` (
  `delivery_id` int(10) NOT NULL AUTO_INCREMENT,
  `sell_id` int(10) DEFAULT NULL,
  `staff_id` int(10) DEFAULT NULL,
  `vehicle_id` int(10) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `approve` int(5) DEFAULT NULL,
  `delivery_date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`delivery_id`),
  KEY `fk1` (`sell_id`),
  CONSTRAINT `fk1` FOREIGN KEY (`sell_id`) REFERENCES `sell` (`sell_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for farmer
-- ----------------------------
DROP TABLE IF EXISTS `farmer`;
CREATE TABLE `farmer` (
  `farmer_id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phn_no` varchar(20) DEFAULT NULL,
  `nid` int(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`farmer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for sell
-- ----------------------------
DROP TABLE IF EXISTS `sell`;
CREATE TABLE `sell` (
  `sell_id` int(10) NOT NULL AUTO_INCREMENT,
  `bid_id` int(10) DEFAULT NULL,
  `title` varchar(50) DEFAULT '',
  `price` int(10) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `sold_to` varchar(50) DEFAULT NULL,
  `sold_by` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `payment_status` varchar(30) DEFAULT NULL,
  `status` int(5) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`sell_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for staff
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `staff_id` int(10) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `phn_no` int(15) DEFAULT NULL,
  `nid_no` int(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for staff_payment
-- ----------------------------
DROP TABLE IF EXISTS `staff_payment`;
CREATE TABLE `staff_payment` (
  `sp_id` int(10) NOT NULL AUTO_INCREMENT,
  `staff_id` int(10) DEFAULT NULL,
  `payment_date` varchar(20) DEFAULT NULL,
  `payment_month` varchar(30) DEFAULT NULL,
  `salary` int(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phn_no` varchar(20) DEFAULT NULL,
  `nid` int(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for vehicle
-- ----------------------------
DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE `vehicle` (
  `vehicle_id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  `license` int(15) DEFAULT NULL,
  `weight` int(10) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'Super Admin', 'admin', '123456789', 'upload/74673155_234187554213230_913859802390593536_n.jpg');
INSERT INTO `bid_board` VALUES ('19', 'Apple', 'Fruit', 'Joypurhat', '11/21/2019', '11/23/2019', '119', '200', 'aminul', 'upload/apple.png');
INSERT INTO `bid_board` VALUES ('20', 'Full Copy', 'Vegetable', 'Natore', '11/25/2019', '11/27/2019', '120', '200', 'aminul', 'upload/Fulkopi.jpg');
INSERT INTO `category` VALUES ('38', 'Rice');
INSERT INTO `category` VALUES ('39', 'Fruit');
INSERT INTO `category` VALUES ('40', 'Vegetable');
INSERT INTO `comments` VALUES ('80', 'sojib', '20', '140', '11/27/2019', '03:24:55 pm');
INSERT INTO `delivery` VALUES ('4', '20', '11', '5', 'Delivered', '2', '11/29/2019');
INSERT INTO `farmer` VALUES ('10', 'Aminul ', 'Islam', 'aminul', '123', 'rayhan16-289@diu.edu.bd', '12345678912', '2147483647', 'farmgate', '../admin/upload/aminul.jpg');
INSERT INTO `sell` VALUES ('17', '20', 'Full Copy', '140', '200', '28000', 'sojib', 'aminul', '11/29/2019', 'Pending', '00001');
INSERT INTO `sell` VALUES ('20', '20', 'Full Copy', '140', '150', '21000', 'sojib', 'aminul', '11/29/2019', 'Paid', '00002');
INSERT INTO `staff` VALUES ('11', 'Aminul Islam', 'Aminul', '123', '2147483647', '2147483647', 'Mirpur1', 'imagesaminul.jpg', 'free');
INSERT INTO `staff_payment` VALUES ('9', '11', '11/21/2019', 'January', '10000', 'Confirm');
INSERT INTO `user` VALUES ('9', 'Sajib', 'Mahmud', 'sojib', '123', 'sajib@gmail.com', '12345678912', '2147483647', 'Farmgate', 'admin/upload/74673155_234187554213230_913859802390593536_n.jpg');
INSERT INTO `vehicle` VALUES ('5', 'Small Truck', '123456789', '1000', 'upload/hino-616-tipper.jpg', 'free');
