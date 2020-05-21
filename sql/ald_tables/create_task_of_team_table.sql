CREATE TABLE dispecer_taskuri.task_of_team(
  id_task INT NOT NULL,
  id_team INT NOT NULL,
  CONSTRAINT FOREIGN KEY (id_task) REFERENCES task(id),
  CONSTRAINT FOREIGN KEY (id_team) REFERENCES team(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;