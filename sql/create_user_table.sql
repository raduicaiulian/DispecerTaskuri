CREATE TABLE dispecer_taskuri.user(
  id INT NOT NULL AUTO_INCREMENT,
  nume varchar(25) NOT NULL,
  prenume varchar(30) NOT NULL,
  mail varchar(30) NOT NULL,
  manager tinyint(1) NOT NULL,
  data date DEFAULT NULL,
  username varchar(25) NOT NULL,
  password char(128) NOT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

