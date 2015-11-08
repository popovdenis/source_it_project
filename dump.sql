CREATE DATABASE source_it_project;
USE source_it_project;

CREATE TABLE role (
  `id`   INT(5) PRIMARY KEY AUTO_INCREMENT,
  `role` VARCHAR(20)
);

CREATE TABLE user (
  `id`         INT PRIMARY KEY AUTO_INCREMENT,
  `firstname`  VARCHAR(50)  NOT NULL,
  `lastname`   VARCHAR(50)  NOT NULL,
  `email`      VARCHAR(50)  NOT NULL,
  `password`   VARCHAR(100) NOT NULL,
  `phone`      VARCHAR(30),
  `created_at` DATETIME
);

CREATE TABLE gallery(
  `id` INT(5) AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(70) NOT NULL,
  `description` VARCHAR(150) NOT NULL,
  `created_at` DATETIME NOT NULL
);

CREATE TABLE article(
  `id` INT(5) PRIMARY KEY AUTO_INCREMENT,
  `title` VARCHAR(70) NOT NULL ,
  `description` VARCHAR(250) NOT NULL ,
  `created_at` DATETIME NOT NULL
);