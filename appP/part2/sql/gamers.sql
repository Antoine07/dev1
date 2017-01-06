DROP DATABASE IF EXISTS db_gamer;

CREATE DATABASE `db_gamer`;

use `db_gamer`;

CREATE TABLE `compagnies`(
 `name` char(12) NOT NULL,
 `street` varchar(100) NOT NULL,
 `city` varchar(100) NOT NULL,
 PRIMARY KEY (`name`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `gamers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `power` SMALLINT NOT NULL,
  `life` SMALLINT NOT NULL,
  `nb_hour` SMALLINT NOT NULL,
  `date_inscription` DATE NOT NULL,
  `compagny` char(12) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `posts_compagny_compagnies_compagny` FOREIGN KEY (`compagny`) REFERENCES `compagnies`(`name`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `products` (
  `id` INT(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` DECIMAL(5,2) NOT NULL,
  `stock` SMALLINT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `commands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gamer_id` INT(10) unsigned NOT NULL,
  `product_id` INT(10) unsigned NOT NULL,
  `number` CHAR(5) NOT NULL,
  `order_date` DATE NOT NULL,
  `shipped_date` DATE NULL,
  `status` ENUM('in progress', 'shipped') DEFAULT 'in progress',
  PRIMARY KEY (`id`),
  CONSTRAINT `commands_gamer_id_gamers_id` FOREIGN KEY (`gamer_id`) REFERENCES `gamers`(`id`) ON DELETE CASCADE,
  CONSTRAINT `commands_product_id_products_id` FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- insert data

-- le verrou write empêche tout autre script PHP, tout accès à la table, qui viendrait prendre de l'information de la table au moment où on fait l'insertion

LOCK TABLES `compagnies` WRITE;

INSERT INTO `compagnies` 
(`name`, `street`, `city`) VALUES
('CAPTAMERICA', 'eclair', 'new-york'),
('THOR', 'Honeycomb', 'singanpor'),
('IRONMAN', 'Kikat', 'new-york');

UNLOCK TABLES;

LOCK TABLES `gamers` WRITE;

INSERT INTO `gamers` 
(`name`, `power`, `life`, `nb_hour`,`date_inscription`, `compagny`) VALUES
('Abel',10, 10, 450,'2012-02-16', 'CAPTAMERICA'),
('Adam',11, 5, 450,'2012-02-23', 'CAPTAMERICA'),
('Adrien',9, 10, 350,'2012-02-07', 'THOR'),
('Tony',7, 10, 0,'2016-08-05' ,'THOR'),
('Camille',3, 0, 1000, '2014-02-05', 'CAPTAMERICA'),
('Louise',1, 10, 2450,'2016-02-13', 'IRONMAN'),
('Calvin',18, 1, 450,'2016-02-13', 'THOR'),
('John',18, 20, 450,'2016-02-13', null),
('Joana',11, 23, 45,'2016-10-13', 'THOR');

UNLOCK TABLES;

LOCK TABLES `products` WRITE;

INSERT INTO `products` 
(`name`, `price`, `stock`) VALUES
('donut', 100.5, 200),
('eclair', 58.95,20),
('royo',84.8,150),
('gingerbread',45.5,200),
('honeycomb',78.58,203),
('icecreamsandwich',123.75,50),
('kikat', 45.23,200),
('lolipop',45.56,800);

UNLOCK TABLES;

LOCK TABLES `commands` WRITE;

INSERT INTO `commands` 
(`gamer_id`, `product_id`, `number`, `order_date`, `shipped_date`, `status`) VALUES
(1,2,'00001','2014-09-03','2014-09-04', 'shipped' ),
(1,2,'00002','2014-10-03','2014-10-04', 'shipped' ),
(1,1,'00003','2014-10-04','2014-10-05', 'shipped' ),
(2,3,'00004','2015-09-03','2015-09-04', 'shipped' ),
(2,3,'00005','2015-09-03','2015-09-06', 'shipped' ),
(2,3,'00006','2015-09-03','2015-09-04', 'shipped' ),
(2,1,'00007','2015-09-03','2015-09-04', 'shipped' ),
(2,1,'00008','2015-09-03','2015-09-04', 'shipped' ),
(3,3,'00009','2016-09-03','2016-09-05', 'shipped' ),
(3,5,'00010','2016-09-03','2016-09-03', 'shipped' ),
(3,4,'00011','2016-09-03','2016-09-08', 'shipped' ),
(3,7,'00012','2016-09-03','2016-09-11', 'shipped' ),
(3,7,'00013','2016-09-03','2016-09-03', 'shipped' ),
(4,7,'00014','2016-09-03','2016-09-03', 'shipped' ),
(4,7,'00015','2016-11-01',null, 'in progress' ),
(4,7,'00016','2016-11-01','2016-11-02', 'shipped' ),
(4,7,'00017','2016-11-02',null, 'in progress' ),
(4,1,'00018','2016-11-02',null, 'in progress' ),
(4,1,'00019','2016-11-01','2016-11-02', 'shipped' ),
(5,1,'00020','2016-11-01','2016-11-03', 'shipped' ),
(5,1,'00021','2016-11-20','2016-11-23', 'shipped' ),
(5,1,'00022','2016-11-01',null, 'in progress' ),
(5,1,'00023','2016-11-18',null, 'in progress' ),
(5,2,'00024','2016-10-15','2016-10-15', 'shipped' ),
(5,2,'00025','2016-10-15','2016-10-17', 'shipped' ),
(8,2,'00026','2016-10-18','2016-11-02', 'shipped' ),
(8,2,'00027','2016-10-10','2016-10-12', 'shipped' ),
(8,3,'00028','2016-10-15','2016-10-17', 'shipped' ),
(8,5,'00029','2016-10-14',null, 'in progress' );


UNLOCK TABLES;