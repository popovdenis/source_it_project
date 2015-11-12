	CREATE TABLE article_tag(
	`id` INT(5) PRIMARY KEY AUTO_INCREMENT,
	  `article_id` INT(50), INDEX(article_id),
	  `tag_id` INT(50), INDEX(tag_id), 
      FOREIGN KEY (article_id) REFERENCES article(id),
	  FOREIGN KEY (tag_id) REFERENCES tags(id)
	);
	