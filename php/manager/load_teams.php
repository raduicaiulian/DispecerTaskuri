<?php
	//used to load teams in side bar
	session_start();
	require '../db.php';
	$id=$_SESSION['id'];//id-ul managerului
	
	$result1 = $conn->query("SELECT t1.team_name, t1.id,t1.max_level,(SELECT count(user_id) FROM team_employee WHERE team_id=t1.id) AS 'emp_cnt' FROM team t1 WHERE t1.manager_id='".$id."'");//select only teams lead by the manager
	//manager_id pentru listenerul cand dai click pe echipa
	$result = array();
	while($row = mysqli_fetch_assoc($result1))
		$result[] = $row;

	echo json_encode($result);
	mysqli_close($conn);
 ?>
