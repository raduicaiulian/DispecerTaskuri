use dispecer_taskuri;
#users
INSERT INTO user (id, nume, prenume, mail, manager, data, username, password) VALUES
(1, 'Parolaeste', 'Parola1', 'maris1@gmail.com', 0, '2020-02-21', 'angajat1', '38b28c51aaa2349f5969968d699a0e24fe40a1ea4159dd69c78ad905e8f2bc834d34be2a8cf7d117ca3e89abfda08d800fdff817fa1f9e1bb47ea5fb572cf1ba');
INSERT INTO user (id, nume, prenume, mail, manager, data, username, password) VALUES
(2, 'Parolaeste', 'Parola123', 'maris11@gmail.com', 0, '2020-02-22', 'vlad123', '38b28c51aaa2349f5969968d699a0e24fe40a1ea4159dd69c78ad905e8f2bc834d34be2a8cf7d117ca3e89abfda08d800fdff817fa1f9e1bb47ea5fb572cf1ba');
INSERT INTO user (id, nume, prenume, mail, manager, data, username, password) VALUES
(3, 'Grigore', 'Vlad', 'maris1133@gmail.com', 1, '2020-01-22', 'manager123', '38b28c51aaa2349f5969968d699a0e24fe40a1ea4159dd69c78ad905e8f2bc834d34be2a8cf7d117ca3e89abfda08d800fdff817fa1f9e1bb47ea5fb572cf1ba');
INSERT INTO user (id, nume, prenume, mail, manager, data, username, password) VALUES
(4, 'Parolaeste', 'Parola12', 'maris@gmail.com', 1, '2020-02-21', 'Danimocanu', '38b28c51aaa2349f5969968d699a0e24fe40a1ea4159dd69c78ad905e8f2bc834d34be2a8cf7d117ca3e89abfda08d800fdff817fa1f9e1bb47ea5fb572cf1ba');
#Dragos a modifica mai jos
INSERT INTO user (id, nume, prenume, mail, manager, data, username, password) VALUES
(5, 'Angajat2', 'Parola123', 'maris5@gmail.com', 0, '2020-02-21', 'angajat2', '38b28c51aaa2349f5969968d699a0e24fe40a1ea4159dd69c78ad905e8f2bc834d34be2a8cf7d117ca3e89abfda08d800fdff817fa1f9e1bb47ea5fb572cf1ba');
INSERT INTO user (id, nume, prenume, mail, manager, data, username, password) VALUES
(6, 'Angajat3', 'Parola123', 'maris6@gmail.com', 0, '2020-02-22', 'angajat3', '38b28c51aaa2349f5969968d699a0e24fe40a1ea4159dd69c78ad905e8f2bc834d34be2a8cf7d117ca3e89abfda08d800fdff817fa1f9e1bb47ea5fb572cf1ba');
INSERT INTO user (id, nume, prenume, mail, manager, data, username, password) VALUES
(7, 'Angajat4', 'Parola123', 'maris7@gmail.com', 0, '2020-01-22', 'angajat4', '38b28c51aaa2349f5969968d699a0e24fe40a1ea4159dd69c78ad905e8f2bc834d34be2a8cf7d117ca3e89abfda08d800fdff817fa1f9e1bb47ea5fb572cf1ba');
INSERT INTO user (id, nume, prenume, mail, manager, data, username, password) VALUES
(8, 'Angajat5', 'Parola123', 'maris8@gmail.com', 0, '2020-02-21', 'angajat5', '38b28c51aaa2349f5969968d699a0e24fe40a1ea4159dd69c78ad905e8f2bc834d34be2a8cf7d117ca3e89abfda08d800fdff817fa1f9e1bb47ea5fb572cf1ba');

#teams
INSERT INTO team( id, team_name, manager_id, max_level) VALUES (1, "Front-End_devs",3,20 );
INSERT INTO team( id, team_name, manager_id, max_level) VALUES (2, "PROGRAMATORII_RAPIZI",4,20 );
INSERT INTO team( id, team_name, manager_id, max_level) VALUES (3, "A treia echipa",4,25);#Dragos a modifica aici

