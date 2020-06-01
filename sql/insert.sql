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
#teams
INSERT INTO team( id, team_name, manager_id, max_level) VALUES (1, "Front-End_devs",3,20 );
INSERT INTO team( id, team_name, manager_id, max_level) VALUES (2, "PROGRAMATORII_RAPIZI",4,15 );
#tasks
INSERT INTO task(id, nume, descriere, deadline, time, sugestii, prioritate, team_id) VALUES (1, 'Pagina web frizerie','Avem nevoie de o pagină web pentru o frizerie ce dorește să prezinte clienților coafurile pe care ei le pot realiza și de unde clienții pot plasa comenzi','2020-12-03', '10:30:10','Nu folositi inline styl',5,1);
INSERT INTO task(id, nume, descriere, deadline, time, sugestii, prioritate, team_id) VALUES (2, 'Script de administrare rețele sociale','avem nevoie de un script care îți permite plasarea automată de postări pe mai multe rețele de socializare  în scop publicitar','2021-12-01', '12:30:00','Vreau să arate bine!!!',4,2);
INSERT INTO task(id, nume, descriere, deadline, time, sugestii, prioritate, team_id) VALUES (3, 'Script de administrare baza de date(nealocat)','no_description_1','2021-12-05', '12:30:00','Vreau să arate bine!!!',3,1);
INSERT INTO task(id, nume, descriere, deadline, time, sugestii, prioritate, team_id) VALUES (4, 'Script de administrare taskuri(nealocat)','no_description_2','2021-12-01', '12:30:00','Vreau să arate bine!!!',4,2);
#skils_of_team
#INSERT INTO skills_of_team(team_id, nume_skill) VALUES (1,"HTML");
#INSERT INTO skills_of_team(team_id, nume_skill) VALUES (1,"CSS");
#INSERT INTO skills_of_team(team_id, nume_skill) VALUES (1,"JS");
#INSERT INTO skills_of_team(team_id, nume_skill) VALUES (2,"Python");
#INSERT INTO skills_of_team(team_id, nume_skill) VALUES (2,"Go");
#team_employee(tabela noua)
INSERT INTO team_employee(team_id, user_id) VALUES (1,1);# angajat_1_in echipa Front-End_devs
INSERT INTO team_employee(team_id, user_id) VALUES (2,2);#vlad123_in echipa PROGRAMATORII_RAPIZI
INSERT INTO team_employee(team_id, user_id) VALUES (1,2);#vlad123_in echipa PROGRAMATORII_RAPIZI
#skills
INSERT INTO skill(id, level, nume_skill) VALUES ( 1, 5, "HTML");#skiluri necesare(referențiate din tabela skills_required)
INSERT INTO skill(id, level, nume_skill) VALUES ( 2, 5, "CSS");
INSERT INTO skill(id, level, nume_skill) VALUES ( 3, 5, "JS");
INSERT INTO skill(id, level, nume_skill) VALUES ( 4, 5, "Python");
INSERT INTO skill(id, level, nume_skill) VALUES ( 5, 5, "Go");
INSERT INTO skill(id, level, nume_skill) VALUES ( 6, 6, "HTML");#skiluri deținute(referențiate din tabela skill_of_user_based_of_team)
INSERT INTO skill(id, level, nume_skill) VALUES ( 7, 10, "CSS");
INSERT INTO skill(id, level, nume_skill) VALUES ( 8, 7, "JS");
INSERT INTO skill(id, level, nume_skill) VALUES ( 9, 8, "Python");
INSERT INTO skill(id, level, nume_skill) VALUES ( 10, 9, "Go");
#skills_required
INSERT INTO skills_required(skill_id, id_task) VALUES (1,1);#for first task
INSERT INTO skills_required(skill_id, id_task) VALUES (2,1);
INSERT INTO skills_required(skill_id, id_task) VALUES (3,1);
INSERT INTO skills_required(skill_id, id_task) VALUES (4,2);#for second task
INSERT INTO skills_required(skill_id, id_task) VALUES (5,2);
#skill_of_user_based_of_team
INSERT INTO skill_of_user_based_on_team(user_id, team_id, skill_id) VALUES (1,1,6);
INSERT INTO skill_of_user_based_on_team(user_id, team_id, skill_id) VALUES (1,1,7);
INSERT INTO skill_of_user_based_on_team(user_id, team_id, skill_id) VALUES (1,1,8);
INSERT INTO skill_of_user_based_on_team(user_id, team_id, skill_id) VALUES (2,2,9);
INSERT INTO skill_of_user_based_on_team(user_id, team_id, skill_id) VALUES (2,2,10);

#tasks_of_user
INSERT INTO task_of_user(id_task, id_user) VALUES (1,2);#primul angajat din prima echipa
INSERT INTO task_of_user(id_task, id_user) VALUES (2,2);#primul angajat din a doua echipa
#task of team
#INSERT INTO task_of_team(id_task, id_team) VALUES (3,1);#primul angajat din prima echipa
#INSERT INTO task_of_team(id_task, id_team) VALUES (4,2);#primul angajat din a doua echipa
