DROP DATABASE IF EXISTS db_message;

DELETE FROM mysql.user WHERE user='tony' and host='tony';

GRANT ALL PRIVILEGES ON db_game.* to 'tony'@'localhost' IDENTIFIED BY 'tony' WITH GRANT OPTION;

CREATE DATABASE db_message
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_unicode_ci;

USE db_message;

CREATE TABLE IF NOT EXISTS `notes` (
  `id`      INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `email`   VARCHAR(100),
  `message` TEXT,
  PRIMARY KEY (id)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;