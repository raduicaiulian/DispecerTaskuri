<?php
	session_start();
	require '../db.php';
	$id=$_SESSION['id'];//id manager 

	//toate taskurile nealocate din toate echipele ce sunt administrate de un anumit manager(specificat prin id)
	$sql="SELECT t3.* FROM (SELECT t1.* FROM task t1 INNER JOIN (SELECT id FROM team WHERE manager_id='$id') t2 ON t2.id=t1.team_id) t3 LEFT JOIN task_of_user t4 ON t3.id=id_task where t4.id_task is NULL;";
	$result=$conn->query($sql);
	
	if($result == NULL)
		die("eroare sql");
	
	$res = array();
	while($row = mysqli_fetch_assoc($result))
		$res[] = $row;

	echo json_encode($res);