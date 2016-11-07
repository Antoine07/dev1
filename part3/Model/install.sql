DROP DATABASE IF EXISTS db_moster;

CREATE DATABASE `db_moster`;

use `db_moster`;

CREATE TABLE `scores`(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`rate` INT(10) unsigned NULL,
	PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `kermits`(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`score_id` INT(10) unsigned NULL,
	`name` varchar(100) NOT NULL,
	PRIMARY KEY (`id`),
	CONSTRAINT `kermits_score_id_scores_id` FOREIGN KEY (`score_id`) REFERENCES `scores`(`id`) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;