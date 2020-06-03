CREATE TABLE dispecer_taskuri.team_employee(
  team_id INT NOT NULL,
  user_id INT NOT NULL,
  workload INT NOT NULL,
  CONSTRAINT FOREIGN KEY (team_id) REFERENCES team(id),
  CONSTRAINT FOREIGN KEY (user_id) REFERENCES user(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
