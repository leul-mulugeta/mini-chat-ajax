CREATE TABLE user (
	user_id INT AUTO_INCREMENT PRIMARY KEY,
	username varchar(50) NOT NULL UNIQUE,
	password varchar(255) NOT NULL
);