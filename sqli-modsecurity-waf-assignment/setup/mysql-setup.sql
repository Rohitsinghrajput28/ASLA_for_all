CREATE DATABASE sqli_lab;
USE sqli_lab;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50),
  password VARCHAR(50)
);

INSERT INTO users VALUES (1,'admin','admin123');
