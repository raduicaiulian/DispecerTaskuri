<?php
	//add an employee to a team based on employee username and team id 
	session_start();
	require '../db.php';
	$username = $_POST['username'];//username de inserat
	$id = $_POST['team_id'];//id echipă la care trebuie inserat
	//validare
	$sql="SELECT id FROM user WHERE username='".$username."';";
	$result=$conn->query($sql);

	if(mysqli_fetch_assoc($result)==NULL)
		die("2");
	$sql="SELECT * FROM user t1 INNER JOIN team_employee t2 on t2.user_id=t1.id WHERE t1.username='".$username."' and t2.team_id='".$id."';";
	$result=$conn->query($sql);

	if(mysqli_fetch_assoc($result)!=NULL)
		die("1");
	//inserare
	$sql="INSERT INTO team_employee(team_id, user_id) VALUES ('".$id."',(SELECT id FROM user WHERE username='".$username."'));";
	
	$result=$conn->query($sql);
	
	if($result!=FALSE)
		die("0");//inserarea userului în echipă a reușit
	else
		die("eroare sql");