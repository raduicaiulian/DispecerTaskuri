CREATE TABLE dispecer_taskuri.team(
  id INT NOT NULL AUTO_INCREMENT,
  team_name VARCHAR(30) NOT NULL,
  manager_id INT NOT NULL,
  max_level TINYINT,
  PRIMARY KEY(id),
  CONSTRAINT FOREIGN KEY (manager_id) REFERENCES user(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;