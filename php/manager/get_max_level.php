<?php
	session_start();
	require '../db.php';
	$team_id=$_POST['team_id'];//id-ul managerului
	$result1 = $conn->query("SELECT max_level FROM team WHERE id='".$team_id."';");
	
	$result = array();
	$row = mysqli_fetch_assoc($result1);
	$result[] = $row;

	echo json_encode($result);
	mysqli_close($conn);