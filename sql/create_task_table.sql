CREATE TABLE dispecer_taskuri.task(
  id INT NOT NULL AUTO_INCREMENT,
  nume varchar(50) NOT NULL,
  descriere varchar(150) NOT NULL,
  deadline date NOT NULL,
  time time NOT NULL,
  sugestii varchar(150),
  prioritate tinyint NOT NULL,
  team_id int NOT NULL,
  CONSTRAINT FOREIGN KEY (team_id) REFERENCES team(id),
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;