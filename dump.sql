<<<<<<< HEAD
CREATE DATABASE source_it_project;
<<<<<<< HEAD
=======
CREATE DATABASE progect;
>>>>>>> dev
=======

>>>>>>> angela
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

<<<<<<< HEAD
CREATE TABLE user_role (
`id` INT(5) PRIMARY KEY auto_increment,
`user_id` INT(5) NOT NULL,
`role_id` INT(5) NOT NULL
);

<<<<<<< HEAD
INSERT INTO `user_role`(`user_id`, `role_id`) VALUES ('1','3');
INSERT INTO `user_role`(`user_id`, `role_id`) VALUES ('2','1');
INSERT INTO `user_role`(`user_id`, `role_id`) VALUES ('3','5');
INSERT INTO `user_role`(`user_id`, `role_id`) VALUES ('4','4');
INSERT INTO `user_role`(`user_id`, `role_id`) VALUES ('5','2');
INSERT INTO `user_role`(`user_id`, `role_id`) VALUES ('6','2');
=======
CREATE TABLE gallery(
  `id` INT(5) AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(70) NOT NULL,
  `description` VARCHAR(150) NOT NULL,
  `created_at` DATETIME NOT NULL
);
>>>>>>> dev
=======
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


>>>>>>> angela
