CREATE TABLE dispecer_taskuri.skills_of_team(
  team_id INT NOT NULL,
  nume_skill varchar(20) NOT NULL,
  PRIMARY KEY (team_id, nume_skill),
  CONSTRAINT FOREIGN KEY (team_id) REFERENCES team(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;