#tasks
INSERT INTO task(id, nume, descriere, deadline, time, sugestii, prioritate, team_id) VALUES (1, 'Pagina web frizerie','Avem nevoie de o pagină web pentru o frizerie ce dorește să prezinte clienților coafurile pe care ei le pot realiza și de unde clienții pot plasa comenzi','2020-12-03', '10:30:10','Nu folositi inline styl',5,1);
INSERT INTO task(id, nume, descriere, deadline, time, sugestii, prioritate, team_id) VALUES (2, 'Script de administrare rețele sociale','avem nevoie de un script care îți permite plasarea automată de postări pe mai multe rețele de socializare  în scop publicitar','2021-12-01', '12:30:00','Vreau să arate bine!!!',4,1);
INSERT INTO task(id, nume, descriere, deadline, time, sugestii, prioritate, team_id) VALUES (3, 'Script de administrare baza de date(nealocat)','no_description_1','2021-12-05', '12:30:00','Vreau să arate bine!!!',3,2);
INSERT INTO task(id, nume, descriere, deadline, time, sugestii, prioritate, team_id) VALUES (4, 'Script de administrare taskuri(nealocat)','no_description_2','2021-12-01', '12:30:00','Vreau să arate bine!!!',4,2);
INSERT INTO task(id, nume, descriere, deadline, time, sugestii, prioritate, team_id) VALUES (5, 'Task 5','descriere task 5','2021-12-05', '10:30:10','Sugestii 5',2,2);#Dragos a modifica mai jos
INSERT INTO task(id, nume, descriere, deadline, time, sugestii, prioritate, team_id) VALUES (6, 'Task 6','descriere task 6','2021-12-06', '11:30:00','Sugestii 6',4,3);
INSERT INTO task(id, nume, descriere, deadline, time, sugestii, prioritate, team_id) VALUES (7, 'Task 7','descriere task 7','2021-12-07', '12:30:00','Sugestii 7',2,3);
INSERT INTO task(id, nume, descriere, deadline, time, sugestii, prioritate, team_id) VALUES (8, 'Task 8','descriere task 8','2021-12-08', '13:30:00','Sugestii 8',5,3);

#skils_of_team
#INSERT INTO skills_of_team(team_id, nume_skill) VALUES (1,"HTML");
#INSERT INTO skills_of_team(team_id, nume_skill) VALUES (2,"CSS");
#INSERT INTO skills_of_team(team_id, nume_skill) VALUES (3,"JS");

#team_employee(tabela noua)
INSERT INTO team_employee(team_id, user_id, workload) VALUES (1,1,0);
INSERT INTO team_employee(team_id, user_id, workload) VALUES (2,1,0);
INSERT INTO team_employee(team_id, user_id, workload) VALUES (1,2,0);#Dragos a modifica mai jos
INSERT INTO team_employee(team_id, user_id, workload) VALUES (2,5,0);
INSERT INTO team_employee(team_id, user_id, workload) VALUES (2,6,0);
INSERT INTO team_employee(team_id, user_id, workload) VALUES (3,7,0);
INSERT INTO team_employee(team_id, user_id, workload) VALUES (3,8,0);

#skills
#id angajat1
INSERT INTO skill(id, level, nume_skill) VALUES ( 1, 6, "HTML");#skiluri necesare(referențiate din tabela skills_required)
INSERT INTO skill(id, level, nume_skill) VALUES ( 2, 3, "CSS");
INSERT INTO skill(id, level, nume_skill) VALUES ( 3, 4, "JS");
#id angajat2
INSERT INTO skill(id, level, nume_skill) VALUES ( 4, 3, "Python");
INSERT INTO skill(id, level, nume_skill) VALUES ( 5, 4, "Go");

INSERT INTO skill(id, level, nume_skill) VALUES ( 6, 2, "HTML");
INSERT INTO skill(id, level, nume_skill) VALUES ( 7, 3, "CSS");
INSERT INTO skill(id, level, nume_skill) VALUES ( 8, 2, "JS");
INSERT INTO skill(id, level, nume_skill) VALUES ( 9, 3, "Python");
INSERT INTO skill(id, level, nume_skill) VALUES ( 10, 4 , "Go");
INSERT INTO skill(id, level, nume_skill) VALUES ( 11, 4, "HTML");
INSERT INTO skill(id, level, nume_skill) VALUES ( 12, 6, "HTML");
INSERT INTO skill(id, level, nume_skill) VALUES ( 13, 8, "HTML");
INSERT INTO skill(id, level, nume_skill) VALUES ( 14, 4, "JS");
INSERT INTO skill(id, level, nume_skill) VALUES ( 15, 3, "HTML");
INSERT INTO skill(id, level, nume_skill) VALUES ( 16, 6, "CSS");
INSERT INTO skill(id, level, nume_skill) VALUES ( 17, 4, "JS");
INSERT INTO skill(id, level, nume_skill) VALUES ( 18, 3, "JS");
INSERT INTO skill(id, level, nume_skill) VALUES ( 19, 1, "Python");
INSERT INTO skill(id, level, nume_skill) VALUES ( 20, 4, "Go");
#id angajat5
INSERT INTO skill(id, level, nume_skill) VALUES ( 21, 4, "HTML");
#id angajat6
INSERT INTO skill(id, level, nume_skill) VALUES ( 22, 9, "HTML");
INSERT INTO skill(id, level, nume_skill) VALUES ( 23, 5, "JS");
#id angajat7
INSERT INTO skill(id, level, nume_skill) VALUES ( 24, 8, "HTML");
INSERT INTO skill(id, level, nume_skill) VALUES ( 25, 6, "CSS");
INSERT INTO skill(id, level, nume_skill) VALUES ( 26, 5, "JS");
#id angajat8
INSERT INTO skill(id, level, nume_skill) VALUES ( 27, 4, "JS");
INSERT INTO skill(id, level, nume_skill) VALUES ( 28, 1, "Python");
INSERT INTO skill(id, level, nume_skill) VALUES ( 29, 4, "Go");
-- INSERT INTO skill(id, level, nume_skill) VALUES ( 6, 6, "HTML");#skiluri deținute(referențiate din tabela skill_of_user_based_of_team)
-- INSERT INTO skill(id, level, nume_skill) VALUES ( 7, 10, "CSS");
-- INSERT INTO skill(id, level, nume_skill) VALUES ( 8, 7, "JS");
-- INSERT INTO skill(id, level, nume_skill) VALUES ( 9, 8, "Python");
-- INSERT INTO skill(id, level, nume_skill) VALUES ( 10, 9, "Go");

