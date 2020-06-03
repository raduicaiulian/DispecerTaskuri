<?php
	require '../db.php';
	$id=$_GET['id'];
	$team_id=$_GET['team_id'];
	$skill=$_GET['skill'];
	$level=$_GET['level'];
	/*echo $id;
	echo("<br>");
	echo $team_id;
	echo("<br>");
	die("dsd");*/
	//de verificat daca skill-ul exită deja în baza de date
	$sql="INSERT INTO SKILL(nume_skill,level) VALUES('$skill','$level');";
	$res=$conn->query($sql);
	if($res==FALSE)//daca insertul failuie
		die("errr sql");
	$skill_id=$conn->insert_id;
	//de verificat dacă skilul exista în skills of team
	$sql="INSERT INTO skill_of_user_based_on_team(user_id, team_id, skill_id) VALUES ('$id','$team_id','$skill_id')";
	
	$res=$conn->query($sql);
	if($res!=FALSE)
		die("0");
	else
		die("error".$sql);
	