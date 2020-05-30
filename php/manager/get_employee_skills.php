<?php
	require "../db.php";
	$team_id = $_POST['team_id'];
	$user_id = $_POST['user_id'];
	
	//echo $team_id;
	//die($user_id);
	$sql = "SELECT t2.* from skill_of_user_based_on_team t1 inner JOIN skill t2 ON t1.skill_id=t2.id WHERE user_id='$user_id' and team_id='$team_id ';";
	//die($sql);
	$result=$conn->query($sql);

	$rows = array();
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r;
	}
	if ($result!=FALSE)
		echo json_encode($rows);
	else
		die('eroare sql');
?>