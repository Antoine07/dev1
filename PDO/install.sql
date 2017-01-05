
DROP DATABASE IF EXISTS db_message;

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

CREATE TABLE IF NOT EXISTS `users` (
  `id`       INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50)  NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;