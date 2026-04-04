DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS message;

CREATE TABLE user (
	user_id INT AUTO_INCREMENT PRIMARY KEY,
	username varchar(50) NOT NULL UNIQUE,
	password varchar(255) NOT NULL
);

CREATE TABLE message (
	message_id int AUTO_INCREMENT PRIMARY KEY,
	date_heure datetime NOT NULL,
	auteur varchar(50) NOT NULL,
	contenu varchar(3000) NOT NULL,
	INDEX (date_heure)
);
