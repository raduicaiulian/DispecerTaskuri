CREATE TABLE dispecer_taskuri.resetare_parola (
  resetareParolaId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  resetareParolaEmail TEXT NOT NULL,
  resetareParolaSelector TEXT NOT NULL,
  resetareParolaToken LONGTEXT NOT NULL,
  resetareParolaExpirareToken TEXT NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
