# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 10.10.0.66 (MySQL 5.5.33-31.1-log)
# Database: US_development_zed
# Generation Time: 2013-10-16 17:11:07 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table pac_glossary_explanation
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pac_glossary_explanation`;

CREATE TABLE `pac_glossary_explanation` (
  `id_glossary_explanation` int(11) NOT NULL AUTO_INCREMENT,
  `fk_glossary_language` int(11) NOT NULL,
  `fk_glossary_key` int(11) NOT NULL,
  `text` longtext NOT NULL,
  PRIMARY KEY (`id_glossary_explanation`),
  UNIQUE KEY `pac_glossary_explanation_U_1` (`fk_glossary_language`,`fk_glossary_key`),
  KEY `pac_glossary_explanation_FI_2` (`fk_glossary_key`),
  CONSTRAINT `pac_glossary_explanation_FK_1` FOREIGN KEY (`fk_glossary_language`) REFERENCES `pac_glossary_language` (`id_glossary_language`) ON DELETE CASCADE,
  CONSTRAINT `pac_glossary_explanation_FK_2` FOREIGN KEY (`fk_glossary_key`) REFERENCES `pac_glossary_key` (`id_glossary_key`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `pac_glossary_explanation` WRITE;
/*!40000 ALTER TABLE `pac_glossary_explanation` DISABLE KEYS */;

INSERT INTO `pac_glossary_explanation` (`id_glossary_explanation`, `fk_glossary_language`, `fk_glossary_key`, `text`)
VALUES
	(7,1,85,'Buy Now'),
	(8,1,86,'currently out of stock'),
	(9,1,87,'Remove'),
	(10,1,88,'% VAT'),
	(11,1,89,'Cart EMPTY.'),
	(12,1,90,'Free Shipping & Return'),
	(13,1,91,'30 Days of Return'),
	(14,1,92,'Grand Total Price'),
	(15,1,93,'Shipping'),
	(16,1,94,'Subtotal Price'),
	(17,1,95,'Total Price'),
	(18,1,96,'Amount'),
	(19,1,97,'Item price'),
	(20,1,98,'Product'),
	(21,1,99,'Go to Checkout'),
	(22,1,100,'Your cart'),
	(23,1,101,'Your cart'),
	(24,1,102,'Free Shipping & Return'),
	(25,1,103,'30 Days of Return'),
	(26,1,104,'Hotline: +49 (0) 30 340 606 300'),
	(27,1,105,'Payment options'),
	(28,1,106,'Shipping'),
	(29,1,107,'Information'),
	(30,1,108,'e.g. John Quincy Doe'),
	(31,1,109,'Full Name'),
	(32,1,110,'Shipping and Billing Address'),
	(33,1,111,'City'),
	(34,1,112,'Postal Code'),
	(35,1,113,'Number'),
	(36,1,114,'Street'),
	(37,1,115,'Company'),
	(38,1,116,'Last Name'),
	(39,1,117,'Middle Name'),
	(40,1,118,'First Name'),
	(41,1,119,'Email'),
	(42,1,120,'Phone'),
	(43,1,121,'Comment'),
	(44,1,122,'e.g. company / please hand to neighbor Wilson'),
	(45,1,123,'e.g. 79 N 11th Brooklyn'),
	(46,1,124,'Full Address'),
	(47,1,125,'Demo Payment Method'),
	(48,1,126,'Shipping Address'),
	(49,1,127,'% VAT'),
	(50,1,128,'Grand Total Price'),
	(51,1,129,'Shipping'),
	(52,1,130,'Subtotal Price'),
	(53,1,131,'Cart EMPTY.'),
	(54,1,132,'Go to Order Summary'),
	(55,1,133,'City:'),
	(56,1,134,'Postal Code:'),
	(57,1,135,'Street:'),
	(58,1,136,'Name:'),
	(59,1,137,'Shipping goes to'),
	(60,1,138,'Your Cart'),
	(61,1,139,'Contact Data'),
	(62,1,140,'Payment'),
	(63,1,141,'Billing Address'),
	(64,1,142,'Country'),
	(65,1,143,'edit'),
	(66,1,76,'Product added to cart');
	(67,1,144,'Country:');

/*!40000 ALTER TABLE `pac_glossary_explanation` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pac_glossary_group
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pac_glossary_group`;

