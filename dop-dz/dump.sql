CREATE DATABASE new_db;
USE new_db;
CREATE TABLE user(
	`id` int primary key autoincrement,
	`firstname` varchar(50) NOT NULL,
	`lastname` varchar(50) NOT NULL,
	`email` varchar(50) NOT NULL,
	`password` varchar(100) NOT NULL,
	`phone` varchar(30),
	`created_at` datetime, NOT NULL
 );