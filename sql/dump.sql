CREATE DATABASE IF NOT EXISTS `wbs_db`;
USE `wbs_db`;

CREATE TABLE IF NOT EXISTS `admin_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `time` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `customer_bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `customer_id` varchar(50) NOT NULL DEFAULT '12',
  `previous_reading` varchar(50) DEFAULT '0',
  `current_reading` varchar(50) DEFAULT '0',
  `consumption_units` int(11) DEFAULT 0,
  `tax` varchar(50) DEFAULT '0',
  `bill_amount` varchar(50) DEFAULT '0',
  `discount` varchar(50) DEFAULT '0',
  `total_amount` varchar(50) DEFAULT '0',
  `time` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `customer_details` (
  `customer_id` varchar(50) NOT NULL DEFAULT '12',
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `branch` varchar(50) DEFAULT '',
  `time` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`customer_id`)
);

CREATE TABLE IF NOT EXISTS `info` (
  `discount` varchar(50) NOT NULL DEFAULT '5',
  `tax` varchar(50) NOT NULL DEFAULT '3'
);

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `past_bill` (
  `customer_id` varchar(50) NOT NULL DEFAULT '12',
  `previous_reading` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`customer_id`)
);

INSERT INTO `admin_details` (`id`, `fullname`, `email`, `password`, `time`) VALUES (1, 'Manoj Karki', 'manoj@gmail.com', '1234', '2022-05-09 14:21:28');
INSERT INTO `info` (`discount`, `tax`) VALUES ('5', '3');