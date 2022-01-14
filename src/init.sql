CREATE DATABASE IF NOT EXISTS auth_DB;
CREATE USER IF NOT EXISTS 'root2'@'%' IDENTIFIED BY 'passw';
GRANT SELECT,UPDATE,INSERT,DELETE ON auth_DB.* TO 'root2'@'%';
FLUSH PRIVILEGES;

USE auth_DB;
CREATE TABLE IF NOT EXISTS users (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS products (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(60) NOT NULL,
  price INT(11) NOT NULL,
  amount INT(11) NOT NULL,
  PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS files (
ID INT NOT NULL AUTO_INCREMENT,
name TEXT NOT NULL,
content MEDIUMBLOB NOT NULL,
PRIMARY KEY(ID)
);

INSERT INTO users (name, password) VALUES
('user1', '{SHA}jLIjfQZ5yojbZGTqxg2pY0VROWQ='),
('user2', '{SHA}wk0KGWjjOcN4Z1GrFkEcLCTOii4='),
('user3', '{SHA}0APrAfZJL3Qp4lmcTXlhUUzeDOE=');

INSERT INTO products (name, price, amount) VALUES
('Пила торцовочная', 13000, 153),
('Пила монтажная электрическая', 17371, 0),
('Пистолет монтажный', 8000, 97),
('Фрезер электрический', 11000, 106),
('Компрессор безмасляный', 9000, 0),
('Краскопульт пневматический', 2900, 74);