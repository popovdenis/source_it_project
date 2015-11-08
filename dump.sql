CREATE DATABASE progect;
USE progect;

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

CREATE TABLE user_role (
`id` INT(5) PRIMARY KEY auto_increment,
`user_id` INT(5) NOT NULL,
`role_id` INT(5) NOT NULL
);

ALTER TABLE user_role
    ADD CONSTRAINT fk_user
FOREIGN KEY (`user_id`)
      REFERENCES user(`id`)
ON UPDATE CASCADE
ON DELETE CASCADE
;

ALTER TABLE user_role
    ADD CONSTRAINT fk_role
FOREIGN KEY (`role_id`)
      REFERENCES role(`id`)
ON UPDATE CASCADE
ON DELETE CASCADE
;

CREATE TABLE gallery(
  `id` INT(5) AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(70) NOT NULL,
  `description` VARCHAR(150) NOT NULL,
  `created_at` DATETIME NOT NULL
);

