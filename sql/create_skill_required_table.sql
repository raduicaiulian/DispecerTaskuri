CREATE TABLE dispecer_taskuri.skills_required(
  skill_id INT NOT NULL,
  id_task INT NOT NULL,
  CONSTRAINT FOREIGN KEY (skill_id) REFERENCES skill(id),
  CONSTRAINT FOREIGN KEY (id_task) REFERENCES task(id)
	
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