CREATE TABLE `pac_glossary_group` (
  `id_glossary_group` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_glossary_group`),
  UNIQUE KEY `pac_glossary_group_U_1` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table pac_glossary_key
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pac_glossary_key`;

CREATE TABLE `pac_glossary_key` (
  `id_glossary_key` int(11) NOT NULL AUTO_INCREMENT,
  `fk_glossary_group` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `is_global` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_glossary_key`),
  UNIQUE KEY `pac_glossary_key_U_1` (`name`),
  KEY `is_global` (`is_global`),
  KEY `is_deleted` (`is_deleted`),
  KEY `pac_glossary_key_FI_1` (`fk_glossary_group`),
  CONSTRAINT `pac_glossary_key_FK_1` FOREIGN KEY (`fk_glossary_group`) REFERENCES `pac_glossary_group` (`id_glossary_group`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `pac_glossary_key` WRITE;
/*!40000 ALTER TABLE `pac_glossary_key` DISABLE KEYS */;

INSERT INTO `pac_glossary_key` (`id_glossary_key`, `fk_glossary_group`, `name`, `is_global`, `is_deleted`)
VALUES
	(72,NULL,'cart.success.coupon.code.remove',0,0),
	(73,NULL,'cart.success.coupon.code.add',0,0),
	(74,NULL,'cart.success.product.remove',0,0),
	(75,NULL,'cart.success.product.quantity.change',0,0),
	(76,NULL,'cart.success.product.add',0,0),
	(77,NULL,'cart.error.max.items.exceeded',0,0),
	(78,NULL,'cart.error.coupon.code.removed',0,0),
	(79,NULL,'cart.error.coupon.code.add',0,0),
	(80,NULL,'cart.error.invalid.option.specified',0,0),
	(81,NULL,'cart.error.load.product',0,0),
	(82,NULL,'cart.error.product.quantity.change',0,0),
	(83,NULL,'cart.error.product.remove',0,0),
	(84,NULL,'cart.error.product.add',0,0),
	(85,NULL,'catalog.buy',0,0),
	(86,NULL,'catalog.out.of.stock',0,0),
	(87,NULL,'cart.remove',0,0),
	(88,NULL,'cart.percentage.vat',0,0),
	(89,NULL,'cart.empty',0,0),
	(90,NULL,'cart.usp.shipping',0,0),
	(91,NULL,'cart.usp.return',0,0),
	(92,NULL,'cart.price.grand.total',0,0),
	(93,NULL,'cart.price.shipping',0,0),
	(94,NULL,'cart.price.subtotal',0,0),
	(95,NULL,'cart.price.total',0,0),
	(96,NULL,'cart.amount',0,0),
	(97,NULL,'cart.price.item',0,0),
	(98,NULL,'cart.product',0,0),
	(99,NULL,'cart.to.checkout',0,0),
	(100,NULL,'cart.cart',0,0),
	(101,NULL,'header.cart',0,0),
	(102,NULL,'header.usp.shipping',0,0),
	(103,NULL,'header.usp.return',0,0),
	(104,NULL,'header.phone',0,0),
	(105,NULL,'footer.payment.options',0,0),
	(106,NULL,'footer.shipping',0,0),
	(107,NULL,'footer.information',0,0),
	(108,NULL,'checkout.name.full.placeholder',0,0),
	(109,NULL,'checkout.name.full',0,0),
	(110,NULL,'checkout.headline.shipping.billing',0,0),
	(111,NULL,'checkout.address.billing.city',0,0),
	(112,NULL,'checkout.address.billing.zipcode',0,0),
	(113,NULL,'checkout.address.billing.number',0,0),
	(114,NULL,'checkout.address.billing.street',0,0),
	(115,NULL,'checkout.address.billing.company',0,0),
	(116,NULL,'checkout.address.billing.name.last',0,0),
	(117,NULL,'checkout.address.billing.name.middle',0,0),
	(118,NULL,'checkout.address.billing.name.first',0,0),
	(119,NULL,'checkout.email',0,0),
	(120,NULL,'checkout.address.shipping.phone',0,0),
	(121,NULL,'checkout.address.shipping.comment',0,0),
	(122,NULL,'checkout.address.shipping.comment.placeholder',0,0),
	(123,NULL,'checkout.address.full.placeholder',0,0),
	(124,NULL,'checkout.address.full',0,0),
	(125,NULL,'demopayment.demomethod',0,0),
	(126,NULL,'checkout.headline.shipping',0,0),
	(127,NULL,'checkout.percentage.vat',0,0),
	(128,NULL,'checkout.price.grand.total',0,0),
	(129,NULL,'checkout.price.shipping',0,0),
	(130,NULL,'checkout.price.subtotal',0,0),
	(131,NULL,'checkout.cart.empty',0,0),
	(132,NULL,'checkout.to.summary',0,0),
	(133,NULL,'checkout.address.shipping.city',0,0),
	(134,NULL,'checkout.address.shipping.zipcode',0,0),
	(135,NULL,'checkout.address.shipping.street',0,0),
	(136,NULL,'checkout.address.shipping.name',0,0),
	(137,NULL,'checkout.headline.shipping.to',0,0),
	(138,NULL,'checkout.headline.cart',0,0),
	(139,NULL,'checkout.headline.contact',0,0),
	(140,NULL,'checkout.headline.payment',0,0),
	(141,NULL,'checkout.headline.billing',0,0),
	(142,NULL,'checkout.address.billing.country',0,0),
	(143,NULL,'checkout.link.edit',0,0),
	(144,NULL,'checkout.address.shipping.country',0,0);

/*!40000 ALTER TABLE `pac_glossary_key` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pac_glossary_language
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pac_glossary_language`;

CREATE TABLE `pac_glossary_language` (
  `id_glossary_language` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_glossary_language`),
  UNIQUE KEY `pac_glossary_language_U_1` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `pac_glossary_language` WRITE;
/*!40000 ALTER TABLE `pac_glossary_language` DISABLE KEYS */;

INSERT INTO `pac_glossary_language` (`id_glossary_language`, `locale`, `name`)
VALUES
	(1,'en_US','en_US');

/*!40000 ALTER TABLE `pac_glossary_language` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pac_glossary_lookup
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pac_glossary_lookup`;

CREATE TABLE `pac_glossary_lookup` (
  `id_glossary_lookup` int(11) NOT NULL AUTO_INCREMENT,
  `store` varchar(255) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  PRIMARY KEY (`id_glossary_lookup`),
  UNIQUE KEY `name_store_language` (`name`,`store`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
