CREATE TABLE dispecer_taskuri.skill_of_user_based_on_team (
  user_id INT NOT NULL,
  team_id INT NOT NULL,
  skill_id INT NOT NULL,
  CONSTRAINT FOREIGN KEY (user_id) REFERENCES user(id),
  CONSTRAINT FOREIGN KEY (team_id) REFERENCES team(id),
  CONSTRAINT FOREIGN KEY (skill_id) REFERENCES skill(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;