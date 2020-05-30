<?php
	session_start();
	require '../db.php';
	//presupunem că toate variabilele au ajuns cu bine
	$nume_task=$_POST['nume_task'];
	$team_id=$_POST['team_id'];
	$skills=$_POST['skills'];
	$levels=$_POST['levels'];
	$descriere=$_POST['descriere'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$suggestions=$_POST['suggestions'];
	$priority=$_POST['priority'];
	//!!!!!!!!!!!!!!!!!!!!!mai trebuie validari
	/*print_r($nume_task);
	print_r($team_id);
	print_r($skills);
	print_r($levels);
	print_r($descriere);
	print_r($date);
	print_r($time);
	print_r($suggestions);
	print_r($priority);*/
	//dacă în echipa cu id=$team_id există un task cu numele $nume task afiseaza eroarea deja există un task cu acest nume
	$sql="SELECT * FROM task WHERE nume='$nume_task' and team_id='$team_id'";//check if task exist already
	$result=$conn->query($sql);
	if($result==FALSE)
		die("eroare sql 1");
	if(mysqli_num_rows($result)>0)
		die("1");//acest task există deja
	//insert task
	$sql="INSERT IGNORE INTO task(nume, descriere, deadline, time, sugestii, prioritate, team_id) VALUES ('$nume_task','$descriere','$date','$time','$suggestions','$priority','$team_id');";
	$result=$conn->query($sql);
	if($result==FALSE)
		die("eroare sql2");
	for($i=0;$i<count($skills);$i++){
		//insert sakill if it does not exist 
		$sql="INSERT IGNORE INTO skill(nume_skill,level) VALUES ('".$skills[$i][0]."','".$levels[$i][0]."');";
		$result=$conn->query($sql);
		if($result==FALSE)
			die("eroare sql3");
		//get id's of inserted task and skill 
		$sql="SELECT (SELECT id FROM skill WHERE nume_skill='".$skills[$i][0]."' AND level='".$levels[$i][0]."' LIMIT 1) 'skill_id',(SELECT id FROM task WHERE team_id='$team_id' AND nume='$nume_task' LIMIT 1) 'task_id' FROM DUAL ";
		$result=$conn->query($sql);
		if($result==FALSE)
			die("eroare sql4");
		
		//link skill inserted before to task requirement
		$res=mysqli_fetch_assoc($result);
		$sql="INSERT INTO skills_required(id_task, skill_id) VALUES (".$res['task_id'].",".$res['skill_id'].");";
		$result=$conn->query($sql);
		if($result==FALSE)
			die("eroare sql5");
	}
	mysqli_close($conn);
	die("0");