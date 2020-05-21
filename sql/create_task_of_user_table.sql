CREATE TABLE dispecer_taskuri.task_of_user(
  id_task INT NOT NULL,
  id_user INT NOT NULL,
  CONSTRAINT FOREIGN KEY (id_task) REFERENCES task(id),
  CONSTRAINT FOREIGN KEY (id_user) REFERENCES user(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
