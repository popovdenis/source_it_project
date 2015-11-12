CREATE TABLE article(
	  `id` INT(5) PRIMARY KEY AUTO_INCREMENT,
	  `title` VARCHAR(70) NOT NULL ,
	  `description` VARCHAR(250) NOT NULL ,
	  `created_at` DATETIME NOT NULL
	);