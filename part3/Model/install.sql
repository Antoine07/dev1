DROP DATABASE IF EXISTS db_monster;

CREATE DATABASE `db_monster`;

use `db_monster`;

CREATE TABLE `scores`(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`rate` INT(10) unsigned NULL,
	PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
CREATE TABLE `kermits`(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`score_id` INT(10) unsigned NULL,
	`name` varchar(100) NOT NULL,
	PRIMARY KEY (`id`),
	CONSTRAINT `kermits_score_id_scores_id` FOREIGN KEY (`score_id`) REFERENCES `scores`(`id`) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

*/

-- on peut également créer les contraintes par la suite pour ne pas avoir de problème de contrainte sur les clés

CREATE TABLE `kermits`(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`score_id` INT(10) unsigned NULL,
	`name` varchar(100) NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE kermits ADD CONSTRAINT `kermits_score_id_scores_id` FOREIGN KEY (`score_id`) REFERENCES `scores`(`id`) ON DELETE CASCADE;


INSERT INTO `kermits` (name) VALUES ('tony'), ('alan'), ('albert'), ('Marie');

SELECT COUNT(*) FROM `kermits`;