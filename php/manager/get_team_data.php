<?php
	require "../db.php";
	$team_id=$_POST['team_id'];
	$sql = "select t2.id, nume, prenume, username, mail FROM team_employee t1 INNER JOIN user t2 on t1.user_id=t2.id WHERE t1.team_id=".$team_id.";";

	$result=$conn->query($sql);

	$rows = array();
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r;
	}
	if ($result!=FALSE)
		echo json_encode($rows);
	else
		echo 'eroare sqls';
	mysqli_close($conn);
	
	//skills of each user based on team
	//$sql = "SELECT user_id, skill_id from skill_of_user_based_on_team WHERE team_id=".$_POST['id'];
	//SELECT user.nume, user.prenume, user.username, skill.nume_skill, skill.level from (SELCET user_id, skill_id from skill_of_user_based_on_team WHERE team_id=1)
	?>