#skills_required
INSERT INTO skills_required(skill_id, id_task) VALUES (6,1);#for first task
INSERT INTO skills_required(skill_id, id_task) VALUES (7,1);
INSERT INTO skills_required(skill_id, id_task) VALUES (8,1);
INSERT INTO skills_required(skill_id, id_task) VALUES (9,2);#for second task
INSERT INTO skills_required(skill_id, id_task) VALUES (10,2);#Dragos a modifica mai jos
INSERT INTO skills_required(skill_id, id_task) VALUES (11,3);
INSERT INTO skills_required(skill_id, id_task) VALUES (12,4);
INSERT INTO skills_required(skill_id, id_task) VALUES (13,5);
INSERT INTO skills_required(skill_id, id_task) VALUES (14,5);
INSERT INTO skills_required(skill_id, id_task) VALUES (15,6);
INSERT INTO skills_required(skill_id, id_task) VALUES (16,6);
INSERT INTO skills_required(skill_id, id_task) VALUES (17,6);
INSERT INTO skills_required(skill_id, id_task) VALUES (18,7);
INSERT INTO skills_required(skill_id, id_task) VALUES (19,7);
INSERT INTO skills_required(skill_id, id_task) VALUES (20,8);

#skill_of_user_based_of_team
INSERT INTO skill_of_user_based_on_team(user_id, team_id, skill_id) VALUES (1,1,1);
INSERT INTO skill_of_user_based_on_team(user_id, team_id, skill_id) VALUES (1,1,2);
INSERT INTO skill_of_user_based_on_team(user_id, team_id, skill_id) VALUES (1,1,3);
INSERT INTO skill_of_user_based_on_team(user_id, team_id, skill_id) VALUES (1,2,1);
INSERT INTO skill_of_user_based_on_team(user_id, team_id, skill_id) VALUES (2,1,4);
INSERT INTO skill_of_user_based_on_team(user_id, team_id, skill_id) VALUES (2,1,5);
INSERT INTO skill_of_user_based_on_team(user_id, team_id, skill_id) VALUES (5,2,21);
INSERT INTO skill_of_user_based_on_team(user_id, team_id, skill_id) VALUES (6,2,22);
INSERT INTO skill_of_user_based_on_team(user_id, team_id, skill_id) VALUES (6,2,23);
INSERT INTO skill_of_user_based_on_team(user_id, team_id, skill_id) VALUES (7,3,24);
INSERT INTO skill_of_user_based_on_team(user_id, team_id, skill_id) VALUES (7,3,25);
INSERT INTO skill_of_user_based_on_team(user_id, team_id, skill_id) VALUES (7,3,26);
INSERT INTO skill_of_user_based_on_team(user_id, team_id, skill_id) VALUES (8,3,27);
INSERT INTO skill_of_user_based_on_team(user_id, team_id, skill_id) VALUES (8,3,28);
INSERT INTO skill_of_user_based_on_team(user_id, team_id, skill_id) VALUES (8,3,29);


#tasks_of_user

#task of team
#INSERT INTO task_of_team(id_task, id_team) VALUES (1,1);
#INSERT INTO task_of_team(id_task, id_team) VALUES (2,1);
#INSERT INTO task_of_team(id_task, id_team) VALUES (3,2);
#INSERT INTO task_of_team(id_task, id_team) VALUES (4,2);
#INSERT INTO task_of_team(id_task, id_team) VALUES (5,2);
#INSERT INTO task_of_team(id_task, id_team) VALUES (6,3);
#INSERT INTO task_of_team(id_task, id_team) VALUES (7,3);
#INSERT INTO task_of_team(id_task, id_team) VALUES (8,3);
