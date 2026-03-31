DROP TABLE IF EXISTS message;
DROP TABLE IF EXISTS user;

CREATE TABLE message (
	message_id int AUTO_INCREMENT PRIMARY KEY,
	date_heure datetime NOT NULL,
	auteur varchar(50) NOT NULL,
	contenu varchar(3000) NOT NULL
);

CREATE TABLE user (
	user_id INT AUTO_INCREMENT PRIMARY KEY,
	username varchar(50) NOT NULL UNIQUE,
	password varchar(255) NOT NULL
);